<?php
/**
* The main template file
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package Yala Travel
*/

get_header();
?>

<!-- Breadcrumb -->
<?php $header_bg_img = get_header_image();
if(!empty($header_bg_img)):?>
	<section class="breadcrumbs overlay" data-stellar-background-ratio="0.5" style="background: url(<?php echo esc_url(get_header_image());?>)">
<?php else:?>
<section class="breadcrumbs overlay" data-stellar-background-ratio="0.5">
<?php endif;?>	
	<div class="container">
		<div class="row">
			<div class="col-lg-6 offset-lg-3 col-12">
				<div class="bread-inner">
					<?php
					if ( is_archive() ) {
						the_archive_title( '<h2 class="entry-title">', '</h2>' );
					} else if ( is_search() ) {
						echo '<h2 class="entry-title">';
						/* translators: %s: search query. */
						printf( esc_html__( 'Search Result For: %s', 'yala-travel' ), '<span>' . get_search_query() . '</span>' );
						echo '</h2>';
					}

					else {
						echo '<h2 class="entry-title">';
						echo esc_html( get_the_title() );
						echo '</h2>';
					}?>
					<?php
					if ( is_archive() ) {
						the_archive_description( '<p>', '</p>' );
					}
					?>
					<ul class="bread-list">
						<li><a href="<?php echo esc_url(home_url());?>"><?php esc_html_e( 'Home', 'yala-travel' );?></a></li>
						<li><?php
					if ( is_archive() ) {
						the_archive_title( '<h2 class="entry-title">', '</h2>' );
					}
					else {
						
						echo esc_html( get_the_title() );
						
					}?></li>
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

					if ( is_home() && ! is_front_page() ) :
						?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
					<?php
					endif;

					/* Start the Loop */
					while ( have_posts() ) :
					the_post();

					/*
				 	* Include the Post-Type-specific template for the content.
				 	* If you want to override this in a child theme, then include a file
				 	* called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 	*/
					get_template_part( 'template-parts/content', 'archive' );

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