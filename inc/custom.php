<?php
/**
 * Custom Theme Functions
 *
 * @package Die_Jim_Crow
 */

/**
 * Custom Login Text
 * Change login text displayed on the password protection page
 * @link http://www.benhuson.co.uk/wordpress-plugins/password-protected/
 *
 */
function djc_custom_login_text() {
    return '<h1 class="login-message">Please Log in to View the Site</h1>';
}
add_action( 'password_protected_login_message', 'djc_custom_login_text' );

/**
 * Bio Functions
 * Functions affecting the `team-member` post type
 */

/**
 * Add Field
 * Add `location` fields to `team-member` post type
 * @link https://docs.woothemes.com/document/our-team-plugin/#i-need-to-add-another-field-can-i-do-it-without-touching-core-files
 */
function djc_team_add_fields( $fields ) {
    $fields['location'] = array(
        'name' => __( 'Location', 'die-jim-crow' ),
        'type' => 'text',
        'default' => '',
        'section' => 'info'
    );
    return $fields;
}

add_filter( 'woothemes_our_team_member_fields', 'djc_team_add_fields' );


/**
 * Display Added Field
 * Display `location` field on `team-member` posts
 * @link https://docs.woothemes.com/document/our-team-plugin/#i-need-to-add-another-field-can-i-do-it-without-touching-core-files
 */
function djc_team_display_added_fields( $member_fields ) {
    global $post;
    if ( '' != $post->location ) {
        $member_fields .= '<p class="location" itemprop="locale">' . $post->location . '</p><!--/.location-->' . "\n";
    }
    return $member_fields;
}
add_filter( 'woothemes_our_team_member_fields_display', 'djc_team_display_added_fields' );

/**
 * Remove Fields
 * Removed `tel`, `contact_email`, `twitter`, and `user_id` fields from `team-member` post type
 * @link https://docs.woothemes.com/document/our-team-plugin/#i-do-not-need-the-role-field-can-i-disable-that
 */
add_filter( 'woothemes_our_team_member_tel', '__return_false' );

add_filter( 'woothemes_our_team_member_contact_email', '__return_false' );

add_filter( 'woothemes_our_team_member_twitter', '__return_false' );

add_filter( 'woothemes_our_team_member_user_id', '__return_false' );

// add_filter( 'woothemes_our_team_member_user_search', '__return_false' );

/**
 * Change Label Text
 * Change text displayed for `team-member` post type
 * @link https://codex.wordpress.org/Function_Reference/register_post_type#Arguments
 * 
 */
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

/**
 * Change Single Slug
 * Change the post slug for single `team-member` posts to `bio`
 * @link https://codex.wordpress.org/Function_Reference/register_post_type#rewrite
 * 
 */
function djc_team_single_slug() {
    return _x( 'bio', 'single post url slug', 'die-jim-crow' );
}

add_filter( 'woothemes_our_team_single_slug', 'djc_team_single_slug' );

/**
 * Change Archive Slug
 * Change the slug for `team-member` post archive to `bios`
 * @link https://codex.wordpress.org/Function_Reference/register_post_type#rewrite
 * 
 */
function djc_team_archive_slug() {
    return _x( 'bios', 'post archive url slug', 'die-jim-crow' );
}

add_filter( 'woothemes_our_team_archive_slug', 'djc_team_archive_slug' );

/**
 * Remove Extra Fields from `the_content`
 * Change `the_content` to only display `post_content` for `team-member` posts
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/the_content
 * 
 */
function djc_our_team_content( $content ) {

    global $post;

    if( is_post_type_archive( 'team-member' ) ) {

        $content = $post->post_content;
        return $content;
    }

    return $content;

}
add_filter( 'the_content', 'djc_our_team_content' );




?>