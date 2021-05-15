<?php
if ( 'yes' === $sample_tour['featured_tour_enable'] ):
	$tourTitle = $sample_tour['title'];
  	$tourViewMoreText = $sample_tour['more_detail_btn_text'];
?>
<!-- Featured Trips -->
<section class="fearured-trips section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="title-line center">
					<h2><?php echo esc_html($tourTitle);?></h2>
					<span class="title-border"></span>
				</div>
			</div> 
		</div>
		<div class="row">
			<div class="col-12">
				<div class="trips-main">
					<div class="trips-slider">
					  <?php
				      $tour_number = $sample_tour['no_of_post'];
				      $args = array(
				        'post_type' => 'product',
				      	'posts_per_page' => absint( $tour_number ),
				        'tax_query' => array(
			                array(
			                    'taxonomy' => 'product_visibility',
			                    'field'    => 'name',
			                    'terms'    => 'featured',
			                ),
			            ),

				      );

				      $tourloop = new WP_Query($args);

				      while ($tourloop->have_posts()) : 
				        $tourloop->the_post(); 
				     	$productData = wc_get_product(get_the_ID());
	                    $currency = get_woocommerce_currency_symbol();
	                    $sale = get_post_meta( get_the_ID(), '_sale_price', true);
                    	$metaboxD = get_post_meta( get_the_ID(), '_additional_info', true );
				        ?>
						<!-- Single Slider -->
						<div class="single-trip">
							<!-- Trip Head -->
							<div class="trip-head">
								<?php the_post_thumbnail('yala-travel-330-220'); ?>
							</div>
							<!-- Trip Details -->
							<div class="trip-details">
								<div class="content">
									<h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
									
									
									<div class="trip-meta">
										<?php
                                            if(isset($metaboxD['trip_duration'])){ ?>
										<span><i class="fa fa-clock-o"></i>
                                            <?php
                                                echo esc_html($metaboxD['trip_duration']);
                                            ?>
                                        </span>
                                       <?php  	}
                                          if(isset($metaboxD['group_size'])){  ?>
										<span><i class="fa fa-users"></i>
                                            <?php
                                        
                                                echo esc_html($metaboxD['group_size']);
                                            
                                            ?>
                                        </span>
                                    <?php } ?>
									</div>
									<?php the_excerpt();?>
								</div>
								<div class="trip-price">
									<a href="<?php the_permalink();?>" class="btn"><?php echo esc_html($tourViewMoreText);?></a>
									<p><?php esc_html_e('From','yala-travel');?><span><?php echo esc_html($currency);?> <?php echo esc_html($sale);?></span></p>
								</div>
							</div>
						</div>
						<!--/ End Single Slider -->
					 <?php endwhile; 
					 wp_reset_postdata();
        			 ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Featured Trips -->

<?php endif;?>