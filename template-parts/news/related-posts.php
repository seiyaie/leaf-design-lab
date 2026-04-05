<?php
$current_post_id = get_the_ID();
$category_ids = wp_get_post_categories($current_post_id);
$related_post_ids = [];
$related_query = null;

/**
 * 1. 同カテゴリーの記事を最大3件取得
 */
if (!empty($category_ids)) {
    $category_query = new WP_Query([
        'post_type'      => 'post',
        'posts_per_page' => 3,
        'post__not_in'   => [$current_post_id],
        'category__in'   => $category_ids,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'fields'         => 'ids',
    ]);

    if ($category_query->have_posts()) {
        $related_post_ids = $category_query->posts;
    }

    wp_reset_postdata();
}

/**
 * 2. 足りない分を新着記事で補う
 */
$needed_posts = 3 - count($related_post_ids);

if ($needed_posts > 0) {
    $exclude_ids = array_merge([$current_post_id], $related_post_ids);

    $latest_query = new WP_Query([
        'post_type'      => 'post',
        'posts_per_page' => $needed_posts,
        'post__not_in'   => $exclude_ids,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'fields'         => 'ids',
    ]);

    if ($latest_query->have_posts()) {
        $related_post_ids = array_merge($related_post_ids, $latest_query->posts);
    }

    wp_reset_postdata();
}

/**
 * 3. 表示用クエリを作成
 */
if (!empty($related_post_ids)) {
    $related_query = new WP_Query([
        'post_type'      => 'post',
        'post__in'       => $related_post_ids,
        'posts_per_page' => 3,
        'orderby'        => 'post__in',
    ]);
}
?>

<?php if ($related_query && $related_query->have_posts()) : ?>
    <section class="p-news-single__related u-ptb">
        <div class="l-container">
            <div class="c-section-title">
                <p class="c-section-title__en">related news</p>
                <h2 class="c-section-title__jp">関連記事</h2>
            </div>

            <div class="p-news-single__related-list u-ptb">
                <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
                    <article <?php post_class('p-news-single__related-item'); ?>>
                        <a href="<?php the_permalink(); ?>" class="p-news-single__related-item-link" aria-label="<?php echo esc_attr(get_the_title() . 'の記事に移動'); ?>">
                            <div class="p-news-single__related-item-thumbnail">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium_large', [
                                        'alt'      => '',
                                        'decoding' => 'async',
                                        'loading'  => 'lazy',
                                    ]); ?>
                                <?php else : ?>
                                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/common/no-image.png'); ?>" alt="" decoding="async" loading="lazy" />
                                <?php endif; ?>
                            </div>

                            <div class="p-news-single__related-item-info">
                                <div class="p-news-single__related-item-meta">
                                    <time datetime="<?php echo esc_attr(get_the_date('c')); ?>" class="c-date c-date--sm">
                                        <?php echo esc_html(get_the_date('Y.m.d')); ?>
                                    </time>

                                    <?php
                                    $related_categories = get_the_category();
                                    if (!empty($related_categories)) :
                                    ?>
                                        <span class="c-tag c-tag--sm">
                                            <?php echo esc_html($related_categories[0]->name); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <h3 class="p-news-single__related-item-title"><?php the_title(); ?></h3>
                            </div>
                        </a>
                    </article>
                <?php endwhile; ?>
            </div>

            <div class="p-news-single__back">
                <?php if ($posts_page_id = get_option('page_for_posts')) : ?>
                    <a href="<?php echo esc_url(get_permalink($posts_page_id)); ?>" class="c-button c-button--back c-button--md">
                        back to news
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php wp_reset_postdata(); ?>
<?php endif; ?>