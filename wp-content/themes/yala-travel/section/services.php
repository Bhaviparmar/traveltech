<?php
if ( 'yes' === $sample_services['services_enable'] ):
  $service_title = $sample_services['title'];
  ?>
<!-- Services -->
    <section class="services section">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="title-line center">
              <h2><?php echo esc_html($service_title);?></h2>
              <span class="title-border"></span>
            </div>
          </div> 
        </div>
        <div class="row">
        <?php for($k=0;$k<count($sample_services['service_items']);$k++):?>
         <div class="col-lg-4 col-md-4 col-12">
            <!-- single service -->
            <div class="single-service <?php echo esc_attr((($k==1) ? 'active' : ''));?>">
              <i class="<?php echo esc_attr($sample_services['service_items'][$k]['service_icon']);?>"></i>
             
                <h2><?php echo esc_html($sample_services['service_items'][$k]['service_title']);?></h2>
             
             
             
              <p><?php echo esc_html($sample_services['service_items'][$k]['service_description']);?></p>
              

                <?php if(!empty($sample_services['service_items'][$k]['service_readmore']['url'])):?>
                <a href="<?php echo esc_url($sample_services['service_items'][$k]['service_readmore']['url']);?>" class="btn"><?php esc_html_e('Read More','yala-travel');?></a>
                <?php endif;?>
            </div>
            <!--/ End single service -->
          </div>
        <?php  endfor;?> 
        </div>
      </div>
    </section>
    <!--/ End Services -->
<?php endif;?>