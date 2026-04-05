<?php get_header(); ?>

<!-- single work -->
<main class="p-works-single u-header-offset">
    <div class="l-container">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="p-works-single__inner u-ptb">
                    <div class="p-works-single__back">
                        <a href="<?php echo esc_url(get_post_type_archive_link('work')); ?>" class="c-button c-button--back c-button--md">
                            back to list
                        </a>
                    </div>
                    <article class="p-works-single__article">
                        <div class="p-works-single__head">
                            <div class="p-works-single__title-wrapper">
                                <?php $works_subtitle = get_field('works_subtitle'); ?>
                                <?php if ($works_subtitle) : ?>
                                    <p class="p-works-single__subtitle">
                                        <?php echo esc_html($works_subtitle); ?>
                                    </p>
                                <?php endif; ?>

                                <h1 class="p-works-single__title"><?php the_title(); ?></h1>
                            </div>

                            <?php
                            $work_types = get_the_terms(get_the_ID(), 'work_type');
                            ?>

                            <?php if (!empty($work_types) && !is_wp_error($work_types)) : ?>
                                <div class="p-works-single__category">
                                    <span class="c-tag c-tag--md">
                                        <?php echo esc_html($work_types[0]->name); ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="p-works-single__thumbnail">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('full', [
                                    'decoding' => 'async',
                                    'loading'  => 'eager',
                                ]); ?>
                            <?php else : ?>
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/common/no-image.png'); ?>" alt="" decoding="async" loading="eager" />
                            <?php endif; ?>
                        </div>

                        <?php
                        $works_client = get_field('works_client');
                        $works_date = get_field('works_date');
                        $work_technologies = get_the_terms(get_the_ID(), 'work_technology');
                        $has_info = $works_client || $works_date || (!empty($work_technologies) && !is_wp_error($work_technologies));
                        ?>
                        <div class="p-works-single__content">
                            <?php if ($has_info) : ?>
                                <dl class="p-works-single__info-list">
                                    <?php if ($works_client) : ?>
                                        <div class="p-works-single__info-item">
                                            <dt class="p-works-single__info-item-title">client</dt>
                                            <dd class="p-works-single__info-item-text p-works-single__info-item-text--client">
                                                <?php echo esc_html($works_client); ?>
                                            </dd>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($works_date) : ?>
                                        <div class="p-works-single__info-item">
                                            <dt class="p-works-single__info-item-title">date</dt>
                                            <dd class="p-works-single__info-item-text">
                                                <?php echo esc_html($works_date); ?>
                                            </dd>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (!empty($work_technologies) && !is_wp_error($work_technologies)) : ?>
                                        <div class="p-works-single__info-item p-works-single__info-item--tech">
                                            <dt class="p-works-single__info-item-title">technology</dt>
                                            <dd class="p-works-single__info-item-text">
                                                <ul class="p-works-single__tech-list">
                                                    <?php foreach ($work_technologies as $work_technology) : ?>
                                                        <li class="p-works-single__tech-item">
                                                            <?php echo esc_html($work_technology->name); ?>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </dd>
                                        </div>
                                    <?php endif; ?>
                                </dl>
                            <?php endif; ?>

                            <section class="p-works-single__section">
                                <h2 class="p-works-single__section-title">overview</h2>
                                <div class="p-works-single__section-text">
                                    <?php the_content(); ?>
                                </div>
                            </section>
                        </div>
                    </article>

                    <div class="p-works-single__nav">
                        <?php get_template_part('template-parts/common/post-nav'); ?>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>

    <?php
    $current_post_id = get_queried_object_id();

    $other_works = new WP_Query([
        'post_type'      => 'work',
        'posts_per_page' => 3,
        'post__not_in'   => [$current_post_id],
        'orderby'        => 'date',
        'order'          => 'DESC',
    ]);
    ?>

    <?php if ($other_works->have_posts()) : ?>
        <!-- other list -->
        <section class="p-works-single__other u-ptb">
            <div class="l-container">
                <div class="c-section-title">
                    <p class="c-section-title__en">other works</p>
                    <h2 class="c-section-title__jp">他の制作実績</h2>
                </div>

                <div class="p-works-single__other-list u-ptb">
                    <?php while ($other_works->have_posts()) : $other_works->the_post(); ?>
                        <?php get_template_part('template-parts/work/post', null, [
                            'title_tag'  => 'h3',
                            'title_size' => 'sm',
                            'tag_size'   => 'sm',
                        ]); ?>
                    <?php endwhile; ?>
                </div>

                <div class="p-works-single__back">
                    <a href="<?php echo esc_url(get_post_type_archive_link('work')); ?>" class="c-button c-button--back c-button--md">
                        back to works
                    </a>
                </div>
            </div>
        </section>
        <!-- /other list -->
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>

    <!-- cta -->
    <div class="p-works-single__cta u-ptb">
        <div class="l-container">
            <?php get_template_part('template-parts/common/cta'); ?>
        </div>
    </div>
    <!-- /cta -->
</main>
<!-- /single work -->
<?php get_footer(); ?>