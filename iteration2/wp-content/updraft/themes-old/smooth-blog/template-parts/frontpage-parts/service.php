<?php
/**
 * Template part for displaying front page imtroduction.
 *
 * @package Moral
 */

// Get the content type.
$service = get_theme_mod( 'smooth_blog_service', 'disable' );
$service_num    = $service_num = get_theme_mod( 'smooth_blog_service_num', 4 ); ;
// Bail if the section is disabled.
if ( 'disable' === $service ) {
    return;
}

$content_details = smooth_blog_get_section_content( 'service', $service, $service_num );



?>
<div id="our-services" class="relative page-section our-services" >

    <div class="wrapper">
        <div class="section-header">
            <?php if ( !empty( get_theme_mod( 'smooth_blog_service_sub_title', __('Our Services', 'smooth-blog' ) ) ) ): ?>
                <p class="section-subtitle">
                    <?php echo esc_html( get_theme_mod( 'smooth_blog_service_sub_title', __('Our Services', 'smooth-blog' ) ) ) ; ?>
                </p>
            <?php endif ?>
            
            <?php if ( !empty( get_theme_mod( 'smooth_blog_service_sub_title', __('Our Services', 'smooth-blog' ) ) ) ): ?>
                    <h2 class="section-title">
                    <?php echo esc_html( get_theme_mod( 'smooth_blog_service_title', __('We Are Here To Help You Grow', 'smooth-blog' ) ) ) ; ?>
                </h2>
            <?php endif ?>
            
        </div><!-- .section-header -->

        <!-- supports col-1, col-2,col-3, col-4 -->
        <div class="col-4 clear">
            <?php $i = 1; foreach ($content_details as $content): ?>
                <article>
                    <div class="service-item-wrapper">
                        <div class="service-icon">
                            <a href="<?php echo esc_url( $content['url'] ) ; ?>">
                                <i class="fa <?php echo esc_attr( get_theme_mod( 'smooth_blog_service_icons_'.$i, 'user' ) )  ?> fa-4x"></i>
                            </a>
                        </div><!-- .service-icon -->

                        <header class="entry-header">
                            <h2 class="entry-title">
                                <a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a>
                            </h2>
                        </header>

                        <div class="entry-content">
                            <?php echo wp_kses_post( $content['content'] ) ; ?>
                        </div><!-- .entry-content -->

                        <?php if ( !empty(get_theme_mod( 'smooth_blog_service_btn_label', __( 'Read More', 'smooth-blog' ) ) ) ): ?>
                            <div class="read-more">
                                <a href="<?php echo esc_url( $content['url'] ) ; ?>" class="btn" tabindex="0">
                                    <?php echo esc_html( get_theme_mod( 'smooth_blog_service_btn_label', 'Read More' ) ); ?>
                                </a>
                            </div>
                        <?php endif ?>
                        
                    </div><!-- .service-item-wrapper -->
                </article>

            <?php $i++; endforeach ?>
            

        </div><!-- .col-3 -->
    </div><!-- .wrapper -->
</div><!-- #our-services -->

                   