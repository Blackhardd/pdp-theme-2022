<?php

$post = $args['post'];

if( $post ) :
	$permalink = get_permalink( $post->ID ); ?>

	<article class="post-card swiper-slide">
		<div class="post-card__image">
			<a href="<?=$permalink; ?>">
				<img data-src="<?=get_the_post_thumbnail_url( $post->ID, 'blog-thumbnail' ); ?>" class="lazyload">
			</a>
		</div>

		<div class="post-card__info">
			<?php if( pdp_is_post_new( get_the_date( '', $post->ID ) ) ) : ?>
				<div class="post-card__topbar">
					<div class="tag">New</div>
				</div>
			<?php endif; ?>

			<h3 class="post-card__title"><a href="<?=$permalink; ?>"><?=$post->post_title; ?></a></h3>
			<a href="<?=$permalink; ?>" class="btn btn--outline post-card__button"><?=__( 'Читать', 'pdp' ); ?></a>
		</div>
	</article>

<?php endif;