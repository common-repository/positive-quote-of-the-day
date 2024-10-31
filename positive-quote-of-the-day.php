<?php
/**
Plugin Name: Positive Quote of the day
Plugin URI: http://positivequoteplugin.com
Description: Positive Quote of the day. Each day a new positive quote will be displayed. Either have it as a widget or use the shortcodes: [pqp-quote color="red"] , [pqp-quote color="blue"] , [pqp-quote color="green"] or [pqp-quote color="yellow"]. 
Author: Muhammad Alyas
Version: 1.0
Author URI: http://positivequoteplugin.com
*/
?>
<?php
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}
define('pqp_api_url','http://positivequoteplugin.com');
include_once('pqp-classes/pqp-widget.php');
include_once('pqp-classes/pqp-main.php');
?>