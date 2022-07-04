<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Pied-de-Poul
 */

get_header();

?>

<section id="page-not-found">
    <div class="container">
        <div class="page-not-found">
            <div class="page-not-found__icon">
                <svg width="38" height="37" fill="none"><path d="M30 7.3V.1l-7.3 7.2h-7.5L.6 22h7.3l7.3-7.3V22h7.5l-7.5 7.3v7.3l14.9-14.6v-7.3l7.3-7.3h-7.3Z" fill="#0E0D0A"/></svg>
            </div>

            <div class="page-not-found__number">404</div>

            <h1 class="page-not-found__title"><?=__( 'Данная страница в разработке, либо отсутствует.', 'pdp' ); ?></h1>

            <a href="<?=home_url(); ?>" class="btn page-not-found__action"><?=__( 'Вернуться на главную', 'pdp' ); ?></a>
        </div>
    </div>
</section>

<?php

get_footer();
