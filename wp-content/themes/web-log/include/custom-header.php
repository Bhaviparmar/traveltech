<?php
/**
 * Custom Header functionality for Web Log
 *
 * @package Web Log
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses web_log_custom_header_style()
 */
function web_log_custom_header_setup() {

	add_theme_support(
		'custom-header',
		apply_filters(
			'web_log_custom_header_args',
			array(
				'width'              => 1600,
				'height'             => 200,
				'wp-head-callback'   => 'web_log_custom_header_style',
			)
		)
	);
}
add_action( 'after_setup_theme', 'web_log_custom_header_setup' );


if ( ! function_exists( 'web_log_custom_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see web_log_custom_header_setup()
	 */
	function web_log_custom_header_style() {
		$header_image = get_header_image();

		// If no custom options for text are set, let's bail.
		if ( empty( $header_image ) && display_header_text() ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css" id="web_log-header-css">
		<?php
			// Has a Custom Header been added?
		if ( ! empty( $header_image ) ) :
			?>
		.header-logo {

			/*
			 * No shorthand so the Customizer can override individual properties.
			 * @see https://core.trac.wordpress.org/ticket/31460
			 */
			background-image: url(<?php header_image(); ?>);
			background-repeat: no-repeat;
			background-position: 50% 50%;
			-webkit-background-size: cover;
			-moz-background-size:    cover;
			-o-background-size:      cover;
			background-size:         cover;
		}
			<?php
		endif;

		// Has the text been hidden?
		if ( ! display_header_text() ) :
			?>
		.site-title,
		.site-description {
			clip: rect(1px, 1px, 1px, 1px);
			position: absolute;
		}
	<?php endif; ?>
	</style>
		<?php
	}
endif; // web_log_custom_header_style()
