<?php

namespace CodeOrders\V1\Rest\Orders;

use Zend\Stdlib\Hydrator\ObjectProperty;
class OrdersService {
	
	private $repository;
	
	public function __construct(OrdersRepository $repository){
		$this->repository = $repository;
	}
	
	public function insert($data){
		$hydrator = new ObjectProperty();
		$data = $hydrator->extract($data);
		$data['created_at'] = date('Y-m-d H:i:s');
		
		$orderData = $data;
		unset($orderData['item']);
		$items = $data['item'];
		
		$tableGateway = $this->repository->getTableGateway();
		
		try{
			$tableGateway->getAdapter()->getDriver()->getConnection()->beginTransaction();
			$orderId = $this->repository->insert($orderData);
			
			foreach($items as $item){
				$item['order_id'] = $orderId;
				$this->repository->insertItem($item);
			}
			$tableGateway->getAdapter()->getDriver()->getConnection()->commit();
			return ['order_id'=>$orderId];
		}catch(\Exception $e){
			$tableGateway->getAdapter()->getDriver()->getConnection()->rollback();
			return 'error';
		}
		
		return ['order_id'=>$orderId];
	}
	
	
}

?>