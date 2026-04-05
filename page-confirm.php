<?php get_header(); ?>
<!-- contact confirm -->
<main class="p-contact-confirm u-header-offset">
    <div class="l-container">
        <div class="p-contact-confirm__inner u-ptb">
            <div class="c-section-title">
                <p class="c-section-title__en">confirm</p>
                <h1 class="c-section-title__jp">入力内容の確認</h1>
            </div>


            <p class="p-contact-confirm__text">以下の内容でよろしければ、「送信する」ボタンを押してください。</p>

            <!-- form -->
            <div class="p-contact-confirm__form">
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