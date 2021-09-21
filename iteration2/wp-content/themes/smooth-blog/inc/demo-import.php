<?php
/**
 * Demo Import.
 *
 * This is the template that includes all the other files for core featured of Moral Themes
 *
 * @package Moral Themes
 * @subpackage smooth blog
 * @since smooth blog 1.0.0
 */

function smooth_blog_ctdi_plugin_page_setup( $default_settings ) {
    $default_settings['menu_title']  = esc_html__( 'Moral Theme Demo Import' , 'smooth-blog' );

    return $default_settings;
}
add_filter( 'cp-ctdi/plugin_page_setup', 'smooth_blog_ctdi_plugin_page_setup' );


function smooth_blog_ctdi_plugin_intro_text( $default_text ) {
    $default_text .= sprintf( '<p class="about-description">%1$s <a href="%2$s">%3$s</a></p>', esc_html__( 'Demo content files for Smooth Blog  Theme.', 'smooth-blog' ),
    esc_url( 'https://moralthemes.com/download/smooth-blog' ), esc_html__( 'Click here for Demo File download', 'smooth-blog' ) );
    return $default_text;
}
add_filter( 'cp-ctdi/plugin_intro_text', 'smooth_blog_ctdi_plugin_intro_text' );
