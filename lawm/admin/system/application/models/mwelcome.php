<?php
class MWelcome extends model
{
    function MWelcome()
    {
        parent::model();
        $this->load->model('mcommon');
    }

    public $key='#&afford@*buy#&';

    function encode($value)
    {
        return strtr(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($this->key), $value, MCRYPT_MODE_CBC, md5(md5($this->key)))),'+/=', '-_,');
    }

    function decode($value)
    {
        return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($this->key), base64_decode(strtr($value, '-_,', '+/=')), MCRYPT_MODE_CBC, md5(md5($this->key))), "\0");
    }

    function login($post)
    {
        $query = "select * from user where email='".addslashes($post['email'])."' and password='".md5($post['password'])."' and user_type_id=1";
        //echo $query; exit;
        $result=$this->db->query($query);
        $this->mcommon->clean_mysqli_connection($this->db->conn_id);
        $response=$result->result_array();
        return $response;
    }


    function getUsers($type)
    {
        $this->datatables->select('first_name,last_name,father_name,email,username,gender,mobile_number,country_name,user_status,id_user')
            ->from('user u')
            ->join('country c','u.country_id=c.id_country','left')
            ->where('u.user_type_id',$type);

        echo $this->datatables->generate();
    }

    function getForumList()
    {
        $this->datatables->select('username,title,description,f.status,f.id_forum')
            ->from('forum f')
            ->join('user u','f.user_id=u.id_user','left');

        return $this->datatables->generate();
    }

    function changeForumStatus($data)
    {
        $this->db->where('id_forum',$data['id_forum']);
        $this->db->update('forum',$data);
    }

    function verifyEmail($email)
    {
        $query="select * from user where email='".$email."' and user_type_id=1";
        $result=$this->db->query($query);
        $response=$result->result_array();
        return $response;
    }

    function changePassword($password,$user_id)
    {
        $query="update user set password='".md5($password)."' where id_user = ".$user_id."";
        $result=$this->db->query($query);
        return 1;
    }

    function getMenuDataTable($data)
    {
        $this->datatables->select('menu_title, language, menu_status, menu_flag',FALSE)
            ->from('menu m')
            ->join('language l','m.language_id=l.id_language','left');

        return $this->datatables->generate();
    }

    function getMenuData($data)
    {
        $this->db->select('*');
        $this->db->from('menu_data');
        if(isset($data['menu_id']))
            $this->db->where('menu_id',$data['menu_id']);
        if(isset($data['language_id']))
            $this->db->where('language_id',$data['language_id']);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result_array();
    }

    function getMenuList($data=array())
    {
        $this->db->select('m.*,md.*,l.*,md1.menu_title as parent_menu');
        $this->db->from('menu m');
        $this->db->join('menu_data md','m.id_menu=md.menu_id','left');
        $this->db->join('menu m1','m.parent_id=m1.id_menu','left');
        $this->db->join('menu_data md1','m1.id_menu=md1.menu_id','left');
        $this->db->join('language l','md.language_id=l.id_language','left');
        if(isset($data['menu_id']))
            $this->db->where('m.id_menu',$data['menu_id']);
        if(isset($data['parent_id']))
            $this->db->where('m.parent_id',$data['parent_id']);
        if(isset($data['status']))
            $this->db->where('m.menu_status',$data['status']);
        if(isset($data['language_id'])) {
            $this->db->where('md.language_id', $data['language_id']);
        }
        $this->db->group_by('m.id_menu');
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result_array();
    }

    function getMenu($data=array())
    {
        $this->db->select('id_menu,menu_title, language, menu_status, menu_flag',FALSE);
        $this->db->from('menu m');
        $this->db->join('language l','m.language_id=l.id_language','left');
        if(isset($data['language_id']))
            $this->db->where('language_id',$data['language_id']);
        if(isset($data['menu_flag']))
            $this->db->where('menu_flag',$data['menu_flag']);


        $query = $this->db->get();
        return $query->result_array();
    }


    function getCategoryByFlag($data)
    {
        $this->db->select('group_concat(category_title SEPARATOR " -- ") as category_title,category_flag',FALSE);
        $this->db->from('category c');
        $this->db->join('language l','c.language_id=l.id_language','left');
        if(isset($data['status']))
            $this->db->where('c.status',$data['status']);
        $this->db->group_by('c.category_flag');
        $query = $this->db->get();
        return $query->result_array();
    }

    function getMenuGroupByFlag($data)
    {
        $this->db->select('group_concat(menu_title SEPARATOR " -- ") as menu_title,menu_flag',FALSE);
        $this->db->from('menu m');
        $this->db->join('language l','m.language_id=l.id_language','left');
        if(isset($data['status']))
            $this->db->where('menu_status',$data['status']);
        $this->db->group_by('m.menu_flag');
        $query = $this->db->get();
        return $query->result_array();
    }

    function getLanguage()
    {
        $query = $this->db->get('language');
        $response=$query->result_array();
        return $response;
    }



    function addMenu($data)
    {
        $lan = $data['lan'];

        $menu = array('parent_id' => $data['parent_id'],'order' => $data['order']);
        $this->db->insert('menu',$menu);
        $menu_id = $this->db->insert_id();
        for($s=0;$s<count($lan);$s++){
            $menu = array('menu_id' => $menu_id,'language_id' =>$lan[$s],'menu_title' => $data[$lan[$s].'_name'],'menu_link' => $data[$lan[$s].'_link']);
            $this->db->insert('menu_data',$menu);
        }

        return 1;
    }

    function updateMenu($data)
    {
        $lan = $data['lan'];

        $menu = array('parent_id' => $data['parent_id'],'order' => $data['order'],'menu_status' => $data['menu_status']);
        $this->db->where(array('id_menu' => $data['menu_id']));
        $this->db->update('menu',$menu);

        for($s=0;$s<count($lan);$s++){
            $check = $this->getMenuData(array('language_id' => $lan[$s],'menu_id' => $data['menu_id']));

            if(empty($check)){
                $menu = array('menu_id' => $data['menu_id'],'language_id' =>$lan[$s],'menu_title' => $data[$lan[$s].'_name'],'menu_link' => $data[$lan[$s].'_link']);
                $this->db->insert('menu_data',$menu);
            }
            else{
                $menu = array('menu_title' => $data[$lan[$s].'_name'],'menu_link' => $data[$lan[$s].'_link']);
                $this->db->where('id_menu_data',$check[0]['id_menu_data']);
                $this->db->update('menu_data',$menu);
            }
        }

        return 1;
    }

    function getFlag($type)
    {
        if($type=='menu'){
            $this->db->select('max(menu_flag) as menu_flag');
            $this->db->from('menu');
        }
        else if($type=='category'){
            $this->db->select('max(category_flag) as category_flag');
            $this->db->from('category');
        }
        else if($type=='article'){
            $this->db->select('max(article_flag) as article_flag');
            $this->db->from('article');
        }
        else if($type=='service'){
            $this->db->select('max(service_flag) as service_flag');
            $this->db->from('service');
        }

        $query = $this->db->get();
        $response=$query->result_array();
        return $response;
    }

    function getMenuByFlag($menu_flag)
    {
        $this->db->select('m.language_id,m.menu_title,m.menu_link,m.menu_flag,m.menu_status,l.language');
        $this->db->from('menu m');
        $this->db->join('language l','m.language_id=l.id_language','left');
        $this->db->where('m.menu_flag',$menu_flag);
        $query = $this->db->get();
        $response=$query->result_array();
        return $response;
    }

    function category($data)
    {
        $this->db->select('l.language,c.language_id,c.category_title,c.category_link,c.status,c.category_flag');
        $this->db->from('category c');
        $this->db->join('language l','c.language_id=l.id_language','left');
        if(isset($data['category_flag']))
            $this->db->where('category_flag',$data['category_flag']);
        $query = $this->db->get();
        //echo $this->db->last_query(); exit;
        $response=$query->result_array();
        return $response;
    }

    function getCategory($data=array())
    {
        $this->db->select('c.id_category,l.language,m.menu_title,c.category_title,c.status,c.category_flag');
        $this->db->from('category c');
        $this->db->join('menu m','c.menu_flag_id=m.menu_flag and c.language_id=m.language_id','left');
        $this->db->join('language l','c.language_id=l.id_language','left');
        $this->db->order_by('c.id_category','DESC');
        if(isset($data['language_id']))
            $this->db->where('c.language_id',$data['language_id']);
        if(isset($data['category_flag']))
            $this->db->where('c.category_flag',$data['category_flag']);
        $query = $this->db->get();
        //echo $this->db->last_query(); exit;
        $response=$query->result_array();
        return $response;
    }

    function addCategory($data,$category_flag)
    {
        $lan = $data['lan'];

        for($s=0;$s<count($lan);$s++){
            $cat = array('menu_flag_id' => $data['menu_flag_id'],'language_id' =>$lan[$s],'category_title' => $data[$lan[$s].'_name'],'category_key'=>strtolower(str_replace(' ','-',$data[$lan[$s].'_name'])),'category_link' => $data[$lan[$s].'_link'],'category_flag' => $category_flag);
            $this->db->insert('category',$cat);
        }

        return 1;
    }

    function updateCategory($data,$category_flag)
    {
        $lan = $data['lan'];

        for($s=0;$s<count($lan);$s++){
            $check = $this->getCategory(array('language_id' => $lan[$s],'category_flag' => $category_flag));

            if(empty($check)){
                $cat = array('menu_flag_id' => $data['menu_flag_id'],'language_id' =>$lan[$s],'category_title' => $data[$lan[$s].'_name'],'category_key'=>strtolower(str_replace(' ','-',$data[$lan[$s].'_name'])),'category_link' => $data[$lan[$s].'_link'],'category_flag' => $category_flag,'status' => $data['status']);
                $this->db->insert('category',$cat);
            }
            else{
                $cat = array('menu_flag_id' => $data['menu_flag_id'],'category_title' => $data[$lan[$s].'_name'],'category_key'=>strtolower(str_replace(' ','-',$data[$lan[$s].'_name'])),'category_link' => $data[$lan[$s].'_link'],'status' => $data['status']);
                $this->db->where('id_category',$check[0]['id_category']);
                $this->db->update('category',$cat);
            }

        }

        return 1;
    }

    function getArticleById($article_id)
    {
        $this->db->select('*');
        $this->db->from('article a');
        $this->db->join('article_data ad','a.id_article=ad.article_id','left');
        $this->db->where('a.id_article',$article_id);

        $query = $this->db->get();
        //echo $this->db->last_query(); exit;
        $response=$query->result_array();
        return $response;
    }

    function getArticle($data=array())
    {
        $this->db->select('l.language,c.category_title,a.id_article,a.article_title,a.article_flag,c.status');
        $this->db->from('article a');
        $this->db->join('category c','c.category_flag=a.category_flag_id and a.language_id=c.language_id','left');
        $this->db->join('language l','c.language_id=l.id_language','left');
        if(isset($data['article_flag']))
            $this->db->where('article_flag',$data['article_flag']);
        if(isset($data['language_id']))
            $this->db->where('a.language_id',$data['language_id']);

        $this->db->order_by('c.id_category','DESC');
        $query = $this->db->get();
        //echo $this->db->last_query(); exit;
        $response=$query->result_array();
        return $response;
    }

    function getMenuArticle($data=array())
    {
        $this->db->select('a.*,l.*,ad.*,md.menu_title');
        $this->db->from('article a');
        $this->db->join('menu m', 'a.menu_id=m.id_menu', 'left');
        $this->db->join('article_data ad', 'a.id_article=ad.article_id', 'left');
        $this->db->join('language l','ad.language_id=l.id_language', 'left');
        $this->db->join('menu_data md', 'm.id_menu=md.menu_id', 'left');
        if (isset($data['language_id'])) {
            $this->db->where('ad.language_id',$data['language_id']);
            $this->db->where('md.language_id',$data['language_id']);
        }
        $this->db->order_by('a.id_article','DESC');
        $query = $this->db->get();
        //echo $this->db->last_query(); exit;
        $response=$query->result_array();
        return $response;
    }

    function addArticle($data)
    {
        $lan = $data['lan'];

        $menu = array('menu_id' => $data['menu_id'],'order' =>'order');
        $this->db->insert('article',$menu);
        $article_id = $this->db->insert_id();

        for($s=0;$s<count($lan);$s++){
            $menu = array('article_id' => $article_id,'language_id' =>$lan[$s],'article_title' => $data[$lan[$s].'_title'],'content' => $data[$lan[$s].'_content']);
            $this->db->insert('article_data',$menu);
        }

        return 1;
    }

    function updateArticle($data)
    {
        $lan = $data['lan'];

        $article = array('menu_id' => $data['menu_id'],'order' => $data['order']);
        $this->db->where(array('id_article' => $data['article_id']));
        $this->db->update('article',$article);

        for($s=0;$s<count($lan);$s++){
            $check = $this->getArticleData(array('language_id' => $lan[$s], 'article_id' => $data['article_id']));
            //echo "<pre>";print_r($check); exit;
            if(empty($check)){
                $article = array('article_id' => $data['article_id'],'language_id' =>$lan[$s],'article_title' => $data[$lan[$s].'_title'],'content' => $data[$lan[$s].'_content']);
                $this->db->insert('article',$article);
            }
            else{
                $article = array('article_id' => $data['article_id'],'article_title' => $data[$lan[$s].'_title'],'content' => $data[$lan[$s].'_content']);
                $this->db->where('id_article_data',$check[0]['id_article_data']);
                $this->db->update('article_data',$article);
            }
        }

        return 1;
    }

    function getArticleData($data)
    {
        $this->db->select('*');
        $this->db->from('article_data ad');
        if(isset($data['article_id']))
            $this->db->where('ad.article_id',$data['article_id']);
        if(isset($data['language_id']))
            $this->db->where('ad.language_id',$data['language_id']);
        $query = $this->db->get();
        //echo $this->db->last_query(); exit;
        return $query->result_array();
    }

    function getService($data=array())
    {
        $this->db->select('id_service,service_title, language, service_status, service_flag',FALSE);
        $this->db->from('service s');
        $this->db->join('language l','s.language_id=l.id_language','left');
        if(isset($data['language_id']))
            $this->db->where('language_id',$data['language_id']);
        if(isset($data['service_flag']))
            $this->db->where('service_flag',$data['service_flag']);


        $query = $this->db->get();
        return $query->result_array();
    }

    function addService($data,$service_flag)
    {
        $lan = $data['lan'];

        for($s=0;$s<count($lan);$s++){
            $service = array('language_id' =>$lan[$s],'service_title' => $data[$lan[$s].'_name'],'color_code' => $data[$lan[$s].'_color_code'],'icon' => $data[$lan[$s].'_icon'],'service_flag' => $service_flag);
            $this->db->insert('service',$service);
        }

        return 1;
    }

    function updateService($data,$service_flag)
    {
        $lan = $data['lan'];

        for($s=0;$s<count($lan);$s++){
            $check = $this->getService(array('language_id' => $lan[$s],'service_flag' => $service_flag));
            if(empty($check)){
                $menu = array('language_id' =>$lan[$s],'service_title' => $data[$lan[$s].'_name'],'color_code' => $data[$lan[$s].'_color_code'],'icon' => $data[$lan[$s].'_icon'],'service_flag' => $service_flag, 'service_status' => $data['service_status']);
                $this->db->insert('service',$menu);
            }
            else{
                $menu = array('service_title' => $data[$lan[$s].'_name'],'color_code' => $data[$lan[$s].'_color_code'],'icon' => $data[$lan[$s].'_icon'],'service_flag' => $data['service_flag'],'service_status' => $data['service_status']);
                $this->db->where('id_service',$check[0]['id_service']);
                $this->db->update('service',$menu);
            }
        }

        return 1;
    }

    function getServiceByFlag($menu_flag)
    {
        $this->db->select('s.language_id,s.service_title,s.color_code,s.icon,s.service_flag,s.service_status,l.language');
        $this->db->from('service s');
        $this->db->join('language l','s.language_id=l.id_language','left');
        $this->db->where('s.service_flag',$menu_flag);
        $query = $this->db->get();
        $response=$query->result_array();
        return $response;
    }

    function getServiceData($data)
    {
        if($data['type']=='consultation')
        {
            $this->db->select('c.*,c.id_consultation as case_id,c.created_date_time as con_date,ct.consultation_type as con_type,u.username as user_name,l.username as lawyer_name,l.experience as lawyer_experience');
            $this->db->from('consultation c');
            $this->db->join('consultation_type ct','c.consultation_type=ct.id_consultation_type','left');
            $this->db->join('user u','c.user_id=u.id_user','left');
            $this->db->join('user l','c.lawyer_id=l.id_user','left');

            if(isset($data['lawyer_id']))
                $this->db->where('c.lawyer_id',$data['lawyer_id']);
            if(isset($data['lawyer_id_not']))
                $this->db->where('c.lawyer_id!=',$data['lawyer_id_not']);
            if(isset($data['status']) && $data['status']=='other')
                $this->db->where('(c.status="pending" or c.status="rejected")');
            else if(isset($data['pending-accepted']))
                $this->db->where('(c.status="pending" or c.status="accepted")');
            else if(isset($data['status']))
                $this->db->where('c.status',$data['status']);
            if(isset($data['user_id']))
                $this->db->where('user_id',$data['user_id']);
            if(isset($data['id_consultation']))
                $this->db->where('id_consultation',$data['id_consultation']);
            $this->db->order_by('id_consultation','desc');
        }
        else if($data['type']=='company')
        {
            $this->db->select('c.id_company as case_id,c.*,c.created_date_time as date,cp.*,u.username as user_name,l.username as lawyer_name,l.experience as lawyer_experience');
            $this->db->from('company c');
            $this->db->join('user u','c.user_id=u.id_user','left');
            $this->db->join('user l','c.lawyer_id=l.id_user','left');
            $this->db->join('company_partner cp','c.id_company=cp.company_id','left');
            if(isset($data['lawyer_id']))
                $this->db->where('c.lawyer_id',$data['lawyer_id']);
            if(isset($data['lawyer_id_not']))
                $this->db->where('c.lawyer_id!=',$data['lawyer_id_not']);
            if(isset($data['status']) && $data['status']=='other')
                $this->db->where('(c.status="pending" or c.status="rejected")');
            else if(isset($data['pending-accepted']))
                $this->db->where('(c.status="pending" or c.status="accepted")');
            else if(isset($data['status']))
                $this->db->where('c.status',$data['status']);
            if(isset($data['user_id']))
                $this->db->where('user_id',$data['user_id']);
            if(isset($data['id_company']))
                $this->db->where('id_company',$data['id_company']);
            $this->db->order_by('id_company','desc');
        }
        else if($data['type']=='contractWriting')
        {
            $this->db->select('c.id_contract_writing as case_id,c.*,u.username as user_name,l.username as lawyer_name,l.experience as lawyer_experience');
            $this->db->from('contract_writing c');
            $this->db->join('user u','c.user_id=u.id_user','left');
            $this->db->join('user l','c.lawyer_id=l.id_user','left');
            if(isset($data['lawyer_id']))
                $this->db->where('c.lawyer_id',$data['lawyer_id']);
            if(isset($data['lawyer_id_not']))
                $this->db->where('c.lawyer_id!=',$data['lawyer_id_not']);
            if(isset($data['status']) && $data['status']=='other')
                $this->db->where('(c.status="pending" or c.status="rejected")');
            else if(isset($data['pending-accepted']))
                $this->db->where('(c.status="pending" or c.status="accepted")');
            else if(isset($data['status']))
                $this->db->where('c.status',$data['status']);
            if(isset($data['user_id']))
                $this->db->where('user_id',$data['user_id']);
            if(isset($data['id_contract_writing']))
                $this->db->where('id_contract_writing',$data['id_contract_writing']);

            $this->db->order_by('id_contract_writing','desc');
        }
        else if($data['type']=='appeal')
        {
            $this->db->select('c.id_appeal as case_id,c.*,u.username as user_name,l.username as lawyer_name,at.appeal_type,l.experience as lawyer_experience');
            $this->db->from('appeal c');
            $this->db->join('user u','c.user_id=u.id_user','left');
            $this->db->join('user l','c.lawyer_id=l.id_user','left');
            $this->db->join('appeal_type at','c.appeal_type_id=at.id_appeal_type','left');
            if(isset($data['lawyer_id']))
                $this->db->where('c.lawyer_id',$data['lawyer_id']);
            if(isset($data['lawyer_id_not']))
                $this->db->where('c.lawyer_id!=',$data['lawyer_id_not']);
            if(isset($data['status']) && $data['status']=='other')
                $this->db->where('(c.status="pending" or c.status="rejected")');
            else if(isset($data['pending-accepted']))
                $this->db->where('(c.status="pending" or c.status="accepted")');
            else if(isset($data['status']))
                $this->db->where('c.status',$data['status']);
            if(isset($data['user_id']))
                $this->db->where('user_id',$data['user_id']);
            if(isset($data['id_appeal']))
                $this->db->where('id_appeal',$data['id_appeal']);

            $this->db->order_by('id_appeal','desc');
        }


        $query = $this->db->get();
        //echo $this->db->last_query(); exit;
        $response=$query->result_array();
        return $response;

    }

    function getUsersList($data)
    {
        $this->db->select('*');
        $this->db->from('user');
        if(isset($data['user_type_id']))
            $this->db->where('user_type_id',$data['user_type_id']);
        if(isset($data['lawyer_amount'])){
            $this->db->where('id_user not in (select lawyer_id from lawyer_amount)');
        }

        $query = $this->db->get();
        //echo $this->db->last_query(); exit;
        $response=$query->result_array();
        return $response;
    }

    function updateServiceData($data)
    {
        $type = $data['type']; unset($data['type']);
        if($type=='consultation')
        {
            $this->db->where('id_consultation',$data['id_consultation']);
            $this->db->update('consultation',$data);
        }
        else if($type=='company')
        {
            $this->db->where('id_company',$data['id_company']);
            $this->db->update('company',$data);
        }
        else if($type=='contractWriting')
        {
            $this->db->where('id_contract_writing',$data['id_contract_writing']);
            $this->db->update('contract_writing',$data);
        }
        else if($type=='appeal')
        {
            $this->db->where('id_appeal',$data['id_appeal']);
            $this->db->update('appeal',$data);
        }
        //echo $this->db->last_query(); exit;

        return 1;
    }

    function addForum($data)
    {
        $this->db->insert('forum',$data);
        return $this->db->insert_id();
    }

    function addAttachments($data)
    {
        $this->db->insert('attachments',$data);
        return $this->db->insert_id();
    }

    function deleteForum($id)
    {
        $this->db->where('id_forum',$id);
        $this->db->delete('forum');
    }

    function getUserDetails($user_id,$type='user')
    {
        $this->db->select('*,avg(r.rating) as user_rating');
        $this->db->from('user u');
        $this->db->join('country c','u.country_id=c.id_country','left');
        $this->db->join('speciality s','u.speciality_id=s.id_speciality','left');
        $this->db->join('rating r','r.lawyer_id=u.id_user and type="'.$type.'"','left');
        $this->db->where('id_user',$user_id);
        $this->db->group_by('u.id_user');
        $query = $this->db->get();
        //echo $this->db->last_query(); exit;
        $response=$query->result_array();
        return $response;
    }

    function getUsersForExcel($data)
    {
        $this->db->select('*,avg(r.rating) as user_rating');
        $this->db->from('user u');
        $this->db->join('country c','u.country_id=c.id_country','left');
        $this->db->join('speciality s','u.speciality_id=s.id_speciality','left');
        $this->db->join('rating r','r.lawyer_id=u.id_user and type="'.$data['type'].'"','left');
        //$this->db->where('u.user_status',1);
        if($data['type']==3)
        {
            $this->db->where('u.user_type_id',3);
        }
        elseif($data['type']==2)
        {
            $this->db->where('u.user_type_id',2);
        }
        $this->db->group_by('u.id_user');
        $query = $this->db->get();
        //echo $this->db->last_query(); exit;
        $response=$query->result_array();
        return $response;
    }

    function changeUserStatus($data)
    {
        $this->db->where('id_user',$data['id_user']);
        $this->db->update('user',$data);
    }

    function getAttachments($data)
    {
        $this->db->select('*');
        $this->db->from('attachments a');
        if(isset($data['reference_id']))
            $this->db->where('reference_id',$data['reference_id']);
        if(isset($data['type']))
            $this->db->where('type',$data['type']);

        $query = $this->db->get();
        //echo $this->db->last_query(); exit;
        $response=$query->result_array();
        return $response;
    }

    function addSpeciality($data)
    {
        $this->db->insert('speciality',$data);
        return $this->db->insert_id();
    }

    function updateSpeciality($data)
    {
        $this->db->where('id_speciality',$data['id_speciality']);
        $this->db->update('speciality',$data);
    }

    function deleteSpeciality($id)
    {
        $this->db->where('id_speciality',$id);
        $this->db->delete('speciality');
    }

    function getSpecialityList()
    {
        $this->datatables->select('s.speciality,s.id_speciality')
            ->from('speciality s');

        return $this->datatables->generate();
    }

    function changeSpecialityStatus($data)
    {
        $this->db->where('id_speciality',$data['id_speciality']);
        $this->db->update('speciality',$data);
    }

    function getSpeciality($data)
    {
        $this->db->select('*');
        $this->db->from('speciality s');
        if(isset($data['id_speciality']))
            $this->db->where('s.id_speciality',$data['id_speciality']);
        $query = $this->db->get();
        //echo $this->db->last_query(); exit;
        $response=$query->result_array();
        return $response;
    }

    function addConsultationType($data)
    {
        $this->db->insert('consultation_type',$data);
        return $this->db->insert_id();
    }

    function updateConsultationType($data)
    {
        $this->db->where('id_consultation_type',$data['id_consultation_type']);
        $this->db->update('consultation_type',$data);
    }

    function deleteConsultationType($id)
    {
        $this->db->where('id_consultation_type',$id);
        $this->db->delete('consultation_type');
    }

    function getConsultationTypeList()
    {
        $this->datatables->select('s.consultation_type,s.id_consultation_type')
            ->from('consultation_type s');

        return $this->datatables->generate();
    }

    function getConsultationType($data)
    {
        $this->db->select('*');
        $this->db->from('consultation_type s');
        $this->db->where('s.id_consultation_type',$data['id_consultation_type']);
        $query = $this->db->get();
        //echo $this->db->last_query(); exit;
        $response=$query->result_array();
        return $response;
    }

    function addAppealType($data)
    {
        $this->db->insert('appeal_type',$data);
        return $this->db->insert_id();
    }

    function updateAppealType($data)
    {
        $this->db->where('id_appeal_type',$data['id_appeal_type']);
        $this->db->update('appeal_type',$data);
    }

    function deleteAppealType($id)
    {
        $this->db->where('id_appeal_type',$id);
        $this->db->delete('appeal_type');
    }

    function getAppealTypeList()
    {
        $this->datatables->select('s.appeal_type,s.id_appeal_type')
            ->from('appeal_type s');

        return $this->datatables->generate();
    }

    function getAppealType($data)
    {
        $this->db->select('*');
        $this->db->from('appeal_type s');
        $this->db->where('s.id_appeal_type',$data['id_appeal_type']);
        $query = $this->db->get();
        //echo $this->db->last_query(); exit;
        $response=$query->result_array();
        return $response;
    }

    function getCountryList()
    {
        $this->db->select('*');
        $this->db->from('country s');
        $query = $this->db->get();
        $response=$query->result_array();
        return $response;
    }

    function updateUser($data)
    {
        $this->db->where('id_user',$data['id_user']);
        $this->db->update('user',$data);
        return 1;
    }
    
    function updateLawyer($data)
    {
        $this->db->where('id_user',$data['id_user']);
        $this->db->update('user',$data);
        return 1;
    }

    function checkUser($data)
    {
        $this->db->select('*');
        $this->db->from('user');
        if(isset($data['user_type_id']))
            $this->db->where('user_type_id',$data['user_type_id']);
        if(isset($data['email']))
            $this->db->where('email',$data['email']);
        if(isset($data['username']))
            $this->db->where('username',$data['username']);
        if(isset($data['id_user']))
            $this->db->where('id_user !='.$data['id_user'].' ');
        $query = $this->db->get();

        return $query->result_array();
    }

    function addLawyerAmount($data)
    {
        $this->db->insert('lawyer_amount',$data);
        return $this->db->insert_id();
    }

    function updateLawyerAmount($data)
    {
        if(isset($data['id_lawyer_amount']))
            $this->db->where('id_lawyer_amount',$data['id_lawyer_amount']);
        $this->db->update('lawyer_amount',$data);
    }

    function deleteLawyerAmount($id)
    {
        $this->db->where('id_lawyer_amount',$id);
        $this->db->delete('lawyer_amount');
    }

    function getLawyerAmountList()
    {
        $this->datatables->select('l.experience,l.lawyer_amount,l.id_lawyer_amount')
            ->from('lawyer_amount l');


        return $this->datatables->generate();
    }

    function getLawyerAmount($data)
    {
        $this->db->select('s.*');
        $this->db->from('lawyer_amount s');
        //$this->db->join('user u','s.lawyer_id=u.id_user','left');
        if(isset($data['id_lawyer_amount']))
            $this->db->where('s.id_lawyer_amount',$data['id_lawyer_amount']);
        if(isset($data['id_lawyer_amount_not']))
            $this->db->where('s.id_lawyer_amount !=',$data['id_lawyer_amount_not']);
        if(isset($data['experience']))
            $this->db->where('experience',$data['experience']);
        $query = $this->db->get();
        //echo $this->db->last_query(); exit;
        $response=$query->result_array();
        return $response;
    }

    function getServiceCount()
    {
        $query = "select count(*) as consultation_count,
                  (select count(*) from contract_writing where status!='deleted') as contract_writing_count,
                  (select count(*) from company where status!='deleted') as company_count,
                  (select count(*) from appeal where status!='deleted') as appeal_count
                  from consultation where status!='deleted'";
        //echo $query; exit;
        $result=$this->db->query($query);
        $this->mcommon->clean_mysqli_connection($this->db->conn_id);
        $response=$result->result_array();
        return $response;
    }

    function getServiceAmount()
    {
        $query = "select IFNULL(sum(st.amount),0) as consultation_amount,
                  (select IFNULL(sum(st.amount),0) from contract_writing c LEFT JOIN service_transaction st on c.id_contract_writing=st.reference_id and reference_type='contract-writing' where c.status!='deleted' and c.payment_status='paid') as contract_writing_amount,
                  (select IFNULL(sum(st.amount),0) from company c LEFT JOIN service_transaction st on c.id_company=st.reference_id and reference_type='company' where c.status!='deleted' and c.payment_status='paid') as company_amount,
                  (select IFNULL(sum(st.amount),0) from appeal c LEFT JOIN service_transaction st on c.id_appeal=st.reference_id and reference_type='appeal' where c.status!='deleted' and c.payment_status='paid') as appeal_amount
                  from consultation c LEFT JOIN service_transaction st on c.id_consultation=st.reference_id and reference_type='consultation' where c.status!='deleted' and c.payment_status='paid'";
        //echo $query; exit;
        $result=$this->db->query($query);
        $this->mcommon->clean_mysqli_connection($this->db->conn_id);
        $response=$result->result_array();
        return $response;
    }

    function getConsultationByMonth()
    {
        $this->db->select('count(*) as count,DATE_FORMAT(created_date_time,"%c") as month',FALSE);
        $this->db->from('consultation c');
        $this->db->where('YEAR(c.created_date_time) = YEAR(CURDATE())');
        $this->db->group_by('(DATE_FORMAT(created_date_time,"%m"))');
        $query = $this->db->get();
        $response=$query->result_array();
        return $response;
    }

    function getContractWritingByMonth()
    {
        $this->db->select('count(*) as count,DATE_FORMAT(created_date_time,"%c") as month');
        $this->db->from('contract_writing c');
        $this->db->where('YEAR(c.created_date_time) = YEAR(CURDATE())');
        $this->db->group_by('(DATE_FORMAT(created_date_time,"%m"))');
        $query = $this->db->get();
        $response=$query->result_array();
        return $response;
    }

    function getCompanyByMonth()
    {
        $this->db->select('count(*) as count,DATE_FORMAT(created_date_time,"%c") as month');
        $this->db->from('company c');
        $this->db->where('YEAR(c.created_date_time) = YEAR(CURDATE())');
        $this->db->group_by('(DATE_FORMAT(created_date_time,"%m"))');
        $query = $this->db->get();
        $response=$query->result_array();
        return $response;
    }

    function getAppealByMonth()
    {
        $this->db->select('count(*) as count,DATE_FORMAT(created_date_time,"%c") as month');
        $this->db->from('appeal c');
        $this->db->where('YEAR(c.created_date_time) = YEAR(CURDATE())');
        $this->db->group_by('(DATE_FORMAT(created_date_time,"%m"))');
        $query = $this->db->get();
        $response=$query->result_array();
        return $response;
    }
}
?>