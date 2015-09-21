<?php defined('BASEPATH') OR exit('No direct script access allowed');
use predictionio\EventClient;

class Products extends CI_Controller {

	public $data;
	private $client;
	private $user_id;

	function __construct(){
		parent::__construct();
		$this->load->helper('cookie');
		$this->data['title'] = "Bargains.Com.Ng | ";
		$this->client = new EventClient($this->config->item('prediction_app_id'), $this->config->item('prediction_url'));
		if(empty($this->input->cookie('bargains_user_cookie'))) {
			$this->input->set_cookie('bargains_user_cookie', $this->session->userdata('session_id'), '86500');
		}
		$this->user_id = $this->input->cookie('bargains_user_cookie');
	}

	public function index(){
		$product_id = $this->input->get('id');
		if(empty($product_id)){
			echo "nothing";
		}
		$url = $this->config->item('product').$product_id;
		$this->track_user_activity($this->user_id, $product_id, 'view');

		$payload = $this->curl->simple_get($url);
		$temp = json_decode($payload, true);
		$this->data['page'] = "Pro";
		$this->data['product_info'] = $temp['data'];

		$this->smarty->view('product-details.tpl', $this->data);
	}

	private function track_user_activity($user_id, $product_id, $action){
		$activity_id = $this->client->createEvent(array(
	      'event' => $action,
	      'entityType' => 'user',
	      'entityId' => $user_id,
	      'targetEntityType' => 'item',
	      'targetEntityId' => $product_id
	    ));
	}

}
