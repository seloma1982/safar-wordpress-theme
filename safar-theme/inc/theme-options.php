<?php
/**
 * Theme Options Page
 *
 * @package Safar
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add Options Page
 */
function safar_add_options_page() {
    add_menu_page(
        __('إعدادات سفر', 'safar'),
        __('إعدادات سفر', 'safar'),
        'manage_options',
        'safar-options',
        'safar_options_page',
        'dashicons-admin-site-alt3',
        60
    );
}
add_action('admin_menu', 'safar_add_options_page');

/**
 * Register Settings
 */
function safar_register_settings() {
    register_setting('safar_options_group', 'safar_options', 'safar_sanitize_options');
}
add_action('admin_init', 'safar_register_settings');

/**
 * Sanitize Options
 */
function safar_sanitize_options($input) {
    $output = [];

    // Social Media
    if (isset($input['facebook'])) {
        $output['facebook'] = esc_url_raw($input['facebook']);
    }
    if (isset($input['twitter'])) {
        $output['twitter'] = esc_url_raw($input['twitter']);
    }
    if (isset($input['instagram'])) {
        $output['instagram'] = esc_url_raw($input['instagram']);
    }
    if (isset($input['youtube'])) {
        $output['youtube'] = esc_url_raw($input['youtube']);
    }
    if (isset($input['telegram'])) {
        $output['telegram'] = esc_url_raw($input['telegram']);
    }

    // Text Fields
    $text_fields = [
        'hero_title',
        'hero_subtitle',
        'hero_button_text',
        'hero_button_link',
        'stats_scholarship',
        'stats_jobs',
        'stats_countries',
        'stats_users',
        'newsletter_title',
        'newsletter_subtitle',
        'footer_text',
        'copyright',
        'contact_email',
        'contact_phone',
    ];

    foreach ($text_fields as $field) {
        if (isset($input[$field])) {
            $output[$field] = sanitize_text_field($input[$field]);
        }
    }

    // Checkboxes
    $checkboxes = ['show_hero', 'show_stats', 'show_newsletter'];
    foreach ($checkboxes as $checkbox) {
        $output[$checkbox] = isset($input[$checkbox]) ? 1 : 0;
    }

    return $output;
}

/**
 * Options Page HTML
 */
