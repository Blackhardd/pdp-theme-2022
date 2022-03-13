<?php /* Template Name: Вакансии */

get_header();

$vacancies = pdp_get_vacancies();

?>
    <section id="vacancies-header">
        <div class="container">
            <div class="title">
                <h1 class="title__heading"><?=get_the_title(); ?></h1>
            </div>
        </div>
    </section>

    <section id="careers-vacancies">
        <div class="container">
            <?php foreach( $vacancies as $vacancy ) : ?>
                <div class="vacancy-item">
                    <?php if( $vacancy['isNew'] ) : ?>
                        <div class="vacancy-item__topbar">
                            <div class="tag vacancy-item__tag">New</div>
                        </div>
                    <?php endif; ?>

                    <div class="vacancy-item__inner">
                        <div class="vacancy-item__header">
                            <div class="vacancy-item__title"><?=$vacancy['title']; ?></div>

                            <button class="btn btn--simple-icon vacancy-item__button">
                                <svg width="22" height="22" fill="none"><circle cx="11" cy="11" r="11" fill="#0E0D0A"/><path fill-rule="evenodd" clip-rule="evenodd" d="M10.25 10.25V6.6h1.5v3.65h3.65v1.5h-3.65v3.65h-1.5v-3.65H6.6v-1.5h3.65Z" fill="#fff"/></svg>
                            </button>
                        </div>

                        <div class="vacancy-item__content">
                            <div class="vacancy-item__full-content"><?=$vacancy['content']; ?></div>
                            <div class="vacancy-item__read-more">...</div>
                        </div>

                        <div class="vacancy-item__action">
                            <button class="btn btn--outline" data-slug="<?=$vacancy['title']; ?>" data-micromodal-trigger="modal-vacancy-apply"><?=__( 'Откликнуться', 'pdp' ); ?></button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section id="careers-banner">
        <div class="container">
            <?php pdp_get_banner( 11465 ); ?>
        </div>
    </section>

<?php get_footer(); ?>
