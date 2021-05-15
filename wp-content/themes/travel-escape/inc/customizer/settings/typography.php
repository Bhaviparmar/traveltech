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

$travel_escape_fonts = travel_escape_fonts();

$travel_escape_panel_id   = 'travel_escape_general_options';
$travel_escape_section_id = 'travel_escape_general_options_typography';

$wp_customize->add_section(
	$travel_escape_section_id,
	array(
		'title' => __( 'Typography', 'travel-escape' ),
		'panel' => $travel_escape_panel_id,
	)
);


travel_escape_register_option(
	$wp_customize,
	array(
		'type'              => 'select',
		'name'              => 'travel_escape_theme_options[heading_fonts]',
		'sanitize_callback' => 'travel_escape_customizer_sanitize_typo_select',
		'label'             => esc_html__( 'Heading Fonts', 'travel-escape' ),
		'description'       => __( 'Select font for your theme headings.', 'travel-escape' ),
		'default'           => $defaults['heading_fonts'],
		'section'           => $travel_escape_section_id,
		'choices'           => $travel_escape_fonts,
	)
);

