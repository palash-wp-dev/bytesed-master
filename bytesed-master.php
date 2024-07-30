<?php
/*
Plugin Name: Bytesed Toolkit
Plugin URI: https://themeforest.net/user/ir-tech/portfolio
Description: Plugin to contain short codes and custom post types of the Ir-tech theme.
Author: Ir-Tech
Author URI:https://themeforest.net/user/ir-tech
Version: 1.0.1
Text Domain: bytesed-toolkit
*/

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

//plugin dir path
define( 'IRTECH_MASTER_ROOT_PATH', plugin_dir_path( __FILE__ ) );
define( 'IRTECH_MASTER_ROOT_URL', plugin_dir_url( __FILE__ ) );
define( 'IRTECH_MASTER_SELF_PATH', 'irtech-master/irtech-master.php' );
define( 'IRTECH_MASTER_VERSION', '1.0.1' );
define( 'IRTECH_MASTER_INC', IRTECH_MASTER_ROOT_PATH .'/inc');
define( 'IRTECH_MASTER_LIB', IRTECH_MASTER_ROOT_PATH .'/lib');
define( 'IRTECH_MASTER_ELEMENTOR', IRTECH_MASTER_ROOT_PATH .'/elementor');
define( 'IRTECH_MASTER_DEMO_IMPORT', IRTECH_MASTER_ROOT_PATH .'/demo-data-import');
define( 'IRTECH_MASTER_ADMIN', IRTECH_MASTER_ROOT_PATH .'/admin');
define( 'IRTECH_MASTER_ADMIN_ASSETS', IRTECH_MASTER_ROOT_URL .'admin/assets');
define( 'IRTECH_MASTER_WP_WIDGETS', IRTECH_MASTER_ROOT_PATH .'/wp-widgets');
define( 'IRTECH_MASTER_ASSETS', IRTECH_MASTER_ROOT_URL .'assets/');
define( 'IRTECH_MASTER_CSS', IRTECH_MASTER_ASSETS .'css');
define( 'IRTECH_MASTER_JS', IRTECH_MASTER_ASSETS .'js');
define( 'IRTECH_MASTER_IMG', IRTECH_MASTER_ASSETS .'img');

//load irtech helpers functions
if (!function_exists('Irtech')){
	require_once IRTECH_MASTER_INC .'/class-irtech-helper-functions.php';
	if (!function_exists('Irtech')){
		function Irtech(){
			return class_exists('Irtech_Helper_Functions') ? new Irtech_Helper_Functions() : false;
		}
	}
}
//load codester framework functions
if ( !Irtech()->is_irtech_active()) {
	if ( file_exists( IRTECH_MASTER_ROOT_PATH . '/inc/csf-functions.php' ) ) {
		require_once IRTECH_MASTER_ROOT_PATH . '/inc/csf-functions.php';
	}
}

//plugin init
if ( file_exists( IRTECH_MASTER_ROOT_PATH . '/inc/class-irtech-master-init.php' ) ) {
	require_once IRTECH_MASTER_ROOT_PATH . '/inc/class-irtech-master-init.php';
}
