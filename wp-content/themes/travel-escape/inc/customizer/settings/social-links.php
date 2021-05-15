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
$travel_escape_section_id = 'travel_escape_general_options_social_links';

$travel_escape_social_links = travel_escape_social_links();

$wp_customize->add_section(
	$travel_escape_section_id,
	array(
		'title' => __( 'Social Links', 'travel-escape' ),
		'panel' => $travel_escape_panel_id,
	)
);


if ( is_array( $travel_escape_social_links ) && ! empty( $travel_escape_social_links ) ) {
	foreach ( $travel_escape_social_links as $travel_escape_social_link ) {

		travel_escape_register_option(
			$wp_customize,
			array(
				'type'              => 'url',
				'name'              => "travel_escape_theme_options[social_link_{$travel_escape_social_link}]",
				'sanitize_callback' => 'esc_url_raw',
				'label'             => ucwords( $travel_escape_social_link ),
				'section'           => $travel_escape_section_id,
			)
		);

	}
}
