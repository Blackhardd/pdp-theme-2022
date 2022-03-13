<div class="appointment-quick">
	<?php if( isset( $args['title'] ) && $args['title'] ) : ?>
		<h3><?=$args['title']; ?></h3>
	<?php endif; ?>

	<form id="appointment-quick-form" class="form">
		<div class="backdrop"><div class="loader"><div class="dot"></div><div class="dot"></div><div class="dot"></div><div class="dot"></div></div></div>

		<div class="form__row">
			<div class="form__col_full">
				<div class="inputWrap inputWrap_iconed">
					<div class="inputWrap__input">
						<div class="inputWrap__icon">
							<svg width="14" height="14" fill="none">
								<path d="M10.8 9.4C9.1 8.7 8.5 9 8.5 7.9v-.2h2.7c.4-.3-1-.8-1-4.5C10.2 1.3 9 0 7.1 0H7h-.1C5 0 3.8 1.3 3.8 3.2c0 3.7-1.4 4.2-1 4.5h2.6v.2c0 1.2-.5.8-2.2 1.5C1.4 10 .9 10.7.9 11V14h12.2v-2.9c0-.4-.5-1-2.3-1.7z" fill="#000"/>
							</svg>
						</div>
						<input type="text" name="name" class="input input_text" placeholder="<?=__( 'Как к вам обращаться?', 'pdp' ); ?>" data-parsley-length="[3, 24]" required>
					</div>
					<div class="inputWrap__errors"></div>
				</div>
			</div>
		</div>

		<div class="form__row">
			<div class="form__col_full">
				<div class="inputWrap inputWrap_iconed">
					<div class="inputWrap__input">
						<div class="inputWrap__icon">
							<svg width="14" height="14" fill="none">
								<path d="M13.7 11L11.5 9c-.4-.4-1.1-.4-1.6 0L9 10l-.3-.1C8 9.5 7 9 6 8 5 7 4.5 6 4.1 5.4L4 5.2l.7-.8.4-.3c.4-.5.4-1.2 0-1.6L3 .3C2.5 0 1.8 0 1.4.3L.8 1A3.5 3.5 0 000 2.8c-.2 2.3.8 4.5 3.8 7.4 4 4 7.3 3.8 7.4 3.8a3.7 3.7 0 001.8-.8l.7-.5c.4-.5.4-1.2 0-1.6z" fill="#000"/>
							</svg>
						</div>
						<input type="tel" name="phone" class="input input_tel" placeholder="<?=__( 'Номер телефона', 'pdp' ); ?>" data-parsley-pattern="^[\d\+\-\.\(\)\/\s]*$" required>
					</div>
					<div class="inputWrap__errors"></div>
				</div>
			</div>
		</div>

		<?php if( carbon_get_theme_option( 'forms_show_salon_select' ) ) : ?>
			<div class="form__row">
				<div class="form__col_full">
					<div class="inputWrap">
						<div class="inputWrap__input">
							<select name="salon" class="selectric selectric_pdp iconed iconed_salon">
								<option value=""><?=__( 'Выберите салон', 'pdp' ); ?></option>
								<?php
								foreach( pdp_get_salons() as $salon ){
									if( isset( $_GET['salon_pricelist'] ) && $_GET['salon_pricelist'] == $salon->ID ){ ?>
										<option value="<?=$salon->ID; ?>" selected><?=$salon->post_title; ?></option>
									<?php } else { ?>
										<option value="<?=$salon->ID; ?>"><?=$salon->post_title; ?></option>
										<?php
									}
								} ?>
							</select>
						</div>
						<div class="inputWrap__errors"></div>
					</div>
				</div>
			</div>
		<?php else : ?>
			<input type="hidden" name="salon" value="<?=carbon_get_theme_option( 'forms_default_salon' ); ?>">
		<?php endif; ?>

		<div class="form__row">
			<div class="form__col_full">
				<div class="inputWrap">
					<div class="inputWrap__input">
						<select name="service" class="selectric selectric_pdp iconed iconed_service">
							<option value=""><?=__( 'Выберите услугу', 'pdp' ); ?></option>
							<?php foreach( pdp_get_service_categories() as $service ) : ?>
								<option value="<?=$service['title']; ?>"><?=( pll_current_language() == 'ru' ) ? $service['title'] : $service['title_ua']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="inputWrap__errors"></div>
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