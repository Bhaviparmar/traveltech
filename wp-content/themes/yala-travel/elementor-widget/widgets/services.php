<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 
class Yala_Travel_Services extends Widget_Base { 
	
	public function get_name() {
		return __( 'services', 'yala-travel' );
	}
	
	
	public function get_title() {
		return __( 'Services Section', 'yala-travel' );
	}
	
   public function get_icon() {
      return 'fa fa-file-image-o';
   }
	
	protected function _register_controls() {
		$this->start_controls_section(
			'section_services',
			array(
				'label' => __( 'Services Section', 'yala-travel' ),
				'type' => Controls_Manager::SECTION, 
				'tab' => Controls_Manager::TAB_CONTENT,
			)
		);
		
		$this->add_control(
			'services_enable',
			array(
				'label' => __( 'Enable/Disable Services Section', 'yala-travel' ),
				'type' => Controls_Manager::SWITCHER, 
				'label_on' => __( 'Show', 'yala-travel' ),
				'label_off' => __( 'Hide', 'yala-travel' ),
				'return_value' => 'yes',
				'default' => 'yes',
			)
		);

		$this->add_control(
			'title', // Control key
			array(
				'label' => __( 'Travel Services Title', 'yala-travel' ),
				'type' => Controls_Manager::TEXT, 
				'default' => '', // Default value for control
			)
		);

	
		$this->add_control(
			'service_items',
			array(
				'label' => __( 'Service Items', 'yala-travel' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => array(
				
					array(
						'name' => 'service_title',
						'label' => __( 'Service Title', 'yala-travel' ), // Control label
						'type' => Controls_Manager::TEXT, // Type of control
						'label_block' => true,
					),
					array(
						'name' => 'service_description',
						'label' => __( 'Service Description', 'yala-travel' ), // Control label
						'type' => Controls_Manager::TEXTAREA, // Type of control
						'label_block' => true,
					),
					array(
						'name' => 'service_readmore',
						'label' => __( 'Service Readmore Url', 'yala-travel' ), // Control label
						'type' => Controls_Manager::URL, 
						'placeholder' => 'https://example.com', 
						'label_block' => true,
					),
					array(
						'name' => 'service_icon',
						'label' => __( 'Service Icon', 'yala-travel' ), // Control label
						'type' => Controls_Manager::ICON, // Type of control
						'label_block' => true,
					),
				),
				
				'title_field' => '{{{ name }}}',
			)
		);
		
	
		$this->end_controls_section();
	}
	
	
	protected function render() {
		$sample_services = $this->get_settings();
	
		include( get_template_directory() . '/section/services.php' );
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

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Yala_Travel_Services() );