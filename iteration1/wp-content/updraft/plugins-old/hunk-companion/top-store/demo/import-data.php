<?php 
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );

function top_store_import_files(){
  return apply_filters(
    'top_store_demo_site', array(
    array(
        'import_file_name' => esc_html__('Top Store Default','top-store'),
        'import_file_url'=> esc_url('https://themehunk.com/wp-content/uploads/sites-demo/top-store/default/blogs.xml'),
        'import_customizer_file_url'=> esc_url('https://themehunk.com/wp-content/uploads/sites-demo/top-store/default/customizer.dat'),
        'import_widget_file_url'=> esc_url('https://themehunk.com/wp-content/uploads/sites-demo/top-store/default/widgets.wie'),
        'import_preview_image_url'=> esc_url('https://themehunk.com/wp-content/uploads/sites-demo/top-store/default/thumb.png'),
        'preview_url'=> esc_url('https://wpthemes.themehunk.com/topstore/'),
        'import_notice' => __( 'Before importing the demo data, Install & Activate the recommended plugins.', 'top-store' ),
    ),
    array(
        'import_file_name' => esc_html__('Top Store Dark','top-store'),
        'import_file_url'=> esc_url('https://themehunk.com/wp-content/uploads/sites-demo/top-store/dark/blogs.xml'),
        'import_customizer_file_url'=> esc_url('https://themehunk.com/wp-content/uploads/sites-demo/top-store/dark/customizer.dat'),
        'import_widget_file_url'=> esc_url('https://themehunk.com/wp-content/uploads/sites-demo/top-store/dark/widgets.wie'),
        'import_preview_image_url'=> esc_url('https://themehunk.com/wp-content/uploads/sites-demo/top-store/dark/thumb.png'),
        'preview_url'=> esc_url('https://wpthemes.themehunk.com/topstore-darkscheme/'),
        'import_notice' => __( 'Before importing the demo data, Install & Activate the recommended plugins.', 'top-store' ),
    ),
    array(
        'import_file_name' => esc_html__('Top Store Grocery','top-store'),
        'import_file_url'=> esc_url('https://themehunk.com/wp-content/uploads/sites-demo/top-store/grocery/blogs.xml'),
        'import_customizer_file_url'=> esc_url('https://themehunk.com/wp-content/uploads/sites-demo/top-store/grocery/customizer.dat'),
        'import_widget_file_url'=> esc_url('https://themehunk.com/wp-content/uploads/sites-demo/top-store/grocery/widgets.wie'),
        'import_preview_image_url'=> esc_url('https://themehunk.com/wp-content/uploads/sites-demo/top-store/grocery/thumb.png'),
        'preview_url'=> esc_url('https://wpthemes.themehunk.com/topstore-grocery/'),
        'import_notice' => __( 'Before importing the demo data, Install & Activate the recommended plugins.', 'top-store' ),
    ),
     
     )
  );
}
add_filter( 'pt-ocdi/import_files', 'top_store_import_files');

/**
 * OCDI after import.
 *
 * @since 1.0.0
 */
function top_store_after_import(){

  // Assign front page and posts page (blog page).
  $front_page_id = null;
  $blog_page_id  = null;

  $front_page = get_page_by_title( 'home' );

  if ( $front_page ) {
    if ( is_array( $front_page ) ){
      $first_page = array_shift( $front_page );
      $front_page_id = $first_page->ID;
    } else {
      $front_page_id = $front_page->ID;
    }
  }

  $blog_page = get_page_by_title( 'blog' );

  if ( $blog_page ) {
    if ( is_array( $blog_page ) ) {
      $first_page = array_shift( $blog_page );
      $blog_page_id = $first_page->ID;
    } else {
      $blog_page_id = $blog_page->ID;
    }
  }

  if ( $front_page_id && $blog_page_id ) {
    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id );
    update_option( 'page_for_posts', $blog_page_id );
  }

  // Assign navigation menu locations.
  $menu_location_details = array(
    'top-store-above-menu'    => 'frontpage',
    'top-store-main-menu'     => 'frontpage',
    'top-store-footer-menu'   => 'footer',
    );

  if ( ! empty( $menu_location_details ) ){
    $navigation_settings = array();
    $current_navigation_menus = wp_get_nav_menus();
    if ( ! empty( $current_navigation_menus ) && ! is_wp_error( $current_navigation_menus ) ) {
      foreach ( $current_navigation_menus as $menu ) {
        foreach ( $menu_location_details as $location => $menu_slug ) {
          if ( $menu->slug === $menu_slug ) {
            $navigation_settings[ $location ] = $menu->term_id;
          }
        }
      }
    }
    set_theme_mod( 'nav_menu_locations', $navigation_settings );
  }
}

add_action( 'pt-ocdi/after_import', 'top_store_after_import' );