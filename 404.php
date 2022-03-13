<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Pied-de-Poul
 */

get_header(); ?>
    <section>
        <div class="container">
            <div class="error-404">
                <div class="error-404__number">404</div>
                <h1 class="error-404__title">данная страница в разработке, либо отсутствует</h1>
                <a href="/" class="error-404__to-home btn-default">на главную</a>
            </div>
        </div>
    </section>
<?php
get_footer();
