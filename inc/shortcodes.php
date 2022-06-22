<?php

// City salons list shortcode.

add_shortcode( 'city_salons', 'pdp_city_salons_shortcode' );

function pdp_city_salons_shortcode( $atts ){
	$atts = shortcode_atts( array(
		'city' => ''
	), $atts, 'city_salons' );

	$city_term = get_term( pll_get_term( $atts['city'] ) );
	$salons = pdp_get_salons_data( $city_term->name );

	ob_start();
	?>
	<div class="salons-list">
		<div class="salons-list__city"><?=$city_term->name; ?></div>

		<div class="salons-list__items">
			<?php foreach( $salons as $salon ) : ?>
				<div class="salons-list-item">
					<div class="salons-list-item__address"><?=$salon['name']; ?></div>
					<a href="tel:<?=$salon['phone']; ?>" class="salons-list-item__phone"><?=$salon['phone']; ?></a>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<?php
	return ob_get_clean();
}