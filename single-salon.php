<?php

get_header();

$salon_id = get_the_ID();
$title = carbon_get_the_post_meta( 'title' );

?>
    <section id="salon-main">
        <div class="container">
            <div class="salon-info">
                <div class="salon-info__content">
                    <?=$title ? "<div class='salon-info__name'>{$title}</div>" : ''; ?>
                    <h1 class="salon-info__title">
                        <svg width="11" height="22" fill="none"><path d="M6 0c.27.05.54.1.8.17 2.2.6 3.6 2.05 4.08 4.3a5.54 5.54 0 0 1-3.66 6.42c-.43.15-.88.22-1.35.33v10.21c0 .1 0 .22-.04.32-.04.17-.17.25-.35.25a.33.33 0 0 1-.33-.25c-.03-.1-.03-.22-.03-.32V11.17a5.26 5.26 0 0 1-1.92-.5A5.31 5.31 0 0 1 .05 6.33 5.44 5.44 0 0 1 2.81.71C3.41.34 4.08.14 4.78.04c.07 0 .14-.03.2-.04H6Zm-.89 4.11c0-.82-.65-1.49-1.45-1.5-.8 0-1.47.68-1.47 1.5 0 .8.67 1.48 1.48 1.48.79 0 1.44-.67 1.44-1.48Z" /></svg>
                        <a href="<?=carbon_get_the_post_meta( 'map_link' ); ?>" target="_blank"><?php the_title(); ?></a>
                    </h1>
                    <div class="salon-info__desc"><?php the_content(); ?></div>

                    <div class="salon-info__contacts">
                        <?php if( $phone = carbon_get_the_post_meta( 'phone' ) ) : ?>
                            <a href="tel:<?=$phone; ?>">
                                <svg width="22" height="22" fill="none"><path d="M17.01 16.38c-1.23 0-2.42-.2-3.53-.56a.98.98 0 0 0-1.01.24l-1.57 1.97a15.18 15.18 0 0 1-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53A1 1 0 0 0 4.65 4H1.19C.65 4 0 4.24 0 4.99 0 14.28 7.73 22 17.01 22c.71 0 .99-.63.99-1.18v-3.45a1 1 0 0 0-.99-.99Z" fill="#0E0D0A"/><path d="M12.03 1.51 12.24 0c4.45.5 8.9 4.2 9.76 9.5l-1.5.25c-1.08-4.57-3.88-7.3-8.47-8.24ZM12.04 4.03a6.97 6.97 0 0 1 5.87 5.73c-.5.1-1 .18-1.52.27a5.46 5.46 0 0 0-4.57-4.45l.22-1.55Z" fill="#000"/></svg>
                                <span><?=$phone; ?></span>
                            </a>
                        <?php endif; ?>

	                    <?php if( $instagram = carbon_get_the_post_meta( 'instagram' ) ) : ?>
                            <a href="<?=$instagram; ?>">
                                <svg width="22" height="22" fill="none"><path d="M10.98.02c1.7 0 3.4-.04 5.1 0a5.83 5.83 0 0 1 5.09 2.9c.59.94.83 1.98.83 3.1V16a5.98 5.98 0 0 1-5.89 6H5.92A5.99 5.99 0 0 1 0 16V6.05A5.95 5.95 0 0 1 5.96.02h5.02Zm.04 2H6.1A3.99 3.99 0 0 0 2 6.09V16a3.98 3.98 0 0 0 4.05 4.06h9.88c.27 0 .55-.04.8-.07A3.99 3.99 0 0 0 19.98 16V6.08c0-.76-.17-1.49-.62-2.15a3.87 3.87 0 0 0-3.43-1.87c-1.63-.03-3.3-.03-4.92-.03Z" fill="#000"/><path d="M16.31 11.01c0 2.91-2.39 5.27-5.26 5.27a5.26 5.26 0 1 1 5.27-5.27Zm-5.3 3.12a3.1 3.1 0 0 0 3.15-3.08 3.15 3.15 0 1 0-3.15 3.08ZM17.84 5.25c0 .6-.45 1.04-1.03 1.04-.6 0-1.08-.45-1.08-1.04 0-.59.45-1.04 1.04-1.04.59 0 1.07.45 1.07 1.04Z" fill="#000"/></svg>
                                <span>@<?=str_replace( '/', '', parse_url( $instagram, PHP_URL_PATH ) ); ?></span>
                            </a>
	                    <?php endif; ?>
                    </div>

                    <div class="salon-info__actions">
                        <a href="#salon-form" class="btn"><span><?=__( 'Записаться', 'pdp' ); ?></span></a>

                        <a href="<?=pdp_get_salon_pricelist_url( $salon_id ); ?>" class="btn btn--square-icon btn--outline">
                            <svg width="18" height="10" fill="none"><path d="M0 6h2V4H0v2Zm0 4h2V8H0v2Zm0-8h2V0H0v2Zm4 4h14V4H4v2Zm0 4h14V8H4v2ZM4 0v2h14V0H4Z" /></svg>
                        </a>

                        <a href="<?=pdp_get_salon_pricelist_url( $salon_id ); ?>" class="btn btn--outline"><?=__( 'Список услуг', 'pdp' ); ?></a>
                    </div>
                </div>

                <div class="salon-info__slider swiper">
                    <div class="swiper-wrapper">
                        <?php foreach( carbon_get_the_post_meta( 'slider_gallery' ) as $slide ) :
                            $image1x = wp_get_attachment_image_url( $slide['image1x'], 'full' );
                            $image2x = wp_get_attachment_image_url( $slide['image2x'], 'full' ); ?>
                            <img data-src="<?=$image1x; ?>" data-srcset="<?=$image1x; ?> 1x, <?=$image2x; ?> 2x" class="swiper-slide lazyload">
                        <?php endforeach; ?>
                    </div>

                    <div class="swiper-scrollbar"></div>
                </div>
            </div>
        </div>
    </section>

    <section id="salon-carousel">
        <div class="container">
            <?php get_template_part( 'templates/widgets/salons-carousel' ); ?>
        </div>
    </section>

    <section id="salon-banner">
        <div class="container">
            <?php pdp_get_banner( 11465 ); ?>
        </div>
    </section>

    <section id="salon-form">
        <div class="container">
            <div class="title title--center">
                <h2 class="title__heading"><?=__( 'Записаться в салон', 'pdp' ); ?></h2>
            </div>

            <?php get_template_part( 'templates/forms/simple-booking' ); ?>
        </div>
    </section>

<?php get_footer(); ?>
