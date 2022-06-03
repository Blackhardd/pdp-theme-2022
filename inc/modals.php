<?php

/**
 *  Booking Cart Mobile Modal
 */

add_action( 'wp_footer', 'pdp_add_booking_cart_mobile_modal' );

function pdp_add_booking_cart_mobile_modal(){
	if( !is_page_template( array( 'booking.php', 'links.php' ) ) ) : ?>
        <div class="modal modal--center" id="modal-booking-cart" aria-hidden="true">
            <div class="modal__dimmer" data-micromodal-close></div>

            <button class="modal__close btn btn--simple-icon" data-micromodal-close><svg width="15" height="15" fill="none"><path d="M14.5 2.62A1.5 1.5 0 1 0 12.38.5L7.5 5.38 2.62.5A1.5 1.5 0 0 0 .5 2.62L5.38 7.5.5 12.38a1.5 1.5 0 1 0 2.12 2.12L7.5 9.62l4.88 4.88a1.5 1.5 0 1 0 2.12-2.12L9.62 7.5l4.88-4.88Z" fill="#fff"/></svg></button>

            <div class="modal__inner" role="dialog" aria-modal="true">
                <div class="modal__content">
					<?php get_template_part( 'templates/header/booking/mobile' ); ?>
                </div>
            </div>
        </div>
        <?php
    endif;
}


/**
 *  Simple Booking Modal
 */

add_action( 'wp_footer', 'pdp_add_booking_modal' );

function pdp_add_booking_modal(){
    if( !is_page_template( array( 'booking.php', 'links.php' ) ) ) : ?>
        <div class="modal modal--center" id="modal-booking" aria-hidden="true">
            <div class="modal__dimmer" data-micromodal-close></div>

            <button class="modal__close btn btn--simple-icon" data-micromodal-close><svg width="15" height="15" fill="none"><path d="M14.5 2.62A1.5 1.5 0 1 0 12.38.5L7.5 5.38 2.62.5A1.5 1.5 0 0 0 .5 2.62L5.38 7.5.5 12.38a1.5 1.5 0 1 0 2.12 2.12L7.5 9.62l4.88 4.88a1.5 1.5 0 1 0 2.12-2.12L9.62 7.5l4.88-4.88Z" fill="#fff"/></svg></button>

            <div class="modal__inner" role="dialog" aria-modal="true">
                <div class="modal__header"><?=__( 'Записаться', 'pdp' ); ?></div>
                <div class="modal__content">
                    <?php get_template_part( 'templates/forms/booking/modal' ); ?>
                </div>
            </div>
        </div>
        <?php
    endif;
}


/**
 *  Category Booking Modal
 */

add_action( 'wp_footer', 'pdp_add_service_category_booking_modal' );

function pdp_add_service_category_booking_modal(){
	if( is_page_template( 'service-category.php' ) ){ ?>
		<div class="modal modal--center" id="modal-service-category-booking" aria-hidden="true">
			<div class="modal__dimmer" data-micromodal-close></div>

            <button class="modal__close btn btn--simple-icon" data-micromodal-close><svg width="15" height="15" fill="none"><path d="M14.5 2.62A1.5 1.5 0 1 0 12.38.5L7.5 5.38 2.62.5A1.5 1.5 0 0 0 .5 2.62L5.38 7.5.5 12.38a1.5 1.5 0 1 0 2.12 2.12L7.5 9.62l4.88 4.88a1.5 1.5 0 1 0 2.12-2.12L9.62 7.5l4.88-4.88Z" fill="#fff"/></svg></button>

            <div class="modal__inner" role="dialog" aria-modal="true">
                <div class="modal__header"><?=__( 'Записаться', 'pdp' ); ?></div>
                <div class="modal__content">
					<?php get_template_part( 'templates/forms/booking/category' ); ?>
                </div>
            </div>
		</div>
		<?php
	}
}


/**
 *  Gift Order
 */

add_action( 'wp_footer', 'pdp_add_gifts_order_modal' );

