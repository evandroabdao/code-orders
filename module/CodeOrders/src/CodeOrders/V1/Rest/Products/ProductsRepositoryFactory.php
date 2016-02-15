<?php

namespace CodeOrders\V1\Rest\Products;

use Zend\ServiceManager\FactoryInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;

class ProductsRepositoryFactory implements FactoryInterface {
	
	/* (non-PHPdoc)
	 * @see \Zend\ServiceManager\FactoryInterface::createService()
	 */
	public function createService(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator) {
		
		$dbAdapter = $serviceLocator->get('DbAdapter');
		
		$productsMapper = new ProductsMapper();

		$hydrator = new HydratingResultSet($productsMapper, new ProductsEntity());
		
		$tableGateway = new TableGateway('products', $dbAdapter, null, $hydrator);
		
		$productsRepository = new ProductsRepository($tableGateway);

		return $productsRepository;
	}
	
}

?>