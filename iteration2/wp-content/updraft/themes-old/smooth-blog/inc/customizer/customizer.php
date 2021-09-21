<?php
/**
 * Moral Theme Customizer
 *
 * @package Moral
 */

/**
 * Get all the default values of the theme mods.
 */
function smooth_blog_get_default_mods() {
	$smooth_blog_default_mods = array(
		// Footer copyright
		'smooth_blog_copyright_txt' => esc_html__( 'Copyright &copy; [the-year] [site-link]  |  ', 'smooth-blog' ),
	);

	return apply_filters( 'smooth_blog_default_mods', $smooth_blog_default_mods );
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function smooth_blog_customize_register( $wp_customize ) {

	// Custom Controller
	require get_parent_theme_file_path( '/inc/customizer/custom-controller.php' );

	$default = smooth_blog_get_default_mods();

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'smooth_blog_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'smooth_blog_customize_partial_blogdescription',
		) );
	}

	//header text
	$wp_customize->add_setting(
	'smooth_blog_header_text',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => esc_html__( 'View Full Stories', 'smooth-blog' ),
		'transport'	=> 'postMessage',
	)
	);

	$wp_customize->add_control(
		'smooth_blog_header_text',
		array(
			'section'		=> 'header_media',
			'label'			=> esc_html__( 'Header Text:', 'smooth-blog' ),
		)
	);

	$wp_customize->selective_refresh->add_partial( 
		'smooth_blog_header_text', 
		array(
	        'selector'            => '#about-us .read-more a',
			'render_callback'     => 'smooth_blog_about_partial_btn_title',
		) 
	);
	//Color Panel

	// Header tagline color setting
	$wp_customize->add_setting(	
		'smooth_blog_header_tagline',
		array(
			'sanitize_callback' => 'smooth_blog_sanitize_hex_color',
			'default' => '#929292',
			'transport'	=> 'postMessage',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control( 
		$wp_customize,
			'smooth_blog_header_tagline',
			array(
				'section'		=> 'colors',
				'label'			=> esc_html__( 'Site tagline Color:', 'smooth-blog' ),
			)
		)
	);

	// Header text display setting
	$wp_customize->add_setting(	
		'smooth_blog_header_text_display',
		array(
			'sanitize_callback' => 'smooth_blog_sanitize_checkbox',
			'default' => true,
			'transport'	=> 'postMessage',
		)
	);

	$wp_customize->add_control(
		'smooth_blog_header_text_display',
		array(
			'section'		=> 'title_tagline',
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Display Site Title and Tagline', 'smooth-blog' ),
		)
	);


	// Your latest posts title setting
	$wp_customize->add_setting(	
		'smooth_blog_your_latest_posts_title',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => esc_html__( 'Blogs', 'smooth-blog' ),
			'transport'	=> 'postMessage',
		)
	);

	$wp_customize->add_control(
		'smooth_blog_your_latest_posts_title',
		array(
			'section'		=> 'static_front_page',
			'label'			=> esc_html__( 'Title:', 'smooth-blog' ),
			'active_callback' => 'smooth_blog_is_latest_posts'
		)
	);

	$wp_customize->selective_refresh->add_partial( 
		'smooth_blog_your_latest_posts_title', 
		array(
	        'selector'            => '.home.blog #page-header .page-title',
			'render_callback'     => 'smooth_blog_your_latest_posts_partial_title',
    	) 
    );

	/**
	 * 
	 * Front Section
	 * 
	 */ 

	// Home sections panel
	$wp_customize->add_panel(
		'smooth_blog_home_panel',
		array(
			'title' => esc_html__( 'Homepage Options', 'smooth-blog' ),
			'priority' => 105
		)
	);

    //slider
    require get_parent_theme_file_path( '/inc/customizer/slider.php' );

	//service
	require get_parent_theme_file_path( '/inc/customizer/service.php' );

    //about
    require get_parent_theme_file_path( '/inc/customizer/about.php' );

	//featured
	require get_parent_theme_file_path( '/inc/customizer/featured.php' );

	//blog
	require get_parent_theme_file_path( '/inc/customizer/blog.php' );

	// Theme Options
	require get_parent_theme_file_path( '/inc/customizer/theme-option.php' );

}
add_action( 'customize_register', 'smooth_blog_customize_register' );


// Sanitize Callback
require get_parent_theme_file_path( '/inc/customizer/sanitize-callback.php' );

// active Callback
require get_parent_theme_file_path( '/inc/customizer/active-callback.php' );

// Partial Refresh
require get_parent_theme_file_path( '/inc/customizer/partial-refresh.php' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function smooth_blog_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function smooth_blog_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function smooth_blog_customize_preview_js() {
	wp_enqueue_script( 'smooth_blog-customizer', get_theme_file_uri( '/assets/js/customizer.js' ), array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'smooth_blog_customize_preview_js' );

/**
 * Binds JS handlers for Customizer controls.
 */
function smooth_blog_customize_control_js() {

	wp_enqueue_style( 'smooth_blog-customize-style', get_theme_file_uri( '/assets/css/customize-controls.css' ), array(), '20151215' );

	wp_enqueue_script( 'smooth_blog-customize-control', get_theme_file_uri( '/assets/js/customize-control.js' ), array( 'jquery', 'customize-controls' ), '20151215', true );
	$localized_data = array( 
		'refresh_msg' => esc_html__( 'Refresh the page after Save and Publish.', 'smooth-blog' ),
		'reset_msg' => esc_html__( 'Warning!!! This will reset all the settings. Refresh the page after Save and Publish to reset all.', 'smooth-blog' ),
	);

	wp_localize_script( 'smooth_blog-customize-control', 'localized_data', $localized_data );
}
add_action( 'customize_controls_enqueue_scripts', 'smooth_blog_customize_control_js' );
