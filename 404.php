
<?php get_header(); ?>
<!-- error404 -->
<main class="p-error404 u-header-offset">
    <div class="l-container">
        <div class="p-error404__inner u-ptb">
            <div class="p-error404__label">
                <span class="p-error404__label-line"></span>
                <span class="p-error404__label-text">page not found</span>
                <span class="p-error404__label-line"></span>
            </div>

            <h1 class="p-error404__title"><span>Error</span><span>404</span></h1>
            <p class="p-error404__text">
                <span>申し訳ございません。</span>
                <span>お探しのページは見つかりませんでした。</span>
            </p>
            <div class="p-error404__button">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="c-button c-button--back c-button--lg">トップページに戻る</a>
            </div>
        </div>
    </div>
</main>
<!-- /error404 -->

<?php get_footer(); ?>