<?php

namespace CodeOrders\V1\Rest\Products;

use Zend\Stdlib\Hydrator\HydratorInterface;

class ProductsMapper extends ProductsEntity implements HydratorInterface {
	
	/* (non-PHPdoc)
	 * @see \Zend\Stdlib\Extractor\ExtractionInterface::extract()
	 */
	public function extract($object) {
		return [
			'id' => $object->id,
			'name' => $object->name,
			'description' => $object->description,
			'price' => $object->price
		];
		
	}

	/* (non-PHPdoc)
	 * @see \Zend\Stdlib\Hydrator\HydrationInterface::hydrate()
	 */
	public function hydrate(array $data, $object) {
		$object->id = $data['id'];
		$object->name = $data['name'];
		$object->description = $data['description'];
		$object->price = $data['price'];
		
		return $object;
	}

	
}

?>