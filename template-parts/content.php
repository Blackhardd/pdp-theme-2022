<?php

$archive_page_id = pll_get_post( get_option( 'page_for_posts' ) );
$content = apply_filters( 'the_content', get_the_content() );
$splitted_content = pdp_split_post_content( $content );

?>

<section id="post-item">
    <div class="container">
        <div class="single-post-wrapper">
            <?php pdp_the_table_of_contents( $content ); ?>

            <div class="single-post">
                <?php get_template_part( 'templates/blog/toolbar' ); ?>

                <h1 class="single-post__title"><?php the_title(); ?></h1>
                <div class="single-post__table-of-contents"><?php pdp_the_table_of_contents( $content, true ); ?></div>
                <div class="single-post__excerpt"><?=$splitted_content['paragraph']; ?></div>
                <div class="single-post__content"><?=$splitted_content['content']; ?></div>
            </div>
        </div>
    </div>
</section>

<?php get_template_part( 'templates/blog/related-posts' ); ?>

<section id="post-banner">
    <div class="container">
	    <?php $school_image = pdp_get_post_meta_retina_image_url( $archive_page_id, 'school_image' ); ?>
        <div class="school">
            <img src="<?=$school_image['1x']; ?>" srcset="<?=$school_image['1x']; ?> 1x, <?=$school_image['2x']; ?> 2x" class="school__image">
            <div class="school__overlay"></div>

            <div class="school__inner">
                <div class="title school__title">
                    <div class="title__overtitle"><?=carbon_get_post_meta( $archive_page_id, 'school_overtitle' ); ?></div>
                    <h2 class="title__heading"><?=carbon_get_post_meta( $archive_page_id, 'school_title' ); ?></h2>
                </div>

                <div class="school__desc"><?=carbon_get_post_meta( $archive_page_id, 'school_description' ); ?></div>

                <div class="school__directions">
				    <?php foreach( carbon_get_post_meta( $archive_page_id, 'school_directions' ) as $direction ) : ?>
                        <a class="btn btn--outline btn--white"><?=$direction['name']; ?></a>
				    <?php endforeach; ?>
                </div>

                <a href="<?=carbon_get_post_meta( $archive_page_id, 'school_link' ); ?>" class="btn btn--white school__action"><span><?=carbon_get_post_meta( $archive_page_id, 'school_button' ); ?></span></a>
            </div>
        </div>
    </div>
</section>
