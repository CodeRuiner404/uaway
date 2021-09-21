<?php
/**
 * Template part for displaying front page imtroduction.
 *
 * @package Moral
 */

// Get the content type.
$featured       = get_theme_mod( 'smooth_blog_featured', 'disable' );
$featured_num	= get_theme_mod( 'smooth_blog_featured_num', 4 ) ;

// Bail if the section is disabled.
if ( 'disable' === $featured ) {
	return;
}

$content_details = smooth_blog_get_section_content( 'featured', $featured, $featured_num );

?>
<div id="featured-posts" class="page-section same-background featured-posts" >

    <div class="wrapper">
        <?php if ( !empty( get_theme_mod( 'smooth_blog_featured_title', __( 'featured Posts', 'smooth-blog' ) ) ) ): ?>
            <div class="section-header">
                <p class="section-subtitle"><?php echo esc_html( get_theme_mod( 'smooth_blog_featured_title', __( 'Featured Posts', 'smooth-blog' ) ) ) ; ?></p>
            </div>
        <?php endif ?>
        
        <div class="featured-post-wrapper col-4 clear"> 
            <?php foreach ($content_details as $content): ?>
                <article class="has-post-thumbnail">
                    <div class="featured-image" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( $content['id'] ) ); ?>');">
                        <a href="<?php echo esc_url($content['url']); ?>" class="post-thumbnail-link"></a>
                    </div><!-- .featured-image -->

                    <div class="entry-container">

                        <header class="entry-header">
                            <h2 class="entry-title">
                                <a href="<?php echo esc_url( $content['url'] ) ; ?>"><?php echo esc_html( $content['title'] ) ; ?></a>
                            </h2>
                        </header>

                        <div class="entry-meta">
                            <?php smooth_blog_posted_on( $content['id'] ) ; ?>
                        </div><!-- .entry-meta -->
                    </div><!-- .entry-container -->
                </article>
            <?php endforeach ?>
        </div><!-- .col-4 -->

        <?php if ( !empty( get_theme_mod( 'smooth_blog_featured_btn_title', __( 'View All Featured Post', 'smooth-blog' ) ) ) ): ?>
            <div class="read-more">
                <a href="<?php echo esc_url( $content['url'] ) ; ?>" class="btn">
                    <?php echo esc_html( get_theme_mod( 'smooth_blog_featured_btn_title', __( 'View All Featured Post', 'smooth-blog' ) ) ) ; ?>
                </a>
            </div><!-- .read-more -->  
        <?php endif ?>
       

    </div><!-- .wrapper -->
</div><!-- .featured-posts -->

