<?php
namespace CodeOrders\V1\Rest\Orders;

class OrdersEntity
{
	
	protected $id;
	
	protected $client_id;
	
	protected $user_id;
	
	protected $ptype_id;
	
	protected $total;
	
	protected $status;
	
	protected $created_at;
	
	protected $items;
	
	public function __construct(){
		$this->items = [];
	}
	/**
	 * @return the $id
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return the $client_id
	 */
	public function getClient_id() {
		return $this->client_id;
	}

	/**
	 * @return the $user_id
	 */
	public function getUser_id() {
		return $this->user_id;
	}

	/**
	 * @return the $ptype_id
	 */
	public function getPtype_id() {
		return $this->ptype_id;
	}

	/**
	 * @return the $total
	 */
	public function getTotal() {
		return $this->total;
	}

	/**
	 * @return the $status
	 */
	public function getStatus() {
		return $this->status;
	}

	/**
	 * @return the $created_at
	 */
	public function getCreated_at() {
		return $this->created_at;
	}

	/**
	 * @return the $items
	 */
	public function getItems() {
		return $this->items;
	}

	/**
	 * @param field_type $id
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * @param field_type $client_id
	 */
	public function setClient_id($client_id) {
		$this->client_id = $client_id;
	}

	/**
	 * @param field_type $user_id
	 */
	public function setUser_id($user_id) {
		$this->user_id = $user_id;
	}

	/**
	 * @param field_type $ptype_id
	 */
	public function setPtype_id($ptype_id) {
		$this->ptype_id = $ptype_id;
	}

	/**
	 * @param field_type $total
	 */
	public function setTotal($total) {
		$this->total = $total;
	}

	/**
	 * @param field_type $status
	 */
	public function setStatus($status) {
		$this->status = $status;
	}

	/**
	 * @param field_type $created_at
	 */
	public function setCreated_at($created_at) {
		$this->created_at = $created_at;
	}

	/**
	 * @param multitype: $items
	 */
	public function addItem($item) {
		$this->items[] = $item;
	}
	
	
	
}
