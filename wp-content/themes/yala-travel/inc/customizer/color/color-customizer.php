<?php

add_action( 'customize_register', 'yala_travel_color_settings_register' );

function yala_travel_color_settings_register( $wp_customize ) {

   /**
   * Primary Theme Color
   */
   $wp_customize->add_setting( 'yala_travel_primary_theme_color_setting', array(
      'capability'        => 'edit_theme_options',
      'default'           => '#00bdbb',
      'sanitize_callback' => 'sanitize_hex_color'
  	) );

   	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'yala_travel_primary_theme_color_setting',array(
          'label'                 =>  __( 'Primary Theme Color', 'yala-travel' ),
          'section'               => 'colors',
          'type'                  => 'color',
          'priority'              => 0,
          'settings' 			  => 'yala_travel_primary_theme_color_setting',
      ) )
   	);
}