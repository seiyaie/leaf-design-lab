<?php
/**
 * ----------------------------------------
 * テーマの基本設定
 * ----------------------------------------
 * - <title> タグを WordPress に管理させる
 * - アイキャッチ画像を有効化する
 * - メニューの登録を行う
 */
function my_theme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    register_nav_menus([
        'header-menu' => 'ヘッダーメニュー',
        'footer-menu' => 'フッターメニュー',
        'footer-sns' => 'フッターSNSメニュー',
    ]);
}
add_action('after_setup_theme', 'my_theme_setup');

/**
 * ----------------------------------------
 * titleの区切り文字を変更
 * ----------------------------------------
 */
function my_document_title_separator($separator)
{
    return '|';
}
add_filter('document_title_separator', 'my_document_title_separator');
