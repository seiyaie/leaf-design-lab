<?php get_header(); ?>

<main class="p-news u-header-offset">
    <div class="l-container">
        <div class="p-news__inner u-ptb">
            <div class="c-section-title">
                <p class="c-section-title__en">latest news</p>
                <h1 class="c-section-title__jp">お知らせ</h1>
            </div>

            <!-- filter -->
            <div class="p-news__tag-list">
                <?php
                get_template_part('template-parts/news/filter', null, [
                    'is_home' => true,
                    'current_category' => null,
                ]);
                ?>
            </div>
            <!-- /filter -->

            <!-- news list -->
            <div class="p-news__list u-ptb">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php
                        get_template_part('template-parts/news/post', null, [
                            'post_id'        => get_the_ID(),
                            'title_tag'      => 'h2',
                            'date_class'     => 'c-date--md',
                            'tag_class'      => 'c-tag--sm',
                            'fallback_image' => get_template_directory_uri() . '/assets/img/common/no-image.png',
                        ]);
                        ?>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p class="c-empty-message">現在、お知らせはありません。</p>
                <?php endif; ?>
            </div>
            <!-- /news list -->

            <!-- pagination -->
            <?php get_template_part('template-parts/common/pagination'); ?>
            <!-- /pagination -->

        </div>
    </div>

    <!-- cta -->
    <div class="p-news__cta u-ptb">
        <div class="l-container">
            <?php get_template_part('template-parts/common/cta'); ?>
        </div>
    </div>
    <!-- /cta -->
</main>
<!-- /news -->
<?php get_footer(); ?>