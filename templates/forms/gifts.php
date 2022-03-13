<?php

wp_enqueue_script( 'forms' );

?>

<form class="form form--gifts">
    <fieldset>
        <div class="form__fields">
            <div class="form-row form-row--one">
                <div class="form-col">
	                <?php pdp_form_field( 'name', true ); ?>
                </div>
            </div>

            <div class="form-row form-row--one">
                <div class="form-col">
			        <?php pdp_form_field( 'email', true ); ?>
                </div>
            </div>

            <div class="form-row form-row--one">
                <div class="form-col">
			        <?php pdp_form_field( 'phone', true ); ?>
                </div>
            </div>

            <div class="form-row form-row--one">
                <div class="form-col">
                    <div class="inputs-group inputs-group--gifts">
                        <select name="card_type">
                            <option value="" disabled selected><?=__( 'Тип сертификата', 'pdp' ); ?></option>

	                        <?php foreach( $args['card_options'] as $option ) : ?>
                                <option value="<?=$option; ?>"><?=$option; ?></option>
	                        <?php endforeach; ?>
                        </select>

                        <select name="card_qty">
                            <?php for( $i = 0; $i <= 5; $i++ ) : ?>
                                <option value="<?=$i; ?>" <?=$i === 0 ? 'selected' : ''; ?>><?=$i; ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-row form-row--one">
                <div class="form-col">
                    <div class="inputs-group inputs-group--gifts">
                        <select name="box_type">
                            <option value="" disabled selected><?=__( 'Тип бокса', 'pdp' ); ?></option>

                            <?php foreach( $args['box_options'] as $option ) : ?>
                                <option value="<?=$option; ?>"><?=$option; ?></option>
                            <?php endforeach; ?>
                        </select>

                        <select name="box_qty">
	                        <?php for( $i = 0; $i <= 5; $i++ ) : ?>
                                <option value="<?=$i; ?>" <?=$i === 0 ? 'selected' : ''; ?>><?=$i; ?></option>
	                        <?php endfor; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>

    <div class="form__response"></div>

    <div class="form__actions">
        <button type="submit" class="btn"><span><?=__( 'Заказать', 'pdp' ); ?></span></button>
    </div>

    <input type="hidden" name="action" value="gifts_order">
	<?php wp_nonce_field( 'pdp_gifts_order_nonce', 'pdp_nonce' ); ?>
	<?php pdp_utm_fields(); ?>
</form>