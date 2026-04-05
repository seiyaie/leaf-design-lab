<?php
global $wp_query;

if ($wp_query->max_num_pages <= 1) {
    return;
}

$pagination = paginate_links([
    'total'     => $wp_query->max_num_pages,
    'current'   => max(1, get_query_var('paged')),
    'type'      => 'list',
    'mid_size'  => 1,
    'prev_text' => '
    <span class="c-pagination__item-arrow c-pagination__item-arrow--prev" aria-hidden="true">
        <svg viewBox="0 -960 960 960">
            <path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z" />
        </svg>
    </span>
    <span class="u-visually-hidden">前のページ</span>
    ',
    'next_text' => '
    <span class="c-pagination__item-arrow c-pagination__item-arrow--next" aria-hidden="true">
        <svg viewBox="0 -960 960 960">
            <path d="M647-440H160v-80h487L423-744l57-56 320 320-320 320-57-56 224-224Z" />
        </svg>
    </span>
    <span class="u-visually-hidden">次のページ</span>
    ',
]);

if ($pagination) {
    $pagination = str_replace("<ul class='page-numbers'>", '<ol class="c-pagination__list">', $pagination);
    $pagination = str_replace('</ul>', '</ol>', $pagination);
    $pagination = str_replace('<li>', '<li class="c-pagination__item">', $pagination);

    $pagination = str_replace('class="page-numbers current"', 'class="c-pagination__link c-pagination__link--current"', $pagination);
    $pagination = str_replace('class="prev page-numbers"', 'class="c-pagination__link c-pagination__link--prev"', $pagination);
    $pagination = str_replace('class="next page-numbers"', 'class="c-pagination__link c-pagination__link--next"', $pagination);
    $pagination = str_replace('class="page-numbers dots"', 'class="c-pagination__link c-pagination__link--dots"', $pagination);
    $pagination = str_replace('class="page-numbers"', 'class="c-pagination__link"', $pagination);
}
?>

<div class="c-pagination">
    <nav class="c-pagination__nav" aria-label="ページネーション">
        <?php echo $pagination; ?>
    </nav>
</div>