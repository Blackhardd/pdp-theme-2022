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

            <div class="form-row form-row--two">
                <div class="form-col">
					<?php pdp_form_field( 'email', true ); ?>
                </div>

                <div class="form-col">
					<?php pdp_form_field( 'school-courses' ); ?>
                </div>
            </div>
        </div>

		<div class="form__submit">
			<input type="submit" class="btn-default" value="<?=__( 'Оставить заявку', 'pdp' ); ?>">
		</div>

		<input type="hidden" name="action" value="school_application">
		<?php wp_nonce_field( 'pdp_school_application_nonce', 'pdp_nonce' ); ?>
	</form>
</div>