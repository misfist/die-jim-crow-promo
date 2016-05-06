<?php
/**
 * Custom Theme Functions
 *
 * @package Die_Jim_Crow_Promo
 */

/**
 * Custom Login Text
 * Change login text displayed on the password protection page
 * @link http://www.benhuson.co.uk/wordpress-plugins/password-protected/
 *
 */
function djc_promo_custom_login_text() {
    return '<h1 class="login-message">Please Enter the Passcode to Get Your Download.</h1>';
}

add_action( 'password_protected_login_message', 'djc_promo_custom_login_text' );


?>