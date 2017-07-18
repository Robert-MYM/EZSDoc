<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Content-type:application/json;charset=utf-8");
class Sell extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('order_model');
		$this->load->model('goods_model');
		$this->load->model('aks_model');
		$this->load->helper('url_helper');
		$this->load->helper('date');
	}
	
	public function index()
	{
	}

	public function newOrder($aksid)
	{
		$aks = $this->aks_model->get($aksid);
		
		if(count($aks))
		{
			$this->goods_model->update($aks->goodsid,$aks->num,$aks->stock);
			$datestring = '%Y-%m-%d';
			$time = time();
			$data = array(
				'goodsid' => $aks->goodsid,
				'phone' => $aks->phone,
				'address' => $aks->address,
				'condition' => 0,
				'date' => mdate($datestring,$time),
				'num' => $aks->num);
			$this->order_model->newOrder($data);
			$result = array('state' => true);
		}else{
			$result = array('state' => false);
		}
		 echo json_encode($result, JSON_UNESCAPED_UNICODE);
	}



}