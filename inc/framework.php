<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Pied-de-Poul
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

add_filter( 'body_class', 'pdp_body_classes' );

function pdp_body_classes( $classes ){
	// Adds a class of hfeed to non-singular pages.
	if ( !is_singular() ){
		$classes[] = 'hfeed';
	}

	return $classes;
}


/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */

add_action( 'wp_head', 'pdp_pingback_header' );

function pdp_pingback_header(){
	if( is_singular() && pings_open() ){
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}


/**
 *  Adding critical CSS
 */

add_action( 'wp_head', 'pdp_add_critical_css' );

function pdp_add_critical_css(){
    if( is_readable( PDP_THEME_DIR . '/assets/css/critical/header.min.css' ) ) : ?>
        <style id="header-critical-css"><?=file_get_contents( PDP_THEME_DIR . '/assets/css/critical/header.min.css' ); ?></style>
    <?php endif;
}


/**
 * Add analytics
 */

add_action( 'wp_head', 'pdp_add_analytics' );

function pdp_add_analytics(){
	echo carbon_get_theme_option( 'analytics_code' );
}

add_action( 'wp_footer', 'pdp_add_analytics_footer' );

function pdp_add_analytics_footer(){
	echo carbon_get_theme_option( 'analytics_code_footer' );
}


/**
 * Add gtag.js actions
 */

add_action( 'wp_footer', 'pdp_add_gtag_actions', 100 );

function pdp_add_gtag_actions(){
	if( $actions = carbon_get_theme_option( 'gtag_actions' ) ){
		echo "
            <script>
                jQuery(function($){
                    $(document).ready(function(){
        ";

		foreach( $actions as $action ){
			echo "$('{$action['selector']}').on('{$action['event']}', () => gtag('event', '{$action['gtag_event']}', { 'event_category': '{$action['gtag_category']}', 'event_action': '{$action['gtag_action']}' }));\n";
		}

		echo "
                    });
                });
            </script>
        ";
	}
}


/**
 * Remove title from pagination
 */

add_filter( 'navigation_markup_template', 'pdp_pagination_template', 10, 2 );

function pdp_pagination_template( $template, $class ){
	return '
        <nav class="navigation %1$s" role="navigation">
            <div class="nav-links">%3$s</div>
        </nav>    
	';
}


/**
 * Registration of image sizes for theme.
 */

function pdp_register_image_sizes(){
	if( function_exists( 'add_image_size' ) ){
		add_image_size( 'instagram-card-1x', 124, 124, true );
		add_image_size( 'instagram-card-2x', 248, 248, true );
	}
}

pdp_register_image_sizes();


/**
 *  Allow to search only posts
 */

add_filter( 'pre_get_posts', 'pdp_search_posts_filter' );

function pdp_search_posts_filter( $query ){
	if( $query->is_search ){
		$query->set( 'post_type', 'post' );
	}

	return $query;
}


/**
 *  Getting related service pages
 */

function pdp_get_related_pages( $post = false ){
	if( !$post ){
		return false;
	}
	else{
		if( $post->post_parent != 0 ){
			return get_children( array(
				'post_type'     => 'page',
				'numberposts'   => 4,
				'orderby'       => 'rand',
				'order'         => 'ASC',
				'post_parent'   => $post->post_parent,
				'exclude'       => $post->ID
			) );
		}
		else{
			$pages = array(
				117,
				108,
				98,
				88,
				130,
				132
			);

			if( ($key = array_search( $post->ID, $pages ) ) !== false ){
				unset( $pages[$key] );
				$pages = array_values( $pages );
			}

			$random_keys = array_rand( $pages, 4 );

			$pages = array(
				$pages[$random_keys[0]],
				$pages[$random_keys[1]],
				$pages[$random_keys[2]],
				$pages[$random_keys[3]]
			);

			return get_posts( array(
				'post_type'     => 'page',
				'numberposts'   => 4,
				'orderby'       => 'rand',
				'order'         => 'ASC',
				'include'       => implode( ',', $pages ),
			) );
		}
	}
}


/**
 *  Getting current language
 */

function pdp_get_current_language(){
    return pll_current_language() === 'uk' ? 'ua' : pll_current_language();
}


/**
 *  Getting image from theme folder
 */

function pdp_get_theme_image( $path ){
    return get_template_directory_uri() . "/assets/img/{$path}";
}


/**
 *  Creating table of contents from string.
 */

function pdp_the_table_of_contents( $content = '', $is_mobile = false ){
    preg_match_all( '@<h2.*?>(.*?)<\/h2>@', $content, $matches );

    if( $matches[1] ) : ?>

        <?php if( !$is_mobile ) : ?>
            <div class="single-post-contents single-post-contents--desktop">
        <?php endif; ?>

        <div class="contents-table">
            <ol>
                <?php foreach( $matches[1] as $index => $heading ) :
                    $i = $index + 1; ?>
                    <li><span><a href="<?="#toc_anchor_{$i}"; ?>"><?=strip_tags( $heading ); ?></a></span></li>
                <?php endforeach; ?>
            </ol>
        </div>

        <?php if( !$is_mobile ) : ?>
            </div>
        <?php endif; ?>

    <?php endif;
}

add_filter( 'the_content', 'pdp_add_anchors_to_content' );

function pdp_add_anchors_to_content( $content ){
	return preg_replace_callback( '/<h2.*?>/m', function( $matches ){
		static $count = 0;
		$count++;

		return "<h2 id='toc_anchor_{$count}'>";
	}, $content );
}


/**
 *  Getting related posts
 */

function pdp_get_related_posts( $post ){
    return get_posts( array(
	    'category__in'  => wp_get_post_categories( $post ),
	    'post__not_in'  => array( $post )
    ) );
}


/**
 *  Getting post card
 */

function pdp_get_post_card( $post ){
    get_template_part( 'templates/blog/post-card', null, ['post' => $post] );
}


/**
 *  Getting responsive image from post meta
 */

function pdp_get_post_meta_retina_image_url( $post_id, $name ){
    return array(
        '1x' => wp_get_attachment_image_url( carbon_get_post_meta( $post_id, "{$name}1x" ), 'full' ),
        '2x' => wp_get_attachment_image_url( carbon_get_post_meta( $post_id, "{$name}2x" ), 'full' )
    );
}


/**
 *  Getting site main city
 */

function pdp_get_main_city( $lang = 'ru' ){
    $main_city_id = carbon_get_theme_option( 'main_city' )[0]['id'];
    return $main_city_id ? get_term( pll_get_term( $main_city_id, $lang ) )->name : false;
}


/**
 *  Getting salon cities
 */

function pdp_get_salon_cities(){
    return get_terms( array( 'taxonomy' => 'city', 'hide_empty' => false ) );
}


/**
 *  Getting main salon
 */

function pdp_get_main_salon(){
    return carbon_get_theme_option( 'main_salon' );
}


/**
 *  Getting salon pricelist URL
 */

function pdp_get_salon_pricelist_url( $id ){
    return add_query_arg( 'salonId', $id, get_permalink( pll_get_post( 66 ) ) );
}


/**
 *  Getting single salon
 */

function pdp_get_salon( $id ){
	if( !$id ){
		return false;
	}

	return get_post( $id );
}


/**
 *  Getting single salon data
 */

function pdp_get_salon_data( $id ){
	$salon = pdp_get_salon( $id );

	$title = carbon_get_post_meta( $salon->ID, 'title' );
	$outer_link = carbon_get_post_meta( $salon->ID, 'outer_link' );
	$link = carbon_get_post_meta( $salon->ID, 'map_link' );
	$lat = carbon_get_post_meta( $salon->ID, 'latitude' );
	$lng = carbon_get_post_meta( $salon->ID, 'longitude' );
	$phone = carbon_get_post_meta( $salon->ID, 'phone' );

	return array(
		'id'                => $salon->ID,
		'name'              => $salon->post_title,
		'cover'             => pdp_get_post_meta_retina_image_url( $salon->ID, 'cover' ),
		'outer_link'		=> $outer_link ? $outer_link : false,
		'title'             => $title ? $title : false,
		'phone'             => $phone ? $phone : false,
		'city'              => wp_get_post_terms( $salon->ID, 'city' )[0]->name,
		'link'              => $link ? $link : false,
		'location'          => $lat && $lng ? array( 'lat' => floatval( $lat ), 'lng' => floatval( $lng ) ) : false,
		'display_in_forms'  => carbon_get_post_meta( $salon->ID, 'display_in_forms' ) === 'yes'
	);
}


/**
 *  Getting salons
 */

function pdp_get_salons( $order = 'ASC', $lang = false ){
	$params = array(
		'numberposts'   => -1,
		'post_type'     => 'salon',
		'order'         => $order
	);

	if( $lang ){
		$params['lang'] = $lang === 'all' ? '' : $lang;
	}
	else{
	    $params['lang'] = pll_current_language();
    }

	return get_posts( $params ) ;
}


/**
 *  Getting salons data
 */

function pdp_get_salons_data(){
	$data = array();
	$salons = pdp_get_salons();

	foreach( $salons as $salon ){
		$title = carbon_get_post_meta( $salon->ID, 'title' );
		$link = carbon_get_post_meta( $salon->ID, 'map_link' );
		$lat = carbon_get_post_meta( $salon->ID, 'latitude' );
		$lng = carbon_get_post_meta( $salon->ID, 'longitude' );
		$phone = carbon_get_post_meta( $salon->ID, 'phone' );
		$instagram = carbon_get_post_meta( $salon->ID, 'instagram' );

		if( $link && $lat && $lng ){
			$salon_data = array(
			    'id'                => $salon->ID,
				'name'              => $salon->post_title,
				'title'             => $title ? $title : false,
				'phone'             => $phone ? $phone : false,
				'city'              => wp_get_post_terms( $salon->ID, 'city' )[0]->name,
				'instagram'         => $instagram ? $instagram : false,
				'link'              => $link,
				'location'          => array(
					'lat'               => floatval( $lat ),
					'lng'               => floatval( $lng )
				),
                'display_in_forms'  => carbon_get_post_meta( $salon->ID, 'display_in_forms' ) === 'yes'
			);

			$data[] = $salon_data;
		}
	}

	return $data;
}


/**
 *  Getting salons with pricelist
 */

function pdp_get_salons_with_pricelist(){
    $salons = array();
    $salons_raw = pdp_get_salons_data();

    foreach( $salons_raw as $salon ){
        if( carbon_get_post_meta( $salon['id'], 'pricelist_sheet_id' ) ){
            $salons[] = $salon;
        }
    }

    return $salons;
}


/**
 *  Getting salons grouped by city
 */

function pdp_get_salons_grouped_by_city(){
    $grouped = array();
    $salons_raw = pdp_get_salons_data();
    $main_city = pdp_get_main_city( '' );

    foreach( $salons_raw as $salon ){
        $grouped[$salon['city']][] = $salon;
    }

	if( $main_city ){
		$main_city_salons = array( $main_city => $grouped[$main_city] );
		unset( $grouped[$main_city] );
		$grouped = $main_city_salons + $grouped;
	}

    return $grouped;
}


/**
 *  Getting multilingual salon ID's
 */

function pdp_get_multilingual_salon_ids(){
    $langs = pll_languages_list();
    $salons = pdp_get_salons();

    $data = array();

    foreach( $salons as $salon ) :
        $ids = array();

        foreach( $langs as $lang ) :
            $ids[$lang === 'uk' ? 'ua' : $lang] = pll_get_post( $salon->ID, $lang );
        endforeach;

        $data[] = $ids;
    endforeach;

    return $data;
}


/**
 *  Getting salon cities map data
 */

function pdp_get_salon_cities_map_data(){
    $cities = array();
    $cities_raw = pdp_get_salon_cities();

    foreach( $cities_raw as $city ){
        $cities[] = $city->name;
    }

    return $cities;
}


/**
 *  Getting salon card
 */

function pdp_get_salon_card( $id, $slider = false ){
    get_template_part( 'templates/salon/card', null, ['id' => $id, 'slider' => $slider] );
}


/**
 *  Getting Instagram feed items
 */

function pdp_get_instagram_feed_items(){
    return array_slice( get_option( 'instagram_feed_uploads', array() ), 0, 9 );
}


/**
 *  Getting map widget
 */

function pdp_get_map( $display_title = true ){
    get_template_part( 'templates/widgets/salons-map', null, ['display_title' => $display_title] );
}


/**
 *  Getting testimonials
 */

function pdp_get_testimonials(){
    $testimonials = array();
    $testimonials_raw = get_posts( array(
	    'post_type'     => 'testimonial',
	    'numberposts'   => -1,
	    'order'         => 'ASC'
    ) );

    foreach( $testimonials_raw as $testimonial ){
        $meta = pdp_get_testimonial_meta( $testimonial->ID );
	    $testimonials[] = array(
	        'id'            => $testimonial->ID,
	        'name'          => $testimonial->post_title,
            'content'       => $testimonial->post_content,
            'occupation'    => $meta['occupation'],
            'images'        => $meta['images']
        );
    }

    return $testimonials;
}


/**
 *  Getting testimonial meta data
 */

function pdp_get_testimonial_meta( $id ){
	$occupation = carbon_get_post_meta( $id, 'occupation' );
	$small1x = carbon_get_post_meta( $id, 'small1x' );
	$small2x = carbon_get_post_meta( $id, 'small2x' );
	$large1x = carbon_get_post_meta( $id, 'large1x' );
	$large2x = carbon_get_post_meta( $id, 'large2x' );

	return array(
	    'occupation'    => $occupation,
        'images'        => array(
	        'small'         => array(
		        '1x' => wp_get_attachment_image_url( $small1x, 'full' ),
		        '2x' => wp_get_attachment_image_url( $small2x, 'full' )
	        ),
            'large'         => array(
                '1x' => wp_get_attachment_image_url( $large1x, 'full' ),
                '2x' => wp_get_attachment_image_url( $large2x, 'full' )
            )
        )
    );
}


/**
 *  Getting vacancies data
 */

function pdp_get_vacancies(){
	$vacancies = array();
	$vacancies_raw = get_posts( array(
		'numberposts'   => -1,
		'post_type'     => 'vacancy'
	) );

	foreach( $vacancies_raw as $vacancy ){
	    $vacancies[] = array(
	        'title'     => $vacancy->post_title,
            'content'   => $vacancy->post_content,
	        'preview'   => carbon_get_post_meta( $vacancy->ID, 'preview' ),
            'isNew'     => carbon_get_post_meta( $vacancy->ID, 'actual' ) === 'true'
        );
    }

	return $vacancies;
}


/**
 * 	Getting all banners
 */

function pdp_get_banners(){
	$banners = array();
	$banners_raw = get_posts( array(
		'numberposts'   => -1,
		'post_type'     => 'banner'
	) );

	foreach( $banners_raw as $banner ){
	    $banners[$banner->ID] = $banner->post_title;
    }

	return $banners;
}


/**
 *  Getting banner
 */

function pdp_get_banner( $id, $classes = array() ){
    $id = pll_get_post( $id ) ? pll_get_post( $id ) : $id;
    $banner = get_post( $id );

    if( !$banner ){
        return false;
    }

    $video_mp4 = carbon_get_post_meta( $id, 'video_mp4' );
    $image1x = carbon_get_post_meta( $id, 'image1x' );
    $image2x = carbon_get_post_meta( $id, 'image2x' );

    $data = array(
        'title'     => $banner->post_title,
        'desc'      => $banner->post_content,
        'button'    => carbon_get_post_meta( $id, 'button' ),
        'link'      => carbon_get_post_meta( $id, 'link' ),
        'type'      => carbon_get_post_meta( $id, 'banner_type' ),
        'video'     => array(
            'mp4'       => $video_mp4 ? wp_get_attachment_url( $video_mp4 ) : false
        ),
        'image'     => array(
            '1x'        => $image1x ? wp_get_attachment_image_url( $image1x, 'full' ) : false,
            '2x'        => $image2x ? wp_get_attachment_image_url( $image2x, 'full' ) : false
        )
    );

    return get_template_part( 'templates/widgets/banner', null, ['banner' => $data, 'classes' => $classes] );
}


/**
 *  Getting form field
 */

function pdp_get_form_field( $name = false, $required = false, $disabled = false ){
	if( $name ){
		ob_start();
		get_template_part( 'templates/forms/fields/' . $name, null, ['required' => $required, 'disabled' => $disabled] );
		return ob_get_clean();
	}

	return null;
}

function pdp_form_field( $name = false, $required = false, $disabled = false ){
	if( $name ){
		echo pdp_get_form_field( $name, $required, $disabled );
	}
}


/**
 *  Getting hair lengths
 */

function pdp_get_hair_lengths(){
    return array(
        __( 'от 5-15 см', 'pdp' ),
	    __( 'от 15 - 25 см (выше плеч, каре, боб)', 'pdp' ),
	    __( 'от 25 - 40 см (ниже плеч/выше лопаток)', 'pdp' ),
	    __( 'от 40 - 60 см (ниже лопаток)', 'pdp' )
    );
}


/** Actions **/


/**
 *  Changing salons archive page query
 */

add_action( 'pre_get_posts', 'pdp_set_salons_archive_query' );

function pdp_set_salons_archive_query( $query ){
    if( $query->is_post_type_archive( 'salon' ) && $query->is_main_query() ){
        $query->set( 'posts_per_page', 12 );
    }
}


/**
 *  Adding fixed contacts
 */

add_action( 'wp_footer', 'pdp_add_fixed_contacts_button' );

function pdp_add_fixed_contacts_button(){
    if( !is_page_template( 'booking.php' ) ){
	    get_template_part( 'templates/widgets/fixed-contacts' );
    }
}


/** Filters **/

/**
 *  Adding async attribute to Google Maps script enqueue
 */

add_filter( 'script_loader_tag', 'pdp_add_async_attribute', 10, 2 );

function pdp_add_async_attribute( $tag, $handle ){
	return $handle !== 'google-maps' ? $tag : str_replace( ' src', ' async="async" src', $tag );
}


/**
 *  Adding type attribute to booking related scripts enqueue
 */

add_filter( 'script_loader_tag', 'pdp_add_type_attribute', 10, 3 );

function pdp_add_type_attribute( $tag, $handle, $src ){
    if( $handle === 'header-cart' || $handle === 'header-cart-mobile' || $handle === 'booking' ){
        return str_replace( '<script ', '<script type="module"', $tag);
    }

	return $tag;
}


/** Utils **/

function pdp_mb_ucfirst( $string ){
    return mb_strtoupper( mb_substr( $string, 0, 1 ) ) . mb_substr( $string, 1 );
}

function pdp_array_key_first( $array ){
    reset( $array );
    return key( $array );
}

function pdp_is_post_new( $date ){
    return !(strtotime( $date ) < strtotime( '-30 days' ));
}

function pdp_split_post_content( $content ){
	$first_paragraph_start = strpos( $content, '<p>' );
	$first_paragraph_end = strpos( $content, '</p>', $first_paragraph_start );

	return array(
	    'paragraph' => substr( $content, $first_paragraph_start, $first_paragraph_end - $first_paragraph_start + 4 ),
        'content'   => substr( $content, $first_paragraph_end )
    );
}