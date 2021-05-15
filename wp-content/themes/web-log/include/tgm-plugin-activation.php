<?php
/**
 * Recommended plugins
 *
 * @package web-log
 * @version 1.0.0
 */
if ( ! function_exists( 'web_log_recommended_plugins' ) ) :
	/**
	 * Recommend plugins.
	 *
	 * @since 1.0.0
	 */
	function web_log_recommended_plugins() {
		
		$plugins = array(

			array(
				'name'     => esc_html__( 'Thememiles Toolset', 'web-log' ),
				'slug'     => 'thememiles-toolset',
				'required' => false,
			),

			array(
				'name'     => esc_html__( 'Getwid – Gutenberg Blocks', 'web-log' ),
				'slug'     => 'getwid',
				'required' => false,
			),
				

		);
		tgmpa( $plugins );
	}
endif;
add_action( 'tgmpa_register', 'web_log_recommended_plugins' );
