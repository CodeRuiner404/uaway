<?php
/**
 * Template part for displaying front page imtroduction.
 *
 * @package Moral
 */


// Get the content type.
$blog = get_theme_mod( 'smooth_blog_blog', 'disable' );
$blog_count = get_theme_mod( 'smooth_blog_blog_num', 3 );

// Bail if the section is disabled.
if ( 'disable' === $blog ) {
    return;
}

$content_detail = smooth_blog_get_section_content( 'blog', $blog, $blog_count );

?>
<div id="inner-content-wrapper" class="page-section no-padding-top same-background inner-content-wrapper" >

    <div class="wrapper">
        <div class="section-header">
            <p class="section-subtitle"><?php echo esc_html( get_theme_mod( 'smooth_blog_blog_title', __( 'Popular This Week', 'smooth-blog' ) ) ) ?></p>
        </div><!-- . section-header -->

        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <div class="archive-blog-wrapper clear">
                    
                    <?php foreach ($content_detail as $content): ?>
                        <article class="has-post-thumbnail">
                            <div class="featured-image" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( $content['id'] ) ); ?>');">
                                <a href="<?php echo esc_url($content['url']) ; ?>" class="post-thumbnail-link"></a>
                            </div><!-- .featured-image -->

                            <div class="entry-container">
                                <?php the_category( '', '', $content['id'] ) ; ?>

                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url($content['url']) ; ?>"><?php echo esc_html($content['title']) ; ?></a></h2>
                                </header>

                                <div class="entry-content">
                                    <?php echo wp_kses_post($content['content']) ; ?>
                                </div><!-- .entry-content -->

                                <div class="entry-meta">
                                    <?php smooth_blog_posted_on( $content['id'] ) ; ?>
                                </div><!-- .entry-meta -->
                            </div><!-- .entry-container -->
                        </article>
                    <?php endforeach ?>
                    
                </div><!-- .archive-blog-wrapper -->
            </main><!-- #main -->
        </div><!-- #primary -->

        <?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
            <aside id="secondary" class="widget-area" role="complementary">
                <?php
                    dynamic_sidebar( 'blog-sidebar' );
                ?>
            </aside><!-- #secondary -->
        <?php } ?>
    </div><!-- .wrapper -->
</div><!-- #inner-content-wrapper-->