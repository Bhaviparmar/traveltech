<?php

add_action( 'elementor/widgets/widgets_registered', 'yala_travel_register_elementor_widgets' );
function yala_travel_register_elementor_widgets() {
	
	if ( defined( 'ELEMENTOR_PATH' ) && class_exists('Elementor\Widget_Base') ) {	
		require_once( get_template_directory() . '/elementor-widget/widgets/banner.php' );
		require_once( get_template_directory() . '/elementor-widget/widgets/top-service.php' );
		require_once( get_template_directory() . '/elementor-widget/widgets/featured-tours.php' );
		require_once( get_template_directory() . '/elementor-widget/widgets/popular-trips.php' );
		require_once( get_template_directory() . '/elementor-widget/widgets/destinations.php' );
		require_once( get_template_directory() . '/elementor-widget/widgets/services.php' );
		require_once( get_template_directory() . '/elementor-widget/widgets/blog.php' );
		require_once( get_template_directory() . '/elementor-widget/widgets/partners.php' );
 	}
}

add_action( 'elementor/init', function() {
	\Elementor\Plugin::$instance->elements_manager->add_category( 
		'yala_travel',
		[
			'title' => __( 'Yala Travel', 'yala-travel' ),
			'icon' => 'fa fa-plug' //default icon
		]
	);
});