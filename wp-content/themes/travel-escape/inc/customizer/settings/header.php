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

$travel_escape_panel_id   = 'travel_escape_general_options';
$travel_escape_section_id = 'travel_escape_general_options_header';


$wp_customize->add_section(
	$travel_escape_section_id,
	array(
		'title' => __( 'Header', 'travel-escape' ),
		'panel' => $travel_escape_panel_id,
	)
);



travel_escape_register_option(
	$wp_customize,
	array(
		'type'              => 'checkbox',
		'name'              => 'travel_escape_theme_options[enable_cta_primary_button]',
		'default'           => $defaults['enable_cta_primary_button'],
		'sanitize_callback' => 'wp_validate_boolean',
		'label'             => esc_html__( 'Enable Call To Action?', 'travel-escape' ),
		'section'           => $travel_escape_section_id,
	)
);
travel_escape_register_option(
	$wp_customize,
	array(
		'type'              => 'text',
		'name'              => 'travel_escape_theme_options[cta_primary_label]',
		'sanitize_callback' => 'sanitize_text_field',
		'label'             => esc_html__( 'Call To Action Label', 'travel-escape' ),
		'section'           => $travel_escape_section_id,
		'active_callback'   => 'travel_escape_customizer_is_primary_cta_enable',
	)
);
travel_escape_register_option(
	$wp_customize,
	array(
		'type'              => 'url',
		'name'              => 'travel_escape_theme_options[cta_primary_link]',
		'sanitize_callback' => 'esc_url_raw',
		'label'             => esc_html__( 'Call To Action Link', 'travel-escape' ),
		'section'           => $travel_escape_section_id,
		'active_callback'   => 'travel_escape_customizer_is_primary_cta_enable',
	)
);
