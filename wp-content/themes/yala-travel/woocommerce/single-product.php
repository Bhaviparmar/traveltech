<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see       https://docs.woocommerce.com/document/template-structure/
 * @author    wpcodethemes
 * @package   WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

get_header('shop');
$productData = wc_get_product(get_the_ID());

$attachment_ids = $productData->get_gallery_image_ids();
$short_description = $productData->get_short_description();
$currency = get_woocommerce_currency_symbol();
$price = $productData->get_sale_price();
$attributes = $productData->get_attributes();

?>
<?php if(is_single()):
  $singlePageUrl = get_the_post_thumbnail_url(get_the_ID());
  endif;
?>

<!-- Breadcrumb -->
<div class="breadcrumbs overlay" style="background-image:url(<?php echo esc_url($singlePageUrl);?>)" data-stellar-background-ratio="0.7">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 offset-lg-3 col-12">
        <div class="bread-inner">
          <h2><?php the_title();?></h2>
         
          <ul class="bread-list">
            <li><a href="<?php echo esc_url(home_url());?>"><?php esc_html_e('Home','yala-travel');?></a></li>
            <li><a href="<?php echo esc_url(get_permalink( $productData->get_id() ));?>"><?php echo esc_html($productData->get_name());?></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
  <?php wp_reset_postdata();?> 
