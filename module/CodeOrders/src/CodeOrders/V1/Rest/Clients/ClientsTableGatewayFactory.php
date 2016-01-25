<?php
/**
 * Created by PhpStorm.
 * User: Evandro
 * Date: 22/01/2016
 * Time: 19:59
 */

namespace CodeOrders\V1\Rest\Clients;


use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator\ClassMethods;

class ClientsTableGatewayFactory implements FactoryInterface {

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $adapter = $serviceLocator->get('DbAdapter');
        $hydrator = new HydratingResultSet(new ClassMethods(), new ClientsEntity());

        $tableGateway = new TableGateway('clients', $adapter, null, $hydrator);

        return $tableGateway;

    }
}