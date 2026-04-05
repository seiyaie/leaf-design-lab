<?php
$post_id = $args['post_id'] ?? get_the_ID();
$title_tag = $args['title_tag'] ?? 'h2';
$date_class = $args['date_class'] ?? 'c-date--md';
$tag_class = $args['tag_class'] ?? 'c-tag--sm';
$fallback_image = $args['fallback_image'] ?? get_template_directory_uri() . '/assets/img/common/no-image.png';
?>

<article class="c-news-post">
    <a
        href="<?php echo esc_url(get_permalink($post_id)); ?>"
        class="c-news-post__link"
        aria-label="<?php echo esc_attr(get_the_title($post_id) . 'の記事ページに移動'); ?>">

        <div class="c-news-post__thumbnail">
            <?php if (has_post_thumbnail($post_id)) : ?>
                <?php echo get_the_post_thumbnail(
                    $post_id,
                    'medium_large',
                    [
                        'alt'      => '',
                        'decoding' => 'async',
                        'loading'  => 'lazy',
                    ]
                ); ?>
            <?php else : ?>
                <img src="<?php echo esc_url($fallback_image); ?>" alt="" decoding="async" loading="lazy" />
            <?php endif; ?>
        </div>

        <div class="c-news-post__info">
            <div class="c-news-post__meta">
                <time datetime="<?php echo esc_attr(get_the_date('c', $post_id)); ?>" class="c-date <?php echo esc_attr($date_class); ?>">
                    <?php echo esc_html(get_the_date('Y.m.d', $post_id)); ?>
                </time>

                <?php
                $categories = get_the_category($post_id);
                if (!empty($categories)) :
                ?>
                    <span class="c-tag <?php echo esc_attr($tag_class); ?>">
                        <?php echo esc_html($categories[0]->name); ?>
                    </span>
                <?php endif; ?>
            </div>

            <<?php echo tag_escape($title_tag); ?> class="c-news-post__title">
                <?php echo esc_html(get_the_title($post_id)); ?>
            </<?php echo tag_escape($title_tag); ?>>

            <p class="c-news-post__text">
                <?php echo esc_html(wp_trim_words(get_the_excerpt($post_id), 40, '...')); ?>
            </p>

            <div class="c-news-post__button">
                <span class="c-button c-button--forward c-button--sm">Read More</span>
            </div>
        </div>
    </a>
</article>