<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('order_model');
		$this->load->model('goods_model');
		$this->load->model('aks_model');
		$this->load->model('address_model');
		$this->load->model('creditCard_model');
		$this->load->helper('url_helper');
		$this->load->helper('form');
		$this->load->helper('date');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible" role="alert" id="alert" style="color: #FF0000">', '</div>');
		$this->load->library('session');
	}
	
	public function index()
	{
	}

	public function getOrder($state = -1)
	{
		$name = $this->input->post('searchName');
		if(isset($_SESSION['phone'])){
			$phone = $_SESSION['phone'];
			$data['orders'] = $this->order_model->get($phone,$state,$name);
			$data['state'] = $state;
			$data['tag'] = "order";
			$this->load->view("templates/header.php");
			$this->load->view("order",$data);
			$this->load->view("templates/footer.php");
		}
		else{
			$this->load->view("templates/header.php");
			$this->load->view("login");
		}
	}

	public function dispatch($id, $state)
	{
		$this->order_model->deliver($id);
		$this->getOrder($state);
	}
}