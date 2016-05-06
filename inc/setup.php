<?php
/**
 * Enqueue Styles and Scripts
 *
 * @package Die_Jim_Crow_Promo
 */

/**
 * Set-up Functions for the Child Theme
 * @link https://codex.wordpress.org/Child_Themes
 *
 */
function djc_promo_setup() {
    // Register social menu, in case we want one
    register_nav_menus( array(
        'social' => __( 'Social Menu', 'die-jim-crow' ),
    ) );
}
add_action( 'after_setup_theme', 'djc_promo_setup' );

/**
 * Register widgetized areas
 * @link https://codex.wordpress.org/Function_Reference/register_widget
 */
function djc_promo_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Content Footer', 'die-jim-crow' ),
        'id'            => 'sidebar-content-footer',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );
}

add_action( 'widgets_init', 'djc_promo_widgets_init' );

?>