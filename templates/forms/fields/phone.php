<?php

wp_enqueue_script( 'imask' );

?>

<div class="input input--icon input--phone">
    <div class="input__wrap">
        <input type="tel" name="phone" placeholder="+38 044 000 00 00<?=( $args['required'] ) ? '*' : ''; ?>" <?=( $args['required'] ) ? 'required' : ''; ?> <?=( $args['disabled'] ) ? 'disabled' : ''; ?>>

        <div class="icon">
            <svg width="12" height="12" fill="none">
                <path d="M11.73 9.48 9.88 7.63a.97.97 0 0 0-1.36.03l-.94.93-.18-.1a9.3 9.3 0 0 1-2.25-1.63c-.85-.85-1.3-1.66-1.63-2.25l-.1-.18.63-.62.3-.31c.4-.38.4-1 .03-1.36L2.53.28a.97.97 0 0 0-1.36.03L.65.83l.01.02a3.02 3.02 0 0 0-.62 1.53c-.25 2.03.68 3.88 3.2 6.4 3.47 3.47 6.28 3.21 6.4 3.2a3.13 3.13 0 0 0 1.53-.63v.01l.54-.51c.38-.39.39-1 .02-1.37Z" />
            </svg>
        </div>
    </div>
</div>