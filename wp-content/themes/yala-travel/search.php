<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Yala Travel
 */

get_header();
?>

<!-- Breadcrumb -->
<?php $header_bg_img = get_header_image();
if(!empty($header_bg_img)):?>
	<section class="breadcrumbs overlay" data-stellar-background-ratio="0.7" style="background: url(<?php echo esc_url(get_header_image());?>)">
<?php else:?>
<section class="breadcrumbs overlay" data-stellar-background-ratio="0.7">
<?php endif;?>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 offset-lg-3 col-12">
				<div class="bread-inner">
					<h2><?php esc_html_e( 'Search Results', 'yala-travel' );?></h2>
					<ul class="bread-list">
						<li><a href="<?php echo esc_url(home_url());?>"><?php esc_html_e( 'Home', 'yala-travel' );?></a></li>
						<li><?php echo esc_html(get_search_query());?></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Breadcrumb -->

<!-- Blogs Area -->
<section class="blogs-main archive section">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-12">
				<div class="row">
					<!-- Single Blog -->
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
					get_template_part( 'template-parts/content', 'search' );

					endwhile;

					else :

					get_template_part( 'template-parts/content', 'none' );

					endif;?>
		
				<!-- End Single Blog -->
				</div>
				
				<div class="row">
					<div class="col-12">
						<!-- Start Pagination -->
						<div class="pagination-main">
							<ul class="pagination">
								<?php the_posts_pagination();?>
								
							</ul>
						</div>
						<!--/ End Pagination -->
					</div>
				</div>		
			</div>
			<div class="col-lg-4 col-12">
				<div class="main-sidebar">
					<?php if ( is_active_sidebar( 'sidebar-1' ) ) : 
						get_sidebar(); 
					endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Blogs Area -->

<?php
get_footer();
?>