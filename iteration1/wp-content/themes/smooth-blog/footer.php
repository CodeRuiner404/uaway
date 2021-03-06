<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Moral
 */

$default = smooth_blog_get_default_mods();
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<!-- supports col-1, col-2, col-3 and col-4 -->
		<!-- supports unequal-width and equal-width -->
		<?php  
		$count = 0;
		for ( $i=1; $i <=4 ; $i++ ) { 
			if ( is_active_sidebar( 'footer-' . $i ) ) {
				$count++;
			}
		}
		
		if ( 0 !== $count ) : ?>
			<div class="footer-widgets-area page-section col-<?php echo esc_attr( $count );?>">
			    <div class="wrapper">
					<?php 
					for ( $j=1; $j <=4; $j++ ) { 
						if ( is_active_sidebar( 'footer-' . $j ) ) {
			    			echo '<div class="hentry">';
							dynamic_sidebar( 'footer-' . $j ); 
			    			echo '</div>';
						}
					}
					?>
				</div><!-- .wrapper -->
			</div><!-- .footer-widget-area -->

		<?php endif;
		 $smooth_blog_search = array( '[the-year]', '[site-link]' );

        $replace = array( date( 'Y' ), '<a href="'. esc_url( home_url( '/' ) ) .'">' . get_bloginfo( 'name', 'display' ) . '</a>' );

        $copyright = str_replace( $smooth_blog_search, $replace, get_theme_mod( 'smooth_blog_copyright_txt', $default['smooth_blog_copyright_txt'] ) );

			?>
		<?php if ( get_theme_mod( 'smooth_blog_enable_footer_text', true ) ): ?>
			<div class="site-info">
				<!-- supports col-1 and col-2 -->
				<?php 

				?>
				<div class="wrapper">
					    <div class="site-info-wrapper">
						<span>
					        <?php echo wp_kses_post(  $copyright ); 
					        echo sprintf( esc_html__( 'Theme: %1$s By %2$s.', 'smooth-blog' ), 'Smooth Blog', '<a href="http://moralthemes.com/">Moral Themes</a>' ) ;?>
						</span>
					    </div><!-- .footer-copyright -->				    
				</div><!-- .wrapper -->    
				
			</div><!-- .site-info -->
		<?php endif; ?>
			
	</footer><!-- #colophon -->
	<div class="backtotop"><?php echo smooth_blog_get_svg( array( 'icon' => 'up-arrow' ) ); ?></div>
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
