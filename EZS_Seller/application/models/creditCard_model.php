<?php
class creditCard_model extends CI_Model {


	public function __construct()
	{
		$this->load->database();
	}


	public function add($data)
	{
		$hits->db->insert('creditCard',$data);
	}

	public function get($phone)
	{
		$this->db->from('creditCard');
		$this->db->where('phone', $phone);
		$query = $this->db->get();
		return $query->result_array();

	}

	public function checkpsd($cardID,$password,$bank)
	{
		$this->db->select('cardID');
		$this->db->from('bank');
		$this->db->where('cardID', $cardID);
		$this->db->where('password', $password);
		$this->db->where('bank', $bank);
		$query = $this->db->get();
		if($query->num_rows())
			return true;
		else
			return false;
	}

}