<?php

namespace CodeOrders\V1\Rest\Orders;

use CodeOrders\V1\Rest\Users\UsersEntity;
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

	protected $clientTableGateway;

	protected $orderItemTableGateway;

	public function __construct(AbstractTableGateway $tableGateway, AbstractTableGateway $orderItemTableGateway, AbstractTableGateway $clientTableGateway){
		$this->tableGateway = $tableGateway; 
		$this->orderItemTableGateway = $orderItemTableGateway; 
		$this->clientTableGateway = $clientTableGateway;
	}
	
	public function findAll(UsersEntity $user){

        $hydrator = new ClassMethods();
        $hydrator->addStrategy('items', new OrderItemHydratorStrategy(new ClassMethods()));

        $res = [];

        switch($user->getRole()){
            case 'administrador':
            $orders = $this->tableGateway->select();
            break;
            case 'salesman':
                $orders = $this->tableGateway->select(['user_id'=>$user->getId()]);
                break;
            case 'guest':
            default:
                return new ApiProblem(405, "Guests can't get orders list.");
                break;
        }

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

	public function find($id)
    {
        $hydrator = new ClassMethods();
        $hydrator->addStrategy('items', new OrderItemHydratorStrategy(new ClassMethods()));
        $resultSet = $this->tableGateway->select(['id' => (int)$id]);
        //$items = $this->orderItemTableGateway->select(['order_id'=>$id]);

        if ($resultSet->count() == 1) {
            $order = $resultSet->current();

            $client = $this->clientTableGateway
                ->select(['id'=>$order->getClientId()])
                ->current();


            $sql = $this->orderItemTableGateway->getSql();
            $select = $sql->select();
            $select->join(
                'products',
                'order_items.product_id = products.id',
                ['product_name' => 'name']
            )->where(['order_id'=>$order->getId()])
            ;

            $items = $this->orderItemTableGateway->selectWith($select);

            $order->setClient($client);
            foreach ($items as $item) {
                $order->addItem($item);
            }


            $data = $hydrator->extract($order);

            return $data;
        }
        return false;
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
        $items = $this->orderItemTableGateway->delete(['order_id'=>$id]);
        $result = $this->tableGateway->delete(array($this->idColumn => (int) $id));

		return $result ? true : false;
	}
	
}

?>