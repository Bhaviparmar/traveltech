<?php
/**
 * Displays header site branding
 *
 * @package web-log
 * @version 1.0.0
 */
?>
<div class="site-branding">

	<?php if( has_custom_logo() ) { ?>
        <div class="custom-logo">
           <h1 class="site-title-logo"> <?php the_custom_logo(); ?></h1>
        </div>
	<?php } ?>
    <div class="site-branding-text">
        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <p class="site-description"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
    </div>

</div><!-- .site-branding -->
