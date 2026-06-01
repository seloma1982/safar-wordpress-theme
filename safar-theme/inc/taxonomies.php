<?php
/**
 * Custom Taxonomies
 *
 * @package Safar
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Custom Taxonomies
 */
function safar_register_taxonomies() {

    // Opportunity Category
    register_taxonomy('opportunity-category', ['scholarship', 'job', 'course'], [
        'labels' => [
            'name' => __('تصنيفات الفرص', 'safar'),
            'singular_name' => __('تصنيف', 'safar'),
            'search_items' => __('بحث في التصنيفات', 'safar'),
            'all_items' => __('جميع التصنيفات', 'safar'),
            'edit_item' => __('تعديل التصنيف', 'safar'),
            'update_item' => __('تحديث التصنيف', 'safar'),
            'add_new_item' => __('إضافة تصنيف جديد', 'safar'),
            'new_item_name' => __('اسم التصنيف الجديد', 'safar'),
            'menu_name' => __('تصنيفات الفرص', 'safar'),
        ],
        'hierarchical' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'rewrite' => ['slug' => 'category'],
    ]);

    // Continent
    register_taxonomy('continent', ['country'], [
        'labels' => [
            'name' => __('القارات', 'safar'),
            'singular_name' => __('قارة', 'safar'),
            'search_items' => __('بحث في القارات', 'safar'),
            'all_items' => __('جميع القارات', 'safar'),
            'edit_item' => __('تعديل القارة', 'safar'),
            'add_new_item' => __('إضافة قارة جديدة', 'safar'),
            'menu_name' => __('القارات', 'safar'),
        ],
        'hierarchical' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'rewrite' => ['slug' => 'continent'],
    ]);

    // Scholarship Level
    register_taxonomy('Scholar Level', ['scholarship'], [
        'labels' => [
            'name' => __('مستوى الدراسة', 'safar'),
            'singular_name' => __('مستوى', 'safar'),
            'menu_name' => __('مستوى الدراسة', 'safar'),
        ],
        'hierarchical' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'rewrite' => ['slug' => 'level'],
    ]);

    // Job Type
    register_taxonomy('job-type', ['job'], [
        'labels' => [
            'name' => __('نوع الوظيفة', 'safar'),
            'singular_name' => __('نوع', 'safar'),
            'menu_name' => __('نوع الوظيفة', 'safar'),
        ],
        'hierarchical' => false,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'rewrite' => ['slug' => 'job-type'],
    ]);
}
add_action('init', 'safar_register_taxonomies');
