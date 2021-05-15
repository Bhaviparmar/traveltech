<?php
/**
 * This file contains required settings for the general options panel.
 *
 * @package travel-escape
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$travel_escape_section_id = 'colors';


travel_escape_register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'custom_control'    => 'WP_Customize_Color_Control',
		'name'              => 'travel_escape_theme_options[primary_color]',
		'default'           => $defaults['primary_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'label'             => esc_html__( 'Primary Color', 'travel-escape' ),
		'section'           => $travel_escape_section_id,
	)
);



travel_escape_register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'custom_control'    => 'WP_Customize_Color_Control',
		'name'              => 'travel_escape_theme_options[secondary_color]',
		'default'           => $defaults['secondary_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'label'             => esc_html__( 'Secondary Color', 'travel-escape' ),
		'section'           => $travel_escape_section_id,
	)
);

