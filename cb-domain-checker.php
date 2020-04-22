<?php
/*
	Plugin Name: CB Domain Checker
	Plugin URI: https://wordpress.org/plugins/cb-domain-checker
	Description: Check domain name availability for all Top Level Domains using shortcode or widget with search.
	Author: Md Abul Bashar
	Version: 1.0
	Author URI: https://facebook.com/hmbashar
	Text Domain: cbdc

*/

 // Don't call the file directly
if ( !defined( 'ABSPATH' ) ) exit;

//define URL
define('CB_DOMAIN_CHECKER_URL', plugin_dir_url( __FILE__ ));
define('CB_DOMAIN_CHECKER_PATH', plugin_dir_path(__FILE__));


//Enqueue Style for Plugin
function cb_domain_checker_scripts(){

	wp_enqueue_style('cb-domain-checker-style', CB_DOMAIN_CHECKER_URL .'/css/style.css');

	wp_enqueue_script( 'cb-domain-check-ajax', CB_DOMAIN_CHECKER_URL .'js/ajax-active.js', array('jquery'), 1.0, true );
	
	wp_localize_script( 'cb-domain-check-ajax', 'CbDomainSearch', array( 'ajaxurl'	=> admin_url('admin-ajax.php')) ); 
}
add_action('wp_enqueue_scripts','cb_domain_checker_scripts');


// Ajax action function
function cb_domain_check_result() {

	if(wp_verify_nonce( $_POST['data_nonce'], 'cb_domain_search' )) {
	
	   error_reporting(0);
	    if(isset($_POST["domain"])){
	        $domain = $_POST["domain"];
	        if ( gethostbyname($domain) != $domain ) : ?>
				<div class="cb-domain-name-registered">	
	            	<p>Sorry! <strong><?php echo esc_html($domain); ?></strong> Domain Already taken</p>
	            </div>	        
	        <?php else : ?>
				<div class="cb-domain-name-available">					
	            	<p>Congratulation Domain <strong><?php echo esc_html($domain); ?></strong> is available! <a href="">Place Order</a></p>
				</div>
	        <?php endif;
	    }
   }
   exit;
}
add_action('wp_ajax_cb_domain_check_result', 'cb_domain_check_result');
add_action('wp_ajax_nopriv_cb_domain_check_result', 'cb_domain_check_result');

//Include additional file
require_once( CB_DOMAIN_CHECKER_PATH . 'inc/shortcode.php' );