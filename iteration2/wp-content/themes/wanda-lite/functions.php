<?php

/*-----------------------------------------------------------------------------------*/
/* Enqueu scripts */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('wanda_lite_enqueue_scripts')) {

	function wanda_lite_enqueue_scripts() {

		wp_deregister_style( 'sheeba-lite-style' );
		wp_deregister_style( 'sheeba-lite-' . esc_attr(get_theme_mod('sheeba_lite_skin', 'orange')) );
		
		wp_enqueue_style( 'sheeba-lite-parent-style' , get_template_directory_uri() . '/style.css' ); 

		wp_enqueue_style(
			'wanda-lite-' . esc_attr(get_theme_mod('sheeba_lite_skin', 'orange')),
			get_template_directory_uri() . '/assets/skins/' . esc_attr(get_theme_mod('sheeba_lite_skin', 'orange')) . '.css',
			array( 'wanda-lite-style' ),
			'1.0.0'
		); 

		wp_enqueue_style( 'wanda-lite-style' , get_stylesheet_directory_uri() . '/style.css' ); 

		$googleFontsArgs = array(
			'family' =>	str_replace('|', '%7C','Playfair+Display:400,400i,700,700i,900,900i|Merriweather:300,300i,400,400i,700,700i,900,900i'),
			'subset' =>	'latin,latin-ext'
		);

		wp_deregister_style('google-fonts');
		wp_enqueue_style('google-fonts', add_query_arg ( $googleFontsArgs, "https://fonts.googleapis.com/css" ), array(), '1.0.0' );

	}
	
	add_action( 'wp_enqueue_scripts', 'wanda_lite_enqueue_scripts', 999);

}

/*-----------------------------------------------------------------------------------*/
/* Widgets init */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('wanda_lite_widgets_init')) {

	function wanda_lite_widgets_init(){

		register_sidebar(array(
		
			'name' => esc_html__('Banner widget area','wanda-lite'),
			'id'   => 'wanda-lite-banner-widget-area',
			'description'   => esc_html__('This widget area will be shown near the logo (Recommended for the image widget).', 'wanda-lite'),
			'before_widget' => '<div id="%1$s" class="post-container %2$s"><article class="no-padding">',
			'after_widget'  => '</article></div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'
		
		));

	}
	
	add_action( 'widgets_init', 'wanda_lite_widgets_init', 11 );
	
}

/*-----------------------------------------------------------------------------------*/
/* Replace hooks */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('wanda_lite_replace_hooks')) {

	function wanda_lite_replace_hooks() {
		remove_filter('post_class', 'sheeba_lite_post_class');
		remove_action('sheeba_lite_after_content', 'sheeba_lite_after_content_function' );
		remove_action('sheeba_lite_homepage_slider', 'sheeba_lite_homepage_slider_function');
	}
	
	add_action('init','wanda_lite_replace_hooks');

}

/*-----------------------------------------------------------------------------------*/
/* Post class */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('wanda_lite_post_class')) {

	function wanda_lite_post_class($classes) {	

		$masonry  = 'post-container masonry-item col-md-3';
		$standard = 'post-container col-md-12';

		if ( !sheeba_lite_is_single() ) {

			if ( is_home() ) {
				
				if ( !sheeba_lite_setting('sheeba_lite_home_layout') || sheeba_lite_setting('sheeba_lite_home_layout') == 'col-md-3' ) {
	
					$classes[] = $masonry;
	
				} else {
	
					$classes[] = $standard;
	
				}
				
			} else if ( is_archive() && !sheeba_lite_is_woocommerce_active('is_shop') ) {
				
				if ( !sheeba_lite_setting('sheeba_lite_category_layout') || sheeba_lite_setting('sheeba_lite_category_layout') == 'col-md-3' ) {
	
					$classes[] = $masonry;
	
				} else {
	
					$classes[] = $standard;
	
				}
				
			} else if ( is_search() ) {
				
				if ( !sheeba_lite_setting('sheeba_lite_search_layout') || sheeba_lite_setting('sheeba_lite_search_layout') == 'col-md-3' ) {
	
					$classes[] = $masonry;
	
				} else {
	
					$classes[] = $standard;
	
				}
			
			}

		} else if ( sheeba_lite_is_single() && sheeba_lite_is_woocommerce_active('is_cart') ) {
		
			$classes[] = 'post-container full-content col-md-12 woocommerce_cart_page';

		} else if ( sheeba_lite_is_single() && !sheeba_lite_is_woocommerce_active('is_product') ) {

			$classes[] = 'post-container full-content col-md-12';

		} else if ( is_page() ) {

			$classes[] = 'full';

		}

		return $classes;
		
	}
	
	add_filter('post_class', 'wanda_lite_post_class');

}