<!--/ End Breadcrumb -->
<!-- Trip Single -->
    <section class="trip-single section">
      <div class="container">
        <div class="row"> 
          <div class="col-lg-8 col-12">
            <!-- Trip Slider -->
            <div class="product-gallery">
              <!-- Images slider -->
              <div class="flexslider-thumbnails">
                <ul class="slides">
                  <?php foreach( $attachment_ids as $attachment_id ):
                    $Original_image_url = wp_get_attachment_url( $attachment_id )
                    ?> 
                  <li data-thumb="<?php echo esc_url($Original_image_url);?>" rel="adjustX:10, adjustY:">
                    <img src="<?php echo esc_url($Original_image_url);?>" alt="#">
                  </li>
                  <?php endforeach;?>
                  
                </ul>
              </div>
              <!-- End Images slider -->
            </div>
            <div class="single-tour-content">
              <?php the_excerpt();?>
            </div>
            <div class="trip-tab">
              <div class="trip-tab-inner">
                 <!-- Tab Nav -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                 <?php if(get_the_content()){ ?>
                         <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#description" role="tab"><?php esc_html_e('Description','yala-travel');?></a></li>
                 <?php  } ?>
                 <?php
                      $itinerary_repeatable_fields = get_post_meta($productData->get_id(), 'ytc_itinerary_repeatable_fields', true);
                       if(isset($itinerary_repeatable_fields) && !empty($itinerary_repeatable_fields) ):  ?>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#itinerary" role="tab"><?php esc_html_e('Itinerary','yala-travel');?></a></li>
                       <?php endif; ?>

                    <?php $include_excludes = get_post_meta( get_the_ID(), 'ytc_include_exclude', true );?>
                    <?php
                       if(isset($include_excludes) && !empty($include_excludes) ):  ?>
                           <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#include-exclude" role="tab"><?php esc_html_e('Include/Exclude','yala-travel');?></a></li>
                       <?php endif; ?>
                    <?php $additional_info = get_post_meta( get_the_ID(), 'ytc_additional_info', true );?>
                    <?php if(isset($additional_info['accomodation']) && !empty($include_excludes) ):  ?>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#accomodation" role="tab"><?php esc_html_e('Accomodation','yala-travel');?></a></li>
                    <?php endif; ?>

                    <?php $map_routes = get_post_meta( get_the_ID(), 'ytc_map_route', true );?>
                    <?php if(isset($map_routes) && !empty($map_routes) ):  ?>
                       <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#map-route" role="tab"><?php esc_html_e('Map','yala-travel');?></a></li>
                    <?php endif; ?>

                    
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#review" role="tab"><?php esc_html_e('Review','yala-travel');?></a></li>
                    

                </ul>
                <!--/ End Tab Nav -->                              
                <div class="tab-content" id="myTabContent">
                  <!-- Tab Single -->
                  <div class="tab-pane fade" id="include-exclude" role="tabpanel" >
                    <?php $include_excludes = get_post_meta( get_the_ID(), 'ytc_include_exclude', true );?>
                   <?php echo isset($include_excludes) ? apply_filters('the_content', $include_excludes) : '';?>
                  </div>
                  <!--/ End Tab Single -->

                  <!-- Tab Single -->
                  <div class="tab-pane fade" id="accomodation" role="tabpanel" >
                    <?php $additional_info = get_post_meta( get_the_ID(), 'ytc_additional_info', true );?>
                   <?php if(isset($additional_info['accomodation'])) 
                      echo esc_html($additional_info['accomodation']);
                    ?>
                  </div>
                  <!--/ End Tab Single -->

                   <!-- Tab Single -->
                  <div class="tab-pane fade" id="map-route" role="tabpanel" >
                    <?php $map_routes = get_post_meta( get_the_ID(), 'ytc_map_route', true );?>
                     <?php echo isset($map_routes) ? apply_filters('the_content', $map_routes) : '';?>
                  </div>
                  <!--/ End Tab Single -->


                  <!-- Tab Single -->
                  <div class="tab-pane fade" id="description" role="tabpanel" >
                   <?php the_content();?>
                  </div>
                  <!--/ End Tab Single -->
                  <!-- Tab Single -->
                  <div class="tab-pane fade" id="itinerary" role="tabpanel" >
                    <?php 
                      $itinerary_repeatable_fields = get_post_meta($productData->get_id(), 'ytc_itinerary_repeatable_fields', true);
                     
                      if(isset($itinerary_repeatable_fields) && !empty($itinerary_repeatable_fields) ):
                        foreach($itinerary_repeatable_fields as $itn):
                    ?> 
                    <h4 class="sub-title"><?php echo esc_html($itn['name']);?></h4>
                    <p><?php echo esc_html($itn['desc']);?>
                    <?php 
                    endforeach;
                  endif;?>
                    
                  </div>
                  <!--/ End Tab Single -->

                  <div class="tab-pane fade" id="review" role="tabpanel">
                    <?php
                      comments_template();
                    ?>
                  </div>
                </div>
              </div>
              <!--/ End Post Tab -->
            </div>
          </div>
          <div class="col-lg-4 col-12">
            <!-- Trip Sidebar -->
            <div class="tour-sidebar">
              <!-- Trip list -->
              <div class="single-widget trip-details">
                <h2><?php esc_html_e('Details','yala-travel');?></h2>
                <div class="trip-list">
                  <!-- single list -->
                  <div class="single-list">
                    <div class="left">
                    <?php 
                    $categories = get_the_terms ( get_the_ID(), 'product_cat' );
                    
                    esc_html_e( 'Category', 'yala-travel' ) ;?></div>
                    <div class="right"><?php foreach($categories as $cats){ echo esc_html($cats->name); }?> </div>
                  </div>
                  <!--/ End single list -->
                  <!-- single list -->
                  <div class="single-list">
                    <div class="left"><?php esc_html_e( 'Price:', 'yala-travel' ) ;?> </div>
                    <div class="right"><?php echo esc_html($currency);?> <?php echo esc_html($price);?></div>
                  </div>
                  <!--/ End single list -->
                  <!-- single list -->
                  <?php if(isset($additional_info['group_size'])  && !empty($additional_info['group_size']) ):?>
                  <div class="single-list">
                      <div class="left"><?php esc_html_e( 'Group Size:', 'yala-travel' ) ;?></div>
                      <div class="right"><?php echo esc_html($additional_info['group_size']);?></div>
                  </div>
                  <?php endif;?>
                  <?php if(isset($additional_info['trip_duration'])  && !empty($additional_info['trip_duration']) ):?>
                  <div class="single-list">
                      <div class="left"><?php esc_html_e( 'Trip Duration:', 'yala-travel' ) ;?></div>
                      <div class="right"><?php echo esc_html($additional_info['trip_duration']);?></div>
                  </div>
                  <?php endif;?>
                  <?php if(isset($additional_info['trekking_duration'])  && !empty($additional_info['trekking_duration']) ):?>
                  <div class="single-list">
                      <div class="left"><?php esc_html_e( 'Trek Duration:', 'yala-travel' ) ;?></div>
                      <div class="right"><?php echo esc_html($additional_info['trekking_duration']);?></div>
                  </div>
                  <?php endif;?>
                  <?php if(isset($additional_info['max_altitude'])  && !empty($additional_info['max_altitude']) ):?>
                  <div class="single-list">
                      <div class="left"><?php esc_html_e( 'Max Altitude:', 'yala-travel' ) ;?></div>
                      <div class="right"><?php echo esc_html($additional_info['max_altitude']);?></div>
                  </div>
                   <?php endif;?>
                  <?php if(isset($additional_info['difficulty'])  && !empty($additional_info['difficulty']) ):?>
                  <div class="single-list">
                      <div class="left"><?php esc_html_e( 'Difficulty:', 'yala-travel' ) ;?></div>
                      <div class="right"><?php echo esc_html($additional_info['difficulty']);?></div>
                  </div>
                  <?php endif;?>
                  <?php if(isset($additional_info['best_season'])  && !empty($additional_info['best_season']) ):?>
                  <div class="single-list">
                      <div class="left"><?php esc_html_e( 'Best Season:', 'yala-travel' ) ;?></div>
                      <div class="right"><?php echo esc_html($additional_info['best_season']);?></div>
                  </div>
                  <?php endif;?>
                  <?php if(isset($additional_info['remoteness'])  && !empty($additional_info['remoteness']) ):?>
                  <div class="single-list">
                      <div class="left"><?php esc_html_e( 'Remote:', 'yala-travel' ) ;?></div>
                      <div class="right"><?php echo esc_html($additional_info['remoteness']);?></div>
                  </div>
                  <?php endif;?>
                <?php if(isset($additional_info['restricted_permits'])  && !empty($additional_info['required_permits']) ):?>
                  <div class="single-list">
                      <div class="left"><?php esc_html_e( 'Restricted Permits:', 'yala-travel' ) ;?></div>
                      <div class="right"><?php echo esc_html($additional_info['restricted_permits']);?></div>
                  </div>
                  <?php endif;?>
                  <?php if(isset($additional_info['required_permits']) && !empty($additional_info['required_permits'])):?>
                   <div class="single-list">
                      <div class="left"><?php esc_html_e( 'Required permits:', 'yala-travel' ) ;?></div>
                      <div class="right"><?php echo esc_html($additional_info['required_permits']);?></div>
                  </div>
                <?php endif;?>
                  <?php 
                  foreach($attributes as $at=>$attribute){?>
                  <div class="single-list">
                    <div class="left"><?php echo esc_html($attribute['name']);?></div>
                    <div class="right"><?php echo esc_html($attribute['options'][0]);?></div>
                  </div>
                  <?php }?>
                  <!--/ End single list -->
                 
                  <div class="button">
                    <a href="<?php echo esc_url( $productData->add_to_cart_url());?>" class="btn active"><?php esc_html_e('Book now','yala-travel');?></a>
                  </div>
                </div>
              </div>
              <!--/ End Trip list -->
            </div>
            <!--/ End Trip Sidebar -->
          </div>
        </div>
      </div>
    </section>
    <!--/ End Trip Single -->
<?php

get_footer('shop');
