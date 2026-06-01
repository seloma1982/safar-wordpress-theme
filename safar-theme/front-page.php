<?php
/**
 * Homepage Template
 *
 * @package Safar
 */

get_header();
?>

<main id="main" class="site-main home-main">
    <!-- Hero Section -->
    <?php if (safar_get_option('show_hero', true)) : ?>
    <section class="hero-section">
        <div class="hero-background">
            <div class="hero-gradient"></div>
            <div class="floating-icons">
                <div class="floating-icon glass animate-float" style="top: 20%; right: 15%;">✈️</div>
                <div class="floating-icon glass animate-float" style="bottom: 40%; left: 25%; animation-delay: 1s;">🌍</div>
                <div class="floating-icon glass animate-float" style="top: 40%; left: 20%; animation-delay: 2s;">🎓</div>
                <div class="floating-icon glass animate-float" style="bottom: 30%; right: 35%; animation-delay: 0.5s;">💼</div>
            </div>
            <div class="hero-glow"></div>
        </div>

        <div class="container hero-content">
            <!-- Badge -->
            <div class="hero-badge glass animate-fade-in">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                <?php _e('أكثر من 25,000 فرصة متاحة الآن', 'safar'); ?>
            </div>

            <!-- Title -->
            <h1 class="hero-title">
                <?php echo esc_html(safar_get_option('hero_title', __('اكتشف عالم من الفرص اللامحدودة', 'safar'))); ?>
            </h1>

            <!-- Subtitle -->
            <p class="hero-subtitle">
                <?php echo esc_html(safar_get_option('hero_subtitle', __('بوابتك الشاملة للمنح الدراسية وفرص العمل والهجرة الآمنة إلى 190+ دولة حول العالم. ابدأ رحلتك اليوم نحو مستقبل أفضل.', 'safar'))); ?>
            </p>

            <!-- Search -->
            <div class="hero-search">
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                    <div class="search-wrapper">
                        <input type="search" name="s" placeholder="<?php _e('ابحث عن منحة، وظيفة، أو دولة...', 'safar'); ?>" class="search-input">
                        <button type="submit" class="btn btn-primary search-btn"><?php _e('بحث', 'safar'); ?></button>
                    </div>
                </form>
            </div>

            <!-- CTA Buttons -->
            <div class="hero-cta flex gap-4 justify-center">
                <a href="<?php echo esc_url(get_post_type_archive_link('scholarship')); ?>" class="btn btn-primary btn-lg">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                    <?php _e('اكتشف المنح الدراسية', 'safar'); ?>
                </a>
                <a href="<?php echo esc_url(get_post_type_archive_link('job')); ?>" class="btn btn-outline btn-lg">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                    <?php _e('فرص العمل', 'safar'); ?>
                </a>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Stats Section -->
    <?php if (safar_get_option('show_stats', true)) : ?>
    <section class="stats-section py-12">
        <div class="container">
            <div class="stats-grid grid grid-4">
                <div class="stat-card glass">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                    <div class="stat-number gradient-text font-bold"><?php echo esc_html(safar_get_option('stats_scholarship', '15,000+')); ?></div>
                    <div class="stat-label text-muted"><?php _e('منح دراسية', 'safar'); ?></div>
                </div>
                <div class="stat-card glass">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="var(--secondary)" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                    <div class="stat-number gradient-text font-bold"><?php echo esc_html(safar_get_option('stats_jobs', '10,000+')); ?></div>
                    <div class="stat-label text-muted"><?php _e('فرص عمل', 'safar'); ?></div>
                </div>
                <div class="stat-card glass">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                    <div class="stat-number gradient-text font-bold"><?php echo esc_html(safar_get_option('stats_countries', '190+')); ?></div>
                    <div class="stat-label text-muted"><?php _e('دولة', 'safar'); ?></div>
                </div>
                <div class="stat-card glass">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    <div class="stat-number gradient-text font-bold"><?php echo esc_html(safar_get_option('stats_users', '50,000+')); ?></div>
                    <div class="stat-label text-muted"><?php _e('متقدم نشط', 'safar'); ?></div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Continents Section -->
    <section class="continents-section py-20">
        <div class="container">
            <div class="section-header text-center mb-12">
                <h2 class="section-title"><?php _e('اختر وجهتك', 'safar'); ?></h2>
                <p class="section-subtitle text-muted"><?php _e('الفرص مصنفة حسب القارات', 'safar'); ?></p>
            </div>

            <div class="continents-grid grid grid-5">
                <?php
                $continents = [
                    ['name' => __('أوروبا', 'safar'), 'slug' => 'europe', 'icon' => '🏛️', 'count' => 1250],
                    ['name' => __('أمريكا الشمالية', 'safar'), 'slug' => 'north-america', 'icon' => '🗽', 'count' => 890],
                    ['name' => __('آسيا', 'safar'), 'slug' => 'asia', 'icon' => '🏯', 'count' => 650],
                    ['name' => __('أستراليا', 'safar'), 'slug' => 'australia', 'icon' => '🦘', 'count' => 320],
                    ['name' => __('أفريقيا', 'safar'), 'slug' => 'africa', 'icon' => '🌍', 'count' => 280],
                ];

                foreach ($continents as $continent) :
                    $term = get_term_by('slug', $continent['slug'], 'continent');
                ?>
                    <a href="<?php echo $term ? esc_url(get_term_link($term)) : '#'; ?>" class="continent-card card">
                        <div class="continent-icon"><?php echo $continent['icon']; ?></div>
                        <h3 class="continent-name"><?php echo esc_html($continent['name']); ?></h3>
                        <p class="continent-count text-sm text-muted"><?php echo esc_html($continent['count']); ?> <?php _e('فرصة', 'safar'); ?></p>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories-section py-20" style="background: var(--bg-alt);">
        <div class="container">
            <div class="section-header text-center mb-12">
                <h2 class="section-title"><?php _e('تصفح حسب التصنيف', 'safar'); ?></h2>
                <p class="section-subtitle text-muted"><?php _e('اختر نوع الفرصة التي تبحث عنها', 'safar'); ?></p>
            </div>

            <div class="categories-grid grid grid-5">
                <!-- Scholarships -->
                <a href="<?php echo esc_url(get_post_type_archive_link('scholarship')); ?>" class="category-card card">
                    <div class="category-icon" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%);">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="white"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                    </div>
                    <h3 class="category-name"><?php _e('المنح الدراسية', 'safar'); ?></h3>
                    <p class="category-count text-sm text-muted"><?php echo esc_html(wp_count_posts('scholarship')->publish); ?> <?php _e('فرصة', 'safar'); ?></p>
                </a>

                <!-- Jobs -->
                <a href="<?php echo esc_url(get_post_type_archive_link('job')); ?>" class="category-card card">
                    <div class="category-icon" style="background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="white"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                    </div>
                    <h3 class="category-name"><?php _e('فرص العمل', 'safar'); ?></h3>
                    <p class="category-count text-sm text-muted"><?php echo esc_html(wp_count_posts('job')->publish); ?> <?php _e('فرصة', 'safar'); ?></p>
                </a>

                <!-- Visas -->
                <a href="<?php echo esc_url(get_post_type_archive_link('visa')); ?>" class="category-card card">
                    <div class="category-icon" style="background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="white"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    </div>
                    <h3 class="category-name"><?php _e('التأشيرات', 'safar'); ?></h3>
                    <p class="category-count text-sm text-muted"><?php echo esc_html(wp_count_posts('visa')->publish); ?> <?php _e('فرصة', 'safar'); ?></p>
                </a>

                <!-- Courses -->
                <a href="<?php echo esc_url(get_post_type_archive_link('course')); ?>" class="category-card card">
                    <div class="category-icon" style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="white"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                    </div>
                    <h3 class="category-name"><?php _e('الكورسات', 'safar'); ?></h3>
                    <p class="category-count text-sm text-muted"><?php echo esc_html(wp_count_posts('course')->publish); ?> <?php _e('كورس', 'safar'); ?></p>
                </a>

                <!-- Countries -->
                <a href="<?php echo esc_url(get_post_type_archive_link('country')); ?>" class="category-card card">
                    <div class="category-icon" style="background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="white"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                    </div>
                    <h3 class="category-name"><?php _e('الدول', 'safar'); ?></h3>
                    <p class="category-count text-sm text-muted"><?php echo esc_html(wp_count_posts('country')->publish); ?> <?php _e('دولة', 'safar'); ?></p>
                </a>
            </div>
        </div>
    </section>

    <!-- Featured Opportunities -->
    <section class="featured-section py-20">
        <div class="container">
            <div class="section-header flex justify-between items-center mb-12">
                <div>
                    <div class="flex items-center gap-2 text-primary mb-2">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
                        <span class="text-sm font-semibold"><?php _e('الأكثر رواجاً', 'safar'); ?></span>
                    </div>
                    <h2 class="section-title"><?php _e('فرص مميزة', 'safar'); ?></h2>
                </div>
                <a href="<?php echo esc_url(get_post_type_archive_link('scholarship')); ?>" class="btn btn-secondary">
                    <?php _e('عرض الكل', 'safar'); ?>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
                </a>
            </div>

            <div class="featured-grid grid grid-3">
                <?php
                $featured = new WP_Query([
                    'post_type' => ['scholarship', 'job', 'course'],
                    'posts_per_page' => 3,
                    'meta_query' => [
                        [
                            'key' => 'safar_featured',
                            'value' => '1',
                        ],
                    ],
                ]);

                while ($featured->have_posts()) : $featured->the_post();
                    get_template_part('parts/content', 'card');
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>

    <!-- Latest Opportunities -->
    <section class="latest-section py-20" style="background: var(--bg-alt);">
        <div class="container">
            <div class="section-header text-center mb-12">
                <h2 class="section-title"><?php _e('أحدث الفرص', 'safar'); ?></h2>
                <p class="section-subtitle text-muted"><?php _e('تابع آخر المنح والوظائف المضافة', 'safar'); ?></p>
            </div>

            <div class="latest-grid grid grid-4">
                <?php
                $latest = new WP_Query([
                    'post_type' => ['scholarship', 'job', 'course', 'visa'],
                    'posts_per_page' => 8,
                    'orderby' => 'date',
                    'order' => 'DESC',
                ]);

                while ($latest->have_posts()) : $latest->the_post();
                    get_template_part('parts/content', 'card-compact');
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
