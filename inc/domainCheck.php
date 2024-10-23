<?php 
// Don't call the file directly
if ( !defined( 'ABSPATH' ) ) exit;

// Ajax action function
function cb_domain_check_result() {

    if( isset( $_POST['data_nonce'] ) && wp_verify_nonce( wp_unslash($_POST['data_nonce']), 'cb_domain_search' )) {
        
        $domain = sanitize_text_field(wp_unslash($_POST["domain_name"]));
        
        // Check for spaces in the domain
        if( !empty($domain) && preg_match('/^\S+$/', $domain) ) {

            if ( gethostbyname($domain) != $domain ) : ?>
                <div class="cb-domain-name-registered"> 
                    <p><?php esc_html_e('Sorry!', 'cbdc'); ?> <strong><?php echo esc_html($domain); ?></strong> <?php echo esc_html__('Domain is already taken', 'cbdc'); ?></p>
                </div>
            <?php else : ?>
                <div class="cb-domain-name-available">                  
                    <p><?php esc_html_e('Congratulations! Domain', 'cbdc'); ?> <strong><?php echo esc_html($domain); ?></strong> <?php esc_html_e('is available!', 'cbdc'); ?></p>
                </div>
            <?php endif;

        } else {
            // Display error for invalid input (e.g., spaces in domain)
            ?>
            <div class="cb-domain-name-invalid cb-domain-name-registered">
                <p><?php esc_html_e('Invalid keywords. Please remove spaces and try again.', 'cbdc'); ?></p>
            </div>
            <?php
        }
    }
    exit;
}
add_action('wp_ajax_cb_domain_check_result', 'cb_domain_check_result');
add_action('wp_ajax_nopriv_cb_domain_check_result', 'cb_domain_check_result');
