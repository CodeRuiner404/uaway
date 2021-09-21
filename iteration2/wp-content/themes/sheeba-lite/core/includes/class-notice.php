<?php

/**
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if( !class_exists( 'sheeba_lite_admin_notice' ) ) {

	class sheeba_lite_admin_notice {
	
		/**
		 * Constructor
		 */
		 
		public function __construct( $fields = array() ) {

			if ( 
				!get_option( 'sheeba-lite-dismissed-notice') &&
				version_compare( PHP_VERSION, SHEEBA_LITE_MIN_PHP_VERSION, '>=' )
			) {

				add_action( 'admin_notices', array(&$this, 'admin_notice') );
				add_action( 'admin_head', array( $this, 'dismiss' ) );
			
			}

		}

		/**
		 * Dismiss notice.
		 */
		
		public function dismiss() {

			if ( isset( $_GET['sheeba-lite-dismiss'] ) && check_admin_referer( 'sheeba-lite-dismiss-action' ) ) {
		
				update_option( 'sheeba-lite-dismissed-notice', intval($_GET['sheeba-lite-dismiss']) );
				remove_action( 'admin_notices', array(&$this, 'admin_notice') );
				
			} 
		
		}

		/**
		 * Admin notice.
		 */
		 
		public function admin_notice() {
			
		?>
			
            <div class="notice notice-warning is-dismissible">
            
            	<p>
            
            		<strong>

						<?php
                        
                            esc_html_e( 'Upgrade to the premium version of Sheeba, to enable 600+ Google Fonts, unlimited widget areas, portfolio section and much more. ', 'sheeba-lite' ); 
                            
							printf( 
								'<a href="%1$s" class="dismiss-notice">' . esc_html__( 'Dismiss this notice', 'sheeba-lite' ) . '</a>', 
								esc_url( wp_nonce_url( add_query_arg( 'sheeba-lite-dismiss', '1' ), 'sheeba-lite-dismiss-action'))
							);
                            
                        ?>
                    
                    </strong>
                    
            	</p>
                    
            	<p>

            		<a class="button button-primary" target="_blank" href="<?php echo esc_url( 'https://www.themeinprogress.com/sheeba-flexible-and-and-easy-to-use-wordpress-and-woocommerce-theme/?ref=2&campaign=sheeba-lite-notice' ); ?>" ><?php esc_html_e( 'Upgrade to Sheeba Premium', 'sheeba-lite' ); ?></a>
                
            	</p>

            </div>
		
		<?php
		
		}

	}

}

new sheeba_lite_admin_notice();

?>