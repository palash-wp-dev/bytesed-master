<?php
/**
 * @package Irtech
 * @author Ir-Tech
 */
if (!defined("ABSPATH")) {
    exit(); //exit if access directly
}

if (!class_exists('Irtech_Shortcodes')) {

    class Irtech_Shortcodes
    {
        /*
        * $instance
        * @since 1.0.0
        * */
        protected static $instance;

        public function __construct()
        {
        	//Load plugin assets
	        add_action('wp_enqueue_scripts',array($this,'plugin_assets'));
        	//Load plugin admin assets
	        add_action('admin_enqueue_scripts',array($this,'admin_assets'));
        	//load plugin text domain
	        add_action('init',array($this,'load_textdomain'));

	        //load plugin dependency files()
	        self::load_plugin_dependency_files();
        }

        /**
         * getInstance()
         * */
        public static function getInstance()
        {
            if (null == self::$instance) {
                self::$instance = new self();
            }
            return self::$instance;
        }

		/**
		 * Load Plugin Text domain
		 * @since 1.0.0
		 * */
		public function load_textdomain(){
			load_plugin_textdomain('irtech-master',false,IRTECH_MASTER_ROOT_PATH .'/languages');
		}

		/**
		 * load plugin dependency files()
		 * @since 1.0.0
		 * */
		public function load_plugin_dependency_files(){
			$includes_files = array(
				array(
					'file-name' => 'codestar-framework',
					'folder-name' => IRTECH_MASTER_LIB .'/codestar-framework'
				),
				array(
					'file-name' => 'class-menu-page',
					'folder-name' => IRTECH_MASTER_ADMIN
				),
				array(
					'file-name' => 'class-post-column-customize',
					'folder-name' => IRTECH_MASTER_ADMIN
				),
				array(
					'file-name' => 'class-irtech-excerpt',
					'folder-name' => IRTECH_MASTER_INC
				),
				array(
					'file-name' => 'class-envato',
					'folder-name' => IRTECH_MASTER_INC
				),
				array(
					'file-name' => 'class-irtech-shortcodes',
					'folder-name' => IRTECH_MASTER_INC
				),
				array(
					'file-name' => 'class-elementor-widget-init',
					'folder-name' => IRTECH_MASTER_ELEMENTOR
				),
				array(
					'file-name' => 'class-about-us-widget',
					'folder-name' => IRTECH_MASTER_WP_WIDGETS
				),
				array(
					'file-name' => 'class-recent-post-widget',
					'folder-name' => IRTECH_MASTER_WP_WIDGETS
				),
				array(
					'file-name' => 'class-contact-info-widget',
					'folder-name' => IRTECH_MASTER_WP_WIDGETS
				),
				array(
					'file-name' => 'popular-product-widget',
					'folder-name' => IRTECH_MASTER_WP_WIDGETS
				),
				array(
					'file-name' => 'class-cron-job',
					'folder-name' => IRTECH_MASTER_INC
				),
				 array(
					'file-name' => 'ajax-request',
					'folder-name' => IRTECH_MASTER_INC
				),
			);

			if (is_array($includes_files) && !empty($includes_files)){
				foreach ($includes_files as $file){
					if (file_exists($file['folder-name'].'/'.$file['file-name'].'.php')){
						require_once $file['folder-name'].'/'.$file['file-name'].'.php';
					}
				}
			}
		}

		/**
		 * admin assets
		 * @since 1.0.0
		 * */
		public function plugin_assets(){
			self::load_plugin_css_files();
			self::load_plugin_js_files();
		}

	    /**
	     * load plugin css files()
	     * @since 1.0.0
	     * */
	    public function load_plugin_css_files(){
		    $plugin_version = IRTECH_MASTER_VERSION;
		    $all_css_files = array(
			    array(
				    'handle' => 'owl-carousel',
				    'src' => IRTECH_MASTER_CSS .'/owl.carousel.min.css',
				    'deps' => array(),
				    'ver' => $plugin_version,
				    'media' => 'all'
			    ),
			    array(
				    'handle' => 'irtech-master-wedocs-style',
				    'src' => IRTECH_MASTER_CSS .'/wedocs.css',
				    'deps' => array(),
				    'ver' => $plugin_version,
				    'media' => 'all'
			    ),
			    array(
				    'handle' => 'irtech-master-main-style',
				    'src' => IRTECH_MASTER_CSS .'/main-style.css',
				    'deps' => array(),
				    'ver' => $plugin_version,
				    'media' => 'all'
			    )
			    
		    );

		    $all_css_files = apply_filters('irtech_master_css',$all_css_files);

		    if (is_array($all_css_files) && !empty($all_css_files)){
			    foreach ($all_css_files as $css){
				    call_user_func_array('wp_enqueue_style',$css);
			    }
		    }

	    }

	    /**
	     * load plugin js
	     * @since 1.0.0
	     * */
	    public function load_plugin_js_files(){
		    $plugin_version = IRTECH_MASTER_VERSION;
		    $all_js_files = array(
			    array(
				    'handle' => 'waypoints',
				    'src' => IRTECH_MASTER_JS .'/waypoints.min.js',
				    'deps' => array('jquery'),
				    'ver' => $plugin_version,
				    'in_footer' => true
			    ),
			    array(
				    'handle' => 'counterup',
				    'src' => IRTECH_MASTER_JS .'/jquery.counterup.min.js',
				    'deps' => array('jquery'),
				    'ver' => $plugin_version,
				    'in_footer' => true
			    ),
			    array(
				    'handle' => 'owl-carousel',
				    'src' => IRTECH_MASTER_JS .'/owl.carousel.min.js',
				    'deps' => array('jquery'),
				    'ver' => $plugin_version,
				    'in_footer' => true
			    ),
			    array(
				    'handle' => 'irtech-master-main-script',
				    'src' => IRTECH_MASTER_JS .'/main.js',
				    'deps' => array('jquery'),
				    'ver' => $plugin_version,
				    'in_footer' => true
			    ),
		    );

		    $all_js_files = apply_filters('irtech_master_js',$all_js_files);
		    if (is_array($all_js_files) && !empty($all_js_files)){
			    foreach ($all_js_files as $js){
				    call_user_func_array('wp_enqueue_script',$js);
			    }
		    }
		     wp_localize_script('irtech-master-main-script','xgObj',[
                'ajaxUrl' =>  admin_url('admin-ajax.php')
            ]);
	    }

		/**
		 * admin assets
		 * @since 1.0.0
		 * */
		public function admin_assets(){
			self::load_admin_css_files();
			self::load_admin_js_files();
		}

		/**
		 * load plugin admin css files()
		 * @since 1.0.0
		 * */
		public function load_admin_css_files(){
			$plugin_version = IRTECH_MASTER_VERSION;
			$all_css_files = array(
				array(
					'handle' => 'irtech-master-admin-style',
					'src' => IRTECH_MASTER_ADMIN_ASSETS .'/css/admin.css',
					'deps' => array(),
					'ver' => $plugin_version,
					'media' => 'all'
				)
			);

			$all_css_files = apply_filters('irtech_admin_css',$all_css_files);
			if (is_array($all_css_files) && !empty($all_css_files)){
				foreach ($all_css_files as $css){
					call_user_func_array('wp_enqueue_style',$css);
				}
			}
		}

		/**
		 * load plugin admin js
		 * @since 1.0.0
		 * */
		public function load_admin_js_files(){
			$plugin_version = IRTECH_MASTER_VERSION;
			$all_js_files = array(
				array(
					'handle' => 'irtech-master-widget',
					'src' => IRTECH_MASTER_ADMIN_ASSETS .'/js/widget.js',
					'deps' => array('jquery'),
					'ver' => $plugin_version,
					'in_footer' => true
				),
			);

			$all_js_files = apply_filters('irtech_admin_js',$all_js_files);
			if (is_array($all_js_files) && !empty($all_js_files)){
				foreach ($all_js_files as $js){
					call_user_func_array('wp_enqueue_script',$js);
				}
			}
		}


    }//end class
    if (class_exists('Irtech_Shortcodes')){
	    Irtech_Shortcodes::getInstance();
    }
}

