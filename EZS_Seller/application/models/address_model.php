<?php
class address_model extends CI_Model {

	
	public function __construct()
	{
		$this->load->database();
	}



	public function getByPhone($phone)
	{
		$query = $this->db->get('address');
		return $query->result_array();
	}

	public function getById($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('address');
		return $query->row();
	}



	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('address');
	}

	public function update($id,$phone,$name,$address)
	{
		$this->db->set('realphone',$phone);
		$this->db->set('name',$name);
		$this->db->set('address',$address);
		$this->db->where('id',$id);
		$this->db->update('address');
	}

}