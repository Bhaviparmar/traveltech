<?php
/**
 * Yala Travel Theme Customizer
 *
 * @package Yala Travel
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function yala_travel_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/**
   * Load customizer functions for intializing theme upsell
   */
  require get_template_directory() . '/inc/customizer/customizer-upsell.php';

  $wp_customize->register_section_type( 'Yala_Travel_Pro_Upsell' );

  $wp_customize->add_section(
    new Yala_Travel_Pro_Upsell( $wp_customize, 'yala_travel_pro_upsell', array(
      'title'         => esc_html__( 'Yala Travel Pro', 'yala-travel' ),
      'button_text'   => esc_html__( 'Buy Pro',        'yala-travel' ),
      'button_url'    => 'https://yalathemes.com/downloads/yala-travel-pro/',
      'priority'    => 0,
    ) )
  );

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'yala_travel_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'yala_travel_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'yala_travel_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function yala_travel_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function yala_travel_customize_partial_blogdescription() {
	bloginfo( 'description' );
}


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function yala_travel_customize_preview_js() {
	wp_enqueue_script( 'yala-travel-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}

add_action( 'customize_preview_init', 'yala_travel_customize_preview_js' );
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */

add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'wptrt-customize-section-button',
		get_theme_file_uri( 'assets/js/customize-controls.js' ),
		[ 'customize-control' ],
		$version,
		true
	);

	wp_enqueue_style(
		'wptrt-customize-section-button',
		get_theme_file_uri( 'assets/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );


/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Load customizer required panels.
 */

require get_template_directory() .'/inc/customizer/yala-travel-general-panel.php';
require get_template_directory() .'/inc/customizer/yala-travel-header-panel.php';

require get_template_directory() . '/inc/customizer/yala-travel-sanitize.php';
require get_template_directory() . '/inc/customizer/customizer-classes.php';

require get_template_directory() . '/inc/customizer/color/color-customizer.php';
require get_template_directory() . '/inc/customizer/color/customizer-css.php';