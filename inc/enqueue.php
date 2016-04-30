<?php
/**
 * Enqueue Styles and Scripts
 *
 * @package Die_Jim_Crow
 */

/**
 * Load the Parent Theme Stylesheet
 * @link https://codex.wordpress.org/Child_Themes
 *
 */
function djc_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

add_action( 'wp_enqueue_scripts', 'djc_enqueue_styles' );

/**
 * Load a Custom Login Stylesheet
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/login_enqueue_scripts
 *
 */
function djc_enqueue_login_styles() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/admin.css' );
}
add_action( 'login_enqueue_scripts', 'djc_enqueue_login_styles' );

?>