/*-----------------------------------------------------------------------------------*/
/* New after content function */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('wanda_lite_after_content_function')) {

	function wanda_lite_after_content_function() { 
	
		if ( sheeba_lite_get_archive_title() || is_page_template() || is_search() || is_home() ) {
	
			if ( sheeba_lite_setting('sheeba_lite_enable_readmore_button', true) == true ) {
				
				the_excerpt(); 
			
			} else if (sheeba_lite_setting('sheeba_lite_enable_readmore_button') == false ) {
				
				the_content(); 
			
			}
	
		} else {
		
			the_content();
	
			the_tags( '<footer class="line"><span class="entry-info"><strong>'.esc_html__('Tags: ','wanda-lite').'</strong> ', ', ', '</span></footer>' );

			if ( sheeba_lite_setting('sheeba_lite_enable_author_section', true) == true && is_singular('post') ) {

				do_action('sheeba_lite_author_box');

			}
		
		}
	
	} 

	add_action( 'sheeba_lite_after_content', 'wanda_lite_after_content_function' );

}

/*-----------------------------------------------------------------------------------*/
/* Theme setup */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('wanda_lite_theme_setup')) {

	function wanda_lite_theme_setup() {

		load_child_theme_textdomain( 'wanda-lite', get_stylesheet_directory() . '/languages' );

		remove_image_size( 'sheeba_lite_slideshow_large'); 
		remove_image_size( 'sheeba_lite_slideshow_small'); 
		
		add_image_size( 'wanda_lite_slideshow_large', 1010, 500, TRUE ); 
		add_image_size( 'wanda_lite_slideshow_medium', 650, 350, TRUE ); 
		add_image_size( 'wanda_lite_slideshow_small', 365, 250, TRUE ); 

		require_once( trailingslashit( get_stylesheet_directory() ) . 'core/functions/function-style.php' );
		require_once( trailingslashit( get_stylesheet_directory() ) . 'core/templates/homepage-slider.php' );

		register_default_headers( array(
			'default-image' => array(
				'url'           => get_stylesheet_directory_uri() . '/assets/images/header/header.jpg',
				'thumbnail_url' => get_stylesheet_directory_uri() . '/assets/images/header/resized-header.jpg',
				'description'   => __( 'Default image', 'wanda-lite' )
			),
		));

		add_theme_support( 'custom-header', array( 
			'width'         => 1920,
			'height'        => 600,
			'default-image' => get_stylesheet_directory_uri() . '/assets/images/header/header.jpg',
			'header-text' 	=> false
		));

	}

	add_action( 'after_setup_theme', 'wanda_lite_theme_setup' );

}


