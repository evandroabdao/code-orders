<?php

namespace CodeOrders\V1\Rest\Orders;

use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;
use Zend\Stdlib\Hydrator\ClassMethods;
class OrderItemHydratorStrategy implements StrategyInterface{
	
	private $hydrator;
	
	public function __construct(ClassMethods $hydrator){
		$this->hydrator = $hydrator;
	}
	
	/* (non-PHPdoc)
	 * @see \Zend\Stdlib\Hydrator\Strategy\StrategyInterface::extract()
	 */
	public function extract($items) {
		
		$data = [];

		foreach($items as $item){
			$data[] = $this->hydrator->extract($item);
		}
		
		return $data;
		
	}

	/* (non-PHPdoc)
	 * @see \Zend\Stdlib\Hydrator\Strategy\StrategyInterface::hydrate()
	 */
	public function hydrate($value) {
		
		throw new \RuntimeExceptio("Hytration is not supported");
		
	}

	
}

?>