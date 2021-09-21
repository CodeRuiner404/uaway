<?php
/**
 * Moral Theme Customizer
 *
 * @package Moral
 *
 * about section
 */
$wp_customize->add_section(
	'smooth_blog_about',
	array(
		'title' => esc_html__( 'About Post', 'smooth-blog' ),
		'panel' => 'smooth_blog_home_panel',
	)
);

// about enable settings
$wp_customize->add_setting(
	'smooth_blog_about',
	array(
		'sanitize_callback' => 'smooth_blog_sanitize_select',
		'default' => 'disable'
	)
);

$wp_customize->add_control(
	'smooth_blog_about',
	array(
		'section'		=> 'smooth_blog_about',
		'label'			=> esc_html__( 'Content type:', 'smooth-blog' ),
		'description'			=> esc_html__( 'Choose where you want to render the content from.', 'smooth-blog' ),
		'type'			=> 'select',
		'choices'		=> array( 
				'disable' => esc_html__( '--Disable--', 'smooth-blog' ),
				'page' => esc_html__( 'Page', 'smooth-blog' ),
		 	)
	)
);

$wp_customize->add_setting(
	'smooth_blog_about_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => esc_html__( 'About Author', 'smooth-blog' ),
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'smooth_blog_about_title',
	array(
		'section'		=> 'smooth_blog_about',
		'label'			=> esc_html__(  'Title:', 'smooth-blog' ),
	)
);

$wp_customize->selective_refresh->add_partial( 
	'smooth_blog_about_title', 
	array(
        'selector'            => '#about-us p.section-subtitle',
		'render_callback'     => 'smooth_blog_about_partial_title',
	) 
);

$wp_customize->add_setting(
	'smooth_blog_about_btn_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => esc_html__( 'View Full Stories', 'smooth-blog' ),
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'smooth_blog_about_btn_title',
	array(
		'section'		=> 'smooth_blog_about',
		'label'			=> esc_html__( 'Btn Title:', 'smooth-blog' ),
	)
);

$wp_customize->selective_refresh->add_partial( 
	'smooth_blog_about_btn_title', 
	array(
        'selector'            => '#about-us .read-more a',
		'render_callback'     => 'smooth_blog_about_partial_btn_title',
	) 
);

// about page setting
$wp_customize->add_setting(
	'smooth_blog_about_page_1',
	array(
		'sanitize_callback' => 'smooth_blog_sanitize_dropdown_pages',
		'default' => 0,
	)
);

$wp_customize->add_control(
	'smooth_blog_about_page_1',
	array(
		'section'		=> 'smooth_blog_about',
		'label'			=> esc_html__( 'Page ', 'smooth-blog' ),
		'type'			=> 'dropdown-pages',
		'active_callback' => 'smooth_blog_if_about_page'
	)
);
