<?php
if ( 'yes' === $sample_banner['banner_enable'] ):

$banner_tagline     = $sample_banner['title'];
$banner_btn_text_1  = $sample_banner['btn_title_1'];
$banner_btn_url_1   = $sample_banner['btn_url_1']['url'];
$banner_btn_text_2  = $sample_banner['btn_title_2'];
$banner_btn_url_2   = $sample_banner['btn_url_2']['url'];
$banner_title       = $sample_banner['banner_title'];
$banner_image       = $sample_banner['banner_image'];
?>

<!-- Hero Area -->
  <section class="hero-area">
    <?php if(!empty($banner_image)):?>
    <div class="hero-area-inner" style="background-image:url(<?php echo esc_url($banner_image['url']);?>)">
      <?php else:?>
        <div class="hero-area-inner" style="background: url(<?php echo esc_url(get_header_image());?>)">
      <?php endif;?>
       <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-8 col-12">
            <div class="hero-welcome-text">
              <h1>
                <span><?php echo esc_html($banner_tagline);?></span>
                <?php 
                if(!empty($banner_title)):
                  echo esc_html($banner_title);
                endif;
                ?>
              </h1>
              <!-- Button -->
              <div class="button">
              <?php if(!empty($banner_btn_url_1)):?>
                <a href="<?php echo esc_url($banner_btn_url_1);?>" class="btn primary"><?php echo esc_html($banner_btn_text_1);?></a>
              <?php endif;?>
              <?php if(!empty($banner_btn_url_2)):?>
                <a href="<?php echo esc_url($banner_btn_url_2);?>" class="btn"><?php echo esc_html($banner_btn_text_2);?></a>
               <?php endif;?>
              </div>
              <!--/ End Button -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ End Hero Area -->

<?php endif;?>