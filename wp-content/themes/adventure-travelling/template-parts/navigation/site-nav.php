<?php 
/*
* Display Theme menus
*/
?>

<div class="menubar">
  	<div class="container right_menu">
  		<div class="row">
	    	<div class="menubox col-lg-11 col-md-10 col-8">
	      		<div class="innermenubox ">
	      			<?php if(has_nav_menu('primary-menu')){ ?>
			          	<div class="toggle-nav mobile-menu">
	            			<button onclick="adventure_travelling_open_nav()" class="responsivetoggle"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','adventure-travelling'); ?></span></button>
	          			</div>
          			<?php }?>
         	 		<div id="mySidenav" class="nav sidenav">
            			<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'adventure-travelling' ); ?>">
			              	<?php if(has_nav_menu('primary-menu')){
			                  	wp_nav_menu( array( 
				                    'theme_location' => 'primary-menu',
				                    'container_class' => 'main-menu clearfix' ,
				                    'menu_class' => 'clearfix',
				                    'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
				                    'fallback_cb' => 'wp_page_menu',
			                  	) );
			              	} ?>
              				<a href="javascript:void(0)" class="closebtn mobile-menu" onclick="adventure_travelling_close_nav()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','adventure-travelling'); ?></span></a>
	            		</nav>
	          		</div>
          			<div class="clearfix"></div>
        		</div>
	    	</div>	    	
	    	<div class="search-box col-lg-1 col-md-1 col-4">
		        <span><a href="#"><i class="fas fa-search"></i></a></span>
	      	</div>
	    </div>
	    <div class="serach_outer">
	      	<div class="serach_inner">
	        	<?php get_search_form(); ?>
	        </div>
      	</div>
  	</div>
</div>
