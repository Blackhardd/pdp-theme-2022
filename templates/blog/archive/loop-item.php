<?php

$permalink = get_permalink( get_the_ID() );

?>

<article class="post-card">
    <div class="post-card__image">
        <a href="<?=$permalink; ?>">
            <img data-src="<?php the_post_thumbnail_url( 'blog-thumbnail' ); ?>" class="lazyload">
        </a>
    </div>

    <div class="post-card__info">
        <?php if( pdp_is_post_new( get_the_date() ) ) : ?>
            <div class="post-card__topbar">
                <div class="tag">New</div>
            </div>
        <?php endif; ?>

        <h3 class="post-card__title"><a href="<?=$permalink; ?>"><?php the_title(); ?></a></h3>
        <a href="<?=$permalink; ?>" class="btn btn--outline post-card__button"><?=__( 'Читать', 'pdp' ); ?></a>
    </div>
</article>