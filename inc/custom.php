<?php
/**
 * Custom Theme Functions
 *
 * @package Die_Jim_Crow
 */

/**
 * Custom Login Text
 *
 * @package Die_Jim_Crow
 */
function djc_custom_login_text() {
    return '<h1 class="login-message">Please Log in to View the Site</h1>';
}

add_action( 'password_protected_login_message', 'djc_custom_login_text' );

/**
 * Team Functions
 *
 * @package Die_Jim_Crow
 */
add_filter( 'woothemes_our_team_member_fields', 'djc_team_add_fields' );

function djc_team_add_fields( $fields ) {
    $fields['location'] = array(
        'name' => __( 'Location', 'die-jim-crow' ),
        'type' => 'text',
        'default' => '',
        'section' => 'info'
    );
    return $fields;
}

add_filter( 'woothemes_our_team_member_fields_display', 'djc_team_display_added_fields' );

function djc_team_display_added_fields( $member_fields ) {
    global $post;
    if ( '' != $post->location ) {
        $member_fields .= '<p class="location" itemprop="locale">' . $post->location . '</p><!--/.location-->' . "\n";
    }
    return $member_fields;
}

add_filter( 'woothemes_our_team_member_tel', '__return_false' );

add_filter( 'woothemes_our_team_member_contact_email', '__return_false' );

add_filter( 'woothemes_our_team_member_twitter', '__return_false' );

add_filter( 'woothemes_our_team_member_user_id', '__return_false' );

// add_filter( 'woothemes_our_team_member_user_search', '__return_false' );


function djc_team_labels( $args ) {
    $labels['name']             = __( 'Bios' );
    $labels['singular_name']    = _x( 'Bio', 'post type singular name' );
    $labels['add_new_item']     = sprintf( __( 'Add New %s' ), __( 'Bio' ) );
    $labels['add_new']          = _x( 'Add New', 'bio' );
    $labels['menu_name']        = __( 'Bios' );
    $args['labels']             = $labels;

    return $args;
}

add_filter( 'woothemes_our_team_post_type_args', 'djc_team_labels' );


?>