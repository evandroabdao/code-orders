<?php
namespace CodeOrders\V1\Rest\Products;

use Zend\Stdlib\Hydrator\HydratorInterface;
class ProductsEntity implements HydratorInterface
{
	
	protected $id;

	protected $name;
	
	protected $description;
	
	protected $price;
	/**
	 * @return the $id
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return the $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @return the $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * @return the $price
	 */
	public function getPrice() {
		return $this->price;
	}

	/**
	 * @param field_type $id
	 */
	public function setId($id) {
		$this->id = $id;
		
		return $this;
	}

	/**
	 * @param field_type $name
	 */
	public function setName($name) {
		$this->name = $name;
		
		return $this;
	}

	/**
	 * @param field_type $description
	 */
	public function setDescription($description) {
		$this->description = $description;
		
		return $this;
	}

	/**
	 * @param field_type $price
	 */
	public function setPrice($price) {
		$this->price = $price;
		
		return $this;
	}
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
		die('hydrating');
		$object->id = $data['id'];
		$object->name = $data['name'];
		$object->description = $data['description'];
		$object->price = $data['price'];
	
		return $object;
	}
}
