<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Yala Travel
 */

get_header();
?>
<?php if(is_single()):
	  $singlePageUrl = get_the_post_thumbnail_url(get_the_ID());
	  $breadcrumb = get_post(get_the_ID());
  endif;
?>
<!-- Breadcrumb -->
<div class="breadcrumbs overlay" style="background-image:url(<?php echo esc_url($singlePageUrl);?>)" data-stellar-background-ratio="0.7">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 offset-lg-3 col-12">
				<div class="bread-inner">
					<h2><?php the_title();?></h2>
					
					<ul class="bread-list">
						<li><a href="<?php echo esc_url(home_url());?>"><?php esc_html_e('Home','yala-travel');?></a></li>
            			<li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<?php wp_reset_postdata();?> 
<!--/ End Breadcrumb -->
<!-- Start Blog Single -->
<section class="blog-single section">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-12">
				<div class="blog-single-main">
					<div class="row">
						<?php
						while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content', 'single' );
						the_post_navigation();
						?>
						<div class="col-12">
							<?php 
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;?>
						</div>	
						<?php endwhile; // End of the loop.?>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-12">
				<div class="main-sidebar">
					<?php get_sidebar();?>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Blog Single -->

<?php
get_footer();
?>