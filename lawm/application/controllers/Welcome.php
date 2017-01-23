<?php

class Welcome extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        //$this->load->database();
        //$this->load->library('Datatables');
        $this->load->model("Mwelcome");

        if($this->session->userdata('user_role_id') && $this->session->userdata('user_role_id')==1)
        {
            redirect(BASE_URL.'index.php/owner/index');
        }
        else if($this->session->userdata('user_role_id') && $this->session->userdata('user_role_id')==2)
        {
            redirect(BASE_URL.'index.php/admin/index');
        }

        if(!$this->session->userdata('language_id')){
            $this->session->set_userdata('language_id',2);
        }


        if($this->session->userdata('language_id')==1){
            $this->lang->load('english','english');
        }else if($this->session->userdata('language_id')==2){
            $this->lang->load('arabic','arabic');
        }

        $this->load->library('pagination');

    }

    public function postCURL($_url, $_param){

        $postData = '';
        //create name value pairs seperated by &
        foreach($_param as $k => $v) 
        { 
          $postData .= $k . '='.$v.'&'; 
        }
        rtrim($postData, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, false); 
        curl_setopt($ch, CURLOPT_POST, count($postData));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);    

        $output=curl_exec($ch);

        curl_close($ch);

        return $output;
    }
    

	function index()
	{
        $data['header']="header";
        $data['middle_content']="";
        $data['footer']='footer';
        $data['menu'] = 'home';
        $menu = $this->Mwelcome->getMenu(array('language_id' => $this->session->userdata('language_id')));
        $content = $this->Mwelcome->getArticle(array('menu_id' => $menu[0]['id_menu'],'language_id' => $this->session->userdata('language_id')));
        if(isset($content[0]['content'])){ 
            $data['content'] = $content[0]['content'];
        }

        $this->load->view('landing',$data);
	}
    
    function aboutus()
	{
        $data['header']="header";
        $data['middle_content']="about-us";
        $data['footer']='footer';
        $data['menu'] = 'login';
        
        $this->load->view('landing',$data);
	}

    
    function contact()
	{
        $data['header']="header";
        $data['middle_content']="contact";
        $data['footer']='footer';
        $data['menu'] = 'login';        

        $this->load->view('landing',$data);
	}
    
    function getSelectLanguage()
    {
        if(isset($_POST['language_id'])){
            $this->session->set_userdata('language_id',$_POST['language_id']);
            if($_POST['language_id']==1){
                $this->lang->load('english_lang','english');
            }
            else if($_POST['language_id']==2){
                $this->lang->load('arabic_lang','arabic');
            }
            echo json_encode(array('response' =>1,'data' => ''));
        }
    }

    
    function loginGateway()
    {
        if($this->session->userdata('user_id'))
        {
            redirect(BASE_URL.'index.php/welcome/dashboard');
        }
        else
        {
            $data['header']="header";
            $data['middle_content']='sign-in-type';
            $data['footer']='footer';
            $data['menu'] = 'login';
            $this->load->view('gateway',$data);
        }
    }
    
    function login()
    {
        if($this->session->userdata('user_id'))
        {
            redirect(BASE_URL.'index.php/welcome/dashboard');
        }
        else
        {
            redirect(BASE_URL.'index.php/welcome/loginGateway');
        }
    }
    
    function userLogin()
    {
        if($this->session->userdata('user_id'))
        {
            redirect(BASE_URL.'index.php/welcome/dashboard');
        }
        else
        {
            $data['header']="header";
            $data['middle_content']='user-sign-in';
            $data['footer']='footer';
            $data['menu'] = 'login';
            $this->load->view('landing',$data);
        }
    }

    function lawyerLogin()
    {
        if($this->session->userdata('user_id'))
        {
            redirect(BASE_URL.'index.php/welcome/dashboard');
        }
        else
        {
            $data['header']="header";
            $data['middle_content']='lawyer-sign-in';
            $data['footer']='footer';
            $data['menu'] = 'login';
            $this->load->view('landing',$data);
        }
    }
    
    
    function makeLogin()
    {   //echo "<pre>"; print_r($_POST); exit;
        if(isset($_POST) && !empty($_POST) && !empty($_POST['email']) && !empty($_POST['password']))
        {
            //echo "<pre>";print_r(md5($_POST['password'])); exit;
            $data=$this->Mwelcome->login($_POST);
            
            if(!empty($data)){

                $data = array(  'user_id'=> $data[0]['id_user'],
                    'user_type_id'=> $data[0]['user_type_id'],
                    'user_name'=> $data[0]['username'],
                    'user_email'=> $data[0]['email'],
                    'user_image' => $data[0]['user_image']
                );

                $this->session->set_userdata($data);
                
                
                //perform guest action after login
                if(isset($_POST['guest_service_type']))
                {                    
                    switch($_POST['guest_service_type'])
                    {                        
                        case "consultation":
                        $consultation = $this->addConsultation($_POST);   
                        break;
                        
                        case "contractWriting":
                        $consultation = $this->addContractWriting($_POST);   
                        break;
                        
                        case "company":
                        $consultation = $this->addEstablishCompany($_POST);   
                        break;
                        
                        case "appeal":
                        $consultation = $this->addAppeal($_POST);   
                        break;
                        
                    }
                }
                
                redirect(BASE_URL.'index.php/welcome/profile');

            }
            else{
                $this->session->set_userdata('message','Invalid Email And Password');
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
        else
        {
            $this->session->set_userdata('message','Invalid Email And Password');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    function logout()
    {
        $this->session->set_userdata( array(
                'user_id' => '',
                'user_type_id' => '',
                'user_name' => '',
                'user_email' => '',
                'user_image' => ''
            )
        );

        $this->session->unset_userdata(array(
            'user_id' => '',
            'user_type_id' => '',
            'user_name' => '',
            'user_email' => '',
            'user_image' => ''
        ));
        redirect(BASE_URL.'index.php/welcome/index');
    }


    function sendActivationKey()
    {
        if(isset($_POST['email']))
        {
            $verify_email=$this->Mwelcome->verifyEmail($_POST['email']);
            if(!empty($verify_email))
            {
                $user_id = $verify_email[0]['id_user'];
                $email = $verify_email[0]['user_email'];
                $password=$this->randomString(8);
                $this->Mwelcome->changePassword(array('password' => $password),$user_id);

                $subject="AffordBUY | Forget Password ";
                $message=  file_get_contents('templates/page.html');
                $html_tags = "<p><span style='float:left'>Dear {{username}},</span></p><p></p><p>Your password has been changed, Below are the login details</p><p>Email : {{email}}</p><p>New password : {{password}}</p><p><span style='flost:left'>regaurds,<br>AffordBuy.</span></p>";
                $message = str_replace('[[text]]', $html_tags, $message);
                $message = str_replace('{{username}}', $verify_email[0]['user_name'], $message);
                $message = str_replace('{{email}}', $email, $message);
                $message = str_replace('{{password}}', $password, $message);

                //require_once("mailer/mailer.php");
                //sendmail($email,$subject,$message);
                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From: no-reply@lawm.sa\r\nReply-to: no-reply@lawm.sa";
                mail($email,$subject,$message,$headers);

                $this->session->set_userdata('message','New Password Mailed You');
                redirect(BASE_URL.'index.php/welcome/index');
            }
            else
            {
                $this->session->set_userdata('message','No registration with this mail..');
                redirect(BASE_URL.'index.php/welcome/forgetPassword');
            }
        }
        else
        {
            redirect(BASE_URL.'index.php/welcome/index');
        }
    }

    function randomString($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $rand_string = '';
        for ($i = 0; $i < $length; $i++) {
            $rand_string.= $characters[rand(0, strlen($characters))];
        }
        return $rand_string;
    }

    function changePassword()
    {
        $data['header']="";
        $data['left_menu']="";
        $data['middle_content']='changepassword';
        $data['footer']='';
        $this->load->view('landing',$data);
    }

    function makeChangePassword()
    {
        if(isset($_POST['password']))
        {
            $this->Mwelcome->upateUser(array('password' => md5($_POST['password'])),$this->session->userdata('user_id'));
            redirect(BASE_URL.'index.php/welcome/index');
        }
        else
        {
            redirect(BASE_URL.'index.php/welcome/index');
        }
    }

   function register()
   {
       if($this->session->userdata('user_id'))
       {
           redirect(BASE_URL.'index.php/welcome/dashboard');
       }
       else
       {
           $data['speciality'] = $this->Mwelcome->getSpecialities();
           $data['country'] = $this->Mwelcome->getCountries();
           $data['header']="header";
           $data['middle_content']='sign-up';
           $data['footer']='footer';
           $data['menu'] = 'sign-up';
           $this->load->view('landing',$data);
       }
   }

   //test Service Start
   
   function profileImage()
   {
       if($this->session->userdata('user_id'))
       {
           redirect(BASE_URL.'index.php/welcome/dashboard');
       }
       else
       {
           $data['speciality'] = $this->Mwelcome->getSpecialities();
           $data['country'] = $this->Mwelcome->getCountries();
           $data['header']="header";
           $data['middle_content']='testService';
           $data['footer']='footer';
           $data['menu'] = 'sign-up';
           $this->load->view('landing',$data);
       }
   }
   
   
   function updateUserImage()
    {
        if($this->session->userdata('user_id'))
        {
            
            $this->Mwelcome->updateUser($_POST,$this->session->userdata('user_id'));
            echo json_encode(array('response' => 1, 'data' => 'Profile updated successfully.'));
        }
        else{
            redirect(BASE_URL);
        }
    }
   
   
   //test service End
   
   //Guest consultation starts
   
   
   function guestConsultation()
   {       
       
       if($this->session->userdata('user_id') && $this->session->userdata('user_type_id')==3)
       {
           redirect(BASE_URL.'index.php/welcome/consultation');
       }
       if($this->session->userdata('user_id') && $this->session->userdata('user_type_id')==2)
       {
           redirect(BASE_URL.'index.php/welcome/dashboard');
       }
       $data['speciality'] = $this->Mwelcome->getSpecialities();
       $data['country'] = $this->Mwelcome->getCountries();
       $data['header']="header";
       $data['middle_content']='guest-consultation';
       $data['footer']='footer';
       $data['menu'] = 'sign-up';
       $this->load->view('landing',$data);

   }
   
   
    function guestContractWriting()
   {       
       
       if($this->session->userdata('user_id') && $this->session->userdata('user_type_id')==3)
       {
           redirect(BASE_URL.'index.php/welcome/contractWriting');
       }
       if($this->session->userdata('user_id') && $this->session->userdata('user_type_id')==2)
       {
           redirect(BASE_URL.'index.php/welcome/contractWriting');
       }
       
       $data['speciality'] = $this->Mwelcome->getSpecialities();
       $data['country'] = $this->Mwelcome->getCountries();
       $data['header']="header";
       $data['middle_content']='guest-contract-writing';
       $data['footer']='footer';
       $data['menu'] = 'sign-up';
       $this->load->view('landing',$data);

   }
   
   
    function guestEstablishCompany()
   {       
       
       if($this->session->userdata('user_id') && $this->session->userdata('user_type_id')==3)
       {
           redirect(BASE_URL.'index.php/welcome/establishCompany');
       }
       if($this->session->userdata('user_id') && $this->session->userdata('user_type_id')==2)
       {
           redirect(BASE_URL.'index.php/welcome/establishCompany');
       }
       $data['speciality'] = $this->Mwelcome->getSpecialities();
       $data['country'] = $this->Mwelcome->getCountries();
       $data['header']="header";
       $data['middle_content']='guest-company';
       $data['footer']='footer';
       $data['menu'] = 'sign-up';
       $this->load->view('landing',$data);

   }
   
   
    function guestAppeal()
   {       
       
       if($this->session->userdata('user_id') && $this->session->userdata('user_type_id')==3)
       {
           redirect(BASE_URL.'index.php/welcome/appeal');
       }
       if($this->session->userdata('user_id') && $this->session->userdata('user_type_id')==2)
       {
           redirect(BASE_URL.'index.php/welcome/appeal');
       }
       
       $data['appeal_type'] = $this->Mwelcome->getAppealType();
       
       $data['speciality'] = $this->Mwelcome->getSpecialities();
       $data['country'] = $this->Mwelcome->getCountries();
       $data['header']="header";
       $data['middle_content']='guest-appeal';
       $data['footer']='footer';
       $data['menu'] = 'sign-up';
       $this->load->view('landing',$data);

   }
   
   //Get URL for an Upload 
   
    public function uploadGetURL()
    {
        $target_dir = BASE_URL."uploads/";
        $target_file = BASE_URL."uploads/";
        
        if(isset($_FILES['attachment']) && !empty($_FILES['attachment']))
        {            
            $target_file = $target_dir . basename($_FILES["attachment"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
           
            if($uploadOk == 1) 
            {
                if(move_uploaded_file($_FILES["attachment"]["tmp_name"], $target_file)) 
                {
                    //echo "The file ". basename( $_FILES["attachment"]["name"]). " has been uploaded.";
                }
            }                        
        }
        echo $target_file;
    }
      
   
   
   function registerUser()
   {   //echo "<pre>"; print_r($_POST); exit;
       if(isset($_POST) && !empty($_POST) && isset($_POST['user_type_id']) && $_POST['user_type_id']!='')
       {
           $data = array();

           if($_POST['user_type_id']==3){
               if(isset($_FILES['user_attachment']['name']) && $_FILES['user_attachment']['name']!=''){
                   $image = do_upload($_FILES['user_attachment']['name'],$_FILES['user_attachment']['tmp_name'],'');
                   $data['user_image'] = $image;
               }
               $data['user_type_id'] = $_POST['user_type_id'];
               $data['first_name'] = $_POST['user_first_name'];
               $data['father_name'] = $_POST['user_father_name'];
               $data['last_name'] = $_POST['user_last_name'];
               $data['email'] = $_POST['user_email'];
               $data['username'] = $_POST['user_username'];
               $data['password'] = md5($_POST['user_password']);
               $data['gender'] = $_POST['user_gender'];
               $data['mobile_number'] = str_replace('+966','',$_POST['user_mobile']);
               $data['country_id'] = $_POST['user_country'];
               //$data['user_status'] = 1;
           }
           else if($_POST['user_type_id']==2)
           {
               if(isset($_FILES['lawyer_attachment']['name']) && $_FILES['lawyer_attachment']['name']!=''){
                   $image = do_upload($_FILES['lawyer_attachment']['name'],$_FILES['lawyer_attachment']['tmp_name'],'');
                   $data['user_image'] = $image;
               }
               if(isset($_FILES['lawyer_profile_pic']['name']) && $_FILES['lawyer_profile_pic']['name']!=''){
                   $image = do_upload($_FILES['lawyer_profile_pic']['name'],$_FILES['lawyer_profile_pic']['tmp_name'],'');
                   $data['certification_attachment'] = $image;
               }
               $data['user_type_id'] = $_POST['user_type_id'];
               $data['first_name'] = $_POST['lawyer_first_name'];
               $data['father_name'] = $_POST['lawyer_father_name'];
               $data['last_name'] = $_POST['lawyer_last_name'];
               $data['email'] = $_POST['lawyer_email'];
               $data['username'] = $_POST['lawyer_username'];
               $data['password'] = md5($_POST['lawyer_password']);
               $data['gender'] = $_POST['lawyer_gender'];
               $data['mobile_number'] = str_replace('+966','',$_POST['lawyer_mobile']);
               $data['country_id'] = $_POST['lawyer_country'];
               $data['speciality_id'] = $_POST['lawyer_speciality'];
               $data['experience'] = $_POST['experience'];
               if(!isset($_POST['certified'])){ $data['is_certification'] = 0; $data['certification_attachment']=''; }
               else{ $data['is_certification'] = 1; }
           }
           //echo "<pre>"; print_r($data); exit;
           $user_id = $this->Mwelcome->addUser($data);
           if($_POST['user_type_id']==2) {
               $this->session->set_userdata('message', 'Registered successfully! Admin will approve shortly.');

               $msg = '';
               $headers = "MIME-Version: 1.0" . "\r\n";
               $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
               $headers .= "From: no-reply@lawm.sa\r\nReply-to: no-reply@lawm.sa";
               mail($data['email'],'Registration','<p>Welcome to Lawm,</p><p>Thankyou for registering. Admin will approve shortly.</p>',$headers);
           }
           else {
               $headers = "MIME-Version: 1.0" . "\r\n";
               $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
               $headers .= "From: no-reply@lawm.sa\r\nReply-to: no-reply@lawm.sa";
               mail($data['email'],'Registration','<p>Welcome to Lawm,</p><p>Thankyou for registering. Click <a href="'.BASE_URL.'index.php/welcome/activeAccount/'.$this->Mwelcome->encode($user_id).'">here</a> to activate your account.</p>',$headers);

               $this->session->set_userdata('message', 'Registered successfully! An activation email is sent to your email address.');
           }
           
           //perform guest action after registration
            if(isset($_POST['guest_service_type']))
            {                    
                $_POST['guest_user_id'] = $user_id;
                $this->session->set_userdata('message', 'Registered you and Consultation is submitted successfully! An activation email is sent to your email address.');
                
                switch($_POST['guest_service_type'])
                {                        
                    case "consultation":
                    $consultation = $this->addConsultation($_POST);   
                    break;
                    
                    case "contractWriting":
                    $consultation = $this->addContractWriting($_POST);   
                    break;
                    
                    case "company":
                    $consultation = $this->addEstablishCompany($_POST);   
                    break;
                    
                    case "appeal":
                    $consultation = $this->addAppeal($_POST);   
                    break;
                    
                }
                    
            }
            
            redirect(BASE_URL.'index.php/welcome/login');           

       }
       else
       {
           $this->session->set_userdata('message','Invalid data');
           redirect(BASE_URL.'index.php/welcome/register');
       }
   }

   
   
    function authorizeConsult()
    {       
        if($_POST['guest_form_type']=='login')
        {
            
            $login = $this->makeLogin($_POST);
        }
        elseif($_POST['guest_form_type']=='register')
        {
            $_POST['user_email']=$_POST['email'];
            $_POST['user_username']=$_POST['email'];
            $_POST['user_password']=$_POST['password'];
            $_POST['user_gender']="male";
            
            $registration = $this->registerUser($_POST);
        }
                
    }

  
   function checkUsername()
   {
       if(isset($_POST) && isset($_POST['user_name']))
       {
           $data = $this->Mwelcome->checkUsername($_POST);
           if(empty($data)){ $response = 1; }
           else{ $response = 0;  }
           echo json_encode(array('response' => $response,'data' => ''));
       }
   }

    function checkEmail()
    {
        if(isset($_POST) && isset($_POST['email']))
        {
            $data = $this->Mwelcome->checkEmail($_POST);
            if(empty($data)){ $response = 1; }
            else{ $response = 0;  }
            echo json_encode(array('response' => $response,'data' => ''));
        }
    }

   function dashboard($type="")
   {
       if($this->session->userdata('user_id'))
       {
           $data['lawyer_list'] = $this->Mwelcome->getUsersList(array('user_type_id' => 2));
           $data['header']="header";
           if($this->session->userdata('user_type_id')==3) 
           {
               $dashboardURL = BASE_URL.'index.php/Welcome/consultation';
                              
               switch($type)
               {
                   case "consultation":
                   $dashboardURL = BASE_URL.'index.php/Welcome/consultation';
                   break;  
                   
                   case "contract-writing":
                   $dashboardURL = BASE_URL.'index.php/Welcome/contractWriting';
                   break;
                   
                   case "company":
                   $dashboardURL = BASE_URL.'index.php/Welcome/establishCompany';
                   break;         
                   
                   case "appeal":
                   $dashboardURL = BASE_URL.'index.php/Welcome/appeal';
                   break;            
                   
               }
               
               redirect($dashboardURL);
               
           }
           else if($this->session->userdata('user_type_id')==2) 
           {
               
               
               switch($type)
               {
                   case "consultation":
                   $dashboardURL = BASE_URL.'index.php/Welcome/dashboard';
                   redirect($dashboardURL);
                   break;  
                   
                   case "contract-writing":
                   $dashboardURL = BASE_URL.'index.php/Welcome/contractWriting';
                   redirect($dashboardURL);
                   break;
                   
                   case "company":
                   $dashboardURL = BASE_URL.'index.php/Welcome/establishCompany';
                   redirect($dashboardURL);
                   break;         
                   
                   case "appeal":
                   $dashboardURL = BASE_URL.'index.php/Welcome/appeal';
                   redirect($dashboardURL);
                   break;            
                   
               }
               
               
               
               $data['lawyer_consultation'] = $this->Mwelcome->consultation(array('lawyer_id' => $this->session->userdata('user_id'),'pending-accepted' => 'pending-accepted'));

               $data['other_consultation'] = $this->Mwelcome->consultation(array('lawyer_id_not' => $this->session->userdata('user_id'),'status' => 'other','date' => date("Y-m-d", strtotime('-72 hours'))));
               $data['other_consultation1'] = $this->Mwelcome->consultation(array('lawyer_id' => $this->session->userdata('user_id'),'status' => 'rejected','date' => date("Y-m-d", strtotime('-72 hours'))));
               $data['other_consultation'] = array_merge($data['other_consultation'],$data['other_consultation1']);
               $data['middle_content'] = 'lawyer_dashboard';
           }
           $data['footer']='footer';
           $data['menu'] = 'overall';
           $this->load->view('landing',$data);
       }
       else{
           redirect(BASE_URL);
       }
   }
   
   

    function profile()
    {
        if($this->session->userdata('user_id'))
        {
            $data['user'] = $this->Mwelcome->getUser($this->session->userdata('user_id'));
            $data['speciality'] = $this->Mwelcome->getSpecialities();
            $data['country'] = $this->Mwelcome->getCountries();

            $data['header']="header";
            $data['middle_content']='profile';
            $data['footer']='footer';
            $data['menu'] = 'profile';
            $this->load->view('landing',$data);
        }
        else{
            redirect(BASE_URL);
        }
    }

    function changeUserPassword()
    {
        if($this->session->userdata('user_id'))
        {
            //$user = $this->Mwelcome->getUser($this->session->userdata('user_id'));
            $check = $this->Mwelcome->checkUser(array('password' => md5($_POST['old_password'])),$this->session->userdata('user_id'));
            if(empty($check)){
                echo json_encode(array('response' => 0, 'data' => 'old password is incorrect!')); exit;
            }
            if(isset($_POST['password']) && $_POST['password']!='')
            {
                $this->Mwelcome->upateUser(array('password' => md5($_POST['password'])),$this->session->userdata('user_id'));
                echo json_encode(array('response' => 1, 'data' => 'Password changed successfully!'));
            }
            else{
                echo json_encode(array('response' => 0, 'data' => 'Invalid password.'));
            }
        }
        else{
            redirect(BASE_URL);
        }
    }

    function updateProfile()
    {
        if($this->session->userdata('user_id'))
        {
            if(isset($_POST['password']) && $_POST['password']!=''){
                $_POST['password'] = md5($_POST['password']);
            }
            else{
                unset($_POST['password']);
            }
            $this->Mwelcome->upateUser($_POST,$this->session->userdata('user_id'));
            echo json_encode(array('response' => 1, 'data' => 'Profile updated successfully!'));
        }
        else{
            redirect(BASE_URL);
        }
    }

    function changeProfilePic()
    {
        if($this->session->userdata('user_id'))
        {
            if(isset($_FILES['profile_pic']['name']) && $_FILES['profile_pic']['name']!=''){
                $image = do_upload($_FILES['profile_pic']['name'],$_FILES['profile_pic']['tmp_name'],'');
                $data['user_image'] = $image;
                $this->Mwelcome->upateUser($data,$this->session->userdata('user_id'));
                $this->session->set_userdata(array('user_image' => $image));
                redirect(BASE_URL.'index.php/Welcome/profile');
            }
        }
        else{
            redirect(BASE_URL);
        }
    }

    function consultation()
    {
        if($this->session->userdata('user_id'))
        {
            $data['my_consultations'] = $this->Mwelcome->consultation(array('user_id' => $this->session->userdata('user_id')));
            for($s=0;$s<count($data['my_consultations']);$s++){
                $data['my_consultations'][$s]['attachment'] = $this->Mwelcome->getAttachment(array('type' => 'consultation','reference_id' => $data['my_consultations'][$s]['id_consultation']));
            }
            $data['header']="header";
            $data['middle_content']='consultation';
            $data['footer']='footer';
            $data['menu'] = 'consultation';
            $this->load->view('landing',$data);
        }
        else{
            redirect(BASE_URL.'index.php/Welcome/loginGateway');
        }
    }

    function newConsultation()
    {
        if($this->session->userdata('user_id'))
        {
            $data['lawyer_list'] = $this->Mwelcome->getUsersList(array('user_type_id' => 2,'email_not' => $this->session->userdata('user_email')));
            if(isset($_REQUEST['consultation_id']))
            {
               $data['consultation'] = $this->Mwelcome->consultation(array('id_consultation' => $this->Mwelcome->decode($_REQUEST['consultation_id'])));
                //echo "<pre>"; print_r($data['consultation']); exit;
            }
            $data['consultation_type'] = $this->Mwelcome->getConsultationType();
            //echo "<pre>"; print_r($data['consultation_type']); exit;
            $data['header']="header";
            $data['middle_content']='add_consultation';
            $data['footer']='footer';
            $data['menu'] = 'consultation';
            $this->load->view('landing',$data);
        }
        else{
            redirect(BASE_URL.'index.php/Welcome/consultation');
        }
    }

    function addConsultation()
    {
        
        if($this->session->userdata('user_id') || isset($_POST['guest_user_id']))
        {
            
            $user_id = ( $this->session->userdata('user_id') ? $this->session->userdata('user_id') : $_POST['guest_user_id'] );
            
            $data = array(
                'user_id' => $user_id,
                'lawyer_id' => $_POST['lawyer'],
                'consultation_type' => $_POST['consultation_type'],
                'experience' => $_POST['experience'],
                'complain' => $_POST['complain'],
                /*'date' => date('Y-m-d',strtotime($_POST['date'])),*/
                'subject' => $_POST['subject'],
                'description' => $_POST['description'],
                'attachment' => ''
            );

            if(isset($_POST['id_consultation']) && $_POST['id_consultation']!='') {
                $consultation_id = $data['id_consultation'] = $_POST['id_consultation'];
                if($data['attachment']==''){ unset($data['attachment']); }
                $this->Mwelcome->updateConsultation($data);
                if(isset($_POST['delete_attach']))
                {
                    for($sr=0;$sr<count($_POST['delete_attach']);$sr++)
                    {
                        $this->Mwelcome->deleteAttachment($_POST['delete_attach'][$sr]);
                    }
                }

            }
            else {
                $consultation_id = $this->Mwelcome->addConsultation($data);
            }

            //echo "<pre>";print_r($_FILES); exit;
            if(isset($_FILES['attachment']) && !empty($_FILES['attachment']))
            {
                for($s=0;$s<count($_FILES['attachment']['name']);$s++)
                {
                    if($_FILES['attachment']['name'][$s]!=''){
                        $image = do_upload($_FILES['attachment']['name'][$s],$_FILES['attachment']['tmp_name'][$s],'');
                        //$data['attachment'] = $image;
                        $attachments[] = array(
                            'type' => 'consultation',
                            'reference_id' => $consultation_id,
                            'attachment' => $image
                        );
                    }
                }
                if(!empty($attachments))
                    $this->Mwelcome->addAttachments($attachments);
            }

            redirect(BASE_URL.'index.php/Welcome/consultation');

        }
        else{
            redirect(BASE_URL.'index.php/Welcome/login');
        }
    }

    function updateConsultation()
    {
        if($this->session->userdata('user_id'))
        {
            if(isset($_POST['cmt'])){ $cmt = $_POST['cmt']; }
            else{ $cmt = ''; }
            unset($_POST['cmt']);
            $this->Mwelcome->updateConsultation($_POST);
            if(isset($_POST['status']) && $_POST['status']=='rejected'){
                $con = $this->Mwelcome->consultation(array('id_consultation' => $_POST['id_consultation']));
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From: no-reply@lawm.sa\r\nReply-to: no-reply@lawm.sa";
                mail($con[0]['user_email'],'Case Rejected',"<p>Your case( Case ID - ".$_POST['id_consultation'].") has been rejected by ".$con[0]['lawyer_name']." with the reason - ".$cmt."</p><p>Your case has been moved to common queue(visible to all lawyers)</p>",$headers);
            }
            else if(isset($_POST['status']) && $_POST['status']=='accepted'){
                $con = $this->Mwelcome->consultation(array('id_consultation' => $_POST['id_consultation']));
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From: no-reply@lawm.sa\r\nReply-to: no-reply@lawm.sa";
                mail($con[0]['user_email'],'Case Accepted','<p>Your case has been Accepted by '.$con[0]['lawyer_name'].' </p>',$headers);
            }
            echo json_encode(array('response' => 1, 'data' => ''));
        }
        else{
            redirect(BASE_URL);
        }
    }

    function contractWriting()
    {
        if($this->session->userdata('user_id'))
        {
            $data['lawyer_list'] = $this->Mwelcome->getUsersList(array('user_type_id' => 2));
            if($this->session->userdata('user_type_id')==3)
            {
                $data['contract_writing'] = $this->Mwelcome->getContractWriting(array('user_id' => $this->session->userdata('user_id')));
                for($s=0;$s<count($data['contract_writing']);$s++){
                    $data['contract_writing'][$s]['attachment'] = $this->Mwelcome->getAttachment(array('type' => 'contract-writing','reference_id' => $data['contract_writing'][$s]['id_contract_writing']));
                }
                $data['middle_content']='contract_writing';
            }
            else
            {
                $data['lawyer_consultation'] = $this->Mwelcome->getContractWriting(array('lawyer_id' => $this->session->userdata('user_id'),'pending-accepted' => 'pending-accepted'));
                $data['other_consultation'] = $this->Mwelcome->getContractWriting(array('lawyer_id_not' => $this->session->userdata('user_id'),'status' => 'other','date' => date("Y-m-d", strtotime('-72 hours'))));
                $data['other_consultation1'] = $this->Mwelcome->getContractWriting(array('lawyer_id' => $this->session->userdata('user_id'),'status' => 'rejected','date' => date("Y-m-d", strtotime('-72 hours'))));
                $data['other_consultation'] = array_merge($data['other_consultation'],$data['other_consultation1']);
                $data['middle_content']='lawyer_contract_writing';
            }

            $data['header']="header";
            $data['footer']='footer';
            $data['menu'] = 'contract_writing';
            $this->load->view('landing',$data);
        }
        else{
            redirect(BASE_URL.'index.php/Welcome/consultation');
        }
    }

    function newContractWriting()
    {
        if($this->session->userdata('user_id'))
        {
            $data['lawyer_list'] = $this->Mwelcome->getUsersList(array('user_type_id' => 2,'email_not' => $this->session->userdata('user_email')));
            if(isset($_REQUEST['contract_writing_id']))
            {
                $data['contract_writing'] = $this->Mwelcome->getContractWriting(array('id_contract_writing' => $this->Mwelcome->decode($_REQUEST['contract_writing_id'])));
                //echo "<pre>"; print_r($data['consultation']); exit;
            }

            $data['header']="header";
            $data['middle_content']='add_contract_writing';
            $data['footer']='footer';
            $data['menu'] = 'contract_writing';
            $this->load->view('landing',$data);
        }
        else{
            redirect(BASE_URL.'index.php/Welcome/consultation');
        }
    }

    function addContractWriting()
    {
        //echo "<pre>"; print_r($_POST); exit;
        if($this->session->userdata('user_id') || isset($_POST['guest_user_id']))
        {
            
            $user_id = ( $this->session->userdata('user_id') ? $this->session->userdata('user_id') : $_POST['guest_user_id'] );
            
            if(isset($_POST['experience'])){
                $exp = $_POST['experience'];
            }
            else{
                $exp = '';
            }
            $data = array(
                'user_id' => $user_id,
                'lawyer_id' => $_POST['lawyer'],
                'experience' => $_POST['experience'],
                'subject' => $_POST['subject'],
                'description' => $_POST['description'],
                'attachment' => ''
            );

            /*if(isset($_FILES['attachment']['name']) && $_FILES['attachment']['name']!=''){
                $image = do_upload($_FILES['attachment']['name'],$_FILES['attachment']['tmp_name'],'');
                $data['attachment'] = $image;
            }*/

            if(isset($_POST['id_contract_writing']) && $_POST['id_contract_writing']!='') {
                $contract_writing_id = $data['id_contract_writing'] = $_POST['id_contract_writing'];
                if($data['attachment']==''){ unset($data['attachment']); }
                $this->Mwelcome->updateContractWriting($data);
                if(isset($_POST['delete_attach']))
                {
                    for($sr=0;$sr<count($_POST['delete_attach']);$sr++)
                    {
                        $this->Mwelcome->deleteAttachment($_POST['delete_attach'][$sr]);
                    }
                }
            }
            else {
                $contract_writing_id = $this->Mwelcome->addContractWriting($data);
            }

            if(isset($_FILES['attachment']) && !empty($_FILES['attachment']))
            {
                for($s=0;$s<count($_FILES['attachment']['name']);$s++)
                {
                    if($_FILES['attachment']['name'][$s]!=''){
                        $image = do_upload($_FILES['attachment']['name'][$s],$_FILES['attachment']['tmp_name'][$s],'');
                        //$data['attachment'] = $image;
                        $attachments[] = array(
                            'type' => 'contract-writing',
                            'reference_id' => $contract_writing_id,
                            'attachment' => $image
                        );
                    }

                }
                if(!empty($attachments))
                    $this->Mwelcome->addAttachments($attachments);
            }

            redirect(BASE_URL.'index.php/Welcome/contractWriting');

        }
        else{
            redirect(BASE_URL);
        }
    }

    function getContractWriting()
    {
        if($this->session->userdata('user_id'))
        {
            $data = $this->Mwelcome->getContractWriting(array('id_contract_writing' => $_POST['contract_writing_id']));
            echo json_encode(array('response' => 1,'data' => $data[0]));
        }
        else{
            redirect(BASE_URL);
        }
    }

    function establishCompany()
    {
        if($this->session->userdata('user_id'))
        {
            $data['lawyer_list'] = $this->Mwelcome->getUsersList(array('user_type_id' => 2));
            if($this->session->userdata('user_type_id')==3)
            {
                $data['company'] = $this->Mwelcome->getEstablishCompany(array('user_id' => $this->session->userdata('user_id')));
                for($s=0;$s<count($data['company']);$s++){
                    $data['company'][$s]['attachment'] = $this->Mwelcome->getAttachment(array('type' => 'company','reference_id' => $data['company'][$s]['id_company']));
                }
                $data['middle_content']='company';
            }
            else
            {
                /*$data['company'] = $this->Mwelcome->getEstablishCompany(array('lawyer' => $this->session->userdata('user_id'),'status' => 'pending'));*/
                $data['lawyer_consultation'] = $this->Mwelcome->getEstablishCompany(array('lawyer_id' => $this->session->userdata('user_id'),'pending-accepted' => 'pending-accepted'));
                $data['other_consultation'] = $this->Mwelcome->getEstablishCompany(array('lawyer_id_not' => $this->session->userdata('user_id'),'status' => 'other','date' => date("Y-m-d", strtotime('-72 hours'))));
                $data['other_consultation1'] = $this->Mwelcome->getEstablishCompany(array('lawyer_id' => $this->session->userdata('user_id'),'status' => 'rejected','date' => date("Y-m-d", strtotime('-72 hours'))));
                $data['other_consultation'] = array_merge($data['other_consultation'],$data['other_consultation1']);
                $data['middle_content']='lawyer_company';
            }

            $data['header']="header";
            $data['footer']='footer';
            $data['menu'] = 'establish_company';
            $this->load->view('landing',$data);
        }
        else{
            redirect(BASE_URL);
        }
    }

    function newCompanyEstablishment()
    {
        if($this->session->userdata('user_id'))
        {
            $data['lawyer_list'] = $this->Mwelcome->getUsersList(array('user_type_id' => 2,'email_not' => $this->session->userdata('user_email')));
            if(isset($_REQUEST['id']))
            {
                $data['company'] = $this->Mwelcome->getEstablishCompany(array('id_company' => $this->Mwelcome->decode($_REQUEST['id'])));
//                /echo "<pre>"; print_r($data['company']); exit;
            }
            $data['header']="header";
            $data['middle_content']='add_company';
            $data['footer']='footer';
            $data['menu'] = 'establish_company';
            $this->load->view('landing',$data);
        }
        else{
            redirect(BASE_URL);
        }
    }

    function addEstablishCompany()
    {
        //echo "<pre>"; print_r($_POST); exit;
        if($this->session->userdata('user_id') || isset($_POST['guest_user_id']))
        {
            
            $user_id = ( $this->session->userdata('user_id') ? $this->session->userdata('user_id') : $_POST['guest_user_id'] );
            
            
            if(isset($_POST['experience'])){
                $exp = $_POST['experience'];
            }
            else{
                $exp = '';
            }
            $data = array(
                'user_id' => $user_id,
                'lawyer_id' => $_POST['lawyer'],
                'experience' => $_POST['experience'],
                'subject' => $_POST['subject'],
                'description' => $_POST['description'],
                'attachment' => ''
            );

            /*if(isset($_FILES['attachment']['name']) && $_FILES['attachment']['name']!=''){
                $image = do_upload($_FILES['attachment']['name'],$_FILES['attachment']['tmp_name'],'');
                $data['attachment'] = $image;
            }*/

            if(isset($_POST['id_company']) && $_POST['id_company']!='') {
                $company_id = $data['id_company'] = $_POST['id_company'];
                if($data['attachment']==''){ unset($data['attachment']); }
                $this->Mwelcome->updateEstablishCompany($data);
                $this->Mwelcome->deletePartner($_POST['id_company']);
                $company_id = $_POST['id_company'];
                for($s=0;$s<count($_POST['partner_name']);$s++)
                {
                    $this->Mwelcome->addCompanyPartner(array(
                        'company_id' => $company_id,
                        'partner_name' => $_POST['partner_name'][$s],
                        'partner_id' => $_POST['partner_id'][$s]
                    ));
                }
                if(isset($_POST['delete_attach']))
                {
                    for($sr=0;$sr<count($_POST['delete_attach']);$sr++)
                    {
                        $this->Mwelcome->deleteAttachment($_POST['delete_attach'][$sr]);
                    }
                }
            }
            else {
                $company_id = $this->Mwelcome->addEstablishCompany($data);
                for($s=0;$s<count($_POST['partner_name']);$s++)
                {
                    if(isset($_POST['partner_name'][$s]) && $_POST['partner_name'][$s]!='' && isset($_POST['partner_id'][$s]) && $_POST['partner_id'][$s]!='')
                    $this->Mwelcome->addCompanyPartner(array(
                        'company_id' => $company_id,
                        'partner_name' => $_POST['partner_name'][$s],
                        'partner_id' => $_POST['partner_id'][$s]
                    ));
                }
            }

            if(isset($_FILES['attachment']) && !empty($_FILES['attachment']))
            {
                for($s=0;$s<count($_FILES['attachment']['name']);$s++)
                {
                    if($_FILES['attachment']['name'][$s]!=''){
                        $image = do_upload($_FILES['attachment']['name'][$s],$_FILES['attachment']['tmp_name'][$s],'');
                        //$data['attachment'] = $image;
                        $attachments[] = array(
                            'type' => 'company',
                            'reference_id' => $company_id,
                            'attachment' => $image
                        );
                    }

                }
                if(!empty($attachments))
                    $this->Mwelcome->addAttachments($attachments);
            }

            redirect(BASE_URL.'index.php/Welcome/establishCompany');

        }
        else{
            redirect(BASE_URL);
        }
    }

    function getEstablishCompany()
    {
        if($this->session->userdata('user_id'))
        {
            $data = $this->Mwelcome->getEstablishCompany(array('id_company' => $_POST['company_id']));
            echo json_encode(array('response' => 1,'data' => $data[0]));
        }
        else{
            redirect(BASE_URL);
        }
    }

    function appeal()
    {
        if($this->session->userdata('user_id'))
        {
            $data['lawyer_list'] = $this->Mwelcome->getUsersList(array('user_type_id' => 2));
            if($this->session->userdata('user_type_id')==3)
            {
                $data['appeal'] = $this->Mwelcome->getAppeal(array('user_id' => $this->session->userdata('user_id')));
                for($s=0;$s<count($data['appeal']);$s++){
                    $data['appeal'][$s]['attachment'] = $this->Mwelcome->getAttachment(array('type' => 'appeal','reference_id' => $data['appeal'][$s]['id_appeal']));
                }
                $data['middle_content']='appeal';
            }
            else
            {
                /*$data['appeal'] = $this->Mwelcome->getAppeal(array('lawyer_id' => $this->session->userdata('user_id'),'status' => 'pending'));*/
                $data['lawyer_consultation'] = $this->Mwelcome->getAppeal(array('lawyer_id' => $this->session->userdata('user_id'),'pending-accepted' => 'pending-accepted'));
                $data['other_consultation'] = $this->Mwelcome->getAppeal(array('lawyer_id_not'=>$this->session->userdata('user_id'),'status' => 'other','date' => date("Y-m-d", strtotime('-72 hours'))));
                $data['other_consultation1'] = $this->Mwelcome->getAppeal(array('lawyer_id' => $this->session->userdata('user_id'),'status' => 'rejected','date' => date("Y-m-d", strtotime('-72 hours'))));
                $data['other_consultation'] = array_merge($data['other_consultation'],$data['other_consultation1']);
                $data['middle_content']='lawyer_appeal';
            }

            $data['appeal_type'] = $this->Mwelcome->getAppealType();
            $data['header']="header";
            $data['footer']='footer';
            $data['menu'] = 'appeal';
            $this->load->view('landing',$data);
        }
        else{
            redirect(BASE_URL);
        }
    }

    function newAppeal()
    {
        if($this->session->userdata('user_id'))
        {
            $data['lawyer_list'] = $this->Mwelcome->getUsersList(array('user_type_id' => 2,'email_not' => $this->session->userdata('user_email')));
            $data['appeal_type'] = $this->Mwelcome->getAppealType();
            if(isset($_REQUEST['id_appeal']))
            {
                $data['appeal'] = $this->Mwelcome->getAppeal(array('id_appeal' => $this->Mwelcome->decode($_REQUEST['id_appeal'])));
                //echo "<pre>"; print_r($data['consultation']); exit;
            }
            $data['header']="header";
            $data['middle_content']='add_appeal';
            $data['footer']='footer';
            $data['menu'] = 'appeal';
            $this->load->view('landing',$data);
        }
        else{
            redirect(BASE_URL);
        }
    }


    function addAppeal()
    {
        //echo "<pre>"; print_r($_POST); exit;
        if($this->session->userdata('user_id') || isset($_POST['guest_user_id']))
        {
            
            $user_id = ( $this->session->userdata('user_id') ? $this->session->userdata('user_id') : $_POST['guest_user_id'] );
            
            
            if(isset($_POST['experience'])){
                $exp = $_POST['experience'];
            }
            else{
                $exp = '';
            }
            $data = array(
                'user_id' => $user_id,
                'lawyer_id' => $_POST['lawyer'],
                'appeal_type_id' => $_POST['appeal_type'],
                'experience' => $_POST['experience'],
                'subject' => $_POST['subject'],
                'description' => $_POST['description'],
                'attachment' => ''
            );

            /*if(isset($_FILES['attachment']['name']) && $_FILES['attachment']['name']!=''){
                $image = do_upload($_FILES['attachment']['name'],$_FILES['attachment']['tmp_name'],'');
                $data['attachment'] = $image;
            }*/

            if(isset($_POST['id_appeal']) && $_POST['id_appeal']!='') {
                $appeal_id = $data['id_appeal'] = $_POST['id_appeal'];
                if($data['attachment']==''){ unset($data['attachment']); }
                $this->Mwelcome->updateAppeal($data);
                if(isset($_POST['delete_attach']))
                {
                    for($sr=0;$sr<count($_POST['delete_attach']);$sr++)
                    {
                        $this->Mwelcome->deleteAttachment($_POST['delete_attach'][$sr]);
                    }
                }
            }
            else {
                $appeal_id = $this->Mwelcome->addAppeal($data);
            }

            if(isset($_FILES['attachment']) && !empty($_FILES['attachment']))
            {
                for($s=0;$s<count($_FILES['attachment']['name']);$s++)
                {
                    if($_FILES['attachment']['name'][$s]!=''){
                        $image = do_upload($_FILES['attachment']['name'][$s],$_FILES['attachment']['tmp_name'][$s],'');
                        //$data['attachment'] = $image;
                        $attachments[] = array(
                            'type' => 'appeal',
                            'reference_id' => $appeal_id,
                            'attachment' => $image
                        );
                    }

                }
                if(!empty($attachments))
                    $this->Mwelcome->addAttachments($attachments);
            }

            redirect(BASE_URL.'index.php/Welcome/appeal');

        }
        else{
            redirect(BASE_URL);
        }
    }

    function getAppeal()
    {
        if($this->session->userdata('user_id'))
        {
            $data = $this->Mwelcome->getAppeal(array('id_appeal' => $_POST['appeal_id']));
            echo json_encode(array('response' => 1,'data' => $data[0]));
        }
        else{
            redirect(BASE_URL);
        }
    }

    function updateAppeal()
    {
        if($this->session->userdata('user_id'))
        {
            if(isset($_POST['cmt'])){ $cmt = $_POST['cmt']; }
            else{ $cmt = ''; }
            unset($_POST['cmt']);
            $this->Mwelcome->updateAppeal($_POST);
            if(isset($_POST['status']) && $_POST['status']=='rejected'){
                $con = $this->Mwelcome->getAppeal(array('id_appeal' => $_POST['id_appeal']));
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From: no-reply@lawm.sa\r\nReply-to: no-reply@lawm.sa";
                mail($con[0]['user_email'],'Case Rejected',"<p>Your case( Case ID - ".$_POST['id_appeal'].") has been rejected by ".$con[0]['lawyer_name']." with the reason - ".$cmt."</p><p>Your case has been moved to common queue(visible to all lawyers)</p>",$headers);
            }
            else if(isset($_POST['status']) && $_POST['status']=='accepted'){
                $con = $this->Mwelcome->getAppeal(array('id_appeal' => $_POST['id_appeal']));
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From: no-reply@lawm.sa\r\nReply-to: no-reply@lawm.sa";
                mail($con[0]['user_email'],'Case Accepted','<p>Your case has been Accepted by '.$con[0]['lawyer_name'].' </p>',$headers);
            }

            echo json_encode(array('response' => 1, 'data' => ''));
        }
        else{
            redirect(BASE_URL);
        }
    }

    function updateEstablishCompany()
    {
        if($this->session->userdata('user_id'))
        {
            if(isset($_POST['cmt'])){ $cmt = $_POST['cmt']; }
            else{ $cmt = ''; }
            unset($_POST['cmt']);
            $this->Mwelcome->updateEstablishCompany($_POST);
            if(isset($_POST['status']) && $_POST['status']=='rejected'){
                $con = $this->Mwelcome->getEstablishCompany(array('id_company' => $_POST['id_company']));
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From: no-reply@lawm.sa\r\nReply-to: no-reply@lawm.sa";
                mail($con[0]['user_email'],'Case Rejected',"<p>Your case( Case ID - ".$_POST['id_company'].") has been rejected by ".$con[0]['lawyer_name']." with the reason - ".$cmt."</p><p>Your case has been moved to common queue(visible to all lawyers)</p>",$headers);
            }
            else if(isset($_POST['status']) && $_POST['status']=='accepted'){
                $con = $this->Mwelcome->getEstablishCompany(array('id_company' => $_POST['id_company']));
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From: no-reply@lawm.sa\r\nReply-to: no-reply@lawm.sa";
                mail($con[0]['user_email'],'Case Accepted','<p>Your case has been Accepted by '.$con[0]['lawyer_name'].' </p>',$headers);
            }


            echo json_encode(array('response' => 1, 'data' => ''));
        }
        else{
            redirect(BASE_URL);
        }
    }

    function updateContractWriting()
    {
        if($this->session->userdata('user_id'))
        {

            if(isset($_POST['cmt'])){ $cmt = $_POST['cmt']; }
            else{ $cmt = ''; }
            unset($_POST['cmt']);
            $this->Mwelcome->updateContractWriting($_POST);
            if(isset($_POST['status']) && $_POST['status']=='rejected'){
                $con = $this->Mwelcome->getContractWriting(array('id_contract_writing' => $_POST['id_contract_writing']));
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From: no-reply@lawm.sa \r\n Reply-to: no-reply@lawm.sa";
                mail($con[0]['user_email'],'Case Rejected',"<p>Your case( Case ID - ".$_POST['id_contract_writing'].") has been rejected by ".$con[0]['lawyer_name']." with the reason - ".$cmt."</p><p>Your case has been moved to common queue(visible to all lawyers)</p>",$headers);
            }
            else if(isset($_POST['status']) && $_POST['status']=='accepted'){
                $con = $this->Mwelcome->getContractWriting(array('id_contract_writing' => $_POST['id_contract_writing']));
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From: no-reply@lawm.sa \r\n Reply-to: no-reply@lawm.sa";
                mail($con[0]['user_email'],'Case Accepted','<p>Your case has been Accepted by '.$con[0]['lawyer_name'].' </p>',$headers);
            }
            echo json_encode(array('response' => 1, 'data' => ''));
        }
        else{
            redirect(BASE_URL);
        }
    }

    function getPick()
    {
        if($this->session->userdata('user_id'))
        {
            if($_POST['type']=='consultation')
                $this->Mwelcome->updateConsultation(array('id_consultation' => $_POST['id'],'lawyer_id' => $this->session->userdata('user_id'),'status' => 'pending'));
            else if($_POST['type']=='contract')
                $this->Mwelcome->updateContractWriting(array('id_contract_writing' => $_POST['id'],'lawyer_id' => $this->session->userdata('user_id'),'status' => 'pending'));
            else if($_POST['type']=='company')
                $this->Mwelcome->updateEstablishCompany(array('id_company' => $_POST['id'],'lawyer_id' => $this->session->userdata('user_id'),'status' => 'pending'));
            else if($_POST['type']=='appeal')
                $this->Mwelcome->updateAppeal(array('id_appeal' => $_POST['id'],'lawyer_id' => $this->session->userdata('user_id'),'status' => 'pending'));

            echo json_encode(array('response' => 1, 'data' => ''));
        }
        else{
            redirect(BASE_URL);
        }
    }

    /*function comments($type,$id)
    {
        if($this->session->userdata('user_id'))
        {
            $data['conversation'] = $this->Mwelcome->getConversation(array('reference_type' => $type,'reference_id' => $this->Mwelcome->decode($id)));
            $data['header']="header";
            $data['middle_content']='comments';
            $data['footer']='footer';
            $data['menu'] = 'comments';
            $data['reference_type'] = $type;
            $data['reference_id'] = $id;
            $this->load->view('landing',$data);
        }
        else{
            redirect(BASE_URL);
        }
    }*/
    function comments($type,$id)
    {
        if($this->session->userdata('user_id'))
        {
            $data['conversation'] = $this->Mwelcome->getConversation(array('reference_type' => $type,'reference_id' => $this->Mwelcome->decode($id)));
            $data['header']="header";
            //$data['middle_content']='comments';
            $data['type']=$type;
            $data['footer']='footer';
            if($type=='company') {
                $data['case_details'] = $this->Mwelcome->getEstablishCompany(array('id_company' => $this->Mwelcome->decode($id)));
                $data['menu'] = 'establish_company';
            }
            else if($type=='consultation') {
                $data['case_details'] = $this->Mwelcome->consultation(array('id_consultation' => $this->Mwelcome->decode($id)));
                /*echo '<pre>';
                print_r($data['case_details']);
                exit;*/

                $data['menu'] = 'consultation';
            }
            else if($type=='contract-writing') {
                $data['case_details'] = $this->Mwelcome->getContractWriting(array('id_contract_writing' => $this->Mwelcome->decode($id)));
                $data['menu'] = 'contract_writing';
            }
            else if($type=='appeal') {
                $data['case_details'] = $this->Mwelcome->getAppeal(array('id_appeal' => $this->Mwelcome->decode($id)));
                $data['menu'] = 'appeal';
            }
            else {
                $data['menu'] = 'comments';
            }
            $data['case_details'][0]['attachment'] = $this->Mwelcome->getAttachment(array('type' => $type,'reference_id' => $this->Mwelcome->decode($id)));
            
            //No such case exception
            if(empty($data['case_details']))
            {
                $data['middle_content']='item_deleted';
            }
            elseif(!isset($data['case_details'][0]['status']))
            {
                $data['middle_content']='item_deleted';
            }
            else
            {
                $data['middle_content']='comments';
            }

            $data['reference_type'] = $type;
            $data['reference_id'] = $id;
            $this->load->view('landing',$data);
        }
        else{
            redirect(BASE_URL);
        }
    }

    function addComment()
    {
        if($this->session->userdata('user_id') && isset($_POST) && !empty($_POST))
        {
            $to_id = 0;
            $cmt_id = $_POST['reference_id'];
            $_POST['reference_id'] = $this->Mwelcome->decode($_POST['reference_id']);
            $ref = $this->Mwelcome->getResults($_POST['reference_type'],$_POST['reference_id']);
            if($ref[0]['user_id']==$this->session->userdata('user_id')){ $to_id = $ref[0]['lawyer_id']; }
            if($ref[0]['lawyer_id']==$this->session->userdata('user_id')){ $to_id = $ref[0]['user_id']; }

            $insert = array(
                'reference_type' => $_POST['reference_type'],
                'reference_id' => $_POST['reference_id'],
                'from_id' => $this->session->userdata('user_id'),
                'to_id' => $to_id,
                'comment' => $_POST['comment'],
                'attachment' => ''
            );

            /*if(isset($_FILES['attachment']['name']) && $_FILES['attachment']['name']!=''){
                $image = do_upload($_FILES['attachment']['name'],$_FILES['attachment']['tmp_name'],'');
                $insert['attachment'] = $image;
            }*/

            if(isset($_POST['id_conversation']) && $_POST['id_conversation']!='') {
                $id = $insert['id_conversation'] = $_POST['id_conversation'];
                if($insert['attachment']==''){ unset($insert['attachment']); }
                $this->Mwelcome->updateConversation($insert);
            }
            else {
                $id = $this->Mwelcome->addConversatation($insert);
            }

            if(isset($_FILES['attachment']) && !empty($_FILES['attachment']))
            {
                for($s=0;$s<count($_FILES['attachment']['name']);$s++)
                {
                    if($_FILES['attachment']['name'][$s]!=''){
                        $image = do_upload($_FILES['attachment']['name'][$s],$_FILES['attachment']['tmp_name'][$s],'');
                        //$data['attachment'] = $image;
                        $attachments[] = array(
                            'type' => 'reply',
                            'reference_id' => $id,
                            'attachment' => $image
                        );
                    }

                }
                if(!empty($attachments))
                    $this->Mwelcome->addAttachments($attachments);
            }

            redirect(BASE_URL.'index.php/Welcome/comments/'.$_POST['reference_type'].'/'.$cmt_id);

        }
        else{
            redirect(BASE_URL);
        }
    }

    /*function closeConsult()
    {
        if($_POST['ref_type']=='consultation')
        {
            $_POST['ref_id'] = $this->Mwelcome->decode($_POST['ref_id']);
            $con = $this->Mwelcome->consultation(array('id_consultation' => $_POST['ref_id']));
            $this->Mwelcome->updateConsultation(array('id_consultation' => $_POST['ref_id'],'status' => 'closed'));
            $this->Mwelcome->addRating(array('lawyer_id' => $con[0]['lawyer_id'],'user_id' => $this->session->userdata('user_id'),'rating' => $_POST['cur_rating'],'reference_id' => $_POST['ref_id'],'reference_type' => $_POST['ref_type']));
        }
        else if($_POST['ref_type']=='company')
        {
            $_POST['ref_id'] = $this->Mwelcome->decode($_POST['ref_id']);
            $con = $this->Mwelcome->getEstablishCompany(array('id_company' => $_POST['ref_id']));
            $this->Mwelcome->updateEstablishCompany(array('id_company' => $_POST['ref_id'],'status' => 'closed'));
            $this->Mwelcome->addRating(array('lawyer_id' => $con[0]['lawyer_id'],'user_id' => $this->session->userdata('user_id'),'rating' => $_POST['cur_rating'],'reference_id' => $_POST['ref_id'],'reference_type' => $_POST['ref_type']));
        }
        else if($_POST['ref_type']=='contract')
        {
            $_POST['ref_id'] = $this->Mwelcome->decode($_POST['ref_id']);
            $con = $this->Mwelcome->getContractWriting(array('id_contract_writing' => $_POST['ref_id']));
            $this->Mwelcome->updateContractWriting(array('id_contract_writing' => $_POST['ref_id'],'status' => 'closed'));
            $this->Mwelcome->addRating(array('lawyer_id' => $con[0]['lawyer_id'],'user_id' => $this->session->userdata('user_id'),'rating' => $_POST['cur_rating'],'reference_id' => $_POST['ref_id'],'reference_type' => $_POST['ref_type']));
        }
        else if($_POST['ref_type']=='appeal')
        {
            $_POST['ref_id'] = $this->Mwelcome->decode($_POST['ref_id']);
            $con = $this->Mwelcome->getAppeal(array('id_appeal' => $_POST['ref_id']));
            $this->Mwelcome->updateAppeal(array('id_appeal' => $_POST['ref_id'],'status' => 'closed'));
            $this->Mwelcome->addRating(array('lawyer_id' => $con[0]['lawyer_id'],'user_id' => $this->session->userdata('user_id'),'rating' => $_POST['cur_rating'],'reference_id' => $_POST['ref_id'],'reference_type' => $_POST['ref_type']));
        }

        redirect(str_replace('/','',BASE_URL).$_POST['uri']);
    }*/

    function closeConsult()
    {
        
        
        $base_url = str_replace('index.php/','',$_POST['uri']);
        if(!isset($_POST['type'])){
            $_POST['type'] = 'lawyer';
        }
        if($_POST['ref_type']=='consultation')
        {
            $_POST['ref_id'] = $this->Mwelcome->decode($_POST['ref_id']);
            $con = $this->Mwelcome->consultation(array('id_consultation' => $_POST['ref_id']));
            $this->Mwelcome->updateConsultation(array('id_consultation' => $_POST['ref_id'],'status' => 'closed'));
            $this->Mwelcome->addRating(array('lawyer_id' => $con[0]['lawyer_id'],'user_id' => $this->session->userdata('user_id'),'rating' => $_POST['cur_rating'],'reference_id' => $_POST['ref_id'],'reference_type' => $_POST['ref_type'],'type' => $_POST['type']));
        }
        else if($_POST['ref_type']=='company')
        {
            $_POST['ref_id'] = $this->Mwelcome->decode($_POST['ref_id']);
            $con = $this->Mwelcome->getEstablishCompany(array('id_company' => $_POST['ref_id']));
            $this->Mwelcome->updateEstablishCompany(array('id_company' => $_POST['ref_id'],'status' => 'closed'));
            $this->Mwelcome->addRating(array('lawyer_id' => $con[0]['lawyer_id'],'user_id' => $this->session->userdata('user_id'),'rating' => $_POST['cur_rating'],'reference_id' => $_POST['ref_id'],'reference_type' => $_POST['ref_type'],'type' => $_POST['type']));
        }
        else if($_POST['ref_type']=='contract')
        {
            $_POST['ref_id'] = $this->Mwelcome->decode($_POST['ref_id']);
            $con = $this->Mwelcome->getContractWriting(array('id_contract_writing' => $_POST['ref_id']));
            $this->Mwelcome->updateContractWriting(array('id_contract_writing' => $_POST['ref_id'],'status' => 'closed'));
            $this->Mwelcome->addRating(array('lawyer_id' => $con[0]['lawyer_id'],'user_id' => $this->session->userdata('user_id'),'rating' => $_POST['cur_rating'],'reference_id' => $_POST['ref_id'],'reference_type' => $_POST['ref_type'],'type' => $_POST['type']));
        }
        else if($_POST['ref_type']=='appeal')
        {
            $_POST['ref_id'] = $this->Mwelcome->decode($_POST['ref_id']);
            $con = $this->Mwelcome->getAppeal(array('id_appeal' => $_POST['ref_id']));
            $this->Mwelcome->updateAppeal(array('id_appeal' => $_POST['ref_id'],'status' => 'closed'));
            $this->Mwelcome->addRating(array('lawyer_id' => $con[0]['lawyer_id'],'user_id' => $this->session->userdata('user_id'),'rating' => $_POST['cur_rating'],'reference_id' => $_POST['ref_id'],'reference_type' => $_POST['ref_type'],'type' => $_POST['type']));
        }

        redirect($base_url);
        
    }

    function getContent()
    {
        $con = '';
        if($_POST['ref_type']=='consultation')
        {
            $_POST['ref_id'] = $this->Mwelcome->decode($_POST['ref_id']);
            $con = $this->Mwelcome->consultation(array('id_consultation' => $_POST['ref_id']));
            $con[0]['attachment'] = $this->Mwelcome->getAttachment(array('type' => 'consultation','reference_id' => $con[0]['id_consultation']));
        }
        else if($_POST['ref_type']=='company')
        {
            $_POST['ref_id'] = $this->Mwelcome->decode($_POST['ref_id']);
            $con = $this->Mwelcome->getEstablishCompany(array('id_company' => $_POST['ref_id']));
            $con[0]['attachment'] = $this->Mwelcome->getAttachment(array('type' => 'company','reference_id' => $con[0]['id_company']));
        }
        else if($_POST['ref_type']=='contract')
        {
            $_POST['ref_id'] = $this->Mwelcome->decode($_POST['ref_id']);
            $con = $this->Mwelcome->getContractWriting(array('id_contract_writing' => $_POST['ref_id']));
            $con[0]['attachment'] = $this->Mwelcome->getAttachment(array('type' => 'contract_writing','reference_id' => $con[0]['id_contract_writing']));
        }
        else if($_POST['ref_type']=='appeal')
        {
            $_POST['ref_id'] = $this->Mwelcome->decode($_POST['ref_id']);
            $con = $this->Mwelcome->getAppeal(array('id_appeal' => $_POST['ref_id']));
            $con[0]['attachment'] = $this->Mwelcome->getAttachment(array('type' => 'appeal','reference_id' => $con[0]['id_appeal']));
        }

        echo json_encode(array('response' => 1, 'data' => $con));
    }

    function follow()
    {
        require_once 'twitteroauth/twitteroauth.php';
        $toa = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
        $data['tweets'] = $toa->get('statuses/user_timeline');

        $data['header']="header";
        $data['middle_content']='twitter';
        $data['footer']='footer';
        $data['menu'] = 'follow';
        $this->load->view('landing',$data);
    }

    function content($menu_flag)
    {
        $data['article'] = $this->Mwelcome->getArticle(array('category_flag_id' => $menu_flag,'language_id' => $this->session->userdata('language_id')));
        $data['header']="header";
        $data['middle_content']='content';
        $data['footer']='footer';
        $data['menu'] = 'appeal';
        $this->load->view('landing',$data);
    }

    function getArticleContent()
    {
        $data = $this->Mwelcome->getArticle(array('menu_id' => $_POST['menu_id'],'language_id' => $this->session->userdata('language_id')));
        $content = '';
        if(isset($data[0]['content'])){ $content = $data[0]['content']; }
        echo json_encode(array('response' =>1, 'data' => $content));
    }

    function forum($start=0)
    {
        if($this->session->userdata('user_id')) {
            $data['forum'] = $this->Mwelcome->getForum(array('offset' => $start, 'limit' => 12));
            /*for($s=0;$s<count($data['forum']);$s++){
                $data['forum'][$s]['attchments'] = $this->Mwelcome->getAttachment(array('type' => 'forum','reference_id' => $data['forum'][$s]['id_forum']));
            }*/
            $total_rows = $this->Mwelcome->getForumCount();
            if ($total_rows > 12) {
                $config['base_url'] = BASE_URL . 'index.php/Welcome/forum';
                $config['total_rows'] = $total_rows;
                $config['per_page'] = 12;
                $this->pagination->initialize($config);
                $data['pages'] = $this->pagination->create_links();
            } else {
                $data['pages'] = '';
            }

            $data['header'] = "header";
            $data['middle_content'] = 'forum';
            $data['footer'] = 'footer';
            $data['menu'] = 'forum';
            $this->load->view('landing', $data);
        }
        else{
            redirect(BASE_URL);
        }
    }

    function addForum()
    {
        if($this->session->userdata('user_id'))
        {
            $data = array(
                'user_id' => $this->session->userdata('user_id'),
                'title' => $_POST['title'],
                'description' => $_POST['description']
            );

            $id = $this->Mwelcome->addForum($data);

            if(isset($_FILES['attachment']) && !empty($_FILES['attachment']))
            {
                for($s=0;$s<count($_FILES['attachment']['name']);$s++)
                {
                    if($_FILES['attachment']['name'][$s]!=''){
                        $image = do_upload($_FILES['attachment']['name'][$s],$_FILES['attachment']['tmp_name'][$s],'');
                        //$data['attachment'] = $image;
                        $attachments[] = array(
                            'type' => 'forum',
                            'reference_id' => $id,
                            'attachment' => $image
                        );
                    }

                }
                if(!empty($attachments))
                    $this->Mwelcome->addAttachments($attachments);
            }

            $this->session->set_userdata('message','Success..! Forum Need approval from admin to publish');
            redirect(BASE_URL.'index.php/Welcome/forum');
        }
        else{
            redirect(BASE_URL);
        }
    }

    function forgetPassword()
    {
        $data['header'] = "header";
        $data['middle_content'] = 'forget_password';
        $data['footer'] = 'footer';
        $data['menu'] = 'forum';
        $this->load->view('landing', $data);
    }

    function getForgetPassword()
    {
        if(isset($_POST))
        {
            $data = $this->Mwelcome->getUsersList($_POST);
            if(empty($data))
            {
                $this->session->set_userdata('message','No registration with this email!');
                redirect(BASE_URL.'index.php/Welcome/forgetPassword');
            }
            else
            {
                if($_POST['user_type_id']==2)
                { 
                    $title = 'Lawyer'; 
                }
                elseif($_POST['user_type_id']==3)
                {   
                    $title = 'User';    
                }
                
                $password = mt_rand();
                $this->Mwelcome->updateUser(array('password' => md5($password)),$data[0]['id_user']);

                $subject="Lawm | Password Reset";

                //require_once("mailer/mailer.php");
                //sendmail($_POST['email'],'Lawm || password','<p>Hello, '.$_POST['email'].'</p><p>Your New Password is '.$password.'</p>');
                $msg = '';
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From: no-reply@lawm.sa\r\nReply-to: no-reply@lawm.sa";
                mail($_POST['email'],$subject,'<p>Hello, '.$_POST['email'].'</p><p>Your '.$title.' account password is reset to '.$password.'. Please update your password to a new password after login.</p>',$headers);

                $this->session->set_userdata('message','Your password is mailed to you');
                redirect(BASE_URL.'index.php/Welcome/login');
            }
        }
    }

    function lawyers($start=0,$search='')
    {
        $data['lawyer_list'] = $this->Mwelcome->getUsersList(array('user_type_id' => 2,'search_key' => $search,'offset' => $start, 'limit' => 12));
        $total_rows = count($this->Mwelcome->getUsersList(array('user_type_id' => 2)));
        if ($total_rows > 12) {
            $config['base_url'] = BASE_URL . 'index.php/Welcome/lawyers';
            $config['total_rows'] = $total_rows;
            $config['per_page'] = 12;
            $this->pagination->initialize($config);
            $data['pages'] = $this->pagination->create_links();
        }
        else
        {
            $data['pages'] = '';
        }
        $data['search_key'] = $search;
        $data['header'] = "header";
        $data['middle_content'] = 'lawyer_list';
        $data['footer'] = 'footer';
        $data['menu'] = 'lawyer_list';
        $this->load->view('landing', $data);
    }

    function getUser()
    {
        $user_id = $_POST['user_id'];
        $data = $this->Mwelcome->getUser($user_id);
        echo json_encode(array('response' => 1,'data' => $data));
    }

    function article($id)
    {
        if($id==='' || $id===0){
            redirect(BASE_URL);
        }
        $content = $this->Mwelcome->getArticle(array('menu_id' => $this->Mwelcome->decode($id),'language_id' => $this->session->userdata('language_id')));
        if(isset($content[0]['content'])){ $data['content'] = $content[0]['content']; }

        $data['menu_id'] = $id;
        $data['header']="header";
        $data['footer']='footer';
        $data['menu'] = '';
        $this->load->view('landing',$data);
    }

    function activeAccount($id=0)
    {

            $user = $this->Mwelcome->getUser($this->Mwelcome->decode($id));
            if(!empty($user) && $user[0]['user_status']==0)
            {
                $this->Mwelcome->updateUser(array('user_status' => 1),$user[0]['id_user']);
                $this->session->set_userdata('message','Account Activated Successfully...');
                redirect(BASE_URL.'index.php/welcome/login');
            }
            else{
                $this->session->set_userdata('message','Activation Link Expired....');
                redirect(BASE_URL.'index.php/welcome/login');
            }

    }
    function payment($type,$service_id,$amount)
    {

        error_reporting(E_ALL);
        ini_set('display_errors', '1');

        require_once 'PayfortIntegration.php';
        $testMode = TRUE;

        $amount                 = $amount; // amount of the transaction , please check amount parameter in the integration guide
        $currency               = 'SAR'; // currncy of the order
        $merchant_identifier    = 'yhrReESE'; // you will find this value under security settings of your account
        $access_code            = 'So12X4EWsfAJPbiOiRqS'; // you will find this value under security settings of your account
        $order_description      = ''; // description of the order
        $customer_email         = $this->session->userdata('user_email'); // email of the customer
        $customer_ip            = ''; // IP address of the client
        $language               = 'en'; // en or ar
        $command                = 'PURCHASE'; // one of the values listed in the integration guide
        $return_url             = BASE_URL.'index.php/Welcome/paymentResponse/'.$type; // Full URL of the return page , customer will be redirected to this URL after completing the transaction
        $merchant_reference     = uniqid().'_'.$this->Mwelcome->decode($service_id); // order reference from the merchant for this transaction

        //echo $merchant_reference; exit;

        $payfortIntegration = new PayfortIntegration();

// 1- set request parameters
        $payfortIntegration->amount                 = $amount;
        $payfortIntegration->currency               = $currency ;
        $payfortIntegration->merchant_identifier    = $merchant_identifier;
        $payfortIntegration->access_code            = $access_code;
        $payfortIntegration->order_description      = $order_description;
        $payfortIntegration->merchant_reference     = $merchant_reference;
        $payfortIntegration->customer_ip            = $customer_ip;
        $payfortIntegration->customer_email         = $customer_email;
        $payfortIntegration->language               = $language;
        $payfortIntegration->command                = $command;
        $payfortIntegration->return_url             = $return_url;

// 2- generate request Paramters
        $requestParams  = $payfortIntegration->getRequestParams();

// 3- generate request signature
        $signature      = $payfortIntegration->calculateSignature($requestParams, 'kejkeoelleol', 'sha128');

// 4- add signature to the request
        $requestParams['signature'] = $signature;

// 5-redirect to pafort payment page
        $payfortIntegration->redirect($testMode, $requestParams, 'POST');
    }

    function paymentResponse($type)
    {
        error_reporting(E_ALL);
        ini_set('display_errors', '1');

        require_once 'PayfortIntegration.php';

        $payfortIntegration = new PayfortIntegration();

        $service_id = explode('_',$_REQUEST['merchant_reference'])[1];
        $response_code =  $_REQUEST['response_code'];
        $amount =  $_REQUEST['amount'];
        $response_code =  $_REQUEST['response_code'];
        $response_message =  $_REQUEST['response_message'];

        $transactionContent = array(
            'reference_type' => $type,
            'reference_id' => $service_id,
            'amount' => $amount,
            'response_code' => $response_code,
            'response_message' => $response_message,
            'user_id' => $this->session->userdata('user_id')
        );

        $this->Mwelcome->addServiceTransaction($transactionContent);
        if($response_code == 14000)
        {
            $payment_status = 'paid';
            if($type)
            {
                if($type == 'consultation')
                    $this->Mwelcome->updateConsultation(['id_consultation' => $service_id, 'payment_status' => $payment_status]);
                else if($type == 'contract-writing')
                    $this->Mwelcome->updateContractWriting(['id_contract_writing' => $service_id, 'payment_status' => $payment_status]);
                else if($type == 'company')
                    $this->Mwelcome->updateEstablishCompany(['id_company' => $service_id, 'payment_status' => $payment_status]);
                else if($type == 'appeal')
                    $this->Mwelcome->updateAppeal(['id_appeal' => $service_id, 'payment_status' => $payment_status]);

            }
        }

        $this->session->set_userdata('message',$response_message);
        redirect(BASE_URL.'index.php/Welcome/comments/'.$type.'/'.$this->Mwelcome->encode($service_id));



//check if there are return parameters inside payfort responce (option "Send Response Parameters" should be activated inside your account)
        if (isset($_REQUEST['signature']) AND !empty($_REQUEST['signature'])) {
            //calculate Signature after back to merchant and comapre it with request Signature
            $arrData = $_REQUEST;
            unset($arrData['signature']);
            $returnSignature = $payfortIntegration->calculateSignature($arrData, 'kejkeoelleol', 'sha128');

            //if ($returnSignature == $_REQUEST['signature']) {
            //valide request
            echo "Response Message : " . $_REQUEST['response_message'];
            echo "<br>";
            echo "Response Code    : " . $_REQUEST['response_code'];
            /*  } else {
                  echo "Signature Mismatch";
              }*/

        } else {
            //check your (Send Response Parameters) option inside your Technical Settings configration in your Payfort account
        }
    }

    function Language($language_id)
    {
        //echo "<pre>";print_r($_SERVER); exit;
        if($language_id){
            $this->session->set_userdata('language_id',$language_id);
            if($language_id==1){
                $this->lang->load('english_lang','english');
            }
            else if($language_id==2){
                $this->lang->load('arabic_lang','arabic');
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */