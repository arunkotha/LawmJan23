<?php
class Mwelcome extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcommon');
    }

    public $key='#&Law@*#&';

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
        $this->db->select('*');
        $this->db->from('user u');
        $this->db->where('u.email',$post['email']);
        $this->db->where('u.password',md5($post['password']));
        $this->db->where('u.user_type_id',$post['user_type_id']);
        $this->db->where('u.user_status',1);
        $query = $this->db->get();
        //echo $this->db->last_query(); exit;
        return $query->result_array();
    }

    function getSpecialities()
    {
        $query = $this->db->get('speciality');
        return $query->result_array();
    }

    function getCountries()
    {
        $query = $this->db->get('country');
        return $query->result_array();
    }

    function getConsultationType()
    {
        $query = $this->db->get('consultation_type');
        return $query->result_array();
    }

    function addUser($data)
    {
        $this->db->insert('user',$data);
        return $this->db->insert_id();
    }

    function checkUsername($data)
    {
        $query = $this->db->get_where('user',array('username' => trim($_POST['user_name']),'user_type_id' => $_POST['user_type_id']));
        return $query->result_array();
    }

    function checkEmail($data)
    {
        $query = $this->db->get_where('user',array('email' => trim($data['email']),'user_type_id' => $data['user_type_id']));
        return $query->result_array();
    }

    function upateUser($data,$user_id)
    {
        $this->db->where('id_user',$user_id);
        $this->db->update('user',$data);
        //echo $this->db->last_query(); exit;
        return 1;
    }

    function updateUser($data,$user_id)
    {
        $this->db->where('id_user',$user_id);
        $this->db->update('user',$data);
        //echo $this->db->last_query(); exit;
        return 1;
    }
    
    


    function getUser($user_id)
    {
        $this->db->select('*');
        $this->db->from('user u');
        $this->db->join('country c','u.country_id=c.id_country','left');
        $this->db->join('speciality s','u.speciality_id=s.id_speciality','left');
        $this->db->where(array('id_user' => $user_id));
        $query = $this->db->get();
        return $query->result_array();
    }

    function checkUser($data)
    {
        $this->db->select('*');
        $this->db->from('user u');
        if(isset($data['user_id']))
            $this->db->where(array('id_user' => $data['user_id']));
        if(isset($data['password']))
            $this->db->where(array('password' => $data['password']));
        $query = $this->db->get();
        return $query->result_array();
    }

    function getUsersList($data)
    {
        $columnsToSelect = "id_user,user_type_id,first_name,last_name,father_name,email,username,password,gender,user_image,speciality_id,is_certification,mobile_number,country_id, experience,certification_attachment,user_status,country_name,type";
        $this->db->select($columnsToSelect.' ,IFNULL(avg(r.rating),0) as rating');
        $this->db->from('user u');
        $this->db->join('country c','u.country_id=c.id_country','left');
        $this->db->join('speciality s','u.speciality_id=s.id_speciality','left');
        if(isset($data['user_type_id']) && $data['user_type_id']==2)
            $this->db->join('rating r','r.lawyer_id=u.id_user and type="lawyer"','left');
        else if(isset($data['user_type_id']) && $data['user_type_id']==3)
            $this->db->join('rating r','r.lawyer_id=u.id_user and type="user"','left');
        else
            $this->db->join('rating r','r.lawyer_id=u.id_user and type="lawyer"','left');
        if(isset($data['email']))
            $this->db->where(array('email' => $data['email']));
        if(isset($data['email_not']))
            $this->db->where(array('email !=' => $data['email_not']));
        if(isset($data['user_type_id']))
            $this->db->where(array('user_type_id' => $data['user_type_id']));
        if(isset($data['search_key']) && trim($data['search_key'])!='')
            $this->db->where('(u.first_name like "%'.$data['search_key'].'%" or u.last_name like "%'.$data['search_key'].'%" or u.email like "%'.$data['search_key'].'%" or u.username like "%'.$data['search_key'].'%" )');
        $this->db->group_by('u.id_user');
        $query = $this->db->get();
        //echo $this->db->last_query();  exit;
        return $query->result_array();
    }

    function addConsultation($data)
    {
        $this->db->insert('consultation',$data);
        return $this->db->insert_id();
    }

    function consultation($data)
    {
        $this->db->select('c.*,la.lawyer_amount,ct.consultation_type as con_type,DATE_FORMAT(c.date, "%d %b %y") as con_date,u.username as user_name,l.username as lawyer_name,u.email as user_email,l.email as lawyer_email');
        $this->db->from('consultation c');
        $this->db->join('consultation_type ct','c.consultation_type=ct.id_consultation_type','left');
        $this->db->join('user u','c.user_id=u.id_user','left');
        $this->db->join('user l','c.lawyer_id=l.id_user','left');
        $this->db->join('lawyer_amount la', 'la.experience=l.experience', 'left');        
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
        else $this->db->where('c.status!=','closed');

        if(isset($data['user_id']))
            $this->db->where('user_id',$data['user_id']);
        if(isset($data['id_consultation']))
            $this->db->where('id_consultation',$data['id_consultation']);

        if(isset($data['date'])){
            $this->db->where('DATE_FORMAT(c.created_date_time,"%Y-%m-%d") <=',$data['date']);
        }

        $this->db->where('status!=','deleted');
        $this->db->order_by('id_consultation','DESC');

        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result_array();
    }

    function updateConsultation($data)
    {
        $this->db->where('id_consultation',$data['id_consultation']);
        $this->db->update('consultation',$data);
        //echo $this->db->last_query(); exit;
        return 1;
    }

    function addServiceTransaction($data)
    {
        $this->db->insert('service_transaction',$data);
        return $this->db->insert_id();
    }

    function addContractWriting($data)
    {
        $this->db->insert('contract_writing',$data);
        return $this->db->insert_id();
    }

    function getContractWriting($data)
    {
        $this->db->select('c.*,la.lawyer_amount,u.username as user_name,l.username as lawyer_name,u.email as user_email,l.email as lawyer_email');
        $this->db->from('contract_writing c');
        $this->db->join('user u','c.user_id=u.id_user','left');
        $this->db->join('user l','c.lawyer_id=l.id_user','left');
        $this->db->join('lawyer_amount la', 'la.experience=l.experience', 'left');
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
        else $this->db->where('c.status!=','closed');
        if(isset($data['user_id']))
            $this->db->where('user_id',$data['user_id']);
        if(isset($data['id_contract_writing']))
            $this->db->where('id_contract_writing',$data['id_contract_writing']);

        if(isset($data['date'])){
            $this->db->where('DATE_FORMAT(c.created_date_time,"%Y-%m-%d") <=',$data['date']);
        }

        $this->db->where('status!=','deleted');
        $this->db->order_by('id_contract_writing','desc');

        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result_array();
    }

    function updateContractWriting($data)
    {
        $this->db->where('id_contract_writing',$data['id_contract_writing']);
        $this->db->update('contract_writing',$data);
        //echo $this->db->last_query(); exit;
        return 1;
    }

    function addEstablishCompany($data)
    {
        $this->db->insert('company',$data);
        return $this->db->insert_id();
    }

    function addCompanyPartner($data)
    {
        $this->db->insert('company_partner',$data);
        return $this->db->insert_id();
    }

    function getEstablishCompany($data)
    {
        $this->db->select('c.*,la.lawyer_amount,c.created_date_time as date,cp.*,u.username as user_name,l.username as lawyer_name,u.email as user_email,l.email as lawyer_email');
        $this->db->from('company c');
        $this->db->join('user u','c.user_id=u.id_user','left');
        $this->db->join('user l','c.lawyer_id=l.id_user','left');
        $this->db->join('lawyer_amount la', 'la.experience=l.experience', 'left');
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
        else $this->db->where('c.status!=','closed');
        if(isset($data['user_id']))
            $this->db->where('user_id',$data['user_id']);
        if(isset($data['id_company']))
            $this->db->where('id_company',$data['id_company']);

        if(isset($data['date'])){
            $this->db->where('DATE_FORMAT(c.created_date_time,"%Y-%m-%d") <=',$data['date']);
        }

        $this->db->where('status!=','deleted');
        $this->db->order_by('id_company','desc');

        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result_array();
    }

    function updateEstablishCompany($data)
    {
        $this->db->where('id_company',$data['id_company']);
        $this->db->update('company',$data);
        //echo $this->db->last_query(); exit;
        return 1;
    }

    function updateCompanyPartner($data)
    {
        $this->db->where('id_company_partner',$data['id_company_partner']);
        $this->db->update('company_partner',$data);
        //echo $this->db->last_query(); exit;
        return 1;
    }

    function addAppeal($data)
    {
        $this->db->insert('appeal',$data);
        return $this->db->insert_id();
    }

    function getAppeal($data)
    {
        $this->db->select('c.*,la.lawyer_amount,u.username as user_name,l.username as lawyer_name,u.email as user_email,l.email as lawyer_email,at.appeal_type');
        $this->db->from('appeal c');
        $this->db->join('user u','c.user_id=u.id_user','left');
        $this->db->join('user l','c.lawyer_id=l.id_user','left');
        $this->db->join('lawyer_amount la', 'la.experience=l.experience', 'left');
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
        else $this->db->where('c.status!=','closed');
        if(isset($data['user_id']))
            $this->db->where('user_id',$data['user_id']);
        if(isset($data['id_appeal']))
            $this->db->where('id_appeal',$data['id_appeal']);

        if(isset($data['date'])){
            $this->db->where('DATE_FORMAT(c.created_date_time,"%Y-%m-%d") <=',$data['date']);
        }

        $this->db->where('status!=','deleted');
        $this->db->order_by('id_appeal','desc');

        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result_array();
    }

    function updateAppeal($data)
    {
        $this->db->where('id_appeal',$data['id_appeal']);
        $this->db->update('appeal',$data);
        //echo $this->db->last_query(); exit;
        return 1;
    }

    function getAppealType()
    {
        $query = $this->db->get('appeal_type');
        //echo $this->db->last_query();
        return $query->result_array();
    }

    function getConversation($data)
    {
        $this->db->select('c.*,u.user_type_id as from_type_id,u.id_user as from_id,u.username as from_name,u.user_image as from_image,l.user_type_id as to_type_id,l.id_user as to_id,l.username as to_name,l.user_image as to_image,u.email as from_email,l.email as to_email');
        $this->db->from('conversation c');
        $this->db->join('user u','c.from_id=u.id_user','left');
        $this->db->join('user l','c.to_id=l.id_user','left');

        if(isset($data['reference_id']))
            $this->db->where('reference_id',$data['reference_id']);
        if(isset($data['reference_type']))
            $this->db->where('reference_type',$data['reference_type']);

        $this->db->order_by('id_conversation','asc');

        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result_array();
    }

    function getResults($type,$id)
    {
        if($type=='consultation')
        {
            $this->db->select('*');
            $this->db->from('consultation');
            $this->db->where('id_consultation',$id);
        }
        else if($type=='contract-writing')
        {
            $this->db->select('*');
            $this->db->from('contract_writing');
            $this->db->where('id_contract_writing',$id);
        }
        else if($type=='company')
        {
            $this->db->select('*');
            $this->db->from('company');
            $this->db->where('id_company',$id);
        }
        else if($type=='appeal')
        {
            $this->db->select('*');
            $this->db->from('appeal');
            $this->db->where('id_appeal',$id);
        }

        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result_array();
    }

    function addConversatation($data)
    {
        $this->db->insert('conversation',$data);
        return $this->db->insert_id();
    }

    function updateConversatation($data,$id)
    {
        $this->db->where('id_conversation',$id);
        $this->db->update('conversation',$data);
        //echo $this->db->last_query(); exit;
        return 1;
    }

    function addRating($data)
    {
        $this->db->insert('rating',$data);
        return $this->db->insert_id();
    }

    function deletePartner($company_id)
    {
        $this->db->where('company_id',$company_id);
        $this->db->delete('company_partner');
        //echo $this->db->last_query(); exit;
        return 1;
    }

    function getLanguage()
    {
        $query = $this->db->get('language');
        return $query->result_array();
    }

    function getMenu($data)
    {
        $this->db->select('*');
        $this->db->from('menu m');
        $this->db->join('menu_data md','m.id_menu=md.menu_id','left');
        $this->db->where('md.language_id',$data['language_id']);
        if(isset($data['parent_id']))
            $this->db->where('m.parent_id',$data['parent_id']);
        $this->db->order_by('m.order','ASC');
        $this->db->where('m.menu_status',1);
        $query = $this->db->get();
        return $query->result_array();
    }

    function getArticle($data)
    {
        $this->db->select('*');
        $this->db->from('article a');
        $this->db->join('article_data ad','a.id_article=ad.article_id','left');
        if(isset($data['language_id']))
            $this->db->where('ad.language_id',$data['language_id']);
        if(isset($data['menu_id']))
            $this->db->where('a.menu_id',$data['menu_id']);

        $query = $this->db->get();
        return $query->result_array();
    }

    function addForum($data)
    {
        $this->db->insert('forum',$data);
        return $this->db->insert_id();
    }

    function getForum($data=array())
    {
        $this->db->select('*,a.created_date_time as forum_date');
        $this->db->from('forum a');
        $this->db->join('user u','a.user_id=u.id_user','left');
        if(isset($data['user_id']))
            $this->db->where('f.user_id',$data['user_id']);
        if(isset($data['id_forum']))
            $this->db->where('a.forum',$data['id_forum']);
        if(isset($data['offset']) && isset($data['limit']))
            $this->db->limit($data['limit'],$data['offset']);
        $this->db->where('a.status',1);
        $this->db->order_by('a.id_forum','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    function getForumCount()
    {
        $this->db->select('count(*) as total');
        $this->db->from('forum a');
        $this->db->join('user u','a.user_id=u.id_user','left');
        if(isset($data['user_id']))
            $this->db->where('f.user_id',$data['user_id']);
        if(isset($data['id_forum']))
            $this->db->where('a.forum',$data['id_forum']);
        $this->db->where('a.status',1);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data[0]['total'];
    }

    function deleteForum($data)
    {
        $this->db->where('id_forum',$data['id_forum']);
        $this->db->delete('forum');
        return 1;
    }

    function addAttachments($data)
    {
        $this->db->insert_batch('attachments',$data);
        return $this->db->insert_id();
    }

    function getAttachment($data)
    {
        $this->db->select('*');
        $this->db->from('attachments a');
        if(isset($data['type']))
            $this->db->where('a.type',$data['type']);
        if(isset($data['reference_id']))
            $this->db->where('a.reference_id',$data['reference_id']);

        $query = $this->db->get();
        //echo $this->db->last_query(); exit;
        return $query->result_array();
    }

    function deleteAttachment($id)
    {
        $this->db->where('id_attachment',$id);
        $this->db->delete('attachments');
    }

    function getRating($data)
    {
        $this->db->select('*');
        $this->db->from('rating');
        if(isset($data['reference_type']))
            $this->db->where('reference_type',$data['reference_type']);
        if(isset($data['reference_id']))
            $this->db->where('reference_id',$data['reference_id']);
        $query = $this->db->get();
        //echo $this->db->last_query(); exit;
        return $query->result_array();
    }

    function getServices($data)
    {
        $this->db->select('*');
        $this->db->from('service');
        $this->db->where('service_status',1);
        if($data['language_id'])
            $this->db->where('language_id',$data['language_id']);
        $query = $this->db->get();
        return $query->result_array();
    }

    function getUserTransactions($data)
    {
        $result = $this->db->query('select concat(u.first_name," ",u.last_name) as user_name,c.`subject`,c.`status` as case_status,st.reference_type,st.amount,c.created_date_time from service_transaction st
                        LEFT JOIN consultation c on st.reference_id=c.id_consultation and st.reference_type="consultation"
                        LEFT JOIN user u on c.user_id=u.id_user
                        where c.payment_status="paid" and c.lawyer_id='.$data["lawyer_id"].'
                    UNION ALL
                    select concat(u.first_name," ",u.last_name) as user_name,c.`subject`,c.`status` as case_status,st.reference_type,st.amount,c.created_date_time from service_transaction st
                        LEFT JOIN company c on st.reference_id=c.id_company and st.reference_type="company"
                        LEFT JOIN user u on c.user_id=u.id_user
                        where c.payment_status="paid" and c.lawyer_id='.$data["lawyer_id"].'
                    UNION ALL
                    select concat(u.first_name," ",u.last_name) as user_name,c.`subject`,c.`status` as case_status,st.reference_type,st.amount,c.created_date_time from service_transaction st
                        LEFT JOIN contract_writing c on st.reference_id=c.id_contract_writing and st.reference_type="contract_writing"
                        LEFT JOIN user u on c.user_id=u.id_user
                        where c.payment_status="paid" and c.lawyer_id='.$data["lawyer_id"].'
                    UNION ALL
                    select concat(u.first_name," ",u.last_name) as user_name,c.`subject`,c.`status` as case_status,st.reference_type,st.amount,c.created_date_time from service_transaction st
                        LEFT JOIN appeal c on st.reference_id=c.id_appeal and st.reference_type="appeal"
                        LEFT JOIN user u on c.user_id=u.id_user and c.lawyer_id='.$data["lawyer_id"].'
                        where c.payment_status="paid"');
        //$this->mcommon->clean_mysqli_connection($this->db->conn_id);
        $response=$result->result_array();
        return $response;
    }
}
?>