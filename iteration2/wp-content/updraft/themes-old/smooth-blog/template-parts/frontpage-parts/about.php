<?php
/**
 * Template part for displaying front page imtroduction.
 *
 * @package Moral
 */

// Get the content type.
$about = get_theme_mod( 'smooth_blog_about', 'disable' );

// Bail if the section is disabled.
if ( 'disable' === $about ) {
	return;
}
$content_details = smooth_blog_get_section_content( 'about', $about, 1 );

?>
<div id="about-us" class="page-section about-us" >

    <div class="wrapper">
        <?php foreach ( $content_details as $content ): ?>

            <article class="has-post-thumbnail">
                <div class="featured-image" style="background-image: url(<?php echo esc_url( get_the_post_thumbnail_url( $content['id'], 'post-thumbnail' ) ) ; ?>);">
                    <a href="<?php echo esc_url( $content['url'] ) ; ?>" class="post-thumbnail-link"></a>
                </div><!-- .featured-image -->

                <div class="entry-container">
                    <div class="section-header">
                        <?php if ( !empty( get_theme_mod( 'smooth_blog_about_title', __( 'About Author', 'smooth-blog' ) ) ) ): ?>
                            <p class="section-subtitle">
                                <?php echo esc_html( get_theme_mod( 'smooth_blog_about_title', __( 'About Author', 'smooth-blog' ) ) ) ; ?>
                            </p>
                        <?php endif ?>
                        
                        <h2 class="section-title">
                            <?php echo esc_html( $content['title'] ) ; ?>
                        </h2>
                    </div><!-- .section-header -->
                    <div class="entry-content">
                        <?php echo wp_kses_post( $content['content'] ) ; ?>
                    </div><!-- .entry-content -->

                    <?php if ( !empty( get_theme_mod( 'smooth_blog_about_btn_title', __( 'About Us', 'smooth-blog' ) ) ) ): ?>
                        <div class="read-more">
                            <a href="<?php echo esc_url( $content['url'] ) ; ?>" class="btn">
                                <?php echo esc_html( get_theme_mod( 'smooth_blog_about_btn_title', __( 'View Full Stories', 'smooth-blog' ) ) ) ; ?>
                            </a>
                        </div><!-- .read-more -->
                    <?php endif ?>
                    
                </div><!-- .entry-container -->
            </article>

        <?php endforeach ?>
    </div><!-- .wrapper -->

</div><!-- #about -->