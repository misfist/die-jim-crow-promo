<?php
/**
 * Enqueue Styles and Scripts
 *
 * @package Die_Jim_Crow
 */

/**
 * Set-up Functions for the Child Theme
 * @link https://codex.wordpress.org/Child_Themes
 *
 */
function djc_setup() {
    // Register social menu, in case we want one
    register_nav_menus( array(
        'social' => __( 'Social Menu', 'die-jim-crow' ),
    ) );
}
add_action( 'after_setup_theme', 'djc_setup' );


?>