<?php 
// Don't call the file directly
if ( !defined( 'ABSPATH' ) ) exit;

// Register Shortcode
function cb_domain_checker($attrs, $content = NULL) {
	ob_start();
?>

<div id="cb-domain-form">
	<div id="cb-domain-search" class="cb-domain-search">
		<!--Search Form -->
		<div class="cb-domain-search-form">
			<form method='GET' action="" id='form' class='pure-form'>
				<div class='input-group small cb-domain-check'>
	     			<input type='text' data-nonce="<?php echo esc_attr(wp_create_nonce('cb_domain_search')); ?>" placeholder="Find your perfect domain name" class='form-control'  id='Search' name='domain' >
	  				<span class='input-group-btn'>
						<button type='submit' id='Submit' class='btn btn-default btn-info'><?php echo esc_html__('Search', 'cbdc'); ?></button>
	 	 			</span>
	    		</div>
			</form>			
		</div><!--/ Search Form -->
		<!--Loader-->
		<div class="cb_domain_check_loader"><div></div><div></div><div></div><div></div></div><!--/ Loader-->
		<?php echo do_shortcode($content); ?>

		<div class="cb-domain-search-result">
			
		</div>
	</div>
</div>
<?php

	return ob_get_clean();
}
add_shortcode('cb-domain-checker', 'cb_domain_checker');
