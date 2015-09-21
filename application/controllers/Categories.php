<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

	public $data;

	function __construct(){
		parent::__construct();
		$this->data['title'] = "Bargains.Com.Ng| Categories | ";
	}

	public function index(){
		$category = $this->input->get('category');
		if(empty($category)){
			$url = $this->config->item('all_products');
		}else{
			$url = $this->config->item('category_products') . $category;
		}

		$payload = json_decode($this->curl->simple_get($url), true);

		$this->data['products'] = $payload['data'];

		$this->data['page'] = $category;

		$this->smarty->view( 'home.tpl' , $this->data);
	}
}

