<?php
/*
	Plugin Name: Cb Domain Checker
	Plugin URI: https://wordpress.org/plugins/cb-domain-checker
	Description: Check domain name availability for all Top Level Domains using shortcode or widget with search.
	Author: Md Abul Bashar
	Version: 1.0
	Author URI: https://facebook.com/hmbashar
	Text Domain: cbdc

*/

 // Don't call the file directly
if ( !defined( 'ABSPATH' ) ) exit;

//define url
define('CB_DOMAIN_CHECKER_URL', plugin_dir_url( __FILE__ ));
define('CB_DOMAIN_CHECKER_PATH', plugin_dir_path(__FILE__));


//Enqueue Style for Plugin
function cb_domain_checker_scripts(){
	wp_enqueue_style('cb-domain-checker-style',CB_DOMAIN_CHECKER_URL .'/css/style.css');
}
add_action('wp_enqueue_scripts','cb_domain_checker_scripts');


//Include additional file
require_once( CB_DOMAIN_CHECKER_PATH . 'inc/shortcode.php' );