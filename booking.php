<?php

/* Template Name: Страница записи */

get_header();

$lang = pdp_get_current_language();
$main_salon = pdp_get_main_salon();
$salons = pdp_get_salons_with_pricelist();
$categories = pdp_get_service_categories();
$services = pdp_get_pricelist( $main_salon );

?>

	<section id="booking">
		<div class="container">
            <div class="booking-app">
                <div class="booking-header">
                    <h1 class="booking-header__heading"><?=get_the_title(); ?></h1>

                    <div class="booking-header__salon">
                        <select name="salon" data-icon="location" data-confirm="<?=__( 'Смена салона удалит все услуги из корзины. Вы уверенны?', 'pdp' ); ?>">
                            <?php foreach( $salons as $key => $salon ) : ?>
                                <option value="<?=$salon['id']; ?>" <?=isset( $_GET['salonId'] ) && intval( $_GET['salonId'] ) === $salon['id'] ? 'selected' : ( !isset( $_GET['salonId'] ) && $salon['id'] === $main_salon ? 'selected' : '' ); ?>><?="{$salon['city']}, {$salon['name']}"; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="booking-categories booking-categories--desktop">
		            <?php foreach( $categories as $key => $category ) : ?>
                        <div class="booking-category" data-slug="<?=$category['slug']; ?>" <?=isset( $_GET['category'] ) && $_GET['category'] === $category['slug'] ? 'data-active' : ( !isset( $_GET['category'] ) && $key === 0 ? 'data-active' : '' ); ?>><?=$category['name'][$lang]; ?></div>
		            <?php endforeach; ?>
                </div>

                <div class="booking-categories booking-categories--mobile services-carousel carousel swiper">
                    <div class="swiper-wrapper">
		                <?php foreach( $categories as $key => $category ) : ?>
                            <div class="service-card swiper-slide" <?=isset( $_GET['category'] ) && $_GET['category'] === $category['slug'] ? 'data-active' : ( !isset( $_GET['category'] ) && $key === 0 ? 'data-active' : '' ); ?>>
                                <a data-slug="<?=$category['slug']; ?>">
                                    <img src="<?=$category['cover']['1x']; ?>" srcset="<?=$category['cover']['1x']; ?> 1x, <?=$category['cover']['2x']; ?> 2x" alt="<?=$category['name'][$lang]; ?>" class="service-card__image">

                                    <div class="service-card__title">
                                        <div class="service-card__name"><?=$category['name'][$lang]; ?></div>

                                        <div class="service-card__icon">
                                            <svg width="18" height="18" fill="none"><path d="M10 0H8v8H0v2h8v8h2v-8h8V8h-8V0Z" /></svg>
                                        </div>
                                    </div>
                                </a>
                            </div>
		                <?php endforeach; ?>
                    </div>

                    <div class="swiper-footer">
                        <div class="swiper-scrollbar"></div>
                        <div class="swiper-nav">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>

                <div class="booking-body">
                    <div class="booking-body__content">
                        <div class="booking-options">
                            <div class="booking-hair-length">
                                <select name="hair">
	                                <?php foreach( pdp_get_hair_lengths() as $key => $length ) : ?>
                                        <option value="<?=$key?>" <?=$key === 0 ? 'selected' : ''; ?>><?=$length; ?></option>
	                                <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="booking-master">
                                <span><?=__( 'Мастер', 'pdp' ); ?></span>
                                <label class="switch booking-master__switch">
                                    <input type="checkbox" value="true">
                                    <span class="switch-slider"></span>
                                </label>
                                <span><?=__( 'Старший мастер', 'pdp' ); ?></span>
                            </div>
                        </div>

                        <div class="booking-listing">
	                        <?php foreach( $services[pdp_array_key_first( $services )]['subcategories'] as $subcategory ) : ?>
                                <div class="booking-services-subcategory">
                                    <div class="booking-services-subcategory__header">
                                        <div class="booking-services-subcategory__title"><?=$subcategory['name'][$lang]; ?></div>
                                    </div>

                                    <div class="booking-services-subcategory__items">
				                        <?php foreach( $subcategory['services'] as $service ) : ?>
                                            <div class="booking-service-item">
                                                <div class="booking-service-item__info">
                                                    <div class="booking-service-item__name"><?=$service['name'][$lang]; ?></div>
                                                    <div class="booking-service-item__price"><span class="price"><?=$service['prices'][0][0]; ?></span><span class="currency">₴</span></div>
                                                </div>

                                                <button class="booking-service-item__button" data-id="<?=$service['id']; ?>"></button>
                                            </div>
				                        <?php endforeach; ?>
                                    </div>
                                </div>
	                        <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="booking-body__cart">
                        <div class="booking-cart booking-cart--sticky">
                            <div class="booking-cart__loader">
                                <svg width="64" height="61" fill="none"><path d="M51.2 12.18V0L38.41 12.18H25.6L0 36.55h12.8l12.81-12.18v12.18h12.8l-12.8 12.18V60.9l25.58-24.34V24.37L64 12.18H51.2Z" /></svg>
                                <span><?=__( 'Обработка', 'pdp' ); ?></span>
                            </div>

                            <div class="booking-cart__inner">
                                <div class="booking-cart__title"><?=__( 'Ваше бронирование', 'pdp' ); ?></div>

                                <form class="form form--booking booking-cart__form">
                                    <fieldset>
                                        <div class="form__fields">
                                            <div class="form-row form-row--one">
                                                <div class="form-col">
								                    <?php pdp_form_field( 'name', true ); ?>
                                                </div>
                                            </div>

                                            <div class="form-row form-row--one">
                                                <div class="form-col">
								                    <?php pdp_form_field( 'phone', true ); ?>
                                                </div>
                                            </div>

                                            <div class="form-row form-row--one">
                                                <div class="form-col">
                                                    <select name="salon" data-icon="location" data-confirm="<?=__( 'Смена салона удалит все услуги из корзины. Вы уверенны?', 'pdp' ); ?>">
	                                                    <?php foreach( $salons as $key => $salon ) : ?>
                                                            <option value="<?=$salon['id']; ?>" <?=isset( $_GET['salonId'] ) && intval( $_GET['salonId'] ) === $salon['id'] ? 'selected' : ( !isset( $_GET['salonId'] ) && $salon['id'] === $main_salon ? 'selected' : '' ); ?>><?="{$salon['city']}, {$salon['name']}"; ?></option>
	                                                    <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-row form-row--one">
                                                <div class="form-col">
                                                    <select name="hair">
                                                        <?php foreach( pdp_get_hair_lengths() as $key => $length ) : ?>
                                                            <option value="<?=$key?>" <?=$key === 0 ? 'selected' : ''; ?>><?=$length; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="cart-dummy cart-dummy--active booking-cart__dummy">
                                                <h3><?=__( 'Корзина пуста', 'pdp' ); ?></h3>
                                                <div><?=__( 'Сначала добавьте услуги в корзину.', 'pdp' ); ?></div>
                                            </div>

                                            <div class="booking-cart__items"></div>
                                        </div>
                                    </fieldset>

                                    <div class="form__response"></div>

                                    <div class="form__actions booking-cart__footer">
                                        <button class="btn booking-cart__submit" type="submit" disabled><span><?=__( 'Записаться', 'pdp' ); ?></span></button>
                                        <div class="booking-cart__total"><span class="amount">0</span><span class="currency">₴</span></div>
                                    </div>

                                    <input type="hidden" name="cart" value="">
                                    <input type="hidden" name="action" value="booking">
	                                <?php wp_nonce_field( 'pdp_booking_nonce', 'pdp_nonce' ); ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="booking-preloader">
                    <div class="booking-preloader__inner"><?=__( 'Загрузка', 'pdp' ); ?></div>
                </div>
            </div>
		</div>
	</section>

<?php get_footer(); ?>
