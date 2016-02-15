<?php

namespace CodeOrders\V1\Rest\Orders;

use CodeOrders\V1\Rest\Products\ProductsRepository;
use CodeOrders\V1\Rest\Users\UsersEntity;
use CodeOrders\V1\Rest\Users\UsersRepository;
use Zend\Stdlib\Hydrator\ObjectProperty;
class OrdersService {
	
	private $repository;

    private $usersRepository;

    private $productRepository;

	public function __construct(OrdersRepository $repository, UsersRepository $usersRepository, ProductsRepository $productRepository){
		$this->repository = $repository;
        $this->usersRepository = $usersRepository;
        $this->productRepository = $productRepository;
	}
	
	public function insert($data){
		$hydrator = new ObjectProperty();
        $data->user_id = $this->usersRepository->getAuthenticated()->getId();
        $data->created_at = (new \Datetime())->format('Y-m-d');
        $data->total = 0;
        $items = $data->item;
        unset($data->item);

		$orderData = $hydrator->extract($data);
		$tableGateway = $this->repository->getTableGateway();

		try{
			$tableGateway->getAdapter()->getDriver()->getConnection()->beginTransaction();
			$orderId = $this->repository->insert($orderData);

            $total = 0;
			foreach($items as $key=>$item){
                $product = $this->productRepository->find($item['product_id']);

                $item['order_id'] = $orderId;
				$item['price'] = $product->getPrice();
                $item['total'] = $items[$key]['total'] = $item['quantity'] * $item['price'];
                $total += $item['total'];

				$this->repository->insertItem($item);
			}
            $this->repository->update($orderId, ['total'=>$total]);
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