<?php

class Welcome extends Controller {

   
    function adminLanguageSelector()
    {
        
        if(!$this->session->userdata('language_id'))
        {
            $this->session->set_userdata('language_id',2);
        }

        if($this->session->userdata('language_id')==1)
        {
            $this->lang->load('english','english');
        }else if($this->session->userdata('language_id')==2)
        {
            $this->lang->load('arabic','arabic');
        }
        
    }
    
    
    function Welcome()
	{
		parent::Controller();
        $this->load->database();             
        $this->load->library('Datatables');
        $this->load->library('Session');
        $this->load->helper('url');
        $this->load->model("mwelcome");
	}
	
	function index()
	{
        
        $this->adminLanguageSelector();
        
        if($this->session->userdata('user_id')){
            $data['service_count'] = $this->mwelcome->getServiceCount();
            $data['service_amount'] = $this->mwelcome->getServiceAmount();          
            
            $data['header']="header";
            $data['left_menu']="left_menu";
            $data['middle_content']='index';
            $data['footer']='footer';
            $data['menu'] = 'dashboard';
            $this->load->view('landing',$data);
        }
        else
        {
            $data['header']="";
            $data['left_menu']="";
            $data['middle_content']='login';
            $data['footer']='';
            $this->load->view('landing',$data);
        }
	}

    
    
    //language change start
    
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
    
