<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 
class Yala_Travel_Blog extends Widget_Base { 
	
	public function get_name() {
		return __( 'blog', 'yala-travel' );
	}
	
	
	public function get_title() {
		return __( 'Blog Section', 'yala-travel' );
	}
	
   public function get_icon() {
      return 'fa fa-file-image-o';
   }
	
	protected function _register_controls() {
		$this->start_controls_section(
			'section_blog',
			array(
				'label' => __( 'Blog Section', 'yala-travel' ),
				'type' => Controls_Manager::SECTION, 
				'tab' => Controls_Manager::TAB_CONTENT,
			)
		);
		
		$this->add_control(
			'blog_enable',
			array(
				'label' => __( 'Enable/Disable Blog Section', 'yala-travel' ),
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
				'label' => __( 'Blog Title', 'yala-travel' ), 
				'type' => Controls_Manager::TEXT,
				'default' => '', 
			)
		);

		$this->add_control(
			'blog_cat_id',
			array(
				'label' => __( 'Select Category For Blog', 'yala-travel' ), 
				'type' => Controls_Manager::SELECT2,
				'options'=>$this->getCategoryForSelect(),
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
		$sample_blog = $this->get_settings();
	
		include( get_template_directory() . '/section/blog.php' );
	}
	
	
	public function get_categories() {
		return array( 'yala_travel' );
	}
	
    public function getCategoryForSelect( $args = null ) {
        $cats = get_categories();
        
        $select_cats = array();

        foreach( $cats as $cat ) {
            $select_cats[$cat->term_id] = ucfirst( $cat->name );
        }
        return $select_cats;
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Yala_Travel_Blog() );