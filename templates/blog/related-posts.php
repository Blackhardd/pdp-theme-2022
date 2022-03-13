<?php

wp_enqueue_style( 'swiper' );
wp_enqueue_script( 'swiper' );

$related = pdp_get_related_posts( get_the_ID() );

?>

<section id="post-related">
    <div class="container">
        <div class="title title--center">
            <h3 class="title__heading"><?=__( 'Читайте также:', 'pdp' ); ?></h3>
        </div>

        <div class="related-posts carousel swiper">
            <div class="swiper-wrapper">
			    <?php
			    foreach( $related as $post ) :
                    pdp_get_post_card( $post );
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
    </div>
</section>