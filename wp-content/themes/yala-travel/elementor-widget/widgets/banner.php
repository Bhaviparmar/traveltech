<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 
class Yala_Travel_Banner extends Widget_Base { 
	
	public function get_name() {
		return __( 'banner', 'yala-travel' );
	}
	
	
	public function get_title() {
		return __( 'Banner Section', 'yala-travel' );
	}
	
   public function get_icon() {
      return 'fa fa-file-image-o';
   }
	
	protected function _register_controls() {
		$this->start_controls_section(
			'section_banner',
			array(
				'label' => __( 'Banner Section', 'yala-travel' ),
				'type' => Controls_Manager::SECTION, 
				'tab' => Controls_Manager::TAB_CONTENT,
			)
		);
		
		$this->add_control(
			'banner_enable',
			array(
				'label' => __( 'Enable/Disable Banner Section', 'yala-travel' ), 
				'type' => Controls_Manager::SWITCHER, 
				'label_on' => __( 'Show', 'yala-travel' ),
				'label_off' => __( 'Hide', 'yala-travel' ),
				'return_value' => 'yes',
				'default' => 'yes',
			)
		);

		$this->add_control(
			'title',
			array(
				'label' => __( 'Banner Tagline', 'yala-travel' ), 
				'type' => Controls_Manager::TEXT, 
				'default' => '', 
			)
		);
		
		$this->add_control(
			'banner_title', 
			array(
				'label' => __( 'Banner Title', 'yala-travel' ), 
				'type' => Controls_Manager::TEXT, 
				'default' => '', 
			)
		);

		$this->add_control(
			'banner_image',
			array(
				'label' => __( 'Banner Image', 'yala-travel' ),
				'type' => Controls_Manager::MEDIA, 
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$this->add_control(
			'btn_title_1', 
			array(
				'label' => __( 'Button Text 1', 'yala-travel' ), 
				'type' => Controls_Manager::TEXT, 
				'default' => '', 
			)
		);

		$this->add_control(
			'btn_url_1', 
			array(
				'label' => __( 'Button Url 1', 'yala-travel' ), 
				'type' => Controls_Manager::URL, 
				'placeholder' => 'https://example.com', 
			)
		);

		$this->add_control(
			'btn_title_2', 
			array(
				'label' => __( 'Button Text 2', 'yala-travel' ), 
				'type' => Controls_Manager::TEXT, 
				'default' => '', 
			)
		);

		$this->add_control(
			'btn_url_2', 
			array(
				'label' => __( 'Button Url 2', 'yala-travel' ), 
				'type' => Controls_Manager::URL, 
				'placeholder' => 'https://example.com', 
			)
		);
		
		$this->end_controls_section();
	}
	
	
	protected function render() {
		$sample_banner = $this->get_settings();
	
		include( get_template_directory() . '/section/banner.php' );
	}
	
	
	public function get_categories() {
		return array( 'yala_travel' );
	}

    public function getTermsForSelect( $args = null ){
    	$posts = get_pages();

        $select_posts = array();

        foreach( $posts as $post ) {
            $select_posts[$post->ID] = ucfirst( $post->post_title );
        }
        return $select_posts;
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Yala_Travel_Banner() );