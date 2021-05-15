<?php
/**
 * yala-travel functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Yala Travel
 */

define('YALA_TRAVEL_VERSION','1.2.3');

if ( ! function_exists( 'yala_travel_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function yala_travel_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on yala-travel, use a find and replace
		 * to change 'yala-travel' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'yala-travel', get_template_directory() . '/languages' );

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

		// Image Size
		add_image_size( 'yala-travel-70-55', 70, 55, true );
		add_image_size( 'yala-travel-330-220', 330, 220, true );
		add_image_size( 'yala-travel-250-350', 250, 350, true );
		add_image_size( 'yala-travel-360-440', 360, 440, true );
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'top-header-menu' => esc_html__( 'Top Header Menu', 'yala-travel'),
			'main-menu' => esc_html__( 'Main menu', 'yala-travel' ),
			'bottom-footer-menu' => esc_html__( 'Bottom Footer menu', 'yala-travel' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'yala_travel_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Woocommerce Support
		add_theme_support( 'woocommerce' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 60,
			'width'       => 200,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'yala_travel_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function yala_travel_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'yala_travel_content_width', 640 );
}
add_action( 'after_setup_theme', 'yala_travel_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function yala_travel_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'yala-travel' ),
		'id'            => 'primary',
		'description'   => esc_html__( 'Add widgets here.', 'yala-travel' ),
		'before_widget' => '<div id="%1$s" class="widget single-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="title widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets Area', 'yala-travel' ),
		'id'            => 'footer',
		'description'   => esc_html__( 'Add widgets here.', 'yala-travel' ),
		'before_widget' => '<div id="%1$s" class="widget col-lg-3 col-md-6 col-12 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'yala_travel_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function yala_travel_scripts() {

	// Bootstrap CSS
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/assets/css/bootstrap.css', array(), '4.0.0' );

	// Jquery UI
	wp_enqueue_style( 'jquery-ui', get_template_directory_uri() .'/assets/css/jquery-ui.css', array(), '1.11.4' );

	// Jquery Fancy Box CSS
	wp_enqueue_style( 'jquery-fancybox', get_template_directory_uri() .'/assets/css/jquery.fancybox.css', array(), '1.0.0' );

	// Magnific Popup CSS
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() .'/assets/css/magnific-popup.css', array(), '1.0.0' );

	// Font Awesome  CSS
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/assets/css/font-awesome.css', array(), '4.7.0' );

	// owl Carousel CSS
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() .'/assets/css/owl-carousel.css', array(), '2.2.1' );

	//Slick Nav CSS
	wp_enqueue_style( 'slick-nav', get_template_directory_uri() .'/assets/css/slicknav.css', array(), '1.0.10' );

	// Animate Css
	wp_enqueue_style( 'animate', get_template_directory_uri() .'/assets/css/animate.css', array(), '1.0.0' );

	// flex slider CSS
	wp_enqueue_style( 'flex-slider', get_template_directory_uri() .'/assets/css/flex-slider.css', array(), '2.0.0' );	

	//Nice Select CSS
	wp_enqueue_style( 'nice-select', get_template_directory_uri() .'/assets/css/nice-select.css', array(), '1.0.0' );

	//Datepicker CSS
	wp_enqueue_style( 'datepicker', get_template_directory_uri() .'/assets/css/datepicker.css', array(), '2.0.0' );

	//Reset CSS
	wp_enqueue_style( 'reset', get_template_directory_uri() .'/assets/css/reset.css', array(), '1.0.0' );

	wp_enqueue_style( 'yala_travel-style', get_stylesheet_uri() );

	// Responsive CSS
	wp_enqueue_style( 'responsive', get_template_directory_uri() .'/assets/css/responsive.css', array(), '1.0.0' );

	// Niceselect JS
	wp_enqueue_script( 'nice-select', get_template_directory_uri() . '/assets/js/niceselect.js', array('jquery'), '1.0.0', true );

	// Bootstrap Datepicker JS
	wp_enqueue_script( 'bootstrap-datepicker', get_template_directory_uri() . '/assets/js/bootstrap-datepicker.js', array('jquery'), '4.0.0', true );

	// Popper Js
	wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.js', array('jquery'), '3.3.1', true );

	// Bootstrap JS
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery'), '4.0.0', true );

	//Flex Slider JS
	wp_enqueue_script( 'flex-slider', get_template_directory_uri() . '/assets/js/flex-slider.js', array('jquery'), '2.0.0', true );

	// Steller JS
	wp_enqueue_script( 'steller', get_template_directory_uri() . '/assets/js/steller.js', array('jquery'), '1.0.0', true );

	// Fancybox JS
	wp_enqueue_script( 'facnybox', get_template_directory_uri() . '/assets/js/facnybox.js', array('jquery'), '3.1.2', true );

	//slicknav JS
	wp_enqueue_script( 'slicknav', get_template_directory_uri() . '/assets/js/slicknav.js', array('jquery'), '1.0.10', true );

	//Owl Carousel JS
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl-carousel.js', array('jquery'), '2.2.1', true );

	//Magnific Popup JS
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/magnific-popup.js', array('jquery'), '1.1.0', true );

	//Waypoints JS
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/assets/js/waypoints.js', array('jquery'), '2.0.3', true );

	// Jquery Counterup JS
	wp_enqueue_script( 'jquery-counterup', get_template_directory_uri() . '/assets/js/jquery-counterup.js', array('jquery'), '1.0.0', true );

	//Scrollup JS
	wp_enqueue_script( 'scrollup', get_template_directory_uri() . '/assets/js/scrollup.js', array('jquery'), '2.4.1', true );

	// Easing JS
	wp_enqueue_script( 'easing', get_template_directory_uri() . '/assets/js/easing.js', array('jquery'), '1.0.0', true );

	//Yala Travel Active JS
	wp_enqueue_script( 'yala_travel-active', get_template_directory_uri() . '/assets/js/active.js', array('jquery'), '1.0.0', true );

	wp_enqueue_script( 'yala_travel-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'yala_travel-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'yala_travel_scripts' );

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
* Bootstrap Navwalker
*/
require get_template_directory() . '/inc/navwalker.php';


	/**
	 * wp_commerce_template_single_add_to_cart
	 *
	 * @version 1.1.0
	 */
	function yala_travel_template_single_add_to_cart(){
		global $product;

		if ( $product->is_type( 'variable' ) ) {
			woocommerce_variable_add_to_cart();
			return;
		}

		if ( ! $product->is_purchasable() ) {
			return;
		}

		echo wc_get_stock_html( $product );

		if ( $product->is_in_stock() ) : ?>

			<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

			<form class="detail-select cart" action="<?php echo esc_url( get_permalink() ); ?>" method="post" enctype='multipart/form-data'>
				<?php
			/**
			 * @since 2.1.0.
			 */
			do_action( 'woocommerce_before_add_to_cart_button' );

			/**
			 * @since 3.0.0.
			 */
			do_action( 'woocommerce_before_add_to_cart_quantity' );

			woocommerce_quantity_input( array(
				'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
				'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
				'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : $product->get_min_purchase_quantity(),
			) );

			/**
			 * @since 3.0.0.
			 */
			do_action( 'woocommerce_after_add_to_cart_quantity' );
			?>

			<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

			<?php
			/**
			 * @since 2.1.0.
			 */
			do_action( 'woocommerce_after_add_to_cart_button' );
			?>
		</form>

		<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

	<?php endif; ?>
	<?php
}
/**
 * Load WooCommerce compatibility file.
 */
// if ( class_exists( 'WooCommerce' ) ) {
// 	require get_template_directory() . '/woocommerce.php';
// }

/**
 * Widgets include.
 */
require get_template_directory() . '/inc/widgets/widget.php';

/**
 * Admin Enqueue scripts
 */
if ( ! function_exists( 'yala_travel_admin_scripts' ) ) {
    function yala_travel_admin_scripts() {
    	wp_enqueue_media();
        wp_enqueue_script('yala-travel-widget', get_template_directory_uri() . '/assets/js/widget.js', array( 'jquery', 'customize-controls' ) );

        wp_enqueue_style('yala-travel-widget', get_template_directory_uri() . '/assets/css/widget.css', array(), '2.0.0');

    }
}

add_action('admin_enqueue_scripts', 'yala_travel_admin_scripts');



/**
 * Display category image on category archive
 */
add_action( 'woocommerce_archive_description', 'yala_travel_woocommerce_category_image', 2 );
function yala_travel_woocommerce_category_image() {
    if ( is_product_category() ){
	    global $wp_query;
	    $cat = $wp_query->get_queried_object();
	    $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
	    $image = wp_get_attachment_url( $thumbnail_id );
	    
	    return $image;
	}
}
/**
* @param array $defaults, All default options of gutentor
* @return array $defaults, modified version of default
*/
function yala_travel_gutentor_alter_default_options( $defaults ) {
$defaults['gutentor_font_awesome_version'] = 4; /*default is fontawesome 5, we change here 4*/
return $defaults;
}
add_action( 'gutentor_default_options', 'yala_travel_gutentor_alter_default_options', 999 );

require get_template_directory() . '/elementor-widget/widgets.php';
require get_template_directory() . '/inc/recommended-plugins.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}