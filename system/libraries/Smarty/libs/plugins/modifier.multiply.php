<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty spacify modifier plugin
 *
 * Type:     modifier<br>
 * Name:     multiply<br>
 * Purpose:  add spaces between characters in a string
 * @link http://smarty.php.net/manual/en/language.modifier.spacify.php
 *          spacify (Smarty online manual)
 * @author  Oluwasegun Matthew
 * @param string
 * @param string
 * @return string
 */
function smarty_modifier_multiply($this, $that)
{
	return number_format( $this * $that );
}

/* vim: set expandtab: */

?>
