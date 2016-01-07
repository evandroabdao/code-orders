<?php

namespace CodeOrders\V1\Rest\Products;

use Mylib\Repository\RepositoryAbstract;

class ProductsRepository extends RepositoryAbstract {
	
	protected $tableGatewayName = 'products';
	
	protected $tableEntity = 'CodeOrders\V1\Rest\Products\ProductsEntity';
	
	protected $idColumn = 'id';
	
}

?>