/*-----------------------------------------------------------------------------------*/
/* Customize register */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('wanda_lite_customize_register')) {

	function wanda_lite_customize_register( $wp_customize ) {

		$wp_customize->remove_setting( 'sheeba_lite_logo_text_color');

		$wp_customize->add_setting( 'sheeba_lite_logo_text_color', array(
			'default' => '#fffff',
			'sanitize_callback' => 'sanitize_hex_color',
		));

		$wp_customize->remove_setting( 'sheeba_lite_home_layout');
		$wp_customize->remove_control( 'sheeba_lite_home_layout');

		$wp_customize->add_setting( 'sheeba_lite_home_layout', array(
			'default' => 'col-md-3',
			'sanitize_callback' => 'wanda_lite_select_sanitize',
		));

		$wp_customize->add_control( 'sheeba_lite_home_layout' , array(
			'type' => 'select',
			'section' => 'layouts_section',
			'label' => esc_html__('Home Blog Layout','wanda-lite'),
			'description' => esc_html__('If you&#39;ve set the latest articles, for the homepage, choose a layout.','wanda-lite'),
			'choices'  => array (
			   'full' => esc_html__( 'Full Width','wanda-lite'),
			   'left-sidebar' => esc_html__( 'Left Sidebar','wanda-lite'),
			   'right-sidebar' => esc_html__( 'Right Sidebar','wanda-lite'),
			   'col-md-3' => esc_html__( 'Masonry','wanda-lite'),
			),
		));

		$wp_customize->remove_setting( 'sheeba_lite_category_layout');
		$wp_customize->remove_control( 'sheeba_lite_category_layout');

		$wp_customize->add_setting( 'sheeba_lite_category_layout', array(
			'default' => 'col-md-3',
			'sanitize_callback' => 'wanda_lite_select_sanitize',
		));

		$wp_customize->add_control( 'sheeba_lite_category_layout' , array(
			'type' => 'select',
			'section' => 'layouts_section',
			'label' => esc_html__('Category Layout','wanda-lite'),
			'description' => esc_html__('Select a layout for category pages.','wanda-lite'),
			'choices'  => array (
			   'full' => esc_html__( 'Full Width','wanda-lite'),
			   'left-sidebar' => esc_html__( 'Left Sidebar','wanda-lite'),
			   'right-sidebar' => esc_html__( 'Right Sidebar','wanda-lite'),
			   'col-md-3' => esc_html__( 'Masonry','wanda-lite'),
			),
		));
		
		$wp_customize->remove_setting( 'sheeba_lite_search_layout');
		$wp_customize->remove_control( 'sheeba_lite_search_layout');

		$wp_customize->add_setting( 'sheeba_lite_search_layout', array(
			'default' => 'col-md-3',
			'sanitize_callback' => 'wanda_lite_select_sanitize',
		));

		$wp_customize->add_control( 'sheeba_lite_search_layout' , array(
			'type' => 'select',
			'section' => 'layouts_section',
			'label' => esc_html__('Search Layout','wanda-lite'),
			'description' => esc_html__('Select a layout for the search section.','wanda-lite'),
			'choices'  => array (
			   'full' => esc_html__( 'Full Width','wanda-lite'),
			   'left-sidebar' => esc_html__( 'Left Sidebar','wanda-lite'),
			   'right-sidebar' => esc_html__( 'Right Sidebar','wanda-lite'),
			   'col-md-3' => esc_html__( 'Masonry','wanda-lite'),
			),
		));

		$wp_customize->remove_setting( 'sheeba_lite_slideshow_columns');
		$wp_customize->remove_control( 'sheeba_lite_slideshow_columns');

		$wp_customize->add_setting( 'sheeba_lite_slideshow_columns', array(
			'default' => '1',
			'sanitize_callback' => 'wanda_lite_select_sanitize',
		));

		$wp_customize->add_control( 'sheeba_lite_slideshow_columns' , array(
			'type' => 'select',
			'section' => 'slideshow_section',
			'label' => esc_html__('Columns','wanda-lite'),
			'description' => esc_html__('Select the number of columns for the homepage slideshow.','wanda-lite'),
			'choices'  => array (
			   '1' => esc_html__( '1','wanda-lite'),
			   '2' => esc_html__( '2','wanda-lite'),
			   '3' => esc_html__( '3','wanda-lite'),
			),
		));

		$wp_customize->add_setting( 'wanda_lite_header_attachment', array(
			'default' => 'fixed',
			'sanitize_callback' => 'wanda_lite_select_sanitize',
		));

		$wp_customize->add_control( 'wanda_lite_header_attachment' , array(
			'type' => 'select',
			'section' => 'header_image',
			'priority' => 99,
			'label' => esc_html__('Header attachment','wanda-lite'),
			'description' => esc_html__('Header attachment','wanda-lite'),
			'choices'  => array (
				'initial' => esc_html__( 'Initial', 'wanda-lite'),
				'fixed' => esc_html__( 'Scroll with Page', 'wanda-lite'),
			),
		));

		$wp_customize->add_setting( 'wanda_lite_header_padding_smartphone', array(
			'default' => '90',
			'sanitize_callback' => 'wanda_lite_pixel_size_sanize',
		));

		$wp_customize->add_control( 'wanda_lite_header_padding_smartphone' , array(
			'type' => 'text',
			'section' => 'header_image',
			'priority' => 99,
			'label' => esc_html__('Header padding on smartphone','wanda-lite'),
			'description' => esc_html__('Header padding on smartphone','wanda-lite'),
		));

		$wp_customize->add_setting( 'wanda_lite_header_padding_tablet', array(
			'default' => '90',
			'sanitize_callback' => 'wanda_lite_pixel_size_sanize',
		));

		$wp_customize->add_control( 'wanda_lite_header_padding_tablet' , array(
			'type' => 'text',
			'section' => 'header_image',
			'priority' => 99,
			'label' => esc_html__('Header padding on tablet','wanda-lite'),
			'description' => esc_html__('Header padding on tablet','wanda-lite'),
		));
		
		$wp_customize->add_setting( 'wanda_lite_header_padding_desktop', array(
			'default' => '90',
			'sanitize_callback' => 'wanda_lite_pixel_size_sanize',
		));

		$wp_customize->add_control( 'wanda_lite_header_padding_desktop' , array(
			'type' => 'text',
			'section' => 'header_image',
			'priority' => 99,
			'label' => esc_html__('Header padding on desktop','wanda-lite'),
			'description' => esc_html__('Header padding on desktop','wanda-lite'),
		));
		
		function wanda_lite_select_sanitize ($value, $setting) {
		
			global $wp_customize;
					
			$control = $wp_customize->get_control( $setting->id );
				 
			if ( array_key_exists( $value, $control->choices ) ) {
					
				return $value;
					
			} else {
					
				return $setting->default;
					
			}
			
		}
		
		function wanda_lite_pixel_size_sanize($value, $setting) {

			global $wp_customize;
			
			$getSetting = $wp_customize->get_setting($setting->id);
			$newValue = ($value == '') ? $getSetting->default : intval($value) . 'px';
			return $newValue;

		}

	}
	
	add_action( 'customize_register', 'wanda_lite_customize_register', 11 );

}

?>