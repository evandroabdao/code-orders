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
        $userRepository = $serviceLocator->get('CodeOrders\\V1\\Rest\\Users\\UsersRepository');
        $productsRepository = $serviceLocator->get('CodeOrders\\V1\\Rest\\Products\\ProductsRepository');
		
		return new OrdersService($orderRepository, $userRepository, $productsRepository);
	}

}

?>