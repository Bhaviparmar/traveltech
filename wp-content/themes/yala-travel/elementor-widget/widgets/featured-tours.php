<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 
class Yala_Travel_Featured_Tour extends Widget_Base { 
	
	public function get_name() {
		return __( 'Featured Tour', 'yala-travel' );
	}
	
	
	public function get_title() {
		return __( 'Featured Tour Section', 'yala-travel' );
	}
	
   public function get_icon() {
      return 'fa fa-file-image-o';
   }
	
	protected function _register_controls() {
		$this->start_controls_section(
			'section_featured_tour',
			array(
				'label' => __( 'Featured Tour Section', 'yala-travel' ),
				'type' => Controls_Manager::SECTION, 
				'tab' => Controls_Manager::TAB_CONTENT,
			)
		);
		
		$this->add_control(
			'featured_tour_enable',
			array(
				'label' => __( 'Enable/Disable Featured Tour Section', 'yala-travel' ), 
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
				'label' => __( 'Featured Tour Title', 'yala-travel' ), 
				'type' => Controls_Manager::TEXT, 
				'default' => '', 
			)
		);
		
		$this->add_control(
			'no_of_post',
			array(
				'label' => __( 'Number of post', 'yala-travel' ), 
				'description' => __('such as 1, 2, 3....','yala-travel'),
				'type' => Controls_Manager::NUMBER,
				'default' => '', 
			)
		);

		$this->add_control(
			'more_detail_btn_text',
			array(
				'label' => __( 'More Detatil Button Text', 'yala-travel' ), 
				'type' => Controls_Manager::TEXT,
				'default' => '', 
			)
		);
	
		
		$this->end_controls_section();
	}
	
	
	protected function render() {
		$sample_tour = $this->get_settings();
	
		include( get_template_directory() . '/section/featured-tours.php' );
	}
	
	
	public function get_categories() {
		return array( 'yala_travel' );
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Yala_Travel_Featured_Tour() );