function pdp_add_gifts_order_modal(){
    if( is_page_template( 'gift-cards.php' ) ){
        $gifts = carbon_get_the_post_meta( 'gifts' ); ?>
        <div class="modal" id="modal-gift-card">
            <div class="modal__dimmer" data-micromodal-close></div>

            <button class="btn btn--simple-icon modal__close" data-micromodal-close><svg width="15" height="15" fill="none"><path d="M14.5 2.62A1.5 1.5 0 1 0 12.38.5L7.5 5.38 2.62.5A1.5 1.5 0 0 0 .5 2.62L5.38 7.5.5 12.38a1.5 1.5 0 1 0 2.12 2.12L7.5 9.62l4.88 4.88a1.5 1.5 0 1 0 2.12-2.12L9.62 7.5l4.88-4.88Z" fill="#fff"/></svg></button>

            <div class="modal__inner" role="dialog" aria-modal="true">
                <div class="product product--gift-card">
                    <div class="product__gallery">
                        <div class="gallery gallery--product">
                            <div class="gallery__nav swiper">
                                <div class="swiper-wrapper">
								    <?php foreach( $gifts as $gift ) : ?>
									    <?php if( $gift['type'] === 'card' ) : ?>
										    <?php foreach( $gift['gallery'] as $item ) : ?>
                                                <div class="swiper-slide">
                                                    <img src="<?=wp_get_attachment_image_url( $item['item1x'] ); ?>">
                                                </div>
										    <?php endforeach; ?>
									    <?php endif; ?>
								    <?php endforeach; ?>
                                </div>
                            </div>

                            <div class="gallery__slides swiper">
                                <div class="swiper-wrapper">
								    <?php foreach( $gifts as $gift ) : ?>
									    <?php if( $gift['type'] === 'card' ) : ?>
										    <?php foreach( $gift['gallery'] as $item ) : ?>
                                                <div class="swiper-slide">
                                                    <img src="<?=wp_get_attachment_image_url( $item['item1x'], 'full' ); ?>" srcset="<?=wp_get_attachment_image_url( $item['item1x'], 'full' ); ?> 1x, <?=wp_get_attachment_image_url( $item['item2x'], 'full' ); ?> 2x">
                                                </div>
										    <?php endforeach; ?>
									    <?php endif; ?>
								    <?php endforeach; ?>
                                </div>

                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>

                    <div class="product__details">
                        <h3 class="product__title"><?=__( 'Подарочная карта', 'pdp' ); ?></h3>
                        <div class="product__form gift-card-order">
                            <form class="form">
                                <div class="color-picker gift-card-order__color">
                                    <label><?=__( 'Цвет', 'pdp' ); ?></label>

                                    <div class="color-picker__options">
                                        <?php foreach( $gifts as $gift ) : ?>
                                            <?php if( $gift['type'] === 'card' ) : ?>
                                                <label>
                                                    <input type="radio" name="color" value="<?=$gift['name']; ?>" data-amounts="<?=$gift['amount']; ?>">
                                                    <span style="background: <?=$gift['color']; ?>;"></span>
                                                </label>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>

                                <fieldset disabled>
                                    <div class="form__fields">
                                        <div class="gift-card-order__type">
                                            <div class="gift-card-order__amount">
                                                <select name="amount">
                                                    <option value="" disabled selected><?=__( 'Номинал', 'pdp' ); ?></option>
                                                </select>
                                            </div>

                                            <div class="gift-card-order__qty">
                                                <select name="qty">
				                                    <?php for( $i = 1; $i <= 5; $i++ ) : ?>
                                                        <option value="<?=$i; ?>" <?=$i === 1 ? 'selected' : ''; ?>><?=$i; ?></option>
				                                    <?php endfor; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="gift-card-order__footer">
		                                    <?php pdp_form_field( 'phone', true ); ?>

                                            <button type="submit" class="btn"><span><?=__( 'Заказать', 'pdp' ); ?></span></button>
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="form__response"></div>

                                <input type="hidden" name="action" value="gift_card_order">
	                            <?php wp_nonce_field( 'pdp_gift_card_order_nonce', 'pdp_nonce' ); ?>
	                            <?php pdp_utm_fields(); ?>
                            </form>
                        </div>
                        <div class="product__desc"><?=__( 'Чтобы уточнить наявность или задать интересующие вопросы, вы можете оставить свои контакты и мы вам перезвоним, чтоб уточнить все детали заказа.', 'pdp' ); ?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="modal-gift-box">
            <div class="modal__dimmer" data-micromodal-close></div>

            <button class="btn btn--simple-icon modal__close" data-micromodal-close><svg width="15" height="15" fill="none"><path d="M14.5 2.62A1.5 1.5 0 1 0 12.38.5L7.5 5.38 2.62.5A1.5 1.5 0 0 0 .5 2.62L5.38 7.5.5 12.38a1.5 1.5 0 1 0 2.12 2.12L7.5 9.62l4.88 4.88a1.5 1.5 0 1 0 2.12-2.12L9.62 7.5l4.88-4.88Z" fill="#fff"/></svg></button>

            <div class="modal__inner" role="dialog" aria-modal="true">
                <div class="product">
                    <div class="product__gallery">
                        <div class="gallery gallery--product">
                            <div class="gallery__nav swiper">
                                <div class="swiper-wrapper">
                                    <?php foreach( $gifts as $gift ) : ?>
                                        <?php if( $gift['type'] === 'box' ) : ?>
                                            <?php foreach( $gift['gallery'] as $item ) : ?>
                                                <div class="swiper-slide">
                                                    <img src="<?=wp_get_attachment_image_url( $item['item1x'] ); ?>">
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <div class="gallery__slides swiper">
                                <div class="swiper-wrapper">
	                                <?php foreach( $gifts as $gift ) : ?>
		                                <?php if( $gift['type'] === 'box' ) : ?>
			                                <?php foreach( $gift['gallery'] as $item ) : ?>
                                                <div class="swiper-slide">
                                                    <img src="<?=wp_get_attachment_image_url( $item['item1x'], 'full' ); ?>" srcset="<?=wp_get_attachment_image_url( $item['item1x'], 'full' ); ?> 1x, <?=wp_get_attachment_image_url( $item['item2x'], 'full' ); ?> 2x">
                                                </div>
			                                <?php endforeach; ?>
		                                <?php endif; ?>
	                                <?php endforeach; ?>
                                </div>

                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>

                    <div class="product__details">
                        <h3 class="product__title"><?=__( 'Подарочный бокс', 'pdp' ); ?></h3>
                        <div class="product__desc"><?=__( 'Наполнить боксы косметикой вы можете в любом нашем салоне на свое усмотрение или с помощью администратора. Чтобы уточннить наявность или задать интересующие вопросы, вы можете оставить свои контакты и мы вам перезвоним, чтоб уточнить все детали заказа.', 'pdp' ); ?></div>
                        <div class="product__form gift-box">
                            <form class="form form--gift-box">
                                <fieldset>
                                    <div class="form__fields gift-box__items">
                                        <?php foreach( $gifts as $gift ) : ?>
                                            <?php if( $gift['type'] === 'box' ) : ?>
                                                <div class="order-item order-item--gift-box gift-box__item">
                                                    <div class="order-item__details">
                                                        <div class="order-item__color" style="background: <?=$gift['color']; ?>;"></div>
                                                        <div class="order-item__desc">
                                                            <div class="order-item__title"><?=strip_tags( $gift['title'] ); ?></div>
                                                            <div class="order-item__subtitle"><?=$gift['desc']; ?></div>
                                                        </div>
                                                    </div>

                                                    <div class="order-item__add-btn">
                                                        <label>
                                                            <input type="checkbox" name="<?=$gift['slug']; ?>" value="<?=$gift['name']; ?>">
                                                            <div class="icon">
                                                                <div></div>
                                                                <div></div>
                                                            </div>
                                                        </label>
                                                    </div>

                                                    <div class="order-item__qty">
                                                        <select name="<?=$gift['slug']; ?>_qty" disabled>
	                                                        <?php for( $i = 1; $i <= 5; $i++ ) : ?>
                                                                <option value="<?=$i; ?>" <?=$i === 1 ? 'selected' : ''; ?>><?=$i; ?></option>
	                                                        <?php endfor; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </fieldset>

                                <div class="form__response"></div>

                                <div class="form__actions gift-box__footer">
		                            <?php pdp_form_field( 'phone', true ); ?>
                                    <button type="submit" class="btn" disabled><span><?=__( 'Заказать', 'pdp' ); ?></span></button>
                                </div>

                                <input type="hidden" name="action" value="gift_box_order">
	                            <?php wp_nonce_field( 'pdp_gift_box_order_nonce', 'pdp_nonce' ); ?>
	                            <?php pdp_utm_fields(); ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}


/**
 *  Vacancy Apply Modal
 */

add_action( 'wp_footer', 'pdp_add_vacancy_apply_modal' );

function pdp_add_vacancy_apply_modal(){
    if( is_page_template( 'vacancies.php' ) ){ ?>
        <div class="modal modal--center" id="modal-vacancy-apply" aria-hidden="true">
            <div class="modal__dimmer" data-micromodal-close></div>

            <button class="modal__close btn btn--simple-icon" data-micromodal-close><svg width="15" height="15" fill="none"><path d="M14.5 2.62A1.5 1.5 0 1 0 12.38.5L7.5 5.38 2.62.5A1.5 1.5 0 0 0 .5 2.62L5.38 7.5.5 12.38a1.5 1.5 0 1 0 2.12 2.12L7.5 9.62l4.88 4.88a1.5 1.5 0 1 0 2.12-2.12L9.62 7.5l4.88-4.88Z" fill="#fff"/></svg></button>

            <div class="modal__inner" role="dialog" aria-modal="true">
                <div class="modal__header"><?=__( 'Заявка на вакансию', 'pdp' ); ?></div>
                <div class="modal__content">
				    <?php get_template_part( 'templates/forms/vacancy-apply' ); ?>
                </div>
            </div>
        </div>
        <?php
    }
}


/**
 *  Post Share Modal
 */

//add_action( 'wp_footer', 'pdp_add_share_post_modal' );

function pdp_add_share_post_modal(){
	if( is_single() ){ ?>
		<div class="modal" id="modal-share-post" aria-hidden="true">
			<div class="modal__dimmer" data-micromodal-close>
				<div class="modal__inner">
					<div class="modal__header"><?=__( 'Поделиться статьей', 'pdp' ); ?></div>
					<div class="modal__content">
						<div class="inputWrap inputWrap_iconed">
							<div class="inputWrap__input">
								<div class="inputWrap__icon">
									<button class="btn-icon btn_copy" data-clipboard-target="#post-link">
										<svg width="22" height="22" fill="none"><path d="M8.3 17.24L5.92 19.6a2.5 2.5 0 11-3.53-3.53l4.71-4.72a2.5 2.5 0 013.54 0 .83.83 0 001.18-1.18 4.17 4.17 0 00-5.9 0L1.22 14.9a4.17 4.17 0 105.9 5.89l2.35-2.36a.83.83 0 00-1.18-1.18z" fill="#392BDF"/><path d="M18.78 3.22a4.17 4.17 0 00-5.9 0l-2.82 2.83a.83.83 0 101.18 1.18l2.83-2.83a2.5 2.5 0 013.53 3.53l-5.18 5.19a2.5 2.5 0 01-3.54 0A.83.83 0 007.7 14.3a4.17 4.17 0 005.9 0l5.18-5.19a4.17 4.17 0 000-5.89z" fill="#392BDF"/></svg>
									</button>
								</div>
								<input type="text" id="post-link" class="input" readonly value="<?=get_permalink( get_the_ID() ); ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}