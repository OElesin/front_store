<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store_front extends CI_Controller {

	public $data;

	function __construct(){
		parent::__construct();
		$this->data['title'] = "Bargains.Com.Ng | ";
		if(empty($this->input->cookie('bargains_user_cookie'))) {
			$this->input->set_cookie('bargains_user_cookie', $this->session->userdata('session_id'), '86500');
		}
		$this->user_id = $this->input->cookie('bargains_user_cookie');
	}

	public function index(){
		$this->data['page'] = "All Products";
		$url = $this->config->item('all_products');		

		$payload = $this->curl->simple_get($url);
		$temp = json_decode($payload, true);
		$this->data['products'] = $temp['data'];
		$this->smarty->view( 'home.tpl' , $this->data);
	}

	public function product_view($product_id){
		$url = $this->config->item('product').$product_id;

		$payload = $this->curl->simple_get($url);
		$temp = json_decode($payload, true);
		$this->data['page'] = "Pro";

		$this->smarty->view('product-details.tpl', $this->data);
	}

}
