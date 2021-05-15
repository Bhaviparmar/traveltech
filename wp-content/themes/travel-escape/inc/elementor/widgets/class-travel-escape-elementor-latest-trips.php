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


if ( ! class_exists( 'Travel_Escape_Elementor_Latest_Trips' ) ) {

	/**
	 * Create course slider widget.
	 */
	class Travel_Escape_Elementor_Latest_Trips extends \Elementor\Widget_Base {



		/**
		 * Get widget name.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return string Widget name.
		 */
		public function get_name() {
			return 'travel_escape_latest_trips';
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
			return __( 'Latest Trips', 'travel-escape' );
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
			$this->heading_controls();
			$this->buttons_controls();
			$this->trip_metas_controls();
		}

		/**
		 * Register controls related to section heading.
		 */
		private function heading_controls() {
			$this->start_controls_section(
				'header_controls',
				array(
					'label' => __( 'Header', 'travel-escape' ),
					'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
				)
			);

			$this->add_control(
				'section_title',
				array(
					'label'   => __( 'Section Title', 'travel-escape' ),
					'type'    => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Latest Trips', 'travel-escape' ),
				)
			);

			$this->add_control(
				'section_description',
				array(
					'label' => __( 'Section Description', 'travel-escape' ),
					'type'  => \Elementor\Controls_Manager::TEXTAREA,
				)
			);

			$this->end_controls_section();
		}

		/**
		 * Register controls related to section heading.
		 */
		private function buttons_controls() {
			$this->start_controls_section(
				'buttons_controls',
				array(
					'label' => __( 'Buttons', 'travel-escape' ),
					'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
				)
			);

			$this->add_control(
				'header_button_label',
				array(
					'label'   => __( 'Header Button Label', 'travel-escape' ),
					'type'    => \Elementor\Controls_Manager::TEXT,
					'default' => __( 'View All Trips', 'travel-escape' ),
				)
			);

			$this->add_control(
				'trip_button_label',
				array(
					'label'   => __( 'Trip Button Label', 'travel-escape' ),
					'type'    => \Elementor\Controls_Manager::TEXT,
					'default' => __( 'Explore', 'travel-escape' ),
				)
			);

			$this->end_controls_section();
		}

		/**
		 * Register controls related to section heading.
		 */
		private function trip_metas_controls() {
			$this->start_controls_section(
				'trip_meta_controls',
				array(
					'label' => __( 'Trip Meta', 'travel-escape' ),
					'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
				)
			);

			$this->add_control(
				'number_of_trips',
				array(
					'label'   => __( 'Number Of Trips', 'travel-escape' ),
					'type'    => \Elementor\Controls_Manager::NUMBER,
					'min'     => 1,
					'default' => 3,
				)
			);

			$this->add_control(
				'display_location',
				array(
					'label' => __( 'Display Location', 'travel-escape' ),
					'type'  => \Elementor\Controls_Manager::SWITCHER,
				)
			);

			$this->add_control(
				'display_ratings',
				array(
					'label' => __( 'Display Ratings', 'travel-escape' ),
					'type'  => \Elementor\Controls_Manager::SWITCHER,
				)
			);

			$this->add_control(
				'display_trip_types',
				array(
					'label' => __( 'Display Trip Types', 'travel-escape' ),
					'type'  => \Elementor\Controls_Manager::SWITCHER,
				)
			);

			$this->add_control(
				'display_pax',
				array(
					'label' => __( 'Display PAX', 'travel-escape' ),
					'type'  => \Elementor\Controls_Manager::SWITCHER,
				)
			);

			$this->end_controls_section();
		}


		private function content_header() {
			$section_title       = $this->get_settings_for_display( 'section_title' );
			$section_description = $this->get_settings_for_display( 'section_description' );
			$header_button_label = $this->get_settings_for_display( 'header_button_label' );
			?>
			<header class="section-header text-center">
				<?php if ( $section_title ) { ?>
					<h2 class="section-title"><?php echo esc_html( $section_title ); ?></h2>
				<?php } ?>

				<?php
				if ( $section_description ) {
					echo wp_kses_post( wpautop( $section_description ) );
				}
				?>

				<a href="<?php echo esc_url( get_post_type_archive_link( 'itineraries' ) ); ?>" class="btn btn-dark">
					<?php echo esc_html( $header_button_label ); ?>
				</a>
			</header>
			<?php
		}


		private function content_trips() {

			$trip_button_label  = $this->get_settings_for_display( 'trip_button_label' );
			$display_location   = $this->get_settings_for_display( 'display_location' );
			$display_ratings    = $this->get_settings_for_display( 'display_ratings' );
			$display_trip_types = $this->get_settings_for_display( 'display_trip_types' );
			$display_pax        = $this->get_settings_for_display( 'display_pax' );

			$args = array(
				'post_type'      => 'itineraries',
				'post_status'    => 'publish',
				'posts_per_page' => $this->get_settings_for_display( 'number_of_trips' ),
			);

			$the_query = new WP_Query( $args );

			while ( $the_query->have_posts() ) {
				$the_query->the_post();

				$wp_travel_metas = travel_escape_get_itinerary_meta();
				$placeholder     = ! empty( $wp_travel_metas['thumbnails']['placeholder_url'] ) ? $wp_travel_metas['thumbnails']['placeholder_url'] : '';
				$thumbnail       = ! empty( $wp_travel_metas['thumbnails']['url'] ) ? $wp_travel_metas['thumbnails']['url'] : $placeholder;

				$travel_locations = $display_location && ! empty( $wp_travel_metas['trip_terms']['travel_locations'] ) ? $wp_travel_metas['trip_terms']['travel_locations'] : '';
				$itinerary_types  = $display_trip_types && ! empty( $wp_travel_metas['trip_terms']['itinerary_types'] ) ? $wp_travel_metas['trip_terms']['itinerary_types'] : '';

				$ratings_html = $display_ratings && ! empty( $wp_travel_metas['general']['ratings_html'] ) ? $wp_travel_metas['general']['ratings_html'] : null;
				$pax          = $display_pax && ! empty( $wp_travel_metas['general']['pax'] ) ? $wp_travel_metas['general']['pax'] : null;

				// Prices.
				$currency_code = ! empty( $wp_travel_metas['prices']['currency_code'] ) ? $wp_travel_metas['prices']['currency_code'] : false;
				$enable_sale   = ! empty( $wp_travel_metas['prices']['enable_sale'] ) ? $wp_travel_metas['prices']['enable_sale'] : false;
				$regular_price = ! empty( $wp_travel_metas['prices']['regular_price'] ) ? $wp_travel_metas['prices']['regular_price'] : false;
				$trip_price    = ! empty( $wp_travel_metas['prices']['trip_price'] ) ? $wp_travel_metas['prices']['trip_price'] : false; // This will give sales price if sale is enabled.

				$trip_duration_day = ! empty( $wp_travel_metas['date_and_time']['trip_duration_day'] ) ? $wp_travel_metas['date_and_time']['trip_duration_day'] : false;
				?>
				<div class="col-xl-4 col-lg-4">
					<article class="trip">
						<div class="trip-thumbnail">

							<a href="<?php the_permalink(); ?>" class="trip-details-url">
								<img src="<?php echo esc_url( $thumbnail ); ?>">
							</a>

							<div class="trip-meta-wrapper">

								<div class="trip-meta-top">

									<?php
									if ( ! empty( $travel_locations ) ) {
										$travel_location = isset( $travel_locations[0] ) ? $travel_locations[0] : '';
										$location_id     = is_object( $travel_location ) && isset( $travel_location->term_id ) ? $travel_location->term_id : false;
										$location        = is_object( $travel_location ) && isset( $travel_location->name ) ? $travel_location->name : false;

										if ( $location ) {
											?>
											<span class="destination">
												<i class="fas fa-map-marker-alt"></i>
												<a href="<?php echo esc_url( get_term_link( $location_id ) ); ?>"><?php echo esc_html( $location ); ?></a>
											</span>
											<?php
										}
									}

									echo wp_kses_post( $ratings_html );
									?>

								</div>

								<?php if ( ! empty( $itinerary_types ) || $pax || $trip_duration_day ) { ?>
									<div class="trip-meta-bottom">

										<?php
										if ( ! empty( $itinerary_types ) ) {
											$itinerary_type      = isset( $itinerary_types[0] ) ? $itinerary_types[0] : '';
											$itinerary_type_id   = is_object( $itinerary_type ) && isset( $itinerary_type->term_id ) ? $itinerary_type->term_id : false;
											$itinerary_type_name = is_object( $itinerary_type ) && isset( $itinerary_type->name ) ? $itinerary_type->name : false;

											if ( $itinerary_type_name ) {
												?>
												<span class="trip-type">
													<i class="fas fa-suitcase"></i>
													<a href="<?php echo esc_url( get_term_link( $itinerary_type_id ) ); ?>"><?php echo esc_html( $itinerary_type_name ); ?></a>
												</span>
												<?php
											}
										}

										if ( $pax ) {
											?>
											<span class="pax">
												<i class="fas fa-users"></i> <?php echo esc_html( $pax ); ?>
											</span>
											<?php
										}

										if ( $trip_duration_day ) {
											?>
											<span class="duration">
												<i class="far fa-clock"></i> <?php echo esc_html( $trip_duration_day ) . ' ' . __( 'Days', 'travel-escape' ); ?>
											</span>
											<?php
										}
										?>

									</div>
								<?php } ?>

							</div>

						</div>

						<div class="trip-container">
						<?php
						the_title(
							'<h3 class="trip-title"><a href="' . esc_url( get_the_permalink() ) . '">',
							'</a></h3>'
						);

							the_excerpt();
						?>
							<div class="price-wrapper">

								<?php if ( $trip_button_label ) { ?>
									<a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php echo esc_html( $trip_button_label ); ?></a>
								<?php } ?>

								<div class="price">
									<?php
									if ( ! empty( $trip_price ) && ! empty( $regular_price ) ) {
										?>
										<strong>
											<span class="from"><?php esc_html_e( 'From', 'travel-escape' ); ?></span> <?php echo $trip_price ? sprintf( '<span class="amount">%s%s</span>', esc_html( $currency_code ), esc_html( $trip_price ) ) : ''; ?>
										</strong>
										<?php echo $enable_sale && $regular_price ? sprintf( '<del>%s%s</del>', esc_html( $currency_code ), esc_html( $regular_price ) ) : ''; ?>
										<?php
									} else {
										echo sprintf( '<span class="amount">%sN/A</span>', esc_html( $currency_code ) );
									}
									?>
								</div>

							</div>
						</div>
					</article>
				</div>
					<?php
			}
		}


		/**
		 * Render the html to view.
		 */
		protected function render() {
			?>
			<!-- Latest Trip section -->
			<section class="latest-trip section section-mt">
				<div class="container">

					<?php $this->content_header(); ?>

					<div class="trips-wrapper">
						<div class="row">

							<?php $this->content_trips(); ?>

						</div>
					</div>
				</div>
			</section>
			<!-- End of latest trip section -->
			<?php
		}
	}
}
