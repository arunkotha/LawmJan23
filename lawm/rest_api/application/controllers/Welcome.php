<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
     
     
     public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        //$this->load->library('common/form_validator');
    }
    
    
	public function oauth()
	{
		$this->load->library('Oauth');
        $oauth = $this->oauth;
        $token = $oauth->generateAccessToken();
        echo json_encode($token);
	}
    
    public function userList()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if($data){ $_POST = $data; }
        $data = $this->input->post();
        if(empty($data)){ $data = $this->input->get(); }

        if(!isset($data['user_type_id'])){ $data['user_type_id'] = 3; }
        $result = $this->User_model->getUsersList($data);
        for($s=0;$s<count($result);$s++)
        {
            /*if($result[$s]['user_image']!='')
                $result[$s]['user_image'] = getImageUrl($result[$s]['user_image'],'profile');
            if($result[$s]['certification_attachment']!='')
                $result[$s]['certification_attachment'] = getImageUrl($result[$s]['certification_attachment'],'profile');*/
            if($data['user_type_id']==3){
                unset($result[$s]['rating']);
            }
        }
        $result = array('status'=>TRUE, 'message' => 'Success', 'data'=>$result);
        echo json_encode($result);exit;
    }
    
     public function lawyerList()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if($data){ $_POST = $data; }
        $data = $this->input->post();
        if(empty($data)){ $data = $this->input->get(); }

        if(!isset($data['user_type_id'])){ $data['user_type_id'] = 2; }
        $result = $this->User_model->getLawyersList($data);
        for($s=0;$s<count($result);$s++)
        {
            /*if($result[$s]['user_image']!='')
                $result[$s]['user_image'] = getImageUrl($result[$s]['user_image'],'profile');
            if($result[$s]['certification_attachment']!='')
                $result[$s]['certification_attachment'] = getImageUrl($result[$s]['certification_attachment'],'profile');*/
            if($data['user_type_id']==2){
                unset($result[$s]['rating']);
            }
        }
        $result = array('status'=>TRUE, 'message' => 'Success', 'data'=>$result);
        echo json_encode($result);exit;
    }
    
    public function login()
    {
        $this->load->library('oauth/oauth');
        $this->config->load('rest');

        $data = json_decode(file_get_contents("php://input"), true);
        if($data){ $_POST = $data; }
        $data = $this->input->post();
        if(empty($data)){ $data = $this->input->get(); }
        //echo "<pre>"; print_r($data); exit;
        if(empty($data)){
            $result = array('status'=>FALSE,'message'=>'Incorrect login details','data'=>'');
            echo json_encode($result); exit;
        }

        //validating inputs
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('user_type_id', 'User Type id', 'trim|required');
        $this->form_validation->set_data($data);
        if ($this->form_validation->run() == FALSE)
        {
            $err = array_values($this->form_validation->error_array());
            $result = array('status'=>FALSE,'message'=>$err[0],'data'=>'');
            echo json_encode($result);exit;
        }

        $result = $this->User_model->login($data);
        //echo "<pre>"; print_r($result); exit;
        $access_token = '';
        if(empty($result))
        {
            //$result = array('status'=>FALSE,'message'=>array('email_id'=>'Incorrect login details'),'data'=>'');
            $result = array('status'=>FALSE,'message'=>'Incorrect login details','data'=>'');
            echo json_encode($result);exit;
        }
        else
        {
            //$result->user_image = getImageUrl($result->user_image,'profile');
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


}
