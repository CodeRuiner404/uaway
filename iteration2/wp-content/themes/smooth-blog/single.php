<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Moral
 */

get_header(); ?>
	<?php $header_image = get_header_image(); ?>
	<div id="page-site-header" class="relative" style="background-image: url('<?php echo esc_url( $header_image ); ?>');">
		<?php if(has_header_image()) echo '<div class="overlay"></div>' ;?>
	    <div class="wrapper">
	        <header class="page-header">
	            <?php
				if ( is_singular() ) :
					the_title( '<h1 class="page-title">', '</h1>' );
				else :
					the_title( '<h2 class="page-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif; ?>
	        </header>
	        <?php  
	        $breadcrumb_enable = get_theme_mod( 'smooth_blog_breadcrumb_enable', true );
	        if ( $breadcrumb_enable ) : 
	            ?>
	            <div id="breadcrumb-list">
					<?php echo smooth_blog_breadcrumb( array( 'show_on_front'   => false, 'show_browse' => false ) ); ?>
	            </div><!-- #breadcrumb-list -->
	        <?php endif; ?>
	    </div><!-- .wrapper -->
	</div><!-- #page-site-header -->
	<div id="inner-content-wrapper" class="wrapper page-section">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
					<?php while ( have_posts() ) : the_post(); ?>
                		<div class="single-wrapper">
							<?php get_template_part( 'template-parts/content', 'single' ); ?>
						</div>
						<?php 
							the_post_navigation( array(
									'prev_text'          => smooth_blog_get_svg( array( 'icon' => 'left' ) ) . '<span>%title</span>',
									'next_text'          => '<span>%title</span>' . smooth_blog_get_svg( array( 'icon' => 'right' ) ),
								) );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
							
					endwhile; // End of the loop.
					?>
			</main><!-- #main -->

			<div id="related-post">
                <div class="section-header">
                    <h2 class="section-title"><?php echo esc_html__( 'You may like this....', 'smooth-blog' ) ?></h2>
                 </div><!-- .seection-header -->
                 <div class="related-slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": false, "arrows":true, "autoplay": false, "draggable": true, "fade": false }'>
                    <?php 
                    	$cat_content_id = array();
                    	$categories = get_the_category();
                    	foreach ( $categories as $category ) {
                    		$cat_content_id[] = $category->term_id;
                    	}
                    	$args = array(
				            'cat' => $cat_content_id,   
				        );
                    	$query = new WP_Query( $args );
					    if ( $query->have_posts() ) {
					        while ( $query->have_posts() ) {
					            $query->the_post();
					    ?>
					    	<article>
                                <div class="featured-image">
                                    <a href="<?php the_permalink(); ?>" tabindex="-1"><img src="<?php the_post_thumbnail_url(); ?>"></a>
                                </div><!-- .featured-image -->
                                <div class="entry-container">
                                    <header class="entry-header">
                                        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" tabindex="-1"><?php the_title(); ?></a></h2>
                                    </header>
                                    <div class="entry-meta">
                                        <?php smooth_blog_posted_on(get_the_id()); ?>
                                    </div><!-- .entry-meta -->
                                </div><!-- .entry-container -->
                            </article>
					    <?php
					        }
					        wp_reset_postdata();
					    }
                    ?>
                    
                </div>
            </div>
	
		</div><!-- #primary -->

		<?php get_sidebar(); ?>

    </div><!-- #inner-content-wrapper-->
<?php
get_footer();
