<?php

/**
 * Template Name: Подарочные сертификаты
 *
 * @package PDP
 */

get_header();

wp_enqueue_style( 'swiper' );
wp_enqueue_script( 'swiper' );

$page_id = get_the_ID();

$gifts = carbon_get_the_post_meta( 'gifts' );
$card_options = array();
$box_options = array();
$card_indexes = array();

foreach( $gifts as $gift ){
    if( $gift['type'] === 'card' ){
        foreach( explode( ',', $gift['amount'] ) as $i => $amount ){
            $formatted = number_format( $amount, 0, '.', ' ' );
            $card_options[] = "{$gift['name']} ({$formatted} грн)";
        }
    }
    else if( $gift['type'] === 'box' ){
        $box_options[] = $gift['name'];
    }
}

?>

    <section id="gift-cards-hero">
        <div class="container">
	        <?php

	        $hero_background = pdp_get_post_meta_retina_image_url( $page_id, 'hero_background' );

	        ?>
            <div class="page-hero">
                <div class="page-hero__overlay"></div>
                <img src="<?=$hero_background['1x']; ?>" data-src="<?=$hero_background['1x']; ?>" data-srcset="<?=$hero_background['1x']; ?> 1x, <?=$hero_background['2x']; ?> 2x" class="page-hero__image lazyload">

                <div class="page-hero__content">
                    <div class="page-hero__uptitle"><?=carbon_get_the_post_meta( 'hero_overtitle' ); ?></div>
                    <h1><?=carbon_get_the_post_meta( 'hero_title' ); ?></h1>
                    <div class="page-hero__subtitle"><?=carbon_get_the_post_meta( 'hero_description' ); ?></div>
                </div>

                <div class="page-hero__scroll-below scroll-below scroll-below--desktop">
                    <svg viewBox="0 0 158 158" width="158" height="158">
                        <defs>
                            <path d="M 14, 79 a 65, 65 0 1, 1 134, 0 a 65, 65 0 1, 1 -134, 0" id="badge-desktop" />
                        </defs>
                        <text>
                            <textPath xlink:href="#badge-desktop">
                                Время почистить перышки • Время почистить перышки •
                            </textPath>
                        </text>
                    </svg>

                    <a href="#gift-cards-items">
                        <svg width="38" height="52" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M18.5 49.8V0h1v49.8l17.15-17.15.7.7-18 18a.5.5 0 0 1-.7 0l-18-18 .7-.7L18.5 49.79Z" fill="#fff"/>
                        </svg>
                    </a>
                </div>

                <div class="page-hero__scroll-below scroll-below scroll-below--mobile">
                    <svg viewBox="0 0 94 94" width="92" height="92">
                        <defs>
                            <path d="M 8, 46 a 38, 38 0 1, 1 76, 0 a 38, 38 0 1, 1 -76, 0" id="badge-mobile" />
                        </defs>
                        <text>
                            <textPath xlink:href="#badge-mobile">
                                Время почистить перышки • Время почистить перышки •
                            </textPath>
                        </text>
                    </svg>

                    <a href="#gift-cards-items">
                        <svg width="22" height="30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 27.8V0h1v27.8l9.15-9.15.7.7-10 10a.5.5 0 0 1-.7 0l-10-10 .7-.7 9.15 9.14Z" fill="#fff"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="gift-cards-items">
        <div class="container">
            <div class="product-cards-grid">
                <?php foreach( $gifts as $gift ) : ?>
                    <div class="product-card">
                        <div class="product-card__top">
                            <div class="product-card__cover">
                                <?php

                                $cover = array(
                                    '1x'    => wp_get_attachment_image_url( $gift['cover1x'], 'full' ),
                                    '2x'    => wp_get_attachment_image_url( $gift['cover2x'], 'full' )
                                );

                                $hover_cover = array(
	                                '1x'    => wp_get_attachment_image_url( $gift['hover_cover1x'], 'full' ),
	                                '2x'    => wp_get_attachment_image_url( $gift['hover_cover2x'], 'full' )
                                )

                                ?>

                                <?php if( $cover['1x'] && $cover['2x'] ) : ?>
                                    <img src="<?=$cover['1x']; ?>" srcset="<?=$cover['1x']; ?> 1x, <?=$cover['2x']; ?> 2x" alt="<?=$gift['title']; ?>">
                                <?php endif; ?>

	                            <?php if( $hover_cover['1x'] && $hover_cover['2x'] ) : ?>
                                    <img src="<?=$hover_cover['1x']; ?>" srcset="<?=$hover_cover['1x']; ?> 1x, <?=$hover_cover['2x']; ?> 2x" alt="<?=$gift['title']; ?>">
	                            <?php endif; ?>
                            </div>

                            <?php if( $gift['bestseller'] == 'yes' ) : ?>
                                <div class="badge product-card__badge"><?=__( 'Бестселлер', 'pdp' ); ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="product-card__footer">
                            <div class="product-card__name"><?=$gift['title']; ?></div>
                            <button class="btn btn--outline" data-micromodal-trigger="<?=$gift['type'] === 'card' ? 'modal-gift-card' : 'modal-gift-box'; ?>"><?=__( 'Заказать online', 'pdp' ); ?></button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="product-cards-carousel carousel carousel--boxed swiper">
                <div class="swiper-wrapper">
                    <?php foreach( $gifts as $gift ) : ?>
                        <?php if( $gift['type'] === 'card' ) : ?>
                            <div class="product-card swiper-slide">
                                <div class="product-card__top">
                                    <div class="product-card__cover">
                                        <?php

                                        $cover = array(
                                            '1x'    => wp_get_attachment_image_url( $gift['cover1x'], 'full' ),
                                            '2x'    => wp_get_attachment_image_url( $gift['cover2x'], 'full' )
                                        );

                                        $hover_cover = array(
                                            '1x'    => wp_get_attachment_image_url( $gift['hover_cover1x'], 'full' ),
                                            '2x'    => wp_get_attachment_image_url( $gift['hover_cover2x'], 'full' )
                                        )

                                        ?>

                                        <?php if( $cover['1x'] && $cover['2x'] ) : ?>
                                            <img src="<?=$cover['1x']; ?>" data-src="<?=$cover['1x']; ?>" data-srcset="<?=$cover['1x']; ?> 1x, <?=$cover['2x']; ?> 2x" alt="<?=$gift['title']; ?>" class="lazyload">
                                        <?php endif; ?>

                                        <?php if( $hover_cover['1x'] && $hover_cover['2x'] ) : ?>
                                            <img src="<?=$hover_cover['1x']; ?>" data-src="<?=$hover_cover['1x']; ?>" data-srcset="<?=$hover_cover['1x']; ?> 1x, <?=$hover_cover['2x']; ?> 2x" alt="<?=$gift['title']; ?>" class="lazyload">
                                        <?php endif; ?>
                                    </div>

                                    <?php if( $gift['bestseller'] == 'yes' ) : ?>
                                        <div class="badge product-card__badge"><?=__( 'Бестселлер', 'pdp' ); ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="product-card__footer">
                                    <div class="product-card__name"><?=$gift['title']; ?></div>
                                    <button class="btn btn--outline" data-micromodal-trigger="<?=$gift['type'] === 'card' ? 'modal-gift-card' : 'modal-gift-box'; ?>"><?=__( 'Заказать online', 'pdp' ); ?></button>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <div class="swiper-footer">
                    <div class="swiper-nav">
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>

            <div class="product-cards-carousel carousel carousel--boxed swiper">
                <div class="swiper-wrapper">
			        <?php foreach( $gifts as $gift ) : ?>
				        <?php if( $gift['type'] === 'box' ) : ?>
                            <div class="product-card swiper-slide">
                                <div class="product-card__top">
                                    <div class="product-card__cover">
								        <?php

								        $cover = array(
									        '1x'    => wp_get_attachment_image_url( $gift['cover1x'], 'full' ),
									        '2x'    => wp_get_attachment_image_url( $gift['cover2x'], 'full' )
								        );

								        $hover_cover = array(
									        '1x'    => wp_get_attachment_image_url( $gift['hover_cover1x'], 'full' ),
									        '2x'    => wp_get_attachment_image_url( $gift['hover_cover2x'], 'full' )
								        )

								        ?>

								        <?php if( $cover['1x'] && $cover['2x'] ) : ?>
                                            <img src="<?=$cover['1x']; ?>" data-src="<?=$cover['1x']; ?>" data-srcset="<?=$cover['1x']; ?> 1x, <?=$cover['2x']; ?> 2x" alt="<?=$gift['title']; ?>" class="lazyload">
								        <?php endif; ?>

								        <?php if( $hover_cover['1x'] && $hover_cover['2x'] ) : ?>
                                            <img src="<?=$hover_cover['1x']; ?>" data-src="<?=$hover_cover['1x']; ?>" data-srcset="<?=$hover_cover['1x']; ?> 1x, <?=$hover_cover['2x']; ?> 2x" alt="<?=$gift['title']; ?>" class="lazyload">
								        <?php endif; ?>
                                    </div>

							        <?php if( $gift['bestseller'] == 'yes' ) : ?>
                                        <div class="badge product-card__badge"><?=__( 'Бестселлер', 'pdp' ); ?></div>
							        <?php endif; ?>
                                </div>

                                <div class="product-card__footer">
                                    <div class="product-card__name"><?=$gift['title']; ?></div>
                                    <button class="btn btn--outline" data-micromodal-trigger="<?=$gift['type'] === 'card' ? 'modal-gift-card' : 'modal-gift-box'; ?>"><?=__( 'Заказать online', 'pdp' ); ?></button>
                                </div>
                            </div>
				        <?php endif; ?>
			        <?php endforeach; ?>
                </div>

                <div class="swiper-footer">
                    <div class="swiper-nav">
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="gift-cards-first-call">
        <div class="container">
            <?php

            $first_banner_image = pdp_get_post_meta_retina_image_url( $page_id, 'first_banner_background' );

            ?>
            <div class="banner banner--right-side">
                <img src="<?=$first_banner_image['1x']; ?>" data-src="<?=$first_banner_image['1x']; ?>" data-srcset="<?=$first_banner_image['1x']; ?> 1x, <?=$first_banner_image['2x']; ?> 2x" class="banner__image lazyload">

                <div class="banner__content">
                    <div class="banner__title"><?=carbon_get_the_post_meta( 'first_banner_title' ); ?></div>
                    <a href="<?=carbon_get_the_post_meta( 'first_banner_link' ); ?>" class="btn banner__button"><span><?=carbon_get_the_post_meta( 'first_banner_button' ); ?></span></a>
                </div>
            </div>
        </div>
    </section>

    <section id="gift-cards-promotion">
        <div class="container">
            <?php

            $promo_image = pdp_get_post_meta_retina_image_url( $page_id, 'promo_image' );

            ?>
            <div class="gift-cards-promo">
                <div class="gift-cards-promo__content">
                    <div class="gift-cards-promo__uptitle"><?=carbon_get_the_post_meta( 'promo_overtitle' ); ?></div>
                    <h2 class="gift-cards-promo__title"><?=carbon_get_the_post_meta( 'promo_title' ); ?></h2>
                    <div class="gift-cards-promo__subtitle"><?=carbon_get_the_post_meta( 'promo_subtitle' ); ?></div>
                    <div class="gift-cards-promo__desc"><?=carbon_get_the_post_meta( 'promo_content' ); ?></div>
                    <div class="gift-cards-promo__advantages">
                        <?php foreach( carbon_get_the_post_meta( 'promo_features' ) as $feature ) : ?>
                            <div class="advantage">
                                <?php if( $feature['icon'] ) : ?>
                                    <?=$feature['icon']; ?>
                                <?php endif; ?>
                                <span><?=$feature['title']; ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <img src="<?=$promo_image['1x']; ?>" data-src="<?=$promo_image['1x']; ?>" data-srcset="<?=$promo_image['1x']; ?> 1x, <?=$promo_image['2x']; ?> 2x" class="lazyload">
            </div>
        </div>
    </section>

    <section id="gift-cards-second-call">
        <div class="container">
	        <?php

	        $second_banner_image = pdp_get_post_meta_retina_image_url( $page_id, 'second_banner_background' );

	        ?>
            <div class="banner banner--right-side">
                <img src="<?=$second_banner_image['1x']; ?>" data-src="<?=$second_banner_image['1x']; ?>" data-srcset="<?=$second_banner_image['1x']; ?> 1x <?=$second_banner_image['2x'] ? ", {$second_banner_image['2x']} 2x" : ''; ?>" class="banner__image lazyload">

                <div class="banner__overlay"></div>

                <div class="banner__content">
                    <div class="banner__title"><?=carbon_get_the_post_meta( 'second_banner_title' ); ?></div>
                    <div class="banner__subtitle"><?=carbon_get_the_post_meta( 'second_banner_subtitle' ); ?></div>
                    <a href="<?=carbon_get_the_post_meta( 'second_banner_link' ); ?>" class="btn btn--outline btn--white banner__button"><span><?=carbon_get_the_post_meta( 'second_banner_button' ); ?></span></a>
                </div>
            </div>
        </div>
    </section>

    <section id="gift-cards-order-form">
        <div class="container">
            <div class="gifts-order">
                <h2><?=carbon_get_the_post_meta( 'form_title' ); ?></h2>
                <div class="gifts-order__subtitle"><?=carbon_get_the_post_meta( 'form_subtitle' ); ?></div>
                <div class="gifts-order__form">
                    <?php get_template_part( 'templates/forms/gifts', null, ['card_options' => $card_options, 'box_options' => $box_options] ); ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>