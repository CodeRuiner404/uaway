<?php
/**
 * Moral Theme Customizer
 *
 * @package Moral
 *
 * featured section
 */

$wp_customize->add_section(
	'smooth_blog_featured',
	array(
		'title' => esc_html__( 'Featured', 'smooth-blog' ),
		'panel' => 'smooth_blog_home_panel',
	)
);

// featured enable settings
$wp_customize->add_setting(
	'smooth_blog_featured',
	array(
		'sanitize_callback' => 'smooth_blog_sanitize_select',
		'default' => 'disable'
	)
);

$wp_customize->add_control(
	'smooth_blog_featured',
	array(
		'section'			=> 'smooth_blog_featured',
		'label'				=> esc_html__( 'Content type:', 'smooth-blog' ),
		'description'		=> esc_html__( 'Choose where you want to render the content from.', 'smooth-blog' ),
		'type'				=> 'select',
		'choices'			=> array( 
				'disable' => esc_html__( '--Disable--', 'smooth-blog' ),
				'page' 	=> esc_html__( 'Page', 'smooth-blog' ),
		 	)
	)
);
$wp_customize->add_setting(
	'smooth_blog_featured_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => esc_html__( 'Featured Posts', 'smooth-blog' ),
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'smooth_blog_featured_title',
	array(
		'section'		=> 'smooth_blog_featured',
		'label'			=> esc_html__( 'Title:', 'smooth-blog' ),
		'active_callback'	=> 'smooth_blog_if_featured_enabled',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'smooth_blog_featured_title', 
	array(
        'selector'            => '#featured-posts .section-subtitle',
		'render_callback'     => 'smooth_blog_featured_partial_title',
	) 
);

$wp_customize->add_setting(
	'smooth_blog_featured_btn_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => esc_html__( 'View All Featured Post', 'smooth-blog' ),
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'smooth_blog_featured_btn_title',
	array(
		'section'		=> 'smooth_blog_featured',
		'label'			=> esc_html__( 'Btn Title:', 'smooth-blog' ),
		'active_callback'	=> 'smooth_blog_if_featured_enabled',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'smooth_blog_featured_btn_title', 
	array(
        'selector'            => '#featured-posts .read-more a',
		'render_callback'     => 'smooth_blog_featured_partial_btn_title',
	) 
);


// featured number setting
$wp_customize->add_setting(
	'smooth_blog_featured_num',
	array(
		'sanitize_callback' => 'smooth_blog_sanitize_number_range',
		'default' => 3,
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'smooth_blog_featured_num',
	array(
		'section'		=> 'smooth_blog_featured',
		'label'			=> esc_html__( 'Number of Posts:', 'smooth-blog' ),
		'description'			=> esc_html__( 'Min: 3 | Max: 9', 'smooth-blog' ),
		'type'			=> 'number',
		'input_attrs'	=> array( 'min' => 3, 'max' => 9 ),
		'active_callback'	=> 'smooth_blog_if_featured_enabled',
	)
);
$featured_num = get_theme_mod( 'smooth_blog_featured_num', 3 );

for ($i=1; $i <= $featured_num ; $i++) { 

	// featured page setting
	$wp_customize->add_setting(
		'smooth_blog_featured_page_'.$i,
		array(
			'sanitize_callback' => 'smooth_blog_sanitize_dropdown_pages',
			'default' => 0,
		)
	);

	$wp_customize->add_control(
		'smooth_blog_featured_page_'.$i,
		array(
			'section'		=> 'smooth_blog_featured',
			'label'			=> esc_html__( 'Page ', 'smooth-blog' ).$i,
			'type'			=> 'dropdown-pages',
			'active_callback' => 'smooth_blog_if_featured_page'
		)
	);
}
