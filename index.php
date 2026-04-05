<!-- index.php -->
<?php get_header(); ?>

<main class="p-default-archive u-header-offset">
    <div class="l-container-s">
        <div class="p-default-archive__inner u-ptb">
            <div class="c-section-title">
                <p class="c-section-title__en">archive</p>
                <h1 class="c-section-title__jp">一覧</h1>
            </div>

            <!-- archive list -->
            <div class="p-default-archive__list">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <article <?php post_class('p-default-archive__item'); ?>>
                            <a href="<?php the_permalink(); ?>" class="p-default-archive__link">
                                <time datetime="<?php echo esc_attr(get_the_date('c')); ?>" class="c-date c-date--md">
                                    <?php echo esc_html(get_the_date('Y.m.d')); ?>
                                </time>
                                <h2 class="p-default-archive__title"><?php the_title(); ?></h2>
                            </a>
                        </article>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p class="p-default-archive__empty">投稿が見つかりませんでした。</p>
                <?php endif; ?>
            </div>
            <!-- /archive list -->

            <!-- pagination -->
            <?php the_posts_pagination(); ?>
            <!-- /pagination -->
        </div>
    </div>
</main>

<?php get_footer(); ?>