<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

//class User extends REST_Controller
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        //$this->load->library('common/form_validator');
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

    
    // Test Service start
    
    public function profileImage()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if($data){ $_POST = $data; }
        $data = $this->input->post();
        if(empty($data)){ $data = $this->input->get(); }

        if(empty($data)){
            $result = array('status'=>FALSE,'message'=>'Invalid Data','data'=>'');
            echo json_encode($result);exit;
        }

        $path='uploads/'; $data['user_image'] = '';
        if(isset($_FILES) && !empty($_FILES['user_image']['name']))
        {
            $imageName = doUpload($_FILES['user_image']['tmp_name'],$_FILES['user_image']['name'],$path,'','image');
            if($imageName===0){
                $result = array('status' => FALSE, 'error' => 'upload only jpg,png format files only', 'data' => '');
                echo json_encode($result);exit;
            }
        }

        if(isset($_FILES) && !empty($_FILES['name']['certification_attachment']))
        {
            $imageName = doUpload($_FILES['tmp_name']['certification_attachment'],$_FILES['name']['certification_attachment'],$path,'','');
            $data['certification_attachment'] = $imageName;
        }

        $profile = array();

        if(isset($data['email'])){ $profile['email'] = $data['email']; }      
        if(isset($data['user_image'])){ $profile['user_image'] = $data['user_image']; }

        if($profile['user_image']==''){ unset($profile['user_image']); }

        $result = $this->User_model->updateUserImage($profile);

        $result = array('status'=>TRUE, 'message' => 'User Image updated successfully.', 'data'=>'');
        echo json_encode($result);exit;
    }
    
    // Test Service End
    
    
    public function registration()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if($data){ $_POST = $data; }
        $data = $this->input->post();
        if(empty($data)){ $data = $this->input->get(); }

        if(empty($data)){
            $result = array('status'=>FALSE,'message'=>'Invalid Data','data'=>'');
            echo json_encode($result);exit;
        }

        //validating inputs
        $this->form_validation->set_rules('user_type_id', 'User type', 'trim|required');
        $this->form_validation->set_rules('first_name', 'First name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        //$this->form_validation->set_rules('username', 'User name', 'trim|required');
        //$this->form_validation->set_rules('username', 'User name', 'trim|required|is_unique[user.username]');
        $this->form_validation->set_rules('username', 'User name', 'trim|required');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('country_id', 'Country', 'trim|required');
        $this->form_validation->set_rules('mobile_number', 'Mobile number', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required');
        if(isset($data['user_type_id']) && $data['user_type_id']==2){
            /*$this->form_validation->set_rules('father_name', 'Father name', 'trim|required');
            $this->form_validation->set_rules('speciality_id', 'Speciality', 'trim|required');*/
        }

        $this->form_validation->set_data($data);
        if ($this->form_validation->run() == FALSE)
        {
            $err = array_values($this->form_validation->error_array());
            $result = array('status'=>FALSE,'message'=>$err[0],'data'=>'');
            echo json_encode($result);exit;
        }

        $check_mail = $this->User_model->getUsersList(array('email' => $data['email'],'user_type_id' => $data['user_type_id']));
        if(!empty($check_mail)){
            $result = array('status'=>FALSE,'message'=>array('email' => 'email already exists'),'data'=>'');
            echo json_encode($result);exit;
        }

        if(!isset($data['father_name'])){ $data['father_name']=''; }
        if(!isset($data['speciality_id'])){ $data['speciality_id']=0; }
        if(!isset($data['experience'])){ $data['experience']=0; }

        $path='uploads/'; $data['user_image'] = '';
        if(isset($_FILES) && !empty($_FILES['user_image']['name']))
        {
            $imageName = doUpload($_FILES['user_image']['tmp_name'],$_FILES['user_image']['name'],$path,'','image');
            if($imageName===0){
                $result = array('status' => FALSE, 'error' => 'upload only jpg,png format files only', 'data' => '');
                echo json_encode($result);exit;
            }
            $data['user_image'] = $imageName;
        }

        $data['certification_attachment'] = 0;
        if(isset($_FILES) && !empty($_FILES['certification_attachment']['name']))
        {
            $imageName = doUpload($_FILES['certification_attachment']['tmp_name'],$_FILES['certification_attachment']['name'],$path,'','');
            $data['certification_attachment'] = $imageName;
        }



        $user_status = 0;
        if($data['user_type_id']==3){ //$user_status =1;
        }

        $insert = array(
            'user_type_id' => $data['user_type_id'],
            'first_name' => $data['first_name'],
            'father_name' => $data['father_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => md5($data['password']),
            'gender' => $data['gender'],
            'speciality_id' => $data['speciality_id'],
            'mobile_number' => $data['mobile_number'],
            'country_id' => $data['country_id'],
            'user_image' => $data['user_image'],
            'certification_attachment' => $data['certification_attachment'],
            'experience' => $data['experience'],
            'user_status' => $user_status
        );

        $result = $this->User_model->addUser($insert);

        if($data['user_type_id']==2){
            $html = '<p>Welcome to Lawm,</p><p>Thank-you for register with us. Admin will approve shortly.</p>';
        }
        else{
            $html = '<p>Welcome to Lawm,</p><p>Thank-you for register with us. click <a href="'.BASE_URL.'index.php/welcome/activeAccount/'.$this->User_model->encode($result).'">here</a> to active your account</p></p>';
        }

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        mail($data['email'],'Registration',$html,$headers);


        $result = array('status'=>TRUE, 'message' => 'User added successfully.', 'data'=>'');
        echo json_encode($result);exit;
    }

    public function updateProfile()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if($data){ $_POST = $data; }
        $data = $this->input->post();
        if(empty($data)){ $data = $this->input->get(); }

        if(empty($data)){
            $result = array('status'=>FALSE,'message'=>'Invalid Data','data'=>'');
            echo json_encode($result);exit;
        }

        $this->form_validation->set_rules('user_id', 'User id', 'trim|required');
        $this->form_validation->set_data($data);
        if ($this->form_validation->run() == FALSE)
        {
            $result = array('status'=>FALSE,'message'=>$this->form_validation->error_array(),'data'=>'');
            echo json_encode($result);exit;
        }

        $path='uploads/'; $data['user_image'] = '';
        if(isset($_FILES) && !empty($_FILES['user_image']['name']))
        {
            $imageName = doUpload($_FILES['user_image']['tmp_name'],$_FILES['user_image']['name'],$path,'','image');
            if($imageName===0){
                $result = array('status' => FALSE, 'error' => 'upload only jpg,png format files only', 'data' => '');
                echo json_encode($result);exit;
            }
        }



        if(isset($_FILES) && !empty($_FILES['name']['certification_attachment']))
        {
            $imageName = doUpload($_FILES['tmp_name']['certification_attachment'],$_FILES['name']['certification_attachment'],$path,'','');
            $data['certification_attachment'] = $imageName;
        }

        $profile = array();

        if(isset($data['user_id'])){ $profile['id_user'] = $data['user_id']; }
        if(isset($data['first_name'])){ $profile['first_name'] = $data['first_name']; }
        if(isset($data['father_name'])){ $profile['father_name'] = $data['father_name']; }
        if(isset($data['last_name'])){ $profile['last_name'] = $data['last_name']; }
        if(isset($data['gender'])){ $profile['gender'] = $data['gender']; }
        if(isset($data['speciality_id'])){ $profile['speciality_id'] = $data['speciality_id']; }
        if(isset($data['mobile_number'])){ $profile['mobile_number'] = $data['mobile_number']; }
        if(isset($data['country_id'])){ $profile['country_id'] = $data['country_id']; }
        if(isset($data['user_image'])){ $profile['user_image'] = $data['user_image']; }
        if(isset($data['certification_attachment'])){ $profile['certification_attachment'] = $data['certification_attachment']; }

        if($profile['user_image']==''){ unset($profile['user_image']); }
        if($profile['certification_attachment']==''){ unset($profile['certification_attachment']); }

        $result = $this->User_model->updateUser($profile);

        $result = array('status'=>TRUE, 'message' => 'User updated successfully.', 'data'=>'');
        echo json_encode($result);exit;
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

    public function check_email_post()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if($data){ $_POST = $data; }
        $data = $this->input->post();
        if(empty($data)){ $data = $this->input->get(); }

        if(empty($data)){
            $result = array('status'=>FALSE,'message'=>'Invalid Data','data'=>'');
            $this->response($result, REST_Controller::HTTP_OK);
        }
        //validating data
        $this->form_validator->add_rules('email_id', $this->emailRules);
        $validated = $this->form_validator->validate($data);
        if($validated != 1)
        {
            $result = array('status'=>FALSE,'message'=>$validated,'data'=>'');
            $this->response($result, REST_Controller::HTTP_OK);
        }

        $result = $this->User_model->check_email($data['email_id']);
        $value = 0;
        if(empty($result)){ $value=1; }
        $result = array('status'=>TRUE, 'message' => 'success', 'data'=>$value);
        $this->response($result, REST_Controller::HTTP_OK);
    }

    public function changePassword()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if($data){ $_POST = $data; }
        $data = $this->input->post();
        if(empty($data)){ $data = $this->input->get(); }

        if(empty($data)){
            $result = array('status'=>FALSE, 'error' => 'Invalid data', 'data'=>'');
            echo json_encode($result);exit;
        }

        $this->form_validation->set_rules('user_id', 'User id', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_data($data);
        if ($this->form_validation->run() == FALSE)
        {
            $result = array('status'=>FALSE,'message'=>$this->form_validation->error_array(),'data'=>'');
            echo json_encode($result);exit;
        }

        $result = $this->User_model->changePassword($data);
        $result = array('status'=>TRUE, 'message' => 'Success', 'data'=>'');
        echo json_encode($result);exit;
    }

    public function usersList_get($type)
    {
        if(empty($type)){
            $result = array('status'=>FALSE,'message'=>'Invalid Data','data'=>'');
            $this->response($result, REST_Controller::HTTP_OK);
        }
        $data['type'] = $type;
        //validating data
        $this->form_validator->add_rules('type', $this->req);
        $validated = $this->form_validator->validate($data);
        if($validated != 1)
        {
            $result = array('status'=>FALSE,'message'=>$validated,'data'=>'');
            $this->response($result, REST_Controller::HTTP_OK);
        }
        $result = $this->User_model->getUsersList($data);
        $result = array('status'=>TRUE, 'message' => 'success', 'data'=>$result);
        $this->response($result, REST_Controller::HTTP_OK);
    }

    public function country()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if($data){ $_POST = $data; }
        $data = $this->input->post();
        if(empty($data)){ $data = $this->input->get(); }
        $result = $this->User_model->getCountries($data);
        $result = array('status'=>TRUE, 'message' => 'Success', 'data'=>$result);
        echo json_encode($result);exit;
    }

    public function specialities()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if($data){ $_POST = $data; }
        $data = $this->input->post();
        if(empty($data)){ $data = $this->input->get(); }

        $result = $this->User_model->getSpecialities($data);
        $result = array('status'=>TRUE, 'message' => 'Success', 'data'=>$result);
        echo json_encode($result);exit;
    }

    public function appealType()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if($data){ $_POST = $data; }
        $data = $this->input->post();
        if(empty($data)){ $data = $this->input->get(); }

        $result = $this->User_model->getAppealType($data);
        $result = array('status'=>TRUE, 'message' => 'Success', 'data'=>$result);
        echo json_encode($result);exit;
    }

    public function consultationType()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if($data){ $_POST = $data; }
        $data = $this->input->post();
        if(empty($data)){ $data = $this->input->get(); }

        $result = $this->User_model->consultationType($data);
        $result = array('status'=>TRUE, 'message' => 'Success', 'data'=>$result);
        echo json_encode($result);exit;
    }

    public function consultation()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if($data){ $_POST = $data; }
        $data = $this->input->post();
        if(empty($data)){ $data = $this->input->get(); }

        if(empty($data)){
            $result = array('status'=>FALSE, 'error' => 'Invalid data', 'data'=>'');
            echo json_encode($result);exit;
        }

        if ((!isset($data['user_id']) || $data['user_id']==0 || $data['user_id']=='') && (!isset($data['lawyer_id']) || $data['lawyer_id']==0 || $data['lawyer_id']==''))
        {
            $result = array('status'=>FALSE,'message'=>array('user_id' => 'User id required'),'data'=>'');
            echo json_encode($result);exit;
        }

        if(isset($data['user_id']))
        {
            $result = $this->User_model->consultation(array('user_id' => $data['user_id']));
        }
        else if(isset($data['lawyer_id']))
        {
            $result = $this->User_model->consultation(array('lawyer_id' => $data['lawyer_id'],'pending-accepted' => 'pending-accepted'));
        }

        for($s=0;$s<count($result);$s++)
        {
            $result[$s]['attachment'] = $this->User_model->getAttachments(array('type' => 'consultation', 'reference_id' => $result[$s]['id_consultation']));
            $conversation = $this->User_model->getCoversationReplies(array('reference_type' => 'consultation','reference_id' => $result[$s]['id_consultation']));
            $result[$s]['replies_count'] = count($conversation);
        }

        $result = array('status'=>TRUE, 'message' => 'Success', 'data'=>$result);
        echo json_encode($result);exit;
    }

    public function otherConsultation()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if($data){ $_POST = $data; }
        $data = $this->input->post();
        if(empty($data)){ $data = $this->input->get(); }

        if(empty($data)){
            $result = array('status'=>FALSE, 'error' => 'Invalid data', 'data'=>'');
            echo json_encode($result);exit;
        }

        if (!isset($data['lawyer_id']) || $data['lawyer_id']==0 || $data['lawyer_id']=='')
        {
            $result = array('status'=>FALSE,'message'=>array('lawyer_id' => 'Layer id required'),'data'=>'');
            echo json_encode($result);exit;
        }

        $result = $this->User_model->consultation(array('lawyer_id_not' => $data['lawyer_id'],'status' => 'other'));
        $result1 = $this->User_model->consultation(array('lawyer_id' => $data['lawyer_id'],'status' => 'rejected'));
        $result = array_merge($result,$result1);

        for($s=0;$s<count($result);$s++)
        {
            $result[$s]['attachment'] = $this->User_model->getAttachments(array('type' => 'consultation', 'reference_id' => $result[$s]['id_consultation']));
            //$conversation = $this->User_model->getCoversationReplies(array('reference_type' => 'consultation','reference_id' => $result[$s]['id_consultation']));
            //$result[$s]['replies_count'] = count($conversation);
        }

        $result = array('status'=>TRUE, 'message' => 'Success', 'data'=>$result);
        echo json_encode($result);exit;
    }



    public function addConsultation()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if($data){ $_POST = $data; }
        $data = $this->input->post();
        if(empty($data)){ $data = $this->input->get(); }

        if(empty($data)){
            $result = array('status'=>FALSE, 'error' => 'Invalid data', 'data'=>'');
            echo json_encode($result);exit;
        }

        $this->form_validation->set_rules('user_id', 'User id', 'trim|required');
        $this->form_validation->set_rules('lawyer_id', 'Lawyer id', 'trim|required');
        $this->form_validation->set_rules('consultation_type', 'Consultation type', 'trim|required');
        //$this->form_validation->set_rules('experience', 'experience', 'trim|required');
        $this->form_validation->set_rules('complain', 'complain', 'trim|required');
        //$this->form_validation->set_rules('date', 'date', 'trim|required');
        $this->form_validation->set_rules('subject', 'subject', 'trim|required');
        $this->form_validation->set_rules('description', 'description', 'trim|required');
        $this->form_validation->set_data($data);
        if ($this->form_validation->run() == FALSE)
        {
            $result = array('status'=>FALSE,'message'=>$this->form_validation->error_array(),'data'=>'');
            echo json_encode($result);exit;
        }

        $consultation = array(
            'user_id' => $data['user_id'],
            'lawyer_id' => $data['lawyer_id'],
            'consultation_type' => $data['consultation_type'],
            /*'experience' => $data['experience'],*/
            'complain' => $data['complain'],
            /*'date' => date('Y-m-d',strtotime($data['date'])),*/
            'subject' => $data['subject'],
            'description' => $data['description'],
            'attachment' => ''
        );

        if(isset($data['id_consultation']) && $data['id_consultation']!='') {
            $consultation_id = $consultation['id_consultation'] = $data['id_consultation'];
            if($consultation['attachment']==''){ unset($consultation['attachment']); }
            $this->User_model->updateConsultation($consultation);
            $msg = 'Consultation updated';
        }
        else{
            $consultation_id = $this->User_model->addConsultation($consultation);
            $msg = 'Consultation added';
        }


        $attachments = array();
        if(isset($_FILES['attachment']) && !empty($_FILES['attachment']))
        {
            for($s=0;$s<count($_FILES['attachment']['name']);$s++)
            {
                $imageName = doUpload($_FILES['attachment']['tmp_name'][$s],$_FILES['attachment']['name'][$s],'uploads/','','');
                if($imageName===0){
                    $result = array('status' => FALSE, 'error' => 'upload only jpg,png format files only', 'data' => '');
                    echo json_encode($result);exit;
                }
                //$consultation['attachment'] = $imageName;
                $attachments[] = array(
                    'type' => 'consultation',
                    'reference_id' => $consultation_id,
                    'attachment' => $imageName
                );
            }
            $this->User_model->addAttachments($attachments);
        }

        $result = array('status'=>TRUE, 'message' => $msg, 'data'=>'');
        echo json_encode($result);exit;
    }

    
    
    
    //Test Service Start
    
    
    
    public function addAttachmentService()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if($data){ $_POST = $data; }
        $data = $this->input->post();
        $msg = 'Attachment updated';
        if(empty($data)){ $data = $this->input->get(); }

     
        $attachments = array();
        if(isset($_FILES['attachment']) && !empty($_FILES['attachment']))
        {
            
            /*for($s=0;$s<count($_FILES['attachment']['name']);$s++)
            {
                $attachmentName = doUpload($_FILES['attachment']['tmp_name'][$s],$_FILES['attachment']['name'][$s],'uploads/','','');
                if($attachmentName===0)
                {
                    $result = array('status' => FALSE, 'error' => 'upload only jpg,png format files only', 'data' => '');
                    echo json_encode($result);exit;
                }
                
                $attachments[] = array(
                    'type' => $data['type'],
                    'reference_id' => $data['reference_id'],
                    'attachment' => $_FILES['attachment']['name']
                );
            }*/
            
            $attachmentName = doUpload($_FILES['attachment']['tmp_name'],$_FILES['attachment']['name'],'uploads/','','');
                if($attachmentName===0)
                {
                    $result = array('status' => FALSE, 'error' => 'upload only jpg,png format files only', 'data' => '');
                    echo json_encode($result);exit;
                }
                
                $attachments[] = array(
                    'type' => $data['type'],
                    'reference_id' => $data['reference_id'],
                    'attachment' => $attachmentName
                );
            $this->User_model->addAttachments($attachments);
        }

        $result = array('status'=>TRUE, 'message' => $msg, 'data'=>'');
        echo json_encode($result);exit;
    }
    
    
    //Test Service End  




    
    public function contractWriting()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if($data){ $_POST = $data; }
        $data = $this->input->post();
        if(empty($data)){ $data = $this->input->get(); }

        if(empty($data)){
            $result = array('status'=>FALSE, 'error' => 'Invalid data', 'data'=>'');
            echo json_encode($result);exit;
        }

        if ((!isset($data['user_id']) || $data['user_id']==0 || $data['user_id']=='') && (!isset($data['lawyer_id']) || $data['lawyer_id']==0 || $data['lawyer_id']==''))
        {
            $result = array('status'=>FALSE,'message'=>array('user_id' => 'User id required'),'data'=>'');
            echo json_encode($result);exit;
        }

        if(isset($data['user_id']))
        {
            $result = $this->User_model->getContractWriting(array('user_id' => $data['user_id']));
        }
        else if(isset($data['lawyer_id']))
        {
            $result = $this->User_model->getContractWriting(array('lawyer_id' => $data['lawyer_id'],'pending-accepted' => 'pending-accepted'));
        }

        for($s=0;$s<count($result);$s++)
        {
            $result[$s]['attachment'] = $this->User_model->getAttachments(array('type' => 'contract-writing', 'reference_id' => $result[$s]['id_contract_writing']));
            $conversation = $this->User_model->getCoversationReplies(array('reference_type' => 'contract-writing','reference_id' => $result[$s]['id_contract_writing']));
            $result[$s]['replies_count'] = count($conversation);
        }

        $result = array('status'=>TRUE, 'message' => 'Success', 'data'=>$result);
        echo json_encode($result);exit;
    }

    public function myTransactions()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if($data){ $_POST = $data; }
        $data = $this->input->post();
        if(empty($data)){ $data = $this->input->get(); }

        if(empty($data)){
            $result = array('status'=>FALSE, 'error' => 'Invalid data', 'data'=>'');
            echo json_encode($result);exit;
        }

        if ((!isset($data['user_id']) || $data['user_id']==0 || $data['user_id']==''))
        {
            $result = array('status'=>FALSE,'message'=>array('user_id' => 'User id required'),'data'=>'');
            echo json_encode($result);exit;
        }

        $result = $this->User_model->getMyTransactions(array('user_id' => $data['user_id']));

        $result = array('status'=>TRUE, 'message' => 'Success', 'data'=>$result);
        echo json_encode($result);exit;
    }


    function servicePaymentStatus()
    {

        $data = json_decode(file_get_contents("php://input"), true);
        if($data){ $_POST = $data; }
        $data = $this->input->post();
        if(empty($data)){ $data = $this->input->get(); }

        if(empty($data)){
            $result = array('status'=>FALSE, 'error' => 'Invalid data', 'data'=>'');
            echo json_encode($result);exit;
        }
        $this->form_validation->set_rules('user_id', 'User id', 'trim|required');
        $this->form_validation->set_rules('reference_id', 'Reference id', 'trim|required');
        $this->form_validation->set_rules('reference_type', 'Reference type', 'trim|required');
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required');
        $this->form_validation->set_rules('response_code', 'Response code', 'trim|required');
        $this->form_validation->set_rules('response_message', 'Response message', 'trim|required');
        $this->form_validation->set_rules('payment_status', 'Payment Status', 'trim|required');

        $this->form_validation->set_data($data);
        if ($this->form_validation->run() == FALSE)
        {
            $result = array('status'=>FALSE,'message'=>$this->form_validation->error_array(),'data'=>'');
            echo json_encode($result);exit;
        }

        $transactionContent = array(
            'reference_type' => $data['reference_type'],
            'reference_id' => $data['reference_id'],
            'amount' => $data['amount'],
            'response_code' => $data['response_code'],
            'response_message' => $data['response_message'],
            'user_id' => $data['user_id']
        );

        $this->User_model->addServiceTransaction($transactionContent);
        if($data['reference_type']=='consultation')
            $this->User_model->updateConsultation(['id_consultation' => $data['reference_id'], 'payment_status' => $data['payment_status']]);
        else if($data['reference_type']=='contract-writing')
            $this->User_model->updateContractWriting(['id_contract_writing' => $data['reference_id'], 'payment_status' => $data['payment_status']]);
        else if($data['reference_type']=='company')
            $this->User_model->updateEstablishCompany(['id_company' => $data['reference_id'], 'payment_status' => $data['payment_status']]);
        else if($data['reference_type']=='appeal')
            $this->User_model->updateAppeal(['id_appeal' => $data['reference_id'], 'payment_status' => $data['payment_status']]);

        $result = array('status'=>TRUE, 'message' => 'Transaction added successfully', 'data'=>'');
        echo json_encode($result);exit;
    }



    function addContractWriting()
    {

        $data = json_decode(file_get_contents("php://input"), true);
        if($data){ $_POST = $data; }
        $data = $this->input->post();
        if(empty($data)){ $data = $this->input->get(); }

        if(empty($data)){
            $result = array('status'=>FALSE, 'error' => 'Invalid data', 'data'=>'');
            echo json_encode($result);exit;
        }

        $this->form_validation->set_rules('user_id', 'User id', 'trim|required');
        $this->form_validation->set_rules('lawyer_id', 'Lawyer id', 'trim|required');
        $this->form_validation->set_rules('experience', 'experience', 'trim|required');
        $this->form_validation->set_rules('subject', 'subject', 'trim|required');
        $this->form_validation->set_rules('description', 'description', 'trim|required');
        $this->form_validation->set_data($data);
        if ($this->form_validation->run() == FALSE)
        {
            $result = array('status'=>FALSE,'message'=>$this->form_validation->error_array(),'data'=>'');
            echo json_encode($result);exit;
        }

        $content = array(
            'user_id' => $data['user_id'],
            'lawyer_id' => $data['lawyer_id'],
            'experience' => $data['experience'],
            'subject' => $data['subject'],
            'description' => $data['description'],
            'attachment' => ''
        );

        /*if(isset($_FILES['attachment']['name']) && $_FILES['attachment']['name']!=''){

            $imageName = doUpload($_FILES['attachment']['tmp_name'],$_FILES['attachment']['name'],'uploads/','','');
            if($imageName===0){
                $result = array('status' => FALSE, 'error' => 'upload only jpg,png format files only', 'data' => '');
                echo json_encode($result);exit;
            }
            $content['attachment'] = $imageName;
        }*/


        if(isset($data['id_contract_writing']) && $data['id_contract_writing']!='') {
            $contract_writing_id = $content['id_contract_writing'] = $data['id_contract_writing'];
            if($content['attachment']==''){ unset($content['attachment']); }
            $this->User_model->updateContractWriting($content);
            $msg = 'Contract writing updated';
        }
        else{
            $contract_writing_id = $this->User_model->addContractWriting($content);
            $msg = 'Contract writing added';
        }

        $attachments = array();
        if(isset($_FILES['attachment']) && !empty($_FILES['attachment']))
        {
            for($s=0;$s<count($_FILES['attachment']['name']);$s++)
            {
                $imageName = doUpload($_FILES['attachment']['tmp_name'][$s],$_FILES['attachment']['name'][$s],'uploads/','','');
                if($imageName===0){
                    $result = array('status' => FALSE, 'error' => 'upload only jpg,png format files only', 'data' => '');
                    echo json_encode($result);exit;
                }
                //$consultation['attachment'] = $imageName;
                $attachments[] = array(
                    'type' => 'contract-writing',
                    'reference_id' => $contract_writing_id,
                    'attachment' => $imageName
                );
            }
            $this->User_model->addAttachments($attachments);
        }

        $result = array('status'=>TRUE, 'message' => $msg, 'data'=>'');
        echo json_encode($result);exit;


    }

    public function otherContractWriting()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if($data){ $_POST = $data; }
        $data = $this->input->post();
        if(empty($data)){ $data = $this->input->get(); }

        if(empty($data)){
            $result = array('status'=>FALSE, 'error' => 'Invalid data', 'data'=>'');
            echo json_encode($result);exit;
        }

        if (!isset($data['lawyer_id']) || $data['lawyer_id']==0 || $data['lawyer_id']=='')
        {
            $result = array('status'=>FALSE,'message'=>array('lawyer_id' => 'Layer id required'),'data'=>'');
            echo json_encode($result);exit;
        }

        $result = $this->User_model->getContractWriting(array('lawyer_id_not' => $data['lawyer_id'],'status' => 'other'));
        $result1 = $this->User_model->getContractWriting(array('lawyer_id' => $data['lawyer_id'],'status' => 'rejected'));
        $result = array_merge($result,$result1);

        for($s=0;$s<count($result);$s++)
        {
            $result[$s]['attachment'] = $this->User_model->getAttachments(array('type' => 'contract-writing', 'reference_id' => $result[$s]['id_contract_writing']));
            //$conversation = $this->User_model->getCoversationReplies(array('reference_type' => 'consultation','reference_id' => $result[$s]['id_consultation']));
            //$result[$s]['replies_count'] = count($conversation);
        }

        $result = array('status'=>TRUE, 'message' => 'Success', 'data'=>$result);
        echo json_encode($result);exit;
    }

    public function establishCompany()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if($data){ $_POST = $data; }
        $data = $this->input->post();
        if(empty($data)){ $data = $this->input->get(); }

        if(empty($data)){
            $result = array('status'=>FALSE, 'error' => 'Invalid data', 'data'=>'');
            echo json_encode($result);exit;
        }

        if ((!isset($data['user_id']) || $data['user_id']==0 || $data['user_id']=='') && (!isset($data['lawyer_id']) || $data['lawyer_id']==0 || $data['lawyer_id']==''))
        {
            $result = array('status'=>FALSE,'message'=>array('user_id' => 'User id required'),'data'=>'');
            echo json_encode($result);exit;
        }

        if(isset($data['user_id']))
        {
            $result = $this->User_model->getEstablishCompany(array('user_id' => $data['user_id']));
        }
        else if(isset($data['lawyer_id']))
        {
            $result = $this->User_model->getEstablishCompany(array('lawyer_id' => $data['lawyer_id'],'pending-accepted' => 'pending-accepted'));
        }

        $result_array = array();
        for($s=0;$s<count($result);$s++)
        {
            /*$result[$s]['attachment'] = $this->User_model->getAttachments(array('type' => 'company', 'reference_id' => $result[$s]['id_company']));
            $conversation = $this->User_model->getCoversationReplies(array('reference_type' => 'company','reference_id' => $result[$s]['id_company']));
            $result[$s]['replies_count'] = count($conversation);*/
            $result_array[$result[$s]['id_company']]['id_company'] = $result[$s]['id_company'];
            $result_array[$result[$s]['id_company']]['user_id'] = $result[$s]['user_id'];
            $result_array[$result[$s]['id_company']]['lawyer_id'] = $result[$s]['lawyer_id'];
            $result_array[$result[$s]['id_company']]['experience'] = $result[$s]['experience'];
            $result_array[$result[$s]['id_company']]['payment_status'] = $result[$s]['payment_status'];
            $result_array[$result[$s]['id_company']]['lawyer_amount'] = $result[$s]['lawyer_amount'];
            $result_array[$result[$s]['id_company']]['subject'] = $result[$s]['subject'];
            $result_array[$result[$s]['id_company']]['attachment'] = $this->User_model->getAttachments(array('type' => 'company', 'reference_id' => $result[$s]['id_company']));
            $result_array[$result[$s]['id_company']]['description'] = $result[$s]['description'];
            $result_array[$result[$s]['id_company']]['created_date_time'] = $result[$s]['created_date_time'];
            $result_array[$result[$s]['id_company']]['date'] = $result[$s]['date'];
            $result_array[$result[$s]['id_company']]['status'] = $result[$s]['status'];
            $result_array[$result[$s]['id_company']]['user_name'] = $result[$s]['user_name'];
            $result_array[$result[$s]['id_company']]['user_email'] = $result[$s]['user_email'];
            $result_array[$result[$s]['id_company']]['lawyer_name'] = $result[$s]['lawyer_name'];
            $result_array[$result[$s]['id_company']]['lawyer_email'] = $result[$s]['lawyer_email'];
            $result_array[$result[$s]['id_company']]['replies_count'] = count($this->User_model->getCoversationReplies(array('reference_type' => 'company','reference_id' => $result[$s]['id_company'])));
            if(isset($result[$s]['id_company_partner']) && $result[$s]['id_company_partner']!='') {
                $result_array[$result[$s]['id_company']]['partners'][] = array(
                    'id_company_partner' => $result[$s]['id_company_partner'],
                    'partner_name' => $result[$s]['partner_name'],
                    'partner_id' => $result[$s]['partner_id']
                );
            }
            else{
                $result_array[$result[$s]['id_company']]['partners'][] = array();
            }
        }

        $result_array = array_values($result_array);

        $result = array('status'=>TRUE, 'message' => 'Success', 'data'=>$result_array);
        echo json_encode($result);exit;
    }

    function addEstablishCompany()
    {

        $data = json_decode(file_get_contents("php://input"), true);
        if($data){ $_POST = $data; }
        $data = $this->input->post();
        if(empty($data)){ $data = $this->input->get(); }
        //echo "<pre>"; print_r(json_decode('{"user_id":"26","lawyer_id":"9","experience":"2.5","subject":"subject","description":"details"}'));exit;
        if(empty($data)){
            $result = array('status'=>FALSE, 'error' => 'Invalid data', 'data'=>'');
            echo json_encode($result);exit;

        }
        else if(!isset($data['company']) || !isset($data['partner'])){
            $result = array('status'=>FALSE, 'error' => 'Invalid data', 'data'=>'');
            echo json_encode($result);exit;
        }
        //echo "<pre>";print_r(json_decode($data['company'])); exit;
        $partners = json_decode($data['partner']);
        $partners = (array)$partners;
        $data = json_decode($data['company']);
        $data = (array)$data;
        //echo $data;
        //$data = json_decode($data['company']);

        //echo "<pre>";print_r($partners); exit;
        $this->form_validation->set_rules('user_id', 'User id', 'trim|required');
        $this->form_validation->set_rules('lawyer_id', 'Lawyer id', 'trim|required');
        $this->form_validation->set_rules('experience', 'experience', 'trim|required');
        $this->form_validation->set_rules('subject', 'subject', 'trim|required');
        $this->form_validation->set_rules('description', 'description', 'trim|required');
        $this->form_validation->set_data($data);
        if ($this->form_validation->run() == FALSE)
        {
            $result = array('status'=>FALSE,'message'=>$this->form_validation->error_array(),'data'=>'');
            echo json_encode($result);exit;
        }


        $company = array(
            'user_id' => $data['user_id'],
            'lawyer_id' => $data['lawyer_id'],
            'experience' => $data['experience'],
            'subject' => $data['subject'],
            'description' => $data['description'],
            'attachment' => ''
        );

        /*if(isset($_FILES['attachment']['name']) && $_FILES['attachment']['name']!=''){

            $imageName = doUpload($_FILES['attachment']['tmp_name'],$_FILES['attachment']['name'],'uploads/','','');
            if($imageName===0){
                $result = array('status' => FALSE, 'error' => 'upload only jpg,png format files only', 'data' => '');
                echo json_encode($result);exit;
            }
            $company['attachment'] = $imageName;
        }*/

        if(isset($data['id_company']) && $data['id_company']!='') {
            $company_id = $company['id_company'] = $data['id_company'];
            if($company['attachment']==''){ unset($company['attachment']); }
            $this->User_model->updateEstablishCompany($company);

            $add = $update = $delete = array();
            /*$prev_partners = $this->User_model->getCompanyPartners(array('company_id' => $data['id_company']));
            $prev_partners_id = array_map(function($obj){ return $obj['partner_id']; },$prev_partners);*/

            $this->User_model->deletePartners($company['id_company']);

            for($st=0;$st<count($partners);$st++)
            {
                $this->User_model->addCompanyPartner(array(
                    'company_id' => $company['id_company'],
                    'partner_name' => $partners[$st]->partner_name,
                    'partner_id' => $partners[$st]->partner_id
                ));
            }
            $msg = 'Updated successfully';
        }
        else {
            $company_id = $this->User_model->addEstablishCompany($company);
            for($st=0;$st<count($partners);$st++)
            {
                $partners[$st] = (array)$partners[$st];
                $this->User_model->addCompanyPartner(array(
                    'company_id' => $company_id,
                    'partner_name' => $partners[$st]['partner_name'],
                    'partner_id' => $partners[$st]['partner_id']
                ));
            }
            $msg = 'added successfully';
        }

        $attachments = array();
        if(isset($_FILES['attachment']) && !empty($_FILES['attachment']))
        {
            for($s=0;$s<count($_FILES['attachment']['name']);$s++)
            {
                $imageName = doUpload($_FILES['attachment']['tmp_name'][$s],$_FILES['attachment']['name'][$s],'uploads/','','');
                if($imageName===0){
                    $result = array('status' => FALSE, 'error' => 'upload only jpg,png format files only', 'data' => '');
                    echo json_encode($result);exit;
                }
                //$consultation['attachment'] = $imageName;
                $attachments[] = array(
                    'type' => 'company',
                    'reference_id' => $company_id,
                    'attachment' => $imageName
                );
            }
            $this->User_model->addAttachments($attachments);
        }

        $result = array('status'=>TRUE, 'message' => $msg, 'data'=>'');
        echo json_encode($result);exit;
    }

    public function otherEstablishCompany()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if($data){ $_POST = $data; }
        $data = $this->input->post();
        if(empty($data)){ $data = $this->input->get(); }

        if(empty($data)){
            $result = array('status'=>FALSE, 'error' => 'Invalid data', 'data'=>'');
            echo json_encode($result);exit;
        }

        if (!isset($data['lawyer_id']) || $data['lawyer_id']==0 || $data['lawyer_id']=='')
        {
            $result = array('status'=>FALSE,'message'=>array('lawyer_id' => 'Layer id required'),'data'=>'');
            echo json_encode($result);exit;
        }

        $result = $this->User_model->getEstablishCompany(array('lawyer_id_not' => $data['lawyer_id'],'status' => 'other'));
        $result1 = $this->User_model->getEstablishCompany(array('lawyer_id' => $data['lawyer_id'],'status' => 'rejected'));
        $result = array_merge($result,$result1);

        for($s=0;$s<count($result);$s++)
        {
            $result[$s]['attachment'] = $this->User_model->getAttachments(array('type' => 'company', 'reference_id' => $result[$s]['id_company']));
            //$conversation = $this->User_model->getCoversationReplies(array('reference_type' => 'consultation','reference_id' => $result[$s]['id_consultation']));
            //$result[$s]['replies_count'] = count($conversation);
        }

        $result = array('status'=>TRUE, 'message' => 'Success', 'data'=>$result);
        echo json_encode($result);exit;
    }

    public function appeal()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if($data){ $_POST = $data; }
        $data = $this->input->post();
        if(empty($data)){ $data = $this->input->get(); }

        if(empty($data)){
            $result = array('status'=>FALSE, 'error' => 'Invalid data', 'data'=>'');
            echo json_encode($result);exit;
        }

        if ((!isset($data['user_id']) || $data['user_id']==0 || $data['user_id']=='') && (!isset($data['lawyer_id']) || $data['lawyer_id']==0 || $data['lawyer_id']==''))
        {
            $result = array('status'=>FALSE,'message'=>array('user_id' => 'User id required'),'data'=>'');
            echo json_encode($result);exit;
        }

        if(isset($data['user_id']))
        {
            $result = $this->User_model->getAppeal(array('user_id' => $data['user_id']));
        }
        else if(isset($data['lawyer_id']))
        {
            $result = $this->User_model->getAppeal(array('lawyer_id' => $data['lawyer_id'],'pending-accepted' => 'pending-accepted'));
        }

        for($s=0;$s<count($result);$s++)
        {
            $result[$s]['attachment'] = $this->User_model->getAttachments(array('type' => 'appeal', 'reference_id' => $result[$s]['id_appeal']));
            $conversation = $this->User_model->getCoversationReplies(array('reference_type' => 'appeal','reference_id' => $result[$s]['id_appeal']));
            $result[$s]['replies_count'] = count($conversation);
        }

        $result = array('status'=>TRUE, 'message' => 'Success', 'data'=>$result);
        echo json_encode($result);exit;
    }

    function addAppeal()
    {

        $data = json_decode(file_get_contents("php://input"), true);
        if($data){ $_POST = $data; }
        $data = $this->input->post();
        if(empty($data)){ $data = $this->input->get(); }

        if(empty($data)){
            $result = array('status'=>FALSE, 'error' => 'Invalid data', 'data'=>'');
            echo json_encode($result);exit;

        }

        $this->form_validation->set_rules('user_id', 'User id', 'trim|required');
        $this->form_validation->set_rules('lawyer_id', 'Lawyer id', 'trim|required');
        $this->form_validation->set_rules('appeal_type_id', 'Appeal type', 'trim|required');
        $this->form_validation->set_rules('experience', 'experience', 'trim|required');
        $this->form_validation->set_rules('subject', 'subject', 'trim|required');
        $this->form_validation->set_rules('description', 'description', 'trim|required');
        $this->form_validation->set_data($data);
        if ($this->form_validation->run() == FALSE)
        {
            $result = array('status'=>FALSE,'message'=>$this->form_validation->error_array(),'data'=>'');
            echo json_encode($result);exit;
        }

        $appeal_data = array(
            'user_id' => $data['user_id'],
            'lawyer_id' => $data['lawyer_id'],
            'appeal_type_id' => $data['appeal_type_id'],
            'experience' => $data['experience'],
            'subject' => $data['subject'],
            'description' => $data['description'],
            'attachment' => ''
        );

        /*if(isset($_FILES['attachment']['name']) && $_FILES['attachment']['name']!=''){
            $imageName = doUpload($_FILES['attachment']['tmp_name'],$_FILES['attachment']['name'],'uploads/','','');
            if($imageName===0){
                $result = array('status' => FALSE, 'error' => 'upload only jpg,png format files only', 'data' => '');
                echo json_encode($result);exit;
            }
            $appeal_data['attachment'] = $imageName;
        }*/

        if(isset($data['id_appeal']) && $data['id_appeal']!='') {
            $appeal_id = $appeal_data['id_appeal'] = $data['id_appeal'];
            if($appeal_data['attachment']==''){ unset($appeal_data['attachment']); }
            $this->User_model->updateAppeal($appeal_data);
            $msg = 'Updated successfully.';
        }
        else{
            $appeal_id = $this->User_model->addAppeal($appeal_data);
            $msg = 'Added successfully.';
        }

        $attachments = array();
        if(isset($_FILES['attachment']) && !empty($_FILES['attachment']))
        {
            for($s=0;$s<count($_FILES['attachment']['name']);$s++)
            {
                $imageName = doUpload($_FILES['attachment']['tmp_name'][$s],$_FILES['attachment']['name'][$s],'uploads/','','');
                if($imageName===0){
                    $result = array('status' => FALSE, 'error' => 'upload only jpg,png format files only', 'data' => '');
                    echo json_encode($result);exit;
                }
                //$consultation['attachment'] = $imageName;
                $attachments[] = array(
                    'type' => 'appeal',
                    'reference_id' => $appeal_id,
                    'attachment' => $imageName
                );
            }
            $this->User_model->addAttachments($attachments);
        }

        $result = array('status'=>TRUE, 'message' => $msg, 'data'=>'');
        echo json_encode($result);exit;
    }

    public function otherAppeal()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if($data){ $_POST = $data; }
        $data = $this->input->post();
        if(empty($data)){ $data = $this->input->get(); }

        if(empty($data)){
            $result = array('status'=>FALSE, 'error' => 'Invalid data', 'data'=>'');
            echo json_encode($result);exit;
        }

        if (!isset($data['lawyer_id']) || $data['lawyer_id']==0 || $data['lawyer_id']=='')
        {
            $result = array('status'=>FALSE,'message'=>array('lawyer_id' => 'Layer id required'),'data'=>'');
            echo json_encode($result);exit;
        }

        $result = $this->User_model->getAppeal(array('lawyer_id_not' => $data['lawyer_id'],'status' => 'other'));
        $result1 = $this->User_model->getAppeal(array('lawyer_id' => $data['lawyer_id'],'status' => 'rejected'));
        $result = array_merge($result,$result1);

        for($s=0;$s<count($result);$s++)
        {
            $result[$s]['attachment'] = $this->User_model->getAttachments(array('type' => 'appeal', 'reference_id' => $result[$s]['id_appeal']));
            //$conversation = $this->User_model->getCoversationReplies(array('reference_type' => 'consultation','reference_id' => $result[$s]['id_consultation']));
            //$result[$s]['replies_count'] = count($conversation);
        }

        $result = array('status'=>TRUE, 'message' => 'Success', 'data'=>$result);
        echo json_encode($result);exit;
    }

    function comments()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if($data){ $_POST = $data; }
        $data = $this->input->post();
        if(empty($data)){ $data = $this->input->get(); }

        if(empty($data)){
            $result = array('status'=>FALSE, 'error' => 'Invalid data', 'data'=>'');
            echo json_encode($result);exit;

        }

        $this->form_validation->set_rules('reference_type', 'Reference type', 'trim|required');
        $this->form_validation->set_rules('reference_id', 'Reference id', 'trim|required');
        $this->form_validation->set_data($data);
        if ($this->form_validation->run() == FALSE)
        {
            $result = array('status'=>FALSE,'message'=>$this->form_validation->error_array(),'data'=>'');
            echo json_encode($result);exit;
        }

        $result = $this->User_model->getConversation($data);
        for($s=0;$s<count($result);$s++)
        {
            if($result[$s]['from_image']==''){ $result[$s]['from_image'] = 'default-img.png'; }
            if($result[$s]['to_image']==''){ $result[$s]['to_image'] = 'default-img.png'; }

            $result[$s]['from_image'] = getImageUrl($result[$s]['from_image'],'profile');
            $result[$s]['to_image'] = getImageUrl($result[$s]['to_image'],'profile');
            $result[$s]['attachment'] = $this->User_model->getAttachments(array('type' => 'reply','reference_id' => $result[$s]['id_conversation']));
        }
        $result = array('status'=>TRUE, 'message' => 'Success', 'data'=>$result);
        echo json_encode($result);exit;
    }

    function addComment()
    {

        $data = json_decode(file_get_contents("php://input"), true);
        if($data){ $_POST = $data; }
        $data = $this->input->post();
        if(empty($data)){ $data = $this->input->get(); }

        if(empty($data)){
            $result = array('status'=>FALSE, 'error' => 'Invalid data', 'data'=>'');
            echo json_encode($result);exit;

        }

        $this->form_validation->set_rules('reference_type', 'Reference type', 'trim|required');
        $this->form_validation->set_rules('reference_id', 'Reference id', 'trim|required');
        $this->form_validation->set_rules('from_id', 'From ', 'trim|required');
        $this->form_validation->set_rules('to_id', 'To', 'trim|required');
        $this->form_validation->set_rules('comment', 'comment', 'trim|required');
        $this->form_validation->set_data($data);
        if ($this->form_validation->run() == FALSE)
        {
            $result = array('status'=>FALSE,'message'=>$this->form_validation->error_array(),'data'=>'');
            echo json_encode($result);exit;
        }


        $cmt = array(
            'reference_type' => $data['reference_type'],
            'reference_id' => $data['reference_id'],
            'from_id' => $data['from_id'],
            'to_id' => $data['to_id'],
            'comment' => $data['comment'],
            'attachment' => ''
        );

        /*if(isset($_FILES['attachment']['name']) && $_FILES['attachment']['name']!=''){

            $imageName = doUpload($_FILES['attachment']['tmp_name'],$_FILES['attachment']['name'],'uploads/','','');
            if($imageName===0){
                $result = array('status' => FALSE, 'error' => 'Error in upload', 'data' => '');
                echo json_encode($result);exit;
            }
            $cmt['attachment'] = $imageName;
        }*/

        $conversation_id = $this->User_model->addConversatation($cmt);
        $attachments = array();

        if(isset($_FILES['attachment']) && !empty($_FILES['attachment']))
        {
            for($s=0;$s<count($_FILES['attachment']['name']);$s++)
            {
                if($_FILES['attachment']['name']!='')
                {
                    $imageName = doUpload($_FILES['attachment']['tmp_name'][$s],$_FILES['attachment']['name'][$s],'uploads/','','');
                    if($imageName===0){
                        $result = array('status' => FALSE, 'error' => 'upload only jpg,png format files only', 'data' => '');
                        echo json_encode($result);exit;
                    }
                    //$consultation['attachment'] = $imageName;
                    $attachments[] = array(
                        'type' => 'reply',
                        'reference_id' => $conversation_id,
                        'attachment' => $imageName
                    );
                }
            }
            $this->User_model->addAttachments($attachments);
        }

        $result = array('status'=>TRUE, 'message' => 'Message sent successfully.', 'data'=>'');
        echo json_encode($result);exit;

    }

    function closeCase()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if($data){ $_POST = $data; }
        $data = $this->input->post();
        if(empty($data)){ $data = $this->input->get(); }

        if(empty($data)){
            $result = array('status'=>FALSE, 'error' => 'Invalid data', 'data'=>'');
            echo json_encode($result);exit;

        }

        $this->form_validation->set_rules('reference_type', 'Reference type', 'trim|required');
        $this->form_validation->set_rules('reference_id', 'Reference id', 'trim|required');
        $this->form_validation->set_rules('rating', 'Rating ', 'trim|required');
        $this->form_validation->set_rules('type', 'type ', 'trim|required');
        $this->form_validation->set_data($data);
        if ($this->form_validation->run() == FALSE)
        {
            $result = array('status'=>FALSE,'message'=>$this->form_validation->error_array(),'data'=>'');
            echo json_encode($result);exit;
        }

        if($data['reference_type']=='consultation')
        {
            $con = $this->User_model->consultation(array('id_consultation' => $data['reference_id']));
            $this->User_model->updateConsultation(array('id_consultation' => $data['reference_id'],'status' => 'closed'));
            $this->User_model->addRating(array('lawyer_id' => $con[0]['lawyer_id'],'user_id' => $con[0]['user_id'],'rating' => $data['rating'],'reference_type' => $data['reference_type'],'reference_id' => $data['reference_id'],'type' => $data['type']));
        }
        else if($data['reference_type']=='company')
        {
            $con = $this->User_model->getEstablishCompany(array('id_company' => $data['reference_id']));
            $this->User_model->updateEstablishCompany(array('id_company' => $data['reference_id'],'status' => 'closed'));
            $this->User_model->addRating(array('lawyer_id' => $con[0]['lawyer_id'],'user_id' => $con[0]['user_id'],'rating' => $data['rating'],'reference_type' => $data['reference_type'],'reference_id' => $data['reference_id'],'type' => $data['type']));
        }
        else if($data['reference_type']=='contract')
        {
            $con = $this->User_model->getContractWriting(array('id_contract_writing' => $data['reference_id']));
            $this->User_model->updateContractWriting(array('id_contract_writing' => $data['reference_id'],'status' => 'closed'));
            $this->User_model->addRating(array('lawyer_id' => $con[0]['lawyer_id'],'user_id' => $con[0]['user_id'],'rating' => $data['rating'],'reference_type' => $data['reference_type'],'reference_id' => $data['reference_id'],'type' => $data['type']));
        }
        else if($data['reference_type']=='appeal')
        {
            $con = $this->User_model->getAppeal(array('id_appeal' => $data['reference_id']));
            $this->User_model->updateAppeal(array('id_appeal' => $data['reference_id'],'status' => 'closed'));
            $this->User_model->addRating(array('lawyer_id' => $con[0]['lawyer_id'],'user_id' => $con[0]['user_id'],'rating' => $data['rating'],'reference_type' => $data['reference_type'],'reference_id' => $data['reference_id'],'type' => $data['type']));
        }

        $result = array('status'=>TRUE, 'message' => 'updated successfully.', 'data'=>'');
        echo json_encode($result);exit;

    }

    function acceptRequest()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if($data){ $_POST = $data; }
        $data = $this->input->post();
        if(empty($data)){ $data = $this->input->get(); }

        if(empty($data)){
            $result = array('status'=>FALSE, 'error' => 'Invalid data', 'data'=>'');
            echo json_encode($result);exit;
        }

        $this->form_validation->set_rules('reference_type', 'Reference type', 'trim|required');
        $this->form_validation->set_rules('reference_id', 'Reference id', 'trim|required');
        $this->form_validation->set_data($data);
        if ($this->form_validation->run() == FALSE)
        {
            $result = array('status'=>FALSE,'message'=>$this->form_validation->error_array(),'data'=>'');
            echo json_encode($result);exit;
        }

        if($data['reference_type']=='consultation')
        {
            $this->User_model->updateConsultation(array('id_consultation' => $data['reference_id'],'status' => 'accepted'));
            $con = $this->User_model->consultation(array('id_consultation' => $data['reference_id']));
        }
        else if($data['reference_type']=='company')
        {
            $this->User_model->updateEstablishCompany(array('id_company' => $data['reference_id'],'status' => 'accepted'));
            $con = $this->User_model->getEstablishCompany(array('id_company' => $data['reference_id']));
        }
        else if($data['reference_type']=='contract')
        {
            $this->User_model->updateContractWriting(array('id_contract_writing' => $data['reference_id'],'status' => 'accepted'));
            $con = $this->User_model->getContractWriting(array('id_contract_writing' => $data['reference_id']));
        }
        else if($data['reference_type']=='appeal')
        {
            $this->User_model->updateAppeal(array('id_appeal' => $data['reference_id'],'status' => 'accepted'));
            $con = $this->User_model->getAppeal(array('id_appeal' => $data['reference_id']));
        }

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        mail($con[0]['user_email'],'Case Accepted','<p>Your case has been Accepted by '.$con[0]['lawyer_name'].'</p>',$headers);

        $result = array('status'=>TRUE, 'message' => 'Accepted successfully.', 'data'=>'');
        echo json_encode($result);exit;
    }

    function rejectRequest()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if($data){ $_POST = $data; }
        $data = $this->input->post();
        if(empty($data)){ $data = $this->input->get(); }

        if(empty($data)){
            $result = array('status'=>FALSE, 'error' => 'Invalid data', 'data'=>'');
            echo json_encode($result);exit;
        }

        $this->form_validation->set_rules('reference_type', 'Reference type', 'trim|required');
        $this->form_validation->set_rules('reference_id', 'Reference id', 'trim|required');
        $this->form_validation->set_rules('comment', 'comment', 'trim|required');
        $this->form_validation->set_data($data);
        if ($this->form_validation->run() == FALSE)
        {
            $result = array('status'=>FALSE,'message'=>$this->form_validation->error_array(),'data'=>'');
            echo json_encode($result);exit;
        }

        if($data['reference_type']=='consultation')
        {
            $this->User_model->updateConsultation(array('id_consultation' => $data['reference_id'],'status' => 'rejected'));
            $con = $this->User_model->consultation(array('id_consultation' => $data['reference_id']));
        }
        else if($data['reference_type']=='company')
        {
            $this->User_model->updateEstablishCompany(array('id_company' => $data['reference_id'],'status' => 'rejected'));
            $con = $this->User_model->getEstablishCompany(array('id_company' => $data['reference_id']));
        }
        else if($data['reference_type']=='contract')
        {
            $this->User_model->updateContractWriting(array('id_contract_writing' => $data['reference_id'],'status' => 'rejected'));
            $con = $this->User_model->getContractWriting(array('id_contract_writing' => $data['reference_id']));
        }
        else if($data['reference_type']=='appeal')
        {
            $this->User_model->updateAppeal(array('id_appeal' => $data['reference_id'],'status' => 'rejected'));
            $con = $this->User_model->getAppeal(array('id_appeal' => $data['reference_id']));
        }

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        mail($con[0]['user_email'],'Case Rejected','<p>Your case has been rejected by '.$con[0]['lawyer_name'].' with the reason '.$data['comment'].'</p><p>Your case has been moved to common queue(visible to all lawyers)</p>',$headers);

        $result = array('status'=>TRUE, 'message' => 'Rejected successfully.', 'data'=>'');
        echo json_encode($result);exit;
    }

    function picRequest()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if($data){ $_POST = $data; }
        $data = $this->input->post();
        if(empty($data)){ $data = $this->input->get(); }

        if(empty($data)){
            $result = array('status'=>FALSE, 'error' => 'Invalid data', 'data'=>'');
            echo json_encode($result);exit;
        }

        $this->form_validation->set_rules('reference_type', 'Reference type', 'trim|required');
        $this->form_validation->set_rules('reference_id', 'Reference id', 'trim|required');
        $this->form_validation->set_rules('lawyer_id', 'Lawyer id', 'trim|required');
        $this->form_validation->set_data($data);
        if ($this->form_validation->run() == FALSE)
        {
            $result = array('status'=>FALSE,'message'=>$this->form_validation->error_array(),'data'=>'');
            echo json_encode($result);exit;
        }

        if($data['reference_type']=='consultation')
        {
            $this->User_model->updateConsultation(array('id_consultation' => $data['reference_id'],'lawyer_id' => $data['lawyer_id'],'status' => 'pending'));
        }
        else if($data['reference_type']=='company')
        {
            $this->User_model->updateEstablishCompany(array('id_company' => $data['reference_id'],'lawyer_id' => $data['lawyer_id'],'status' => 'pending'));
        }
        else if($data['reference_type']=='contract')
        {
            $this->User_model->updateContractWriting(array('id_contract_writing' => $data['reference_id'],'lawyer_id' => $data['lawyer_id'],'status' => 'pending'));
        }
        else if($data['reference_type']=='appeal')
        {
            $this->User_model->updateAppeal(array('id_appeal' => $data['reference_id'],'lawyer_id' => $data['lawyer_id'],'status' => 'pending'));
        }

        $result = array('status'=>TRUE, 'message' => 'Picked successfully.', 'data'=>'');
        echo json_encode($result);exit;
    }

    public function forgetPassword()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if ($data) {
            $_POST = $data;
        }
        $data = $this->input->post();
        if (empty($data)) {
            $data = $this->input->get();
        }
        if (empty($data)) {
            $result = array('status' => FALSE, 'error' => 'Invalid data', 'data' => '');
            echo json_encode($result);
            exit;
        }
        $this->form_validation->set_rules('user_type_id', 'User Type', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_data($data);

        if ($this->form_validation->run() == FALSE) {
            $result = array('status' => FALSE, 'message' => $this->form_validation->error_array(), 'data' => '');
            echo json_encode($result);
            exit;
        }

        $data = $this->User_model->getUsersList(array('user_type_id' => $data['user_type_id'],'email' => $data['email']));
        if (empty($data)) {
            $result = array('status'=>TRUE, 'message' => 'No registration with this mail...', 'data'=>'');
            echo json_encode($result);exit;
        } else {
            $password = mt_rand();
            $this->User_model->updateUser(array('password' => md5($password),'id_user' => $data[0]['id_user']));

            $subject = "Lawm | Forget Password ";

            $msg = '';
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            mail($_POST['email'], $subject, '<p>Hello, ' . $_POST['email'] . '</p><p>Your New Password is ' . $password . '</p>', $headers);

            $result = array('status'=>TRUE, 'message' => 'New password has been sent to your email id', 'data'=>'');
            echo json_encode($result);exit;
        }
    }

    public function forum()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if ($data) {
            $_POST = $data;
        }
        $data = $this->input->post();
        if (empty($data)) {
            $data = $this->input->get();
        }
        /*if (empty($data)) {
            $result = array('status' => FALSE, 'error' => 'Invalid data', 'data' => '');
            echo json_encode($result);
            exit;
        }*/
        /*$this->form_validation->set_rules('user_id', 'User Type', 'trim|required');
        $this->form_validation->set_data($data);

        if ($this->form_validation->run() == FALSE) {
            $result = array('status' => FALSE, 'message' => $this->form_validation->error_array(), 'data' => '');
            echo json_encode($result);
            exit;
        }*/
        //echo "<pre>";print_r($data); exit;
        if(isset($data['user_id']))
            $result = $this->User_model->getForum(array('user_id' => $data['user_id']));
        else
            $result = $this->User_model->getForum(array());

        for($r=0;$r<count($result);$r++)
        {
            $result[$r]['attachment'] = $this->User_model->getAttachments(array('type' => 'forum', 'reference_id' => $result[$r]['id_forum']));
        }

        $result = array('status'=>TRUE, 'message' => 'Success', 'data'=>$result);
        echo json_encode($result);exit;

    }

    public function addForum()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if($data){ $_POST = $data; }
        $data = $this->input->post();
        if(empty($data)){ $data = $this->input->get(); }

        if(empty($data)){
            $result = array('status'=>FALSE, 'error' => 'Invalid data', 'data'=>'');
            echo json_encode($result);exit;
        }

        $this->form_validation->set_rules('user_id', 'User id', 'trim|required');
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_data($data);
        if ($this->form_validation->run() == FALSE)
        {
            $result = array('status'=>FALSE,'message'=>$this->form_validation->error_array(),'data'=>'');
            echo json_encode($result);exit;
        }

        $forum_id = $this->User_model->addForum(array('user_id' => $data['user_id'],'title' => $data['title'],'description' => $data['description']));

        $attachments = array();
        if(isset($_FILES['attachment']) && !empty($_FILES['attachment']))
        {
            for($s=0;$s<count($_FILES['attachment']['name']);$s++)
            {
                $imageName = doUpload($_FILES['attachment']['tmp_name'][$s],$_FILES['attachment']['name'][$s],'uploads/','','');
                if($imageName===0){
                    $result = array('status' => FALSE, 'error' => 'upload only jpg,png format files only', 'data' => '');
                    echo json_encode($result);exit;
                }
                //$consultation['attachment'] = $imageName;
                $attachments[] = array(
                    'type' => 'forum',
                    'reference_id' => $forum_id,
                    'attachment' => $imageName
                );
            }
            $this->User_model->addAttachments($attachments);
        }

        $result = array('status'=>TRUE, 'message' => 'Forum added successfully..Need admin approval to publish', 'data'=>'');
        echo json_encode($result);exit;
    }

    public function deleteForum()
    {

    }

    function getPick()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if($data){ $_POST = $data; }
        $data = $this->input->post();
        if(empty($data)){ $data = $this->input->get(); }

        if(empty($data)){
            $result = array('status'=>FALSE, 'error' => 'Invalid data', 'data'=>'');
            echo json_encode($result);exit;
        }

        $this->form_validation->set_rules('reference_type', 'Reference type', 'required');
        $this->form_validation->set_rules('reference_id', 'Reference id', 'required');
        $this->form_validation->set_rules('lawyer_id', 'Lawyer id', 'required');
        $this->form_validation->set_data($data);
        if ($this->form_validation->run() == FALSE)
        {
            $err = array_values($this->form_validation->error_array());
            $result = array('status'=>FALSE,'message'=>$err[0],'data'=>'');
            echo json_encode($result);exit;
        }

        if($data['reference_type']=='consultation')
            $this->User_model->updateConsultation(array('id_consultation' => $data['reference_id'],'lawyer_id' => $data['lawyer_id'],'status' => 'pending'));
        else if($data['reference_type']=='contract-writing')
            $this->User_model->updateContractWriting(array('id_contract_writing' => $data['reference_id'],'lawyer_id' => $data['lawyer_id'],'status' => 'pending'));
        else if($data['reference_type']=='company')
            $this->User_model->updateEstablishCompany(array('id_company' => $data['reference_id'],'lawyer_id' => $data['lawyer_id'],'status' => 'pending'));
        else if($data['reference_type']=='appeal')
            $this->User_model->updateAppeal(array('id_appeal' => $data['reference_id'],'lawyer_id' => $data['lawyer_id'],'status' => 'pending'));

        $result = array('status'=>TRUE, 'message' => 'Success', 'data'=>'');
        echo json_encode($result);exit;

    }

    function deleteAttachment()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if($data){ $_POST = $data; }
        $data = $this->input->post();
        if(empty($data)){ $data = $this->input->get(); }

        if(empty($data)){
            $result = array('status'=>FALSE, 'error' => 'Invalid data', 'data'=>'');
            echo json_encode($result);exit;
        }

        $this->form_validation->set_rules('reference_type', 'Reference type', 'required');
        $this->form_validation->set_rules('reference_id', 'Reference id', 'required');
        $this->form_validation->set_rules('id_attachment', 'Attachment id', 'required');
        $this->form_validation->set_data($data);
        if ($this->form_validation->run() == FALSE)
        {
            $err = array_values($this->form_validation->error_array());
            $result = array('status'=>FALSE,'message'=>$err[0],'data'=>'');
            echo json_encode($result);exit;
        }

        $this->User_model->deleteAttachment(array('reference_id' => $data['reference_id'],'reference_type' => $data['reference_type'],'id_attachment' => $data['id_attachment']));

        $result = array('status'=>TRUE, 'message' => 'Success', 'data'=>'');
        echo json_encode($result);exit;
    }

    function services()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if($data){ $_POST = $data; }
        $data = $this->input->post();
        if(empty($data)){ $data = $this->input->get(); }

        if(empty($data)){
            $result = array('status'=>FALSE, 'error' => 'Invalid data', 'data'=>'');
            echo json_encode($result);exit;
        }

        $this->form_validation->set_rules('language_id', 'Language id', 'required');
        $this->form_validation->set_data($data);
        if ($this->form_validation->run() == FALSE)
        {
            $err = array_values($this->form_validation->error_array());
            $result = array('status'=>FALSE,'message'=>$err[0],'data'=>'');
            echo json_encode($result);exit;
        }
        $result = $this->User_model->getServices($data);
        $result = array('status'=>TRUE, 'message' => 'Success', 'data'=>$result);
        echo json_encode($result);exit;
    }
}