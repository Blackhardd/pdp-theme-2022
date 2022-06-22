<?php

$cities = pdp_get_salons_grouped_by_city();

?>

<div class="desktop-salons-menu">
	<button class="btn btn--square-icon desktop-salons-menu__button">
		<span>
			<svg width="19" height="18" fill="none">
				<path d="M17.5 12.4c-1.2 0-2.4-.2-3.5-.6a1 1 0 0 0-1 .3l-1.6 2a15.2 15.2 0 0 1-6.9-6.9l2-1.7c.2-.2.3-.6.2-1-.4-1-.6-2.3-.6-3.5 0-.6-.4-1-1-1H1.8C1 0 .5.2.5 1c0 9.3 7.7 17 17 17 .7 0 1-.6 1-1.2v-3.4c0-.6-.4-1-1-1Z" />
			</svg>
		</span>
	</button>

	<div class="desktop-salons-panel desktop-salons-menu__content">
		<div class="container">
			<div class="desktop-salons-panel__inner">
				<div class="desktop-salons-panel__list">
					<div class="col">
						<?php dynamic_sidebar( 'header_salons_left' ); ?>
					</div>

					<div class="col">
						<?php dynamic_sidebar( 'header_salons_center' ); ?>
					</div>

					<div class="col">
						<?php dynamic_sidebar( 'header_salons_right' ); ?>
					</div>
				</div>

				<?php if( $banner_id = carbon_get_theme_option( 'header_phones_banner' ) ) : ?>
					<?php pdp_get_banner( $banner_id, ['banner--header', 'desktop-salons-panel__banner'] ); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
