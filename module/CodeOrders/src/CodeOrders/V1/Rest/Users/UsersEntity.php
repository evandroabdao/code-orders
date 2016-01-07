<?php
namespace CodeOrders\V1\Rest\Users;

use Zend\Stdlib\Hydrator\HydratorInterface;
class UsersEntity implements HydratorInterface
{
	
	protected $id;
	
	protected $username;
	
	protected $password;
	
	protected $first_name;
	
	protected $last_name;
	
	protected $role;
	
	/**
	 * @return the $id
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return the $username
	 */
	public function getUsername() {
		return $this->username;
	}

	/**
	 * @return the $password
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * @return the $first_name
	 */
	public function getFirst_name() {
		return $this->first_name;
	}

	/**
	 * @return the $last_name
	 */
	public function getLast_name() {
		return $this->last_name;
	}

	/**
	 * @return the $role
	 */
	public function getRole() {
		return $this->role;
	}

	/**
	 * @param field_type $id
	 */
	public function setId($id) {
		$this->id = $id;
		
		return $this;
	}

	/**
	 * @param field_type $username
	 */
	public function setUsername($username) {
		$this->username = $username;

		return $this;
	}

	/**
	 * @param field_type $password
	 */
	public function setPassword($password) {
		$this->password = $password;

		return $this;
	}

	/** 
	 * @param field_type $first_name
	 */
	public function setFirst_name($first_name) {
		$this->first_name = $first_name;

		return $this;
	}

	/**
	 * @param field_type $last_name
	 */
	public function setLast_name($last_name) {
		$this->last_name = $last_name;

		return $this;
	}

	/**
	 * @param field_type $role
	 */
	public function setRole($role) {
		$this->role = $role;

		return $this;
	}
	/* (non-PHPdoc)
	 * @see \Zend\Stdlib\Extractor\ExtractionInterface::extract()
	 */
	public function extract($object) {
		return [
			'id' => $object->id,
			'username' => $object->username,
			'password' => $object->password,
			'first_name' => $object->first_name,
			'last_name' => $object->last_name,
			'role' => $object->role
		];
	}

	/* (non-PHPdoc)
	 * @see \Zend\Stdlib\Hydrator\HydrationInterface::hydrate()
	 */
	public function hydrate(array $data, $object) {
		die('hydrating');
		$object->id = $data['id'];
		$object->username = $data['username'];
		$object->password = $data['password'];
		$object->first_name = $data['first_name'];
		$object->last_name = $data['last_name'];
		$object->role = $data['role'];
		
		return $object;
	}

	
}
