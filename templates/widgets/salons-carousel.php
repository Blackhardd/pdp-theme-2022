<?php

wp_enqueue_style( 'swiper' );
wp_enqueue_script( 'swiper' );

$salons = pdp_get_salons();

?>

<div class="salons-carousel swiper">
    <div class="services-carousel__dimmer"></div>

    <div class="swiper-wrapper">
        <?php
        foreach( $salons as $salon ) :
            pdp_get_salon_card( $salon->ID, true );
        endforeach;
        ?>
    </div>

    <div class="swiper-footer">
        <div class="swiper-scrollbar"></div>
        <div class="swiper-nav">
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
</div>