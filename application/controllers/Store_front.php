<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store_front extends CI_Controller {

	public $data;

	function __construct(){
		parent::__construct();
		$this->data['title'] = "Bargains.Com.Ng | ";
	}

	public function index(){
		$this->data['page'] = "All Products";
		$url = $this->config->item('all_products');		

		$payload = $this->curl->simple_get($url);
		$temp = json_decode($payload, true);
		$this->data['products'] = $temp['data'];
		$this->smarty->view( 'home.tpl' , $this->data);
	}

	public function test(){
		$this->data['page'] = "Test 2";

		$this->smarty->view('home', $this->data);
	}

}
