<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * Template Name: Left Sidebar
 *
 * @package Travel_Escape
 */

get_header();
?>

	<main id="primary" class="site-main">

		<div class="container">
			<div class="row left-sidebar">

				<div class="col-lg-4 col-md-12">
					<?php get_sidebar(); ?>
				</div>

				<div class="col-lg-8 col-md-12">
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

			</div>
		</div>

	</main><!-- #main -->

<?php

get_footer();
