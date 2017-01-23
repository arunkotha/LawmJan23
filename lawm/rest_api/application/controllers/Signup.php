<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/third_party/mailer/mailer.php';

class Signup extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        //$this->load->library('common/form_validator');
        //$this->load->library('parser');
    }

    public function login()
    {
        $this->load->library('oauth/oauth');
        $this->config->load('rest');

        $data = json_decode(file_get_contents("php://input"), true);
        if($data){ $_POST = $data; }
        $data = $this->input->post();
        if(empty($data)){
            $result = array('status'=>FALSE,'message'=>'Incorrect login details','data'=>'');
            echo json_encode($result); exit;
        }

        //validating inputs
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_data($data);
        if ($this->form_validation->run() == FALSE)
        {
            $result = array('status'=>FALSE,'error'=>$this->form_validation->error_array(),'data'=>'');
            echo json_encode($result);exit;
        }

        $result = $this->User_model->login($data);
        //echo "<pre>"; print_r($result); exit;
        $access_token = '';
        if(empty($result))
        {
            //$result = array('status'=>FALSE,'error'=>array('email_id'=>'Incorrect login details'),'data'=>'');
            $result = array('status'=>FALSE,'error'=>array('message'=>'Incorrect login details'),'data'=>'');
            echo json_encode($result);exit;
        }
        else
        {
           $result->profile_image = getImageUrl($result->profile_image,'profile');
           $rest_auth = strtolower($this->config->item('rest_auth'));
           if($rest_auth=='oauth'){
               $client_credentials = $this->User_model->createOauthCredentials($result->id_user,$result->first_name,$result->last_name);
               $client_id = $client_credentials["client_id"];
               $secret  =$client_credentials["client_secret"];
               $this->load->library('Oauth');
               $_REQUEST['grant_type'] = 'client_credentials';
               $_REQUEST['client_id'] = $client_id;
               $_REQUEST['client_secret'] = $secret;
               $_REQUEST['scope'] = '';
               $oauth = $this->oauth;
               $token =(object) $oauth->generateAccessToken();

               $access_token = $token->token_type.' '.$token->access_token;
           }
        }

        $result = array('status'=>TRUE, 'message' => 'success', 'data'=>$result, 'access_token' => $access_token);
        echo json_encode($result);exit;
    }

    /*public function logout()
    {
        $data = $this->input->get();
        $session_ids = $this->User_model->getSession($data['user_id']);
        $this->deleteAccessToken($session_ids);

    }*/


    public function forgetPassword()
    {
        $data = $this->input->get();
        if(empty($data)){
            $result = array('status'=>FALSE,'error'=>'Invalid Data','data'=>'');
            echo json_encode($result);exit;
        }
        //validating data
        $this->form_validator->add_rules('emailId', $this->emailRules);
        $validated = $this->form_validator->validate($data);
        if($validated != 1)
        {
            $result = array('status'=>FALSE,'error'=>$validated,'data'=>'');
            echo json_encode($result);exit;
        }

        $result = $this->User_model->check_email($data['emailId']);
        if(empty($result)){
            $result = array('status'=>FALSE, 'error' => array('emailId'=>'Invalid email'), 'data'=>'');
            echo json_encode($result);exit;
        }
        else
        {
            $new_password = bin2hex(openssl_random_pseudo_bytes(6));
            $this->User_model->updatePassword($new_password,$result->id_user);
            sendmail($data['emailId'],'forget password','<p>hello '.$result->email_id.',</p><p>your new password is '.$new_password.'</p>');

            $result = array('status'=>TRUE, 'message' => 'New password mailed successfully.', 'data'=>'');
            echo json_encode($result);exit;
        }
    }

    public function activeAccount($code)
    {
        $user = $this->User_model->activeAccount($code);
        if($user==1){
            echo "<h3>Account activated successfully.</h3>";
        }
        else{
            echo "<h3>Invalid request.</h3>";
        }
        redirect(WEB_BASE_URL.'html/');
    }

    public function renewalToken()
    {
        $data = $this->input->get();
        if(empty($data)){
            $result = array('status'=>FALSE,'error'=>'Invalid Data','data'=>'');
            echo json_encode($result);exit;
        }
        $access_token = $data['Authorization'];
        $user_id = $data['User'];
        $res = $this->User_model->getTokenDetails($access_token,$user_id);
        if(empty($res)){
            $result = array('status'=>FALSE,'error'=>'Invalid token','data'=>'');
            echo json_encode($result);exit;
        }
        if(((time() - $res[0]['expire_time']) > 0)){
            $new_token = file_get_contents(WEB_BASE_URL.'welcome/oauth?grant_type=client_credentials&client_id='.$res[0]['client_id'].'&client_secret='.$res[0]['secret'].'&scope=');
            $new_token = json_decode($new_token);
            $access_token = $new_token->token_type.' '.$new_token->access_token;
            $result = array('status'=>TRUE, 'message' => 'success', 'data'=>'', 'access_token' => $access_token);
        }
        else{
            $result = array('status'=>TRUE, 'message' => 'success', 'data'=>'', 'access_token' => $res[0]['access_token']);
        }
        echo json_encode($result);exit;
    }
}