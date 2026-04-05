<?php
$title_tag = $args['title_tag'] ?? 'h2';
$title_size = $args['title_size'] ?? 'md';
$tag_size = $args['tag_size'] ?? 'sm';
?>

<article class="c-works-post">
    <a href="<?php the_permalink(); ?>" class="c-works-post__link" aria-label="<?php echo esc_attr(get_the_title() . 'の詳細ページに移動'); ?>">
        <div class="c-works-post__thumbnail">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('medium_large', [
                    'alt'      => '',
                    'decoding' => 'async',
                    'loading'  => 'lazy',
                ]); ?>
            <?php else : ?>
                <img
                    src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/common/no-image.png'); ?>"
                    alt=""
                    decoding="async"
                    loading="lazy" />
            <?php endif; ?>
        </div>

        <div class="c-works-post__desc">
            <?php $works_subtitle = get_field('works_subtitle'); ?>
            <?php if ($works_subtitle) : ?>
                <p class="c-works-post__subtitle"><?php echo esc_html($works_subtitle); ?></p>
            <?php endif; ?>

            <<?php echo tag_escape($title_tag); ?> class="c-works-post__title c-works-post__title--<?php echo esc_attr($title_size); ?>">
                <?php the_title(); ?>
            </<?php echo tag_escape($title_tag); ?>>
        </div>

        <?php
        $works_type = get_the_terms(get_the_ID(), 'work_type');
        ?>

        <?php if (!empty($works_type) && !is_wp_error($works_type)) : ?>
            <div class="c-works-post__category">
                <span class="c-tag c-tag--<?php echo esc_attr($tag_size); ?>">
                    <?php echo esc_html($works_type[0]->name); ?>
                </span>
            </div>
        <?php endif; ?>
    </a>
</article>