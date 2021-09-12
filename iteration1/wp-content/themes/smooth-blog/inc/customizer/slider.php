<?php
/**
 * Moral Theme Customizer
 *
 * @package Moral
 *
 * Posts Slider section
 */

$wp_customize->add_section(
	'smooth_blog_slider',
	array(
		'title' => esc_html__( 'Slider', 'smooth-blog' ),
		'panel' => 'smooth_blog_home_panel',
	)
);

// slider enable settings
$wp_customize->add_setting(
	'smooth_blog_slider',
	array(
		'sanitize_callback' => 'smooth_blog_sanitize_select',
		'default' => 'disable'
	)
);

$wp_customize->add_control(
	'smooth_blog_slider',
	array(
		'section'		=> 'smooth_blog_slider',
		'label'			=> esc_html__( 'Content type:', 'smooth-blog' ),
		'description'			=> esc_html__( 'Choose where you want to render the content from.', 'smooth-blog' ),
		'type'			=> 'select',		
		'choices'		=> array( 
				'disable' 	=> esc_html__( '--Disable--', 'smooth-blog' ),
				'page' 		=> esc_html__( 'Page', 'smooth-blog' ),
		 	)
	)
);

$wp_customize->add_setting(
	'smooth_blog_slider_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'smooth_blog_slider_title',
	array(
		'section'		=> 'smooth_blog_slider',
		'label'			=> esc_html__( 'Section Title:', 'smooth-blog' ),
		
	)
);

$wp_customize->selective_refresh->add_partial( 
	'smooth_blog_slider_title', 
	array(
        'selector'            => '#featured-slider .entry-header span',
		'render_callback'     => 'smooth_blog_slider_partial_title',
	) 
);

$wp_customize->add_setting(
	'smooth_blog_slider_btn_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => esc_html__( 'Read More', 'smooth-blog' ),
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'smooth_blog_slider_btn_title',
	array(
		'section'		=> 'smooth_blog_slider',
		'label'			=> esc_html__( 'Btn Title:', 'smooth-blog' ),
		
	)
);

$wp_customize->selective_refresh->add_partial( 
	'smooth_blog_slider_btn_title', 
	array(
        'selector'            => '#featured-slider .read-more a',
		'render_callback'     => 'smooth_blog_slider_partial_btn_title',
	) 
);

// slider number setting
$wp_customize->add_setting(
	'smooth_blog_slider_num',
	array(
		'sanitize_callback' => 'smooth_blog_sanitize_number_range',
		'default' => 3,
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'smooth_blog_slider_num',
	array(
		'section'		=> 'smooth_blog_slider',
		'label'			=> esc_html__( 'Number of Posts:', 'smooth-blog' ),
		'description'	=> esc_html__( 'Min: 3 | Max: 12', 'smooth-blog' ),
		'type'			=> 'number',
		'input_attrs'	=> array( 'min' => 3, 'max' => 12 ),
	)
);

$slider_num = get_theme_mod( 'smooth_blog_slider_num', 3 );

for ($i=1; $i <= $slider_num ; $i++) { 

	// slider page setting
	$wp_customize->add_setting(
		'smooth_blog_slider_page_'.$i,
		array(
			'sanitize_callback' => 'smooth_blog_sanitize_dropdown_pages',
			'default' => 0,
		)
	);

	$wp_customize->add_control(
		'smooth_blog_slider_page_'.$i,
		array(
			'section'			=> 'smooth_blog_slider',
			'label'				=> esc_html__( 'Page ', 'smooth-blog' ).$i,
			'type'				=> 'dropdown-pages',
			'active_callback' 	=> 'smooth_blog_if_slider_page'
		)
	);
}
