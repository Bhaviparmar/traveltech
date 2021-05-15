<?php
if (!class_exists('Yala_Travel_Footer_Location_Widget')) {

    class Yala_Travel_Footer_Location_Widget extends WP_Widget
    {

        private function defaults()
        {
            $defaults = array(
                'title'         => '',
                'address_icon'  => '',
                'address_info'  =>'',
                'phone_icon'    => '',
                'phone_no'      => '',
                'email_icon'    => '',
                'email_address' =>''

            );
            return $defaults;
        }

        public function __construct()
        {
            parent::__construct(
                'yala_travel_location_widget',
                esc_html__('TM : Footer Location', 'yala-travel'),
                array('description' => esc_html__('Footer Location section', 'yala-travel'))
            );
        }

        public function form( $instance )
        {
            $instance = wp_parse_args( (array ) $instance, $this->defaults() );
            $title = $instance['title'] ;
            $address_icon   =  $instance['address_icon'] ;
            $address_info   =  $instance['address_info'] ;
            $phone_icon   =  $instance['phone_icon'] ;
            $phone_no   =  $instance['phone_no'] ;
            $email_icon   =  $instance['email_icon'] ;
            $email_address   =  $instance['email_address'] ;
            ?>
         
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                    <?php esc_html_e('Title', 'yala-travel'); ?>
                </label><br/>
                <input type="text" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title') ); ?>" value="<?php echo esc_attr($title); ?>">
            </p>


             <p>
                <label for="<?php echo esc_attr($this->get_field_id('address_icon')); ?>">
                    <?php esc_html_e('Address icon example as " fa fa-map-marker " ', 'yala-travel'); ?>
                </label><br/>
                <input type="text" name="<?php echo esc_attr( $this->get_field_name('address_icon') ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'address_icon') ); ?>" value="<?php echo esc_attr($address_icon); ?>">
            </p>

             <p>
                <label for="<?php echo esc_attr($this->get_field_id('address_info')); ?>">
                    <?php esc_html_e('Address info', 'yala-travel'); ?>
                </label><br/>
                <input type="text" name="<?php echo esc_attr( $this->get_field_name('address_info') ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'address_info') ); ?>" value="<?php echo esc_attr($address_info); ?>">
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('phone_icon')); ?>">
                    <?php esc_html_e('Phone icon example as " fa fa-phone "', 'yala-travel'); ?>
                </label><br/>
                <input type="text" name="<?php echo esc_attr( $this->get_field_name('phone_icon') ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'phone_icon') ); ?>" value="<?php echo esc_attr($phone_icon); ?>">
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('phone_no')); ?>">
                    <?php esc_html_e('Phone Number', 'yala-travel'); ?>
                </label><br/>
                <input type="text" name="<?php echo esc_attr( $this->get_field_name('phone_no') ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'phone_no') ); ?>" value="<?php echo esc_attr($phone_no); ?>">
            </p>


            <p>
                <label for="<?php echo esc_attr($this->get_field_id('email_icon')); ?>">
                    <?php esc_html_e('Email icon example as " fa fa-envelope-open "', 'yala-travel'); ?>
                </label><br/>
                <input type="text" name="<?php echo esc_attr( $this->get_field_name('email_icon') ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'email_icon') ); ?>" value="<?php echo esc_attr($email_icon); ?>">
            </p>


            <p>
                <label for="<?php echo esc_attr($this->get_field_id('email_address')); ?>">
                    <?php esc_html_e('Email Address', 'yala-travel'); ?>
                </label><br/>
                <input type="text" name="<?php echo esc_attr( $this->get_field_name('email_address') ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'email_address') ); ?>" value="<?php echo esc_attr($email_address); ?>">
            </p>

            
            <?php
        }

        public function update($new_instance, $old_instance)
        {
            $instance = $old_instance;
            $instance['title'] = sanitize_text_field($new_instance['title']);
            $instance['address_icon'] = sanitize_text_field($new_instance['address_icon']);
            $instance['address_info'] = sanitize_text_field($new_instance['address_info']);
            $instance['phone_icon'] = sanitize_text_field($new_instance['phone_icon']);
            $instance['phone_no'] = sanitize_text_field($new_instance['phone_no']);
            $instance['email_icon'] = sanitize_email($new_instance['email_icon']);
            $instance['email_address'] = sanitize_text_field($new_instance['email_address']);

            return $instance;
        }

        public function widget($args, $instance)
        {
            if (!empty($instance)) {
                $instance = wp_parse_args((array )$instance, $this->defaults());
                $title = apply_filters('widget_title', !empty($instance['title']) ? esc_html($instance['title']) : '', $instance, $this->id_base);
                $address_icon   =  $instance['address_icon'] ;
                $address_info   =  $instance['address_info'] ;
                $phone_icon   =  $instance['phone_icon'] ;
                $phone_no   =  $instance['phone_no'] ;
                $email_icon   =  $instance['email_icon'] ;
                $email_address   =  $instance['email_address'] ;
                echo $args[ 'before_widget' ];
                ?>
                <!-- Count Down -->
                
                    <div class="single-footer f-contact">
                        <?php echo $args[ 'before_title' ]; 
                            echo esc_html($title); 
                            echo $args[ 'after_title' ];?>
                        <div class="single-contact">
                            <i class="<?php echo esc_attr($address_icon);?>"></i>
                            <p><?php echo esc_html($address_info);?>.</p>
                        </div>

                        <div class="single-contact">
                            <i class="<?php echo esc_attr($phone_icon);?>"></i>
                            <p><?php echo esc_html($phone_no);?></p>
                        </div>

                        <div class="single-contact">
                            <i class="<?php echo esc_attr($email_icon);?>"></i>
                            <p><a href="mailto:<?php echo esc_attr($email_address);?>"><?php echo esc_html($email_address);?></a></p>
                        </div>
                    </div>
                
                <!--/ End Count Down -->
                <?php
            echo $args[ 'after_widget' ];
            }
        }

    }
}
