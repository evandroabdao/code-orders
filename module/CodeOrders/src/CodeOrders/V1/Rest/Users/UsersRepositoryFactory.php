<?php

namespace CodeOrders\V1\Rest\Users;

use Zend\ServiceManager\FactoryInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Stdlib\Hydrator\ClassMethods;
use ZF\ApiProblem\ApiProblem;

class UsersRepositoryFactory implements FactoryInterface {
	
	/* (non-PHPdoc)
	 * @see \Zend\ServiceManager\FactoryInterface::createService()
	 */
	public function createService(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator) {
		
		$dbAdapter = $serviceLocator->get('DbAdapter');
//		$usersMapper = new UsersMapper();
		$hydrator = new HydratingResultSet(new ClassMethods(), new UsersEntity());
		
		$tableGateway = new TableGateway('oauth_users', $dbAdapter, null, $hydrator);

        $auth = $serviceLocator->get('api-identity');

		$usersRepository = new UsersRepository($tableGateway, $auth);
		
		return $usersRepository;
	}
	
}

?>