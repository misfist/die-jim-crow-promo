<?php
/**
 * Enqueue Styles and Scripts
 *
 * @package Die_Jim_Crow
 */

add_action( 'wp_enqueue_scripts', 'djc_enqueue_styles' );

function djc_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

?>