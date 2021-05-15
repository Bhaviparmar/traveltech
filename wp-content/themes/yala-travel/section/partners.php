<?php
if ( 'yes' === $sample_partners['partners_enable'] ):
  ?>

  <!-- Start Clients -->
    <div class="clients section">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="clients-slider">
              <?php if($sample_partners['partner_items'] ):
                  foreach( $sample_partners['partner_items'] as $key => $partner):?>
              <!-- Single Clients -->
              <div class="single-client">
                <a href="<?php echo esc_url($partner['partner_image']['url']);?>" target="_blank"><img src="<?php echo esc_url($partner['partner_image']['url']);?>" alt="#"></a>
              </div>
              <!--/ End Single Clients -->
               <?php 
              endforeach; endif;?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ End Clients -->

<?php endif;?>