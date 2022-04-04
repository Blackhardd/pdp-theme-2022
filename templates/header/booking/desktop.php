<div class="header-cart header-cart--desktop">
	<button class="btn btn--outline header-cart__button">
        <?=__( 'Запись', 'pdp' ); ?>

        <div class="header-cart__counter">0</div>
    </button>

	<div class="cart-panel cart-panel--desktop header-cart__panel">
		<div class="container">
			<div class="cart-panel__inner">
				<div class="booking-cart booking-cart--header cart-panel__cart">
					<div class="booking-cart__loader">
						<svg width="64" height="61" fill="none"><path d="M51.2 12.18V0L38.41 12.18H25.6L0 36.55h12.8l12.81-12.18v12.18h12.8l-12.8 12.18V60.9l25.58-24.34V24.37L64 12.18H51.2Z" /></svg>
						<span><?=__( 'Обработка', 'pdp' ); ?></span>
					</div>

					<div class="booking-cart__inner">
						<div class="booking-cart__title"><?=__( 'Ваше бронирование', 'pdp' ); ?></div>

						<form class="form form--booking booking-cart__form">
							<fieldset>
								<div class="form__fields">
									<div class="form-row form-row--two">
										<div class="form-col">
											<?php pdp_form_field( 'name', true ); ?>
										</div>

										<div class="form-col">
											<?php pdp_form_field( 'phone', true ); ?>
										</div>
									</div>

									<div class="form-row form-row--two">
										<div class="form-col">
											<select name="salon" data-icon="location" data-confirm="<?=__( 'Смена салона удалит все услуги из корзины. Вы уверенны?', 'pdp' ); ?>">
												<?php foreach( pdp_get_salons_with_pricelist() as $key => $salon ) : ?>
													<option value="<?=$salon['id']; ?>"><?="{$salon['city']}, {$salon['name']}"; ?></option>
												<?php endforeach; ?>
											</select>
										</div>

										<div class="form-col">
											<select name="hair">
												<option value="0" selected><?=__( 'от 5-15 см', 'pdp' ); ?></option>
												<option value="1"><?=__( 'от 15 - 25 см (выше плеч, каре, боб)', 'pdp' ); ?></option>
												<option value="2"><?=__( 'от 25 - 40 см (ниже плеч/выше лопаток)', 'pdp' ); ?></option>
												<option value="3"><?=__( 'от 40 - 60 см (ниже лопаток)', 'pdp' ); ?></option>
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

				<?php pdp_get_banner( 11465, ['banner--header', 'cart-panel__banner'] ); ?>
			</div>
		</div>
	</div>
</div>