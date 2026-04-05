<?php
/**
 * ----------------------------------------
 * Contact Form 7 の自動整形を無効化する
 * ----------------------------------------
 * CF7が自動で <p> や <br> を挿入しないようにする
 */
function my_wpcf7_autop()
{
    return false;
}
add_filter('wpcf7_autop_or_not', "my_wpcf7_autop");

/**
 * ----------------------------------------
 * Contact Form 7 内でショートコードを有効化
 * ----------------------------------------
 */
function my_cf7_do_shortcode($content)
{
    return do_shortcode($content);
}
add_filter('wpcf7_form_elements', 'my_cf7_do_shortcode');

/**
 * ----------------------------------------
 * プライバシーポリシーリンクのショートコード
 * ----------------------------------------
 */
function my_privacy_policy_link_shortcode()
{
    $url = get_privacy_policy_url();

    // プライバシーポリシーページが未設定なら何も返さない
    if (empty($url)) {
        return '';
    }

    return '<a href="' . esc_url($url) . '" class="p-contact__form-privacy-link" target="_blank" rel="noopener noreferrer">プライバシーポリシー</a>';
}
add_shortcode('privacy_policy_link', 'my_privacy_policy_link_shortcode');
