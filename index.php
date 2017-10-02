<?php
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author			Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: index.php 7004 2013-12-20 14:23:28Z Raymond_Benc $ 
 */

// Make sure we are running PHP5.
if (version_compare(phpversion(), '5', '<') === true)
{
	exit('phpFox 2 or higher requires PHP 5 or newer.');
}

ob_start();

/**
 * Key to include phpFox
 *
 */
define('PHPFOX', true);

/**
 * Directory Seperator
 *
 */
define('PHPFOX_DS', DIRECTORY_SEPARATOR);
// Huan thay doi
/**
 * phpFox Root Directory
 *
 */
define('PHPFOX_DIR', dirname(__FILE__) . PHPFOX_DS);

// Noi chung la thay doi nhieu
define('PHPFOX_START_TIME', array_sum(explode(' ', microtime())));

// Require phpFox Init
require(PHPFOX_DIR . 'include' . PHPFOX_DS . 'init.inc.php');
// Huan dang sua dung pha
// Huan dang sua dung pha// Huan dang sua dung pha// Huan dang sua dung pha// Huan dang sua dung pha// Huan dang sua dung pha
// Huan dang sua dung pha// Huan dang sua dung pha// Huan dang sua dung pha// Huan dang sua dung pha// Huan dang sua dung pha
// Huan dang sua dung pha// Huan dang sua dung pha// Huan dang sua dung pha// Huan dang sua dung pha
// Huan dang sua dung pha// Huan dang sua dung pha// Huan dang sua dung pha// Huan dang sua dung pha
// Huan dang sua dung pha// Huan dang sua dung pha// Huan dang sua dung pha
// Huan dang sua dung pha// Huan dang sua dung pha//// Huan dang sua dung pha// Huan dang sua dung pha
Phpfox::run();
// here agian
ob_end_flush();
/////////////////////////////////////// len di may
?>