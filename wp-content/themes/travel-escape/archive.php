<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Travel_Escape
 */

get_header();

?>

	<main id="primary" class="site-main">

		<div class="container">

			<?php get_template_part( 'template-parts/post-filters' ); ?>

			<div class="row">

				<?php if ( 'left-sidebar' === travel_escape_get_theme_mod( 'layout_archives_blogs' ) ) { ?>
					<div class="col-lg-4 col-md-12">
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>

				<div class="<?php travel_escape_the_layout_class( 'layout_archives_blogs' ); ?> col-md-12">
					<?php
					if ( have_posts() ) :
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/*
							* Include the Post-Type-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Type name) and that will be used instead.
							*/
							get_template_part( 'template-parts/content' );

						endwhile;

						travel_escape_pagination();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
				</div>

				<?php if ( 'right-sidebar' === travel_escape_get_theme_mod( 'layout_archives_blogs' ) ) { ?>
					<div class="col-lg-4 col-md-12">
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>

			</div>
		</div>

	</main><!-- #main -->

<?php

get_footer();
