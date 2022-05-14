<?php

wp_enqueue_script( 'map' );

$main_city = pdp_get_main_city( pll_current_language() );
$cities = pdp_get_salon_cities();
$city_counter = 0;

?>

<div class="map">
    <?php if( $args['display_title'] ) : ?>
        <div class="map__header">
            <div class="title map__title">
                <div class="title__overtitle"><?=__( 'Пространство', 'pdp' ); ?></div>
                <h2 class="title__heading"><?=__( 'Наши салоны', 'pdp' ); ?></h2>
            </div>

            <div class="map__city">
                <select name="city" data-icon="location">
                    <?php foreach( $cities as $city ) : ?>
                        <option value="<?=$city->name; ?>" <?=!$main_city && $city_counter === 0 ? 'selected' : ( $main_city === $city->name ? 'selected' : '' ); ?>><?=$city->name; ?></option>
                    <?php
                        $city_counter++;
                    endforeach; ?>
                </select>
            </div>
        </div>
    <?php else : ?>
        <div class="map__city">
            <select name="city" data-icon="location">
			    <?php foreach( $cities as $city ) : ?>
                    <option value="<?=$city->name; ?>" <?=!$main_city && $city_counter === 0 ? 'selected' : ( $main_city === $city->name ? 'selected' : '' );?>><?=$city->name; ?></option>
				    <?php
				    $city_counter++;
			    endforeach; ?>
            </select>
        </div>
    <?php endif; ?>

	<div class="map__map"></div>

	<div class="map__footer">
		<a href="<?=!is_post_type_archive( 'salon' ) ? get_post_type_archive_link( 'salon' ) : '#salons-grid'; ?>" class="btn btn--outline"><?=__( 'Просмотреть все салоны', 'pdp' ); ?></a>
	</div>
</div>