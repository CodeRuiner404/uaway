<div id="content" class="container ">

    <?php echo do_action('sheeba_lite_searched_item', 'on'); ?>

    <div class="row searchpage_container">
    
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
                	<p><?php esc_html_e( 'Sorry, no posts matched your criteria', 'sheeba-lite' ) ?> <strong>: <?php echo esc_html($s); ?> </strong></p>
                 
                </article>
    
			</div>
        
		<?php endif; ?>
           
    </div>

	<?php do_action( 'sheeba_lite_pagination', 'archive'); ?>

</div>