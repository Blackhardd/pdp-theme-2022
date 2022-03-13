<?php
wp_enqueue_style( 'swiper' );
wp_enqueue_script( 'swiper' );
wp_enqueue_style( 'overlay-scrollbars' );
wp_enqueue_script( 'overlay-scrollbars' );


$testimonials = pdp_get_testimonials();
$counter = 0;

?>

<div class="testimonials">
	<div class="testimonials__nav">
        <?php foreach ( $testimonials as $testimonial ) : ?>
            <div class="testimonial-item <?=$counter == 0 ? 'testimonial-item--active' : ''; ?> testimonials__nav-item" data-author="<?=$testimonial['name']; ?>">
                <img data-src="<?=$testimonial['images']['small']['1x']; ?>" data-srcset="<?=$testimonial['images']['small']['1x']; ?> 1x, <?=$testimonial['images']['small']['2x']; ?> 2x" alt="<?=$testimonial['name']; ?>" class="lazyload">
                <div class="testimonial-item__title">
                    <div class="testimonial-item__name"><?=$testimonial['name']; ?></div>
                    <div class="testimonial-item__position"><?=$testimonial['occupation']; ?></div>
                </div>
            </div>
        <?php
	        $counter++;
        endforeach; ?>
	</div>

	<div class="testimonials__items swiper">
		<div class="swiper-wrapper">
			<?php foreach ( $testimonials as $testimonial ) : ?>
                <div class="testimonial <?=$counter == 0 ? 'testimonial--active' : ''; ?>" data-author="<?=$testimonial['name']; ?>">
                    <div class="testimonial__content"><?=$testimonial['content']; ?></div>

                    <div class="testimonial__footer">
                        <img data-src="<?=$testimonial['images']['large']['1x']; ?>" data-srcset="<?=$testimonial['images']['large']['1x']; ?> 1x, <?=$testimonial['images']['large']['2x']; ?> 2x" alt="<?=$testimonial['name']; ?>" class="lazyload">
                        <div class="testimonial__title">
                            <div class="testimonial__name"><?=$testimonial['name']; ?></div>
                            <div class="testimonial__position"><?=$testimonial['occupation']; ?></div>
                        </div>
                    </div>
                </div>
            <?php
				$counter++;
			endforeach; ?>
		</div>

		<div class="swiper-scrollbar"></div>

		<div class="testimonials__items-footer">
			<div class="swiper-button-prev"></div>
			<div class="swiper-pagination"></div>
			<div class="swiper-button-next"></div>
		</div>

	</div>
</div>