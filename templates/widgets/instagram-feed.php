<?php


$items = pdp_get_instagram_feed_items();

if( $items ) : ?>
    <div class="instagram-feed">
        <?php foreach( $items as $key => $item ) : ?>
            <?php

            $image1x = wp_get_attachment_image_src( $item['attachment_id'], 'instagram-card-1x' );
            $image2x = wp_get_attachment_image_src( $item['attachment_id'], 'instagram-card-2x' );

            ?>
            <div class="instagram-media-card">
                <a href="<?=$item['url']; ?>" target="_blank">
                    <?php if( $item['type'] !== 'IMAGE' ) : ?>
                        <div class="instagram-media-card__icon">
                            <?php switch( $item['type'] ){
                                case 'CAROUSEL_ALBUM': ?>
                                    <svg height="22" viewBox="0 0 48 48" width="22" role="img" aria-label="Кольцевая галерея"><path d="M34.8 29.7V11c0-2.9-2.3-5.2-5.2-5.2H11c-2.9 0-5.2 2.3-5.2 5.2v18.7c0 2.9 2.3 5.2 5.2 5.2h18.7c2.8-.1 5.1-2.4 5.1-5.2zM39.2 15v16.1c0 4.5-3.7 8.2-8.2 8.2H14.9c-.6 0-.9.7-.5 1.1 1 1.1 2.4 1.8 4.1 1.8h13.4c5.7 0 10.3-4.6 10.3-10.3V18.5c0-1.6-.7-3.1-1.8-4.1-.5-.4-1.2 0-1.2.6z"></path></svg>
                                    <?php break;
                                case 'VIDEO': ?>
                                    <svg height="18" viewBox="0 0 24 24" width="18" role="img" aria-label="Видео"><path d="M5.888 22.5a3.46 3.46 0 01-1.721-.46l-.003-.002a3.451 3.451 0 01-1.72-2.982V4.943a3.445 3.445 0 015.163-2.987l12.226 7.059a3.444 3.444 0 01-.001 5.967l-12.22 7.056a3.462 3.462 0 01-1.724.462z"></path></svg>
                                    <?php break;
                            } ?>
                        </div>
                    <?php endif; ?>

                    <img data-src="<?=$image1x['0']; ?>" data-srcset="<?=$image1x['0']; ?> 1x, <?=$image2x['0']; ?> 2x" class="lazyload">
                </a>
            </div>
        <?php endforeach; ?>
    </div>
<?php else : ?>
    <img data-src="<?=pdp_get_theme_image( 'home/instagram/grid-1x.jpg' ); ?>" data-srcset="<?=pdp_get_theme_image( 'home/instagram/grid-1x.jpg' ); ?> 1x, <?=pdp_get_theme_image( 'home/instagram/grid-2x.jpg' ); ?> 2x" class="lazyload">
<?php endif; ?>