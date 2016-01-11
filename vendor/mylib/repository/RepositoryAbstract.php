<?php
namespace Mylib\Repository;

use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\HydratingResultSet;

abstract class RepositoryAbstract {
	
	protected $tableGatewayName;

	protected $tableEntity;
	
	protected $idColumn;
	
	protected $tableGateway;
	
	public function __construct(TableGatewayInterface $tableGateway){
	
		$this->tableGateway = $tableGateway;
	
	}
	
	public function findAll(){
		return $this->tableGateway->select();
	}
	
	public function find($id){

		$resultSet = $this->tableGateway->select([$this->idColumn=>(int)$id]);
		
		return $resultSet->current();
	}
	
	public function update($id, $data){
		
		$adapter = $this->tableGateway->getAdapter();
		
		$hydrator = new HydratingResultSet(new $this->tableEntity(), new $this->tableEntity());

		$table = new TableGateway($this->tableGatewayName, $adapter, null, $hydrator);
		
		$result = $table->update(json_decode(json_encode($data), true), array($this->idColumn=>(int)$id));
		
		return  $result;
	}
	
	public function create($data){
		
		$adapter = $this->tableGateway->getAdapter();
		
		$hydrator = new HydratingResultSet(new $this->tableEntity(), new $this->tableEntity());
		
		$table = new TableGateway($this->tableGatewayName, $adapter, null, $hydrator);
				
		$result = $table->insert(json_decode(json_encode($data), true));
		
		return  $result;
	}
	
	public function delete($id){
		$adapter = $this->tableGateway->getAdapter();
		
		$hydrator = new HydratingResultSet(new $this->tableEntity(), new $this->tableEntity());
		
		$table = new TableGateway($this->tableGatewayName, $adapter, null, $hydrator);

		$result = $table->delete(array($this->idColumn => (int) $id));
		
		return $result ? true : false;
	}
	
	public function findByusername($username){
		return $this->tableGateway->select(['username'=>$username])->current();
	}
	
	public function getRoleByUsername($username){
		return $this->tableGateway->select(['username'=>$username])->current()->getRole();
	}
}
