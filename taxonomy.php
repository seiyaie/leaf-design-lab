<?php get_header(); ?>
<?php $current_term = get_queried_object(); ?>

<!-- works -->
<main class="p-works u-header-offset">
    <div class="l-container">
        <div class="p-works__inner u-ptb">
            <div class="c-section-title">
                <p class="c-section-title__en">our works</p>
                <h1 class="c-section-title__jp">制作実績一覧。</h1>
            </div>
            <p class="p-works__text">私たちがこれまでに手がけてきたプロジェクトの一部をご紹介します。 美しさと機能性の調和を追求した、多様なクリエイティブをご覧ください。</p>

            <!-- filter -->
            <div class="p-works__tag-list">
                <?php
                get_template_part('template-parts/work/filter', null, [
                    'is_archive'   => false,
                    'current_term' => $current_term,
                ]);
                ?>
            </div>
            <!-- /filter -->

            <!-- works list -->
            <div class="p-works__list u-ptb">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('template-parts/work/post', null, [
                            'title_tag'  => 'h2',
                            'title_size' => 'md',
                            'tag_size'   => 'sm',
                        ]); ?>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p class="c-empty-message">該当する作品がありません。</p>
                <?php endif; ?>
            </div>
            <!-- /works list -->

            <!-- pagination -->
            <?php get_template_part('template-parts/common/pagination'); ?>
            <!-- /pagination -->
        </div>
    </div>

    <!-- cta -->
    <section class="p-works__cta u-ptb">
        <div class="l-container">
            <?php get_template_part('template-parts/common/cta'); ?>
        </div>
    </section>
    <!-- /cta -->
</main>

<?php get_footer(); ?>