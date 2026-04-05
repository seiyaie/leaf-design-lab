
<?php
/**
 * ----------------------------------------
 * CSS / JavaScript の読み込み
 * ----------------------------------------
 */
function my_enqueue_scripts()
{
    // google font読み込み
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Playfair+Display:ital,wght@0,700;1,700&family=JetBrains+Mono&display=swap',
        [],
        null
    );

    //css読み込み
    wp_enqueue_style(
        'leaf-design-lab-app',
        get_template_directory_uri() . '/assets/css/app.css',
        [],
        '1.0.0'
    );

    // gsap読み込み
    wp_enqueue_script(
        'gsap',
        'https://cdn.jsdelivr.net/npm/gsap@3.14.2/dist/gsap.min.js',
        [],
        '3.14.2',
        true
    );


    // js読み込み
    wp_enqueue_script(
        'leaf-design-lab-main',
        get_template_directory_uri() . '/assets/js/main.js',
        ['gsap'],
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'my_enqueue_scripts');

/**
 * ----------------------------------------
 * main.js を module として読み込む
 * ----------------------------------------
 */
function my_script_module($tag, $handle, $src)
{
    if ('leaf-design-lab-main' === $handle) {
        return '<script type="module" src="' . esc_url($src) . '"></script>';
    }
    return $tag;
}
add_filter('script_loader_tag', 'my_script_module', 10, 3);
