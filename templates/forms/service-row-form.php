<?php

wp_enqueue_script( 'forms' );

?>

<form class="form">
	<div class="form__fields">
		<fieldset>
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

			<?php if( carbon_get_theme_option( 'forms_show_salon_select' ) ) : ?>
				<div class="form-row form-row--one">
					<div class="form-col">
						<?php pdp_form_field( 'salon' ); ?>
					</div>
				</div>
			<?php else : ?>
				<input type="hidden" name="salon" value="<?=carbon_get_theme_option( 'forms_default_salon' ); ?>">
			<?php endif; ?>
		</fieldset>
	</div>

	<div class="form__response"></div>

	<div class="form__actions">
		<button type="submit" class="btn"><span><?=__( 'Записаться', 'pdp' ); ?></span></button>
	</div>

	<input type="hidden" name="action" value="service_booking">
	<input type="hidden" name="service" value="<?=$args['service']; ?>">
	<input type="hidden" name="page_title" value="<?=get_the_title(); ?>">
	<input type="hidden" name="page_url" value="<?=esc_url( get_permalink() ); ?>">
	<?php wp_nonce_field( 'pdp_service_booking_nonce', 'pdp_nonce' ); ?>
	<?php pdp_utm_fields(); ?>
</form>