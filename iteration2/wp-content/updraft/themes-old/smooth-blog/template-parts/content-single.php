<?php
/**
 * Template part for displaying content  in post.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Moral
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'hentry' ); ?>>
	<?php
	if ( has_post_thumbnail() ) : ?>
		<div class="featured-image">
	        <?php the_post_thumbnail( 'full', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
		</div><!-- .featured-post-image -->
	<?php endif; ?>

	<div class="entry-container">
		<div class="entry-meta">
			<?php the_category('', ''); smooth_blog_posted_on(); ?>
		</div><!-- .entry-meta -->
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' );?>
		</header>
	    <div class="entry-content">
	        <?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'smooth-blog' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'smooth-blog' ),
				'after'  => '</div>',
			) );
			?>
	    </div><!-- .entry-content -->

		<?php 
		smooth_blog_post_author();  
		smooth_blog_tags(); 
		?>

	</div><!-- .entry-container -->

</article><!-- #post-<?php the_ID(); ?> -->