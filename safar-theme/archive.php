<?php
/**
 * Archive Template
 *
 * @package Safar
 */

get_header();
?>

<main id="main" class="site-main archive-main">
    <?php echo safar_breadcrumbs(); ?>

    <div class="container py-12">
        <!-- Archive Header -->
        <header class="archive-header mb-12 text-center">
            <?php
            the_archive_title('<h1 class="archive-title">', '</h1>');
            the_archive_description('<div class="archive-description text-muted">', '</div>');
            ?>
        </header>

        <!-- Filters -->
        <div class="archive-filters glass mb-8 p-6">
            <div class="flex flex-wrap gap-4 items-center justify-center">
                <!-- Category Filter -->
                <?php if ($categories = get_terms(['taxonomy' => 'opportunity-category', 'hide_empty' => true])) : ?>
                <div class="filter-group">
                    <label class="filter-label text-sm text-muted mb-2 block"><?php _e('التصنيف', 'safar'); ?></label>
                    <select name="category-filter" class="filter-select">
                        <option value=""><?php _e('الكل', 'safar'); ?></option>
                        <?php foreach ($categories as $cat) : ?>
                            <option value="<?php echo esc_attr($cat->slug); ?>" <?php selected(get_query_var('opportunity-category'), $cat->slug); ?>>
                                <?php echo esc_html($cat->name); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <?php endif; ?>

                <!-- Sort -->
                <div class="filter-group">
                    <label class="filter-label text-sm text-muted mb-2 block"><?php _e('ترتيب حسب', 'safar'); ?></label>
                    <select name="sort-filter" class="filter-select">
                        <option value="date"><?php _e('الأحدث', 'safar'); ?></option>
                        <option value="views"><?php _e('الأكثر مشاهدة', 'safar'); ?></option>
                        <option value="title"><?php _e('العنوان', 'safar'); ?></option>
                    </select>
                </div>

                <!-- View Mode -->
                <div class="filter-group">
                    <label class="filter-label text-sm text-muted mb-2 block"><?php _e('طريقة العرض', 'safar'); ?></label>
                    <div class="view-modes flex gap-2">
                        <button class="view-mode-btn active" data-mode="grid">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                        </button>
                        <button class="view-mode-btn" data-mode="list">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Posts Grid -->
        <?php if (have_posts()) : ?>
            <div class="posts-grid grid grid-3">
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('parts/content', 'card'); ?>
                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
            <?php the_posts_pagination([
                'mid_size' => 2,
                'prev_text' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"/></svg>',
                'next_text' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>',
            ]); ?>

        <?php else : ?>
            <div class="no-results text-center py-20">
                <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="var(--muted-foreground)" stroke-width="1">
                    <circle cx="11" cy="11" r="8"/>
                    <path d="m21 21-4.35-4.35"/>
                    <path d="M11 8v6M8 11h6"/>
                </svg>
                <h2 class="text-2xl font-bold mt-6 mb-2"><?php _e('لا توجد نتائج', 'safar'); ?></h2>
                <p class="text-muted mb-8"><?php _e('حاول تغيير معايير البحث أو التصفية', 'safar'); ?></p>
                <a href="<?php echo esc_url(get_post_type_archive_link(get_post_type())); ?>" class="btn btn-primary">
                    <?php _e('عرض الكل', 'safar'); ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
