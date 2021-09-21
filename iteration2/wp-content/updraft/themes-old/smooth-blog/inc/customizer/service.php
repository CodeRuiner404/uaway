<?php
/**
 * Moral Theme Customizer
 *
 * @package Moral
 *
 * service section
 */

$wp_customize->add_section(
	'smooth_blog_service',
	array(
		'title' => esc_html__( 'Service', 'smooth-blog' ),
		'panel' => 'smooth_blog_home_panel',
	)
);

// service enable settings
$wp_customize->add_setting(
	'smooth_blog_service',
	array(
		'sanitize_callback' => 'smooth_blog_sanitize_select',
		'default' => 'disable'
	)
);

$wp_customize->add_control(
	'smooth_blog_service',
	array(
		'section'		=> 'smooth_blog_service',
		'label'			=> esc_html__( 'Content type:', 'smooth-blog' ),
		'description'	=> esc_html__( 'Choose where you want to render the content from.', 'smooth-blog' ),
		'type'			=> 'select',
		'choices'		=> array( 
				'disable' => esc_html__( '--Disable--', 'smooth-blog' ),
				'page' => esc_html__( 'Page', 'smooth-blog' ),
		 	)
	)
);


$wp_customize->add_setting(
	'smooth_blog_service_num',
	array(
		'sanitize_callback' => 'smooth_blog_sanitize_number_range',
		'default' => 4,
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'smooth_blog_service_num',
	array(
		'section'		=> 'smooth_blog_service',
		'label'			=> esc_html__( 'Number of Posts:', 'smooth-blog' ),
		'description'	=> esc_html__( 'Min: 3 | Max: 8', 'smooth-blog' ),
		'type'			=> 'number',
		'input_attrs'	=> array( 'min' => 4, 'max' => 8 ),
		'active_callback'	=> 'smooth_blog_if_service_enabled',
	)
);

$wp_customize->add_setting(
	'smooth_blog_service_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => esc_html__( 'We Are Here To Help You Grow', 'smooth-blog' ),
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'smooth_blog_service_title',
	array(
		'section'		=> 'smooth_blog_service',
		'label'			=> esc_html__( 'Title:', 'smooth-blog' ),
		'active_callback'	=> 'smooth_blog_if_service_enabled',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'smooth_blog_service_title', 
	array(
        'selector'            => '#our-services .section-title',
		'render_callback'     => 'smooth_blog_service_partial_title',
	) 
);

$wp_customize->add_setting(
	'smooth_blog_service_sub_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => esc_html__( 'Our Services', 'smooth-blog' ),
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'smooth_blog_service_sub_title',
	array(
		'section'		=> 'smooth_blog_service',
		'label'			=> esc_html__( 'Sub Title:', 'smooth-blog' ),
		'active_callback'	=> 'smooth_blog_if_service_enabled',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'smooth_blog_service_sub_title', 
	array(
        'selector'            => '#our-services .section-subtitle',
		'render_callback'     => 'smooth_blog_service_partial_sub_title',
	) 
);

$wp_customize->add_setting(
	'smooth_blog_service_btn_label',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => esc_html__( 'Read More', 'smooth-blog' ),
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'smooth_blog_service_btn_label',
	array(
		'section'		=> 'smooth_blog_service',
		'label'			=> esc_html__( 'Btn label:', 'smooth-blog' ),
		'active_callback'	=> 'smooth_blog_if_service_enabled',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'smooth_blog_service_btn_label', 
	array(
        'selector'            => '#our-services article div.read-more a.btn',
		'render_callback'     => 'smooth_blog_service_partial_btn_label',
	) 
);


$service_num = get_theme_mod( 'smooth_blog_service_num', 4 );

for ($i=1; $i <= $service_num ; $i++) { 

	$wp_customize->add_setting(
		'smooth_blog_service_icons_' . $i,
		array(	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'smooth_blog_service_icons_' . $i,
		array(
		'label'       => __('Icon ', 'smooth-blog'). $i,
		'description' => sprintf( __('Please input icon as eg: address-card. Find Font-awesome icons %1$shere%2$s', 'smooth-blog'), '<a href="' . esc_url( 'https://fontawesome.com/cheatsheet/free/regular' ) . '" target="_blank">', '</a>' ),
		'section'     => 'smooth_blog_service',   	
		'type'        => 'text',
		'input_attrs'	=> array( 'placeholder' => 'address-card' ),
		'active_callback'	=> 'smooth_blog_if_service_enabled',
		)
	);

	// service page setting
	$wp_customize->add_setting(
		'smooth_blog_service_page_'.$i,
		array(
			'sanitize_callback' => 'smooth_blog_sanitize_dropdown_pages',
			'default' => 0,
		)
	);

	$wp_customize->add_control(
		'smooth_blog_service_page_'.$i,
		array(
			'section'		=> 'smooth_blog_service',
			'label'			=> esc_html__( 'Page ', 'smooth-blog' ).$i,
			'type'			=> 'dropdown-pages',
			'active_callback' => 'smooth_blog_if_service_page'
		)
	);
}
