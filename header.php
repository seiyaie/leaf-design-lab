<!DOCTYPE html>
<html <?php language_attributes(); ?>>


<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="robots" content="noindex, nofollow">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <!-- header -->
    <header class="l-header js-header">
        <div class="l-header__inner">
            <div class="c-logo c-logo--header">
                <?php get_template_part('template-parts/common/site-logo'); ?>
            </div>

            <dialog class="l-header__menu js-header__menu" aria-label="メニュー">
                <div class="l-header__menu-head">
                    <div class="c-logo c-logo--header">
                        <?php get_template_part('template-parts/common/site-logo'); ?>
                    </div>
                    <button class="l-header__menu-close-button js-header__menu-close-button" aria-label="メニューを閉じる">
                        <span class="l-header__menu-icon l-header__menu-icon--close"></span>
                    </button>
                </div>
                <nav class="l-header__menu-nav js-header__menu-nav" aria-label="グローバルナビゲーション">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'header-menu',
                        'menu_class'     => 'l-header__menu-list js-hamburger__menu-list',
                        'container'      => false,
                        'fallback_cb'    => false,
                    ]);
                    ?>
                </nav>
            </dialog>

            <button class="l-header__menu-open-button js-header__menu-open-button" aria-label="メニューを開く">
                <span class="l-header__menu-icon l-header__menu-icon--open"></span>
            </button>
        </div>
    </header>
    <!-- /header -->