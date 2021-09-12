<?php 

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('sheeba_lite_page_format_function')) {

	function sheeba_lite_page_format_function() {

		do_action(
			'sheeba_lite_thumbnail',
			'sheeba_lite_blog_thumbnail',
			false
		);
	
	?>
		
        <div class="post-article page-format">
        
            <?php 
            
                do_action('sheeba_lite_before_content'); 
                do_action('sheeba_lite_after_content');
                
            ?>
        
        </div>

	<?php

	}

	add_action( 'sheeba_lite_page_format', 'sheeba_lite_page_format_function' );

}

?>