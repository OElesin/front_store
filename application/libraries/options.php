<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Options
 *
 * @author Oluwasegun
 */
class Options {

	public static  $_ci;
	public static $bn_script 	= "bn_script_status";
	public static $b_script		= "b_script_status";
	public static $_billing		= "cds_billing_transaction";
	public static $_camp 		= "cds_campaign";
	public static $_con 		= "cds_content";
	public static $_con_cat 	= "cds_content_categories";
  public static $_cp 			= "cds_content_provider";
	public static $_d_con		= "cds_daily_content";
	public static $_down 		= "cds_download";
	public static $_req 		= "cds_requests";
	public static $_sub_details	= "cds_subscriber_details";
	public static $_sub_msisdn	= "cds_subscriber_msisdn";
	public static $wap_shop		= "cds_wapshop_wallet";
	public static $_short 		= "cds_short_codes";
	public static $_msisdn_logs	= "msisdn_logs";
	public static $_p_codes		= "price_codes";
	public static $_script_stat	= "script_status";
	public static $_ad_users	= "sdp_ad_users";
	public static $_ren_status	= "s_renewer_status";
	public static $_temp		= "tmp";

	//some important file paths here okay...

	public static $_avatar_dir 	= "app-data/avatar/";
	public static $_thumb_path 	= "app-data/thumb/";
	public static $_image_path 	= "app-data/images/";
	public static $_media_path 	= "app-data/media/";


	/**some static function**/

	function __construct(){
		self::$_ci = & get_instance();
	}
	public static function phoneConverter($mobile){
		$m1 = substr($mobile,1);
		$mnew = '234'.$m1;
		return $mnew;
	}

	public static function returnOriginalPhone($mobile){
		$m1 = substr($mobile,3);
		$mnew = '0'.$m1;
		return $mnew;
	}

	public static function in_array_r($needle, $haystack, $strict = false) {
		foreach ($haystack as $item) {
				if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && self::in_array_r($needle, $item, $strict))) {
						return true;
				}
		}
		return false;
	}

	public static function do_search($needle, $haystack){
		foreach ($haystack as $key => $value) {
				if(!empty(array_search($needle, $value))){
					$DATA = $value;
					break;
				}
			}
		return $DATA;
	}

	public static function rand_str($length = 5, $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890'){
		$chars_length = (strlen($chars) - 1);
		$string = $chars{rand(0, $chars_length)};
		for ($i = 1; $i < $length; $i = strlen($string)){
			$r = $chars{rand(0, $chars_length)};
			if ($r != $string{$i - 1}) $string .=  $r;
		}
		return $string;
	}

	public static function get_state_option($data){

			$DATA 	= array();

			if(is_array($DATA)){
				foreach ($data as $date => $count)
				{

					$split = list($date, $time) = explode(" ", $date);

					list($y,$mo,$d) = explode("-", $split[0]);

					list($h,$m,$s) = explode(":", $split[1]);
	        // format date
	        $time = mktime($mo,$d,$y);
					$DATA[$time] = $count;
				}
			}

			$yaxix 	= "[]";
			$xaxis 		= "[]";

			$totalsub		= 0;

		//	ksort($data);

			$datevalue = array_keys($DATA);

			if(count($datevalue) > 0)
			{
				$countdate 		= count($datevalue);
				$yaxix 	= "[";
				$xaxis 	= "[";

				$c = 0;
				foreach($datevalue as $date){
					$c++;
					$datestam 	= date("j-n-Y",$date);
					$xaxis 	.= "'{$datestam}'";
	        $yaxix 	.= "$DATA[$date]";

					if($c < $countdate){
						$xaxis 	.= ',';
						$yaxix 	.= ',';
					}
				}
				$xaxis 	.= "]";
				$yaxix 		.= "]";
			}
			$return = array(
				'xaxis'	=> $xaxis,
				'yaxix'		=> $yaxix
			);
			return $return;
		}

	public static function csvfile ($data_array, $filename){
    $csv = "";
    foreach ($data_array as $record){
        $csv .= implode(',', $record)."\n";
    }

    $csv_handler = fopen ($filename,'w');
    fwrite ($csv_handler,$csv);
    fclose ($csv_handler);
	}

}
