<?php
/**
 * سفر Theme Functions
 *
 * @package Safar
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

// Theme Constants
define('SAFAR_VERSION', '1.0.0');
define('SAFAR_DIR', get_template_directory());
define('SAFAR_URI', get_template_directory_uri());

/**
 * Theme Setup
 */
function safar_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ]);
    add_theme_support('editor-styles');
    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');
    add_theme_support('wp-block-styles');
    add_theme_support('custom-units', ['rem', 'vw', 'vh']);

    // RTL Support
    add_theme_support('rtl');

    // Image sizes
    add_image_size('safar-hero', 1920, 800, true);
    add_image_size('safar-card', 600, 400, true);
    add_image_size('safar-thumbnail', 300, 200, true);

    // Load textdomain
    load_theme_textdomain('safar', SAFAR_DIR . '/languages');

    // Register nav menus
    register_nav_menus([
        'primary' => __('القائمة الرئيسية', 'safar'),
        'mobile' => __('قائمة الموبايل', 'safar'),
        'footer' => __('قائمة الفوتر', 'safar'),
    ]);
}
add_action('after_setup_theme', 'safar_setup');

/**
 * Enqueue Scripts and Styles
 */
function safar_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'safar-fonts',
        'https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap',
        [],
        null
    );

    // Main Stylesheet
    wp_enqueue_style('safar-style', SAFAR_URI . '/style.css', ['safar-fonts'], SAFAR_VERSION);

    // Main JS
    wp_enqueue_script(
        'safar-main',
        SAFAR_URI . '/assets/js/main.js',
        [],
        SAFAR_VERSION,
        true
    );

    // Localize script
    wp_localize_script('safar-main', 'safarData', [
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('safar_nonce'),
        'themeUrl' => SAFAR_URI,
    ]);
}
add_action('wp_enqueue_scripts', 'safar_scripts');

/**
 * Register Widget Areas
 */
function safar_widgets() {
    register_sidebar([
        'name' => __('الشريط الجانبي', 'safar'),
        'id' => 'sidebar-1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ]);

    register_sidebar([
        'name' => __('الفوتر 1', 'safar'),
        'id' => 'footer-1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
    ]);

    register_sidebar([
        'name' => __('الفوتر 2', 'safar'),
        'id' => 'footer-2',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
    ]);
}
add_action('widgets_init', 'safar_widgets');

/**
 * Custom Post Types
 */
require_once SAFAR_DIR . '/inc/post-types.php';

/**
 * Custom Taxonomies
 */
require_once SAFAR_DIR . '/inc/taxonomies.php';

/**
 * Theme Options
 */
require_once SAFAR_DIR . '/inc/theme-options.php';

/**
 * Helper Functions
 */
require_once SAFAR_DIR . '/inc/helpers.php';

/**
 * Custom Walker Nav Menu
 */
require_once SAFAR_DIR . '/inc/class-walker-nav-menu.php';

/**
 * Disable Gutenberg for Custom Post Types
 */
function safar_disable_gutenberg($use_block_editor, $post_type) {
    if (in_array($post_type, ['scholarship', 'job', 'country'])) {
        return false;
    }
    return $use_block_editor;
}
add_filter('use_block_editor_for_post_type', 'safar_disable_gutenberg', 10, 2);

/**
 * Add Body Classes
 */
function safar_body_class($classes) {
    if (is_rtl()) {
        $classes[] = 'rtl-support';
    }
    if (is_front_page()) {
        $classes[] = 'home-page';
    }
    return $classes;
}
add_filter('body_class', 'safar_body_class');

/**
 * Modify Excerpt Length
 */
function safar_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'safar_excerpt_length');

/**
 * Modify Excerpt More
 */
function safar_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'safar_excerpt_more');

/**
 * Allow SVG Uploads
 */
function safar_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'safar_mime_types');

/**
 * Theme Activation Notice
 */
function safar_activation_notice() {
    ?>
    <div class="notice notice-success is-dismissible">
        <p><?php _e('شكراً لتثبيت قالب سفر! اذهب إلى <a href="' . esc_url(admin_url('themes.php?page=safar-options')) . '">إعدادات القالب</a> للإعداد.', 'safar'); ?></p>
    </div>
    <?php
}
add_action('admin_notices', 'safar_activation_notice');

/**
 * Add Theme Options Page Link
 */
function safar_plugin_action_links($links) {
    $theme_links = [
        '<a href="' . admin_url('themes.php?page=safar-options') . '">' . __('إعدادات القالب', 'safar') . '</a>',
    ];
    return array_merge($theme_links, $links);
}
add_action('theme_action_links_safar', 'safar_plugin_action_links');
