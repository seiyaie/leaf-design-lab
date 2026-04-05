<?php
$left_post  = get_next_post(false);      // 一覧で左側にある投稿
$right_post = get_previous_post(false);  // 一覧で右側にある投稿
?>

<nav class="c-post-nav" aria-label="<?php echo esc_attr($args['aria_label'] ?? '前後の記事への移動'); ?>">
    <?php if ($left_post) : ?>
        <a href="<?php echo esc_url(get_permalink($left_post->ID)); ?>" class="c-post-nav__button c-post-nav__button--prev">
            <span class="c-post-nav__icon c-post-nav__icon--prev"></span>
            <span class="c-post-nav__meta"><?php echo esc_html(get_the_title($left_post->ID)); ?></span>
        </a>
    <?php endif; ?>

    <?php if ($right_post) : ?>
        <a href="<?php echo esc_url(get_permalink($right_post->ID)); ?>" class="c-post-nav__button c-post-nav__button--next">
            <span class="c-post-nav__meta"><?php echo esc_html(get_the_title($right_post->ID)); ?></span>
            <span class="c-post-nav__icon c-post-nav__icon--next"></span>
        </a>
    <?php endif; ?>
</nav>