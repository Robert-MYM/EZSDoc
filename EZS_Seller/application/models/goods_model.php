<?php
class goods_model extends CI_Model {

	
	public function __construct()
	{
		$this->load->database();
	}

	public function update($goodsid, $change,$stock)
	{
		$this->db->set('stock',$stock - $change);
		$this->db->where('id', $goodsid);
		$this->db->update('goods');
	}

	public function check($id)
	{
		$this->db->select('*');
		$this->db->from('goods');
		$this->db->where('id',$id);
		$query = $this->db->get();
		if($query->num_rows())
			return true;
		else
			return false;
	}

	public function add($goodsid,$price,$name)
	{
		if($this->check($goodsid))
			return false;

		$data = array(
			'id' => $goodsid,
			'name' => $name,
			'price' => $price,
			'stock' => 0,
			'image' => 'image/p.png',
			'state' => 0
		);

		$this->db->insert('goods', $data);
		return true;
	}

	public function get($name)
	{
		$this->db->from('goods');
		$this->db->where('name', $name);
		$query = $this->db->get();
		return $query->result_array();

	}

	public function getAll()
	{
		$query = $this->db->get('goods');
		return $query->result_array();
	}

	public function delete($id)
	{
		$data = array(
			'state' => 1
		);

		$this->db->where('id', $id);
		$this->db->update('goods', $data);
	}

	public function recover($id)
	{
		$data = array(
			'state' => 0
		);

		$this->db->where('id', $id);
		$this->db->update('goods', $data);
	}

}