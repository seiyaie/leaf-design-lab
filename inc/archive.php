<?php

/**
 * ----------------------------------------
 * 一覧ページの表示件数を変更
 * ----------------------------------------
 */
function my_archive_posts_per_page($query)
{
    // 管理画面ではなく、メインクエリのみ対象
    if (is_admin() || !$query->is_main_query()) {
        return;
    }

    // 通常投稿の一覧ページ・カテゴリーページ
    if ($query->is_home() || $query->is_category()) {
        $query->set('posts_per_page', 4);
    }

    // work の投稿タイプアーカイブ
    if ($query->is_post_type_archive('work')) {
        $query->set('posts_per_page', 4);
    }

    // work_type などのカスタムタクソノミーページ
    if ($query->is_tax('work_type')) {
        $query->set('posts_per_page', 4);
    }
}
add_action('pre_get_posts', 'my_archive_posts_per_page');
