<?php

/**
 * All Custom Post Type
 * Author Irtech
 * @since 1.0.0
 * */

if (!defined('ABSPATH')){
	exit(); //exit if access directly
}

if (!class_exists('Irtech_Custom_Post_Type')){
	class Irtech_Custom_Post_Type{

		//$instance variable
		private static $instance;
		
		public function __construct() {
			//
			add_action('init',array($this,'register_custom_post_type'));

		}

		/**
		 * get Instance
		 * @since 1.0.0
		 * */
		public static function getInstance(){
			if (null == self::$instance){
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Register Custom Post Type
		 * @since 1.0.0
		 * */
		public function register_custom_post_type(){
			$all_post_type = array(
			    array(
			        'post_type' => 'practice-area',
			        'args' => array(
			            'label' => esc_html__('Practice Area ','irtech-master'),
			            'description' => esc_html__('Practice Area','xp-tabs'),
			            'labels' => array(
			                'name'                => esc_html_x( 'Practice Area', 'Post Type General Name', 'irtech-master' ),
			                'singular_name'       => esc_html_x( 'Practice Area', 'Post Type Singular Name', 'irtech-master' ),
			                'menu_name'           => esc_html__( 'Practice Area', 'irtech-master' ),
			                'all_items'           => esc_html__( 'All Practice Area', 'irtech-master' ),
			                'view_item'           => esc_html__( 'View Practice Area', 'irtech-master' ),
			                'add_new_item'        => esc_html__( 'Add New Practice Area', 'irtech-master' ),
			                'add_new'             => esc_html__( 'Add New', 'irtech-master' ),
			                'edit_item'           => esc_html__( 'Edit Practice Area', 'irtech-master'),
			                'update_item'         => esc_html__( 'Update Practice Area', 'irtech-master' ),
			                'search_items'        => esc_html__( 'Search Practice Area', 'irtech-master' ),
			                'not_found'           => esc_html__( 'Not Found', 'irtech-master' ),
			                'not_found_in_trash'  => esc_html__( 'Not found in Trash', 'irtech-master' ),
			                "featured_image" => esc_html__('Practice Area Image','irtech-master'),
                            'set_featured_image' => esc_html__('Set Practice Area Image'),
                            'remove_featured_image' => esc_html__('Remove Practice Area Image'),
			            ),
			            'supports' => array('title','editor','thumbnail','comments','excerpt'),
			            'hierarchical'        => false,
			            'public'              => true,
			            "publicly_queryable" => true,
			            'show_ui'             => true,
			            'show_in_menu'        => 'irtech_theme_options',
			            'can_export'          => true,
			            'capability_type'     => 'page',
			            'query_var' => true
			        )
			    ),
                array(
			        'post_type' => 'case-study',
			        'args' => array(
			            'label' => esc_html__('Case Study ','irtech-master'),
			            'description' => esc_html__('Case Study','xp-tabs'),
			            'labels' => array(
			                'name'                => esc_html_x( 'Case Study', 'Post Type General Name', 'irtech-master' ),
			                'singular_name'       => esc_html_x( 'Case Study', 'Post Type Singular Name', 'irtech-master' ),
			                'menu_name'           => esc_html__( 'Case Study', 'irtech-master' ),
			                'all_items'           => esc_html__( 'All Case Studies', 'irtech-master' ),
			                'view_item'           => esc_html__( 'View Case Study', 'irtech-master' ),
			                'add_new_item'        => esc_html__( 'Add New Case Study', 'irtech-master' ),
			                'add_new'             => esc_html__( 'Add New', 'irtech-master' ),
			                'edit_item'           => esc_html__( 'Edit Case Study', 'irtech-master'),
			                'update_item'         => esc_html__( 'Update Case Study', 'irtech-master' ),
			                'search_items'        => esc_html__( 'Search Case Study', 'irtech-master' ),
			                'not_found'           => esc_html__( 'Not Found', 'irtech-master' ),
			                'not_found_in_trash'  => esc_html__( 'Not found in Trash', 'irtech-master' ),
			                "featured_image" => esc_html__('Case Study Image','irtech-master'),
			                'set_featured_image' => esc_html__('Set Case Study Image'),
			                'remove_featured_image' => esc_html__('Remove Case Study Image'),
			            ),
			            'supports' => array('title','editor','thumbnail','comments','excerpt'),
			            'hierarchical'        => false,
			            'public'              => true,
			            "publicly_queryable" => true,
			            'show_ui'             => true,
			            'show_in_menu'        => 'irtech_theme_options',
			            'can_export'          => true,
			            'capability_type'     => 'page',
			            'query_var' => true
			        )
			    ),
                array(
			        'post_type' => 'attorney',
			        'args' => array(
			            'label' => esc_html__('Attorney','irtech-master'),
			            'description' => esc_html__('Attorney','xp-tabs'),
			            'labels' => array(
			                'name'                => esc_html_x( 'Attorney', 'Post Type General Name', 'irtech-master' ),
			                'singular_name'       => esc_html_x( 'Attorney', 'Post Type Singular Name', 'irtech-master' ),
			                'menu_name'           => esc_html__( 'Attorney', 'irtech-master' ),
			                'all_items'           => esc_html__( 'All Attorney', 'irtech-master' ),
			                'view_item'           => esc_html__( 'View Attorney', 'irtech-master' ),
			                'add_new_item'        => esc_html__( 'Add New Attorney', 'irtech-master' ),
			                'add_new'             => esc_html__( 'Add New', 'irtech-master' ),
			                'edit_item'           => esc_html__( 'Edit Attorney', 'irtech-master'),
			                'update_item'         => esc_html__( 'Update Attorney', 'irtech-master' ),
			                'search_items'        => esc_html__( 'Search Attorney', 'irtech-master' ),
			                'not_found'           => esc_html__( 'Not Found', 'irtech-master' ),
			                'not_found_in_trash'  => esc_html__( 'Not found in Trash', 'irtech-master' ),
			                "featured_image" => esc_html__('Attorney Image','irtech-master'),
			                'set_featured_image' => esc_html__('Set Attorney Image'),
			                'remove_featured_image' => esc_html__('Remove Attorney Image'),
			            ),
			            'supports' => array('title','editor','thumbnail','excerpt'),
			            'hierarchical'        => false,
			            'public'              => true,
			            "publicly_queryable" => true,
			            'show_ui'             => true,
			            'show_in_menu'        => 'irtech_theme_options',
			            'can_export'          => true,
			            'capability_type'     => 'page',
			            'query_var' => true
			        )
			    ),
			);

			    if ( !empty($all_post_type) && is_array($all_post_type) ){

				    foreach ( $all_post_type as $post_type ){
				        call_user_func_array('register_post_type',$post_type);
				    }

				}

			/**
			* Custom Taxonomy Register
			*/

			$all_custom_taxonmy = array(
			    array(
			        'taxonomy' => 'practice-cat',
			        'object_type' => 'practice-area',
			        'args' => array(
			            "labels" => array(
			                "name" => esc_html__( "Practice Category", 'irtech-master' ),
			                "singular_name" => esc_html__( "Practice Category", 'irtech-master' ),
			                "menu_name" => esc_html__( "Practice Category", 'irtech-master' ),
			                "all_items" => esc_html__( "All Practice Category", 'irtech-master' ),
			                "add_new_item" => esc_html__( "Add New Practice Category", 'irtech-master' )
			            ),
			            "public" => true,
			            "hierarchical" => true,
			            "show_ui" => true,
			            "show_in_menu" => true,
			            "show_in_nav_menus" => true,
			            "query_var" => true,
			        	"rewrite" => array( 'slug' => 'practice-category', 'with_front' => true, ),
			            "show_admin_column" => true,
			            "show_in_rest" => false,
			            "show_in_quick_edit" => true,
			        )
			    ),
                array(
			        'taxonomy' => 'case-study-cat',
			        'object_type' => 'case-study',
			        'args' => array(
			            "labels" => array(
			                "name" => esc_html__( "Case Study Category", 'irtech-master' ),
			                "singular_name" => esc_html__( "Case Study Category", 'irtech-master' ),
			                "menu_name" => esc_html__( "Case Study Category", 'irtech-master' ),
			                "all_items" => esc_html__( "All Case Study Category", 'irtech-master' ),
			                "add_new_item" => esc_html__( "Add New Case Study Category", 'irtech-master' )
			            ),
			            "public" => true,
			            "hierarchical" => true,
			            "show_ui" => true,
			            "show_in_menu" => true,
			            "show_in_nav_menus" => true,
			            "query_var" => true,
			        	"rewrite" => array( 'slug' => 'case-study-category', 'with_front' => true),
			            "show_admin_column" => true,
			            "show_in_rest" => false,
			            "show_in_quick_edit" => true,
			        )
			    ),
                array(
			        'taxonomy' => 'attorney-cat',
			        'object_type' => 'attorney',
			        'args' => array(
			            "labels" => array(
			                "name" => esc_html__( "Attorney Category", 'irtech-master' ),
			                "singular_name" => esc_html__( "Attorney Category", 'irtech-master' ),
			                "menu_name" => esc_html__( "Attorney Category", 'irtech-master' ),
			                "all_items" => esc_html__( "All Attorney Category", 'irtech-master' ),
			                "add_new_item" => esc_html__( "Add New Attorney Category", 'irtech-master' ),
			            ),
			            "public" => true,
			            "hierarchical" => true,
			            "show_ui" => true,
			            "show_in_menu" => true,
			            "show_in_nav_menus" => true,
			            "query_var" => true,
			        	"rewrite" => array( 'slug' => 'attorney-category', 'with_front' => true),
			            "show_admin_column" => true,
			            "show_in_rest" => false,
			            "show_in_quick_edit" => true,
			        )
			    ),
                array(
			        'taxonomy' => 'attorney-practice',
			        'object_type' => 'attorney',
			        'args' => array(
			            "labels" => array(
			                "name" => esc_html__( "Attorney Practice Area", 'irtech-master' ),
			                "singular_name" => esc_html__( "Attorney Practice Area", 'irtech-master' ),
			                "menu_name" => esc_html__( "Attorney Practice Area", 'irtech-master' ),
			                "all_items" => esc_html__( "All Attorney Practice Area", 'irtech-master' ),
			                "add_new_item" => esc_html__( "Add New Attorney Practice Area", 'irtech-master' ),
			            ),
			            "public" => true,
			            "hierarchical" => false,
			            "show_ui" => true,
			            "show_in_menu" => true,
			            "show_in_nav_menus" => true,
			            "query_var" => true,
			        	"rewrite" => array( 'slug' => 'attorney-practice-area', 'with_front' => true),
			            "show_admin_column" => true,
			            "show_in_rest" => false,
			            "show_in_quick_edit" => true,
			        )
			    )
			);

			if (is_array($all_custom_taxonmy) && !empty($all_custom_taxonmy)){
			    foreach ($all_custom_taxonmy as $taxonomy){
			        call_user_func_array('register_taxonomy',$taxonomy);
			    }
			}
			//flush_rewrite_rules()
			flush_rewrite_rules();
		}


	}//end class
	if ( class_exists('Irtech_Custom_Post_Type')){
		Irtech_Custom_Post_Type::getInstance();
	}
}