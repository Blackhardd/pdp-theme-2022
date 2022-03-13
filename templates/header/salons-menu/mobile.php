<?php

$salons = pdp_get_salons_grouped_by_city();

?>

<div class="mobile-salons-menu">
	<button class="btn btn--simple-icon mobile-salons-menu__button">
		<svg width="24" height="24" fill="none"><path d="M20 15.4c-1.2 0-2.4-.2-3.5-.6a1 1 0 0 0-1 .3l-1.6 2A15.2 15.2 0 0 1 7 10.1l2-1.7c.2-.2.3-.6.2-1-.4-1-.6-2.3-.6-3.5 0-.5-.4-1-1-1H4.3C3.6 3 3 3.2 3 4c0 9.3 7.7 17 17 17 .7 0 1-.6 1-1.2v-3.4c0-.6-.4-1-1-1Z" /></svg>
	</button>

	<div class="mobile-salons-panel mobile-salons-menu__content">
		<div class="container">
			<?php foreach( $salons as $city => $salons ) : ?>
				<div class="salons-list">
					<div class="salons-list__city"><?=$city; ?></div>

					<div class="salons-list__items">
						<?php foreach( $salons as $salon ) : ?>
							<div class="salons-list-item">
								<div class="salons-list-item__address"><?=$salon['name']; ?></div>
								<a href="tel:<?=$salon['phone']; ?>" class="salons-list-item__phone"><?=$salon['phone']; ?></a>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
