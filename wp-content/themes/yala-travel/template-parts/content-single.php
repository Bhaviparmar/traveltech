<?php
/**
 * Template part for displaying posts
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
			<?php the_content();?>
		</div>
	</div>
	<!-- Social Share -->
	<div class="share-social">
		<div class="row">
			<div class="col-12">
				<div class="content-tags">
					<h4><?php esc_html_e( 'Tags:','yala-travel' );?></h4>
					<ul class="tag-inner">
						<?php
						if(!empty($tags)):
							foreach ($tags as $tagged) {
	  							echo '<li><a href="'.esc_url(get_tag_link($tagged->term_id)).'">' . esc_attr($tagged->name) . '</a></li>,';
							}
						endif;
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--/ End Social Share -->
	</article>
	<div class="entry-content">
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'yala-travel' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
</div>