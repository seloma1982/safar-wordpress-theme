<?php
/**
 * Header Template
 *
 * @package Safar
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#main"><?php _e('تخطي إلى المحتوى', 'safar'); ?></a>

    <header id="masthead" class="site-header">
        <!-- Top Bar -->
        <div class="top-bar">
            <div class="container">
                <div class="top-bar-content flex justify-between items-center">
                    <div class="contact-info flex gap-4 text-sm">
                        <?php if ($email = safar_get_option('contact_email')) : ?>
                            <a href="mailto:<?php echo esc_attr($email); ?>">
                                <svg class="icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                <?php echo esc_html($email); ?>
                            </a>
                        <?php endif; ?>
                        <?php if ($phone = safar_get_option('contact_phone')) : ?>
                            <a href="tel:<?php echo esc_attr($phone); ?>">
                                <svg class="icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                <?php echo esc_html($phone); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="social-links flex gap-3">
                        <?php if ($facebook = safar_get_option('facebook')) : ?>
                            <a href="<?php echo esc_url($facebook); ?>" target="_blank" rel="noopener" aria-label="Facebook">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
                            </a>
                        <?php endif; ?>
                        <?php if ($twitter = safar_get_option('twitter')) : ?>
                            <a href="<?php echo esc_url($twitter); ?>" target="_blank" rel="noopener" aria-label="Twitter">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/></svg>
                            </a>
                        <?php endif; ?>
                        <?php if ($telegram = safar_get_option('telegram')) : ?>
                            <a href="<?php echo esc_url($telegram); ?>" target="_blank" rel="noopener" aria-label="Telegram">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M11.944 0A12 12 0 000 12a12 12 0 0012 12 12 12 0 0012-12A12 12 0 0012 0a12 12 0 00-.056 0zm4.962 7.9c.1.2-.4.9-.9 1.9-.4.9-.8 1.7-.8 1.7l-.04.08c-.1.3-.2.5-.3.7-.2.5-.4.8-.6.9-.2.1-.4.2-.6.2-.2 0-.4 0-.6-.1l-.5-.2-.7-.3-1.6-.6c-1-.4-2-.8-2.4-1-.1 0-.1 0-.2-.1l-.1 0c-.4-.2-.7-.3-.9-.5-.1-.1-.2-.2-.3-.4-.1-.1-.2-.3-.2-.4 0-.2 0-.3.1-.5.1-.3.3-.5.8-.7l6.4-2.8c.7-.3 1.2-.4 1.6-.2.2.1.3.2.4.3.1.1.1.2.2.3 0 .1.1.1.1.2 0 .1 0 .2 0 .3 0 .2 0 .3-.1.5s-.1.3-.2.5zm-2.7 0l-.02.01-.84.34 1.24-.51-.38.16z"/></svg>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Header -->
        <div class="main-header">
            <div class="container">
                <div class="header-wrapper flex items-center justify-between">
                    <!-- Logo -->
                    <div class="site-branding">
                        <?php if (has_custom_logo()) : ?>
                            <?php the_custom_logo(); ?>
                        <?php else : ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo flex items-center gap-2">
                                <div class="logo-icon">
                                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M17.8 6.8L17.3 7.3"/>
                                        <path d="M6.2 17.2l.5-.5"/>
                                        <path d="M5 12h1"/>
                                        <path d="M18 12h1"/>
                                        <path d="M8.5 8.5l.4.4"/>
                                        <path d="M15.5 15.5l.4.4"/>
                                        <path d="M6.7 6.7l.4.4"/>
                                        <path d="M17.3 17.3l.4.4"/>
                                        <circle cx="12" cy="12" r="4"/>
                                        <path d="M12 2v2"/>
                                        <path d="M12 20v2"/>
                                        <path d="M4.93 4.93l1.41 1.41"/>
                                        <path d="M17.66 17.66l1.41 1.41"/>
                                        <path d="M2 12h2"/>
                                        <path d="M20 12h2"/>
                                        <path d="M6.34 17.66l-1.41 1.41"/>
                                        <path d="M19.07 4.93l-1.41 1.41"/>
                                    </svg>
                                </div>
                                <span class="site-title gradient-text"><?php bloginfo('name'); ?></span>
                            </a>
                        <?php endif; ?>
                    </div>

                    <!-- Navigation -->
                    <nav id="site-navigation" class="main-navigation">
                        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                            <span class="menu-icon"></span>
                            <span class="sr-only"><?php _e('القائمة', 'safar'); ?></span>
                        </button>

                        <?php
                        wp_nav_menu([
                            'theme_location' => 'primary',
                            'menu_id' => 'primary-menu',
                            'container' => false,
                            'fallback_cb' => false,
                            'menu_class' => 'nav-menu flex items-center gap-6',
                        ]);
                        ?>
                    </nav>

                    <!-- Search & Actions -->
                    <div class="header-actions flex items-center gap-4">
                        <button class="search-toggle" aria-label="<?php _e('البحث', 'safar'); ?>">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
                        </button>

                        <a href="<?php echo esc_url(get_post_type_archive_link('scholarship')); ?>" class="btn btn-primary">
                            <?php _e('ابدأ الآن', 'safar'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search Overlay -->
        <div class="search-overlay hidden">
            <div class="container">
                <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                    <div class="search-input-wrapper flex items-center">
                        <input type="search" class="search-field" placeholder="<?php _e('ابحث عن منح، وظائف، دول...', 'safar'); ?>" value="<?php echo get_search_query(); ?>" name="s">
                        <button type="submit" class="search-submit">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
                        </button>
                    </div>
                </form>
                <button class="search-close" aria-label="<?php _e('إغلاق', 'safar'); ?>">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                </button>
            </div>
        </div>
    </header>

    <div id="content" class="site-content">
