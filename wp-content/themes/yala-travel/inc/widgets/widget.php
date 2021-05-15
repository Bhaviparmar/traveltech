<?php
    /**
     * @package Yala Travel
    	=========================
    			WIDGET CLASS
    	=========================
     */

    // Footer widget
    require_once trailingslashit( get_template_directory() ) . '/inc/widgets/footer-section/footer-about-widgets.php';
    require_once trailingslashit( get_template_directory() ) . '/inc/widgets/footer-section/footer-location-widgets.php';
    require_once trailingslashit( get_template_directory() ) . '/inc/widgets/footer-section/footer-recent-news-widgets.php';
   
    // Register Widget
    if ( ! function_exists( 'yala_travel_register_widget' ) ) {
    /**
     * Load widget.
     *
     * @since 1.0.0
     */
    function yala_travel_register_widget() {

        // Footer widget register
        register_widget( 'Yala_Travel_Footer_About_Widget' );
        register_widget( 'Yala_Travel_Footer_Location_Widget' );
        register_widget( 'Yala_Travel_Footer_Recent_News' );
    }
}

add_action( 'widgets_init', 'yala_travel_register_widget' );