<?php
/**
 * Template Name: О нас
 *
 * @package PDP
 */

get_header();

$page_id = get_the_ID();

?>

    <section id="about-hero">
        <div class="container">
            <?php

            $hero_background = pdp_get_post_meta_retina_image_url( $page_id, 'hero_background' );

            ?>
            <div class="page-hero">
                <img src="<?=$hero_background['1x']; ?>" data-src="<?=$hero_background['1x']; ?>" data-srcset="<?=$hero_background['1x']; ?> 1x, <?=$hero_background['2x']; ?> 2x" class="page-hero__image lazyload">

                <div class="page-hero__content">
                    <div class="page-hero__uptitle"><?=carbon_get_the_post_meta( 'hero_overtitle' )?></div>
                    <h1><?=carbon_get_the_post_meta( 'hero_title' )?></h1>
                    <div class="page-hero__subtitle"><?=carbon_get_the_post_meta( 'hero_description' )?></div>
                </div>

                <div class="page-hero__subtitle"><?=carbon_get_the_post_meta( 'hero_description' )?></div>

                <?php if( carbon_get_the_post_meta( 'hero_spinner_display' ) ) : ?>
                    <?php
                                
                    $diameter = carbon_get_the_post_meta( 'hero_spinner_diameter' );
                    $radius = $diameter / 2;

                    $mobile_diameter = carbon_get_the_post_meta( 'hero_spinner_mobile_diameter' );
                    $mobile_radius = $mobile_diameter / 2;

                    ?>

                    <div class="page-hero__scroll-below scroll-below scroll-below--desktop">
                        <svg viewBox="0 0 <?=$diameter; ?> <?=$diameter; ?>" width="<?=$diameter; ?>" height="<?=$diameter; ?>">
                            <defs>
                                <path d="M 14, <?=$radius; ?> a <?=$radius - 14; ?>, <?=$radius - 14; ?> 0 1, 1 <?=$diameter - 28; ?>, 0 a <?=$radius - 14; ?>, <?=$radius - 14; ?> 0 1, 1 -<?=$diameter - 28; ?>, 0" id="badge-desktop" />
                            </defs>
                            <text>
                                <textPath xlink:href="#badge-desktop"><?=carbon_get_the_post_meta( 'hero_spinner_text' ); ?></textPath>
                            </text>
                        </svg>

                        <a href="#gift-cards-items">
                            <svg width="38" height="52" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.5 49.8V0h1v49.8l17.15-17.15.7.7-18 18a.5.5 0 0 1-.7 0l-18-18 .7-.7L18.5 49.79Z" fill="#fff"/>
                            </svg>
                        </a>
                    </div>

                    <div class="page-hero__scroll-below scroll-below scroll-below--mobile">
                        <svg viewBox="0 0 <?=$mobile_diameter; ?> <?=$mobile_diameter; ?>" width="<?=$mobile_diameter; ?>" height="<?=$mobile_diameter; ?>">
                            <defs>
                                <path d="M 8, <?=$mobile_radius; ?> a <?=$mobile_radius - 8; ?>, <?=$mobile_radius - 8; ?> 0 1, 1 <?=$mobile_diameter - 16; ?>, 0 a <?=$mobile_radius - 8; ?>, <?=$mobile_radius - 8; ?> 0 1, 1 -<?=$mobile_diameter - 16; ?>, 0" id="badge-mobile" />
                            </defs>
                            <text>
                                <textPath xlink:href="#badge-mobile"><?=carbon_get_the_post_meta( 'hero_spinner_text' ); ?></textPath>
                            </text>
                        </svg>

                        <a href="#gift-cards-items">
                            <svg width="22" height="30" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 27.8V0h1v27.8l9.15-9.15.7.7-10 10a.5.5 0 0 1-.7 0l-10-10 .7-.7 9.15 9.14Z" fill="#fff"/>
                            </svg>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php if( carbon_get_the_post_meta( 'about_services_display' ) ) : ?>
        <section id="about-services-count">
            <div class="container">
                <?php

                $about_services_count_image = pdp_get_post_meta_retina_image_url( $page_id, 'about_services_image' );

                ?>
                <div class="image-row image-row--right image-row--badge">
                    <div class="image-row__content">
                        <div class="title image-row__title">
                            <div class="title__overtitle"><?=carbon_get_post_meta( $page_id, 'about_services_overtitle' ); ?></div>
                            <h3 class="title__heading"><?=carbon_get_post_meta( $page_id, 'about_services_title' ); ?></h3>
                        </div>

                        <div class="image-row__desc"><?=wpautop( carbon_get_post_meta( $page_id, 'about_services_content' ) ); ?></div>

                        <?php if( carbon_get_the_post_meta( 'about_services_spinner_display' ) ) : ?>
                            <?php
                                
                            $diameter = carbon_get_the_post_meta( 'about_services_spinner_diameter' );
                            $radius = $diameter / 2;

                            ?>

                            <div class="badge image-row__badge">
                                <svg viewBox="0 0 <?=$diameter; ?> <?=$diameter; ?>" width="<?=$diameter; ?>" height="<?=$diameter; ?>">
                                    <defs>
                                        <path d="M 14, <?=$radius; ?> a <?=$radius - 14; ?>, <?=$radius - 14; ?> 0 1, 1 <?=$diameter - 28; ?>, 0 a <?=$radius - 14; ?>, <?=$radius - 14; ?> 0 1, 1 -<?=$diameter - 28; ?>, 0" id="badge-desktop" />
                                    </defs>
                                    <text>
                                        <textPath xlink:href="#badge-desktop"><?=carbon_get_the_post_meta( 'about_services_spinner_text' ); ?></textPath>
                                    </text>
                                </svg>

                                <div class="badge__logo">
                                    <svg width="32" height="32" fill="none">
                                        <path d="M25.6 6.4V0l-6.4 6.4h-6.4L0 19.2h6.4l6.4-6.4v6.4h6.4l-6.4 6.4V32l12.8-12.8v-6.4L32 6.4h-6.4Z" fill="#0E0D0A" />
                                    </svg>
                                </div>
                            </div>
                        <?php endif; ?>

                    <img src="<?=$about_services_count_image['1x']; ?>" data-src="<?=$about_services_count_image['1x']; ?>" data-srcset="<?=$about_services_count_image['1x']; ?> 1x, <?=$about_services_count_image['2x']; ?> 2x" class="image-row__image lazyload">
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if( carbon_get_the_post_meta( 'founders_display' ) ) : ?>
        <section id="about-founders">
            <div class="container">
                <?php

                $founders_image = pdp_get_post_meta_retina_image_url( $page_id, 'founders_image' );

                ?>
                <div class="image-row image-row--left image-row--signed">
                    <img src="<?=$founders_image['1x']; ?>" data-src="<?=$founders_image['1x']; ?>" data-srcset="<?=$founders_image['1x']; ?> 1x, <?=$founders_image['2x']; ?> 2x" class="image-row__image lazyload">

                    <div class="image-row__content">
                        <div class="title image-row__title">
                            <h2 class="title__heading"><?=carbon_get_post_meta( $page_id, 'founders_title' ); ?></h2>
                        </div>

                        <div class="image-row__desc">
                            <?=wpautop( carbon_get_post_meta( $page_id, 'founders_content' ) ); ?>

                            <div class="image-row__sign"><?=carbon_get_post_meta( $page_id, 'founders_sign' ); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if( carbon_get_the_post_meta( 'advantages_display' ) ) : ?>
        <section id="about-advantages">
            <div class="container">
                <?php

                $advantages = carbon_get_the_post_meta( 'advantages_list' );

                ?>

                <div class="title title--center">
                    <h2 class="title__heading"><?=carbon_get_post_meta( $page_id, 'advantages_title' ); ?></h2>
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

    <?php if( carbon_get_the_post_meta( 'services_display' ) ) : ?>
        <section id="about-services">
            <div class="container">
                <div class="title title--center">
                    <div class="title__overtitle"><?=carbon_get_post_meta( $page_id, 'services_overtitle' ); ?></div>
                    <h2 class="title__heading"><?=carbon_get_post_meta( $page_id, 'services_title' ); ?></h2>
                </div>

                <?php get_template_part( 'templates/widgets/service-categories-carousel' ); ?>
            </div>
        </section>
    <?php endif; ?>

    <?php if( carbon_get_the_post_meta( 'regulations_display' ) ) : ?>
        <section id="about-regulations">
            <div class="container">
                <div class="regulations">
                    <div class="regulations__circle">
                        <svg viewBox="0 0 164 164" width="164" height="164" class="regulations__circle-text regulations__circle-text--desktop">
                            <defs>
                                <path d="
                                        M 20, 82
                                        a 62, 62 0 1, 1 124, 0
                                        a 62, 62 0 1, 1 -124, 0
                                    " id="regulations-badge-desktop" />
                            </defs>
                            <text>
                                <textPath xlink:href="#regulations-badge-desktop"><?=carbon_get_post_meta( $page_id, 'regulations_badge_title' ); ?></textPath>
                            </text>
                        </svg>

                        <svg viewBox="0 0 120 120" width="120" height="120" class="regulations__circle-text regulations__circle-text--mobile">
                            <defs>
                                <path d="
                                        M 16, 60
                                        a 44, 44 0 1, 1 88, 0
                                        a 44, 44 0 1, 1 -88, 0
                                    " id="regulations-badge-mobile" />
                            </defs>
                            <text>
                                <textPath xlink:href="#regulations-badge-mobile"><?=carbon_get_post_meta( $page_id, 'regulations_badge_title' ); ?></textPath>
                            </text>
                        </svg>

                        <div class="regulations__logo">
                            <svg width="31" height="32" fill="none">
                                <path d="M24.33 6.96v-6l-6 6H12.3L.3 19.12H6.3l6.01-6.15v6.15h6.01l-6 6.01v6.02l12.01-12.03v-6.15l6.01-6h-6Z" fill="#AA957C"/>
                            </svg>
                        </div>
                    </div>

                    <div class="regulations__title"><?=carbon_get_post_meta( $page_id, 'regulations_title' ); ?></div>
                    <div class="regulations__subtitle"><?=carbon_get_post_meta( $page_id, 'regulations_subtitle' ); ?></div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if( carbon_get_the_post_meta( 'banner_display' ) ) : ?>
        <section id="about-banner">
            <div class="container">
                <?php

                if( $banner_id = carbon_get_the_post_meta( 'banner' ) ) :
                    pdp_get_banner( $banner_id );
                endif;

                ?>
            </div>
        </section>
    <?php endif; ?>

    <?php if( carbon_get_the_post_meta( 'testimonials_display' ) ) : ?>
        <section id="about-testimonials">
            <div class="container">
                <div class="title title--center">
                    <?=$franchise_overtitle = carbon_get_post_meta( $page_id, 'testimonials_overtitle' ) ? "<div class='title__overtitle'>{$franchise_overtitle}</div>" : ''; ?>
                    <h2 class="title__heading"><?=carbon_get_post_meta( $page_id, 'testimonials_title' ); ?></h2>
                </div>

                <?php get_template_part( 'templates/widgets/testimonials' ); ?>
            </div>
        </section>
    <?php endif; ?>

    <?php if( carbon_get_the_post_meta( 'cosmetics_display' ) ) : ?>
        <section id="about-cosmetics">
            <div class="container">
                <div class="title title--center">
                    <div class="title__overtitle"><?=carbon_get_post_meta( $page_id, 'cosmetics_overtitle' ); ?></div>
                    <h2 class="title__heading"><?=carbon_get_post_meta( $page_id, 'cosmetics_title' ); ?></h2>
                </div>

                <div class="brands">
                    <?php foreach( carbon_get_post_meta( $page_id, 'cosmetics_gallery' ) as $logo ) : ?>
                        <img data-src="<?=wp_get_attachment_image_url( $logo, 'full' ); ?>" alt="<?=get_post_meta( $logo, '_wp_attachment_image_alt', true ); ?>" class="brands__item lazyload">
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if( carbon_get_the_post_meta( 'school_display' ) ) : ?>
        <section id="about-school">
            <div class="container">
                <?php $school_image = pdp_get_post_meta_retina_image_url( $page_id, 'school_image' ); ?>
                <div class="school">
                    <img src="<?=$school_image['1x']; ?>" data-src="<?=$school_image['1x']; ?>" data-srcset="<?=$school_image['1x']; ?> 1x, <?=$school_image['2x']; ?> 2x" class="school__image lazyload">
                    <div class="school__overlay"></div>

                    <div class="school__inner">
                        <div class="title school__title">
                            <div class="title__overtitle"><?=carbon_get_post_meta( $page_id, 'school_overtitle' ); ?></div>
                            <h2 class="title__heading"><?=carbon_get_post_meta( $page_id, 'school_title' ); ?></h2>
                        </div>

                        <div class="school__desc"><?=carbon_get_post_meta( $page_id, 'school_description' ); ?></div>

                        <div class="school__directions">
                            <?php foreach( carbon_get_post_meta( $page_id, 'school_directions' ) as $direction ) : ?>
                                <a class="btn btn--outline btn--white"><?=$direction['name']; ?></a>
                            <?php endforeach; ?>
                        </div>

                        <a href="<?=carbon_get_post_meta( $page_id, 'school_link' ); ?>" class="btn btn--white school__action"><span><?=carbon_get_post_meta( $page_id, 'school_button' ); ?></span></a>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if( carbon_get_the_post_meta( 'franchise_display' ) ) : ?>
        <section id="about-franchise">
            <div class="container">
                <?php $franchise_image = pdp_get_post_meta_retina_image_url( $page_id, 'franchise_image' ); ?>
                <div class="franchise">
                    <div class="franchise__content">
                        <div class="title franchise__title">
                            <div class="title__overtitle"><?=carbon_get_post_meta( $page_id, 'franchise_overtitle' ); ?></div>
                            <h2 class="title__heading"><?=carbon_get_post_meta( $page_id, 'franchise_title' ); ?></h2>
                        </div>

                        <div class="franchise__desc"><?=carbon_get_post_meta( $page_id, 'franchise_description' ); ?></div>

                        <div class="franchise__advantages">
                            <?php foreach( carbon_get_post_meta( $page_id, 'franchise_features' ) as $feature ) : ?>
                                <div class="title-box">
                                    <div class="title-box__title"><?=$feature['title']; ?></div>
                                    <div class="title-box__subtitle"><?=$feature['description']; ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <a href="<?=carbon_get_post_meta( $page_id, 'franchise_link' ); ?>" class="btn"><?=carbon_get_post_meta( $page_id, 'franchise_button' ); ?></a>
                    </div>

                    <img src="<?=$franchise_image['1x']; ?>" data-src="<?=$franchise_image['1x']; ?>" data-srcset="<?=$franchise_image['1x']; ?> 1x, <?=$franchise_image['2x']; ?> 2x" class="franchise__image lazyload">
                </div>
            </div>
        </section>
    <?php endif; ?>

<?php get_footer(); ?>