<?php
/**
 * Moral Theme Customizer
 *
 * @package Moral
 *
 * blog section
 */

$wp_customize->add_section(
	'smooth_blog_blog',
	array(
		'title' => esc_html__( 'Blog', 'smooth-blog' ),
		'panel' => 'smooth_blog_home_panel',
	)
);

// blog enable settings
$wp_customize->add_setting(
	'smooth_blog_blog',
	array(
		'sanitize_callback' => 'smooth_blog_sanitize_select',
		'default' => 'disable'
	)
);

$wp_customize->add_control(
	'smooth_blog_blog',
	array(
		'section'		=> 'smooth_blog_blog',
		'label'			=> esc_html__( 'Content type:', 'smooth-blog' ),
		'description'			=> esc_html__( 'Choose where you want to render the content from.', 'smooth-blog' ),
		'type'			=> 'select',
		'choices'		=> array( 
				'disable' => esc_html__( '--Disable--', 'smooth-blog' ),
				'page' => esc_html__( 'Page', 'smooth-blog' ),
				'cat' => esc_html__( 'Category', 'smooth-blog' ),
		 	)
	)
);


$wp_customize->add_setting(
	'smooth_blog_blog_num',
	array(
		'sanitize_callback' => 'smooth_blog_sanitize_number_range',
		'default' => 3,
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'smooth_blog_blog_num',
	array(
		'section'		=> 'smooth_blog_blog',
		'label'			=> esc_html__( 'Number of Posts:', 'smooth-blog' ),
		'description'			=> esc_html__( 'Min: 3 | Max: 9', 'smooth-blog' ),
		'type'			=> 'number',
		'input_attrs'	=> array( 'min' => 3, 'max' => 9 ),
		'active_callback'	=> 'smooth_blog_if_blog_enabled',
	)
);

$wp_customize->add_setting(
	'smooth_blog_blog_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => esc_html__( 'Popular This Week', 'smooth-blog' ),
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'smooth_blog_blog_title',
	array(
		'section'		=> 'smooth_blog_blog',
		'label'			=> esc_html__( 'Title:', 'smooth-blog' ),
		'active_callback'	=> 'smooth_blog_if_blog_enabled',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'smooth_blog_blog_title', 
	array(
        'selector'            => '#inner-content-wrapper p.section-subtitle',
		'render_callback'     => 'smooth_blog_blog_partial_title',
	) 
);



$blog_num = get_theme_mod( 'smooth_blog_blog_num', 3 );
for ($i=1; $i <= $blog_num ; $i++) { 

	// blog page setting
	$wp_customize->add_setting(
		'smooth_blog_blog_page_'.$i,
		array(
			'sanitize_callback' => 'smooth_blog_sanitize_dropdown_pages',
			'default' => 0,
		)
	);

	$wp_customize->add_control(
		'smooth_blog_blog_page_'.$i,
		array(
			'section'		=> 'smooth_blog_blog',
			'label'			=> esc_html__( 'Page ', 'smooth-blog' ).$i,
			'type'			=> 'dropdown-pages',
			'active_callback' => 'smooth_blog_if_blog_page'
		)
	);
}

// blog category setting
$wp_customize->add_setting(
	'smooth_blog_blog_cat',
	array(
		'sanitize_callback' => 'smooth_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'smooth_blog_blog_cat',
	array(
		'section'		=> 'smooth_blog_blog',
		'label'			=> esc_html__( 'Category:', 'smooth-blog' ),
		'active_callback' => 'smooth_blog_if_blog_cat',
		'type'			=> 'select',
		'choices'		=> smooth_blog_get_post_cat_choices(),
	)
);
