<?php

/**
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('wanda_lite_homepage_slider_function')) {

	function wanda_lite_homepage_slider_function($columns, $stagepadding = true) {

		switch (sheeba_lite_setting('sheeba_lite_slideshow_columns', '1')) {
			
			case '1':
				$size = 'wanda_lite_slideshow_large';
				$placeholder = 'placeholder-1010x500.jpg';
				break;
			case '2':
				$size = 'wanda_lite_slideshow_medium';
				$placeholder = 'placeholder-650x350.jpg';
				break;
			case '3':
				$size = 'wanda_lite_slideshow_small';
				$placeholder = 'placeholder-365x250.jpg';
				break;
		
		}
		
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
								
                    			echo '<img src="' . esc_url(get_stylesheet_directory_uri())."/assets/images/".$placeholder . '" alt="'.esc_attr(get_the_title()).'">';
                    		}
                            
                    	?>
							
                    	<a class="entry-button" href="<?php echo esc_url(get_permalink($post->ID)); ?>"></a>

                    	<?php if ( sheeba_lite_setting('sheeba_lite_enable_slideshow_overlay', true) == true ) : ?>
                    	
                    		<div class="owl-overlay">
								
                    			<div class="owl-overlay-wrapper">
								
                    				<div class="owl-overlay-content">
                                
                    					<span class="entry-date">
                    						<?php echo esc_html__('Written by ','wanda-lite') . wp_kses_post(get_the_author_posts_link()) . esc_html__(' on ','wanda-lite') . esc_html(get_the_date()); ?>
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

	add_action( 'wanda_lite_homepage_slider', 'wanda_lite_homepage_slider_function', 10, 2);

}

?>