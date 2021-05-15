<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Yala Travel
 */

?>

<div class="col-lg-6 col-md-6 col-12">
	<!-- Single Blog -->
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="single-blog style2">
		<div class="blog-head">
			<?php 
				$categories = get_the_category(get_the_ID());
				$catName = isset($categories) ? $categories[0]->name : '';
				$catUrl = isset($categories) ? get_category_link($categories[0]->cat_ID) : '';
			?>
			<div class="date"><a href="<?php echo esc_url($catUrl);?>"><?php echo esc_html($catName);?></a></div>
			<?php yala_travel_post_thumbnail(); ?>
		</div>
		<!-- Blog Bottom -->
		<div class="blog-bottom">
			<h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
			<!-- Blog Meta -->
			<div class="blog-meta">
				<span><i class="fa fa-users"></i><?php yala_travel_posted_by();?></span>
				<span><i class="fa fa-comments-o"></i><?php echo esc_html(get_comments_number());?></span>
			</div>
			<?php the_excerpt(); ?>
			<a href="<?php the_permalink();?>" class="btn primary"><?php esc_html_e( 'Read more', 'yala-travel' );?><i class="fa fa-angle-right"></i></a>
		</div>
	</div>
	</article>
	<!-- End Single Blog -->
</div>
