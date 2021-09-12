<?php
/**
 * Moral Theme 
 *
 * @package Moral
 * Active callbacks.
 * 
 */



/**
 * Check if the slider is page
 */
function smooth_blog_if_slider_page( $control ) {
	return 'page' === $control->manager->get_setting( 'smooth_blog_slider' )->value();
}

function smooth_blog_if_about_page( $control ) {
	return 'page' === $control->manager->get_setting( 'smooth_blog_about' )->value();
}


/**
 * Check if the service is enabled
 */
function smooth_blog_if_service_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'smooth_blog_service' )->value() ;
}

/**
 * Check if the service is page
 */
function smooth_blog_if_service_page( $control ) {
	return 'page' === $control->manager->get_setting( 'smooth_blog_service' )->value() ;
}

/**
 * Check if the featured is enabled
 */
function smooth_blog_if_featured_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'smooth_blog_featured' )->value() ;
}

/**
 * Check if the featured is page
 */
function smooth_blog_if_featured_page( $control ) {
	return 'page' === $control->manager->get_setting( 'smooth_blog_featured' )->value() ;
}


/**
 * Check if the blog is enabled
 */
function smooth_blog_if_blog_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'smooth_blog_blog' )->value() ;
}

/**
 * Check if the blog is custom
 */
function smooth_blog_if_blog_cat( $control ) {
	return 'cat' === $control->manager->get_setting( 'smooth_blog_blog' )->value() ;
}

/**
 * Check if the blog is page
 */
function smooth_blog_if_blog_page( $control ) {
	return 'page' === $control->manager->get_setting( 'smooth_blog_blog' )->value() ;
}


/**
 * Check if the footer text is enabled
 */
function smooth_blog_if_footer_text_enable( $control ) {
	return $control->manager->get_setting( 'smooth_blog_enable_footer_text' )->value();
}

