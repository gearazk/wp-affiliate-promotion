<?php
/**
 * Functions
 *
 * @package     AffiliatePromotions\Functions
 * @since       1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/*
 * Get content from a single post
 */
function affpromos_get_post_content( $postid = null ) {

    if ( empty ( $postid ) )
        $postid = get_the_ID();

    $post = get_post( $postid );
    $content = $post->post_content;
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);

    return $content;
}

/*
 * Get template file
 */
function affpromos_get_template_file( $template, $type ) {

    $template_file = AFFILIATE_PROMOTIONS_DIR . 'templates/' . $template . '.php';

    $template_file = apply_filters( 'affpromos_template_file', $template_file, $template, $type );

    if ( file_exists( $template_file ) )
        return $template_file;
	return false;
}