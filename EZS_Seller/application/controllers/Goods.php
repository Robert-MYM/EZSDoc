<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Goods extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('goods_model');
		$this->load->helper('form');
		$this->load->helper('url_helper');
		$this->load->library('form_validation');
	}
	
	public function index()
	{
     	$data['goods'] = $this->goods_model->getAll();
     	$data['tag'] = "shopping";
     	$this->load->view('templates/header.php');
     	$this->load->view('goods',$data);
     	$this->load->view('templates/footer.php');
	}

	public function search()
	{
		$name = $this->input->post('searchName');
		if(empty($name))
	    	$data['goods'] = $this->goods_model->getAll();
	    else
	    	$data['goods'] = $this->goods_model->get($name);
	    
     	$data['tag'] = "shopping";
     	$this->load->view('templates/header.php');
     	$this->load->view('goods',$data);
     	$this->load->view('templates/footer.php');

	}

	public function detail($id)
	{
		$data['id'] = $id;

		$this->load->view('templates/header.php');
     	$this->load->view('detail',$data);
     	$this->load->view('templates/footer.php');
	}

	public function deleteGoods($id)
	{
		$this->goods_model->delete($id);

		$this->search();
	}

	public function recoverGoods($id)
	{
		$this->goods_model->recover($id);

		$this->search();
	}

	public function add($msg = "")
	{
		$data['msg'] = $msg;
		$this->load->view('templates/header.php');
		$this->load->view('AddGoods.php',$data);
	}

	public function addGoods()
	{
		$this->form_validation->set_rules('goodsid', 'GoodsID', 'trim|required|exact_length[13]|numeric',
			array('required' => '商品号必填!',
				'exact_length' => '商品号为13位!',
				'numeric' => '商品号只能为数字!'));
		$this->form_validation->set_rules('price', 'Price', 'trim|required',
			array('required' => '价格必填!',
				'numeric' => '商品号只能为数字!'));
		$this->form_validation->set_rules('name', 'Name', 'trim|required',
			array('required' => '商品名必填!'));

		if ($this->form_validation->run() == FALSE){
			$this->load->view("templates/header.php");
			$this->load->view("AddGoods");
		}
		else{
			$goodsid = $this->input->post('goodsid');
			$price = $this->input->post('price');
			$name = $this->input->post('name');

			if($this->goods_model->add($goodsid,$price,$name))
				$this->search();
			else
				$this->add("商品已存在");
		}

	}
}

