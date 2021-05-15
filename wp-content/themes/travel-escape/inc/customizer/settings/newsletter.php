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

if ( ! travel_escape_get_newsletter_form( 0, false ) ) {
	return;
}

$travel_escape_panel_id   = 'travel_escape_general_options';
$travel_escape_section_id = 'travel_escape_general_options_newsletter';


$wp_customize->add_section(
	$travel_escape_section_id,
	array(
		'title' => __( 'Newsletter', 'travel-escape' ),
		'panel' => $travel_escape_panel_id,
	)
);



travel_escape_register_option(
	$wp_customize,
	array(
		'type'              => 'text',
		'name'              => 'travel_escape_theme_options[newsletter_heading]',
		'sanitize_callback' => 'sanitize_text_field',
		'label'             => esc_html__( 'Newsletter Heading', 'travel-escape' ),
		'section'           => $travel_escape_section_id,
	)
);



travel_escape_register_option(
	$wp_customize,
	array(
		'type'              => 'textarea',
		'name'              => 'travel_escape_theme_options[newsletter_description]',
		'sanitize_callback' => 'sanitize_text_field',
		'label'             => esc_html__( 'Newsletter Description', 'travel-escape' ),
		'section'           => $travel_escape_section_id,
	)
);

