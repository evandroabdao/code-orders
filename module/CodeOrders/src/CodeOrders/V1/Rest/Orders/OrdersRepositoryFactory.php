<?php

namespace CodeOrders\V1\Rest\Orders;

use Zend\ServiceManager\FactoryInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Db\TableGateway\TableGateway;

class OrdersRepositoryFactory implements FactoryInterface {
	/* (non-PHPdoc)
	 * @see \Zend\ServiceManager\FactoryInterface::createService()
	 */
	public function createService(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator) {
		// TODO Auto-generated method stub
		$adapter = $serviceLocator->get('DbAdapter');
		
		$hydrator = new HydratingResultSet(new ClassMethods(), new OrdersEntity());
		
		$tableGateway = new TableGateway('orders', $adapter, null, $hydrator);
		
		$orderItemTableGateway = $serviceLocator->get('CodeOrders\\V1\\Rest\\Orders\\OrderItemTableGateway');
		
		return new OrdersRepository($tableGateway, $orderItemTableGateway);
	}


}

?>