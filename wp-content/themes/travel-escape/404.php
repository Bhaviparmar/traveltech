<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Travel_Escape
 */

get_header();
?>

	<main id="primary" class="site-main">

		<div class="container">
			<div class="row">

				<section class="error-404 not-found">
					<header class="page-header">
						<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'travel-escape' ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">

						<?php if ( has_nav_menu( '404-quick-links' ) ) { ?>
							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'travel-escape' ); ?></p>
							<?php
							wp_nav_menu(
								array(
									'theme_location' => '404-quick-links',
									'menu_id'        => '404-quick-links',
									'fallback_cb'    => false,
								)
							);
						} else {
							?>
							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'travel-escape' ); ?></p>
							<?php
						}
						?>
						<?php get_search_form(); ?>
					</div><!-- .page-content -->
				</section><!-- .error-404 -->

			</div>
		</div>

	</main><!-- #main -->

<?php

get_footer();

