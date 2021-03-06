<?php

$telegram = carbon_get_theme_option( 'telegram' );
$instagram = carbon_get_theme_option( 'instagram' );
$facebook = carbon_get_theme_option( 'facebook' );
$youtube = carbon_get_theme_option( 'youtube' );

?>


<div class="post-toolbar single-post__toolbar">
	<ul>
		<?php if( false ) : ?>
			<li><a href="#"><svg width="20" height="20" fill="none"><path d="m20 8.4-.3.5c-.3.2-.6.3-1 .1-.4-.1-.5-.5-.5-.9v-5l-.2.2-9 9c-.3.3-.6.5-1 .4a1 1 0 0 1-.5-1.4l.2-.3 9-9 .1-.1H12a1 1 0 0 1-.7-.3 1 1 0 0 1 .2-1.5l.2-.1h7.7c.3.1.6.4.7.7v7.7Z"/><path d="M1.8 5.5v12.7h12.7V10c0-.5.3-.8.7-1a1 1 0 0 1 1.2.8v9.2c0 .4-.3.7-.7.9H1c-.6 0-1-.4-1-1V4.6c0-.6.4-1 1-1h9c.5 0 .9.4 1 1 0 .4-.5.8-1 .9H1.8Z"/></svg></a></li>
		<?php endif; ?>

		<?php if( $telegram ) : ?>
			<li><a href="<?=$telegram; ?>" target="_blank"><svg width="20" height="17" fill="none"><path d="M0 8.13c0-.03 0-.06.03-.1.04-.15.1-.32.26-.41.1-.07.2-.13.3-.16.16-.1.36-.17.52-.26l.72-.33.88-.38.68-.3c.26-.09.5-.22.75-.32.26-.1.5-.22.75-.32l.72-.32.88-.39.95-.39.68-.29.88-.38.92-.4c.36-.15.75-.31 1.1-.48.27-.12.56-.22.82-.32L13.21 2l1.02-.42 1.89-.77 1.04-.39A9.1 9.1 0 0 1 18.5.03c.23-.03.42-.03.62-.03.23.03.46.1.62.29.1.1.16.23.2.36.03.16.06.32.06.45v.26l-.1.58-.06.55c-.04.19-.04.35-.07.54-.03.17-.03.33-.06.52l-.1.58-.1.78c-.03.25-.06.54-.13.8-.03.26-.07.52-.13.75l-.2 1.19-.2 1.1c-.06.42-.16.84-.22 1.29l-.2 1.06c-.1.49-.16.97-.26 1.46-.1.51-.16 1.03-.26 1.51l-.2.97c-.06.3-.19.55-.35.8a1.18 1.18 0 0 1-.95.56c-.3 0-.55-.07-.81-.17-.23-.1-.46-.19-.66-.35-.36-.26-.75-.52-1.14-.74l-.85-.55-1.2-.8c-.36-.27-.75-.5-1.11-.75-.36-.26-.75-.48-1.11-.74l-.4-.3c-.16-.12-.29-.25-.39-.45a.77.77 0 0 1-.03-.8c.07-.16.2-.32.3-.45.1-.13.2-.23.32-.33.13-.13.3-.26.43-.38l.2-.2c.09-.1.19-.2.32-.29.2-.2.39-.39.62-.58l.39-.39.49-.45.49-.45.58-.58.27-.26.45-.45c.17-.13.3-.3.46-.42.26-.26.55-.52.82-.8l.13-.14c.06-.06.1-.13.06-.22 0-.04 0-.07-.03-.1-.03-.06-.07-.13-.13-.16-.1-.1-.23-.1-.36-.03l-.3.16c-.22.13-.42.29-.65.42l-1.17.77c-.36.23-.72.45-1.08.71l-.94.62c-.3.19-.56.38-.85.54l-1.21.81c-.42.3-.82.55-1.24.84-.2.13-.36.26-.55.36l-.62.29c-.3.1-.56.16-.85.19-.2.03-.43.03-.62.03-.4-.03-.75-.1-1.14-.22-.36-.13-.72-.23-1.08-.33-.26-.1-.52-.16-.82-.26L.5 8.71a.86.86 0 0 1-.3-.16.53.53 0 0 1-.22-.35c0-.03 0-.07-.04-.07.07.04.07 0 .07 0Z" /></svg></a></li>
		<?php endif; ?>

		<?php if( $instagram ) : ?>
			<li><a href="<?=$instagram; ?>" target="_blank"><svg width="20" height="20" fill="none"><path d="M9.98 0c1.55 0 3.1-.03 4.63 0a5.3 5.3 0 0 1 4.63 2.65c.54.85.76 1.8.76 2.8v9.07a5.43 5.43 0 0 1-5.35 5.45H5.39A5.44 5.44 0 0 1 0 14.52V5.48A5.4 5.4 0 0 1 5.42 0h4.56Zm.04 1.83H5.54c-.25 0-.5.03-.75.06a3.62 3.62 0 0 0-2.96 3.62v9.01c0 .25.03.5.06.76a3.62 3.62 0 0 0 3.62 2.93h8.98c.25 0 .5-.04.72-.07a3.62 3.62 0 0 0 2.96-3.62v-9c0-.7-.15-1.36-.56-1.96a3.52 3.52 0 0 0-3.12-1.7c-1.48-.03-3-.03-4.47-.03Z"/><path d="M14.83 9.99a4.8 4.8 0 0 1-4.78 4.78 4.78 4.78 0 1 1 4.79-4.79Zm-4.81 2.83a2.82 2.82 0 0 0 2.86-2.8 2.86 2.86 0 1 0-2.86 2.8ZM16.22 4.76c0 .53-.4.94-.94.94a.95.95 0 0 1-.98-.94c0-.54.4-.95.94-.95.54 0 .98.41.98.95Z"/></svg></a></li>
		<?php endif; ?>

		<?php if( $facebook ) : ?>
			<li><a href="<?=$facebook; ?>" target="_blank"><svg width="10" height="20" fill="none"><path d="M7.39 0h.22a8.83 8.83 0 0 1 1.41.07c.23 0 .49.03.72.07h.13c.03 0 .06.03.06.06V3.27c0 .03-.03.06-.06.06H7.94c-.16 0-.36.04-.52.07a1 1 0 0 0-.43.2 1.1 1.1 0 0 0-.42.62c-.07.17-.07.34-.1.5v2.52c0 .04.03.07.07.07H9.74c.1 0 .13.04.1.14-.04.34-.1.71-.13 1.05-.04.38-.1.79-.13 1.16l-.14 1.09v.03c0 .07-.03.07-.1.07H6.58c-.03 0-.07.03-.07.07v9.05H2.97v-9.05c0-.04-.03-.04-.1-.07H.1c-.07 0-.1 0-.13-.07v-3.4c.03-.07.06-.07.13-.07H2.84c.04 0 .07-.03.07-.07V4.35a5.12 5.12 0 0 1 .56-2.24c.29-.55.68-1.02 1.17-1.36C5.2.37 5.85.14 6.5.07c.36-.04.6-.07.85-.07h.04Z" /></svg></a></li>
		<?php endif; ?>

		<?php if( $youtube ) : ?>
			<li><a href="<?=$youtube; ?>" target="_blank"><svg width="20" height="20" fill="none"><path d="M19 3.7c-.5-1-1.1-1.1-2.3-1.2a145.5 145.5 0 0 0-13.6 0c-1.2 0-1.8.2-2.4 1.2-.5 1-.8 2.6-.8 5.5s.3 4.5.8 5.5c.6 1 1.2 1.1 2.4 1.2a164.4 164.4 0 0 0 13.6 0c1.2 0 1.8-.3 2.3-1.2.6-1 .9-2.6.9-5.5s-.3-4.5-.9-5.5ZM7.4 12.9V5.5l6.2 3.7-6.2 3.7Z" /></svg></a></li>
		<?php endif; ?>
	</ul>
</div>