<div class="input input--icon input--name">
    <div class="input__wrap">
        <input type="text" name="name" placeholder="<?=__( 'Ваше имя', 'pdp' ); ?><?=( $args['required'] ) ? '*' : ''; ?>" <?=( $args['required'] ) ? 'required' : ''; ?>>

        <div class="icon input__icon">
            <svg width="12" height="12" fill="none">
                <path d="M9.29 8.04C7.79 7.5 7.3 7.77 7.3 6.8l.01-.22h.07c1.03.07 2.02.14 2.24-.01.36-.25-.86-.63-.86-3.81C8.76 1.15 7.7 0 6.09 0h-.17C4.3 0 3.25 1.14 3.25 2.75c0 3.18-1.22 3.56-.87 3.8.22.16 1.21.1 2.24.02h.07l.01.22c0 .98-.48.7-1.98 1.25C1.2 8.6.77 9.14.77 9.52V12H11.23V9.52c0-.38-.43-.93-1.94-1.48Z" />
            </svg>
        </div>
    </div>
</div>