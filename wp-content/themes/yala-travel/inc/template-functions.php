<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Yala Travel
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function yala_travel_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'yala_travel_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function yala_travel_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'yala_travel_pingback_header' );


if( ! function_exists('yala_travel_top_header_social_links')):
	function yala_travel_top_header_social_links(){
		$defaults =  array(
			array(
				'font' => 'fa fa-facebook',
				'link' => 'https://www.facebook.com/',                        
			),
			array(
				'font' => 'fa fa-linkedin',
				'link' => 'https://www.linkedin.com/',
			),
			array(
				'font' => 'fa fa-twitter',
				'link' => 'https://twitter.com/',
			),
			array(
				'font' => 'fa fa-google-plus',
				'link' => 'https://plus.google.com',
			)
		);
		$social_items = get_theme_mod( 'top_header_social_links', $defaults );
		if( $social_items  ){ 
			foreach( $social_items as $social ){ ?>
				<li><a href="<?php echo esc_url($social['link']);?>"><i class="<?php echo esc_attr($social['font']);?>"></i></a></li>
				<?php
			}
		}
	}
endif;

/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Query WooCommerce activation
 *
 * @return boolean
 */

if ( ! function_exists( 'yala_travel_is_woocommerce_activated' ) ) {
    function yala_travel_is_woocommerce_activated() {
        if ( class_exists( 'WooCommerce' ) ) {
          return true;
      } else {
          return false;
      }
  }
}