<?php 

	get_header();
	get_template_part('core/templates/breadcrumb'); 
	get_sidebar('top');
	get_sidebar('header');
	
?>

<div id="content" class="container content">
	
    <div class="row">
       
        <div class="<?php echo sheeba_lite_template('span') . " " . sheeba_lite_template('sidebar'); ?>">
        	
            <div class="row">
        
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                    <?php 
					
						while ( have_posts() ) : the_post();
						
							do_action('sheeba_lite_postformat');
							
							wp_link_pages(
								array(
									'before' => '<div class="sheeba-pagination">',
									'after' => '</div>',
									'link_before' => '<span>',
									'link_after' => '</span>'
								)
							);
						
						endwhile;
						
					?>
            
                </div>
        
			</div>
        
        </div>

		<?php get_sidebar(); ?>	

    </div>
    
</div>

<?php 

	if ( comments_open() || get_comments_number() ) :
	
		echo "<div class='comments-container'>";
			comments_template();
		echo "</div>";
		
	endif;
	
?>

<div class="clear"></div>

<?php get_footer(); ?>