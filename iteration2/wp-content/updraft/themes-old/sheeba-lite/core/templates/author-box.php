<?php 

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('sheeba_lite_author_box_function')) {
	
	function sheeba_lite_author_box_function() { ?>
	
	<div class="author-box">
                        
		<div class="author-img">
			<?php echo get_avatar(esc_attr(get_the_author_meta('email')), '100' ); ?>
		</div>
                    
		<div class="author-content">
		
        	<h5>
            
				<?php 
					esc_html_e('Written by ','sheeba-lite'); 
					echo get_the_author_posts_link();
				?>
			
            </h5>
		
        	<p><?php echo esc_html(the_author_meta('description')); ?></p>
		
        </div>
        
		<div class="clear"></div>
        
	</div>

	
<?php
	
	} 

	add_action( 'sheeba_lite_author_box', 'sheeba_lite_author_box_function');

}

?>