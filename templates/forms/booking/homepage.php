<div class="form-wrap">
	<form class="form">
        <div class="form__fields">
            <div class="form-row form-row--two">
                <div class="form-col">
                    <?php pdp_form_field( 'name', true ); ?>
                </div>

                <div class="form-col">
	                <?php pdp_form_field( 'phone', true ); ?>
                </div>
            </div>

            <div class="form-row <?=( carbon_get_theme_option( 'forms_show_salon_select' ) ) ? 'form-row--two' : '' ;?>">
		        <?php if( carbon_get_theme_option( 'forms_show_salon_select' ) ) : ?>
                    <div class="form-col">
	                    <?php pdp_form_field( 'salon' ); ?>
                    </div>
		        <?php else : ?>
                    <input type="hidden" name="salon" value="<?=carbon_get_theme_option( 'forms_default_salon' ); ?>">
		        <?php endif; ?>

                <div class="form-col">
	                <?php pdp_form_field( 'service' ); ?>
                </div>
            </div>
        </div>

		<div class="form__response"></div>

		<div class="form__submit">
			<input type="submit" class="btn-default" value="<?=__( 'Записаться', 'pdp' ); ?>">
		</div>

		<input type="hidden" name="action" value="simple_booking">
		<input type="hidden" name="page_title" value="<?=get_the_title(); ?>">
		<input type="hidden" name="page_url" value="<?=esc_url( get_permalink() ); ?>">
		<?php wp_nonce_field( 'pdp_simple_booking_nonce', 'pdp_nonce' ); ?>
		<?php pdp_utm_fields(); ?>
	</form>
</div>