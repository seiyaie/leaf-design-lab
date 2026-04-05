<?php
$work_type_terms = get_terms([
    'taxonomy'   => 'work_type',
    'hide_empty' => true,
]);

$current_term = $args['current_term'] ?? null;
$is_archive   = $args['is_archive'] ?? false;
?>

<?php if (!empty($work_type_terms) && !is_wp_error($work_type_terms)) : ?>
    <ul class="c-tag-list">
        <li class="c-tag-list__item">
            <a
                href="<?php echo esc_url(get_post_type_archive_link('work')); ?>"
                class="c-tag c-tag--md<?php echo $is_archive ? ' is-current' : ''; ?>"
                <?php echo $is_archive ? 'aria-current="page"' : ''; ?>>
                全て
            </a>
        </li>

        <?php foreach ($work_type_terms as $work_type_term) : ?>
            <?php
            $is_current = $current_term && isset($current_term->term_id) && $current_term->term_id === $work_type_term->term_id;
            ?>
            <li class="c-tag-list__item">
                <a
                    href="<?php echo esc_url(get_term_link($work_type_term)); ?>"
                    class="c-tag c-tag--md<?php echo $is_current ? ' is-current' : ''; ?>"
                    <?php echo $is_current ? 'aria-current="page"' : ''; ?>>
                    <?php echo esc_html($work_type_term->name); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>