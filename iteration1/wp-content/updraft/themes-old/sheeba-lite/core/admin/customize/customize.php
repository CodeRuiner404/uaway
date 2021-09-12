<?php

/**
 * Array with the list of all options of Sheeba Lite
 */

new sheeba_lite_customize(

	array ( 

		/* Support section */ 

		array(
		
			'title' => esc_html__( 'Upgrade to Sheeba Premium','sheeba-lite'),
			'id' => 'sheeba-lite-customize-info',
			'type' => 'sheeba-lite-customize-info',
			'section' => 'sheeba-lite-customize-info',
			'priority' => '08',

		),

		/* Colors */ 
	
		array(
				
			'label' => esc_html__('Logo text color','sheeba-lite'),
			'description' => esc_html__('Choose your custom color for the logo.','sheeba-lite'),
			'id' => 'sheeba_lite_logo_text_color',
			'type' => 'color',
			'section' => 'colors',
			'std' => '#616161',
		),

		/* WooCommerce > Sheeba Lite settings */ 

		array( 

			'title' => esc_html__( 'Sheeba Lite settings','sheeba-lite'),
			'description' => esc_html__( 'From this section you can manage the settings of WooCommerce.','sheeba-lite'),
			'type' => 'section',
			'id' => 'woocommerce_section',
			'panel' => 'woocommerce',
			'priority' => '21',

		),

		array(
			
			'label' => esc_html__('WooCommerce header cart','sheeba-lite'),
			'description' => esc_html__('Do you want to show the header cart?','sheeba-lite'),
			'id' => 'sheeba_lite_enable_woocommerce_header_cart',
			'type' => 'checkbox',
			'section' => 'woocommerce_section',
			'selector' => '.header-cart',
			'std' => false,
		
		),
	
		array(
				
			'label' => esc_html__('WooCommerce header cart icon','sheeba-lite'),
			'description' => esc_html__('Select the icon for WooCommerce header cart (Please clear the cookies to display the new icon)','sheeba-lite'),
			'id' => 'sheeba_lite_woocommerce_header_icon',
			'type' => 'select',
			'section' => 'woocommerce_section',
			'options' => array (
				'fa-shopping-basket' => esc_html__( 'Icon 1','sheeba-lite'),
				'fa-shopping-cart' => esc_html__( 'Icon 2','sheeba-lite'),
				'fa-cart-plus' => esc_html__( 'Icon 3','sheeba-lite'),
			),
					
			'std' => 'fa-shopping-basket',
				
		),
	
		array(
			
			'label' => esc_html__( 'Cross sell products','sheeba-lite'),
			'description' => esc_html__( 'Do you want to display the cross sell products on cart page?','sheeba-lite'),
			'id' => 'sheeba_lite_enable_woocommerce_cross_sell_cart',
			'type' => 'checkbox',
			'section' => 'woocommerce_section',
			'std' => false,
		
		),

		array(
			
			'label' => esc_html__( 'Related products','sheeba-lite'),
			'description' => esc_html__( 'Do you want to display the related products on product page?','sheeba-lite'),
			'id' => 'sheeba_lite_enable_woocommerce_related_products',
			'type' => 'checkbox',
			'section' => 'woocommerce_section',
			'std' => false,
		
		),

		array(
			
			'label' => esc_html__( 'Up sell products','sheeba-lite'),
			'description' => esc_html__( 'Do you want to display the up sell products on product page?','sheeba-lite'),
			'id' => 'sheeba_lite_enable_woocommerce_upsell_products',
			'type' => 'checkbox',
			'section' => 'woocommerce_section',
			'std' => false,
		
		),
		
		array(
			
			'label' => esc_html__( 'WooCommerce linkable product thumbnails','sheeba-lite'),
			'description' => esc_html__( 'Do you want to make linkable the product thumbnails on WooCommerce category pages?','sheeba-lite'),
			'id' => 'sheeba_lite_enable_woocommerce_linkable_product_thumbnails',
			'type' => 'checkbox',
			'section' => 'woocommerce_section',
			'std' => false,
		
		),

		array(
			
			'label' => esc_html__('WooCommerce Category Layout','sheeba-lite'),
			'description' => esc_html__('Select a layout for the woocommerce categories.','sheeba-lite'),
			'id' => 'sheeba_lite_woocommerce_category_layout',
			'type' => 'select',
			'section' => 'woocommerce_section',
			'options' => array (
			   'full' => esc_html__( 'Full Width','sheeba-lite'),
			   'left-sidebar' => esc_html__( 'Left Sidebar','sheeba-lite'),
			   'right-sidebar' => esc_html__( 'Right Sidebar','sheeba-lite'),
			),
			
			'std' => 'right-sidebar',
		
		),

		/* Main Settings */ 

		array( 
			
			'title' => esc_html__( 'Sheeba Lite Main Settings','sheeba-lite'),
			'description' => esc_html__( 'Sheeba Lite Main Settings','sheeba-lite'),
			'type' => 'panel',
			'id' => 'general_panel',
			'priority' => '10',
			
		),

		/* Main Settings > Color scheme*/ 

		array( 

			'title' => esc_html__( 'Color Scheme','sheeba-lite'),
			'description' => esc_html__( 'From this section you can manage the color scheme of Sheeba Lite.','sheeba-lite'),
			'type' => 'section',
			'panel' => 'general_panel',
			'priority' => '10',
			'id' => 'colorscheme_section',

		),

		array(
			
			'label' => esc_html__( 'Body Color Schemes','sheeba-lite'),
			'description' => esc_html__('Choose your body color scheme.','sheeba-lite'),
			'id' => 'sheeba_lite_skin',
			'type' => 'select',
			'section' => 'colorscheme_section',
			'options' => array (
			   'cyan' => esc_html__( 'Cyan','sheeba-lite'),
			   'orange' => esc_html__( 'Orange','sheeba-lite'),
			   'blue' => esc_html__( 'Blue','sheeba-lite'),
			   'red' => esc_html__( 'Red','sheeba-lite'),
			   'pink' => esc_html__( 'Pink','sheeba-lite'),
			   'purple' => esc_html__( 'Purple','sheeba-lite'),
			   'yellow' => esc_html__( 'Yellow','sheeba-lite'),
			   'green' => esc_html__( 'Green','sheeba-lite'),
			   'black' => esc_html__( 'Black','sheeba-lite'),
			   'clean-yellow' => esc_html__( 'Clean Yellow','sheeba-lite'),
			   'clean-red' => esc_html__( 'Clean Red','sheeba-lite'),
			   'clean-turquoise' => esc_html__( 'Clean Turquoise','sheeba-lite'),
			   'clean-green' => esc_html__( 'Clean Green','sheeba-lite'),
			   'clean-blue' => esc_html__( 'Clean Blue','sheeba-lite'),
			),
			
			'std' => 'orange',
		
		),

		/* Main Settings > Page width */ 

		array( 

			'title' => esc_html__( 'Page width','sheeba-lite'),
			'description' => esc_html__( 'From this section you can manage the page width of Sheeba Lite.','sheeba-lite'),
			'type' => 'section',
			'id' => 'pagewidth_section',
			'panel' => 'general_panel',
			'priority' => '11',

		),

		array( 

			'label' => esc_html__( 'Screen greater than 768px','sheeba-lite'),
			'description' => esc_html__( 'Set a width, for a screen greater than 768 pixel (for example 750 and not 750px ) ','sheeba-lite'),
			'id' => 'sheeba_lite_screen1',
			'type' => 'number',
			'section' => 'pagewidth_section',
			'std' => '750',

		),

		array( 

			'label' => esc_html__( 'Screen greater than 992px','sheeba-lite'),
			'description' => esc_html__( 'Set a width, for a screen greater than 992 pixel (for example 940 and not 940px ) ','sheeba-lite'),
			'id' => 'sheeba_lite_screen2',
			'type' => 'number',
			'section' => 'pagewidth_section',
			'std' => '970',

		),

		array( 

			'label' => esc_html__( 'Screen greater than 1200px','sheeba-lite'),
			'description' => esc_html__( 'Set a width, in px, for a screen greater than 1200 pixel (for example 1170 and not 1170px ) ','sheeba-lite'),
			'id' => 'sheeba_lite_screen3',
			'type' => 'number',
			'section' => 'pagewidth_section',
			'std' => '1170',

		),

		/* Main Settings > Mobile menu */ 

		array( 

			'title' => esc_html__( 'Mobile menu','sheeba-lite'),
			'description' => esc_html__( 'From this section you can manage the settings of the mobile menu.','sheeba-lite'),
			'type' => 'section',
			'id' => 'mobile_menu_section',
			'panel' => 'general_panel',
			'priority' => '12',

		),
		
		array(
			
			'label' => esc_html__('Sub items','sheeba-lite'),
			'description' => esc_html__('How to open the sub items?','sheeba-lite'),
			'id' => 'sheeba_lite_mobile_menu',
			'type' => 'select',
			'section' => 'mobile_menu_section',
			'options' => array (
			   'mobile-menu-1' => esc_html__( 'Clicking on the down arrow','sheeba-lite'),
			   'mobile-menu-2' => esc_html__( 'Clicking on the whole link','sheeba-lite'),
			),
			'std' => 'mobile-menu-1',
		
		),

		/*Main Settings > General settings */ 
		
		array( 

			'title' => esc_html__( 'General settings','sheeba-lite'),
			'description' => esc_html__( 'From this section you can manage the general settings of Sheeba Lite.','sheeba-lite'),
			'type' => 'section',
			'id' => 'settings_section',
			'panel' => 'general_panel',
			'priority' => '13',

		),

		array(
			
			'label' => esc_html__( 'Orizzontal padding','sheeba-lite'),
			'description' => esc_html__( 'Do you want to remove the orizzontal padding on single content?','sheeba-lite'),
			'id' => 'sheeba_lite_enable_no_padding_option',
			'type' => 'checkbox',
			'section' => 'settings_section',
			'std' => false,
		
		),
		
		array(
			
			'label' => esc_html__( 'Enable the full-width layout','sheeba-lite'),
			'description' => esc_html__( 'Do you want to enable the full-width layout?','sheeba-lite'),
			'id' => 'sheeba_lite_enable_fullwidth_layout',
			'type' => 'checkbox',
			'section' => 'settings_section',
			'std' => false,
		
		),
		
		array(
			
			'label' => esc_html__( 'Enable the sticky header','sheeba-lite'),
			'description' => esc_html__( 'Do you want to enable the sticky header?','sheeba-lite'),
			'id' => 'sheeba_lite_enable_sticky_header',
			'type' => 'checkbox',
			'section' => 'settings_section',
			'std' => false,
		
		),

		array(
			
			'label' => esc_html__( 'Enable the header search button','sheeba-lite'),
			'description' => esc_html__( 'Do you want to enable the header search button?','sheeba-lite'),
			'id' => 'sheeba_lite_enable_header_search_button',
			'type' => 'checkbox',
			'section' => 'settings_section',
			'selector' => '.header-search',
			'std' => true,
		
		),

		array(
			
			'label' => esc_html__( 'Enable the breadcrumb','sheeba-lite'),
			'description' => esc_html__( 'Do you want to enable the breadcrumb on whole website (except the homepage)?','sheeba-lite'),
			'id' => 'sheeba_lite_enable_breadcrumb',
			'type' => 'checkbox',
			'section' => 'settings_section',
			'selector' => '#breadcrumb_wrapper',
			'std' => false,
		
		),

		array(
			
			'label' => esc_html__( 'Category title','sheeba-lite'),
			'description' => esc_html__( 'Do you want to enable the category title?','sheeba-lite'),
			'id' => 'sheeba_lite_enable_category_title',
			'type' => 'checkbox',
			'section' => 'settings_section',
			'selector' => '.archive_title',
			'std' => true,
		
		),

		array(
			
			'label' => esc_html__( 'Searched item','sheeba-lite'),
			'description' => esc_html__( 'Do you want to enable the searched item?','sheeba-lite'),
			'id' => 'sheeba_lite_enable_searched_item',
			'type' => 'checkbox',
			'section' => 'settings_section',
			'selector' => '.searchpage_title',
			'std' => true,
		
		),

		array(
			
			'label' => esc_html__( 'Back to top button','sheeba-lite'),
			'description' => esc_html__( 'Do you want to enable a button to back on the top of the site?','sheeba-lite'),
			'id' => 'sheeba_lite_enable_backtotop_button',
			'type' => 'checkbox',
			'section' => 'settings_section',
			'selector' => '#back-to-top',
			'std' => true,
		
		),

		/* Main Settings > Layouts */ 

		array( 

			'title' => esc_html__( 'Layouts','sheeba-lite'),
			'description' => esc_html__( 'From this section you can manage the layouts of Sheeba Lite.','sheeba-lite'),
			'type' => 'section',
			'id' => 'layouts_section',
			'panel' => 'general_panel',
			'priority' => '14',

		),
		
		array(
			
			'label' => esc_html__('Home Blog Layout','sheeba-lite'),
			'description' => esc_html__('If you&#39;ve set the latest articles, for the homepage, choose a layout.','sheeba-lite'),
			'id' => 'sheeba_lite_home_layout',
			'type' => 'select',
			'section' => 'layouts_section',
			'options' => array (
			   'full' => esc_html__( 'Full Width','sheeba-lite'),
			   'left-sidebar' => esc_html__( 'Left Sidebar','sheeba-lite'),
			   'right-sidebar' => esc_html__( 'Right Sidebar','sheeba-lite'),
			   'col-md-4' => esc_html__( 'Masonry','sheeba-lite'),
			),
			'selector' => '.homepage_container',
			'std' => 'right-sidebar',
		
		),
	
		array(
			
			'label' => esc_html__('Category Layout','sheeba-lite'),
			'description' => esc_html__('Select a layout for category pages.','sheeba-lite'),
			'id' => 'sheeba_lite_category_layout',
			'type' => 'select',
			'section' => 'layouts_section',
			'options' => array (
			   'full' => esc_html__( 'Full Width','sheeba-lite'),
			   'left-sidebar' => esc_html__( 'Left Sidebar','sheeba-lite'),
			   'right-sidebar' => esc_html__( 'Right Sidebar','sheeba-lite'),
			   'col-md-4' => esc_html__( 'Masonry','sheeba-lite'),
			),
			'selector' => '.archive_container',
			'std' => 'right-sidebar',
		
		),

		array(
			
			'label' => esc_html__('Search Layout','sheeba-lite'),
			'description' => esc_html__('Select a layout for the search section.','sheeba-lite'),
			'id' => 'sheeba_lite_search_layout',
			'type' => 'select',
			'section' => 'layouts_section',
			'options' => array (
			   'full' => esc_html__( 'Full Width','sheeba-lite'),
			   'left-sidebar' => esc_html__( 'Left Sidebar','sheeba-lite'),
			   'right-sidebar' => esc_html__( 'Right Sidebar','sheeba-lite'),
			   'col-md-4' => esc_html__( 'Masonry','sheeba-lite'),
			),
			'selector' => '.searchpage_container',
			'std' => 'right-sidebar',
		
		),

		array(
			
			'label' => esc_html__('Read More Layout','sheeba-lite'),
			'description' => esc_html__('Select a layout for the read more button.','sheeba-lite'),
			'id' => 'sheeba_lite_readmore_layout',
			'type' => 'select',
			'section' => 'layouts_section',
			'options' => array (
				'default' => esc_html__( 'Default Button','sheeba-lite'),
				'nobutton' => esc_html__( 'Replace with => [...]','sheeba-lite'),
			),
			'selector' => '.read-more-wrapper',
			'std' => 'default',
		
		),

		/* Main Settings > Post elements */ 

		array( 

			'title' => esc_html__( 'Post elements','sheeba-lite'),
			'description' => esc_html__( 'From this section you can enable or disable the post elements.','sheeba-lite'),
			'type' => 'section',
			'id' => 'post_elements_section',
			'panel' => 'general_panel',
			'priority' => '15',

		),
		
		array(
			
			'label' => esc_html__( 'Show categories','sheeba-lite'),
			'description' => esc_html__( 'Do you want to enable the post categories?','sheeba-lite'),
			'id' => 'sheeba_lite_enable_post_category',
			'type' => 'checkbox',
			'section' => 'post_elements_section',
			'selector' => '.entry-post-category',
			'std' => true,
		
		),

		array(
			
			'label' => esc_html__( 'Show author','sheeba-lite'),
			'description' => esc_html__( 'Do you want to enable the author name?','sheeba-lite'),
			'id' => 'sheeba_lite_enable_post_author',
			'type' => 'checkbox',
			'section' => 'post_elements_section',
			'selector' => '.entry-author',
			'std' => true,
		
		),

		array(
			
			'label' => esc_html__( 'Show date','sheeba-lite'),
			'description' => esc_html__( 'Do you want to enable the post date?','sheeba-lite'),
			'id' => 'sheeba_lite_enable_post_date',
			'type' => 'checkbox',
			'section' => 'post_elements_section',
			'selector' => '.entry-post-date',
			'std' => true,
		
		),

		array(
			
			'label' => esc_html__( 'Show author section','sheeba-lite'),
			'description' => esc_html__( 'Do you want to enable the author section below the content?','sheeba-lite'),
			'id' => 'sheeba_lite_enable_author_section',
			'type' => 'checkbox',
			'section' => 'post_elements_section',
			'selector' => '.author-box',
			'std' => true,
		
		),

		array(
			
			'label' => esc_html__( 'Show drop cap','sheeba-lite'),
			'description' => esc_html__( 'Do you want to enable the drop cap?','sheeba-lite'),
			'id' => 'sheeba_lite_enable_post_drop_caps',
			'type' => 'checkbox',
			'section' => 'post_elements_section',
			'std' => true,
		
		),

		array(
			
			'label' => esc_html__( 'Post icon','sheeba-lite'),
			'description' => esc_html__( 'Do you want to enable the post format icon?','sheeba-lite'),
			'id' => 'sheeba_lite_enable_post_icon',
			'type' => 'checkbox',
			'section' => 'post_elements_section',
			'selector' => '.post-icon',
			'std' => true,
		
		),

		array(
			
			'label' => esc_html__( 'Post format','sheeba-lite'),
			'description' => esc_html__( 'Do you want to use a different layout for the Aside, Link and Quote posts?','sheeba-lite'),
			'id' => 'sheeba_lite_enable_post_format_layout',
			'type' => 'checkbox',
			'section' => 'post_elements_section',
			'std' => true,
		
		),

		array(
			
			'label' => esc_html__( 'Read more','sheeba-lite'),
			'description' => esc_html__( 'Do you want to enable the read more button?','sheeba-lite'),
			'id' => 'sheeba_lite_enable_readmore_button',
			'type' => 'checkbox',
			'section' => 'post_elements_section',
			'std' => true,
		
		),

		/* Main Settings > Copyright and social links */ 

		array( 

			'title' => esc_html__( 'Copyright and social links','sheeba-lite'),
			'description' => esc_html__( 'From this section you can manage the copyright text and social links','sheeba-lite'),
			'type' => 'section',
			'id' => 'copyright_section',
			'panel' => 'general_panel',
			'priority' => '16',

		),

		array( 

			'label' => esc_html__( 'Copyright Text','sheeba-lite'),
			'description' => esc_html__( 'Insert your copyright text.','sheeba-lite'),
			'id' => 'sheeba_lite_copyright_text',
			'type' => 'textarea',
			'section' => 'copyright_section',
			'selector' => '.copyright p',
			'std' => '',

		),

		array( 

			'label' => esc_html__( 'Facebook Url','sheeba-lite'),
			'description' => esc_html__( 'Insert Facebook Url (leave empty if you want to hide the button)','sheeba-lite'),
			'id' => 'sheeba_lite_facebook_button',
			'type' => 'url',
			'section' => 'copyright_section',
			'std' => '',

		),

		array( 

			'label' => esc_html__( 'Twitter Url','sheeba-lite'),
			'description' => esc_html__( 'Insert Twitter Url (leave empty if you want to hide the button)','sheeba-lite'),
			'id' => 'sheeba_lite_twitter_button',
			'type' => 'url',
			'section' => 'copyright_section',
			'std' => '',

		),

		array( 

			'label' => esc_html__( 'Flickr Url','sheeba-lite'),
			'description' => esc_html__( 'Insert Flickr Url (leave empty if you want to hide the button)','sheeba-lite'),
			'id' => 'sheeba_lite_flickr_button',
			'type' => 'url',
			'section' => 'copyright_section',
			'std' => '',

		),

		array( 

			'label' => esc_html__( 'Linkedin Url','sheeba-lite'),
			'description' => esc_html__( 'Insert Linkedin Url (leave empty if you want to hide the button)','sheeba-lite'),
			'id' => 'sheeba_lite_linkedin_button',
			'type' => 'url',
			'section' => 'copyright_section',
			'std' => '',

		),

		array( 

			'label' => esc_html__( 'Slack Url','sheeba-lite'),
			'description' => esc_html__( 'Insert Slack Url (leave empty if you want to hide the button)','sheeba-lite'),
			'id' => 'sheeba_lite_slack_button',
			'type' => 'url',
			'section' => 'copyright_section',
			'std' => '',

		),

		array( 

			'label' => esc_html__( 'Pinterest Url','sheeba-lite'),
			'description' => esc_html__( 'Insert Pinterest Url (leave empty if you want to hide the button)','sheeba-lite'),
			'id' => 'sheeba_lite_pinterest_button',
			'type' => 'url',
			'section' => 'copyright_section',
			'std' => '',

		),

		array( 

			'label' => esc_html__( 'Tumblr Url','sheeba-lite'),
			'description' => esc_html__( 'Insert Tumblr Url (leave empty if you want to hide the button)','sheeba-lite'),
			'id' => 'sheeba_lite_tumblr_button',
			'type' => 'url',
			'section' => 'copyright_section',
			'std' => '',

		),

		array( 

			'label' => esc_html__( 'Soundcloud Url','sheeba-lite'),
			'description' => esc_html__( 'Insert Soundcloud Url (leave empty if you want to hide the button)','sheeba-lite'),
			'id' => 'sheeba_lite_soundcloud_button',
			'type' => 'url',
			'section' => 'copyright_section',
			'std' => '',

		),

		array( 

			'label' => esc_html__( 'Spotify Url','sheeba-lite'),
			'description' => esc_html__( 'Insert Spotify Url (leave empty if you want to hide the button)','sheeba-lite'),
			'id' => 'sheeba_lite_spotify_button',
			'type' => 'url',
			'section' => 'copyright_section',
			'std' => '',

		),

		array( 

			'label' => esc_html__( 'Youtube Url','sheeba-lite'),
			'description' => esc_html__( 'Insert Youtube Url (leave empty if you want to hide the button)','sheeba-lite'),
			'id' => 'sheeba_lite_youtube_button',
			'type' => 'url',
			'section' => 'copyright_section',
			'std' => '',

		),

		array( 

			'label' => esc_html__( 'Vimeo Url','sheeba-lite'),
			'description' => esc_html__( 'Insert Vimeo Url (leave empty if you want to hide the button)','sheeba-lite'),
			'id' => 'sheeba_lite_vimeo_button',
			'type' => 'url',
			'section' => 'copyright_section',
			'std' => '',

		),

		array( 

			'label' => esc_html__( 'VK Url','sheeba-lite'),
			'description' => esc_html__( 'Insert VK Url (leave empty if you want to hide the button)','sheeba-lite'),
			'id' => 'sheeba_lite_vk_button',
			'type' => 'url',
			'section' => 'copyright_section',
			'std' => '',

		),

		array( 

			'label' => esc_html__( 'Instagram Url','sheeba-lite'),
			'description' => esc_html__( 'Insert Instagram Url (leave empty if you want to hide the button)','sheeba-lite'),
			'id' => 'sheeba_lite_instagram_button',
			'type' => 'url',
			'section' => 'copyright_section',
			'std' => '',

		),

		array( 

			'label' => esc_html__( 'Deviantart Url','sheeba-lite'),
			'description' => esc_html__( 'Insert Deviantart Url (leave empty if you want to hide the button)','sheeba-lite'),
			'id' => 'sheeba_lite_deviantart_button',
			'type' => 'url',
			'section' => 'copyright_section',
			'std' => '',

		),

		array( 

			'label' => esc_html__( 'Github Url','sheeba-lite'),
			'description' => esc_html__( 'Insert Github Url (leave empty if you want to hide the button)','sheeba-lite'),
			'id' => 'sheeba_lite_github_button',
			'type' => 'url',
			'section' => 'copyright_section',
			'std' => '',

		),

		array( 

			'label' => esc_html__( 'Xing Url','sheeba-lite'),
			'description' => esc_html__( 'Insert Xing Url (leave empty if you want to hide the button)','sheeba-lite'),
			'id' => 'sheeba_lite_xing_button',
			'type' => 'url',
			'section' => 'copyright_section',
			'std' => '',

		),
		
		array( 

			'label' => esc_html__( 'Dribbble Url','sheeba-lite'),
			'description' => esc_html__( 'Insert Dribbble Url (leave empty if you want to hide the button)','sheeba-lite'),
			'id' => 'sheeba_lite_dribbble_button',
			'type' => 'url',
			'section' => 'copyright_section',
			'std' => '',

		),
		
		array( 

			'label' => esc_html__( 'Dropbox Url','sheeba-lite'),
			'description' => esc_html__( 'Insert Dropbox Url (leave empty if you want to hide the button)','sheeba-lite'),
			'id' => 'sheeba_lite_dropbox_button',
			'type' => 'url',
			'section' => 'copyright_section',
			'std' => '',

		),
		
		array( 

			'label' => esc_html__( 'Whatsapp Number','sheeba-lite'),
			'description' => esc_html__( 'Insert Whatsapp number (leave empty if you want to hide the button)','sheeba-lite'),
			'id' => 'sheeba_lite_whatsapp_button',
			'type' => 'button',
			'section' => 'copyright_section',
			'std' => '',

		),

		array( 

			'label' => esc_html__( 'Telegram Account','sheeba-lite'),
			'description' => esc_html__( 'Insert Telegram Account (leave empty if you want to hide the button)','sheeba-lite'),
			'id' => 'sheeba_lite_telegram_button',
			'type' => 'button',
			'section' => 'copyright_section',
			'std' => '',

		),

		array( 

			'label' => esc_html__( 'Trello Account','sheeba-lite'),
			'description' => esc_html__( 'Insert Trello Account (leave empty if you want to hide the button)','sheeba-lite'),
			'id' => 'sheeba_lite_trello_button',
			'type' => 'button',
			'section' => 'copyright_section',
			'std' => '',

		),

		array( 

			'label' => esc_html__( 'Twitch Account','sheeba-lite'),
			'description' => esc_html__( 'Insert Twitch Account (leave empty if you want to hide the button)','sheeba-lite'),
			'id' => 'sheeba_lite_twitch_button',
			'type' => 'button',
			'section' => 'copyright_section',
			'std' => '',

		),

		array( 

			'label' => esc_html__( 'Tripadvisor Account','sheeba-lite'),
			'description' => esc_html__( 'Insert Tripadvisor Account (leave empty if you want to hide the button)','sheeba-lite'),
			'id' => 'sheeba_lite_tripadvisor_button',
			'type' => 'button',
			'section' => 'copyright_section',
			'std' => '',

		),

		array( 

			'label' => esc_html__( 'Vine Account','sheeba-lite'),
			'description' => esc_html__( 'Insert Vine Account (leave empty if you want to hide the button)','sheeba-lite'),
			'id' => 'sheeba_lite_vine_button',
			'type' => 'button',
			'section' => 'copyright_section',
			'std' => '',

		),

		array( 

			'label' => esc_html__( 'Skype Url','sheeba-lite'),
			'description' => esc_html__( 'Insert Skype ID (leave empty if you want to hide the button)','sheeba-lite'),
			'id' => 'sheeba_lite_skype_button',
			'type' => 'button',
			'section' => 'copyright_section',
			'std' => '',

		),

		array( 

			'label' => esc_html__( 'Email Address','sheeba-lite'),
			'description' => esc_html__( 'Insert Email Address (leave empty if you want to hide the button)','sheeba-lite'),
			'id' => 'sheeba_lite_email_button',
			'type' => 'button',
			'section' => 'copyright_section',
			'std' => '',

		),

		array(
			
			'label' => esc_html__( 'Feed Rss Button','sheeba-lite'),
			'description' => esc_html__( 'Do you want to display the Feed Rss button?','sheeba-lite'),
			'id' => 'sheeba_lite_rss_button',
			'type' => 'select',
			'section' => 'copyright_section',
			'options' => array (
			   'off' => esc_html__( 'No','sheeba-lite'),
			   'on' => esc_html__( 'Yes','sheeba-lite'),
			),
			
			'std' => 'off',
		
		),

		/* Featured Area */ 

		array( 
			
			'title' => esc_html__( 'Sheeba Lite Featured Area','sheeba-lite'),
			'description' => esc_html__( 'Sheeba Lite Featured Area','sheeba-lite'),
			'type' => 'panel',
			'id' => 'featured_area_panel',
			'priority' => '11',
			
		),

		/* Featured Area > Featured area settings*/ 

		array( 

			'title' => esc_html__( 'Featured Area Settings','sheeba-lite'),
			'description' => esc_html__('Featured Area Settings','sheeba-lite'),
			'type' => 'section',
			'panel' => 'featured_area_panel',
			'priority' => '09',
			'id' => 'featured_area_settings',

		),

		array(
			
			'label' => esc_html__( 'Enable the featured slideshow','sheeba-lite'),
			'description' => esc_html__( 'Do you want to enable the featured slideshow?','sheeba-lite'),
			'id' => 'sheeba_lite_enable_featured_slideshow',
			'type' => 'checkbox',
			'section' => 'featured_area_settings',
			'selector' => '.owl-carousel-slideshow',
			'std' => true,
		
		),

		array(
			
			'label' => esc_html__( 'Enable the featured links section','sheeba-lite'),
			'description' => esc_html__( 'Do you want to display the featured links section?','sheeba-lite'),
			'id' => 'sheeba_lite_enable_featuredlinks_section',
			'type' => 'checkbox',
			'section' => 'featured_area_settings',
			'selector' => '.featured-links-wrapper',
			'std' => false,
		
		),

		/* Featured Area > Slideshow settings */ 

		array( 

			'title' => esc_html__( 'Slideshow settings','sheeba-lite'),
			'description' => esc_html__( 'From this section you can manage the settings of featured area slideshow.','sheeba-lite'),
			'type' => 'section',
			'id' => 'slideshow_section',
			'panel' => 'featured_area_panel',
			'priority' => '10',

		),
		
		array(
			
			'label' => esc_html__( 'Stage padding','sheeba-lite'),
			'description' => esc_html__( 'Do you want to enable the stage padding option to display neighbours items?','sheeba-lite'),
			'id' => 'sheeba_lite_enable_slideshow_stagepadding',
			'type' => 'checkbox',
			'section' => 'slideshow_section',
			'std' => false,
		
		),
		
		array(
			
			'label' => esc_html__( 'Caption Overlay','sheeba-lite'),
			'description' => esc_html__( 'Do you want to display the caption overlay on homepage slideshow?','sheeba-lite'),
			'id' => 'sheeba_lite_enable_slideshow_overlay',
			'type' => 'checkbox',
			'section' => 'slideshow_section',
			'std' => true,
		
		),

		array(
			
			'label' => esc_html__( 'Columns','sheeba-lite'),
			'description' => esc_html__( 'Select the number of columns for the homepage slideshow.','sheeba-lite'),
			'id' => 'sheeba_lite_slideshow_columns',
			'type' => 'select',
			'section' => 'slideshow_section',
			'options' => array (
			   '1' => esc_html__( '1','sheeba-lite'),
			   '2' => esc_html__( '2','sheeba-lite'),
			),
			
			'std' => '2',
		
		),

		array( 

			'label' => esc_html__( 'Limit','sheeba-lite'),
			'description' => esc_html__( 'How many items you want to display? (set -1 to load all items)','sheeba-lite'),
			'id' => 'sheeba_lite_slideshow_limit',
			'type' => 'slideshow_limit',
			'section' => 'slideshow_section',
			'std' => '5',

		),

		/* Featured Area > #Featured Link #1 */ 

		array( 

			'title' => esc_html__( 'Featured Link #1','sheeba-lite'),
			'description' => esc_html__('Featured Link #1','sheeba-lite'),
			'type' => 'section',
			'panel' => 'featured_area_panel',
			'priority' => '11',
			'id' => 'featured_link_1',

		),

		array( 

			'label' => esc_html__( 'Image','sheeba-lite'),
			'description' => esc_html__( 'Upload the image','sheeba-lite'),
			'id' => 'sheeba_lite_featured_link_1_image',
			'type' => 'upload',
			'section' => 'featured_link_1',
			'std' => '',

		),

		array( 

			'label' => esc_html__( 'Title','sheeba-lite'),
			'description' => esc_html__( 'Insert the title of this slide','sheeba-lite'),
			'id' => 'sheeba_lite_featured_link_1_title',
			'type' => 'text',
			'section' => 'featured_link_1',
			'std' => '',

		),

		array( 

			'label' => esc_html__( 'Url','sheeba-lite'),
			'description' => esc_html__( 'Insert the url of this slide','sheeba-lite'),
			'id' => 'sheeba_lite_featured_link_1_url',
			'type' => 'url',
			'section' => 'featured_link_1',
			'std' => '',

		),

		/* Featured Area > #Featured Link #2 */ 

		array( 

			'title' => esc_html__( 'Featured Link #2','sheeba-lite'),
			'description' => esc_html__('Featured Link #2','sheeba-lite'),
			'type' => 'section',
			'panel' => 'featured_area_panel',
			'priority' => '12',
			'id' => 'featured_link_2',

		),

		array( 

			'label' => esc_html__( 'Image','sheeba-lite'),
			'description' => esc_html__( 'Upload the image','sheeba-lite'),
			'id' => 'sheeba_lite_featured_link_2_image',
			'type' => 'upload',
			'section' => 'featured_link_2',
			'std' => '',

		),

		array( 

			'label' => esc_html__( 'Title','sheeba-lite'),
			'description' => esc_html__( 'Insert the title of this slide','sheeba-lite'),
			'id' => 'sheeba_lite_featured_link_2_title',
			'type' => 'text',
			'section' => 'featured_link_2',
			'std' => '',

		),

		array( 

			'label' => esc_html__( 'Url','sheeba-lite'),
			'description' => esc_html__( 'Insert the url of this slide','sheeba-lite'),
			'id' => 'sheeba_lite_featured_link_2_url',
			'type' => 'url',
			'section' => 'featured_link_2',
			'std' => '',

		),

		/* Featured Area > #Featured Link #3 */ 

		array( 

			'title' => esc_html__( 'Featured Link #3','sheeba-lite'),
			'description' => esc_html__('Featured Link #3','sheeba-lite'),
			'type' => 'section',
			'panel' => 'featured_area_panel',
			'priority' => '13',
			'id' => 'featured_link_3',

		),

		array( 

			'label' => esc_html__( 'Image','sheeba-lite'),
			'description' => esc_html__( 'Upload the image','sheeba-lite'),
			'id' => 'sheeba_lite_featured_link_3_image',
			'type' => 'upload',
			'section' => 'featured_link_3',
			'std' => '',

		),

		array( 

			'label' => esc_html__( 'Title','sheeba-lite'),
			'description' => esc_html__( 'Insert the title of this slide','sheeba-lite'),
			'id' => 'sheeba_lite_featured_link_3_title',
			'type' => 'text',
			'section' => 'featured_link_3',
			'std' => '',

		),

		array( 

			'label' => esc_html__( 'Url','sheeba-lite'),
			'description' => esc_html__( 'Insert the url of this slide','sheeba-lite'),
			'id' => 'sheeba_lite_featured_link_3_url',
			'type' => 'url',
			'section' => 'featured_link_3',
			'std' => '',

		),

		/* Typography */ 

		array( 
			
			'title' => esc_html__( 'Sheeba Lite Typography','sheeba-lite'),
			'description' => esc_html__( 'Sheeba Lite Typography','sheeba-lite'),
			'type' => 'panel',
			'id' => 'typography_panel',
			'priority' => '12',
			
		),

		/* Typography > Logo */ 

		array( 

			'title' => esc_html__( 'Logo','sheeba-lite'),
			'description' => esc_html__( 'From this section you can manage the typography of the logo.','sheeba-lite'),
			'type' => 'section',
			'id' => 'logo_section',
			'panel' => 'typography_panel',
			'priority' => '10',

		),

		array( 

			'label' => esc_html__( 'Font size','sheeba-lite'),
			'description' => esc_html__( 'Insert a size, for logo font','sheeba-lite'),
			'id' => 'sheeba_lite_logo_font_size',
			'type' => 'pixel_size',
			'section' => 'logo_section',
			'std' => '70px',

		),
		
		array( 

			'label' => esc_html__( 'Description font size','sheeba-lite'),
			'description' => esc_html__( 'Insert a size, for logo description','sheeba-lite'),
			'id' => 'sheeba_lite_logo_description_font_size',
			'type' => 'pixel_size',
			'section' => 'logo_section',
			'std' => '11px',

		),

		array( 

			'label' => esc_html__( 'Description top margin','sheeba-lite'),
			'description' => esc_html__( 'Add a space between the logo and the description','sheeba-lite'),
			'id' => 'sheeba_lite_logo_description_top_margin',
			'type' => 'pixel_size',
			'section' => 'logo_section',
			'std' => '10px',

		),

		array(
			
			'label' => esc_html__('Weight','sheeba-lite'),
			'description' => esc_html__('Choose a font weight for the logo.','sheeba-lite'),
			'id' => 'sheeba_lite_logo_font_weight',
			'type' => 'select',
			'section' => 'logo_section',
			'options' => array(
				'300' => esc_html__( '300','sheeba-lite'),
				'400' => esc_html__( '400','sheeba-lite'),
				'700' => esc_html__( '700','sheeba-lite'),
				'900' => esc_html__( '900','sheeba-lite'),
			),

			'std' => '700',
		
		),
		
		array(
			
			'label' => esc_html__('Text transform','sheeba-lite'),
			'description' => esc_html__('Do you want to display an uppercase logo?.','sheeba-lite'),
			'id' => 'sheeba_lite_logo_text_transform',
			'type' => 'select',
			'section' => 'logo_section',
			'options' => array(
				'none' => esc_html__( 'None','sheeba-lite'),
				'uppercase' => esc_html__( 'Uppercase','sheeba-lite'),
			),

			'std' => 'uppercase',
		
		),
				
		/* Typography > Menu */ 

		array( 

			'title' => esc_html__( 'Menu','sheeba-lite'),
			'description' => esc_html__( 'From this section you can manage the typography of the menu.','sheeba-lite'),
			'type' => 'section',
			'id' => 'menu_section',
			'panel' => 'typography_panel',
			'priority' => '11',

		),

		array( 

			'label' => esc_html__( 'Font size','sheeba-lite'),
			'description' => esc_html__( 'Insert a size, for menu font (For example, 14px) ','sheeba-lite'),
			'id' => 'sheeba_lite_menu_font_size',
			'type' => 'pixel_size',
			'section' => 'menu_section',
			'std' => '12px',

		),

		array(
			
			'label' => esc_html__('Menu weight','sheeba-lite'),
			'description' => esc_html__('Choose a font weight for the menu.','sheeba-lite'),
			'id' => 'sheeba_lite_menu_font_weight',
			'type' => 'select',
			'section' => 'menu_section',
			'options' => array(
				'300' => esc_html__( '300','sheeba-lite'),
				'400' => esc_html__( '400','sheeba-lite'),
				'700' => esc_html__( '700','sheeba-lite'),
				'900' => esc_html__( '900','sheeba-lite'),
			),

			'std' => '700',
		
		),
		
		array(
			
			'label' => esc_html__('Text transform','sheeba-lite'),
			'description' => esc_html__('Do you want to display an uppercase menu?.','sheeba-lite'),
			'id' => 'sheeba_lite_menu_text_transform',
			'type' => 'select',
			'section' => 'menu_section',
			'options' => array(
				'none' => esc_html__( 'None','sheeba-lite'),
				'uppercase' => esc_html__( 'Uppercase','sheeba-lite'),
			),

			'std' => 'uppercase',
		
		),
		
		/* Typography > Content */ 

		array( 

			'title' => esc_html__( 'Content','sheeba-lite'),
			'description' => esc_html__( 'From this section you can manage the typography of the content.','sheeba-lite'),
			'type' => 'section',
			'id' => 'content_section',
			'panel' => 'typography_panel',
			'priority' => '12',

		),

		array( 

			'label' => esc_html__( 'Font size','sheeba-lite'),
			'description' => esc_html__( 'Insert a size, for content font (For example, 14px) ','sheeba-lite'),
			'id' => 'sheeba_lite_content_font_size',
			'type' => 'pixel_size',
			'section' => 'content_section',
			'std' => '14px',

		),


		/* Typography > Headlines */ 

		array( 

			'title' => esc_html__( 'Headlines','sheeba-lite'),
			'description' => esc_html__( 'From this section you can manage the typography of the headlines.','sheeba-lite'),
			'type' => 'section',
			'id' => 'headlines_section',
			'panel' => 'typography_panel',
			'priority' => '13',

		),

		array( 

			'label' => esc_html__( 'H1 headline','sheeba-lite'),
			'description' => esc_html__( 'Insert a size, for for H1 elements (For example, 24px) ','sheeba-lite'),
			'id' => 'sheeba_lite_h1_font_size',
			'type' => 'pixel_size',
			'section' => 'headlines_section',
			'std' => '24px',

		),

		array( 

			'label' => esc_html__( 'H2 headline','sheeba-lite'),
			'description' => esc_html__( 'Insert a size, for for H2 elements (For example, 22px) ','sheeba-lite'),
			'id' => 'sheeba_lite_h2_font_size',
			'type' => 'pixel_size',
			'section' => 'headlines_section',
			'std' => '22px',

		),

		array( 

			'label' => esc_html__( 'H3 headline','sheeba-lite'),
			'description' => esc_html__( 'Insert a size, for for H3 elements (For example, 20px) ','sheeba-lite'),
			'id' => 'sheeba_lite_h3_font_size',
			'type' => 'pixel_size',
			'section' => 'headlines_section',
			'std' => '20px',

		),

		array( 

			'label' => esc_html__( 'H4 headline','sheeba-lite'),
			'description' => esc_html__( 'Insert a size, for for H4 elements (For example, 18px) ','sheeba-lite'),
			'id' => 'sheeba_lite_h4_font_size',
			'type' => 'pixel_size',
			'section' => 'headlines_section',
			'std' => '18px',

		),

		array( 

			'label' => esc_html__( 'H5 headline','sheeba-lite'),
			'description' => esc_html__( 'Insert a size, for for H5 elements (For example, 16px) ','sheeba-lite'),
			'id' => 'sheeba_lite_h5_font_size',
			'type' => 'pixel_size',
			'section' => 'headlines_section',
			'std' => '16px',

		),

		array( 

			'label' => esc_html__( 'H6 headline','sheeba-lite'),
			'description' => esc_html__( 'Insert a size, for for H6 elements (For example, 14px) ','sheeba-lite'),
			'id' => 'sheeba_lite_h6_font_size',
			'type' => 'pixel_size',
			'section' => 'headlines_section',
			'std' => '14px',

		),
		
		array(
			
			'label' => esc_html__('Titles weight','sheeba-lite'),
			'description' => esc_html__('Choose a font weight for the titles.','sheeba-lite'),
			'id' => 'sheeba_lite_titles_font_weight',
			'type' => 'select',
			'section' => 'headlines_section',
			'options' => array(
				'300' => esc_html__( '300','sheeba-lite'),
				'400' => esc_html__( '400','sheeba-lite'),
				'700' => esc_html__( '700','sheeba-lite'),
				'900' => esc_html__( '900','sheeba-lite'),
			),

			'std' => '700',
		
		),
		
		array(
			
			'label' => esc_html__('Text transform','sheeba-lite'),
			'description' => esc_html__('Do you want to display an uppercase title?.','sheeba-lite'),
			'id' => 'sheeba_lite_titles_text_transform',
			'type' => 'select',
			'section' => 'headlines_section',
			'options' => array(
				'none' => esc_html__( 'None','sheeba-lite'),
				'uppercase' => esc_html__( 'Uppercase','sheeba-lite'),
			),

			'std' => 'none',
		
		),

	)

);

?>