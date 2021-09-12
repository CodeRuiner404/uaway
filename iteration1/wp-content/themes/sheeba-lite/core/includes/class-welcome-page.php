<?php

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if( !class_exists( 'sheeba_lite_welcome' ) ) {

	class sheeba_lite_welcome {

		public function __construct( $fields = array() ) {
	
			$this->theme_fields = $fields;

			add_action ('admin_init' , array( &$this, 'admin_scripts' ) );
			add_action('admin_menu',array( &$this, 'welcome_page_menu'));

		}

		public function admin_scripts() {
	
			global $pagenow;

			$file_dir = get_template_directory_uri() . '/core/admin/assets/';

			if ( $pagenow == 'themes.php' && isset($_GET['page']) && $_GET['page'] == 'sheeba-lite-welcome-page') {
				
				wp_enqueue_style (
					'sheeba-lite-welcome-page-style',
					$file_dir . 'css/welcome-page.css',
					array(), '1.0.0'
				);

				wp_enqueue_script (
					'sheeba-lite-welcome-page-functions',
					$file_dir . 'js/welcome-page.js',
					array('jquery'),
					'1.0.0',
					TRUE
				);

			}

		}

        public function check_installed_plugin($slug, $filename) {
			return file_exists( ABSPATH . 'wp-content/plugins/' . $slug . '/' . $filename . '.php' ) ? true : false;
		}

		private function call_plugin_api( $slug ) {
			
			include_once ABSPATH . 'wp-admin/includes/plugin-install.php';
	
			$call_api = get_transient( 'sheeba_lite_plugin_info_' . $slug );
	
			if ( false === $call_api ) {
				$call_api = plugins_api(
					'plugin_information',
					array(
						'slug'   => $slug,
						'fields' => array(
							'downloaded'        => false,
							'rating'            => false,
							'description'       => false,
							'short_description' => true,
							'donate_link'       => false,
							'tags'              => false,
							'sections'          => true,
							'homepage'          => true,
							'added'             => false,
							'last_updated'      => false,
							'compatibility'     => false,
							'tested'            => false,
							'requires'          => false,
							'downloadlink'      => false,
							'icons'             => true,
							'banners'           => true,
						),
					)
				);
				set_transient( 'sheeba_lite_plugin_info_' . $slug, $call_api, 30 * MINUTE_IN_SECONDS );
			}
	
			return $call_api;
		}

        public function theme_info($id) {
		
			$themedata = wp_get_theme();
			return $themedata->get($id);
				
		}

        public function welcome_page_menu() {
            
			add_theme_page(
				sprintf(esc_html__('About %1$s', 'sheeba-lite'), $this->theme_info('Name')),
				sprintf(esc_html__('About %1$s', 'sheeba-lite'), $this->theme_info('Name')),
				'edit_theme_options', 
				'sheeba-lite-welcome-page', 
				array( &$this, 'welcome_page' )
			);
		
		}
		
        public function welcome_page() {

            $tabs = array(
                'getting_started' => esc_html__('Getting Started', 'sheeba-lite'),
                'recommended_plugins' => esc_html__('Recommended Plugins', 'sheeba-lite'),
                'free_pro' => esc_html__('Free VS Pro', 'sheeba-lite'),
                'changelog' => esc_html__('Changelog', 'sheeba-lite'),
                'support' => esc_html__('Support', 'sheeba-lite'),
            );
			
        ?>
            
            <div class="wrap about-wrap access-wrap">
                <div class="abt-promo-wrap clearfix">
                    <div class="abt-theme-wrap">
                        
                        <h1>
                        	<?php 
								printf(
									esc_html__('Welcome to %1$s - Version %2$s', 'sheeba-lite'),
									$this->theme_info('Name'),
									$this->theme_info('Version')
								);
							?>
                        </h1>

                        <div class="about-text"><?php echo $this->theme_info('Description'); ?></div>
                    
                    </div>
                
                </div>

                <div class="nav-tab-wrapper clearfix">
                    
					<?php 

						$tabHTML = '';

						foreach ($tabs as $id => $label) :

							$target = '';
							$nav_class = 'nav-tab';
							$section = isset($_GET['section']) ? $_GET['section'] : 'getting_started';
							
							if ($id == $section) {
								$nav_class .= ' nav-tab-active';
							}

							switch ($id) {
								
								case 'support':
									$target = 'target="_blank"';
									$url = esc_url('https://wordpress.org/support/theme/'.$this->theme_info('TextDomain'));
								break;

								case 'getting_started':
									$url = esc_url(admin_url('themes.php?page=sheeba-lite-welcome-page'));
								break;

								default:
									$url = esc_url(admin_url('themes.php?page=sheeba-lite-welcome-page&section=' . $id));
								break;

							}

							$tabHTML .= '<a ';
							$tabHTML .= $target;
							$tabHTML .= ' href="' . $url. '"';
							$tabHTML .= ' class="' . esc_attr($nav_class). '"';
							$tabHTML .= '>';
							$tabHTML .= esc_html($label);
							$tabHTML .= '</a>';
					
						endforeach;
						
						echo $tabHTML;
						
					?>
                    
                </div>

                <div class="welcome-section-wrapper">
                    
                    <div class="welcome-section getting_started clearfix">

                    	<?php
						
							$section = isset($_GET['section']) ? $_GET['section'] : 'getting_started';
							
							switch ($section) {
								
								case 'free_pro':
									$this->free_pro();
								break;

								case 'recommended_plugins':
									$this->recommended_plugins();
								break;

								case 'changelog':
									$this->changelog();
								break;

								case 'getting_started':
								default:
									$this->getting_started();
								break;

							}
						
						?>

                    </div>
                    
                </div>
                
            </div>
        
		<?php
		
		}

		public function quick_links() {
			
			return array(
				array (
					'text' => esc_html__('Upload logo', 'sheeba-lite'),
					'link' => add_query_arg( [ 'autofocus[control]' => 'custom_logo' ], admin_url( 'customize.php' ))
				),
				array (
					'text' => esc_html__('Featured area', 'sheeba-lite'),
					'link' => add_query_arg(['autofocus[panel]' => 'featured_area_panel'], admin_url( 'customize.php'))
				),
				array (
					'text' => esc_html__('Color scheme', 'sheeba-lite'),
					'link' => add_query_arg(['autofocus[control]' => 'sheeba_lite_skin'], admin_url( 'customize.php'))
				),
				array (
					'text' => esc_html__('General settings', 'sheeba-lite'),
					'link' => add_query_arg(['autofocus[section]' => 'settings_section'], admin_url( 'customize.php'))
				),
				array (
					'text' => esc_html__('Layouts', 'sheeba-lite'),
					'link' => add_query_arg(['autofocus[section]' => 'layouts_section'], admin_url( 'customize.php'))
				),
				array (
					'text' => esc_html__('Post elements', 'sheeba-lite'),
					'link' => add_query_arg(['autofocus[section]' => 'post_elements_section'], admin_url( 'customize.php'))
				),
				array (
					'text' => esc_html__('Typography', 'sheeba-lite'),
					'link' => add_query_arg(['autofocus[panel]' => 'typography_panel'], admin_url( 'customize.php'))
				),
				array (
					'text' => esc_html__('Copyright and social links', 'sheeba-lite'),
					'link' => add_query_arg(['autofocus[section]' => 'copyright_section'], admin_url( 'customize.php'))
				),
			);
			
		}

        public function getting_started() {
		
		?>
    
			<div class="getting-started-top-wrap clearfix">
                        
				<div class="theme-steps-list">

					<div class="theme-steps">
                                
						<h3><?php echo esc_html__('Step 1 - Ensure Your Page Home Page is set Your latest posts', 'sheeba-lite'); ?></h3>
						<ol>
							<li><?php echo esc_html__('Go to Settings > Reading > General settings > Your homepage displays', 'sheeba-lite'); ?></li>
							<li><?php echo esc_html__('Set "Your homepage displays" to Your latest posts', 'sheeba-lite'); ?></li>
							<li><?php echo esc_html__('Save changes', 'sheeba-lite'); ?></li>
						</ol>
						<a class="button button-primary" target="_blank" href="<?php echo esc_url(admin_url('options-reading.php')); ?>"><?php echo esc_html__('Assign Static Page', 'sheeba-lite'); ?></a>
					</div>
                        
					<div class="theme-steps">
						<h3><?php echo esc_html__('Step 2 - Customizer Options Panel', 'sheeba-lite'); ?></h3>
						<p><?php echo esc_html__('Now go to Customizer Page. Using the WordPress Customizer you can easily set up the home page and customize the theme.', 'sheeba-lite'); ?></p>
						<a class="button button-primary" href="<?php echo esc_url(admin_url('customize.php')); ?>"><?php echo esc_html__('Go to Customizer Panels', 'sheeba-lite'); ?></a>
					</div>

					<div class="theme-steps">
						<h3><?php echo esc_html__('Customizer quick links', 'sheeba-lite'); ?></h3>
						<ul class="quick-links">
                        	<?php 
								foreach ( $this->quick_links() as $quick_link ) {
									echo '<li><a class="button" href="'.$quick_link['link'].'">'.$quick_link['text'].'</a></li>';
								} 
							?>
						</ul>
					</div>

					<div class="theme-steps">
						<h3><?php echo esc_html__('Documentation', 'sheeba-lite'); ?></h3>
						<p><?php echo esc_html__('Need help to use Sheeba Lite? Please check our full documentation.', 'sheeba-lite'); ?></p>
						<a target="_blank" class="button button-primary" href="<?php echo esc_url('https://demo.themeinprogress.com/sheeba/documentation/sheeba-lite-documentation/'); ?>"><?php echo esc_html__('Go to Docs', 'sheeba-lite'); ?></a>
					</div>
                        
				</div>
                            
			</div>

        <?php
		
		}
		
		public function recommended_plugins() {

			$plugins = array(
	
				array(
					'filename'	=> 'init',
					'slug'      => 'internal-linking-of-related-contents',
				),
				array(
					'filename'	=> 'init',
					'slug'      => 'content-snippet-manager',
				),
				array(
					'filename'	=> 'init',
					'slug'      => 'wa-chatbox-manager',
				),
				array(
					'filename'	=> 'init',
					'slug'      => 'custom-thank-you-page',
				),
				array(
					'filename'	=> 'init',
					'slug'      => 'wip-custom-login',
				),
				array(
					'filename'	=> 'init',
					'slug'      => 'wip-woocarousel-lite',
				),
	
			);
			
		?>

			<div class="required-plugin-top-wrap clearfix">
                        
				<div class="required-plugin-list">

				<?php
                    
                    foreach ( $plugins as $plugin ) {
                        
                        $slug = $plugin['slug'];
                        $filename = $plugin['filename'];
        
                        $plugin_info = $this->call_plugin_api( $slug );
                        $plugin_desc = $plugin_info->short_description;
                        $plugin_img  = ( !isset($plugin_info->icons['1x']) ) ? $plugin_info->icons['default'] : $plugin_info->icons['1x'];
                        $plugin_banner  = $plugin_info->banners['low'];

                ?>

					<div class="required-plugin">
                    
                        <div class="required-plugin-head">
                        
							<img class="plugin-banner" src="<?php echo $plugin_banner;?>">
                            
                        </div>
                        
                        <div class="required-plugin-desc">
                            
                            <h3><?php echo $plugin_info->name; ?></h3>
							<?php echo $plugin_info->short_description; ?>
                            
						</div>
                           
                        <div class="required-plugin-footer">

							<span>
								
								<?php 
									echo esc_html__('v', 'sheeba-lite');
									echo $plugin_info->version;
									echo esc_html__(' by ', 'sheeba-lite');
									echo html_entity_decode( wp_strip_all_tags( $plugin_info->author ) );
								?>
                                
							</span>

							<?php if ( $this->check_installed_plugin( $slug, $filename ) ) : ?>
                                    
                            	<button type="button" class="button button-disabled" disabled="disabled">
                            		<?php esc_html_e( 'Installed', 'sheeba-lite' ); ?>
                            	</button>
                                
                            <?php else : ?>
                    
                            	<a class="install-now button-primary" href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin='. $slug ), 'install-plugin_'. $slug ) ); ?>" >
                            		<?php esc_html_e( 'Install Now', 'sheeba-lite' ); ?>
                            	</a>							
                                
                            <?php endif; ?>
                            
						</div>
                           
					</div>

				<?php
				
					}
			
				?>
                
				</div>
                            
			</div>
        
        <?php
		
		}
		
		public function free_pro() {
		
		?>
    
            <table class="card table free-pro" cellspacing="0" cellpadding="0" >
                
                <tbody class="table-body">
                    
                    <tr class="table-head">
                        <th class="large"></th>
                        <th class="indicator"><?php echo esc_html__('Sheeba Lite', 'sheeba-lite'); ?></th>
                        <th class="indicator"><?php echo esc_html__('Sheeba Pro', 'sheeba-lite'); ?></th>
                    </tr>
                    
                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('WooCommerce Support', 'sheeba-lite'); ?></h4>
                            </div>
                        </td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                    </tr>
                    
                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('Responsive Layout', 'sheeba-lite'); ?></h4>
                            </div>
                        </td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                    </tr>
                    
                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('Masonry layout', 'sheeba-lite'); ?></h4>
                            </div>
                        </td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                    </tr>
                    
                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('Logo upload', 'sheeba-lite'); ?></h4>
                            </div>
                        </td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                    </tr>
                    
                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('Social icons', 'sheeba-lite'); ?></h4>
                            </div>
                        </td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                    </tr>
                    
                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('Copyright text', 'sheeba-lite'); ?></h4>
                                <div class="feature-inline-row">
                                    <span class="info-icon dashicon dashicons dashicons-info"></span>
                                    <span class="feature-description">
										<?php echo esc_html__('Remove the copyright text from the Footer.', 'sheeba-lite'); ?>
                                    </span>
                                </div>
                            </div>
                        </td>
                        
                        <td class="indicator"><span class="dashicon dashicons dashicons-no-alt" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                    
                    </tr>
                    
                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('Custom colors', 'sheeba-lite'); ?></h4>
                                <div class="feature-inline-row">
                                    <span class="info-icon dashicon dashicons dashicons-info"></span>
                                    <span class="feature-description">
										<?php echo esc_html__('Choose a color for the links, the backgrounds, the slogan and so on.', 'sheeba-lite'); ?>
                                    </span>
                                </div>
                            </div>
                        </td>
                        
                        <td class="indicator"><span class="dashicon dashicons dashicons-no-alt" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                    
                    </tr>
                    
                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('Portfolio section', 'sheeba-lite'); ?></h4>
                                <div class="feature-inline-row">
                                    <span class="info-icon dashicon dashicons dashicons-info"></span>
                                    <span class="feature-description">
										<?php echo esc_html__('You can add and display your works and give a modern layout, thanks to the masonry layout.', 'sheeba-lite'); ?>
                                    </span>
                                </div>
                            </div>
                        </td>
                        
                        <td class="indicator"><span class="dashicon dashicons dashicons-no-alt" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                    
                    </tr>

                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('Galleries', 'sheeba-lite'); ?></h4>
                                <div class="feature-inline-row">
                                    <span class="info-icon dashicon dashicons dashicons-info"></span>
                                    <span class="feature-description">
										<?php echo esc_html__('For the gallery posts, pages and portfolio items, you can display the native slider or one of available slideshow created with Slider Revolution plugin (not included with Sheeba theme).', 'sheeba-lite'); ?>
                                    </span>
                                </div>
                            </div>
                        </td>
                        
                        <td class="indicator"><span class="dashicon dashicons dashicons-no-alt" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                    
                    </tr>

                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('Unlimited widget areas', 'sheeba-lite'); ?></h4>
                                <div class="feature-inline-row">
                                    <span class="info-icon dashicon dashicons dashicons-info"></span>
                                    <span class="feature-description">
										<?php echo esc_html__('On Sheeba theme you can generate an unique widget area for each post, page, WooCommerce product and portfolio item.', 'sheeba-lite'); ?>
                                    </span>
                                </div>
                            </div>
                        </td>
                        
                        <td class="indicator"><span class="dashicon dashicons dashicons-no-alt" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                    
                    </tr>

                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('Global layout', 'sheeba-lite'); ?></h4>
                                <div class="feature-inline-row">
                                    <span class="info-icon dashicon dashicons dashicons-info"></span>
                                    <span class="feature-description">
										<?php echo esc_html__('Option to select a global layout of all posts, pages, products and custom posts types.
', 'sheeba-lite'); ?>
                                    </span>
                                </div>
                            </div>
                        </td>
                        
                        <td class="indicator"><span class="dashicon dashicons dashicons-no-alt" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                    
                    </tr>

                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('Global widget area', 'sheeba-lite'); ?></h4>
                                <div class="feature-inline-row">
                                    <span class="info-icon dashicon dashicons dashicons-info"></span>
                                    <span class="feature-description">
										<?php echo esc_html__('Option to select a global widget area for all posts, pages, products and custom posts types.', 'sheeba-lite'); ?>
                                    </span>
                                </div>
                            </div>
                        </td>
                        
                        <td class="indicator"><span class="dashicon dashicons dashicons-no-alt" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                    
                    </tr>

                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('Google fonts', 'sheeba-lite'); ?></h4>
                                <div class="feature-inline-row">
                                    <span class="info-icon dashicon dashicons dashicons-info"></span>
                                    <span class="feature-description">
										<?php echo esc_html__('You can choose and use over 600 different fonts, for the logo, the menu and the titles.', 'sheeba-lite'); ?>
                                    </span>
                                </div>
                            </div>
                        </td>
                        
                        <td class="indicator"><span class="dashicon dashicons dashicons-no-alt" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                    
                    </tr>

                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('Automatic data import', 'sheeba-lite'); ?></h4>
                                <div class="feature-inline-row">
                                    <span class="info-icon dashicon dashicons dashicons-info"></span>
                                    <span class="feature-description">
										<?php echo esc_html__('After the activation of Sheeba theme, all settings will be imported automatically from the free version.', 'sheeba-lite'); ?>
                                    </span>
                                </div>
                            </div>
                        </td>
                        
                        <td class="indicator"><span class="dashicon dashicons dashicons-no-alt" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                    
                    </tr>

                    <tr class="feature-row">
                        <td class="large">
                            <div class="feature-wrap">
                                <h4><?php echo esc_html__('1 click upgrades', 'sheeba-lite'); ?></h4>
                                <div class="feature-inline-row">
                                    <span class="info-icon dashicon dashicons dashicons-info"></span>
                                    <span class="feature-description">
										<?php echo esc_html__('Start automatically the theme upgrades with simple one-click.', 'sheeba-lite'); ?>
                                    </span>
                                </div>
                            </div>
                        </td>
                        
                        <td class="indicator"><span class="dashicon dashicons dashicons-no-alt" size="30"></span></td>
                        <td class="indicator"><span class="dashicon dashicons dashicons-yes" size="30"></span></td>
                    
                    </tr>

                    <tr class="upsell-row">
                        
                        <td></td>
                        <td></td>
                        <td><a  target="_blank" href="<?php echo esc_url( 'https://www.themeinprogress.com/sheeba-flexible-and-and-easy-to-use-wordpress-and-woocommerce-theme/?ref=2&campaign=sheeba-welcome-page' );?>" class="button button-primary"><?php echo esc_html__('Get Sheeba Pro Now', 'sheeba-lite'); ?></a></td>
                    </tr>
                    
                </tbody>
                
            </table>

        <?php
		
		}
		
		public function changelog() {
		
		?>
        
            <div class="changelog_container">

            	<div class="changelog_element">
    
                    <span class="theme_version">
                        <strong><?php echo esc_html__('v1.2.7', 'sheeba-lite'); ?></strong>
                        <?php echo esc_html__('Release date : July, 04 - 2021', 'sheeba-lite'); ?>
                        <span class="dashicons dashicons-arrow-down-alt2"></span>
                    </span>
                    
                    <div class="changelog_details" style="display: none; ">
                        <ul>
                            <li><?php echo esc_html__('Added : Changelog tab on welcome page', 'sheeba-lite'); ?></li>
                        </ul>
                    </div>
                    
            	</div>

            	<div class="changelog_element">
    
                    <span class="theme_version">
                        <strong><?php echo esc_html__('v1.2.6', 'sheeba-lite'); ?></strong>
                        <?php echo esc_html__('Release date : June, 21 - 2021', 'sheeba-lite'); ?>
                        <span class="dashicons dashicons-arrow-down-alt2"></span>
                    </span>
                    
                    <div class="changelog_details" style="display: none; ">
                        <ul>
                            <li><?php echo esc_html__('Updated : Italian translation', 'sheeba-lite'); ?></li>
                            <li><?php echo esc_html__('Edit : Code optimized', 'sheeba-lite'); ?></li>
                        </ul>
                    </div>
                    
            	</div>

            	<div class="changelog_element">
    
                    <span class="theme_version">
                        <strong><?php echo esc_html__('v1.2.5', 'sheeba-lite'); ?></strong>
                        <?php echo esc_html__('Release date : May, 21 - 2021', 'sheeba-lite'); ?>
                        <span class="dashicons dashicons-arrow-down-alt2"></span>
                    </span>
                    
                    <div class="changelog_details" style="display: none; ">
                        <ul>
                            <li><?php echo esc_html__('Added : Premium features list on customizer section', 'sheeba-lite'); ?></li>
                            <li><?php echo esc_html__('Added : Demo link on customizer section', 'sheeba-lite'); ?></li>
                            <li><?php echo esc_html__('Fixed : Notices on customizer section', 'sheeba-lite'); ?></li>
                        </ul>
                    </div>
                    
            	</div>

            	<div class="changelog_element">

                    <span class="theme_version">
                        <strong><?php echo esc_html__('v1.2.4', 'sheeba-lite'); ?></strong>
                        <?php echo esc_html__('Release date : May, 09 - 2021', 'sheeba-lite'); ?>
                        <span class="dashicons dashicons-arrow-down-alt2"></span>
                    </span>
                    
                    <div class="changelog_details" style="display: none; ">
                        <ul>
                            <li><?php echo esc_html__('Added : Edit buttons in the WordPress customizer to manage the theme settings', 'sheeba-lite'); ?></li>
                        </ul>
                    </div>
                        
            	</div>

            	<div class="changelog_element">

                    <span class="theme_version">
                        <strong><?php echo esc_html__('v1.2.3', 'sheeba-lite'); ?></strong>
                        <?php echo esc_html__('Release date : May, 06 - 2021', 'sheeba-lite'); ?>
                        <span class="dashicons dashicons-arrow-down-alt2"></span>
                    </span>
                    
                    <div class="changelog_details" style="display: none; ">
                        <ul>
                            <li><?php echo esc_html__('Added : Customizer quick links on welcome page', 'sheeba-lite'); ?></li>
                        </ul>
                    </div>
                        
            	</div>

            	<div class="changelog_element">

                    <span class="theme_version">
                        <strong><?php echo esc_html__('v1.2.2', 'sheeba-lite'); ?></strong>
                        <?php echo esc_html__('Release date : April, 18 - 2021', 'sheeba-lite'); ?>
                        <span class="dashicons dashicons-arrow-down-alt2"></span>
                    </span>
                    
                    <div class="changelog_details" style="display: none; ">
                        <ul>
                            <li><?php echo esc_html__('Improved : Theme details on welcome page', 'sheeba-lite'); ?></li>
                            <li><?php echo esc_html__('Added : Dedicated section for the recommended plugins on admin welcome page', 'sheeba-lite'); ?></li>
                        </ul>
                    </div>
                        
            	</div>

            	<div class="changelog_element">

                    <span class="theme_version">
                        <strong><?php echo esc_html__('v1.2.1', 'sheeba-lite'); ?></strong>
                        <?php echo esc_html__('Release date : March, 31 - 2021', 'sheeba-lite'); ?>
                        <span class="dashicons dashicons-arrow-down-alt2"></span>
                    </span>
                    
                    <div class="changelog_details" style="display: none; ">
                        <ul>
                            <li><?php echo esc_html__('Optimized : Keyboard navigation', 'sheeba-lite'); ?></li>
                        </ul>
                    </div>
                        
            	</div>

            	<div class="changelog_element">

                    <span class="theme_version">
                        <strong><?php echo esc_html__('v1.2.0', 'sheeba-lite'); ?></strong>
                        <?php echo esc_html__('Release date : March, 26 - 2021', 'sheeba-lite'); ?>
                        <span class="dashicons dashicons-arrow-down-alt2"></span>
                    </span>
                    
                    <div class="changelog_details" style="display: none; ">
                        <ul>
                            <li><?php echo esc_html__('Added : Free vs Pro tab on admin welcome page', 'sheeba-lite'); ?></li>
                            <li><?php echo esc_html__('Added : Documentation link on admin welcome page', 'sheeba-lite'); ?></li>
                        </ul>
                    </div>
                        
            	</div>

            	<div class="changelog_element">

                    <span class="theme_version">
                        <strong><?php echo esc_html__('v1.1.9', 'sheeba-lite'); ?></strong>
                        <?php echo esc_html__('Release date : March, 25 - 2021', 'sheeba-lite'); ?>
                        <span class="dashicons dashicons-arrow-down-alt2"></span>
                    </span>
                    
                    <div class="changelog_details" style="display: none; ">
                        <ul>
                            <li><?php echo esc_html__('Added : Welcome page on admin section', 'sheeba-lite'); ?></li>
                            <li><?php echo esc_html__('Tested with WordPress 5.7', 'sheeba-lite'); ?></li>
                        </ul>
                    </div>
                        
            	</div>

            </div>

        <?php
			
		}
		
	}

}

new sheeba_lite_welcome();

?>