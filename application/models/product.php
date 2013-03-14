<?php

class product extends CI_Model{

	function __construct()
    {
		parent::__construct();
	}
	
	/**Return the product description by id*/
	public function get_by_id($id)
	{
		$this->db->where('item_id', $id);
		$query = $this->db->get('shop_items'); 
		
		if($query->num_rows())
		{
			return $query->result_array();
		}
		else
		{
			return Array();
		}
	}
	
	/**Returns the product description by title*/
	public function get_by_title($title)
	{
		$this->db->where('item_title', $title);
		$query = $this->db->get('shop_items'); 
		
		if($query->num_rows())
		{
			return $query->result_array();
		}
		else
		{
			return Array();
		}
	}
	
	/**Returns the product description by description*/
	public function get_by_desc($desc)
	{
		$this->db->where('item_desc', $desc);
		$query = $this->db->get('shop_items'); 
		
		if($query->num_rows())
		{
			return $query->result_array();
		}
		else
		{
			return Array();
		}
	}
	
	/**Returns product description by price*/
	public function get_by_price($price)
	{
		$this->db->where('item_price', $price);
		$query = $this->db->get('shop_items'); 
		
		if($query->num_rows())
		{
			return $query->result_array();
		}
		else
		{
			return Array();
		}
	}
	
	/**Returns the price of a product*/
	public function get_price($id)
	{
		$this->db->select('item_price');
		$this->db->where('item_price', $price);
		$query = $this->db->get('shop_items'); 
		
		if($query->num_rows())
		{
			return $query->result_array();
		}
		else
		{
			return Array();
		}
	}
	
	/**Returns all the items in the shop*/
	public function get_all()
	{
		$this->db->order_by('item_title', 'asc');
		$query = $this->db->get('shop_items'); 
		
		if($query->num_rows())
		{
			return $query->result_array();
		}
		else
		{
			return Array();
		}	
	}
	
	/**This method inserts product in the data base*/
	public function insert($title, $desc, $price)
	{
		//Values to be inserted
		$data = Array(
					'item_title' => $title,
					'item_desc' => $desc,
					'item_price' => $price );
		
		$this->db->insert('shop_items', $data);
	}
	
}