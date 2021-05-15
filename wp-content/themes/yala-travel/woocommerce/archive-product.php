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
 * @version   3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

get_header('shop');?>
<!-- Breadcrumb -->
<!-- Breadcrumb -->
<?php $header_bg_img = get_header_image();
if(!empty($header_bg_img)):?>
  <section class="breadcrumbs overlay" data-stellar-background-ratio="0.5" style="background: url(<?php echo esc_url(get_header_image());?>)">
<?php else:?>
<section class="breadcrumbs overlay" data-stellar-background-ratio="0.5" style="background: url(<?php echo esc_url(yala_travel_woocommerce_category_image());?>)">
<?php endif;?>  
  <div class="container">
    <div class="row">
      <div class="col-lg-6 offset-lg-3 col-12">
        <div class="bread-inner">
          <?php
          if ( is_archive() ) {
            the_archive_title( '<h2>', '</h2>' );
          }
          else {
            echo '<h2 class="entry-title">';
            echo esc_html( get_the_title() );
            echo '</h2>';
          }?>
          <?php
          if ( is_archive() ) {
            the_archive_description( '<p>', '</p>' );
          }
          ?>
          <ul class="bread-list">
            <li><a href="<?php echo esc_url(home_url());?>">Home</a></li>
            <li><a href="#"><?php
          if ( is_archive() ) {
            the_archive_title();
          } 
          ?></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ End Breadcrumb -->

<!-- Featured Trips -->
    <section class="fearured-trips section">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="title-line center">
              <h2><?php esc_html_e('Tour Package','yala-travel');?></h2>
              <span class="title-border"></span>
            </div>
          </div> 
        </div>
        <div class="row">
            <?php

            if ( get_query_var( 'taxonomy' ) ) {
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 10,
                'paged' => get_query_var( 'paged' ),
                'tax_query' => array(
                    array(
                        'taxonomy' => get_query_var( 'taxonomy' ),
                        'field'    => 'slug',
                        'terms'    => get_query_var( 'term' ),
                    ),
                ),
            );
           
           
            $products = new WP_Query( $args );
            // Standard loop
            if ( $products->have_posts() ) :
                while ( $products->have_posts() ) : $products->the_post();?>
                <div class="col-lg-4 col-md-6 col-12">
                  <div class="single-trip">
              
                    <div class="trip-head">
                      <?php the_post_thumbnail();?>
                    </div>
                    
                    <div class="trip-details">
                      <div class="content">
                        <h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
                        <div class="trip-meta">
                        </div>
                        <?php the_excerpt();?>
                      </div>
                      <?php
                      $productData = wc_get_product(get_the_ID());
                            $currency = get_woocommerce_currency_symbol();
                            $sale = get_post_meta( get_the_ID(), '_sale_price', true);
                            ?>
                      <div class="trip-price">
                        <?php /* translators: View more text */?>
                        <a href="<?php the_permalink();?>" class="btn"><?php esc_html_e('View More','yala-travel');?></a>
                        <?php /* translators: From Text */?>
                        <p><?php esc_html_e('From','yala-travel');?><span><?php echo esc_html($currency);?> <?php echo esc_html($sale);?></span></p>
                      </div>
                    </div>
                  </div>
                </div>
               <?php
                  endwhile;
                wp_reset_postdata();
              endif;
            } 
            ?>          
        </div>
      </div>
    </section>
    <!--/ End Featured Trips -->
<?php

get_footer('shop');