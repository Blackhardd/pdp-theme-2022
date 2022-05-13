<?php

if( function_exists( 'pll_the_languages' ) && count( pll_languages_list() ) > 1 ) :
	$langs = pll_the_languages( array( 'raw' => true ) );
	$current_lang = pll_current_language(); ?>

	<div class="lang-switcher lang-switcher--desktop">
		<div class="lang-switcher__current">
			<?=( $current_lang == 'uk' ) ? 'ua' : $current_lang; ?>
			<svg width="14" height="9" fill="none">
				<path d="M13 1L7 7 1 1" stroke="#111" stroke-width="2"/>
			</svg>
		</div>

		<ul class="lang-switcher__list">
			<?php foreach( $langs as $lang ) : ?>
				<?php if( $lang['slug'] !== $current_lang ) : ?>
					<li class="lang-switcher__item"><a href="<?=$lang['url']; ?>"><?=( $lang['slug'] == 'uk' ) ? 'ua' : $lang['slug']; ?></a></li>
				<?php endif; ?>
			<?php endforeach; ?>
		</ul>
	</div>
<?php

endif;