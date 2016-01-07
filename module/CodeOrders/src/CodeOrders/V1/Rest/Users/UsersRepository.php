<?php

namespace CodeOrders\V1\Rest\Users;

use Mylib\Repository\RepositoryAbstract;

class UsersRepository extends RepositoryAbstract {

	protected $tableGatewayName = 'oauth_users';

	protected $tableEntity = 'CodeOrders\V1\Rest\Users\UsersEntity';
	
	protected $idColumn = 'id';
	
}

?>