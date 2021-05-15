<?php
if ( 'yes' === $sample_popular['popular_trips_enable'] ):
	$popularTitle = $sample_popular['title'];
?>
<!-- Popular Trips -->
<section class="popular-trips section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="title-line center">
					<h2><?php echo esc_html( $popularTitle );?></h2>
					<span class="title-border"></span>
				</div>
			</div> 
		</div>
		<div class="row">
		<?php
		$tour_number = $sample_popular['no_of_post'];
		$hot_args = array(
        'post_type' => 'product',
        'posts_per_page' => absint( $tour_number ),
        'orderby' =>'meta_value_num',
        'meta_key'  => 'total_sales',
        'order'     => 'desc'
        );        
        $hot_query = new WP_Query( $hot_args );
        $total_post = $hot_query->post_count;
        ?>     
        <?php
        if ( $hot_query->have_posts() ) {
            while ( $hot_query->have_posts() ) {
                $hot_query->the_post();
                $productData = wc_get_product(get_the_ID());
                $currency = get_woocommerce_currency_symbol();
                $sale = get_post_meta( get_the_ID(), '_sale_price', true);
                ?>
			<div class="col-lg-4 col-md-4 col-12">
				<!-- Single Trip -->
				<div class="single-trip">
					<!-- Trip Head -->
					<div class="trip-head overlay">
						<?php the_post_thumbnail('yala-travel-330-220'); ?>
						<h4 class="cost"><?php echo esc_html($currency);?> <?php echo esc_html( $sale );?> </h4>
					</div>
					<!-- Trip Details -->
					<div class="trip-details">
						<!-- Trip Middle -->
						<div class="trip-middle">
							<h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
							<?php 
								$categories = get_the_terms ( get_the_ID(), 'product_cat' );
								$catName = isset($categories) ? $categories[0]->name : '';
								$catUrl = isset($categories) ? get_category_link($categories[0]->cat_ID) : '';
							?>
							<div class="meta"><i class="fa fa-map-marker"></i><?php echo esc_html($catName);?></div>
							<?php the_excerpt();?>
						</div>
						
					</div>
				</div>
				<!--/ End Single Trip -->
			</div>
			<?php  }
			}
			wp_reset_postdata();
			?>
		</div>
	</div>
</section>
<!--/ End Popular Trips -->
<?php endif;?>