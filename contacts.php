<?php

/**
 * Template Name: Контакты
 *
 * @package PDP
 */

get_header();

$active_salon = intval( $_GET['salonId'] );

$main_city = pdp_get_main_city( pll_current_language() );
$salons_grouped = pdp_get_salons_grouped_by_city();
$salons_grouped = array( $main_city => $salons_grouped[$main_city] ) + $salons_grouped;


?>
    <section id="contacts-phones">
        <div class="container">
            <div class="contact-phones">
                <?php if( $phone = carbon_get_theme_option( 'phone_qa' ) ) : ?>
                    <div class="contact-phones-item">
                        <a href="tel:<?=str_replace( [' ', '(', ')'], '', $phone ); ?>" class="btn btn--square-icon btn--outline">
                            <svg width="18" height="18" fill="none"><path d="M17.01 12.38c-1.23 0-2.42-.2-3.53-.56a.98.98 0 0 0-1.01.24l-1.57 1.97A15.18 15.18 0 0 1 4.01 7.2l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53A1 1 0 0 0 4.65 0H1.19C.65 0 0 .24 0 .99 0 10.28 7.73 18 17.01 18c.71 0 .99-.63.99-1.18v-3.45a1 1 0 0 0-.99-.99Z" /></svg>
                        </a>
                        <span><?=__( 'Отдел качества', 'pdp' ); ?></span>
                    </div>
                <?php endif; ?>

                <?php if( $phone = carbon_get_theme_option( 'phone_marketing' ) ) : ?>
                    <div class="contact-phones-item">
                        <a href="https://t.me/<?=str_replace( [' ', '(', ')'], '', $phone ); ?>" class="btn btn--square-icon btn--outline" target="_blank">
                            <svg width="22" height="18" fill="none"><path d="M0 8.95c0-.04 0-.07.04-.11.03-.18.1-.35.28-.46.11-.07.22-.14.33-.18.18-.1.4-.18.57-.28.25-.1.54-.25.79-.36l.97-.42.75-.32c.29-.11.54-.25.83-.36.29-.1.54-.25.82-.35l.8-.36.96-.42 1.04-.43.76-.32.97-.43 1-.42 1.22-.53c.29-.15.61-.25.9-.36l1.5-.64 1.12-.46 2.08-.85 1.15-.43c.46-.18.97-.32 1.47-.42.25-.04.47-.04.68-.04.25.04.5.1.68.32.11.1.18.25.22.39.03.18.07.36.07.5v.28l-.1.64c-.04.21-.04.4-.08.6-.04.22-.04.4-.07.6-.04.18-.04.36-.07.58l-.11.63-.1.86c-.04.28-.08.6-.15.88-.04.29-.07.57-.15.82l-.21 1.31-.22 1.21c-.07.46-.18.92-.25 1.42l-.21 1.17c-.11.54-.18 1.07-.29 1.6-.1.57-.18 1.14-.29 1.67l-.21 1.06c-.07.32-.22.6-.4.9a1.3 1.3 0 0 1-1.04.6c-.32 0-.6-.08-.9-.18-.25-.1-.5-.21-.71-.4-.4-.28-.83-.56-1.26-.8l-.93-.61-1.33-.89c-.4-.28-.83-.53-1.22-.82-.4-.28-.83-.53-1.22-.81l-.43-.32a1.45 1.45 0 0 1-.43-.5.85.85 0 0 1-.04-.89c.07-.18.22-.35.33-.5.1-.14.21-.24.35-.35.15-.14.33-.28.47-.43l.22-.2c.1-.12.21-.22.36-.33.21-.21.43-.42.68-.64l.43-.42.54-.5.53-.5.65-.64.29-.28.5-.5c.18-.14.32-.32.5-.46.29-.28.61-.57.9-.89l.14-.14c.07-.07.11-.14.07-.25 0-.03 0-.07-.03-.1-.04-.07-.07-.15-.14-.18-.11-.1-.26-.1-.4-.04-.1.07-.21.11-.32.18-.25.14-.47.32-.72.46l-1.3.85c-.39.25-.78.5-1.18.79-.36.2-.68.46-1.04.67-.32.21-.6.43-.93.6l-1.33.9-1.36.91c-.22.15-.4.29-.61.4l-.68.31c-.33.11-.61.18-.94.22-.21.03-.46.03-.68.03-.43-.03-.82-.1-1.26-.25a15 15 0 0 0-1.18-.35l-.9-.28-1-.32a.94.94 0 0 1-.32-.18.58.58 0 0 1-.26-.4c0-.03 0-.06-.03-.06.07.03.07 0 .07 0Z" /></svg>
                        </a>
                        <span><?=__( 'Отдел маркетинга', 'pdp' ); ?></span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section id="contacts-list">
        <div class="container">
            <div class="contacts">
                <div class="contacts__nav">
                    <?php foreach( $salons_grouped as $city => $salons ) : ?>
                        <div class="contacts-group">
                            <div class="contacts-group__title">
                                <svg width="22" height="22" fill="none"><circle cx="11" cy="11" r="11" fill="#0E0D0A"/><path fill-rule="evenodd" clip-rule="evenodd" d="M10.25 10.25V6.6h1.5v3.65h3.65v1.5h-3.65v3.65h-1.5v-3.65H6.6v-1.5h3.65Z" fill="#fff"/></svg>
                                <span><?=$city; ?></span>
                            </div>

                            <div class="contacts-group__items">
                                <?php foreach( $salons as $key => $salon ) : ?>
                                    <div class="contacts-group-item <?=!$active_salon && $city === $main_city && $key === 0 ? 'contacts-group-item--active' : ( $salon['id'] === $active_salon ? 'contacts-group-item--active' : ''); ?>" data-salon="<?=$salon['name']; ?>">
                                        <div class="contacts-group-item__header">
                                            <svg width="11" height="22" fill="none"><path d="M6 0c.27.05.54.1.8.17 2.2.6 3.6 2.05 4.08 4.3a5.54 5.54 0 0 1-3.66 6.42c-.43.15-.88.22-1.35.33v10.21c0 .1 0 .22-.04.32-.04.17-.17.25-.35.25a.33.33 0 0 1-.33-.25c-.03-.1-.03-.22-.03-.32V11.17a5.26 5.26 0 0 1-1.92-.5A5.31 5.31 0 0 1 .05 6.33 5.44 5.44 0 0 1 2.81.71C3.41.34 4.08.14 4.78.04c.07 0 .14-.03.2-.04H6Zm-.89 4.11c0-.82-.65-1.49-1.45-1.5-.8 0-1.47.68-1.47 1.5 0 .8.67 1.48 1.48 1.48.79 0 1.44-.67 1.44-1.48Z" /></svg>
                                            <span><?=$salon['name']; ?></span>
                                        </div>

                                        <div class="contacts-salon-form contacts-group-item__form">
                                            <div class="contacts-salon-form__contacts">
	                                            <?php if( $salon['phone'] ) : ?>
                                                    <a href="tel:<?=$salon['phone']; ?>">
                                                        <svg width="22" height="22" fill="none"><path d="M17.01 16.38c-1.23 0-2.42-.2-3.53-.56a.98.98 0 0 0-1.01.24l-1.57 1.97a15.18 15.18 0 0 1-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53A1 1 0 0 0 4.65 4H1.19C.65 4 0 4.24 0 4.99 0 14.28 7.73 22 17.01 22c.71 0 .99-.63.99-1.18v-3.45a1 1 0 0 0-.99-.99Z" fill="#0E0D0A"/><path d="M12.03 1.51 12.24 0c4.45.5 8.9 4.2 9.76 9.5l-1.5.25c-1.08-4.57-3.88-7.3-8.47-8.24ZM12.04 4.03a6.97 6.97 0 0 1 5.87 5.73c-.5.1-1 .18-1.52.27a5.46 5.46 0 0 0-4.57-4.45l.22-1.55Z" fill="#000"/></svg>
                                                        <span><?=$salon['phone']; ?></span>
                                                    </a>
	                                            <?php endif; ?>

	                                            <?php if( $salon['instagram'] ) : ?>
                                                    <a href="<?=$salon['instagram']; ?>">
                                                        <svg width="22" height="22" fill="none"><path d="M10.98.02c1.7 0 3.4-.04 5.1 0a5.83 5.83 0 0 1 5.09 2.9c.59.94.83 1.98.83 3.1V16a5.98 5.98 0 0 1-5.89 6H5.92A5.99 5.99 0 0 1 0 16V6.05A5.95 5.95 0 0 1 5.96.02h5.02Zm.04 2H6.1A3.99 3.99 0 0 0 2 6.09V16a3.98 3.98 0 0 0 4.05 4.06h9.88c.27 0 .55-.04.8-.07A3.99 3.99 0 0 0 19.98 16V6.08c0-.76-.17-1.49-.62-2.15a3.87 3.87 0 0 0-3.43-1.87c-1.63-.03-3.3-.03-4.92-.03Z" fill="#000"/><path d="M16.31 11.01c0 2.91-2.39 5.27-5.26 5.27a5.26 5.26 0 1 1 5.27-5.27Zm-5.3 3.12a3.1 3.1 0 0 0 3.15-3.08 3.15 3.15 0 1 0-3.15 3.08ZM17.84 5.25c0 .6-.45 1.04-1.03 1.04-.6 0-1.08-.45-1.08-1.04 0-.59.45-1.04 1.04-1.04.59 0 1.07.45 1.07 1.04Z" fill="#000"/></svg>
                                                        <span>@<?=str_replace( '/', '', parse_url( $salon['instagram'], PHP_URL_PATH ) ); ?></span>
                                                    </a>
	                                            <?php endif; ?>
                                            </div>

                                            <div class="contacts-salon-form__contacts-desc"><?=__( 'Вы можете позвонить или написать нам в любой удобный для вас месенджер.', 'pdp' ); ?></div>

                                            <?php get_template_part( 'templates/forms/salon-contact', null, ['salon' => $salon['id'], 'type' => 'mobile'] ); ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="contacts__forms">
	                <?php foreach( $salons_grouped as $city => $salons ) :
                        foreach( $salons as $key => $salon ) : ?>
                            <div class="contacts-salon-form <?=!$active_salon && $city === $main_city && $key === 0 ? 'contacts-salon-form--active' : ( $salon['id'] === $active_salon ? 'contacts-salon-form--active' : ''); ?>" data-salon="<?=$salon['name']; ?>">
                                <div class="contacts-salon-form__header">
                                    <div class="contacts-salon-form__overtitle"><?=$salon['title']; ?></div>
                                    <div class="contacts-salon-form__title">
                                        <svg width="11" height="22" fill="none"><path d="M6 0c.27.05.54.1.8.17 2.2.6 3.6 2.05 4.08 4.3a5.54 5.54 0 0 1-3.66 6.42c-.43.15-.88.22-1.35.33v10.21c0 .1 0 .22-.04.32-.04.17-.17.25-.35.25a.33.33 0 0 1-.33-.25c-.03-.1-.03-.22-.03-.32V11.17a5.26 5.26 0 0 1-1.92-.5A5.31 5.31 0 0 1 .05 6.33 5.44 5.44 0 0 1 2.81.71C3.41.34 4.08.14 4.78.04c.07 0 .14-.03.2-.04H6Zm-.89 4.11c0-.82-.65-1.49-1.45-1.5-.8 0-1.47.68-1.47 1.5 0 .8.67 1.48 1.48 1.48.79 0 1.44-.67 1.44-1.48Z" /></svg>
                                        <a href="<?=$salon['link']; ?>" target="_blank"><?=$salon['name']; ?></a>
                                    </div>
                                </div>

                                <div class="contacts-salon-form__contacts">
                                    <?php if( $salon['phone'] ) : ?>
                                        <a href="tel:<?=$salon['phone']; ?>">
                                            <svg width="22" height="22" fill="none"><path d="M17.01 16.38c-1.23 0-2.42-.2-3.53-.56a.98.98 0 0 0-1.01.24l-1.57 1.97a15.18 15.18 0 0 1-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53A1 1 0 0 0 4.65 4H1.19C.65 4 0 4.24 0 4.99 0 14.28 7.73 22 17.01 22c.71 0 .99-.63.99-1.18v-3.45a1 1 0 0 0-.99-.99Z" fill="#0E0D0A"/><path d="M12.03 1.51 12.24 0c4.45.5 8.9 4.2 9.76 9.5l-1.5.25c-1.08-4.57-3.88-7.3-8.47-8.24ZM12.04 4.03a6.97 6.97 0 0 1 5.87 5.73c-.5.1-1 .18-1.52.27a5.46 5.46 0 0 0-4.57-4.45l.22-1.55Z" fill="#000"/></svg>
                                            <span><?=$salon['phone']; ?></span>
                                        </a>
                                    <?php endif; ?>

	                                <?php if( $salon['instagram'] ) : ?>
                                        <a href="<?=$salon['instagram']; ?>">
                                            <svg width="22" height="22" fill="none"><path d="M10.98.02c1.7 0 3.4-.04 5.1 0a5.83 5.83 0 0 1 5.09 2.9c.59.94.83 1.98.83 3.1V16a5.98 5.98 0 0 1-5.89 6H5.92A5.99 5.99 0 0 1 0 16V6.05A5.95 5.95 0 0 1 5.96.02h5.02Zm.04 2H6.1A3.99 3.99 0 0 0 2 6.09V16a3.98 3.98 0 0 0 4.05 4.06h9.88c.27 0 .55-.04.8-.07A3.99 3.99 0 0 0 19.98 16V6.08c0-.76-.17-1.49-.62-2.15a3.87 3.87 0 0 0-3.43-1.87c-1.63-.03-3.3-.03-4.92-.03Z" fill="#000"/><path d="M16.31 11.01c0 2.91-2.39 5.27-5.26 5.27a5.26 5.26 0 1 1 5.27-5.27Zm-5.3 3.12a3.1 3.1 0 0 0 3.15-3.08 3.15 3.15 0 1 0-3.15 3.08ZM17.84 5.25c0 .6-.45 1.04-1.03 1.04-.6 0-1.08-.45-1.08-1.04 0-.59.45-1.04 1.04-1.04.59 0 1.07.45 1.07 1.04Z" fill="#000"/></svg>
                                            <span>@<?=str_replace( '/', '', parse_url( $salon['instagram'], PHP_URL_PATH ) ); ?></span>
                                        </a>
	                                <?php endif; ?>
                                </div>

                                <div class="contacts-salon-form__contacts-desc"><?=__( 'Вы можете позвонить или написать нам в любой удобный для вас месенджер.', 'pdp' ); ?></div>

	                            <?php get_template_part( 'templates/forms/salon-contact', null, ['salon' => $salon['id'], 'type' => 'desktop'] ); ?>
                            </div>
	                <?php
                        endforeach;
                    endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section id="contacts-banner">
        <div class="container">
            <?php pdp_get_banner( 11465 ); ?>
        </div>
    </section>
<?php
get_footer();