<?php
/**
 * Adventure Travelling: Customizer
 *
 * @package Adventure Travelling
 * @subpackage adventure_travelling
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function adventure_travelling_customize_register( $wp_customize ) {

	//add home page setting pannel
	$wp_customize->add_panel( 'adventure_travelling_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Home page Settings', 'adventure-travelling' ),
	    'description' => __( 'Description of what this panel does.', 'adventure-travelling' ),
	) );

	//TP Color Option
	$wp_customize->add_section('adventure_travelling_color_option',array(
        'title'         => __('TP Color Option', 'adventure-travelling'),
        'panel' => 'adventure_travelling_panel_id'
    ) );

	$wp_customize->add_setting( 'adventure_travelling_tp_color_option', array(
	    'default' => '#ffcc05',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'adventure_travelling_tp_color_option', array(
	    'description' => __('It will change the complete theme color in one click.', 'adventure-travelling'),
	    'section' => 'adventure_travelling_color_option',
	    'settings' => 'adventure_travelling_tp_color_option',
  	)));
  	$wp_customize->add_setting( 'adventure_travelling_tp_color_option_link', array(
	    'default' => '#d28d07',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'adventure_travelling_tp_color_option_link', array(
	    'description' => __('It will change the complete theme hover link color in one click.', 'adventure-travelling'),
	    'section' => 'adventure_travelling_color_option',
	    'settings' => 'adventure_travelling_tp_color_option_link',
  	)));

	//TP General Option
	$wp_customize->add_section('adventure_travelling_tp_general_settings',array(
        'title'         => __('TP General Option', 'adventure-travelling'),
        'panel' => 'adventure_travelling_panel_id'
    ) );

    $wp_customize->add_setting('adventure_travelling_tp_body_layout_settings',array(
        'default' => __('Full','adventure-travelling'),
        'sanitize_callback' => 'adventure_travelling_sanitize_choices'
	));
    $wp_customize->add_control('adventure_travelling_tp_body_layout_settings',array(
        'type' => 'radio',
        'label'     => __('Body Layout Setting', 'adventure-travelling'),
        'description'   => __('This option work for complete body, if you want to set the complete website in container.', 'adventure-travelling'),
        'section' => 'adventure_travelling_tp_general_settings',
        'choices' => array(
            'Full' => __('Full','adventure-travelling'),
            'Container' => __('Container','adventure-travelling'), 
            'Container Fluid' => __('Container Fluid','adventure-travelling')
        ),
	) );

    // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('adventure_travelling_sidebar_post_layout',array(
        'default' => __('right','adventure-travelling'),        
        'sanitize_callback' => 'adventure_travelling_sanitize_choices'	        
	));
	$wp_customize->add_control('adventure_travelling_sidebar_post_layout',array(
        'type' => 'radio',
        'label'     => __('Theme Sidebar Position', 'adventure-travelling'),
        'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'adventure-travelling'),
        'section' => 'adventure_travelling_tp_general_settings',
        'choices' => array(
            'full' => __('Full','adventure-travelling'),
            'left' => __('Left','adventure-travelling'), 
            'right' => __('Right','adventure-travelling'),
            'three-column' => __('Three Columns','adventure-travelling'),
            'four-column' => __('Four Columns','adventure-travelling'),
            'grid' => __('Grid Layout','adventure-travelling')
        ),
	) );

	// Add Settings and Controls for Page Layout
	$wp_customize->add_setting('adventure_travelling_sidebar_page_layout',array(
        'default' => __('right','adventure-travelling'),        
        'sanitize_callback' => 'adventure_travelling_sanitize_choices'	        
	));
	$wp_customize->add_control('adventure_travelling_sidebar_page_layout',array(
        'type' => 'radio',
        'label'     => __('Page Sidebar Position', 'adventure-travelling'),
        'description'   => __('This option work for pages.', 'adventure-travelling'),
        'section' => 'adventure_travelling_tp_general_settings',
        'choices' => array(
            'full' => __('Full','adventure-travelling'),
            'left' => __('Left','adventure-travelling'), 
            'right' => __('Right','adventure-travelling')
        ),
	) );

	//TP Blog Option
	$wp_customize->add_section('adventure_travelling_blog_option',array(
        'title' => __('TP Blog Option', 'adventure-travelling'),
        'panel' => 'adventure_travelling_panel_id'
    ) );

    $wp_customize->add_setting('adventure_travelling_remove_date',array(
       'default' => 'true',
       'sanitize_callback'	=> 'adventure_travelling_sanitize_checkbox'
    ));
    $wp_customize->add_control('adventure_travelling_remove_date',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Date Option','adventure-travelling'),
       'section' => 'adventure_travelling_blog_option',
    ));

    $wp_customize->add_setting('adventure_travelling_remove_author',array(
       'default' => 'true',
       'sanitize_callback'	=> 'adventure_travelling_sanitize_checkbox'
    ));
    $wp_customize->add_control('adventure_travelling_remove_author',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Author Option','adventure-travelling'),
       'section' => 'adventure_travelling_blog_option',
    ));

    $wp_customize->add_setting('adventure_travelling_remove_comments',array(
       'default' => 'true',
       'sanitize_callback'	=> 'adventure_travelling_sanitize_checkbox'
    ));
    $wp_customize->add_control('adventure_travelling_remove_comments',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Comment Option','adventure-travelling'),
       'section' => 'adventure_travelling_blog_option',
    ));

    $wp_customize->add_setting('adventure_travelling_remove_tags',array(
       'default' => 'true',
       'sanitize_callback'	=> 'adventure_travelling_sanitize_checkbox'
    ));
    $wp_customize->add_control('adventure_travelling_remove_tags',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Tags Option','adventure-travelling'),
       'section' => 'adventure_travelling_blog_option',
    ));

    $wp_customize->add_setting('adventure_travelling_remove_read_button',array(
       'default' => 'true',
       'sanitize_callback'	=> 'adventure_travelling_sanitize_checkbox'
    ));
    $wp_customize->add_control('adventure_travelling_remove_read_button',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Read More Button','adventure-travelling'),
       'section' => 'adventure_travelling_blog_option',
    ));

    $wp_customize->add_setting('adventure_travelling_read_more_text',array(
		'default'=> 'Read More',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('adventure_travelling_read_more_text',array(
		'label'	=> __('Edit Button Text','adventure-travelling'),
		'section'=> 'adventure_travelling_blog_option',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'adventure_travelling_excerpt_count', array(
		'default'              => 35,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'adventure_travelling_excerpt_count', array(
		'label'       => esc_html__( 'Edit Excerpt Limit','adventure-travelling' ),
		'section'     => 'adventure_travelling_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	// Top bar Section
	$wp_customize->add_section( 'adventure_travelling_topbar', array(
    	'title'      => __( 'Contact Details', 'adventure-travelling' ),
    	'description' => __( 'Add your contact details', 'adventure-travelling' ),
		'panel' => 'adventure_travelling_panel_id'
	) );

	$wp_customize->add_setting('adventure_travelling_location',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('adventure_travelling_location',array(
		'label'	=> __('Add Location','adventure-travelling'),
		'section'=> 'adventure_travelling_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('adventure_travelling_timming',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('adventure_travelling_timming',array(
		'label'	=> __('Add Timming','adventure-travelling'),
		'section'=> 'adventure_travelling_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('adventure_travelling_mail_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('adventure_travelling_mail_text',array(
		'label'	=> __('Add Text','adventure-travelling'),
		'section'=> 'adventure_travelling_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('adventure_travelling_mail',array(
		'default'=> '',
		'sanitize_callback'	=> 'adventure_travelling_sanitize_email'
	));	
	$wp_customize->add_control('adventure_travelling_mail',array(
		'label'	=> __('Add Mail Address','adventure-travelling'),
		'section'=> 'adventure_travelling_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('adventure_travelling_call_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('adventure_travelling_call_text',array(
		'label'	=> __('Add Text','adventure-travelling'),
		'section'=> 'adventure_travelling_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('adventure_travelling_call',array(
		'default'=> '',
		'sanitize_callback'	=> 'adventure_travelling_sanitize_phone_number'
	));	
	$wp_customize->add_control('adventure_travelling_call',array(
		'label'	=> __('Add Phone Number','adventure-travelling'),
		'section'=> 'adventure_travelling_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_section( 'adventure_travelling_social_media', array(
    	'title'      => __( 'Social Media Links', 'adventure-travelling' ),
    	'description' => __( 'Add your Social Links', 'adventure-travelling' ),
		'panel' => 'adventure_travelling_panel_id'
	) );

	$wp_customize->add_setting('adventure_travelling_facebook_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('adventure_travelling_facebook_url',array(
		'label'	=> __('Facebook Link','adventure-travelling'),
		'section'=> 'adventure_travelling_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('adventure_travelling_twitter_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('adventure_travelling_twitter_url',array(
		'label'	=> __('Twitter Link','adventure-travelling'),
		'section'=> 'adventure_travelling_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('adventure_travelling_google_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('adventure_travelling_google_url',array(
		'label'	=> __('Google Link','adventure-travelling'),
		'section'=> 'adventure_travelling_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('adventure_travelling_youtube_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('adventure_travelling_youtube_url',array(
		'label'	=> __('YouTube Link','adventure-travelling'),
		'section'=> 'adventure_travelling_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('adventure_travelling_pint_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('adventure_travelling_pint_url',array(
		'label'	=> __('Pinterest Link','adventure-travelling'),
		'section'=> 'adventure_travelling_social_media',
		'type'=> 'url'
	));	

	//home page slider
	$wp_customize->add_section( 'adventure_travelling_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'adventure-travelling' ),
		'panel' => 'adventure_travelling_panel_id'
	) );

	$wp_customize->add_setting('adventure_travelling_slider_arrows',array(
       'default' => 'false',
       'sanitize_callback'	=> 'adventure_travelling_sanitize_checkbox'
    ));
    $wp_customize->add_control('adventure_travelling_slider_arrows',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','adventure-travelling'),
       'section' => 'adventure_travelling_slider_section',
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'adventure_travelling_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'adventure_travelling_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'adventure_travelling_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'adventure-travelling' ),
			'section'  => 'adventure_travelling_slider_section',
			'type'     => 'dropdown-pages'
		) );
	}

	//From Our Blog
	$wp_customize->add_section('adventure_travelling_static_blog_section',array(
		'title'	=> __('Blog Section','adventure-travelling'),
		'description'=> __('This section will appear below the slider.','adventure-travelling'),
		'panel' => 'adventure_travelling_panel_id',
	));	

	$wp_customize->add_setting('adventure_travelling_blog_tittle',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('adventure_travelling_blog_tittle',array(
		'label'	=> __('Blog Title','adventure-travelling'),
		'section'	=> 'adventure_travelling_static_blog_section',
		'type'		=> 'text'
	));

	$post_list = get_posts();
	$i = 0;
	$pst[]='Select';	
	foreach($post_list as $post){
		$pst[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('adventure_travelling_static_blog_1',array(
		'sanitize_callback' => 'adventure_travelling_sanitize_choices',
	));
	$wp_customize->add_control('adventure_travelling_static_blog_1',array(
		'type'    => 'select',
		'choices' => $pst,
		'label' => __('Select post','adventure-travelling'),
		'section' => 'adventure_travelling_static_blog_section',
	));
	
	$wp_customize->add_setting('adventure_travelling_static_blog_2',array(
		'sanitize_callback' => 'adventure_travelling_sanitize_choices',
	));
	$wp_customize->add_control('adventure_travelling_static_blog_2',array(
		'type'    => 'select',
		'choices' => $pst,
		'label' => __('Select post','adventure-travelling'),
		'section' => 'adventure_travelling_static_blog_section',
	));
	
	$wp_customize->add_setting('adventure_travelling_static_blog_3',array(
		'sanitize_callback' => 'adventure_travelling_sanitize_choices',
	));
	$wp_customize->add_control('adventure_travelling_static_blog_3',array(
		'type'    => 'select',
		'choices' => $pst,
		'label' => __('Select post','adventure-travelling'),
		'section' => 'adventure_travelling_static_blog_section',
	));
	
	//footer
	$wp_customize->add_section('adventure_travelling_footer_section',array(
		'title'	=> __('Footer Text','adventure-travelling'),
		'description'	=> __('Add copyright text.','adventure-travelling'),
		'panel' => 'adventure_travelling_panel_id'
	));
	
	$wp_customize->add_setting('adventure_travelling_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('adventure_travelling_footer_text',array(
		'label'	=> __('Copyright Text','adventure-travelling'),
		'section'	=> 'adventure_travelling_footer_section',
		'type'		=> 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'adventure_travelling_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'adventure_travelling_customize_partial_blogdescription',
	) );

	$wp_customize->add_setting('adventure_travelling_site_title',array(
       'default' => 'true',
       'sanitize_callback'	=> 'adventure_travelling_sanitize_checkbox'
    ));
    $wp_customize->add_control('adventure_travelling_site_title',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Site Title','adventure-travelling'),
       'section' => 'title_tagline',
    ));

    $wp_customize->add_setting('adventure_travelling_site_tagline',array(
       'default' => 'true',
       'sanitize_callback'	=> 'adventure_travelling_sanitize_checkbox'
    ));
    $wp_customize->add_control('adventure_travelling_site_tagline',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Tagline','adventure-travelling'),
       'section' => 'title_tagline',
    ));

	$wp_customize->add_setting('adventure_travelling_logo_settings',array(
        'default' => __('Different Line','adventure-travelling'),
        'sanitize_callback' => 'adventure_travelling_sanitize_choices'
	));
    $wp_customize->add_control('adventure_travelling_logo_settings',array(
        'type' => 'radio',
        'label'     => __('Logo Layout Settings', 'adventure-travelling'),
        'description'   => __('Here you have two options 1. Logo and Site tite in differnt line. 2. Logo and Site title in same line.', 'adventure-travelling'),
        'section' => 'title_tagline',
        'choices' => array(
            'Different Line' => __('Different Line','adventure-travelling'),
            'Same Line' => __('Same Line','adventure-travelling')
        ),
	) );

	$wp_customize->add_setting('adventure_travelling_per_columns',array(
		'default'=> 3,
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('adventure_travelling_per_columns',array(
		'label'	=> __('Product Per Row','adventure-travelling'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));

	$wp_customize->add_setting('adventure_travelling_product_per_page',array(
		'default'=> 9,
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('adventure_travelling_product_per_page',array(
		'label'	=> __('Product Per Page','adventure-travelling'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));

    $wp_customize->add_setting('adventure_travelling_product_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'adventure_travelling_sanitize_checkbox'
    ));
    $wp_customize->add_control('adventure_travelling_product_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Shop page sidebar','adventure-travelling'),
       'section' => 'woocommerce_product_catalog',
    ));

    $wp_customize->add_setting('adventure_travelling_single_product_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'adventure_travelling_sanitize_checkbox'
    ));
    $wp_customize->add_control('adventure_travelling_single_product_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Product page sidebar','adventure-travelling'),
       'section' => 'woocommerce_product_catalog',
    ));
}
add_action( 'customize_register', 'adventure_travelling_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Adventure Travelling 1.0
 * @see adventure_travelling_customize_register()
 *
 * @return void
 */
function adventure_travelling_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Adventure Travelling 1.0
 * @see adventure_travelling_customize_register()
 *
 * @return void
 */
function adventure_travelling_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Adventure_Travelling_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Adventure_Travelling_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Adventure_Travelling_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'Travelling Pro Theme', 'adventure-travelling' ),
					'pro_text' => esc_html__( 'Upgrade Pro', 'adventure-travelling' ),
					'pro_url'  => esc_url('https://www.themespride.com/themes/wordpress-travel-theme/'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'adventure-travelling-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'adventure-travelling-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Adventure_Travelling_Customize::get_instance();