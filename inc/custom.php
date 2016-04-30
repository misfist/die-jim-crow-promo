<?php
/**
 * Custom Theme Functions
 *
 * @package Die_Jim_Crow
 */

function djc_custom_login_text() {
    return '<h1 class="login-message">Please Log in to View the Site</h1>';
}

add_action( 'password_protected_login_message', 'djc_custom_login_text' );

?>