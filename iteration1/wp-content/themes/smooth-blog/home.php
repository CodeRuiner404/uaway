<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Moral
 */

get_header(); ?>

	<div id="page-site-header" class="relative" style="background-image: url('<?php echo esc_url( get_header_image() ); ?>');">
			<?php if (has_header_image()): ?>
				<div class="overlay"></div>
			<?php endif ?>
            <div class="wrapper">
				<header class="page-header">
					<h2 class="page-title">
						<?php 
						if ( smooth_blog_is_latest_posts() ) {
							echo esc_html( get_theme_mod( 'smooth_blog_your_latest_posts_title', esc_html__( 'Blogs', 'smooth-blog' ) ) ); 
						} elseif( smooth_blog_is_frontpage_blog() ) {
							single_post_title();
						} 
						?>
					</h2>
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
		        	<?php
	        		$page_id = get_option( 'page_for_posts' );
	        		
	        	    $smooth_blog_page_sidebar_meta = get_theme_mod('smooth_blog_archive_sidebar');
	        		if ( ! empty( $smooth_blog_page_sidebar_meta ) && ( 'no' === $smooth_blog_page_sidebar_meta ) ) {
	        			$col = 'col-3';
	        		} 
		        	?>
                    
                    <div class="archive-blog-wrapper list-layout clear <?php echo $col ?>">
						<?php
						if ( have_posts() ) :

							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', get_post_format() );

							endwhile;

							wp_reset_postdata();

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif; ?>
					</div><!-- .blog-posts-wrapper -->
					<?php smooth_blog_posts_pagination();?>
				</main><!-- #main -->
			</div><!-- #primary -->

			<?php get_sidebar();?>
	</div>
<?php get_footer();
