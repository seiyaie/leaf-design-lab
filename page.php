<?php get_header(); ?>
<!-- default page -->
<main class="p-default-page u-header-offset">
    <div class="l-container-s">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article <?php post_class('p-default-page__inner u-ptb'); ?>>
                    <div class="c-section-title">
                        <p class="c-section-title__en">page</p>
                        <h1 class="c-section-title__jp"><?php the_title(); ?></h1>
                    </div>

                    <div class="p-default-page__content">
                        <?php the_content(); ?>
                    </div>
                </article>
        <?php endwhile;
        endif; ?>
    </div>
</main>
<!-- /default page -->
<?php get_footer(); ?>