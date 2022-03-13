<?php if( $args['salon'] ) : ?>
	<form class="form form--salon-contacts contacts-salon-form__form">
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
            </div>
        </fieldset>

		<div class="form__response"></div>

		<div class="form__actions">
			<button type="submit" class="btn"><span><?=__( 'Записаться', 'pdp' ); ?></span></button>

            <?php if( $args['type'] && $args['type'] === 'mobile' ) : ?>
                <a href="<?=pdp_get_salon_pricelist_url( $args['salon'] ); ?>" class="btn btn--square-icon btn--outline">
                    <svg width="18" height="10" fill="none"><path d="M0 6h2V4H0v2Zm0 4h2V8H0v2Zm0-8h2V0H0v2Zm4 4h14V4H4v2Zm0 4h14V8H4v2ZM4 0v2h14V0H4Z" /></svg>
                </a>
            <?php else : ?>
                <a href="<?=pdp_get_salon_pricelist_url( $args['salon'] ); ?>" class="btn btn--outline"><?=__( 'Список услуг', 'pdp' ); ?></a>
            <?php endif; ?>
		</div>

		<input type="hidden" name="salon" value="<?=$args['salon']; ?>">
        <input type="hidden" name="action" value="salon_booking">
		<?php wp_nonce_field( 'pdp_salon_booking_nonce', 'pdp_nonce' ); ?>
	</form>
<?php else : ?>
	<div style="color: red;">Не указан ID салона.</div>
<?php endif;
