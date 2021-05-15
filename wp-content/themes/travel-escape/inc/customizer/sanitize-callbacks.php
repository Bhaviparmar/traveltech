<?php
/**
 * All the sanitization function required for the customizer settings.
 *
 * @package travel-escape
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



/**
 * Sanitization function for the select controls.
 */
function travel_escape_customizer_sanitize_select( $input, $setting ) {
	$input   = sanitize_key( $input );
	$choices = $setting->manager->get_control( $setting->id )->choices;
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}



/**
 * Sanitization function for the select controls.
 */
function travel_escape_customizer_sanitize_typo_select( $input, $setting ) {
	$choices = $setting->manager->get_control( $setting->id )->choices;
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

