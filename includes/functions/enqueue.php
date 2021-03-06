<?php

/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles() {

    // Get the theme data.
    $the_theme = wp_get_theme();

    $suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
    // Grab asset urls.
    $theme_styles  = "/assets/css/child-theme{$suffix}.css";
    $theme_scripts = "/assets/js/child-theme{$suffix}.js";

    // Fira Code
    wp_enqueue_style('fira-code-font', 'https://fonts.googleapis.com/css2?family=Fira+Code:wght@300;400;500;600;700&display=swap');
    wp_enqueue_style('dm-sans-font', 'https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap');

    wp_enqueue_style('child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $the_theme->get('Version'));
    wp_enqueue_script('jquery');
    wp_enqueue_script('child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $the_theme->get('Version'), true);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    if (is_singular()) {
        wp_enqueue_script('prism-scripts', get_stylesheet_directory_uri() . '/assets/plugins/prism/prism.js', array(), $the_theme->get('Version'));
        wp_enqueue_style('prism-style', get_stylesheet_directory_uri() . '/assets/plugins/prism/prism.css', array(), $the_theme->get('Version'));
    }
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

/**
 * Preconnect Google Domains
 */
add_action('wp_head', function () {
    echo '
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    ';
});
