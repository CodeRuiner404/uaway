<?php
/**
 * Moral Theme Customizer
 *
 * @package Moral
 *
 * advance setting
 */

$wp_customize->add_panel(
	'smooth_blog_general_panel',
	array(
		'title' => esc_html__( 'Theme Options', 'smooth-blog' ),
		'priority' => 107
	)
);

/**
 * General settings
 */
// General settings
$wp_customize->add_section(
	'smooth_blog_general_section',
	array(
		'title' => esc_html__( 'General', 'smooth-blog' ),
		'panel' => 'smooth_blog_general_panel',
	)
);

// Breadcrumb enable setting
$wp_customize->add_setting(
	'smooth_blog_breadcrumb_enable',
	array(
		'sanitize_callback' => 'smooth_blog_sanitize_checkbox',
		'default' => true,
	)
);

$wp_customize->add_control(
	'smooth_blog_breadcrumb_enable',
	array(
		'section'		=> 'smooth_blog_general_section',
		'label'			=> esc_html__( 'Enable breadcrumb.', 'smooth-blog' ),
		'type'			=> 'checkbox',
	)
);


/**
 * Global Layout
 */
// Global Layout
$wp_customize->add_section(
	'smooth_blog_global_layout',
	array(
		'title' => esc_html__( 'Global Layout', 'smooth-blog' ),
		'panel' => 'smooth_blog_general_panel',
	)
);

