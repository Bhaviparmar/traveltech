<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Yala Travel
 */

?>
</div>  <!-- #content -->
<!-- Footer Area -->
<footer class="footer">
	<!-- Footer Top -->
	<?php if ( is_active_sidebar( 'footer' ) ): ?> 
	<div class="footer-top ">
		<div class="container">
			<div class="row">
				<?php 
					dynamic_sidebar( 'footer' );
				?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<!-- End Footer Top -->
	<!-- Copyright -->
	<div class="copyright">
		<div class="container">
			<div class="copyright-inner">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-12">
						<div class="copyright-content">
							<p> <?php /* translators: 1: Current Date, 2: Theme name, 3: Theme author. */
                     			printf( esc_html__( 'Copyright %1$s %2$s. All Rights Reserved. Powered by %3$s', 'yala-travel' ), esc_html(date('Y')), esc_html(get_bloginfo('name')), '<a href="http://yalathemes.com/">'.esc_html__('yalathemes','yala-travel').'</a>' );
                     			?>
                     	
                     		</p>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-12">
						<?php
							if ( has_nav_menu( 'bottom-footer-menu' ) ) :
							wp_nav_menu( array(
								'theme_location'    => 'bottom-footer-menu',
								'depth'             => 1,
								'menu_class'        => 'footer-links',
								'fallback_cb'       => 'Yala_Travel_Navwalker::fallback',
								'walker'            => new Yala_Travel_Navwalker(),
							));
							endif;
						?>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Copyright -->
</footer>
<!-- End Footer Area -->


<?php wp_footer(); ?>

</body>
</html>
