<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Travel_Escape
 */

get_header();
?>

	<main id="primary" class="site-main">

		<div class="container">
			<div class="row">

				<?php if ( 'left-sidebar' === travel_escape_get_theme_mod( 'layout_posts' ) ) { ?>
					<div class="col-lg-4 col-md-12">
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>

				<div class="<?php travel_escape_the_layout_class( 'layout_posts' ); ?> col-md-12">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', get_post_type() );

						the_post_navigation(
							array(
								'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'travel-escape' ) . '</span> <span class="nav-title">%title</span>',
								'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'travel-escape' ) . '</span> <span class="nav-title">%title</span>',
							)
						);

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
				</div>

				<?php if ( 'right-sidebar' === travel_escape_get_theme_mod( 'layout_posts' ) ) { ?>
					<div class="col-lg-4 col-md-12">
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>

			</div>
		</div>

	</main><!-- #main -->

<?php

get_footer();
