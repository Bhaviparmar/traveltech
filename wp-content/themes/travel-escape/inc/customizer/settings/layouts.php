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
$travel_escape_section_id = 'travel_escape_general_options_layouts';

$travel_escape_layouts = array(
	'no-sidebar'    => __( 'No Sidebar', 'travel-escape' ),
	'left-sidebar'  => __( 'Left Sidebar', 'travel-escape' ),
	'right-sidebar' => __( 'Right Sidebar', 'travel-escape' ),
);


$wp_customize->add_section(
	$travel_escape_section_id,
	array(
		'title' => __( 'Layouts', 'travel-escape' ),
		'panel' => $travel_escape_panel_id,
	)
);




travel_escape_register_option(
	$wp_customize,
	array(
		'type'              => 'select',
		'name'              => 'travel_escape_theme_options[layout_archives_blogs]',
		'sanitize_callback' => 'travel_escape_customizer_sanitize_select',
		'label'             => esc_html__( 'Archives Layout', 'travel-escape' ),
		'description'       => __( 'Select sidebar layout for archives and blogs.', 'travel-escape' ),
		'default'           => $defaults['layout_archives_blogs'],
		'section'           => $travel_escape_section_id,
		'choices'           => $travel_escape_layouts,
	)
);





travel_escape_register_option(
	$wp_customize,
	array(
		'type'              => 'select',
		'name'              => 'travel_escape_theme_options[layout_posts]',
		'sanitize_callback' => 'travel_escape_customizer_sanitize_select',
		'label'             => esc_html__( 'Posts Layouts', 'travel-escape' ),
		'description'       => __( 'Select sidebar layout for single posts.', 'travel-escape' ),
		'default'           => $defaults['layout_posts'],
		'section'           => $travel_escape_section_id,
		'choices'           => $travel_escape_layouts,
	)
);





travel_escape_register_option(
	$wp_customize,
	array(
		'type'              => 'select',
		'name'              => 'travel_escape_theme_options[layout_pages]',
		'sanitize_callback' => 'travel_escape_customizer_sanitize_select',
		'label'             => esc_html__( 'Pages Layouts', 'travel-escape' ),
		'description'       => __( 'Select sidebar layout for single pages.', 'travel-escape' ),
		'default'           => $defaults['layout_pages'],
		'section'           => $travel_escape_section_id,
		'choices'           => $travel_escape_layouts,
	)
);

