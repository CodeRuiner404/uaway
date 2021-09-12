<?php 

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('sheeba_lite_before_content_function')) {

	function sheeba_lite_before_content_function( $type ) {

		echo '<div class="post-info">'; 

			if ( 
				$type == 'post' && 
				( sheeba_lite_setting('sheeba_lite_enable_post_author', true) || sheeba_lite_setting('sheeba_lite_enable_post_date', true))
			) :
	
				echo '<span class="entry-date">'; 

					if ( sheeba_lite_setting('sheeba_lite_enable_post_author', true) == true ) :
					
						echo '<span class="entry-author">'; 
							esc_html_e('Written by ','sheeba-lite');
							echo get_the_author_posts_link();
						echo '</span>';
					
					endif;
		
					if ( sheeba_lite_setting('sheeba_lite_enable_post_date', true) == true ) :
					
						echo '<span class="entry-post-date">'; 
							esc_html_e(' on ','sheeba-lite');
							echo esc_html(get_the_date());
						echo '</span>';
					
					endif;

				echo '</span>';
	
			endif;
			
			if ( !sheeba_lite_is_single() ) {
	
				do_action('sheeba_lite_get_title', 'blog' ); 
	
			} else {
	
				if ( !sheeba_lite_is_woocommerce_active('is_cart') ) :
		
					if ( sheeba_lite_is_single() && !is_page_template() ) :
								 
						do_action('sheeba_lite_get_title', 'single');
								
					else :
						
						do_action('sheeba_lite_get_title', 'blog'); 
								 
					endif;
		
				endif;
	
			}
	
			if ( $type == 'post' && sheeba_lite_setting('sheeba_lite_enable_post_category', true) == true ) :
				
				echo '<span class="entry-category entry-post-category">'; 
				the_category(' . '); 
				echo '</span>';
			
			endif;

		echo '</div>'; 

	} 
	
	add_action( 'sheeba_lite_before_content', 'sheeba_lite_before_content_function' );

}

?>