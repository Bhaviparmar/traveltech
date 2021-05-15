<?php
if ( 'yes' === $sample_blog['blog_enable'] ):
  $blogTitle = $sample_blog['title'];
  $blogMoreDetailText = $sample_blog['more_detail_btn_text'];
  ?>
  <!-- Blogs Area -->
  <section class="blogs-main section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="title-line center">
            <h2><?php echo esc_html($blogTitle);?></h2>
            <span class="title-border"></span>
          </div>
        </div> 
      </div>
      <div class="row">

      <?php
      $blog_catId = $sample_blog['blog_cat_id'];
      $blog_number = $sample_blog['no_of_post'];
      $args = array(
        'post_type' => 'post',
        'posts_per_page' => $blog_number,
        'post_status' => 'publish',
        'cat' => $blog_catId,

      );

      $blogloop = new WP_Query($args);

      while ($blogloop->have_posts()) : 
        $blogloop->the_post(); 
        $thumbUrl = get_the_post_thumbnail_url(get_the_ID(), 'yala-travel-250-350');
        ?>
        <div class="col-lg-6 col-md-6 col-12">
          <!-- Single Blog -->
          <div class="single-blog">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-12">
                <div class="blog-head" style="background-image:url(<?php echo esc_url($thumbUrl);?>)"></div>
              </div>
              <div class="col-lg-6 col-md-6 col-12">
                <!-- Blog Bottom -->
                <div class="blog-bottom">
                  <?php 
                    $categories = get_the_category(get_the_ID());
                    $catName = isset($categories) ? $categories[0]->name : '';
                    $catUrl = isset($categories) ? get_category_link($categories[0]->cat_ID) : '';
                  ?>
                  <div class="date"><a href="<?php echo esc_url($catUrl);?>"><?php echo esc_html($catName);?></a></div>
                  <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                  <!-- Blog Meta -->
                  <div class="blog-meta">
                    <span><i class="fa fa-user"></i><?php yala_travel_posted_by();?></span>
                    <span><i class="fa fa-comments-o"></i><?php echo esc_html(get_comments_number());?></span>
                  </div>
                  <?php the_excerpt(); ?>
                  <a href="<?php the_permalink();?>" class="btn primary"><?php echo esc_html( $blogMoreDetailText );?><i class="fa fa-angle-right"></i></a>
                </div>
              </div>
            </div>
          </div>
          <!-- End Single Blog -->
        </div>
       <?php endwhile;
          wp_reset_postdata();
        ?>
      </div>
    </div>
  </section>
  <!--/ End Blogs Area -->
<?php endif;?>