// Global site layout setting
$wp_customize->add_setting(
	'smooth_blog_site_layout',
	array(
		'sanitize_callback' => 'smooth_blog_sanitize_select',
		'default' => 'wide',
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'smooth_blog_site_layout',
	array(
		'section'		=> 'smooth_blog_global_layout',
		'label'			=> esc_html__( 'Site layout', 'smooth-blog' ),
		'type'			=> 'radio',
		'choices'		=> array( 
			'boxed' => esc_html__( 'Boxed', 'smooth-blog' ), 
			'wide' => esc_html__( 'Wide', 'smooth-blog' ), 
		),
	)
);

// Global archive layout setting
$wp_customize->add_setting(
	'smooth_blog_archive_sidebar',
	array(
		'sanitize_callback' => 'smooth_blog_sanitize_select',
		'default' => 'right',
	)
);

$wp_customize->add_control(
	'smooth_blog_archive_sidebar',
	array(
		'section'		=> 'smooth_blog_global_layout',
		'label'			=> esc_html__( 'Archive Sidebar', 'smooth-blog' ),
		'description'			=> esc_html__( 'This option works on all archive pages like: 404, search, date, category, "Your latest posts" and so on.', 'smooth-blog' ),
		'type'			=> 'radio',
		'choices'		=> array( 
			'right' => esc_html__( 'Right', 'smooth-blog' ), 
			'no' => esc_html__( 'No Sidebar', 'smooth-blog' ), 
		),
	)
);

// Global page layout setting
$wp_customize->add_setting(
	'smooth_blog_global_page_layout',
	array(
		'sanitize_callback' => 'smooth_blog_sanitize_select',
		'default' => 'right',
	)
);

$wp_customize->add_control(
	'smooth_blog_global_page_layout',
	array(
		'section'		=> 'smooth_blog_global_layout',
		'label'			=> esc_html__( 'Global page sidebar', 'smooth-blog' ),
		'description'	=> esc_html__( 'This option works only on single pages including "Posts page". This setting can be overridden for single page from the metabox too.', 'smooth-blog' ),
		'type'			=> 'radio',
		'choices'		=> array( 
			'right' => esc_html__( 'Right', 'smooth-blog' ), 
			'no' => esc_html__( 'No Sidebar', 'smooth-blog' ), 
		),
	)
);

// Global post layout setting
$wp_customize->add_setting(
	'smooth_blog_global_post_layout',
	array(
		'sanitize_callback' => 'smooth_blog_sanitize_select',
		'default' => 'right',
	)
);

$wp_customize->add_control(
	'smooth_blog_global_post_layout',
	array(
		'section'		=> 'smooth_blog_global_layout',
		'label'			=> esc_html__( 'Global post sidebar', 'smooth-blog' ),
		'description'	=> esc_html__( 'This option works only on single posts. This setting can be overridden for single post from the metabox too.', 'smooth-blog' ),
		'type'			=> 'radio',
		'choices'		=> array( 
			'right' => esc_html__( 'Right', 'smooth-blog' ), 
			'no' => esc_html__( 'No Sidebar', 'smooth-blog' ), 
		),
	)
);

/**
 * Blog/Archive section 
 */
// Blog/Archive section 
$wp_customize->add_section(
	'smooth_blog_archive_settings',
	array(
		'title' => esc_html__( 'Archive/Blog', 'smooth-blog' ),
		'description' => esc_html__( 'Settings for archive pages including blog page too.', 'smooth-blog' ),
		'panel' => 'smooth_blog_general_panel',
	)
);

// Archive excerpt length setting
$wp_customize->add_setting(
	'smooth_blog_archive_excerpt_length',
	array(
		'sanitize_callback' => 'smooth_blog_sanitize_number_range',
		'default' => 20,
	)
);

$wp_customize->add_control(
	'smooth_blog_archive_excerpt_length',
	array(
		'section'		=> 'smooth_blog_archive_settings',
		'label'			=> esc_html__( 'Excerpt more length:', 'smooth-blog' ),
		'type'			=> 'number',
		'input_attrs'   => array( 'min' => 5 ),
	)
);

// Pagination type setting
$wp_customize->add_setting(
	'smooth_blog_archive_pagination_type',
	array(
		'sanitize_callback' => 'smooth_blog_sanitize_select',
		'default' => 'numeric',
	)
);

$wp_customize->add_control(
	'smooth_blog_archive_pagination_type',
	array(
		'section'		=> 'smooth_blog_archive_settings',
		'label'			=> esc_html__( 'Pagination type:', 'smooth-blog' ),
		'type'			=> 'select',
		'choices'		=> array( 
			'disable' => esc_html__( '--Disable--', 'smooth-blog' ),
			'numeric' => esc_html__( 'Numeric', 'smooth-blog' ),
			'older_newer' => esc_html__( 'Older / Newer', 'smooth-blog' ),
		),
	)
);


/**
 * Reset all settings
 */
// Reset settings section
$wp_customize->add_section(
	'smooth_blog_reset_sections',
	array(
		'title' => esc_html__( 'Reset all', 'smooth-blog' ),
		'description' => esc_html__( 'Reset all settings to default.', 'smooth-blog' ),
		'panel' => 'smooth_blog_general_panel',
	)
);

// Reset sortable order setting
$wp_customize->add_setting(
	'smooth_blog_reset_settings',
	array(
		'sanitize_callback' => 'smooth_blog_sanitize_checkbox',
		'default' => false,
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'smooth_blog_reset_settings',
	array(
		'section'		=> 'smooth_blog_reset_sections',
		'label'			=> esc_html__( 'Reset all settings?', 'smooth-blog' ),
		'type'			=> 'checkbox',
	)
);

/**
 *
 *
 * Footer copyright
 *
 *
 */
// Footer copyright
$wp_customize->add_section(
	'smooth_blog_footer_section',
	array(
		'title' => esc_html__( 'Footer', 'smooth-blog' ),
		'priority' => 106,
		'panel' => 'smooth_blog_general_panel',
	)
);


// Footer text enable setting
$wp_customize->add_setting(
	'smooth_blog_enable_footer_text',
	array(
		'sanitize_callback' => 'smooth_blog_sanitize_checkbox',
		'default' => true,
	)
);

$wp_customize->add_control(
	'smooth_blog_enable_footer_text',
	array(
		'section'		=> 'smooth_blog_footer_section',
		'label'			=> esc_html__( 'Enable footer text.', 'smooth-blog' ),
		'type'			=> 'checkbox',
	)
);

// Footer copyright setting
$wp_customize->add_setting(
	'smooth_blog_copyright_txt',
	array(
		'sanitize_callback' => 'smooth_blog_sanitize_html',
		'default' => $default['smooth_blog_copyright_txt'],
		'transport'	=> 'refresh',
	)
);

$wp_customize->add_control(
	'smooth_blog_copyright_txt',
	array(
		'section'		=> 'smooth_blog_footer_section',
		'label'			=> esc_html__( 'Copyright text:', 'smooth-blog' ),
		'type'			=> 'textarea',
		'active_callback' => 'smooth_blog_if_footer_text_enable',
	)
);

