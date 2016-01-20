<?php

namespace CodeOrders\V1\Rest\Clients;

use Zend\Stdlib\Hydrator\HydratorInterface;

class ClientsMapper extends ClientsEntity implements HydratorInterface {
	
	/* (non-PHPdoc)
	 * @see \Zend\Stdlib\Extractor\ExtractionInterface::extract()
	 */
	public function extract($object) {
		return [
			'id' => $object->id,
			'name' => $object->name,
			'document' => $object->document,
			'address' => $object->address,
			'zipcode' => $object->zipcode,
			'city' => $object->city,
			'state' => $object->state,
			'responsible' => $object->responsible,
			'email' => $object->email,
			'phone' => $object->phone,
			'obs' => $object->obs
		];
		
	}

	/* (non-PHPdoc)
	 * @see \Zend\Stdlib\Hydrator\HydrationInterface::hydrate()
	 */
	public function hydrate(array $data, $object) {
		$object->id = $data['id'];
		$object->name = $data['name'];
		$object->document = $data['document'];
		$object->address = $data['address'];
		$object->zipcode = $data['zipcode'];
		$object->city = $data['city'];
		$object->state = $data['state'];
		$object->responsible = $data['responsible'];
		$object->email = $data['email'];
		$object->phone = $data['phone'];
		$object->obs = $data['obs'];

		return $object;
	}

	
}

?>