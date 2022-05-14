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
						<div class="salons-list">
							<div class="salons-list__city"><?=__( 'Киев', 'pdp' ); ?></div>

							<div class="salons-list__items">
								<?php foreach( $cities[__( 'Киев', 'pdp' )] as $salon ) : ?>
									<div class="salons-list-item">
										<div class="salons-list-item__address"><?=$salon['name']; ?></div>
										<a href="tel:<?=$salon['phone']; ?>" class="salons-list-item__phone"><?=$salon['phone']; ?></a>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>

					<div class="col">
						<div class="salons-list">
							<div class="salons-list__city"><?=__( 'Харьков', 'pdp' ); ?></div>

							<div class="salons-list__items">
								<?php foreach( $cities[__( 'Харьков', 'pdp' )] as $salon ) : ?>
									<div class="salons-list-item">
										<div class="salons-list-item__address"><?=$salon['name']; ?></div>
										<a href="tel:<?=$salon['phone']; ?>" class="salons-list-item__phone"><?=$salon['phone']; ?></a>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>

					<div class="col">
						<div class="salons-list">
							<div class="salons-list__city"><?=__( 'Одесса', 'pdp' ); ?></div>

							<div class="salons-list__items">
								<?php foreach( $cities[__( 'Одесса', 'pdp' )] as $salon ) : ?>
									<div class="salons-list-item">
										<div class="salons-list-item__address"><?=$salon['name']; ?></div>
										<a href="tel:<?=$salon['phone']; ?>" class="salons-list-item__phone"><?=$salon['phone']; ?></a>
									</div>
								<?php endforeach; ?>
							</div>
						</div>

						<div class="salons-list">
							<div class="salons-list__city"><?=__( 'Владимир-Волынский', 'pdp' ); ?></div>

							<div class="salons-list__items">
								<?php foreach( $cities[__( 'Владимир-Волынский', 'pdp' )] as $salon ) : ?>
									<div class="salons-list-item">
										<div class="salons-list-item__address"><?=$salon['name']; ?></div>
										<a href="tel:<?=$salon['phone']; ?>" class="salons-list-item__phone"><?=$salon['phone']; ?></a>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>

				<?php if( $banner_id = carbon_get_theme_option( 'header_phones_banner' ) ) : ?>
					<?php pdp_get_banner( $banner_id, ['banner--header', 'desktop-salons-panel__banner'] ); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
