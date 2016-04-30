<?php
/**
 * Enqueue Styles and Scripts
 *
 * @package Die_Jim_Crow
 */

function djc_setup() {

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'social' => __( 'Social Menu', 'die-jim-crow' ),
    ) );

}

add_action( 'after_setup_theme', 'djc_setup' );


?>