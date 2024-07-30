<?php

/*
 * @package Irtech
 * @since 1.0.0
 * */

if ( !defined('ABSPATH') ){
	exit(); // exit if access directly
}


if ( !class_exists('Irtech_Admin_Menu') ){

	class Irtech_Admin_Menu{
		/*
			* $instance
			* @since 1.0.0
			* */
		private static $instance;
		/*
		* construct()
		* @since 1.0.0
		* */
		public function __construct() {
			//add admin menu page
			add_action('admin_menu',array($this,'theme_admin_menu_page'));
			//tab menu
			add_action('admin_notices',array($this,'set_tab_menus'));
			//admin menu activation
			add_action('admin_footer',array($this,'admin_menu_activation'));
		}

		/*
	   * getInstance()
	   * @since 1.0.0
	   * */
		public static function getInstance(){
			if ( null == self::$instance ){
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Theme admin menu page
		 * @since 1.0.0
		 * */
		public function theme_admin_menu_page(){
			//check user capability
			if (!current_user_can('edit_posts',get_current_user_id())){
				return;
			}
			//add menu page
			add_menu_page(
				esc_html__('Irtech Page','irtech-master'),
				esc_html__('Ir Tech','irtech-master'),
				'manage_options',
				'irtech-theme-settings',
				array($this,'admin_options_fallback_function'),
				IRTECH_MASTER_ADMIN_ASSETS .'/img/irtech20.png',
				80
			);
			add_submenu_page(
                'irtech-theme-settings',
                esc_html__('Product Extract','irtech'),
                esc_html__('Products Extract','irtech'),
                'manage_options',
                'envato-product-extract',
                array($this,'envato_product_extrarct_display')
            );
		}
		public function admin_options_fallback_function(){
			//admin menu page
		}
		/**
		 * Set tab menu
		 * @since 1.0.0
		 * */
		public function set_tab_menus(){
//			$tab_menus =  array(
//				'practice-area' => array(
//					array(
//						'link' => 'edit.php?post_type=practice-area',
//						'name' => sprintf(esc_html__('%s','irtech-master'),'Practice Area'),
//						'id' => 'edit-practice-area'
//					),
//					array(
//						'link' => 'edit-tags.php?taxonomy=practice-cat&post_type=practice-area',
//						'name' => sprintf(esc_html__('%s Categories','irtech-master'),'Practice Area'),
//						'id'=> 'edit-practice-cat'
//					)
//				),
//			);
//
//			if (is_array($tab_menus) && !empty($tab_menus)){
//				foreach ($tab_menus as $post_type => $menu){
//					self::Tab_nav_render($post_type,$menu);
//				}
//			}
		}

		/**
		 * nav tab render
		 * @since 1.0.0
		 * */
		public static function Tab_nav_render($post_type,$tab_menu_arr){

			$current_screen = get_current_screen();
			if ( !empty($tab_menu_arr) && is_admin() && $current_screen->post_type == $post_type ){
				print '<h2 class="nav-tab-wrapper lp-nav-tab-wrapper">';
				foreach ( $tab_menu_arr as $admin_tab ){
					$admin_id = str_replace('edit-','',$admin_tab['id']);
					$class = ( $admin_id == $current_screen->id || $admin_tab['id'] == $current_screen->id ) ? 'nav-tab nav-tab-active' : 'nav-tab';
					print '<a href="'.esc_url(admin_url($admin_tab['link'])).'" class="'.esc_attr($class).' nav-tab-'.esc_attr($admin_tab['id']).'">'.esc_html($admin_tab['name']).'</a>';
				}
				print '</h2>';
			}

		}
		/**
		 * menu activation scripts
		 * @since 1.0.0
		 * */
		public function admin_menu_activation(){
			if ( !is_admin() ){
				return;
			}
			$current_post_type = isset($_GET['post_type']) ? $_GET['post_type'] : '';
			$pages_type = ['practice-area','attorney','case-study'];
			$pages_type = json_encode($pages_type);
			?>
			<script type="text/javascript">
                (function ($) {
                    'use strict';

                    var check,page_slugs,mainwrap,i;
                    check = '<?php echo $current_post_type ;?>';
                    page_slugs = <?php echo $pages_type; ?>;
                    mainwrap = $('#toplevel_page_irtech_theme_options');
                    for ( i =0; i < page_slugs.length; i++ ){
                        if ( page_slugs[i] == check ){
                            //remove submenu class
                            mainwrap
                                .find('wp-submenu.wp-submenu-wrap')
                                .find('li.current')
                                .siblings()
                                .removeClass('current')
                                .find('a')
                                .removeClass('current');
                            var link_slug =  'a[href*="post_type=<?php echo $current_post_type; ?>"]' ;
                            //add submenu class
                            mainwrap
                                .addClass('wp-has-current-submenu wp-menu-open')
                                .removeClass('wp-not-current-submenu')
                                .children('a')
                                .addClass('wp-has-current-submenu wp-menu-open')
                                .removeClass('wp-not-current-submenu')
                                .end()
                                .find('.wp-submenu.wp-submenu-wrap')
                                .find(link_slug)
                                .addClass('current')
                                .parent('li')
                                .addClass('current');
                            break;
                        }
                    }
                    if( mainwrap.find('.wp-submenu.wp-submenu-wrap').find('li').is('.current') ){
                        mainwrap
                            .addClass('wp-has-current-submenu wp-menu-open')
                            .removeClass('wp-not-current-submenu');
                    }
                    if(check){
                        $('.wp-submenu.wp-submenu-wrap')
                            .find('a[href*="admin.php?page=toplevel_page_irtech_theme_options"]')
                            .removeClass('current')
                            .parent('li')
                            .removeClass('current');
                    }

                })(jQuery);
			</script>
			<?php
		}

		/**
         * envato product Extract
		 * @since 1.0.0
		 * */
        public function envato_product_extrarct_display(){
            require_once IRTECH_MASTER_ADMIN .'/partials/envato-product-extract.php';
        }

		/**
		 * envato product Extract
		 * @since 1.0.0
		 * */
		public function envato_purchase_verify_display(){
			require_once IRTECH_MASTER_ADMIN .'/partials/envato-purchase-verify.php';
		}

	}//end class
	if ( class_exists('Irtech_Admin_Menu') ){
		Irtech_Admin_Menu::getInstance();
	}

}//end if
