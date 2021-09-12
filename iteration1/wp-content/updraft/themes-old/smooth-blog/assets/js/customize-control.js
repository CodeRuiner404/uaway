/**
 * Scripts within the customizer controls window.
 *
 * Contextually shows the color hue control and informs the preview
 * when users open or close the front page sections section.
 */

(function( $, api ) {
    wp.customize.bind('ready', function() {
    	// Show message on change.
        var smooth_blog_settings = ['smooth_blog_slider_num', 'smooth_blog_services_num', 'smooth_blog_projects_num', 'smooth_blog_testimonial_num', 'smooth_blog_blog_section_num', 'smooth_blog_reset_settings', 'smooth_blog_testimonial_num', 'smooth_blog_partner_num'];
        _.each( smooth_blog_settings, function( smooth_blog_setting ) {
            wp.customize( smooth_blog_setting, function( setting ) {
                var smoothBlogNotice = function( value ) {
                    var name = 'needs_refresh';
                    if ( value && smooth_blog_setting == 'smooth_blog_reset_settings' ) {
                        setting.notifications.add( 'needs_refresh', new wp.customize.Notification(
                            name,
                            {
                                type: 'warning',
                                message: localized_data.reset_msg,
                            }
                        ) );
                    } else if( value ){
                        setting.notifications.add( 'reset_name', new wp.customize.Notification(
                            name,
                            {
                                type: 'info',
                                message: localized_data.refresh_msg,
                            }
                        ) );
                    } else {
                        setting.notifications.remove( name );
                    }
                };

                setting.bind( smoothBlogNotice );
            });
        });

        /* === Radio Image Control === */
        api.controlConstructor['radio-color'] = api.Control.extend( {
            ready: function() {
                var control = this;

                $( 'input:radio', control.container ).change(
                    function() {
                        control.setting.set( $( this ).val() );
                    }
                );
            }
        } );

        // Deep linking for counter section to about section.
        jQuery('.smooth-blog-edit').click(function(e) {
            e.preventDefault();
            var jump_to = jQuery(this).attr( 'data-jump' );
            wp.customize.section( jump_to ).focus()
        });

    });
})( jQuery, wp.customize );