    function content($menu_flag)
    {
        $data['article'] = $this->mwelcome->getArticle(array('category_flag_id' => $menu_flag,'language_id' => $this->session->userdata('language_id')));
        $data['header']="header";
        $data['middle_content']='content';
        $data['footer']='footer';
        $data['menu'] = 'appeal';
        $this->load->view('landing',$data);
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
    
    //language change end
        
        
        
    function users()
    {
        
        $this->adminLanguageSelector();
        
        if($this->session->userdata('user_id')){
            $data['header']="header";
            $data['left_menu']="left_menu";
            $data['middle_content']='users';
            $data['footer']='footer';
            $data['menu'] = 'users';
            $this->load->view('landing',$data);
        }
        else
        {
            redirect(ADMIN_BASE_URL.'index.php?welcome/index');
        }
    }

    function lawyers()
    {
        $this->adminLanguageSelector();

        $data['header']="header";
        $data['left_menu']="left_menu";
        $data['middle_content']='lawyers';
        $data['footer']='footer';
        $data['menu'] = 'Lawyers';
        $this->load->view('landing',$data);
    }

    function makeLogin()
    {
        if(isset($_POST) && !empty($_POST) && !empty($_POST['email']) && !empty($_POST['password']))
        {
            $data=$this->mwelcome->login($_POST);
            if(!empty($data)) 
            {
                $data = array('user_id' => $data[0]['id_user'],
                    'user_type_id' => $data[0]['user_type_id'],
                    'user_name' => $data[0]['username'],
                    'user_email' => $data[0]['email']
                );
                $this->session->set_userdata($data);
            }
            else
            {
                $this->session->set_userdata('message','You are not an authorised admin');
            }
            //echo "<pre>"; print_r($this->session->userdata); exit;
            redirect(ADMIN_BASE_URL.'index.php?welcome/index');

        }
        else
        {
            $this->session->set_userdata('message','Please enter valid Email & Password');
            redirect(ADMIN_BASE_URL.'index.php?welcome/index');
        }
    }

    function logout()
    {
        $this->session->set_userdata(
            'user_id', '',
            'user_type_id', '',
            'user_name', '',
            'user_email', ''
        );

        $this->session->unset_userdata();
        redirect(ADMIN_BASE_URL.'index.php?welcome/index');
    }

    function forgetPassword()
    {
        $this->adminLanguageSelector();

        $data['header']="";
        $data['left_menu']="";
        $data['middle_content']='forgetpassword';
        $data['footer']='';
        $this->load->view('landing',$data);
    }



    public function getForgetPassword()
    {
        if(isset($_POST))
        {
            $email = $_POST['email'];
            $user_data = $this->mwelcome->verifyEmail($email);
            if(empty($user_data)){
                $this->session->set_userdata('message','Invalid Email');
            }
            else
            {
                $password = $this->randomString(8);
                $this->mwelcome->changePassword($password,$user_data[0]['id_user']);
                $this->session->set_userdata('message','New password has been mailed you.');
                $headers = "From: no-reply@lawm.sa\r\nReply-to: no-reply@lawm.sa";
                mail($email,'Password | Reset','hello '.$email.', <p>Your new password is: '.$password.'</p>',$headers);
            }
            redirect(ADMIN_BASE_URL.'index.php?welcome/forgetPassword');
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
        $this->adminLanguageSelector();

        $data['header']="header";
        $data['left_menu']="left_menu";
        $data['middle_content']='changepassword';
        $data['footer']='footer';
        $data['menu'] = 'change-password';
        $this->load->view('landing',$data);
    }

    function makeChangePassword()
    {
        if(isset($_POST['password']))
        {
            $this->mwelcome->changePassword($_POST['password'],$this->session->userdata('user_id'));
            $this->session->set_userdata('message','Password Changed Successfully.');
            redirect(ADMIN_BASE_URL.'index.php?welcome/changePassword');
        }
        else
        {
            redirect(ADMIN_BASE_URL.'index.php?welcome/changePassword');
        }
    }

    function getUsers($type)
    {
        echo $this->mwelcome->getUsers($type);
    }

    function menu()
    {
        $this->adminLanguageSelector();

        $data['parent_menu'] = $this->mwelcome->getMenuList(array('parent_id' => 0, 'status' => 1,'language_id' => 1));
        $data['menu_data'] = $this->mwelcome->getMenuList(array('language_id' => 1));
        //echo "<pre>";print_r($data['menu_data']); exit;
        $data['header']="header";
        $data['left_menu']="left_menu";
        $data['middle_content']='menu';
        $data['footer']='footer';
        $data['menu'] = 'menu';
        $this->load->view('landing',$data);
    }

    function menuDataTable()
    {
        $data =  json_decode($this->mwelcome->getMenuDataTable($_POST));

        for($s=0;$s<count($data->data);$s++)
        {
            $data->data[$s]['0'] = addslashes($data->data[$s]['0']);
        }

        echo json_encode($data);
    }

    function getParentMenu()
    {
        $data = $this->mwelcome->getMenuList(array('parent_id' => 0, 'status' => 1,'language_id' => 1));
        echo json_encode(array('response' => 1, 'data' => $data));
    }

    function getLanguage()
    {
        $data = $this->mwelcome->getLanguage();
        echo json_encode(array('response' => 1, 'data' => $data));
    }

    function menuOperations()
    {
        //echo "<pre>";print_r($_POST); exit;
        if($this->session->userdata('user_id')){

            if(isset($_POST))
            {
                $this->mwelcome->$_POST['action']($_POST);
                if($_POST['action']=='deleteMenu'){ echo 1; exit; }
                redirect(ADMIN_BASE_URL.'index.php?welcome/menu');
            }
            else{
                redirect(ADMIN_BASE_URL.'index.php?welcome/index');
            }
        }
        else
        {
            redirect(ADMIN_BASE_URL.'index.php?welcome/index');
        }
    }

    function getMenuByFlag()
    {
        $data = $this->mwelcome->getMenuList(array('menu_id' => $_POST['menu_id']));
        echo json_encode($data);

    }

    function getCategoryByFlag()
    {
        $data = $this->mwelcome->category($_POST['category_flag']);
        echo json_encode($data);
    }

    function getArticleById()
    {
        $data = $this->mwelcome->getArticleById($_POST['article_id']);
        echo json_encode($data);
    }

    function category()
    {
        $this->adminLanguageSelector();

        $data['category_data'] = $this->mwelcome->getCategory(array('language_id' => 1));
        $data['menu_drp'] = $this->mwelcome->getMenuGroupByFlag(array());
        $data['header']="header";
        $data['left_menu']="left_menu";
        $data['middle_content']='category';
        $data['footer']='footer';
        $data['menu'] = 'category';
        $this->load->view('landing',$data);
    }

    function categoryOperations()
    {
        if($this->session->userdata('user_id')){
            if(isset($_POST))
            {
                if(!isset($_POST['category_flag']) || (isset($_POST['category_flag']) && $_POST['category_flag']=='')){
                    $category_flag = $this->mwelcome->getFlag('menu');
                    if($category_flag[0]['category_flag']==''){ $category_flag[0]['category_flag']=0; }
                    $category_flag = ($category_flag[0]['category_flag']+1);
                }
                else { $category_flag = $_POST['category_flag']; }
                $this->mwelcome->$_POST['action']($_POST,$category_flag);
                if($_POST['action']=='deleteCategory'){ echo 1; exit; }
                redirect(ADMIN_BASE_URL.'index.php?welcome/category');
            }
            else{
                redirect(ADMIN_BASE_URL.'index.php?welcome/index');
            }
        }
        else
        {
            redirect(ADMIN_BASE_URL.'index.php?welcome/index');
        }
    }

    function article()
    {
        $this->adminLanguageSelector();

        //$data['category_drp'] = $this->mwelcome->getCategoryByFlag(array('status' => 1));
        $data['menu_drp'] = $this->mwelcome->getMenuList(array('language_id' => 1));;
        //$data['article_data'] = $this->mwelcome->getArticle(array('language_id' => 1));
        $data['article_data'] = $this->mwelcome->getMenuArticle(array('language_id' => 1));
        //$data['menu_drp'] = $this->mwelcome->getMenuGroupByFlag(array('status' => 1));
        $data['header']="header";
        $data['left_menu']="left_menu";
        $data['middle_content']='article';
        $data['footer']='footer';
        $data['menu'] = 'article';
        $this->load->view('landing',$data);
    }

    function articleOperations()
    {
        if($this->session->userdata('user_id')){
            if(isset($_POST))
            {
                $this->mwelcome->$_POST['action']($_POST);
                if($_POST['action']=='deleteArticle'){ echo 1; exit; }
                redirect(ADMIN_BASE_URL.'index.php?welcome/article');
            }
            else{
                redirect(ADMIN_BASE_URL.'index.php?welcome/index');
            }
        }
        else
        {
            redirect(ADMIN_BASE_URL.'index.php?welcome/index');
        }
    }

    function service()
    {
        $this->adminLanguageSelector();

        $data['service_data'] = $this->mwelcome->getService(array('language_id' => 1));
        $data['header']="header";
        $data['left_menu']="left_menu";
        $data['middle_content']='service';
        $data['footer']='footer';
        $data['menu'] = 'service';
        $this->load->view('landing',$data);
    }


    function serviceOperations()
    {
        if($this->session->userdata('user_id')){
            if(isset($_POST))
            {
                if(!isset($_POST['service_flag']) || (isset($_POST['service_flag']) && $_POST['service_flag']=='')){
                    $service_flag = $this->mwelcome->getFlag('service');
                    if($service_flag==''){ $service_flag=0; }
                    $service_flag = ($service_flag[0]['service_flag']+1);
                }
                else { $service_flag = $_POST['service_flag']; }
                $this->mwelcome->$_POST['action']($_POST,$service_flag);

                redirect(ADMIN_BASE_URL.'index.php?welcome/service');
            }
            else{
                redirect(ADMIN_BASE_URL.'index.php?welcome/index');
            }
        }
        else
        {
            redirect(ADMIN_BASE_URL.'index.php?welcome/index');
        }
    }

    function getServiceByFlag()
    {
        $data = $this->mwelcome->getServiceByFlag($_POST['service_flag']);
        echo json_encode($data);

    }

    function consultation()
    {
        $this->adminLanguageSelector();

        $data['consultation_data'] = $this->mwelcome->getServiceData(array('type' => 'consultation'));
        $data['header']="header";
        $data['left_menu']="left_menu";
        $data['middle_content']='consultation';
        $data['footer']='footer';
        $data['menu'] = 'consultation';
        $this->load->view('landing',$data);
    }

    function establishCompany()
    {
        $this->adminLanguageSelector();

        $data['consultation_data'] = $this->mwelcome->getServiceData(array('type' => 'company'));
        $data['header']="header";
        $data['left_menu']="left_menu";
        $data['middle_content']='company';
        $data['footer']='footer';
        $data['menu'] = 'company';
        $this->load->view('landing',$data);
    }

    function contractWriting()
    {
        $this->adminLanguageSelector();

        $data['consultation_data'] = $this->mwelcome->getServiceData(array('type' => 'contractWriting'));
        $data['header']="header";
        $data['left_menu']="left_menu";
        $data['middle_content']='contract_writing';
        $data['footer']='footer';
        $data['menu'] = 'contentWriting';
        $this->load->view('landing',$data);
    }

    function appeal()
    {
        $this->adminLanguageSelector();

        $data['consultation_data'] = $this->mwelcome->getServiceData(array('type' => 'appeal'));
        $data['header']="header";
        $data['left_menu']="left_menu";
        $data['middle_content']='appeal';
        $data['footer']='footer';
        $data['menu'] = 'appeal';
        $this->load->view('landing',$data);
    }


    function getServiceData()
    {
        if($_POST['type']=='consultation'){ $_POST['id_consultation'] = $_POST['id']; $type = 'consultation'; }
        if($_POST['type']=='company'){ $_POST['id_company'] = $_POST['id']; $type = 'company'; }
        if($_POST['type']=='contractWriting'){ $_POST['id_contract_writing'] = $_POST['id']; $type = 'contract-writing'; }
        if($_POST['type']=='appeal'){ $_POST['id_appeal'] = $_POST['id']; $type = 'appeal'; }

        $data = $this->mwelcome->getServiceData($_POST);
        $data[0]['attachments'] = $this->mwelcome->getAttachments(array('reference_id' => $_POST['id'],'type' => $type));
        echo json_encode($data);
    }


    function getLawyerList()
    {
        $_POST['user_type_id'] = 2;
        $data = $this->mwelcome->getUsersList($_POST);
        echo json_encode($data);
    }

    function ServiceDataUpdate()
    {
        //echo "<pre>";print_r($_POST); exit;
        if($_POST['type']=='consultation'){ $_POST['id_consultation'] = $_POST['id']; }
        if($_POST['type']=='company'){ $_POST['id_company'] = $_POST['id']; }
        if($_POST['type']=='contractWriting'){ $_POST['id_contract_writing'] = $_POST['id']; }
        if($_POST['type']=='appeal'){ $_POST['id_appeal'] = $_POST['id']; }
        unset($_POST['id']);
        $this->mwelcome->updateServiceData($_POST);

        if($_POST['type']=='consultation'){ redirect(ADMIN_BASE_URL.'index.php/welcome/consultation'); }
        if($_POST['type']=='company'){ redirect(ADMIN_BASE_URL.'index.php/welcome/establishCompany'); }
        if($_POST['type']=='contractWriting'){ redirect(ADMIN_BASE_URL.'index.php/welcome/contractWriting'); }
        if($_POST['type']=='appeal'){ redirect(ADMIN_BASE_URL.'index.php/welcome/appeal'); }
    }

    function forum()
    {
        $this->adminLanguageSelector();

        $data['header']="header";
        $data['left_menu']="left_menu";
        $data['middle_content']='forum';
        $data['footer']='footer';
        $data['menu'] = 'forum';
        $this->load->view('landing',$data);
    }

    function getForumList()
    {
        $data =  json_decode($this->mwelcome->getForumList());
        $arr = (array)$data->data;

        for($r=0;$r<count($arr);$r++)
        {
            $att_div = '';
            $attachment = $this->mwelcome->getAttachments(array('reference_id' => $arr[$r][4],'type' => 'forum'));
            for($t=0;$t<count($attachment);$t++){
                if($t>0){ $att_div .=', '; }
                $att_div .= '<a target="_blank" href="'.$attachment[$t]['attachment'].'">Attachment-'.($t+1).'</a>';
            }

            $arr[$r][5] = $arr[$r][4];
            $arr[$r][4] = $att_div;
        }
        $data->data = $arr;
        echo json_encode($data);
    }

    function deleteForum()
    {
        $this->mwelcome->deleteForum($_POST['id']);
        echo json_encode(array('response' =>1,'data' => ''));
    }

    function changeForumStatus()
    {
        $this->mwelcome->changeForumStatus($_POST);
        echo json_encode(array('response' =>1,'data' => ''));
    }

    function addForum()
    {
        $id = $this->mwelcome->addForum(array('user_id'=>$this->session->userdata('user_id'),'title' => $_POST['title'],'description' => $_POST['description'],'status' => 1));

        if(isset($_FILES['attachment']) && !empty($_FILES['attachment']))
        {
            for($s=0;$s<count($_FILES['attachment']['name']);$s++)
            {
                if($_FILES['attachment']['name'][$s]!=''){
                    $image = do_upload($_FILES['attachment']['name'][$s],$_FILES['attachment']['tmp_name'][$s],'');
                    //$data['attachment'] = $image;
                    $attachments = array(
                        'type' => 'forum',
                        'reference_id' => $id,
                        'attachment' => $image
                    );

                    $this->mwelcome->addAttachments($attachments);
                }

            }

        }

        redirect(ADMIN_BASE_URL.'index.php/welcome/forum');
    }

    function getUserDetails($user_id)
    {
        $data = $this->mwelcome->getUserDetails($user_id);
        $type = '';
        if($data[0]['user_type_id']==2)
        { 
            $type = 'lawyer'; 
        }
        if($data[0]['user_type_id']==3)
        { 
            $type = 'user'; 
        }
        $data = $this->mwelcome->getUserDetails($user_id,$type);
        echo json_encode(array('response' =>1,'data' => $data));
    }

    function changeUserStatus()
    {
        $this->mwelcome->changeUserStatus($_POST);
        echo json_encode(array('response' =>1,'data' => ''));
    }

    function speciality()
    {
        $this->adminLanguageSelector();

        $data['header']="header";
        $data['left_menu']="left_menu";
        $data['middle_content']='speciality';
        $data['footer']='footer';
        $data['menu'] = 'speciality';
        $this->load->view('landing',$data);
    }

    function getSpecialityList()
    {
        echo $this->mwelcome->getSpecialityList();
    }

    function deleteSpeciality()
    {
        $this->mwelcome->deleteSpeciality($_POST['id']);
        echo json_encode(array('response' =>1,'data' => ''));
    }

    function getSpeciality()
    {
        $data = $this->mwelcome->getSpeciality($_POST);
        echo json_encode(array('response' =>1,'data' => $data));
    }

    function changeSpecialityStatus()
    {
        $this->mwelcome->changeSpecialityStatus($_POST);
        echo json_encode(array('response' =>1,'data' => ''));
    }

    function addSpeciality()
    {
        if(isset($_POST['id_speciality']) && $_POST['id_speciality']!=''){
            $this->mwelcome->updateSpeciality(array('speciality' => $_POST['speciality'],'id_speciality' => $_POST['id_speciality']));
        }
        else
            $this->mwelcome->addSpeciality(array('speciality' => $_POST['speciality']));
        redirect(ADMIN_BASE_URL.'index.php/welcome/speciality');
    }

    function consultationType()
    {
        $this->adminLanguageSelector();

        $data['header']="header";
        $data['left_menu']="left_menu";
        $data['middle_content']='consultation_type';
        $data['footer']='footer';
        $data['menu'] = 'consultation_type';
        $this->load->view('landing',$data);
    }

    function getConsultationTypeList()
    {
        echo $this->mwelcome->getConsultationTypeList();
    }

    function deleteConsultationType()
    {
        $this->mwelcome->deleteConsultationType($_POST['id']);
        echo json_encode(array('response' =>1,'data' => ''));
    }

    function getConsultationType()
    {
        $data = $this->mwelcome->getConsultationType($_POST);
        echo json_encode(array('response' =>1,'data' => $data));
    }

    function addConsultationType()
    {
        if(isset($_POST['id_consultation_type']) && $_POST['id_consultation_type']!=''){
            $this->mwelcome->updateConsultationType(array('consultation_type' => $_POST['consultation_type'],'id_consultation_type' => $_POST['id_consultation_type']));
        }
        else
            $this->mwelcome->addConsultationType(array('consultation_type' => $_POST['consultation_type']));
        redirect(ADMIN_BASE_URL.'index.php/welcome/consultationType');
    }

    function appealType()
    {
        $this->adminLanguageSelector();

        $data['header']="header";
        $data['left_menu']="left_menu";
        $data['middle_content']='appeal_type';
        $data['footer']='footer';
        $data['menu'] = 'appeal_type';
        $this->load->view('landing',$data);
    }

    function getAppealTypeList()
    {
        echo $this->mwelcome->getAppealTypeList();
    }

    function deleteAppealType()
    {
        $this->mwelcome->deleteAppealType($_POST['id']);
        echo json_encode(array('response' =>1,'data' => ''));
    }

    function getAppealType()
    {
        $data = $this->mwelcome->getAppealType($_POST);
        echo json_encode(array('response' =>1,'data' => $data));
    }

    function addAppealType()
    {
        if(isset($_POST['id_appeal_type']) && $_POST['id_appeal_type']!=''){
            $this->mwelcome->updateAppealType(array('appeal_type' => $_POST['appeal_type'],'id_appeal_type' => $_POST['id_appeal_type']));
        }
        else
            $this->mwelcome->addAppealType(array('appeal_type' => $_POST['appeal_type']));
        redirect(ADMIN_BASE_URL.'index.php/welcome/appealType');
    }

    function getCountryList()
    {
        $data = $this->mwelcome->getCountryList();
        echo json_encode(array('response' =>1,'data' => $data));
    }

    function getSpecialityListDrp()
    {
        $data = $this->mwelcome->getSpeciality(array());
        echo json_encode(array('response' =>1,'data' => $data));
    }

    function updateUser()
    {
        $data = $_POST;
        $data['id_user'] = $data['user_id'];
        unset($data['user_id']);

        $path='uploads/'; $data['user_image'] = '';
        if(isset($_FILES) && isset($_FILES['user_image']['name']) && $_FILES['user_image']['name']!='')
        {
            $ext = pathinfo($_FILES['user_image']['name'], PATHINFO_EXTENSION);
            $allowed = array('jpeg', 'png', 'jpg', 'JPG', 'PNG', 'JPEG');
            if (!in_array($ext, $allowed)) {
                $this->session->set_userdata('message','Invalid image format');
            }
            else {
                list($txt, $ext) = explode(".", $_FILES['user_image']['name']);
                $imageName = str_replace(' ', '_', $txt) . "_" . time() . "." . $ext;
                move_uploaded_file($_FILES['user_image']['tmp_name'], $path . $imageName);
                $data['user_image'] = ADMIN_BASE_URL . $path . $imageName;
            }
        }
        else
        {
            unset($data['user_image']);
        }
        
        
        if(isset($data['password']) && trim($data['password'])!=''){
            $data['password'] = md5($data['password']);
        }
        else{
            unset($data['password']);
        }

        $this->mwelcome->updateUser($data);
        redirect(ADMIN_BASE_URL.'index.php?welcome/users');
    }

    
    function updateLawyer()
    {
        $data = $_POST;
        $data['id_user'] = $data['user_id'];
        unset($data['user_id']);

        $path='uploads/'; $data['user_image'] = '';
        if(isset($_FILES) && isset($_FILES['user_image']['name']) && $_FILES['user_image']['name']!='')
        {
            $ext = pathinfo($_FILES['user_image']['name'], PATHINFO_EXTENSION);
            $allowed = array('jpeg', 'png', 'jpg', 'JPG', 'PNG', 'JPEG');
            if (!in_array($ext, $allowed)) {
                $this->session->set_userdata('message','Invalid image format');
            }
            else {
                list($txt, $ext) = explode(".", $_FILES['user_image']['name']);
                $imageName = str_replace(' ', '_', $txt) . "_" . time() . "." . $ext;
                move_uploaded_file($_FILES['user_image']['tmp_name'], $path . $imageName);
                $data['user_image'] = ADMIN_BASE_URL . $path . $imageName;
            }
        }
        else
        {
            unset($data['user_image']);
        }

        if(isset($data['password']) && trim($data['password'])!='')
        {
            $data['password'] = md5($data['password']);
        }
        else
        {
            unset($data['password']);
        }

        $this->mwelcome->updateLawyer($data);
        redirect(ADMIN_BASE_URL.'index.php?welcome/lawyers');
    }

    function checkUser()
    {
        $data = $this->mwelcome->checkUser(array('user_type_id' => 3, 'email' => $_POST['email'],'id_user' => $_POST['id_user']));
        if(!empty($data)){
            echo json_encode(array('response' =>0,'data' => 'Email already exists')); exit;
        }
        else{
            $data = $this->mwelcome->checkUser(array('user_type_id' => 3, 'username' => $_POST['username'],'id_user' => $_POST['id_user']));
            if(!empty($data)){
                echo json_encode(array('response' =>0,'data' => 'Username already exists')); exit;
            }
            else{
                echo json_encode(array('response' =>1,'data' => '')); exit;
            }
        }
    }

    
    function checkLawyer()
    {
        $data = $this->mwelcome->checkUser(array('user_type_id' => 2, 'email' => $_POST['email'],'id_user' => $_POST['id_user']));
        if(!empty($data)){
            echo json_encode(array('response' =>0,'data' => 'Email already exists')); exit;
        }
        else{
            $data = $this->mwelcome->checkUser(array('user_type_id' => 2, 'username' => $_POST['username'],'id_user' => $_POST['id_user']));
            if(!empty($data)){
                echo json_encode(array('response' =>0,'data' => 'Username already exists')); exit;
            }
            else{
                echo json_encode(array('response' =>1,'data' => '')); exit;
            }
        }
    }
    
    
    function lawyerAmount()
    {
        
        $this->adminLanguageSelector();
        $data['header']="header";
        $data['left_menu']="left_menu";
        $data['middle_content']='lawyer_amount';
        $data['footer']='footer';
        $data['menu'] = 'lawyer_amount';
        $this->load->view('landing',$data);
    }

    function getLawyerAmountList()
    {
        echo $this->mwelcome->getLawyerAmountList();
    }

    function deleteLawyerAmount()
    {
        $this->mwelcome->deleteLawyerAmount($_POST['id']);
        echo json_encode(array('response' =>1,'data' => ''));
    }

    function getLawyerAmount()
    {
        $data = $this->mwelcome->getLawyerAmount($_POST);
        echo json_encode(array('response' =>1,'data' => $data));
    }

    function addLawyerAmount()
    {

        if(isset($_POST['id_lawyer_amount']) && $_POST['id_lawyer_amount']!=''){
            $check = $this->mwelcome->getLawyerAmount(array('experience' => $_POST['experience'],'id_lawyer_amount_not' => $_POST['id_lawyer_amount']));
            if(empty($check))
                $this->mwelcome->updateLawyerAmount(array('experience' => $_POST['experience'],'lawyer_amount' => $_POST['lawyer_amount'],'id_lawyer_amount' => $_POST['id_lawyer_amount']));
            else
                $this->mwelcome->updateLawyerAmount(array('experience' => $_POST['experience'],'lawyer_amount' => $_POST['lawyer_amount'],'id_lawyer_amount' => $check[0]['id_lawyer_amount']));
        }
        else{
            $check = $this->mwelcome->getLawyerAmount(array('experience' => $_POST['experience']));
            if(empty($check))
                $this->mwelcome->addLawyerAmount(array('experience' => $_POST['experience'], 'lawyer_amount' => $_POST['lawyer_amount']));
            else
                $this->mwelcome->updateLawyerAmount(array('experience' => $_POST['experience'],'lawyer_amount' => $_POST['lawyer_amount'],'id_lawyer_amount' => $check[0]['id_lawyer_amount']));
        }
        redirect(ADMIN_BASE_URL.'index.php/welcome/lawyerAmount');
    }

    function excelDownload()
    {
        $row_number=1;
        require_once 'Classes/PHPExcel.php';
        $objPHPExcel = new PHPExcel();
        $column_index=65;

        if($_POST['type']=='users')
        {
            $excel_columns = array('first_name','father_name','last_name','email','mobile_number','gender','username','country_name');
            $column_index=65;
            for($ec=0;$ec<count($excel_columns);$ec++)
            {
                $objPHPExcel->getActiveSheet()->getColumnDimension(chr($column_index))->setWidth(16);
                $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue(chr($column_index).$row_number,ucwords(str_replace("_"," ",$excel_columns[$ec])));
                $objPHPExcel->setActiveSheetIndex(0)->getStyle(chr($column_index).$row_number)->applyFromArray(array("font" => array( "bold" => true)));
                $column_index=$column_index+1;
            }

            $excel_data = $this->mwelcome->getUsersForExcel(array('type' => 3));
            $row_number=$row_number+1;
            for($ed=0;$ed<count($excel_data);$ed++)
            {
                $column_index=65;
                for($ec=0;$ec<count($excel_columns);$ec++)
                {
                    $excel_column_name=strtolower($excel_columns[$ec]);
                    $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue(chr($column_index).$row_number, $excel_data[$ed][$excel_column_name]);
                    $column_index=$column_index+1;
                }

                $row_number=$row_number+1;
            }


        }
        else if($_POST['type']=='lawyers')
        {
            $excel_columns = array('first_name','father_name','last_name','email','mobile_number','gender','username','country_name','experience','is_certification');
            $column_index=65;
            for($ec=0;$ec<count($excel_columns);$ec++)
            {
                $objPHPExcel->getActiveSheet()->getColumnDimension(chr($column_index))->setWidth(16);
                $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue(chr($column_index).$row_number,ucwords(str_replace("_"," ",$excel_columns[$ec])));
                $objPHPExcel->setActiveSheetIndex(0)->getStyle(chr($column_index).$row_number)->applyFromArray(array("font" => array( "bold" => true)));
                $column_index=$column_index+1;
            }

            $excel_data = $this->mwelcome->getUsersForExcel(array('type' => 2));
            $row_number=$row_number+1;
            for($ed=0;$ed<count($excel_data);$ed++)
            {
                if($excel_data[$ed]['is_certification']==1){
                    $excel_data[$ed]['is_certification'] = 'Yes';
                }
                else{
                    $excel_data[$ed]['is_certification'] = 'No';
                }
                $column_index=65;
                for($ec=0;$ec<count($excel_columns);$ec++)
                {
                    $excel_column_name=strtolower($excel_columns[$ec]);
                    $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue(chr($column_index).$row_number, $excel_data[$ed][$excel_column_name]);
                    $column_index=$column_index+1;
                }

                $row_number=$row_number+1;
            }
        }
        else if($_POST['type']=='consultation')
        {
            $excel_columns = array('case_id','user_name','lawyer_name','subject','consultation_type','lawyer_experience','complain','description','date','status');
            $column_index=65;
            for($ec=0;$ec<count($excel_columns);$ec++)
            {
                $objPHPExcel->getActiveSheet()->getColumnDimension(chr($column_index))->setWidth(16);
                $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue(chr($column_index).$row_number,ucwords(str_replace("_"," ",$excel_columns[$ec])));
                $objPHPExcel->setActiveSheetIndex(0)->getStyle(chr($column_index).$row_number)->applyFromArray(array("font" => array( "bold" => true)));
                $column_index=$column_index+1;
            }

            $excel_data = $this->mwelcome->getServiceData(array('type' => $_POST['type']));
            $row_number=$row_number+1;
            for($ed=0;$ed<count($excel_data);$ed++)
            {
                $excel_data[$ed]['consultation_type'] = $excel_data[$ed]['con_type'];
                $excel_data[$ed]['consultation_type'] = $excel_data[$ed]['con_type'];
                $excel_data[$ed]['date'] = date('d-m-Y',strtotime($excel_data[$ed]['created_date_time']));
                $column_index=65;
                for($ec=0;$ec<count($excel_columns);$ec++)
                {
                    $excel_column_name=strtolower($excel_columns[$ec]);
                    $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue(chr($column_index).$row_number, $excel_data[$ed][$excel_column_name]);
                    $column_index=$column_index+1;
                }

                $row_number=$row_number+1;
            }
        }
        else if($_POST['type']=='contractWriting')
        {
            $excel_columns = array('case_id','user_name','lawyer_name','subject','lawyer_experience','description','date','status');
            $column_index=65;
            for($ec=0;$ec<count($excel_columns);$ec++)
            {
                $objPHPExcel->getActiveSheet()->getColumnDimension(chr($column_index))->setWidth(16);
                $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue(chr($column_index).$row_number,ucwords(str_replace("_"," ",$excel_columns[$ec])));
                $objPHPExcel->setActiveSheetIndex(0)->getStyle(chr($column_index).$row_number)->applyFromArray(array("font" => array( "bold" => true)));
                $column_index=$column_index+1;
            }

            $excel_data = $this->mwelcome->getServiceData(array('type' => $_POST['type']));
            //echo "<pre>";print_r($excel_data); exit;
            $row_number=$row_number+1;
            for($ed=0;$ed<count($excel_data);$ed++)
            {

                $excel_data[$ed]['date'] = date('d-m-Y',strtotime($excel_data[$ed]['created_date_time']));
                $column_index=65;
                for($ec=0;$ec<count($excel_columns);$ec++)
                {
                    $excel_column_name=strtolower($excel_columns[$ec]);
                    $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue(chr($column_index).$row_number, $excel_data[$ed][$excel_column_name]);
                    $column_index=$column_index+1;
                }

                $row_number=$row_number+1;
            }
        }
        else if($_POST['type']=='company')
        {
            $excel_columns = array('case_id','user_name','lawyer_name','subject','lawyer_experience','description','partners','date','status');
            $column_index=65;
            for($ec=0;$ec<count($excel_columns);$ec++)
            {
                $objPHPExcel->getActiveSheet()->getColumnDimension(chr($column_index))->setWidth(16);
                $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue(chr($column_index).$row_number,ucwords(str_replace("_"," ",$excel_columns[$ec])));
                $objPHPExcel->setActiveSheetIndex(0)->getStyle(chr($column_index).$row_number)->applyFromArray(array("font" => array( "bold" => true)));
                $column_index=$column_index+1;
            }

            $excel_data = $this->mwelcome->getServiceData(array('type' => $_POST['type']));
            $excel_data_array = array();
            for($s=0;$s<count($excel_data);$s++){
                $excel_data_array[$excel_data[$s]['id_company']] = $excel_data[$s];
                if(!isset($excel_data[$excel_data[$s]['id_company']]['partners'])) {
                    $excel_data_array[$excel_data[$s]['id_company']]['partners'] = '';
                }
                $excel_data_array[$excel_data[$s]['id_company']]['partners'] = $excel_data_array[$excel_data[$s]['id_company']]['partners'] . " (" . $excel_data[$s]['partner_name'] . "-" . $excel_data[$s]['partner_id'] . ")";

            }
            $excel_data = array_values($excel_data_array);
            $row_number=$row_number+1;
            for($ed=0;$ed<count($excel_data);$ed++)
            {

                $excel_data[$ed]['date'] = date('d-m-Y',strtotime($excel_data[$ed]['created_date_time']));
                $column_index=65;
                for($ec=0;$ec<count($excel_columns);$ec++)
                {
                    $excel_column_name=strtolower($excel_columns[$ec]);
                    $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue(chr($column_index).$row_number, $excel_data[$ed][$excel_column_name]);
                    $column_index=$column_index+1;
                }

                $row_number=$row_number+1;
            }
        }
        else if($_POST['type']=='appeal')
        {
            $excel_columns = array('case_id','user_name','lawyer_name','subject','lawyer_experience','description','date','status');
            $column_index=65;
            for($ec=0;$ec<count($excel_columns);$ec++)
            {
                $objPHPExcel->getActiveSheet()->getColumnDimension(chr($column_index))->setWidth(16);
                $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue(chr($column_index).$row_number,ucwords(str_replace("_"," ",$excel_columns[$ec])));
                $objPHPExcel->setActiveSheetIndex(0)->getStyle(chr($column_index).$row_number)->applyFromArray(array("font" => array( "bold" => true)));
                $column_index=$column_index+1;
            }

            $excel_data = $this->mwelcome->getServiceData(array('type' => $_POST['type']));
            //echo "<pre>";print_r($excel_data); exit;
            $row_number=$row_number+1;
            for($ed=0;$ed<count($excel_data);$ed++)
            {

                $excel_data[$ed]['date'] = date('d-m-Y',strtotime($excel_data[$ed]['created_date_time']));
                $column_index=65;
                for($ec=0;$ec<count($excel_columns);$ec++)
                {
                    $excel_column_name=strtolower($excel_columns[$ec]);
                    $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue(chr($column_index).$row_number, $excel_data[$ed][$excel_column_name]);
                    $column_index=$column_index+1;
                }

                $row_number=$row_number+1;
            }
        }

        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=".$_POST['type'].".xls");
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $writer->save('php://output');
        exit;
    }

    public function getServiceCountMonthlyReport()
    {
        $data['consultation'] = $this->mwelcome->getConsultationByMonth();
        $data['contract_writing'] = $this->mwelcome->getContractWritingByMonth();
        $data['company'] = $this->mwelcome->getCompanyByMonth();
        $data['appeal'] = $this->mwelcome->getAppealByMonth();

        foreach($data['consultation'] as $i){
            $consultation[$i['month']] = $i;
        }
        foreach($data['contract_writing'] as $i){
            $contract_writing[$i['month']] = $i;
        }
        foreach($data['company'] as $i){
            $company[$i['month']] = $i;
        }
        foreach($data['appeal'] as $i){
            $appeal[$i['month']] = $i;
        }

        for($s=1;$s<13;$s++){
            $consultation[$s] = isset($consultation[$s])?$consultation[$s]['count']:0;
            $contract_writing[$s] = isset($contract_writing[$s])?$contract_writing[$s]['count']:0;
            $company[$s] = isset($company[$s])?$company[$s]['count']:0;
            $appeal[$s] = isset($appeal[$s])?$appeal[$s]['count']:0;
        }

        echo json_encode(array('responce' => 1, 'data' =>array(
            'consultation' => $consultation,
            'contract_writing' => $contract_writing,
            'company' => $company,
            'appeal' => $appeal
        )));

    }
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */