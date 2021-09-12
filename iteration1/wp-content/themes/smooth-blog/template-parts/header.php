 <header id="masthead" class="site-header" role="banner">  
    <div class="site-branding-container">
        <div class="wrapper">
            <div class="site-branding">
                <?php if ( has_custom_logo() ) : ?>
                    <div class="site-logo">
                        <?php the_custom_logo(); ?>
                    </div><!-- .site-logo -->
                <?php endif; ?>
                <?php if(get_theme_mod('smooth_blog_header_text_display', true)): ?>
                <div id="site-identity">
                    <?php
                    if ( is_front_page() ) : ?>
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php else : ?>
                        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php
                    endif;

                    $description = get_bloginfo( 'description', 'display' );
                    if ( $description || is_customize_preview() ) : ?>
                        <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                    <?php
                    endif; ?>
                </div><!-- .site-identity -->
                <?php endif; ?>
            </div><!-- .site-branding -->
        </div><!-- .Wrapper -->
    </div><!-- .site-branding -->
        
    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
    <?php 
    echo smooth_blog_get_svg( array( 'icon' => 'menu' ) ); 
    echo smooth_blog_get_svg( array( 'icon' => 'close' ) );
    ?>
   
    </button>
    <?php if ( has_nav_menu( 'primary' ) ) : ?>

    <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'smooth-blog' );?>">
            <?php
                wp_nav_menu( array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'menu_class'     => 'menu nav-menu',                    
            ) );
            ?>
    </nav><!-- #site-navigation -->
        
    <?php elseif( current_user_can( 'edit_theme_options' ) ): ?>
        <nav class="main-navigation" id="site-navigation">
            <ul id="primary-menu" class="menu nav-menu">
                <li><a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php echo esc_html__( 'Add a menu', 'smooth-blog' );?></a></li>
            </ul>
        </nav>
    <?php endif; ?> 
</header><!-- #masthead -->


