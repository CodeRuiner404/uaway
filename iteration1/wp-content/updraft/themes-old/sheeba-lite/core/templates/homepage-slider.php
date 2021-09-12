<?php

/**
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('sheeba_lite_homepage_slider_function')) {

	function sheeba_lite_homepage_slider_function($columns, $stagepadding = true) {
		
		$size = ( sheeba_lite_setting('sheeba_lite_slideshow_columns') == 1 ) ? 'sheeba_lite_slideshow_large' : 'sheeba_lite_slideshow_small';
		$placeholder = ( sheeba_lite_setting('sheeba_lite_slideshow_columns') == 1 ) ? 'placeholder-1010x644.jpg' : 'placeholder-500x319.jpg';
		
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => sheeba_lite_setting('sheeba_lite_slideshow_limit', 5),
		);

		$query = new WP_Query($args); 
		
		if ( $query->have_posts() ) :  
                                
?>

        <div class="owl-carousel-slideshow" data-columns="<?php echo esc_attr($columns);?>" data-stagepadding="<?php echo esc_attr($stagepadding);?>">

            <div class="owl-carousel owl-home-slideshow">

			<?php
        
                while ( $query->have_posts() ) : $query->the_post(); 
        
                    global $post;

			?>
			
                    <div class="owl-article item">
                        
                    	<?php

                    		if ( '' != get_the_post_thumbnail() ) { 
								
                    			the_post_thumbnail($size);
								
                    		} else {
								
                    			echo '<img src="' . esc_url(get_template_directory_uri())."/assets/images/".$placeholder . '" alt="'.esc_attr(get_the_title()).'">';
						
                    		}
                            
                    	?>
							
                    	<a class="entry-button" href="<?php echo esc_url(get_permalink($post->ID)); ?>"></a>

                    	<?php if ( sheeba_lite_setting('sheeba_lite_enable_slideshow_overlay', true) == true ) : ?>
                    	
                    		<div class="owl-overlay">
								
                    			<div class="owl-overlay-wrapper">
								
                    				<div class="owl-overlay-content">
                                
                    					<span class="entry-date">
                    						<?php echo esc_html__('Written by ','sheeba-lite') . get_the_author_posts_link() . esc_html__(' on ','sheeba-lite') . esc_html(get_the_date()); ?>
                    					</span>	
                                            
										<h2 class="title"><?php echo esc_html(get_the_title()); ?></h2>
                    					<span class="entry-category"><?php the_category(' . ');?></span>
								
                    				</div>
								
                    			</div>
								
                    		</div>
                    	
                    	<?php endif; ?>
                            
                    </div>
			
			<?php

				endwhile; 
                wp_reset_postdata();

			?>

            </div>
            
        </div>

<?php

        endif;
	
	}

	add_action( 'sheeba_lite_homepage_slider', 'sheeba_lite_homepage_slider_function', 10, 2);

}

?>