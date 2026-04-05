<?php
/**
 * ----------------------------------------
 * メニューリンクにクラスを付与
 * ----------------------------------------
 */
function my_nav_menu_link_attributes($atts, $item, $args)
{
    if ($args->theme_location === 'header-menu') {
        $atts['class'] = 'l-header__menu-link u-text-hover js-hamburger__menu-link';
    }

    if ($args->theme_location === 'footer-menu' || $args->theme_location === 'footer-sns') {
        $atts['class'] = 'l-footer__group-link';
    }

    return $atts;
}
add_filter('nav_menu_link_attributes', 'my_nav_menu_link_attributes', 10, 3);
