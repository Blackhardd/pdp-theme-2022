<?php

$items = pdp_get_instagram_feed_items();

?>

<div class="instagram-feed">
	<?php foreach( $items as $key => $item ) : ?>
        <?php

        $image1x = wp_get_attachment_image_src( $item['attachment_id'], 'instagram-card-1x' );
        $image2x = wp_get_attachment_image_src( $item['attachment_id'], 'instagram-card-2x' );

        ?>
        <div class="instagram-media-card">
            <a href="<?=$item['url']; ?>" target="_blank">
                <img data-src="<?=$image1x['0']; ?>" data-srcset="<?=$image1x['0']; ?> 1x, <?=$image2x['0']; ?> 2x" class="lazyload">
            </a>
        </div>
	<?php endforeach; ?>
</div>
