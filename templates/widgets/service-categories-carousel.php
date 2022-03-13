<?php

wp_enqueue_style( 'swiper' );
wp_enqueue_script( 'swiper' );

$categories = pdp_get_service_categories();
$current_language = pdp_get_current_language();

?>

<div class="services-carousel carousel swiper">
	<div class="services-carousel__dimmer"></div>

	<div class="swiper-wrapper">
		<?php foreach( $categories as $category ) : ?>
			<div class="service-card swiper-slide">
				<a href="<?=add_query_arg( 'category', $category['slug'], get_permalink( pll_get_post( 66 ) ) ); ?>">
					<img data-src="<?=$category['cover']['1x']; ?>" data-srcset="<?=$category['cover']['1x']; ?> 1x, <?=$category['cover']['2x']; ?> 2x" alt="<?=$category['title'][$current_language]; ?>" class="service-card__image lazyload">

					<div class="service-card__title">
						<div class="service-card__name"><?=$category['name'][$current_language]; ?></div>

						<div class="service-card__icon">
							<svg width="18" height="18" fill="none">
								<path d="M10 0H8v8H0v2h8v8h2v-8h8V8h-8V0Z" />
							</svg>
						</div>
					</div>
				</a>
			</div>
		<?php endforeach; ?>
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