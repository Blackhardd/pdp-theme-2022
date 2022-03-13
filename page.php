<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pied-de-Poul
 */

get_header(); ?>
    <header class="page-header">
        <div class="container">
            <div class="title">
                <h1 class="title__heading"><?php the_title(); ?></h1>
            </div>
        </div>
    </header>

    <?php
    while( have_posts() ) :
        the_post();

        get_template_part( 'template-parts/content', 'page' );
    endwhile; ?>
<?php
get_footer();
