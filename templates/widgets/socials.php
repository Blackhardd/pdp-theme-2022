<?php
$socials_list = array(
    array(
        'title' => 'mail',
        'url'   => carbon_get_theme_option( 'email' ),
        'icon'  => '
            <svg width="16" height="16" viewBox="0 0 24 24"><path d="M23 5.8C22.9 4.3 21.6 3 20 3H4C2.4 3 1.1 4.3 1 5.8V18c0 1.7 1.3 3 3 3h16c1.7 0 3-1.3 3-3V6v-.2zM4 5h16c.4 0 .7.2.9.6L12 11.8 3.1 5.6c.2-.4.5-.6.9-.6zm17 13c0 .5-.5 1-1 1H4c-.5 0-1-.5-1-1V7.9l8.4 5.9c.2.1.4.2.6.2s.4-.1.6-.2L21 7.9V18z"/></svg>
        '
    ),
    array(
        'title' => 'facebook',
        'url'   => carbon_get_theme_option( 'facebook' ),
        'icon'  => '
            <svg width="28" height="28" fill="none"><path d="M24.5 0h-21C1.5 0 0 1.6 0 3.5v21c0 2 1.6 3.5 3.5 3.5H14v-9.6h-3.5V14H14v-3.5c0-2.9 2.4-5.3 5.3-5.3h3.4v4.4H21c-1 0-1.8 0-1.8.9V14h4.4L22 18.4h-2.6V28h5.2c2 0 3.5-1.6 3.5-3.5v-21c0-2-1.6-3.5-3.5-3.5z" fill="#0E0D0A"/></svg>
        '
    ),
    array(
        'title' => 'instagram',
        'url'   => carbon_get_theme_option( 'instagram' ),
        'icon'  => '
            <svg width="29" height="28" fill="none"><g clip-path="url(#clip0)" fill="#0E0D0A"><path d="M19.3 0H8.8C4 0 .1 4 .1 8.8v10.4C0 24.1 4 28 8.8 28h10.5c4.8 0 8.8-4 8.8-8.8V8.8C28 3.8 24 0 19.3 0zm6.1 19.3c0 3.3-2.7 6-6 6H8.7a6.1 6.1 0 01-6.1-6V8.7c0-3.3 2.7-6 6.1-6h10.5c3.4 0 6.1 2.7 6.1 6v10.6z"/><path d="M14 7a7 7 0 100 14 7 7 0 000-14zm0 11.4a4.4 4.4 0 110-8.8 4.4 4.4 0 010 8.8zM21.6 7.4a1 1 0 100-1.9 1 1 0 000 2z"/></g><defs><clipPath id="clip0"><path fill="#fff" d="M0 0h28v28H0z"/></clipPath></defs></svg>
        '
    ),
    array(
        'title' => 'telegram',
        'url'   => carbon_get_theme_option( 'telegram' ),
        'icon'  => '
            <svg width="29" height="28" fill="none"><g clip-path="url(#clip0)"><path d="M11.6 17.7l-.5 6.5c.7 0 1-.3 1.3-.6l3.1-3 6.5 4.7c1.2.7 2 .4 2.3-1l4.2-19.8c.4-1.8-.6-2.5-1.8-2L2 12c-1.7.6-1.7 1.6-.3 2L8 16l14.7-9.3c.7-.4 1.3-.2.8.3L11.6 17.7z" fill="#0E0D0A"/></g><defs><clipPath id="clip0"><path fill="#fff" transform="translate(.6)" d="M0 0h28v28H0z"/></clipPath></defs></svg>
        '
    ),
    array(
        'title' => 'youtube',
        'url'   => carbon_get_theme_option( 'youtube' ),
        'icon'  => '
            <svg width="29" height="28" fill="none"><g clip-path="url(#clip0)"><path d="M27.6 6.2C27 5 26.1 4.6 24.4 4.5a201.6 201.6 0 00-19.1 0C3.6 4.6 2.8 5 2 6.2 1.2 7.6.8 10 .8 14c0 4 .4 6.4 1.2 7.8.8 1.3 1.6 1.6 3.3 1.7a227.7 227.7 0 0019 0c1.8-.1 2.6-.4 3.3-1.7.8-1.4 1.2-3.7 1.2-7.8s-.4-6.4-1.2-7.8zm-16.3 13V8.8l8.8 5.2-8.8 5.3z" fill="#0E0D0A"/></g><defs><clipPath id="clip0"><path fill="#fff" transform="translate(.8)" d="M0 0h28v28H0z"/></clipPath></defs></svg>
        '
    )
); ?>

<div class="socials">
    <ul class="socials__list">
        <?php
        foreach( $socials_list as $socials_item ){
            if( !empty( $socials_item['url'] ) ){ ?>
                <li class="socials__item socials__item_<?=$socials_item['title']; ?>">
                    <a href="<?php if( $socials_item['title'] == 'mail' ){ echo 'mailto:'; } ?><?=$socials_item['url']; ?>" class="socials__itemLink" target="_blank"><?=$socials_item['icon']; ?></a>
                </li>
                <?php
            }
        } ?>
    </ul>
</div>