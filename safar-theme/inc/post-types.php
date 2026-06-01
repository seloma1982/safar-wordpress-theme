<?php
/**
 * Custom Post Types
 *
 * @package Safar
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Custom Post Types
 */
function safar_register_post_types() {

    // Scholarships
    register_post_type('scholarship', [
        'labels' => [
            'name' => __('المنح الدراسية', 'safar'),
            'singular_name' => __('منحة دراسية', 'safar'),
            'add_new' => __('إضافة منحة جديدة', 'safar'),
            'add_new_item' => __('إضافة منحة جديدة', 'safar'),
            'edit_item' => __('تعديل المنحة', 'safar'),
            'new_item' => __('منحة جديدة', 'safar'),
            'view_item' => __('عرض المنحة', 'safar'),
            'search_items' => __('بحث في المنح', 'safar'),
            'not_found' => __('لا توجد منح', 'safar'),
            'not_found_in_trash' => __('لا توجد منح في سلة المحذوفات', 'safar'),
        ],
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-awards',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'],
        'rewrite' => ['slug' => 'scholarships'],
        'show_in_rest' => true,
    ]);

    // Jobs
    register_post_type('job', [
        'labels' => [
            'name' => __('فرص العمل', 'safar'),
            'singular_name' => __('فرصة عمل', 'safar'),
            'add_new' => __('إضافة وظيفة جديدة', 'safar'),
            'add_new_item' => __('إضافة وظيفة جديدة', 'safar'),
            'edit_item' => __('تعديل الوظيفة', 'safar'),
            'new_item' => __('وظيفة جديدة', 'safar'),
            'view_item' => __('عرض الوظيفة', 'safar'),
            'search_items' => __('بحث في الوظائف', 'safar'),
            'not_found' => __('لا توجد وظائف', 'safar'),
            'not_found_in_trash' => __('لا توجد وظائف في سلة المحذوفات', 'safar'),
        ],
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-businessman',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'],
        'rewrite' => ['slug' => 'jobs'],
        'show_in_rest' => true,
    ]);

    // Countries
    register_post_type('country', [
        'labels' => [
            'name' => __('الدول', 'safar'),
            'singular_name' => __('دولة', 'safar'),
            'add_new' => __('إضافة دولة جديدة', 'safar'),
            'add_new_item' => __('إضافة دولة جديدة', 'safar'),
            'edit_item' => __('تعديل الدولة', 'safar'),
            'new_item' => __('دولة جديدة', 'safar'),
            'view_item' => __('عرض الدولة', 'safar'),
            'search_items' => __('بحث في الدول', 'safar'),
            'not_found' => __('لا توجد دول', 'safar'),
            'not_found_in_trash' => __('لا توجد دول في سلة المحذوفات', 'safar'),
        ],
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-admin-site',
        'supports' => ['title', 'editor', 'thumbnail', 'custom-fields'],
        'rewrite' => ['slug' => 'countries'],
        'show_in_rest' => true,
    ]);

    // Courses
    register_post_type('course', [
        'labels' => [
            'name' => __('الكورسات', 'safar'),
            'singular_name' => __('كورس', 'safar'),
            'add_new' => __('إضافة كورس جديد', 'safar'),
            'menu_name' => __('الكورسات', 'safar'),
        ],
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-welcome-learn-more',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'rewrite' => ['slug' => 'courses'],
        'show_in_rest' => true,
    ]);

    // Visas
    register_post_type('visa', [
        'labels' => [
            'name' => __('التأشيرات', 'safar'),
            'singular_name' => __('تأشيرة', 'safar'),
            'add_new' => __('إضافة تأشيرة جديدة', 'safar'),
            'menu_name' => __('التأشيرات', 'safar'),
        ],
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-admin-users',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'rewrite' => ['slug' => 'visas'],
        'show_in_rest' => true,
    ]);
}
add_action('init', 'safar_register_post_types');
