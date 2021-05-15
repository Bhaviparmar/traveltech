<?php
/**
 * Create elementor custom widget.
 *
 * @package travel-escape.
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Plugin;

if ( ! class_exists( 'Travel_Escape_Elementor_Banner_Slider' ) ) {

	/**
	 * Create course slider widget.
	 */
	class Travel_Escape_Elementor_Banner_Slider extends \Elementor\Widget_Base {


		/**
		 * Get widget name.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return string Widget name.
		 */
		public function get_name() {
			return 'travel_escape_banner_slider';
		}

		/**
		 * Get widget title.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return string Widget title.
		 */
		public function get_title() {
			return __( 'Banner Slider', 'travel-escape' );
		}

		/**
		 * Get widget categories.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return array Widget categories.
		 */
		public function get_categories() {
			return array( 'travel-escape' );
		}

		/**
		 * Register oEmbed widget controls.
		 *
		 * Adds different input fields to allow the user to change and customize the widget settings.
		 *
		 * @since 1.0.0
		 * @access protected
		 */
		protected function _register_controls() {
			$this->banner_slider();
			$this->trip_filter();
		}

		/**
		 * Creates banner slider controls.
		 */
		private function banner_slider() {
			$taxonomies = travel_escape_customizer_get_taxonomies();

			$this->start_controls_section(
				'banner_slider',
				array(
					'label' => __( 'Banner Slider', 'travel-escape' ),
					'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
				)
			);

			/**
			 * If WP Travel is active then display advance category selection option.
			 */
			if ( $taxonomies ) {
				$this->add_control(
					'content_taxonomy',
					array(
						'label'   => __( 'Category Type', 'travel-escape' ),
						'type'    => \Elementor\Controls_Manager::SELECT2,
						'options' => $taxonomies,
					)
				);

				if ( is_array( $taxonomies ) && ! empty( $taxonomies ) ) {
					foreach ( $taxonomies as $tax_slug => $tax_label ) {
						$this->add_control(
							"content_term_{$tax_slug}",
							array(
								'label'     => $tax_label,
								'type'      => \Elementor\Controls_Manager::SELECT2,
								'options'   => travel_escape_customizer_get_terms( $tax_slug ),
								'condition' => array(
									'content_taxonomy' => $tax_slug,
								),
							)
						);
					}
				}
			} else {
				$this->add_control(
					'content_term_category',
					array(
						'label'   => __( 'Posts Category', 'travel-escape' ),
						'type'    => \Elementor\Controls_Manager::SELECT2,
						'options' => travel_escape_customizer_get_terms( 'category' ),
					)
				);
			}

			$this->add_control(
				'content_total_posts',
				array(
					'label'       => __( 'Total Posts', 'travel-escape' ),
					'type'        => \Elementor\Controls_Manager::NUMBER,
					'description' => __( 'Enter the total number of posts you want to display.', 'travel-escape' ),
					'min'         => 1,
					'default'     => 5,
				)
			);

			$this->add_control(
				'button_label',
				array(
					'label'   => __( 'Button Label', 'travel-escape' ),
					'type'    => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Find Out More', 'travel-escape' ),
				)
			);

			$this->end_controls_section();
		}

		/**
		 * Creates filter controls.
		 */
		private function trip_filter() {

			if ( ! defined( 'WP_TRAVEL_VERSION' ) ) {
				return;
			}

			$this->start_controls_section(
				'trip_filter',
				array(
					'label' => __( 'Trip Filter', 'travel-escape' ),
					'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
				)
			);

			$this->add_control(
				'trip_filter_is_enable',
				array(
					'label' => __( 'Enable Trip Filter', 'travel-escape' ),
					'type'  => \Elementor\Controls_Manager::SWITCHER,
				)
			);

			$this->add_control(
				'filter_heading',
				array(
					'label'     => __( 'Filter Heading', 'travel-escape' ),
					'type'      => \Elementor\Controls_Manager::TEXT,
					'condition' => array(
						'trip_filter_is_enable' => 'yes',
					),
				)
			);

			$this->add_control(
				'filter_button_label',
				array(
					'label'     => __( 'Button Label', 'travel-escape' ),
					'type'      => \Elementor\Controls_Manager::TEXT,
					'default'   => esc_html__( 'Search', 'travel-escape' ),
					'condition' => array(
						'trip_filter_is_enable' => 'yes',
					),
				)
			);

			$this->end_controls_section();
		}


		/**
		 * Banner slider html content.
		 */
		private function content_banner_slider() {

			$taxonomy  = $this->get_settings_for_display( 'content_taxonomy' );
			$term      = $this->get_settings_for_display( "content_term_{$taxonomy}" );
			$post_type = defined( 'WP_TRAVEL_VERSION' ) && 'category' !== $taxonomy ? 'itineraries' : 'post';

			$args = array(
				'post_type'      => $post_type,
				'posts_per_page' => $this->get_settings_for_display( 'content_total_posts' ),
			);

			if ( ! empty( $taxonomy ) ) {
				$args['tax_query'] = array( // phpcs:ignore
					array(
						'taxonomy' => $taxonomy,
						'field'    => 'term_id',
						'terms'    => array( $term ),
					),
				);
			}

			$the_query = new WP_Query( $args );
			?>
			<section id="page-banner" class="main-slider">
				<div id="slick-main-slides" class="slider-wrapper">
					<?php
					while ( $the_query->have_posts() ) {
						$the_query->the_post();
						?>
						<div class="slide-item">

							<?php the_post_thumbnail(); ?>

							<div class="slide-caption">

								<div class="container">

									<div class="caption-wrapper">

										<div class="content">
											<?php
											the_title(
												'<h1 class="slide-title">',
												'</h1>'
											);

											the_excerpt();
											?>
										</div>

										<a href="<?php the_permalink(); ?>" class="btn btn-primary">
											<?php echo esc_html( $this->get_settings_for_display( 'button_label' ) ); ?>
										</a>

									</div>

								</div>

							</div>

						</div>
					<?php } ?>
				</div>
			</section>
			<?php
			wp_reset_postdata();
		}


		/**
		 * Trip filter html content.
		 */
		private function content_trip_filter() {

			if ( ! $this->get_settings_for_display( 'trip_filter_is_enable' ) || ! defined( 'WP_TRAVEL_VERSION' ) ) {
				return;
			}

			$filter_heading      = $this->get_settings_for_display( 'filter_heading' );
			$filter_button_label = $this->get_settings_for_display( 'filter_button_label' );
			?>
			<div class="trip-filter-wrapper">
				<div class="container">
					<div class="row">
						<div class="col-xl-4 col-lg-5 offset-xl-8 offset-lg-7">
							<form action="" class="trip-search-form">

								<?php echo $filter_heading ? wp_kses_post( "<h2>{$filter_heading}</h2>" ) : null; ?>

								<div class="form-group">
									<input type="text" name="s" class="form-control" placeholder="<?php esc_attr_e( 'Enter your location or keyword', 'travel-escape' ); ?>">
								</div>

								<div class="form-group">
									<label for="trip-type"><?php esc_html_e( 'Trip Types', 'travel-escape' ); ?></label>
									<?php
										$taxonomy_name = 'itinerary_types';
										$args          = array(
											'show_option_all' => __( 'Trip Types', 'travel-escape' ),
											'show_option_none' => __( 'Trip Types', 'travel-escape' ),
											'option_none_value' => null,
											'hide_empty'   => 1,
											'selected'     => 1,
											'hierarchical' => 1,
											'name'         => $taxonomy_name,
											'id'           => 'trip-type',
											'class'        => 'wp-travel-taxonomy',
											'taxonomy'     => $taxonomy_name,
											'value_field'  => 'slug',
										);
										wp_dropdown_categories( $args, $taxonomy_name );
										?>
								</div>

								<div class="form-group">
									<label for="destination"><?php esc_html_e( 'Destination', 'travel-escape' ); ?></label>
										<?php
										$taxonomy_name = 'travel_locations';
										$args          = array(
											'show_option_all' => __( 'All Location', 'travel-escape' ),
											'show_option_none' => __( 'All Location', 'travel-escape' ),
											'option_none_value' => null,
											'hide_empty'   => 0,
											'selected'     => 1,
											'hierarchical' => 1,
											'name'         => $taxonomy_name,
											'id'           => 'destination',
											'class'        => 'wp-travel-taxonomy',
											'taxonomy'     => $taxonomy_name,
											'value_field'  => 'slug',
										);
										wp_dropdown_categories( $args, $taxonomy_name );
										?>
								</div>

								<button class="btn btn-dark" type="submit"><i class="fas fa-search"></i> <?php echo esc_html( $filter_button_label ); ?></button>

							</form>
						</div>
					</div>
				</div>
			</div>
			<?php
		}


		/**
		 * Render the html to view.
		 */
		protected function render() {

			$this->content_banner_slider();

			$this->content_trip_filter();

			$this->custom_scripts();
		}

		/**
		 * Checks if elementor is in editor mode.
		 */
		private function is_editor_mode() {
			return Plugin::$instance->editor->is_edit_mode();
		}

		/**
		 * Custom scripts for this section.
		 */
		private function custom_scripts() {
			if ( ! $this->is_editor_mode() ) {
				return;
			}
			?>
			<script>
				jQuery(function($) {
					$('#slick-main-slides').not('.slick-initialized').slick({
						arrows: false,
					});
				});
			</script>
			<?php
		}
	}
}
