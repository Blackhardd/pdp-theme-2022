<?php

/* Template Name: Страница категории услуг */

get_header();

?>

    <section id="service-header">
        <div class="container">
            <div class="service-hero">
                <div class="service-hero__content">
                    <h1><?php the_title(); ?></h1>

                    <div class="service-hero__description">
                        <?=wpautop( carbon_get_the_post_meta( 'hero_content' ) ); ?>
                    </div>

                    <button class="btn service-hero__action" data-micromodal-trigger="modal-service-category-booking"><span><?=__( 'Записаться', 'pdp' ); ?></span></button>
                </div>

                <img src="<?=wp_get_attachment_image_url( carbon_get_the_post_meta( 'hero_img' ), 'full' ); ?>" data-src="<?=wp_get_attachment_image_url( carbon_get_the_post_meta( 'hero_img' ), 'full' ); ?>" class="service-hero__image lazyload" />
            </div>
        </div>
    </section>

    <section id="service-content">
        <div class="container">
            <?php foreach( carbon_get_the_post_meta( 'sections' ) as $index => $section ) : ?>
                <div class="service-row <?=( $index + 1 ) % 2 !== 0 ? 'service-row--left' : 'service-row--right'; ?> <?=!$section['image'] ? 'service-row--no-image' : ''; ?>">
	                <?php if( ( $index + 1 ) % 2 !== 0 && $section['image'] ) : ?>
                        <div class="service-row__image">
                            <img data-src="<?=wp_get_attachment_image_url( $section['image'], 'full' ); ?>" class="lazyload" />
                        </div>
                    <?php endif; ?>

                    <div class="service-row__content">
                        <?php if( $section['title'] ){ ?>
                            <h2 class="service-row__title"><?=pdp_mb_ucfirst( $section['title'] ); ?></h2>
                        <?php } ?>

                        <div class="service-row__desc"><?=wpautop( do_shortcode( $section['content'] ) ); ?></div>

                        <?php if( $section['details'] ) : ?>
                            <a href="<?=get_permalink( $section['details']['id'] ); ?>" class="service-row__read-more btn-default">подробнее</a>
                        <?php endif; ?>

                        <?php if( $section['form_title'] && $section['form_service'] ) : ?>
                            <div class="service-row-form">
                                <h3 class="service-row-form__title"><?=pdp_mb_ucfirst( $section['form_title'] ); ?></h3>

	                            <?php get_template_part( 'templates/forms/service-row-form', null, ['service' => $section['form_service']] ); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if( ( $index + 1 ) % 2 === 0 && $section['image'] ) : ?>
                        <div class="service-row__image">
                            <img data-src="<?=wp_get_attachment_image_url( $section['image'], 'full' ); ?>" class="lazyload" />
                        </div>
                    <?php endif; ?>
                </div>

                <?php if( $section['after_content'] ){ ?>
                    <div class="service-row-after"><?=do_shortcode( $section['after_content'] ); ?></div>
	            <?php } ?>
            <?php endforeach; ?>
        </div>
    </section>

    <?php if( pdp_get_related_pages( $post ) ){ ?>
        <section id="service-related">
            <div class="container">
                <div class="title title--center">
                    <h3 class="title__heading"><?=__( 'Обратите внимание на другие услуги', 'pdp' ); ?></h3>
                </div>

                <div class="related-pages">
	                <?php foreach( pdp_get_related_pages( $post ) as $page ){ ?>
                        <div class="related-pages-card">
                            <a href="<?=get_permalink( $page->ID ); ?>">
                                <?=wp_get_attachment_image( carbon_get_post_meta( $page->ID, 'hero_img' ), [284, 284] ); ?>
                                <div class="related-pages-card__title"><?=$page->post_title; ?></div>
                            </a>
                        </div>
	                <?php } ?>
                </div>
            </div>
        </section>
    <?php } ?>

<?php get_footer(); ?>
