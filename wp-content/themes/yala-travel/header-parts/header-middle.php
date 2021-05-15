<!-- Header Bottom -->
<?php if(get_theme_mod( 'yala_travel_middle_header_enable', '1' )):?>
<div class="middle-header">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-2 col-12">
				<!-- Logo -->
				<div class="logo">

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
				$yala_travel_description = get_bloginfo( 'description', 'display' );
				if ( $yala_travel_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $yala_travel_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
				<?php endif; ?>
					
				</div>
				<!--/ End Logo -->
				<div class="mobile-nav"></div>
			</div>
			<div class="col-lg-9 col-md-10 col-12">
				<!-- Main Menu -->
				<div class="main-menu">
					<nav id="site-navigation" class="navigation main-navigation">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'yala-travel' ); ?></button>
						<?php
						if ( has_nav_menu( 'main-menu' ) ) :
						wp_nav_menu(
							array(
								'theme_location' => 'main-menu',
								'menu_id'        => 'primary-menu',
								'menu_class'        => 'nav menu',
								'fallback_cb'       => 'Yala_Travel_Navwalker::fallback',
								'walker'            => new Yala_Travel_Navwalker(),
							)
						);
						endif;
						?>
					</nav><!-- #site-navigation -->
				</div>
				<!--/ End Main Menu -->
				<div class="right-nav">
					<ul>
						<?php if(get_theme_mod( 'yala_travel_search_header_enable', '1' )):?>
						<li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
						<?php endif;?>
						<?php if(yala_travel_is_woocommerce_activated()):?>
						<?php if(get_theme_mod( 'yala_travel_shop_cart_header_enable', '1' )):
						global $woocommerce;
						$cart_contents_count = $woocommerce->cart->cart_contents_count;
						$cart_url = wc_get_cart_url();
						?>	
						<li><a href="<?php echo esc_url($cart_url);?>"><i class="fa fa-shopping-cart"></i> <span class="badge badge-light"><?php echo absint( $cart_contents_count );?></span></a></li>
						<?php endif;?>
						<?php endif;?>
					</ul>
					<!-- Search Form-->
					<div class="search-area">
						<div class="search-form">
							<form method="POST" action="<?php echo esc_url(home_url('/'));?>" class="form">
								<?php /* translators: Search Text */?>
								<input type="text"  placeholder="<?php esc_attr_e('Search','yala-travel');?>" value="<?php echo get_search_query(); ?>" name="s" aria-label="<?php esc_attr_e('Search','yala-travel');?>">
								<!-- Form Button -->
								<button type="submit" id="searchsubmit">
									<i class="fa fa-search"></i>  
								</button>
								<!--/ End Form Button -->
							</form>
						</div>
					</div>	
					<!--/ End Search Form -->
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif;?>