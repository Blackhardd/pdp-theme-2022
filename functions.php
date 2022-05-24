<?php
/**
 * PIED-DE-POULE functions and definitions
 *
 * @package PIED-DE-POULE
 */

if( !defined( 'PDP_THEME_VERSION' ) ) :
	define( 'PDP_THEME_VERSION', wp_get_theme()->get( 'Version' ) );
//	define( 'PDP_THEME_VERSION', time() );
endif;

if( !defined( 'PDP_THEME_URL' ) ) :
	define( 'PDP_THEME_URL', get_template_directory_uri() );
endif;

if( !defined( 'PDP_THEME_DIR' ) ) :
	define( 'PDP_THEME_DIR', get_template_directory() );
endif;


if( !function_exists( 'pdp_setup' ) ) :
	function pdp_setup(){
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'header-menu'           => esc_html__( 'Главное меню', 'pdp' ),
				'mobile-menu'           => esc_html__( 'Мобильное меню', 'pdp' ),
				'footer-menu-about'     => esc_html__( 'Подвал | Меню о нас', 'pdp' ),
				'footer-menu-info'      => esc_html__( 'Подвал | Меню информационное', 'pdp' ),
				'footer-salons-menu'    => esc_html__( 'Подвал | Меню салонов', 'pdp' )
			)
		);

		add_theme_support(
			'html5',
			array(
				'search-form',
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
				'pdp_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);


		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );


		// Add support for core custom logo.
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
add_action( 'after_setup_theme', 'pdp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pdp_content_width(){
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'pdp_content_width', 640 );
}
add_action( 'after_setup_theme', 'pdp_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */

add_action( 'wp_enqueue_scripts', 'pdp_scripts' );

function pdp_scripts(){
	wp_enqueue_style( 'theme', get_stylesheet_uri(), array(), PDP_THEME_VERSION );


	/**
	 *  2022 version
	 */

	wp_register_style( 'swiper', '//cdnjs.cloudflare.com/ajax/libs/Swiper/7.4.1/swiper-bundle.min.css', array( 'style' ), PDP_THEME_VERSION );
	wp_register_script( 'swiper', '//cdnjs.cloudflare.com/ajax/libs/Swiper/7.4.1/swiper-bundle.min.js', array(), PDP_THEME_VERSION );
	wp_register_style( 'overlay-scrollbars', '//cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.1/css/OverlayScrollbars.min.css', array(), PDP_THEME_VERSION );
	wp_register_script( 'overlay-scrollbars', '//cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.1/js/jquery.overlayScrollbars.min.js', array( 'jquery' ), PDP_THEME_VERSION, true );
	wp_register_script( 'imask', '//cdnjs.cloudflare.com/ajax/libs/imask/6.2.2/imask.min.js', array(), PDP_THEME_VERSION, true );
	wp_register_script( 'micromodal', '//cdn.jsdelivr.net/npm/micromodal@0.4.6/dist/micromodal.min.js', array(), PDP_THEME_VERSION, true );
	wp_register_script( 'google-maps', 'https://maps.googleapis.com/maps/api/js?libraries=places&callback=initMap&key=AIzaSyAvxHPgAd1VgEJbBd_ddG0IGqDm4Ujn9-k', array(), PDP_THEME_VERSION, true );

	wp_register_script( 'map', PDP_THEME_URL . '/assets/js/map.js', array( 'jquery', 'google-maps' ), PDP_THEME_VERSION, true );
	wp_localize_script( 'map', 'mapData', array(
		'contactsUrl'   => get_permalink( pll_get_post( 549 ) ),
		'mainCity'      => pdp_get_main_city( pll_current_language() ),
		'cities'        => pdp_get_salon_cities_map_data(),
		'salons'        => pdp_get_salons_data()
	) );

	wp_register_script( 'forms', PDP_THEME_URL . '/assets/js/forms.js', array( 'jquery' ), PDP_THEME_VERSION, true );
	wp_localize_script( 'forms', 'formsData', array(
		'ajaxUrl'       => admin_url( 'admin-ajax.php' )
	) );

	wp_enqueue_script( 'lazysizes', '//cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js', array(), PDP_THEME_VERSION );

	wp_enqueue_style( 'select', PDP_THEME_URL . '/assets/css/select.min.css', array(), PDP_THEME_VERSION );
	wp_enqueue_script( 'select', PDP_THEME_URL . '/assets/js/plugins/select.js', array(), PDP_THEME_VERSION, true );
	wp_localize_script( 'select', 'i18n', array(
		'placeholder'   => __( 'Выберите опцию', 'pdp' )
	) );


	if( carbon_get_theme_option( 'gfonts_enabled' ) !== 'yes' ){
		wp_enqueue_style( 'fonts', PDP_THEME_URL . '/assets/css/fonts.css', array(), PDP_THEME_VERSION );
	}

	wp_enqueue_style( 'style', PDP_THEME_URL . '/assets/css/index.min.css', array(), PDP_THEME_VERSION );
	wp_enqueue_script( 'script', PDP_THEME_URL . '/assets/js/index.js', array( 'jquery', 'micromodal' ), PDP_THEME_VERSION, true );



	if( is_page_template( 'gift-cards.php' ) ){
		wp_enqueue_style( 'swiper' );
		wp_enqueue_script( 'swiper' );
		wp_enqueue_script( 'gifts', PDP_THEME_URL . '/assets/js/gifts.js', array( 'jquery' ), PDP_THEME_VERSION, true );
	}

	if( !is_page_template( 'booking.php' ) ){
		wp_enqueue_script( 'header-cart', PDP_THEME_URL . '/assets/js/booking/components/HeaderCart.js', array( 'forms' ), PDP_THEME_VERSION, true );
		wp_enqueue_script( 'header-cart-mobile', PDP_THEME_URL . '/assets/js/booking/components/HeaderCartMobile.js', array( 'forms' ), PDP_THEME_VERSION, true );

		wp_localize_script( 'header-cart', 'headerCartData', array(
			'salons'    => pdp_get_multilingual_salon_ids()
		) );

		wp_localize_script( 'header-cart', 'headerCart_i18n', array(
			'lang'      => pdp_get_current_language(),
		) );

		wp_localize_script( 'header-cart-mobile', 'headerCartMobileData', array(
			'salons'    => pdp_get_multilingual_salon_ids()
		) );

		wp_localize_script( 'header-cart-mobile', 'headerCartMobile_i18n', array(
			'lang'      => pdp_get_current_language(),
		) );
	}

	if( is_page_template( 'booking.php' ) ){
		wp_enqueue_style( 'swiper' );
		wp_enqueue_script( 'swiper' );
		wp_enqueue_script( 'booking', PDP_THEME_URL . '/assets/js/booking/components/Booking.js', array( 'forms' ), PDP_THEME_VERSION, true );

		wp_localize_script( 'booking', 'bookingData', array(
			'restUrl'   => untrailingslashit( esc_url_raw( rest_url() ) ),
			'salons'    => pdp_get_multilingual_salon_ids()
		) );

		wp_localize_script( 'booking', 'booking_i18n', array(
			'lang'      => pdp_get_current_language(),
			'loading'   => __( 'Загрузка', 'pdp' )
		) );
	}
}


/**
 * Functions which enhance the theme by hooking into WordPress.
 */

require PDP_THEME_DIR . '/inc/framework.php';


/**
 *  Template Modals
 */

require PDP_THEME_DIR . '/inc/modals.php';


/**
 * Carbon fields.
 */

add_action( 'carbon_fields_register_fields', function(){
	require PDP_THEME_DIR . '/inc/theme-settings.php';
	require PDP_THEME_DIR . '/inc/carbon-meta-fields.php';
} );