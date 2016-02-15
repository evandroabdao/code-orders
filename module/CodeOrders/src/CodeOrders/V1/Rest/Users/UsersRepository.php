<?php

namespace CodeOrders\V1\Rest\Users;

use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\HydratingResultSet;
use ZF\MvcAuth\Identity\AuthenticatedIdentity;

class UsersRepository {

	protected $tableGatewayName = 'oauth_users';

	protected $tableEntity = 'CodeOrders\V1\Rest\Users\UsersEntity';
	
	protected $idColumn = 'id';

    private $auth;
	
	public function __construct(TableGatewayInterface $tableGateway, AuthenticatedIdentity $auth){
	
		$this->tableGateway = $tableGateway;
        $this->auth = $auth;
	}
	
	public function findAll(){
		return $this->tableGateway->select();
	}
	
	public function find($id){
	
		$resultSet = $this->tableGateway->select(['id'=>(int)$id]);
		
		return $resultSet->current();
	}

	public function update($id, $data){

		$result = $this->tableGateway->update(json_decode(json_encode($data), true), array($this->idColumn=>(int)$id));
	
		return  $result;
	}
	
	public function create($data){
	
		$result = $this->tableGateway->insert(json_decode(json_encode($data), true));
	
		return  $result;
	}
	
	public function delete($id){
		$result = $this->tableGateway->delete(array($this->idColumn => (int) $id));
	
		return $result ? true : false;
	}

    public function findByUsername($username){
		return $this->tableGateway->select(['username'=>$username])->current();
	}
	
	public function getRoleByUsername($username){
		return $this->tableGateway->select(['username'=>$username])->current()->getRole();
	}

    public function getAuthenticated(){
        $username = $this->auth->getAuthenticationIdentity()['user_id'];
        return $this->findByUsername($username);
    }
}

?>