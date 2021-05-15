<!-- Start Topbar -->
<?php if(get_theme_mod( 'yala_travel_top_header_enable', '1' )):?>
<div class="topbar">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-12">
			<?php if(get_theme_mod( 'yala_travel_top_header_left_section_enable', '1' )):?>
				<?php
					if ( has_nav_menu( 'top-header-menu' ) ) :
					wp_nav_menu( array(
						'theme_location'    => 'top-header-menu',
						'depth'             => 1,
						'menu_class'        => 'top-links',
						'fallback_cb'       => 'Yala_Travel_Navwalker::fallback',
						'walker'            => new Yala_Travel_Navwalker(),
					));
					endif;
				?>
			<?php endif;?>
			</div>
			<div class="col-lg-6 col-md-6 col-12">
				<div class="top-right">
					<!-- Social -->
					<?php if(get_theme_mod( 'yala_travel_top_header_social_links_enable', '1' )):?>
					<ul class="social">
						<?php yala_travel_top_header_social_links();?>
					</ul>
					<?php endif;?>
					<!--/ End Social -->
					<?php if(get_theme_mod( 'yala_travel_top_header_auth_menu_enable', '1' )):?>
					<?php if(yala_travel_is_woocommerce_activated()):?>
					<div class="top-btn">
						<div class="btn">
							<?php if ( is_user_logged_in() ) { ?>
                                <a href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') )); ?>" title="<?php esc_attr_e('My Account','yala-travel'); ?>"><?php esc_html_e('My Account','yala-travel'); ?></a>/ 
                                <a href="<?php echo esc_url(wp_logout_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ));?>" title="<?php esc_attr_e('Logout','yala-travel'); ?>"><?php esc_html_e('Logout','yala-travel'); ?></a>
                            <?php } 
                            else { ?>
                                <a href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') )); ?>" title="<?php esc_attr_e('Login / Register','yala-travel'); ?>"><?php esc_html_e('Login / Register','yala-travel'); ?></a>
                            <?php } ?>
                        </div>
					</div>
                    <?php endif;?>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif;?>
<!--/ End Topbar -->