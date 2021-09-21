<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
   
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php

if ( function_exists('wp_body_open') ) {
	wp_body_open();
}

?>

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'sheeba-lite' ); ?></a>

<?php do_action( 'sheeba_lite_mobile_menu' ); ?>
        
<div id="overlay-body"></div>

<div id="wrapper">

	<header id="header-wrapper" >

        <div id="logo-wrapper">
    
            <div class="container">
                                
                <div class="row">
                                            
                    <div class="col-md-12">
                                                
                        <div id="logo">
                        
                            <?php
                                
                                if ( get_theme_mod( 'custom_logo' ) ) {
                                        
                                    the_custom_logo();
                                        
                                } else {
                                    
                                    echo '<a class="text-logo" href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name')) . '">';
                                            
                                        echo esc_html(get_bloginfo('name'));
                                        echo '<span class="blog-description">'. esc_html(get_bloginfo('description')) . '</span>';
                                        
                                    echo '</a>';
                                        
                                }
                            
                            ?>
                    
                        </div>
                                            
                    </div>
                                        
                </div>
                                    
            </div>
        
        </div>
        
        <div id="menu-wrapper">
    
            <div class="container">
                                
                <div class="row">
                                            
                    <div class="col-md-12">
                    
                        <div class="mobile-navigation"><i class="fa fa-bars"></i></div>

                        <button class="menu-toggle" aria-controls="mainmenu" aria-expanded="false" type="button">
                            <span aria-hidden="true"><?php esc_html_e( 'Menu', 'sheeba-lite' ); ?></span>
                            <span class="dashicons" aria-hidden="true"></span>
                        </button>

                        <nav id="mainmenu" class="header-menu" >
                        
                            <?php 
                                                
                                wp_nav_menu( array(
                                    'theme_location' => 'main-menu',
                                    'container' => 'false'
                                )); 
                                                
                            ?>
                                                
                        </nav> 

                        <?php if ( sheeba_lite_setting('sheeba_lite_enable_header_search_button', true ) == true ) : ?>

                            <div class="header-search"> 
                                <a class="open-search-form" href="#search-form"><i class="fa fa-search" aria-hidden="true"></i></a>
                                <div class="search-form"><?php get_search_form();?></div>
                            </div>

						<?php 
                            
							endif;
							
                            if ( 
                                sheeba_lite_is_woocommerce_active() && 
                                sheeba_lite_setting('sheeba_lite_enable_woocommerce_header_cart') == true                            
                            ) :
                                
                                echo sheeba_lite_header_cart();
                            
                            endif;
                            
						?>

                    </div>
                                            
                </div>
                                        
			</div>
                                    
		</div>
        
	</header>