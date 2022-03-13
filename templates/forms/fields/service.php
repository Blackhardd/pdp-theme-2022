<?php

$lang = pdp_get_current_language();
$service_categories = pdp_get_service_categories();

?>

<select name="service" data-icon="list">
    <option value="" selected disabled><?=__( 'Выберите категорию услуг', 'pdp' ); ?></option>
    <?php foreach( $service_categories as $category ) : ?>
        <option value="<?=$category['name']['ru']; ?>"><?=$category['name'][$lang]; ?></option>
    <?php endforeach; ?>
</select>