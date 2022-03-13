<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pied-de-Poul
 */

get_header();

if( have_posts() ){
    if( is_home() || is_tag() ){
        get_template_part( 'templates/blog/archive/page' );
    }
    else if( is_post_type_archive( 'salon' ) ){
	    get_template_part( 'templates/salon/archive/page' );
    }
}
else{
	get_template_part( 'template-parts/content', 'none' );
}

get_footer();