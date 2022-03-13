<?php

$banner = $args['banner'];
$classes = $args['classes'];

?>

<div class="banner <?=$classes ? implode( ' ', $classes ) : ''; ?>">
	<?php if( $banner['type'] == 'video' ) : ?>
		<video class="banner__video lazy" autoplay muted loop playsinline>
			<source data-src="<?=$banner['video']['mp4']; ?>" type="video/mp4">
		</video>
	<?php else : ?>
		 <img src="<?=$banner['image']['1x']; ?>" data-src="<?=$banner['image']['1x']; ?>" data-srcset="<?=$banner['image']['1x']; ?> 1x, <?=$banner['image']['2x']; ?> 2x" class="banner__image lazyload">
	<?php endif; ?>

	<div class="banner__overlay"></div>

	<div class="banner__content">
		<div class="banner__title"><?=$banner['title']; ?></div>
		<div class="banner__desc"><?=wpautop( $banner['desc'] ); ?></div>
		<?=$banner['button'] && $banner['link'] ? "<a href='{$banner['link']}' class='btn btn--outline btn--white banner__action'>{$banner['button']}</a>" : ''; ?>
	</div>
</div>
