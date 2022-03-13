<?php

$salons = pdp_get_salons_data();

?>

<select name="salon" data-icon="location">
    <?php if( !is_singular( 'salon' ) ) : ?>
        <option value="" disabled selected><?=__( 'Выберите салон', 'pdp' ); ?></option>
    <?php endif; ?>

    <?php foreach( $salons as $salon ) :
        if( $salon['display_in_forms'] ) : ?>
            <option value="<?=$salon['id']; ?>" <?=get_the_ID() === $salon['id'] ? 'selected' : ''; ?>><?="{$salon['city']}, {$salon['name']}"; ?></option>
    <?php
        endif;
    endforeach; ?>
</select>