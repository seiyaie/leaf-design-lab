<?php
$categories = get_categories([
    'hide_empty' => true,
]);

$current_category = $args['current_category'] ?? null;
$is_home = $args['is_home'] ?? false;
$posts_page_id = get_option('page_for_posts');
?>

<?php if (!empty($categories)) : ?>
    <ul class="c-tag-list">
        <?php if ($posts_page_id) : ?>
            <li class="c-tag-list__item">
                <a
                    href="<?php echo esc_url(get_permalink($posts_page_id)); ?>"
                    class="c-tag c-tag--md<?php echo $is_home ? ' is-current' : ''; ?>"
                    <?php echo $is_home ? 'aria-current="page"' : ''; ?>>
                    全て
                </a>
            </li>
        <?php endif; ?>

        <?php foreach ($categories as $category) : ?>
            <?php
            $is_current = isset($current_category->term_id) && $current_category->term_id === $category->term_id;
            ?>
            <li class="c-tag-list__item">
                <a
                    href="<?php echo esc_url(get_category_link($category->term_id)); ?>"
                    class="c-tag c-tag--md<?php echo $is_current ? ' is-current' : ''; ?>"
                    <?php echo $is_current ? 'aria-current="page"' : ''; ?>>
                    <?php echo esc_html($category->name); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>