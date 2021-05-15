<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Yala Travel
 */

?>

<div class="col-12">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="image">
		<?php yala_travel_post_thumbnail(); ?>
	</div>
	<!-- Blog Details -->
	<div class="blog-detail">
		<h2 class="blog-title"><a href="<?php the_permalink();?>"><?php the_title();?></h2>
		<div class="blog-meta">
			<span class="author"><i class="fa fa-user"></i><?php the_author(); ?></span>
			<span class="author"><i class="fa fa-user"></i><i class="fa fa-calendar"></i><?php yala_travel_posted_on();?></span>
			<span class="author"><i class="fa fa-comments"></i><?php esc_html_e( 'Comments','yala-travel' );?> (<?php echo absint(get_comments_number());?>)</span>
		</div>
		<div class="content">
		
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'yala-travel' ),
				'after'  => '</div>',
			)
		);
		?>
	
		</div>
	</div>

	</article>
	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'yala-travel' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</div>
