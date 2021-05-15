<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 
class Yala_Travel_Partners extends Widget_Base { 
	
	public function get_name() {
		return __( 'partners', 'yala-travel' );
	}
	
	
	public function get_title() {
		return __( 'Partners Section', 'yala-travel' );
	}
	
	public function get_icon() {
		return 'fa fa-file-image-o';
	}
	
	protected function _register_controls() {
		$this->start_controls_section(
			'section_partners',
			array(
				'label' => __( 'Partners Section', 'yala-travel' ),
				'type' => Controls_Manager::SECTION, 
				'tab' => Controls_Manager::TAB_CONTENT,
			)
		);
		
		$this->add_control(
			'partners_enable', // Control key
			array(
				'label' => __( 'Enable/Disable Partners Section', 'yala-travel' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'yala-travel' ),
				'label_off' => __( 'Hide', 'yala-travel' ),
				'return_value' => 'yes',
				'default' => 'yes',
			)
		);

		$this->add_control(
			'partner_items',
			array(
				'label' => __( 'Partner Items', 'yala-travel' ),
				'type' => Controls_Manager::REPEATER,
				'default' =>array(
					array(
						'partner_image' => ''
					)
				),
				'fields' => array(
					array(
						'name' => 'partner_image',
						'label' => __( 'Partner Image or Logo', 'yala-travel' ),
						'type' => Controls_Manager::MEDIA,
						'default' => array(
							'url' => Utils::get_placeholder_image_src(),
						),
					)
				),
				
				'title_field' => '{{{ name }}}',
			)
		);

		$this->end_controls_section();
	}
	
	
	protected function render() {
		$sample_partners = $this->get_settings();

		include( get_template_directory() . '/section/partners.php' );
	}
	
	
	public function get_categories() {
		return array( 'yala_travel' );
	}
	
}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Yala_Travel_Partners() );