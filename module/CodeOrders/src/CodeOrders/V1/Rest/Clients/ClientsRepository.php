<?php

namespace CodeOrders\V1\Rest\Clients;

use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\HydratingResultSet;

class ClientsRepository {
	
	protected $tableGatewayName = 'Clients';
	
	protected $tableEntity = 'CodeOrders\V1\Rest\Clients\ClientsEntity';
	
	protected $idColumn = 'id';
	
	public function __construct(TableGatewayInterface $tableGateway){
	
		$this->tableGateway = $tableGateway;
	
	}
	
	public function findAll($params){
		return $this->tableGateway->select();
	}
	
	public function find($id){
	
		$resultSet = $this->tableGateway->select([$this->idColumn=>(int)$id]);
	
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
	
}

?>