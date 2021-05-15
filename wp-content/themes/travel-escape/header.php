<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Travel_Escape
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'travel-escape' ); ?></a>

	<header id="masthead" class="site-header">

		<nav id="site-navigation" class="main-navigation navbar navbar-dark navbar-expand-lg">
			<div class="container">
				<div class="site-branding">
					<?php
					the_custom_logo();
					if ( is_front_page() && is_home() ) :
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					else :
						?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					endif;
					$travel_escape_description = get_bloginfo( 'description', 'display' );
					if ( $travel_escape_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $travel_escape_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
					<?php endif; ?>
				</div><!-- .site-branding -->
				<button class="navbar-toggler" data-toggle="collapse" data-target="#primary-menu-container" aria-expanded="false">
					<span></span>
					<span></span>
					<span></span>
				</button>
				<?php
				wp_nav_menu(
					array(
						'container_id'    => 'primary-menu-container',
						'container_class' => 'navbar-collapse collapse',
						'theme_location'  => 'menu-1',
						'menu_id'         => 'primary-menu',
						'fallback_cb'     => 'travel_escape_menu_fallback',
					)
				);

				if ( travel_escape_get_theme_mod( 'enable_cta_primary_button' ) ) {
					?>
					<div class="button-group">

						<?php if ( travel_escape_get_theme_mod( 'enable_cta_primary_button' ) ) { ?>
							<a href="<?php echo esc_url( travel_escape_get_theme_mod( 'cta_primary_link' ) ); ?>" class="btn btn-primary"><?php echo esc_html( travel_escape_get_theme_mod( 'cta_primary_label' ) ); ?></a>
						<?php } ?>

					</div>
					<?php
				}
				?>
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
	<?php
	travel_escape_breadcrumb();
