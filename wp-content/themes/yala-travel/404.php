<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Yala Travel
 */

get_header();
?>
<?php $header_bg_img = get_header_image();
if(!empty($header_bg_img)):?>
<!-- Error Page -->
<section class="error-page overlay" style="background: url(<?php echo esc_url(get_header_image());?>)">
<?php else:?>
	<section class="error-page overlay">
<?php endif;?>	

	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-8 col-12">
				<!-- Error Inner -->
				<div class="error-inner">

					<h2><?php printf( esc_html__( '404: %s', 'yala-travel' ), '<span>Error</span>' );?></h2>
					<h4><?php esc_html_e('Page Not Found','yala-travel');?></h4>
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'yala-travel' ); ?></p>
				</div>
				<!-- Search Form -->
				<form method="POST" action="<?php echo esc_url(home_url('/'));?>" class="error-search-form">
					<input type="text"  placeholder="<?php esc_attr_e('Search','yala-travel');?>" value="<?php echo get_search_query(); ?>" name="s" aria-label="<?php esc_attr_e('Search','yala-travel');?>">
					<!-- Form Button -->
					<button class="elena-btn" type="submit"><i class="fa fa-search"></i></button>
					<!--/ End Form Button -->
				</form>			
				<!-- Button -->
				<div class="button">
					<a href="<?php echo esc_url(home_url());?>" class="btn primary"><i class="fa fa-home"></i><?php esc_html_e( 'Return To Home', 'yala-travel' ); ?></a>
				</div>
			</div>
		</div>
	</div>
</section>	
<!--/ End Error Page -->

<?php
get_footer();
?>