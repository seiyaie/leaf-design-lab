<?php get_header(); ?>
<!-- single news -->
<main class="p-news-single u-header-offset">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <div class="l-container">
                <div class="p-news-single__inner u-ptb">
                    <?php $posts_page_id = get_option('page_for_posts'); ?>
                    <?php if ($posts_page_id) : ?>
                        <div class="p-news-single__back">
                            <a href="<?php echo esc_url(get_permalink($posts_page_id)); ?>" class="c-button c-button--back c-button--md">back to news</a>
                        </div>
                    <?php endif; ?>
                    <article <?php post_class('p-news-single__article'); ?>>
                        <div class="p-news-single__meta">
                            <time datetime="<?php echo esc_attr(get_the_date('c')); ?>" class="c-date c-date--md">
                                <?php echo esc_html(get_the_date('Y.m.d')); ?>
                            </time>
                            <?php
                            $categories = get_the_category();
                            if (!empty($categories)) :
                            ?>
                                <span class="c-tag c-tag--md">
                                    <?php echo esc_html($categories[0]->name); ?>
                                </span>
                            <?php endif; ?>
                        </div>

                        <h1 class="p-news-single__title"><?php the_title(); ?></h1>
                        <div class="p-news-single__thumbnail">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large', [
                                    'decoding' => 'async',
                                    'loading' => 'eager',
                                ]); ?>
                            <?php else : ?>
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/common/no-image.png'); ?>" alt="" decoding="async" />
                            <?php endif; ?>
                        </div>

                        <section class="p-news-single__content">
                            <?php the_content(); ?>
                        </section>
                    </article>


                    <!-- post-nav -->
                    <div class="p-news-single__nav">
                        <?php get_template_part('template-parts/common/post-nav'); ?>
                    </div>
                </div>
            </div>

            <!-- related posts -->
            <?php get_template_part('template-parts/news/related-posts'); ?>
            <!-- /related posts -->
        <?php endwhile; ?>
    <?php endif; ?>

    <!-- cta -->
    <div class="p-news-single__cta u-ptb">
        <div class="l-container">
            <?php get_template_part('template-parts/common/cta'); ?>
        </div>
    </div>
    <!-- /cta -->
</main>
<!-- /single news -->

<?php get_footer(); ?>