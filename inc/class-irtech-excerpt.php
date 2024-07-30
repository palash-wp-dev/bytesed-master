<?php
if (!defined('ABSPATH')){
	exit(); //exit if access it directly
}
/*
* Theme Excerpt Class
* @since 1.0.0
* @source https://gist.github.com/bgallagh3r/8546465
*/
if (!class_exists('Irtech_excerpt')):
class Irtech_excerpt {

    public static $length = 55;

    public static $types = array(
      'short' => 25,
      'regular' => 55,
      'long' => 100,
      'promo'=>15
    );

    public static $more = true;

    /**
    * Sets the length for the excerpt,
    * then it adds the WP filter
    * And automatically calls the_excerpt();
    *
    * @param string $new_length
    * @return void
    * @author Baylor Rae'
    */
    public static function length($new_length = 55, $more = true) {
        Irtech_excerpt::$length = $new_length;
        Irtech_excerpt::$more = $more;

        add_filter( 'excerpt_more', 'Irtech_excerpt::auto_excerpt_more' );

        add_filter('excerpt_length', 'Irtech_excerpt::new_length');

        Irtech_excerpt::output();
    }

    public static function new_length() {
        if( isset(Irtech_excerpt::$types[Irtech_excerpt::$length]) )
            return Irtech_excerpt::$types[Irtech_excerpt::$length];
        else
            return Irtech_excerpt::$length;
    }

    public static function output() {
        the_excerpt();
    }

    public static function continue_reading_link() {

        return '<span class="readmore"><a href="'.get_permalink().'">'.esc_html__('Read More','irtech').'</a></span>';
    }

    public static function auto_excerpt_more( ) {
        if (Irtech_excerpt::$more) :
            return ' ';
        else :
            return ' ';
        endif;
    }

} //end class
endif;

if (!function_exists('irtech_excerpt')){

	function irtech_excerpt($length = 55, $more=true) {
		Irtech_excerpt::length($length, $more);
	}

}


?>