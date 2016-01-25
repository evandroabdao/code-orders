<?php

namespace CodeOrders\V1\Rest\Orders;

class OrderItemEntity {
	
	protected $id;
	
	protected $order_id;
	
	protected $product_id;

    protected $product_name;
	
	protected $quantity;
	
	protected $price;
	
	protected $total;
	
	/**
	 * @return the $id
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return the $order_id
	 */
	public function getOrderId() {
		return $this->order_id;
	}

	/**
	 * @return the $product_id
	 */
	public function getProductId() {
		return $this->product_id;
	}

	/**
	 * @return the $quantity
	 */
	public function getQuantity() {
		return $this->quantity;
	}

	/**
	 * @return the $price
	 */
	public function getPrice() {
		return $this->price;
	}

	/**
	 * @return the $total
	 */
	public function getTotal() {
		return $this->total;
	}

	/**
	 * @param field_type $id
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * @param field_type $order_id
	 */
	public function setOrderId($order_id) {
		$this->order_id = $order_id;
	}

	/**
	 * @param field_type $product_id
	 */
	public function setProductId($product_id) {
		$this->product_id = $product_id;
	}

	/**
	 * @param field_type $quantity
	 */
	public function setQuantity($quantity) {
		$this->quantity = $quantity;
	}

	/**
	 * @param field_type $price
	 */
	public function setPrice($price) {
		$this->price = $price;
	}

	/**
	 * @param field_type $total
	 */
	public function setTotal($total) {
		$this->total = $total;
	}

    /**
     * @return mixed
     */
    public function getProductName()
    {
        return $this->product_name;
    }

    /**
     * @param mixed $product_name
     */
    public function setProductName($product_name)
    {
        $this->product_name = $product_name;
    }



	
	
	
}

?>