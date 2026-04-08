<!-- footer -->
<footer class="l-footer">
    <div class="l-footer__inner">
        <div class="l-footer__content">
            <!-- Brand -->
            <div class="l-footer__brand">
                <div class="c-logo c-logo--footer">
                    <?php get_template_part('template-parts/common/site-logo'); ?>
                </div>
                <p class="l-footer__brand-description">秋の葉が静かに舞い落ちるように、洗練された美しさと確かな技術で、あなたのビジネスに新しい息吹を。</p>
            </div>
            <!-- /Brand -->

            <!-- middle -->
            <div class="l-footer__middle">
                <!-- Menu -->
                <div class="l-footer__group">
                    <p class="l-footer__group-title">Menu</p>
                    <nav class="l-footer__nav" aria-label="フッターナビゲーション">
                        <?php
                        wp_nav_menu([
                            'theme_location' => 'footer-menu',
                            'menu_class'     => 'l-footer__group-list',
                            'container'      => false,
                            'fallback_cb'    => false,
                        ]);
                        ?>
                    </nav>
                </div>
                <!-- /Menu -->

                <!-- SNS -->
                <div class="l-footer__group">
                    <p class="l-footer__group-title">Social</p>
                    <nav class="l-footer__nav" aria-label="SNSナビゲーション">
                        <?php
                        wp_nav_menu([
                            'theme_location' => 'footer-sns',
                            'menu_class'     => 'l-footer__group-list',
                            'container'      => false,
                            'fallback_cb'    => false,
                        ]);
                        ?>
                    </nav>
                </div>
                <!-- /SNS -->
            </div>
            <!-- /middle -->
        </div>

        <!-- bottom bar -->
        <div class="l-footer__bottom">
            <p class="l-footer__copyright"><span>© <?php echo esc_html(wp_date('Y')); ?> Leaf Design Lab.</span><span> All Rights Reserved.</span></p>
            <div class="l-footer__legal">

                <!-- privacy policy -->
                <?php if ($url = get_privacy_policy_url()) : ?>
                    <a href="<?php echo esc_url($url); ?>" class="l-footer__legal-link">Privacy Policy</a>
                <?php endif; ?>

                <!-- terms of service -->
                <?php if ($terms = get_page_by_path('terms')) : ?>
                    <a href="<?php echo esc_url(get_permalink($terms->ID)); ?>" class="l-footer__legal-link">
                        Terms of Service
                    </a>
                <?php endif; ?>

            </div>
        </div>
        <!-- /bottom bar -->
    </div>

</footer>
<?php wp_footer(); ?>
<!-- /footer -->

</body>

</html>