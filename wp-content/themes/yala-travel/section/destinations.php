<?php
if ( 'yes' === $sample_destination['destination_enable'] ):
  $dTitle = $sample_destination['title'];
  $dMoreDetailText = $sample_destination['more_detail_btn_text'];
  ?>
<!-- Popular Destinations -->
<section class="popular-countrys section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="title-line center">
					<h2><?php echo esc_html($dTitle);?></h2>
					<span class="title-border"></span>
				</div>
			</div> 
		</div>
		<div class="row">
			
		<?php
		$args = array(
		    'number'     => 3,
		    'orderby'    => 'slug',
		    'hide_empty' => false,
		    'parent'    => 0
			);
		$product_categories = get_terms( 'product_cat', $args );
		foreach( $product_categories as $cats ) :
			$linkurl = get_term_link($cats->name, 'product_cat');
			?>
			<div class="col-lg-4 col-md-6 col-12">
				<!-- Single Slider --> 
				<div class="single-country overlay">
					<div class="country-head">
						<?php $thumbnail_id = get_term_meta($cats->term_id, 'thumbnail_id', true);
				        // get the image URL for parent category
				        $image = wp_get_attachment_image_src($thumbnail_id,'yala-travel-360-440');?>
						<img src="<?php echo esc_url($image[0]);?>" alt="<?php echo esc_attr($cats->name);?>">
					</div>
					<div class="content">
						<span class="location"><?php echo esc_html($cats->name);?></span>
						
						<ul>
							<li><?php echo absint( $cats->count );?> <span> <?php esc_html_e( 'Tours', 'yala-travel' );?> </span></li>
						</ul>
						<p class="text"><?php echo esc_html($cats->description );?></p>
						<a href="<?php echo esc_url($linkurl);?>" class="btn primary"><?php echo esc_html($dMoreDetailText);?></a>
					</div>
				</div>
				<!-- End Single Slider --> 
			</div>
			<?php endforeach;?>


		</div>
	</div>
</section>
<!--/ End Popular Destinations -->
<?php endif;?>