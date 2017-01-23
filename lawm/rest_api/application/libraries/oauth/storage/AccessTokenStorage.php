<?php

use League\OAuth2\Server\Entity\AccessTokenEntity;
use League\OAuth2\Server\Entity\ScopeEntity;
use League\OAuth2\Server\Storage\AbstractStorage;
use League\OAuth2\Server\Storage\AccessTokenInterface;

class AccessTokenStorage extends AbstractStorage implements AccessTokenInterface
{
    private $db;

    function __construct()
    {
        $CI =& get_instance();
        $this->db = $CI->db;
    }

    /**
     * {@inheritdoc}
     */
    public function get($token,$user)
    {
        $query = $this->db->query('select * from oauth_access_tokens oct
                                            left join oauth_sessions os on oct.session_id=os.id
                                            left join oauth_clients oc on oc.id=os.client_id
                                            where oct.access_token="'.$token.'" and oc.user_id="'.$user.'"');
        /*echo 'select * from oauth_access_tokens oct
                                            left join oauth_sessions os on oct.session_id=os.id
                                            left join oauth_clients oc on oc.id=os.client_id
                                            where oct.access_token="'.$token.'" and oc.user_id="'.$user.'"';*/

        $result = $query->result_array();
        //echo "<pre>"; print_r($result); exit;
        if (count($result) === 1) {
            $token = (new AccessTokenEntity($this->server))
                        ->setId($result[0]['access_token'])
                        ->setExpireTime($result[0]['expire_time']);

            return $token;
        }

        return;
    }

    /**
     * {@inheritdoc}
     */
    public function getScopes(AccessTokenEntity $token)
    {
        $this->db->select('oauth_scopes.id', 'oauth_scopes.description');
        $this->db->from('oauth_access_token_scopes');
        $this->db->join('oauth_scopes', 'oauth_access_token_scopes.scope_id', '=', 'oauth_scopes.id');
        $this->db->where('access_token_id', $token->getId());
        $query = $this->db->get();
        $result = $query->result_array();


            /*$result = Capsule::table('oauth_access_token_scopes')
                                        ->select(['oauth_scopes.id', 'oauth_scopes.description'])
                                        ->join('oauth_scopes', 'oauth_access_token_scopes.scope', '=', 'oauth_scopes.id')
                                        ->where('access_token', $token->getId())
                                        ->get();*/

        $response = [];

        if (count($result) > 0) {
            foreach ($result as $row) {
                $scope = (new ScopeEntity($this->server))->hydrate([
                    'id'            =>  $row['id'],
                    'description'   =>  $row['description'],
                ]);
                $response[] = $scope;
            }
        }

        return $response;
    }

    /**
     * {@inheritdoc}
     */
    public function create($token, $expireTime, $sessionId)
    {

        $this->db->insert('oauth_access_tokens',array('access_token' =>  $token,'session_id'    =>  $sessionId,'expire_time'   =>  $expireTime));
        /*Capsule::table('oauth_access_tokens')
                    ->insert([
                        'access_token'     =>  $token,
                        'session_id'    =>  $sessionId,
                        'expire_time'   =>  $expireTime,
                    ]);*/
    }

    /**
     * {@inheritdoc}
     */
    public function associateScope(AccessTokenEntity $token, ScopeEntity $scope)
    {
        $this->db->insert('oauth_access_token_scopes', array('access_token'  =>  $token->getId(),'scope' =>  $scope->getId()));

        /*Capsule::table('oauth_access_token_scopes')
                    ->insert([
                        'access_token'  =>  $token->getId(),
                        'scope' =>  $scope->getId(),
                    ]);*/
    }

    /**
     * {@inheritdoc}
     */
    public function delete(AccessTokenEntity $token)
    {
        $this->db->where('access_token', $token->getId());
        $this->db->delete('oauth_access_tokens');

        /*Capsule::table('oauth_access_tokens')
                    ->where('access_token', $token->getId())
                    ->delete();*/
    }
}
