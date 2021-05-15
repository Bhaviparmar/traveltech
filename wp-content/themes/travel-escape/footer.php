<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Travel_Escape
 */

?>

	<footer id="colophon" class="site-footer">

		<?php if ( travel_escape_get_theme_mod( 'enable_footer_widgets' ) ) { ?>
			<div class="footer-widget-area">
				<div class="container">
					<div class="row">

						<?php if ( is_active_sidebar( 'footer-widget-1' ) ) { ?>
							<div class="col-lg-4">
								<?php dynamic_sidebar( 'footer-widget-1' ); ?>
							</div>
						<?php } ?>

						<?php if ( is_active_sidebar( 'footer-widget-2' ) ) { ?>
							<div class="col-lg-4">
								<?php dynamic_sidebar( 'footer-widget-2' ); ?>
							</div>
						<?php } ?>

						<?php if ( travel_escape_get_newsletter_form( 0, false ) ) { ?>
							<div class="col-lg-4">
								<div class="widget widget_newsletter">
									<?php if ( travel_escape_get_theme_mod( 'newsletter_heading' ) ) { ?>
										<h2 class="widget-title"><?php echo esc_html( travel_escape_get_theme_mod( 'newsletter_heading' ) ); ?></h2>
									<?php } ?>

									<?php
									if ( travel_escape_get_theme_mod( 'newsletter_description' ) ) {
										echo wp_kses_post( wpautop( travel_escape_get_theme_mod( 'newsletter_description' ) ) );
									}
									?>
									<?php travel_escape_get_newsletter_form(); ?>
								</div>
							</div>
						<?php } ?>

						<?php if ( is_active_sidebar( 'footer-widget-3' ) ) { ?>
							<div class="col-lg-4">
								<?php dynamic_sidebar( 'footer-widget-3' ); ?>
							</div>
						<?php } ?>

						<?php if ( is_active_sidebar( 'footer-widget-4' ) ) { ?>
							<div class="col-lg-4">
								<?php dynamic_sidebar( 'footer-widget-4' ); ?>
							</div>
						<?php } ?>

						<?php if ( is_active_sidebar( 'footer-widget-5' ) ) { ?>
							<div class="col-lg-4">
								<?php dynamic_sidebar( 'footer-widget-5' ); ?>
							</div>
						<?php } ?>

					</div>
				</div>
			</div>
		<?php } ?>

		<div class="footer-copyright">
			<div class="container">

				<div class="site-info">
					<?php echo wp_kses_post( travel_escape_get_theme_mod( 'copyright_text' ) ); ?>
				</div><!-- .site-info -->

				<?php
				$social_link_urls = travel_escape_get_social_link_url();

				if ( is_array( $social_link_urls ) && ! empty( $social_link_urls ) ) {
					?>
					<ul class="social-icons mb-0">
						<?php
						foreach ( $social_link_urls as $social_link_url ) {
							if ( ! $social_link_url ) {
								continue;
							}
							?>
							<li>
								<a href="<?php echo esc_url( $social_link_url ); ?>"></a>
							</li>
							<?php
						}
						?>
					</ul>
					<?php
				}
				?>

			</div>
		</div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
