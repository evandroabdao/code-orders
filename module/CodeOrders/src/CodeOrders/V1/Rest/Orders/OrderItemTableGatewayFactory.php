<?php

namespace CodeOrders\V1\Rest\Orders;

use Zend\ServiceManager\FactoryInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Stdlib\Hydrator\ClassMethods;

class OrderItemTableGatewayFactory implements FactoryInterface{
	/* (non-PHPdoc)
	 * @see \Zend\ServiceManager\FactoryInterface::createService()
	 */
	public function createService(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator) {
		// TODO Auto-generated method stub
		$adapter = $serviceLocator->get('DbAdapter');

		$tableGateway = new TableGateway('order_items', $adapter);
		
		$hydrator = new HydratingResultSet(new ClassMethods(), new OrderItemEntity());
		$tableGateway = new TableGateway('order_items', $adapter, null, $hydrator);
		
		return $tableGateway;
	}
}

?>