function safar_options_page() {
    $options = get_option('safar_options');
    ?>
    <div class="wrap">
        <h1><?php _e('إعدادات قالب سفر', 'safar'); ?></h1>

        <form method="post" action="options.php">
            <?php settings_fields('safar_options_group'); ?>

            <div class="safar-options-wrapper" style="max-width: 800px; margin-top: 20px;">

                <!-- Hero Section -->
                <div class="safar-option-section" style="background: #fff; padding: 20px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                    <h2 style="margin-top: 0; padding-bottom: 10px; border-bottom: 1px solid #eee;">
                        <?php _e('قسم البطل', 'safar'); ?>
                    </h2>

                    <table class="form-table">
                        <tr>
                            <th scope="row"><?php _e('إظهار قسم البطل', 'safar'); ?></th>
                            <td>
                                <label>
                                    <input type="checkbox" name="safar_options[show_hero]" value="1" <?php checked(isset($options['show_hero']) && $options['show_hero'], 1); ?>>
                                    <?php _e('نعم', 'safar'); ?>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php _e('عنوان البطل', 'safar'); ?></th>
                            <td>
                                <input type="text" name="safar_options[hero_title]" value="<?php echo isset($options['hero_title']) ? esc_attr($options['hero_title']) : ''; ?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php _e('نص البطل', 'safar'); ?></th>
                            <td>
                                <textarea name="safar_options[hero_subtitle]" rows="3" class="large-text"><?php echo isset($options['hero_subtitle']) ? esc_textarea($options['hero_subtitle']) : ''; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php _e('نص الزر', 'safar'); ?></th>
                            <td>
                                <input type="text" name="safar_options[hero_button_text]" value="<?php echo isset($options['hero_button_text']) ? esc_attr($options['hero_button_text']) : ''; ?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php _e('رابط الزر', 'safar'); ?></th>
                            <td>
                                <input type="text" name="safar_options[hero_button_link]" value="<?php echo isset($options['hero_button_link']) ? esc_url($options['hero_button_link']) : ''; ?>" class="regular-text">
                            </td>
                        </tr>
                    </table>
                </div>

                <!-- Stats Section -->
                <div class="safar-option-section" style="background: #fff; padding: 20px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                    <h2 style="margin-top: 0; padding-bottom: 10px; border-bottom: 1px solid #eee;">
                        <?php _e('الإحصائيات', 'safar'); ?>
                    </h2>

                    <table class="form-table">
                        <tr>
                            <th scope="row"><?php _e('عدد المنح الدراسية', 'safar'); ?></th>
                            <td>
                                <input type="text" name="safar_options[stats_scholarship]" value="<?php echo isset($options['stats_scholarship']) ? esc_attr($options['stats_scholarship']) : '15000+'; ?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php _e('عدد فرص العمل', 'safar'); ?></th>
                            <td>
                                <input type="text" name="safar_options[stats_jobs]" value="<?php echo isset($options['stats_jobs']) ? esc_attr($options['stats_jobs']) : '10000+'; ?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php _e('عدد الدول', 'safar'); ?></th>
                            <td>
                                <input type="text" name="safar_options[stats_countries]" value="<?php echo isset($options['stats_countries']) ? esc_attr($options['stats_countries']) : '190+'; ?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php _e('عدد المتقدمين', 'safar'); ?></th>
                            <td>
                                <input type="text" name="safar_options[stats_users]" value="<?php echo isset($options['stats_users']) ? esc_attr($options['stats_users']) : '50000+'; ?>" class="regular-text">
                            </td>
                        </tr>
                    </table>
                </div>

                <!-- Social Media -->
                <div class="safar-option-section" style="background: #fff; padding: 20px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                    <h2 style="margin-top: 0; padding-bottom: 10px; border-bottom: 1px solid #eee;">
                        <?php _e('وسائل التواصل', 'safar'); ?>
                    </h2>

                    <table class="form-table">
                        <tr>
                            <th scope="row"><span style="color: #1877F2;">Facebook</span></th>
                            <td>
                                <input type="url" name="safar_options[facebook]" value="<?php echo isset($options['facebook']) ? esc_url($options['facebook']) : ''; ?>" class="regular-text" placeholder="https://facebook.com/...">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><span style="color: #1DA1F2;">Twitter</span></th>
                            <td>
                                <input type="url" name="safar_options[twitter]" value="<?php echo isset($options['twitter']) ? esc_url($options['twitter']) : ''; ?>" class="regular-text" placeholder="https://twitter.com/...">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><span style="color: #E4405F;">Instagram</span></th>
                            <td>
                                <input type="url" name="safar_options[instagram]" value="<?php echo isset($options['instagram']) ? esc_url($options['instagram']) : ''; ?>" class="regular-text" placeholder="https://instagram.com/...">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><span style="color: #FF0000;">YouTube</span></th>
                            <td>
                                <input type="url" name="safar_options[youtube]" value="<?php echo isset($options['youtube']) ? esc_url($options['youtube']) : ''; ?>" class="regular-text" placeholder="https://youtube.com/...">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><span style="color: #0088cc;">Telegram</span></th>
                            <td>
                                <input type="url" name="safar_options[telegram]" value="<?php echo isset($options['telegram']) ? esc_url($options['telegram']) : ''; ?>" class="regular-text" placeholder="https://t.me/...">
                            </td>
                        </tr>
                    </table>
                </div>

                <!-- Contact Info -->
                <div class="safar-option-section" style="background: #fff; padding: 20px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                    <h2 style="margin-top: 0; padding-bottom: 10px; border-bottom: 1px solid #eee;">
                        <?php _e('معلومات الاتصال', 'safar'); ?>
                    </h2>

                    <table class="form-table">
                        <tr>
                            <th scope="row"><?php _e('البريد الإلكتروني', 'safar'); ?></th>
                            <td>
                                <input type="email" name="safar_options[contact_email]" value="<?php echo isset($options['contact_email']) ? esc_attr($options['contact_email']) : ''; ?>" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php _e('رقم الهاتف', 'safar'); ?></th>
                            <td>
                                <input type="text" name="safar_options[contact_phone]" value="<?php echo isset($options['contact_phone']) ? esc_attr($options['contact_phone']) : ''; ?>" class="regular-text">
                            </td>
                        </tr>
                    </table>
                </div>

                <!-- Footer -->
                <div class="safar-option-section" style="background: #fff; padding: 20px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                    <h2 style="margin-top: 0; padding-bottom: 10px; border-bottom: 1px solid #eee;">
                        <?php _e('التذييل', 'safar'); ?>
                    </h2>

                    <table class="form-table">
                        <tr>
                            <th scope="row"><?php _e('نص التذييل', 'safar'); ?></th>
                            <td>
                                <textarea name="safar_options[footer_text]" rows="3" class="large-text"><?php echo isset($options['footer_text']) ? esc_textarea($options['footer_text']) : ''; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php _e('حقوق النشر', 'safar'); ?></th>
                            <td>
                                <input type="text" name="safar_options[copyright]" value="<?php echo isset($options['copyright']) ? esc_attr($options['copyright']) : ''; ?>" class="regular-text">
                            </td>
                        </tr>
                    </table>
                </div>

            </div>

            <?php submit_button(__('حفظ الإعدادات', 'safar')); ?>
        </form>
    </div>
    <?php
}
