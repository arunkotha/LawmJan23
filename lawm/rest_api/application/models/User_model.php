<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    public $key='#&Law@*#&';

    public function createOauthCredentials($user_id,$first_name,$last_name)
    {
        $query = $this->db->get_where('oauth_clients',array('user_id' => $user_id));
        $result = $query->result_array();
        $key = bin2hex(openssl_random_pseudo_bytes(10));
        if(empty($result))
        {
            $data = array(
                'user_id' => $user_id,
                'secret' => $key,
                'name' => $first_name.' '.$last_name
            );
            $this->db->insert('oauth_clients', $data);
            $client_id = $this->db->insert_id();
            return array('client_id' => $client_id, 'client_secret' => $key);
        }
        else
        {
            return array('client_id' => $result[0]['id'], 'client_secret' => $result[0]['secret']);
        }
    }

    public function getTokenDetails($access_token,$user_id)
    {
        $query = $this->db->query('select * from oauth_access_tokens oct
                                            left join oauth_sessions os on oct.session_id=os.id
                                            left join oauth_clients oc on oc.id=os.client_id
                                            where oct.access_token="'.$access_token.'" and oc.user_id="'.$user_id.'"');
        return $query->result_array();
    }

    public function getSession($data)
    {
        $this->db->select('oc.name,os.*');
        $this->db->from('oauth_sessions os');
        $this->db->join('oauth_clients oc','oc.id=os.client_id','left');
        $this->db->where('oc.user_id',$data['user_id']);
        if(isset($data['offset']) && $data['offset']!='' && isset($data['limit']) && $data['limit']!='')
            $this->db->limit($data['limit'],$data['offset']);
        $this->db->order_by('os.id','DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getTotalSession($data)
    {
        $this->db->select('*');
        $this->db->from('oauth_sessions os');
        $this->db->join('oauth_clients oc','oc.id=os.client_id','left');
        $this->db->where('oc.user_id',$data['user_id']);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function encode($value)
    {
        return strtr(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($this->key), $value, MCRYPT_MODE_CBC, md5(md5($this->key)))),'+/=', '-_,');
    }
    public function decode($value)
    {
        return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($this->key), base64_decode(strtr($value, '-_,', '+/=')), MCRYPT_MODE_CBC, md5(md5($this->key))), "\0");
    }

    public function activeAccount($code)
    {
        $query = $this->db->get_where('user',array('id_user' => $this->decode($code)));
        $data = $query->row();
        if(empty($data)){ return 0; }
        else{
            $update = array('user_status' => '1');
            $this->db->where('id_user', $this->decode($code));
            $this->db->update('user', $update);
            return 1;
        }
    }

    public function login($data)
    {
        $this->db->select('u.id_user,u.user_type_id,u.first_name,u.father_name,u.last_name,u.email,u.username,u.gender,u.speciality_id,u.mobile_number,u.country_id,user_image,ut.user_type,u.speciality_id,s.speciality,c.country_name,u.experience,u.certification_attachment');
        $this->db->from('user u');
        $this->db->join('user_type ut','u.user_type_id=ut.id_user_type','left');
        $this->db->join('speciality s','u.speciality_id=s.id_speciality','left');
        $this->db->join('country c','u.country_id = c.id_country', 'left');
        $this->db->where(array('u.email' => $data['email'], 'u.password' => md5($data['password']),'u.user_type_id' => $data['user_type_id'],'user_status' => 1));
        $query = $this->db->get();
        //echo $this->db->last_query(); exit;
        return $query->row();
    }

    public function check_email($email,$type='',$id='')
    {
        if($type=='email')
        {
            $this->db->select('u.*');
            $this->db->from('user u');
            if($id!=0 && $id!='')
                $this->db->where('u.id_user!=',$id);
            $this->db->where('u.email',addslashes($email));
            $query = $this->db->get();
        }
        else if($type=='username')
        {
            $this->db->select('u.*');
            $this->db->from('user u');
            if($id!=0 && $id!='')
                $this->db->where('u.id_user!=',$id);
            $this->db->where('u.username',addslashes($email));
            $query = $this->db->get();
        }
        return $query->row();
    }

    public function passwordExist($data)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id_user',$data['user_id']);
        $this->db->where('password',md5($data['oldpassword']));
        $query=$this->db->get();
        return $query->num_rows();
    }
    public function changePassword($data)
    {
        $update = array('password' => md5($data['password']));
        $this->db->where('id_user', $data['user_id']);
        $this->db->update('user', $update);
        return 1;
    }

    public function getUsersList($data)
    {
        if(isset($data['user_type_id']) && $data['user_type_id']==2)
            $this->db->select('u.id_user,u.user_type_id,u.first_name,u.father_name,u.last_name,u.email,u.username,u.gender,u.speciality_id,u.mobile_number,u.country_id,u.user_image,u.certification_attachment,ut.user_type,s.speciality,c.country_name,IFNULL(avg(r.rating),0) as rating,u.experience');
        else if(isset($data['user_type_id']) && $data['user_type_id']==3)
            $this->db->select('u.id_user,u.user_type_id,u.first_name,u.father_name,u.last_name,u.email,u.username,u.gender,u.speciality_id,u.mobile_number,u.country_id,u.user_image,u.certification_attachment,ut.user_type,s.speciality,c.country_name,IFNULL(avg(r.rating),0) as rating');
        $this->db->from('user u');
        $this->db->join('user_type ut','u.user_type_id=ut.id_user_type','left');
        $this->db->join('speciality s','u.speciality_id=s.id_speciality','left');
        $this->db->join('country c','u.country_id = c.id_country', 'left');
        if(isset($data['user_type_id']) && $data['user_type_id']==2)
            $this->db->join('rating r','r.lawyer_id=u.id_user and type="lawyer"','left');
        if(isset($data['user_type_id']) && $data['user_type_id']==3)
            $this->db->join('rating r','r.lawyer_id=u.id_user and type="user"','left');
        if(isset($data['user_type_id']))
            $this->db->where('u.user_type_id',$data['user_type_id']);
        if(isset($data['email']))
            $this->db->where('u.email',$data['email']);
        $this->db->group_by('u.id_user');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getLawyersList($data)
    {
        if(isset($data['user_type_id']) && $data['user_type_id']==3)
            $this->db->select('u.id_user,u.user_type_id,u.first_name,u.father_name,u.last_name,u.email,u.username,u.gender,u.speciality_id,u.mobile_number,u.country_id,u.user_image,u.certification_attachment,ut.user_type,s.speciality,c.country_name,IFNULL(avg(r.rating),0) as rating,u.experience');
        else if(isset($data['user_type_id']) && $data['user_type_id']==2)
            $this->db->select('u.id_user,u.user_type_id,u.first_name,u.father_name,u.last_name,u.email,u.username,u.gender,u.speciality_id,u.mobile_number,u.country_id,u.user_image,u.certification_attachment,ut.user_type,s.speciality,c.country_name,IFNULL(avg(r.rating),0) as rating');
        $this->db->from('user u');
        $this->db->join('user_type ut','u.user_type_id=ut.id_user_type','left');
        $this->db->join('speciality s','u.speciality_id=s.id_speciality','left');
        $this->db->join('country c','u.country_id = c.id_country', 'left');
        if(isset($data['user_type_id']) && $data['user_type_id']==3)
            $this->db->join('rating r','r.lawyer_id=u.id_user and type="lawyer"','left');
        if(isset($data['user_type_id']) && $data['user_type_id']==2)
            $this->db->join('rating r','r.lawyer_id=u.id_user and type="user"','left');
        if(isset($data['user_type_id']))
            $this->db->where('u.user_type_id',$data['user_type_id']);
        if(isset($data['email']))
            $this->db->where('u.email',$data['email']);
        $this->db->group_by('u.id_user');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getUserInfo($data)
    {
        $query = $this->db->get_where('user', array('id_user' => $data['id']));
        return $query->row();
    }

    public function updateUser($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->update('user', $data);
        return 1;
    }

    function updateUserImage($data)
    {
        $this->db->where('email', $data['email']);
        $this->db->update('user',$data);
        return 1;
    }
    public function addUser($data)
    {
        $this->db->insert('user', $data);
        return $this->db->insert_id();
    }

    public function getCountries()
    {
        $query = $this->db->get('country');
        return $query->result_array();
    }

    public function getSpecialities()
    {
        $query = $this->db->get('speciality');
        return $query->result_array();
    }

    public function consultation($data)
    {
        $this->db->select('c.id_consultation,la.lawyer_amount,c.payment_status,c.user_id,c.lawyer_id,c.consultation_type,c.complain,c.subject,c.description,c.attachment,c.status,DATE_FORMAT(c.created_date_time,"%d-%m-%Y") as date,u.username as user_name,u.email as user_email,l.username as lawyer_name,l.email as lawyer_email,0 as replies_count,c.created_date_time');
        $this->db->from('consultation c');
        $this->db->join('user u', 'c.user_id=u.id_user', 'left');
        $this->db->join('user l', 'c.lawyer_id=l.id_user', 'left');
        $this->db->join('lawyer_amount la', 'la.experience=l.experience', 'left');
        //$this->db->join('conversation cv', 'cv.reference_id=c.id_consultation and reference_type="consultation"', 'left');
        if (isset($data['lawyer_id']))
            $this->db->where('c.lawyer_id', $data['lawyer_id']);
        if (isset($data['lawyer_id_not']))
            $this->db->where('c.lawyer_id!=', $data['lawyer_id_not']);
        if (isset($data['status']) && $data['status'] == 'other')
            $this->db->where('(c.status="pending" or c.status="rejected")');
        else if (isset($data['pending-accepted']))
            $this->db->where('(c.status="pending" or c.status="accepted")');
        else if (isset($data['status']))
            $this->db->where('c.status', $data['status']);
        if (isset($data['user_id']))
            $this->db->where('user_id', $data['user_id']);
        if (isset($data['id_consultation']))
            $this->db->where('id_consultation', $data['id_consultation']);

        $this->db->where('status!=', 'deleted');
        $this->db->group_by('id_consultation');
        $this->db->order_by('id_consultation','desc');

        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result_array();
    }
	
	function addConsultation($data)
    {
        $this->db->insert('consultation',$data);
        return $this->db->insert_id();
    }

    function addServiceTransaction($data)
    {
        $this->db->insert('service_transaction',$data);
        return $this->db->insert_id();
    }
	
	function updateConsultation($data)
    {
        $this->db->where('id_consultation',$data['id_consultation']);
        $this->db->update('consultation',$data);
        //echo $this->db->last_query(); exit;
        return 1;
    }

    function getMyTransactions($data)
    {
        $this->db->select('st.*,DATE_FORMAT(st.created_date_time,"%d-%m-%Y") as date');
        $this->db->from('service_transaction st');
        if(isset($data['user_id']))
            $this->db->where('st.user_id',$data['user_id']);
        $query = $this->db->get();
        return $query->result_array();
    }
	
	function getContractWriting($data)
    {
        $this->db->select('c.*,la.lawyer_amount,c.payment_status,DATE_FORMAT(c.created_date_time,"%d-%m-%Y") as date,u.username as user_name,u.email as user_email,l.username as lawyer_name,l.email as lawyer_email,0 as replies_count');
        $this->db->from('contract_writing c');
        $this->db->join('user u','c.user_id=u.id_user','left');
        $this->db->join('user l','c.lawyer_id=l.id_user','left');
        $this->db->join('lawyer_amount la', 'la.experience=l.experience', 'left');
        //$this->db->join('conversation cv', 'cv.reference_id=c.id_consultation and reference_type="contract-writing"', 'left');
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

        $this->db->where('status!=','deleted');
        $this->db->group_by('id_contract_writing');
        $this->db->order_by('id_contract_writing','desc');

        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result_array();
    }
	
	function addContractWriting($data)
    {
        $this->db->insert('contract_writing',$data);
        return $this->db->insert_id();
    }
	
	function updateContractWriting($data)
    {
        $this->db->where('id_contract_writing',$data['id_contract_writing']);
        $this->db->update('contract_writing',$data);
        //echo $this->db->last_query(); exit;
        return 1;
    }
	
	
	function getEstablishCompany($data)
    {
        $this->db->select('c.*,la.lawyer_amount,c.payment_status,c.created_date_time as date,cp.*,u.username as user_name,u.email as user_email,l.username as lawyer_name,l.email as lawyer_email,0 as replies_count');
        $this->db->from('company c');
        $this->db->join('user u','c.user_id=u.id_user','left');
        $this->db->join('user l','c.lawyer_id=l.id_user','left');
        $this->db->join('lawyer_amount la', 'la.experience=l.experience', 'left');
        $this->db->join('company_partner cp','c.id_company=cp.company_id','left');
        //$this->db->join('conversation cv', 'cv.reference_id=c.id_consultation and reference_type="company"', 'left');
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

        $this->db->where('status!=','deleted');
        //$this->db->group_by('id_company');
        $this->db->order_by('id_company','desc');

        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result_array();
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
	
	function deletePartners($company_id)
	{
		$this->db->where('company_id',$company_id);
		$this->db->delete('company_partner');
	}

	function getAppeal($data)
    {
        $this->db->select('c.*,la.lawyer_amount,c.payment_status,u.username as user_name,u.email as user_email,l.username as lawyer_name,l.email as lawyer_email,at.appeal_type,0 as replies_count');
        $this->db->from('appeal c');
        $this->db->join('user u','c.user_id=u.id_user','left');
        $this->db->join('user l','c.lawyer_id=l.id_user','left');
        $this->db->join('lawyer_amount la', 'la.experience=l.experience', 'left');
        $this->db->join('appeal_type at','c.appeal_type_id=at.id_appeal_type','left');
        //$this->db->join('conversation cv', 'cv.reference_id=c.id_consultation and reference_type="appeal"', 'left');
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

        $this->db->where('status!=','deleted');
        $this->db->group_by('id_appeal');
        $this->db->order_by('id_appeal','desc');

        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result_array();
    }

	function addAppeal($data)
    {
        $this->db->insert('appeal',$data);
        return $this->db->insert_id();
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

    function consultationType()
    {
        $query = $this->db->get('consultation_type');
        //echo $this->db->last_query();
        return $query->result_array();
    }

    function getCompanyPartners($data)
    {
        $this->db->select('*');
        $this->db->from('company_partner');
        if(isset($data['company_id']))
            $this->db->where('company_id',$data['company_id']);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result_array();
    }

    function getConversation($data)
    {
        $this->db->select('c.*,u.id_user as from_id,u.username as from_name,u.user_image as from_image,l.id_user as to_id,l.username as to_name,l.user_image as to_image');
        $this->db->from('conversation c');
        $this->db->join('user u','c.from_id=u.id_user','left');
        $this->db->join('user l','c.to_id=l.id_user','left');

        if(isset($data['reference_id']))
            $this->db->where('reference_id',$data['reference_id']);
        if(isset($data['reference_type']))
            $this->db->where('reference_type',$data['reference_type']);

        $this->db->order_by('id_conversation','desc');

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

    function addAttachments($data)
    {
        $this->db->insert_batch('attachments', $data);
    }

    function getAttachments($data)
    {
        $this->db->select('a.id_attachment,a.attachment');
        $this->db->from('attachments a');

        if(isset($data['reference_id']))
            $this->db->where('a.reference_id',$data['reference_id']);
        if(isset($data['type']))
            $this->db->where('a.type',$data['type']);

        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result_array();
    }

    function getCoversationReplies($data)
    {
        $this->db->select('*');
        $this->db->from('conversationz c');
        if(isset($data['reference_type']))
            $this->db->where('reference_type',$data['reference_type']);
        if(isset($data['reference_id']))
            $this->db->where('reference_id',$data['reference_id']);
        //$this->db->order_by("created_date_time", "asc");
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result_array();
    }

    function getServicesUserDetails($data)
    {

    }

    function getForum($data)
    {//echo "<pre>";print_r($data); exit;
        $this->db->select('*');
        $this->db->from('forum');
        if(isset($data['user_id']))
            $this->db->where('user_id',$data['user_id']);
        $this->db->where('status',1);
        $this->db->order_by('id_forum','desc');

        $query = $this->db->get();
        //echo $this->db->last_query(); exit;
        return $query->result_array();
    }

    function addForum($data)
    {
        $this->db->insert('forum',$data);
        return $this->db->insert_id();
    }

    function deleteAttachment($data)
    {   //echo "<pre>";print_r($data); exit;
        $this->db->where('reference_id',$data['reference_id']);
        $this->db->where('type', $data['reference_type']);
        $this->db->where('id_attachment', $data['id_attachment']);
        $this->db->delete('attachments');
        //$this->db->last_query(); exit;
        return 1;
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
}