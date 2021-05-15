<?php
/**
 * Yala Travel Header Settings panel at Theme Customizer
 *
 * @package Yala Travel
 * @since 1.0.0
 */

add_action( 'customize_register', 'yala_travel_header_settings_register' );

function yala_travel_header_settings_register( $wp_customize ) {
  require get_template_directory() .'/inc/repeater/class-repeater-settings.php';
  require get_template_directory() .'/inc/repeater/class-control-repeater.php';

	/**
     * Add Header Settings Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel(
       'yala_travel_header_settings_panel',
       array(
           'priority'       => 10,
           'capability'     => 'edit_theme_options',
           'theme_supports' => '',
           'title'          => __( 'Header Settings', 'yala-travel' ),
       )
   );

    /*----------------------------------------------------------------------------------------------------------------------------------------*/
	/**
     * Top Header section
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'yala_travel_top_header_section',
        array(
        	'priority'       => 2,
        	'panel'          => 'yala_travel_header_settings_panel',
        	'capability'     => 'edit_theme_options',
        	'theme_supports' => '',
            'title'          => __( 'Top Header Section', 'yala-travel' ),
            'description'    => __( 'Managed the content display at top header section.', 'yala-travel' ),
        )
    );

    /**Top Header section Enable/Disable  */
    $wp_customize->add_setting(
        'yala_travel_top_header_enable',
        array(
            'default'           => 1,
            'sanitize_callback' => 'yala_travel_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'yala_travel_top_header_enable',
        array(
            'section'     => 'yala_travel_top_header_section',
            'label'       => __( 'Enable/Disable Top Header Section.', 'yala-travel' ),
            'type'        => 'checkbox'
        )       
    );

    /**Top Header Enable/Disable Social Links */
    $wp_customize->add_setting(
        'yala_travel_top_header_social_links_enable',
        array(
            'default'           => 1,
            'sanitize_callback' => 'yala_travel_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'yala_travel_top_header_social_links_enable',
        array(
            'section'     => 'yala_travel_top_header_section',
            'label'       => __( 'Enable/Disable social links in top header(right).', 'yala-travel' ),
            'type'        => 'checkbox'
        )       
    );

    /**Top Header left section Enable/Disable  */
    $wp_customize->add_setting(
        'yala_travel_top_header_left_section_enable',
        array(
            'default'           => 1,
            'sanitize_callback' => 'yala_travel_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'yala_travel_top_header_left_section_enable',
        array(
            'section'     => 'yala_travel_top_header_section',
            'label'       => __( 'Enable/Disable top header Left section.', 'yala-travel' ),
            'type'        => 'checkbox'
        )       
    );


    /** Enable/Disable Auth Menu */
    $wp_customize->add_setting(
        'yala_travel_top_header_auth_menu_enable',
        array(
            'default'           => 1,
            'sanitize_callback' => 'yala_travel_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'yala_travel_top_header_auth_menu_enable',
        array(
            'section'     => 'yala_travel_top_header_section',
            'label'       => __( 'Enable/Disable Top Header Auth Section.', 'yala-travel' ),
            'type'        => 'checkbox'
        )       
    );

    /** Social Links */
    $wp_customize->add_setting( 
        new Yala_Travel_Repeater_Setting( 
            $wp_customize, 
            'top_header_social_links', 
            array(
                'default' => array(
                    array(
                        'font' => 'fa fa-facebook',
                        'link' => 'https://www.facebook.com/',                        
                    ),
                    array(
                        'font' => 'fa fa-linkedin',
                        'link' => 'https://www.linkedin.com/',
                    ),
                    array(
                        'font' => 'fa fa-twitter',
                        'link' => 'https://twitter.com/',
                    ),
                    array(
                        'font' => 'fa fa-google-plus',
                        'link' => 'https://plus.google.com',
                    )
                ),
                'sanitize_callback' => array( 'Yala_Travel_Repeater_Setting', 'sanitize_repeater_setting' ),
            ) 
        ) 
    );
    
    $wp_customize->add_control(
        new Yala_Travel_Control_Repeater(
            $wp_customize,
            'top_header_social_links',
            array(
                'section' => 'yala_travel_top_header_section',              
                'label'   => __( 'Social Links', 'yala-travel' ),
                'fields'  => array(
                    'font' => array(
                        'type'        => 'font',
                        'label'       => __( 'Font Awesome Icon', 'yala-travel' ),
                        'description' => __( 'Example: fa-facebook', 'yala-travel' ),
                    ),
                    'link' => array(
                        'type'        => 'url',
                        'label'       => __( 'Link', 'yala-travel' ),
                        'description' => __( 'Example: http://facebook.com', 'yala-travel' ),
                    )
                ),
                'row_label' => array(
                    'type' => 'field',
                    'value' => __( 'links', 'yala-travel' ),
                    'field' => 'link'
                )                        
            )
        )
    );


/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Middle Header section
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'yala_travel_middle_header_section',
    array(
        'priority'       => 3,
        'panel'          => 'yala_travel_header_settings_panel',
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Middle Header Section', 'yala-travel' ),
        'description'    => __( 'Managed the content display at middle header section.', 'yala-travel' ),
    )
);

/**Middle Header section Enable/Disable  */
$wp_customize->add_setting(
    'yala_travel_middle_header_enable',
    array(
        'default'           => 1,
        'sanitize_callback' => 'yala_travel_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'yala_travel_middle_header_enable',
    array(
        'section'     => 'yala_travel_middle_header_section',
        'label'       => __( 'Enable/Disable Middle Header Section.', 'yala-travel' ),
        'type'        => 'checkbox'
    )       
);


/**Middle Header Search section Enable/Disable  */
$wp_customize->add_setting(
    'yala_travel_search_header_enable',
    array(
        'default'           => 1,
        'sanitize_callback' => 'yala_travel_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'yala_travel_search_header_enable',
    array(
        'section'     => 'yala_travel_middle_header_section',
        'label'       => __( 'Enable/Disable Middle Header Search Section.', 'yala-travel' ),
        'type'        => 'checkbox'
    )       
);

/**Middle Header Shop Cart section Enable/Disable  */
$wp_customize->add_setting(
    'yala_travel_shop_cart_header_enable',
    array(
        'default'           => 1,
        'sanitize_callback' => 'yala_travel_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'yala_travel_shop_cart_header_enable',
    array(
        'section'     => 'yala_travel_middle_header_section',
        'label'       => __( 'Enable/Disable Middle Header Search Section.', 'yala-travel' ),
        'type'        => 'checkbox'
    )       
);
}