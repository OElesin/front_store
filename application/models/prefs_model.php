<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
//This model make preference global on every part of the application
//Ojbect is made global and also its Smarty equivalance..
*/

class Prefs_model extends CI_Model {

	function __construct(){
		parent::__construct();
		//declarations....
		$pre = array();
		$cp_id = $this->session->userdata('cp_id');
		$p_data = $this->session->userdata('p_data');
		$CI =& get_instance();

		//loop to create all necessary configuration from db...
		if($this->config->item('user-db-config')){
			$pr = $this->db->get('settings')->result();
			foreach($pr as $p){
				$pre[$p->name] = $p->value;
				$this->smarty->assign(strtoupper($p->name),$p->value);
			}
		}

		foreach($this->config->config as $key=>$val){
			$this->smarty->assign(strtoupper($key),$val);
		}

		// if(!empty($cp_id)){
		// 		$pre['cp_info'] = $this->basic_data->getCPProfile($cp_id);
		// 		$this->smarty->assign('CP_INFO',$pre['cp_info']);
		// }

		if(!empty($p_data)){
				$pre['p_data'] = $p_data;
				$this->smarty->assign('P_DATA',$pre['p_data']);
		}



		//basic url parameters....and its smarty format.
		$pre['current_page'] = $this->router->fetch_class();
		$pre['current_data'] = $this->router->fetch_method();
		$this->smarty->assign('CURRENT_PAGE',$pre['current_page']);
		$this->smarty->assign('CURRENT_DATA',$pre['current_data']);
		if ($this->agent->is_referral())
		{
			$pre['referring_url'] = $this->agent->referrer();
			$this->smarty->assign('REFERRING_URL',$pre['referring_url']);
		}

		//avatar path
		$pre['avatar_path'] = $this->config->_config_paths[0].Options::$_avatar_dir;
		$this->smarty->assign('AVATAR_PATH',$pre['avatar_path']);

		//thumb path
		$pre['thumb_path'] = $this->config->_config_paths[0].Options::$_thumb_path;
		$this->smarty->assign('THUMB_PATH',$pre['thumb_path']);
		//image path
		$pre['image_path'] = $this->config->_config_paths[0].Options::$_image_path;
		$this->smarty->assign('IMAGE_PATH',$pre['image_path']);

		//media path
		$pre['media_path'] = $this->config->_config_paths[0].Options::$_media_path;
		$this->smarty->assign('MEDIA_PATH',$pre['media_path']);


		//some other important data here okay
		$pre['db_date'] = date('dmY');

		$CI->pref = (object) $pre;

	}






}
