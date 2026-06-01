<?php
/**
 * Helper Functions
 *
 * @package Safar
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Get Theme Option
 */
function safar_get_option($key, $default = '') {
    $options = get_option('safar_options');
    return isset($options[$key]) ? $options[$key] : $default;
}

/**
 * Calculate Reading Time
 */
function safar_reading_time($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }

    $content = get_post_field('post_content', $post_id);
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200);

    return $reading_time > 0 ? $reading_time : 1;
}

/**
 * Format Number (Arabic)
 */
function safar_format_number($number) {
    return number_format($number, 0, '', ',');
}

/**
 * Get Post Views
 */
function safar_get_views($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }

    $views = get_post_meta($post_id, 'safar_views', true);
    return $views ? (int) $views : 0;
}

/**
 * Set Post Views
 */
function safar_set_views($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }

    $views = safar_get_views($post_id);
    update_post_meta($post_id, 'safar_views', $views + 1);
}

/**
 * Get Country Flag
 */
function safar_get_country_flag($country_code) {
    $flags = [
        'US' => '🇺🇸',
        'GB' => '🇬🇧',
        'CA' => '🇨🇦',
        'DE' => '🇩🇪',
        'FR' => '🇫🇷',
        'AU' => '🇦🇺',
        'JP' => '🇯🇵',
        'SA' => '🇸🇦',
        'AE' => '🇦🇪',
        'EG' => '🇪🇬',
        'TR' => '🇹🇷',
        'IT' => '🇮🇹',
        'ES' => '🇪🇸',
        'NL' => '🇳🇱',
        'SE' => '🇸🇪',
        'NO' => '🇳🇴',
        'DK' => '🇩🇰',
        'FI' => '🇫🇮',
        'CH' => '🇨🇭',
        'AT' => '🇦🇹',
        'BE' => '🇧🇪',
        'IE' => '🇮🇪',
        'PT' => '🇵🇹',
        'GR' => '🇬🇷',
        'PL' => '🇵🇱',
        'CN' => '🇨🇳',
        'KR' => '🇰🇷',
        'SG' => '🇸🇬',
        'MY' => '🇲🇾',
        'IN' => '🇮🇳',
        'NZ' => '🇳🇿',
        'ZA' => '🇿🇦',
        'BR' => '🇧🇷',
        'AR' => '🇦🇷',
        'MX' => '🇲🇽',
    ];

    return isset($flags[$country_code]) ? $flags[$country_code] : '🌍';
}

/**
 * Get Posts by Meta
 */
function safar_get_posts_by_meta($post_type, $meta_key, $meta_value, $posts_per_page = 10) {
    $args = [
        'post_type' => $post_type,
        'posts_per_page' => $posts_per_page,
        'meta_query' => [
            [
                'key' => $meta_key,
                'value' => $meta_value,
            ],
        ],
    ];

    return new WP_Query($args);
}

/**
 * Get Featured Posts
 */
function safar_get_featured($post_type = 'any', $count = 3) {
    $args = [
        'post_type' => $post_type,
        'posts_per_page' => $count,
        'meta_query' => [
            [
                'key' => 'safar_featured',
                'value' => '1',
            ],
        ],
    ];

    return new WP_Query($args);
}

/**
 * Get Trending Posts
 */
function safar_get_trending($post_type = 'any', $count = 5) {
    $args = [
        'post_type' => $post_type,
        'posts_per_page' => $count,
        'meta_key' => 'safar_views',
        'orderby' => 'meta_value_num',
        'order' => 'DESC',
    ];

    return new WP_Query($args);
}

/**
 * Breadcrumbs
 */
function safar_breadcrumbs() {
    $output = '<nav class="breadcrumbs"><div class="container">';

    // Home
    $output .= '<a href="' . home_url('/') . '">' . __('الرئيسية', 'safar') . '</a>';

    if (is_single()) {
        $post_type = get_post_type();
        $post_type_obj = get_post_type_object($post_type);

        if ($post_type_obj->has_archive) {
            $output .= '<span class="separator">/</span>';
            $output .= '<a href="' . get_post_type_archive_link($post_type) . '">' . $post_type_obj->labels->name . '</a>';
        }

        $output .= '<span class="separator">/</span>';
        $output .= '<span class="current">' . get_the_title() . '</span>';
    } elseif (is_archive()) {
        $output .= '<span class="separator">/</span>';
        $output .= '<span class="current">' . get_the_archive_title() . '</span>';
    } elseif (is_search()) {
        $output .= '<span class="separator">/</span>';
        $output .= '<span class="current">' . sprintf(__('نتائج البحث عن: %s', 'safar'), get_search_query()) . '</span>';
    } elseif (is_404()) {
        $output .= '<span class="separator">/</span>';
        $output .= '<span class="current">' . __('صفحة غير موجودة', 'safar') . '</span>';
    }

    $output .= '</div></nav>';

    return $output;
}

