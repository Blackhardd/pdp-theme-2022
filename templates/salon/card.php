<?php

$salon = pdp_get_salon_data( $args['id'] );
$permalink = get_permalink( $salon['id'] );

?>

<div class="salon-card <?=$args['slider'] ? 'swiper-slide' : ''; ?>">
    <?php if( $salon['cover']['1x'] && $salon['cover']['2x'] ) : ?>
        <div class="salon-card__image">
            <a href="<?=$salon['outer_link'] ? $salon['outer_link'] : $permalink; ?>" <?=$salon['outer_link'] ? 'target="_blank"' : ''; ?>>
                <img src="<?=$salon['cover']['1x']; ?>" data-src="<?=$salon['cover']['1x']; ?>" data-srcset="<?=$salon['cover']['1x']; ?> 1x, <?=$salon['cover']['2x']; ?> 2x" class="lazyload">
            </a>
        </div>
    <?php endif; ?>

	<div class="salon-card__info">
		<div class="salon-card__topbar">
			<div class="tag tag--city <?=strlen( $salon['city'] ) > 10 ? 'tag--small' : ''; ?>"><?=$salon['city']; ?></div>

            <?php if( $salon['phone'] ) : ?>
                <a href="tel:<?=$salon['phone']; ?>" class="btn btn--round-icon">
                    <svg width="12" height="12" fill="none"><path d="M9.28 8.93c-.67 0-1.32-.1-1.93-.3a.53.53 0 0 0-.55.13l-.85 1.07a8.28 8.28 0 0 1-3.76-3.72l1.06-.9c.15-.16.2-.37.13-.56-.2-.6-.3-1.26-.3-1.93 0-.3-.25-.54-.54-.54H.64c-.29 0-.64.13-.64.54A9.36 9.36 0 0 0 9.28 12c.38 0 .54-.34.54-.64V9.47c0-.3-.25-.54-.54-.54ZM6.56.82 6.68 0A6.28 6.28 0 0 1 12 5.18l-.82.14A5.53 5.53 0 0 0 6.56.82ZM6.56 2.2a3.8 3.8 0 0 1 3.21 3.13l-.83.14a2.98 2.98 0 0 0-2.5-2.43l.12-.84Z" /></svg>
                </a>
            <?php endif; ?>
		</div>

		<a href="<?=$salon['outer_link'] ? $salon['outer_link'] : $permalink; ?>" <?=$salon['outer_link'] ? 'target="_blank"' : ''; ?>>
			<div class="salon-card__name"><?=$salon['title']; ?></div>
			<div class="salon-card__address"><?=$salon['name']; ?></div>
		</a>
	</div>
</div>
