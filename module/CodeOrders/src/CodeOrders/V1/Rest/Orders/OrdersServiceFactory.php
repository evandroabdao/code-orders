<?php

namespace CodeOrders\V1\Rest\Orders;

use Zend\ServiceManager\FactoryInterface;
class OrdersServiceFactory implements FactoryInterface{
	/* (non-PHPdoc)
	 * @see \Zend\ServiceManager\FactoryInterface::createService()
	 */
	public function createService(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator) {
		// TODO Auto-generated method stub
		$orderRepository = $serviceLocator->get('CodeOrders\\V1\\Rest\\Orders\\OrdersRepository');
		
		return new OrdersService($orderRepository);
	}

}

?>