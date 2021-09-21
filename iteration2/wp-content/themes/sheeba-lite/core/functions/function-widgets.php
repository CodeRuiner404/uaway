<?php

/**
 * Load all widget areas
 */

if (!function_exists('sheeba_lite_loadwidgets')) {

	function sheeba_lite_loadwidgets() {

		register_sidebar(array(
		
			'name' => esc_html__('Side widget area','sheeba-lite'),
			'id'   => 'sheeba-lite-side-widget-area',
			'description'   => esc_html__('This widget area will be shown after the content.', 'sheeba-lite'),
			'before_widget' => '<div id="%1$s" class="post-article  %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'
		
		));
	
		register_sidebar(array(
		
			'name' => esc_html__('Top widget area','sheeba-lite'),
			'id'   => 'sheeba-lite-top-widget-area',
			'description'   => esc_html__('This widget area will be shown at the top of your content (Recommended for Revolution Slider).', 'sheeba-lite'),
			'before_widget' => '<div id="%1$s" class="post-container %2$s"><article class="post-article">',
			'after_widget'  => '</article></div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'
		
		));
	
		register_sidebar(array(

			'name' => esc_html__('Header widget area','sheeba-lite'),
			'id'   => 'sheeba-lite-header-widget-area',
			'description'   => esc_html__('This widget area will be shown before the content.', 'sheeba-lite'),
			'before_widget' => '<div id="%1$s" class="post-container %2$s"><article class="post-article">',
			'after_widget'  => '</article></div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'
		
		));

		register_sidebar(array(

			'name' => esc_html__('Bottom widget area','sheeba-lite'),
			'id'   => 'sheeba-lite-bottom-widget-area',
			'description'   => esc_html__('This widget area will be shown at the bottom of your content', 'sheeba-lite'),
			'before_widget' => '<div id="%1$s" class="post-container %2$s"><article class="post-article">',
			'after_widget'  => '</article></div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'
		
		));
	
		register_sidebar(array(

			'name' => esc_html__('Footer widget area','sheeba-lite'),
			'id'   => 'sheeba-lite-footer-widget-area',
			'description'   => esc_html__('This widget area will be shown after the content.', 'sheeba-lite'),
			'before_widget' => '<div id="%1$s" class="col-md-3 %2$s"><div class="widget-box">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'
		
		));

	}

	add_action( 'widgets_init', 'sheeba_lite_loadwidgets' );

}

?>