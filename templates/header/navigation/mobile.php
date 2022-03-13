<nav class="navigation navigation--mobile">
	<button class="btn btn--simple-icon navigation__button">
		<div class="burger">
			<div></div>
			<div></div>
			<div></div>
		</div>
	</button>

	<div class="navigation__panel">
		<?php get_template_part( 'templates/header/lang-switcher/mobile' ); ?>

        <?php
        wp_nav_menu( array(
            'theme_location'    => 'header-menu',
            'menu_id'           => 'primary-menu',
            'walker'            => new PDP_Core_Mobile_Menu_Walker()
        ) );
        ?>

        <div class="header-cart header-cart--mobile">
            <a href="#modal-booking-cart" class="btn btn--outline header-cart__button">
                <span><?=__( 'Запись', 'pdp' ); ?></span>

                <div class="header-cart__counter">0</div>
            </a>
        </div>
	</div>
</nav>