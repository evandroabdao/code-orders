<?php

namespace CodeOrders\V1\Rest\Orders;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Paginator\Adapter\ArrayAdapter;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\HydratingResultSet;

class OrdersRepository {

	protected $tableGatewayName = 'oauth_users';

	protected $tableEntity = 'CodeOrders\V1\Rest\Orders\OrdersEntity';
	
	protected $idColumn = 'id';
	
	protected $tableGateway;
	
	protected $orderItemTableGateway;
	
	public function __construct(AbstractTableGateway $tableGateway, AbstractTableGateway $orderItemTableGateway){
		$this->tableGateway = $tableGateway; 
		$this->orderItemTableGateway = $orderItemTableGateway; 
	}
	
// 	public function findAll(){
		
// 		$hydrator = new ClassMethods();

// 		$orders = $this->tableGateway->select();
		
// 		$res = [];
		
// 		foreach($orders as $order){
// 			$items = $this->orderItemTableGateway->select(['order_id'=>$order->getId()]);
// 			foreach($items as $item){
// 				$order->addItem($hydrator->extract($item));
// 			}
// 			$data = $hydrator->extract($order);
// 			$res[] = $data;
// 		}
// 		return $res;
// 	}
	
	public function findAll(){
		
		$hydrator = new ClassMethods();
		$hydrator->addStrategy('items', new OrderItemHydratorStrategy(new ClassMethods()));
		$orders = $this->tableGateway->select();
		
		$res = [];
		
		foreach($orders as $order){
			$items = $this->orderItemTableGateway->select(['order_id'=>$order->getId()]);
			foreach($items as $item){
				$order->addItem($item);
			}
			$data = $hydrator->extract($order);
			$res[] = $data;
		}
		
		$arrayAdapter = new ArrayAdapter($res);
		
		$ordersCollection = new OrdersCollection($arrayAdapter);
		
		return $ordersCollection;
	}
	
	public function insert($data){
		
		$order = $this->tableGateway->insert($data);

		$id = $this->tableGateway->getLastInsertValue();
		
		return $id;
	}
	
	public function insertItem(array $data){
		$this->orderItemTableGateway->insert($data);
		return $this->orderItemTableGateway->getLastInsertValue();
	}
	
	public function getTableGateway(){
		return $this->tableGateway;
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
	
}

?>