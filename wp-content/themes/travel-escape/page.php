<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Travel_Escape
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="container">
			<div class="row">

				<?php if ( 'left-sidebar' === travel_escape_get_theme_mod( 'layout_pages' ) ) { ?>
					<div class="col-lg-4 col-md-12">
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>

				<div class="<?php travel_escape_the_layout_class( 'layout_pages' ); ?> col-md-12">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
				</div>

				<?php if ( 'right-sidebar' === travel_escape_get_theme_mod( 'layout_pages' ) ) { ?>
					<div class="col-lg-4 col-md-12">
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</main><!-- #main -->

<?php

get_footer();