/**
 * Get Attachments
 */
function safar_get_attachments($post_id, $type = '') {
    $args = [
        'post_type' => 'attachment',
        'posts_per_page' => -1,
        'post_status' => 'inherit',
        'post_parent' => $post_id,
    ];

    if ($type) {
        $args['post_mime_type'] = $type;
    }

    return new WP_Query($args);
}

/**
 * Social Share Buttons
 */
function safar_social_share() {
    $url = urlencode(get_permalink());
    $title = urlencode(get_the_title());
    ?>
    <div class="social-share">
        <span class="share-label"><?php _e('مشاركة', 'safar'); ?></span>
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>" target="_blank" rel="noopener" class="share-btn share-facebook">
            <svg class="icon" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
        </a>
        <a href="https://twitter.com/intent/tweet?url=<?php echo $url; ?>&text=<?php echo $title; ?>" target="_blank" rel="noopener" class="share-btn share-twitter">
            <svg class="icon" viewBox="0 0 24 24" fill="currentColor"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/></svg>
        </a>
        <a href="https://wa.me/?text=<?php echo $url; ?>" target="_blank" rel="noopener" class="share-btn share-whatsapp">
            <svg class="icon" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.884-9.884 2.639.001 5.118 1.029 6.979 2.9a9.825 9.825 0 012.876 6.979c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.9c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
        </a>
        <a href="https://t.me/share/url?url=<?php echo $url; ?>&text=<?php echo $title; ?>" target="_blank" rel="noopener" class="share-btn share-telegram">
            <svg class="icon" viewBox="0 0 24 24" fill="currentColor"><path d="M11.944 0A12 12 0 000 12a12 12 0 0012 12 12 12 0 0012-12A12 12 0 0012 0a12 12 0 00-.056 0zm4.962 7.9c-.103.221-.387.857-.887 1.89-.45.928-.82 1.69-.82 1.69l-.04.077c-.147.31-.26.54-.34.74-.22.45-.42.76-.62.9-.16.13-.36.2-.6.2-.19 0-.4-.05-.64-.14l-.54-.22-.7-.28c-.55-.21-1.1-.43-1.57-.62-1.02-.41-1.96-.78-2.44-.98-.06-.02-.13-.05-.21-.08l-.08-.03c-.38-.15-.66-.31-.9-.54-.1-.1-.2-.2-.3-.36a.93.93 0 01-.16-.4c-.04-.18-.04-.34.02-.5.09-.26.35-.48.77-.66l6.44-2.84c.65-.29 1.21-.37 1.62-.2.16.06.3.16.4.28.08.1.14.21.18.33.01.04.02.08.03.12.03.14.03.29 0 .45-.03.14-.07.3-.13.47zm-2.7.04l-.02.01-.84.34 1.24-.51-.38.16z"/></svg>
        </a>
    </div>
    <?php
}

/**
 * Time Ago (Arabic)
 */
function safar_time_ago($date = '') {
    if (empty($date)) {
        return '';
    }

    $time = strtotime($date);
    $time_diff = time() - $time;

    $seconds = $time_diff;
    $minutes = round($seconds / 60);
    $hours = round($seconds / 3600);
    $days = round($seconds / 86400);
    $weeks = round($seconds / 604800);
    $months = round($seconds / 2629440);
    $years = round($seconds / 31553280);

    if ($seconds < 60) {
        return sprintf(_n('منذ %d ثانية', 'منذ %d ثانية', $seconds, 'safar'), $seconds);
    } elseif ($minutes < 60) {
        return sprintf(_n('منذ %d دقيقة', 'منذ %d دقيقة', $minutes, 'safar'), $minutes);
    } elseif ($hours < 24) {
        return sprintf(_n('منذ %d ساعة', 'منذ %d ساعة', $hours, 'safar'), $hours);
    } elseif ($days < 7) {
        return sprintf(_n('منذ %d يوم', 'منذ %d يوم', $days, 'safar'), $days);
    } elseif ($weeks < 4) {
        return sprintf(_n('منذ %d أسبوع', 'منذ %d أسبوع', $weeks, 'safar'), $weeks);
    } elseif ($months < 12) {
        return sprintf(_n('منذ %d شهر', 'منذ %d شهر', $months, 'safar'), $months);
    } else {
        return sprintf(_n('منذ %d سنة', 'منذ %d سنة', $years, 'safar'), $years);
    }
}
