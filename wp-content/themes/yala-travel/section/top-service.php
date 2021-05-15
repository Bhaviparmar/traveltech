<?php
if ( 'yes' === $sample_top_service['top_service_enable'] ):?>
<section class="utravel-features">
      <div class="container">
        <div class="utravel-inner">
          <div class="row">
            <div class="col-lg-6 col-12" style="padding-right:0;">
              <div class="feature-content">
                <div class="row">
             
                <?php for($k=0;$k<count($sample_top_service['service_items']);$k++):?>
                <div class="col-lg-6 col-md-6 col-12">
                    <!-- Single Feature -->
                    <div class="single-feature">
                      <i class="<?php echo esc_attr($sample_top_service['service_items'][$k]['service_icon']);?>"></i>
                        <h3><?php echo esc_html($sample_top_service['service_items'][$k]['service_title']);?></h3>
                        <p><?php echo esc_html($sample_top_service['service_items'][$k]['service_description']);?></p>
                    </div>
                    <!-- End Single Feature -->
                  </div>  
                <?php 
                  endfor;
                ?> 
              
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-12">
              <div class="feature-right">
                <?php $service_image = $sample_top_service['top_service_image'];
                //print_r($service_image);
                ?>
                <img src="<?php echo esc_url($service_image['url']);?>" alt="#">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php endif;?>