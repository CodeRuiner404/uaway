<?php 

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('sheeba_lite_after_content_function')) {

	function sheeba_lite_after_content_function() { 
	
		if ( sheeba_lite_get_archive_title() || is_page_template() || is_search() || is_home() ) {
	
			if ( sheeba_lite_setting('sheeba_lite_enable_readmore_button', true) == true ) {
				
				the_excerpt(); 
			
			} else if (sheeba_lite_setting('sheeba_lite_enable_readmore_button') == false ) {
				
				the_content(); 
			
			}
	
		} else {
		
			the_content();
	
			the_tags( '<footer class="line"><span class="entry-info"><strong>'.esc_html__('Tags: ','sheeba-lite').'</strong> ', ', ', '</span></footer>' );

			if ( sheeba_lite_setting('sheeba_lite_enable_author_section', true) == true && is_singular('post') ) {

				do_action('sheeba_lite_author_box');

			}

			comments_template();
		
		}
	
	} 

	add_action( 'sheeba_lite_after_content', 'sheeba_lite_after_content_function' );

}

?>