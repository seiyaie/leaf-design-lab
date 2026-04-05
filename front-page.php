<?php get_header(); ?>

<main id="main">
    <?php
    $front_page_id = get_option('page_on_front');
    $top_kv_base_path = get_template_directory_uri() . '/assets/img/top-kv';

    $top_kv_main_pc = function_exists('get_field') ? get_field('top_kv_main_pc', $front_page_id) : null;
    $top_kv_main_sp = function_exists('get_field') ? get_field('top_kv_main_sp', $front_page_id) : null;
    $top_kv_sub_01  = function_exists('get_field') ? get_field('top_kv_sub_01', $front_page_id) : null;
    $top_kv_sub_02  = function_exists('get_field') ? get_field('top_kv_sub_02', $front_page_id) : null;

    $top_kv_main_pc_url = $top_kv_main_pc
        ? wp_get_attachment_image_url($top_kv_main_pc, 'full')
        : $top_kv_base_path . '/top-kv-tree-pc.jpg';

    $top_kv_main_sp_url = $top_kv_main_sp
        ? wp_get_attachment_image_url($top_kv_main_sp, 'full')
        : $top_kv_base_path . '/top-kv-tree-sp.jpg';

    $top_kv_sub_01_url = $top_kv_sub_01
        ? wp_get_attachment_image_url($top_kv_sub_01, 'full')
        : $top_kv_base_path . '/top-kv-office.jpg';

    $top_kv_sub_02_url = $top_kv_sub_02
        ? wp_get_attachment_image_url($top_kv_sub_02, 'full')
        : $top_kv_base_path . '/top-kv-design.jpg';
    ?>

    <!-- top-kv -->
    <section class="p-top-kv">
        <div class="p-top-kv__leaves js-leaves"></div>
        <div class="p-top-kv__inner">
            <div class="p-top-kv__content">
                <div class="p-top-kv__label">
                    <span class="p-top-kv__label-line"></span>
                    <span class="p-top-kv__label-text">Creative Studio</span>
                </div>
                <h1 class="p-top-kv__title"><span>Leaf</span><span>Design</span><span>Lab</span></h1>
                <p class="p-top-kv__description"><span>秋の静寂と、冬の澄んだ空気。</span><span>私たちは、自然の移ろいから着想を得た、</span><span>普遍的で美しいデジタル体験を創造します。</span></p>
            </div>

            <div class="p-top-kv__media">
                <picture class="p-top-kv__img p-top-kv__img--main">
                    <source
                        media="(min-width: 768px)"
                        srcset="<?php echo esc_url($top_kv_main_pc_url); ?>" />
                    <img
                        src="<?php echo esc_url($top_kv_main_sp_url); ?>"
                        width="444"
                        height="444"
                        alt=""
                        decoding="async" />
                </picture>

                <div class="p-top-kv__img p-top-kv__img--sub">
                    <img
                        src="<?php echo esc_url($top_kv_sub_01_url); ?>"
                        width="444"
                        height="444"
                        alt=""
                        decoding="async" />
                </div>

                <div class="p-top-kv__img p-top-kv__img--sub02">
                    <img
                        src="<?php echo esc_url($top_kv_sub_02_url); ?>"
                        width="444"
                        height="444"
                        alt=""
                        decoding="async" />
                </div>
            </div>
        </div>
        <div class="p-top-kv__scroll">
            <span class="p-top-kv__scroll-text">Scroll Down</span>
            <div class="p-top-kv__scroll-line"></div>
        </div>
    </section>
    <!-- /top-kv -->

    <!-- top-about -->
    <section class="p-top-about u-ptb" id="about">
        <div class="l-container">
            <div class="c-section-title">
                <p class="c-section-title__en">about us</p>
                <h2 class="c-section-title__jp">美しさと機能性の、その先へ。</h2>
            </div>
            <div class="p-top-about__description">
                <p class="p-top-about__description-text">Leaf Design Labは、単に「綺麗なサイト」を作るだけの会社ではありません。 クライアントの想いを深く理解し、それを視覚的な美しさと、使いやすさという機能性に昇華させることを使命としています。</p>
                <p class="p-top-about__description-text">私たちは、秋の葉が散り、冬を越えて春に新しい芽を出すように、 常に変化し続けるWebの世界で、変わらない本質的な価値を追求し続けます。</p>
            </div>
            <div class="p-top-about__achievements">
                <div class="p-top-about__achievements-item">
                    <p class="p-top-about__achievements-number">10</p>
                    <p class="p-top-about__achievements-label">years experience</p>
                    <p class="p-top-about__achievements-text">業界の第一線で培った確かな技術と経験。</p>
                </div>
                <div class="p-top-about__achievements-item">
                    <p class="p-top-about__achievements-number">200</p>
                    <p class="p-top-about__achievements-label">projects done</p>
                    <p class="p-top-about__achievements-text">国内外の多様なクライアントとの成功実績。</p>
                </div>
            </div>
        </div>
    </section>
    <!-- /top-about -->

    <!-- top-service -->
    <section class="p-top-service u-ptb" id="service">
        <div class="l-container">
            <div class="c-section-title">
                <p class="c-section-title__en">our services</p>
                <h2 class="c-section-title__jp">私たちが提供する価値。</h2>
            </div>
            <p class="p-top-service__description">デザイン、開発、ブランディング。それぞれの専門領域が融合し、 あなたのビジネスを次のステージへと導きます。</p>
            <ul class="p-top-service__list">
                <li class="p-top-service__item">
                    <h3 class="p-top-service__item-title">Web Design</h3>
                    <p class="p-top-service__item-text">ブランドの魅力を最大限に引き出す、洗練されたビジュアルデザイン。</p>
                </li>
                <li class="p-top-service__item">
                    <h3 class="p-top-service__item-title">Development</h3>
                    <p class="p-top-service__item-text">最新技術を用いた、高速で使いやすいウェブシステムの構築。</p>
                </li>
                <li class="p-top-service__item">
                    <h3 class="p-top-service__item-title">Branding</h3>
                    <p class="p-top-service__item-text">ロゴ制作からコンセプト設計まで、一貫したブランド構築。</p>
                </li>
            </ul>
        </div>
    </section>
    <!-- /top-service -->

    <?php
    $works_query = new WP_Query([
        'post_type'      => 'work',
        'posts_per_page' => 4,
    ]);  ?>
    <?php if ($works_query->have_posts()) : ?>
        <!-- top-works -->
        <section class="p-top-works u-ptb" id="works">
            <div class="l-container">
                <div class="c-section-title">
                    <p class="c-section-title__en">our works</p>
                    <h2 class="c-section-title__jp">実績が語る、私たちの想い。</h2>
                </div>

                <div class="p-top-works__list u-ptb">
                    <?php while ($works_query->have_posts()) : $works_query->the_post(); ?>
                        <?php get_template_part('template-parts/work/post', null, [
                            'title_tag'  => 'h3',
                            'title_size' => 'md',
                            'tag_size'   => 'sm',
                        ]); ?>
                    <?php endwhile; ?>
                </div>

                <div class="p-top-works__button">
                    <a href="<?php echo esc_url(get_post_type_archive_link('work')); ?>" class="c-button c-button--forward c-button--md">view all works</a>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
    <!-- /top-works -->

    <!-- top-faq -->
    <section class="p-top-faq u-ptb" id="faq">
        <div class="l-container-s">
            <div class="c-section-title">
                <p class="c-section-title__en">FAQ</p>
                <h2 class="c-section-title__jp">よくある質問。</h2>
            </div>
            <div class="p-top-faq__list">
                <details class="p-top-faq__item js-faq__item">
                    <summary class="p-top-faq__question js-faq__question">制作期間はどのくらいですか？</summary>
                    <div class="p-top-faq__answer js-faq__answer">
                        <p class="p-top-faq__answer-text">プロジェクトの規模によりますが、一般的なコーポレートサイトであれば2ヶ月〜3ヶ月程度いただいております。</p>
                    </div>
                </details>
                <details class="p-top-faq__item js-faq__item">
                    <summary class="p-top-faq__question js-faq__question">予算に合わせた提案は可能ですか？</summary>
                    <div class="p-top-faq__answer js-faq__answer">
                        <p class="p-top-faq__answer-text">はい、もちろんです。ご予算に応じて、優先順位を整理し、最適なプランをご提案させていただきます。</p>
                    </div>
                </details>
                <details class="p-top-faq__item js-faq__item">
                    <summary class="p-top-faq__question js-faq__question">公開後の運用サポートはありますか？</summary>
                    <div class="p-top-faq__answer js-faq__answer">
                        <p class="p-top-faq__answer-text">保守管理、コンテンツの更新代行、アクセス解析に基づいた改善提案など、幅広くサポートしております。</p>
                    </div>
                </details>
                <details class="p-top-faq__item js-faq__item">
                    <summary class="p-top-faq__question js-faq__question">遠方からの依頼も可能ですか？</summary>
                    <div class="p-top-faq__answer js-faq__answer">
                        <p class="p-top-faq__answer-text">はい、Zoom等のオンライン会議ツールを用いて全国どこからでも対応可能です。</p>
                    </div>
                </details>
                <details class="p-top-faq__item js-faq__item">
                    <summary class="p-top-faq__question js-faq__question">クレジットカードで支払えますか？</summary>
                    <div class="p-top-faq__answer js-faq__answer">
                        <p class="p-top-faq__answer-text">はい、ご利用いただけます。現在、Visa、MasterCard、JCBなど主要な国際ブランドのクレジットカードに対応しています。お支払いはオンラインでの決済が可能で、SSLにより通信も暗号化されていますので、安心してご利用ください。お振込や請求書払いをご希望の場合は別途ご相談いただければ柔軟に対応いたします。</p>
                    </div>
                </details>
                <details class="p-top-faq__item js-faq__item">
                    <summary class="p-top-faq__question js-faq__question">見積もりは無料ですか？</summary>
                    <div class="p-top-faq__answer js-faq__answer">
                        <p class="p-top-faq__answer-text">はい、お見積もりはすべて無料で対応しています。お問い合わせフォームまたはお電話からご相談内容をお知らせいただければ、1〜3営業日以内に担当者からご連絡いたします。ご提案段階でのヒアリングや簡易な構成案も無償で対応可能ですので、お気軽にご相談ください。</p>
                    </div>
                </details>
            </div>
        </div>
    </section>
    <!-- /top-faq -->

    <?php
    $news_query = new WP_Query([
        'post_type'      => 'post',
        'posts_per_page' => 3,
    ]);
    ?>
    <?php if ($news_query->have_posts()) : ?>
        <!-- top-news -->
        <section class="p-top-news u-ptb" id="news">
            <div class="l-container">
                <div class="c-section-title">
                    <p class="c-section-title__en">NEWS</p>
                    <h2 class="c-section-title__jp">最新のお知らせ。</h2>
                </div>

                <div class="p-top-news__list u-ptb">
                    <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
                        <?php
                        get_template_part('template-parts/news/post', null, [
                            'post_id'        => get_the_ID(),
                            'title_tag'      => 'h3',
                            'date_class'     => 'c-date--sm',
                            'tag_class'      => 'c-tag--sm',
                            'fallback_image' => get_template_directory_uri() . '/assets/img/common/no-image.png',
                        ]);
                        ?>
                    <?php endwhile; ?>
                </div>

                <div class="p-top-news__button">
                    <?php if ($posts_page_id = get_option('page_for_posts')) : ?>
                        <a href="<?php echo esc_url(get_permalink($posts_page_id)); ?>" class="c-button c-button--forward c-button--md">view all news</a>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
    <!-- /top-news -->

    <!-- cta -->
    <section class="p-top-cta u-ptb">
        <div class="l-container">
            <?php get_template_part('template-parts/common/cta'); ?>
        </div>
    </section>
    <!-- /cta -->
</main>

<?php get_footer(); ?>