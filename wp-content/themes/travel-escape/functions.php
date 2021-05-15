<?php
/**
 * Travel Escape functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Travel_Escape
 */

use Mpdf\Tag\P;

if ( ! defined( 'TRAVEL_ESCAPE_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'TRAVEL_ESCAPE_VERSION', '1.0.0' );
}

if ( ! function_exists( 'travel_escape_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function travel_escape_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Travel Escape, use a find and replace
		 * to change 'travel-escape' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'travel-escape', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1'          => esc_html__( 'Primary', 'travel-escape' ),
				'404-quick-links' => esc_html__( '404 Page Quick Links', 'travel-escape' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'travel_escape_custom_background_args',
				array(
					'default-color' => '',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'travel_escape_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function travel_escape_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'travel_escape_content_width', 640 ); // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
}
add_action( 'after_setup_theme', 'travel_escape_content_width', 0 );



/**
 * Array recursive sanitization.
 *
 * @param array $array submitted $_POST data array.
 * @return mixed
 */
function travel_escape_sanitize( $array ) {
	foreach ( $array as $key => &$value ) {
		if ( is_array( $value ) ) {
			$value = travel_escape_sanitize( $value );
		} else {
			$value = sanitize_text_field( wp_unslash( $value ) );
		}
	}
	return $array;
}



/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function travel_escape_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'travel-escape' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'travel-escape' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget Area One', 'travel-escape' ),
			'id'            => 'footer-widget-1',
			'description'   => esc_html__( 'Add widgets here.', 'travel-escape' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget Area Two', 'travel-escape' ),
			'id'            => 'footer-widget-2',
			'description'   => esc_html__( 'Add widgets here.', 'travel-escape' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget Area Three', 'travel-escape' ),
			'id'            => 'footer-widget-3',
			'description'   => esc_html__( 'Add widgets here.', 'travel-escape' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget Area Four', 'travel-escape' ),
			'id'            => 'footer-widget-4',
			'description'   => esc_html__( 'Add widgets here.', 'travel-escape' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget Area Five', 'travel-escape' ),
			'id'            => 'footer-widget-5',
			'description'   => esc_html__( 'Add widgets here.', 'travel-escape' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'travel_escape_widgets_init' );


function travel_escape_font_loader() {
	$fonts = travel_escape_fonts();

	$heading_fonts = travel_escape_get_theme_mod( 'heading_fonts' );
	$content_fonts = travel_escape_get_theme_mod( 'content_fonts' );

	$heading_font_name = isset( $fonts[ $heading_fonts ] ) ? $fonts[ $heading_fonts ] : 'Roboto';
	$content_font_name = isset( $fonts[ $content_fonts ] ) ? $fonts[ $content_fonts ] : 'Roboto';

	$heading_font_handle = "travel-escape-font-{$heading_font_name}";
	$content_font_handle = "travel-escape-font-{$content_font_name}";

	wp_enqueue_style( $heading_font_handle, "//fonts.googleapis.com/css?family={$heading_fonts}", array(), '1.0.0', 'all' );

	/**
	 * Don't load the same font again.
	 */
	if ( ! wp_style_is( $content_font_handle ) ) {
		wp_enqueue_style( $content_font_handle, "//fonts.googleapis.com/css?family={$content_fonts}", array(), '1.0.0', 'all' );
	}

}

/**
 * Enqueue scripts and styles.
 */
function travel_escape_scripts() {

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '.' : '.min.';

	$deps = array();
	if ( defined( 'WP_TRAVEL_VERSION' ) && function_exists( 'wp_travel_get_page_id' ) && ( get_the_ID() === wp_travel_get_page_id( 'wp-travel-dashboard' ) ) ) {
		if ( function_exists( 'wp_travel_can_load_bundled_scripts' ) && wp_travel_can_load_bundled_scripts() ) {
			$deps[] = 'wp-travel-frontend-bundle';
		} else {
			$deps[] = 'wp-travel-frontend';
		}
	}

	travel_escape_font_loader();
	wp_enqueue_style( 'travel-escape-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap' . $suffix . 'css', $deps, TRAVEL_ESCAPE_VERSION );
	wp_enqueue_style( 'travel-escape-style', get_stylesheet_uri(), $deps, TRAVEL_ESCAPE_VERSION );
	wp_style_add_data( 'travel-escape-style', 'rtl', 'replace' );
	wp_enqueue_style( 'travel-escape-slick-style', get_template_directory_uri() . '/assets/css/slick.css', $deps, TRAVEL_ESCAPE_VERSION );
	wp_enqueue_style( 'travel-escape-main-style', get_template_directory_uri() . '/assets/css/main.css', $deps, TRAVEL_ESCAPE_VERSION );
	travel_escape_custom_dynamic_colors();

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'travel-escape-navigation', get_template_directory_uri() . '/assets/js/navigation' . $suffix . 'js', array(), TRAVEL_ESCAPE_VERSION, true );
	wp_enqueue_script( 'travel-escape-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap' . $suffix . 'js', array(), TRAVEL_ESCAPE_VERSION, true );
	wp_enqueue_script( 'travel-escape-isotope', get_template_directory_uri() . '/assets/js/isotope.pkgd' . $suffix . 'js', array(), TRAVEL_ESCAPE_VERSION, true );
	wp_enqueue_script( 'travel-escape-slick', get_template_directory_uri() . '/assets/js/slick' . $suffix . 'js', array(), TRAVEL_ESCAPE_VERSION, true );
	wp_enqueue_script( 'travel-escape-custom-script', get_template_directory_uri() . '/assets/js/custom' . $suffix . 'js', array(), TRAVEL_ESCAPE_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}


}
add_action( 'wp_enqueue_scripts', 'travel_escape_scripts' );

/**
 * Pagination function.
 */
function travel_escape_pagination() {
	global $wp_query;
	?>
	<nav class="pagination">
		<?php
		echo paginate_links( //phpcs:ignore
			array(
				'current'   => max( 1, get_query_var( 'paged' ) ),
				'total'     => $wp_query->max_num_pages,
				'type'      => 'list',
				'prev_text' => '←',
				'next_text' => '→',
			)
		);
		?>
	</nav>
	<?php
}



function travel_escape_fonts() {

	$fonts = array(
		'Cormorant+Garamond:400,400i,500,500i,600,600i,700,700i&display=swap' => esc_html( 'Cormorant Garamond' ),
		'Caveat:400,700'                                   => esc_html( 'Caveat' ),
		'Dancing+Script:400,700'                           => esc_html( 'Dancing Script' ),
		'Heebo:400,500,700,800'                            => esc_html( 'Heebo' ),
		'Kelly+Slab'                                       => esc_html( 'Kelly Slab' ),
		'Lato:400,400i,700,700i'                           => esc_html( 'Lato' ),
		'Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap' => esc_html( 'Roboto' ),
		'Geo:400,400i|Great+Vibes|Lato:300,400,700&display=swap' => esc_html( 'Geo' ),
		'Poppins:300,400,500,600,700,800,900&display=swap' => esc_html( 'Poppins' ),
		'Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i' => esc_html( 'Montserrat' ),
		'Nunito+Sans:400,400i,600,600i,700,700i'           => esc_html( 'Nunito Sans' ),
		'Open+Sans:400,400i,600,600i,700,700i,800,800i'    => esc_html( 'Open Sans' ),
		'Oswald:400,500,600,700'                           => esc_html( 'Oswald' ),
		'Pacifico'                                         => esc_html( 'Pacifico' ),
		'Playfair+Display:400,400i,700,700i'               => esc_html( 'Playfair Display' ),
		'Ubuntu:400,400i,500,500i,700,700i'                => esc_html( 'Ubuntu' ),
	);

	return apply_filters( 'travel_escape_fonts', $fonts );
}



function travel_escape_social_links() {
	return apply_filters(
		'travel_escape_social_links',
		array(
			'facebook',
			'twitter',
			'instagram',
		)
	);
}


function travel_escape_get_social_link_url() {
	$link_url = array();

	$travel_escape_social_links = travel_escape_social_links();
	if ( is_array( $travel_escape_social_links ) && ! empty( $travel_escape_social_links ) ) {
		foreach ( $travel_escape_social_links as $social_link ) {
			$key = "social_link_{$social_link}";
			$url = travel_escape_get_theme_mod( $key );

			if ( $url ) {
				$link_url[ $social_link ] = $url;
			}
		}
	}

	return $link_url;
}


if ( ! function_exists( 'travel_escape_get_newsletter_form' ) ) {

	/**
	 * Prints the newsletter form.
	 *
	 * @uses mc4wp_show_form() - MailChimp for WordPress plugin
	 * @link https://www.mc4wp.com/
	 *
	 * @param int  $form_id Form id of mc4wp.
	 * @param bool $echo Return or print the form html.
	 */
	function travel_escape_get_newsletter_form( $form_id = 0, $echo = true ) {

		if ( ! function_exists( 'mc4wp_show_form' ) ) {
			return;
		}

		ob_start();
		try {
			mc4wp_show_form( $form_id, array(), true );
		} catch ( Exception $e ) {
			echo '';
		}
		$form = ob_get_clean();

		if ( ' ' === $form || ! $form ) {
			return;
		}

		if ( ! $echo ) {
			return $form;
		}

		echo $form; // phpcs:ignore

	}
}



if ( ! function_exists( 'travel_escape_menu_fallback' ) ) {

	/**
	 * If no navigation menu is assigned, this function will be used for the fallback.
	 *
	 * @see https://developer.wordpress.org/reference/functions/wp_nav_menu/ for available $args arguments.
	 * @param  mixed $args Menu arguments.
	 * @return string $output Return or echo the add menu link.
	 */
	function travel_escape_menu_fallback( $args ) {
		if ( ! current_user_can( 'edit_theme_options' ) ) {
			return;
		}

		$link  = $args['link_before'];
		$link .= '<a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '" title="' . esc_attr__( 'Opens in new tab', 'travel-escape' ) . '" target="__blank">' . $args['before'] . esc_html__( 'Add a menu', 'travel-escape' ) . $args['after'] . '</a>';
		$link .= $args['link_after'];

		if ( false !== stripos( $args['items_wrap'], '<ul' ) || false !== stripos( $args['items_wrap'], '<ol' ) ) {
			$link = "<li class='menu-item'>{$link}</li>";
		}

		$output = sprintf( $args['items_wrap'], $args['menu_id'], $args['menu_class'], $link );

		if ( ! empty( $args['container'] ) ) {
			$output = sprintf( '<%1$s class="%2$s" id="%3$s">%4$s</%1$s>', $args['container'], $args['container_class'], $args['container_id'], $output );
		}

		if ( $args['echo'] ) {
			echo wp_kses_post( $output );
		}

		return $output;
	}
}



function travel_escape_customizer_get_taxonomies() {
	if ( ! defined( 'WP_TRAVEL_VERSION' ) ) {
		return;
	}
	return array(
		'travel_locations' => __( 'Trip Locations', 'travel-escape' ),
		'itinerary_types'  => __( 'Trip Types', 'travel-escape' ),
		'category'         => __( 'WP Category', 'travel-escape' ),
	);
}



if ( ! function_exists( 'travel_escape_customizer_get_terms' ) ) {

	/**
	 * This function returns the formated array of terms
	 * for the given taxonomy name, for the customizer dropdown.
	 *
	 * @param string $tax_name Taxonomy name. Default is "category".
	 * @param bool   $hide_empty Takes boolean value, pass true if you want to hide empty terms.
	 * @return array $items Formated array for the dropdown options for the customizer.
	 */
	function travel_escape_customizer_get_terms( $tax_name = 'category', $hide_empty = true ) {

		if ( empty( $tax_name ) ) {
			return;
		}

		$items = array();
		$terms = get_terms(
			array(
				'taxonomy'   => $tax_name,
				'hide_empty' => $hide_empty,
			)
		);

		if ( is_array( $terms ) && count( $terms ) > 0 ) {
			foreach ( $terms as $term ) {
				$term_name = ! empty( $term->name ) ? $term->name : false;
				$term_id   = ! empty( $term->term_id ) ? $term->term_id : '';
				if ( $term_name ) {
					$items[ $term_id ] = $term_name;
				}
			}
		}

		return $items;
	}
}



if ( ! function_exists( 'travel_escape_get_itinerary_meta' ) ) {

	/**
	 * Returns the array of wp travel trips meta informations.
	 *
	 * @param array $args Arguments for wp travel meta datas. It accepts the following values:
	 *                    * trip_id        => WP Travel Trip ID, default is get_the_ID().
	 *                    * min_price_sale => If set to 0, it will return sale price for any pricing option.
	 *                    * retrive        => Type of meta that you want to receive, default is all.
	 *                                        > **Other accepted values are:**
	 *                                         > * all ( default ),
	 *                                         > * general,
	 *                                         > * prices,
	 *                                         > * date_and_time,
	 *                                         > * trip_terms,
	 *                                         > * thumbnails,
	 *                    * featured_trips => If passed true, then function will returns
	 *                                        the meta info for featured trips only.
	 *                                        Default is false.
	 *
	 * @return array $wp_travel_meta Array of WP Travel meta data.
	 */
	function travel_escape_get_itinerary_meta( $args = array() ) {

		$wp_travel_meta = array();

		/**
		 * Bail early if WP Travel plugin is not activated or not exists.
		 * Also here WP_Travel is a function name, not a class name.
		 */
		if ( ! function_exists( 'WP_Travel' ) ) {
			return $wp_travel_meta;
		}

		if ( ! class_exists( 'Travel_Escape_WP_Travel_Metas' ) ) {
			require_once get_template_directory() . '/inc/classes/class-travel-escape-wp-travel-metas.php';
		}

		$default = array(
			'trip_id'        => get_the_ID(),
			'min_price_sale' => 1,
			'retrive'        => 'all',
			'featured_trips' => false,
		);
		$args    = wp_parse_args( $args, $default );

		$trip_id        = ! empty( $args['trip_id'] ) ? $args['trip_id'] : false;
		$min_price_sale = $args['min_price_sale'];
		$retrive        = ! empty( $args['retrive'] ) ? $args['retrive'] : 'all';
		$featured_trips = ! empty( $args['featured_trips'] ) ? $args['featured_trips'] : false;

		// Bail early if trip id is empty.
		if ( empty( $trip_id ) ) {
			return $wp_travel_meta;
		}

		// Bail early if provided post id is not WP Travel Itinerary post.
		if ( 'itineraries' !== get_post_type( $trip_id ) ) {
			return $wp_travel_meta;
		}

		$meta_object   = new Travel_Escape_WP_Travel_Metas( $trip_id );
		$general       = $meta_object->general();
		$prices        = $meta_object->prices( $min_price_sale );
		$date_and_time = $meta_object->date_and_time();
		$trip_terms    = $meta_object->trip_terms();
		$thumbnails    = $meta_object->thumbnails();

		/**
		 * Create the meta array.
		 */
		$itinerary_meta = array(
			'general'       => $general,
			'prices'        => $prices,
			'date_and_time' => $date_and_time,
			'trip_terms'    => $trip_terms,
			'thumbnails'    => $thumbnails,
		);
		$wp_travel_meta = $itinerary_meta;

		/**
		 * If $args['featured_trips'] is passed true then
		 * reset the array and list only featured trips.
		 */
		if ( $featured_trips && 'yes' === $itinerary_meta['general']['is_featured'] ) {
			$wp_travel_meta = array();
			$wp_travel_meta = $itinerary_meta;
		}

		if ( 'all' === $retrive ) {
			return $wp_travel_meta;
		}

		return ! empty( $wp_travel_meta[ $retrive ] ) ? $wp_travel_meta[ $retrive ] : array();
	}
}



function travel_escape_custom_dynamic_colors() {
	$primary_color   = sanitize_hex_color( travel_escape_get_theme_mod( 'primary_color' ) );
	$secondary_color = sanitize_hex_color( travel_escape_get_theme_mod( 'secondary_color' ) );

	$fonts = travel_escape_fonts();

	$heading_fonts = travel_escape_get_theme_mod( 'heading_fonts' );

	$heading_font_name = isset( $fonts[ $heading_fonts ] ) ? $fonts[ $heading_fonts ] : 'Roboto';

	ob_start();
	?>
	<style>
		button::after, .button::after, .btn::after, input[type=submit]::after, .no-order a::after, .elementor-button::after,
		button, .button, .btn, input[type=submit], .no-order a, .elementor-button,
		.filter-section #filters .button.is-checked, button.btn-dark:hover, .button.btn-dark:hover, .btn.btn-dark:hover, input[type=submit].btn-dark:hover, .no-order a.btn-dark:hover, .elementor-button.btn-dark:hover, .features-section .feature-item .feature-icon::after, .features-section .feature-item .icon::after, .features-section .destination-item-container .feature-icon::after, .features-section .destination-item-container .icon::after, .trip-destination-wrapper .feature-item .feature-icon::after, .trip-destination-wrapper .feature-item .icon::after, .trip-destination-wrapper .destination-item-container .feature-icon::after, .trip-destination-wrapper .destination-item-container .icon::after, .pagination .page-numbers .page-numbers:hover, .pagination .page-numbers .page-numbers.current, .pagination .page-numbers .page-numbers:hover, .pagination .page-numbers .page-numbers.current, .wp-travel-toolbar .wp-toolbar-right .wp-travel-view-mode.active-mode a, .wp-travel-post-item-wrapper .wp-travel-explore a, .wp-travel-default-article .wp-travel-explore a, .wp-travel-send-enquiries:hover, .wp-travel-explore a:hover, #wp-travel-enquiries .mfp-close:hover, .ws-theme-cart-page .ws-theme-cart-list.table-total-info .actions .wp-travel-update-cart-btn:hover, button.bg-none:hover, .button.bg-none:hover, .btn.bg-none:hover, input[type=submit].bg-none:hover, .no-order a.bg-none:hover, .elementor-button.bg-none:hover, ul.social-icons a:hover, #wp-travel-tab-wrapper .resp-tabs-container .resp-accordion.resp-tab-active, .wp-travel-offer span, .tag-cloud-link:hover, .tag-cloud-link:visited:hover, .wp-calendar-nav [class*="wp-calendar-nav-"] a:hover, .trip .trip-thumbnail .offer, button.btn-border-dark:hover, .button.btn-border-dark:hover, .btn.btn-border-dark:hover, input[type=submit].btn-border-dark:hover, .no-order a.btn-border-dark:hover, .elementor-button.btn-border-dark:hover, .dashboard-tab .resp-tabs-container .resp-tab-content .my-order .book-more a, #wp-travel-tab-wrapper #booking .wp-travel-booking__pricing-wrapper .qty-spinner button {
			background-color: <?php echo esc_attr( $primary_color ); ?> !important;
		}
		button, .button, .btn, input[type=submit], .no-order a, .elementor-button, button.btn-dark:hover, .button.btn-dark:hover, .btn.btn-dark:hover, input[type=submit].btn-dark:hover, .no-order a.btn-dark:hover, .elementor-button.btn-dark:hover, button:hover, .button:hover, .btn:hover, input[type=submit]:hover, .no-order a:hover, .elementor-button:hover, .slick-dots li.slick-active, .slick-dots li:hover, .wp-travel-post-item-wrapper .wp-travel-explore a, .wp-travel-default-article .wp-travel-explore a, .wp-travel-send-enquiries:hover, .wp-travel-explore a:hover, #wp-travel-enquiries .wp-travel-inquiry__form-header, .ws-theme-cart-page .ws-theme-cart-list.table-total-info .coupon input[type=submit], .wp-travel .ws-theme-cart-page .ws-theme-cart-list.table-total-info .actions .wp-travel-update-cart-btn:hover, .ws-theme-cart-page, .ws-theme-cart-page .ws-theme-cart-list thead tr th, .tag-cloud-link:hover, .tag-cloud-link:visited:hover, .wp-calendar-nav [class*="wp-calendar-nav-"] a:hover, button.btn-border-dark:hover, .button.btn-border-dark:hover, .btn.btn-border-dark:hover, input[type=submit].btn-border-dark:hover, .no-order a.btn-border-dark:hover, .elementor-button.btn-border-dark:hover, .dashboard-tab .resp-tabs-container .resp-tab-content .my-order .book-more a, #wp-travel-tab-wrapper #booking .wp-travel-booking__header button {
			border-color: <?php echo esc_attr( $primary_color ); ?> !important;
		}
		.site-header .main-navigation .menu-item.current_page_item > a, .site-header .main-navigation .menu-item.current-menu-item > a, .site-header .main-navigation .menu-item:hover > a, .site-header .main-navigation .page_item.current_page_item > a, .site-header .main-navigation .page_item.current-menu-item > a, .site-header .main-navigation .page_item:hover > a, button:hover, .button:hover, .btn:hover, input[type=submit]:hover, .no-order a:hover, .elementor-button:hover,
		.ratings .rating-stars::before, a:hover, a:visited:hover, .wp-travel-average-review:before, .wp-travel-average-review span, .features-section .feature-item .feature-icon i, .features-section .feature-item .icon i, .features-section .destination-item-container .feature-icon i, .features-section .destination-item-container .icon i, .trip-destination-wrapper .feature-item .feature-icon i, .trip-destination-wrapper .feature-item .icon i, .trip-destination-wrapper .destination-item-container .feature-icon i, .trip-destination-wrapper .destination-item-container .icon i, .breadcrumbs ul li:last-child span, .pagination .page-numbers .page-numbers, .breadcrumbs ul li a:hover span, .wp-travel-trip-code code, .trip-headline-wrapper .right-plot-inner-wrap .wp-travel-trip-meta-info ul li::before, #wp-travel-tab-wrapper .resp-tabs-list li.resp-tab-active, #wp-travel-tab-wrapper .resp-tabs-list li:hover, .ws-theme-cart-page .ws-theme-cart-list tr p.total strong, .post-edit-link, .wp-travel-post-item-wrapper .wp-travel-explore a:hover, .wp-travel-default-article .wp-travel-explore a:hover, .ws-theme-cart-page .ws-theme-cart-list.table-total-info .coupon input[type=submit]:hover, .trip-destination .trip-destination-wrapper .destination-item-container .destination-title:hover, .trip-headline-wrapper .right-plot-inner-wrap .wp-travel-add-to-wishlists, .wp-travel-post-item-wrapper .wp-travel-entry-content-wrapper .description-left .wp-travel-add-to-wishlists, .wp-travel-default-article .wp-travel-entry-content-wrapper .description-left .wp-travel-add-to-wishlists, .wp-travel .ws-theme-cart-page .ws-theme-cart-list.table-total-info .actions .wp-travel-update-cart-btn:hover, .widget_wp_travel_filter_search_widget .wp-trave-price-range .wp-travel-tab-wrapper .wp-travel-booking-form-wrapper form .wp-travel-form-field select, .widget_wp_travel_filter_search_widget .wp-trave-price-range .wp-travel-tab-wrapper .wp-travel-booking-form-wrapper form .wp-travel-form-field textarea, .widget_wp_travel_filter_search_widget .wp-trave-price-range input, .wp-travel-tab-wrapper .wp-travel-booking-form-wrapper form .wp-travel-form-field .widget_wp_travel_filter_search_widget .wp-trave-price-range select, .wp-travel-tab-wrapper .wp-travel-booking-form-wrapper form .wp-travel-form-field .widget_wp_travel_filter_search_widget .wp-trave-price-range textarea, .wp-travel .button:hover, #wp-travel-tab-wrapper #booking .wp-travel-booking__header button:hover {
			color: <?php echo esc_attr( $primary_color ); ?> !important;
		}

		.dashboard-tab ul.resp-tabs-list li.resp-tab-active {
			box-shadow: inset 2px 0px 0 <?php echo esc_attr( $primary_color ); ?>;
		}

		/* Opacity */
		.features-section .feature-item .feature-icon, .features-section .feature-item .icon, .features-section .destination-item-container .feature-icon, .features-section .destination-item-container .icon, .trip-destination-wrapper .feature-item .feature-icon, .trip-destination-wrapper .feature-item .icon, .trip-destination-wrapper .destination-item-container .feature-icon, .trip-destination-wrapper .destination-item-container .icon{
			background-color: <?php echo esc_attr( "{$primary_color}33" ); ?>;
		}

		/* CSS override Fix */
		.features-section .feature-item:hover .feature-icon i, .features-section .feature-item:hover .icon i, .features-section .destination-item-container:hover .feature-icon i, .features-section .destination-item-container:hover .icon i, .trip-destination-wrapper .feature-item:hover .feature-icon i, .trip-destination-wrapper .feature-item:hover .icon i, .trip-destination-wrapper .destination-item-container:hover .feature-icon i, .trip-destination-wrapper .destination-item-container:hover .icon i, .pagination .page-numbers .page-numbers:hover, .pagination .page-numbers .page-numbers.current, .ws-theme-cart-page .ws-theme-cart-list.table-total-info .actions .wp-travel-update-cart-btn, ul.social-icons a:hover, .tag-cloud-link:hover, .tag-cloud-link:visited:hover, .wp-calendar-nav [class*="wp-calendar-nav-"] a:hover, #wp-travel-tab-wrapper #booking .wp-travel-booking__header button {
			color: #fff !important;
		}
		.wp-travel-post-item-wrapper .wp-travel-explore a:hover, .wp-travel-default-article .wp-travel-explore a:hover {
			background-color: transparent !important;
		}


		/** Secondary colors */
		button.btn-dark::after, .button.btn-dark::after, .btn.btn-dark::after, input[type=submit].btn-dark::after, .no-order a.btn-dark::after, .elementor-button.btn-dark::after, button.btn-dark, .button.btn-dark, .btn.btn-dark, input[type=submit].btn-dark, .no-order a.btn-dark, .elementor-button.btn-dark, .bg-dark, .trip-destination .trip-destination-wrapper .destination-item-container, .site-footer {
			background-color: <?php echo esc_attr( $secondary_color ); ?> !important;
		}

		button.btn-dark, .button.btn-dark, .btn.btn-dark, input[type=submit].btn-dark, .no-order a.btn-dark, .elementor-button.btn-dark {
			border-color: <?php echo esc_attr( $secondary_color ); ?> !important;
		}



		/* fonts and typography */
		h1,h2,h3,h4,h5,h6,.site-title {
			font-family: '<?php echo esc_attr( $heading_font_name ); ?>';
		}

		.site-header, .site-header.scrolling {
			background-image: url(<?php header_image(); ?>);
		}

	</style>
	<?php
	$data = ob_get_clean();
	$data = str_replace( array( '<style>', '</style>' ), '', $data );

	wp_add_inline_style( 'travel-escape-main-style', $data );
}




/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
* TGM plugin additions.
*/
require get_template_directory() . '/inc/tgm-plugin/tgmpa-hook.php';



/**
* Load elementor widgets.
*/
require get_template_directory() . '/inc/elementor/class-travel-escape-load-elementor-widgets.php';
