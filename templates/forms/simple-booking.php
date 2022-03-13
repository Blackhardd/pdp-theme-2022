<?php

wp_enqueue_script( 'forms' );

$is_show_salon_select = carbon_get_theme_option( 'forms_show_salon_select' );
$default_salon = carbon_get_theme_option( 'forms_default_salon' );

?>

<form class="form form--simple-booking">
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

			<?php if( $is_show_salon_select ) : ?>
				<div class="form-row form-row--two">
					<div class="form-col">
						<?php pdp_form_field( 'service' ); ?>
					</div>

					<div class="form-col">
						<?php pdp_form_field( 'salon' ); ?>
					</div>
				</div>
			<?php else : ?>
				<div class="form-row form-row--one">
					<div class="form-col">
						<?php pdp_form_field( 'service' ); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</fieldset>

	<div class="form__response"></div>

	<div class="form__actions">
		<button type="submit" class="btn"><span><?=__( 'Записаться', 'pdp' ); ?></span></button>
	</div>

	<?=!$is_show_salon_select ? "<input type='hidden' name='salon' value='{$default_salon}'>" : ''; ?>
	<input type="hidden" name="action" value="simple_booking">
	<input type="hidden" name="page_title" value="<?=get_the_title(); ?>">
	<input type="hidden" name="page_url" value="<?=esc_url( get_permalink() ); ?>">
	<?php wp_nonce_field( 'pdp_simple_booking_nonce', 'pdp_nonce' ); ?>
	<?php pdp_utm_fields(); ?>
</form>