<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Moral
 */

get_header(); ?>
    <div id="page-site-header" style="background-image: url('<?php echo esc_url( get_header_image() ); ?>');">
        <div class="wrapper">
            <header class="page-header ">
                <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'smooth-blog' ); ?></h1>
            </header>
            <?php  
            $breadcrumb_enable = get_theme_mod( 'smooth_blog_breadcrumb_enable', true );
            if ( $breadcrumb_enable ) : 
                ?>
                <div id="breadcrumb-list" >
                        <?php echo smooth_blog_breadcrumb( array( 'show_on_front'   => false, 'show_browse' => false ) ); ?>
                </div><!-- #breadcrumb-list -->
            <?php endif; ?>
        </div><!-- .wrapper -->
    </div><!-- #page-site-header -->

	<div id="inner-content-wrapper" class="wrapper page-section">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <div class="single-wrapper">

					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'smooth-blog' ); ?></p>

					<?php get_search_form(); ?>
				</div>
			</main><!-- #main -->
		</div><!-- #primary -->
        
    </div><!-- #inner-content-wrapper-->

<?php
get_footer();
