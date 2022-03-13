<form class="form form--vacancy-apply" enctype="multipart/form-data">
    <fieldset>
        <div class="form__fields">
            <div class="form-row form-row--one">
                <div class="form-col">
		            <?php pdp_form_field( 'name', true ); ?>
                </div>
            </div>

            <div class="form-row form-row--one">
                <div class="form-col">
	                <?php pdp_form_field( 'email', true ); ?>
                </div>
            </div>

            <div class="form-row form-row--one">
                <div class="form-col">
	                <?php pdp_form_field( 'phone', true ); ?>
                </div>
            </div>

            <div class="form-row form-row--one">
                <div class="form-col">
			        <?php pdp_form_field( 'vacancies' ); ?>
                </div>
            </div>

            <div class="form-row form-row--one">
                <div class="form-col">
	                <?php pdp_form_field( 'message' ); ?>
                </div>
            </div>
        </div>
    </fieldset>

    <div class="form__response"></div>

    <div class="form__actions">
        <button type="submit" class="btn"><span><?=__( 'Оставить заявку', 'pdp' ); ?></span></button>
        <?php pdp_form_field( 'file-button' ); ?>
    </div>

    <input type="hidden" name="vacancy" value="">
    <input type="hidden" name="action" value="vacancy_apply">
    <?php wp_nonce_field( 'pdp_vacancy_apply_nonce', 'pdp_nonce' ); ?>
</form>