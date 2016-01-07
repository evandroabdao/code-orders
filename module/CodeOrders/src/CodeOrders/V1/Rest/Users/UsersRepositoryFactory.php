<?php

namespace CodeOrders\V1\Rest\Users;

use Zend\ServiceManager\FactoryInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;

class UsersRepositoryFactory implements FactoryInterface {
	
	/* (non-PHPdoc)
	 * @see \Zend\ServiceManager\FactoryInterface::createService()
	 */
	public function createService(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator) {
		
		$dbAdapter = $serviceLocator->get('DbAdapter');
		
		$usersMapper = new UsersMapper();
		
		$hydrator = new HydratingResultSet($usersMapper, new UsersEntity());
		
		$tableGateway = new TableGateway('oauth_users', $dbAdapter, null, $hydrator);

		$usersRepository = new UsersRepository($tableGateway);
		
		return $usersRepository;
	}
	
}

?>