<?php
class aks_model extends CI_Model {

	
	public function __construct()
	{
		$this->load->database();
	}

	public function get($aksid)
	{
		$this->db->select('aks.phone,goodsid,address,num,stock');
		$this->db->from('aks');
		$this->db->where('aksid',$aksid);
		$this->db->join('goods', 'aks.goodsid = goods.id');
		$this->db->where('goods.stock >=','aks.num');
		$this->db->join('address', 'aks.addressid = address.id');
		$query = $this->db->get();
		return $query->row();
	}

}