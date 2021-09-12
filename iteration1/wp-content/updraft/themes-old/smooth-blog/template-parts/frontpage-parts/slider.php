<?php
/**
 * Template part for displaying front page imtroduction.
 *
 * @package Moral
 */

// Get the content type.
$slider = get_theme_mod( 'smooth_blog_slider', 'disable' );
$slider_num	= get_theme_mod( 'smooth_blog_slider_num', 3 ) ;
// Bail if the section is disabled.
if ( 'disable' === $slider ) {
	return;
}

$content_details = smooth_blog_get_section_content( 'slider', $slider, $slider_num );

?>

<div id="featured-slider" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1500, "dots": false, "arrows":true, "autoplay": false, "draggable": true, "fade": false }'>

    <?php foreach ( $content_details as $content ): ?>
        <article style="background-image:url('<?php echo esc_url( get_the_post_thumbnail_url( $content['id'], 'full' ) ) ; ?>');">
            <div class="overlay"></div>
            <div class="wrapper">
                <div class="featured-content-wrapper">
                    <header class="entry-header">
                        <span>
                            <?php echo esc_html( get_theme_mod('smooth_blog_slider_title') ) ; ?>
                        </span>
                        <h2 class="entry-title">
                            <a href="<?php echo esc_url( $content['url'] ) ; ?>"><?php echo esc_html( $content['title'] ); ?></a>
                        </h2>
                    </header>

                    <?php if ( !empty( get_theme_mod( 'smooth_blog_slider_btn_title', __( 'Read More', 'smooth-blog' ) ) ) ): ?>

                        <div class="read-more">
                            <a href="<?php echo esc_url( $content['url'] ) ; ?>" class="btn">
                                <?php echo esc_html( get_theme_mod( 'smooth_blog_slider_btn_title', __( 'Read More', 'smooth-blog' ) ) ) ; ?>
                            </a>
                        </div><!-- .read-more -->

                    <?php endif ?>
                </div><!-- .featured-content-wrapper -->
            </div><!-- .wrapper -->
        </article>
    <?php endforeach ?>
</div><!-- #featured-slider -->
