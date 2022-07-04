<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if( is_home() && isset( $_GET['orderby'] ) ){ echo '<meta name="robots" content="noindex, nofollow">'; } ?>

    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
    <?php if( !is_page_template( 'links.php' ) ) : ?>
        <header class="site-header site-header--desktop">
            <div class="container">
                <div class="site-header__inner">
                    <?php get_template_part( 'templates/header/site-logo/desktop' ); ?>

                    <nav class="navigation navigation--header">
                        <?php
                        wp_nav_menu( array(
                            'theme_location'    => 'header-menu',
                            'menu_id'           => 'primary-menu',
                            'walker'            => new PDP_Core_Menu_Walker()
                        ) );
                        ?>
                    </nav>

                    <div class="header-actions">
                        <?php get_template_part( 'templates/header/salons-menu/desktop' ); ?>

                        <?php if( !is_page_template( 'booking.php' ) ) : ?>
                            <?php get_template_part( 'templates/header/booking/desktop' ); ?>
                        <?php endif; ?>
                    </div>

                    <?php get_template_part( 'templates/header/lang-switcher/desktop' ); ?>
                </div>
            </div>
        </header>

        <header class="site-header site-header--mobile">
            <div class="container">
                <div class="site-header__inner">
                    <?php get_template_part( 'templates/header/site-logo/mobile' ); ?>

                    <?php get_template_part( 'templates/header/salons-menu/mobile' ); ?>

                    <?php get_template_part( 'templates/header/navigation/mobile' ); ?>
                </div>
            </div>
        </header>
    <?php endif; ?>

    <main class="site-content">
        <?php if( function_exists('yoast_breadcrumb') && !is_front_page() && !is_page_template( array( 'thank-you.php', 'links.php' ) ) && !is_404() ) : ?>
            <section id="breadcrumbs">
                <div class="container">
                    <?php yoast_breadcrumb( '<div class="breadcrumbs">','</div>' ); ?>
                </div>
            </section>
        <?php endif; ?>