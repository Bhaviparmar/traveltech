<?php
/**
 * This file contains all the required active callback functions for the customizer settings.
 *
 * @package travel-escape
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



function travel_escape_customizer_is_notice_enable( $control ) {
	return $control->manager->get_setting( 'travel_escape_theme_options[enable_notice]' )->value();
}


function travel_escape_customizer_is_payment_link_enable( $control ) {
	return $control->manager->get_setting( 'travel_escape_theme_options[enable_notice]' )->value();
}


function travel_escape_customizer_is_primary_cta_enable( $control ) {
	return $control->manager->get_setting( 'travel_escape_theme_options[enable_cta_primary_button]' )->value();
}

function travel_escape_customizer_is_secondary_cta_enable( $control ) {
	return $control->manager->get_setting( 'travel_escape_theme_options[enable_cta_secondary_button]' )->value();
}
