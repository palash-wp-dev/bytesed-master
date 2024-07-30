<?php
/**
 * All Elementor widget init
 * @package Irtech
 * @since 1.0.0
 */

if ( !defined('ABSPATH') ){
	exit(); // exit if access directly
}


if ( !class_exists('Irtech_Elementor_Widget_Init') ){

	class Irtech_Elementor_Widget_Init{
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
			add_action( 'elementor/elements/categories_registered', array($this,'_widget_categories') );
			//elementor widget registered
			add_action('elementor/widgets/widgets_registered',array($this,'_widget_registered'));
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
		 * _widget_categories()
		 * @since 1.0.0
		 * */
		public function _widget_categories($elements_manager){
			$elements_manager->add_category(
				'irtech_widgets',
				[
					'title' => __( 'Irtech Widgets', 'irtech-master' ),
					'icon' => 'fa fa-plug',
				]
			);
		}

		/**
		 * _widget_registered()
		 * @since 1.0.0
		 * */
		public function _widget_registered(){
			if( !class_exists('Elementor\Widget_Base') ){
				return;
			}
			$elementor_widgets = array(
				'accordion',
				'header-one',
				'product-grid-one',
				'latest-product-one',
				'counterup-one',
				'testimonial-one',
				'image-box-one',
				'button-one',
				'wedoc-grid-one',
				'wedoc-search-one',
                'info-box',
                'product-features-list',
                'newsletter',
                'blog-grid',
                'testimonial-two',
                'header-two',
			);

			$elementor_widgets = apply_filters('irtech_elementor_widget',$elementor_widgets);
			sort($elementor_widgets);
			if ( is_array($elementor_widgets) && !empty($elementor_widgets) ) {
				foreach ( $elementor_widgets as $widget ){
					if(file_exists(IRTECH_MASTER_ELEMENTOR.'/widgets/class-'.$widget.'-elementor-widget.php')){
						require_once IRTECH_MASTER_ELEMENTOR.'/widgets/class-'.$widget.'-elementor-widget.php';
					}
				}
			}
 
		}

	}

	if ( class_exists('Irtech_Elementor_Widget_Init') ){
		Irtech_Elementor_Widget_Init::getInstance();
	}

}//end if
