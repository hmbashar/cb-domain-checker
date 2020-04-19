<?php 
// Don't call the file directly
if ( !defined( 'ABSPATH' ) ) exit;

// Register Shortcode
function cb_domain_checker($attrs, $content = NULL) {
	ob_start();
	extract(shortcode_atts(array(
		'post_type' =>'post'
	),$attrs))
?>
<div id='cb-domain-form'>
	<div id='cb-wdc-style' >
		<form method='post' action='./' id='form' class='pure-form'> 

			<div class='input-group small'>
     			<input type='text' placeholder="Find your perfect domain name" class='form-control' autocomplete='off' id='Search' name='domain' >
  				<span class='input-group-btn'>
					<button type='submit' id='Submit' class='btn btn-default btn-info'>Search</button>
 	 			</span>
    		</div>
		</form>
		<div class="domain-price">
			<ul>
				<li><a href=""><span>.com</span><sup>tk</sup>950</a></li>
				<li><a href=""><span>.org</span><sup>tk</sup>950</a></li>
				<li><a href=""><span>.net</span><sup>tk</sup>2500</a></li>
				<li><a href=""><span>.bd</span><sup>tk</sup>1250</a></li>
			</ul>
		</div>
		<div class="domain-details">
			<ul>
				<li><a href="">View domain price list</a></li>
				<li><a href="">View domain price list</a></li>
				<li><a href="">View domain price list</a></li>
			</ul>
		</div>
	</div>
</div>
<?php

	return ob_get_clean();
}
add_shortcode('cb-domain-checker', 'cb_domain_checker');

