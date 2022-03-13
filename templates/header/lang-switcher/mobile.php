<?php

if( function_exists( 'pll_the_languages' ) ) :
	$langs = pll_the_languages( array( 'raw' => true ) );
	$current_lang = pll_current_language(); ?>

	<div class="lang-switcher lang-switcher--mobile">
		<?php foreach( $langs as $lang ) : ?>
			<a <?=$lang['slug'] !== $current_lang ? "href='{$lang['url']}'" : ''; ?>><?=( $lang['slug'] === 'uk' ) ? 'ua' : $lang['slug']; ?></a>
		<?php endforeach; ?>
	</div>

<?php

endif;
