<div id="content" class="container">

	<div class="row" id="blog">
    
        <div class="<?php echo sheeba_lite_template('span') .' '. sheeba_lite_template('sidebar'); ?>">
        
        	<?php echo do_action('sheeba_lite_archive_title', 'on'); ?>

            <div class="row archive_container"> 
        
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                        <?php do_action('sheeba_lite_postformat'); ?>
                        <div class="clear"></div>
                        
                    </div>
		
				<?php 
                
                    endwhile; 
                    else:  
                
                ?>

                    <div class="post-container col-md-12" >
                
                        <article class="post-article not-found">
                                
                            <h1><?php esc_html_e( 'Not found', 'sheeba-lite' ) ?></h1>
                            <p><?php esc_html_e( 'Sorry, no posts found', 'sheeba-lite' ) ?></p>
                 
                        </article>
                
                    </div>
	
				<?php 
                    
                    endif;
                
                ?> 
        
            </div>
        
        </div>
        
		<?php do_action( 'sheeba_lite_side_sidebar'); ?>
           
    </div>

	<?php do_action( 'sheeba_lite_pagination', 'archive'); ?>

</div>