<?php
if (!class_exists('Yala_Travel_Footer_About_Widget')) {
    class Yala_Travel_Footer_About_Widget extends WP_Widget
    {

        private function defaults()
        {
            $defaults = array(
                'layout_enable' => 'off',
                'image_url'=>'',
                'description'=>'',
                'social_url_1'=>'',
                'social_url_2'=>'',
                'social_url_3'=>'',
                'social_url_4'=>'',
            );
            return $defaults;
        }

        public function __construct()
        {
            parent::__construct(
                'yala_travel_about_widget',
                esc_html__('TM: Footer info', 'yala-travel'),
                array('description' => esc_html__('Footer info section', 'yala-travel'))
            );
        }

       public function form( $instance )
        {
            $instance = wp_parse_args( (array ) $instance, $this->defaults() );
            $layout_enable =  $instance[ 'layout_enable' ];
            $image_url   = ( ! empty( $instance['image_url'] ) ) ? $instance['image_url'] : '';
            $description = ! empty( $instance[ 'description' ] ) ? $instance[ 'description' ] : '';
            $social_url_1   = ( ! empty( $instance['social_url_1'] ) ) ? $instance['social_url_1'] : '';
            $social_url_2   = ( ! empty( $instance['social_url_2'] ) ) ? $instance['social_url_2'] : '';
            $social_url_3   = ( ! empty( $instance['social_url_3'] ) ) ? $instance['social_url_3'] : '';
            $social_url_4   = ( ! empty( $instance['social_url_4'] ) ) ? $instance['social_url_4'] : '';
            ?>
            <p>
               <input class="checkbox" type="checkbox" <?php checked( $layout_enable, 'on' ); ?> id="<?php echo esc_attr($this->get_field_id( 'layout_enable' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'layout_enable' ) ); ?>" /> 
                <label for="<?php echo esc_attr($this->get_field_id( 'layout_enable' )); ?>"><?php esc_html_e('Enable/Disable Footer About Section', 'yala-travel'); ?></label> 
            </p>

            <p>
              <label for="<?php echo esc_attr($this->get_field_id('image_url')); ?>"><?php esc_html_e( 'Logo:', 'yala-travel' );?></label><br />
                <img class="custom_media_image_footer_about" src="<?php if(!empty($instance['image_url'])){echo esc_url($instance['image_url']);} ?>"/>
                <input type="hidden" class="widefat custom_media_url_footer_about" name="<?php echo esc_attr($this->get_field_name('image_url')); ?>" id="<?php echo esc_attr($this->get_field_id('image_url')); ?>" value="<?php echo esc_url($instance['image_url']); ?>">
                <input type="button" value="<?php esc_attr_e( 'Upload Image', 'yala-travel' ); ?>" class="button custom_media_upload" id="custom_image_uploader_<?php echo esc_attr($this->get_field_id('image_url')); ?>"/>
                <a class="yala-travel-remove-counter button" data-id="remove_media_button"><?php esc_html_e('Remove Image', 'yala-travel'); ?></a>
            </p>

             <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'description' ) )?>"><strong><?php esc_html_e( 'Description: ', 'yala-travel' )?></strong></label>
                <input type="text" id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>" value="<?php echo esc_attr( $description ); ?>" class="widefat">
            </p>

            <p>
              <label for="<?php echo esc_attr($this->get_field_id('social_url_1')); ?>"><?php esc_html_e( 'Facebook Url:', 'yala-travel' );?></label><br />
              
                <input type="text" class="widefat" name="<?php echo esc_attr($this->get_field_name('social_url_1')); ?>" id="<?php echo esc_attr($this->get_field_id('social_url_1')); ?>" value="<?php echo esc_url($instance['social_url_1']); ?>">
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('social_url_2')); ?>"><?php esc_html_e( 'Twitter Url:', 'yala-travel' );?></label><br />
               
                <input type="text" class="widefat" name="<?php echo esc_attr($this->get_field_name('social_url_2')); ?>" id="<?php echo esc_attr($this->get_field_id('social_url_2')); ?>" value="<?php echo esc_url($instance['social_url_2']); ?>">
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('social_url_3')); ?>"><?php esc_html_e( 'Linked In Url:', 'yala-travel' );?></label><br />
                
                <input type="text" class="widefat" name="<?php echo esc_attr($this->get_field_name('social_url_3')); ?>" id="<?php echo esc_attr($this->get_field_id('social_url_3')); ?>" value="<?php echo esc_url($instance['social_url_3']); ?>">
            </p>
            
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('social_url_4')); ?>"><?php esc_html_e( 'Instagram Url:', 'yala-travel' );?></label><br />
               
                <input type="text" class="widefat" name="<?php echo esc_attr($this->get_field_name('social_url_4')); ?>" id="<?php echo esc_attr($this->get_field_id('social_url_4')); ?>" value="<?php echo esc_url($instance['social_url_4']); ?>">
            </p>
            <?php
        }

        public function update($new_instance, $old_instance)
        {
            $instance = $old_instance;
            $instance[ 'layout_enable' ] = sanitize_text_field($new_instance[ 'layout_enable' ]);
            $instance['image_url'] = esc_url_raw($new_instance['image_url']);
            $instance[ 'description' ] = sanitize_text_field( $new_instance[ 'description' ] );
            $instance['social_url_1'] = esc_url_raw($new_instance['social_url_1']);
            $instance['social_url_2'] = esc_url_raw($new_instance['social_url_2']);
            $instance['social_url_3'] = esc_url_raw($new_instance['social_url_3']);
            $instance['social_url_4'] = esc_url_raw($new_instance['social_url_4']);
            return $instance;
        }

        public function widget($args, $instance)
        {
            if (!empty($instance)) {
                $instance = wp_parse_args((array )$instance, $this->defaults());
                $layout_enable_check = isset( $instance['layout_enable'] ) ? esc_attr( $instance['layout_enable'] ) : '';
                $layout_enable = $layout_enable_check ? 'true' : 'false';
                $image_url = (!empty($instance['image_url'])) ? $instance['image_url'] : array();
                $description = ! empty( $instance[ 'description' ] ) ? $instance[ 'description' ] : '';
                $social_url_1 = (!empty($instance['social_url_1'])) ? $instance['social_url_1'] : array();
                $social_url_2 = (!empty($instance['social_url_2'])) ? $instance['social_url_2'] : array();
                $social_url_3 = (!empty($instance['social_url_3'])) ? $instance['social_url_3'] : array();
                $social_url_4 = (!empty($instance['social_url_4'])) ? $instance['social_url_4'] : array();
                 echo $args[ 'before_widget' ];
                ?>
               <!-- Single Widget -->
                
                    <div class="single-footer f-about">
                        <?php if(!empty($image_url)):?>
                        <div class="logo"><a href="<?php echo esc_url($image_url);?>"><img src="<?php echo esc_url($image_url);?>"></a></div>
                        <?php else:?>
                         <h2 class="site-title"><a href="<?php echo esc_url( home_url() ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
                        <?php endif;?>
                        <p><?php echo esc_html($description);?></p>
                        <div class="social">
                            <ul>
                            <?php if(!empty($social_url_1)):?>
                                <li class="active"><a href="<?php echo esc_url($social_url_1);?>"><i class="fa fa-facebook-f"></i></a></li>
                            <?php endif;?>

                            <?php if(!empty($social_url_2)):?>
                                <li><a href="<?php echo esc_url($social_url_2);?>"><i class="fa fa-twitter"></i></a></li>
                            <?php endif;?>
                             <?php if(!empty($social_url_3)):?>
                                <li><a href="<?php echo esc_url($social_url_3);?>"><i class="fa fa-linkedin"></i></a></li>
                            <?php endif;?>

                            <?php if(!empty($social_url_4)):?>
                                <li><a href="<?php echo esc_url($social_url_4);?>"><i class="fa fa-instagram"></i></a></li>
                            <?php endif;?>
                            </ul>
                        </div>
                    </div>
               
                <!--/ End Single Widget -->
                <?php
                echo $args[ 'after_widget' ];
            }
        }

        }
    }