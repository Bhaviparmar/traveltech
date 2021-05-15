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
$travel_escape_section_id = 'travel_escape_general_options_archive_filter';


$wp_customize->add_section(
	$travel_escape_section_id,
	array(
		'title' => __( 'Archive Filter', 'travel-escape' ),
		'panel' => $travel_escape_panel_id,
	)
);



travel_escape_register_option(
	$wp_customize,
	array(
		'type'              => 'checkbox',
		'name'              => 'travel_escape_theme_options[enable_archive_filter]',
		'default'           => $defaults['enable_archive_filter'],
		'sanitize_callback' => 'wp_validate_boolean',
		'label'             => esc_html__( 'Enable Archive Filter?', 'travel-escape' ),
		'description'       => esc_html__( 'This will enable post filter option in post blogs and archives', 'travel-escape' ),
		'section'           => $travel_escape_section_id,
	)
);

