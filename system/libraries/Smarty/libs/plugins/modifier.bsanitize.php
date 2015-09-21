<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty replace modifier plugin
 *
 * Type:     modifier<br>
 * Name:     replace<br>
 * Purpose:  simple search/replace
 * @link http://smarty.php.net/manual/en/language.modifier.replace.php
 *          replace (Smarty online manual)
 * @author   Monte Ohrt <monte at ohrt dot com>
 * @param string
 * @param string
 * @param string
 * @return string
 */
function smarty_modifier_bsanitize($string)
{
    $string = strip_tags($string);
	// Preserve escaped octets.
	$string = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])|', '---$1---', $string);
	// Remove percent signs that are not part of an octet.
	$string = str_replace('%', '', $string);
	// Restore octets.
	$string = preg_replace('|---([a-fA-F0-9][a-fA-F0-9])---|', '%$1', $string);

	$string = strtolower($string);
	
	$string = preg_replace('/&.+?;/', '', $string); // kill entities
	$string = preg_replace('/[^%a-z0-9 _-]/', '', $string);
	$string = preg_replace('/\s+/', '-', $string);
	$string = preg_replace('|-+|', '-', $string);
	$string = trim($string, '-');

	return $string;
}

/* vim: set expandtab: */

?>
