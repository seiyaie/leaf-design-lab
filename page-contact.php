<?php get_header(); ?>
<!-- contact confirm -->
<main class="p-contact u-header-offset">
    <div class="l-container">
        <div class="p-contact__inner u-ptb">

            <div class="p-contact__head">
                <div class="c-section-title">
                    <p class="c-section-title__en">contact us</p>
                    <h1 class="c-section-title__jp">お問い合わせ</h1>
                </div>

                <p class="p-contact__text">プロジェクトのご相談、お見積もりの依頼、採用についてなど、 お気軽にお問い合わせください。</p>

                <dl class="p-contact__info-list">
                    <div class="p-contact__info-item">
                        <dt class="p-contact__info-item-title">address</dt>
                        <dd class="p-contact__info-item-text">東京都目黒区 0-0-0 Leaf Building 4F</dd>
                    </div>

                    <div class="p-contact__info-item">
                        <dt class="p-contact__info-item-title">email</dt>
                        <dd class="p-contact__info-item-text">info@example.com</dd>
                    </div>

                    <div class="p-contact__info-item">
                        <dt class="p-contact__info-item-title">phone</dt>
                        <dd class="p-contact__info-item-text">000-0000-0000</dd>
                    </div>
                </dl>
            </div>

            <!-- form -->
            <div class="p-contact__form">
                <?php
                if (have_posts()) :
                    while (have_posts()) :
                        the_post();
                        the_content();
                    endwhile;
                endif;
                ?>
            </div>
            <!-- /form -->

        </div>
    </div>
</main>
<!-- /contact confirm -->

<?php get_footer(); ?>