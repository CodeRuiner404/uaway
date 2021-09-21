<?php

/**
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if ( 

	sheeba_lite_setting('sheeba_lite_enable_featured_slideshow', true ) == true ||
	sheeba_lite_setting('sheeba_lite_enable_featuredlinks_section' ) == true
	
) :
	
	echo '<div class="featured-area-wrapper">';
		
		echo '<div class="container">';

			if ( sheeba_lite_setting('sheeba_lite_enable_featured_slideshow', true ) == true ) :

				echo '<div class="row">';
			
					echo '<div class="col-md-12">';
			
						do_action(
							'sheeba_lite_homepage_slider',
							esc_attr(sheeba_lite_setting('sheeba_lite_slideshow_columns', 2)),
							esc_attr(sheeba_lite_setting('sheeba_lite_enable_slideshow_stagepadding'))
						);
			
					echo '</div>';
					
				echo '</div>';
				
			endif;

			if ( sheeba_lite_setting('sheeba_lite_enable_featuredlinks_section') == true ) :

				echo '<div class="row featured-links-wrapper">';

					if ( sheeba_lite_setting('sheeba_lite_featured_link_1_image') ) :
							
						$featured_image_1 = esc_attr(sheeba_lite_setting('sheeba_lite_featured_link_1_image'));
						$featured_link_1 = wp_get_attachment_url($featured_image_1);
						$featured_title_1 =  sheeba_lite_setting('sheeba_lite_featured_link_1_title');
				
						echo '<div class="featured-link-item col-md-4">';
				
						if ( sheeba_lite_setting('sheeba_lite_featured_link_1_url') ) :
				
							echo '<a href="' . esc_url(sheeba_lite_setting('sheeba_lite_featured_link_1_url')) . '"></a>';
				
						endif;
				
						echo '<img src="' . esc_url($featured_link_1) . '" alt="' . esc_attr($featured_title_1) . '">';
				
						if ( sheeba_lite_setting('sheeba_lite_featured_link_1_title') ) :
				
							echo '<div class="featured-link-title">';
							echo '<h6>' . esc_html($featured_title_1) . '</h6>';
							echo '</div>';
						
						endif;
				
						echo '</div>';
							
					endif;
					
					if ( sheeba_lite_setting('sheeba_lite_featured_link_2_image') ) :
							
						$featured_image_2 = esc_attr(sheeba_lite_setting('sheeba_lite_featured_link_2_image'));
						$featured_link_2 = wp_get_attachment_url($featured_image_2);
						$featured_title_2 =  sheeba_lite_setting('sheeba_lite_featured_link_2_title');
				
						echo '<div class="featured-link-item col-md-4">';
				
						if ( sheeba_lite_setting('sheeba_lite_featured_link_2_url') ) :
				
							echo '<a href="' . esc_url(sheeba_lite_setting('sheeba_lite_featured_link_2_url')) . '"></a>';
				
						endif;
				
						echo '<img src="' . esc_url($featured_link_2) . '" alt="' . esc_attr($featured_title_2) . '">';
				
						if ( sheeba_lite_setting('sheeba_lite_featured_link_2_title') ) :
				
							echo '<div class="featured-link-title">';
							echo '<h6>' . esc_html($featured_title_2) . '</h6>';
							echo '</div>';
						
						endif;
				
						echo '</div>';
							
					endif;
					
					if ( sheeba_lite_setting('sheeba_lite_featured_link_3_image') ) :
							
						$featured_image_3 = esc_attr(sheeba_lite_setting('sheeba_lite_featured_link_3_image'));
						$featured_link_3 = wp_get_attachment_url($featured_image_3);
						$featured_title_3 =  sheeba_lite_setting('sheeba_lite_featured_link_3_title');
				
						echo '<div class="featured-link-item col-md-4">';
				
						if ( sheeba_lite_setting('sheeba_lite_featured_link_3_url') ) :
				
							echo '<a href="' . esc_url(sheeba_lite_setting('sheeba_lite_featured_link_3_url')) . '"></a>';
				
						endif;
				
						echo '<img src="' . esc_url($featured_link_3) . '" alt="' . esc_attr($featured_title_3) . '">';
				
						if ( sheeba_lite_setting('sheeba_lite_featured_link_3_title') ) :
				
							echo '<div class="featured-link-title">';
							echo '<h6>' . esc_html($featured_title_3) . '</h6>';
							echo '</div>';
						
						endif;
				
						echo '</div>';
							
					endif;

				echo '</div>';

			endif;
			
		echo '</div>';

	echo '</div>';
		
endif;

?>