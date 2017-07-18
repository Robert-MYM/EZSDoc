<?php
class order_model extends CI_Model {

	
	public function __construct()
	{
		$this->load->database();
	}

	public function newOrder($order)
	{
		$this->db->insert('order',$order);
	}

	public function get($phone,$state,$name)
	{
		$this->db->select('*');
		$this->db->from('order');
		if($state != -1)
			$this->db->where('condition', $state);
		$this->db->join('goods', 'goods.id = order.goodsid');
		$this->db->join('userinfo', 'userinfo.phone = order.phone');
		if(!empty($name))
			$this->db->where('name',$name);
		$this->db->order_by('date', 'DESC');
		$query = $this->db->get();

		return $query->result_array();
	}

	public function deliver($id)
	{
		$data = array(
			'condition' => 1
		);

		$this->db->where('orderid', $id);
		$this->db->update('order', $data);
	}

}