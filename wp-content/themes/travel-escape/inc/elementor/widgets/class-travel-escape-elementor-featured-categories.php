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

if ( ! class_exists( 'Travel_Escape_Elementor_Featured_Categories' ) ) {

	/**
	 * Create course slider widget.
	 */
	class Travel_Escape_Elementor_Featured_Categories extends \Elementor\Widget_Base {




		/**
		 * Get widget name.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return string Widget name.
		 */
		public function get_name() {
			return 'travel_escape_featured_categories';
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
			return __( 'Featured Categories', 'travel-escape' );
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
			$taxonomies = travel_escape_customizer_get_taxonomies();

			$this->start_controls_section(
				'featured_categories',
				array(
					'label' => __( 'Featured Categories', 'travel-escape' ),
					'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
				)
			);

			$this->add_control(
				'section_title',
				array(
					'label' => __( 'Title', 'travel-escape' ),
					'type'  => \Elementor\Controls_Manager::TEXT,
				)
			);

			$this->add_control(
				'section_description',
				array(
					'label' => __( 'Description', 'travel-escape' ),
					'type'  => \Elementor\Controls_Manager::TEXTAREA,
				)
			);

			$this->add_control(
				'section_icons',
				array(
					'label'       => __( 'Icons', 'travel-escape' ),
					'label_block' => true,
					'type'        => \Elementor\Controls_Manager::ICON,
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
								'multiple'  => true,
								'max'       => 6,
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
						'label'    => __( 'Posts Category', 'travel-escape' ),
						'type'     => \Elementor\Controls_Manager::SELECT2,
						'multiple' => true,
						'options'  => travel_escape_customizer_get_terms( 'category' ),
					)
				);
			}

			$this->end_controls_section();
		}

		/**
		 * Render the html to view.
		 */
		protected function render() {
			$title         = $this->get_settings_for_display( 'section_title' );
			$description   = $this->get_settings_for_display( 'section_description' );
			$section_icons = $this->get_settings_for_display( 'section_icons' );
			$taxonomy      = $this->get_settings_for_display( 'content_taxonomy' );
			$terms         = $this->get_settings_for_display( "content_term_{$taxonomy}" );

			?>

			<!-- Destination section -->
			<section class="trip-destination section section-mt">
				<div class="container">
					<header class="section-header text-center">
						<?php if ( $title ) { ?>
							<h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
						<?php } ?>

						<?php if ( $description ) { ?>
							<p><?php echo esc_html( $description ); ?></p>
						<?php } ?>

					</header>
					<?php
					if ( is_array( $terms ) && ! empty( $terms ) ) {
						?>

						<div class="trip-destination-wrapper text-center">
							<div class="destination-slides">

								<?php
								foreach ( $terms as $term ) {
									$term_data = get_term_by( 'ID', $term, $taxonomy );

									$term_image_id  = get_term_meta( $term, 'wp_travel_trip_type_image_id', true );
									$term_image_url = $term_image_id ? wp_get_attachment_url( $term_image_id ) : '';
									?>
									<div class="slide-item">
										<div class="destination-item-container" style="background-image: url(<?php echo esc_url( $term_image_url ); ?>);">

											<?php if ( $section_icons ) { ?>
												<div class="icon">
													<i class="<?php echo esc_attr( $section_icons ); ?>"></i>
												</div>
											<?php } ?>

											<div class="destination-content-wrapper">

												<?php if ( $term_data->name ) { ?>
													<h3 class="destination-title">
														<a href="<?php echo esc_url( get_term_link( $term_data ) ); ?>">
															<?php echo esc_html( $term_data->name ); ?>
														</a>
													</h3>
												<?php } ?>

												<?php if ( ! empty( $term_data->description ) ) { ?>
													<p><?php echo esc_html( $term_data->description ); ?></p>
												<?php } ?>

											</div>
										</div>
									</div>
									<?php
								}
								?>

							</div>
						</div>
						<?php
					}
					?>

				</div>
			</section>

			<?php

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
					$('.destination-slides').not('.slick-initialized').slick({
						slidesToShow: 3,
						slidesToScroll: 3,
						arrows: false,
						dots: true,
						responsive: [{
							breakpoint: 767,
							settings: {
								slidesToShow: 1,
								slidesToScroll: 1,
							}
						}]
					})

				});
			</script>
			<?php
		}
	}
}
