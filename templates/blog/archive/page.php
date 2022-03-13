<?php

$page_id = pll_get_post( get_option( 'page_for_posts' ) );
$hero_background = pdp_get_post_meta_retina_image_url( $page_id, 'hero_background' );

?>

<section id="blog-hero">
    <div class="container">
        <div class="page-hero">
            <img src="<?=$hero_background['1x']; ?>" srcset="<?=$hero_background['1x']; ?> 1x, <?=$hero_background['2x']; ?> 2x" class="page-hero__image">

            <div class="page-hero__content">
                <div class="page-hero__uptitle"><?=carbon_get_post_meta( $page_id, 'hero_overtitle' ); ?></div>
                <h1><?=carbon_get_post_meta( $page_id, 'hero_title' ); ?></h1>
                <div class="page-hero__subtitle"><?=carbon_get_post_meta( $page_id, 'hero_description' ); ?></div>

                <?php if( $instagram = carbon_get_theme_option( 'instagram' ) ) : ?>
                    <a href="<?=$instagram; ?>" target="_blank" class="btn btn--icon page-hero__action">
                        <svg width="18" height="18" fill="none">
                            <path d="M8.63.37c1.34 0 2.67-.03 4 0 1.75.03 3.08.82 4 2.29.47.73.66 1.55.66 2.42v7.85a4.7 4.7 0 0 1-4.63 4.7h-8A4.7 4.7 0 0 1 0 12.94V5.1A4.67 4.67 0 0 1 4.68.37h3.95Zm.03 1.58H4.79c-.21 0-.43.03-.65.06a3.13 3.13 0 0 0-2.56 3.13v7.79c0 .21.03.43.05.65a3.13 3.13 0 0 0 3.14 2.53h7.76c.22 0 .43-.03.62-.05a3.13 3.13 0 0 0 2.56-3.13v-7.8c0-.6-.13-1.16-.49-1.68a3.04 3.04 0 0 0-2.7-1.47c-1.27-.03-2.58-.03-3.86-.03Z"/>
                            <path d="M12.83 9a4.16 4.16 0 0 1-4.14 4.14A4.13 4.13 0 1 1 12.83 9Zm-4.17 2.46a2.44 2.44 0 0 0 2.48-2.43 2.48 2.48 0 1 0-2.48 2.43ZM14.02 4.48a.8.8 0 0 1-.81.82.83.83 0 0 1-.85-.82.8.8 0 0 1 .82-.81c.46 0 .84.35.84.81Z"/>
                        </svg>
                        <span><?=__( 'Наш Instagram', 'pdp' ); ?></span>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section id="blog-posts">
	<div class="container">
        <div class="posts-grid">
			<?php
			while( have_posts() ) : the_post();
				get_template_part( 'templates/blog/archive/loop-item' );
			endwhile;
			?>
		</div>

        <div class="posts-pagination">
            <?php the_posts_pagination(); ?>
        </div>
	</div>
</section>

<section id="blog-banner">
    <div class="container">
	    <?php $school_image = pdp_get_post_meta_retina_image_url( $page_id, 'school_image' ); ?>
        <div class="school">
            <img src="<?=$school_image['1x']; ?>" srcset="<?=$school_image['1x']; ?> 1x, <?=$school_image['2x']; ?> 2x" class="school__image">
            <div class="school__overlay"></div>

            <div class="school__inner">
                <div class="title school__title">
                    <div class="title__overtitle"><?=carbon_get_post_meta( $page_id, 'school_overtitle' ); ?></div>
                    <h2 class="title__heading"><?=carbon_get_post_meta( $page_id, 'school_title' ); ?></h2>
                </div>

                <div class="school__desc"><?=carbon_get_post_meta( $page_id, 'school_description' ); ?></div>

                <div class="school__directions">
				    <?php foreach( carbon_get_post_meta( $page_id, 'school_directions' ) as $direction ) : ?>
                        <a class="btn btn--outline btn--white"><?=$direction['name']; ?></a>
				    <?php endforeach; ?>
                </div>

                <a href="<?=carbon_get_post_meta( $page_id, 'school_link' ); ?>" class="btn btn--white school__action"><span><?=carbon_get_post_meta( $page_id, 'school_button' ); ?></span></a>
            </div>
        </div>
    </div>
</section>
</main>