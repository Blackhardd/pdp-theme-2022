<?php
/**
 * Template Name: Главная страница
 *
 * @package PDP
 */

get_header();

$page_id = get_the_ID();
$slides = carbon_get_post_meta( $page_id, 'slides' );

?>

    <section id="home-hero">
        <div class="container">
            <div class="slider swiper">
                <div class="swiper-wrapper">
                    <?php foreach( $slides as $index => $slide ) :
                        $background1x_url = wp_get_attachment_image_url( $slide['background1x'] ,'full' );
                        $background2x_url = wp_get_attachment_image_url( $slide['background2x'] ,'full' );
                        ?>
                        <div class="slide slide--home slide--<?=$slide['type']; ?> swiper-slide">
                            <img src="<?=$background1x_url; ?>" data-src="<?=$background1x_url; ?>" data-srcset="<?=$background1x_url; ?> 1x, <?=$background2x_url; ?> 2x" class="slide__image lazyload">

                            <div class="slide__content" <?=$slide['width'] ? "style='max-width: {$slide['width']};'" : ''; ?>>
                                <div class="slide__heading-wrap">
                                    <img src="<?=$background1x_url; ?>" data-src="<?=$background1x_url; ?>" data-srcset="<?=$background1x_url; ?> 1x, <?=$background2x_url; ?> 2x" class="slide__image lazyload">

                                    <<?=$index === 0 ? 'h1' : 'div'; ?> class="slide__heading">
                                        <?=$slide['overtitle'] ? "<span class='slide__overtitle'>{$slide['overtitle']}</span>" : ''; ?>
                                        <span class="slide__title"><?=$slide['title']; ?></span>
                                    </<?=$index === 0 ? 'h1' : 'div'; ?>>
                                </div>

                                <?=$slide['description'] ? "<div class='slide__desc'>{$slide['description']}</div>" : ''; ?>

                                <?php if( $slide['button'] ) : ?>
                                    <a href="<?=$slide['link']; ?>" class='btn <?=$slide['button_style'] === 'outline' ? 'btn--outline' : ''; ?> <?=$slide['type'] === 'light' ? 'btn--white' : ''; ?> slide__action' <?=$slide['promotion'] ? "data-promotion='{$slide['promotion']}'" : ''; ?>><?=$slide['button']; ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="swiper-scrollbar"></div>
            </div>
        </div>
    </section>

    <?php if( carbon_get_the_post_meta( 'service_categories_display' ) ) : ?>
        <section id="home-services">
            <div class="container">
                <div class="title title--center">
                    <div class="title__overtitle"><?=carbon_get_the_post_meta( 'service_categories_overtitle' ); ?></div>
                    <h2 class="title__heading"><?=carbon_get_the_post_meta( 'service_categories_title' ); ?></h2>
                </div>

                <?php get_template_part( 'templates/widgets/service-categories-carousel' ); ?>
            </div>
        </section>
    <?php endif; ?>

    <?php if( carbon_get_the_post_meta( 'instagram_display' ) ) : ?>
        <section id="home-instagram">
            <div class="container">
                <div class="instagram">
                    <div class="instagram__content">
                        <div class="title instagram__title">
                            <div class="title__overtitle"><?=carbon_get_the_post_meta( 'instagram_overtitle' ); ?></div>
                            <h2 class="title__heading"><?=carbon_get_the_post_meta( 'instagram_title' ); ?></h2>
                        </div>

                        <div class="instagram__desc"><?=carbon_get_the_post_meta( 'instagram_description' ); ?></div>

                        <a href="<?=carbon_get_the_post_meta( 'instagram_link' ); ?>" class="btn btn--icon">
                            <svg width="18" height="18" fill="none">
                                <path d="M8.63.37c1.34 0 2.67-.03 4 0 1.75.03 3.08.82 4 2.29.47.73.66 1.55.66 2.42v7.85a4.7 4.7 0 0 1-4.63 4.7h-8A4.7 4.7 0 0 1 0 12.94V5.1A4.67 4.67 0 0 1 4.68.37h3.95Zm.03 1.58H4.79c-.21 0-.43.03-.65.06a3.13 3.13 0 0 0-2.56 3.13v7.79c0 .21.03.43.05.65a3.13 3.13 0 0 0 3.14 2.53h7.76c.22 0 .43-.03.62-.05a3.13 3.13 0 0 0 2.56-3.13v-7.8c0-.6-.13-1.16-.49-1.68a3.04 3.04 0 0 0-2.7-1.47c-1.27-.03-2.58-.03-3.86-.03Z"/>
                                <path d="M12.83 9a4.16 4.16 0 0 1-4.14 4.14A4.13 4.13 0 1 1 12.83 9Zm-4.17 2.46a2.44 2.44 0 0 0 2.48-2.43 2.48 2.48 0 1 0-2.48 2.43ZM14.02 4.48a.8.8 0 0 1-.81.82.83.83 0 0 1-.85-.82.8.8 0 0 1 .82-.81c.46 0 .84.35.84.81Z"/>
                            </svg>
                            <span><?=carbon_get_the_post_meta( 'instagram_button' ); ?></span>
                        </a>
                    </div>

                    <div class="instagram__images">
                        <div class="instagram__first-card">
                            <img data-src="<?=pdp_get_theme_image( 'home/instagram/first-card-1x.png' ); ?>" data-srcset="<?=pdp_get_theme_image( 'home/instagram/first-card-1x.png' ); ?> 1x, <?=pdp_get_theme_image( 'home/instagram/first-card-2x.png' ); ?> 2x" class="lazyload">
                        </div>

                        <div class="instagram__second-card">
                            <img data-src="<?=pdp_get_theme_image( 'home/instagram/second-card-1x.png' ); ?>" data-srcset="<?=pdp_get_theme_image( 'home/instagram/second-card-1x.png' ); ?> 1x, <?=pdp_get_theme_image( 'home/instagram/second-card-2x.png' ); ?> 2x" class="lazyload">
                        </div>

                        <div class="instagram__grid">
                            <?php get_template_part( 'templates/widgets/instagram-feed' ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <section id="home-map">
        <div class="container">
	        <?php get_template_part( 'templates/widgets/salons-map', null, ['display_title' => true] ); ?>
        </div>
    </section>

    <?php if( carbon_get_the_post_meta( 'banner_display' ) ) : ?>
        <section id="home-banner">
            <div class="container">
                <?php

                if( $banner_id = carbon_get_the_post_meta( 'banner' ) ) :
                    pdp_get_banner( $banner_id );
                endif;

                ?>
            </div>
        </section>
    <?php endif; ?>

    <?php if( carbon_get_the_post_meta( 'network_display' ) ) : ?>
        <section id="home-network">
            <div class="container">
                <div class="content-block content-block--center">
                    <div class="title content-block__title">
                        <div class="title__overtitle"><?=carbon_get_post_meta( $page_id, 'network_overtitle' ); ?></div>
                        <h2 class="title__heading"><?=carbon_get_post_meta( $page_id, 'network_title' ); ?></h2>
                    </div>

                    <div class="content-block__content"><?=wpautop( carbon_get_post_meta( $page_id, 'network_first_content' ) ); ?></div>
                </div>
            </div>
        </section>

        <section id="home-features">
            <div class="container">
                <?php

                $network_first_image = pdp_get_post_meta_retina_image_url( $page_id, 'network_first_image' );
                $network_second_image = pdp_get_post_meta_retina_image_url( $page_id, 'network_second_image' );

                ?>
                <div class="home-features-grid">
                    <div class="home-features-grid__item">
                        <h3><?=carbon_get_post_meta( $page_id, 'network_second_title' ); ?></h3>
                        <?=wpautop( carbon_get_post_meta( $page_id, 'network_second_content' ) ); ?>
                    </div>

                    <div class="home-features-grid__item">
                        <img data-src="<?=$network_first_image['1x']; ?>" data-srcset="<?=$network_first_image['1x']; ?> 1x, <?=$network_first_image['2x']; ?> 2x" class="lazyload">
                    </div>

                    <div class="home-features-grid__item">
                        <img data-src="<?=$network_second_image['1x']; ?>" data-srcset="<?=$network_second_image['1x']; ?> 1x, <?=$network_second_image['2x']; ?> 2x" class="lazyload">
                    </div>

                    <div class="home-features-grid__item">
                        <h3><?=carbon_get_the_post_meta( 'network_third_title' ); ?></h3>
                        <?=wpautop( carbon_get_the_post_meta( 'network_third_content' ) ); ?>
                    </div>

                    <div class="home-features-grid__item">
                        <h3><?=carbon_get_the_post_meta( 'network_fourth_title' ); ?></h3>
                        <?=wpautop( carbon_get_the_post_meta( 'network_fourth_content' ) ); ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if( carbon_get_the_post_meta( 'about_services_display' ) ) : ?>
        <section id="home-services-count">
            <div class="container">
                <?php

                $about_services_image = pdp_get_post_meta_retina_image_url( $page_id, 'about_services_image' );

                ?>
                <div class="image-row image-row--right image-row--badge">
                    <div class="image-row__content">
                        <div class="title image-row__title">
                            <div class="title__overtitle"><?=carbon_get_the_post_meta( 'about_services_overtitle' ); ?></div>
                            <h3 class="title__heading"><?=carbon_get_the_post_meta( 'about_services_title' ); ?></h3>
                        </div>

                        <div class="image-row__desc"><?=wpautop( carbon_get_the_post_meta( 'about_services_content' ) ); ?></div>

                        <div class="badge image-row__badge">
                            <svg viewBox="0 0 158 158" width="158" height="158">
                                <defs>
                                    <path d="
                                            M 14, 79
                                            a 65, 65 0 1, 1 134, 0
                                            a 65, 65 0 1, 1 -134, 0
                                        " id="badge-desktop" />
                                </defs>
                                <text>
                                    <textPath xlink:href="#badge-desktop">Время почистить перышки • Время почистить перышки •</textPath>
                                </text>
                            </svg>

                            <div class="badge__logo">
                                <svg width="32" height="32" fill="none">
                                    <path d="M25.6 6.4V0l-6.4 6.4h-6.4L0 19.2h6.4l6.4-6.4v6.4h6.4l-6.4 6.4V32l12.8-12.8v-6.4L32 6.4h-6.4Z" fill="#0E0D0A" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <img data-src="<?=$about_services_image['1x']; ?>" data-srcset="<?=$about_services_image['1x']; ?> 1x, <?=$about_services_image['2x']; ?> 2x" class="image-row__image lazyload">
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if( carbon_get_the_post_meta( 'advantages_display' ) ) : ?>
        <section id="home-advantages">
            <div class="container">
                <?php

                $advantages = carbon_get_the_post_meta( 'advantages_list' );

                ?>

                <div class="title title--center">
                    <h2 class="title__heading"><?=carbon_get_the_post_meta( 'advantages_title' ); ?></h2>
                </div>

                <div class="advantages">
                    <div class="advantages__items">
                        <div class="advantages__short">
                            <?php foreach( $advantages as $key => $item ) : ?>
                                <?php if( $key < 6 ) : ?>
                                    <div class="advantage">
                                        <div class="advantage__icon">
                                            <svg width="18" height="18" fill="none">
                                                <path d="M14.4 3.6V0l-3.6 3.6H7.2L0 10.8h3.6l3.6-3.6v3.6h3.6l-3.6 3.6V18l7.2-7.2V7.2L18 3.6h-3.6Z" fill="#0E0D0A"/>
                                            </svg>
                                        </div>

                                        <div class="advantage__content"><?=$item['content']; ?></div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>

                        <div class="advantages__rest">
                            <?php foreach( $advantages as $key => $item ) : ?>
                                <?php if( $key > 5 ) : ?>
                                    <div class="advantage">
                                        <div class="advantage__icon">
                                            <svg width="18" height="18" fill="none">
                                                <path d="M14.4 3.6V0l-3.6 3.6H7.2L0 10.8h3.6l3.6-3.6v3.6h3.6l-3.6 3.6V18l7.2-7.2V7.2L18 3.6h-3.6Z" fill="#0E0D0A"/>
                                            </svg>
                                        </div>

                                        <div class="advantage__content"><?=$item['content']; ?></div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <?php if( count( $advantages ) > 6 ) : ?>
                        <div class="advantages__more"><span><?=__( 'Показать больше', 'pdp' ); ?></span></div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if( carbon_get_the_post_meta( 'testimonials_display' ) ) : ?>
        <section id="home-testimonials">
            <div class="container">
                <div class="title title--center">
                    <?=$franchise_overtitle = carbon_get_post_meta( $page_id, 'testimonials_overtitle' ) ? "<div class='title__overtitle'>{$franchise_overtitle}</div>" : ''; ?>
                    <h2 class="title__heading"><?=carbon_get_post_meta( $page_id, 'testimonials_title' ); ?></h2>
                </div>

                <?php get_template_part( 'templates/widgets/testimonials' ); ?>
            </div>
        </section>
    <?php endif; ?>

    <?php if( carbon_get_the_post_meta( 'services_display' ) ) : ?>
        <section id="home-extended-menu">
            <div class="container">
                <div class="title title--center">
                    <div class="title__overtitle"><?=carbon_get_the_post_meta( 'services_overtitle' ); ?></div>
                    <h2 class="title__heading"><?=carbon_get_the_post_meta( 'services_title' ); ?></h2>
                </div>

                <div class="extended-menu">
                    <div class="extended-menu__items">
                        <?php foreach( carbon_get_the_post_meta( 'services_categories' ) as $item ) : ?>
                            <div class="extended-menu__item">
                                <div class="extended-menu__title"><span><?=$item['title']; ?></span></div>
                                <div class="extended-menu__desc"><?=$item['content']; ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="extended-menu__footer">
                        <div class="extended-menu__call"><?=carbon_get_the_post_meta( 'services_call' ); ?></div>
                        <a href="<?=carbon_get_the_post_meta( 'services_link' ); ?>" class="btn extended-menu__action"><?=carbon_get_the_post_meta( 'services_button' ); ?></a>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if( carbon_get_the_post_meta( 'perfectionism_display' ) ) : ?>
        <section id="home-perfection">
            <div class="container">
                <?php $perfectionism_image = pdp_get_post_meta_retina_image_url( $page_id, 'perfectionism_image' ); ?>
                <div class="image-row image-row--right image-row--small">
                    <div class="image-row__content">
                        <div class="title image-row__title">
                            <h2 class="title__heading"><?=carbon_get_the_post_meta( 'perfectionism_heading' ); ?></h2>
                        </div>

                        <div class="image-row__desc"><?=wpautop( carbon_get_the_post_meta( 'perfectionism_content' ) ); ?></div>
                    </div>

                    <img data-src="<?=$perfectionism_image['1x']; ?>" data-srcset="<?=$perfectionism_image['1x']; ?> 1x, <?=$perfectionism_image['2x']; ?> 2x" class="image-row__image lazyload">
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if( carbon_get_the_post_meta( 'form_display' ) ) : ?>
        <section id="home-form">
            <div class="container">
                <div class="title title--center">
                    <h3 class="title__heading"><?=carbon_get_the_post_meta( 'form_title' ); ?></h3>
                    <div class="title__subtitle"><?=carbon_get_the_post_meta( 'form_subtitle' ); ?></div>
                </div>

                <?php get_template_part( 'templates/forms/simple-booking' ); ?>
            </div>
        </section>
    <?php endif; ?>

    <?php if( carbon_get_the_post_meta( 'faq_display' ) ) : ?>
        <section id="home-faq">
            <div class="container">
                <?php $faq = carbon_get_the_post_meta( 'faq_items' ); ?>
                <div class="title">
                    <h2 class="title__heading"><?=carbon_get_the_post_meta( 'faq_title' ); ?></h2>
                </div>

                <div class="faq">
                    <?php foreach( $faq as $item ) : ?>
                        <div class="faq-item">
                            <div class="faq-item__header">
                                <div class="faq-item__title"><?=$item['title']; ?></div>

                                <div class="faq-item__icon">
                                    <svg width="24" height="24" fill="none">
                                        <circle cx="12" cy="12" r="12" fill="#0E0D0A"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.25 11.25V7.2h1.5v4.05h4.05v1.5h-4.05v4.05h-1.5v-4.05H7.2v-1.5h4.05Z" fill="#fff"/>
                                    </svg>
                                </div>
                            </div>

                            <div class="faq-item__body">
                                <div class="faq-item__body-inner"><?=$item['content']; ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <script type="application/ld+json">
                    {
                        "@context": "https://schema.org",
                        "@type": "FAQPage",
                        "mainEntity": [
                            <?php foreach( $faq as $key => $item ) : ?>
                                {
                                    "@type": "Question",
                                    "name": "<?=$item['title']; ?>",
                                    "acceptedAnswer": {
                                        "@type": "Answer",
                                        "text": "<?=preg_replace('#\s{2,}#', '', strip_tags( $item['content'] ) ); ?>"
                                    }
                                }<?=$key <= count( $faq ) - 1 ? ',' : ''; ?>
                            <?php endforeach; ?>
                        ]
                    }
                </script>
            </div>
        </section>
    <?php endif; ?>

<?php get_footer(); ?>