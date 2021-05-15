<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Yala travel
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

<?php 
if ( function_exists( 'wp_body_open' ) ){
	wp_body_open();
}
else{ 
	do_action( 'wp_body_open' ); 
}
?>
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'yala-travel' ); ?></a>
<!-- Header Area -->
<header class="site-header">
	<!-- Start Topbar -->
	<?php get_template_part( 'header-parts/header', 'topbar' );?>
	<!--/ End Topbar -->
	
	<!-- Start Middle Header -->
	<?php get_template_part( 'header-parts/header', 'middle' );?>
	<!--/ End Middle Header -->

</header>
<!--/ End Header Area -->

<div id="content" class="site-content">