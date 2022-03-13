<form class="form form--category-booking">
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
        </div>
    </fieldset>

    <div class="form__response"></div>

    <div class="form__actions">
        <button type="submit" class="btn"><span><?=__( 'Записаться', 'pdp' ); ?></span></button>
    </div>

    <input type="hidden" name="action" value="category_booking">
    <input type="hidden" name="page_title" value="<?=get_the_title(); ?>">
    <input type="hidden" name="page_url" value="<?=esc_url( get_permalink() ); ?>">
    <?php wp_nonce_field( 'pdp_category_booking_nonce', 'pdp_nonce' ); ?>
    <?php pdp_utm_fields(); ?>
</form>