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
class API_Library {
   
	public static $decrypt_key = "bizense_twinpine";
   
	//the first point of call okay
	
	public static function decryptData($value){
		$decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, API_Library::$decrypt_key, base64_decode($value), "ncfb", API_Library::$decrypt_key); 
		return trim($decrypttext); 
	}
}