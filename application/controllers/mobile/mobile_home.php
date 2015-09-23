<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobile_home extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('user_agent');
		$this->data['title'] = "Bargains.Com.Ng | Mobile ";
		if(empty($this->input->cookie('bargains_user_cookie'))) {
			$this->input->set_cookie('bargains_user_cookie', $this->session->userdata('session_id'), '86500');
		}
		$this->user_id = $this->input->cookie('bargains_user_cookie');
	}

	public function index(){
		if ($this->agent->is_browser('Opera')) {
			echo "true";
		}else{
			echo "false";
		}

	}
}