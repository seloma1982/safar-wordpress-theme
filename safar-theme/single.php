<?php
/**
 * Single Post Template
 *
 * @package Safar
 */

get_header();

// Increment views
safar_set_views(get_the_ID());
?>

<main id="main" class="site-main">
    <?php echo safar_breadcrumbs(); ?>

    <div class="container py-12">
        <div class="single-post-wrapper">
            <article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>

                <!-- Post Header -->
                <header class="post-header">
                    <div class="post-meta flex items-center gap-4 mb-6">
                        <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail">
                            <?php the_post_thumbnail('safar-hero'); ?>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="post-badges flex gap-2 mb-6">
                        <?php
                        $post_type = get_post_type();
                        $post_type_obj = get_post_type_object($post_type);
                        ?>
                        <span class="badge badge-<?php echo esc_attr($post_type); ?>">
                            <?php echo esc_html($post_type_obj->labels->singular_name); ?>
                        </span>

                        <?php if ($categories = get_the_terms(get_the_ID(), 'opportunity-category')) : ?>
                            <?php foreach ($categories as $cat) : ?>
                                <a href="<?php echo esc_url(get_term_link($cat)); ?>" class="badge badge-secondary">
                                    <?php echo esc_html($cat->name); ?>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                    <h1 class="post-title"><?php the_title(); ?></h1>

                    <div class="post-info flex items-center gap-6 text-sm text-muted mt-6">
                        <div class="flex items-center gap-2">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                            <span><?php echo get_the_date(); ?></span>
                        </div>

                        <div class="flex items-center gap-2">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                            <span><?php echo safar_reading_time(); ?> <?php _e('دقيقة قراءة', 'safar'); ?></span>
                        </div>

                        <div class="flex items-center gap-2">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                            <span><?php echo safar_get_views(); ?> <?php _e('مشاهدة', 'safar'); ?></span>
                        </div>
                    </div>
                </header>

                <!-- Post Content -->
                <div class="post-content">
                    <?php the_content(); ?>
                </div>

                <!-- Tags -->
                <?php if ($tags = get_the_terms(get_the_ID(), 'post_tag')) : ?>
                <div class="post-tags mt-8 pt-8 border-t">
                    <h3 class="text-lg font-bold mb-4"><?php _e('الوسوم', 'safar'); ?></h3>
                    <div class="flex flex-wrap gap-2">
                        <?php foreach ($tags as $tag) : ?>
                            <a href="<?php echo esc_url(get_term_link($tag)); ?>" class="badge badge-outline">
                                #<?php echo esc_html($tag->name); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Share -->
                <div class="post-share mt-8 pt-8 border-t">
                    <h3 class="text-lg font-bold mb-4"><?php _e('مشاركة', 'safar'); ?></h3>
                    <?php safar_social_share(); ?>
                </div>

                <!-- Author -->
                <div class="post-author mt-8 pt-8 border-t">
                    <div class="author-box glass flex items-start gap-6">
                        <div class="author-avatar">
                            <?php echo get_avatar(get_the_author_meta('ID'), 80); ?>
                        </div>
                        <div class="author-info">
                            <h4 class="author-name font-bold text-lg"><?php the_author(); ?></h4>
                            <p class="author-bio text-muted"><?php the_author_meta('description'); ?></p>
                        </div>
                    </div>
                </div>

                <!-- Related Posts -->
                <?php
                $related = new WP_Query([
                    'post_type' => get_post_type(),
                    'posts_per_page' => 4,
                    'post__not_in' => [get_the_ID()],
                    'orderby' => 'rand',
                ]);

                if ($related->have_posts()) :
                ?>
                <div class="related-posts mt-12">
                    <h3 class="text-xl font-bold mb-6"><?php _e('مقالات ذات صلة', 'safar'); ?></h3>
                    <div class="grid grid-4">
                        <?php while ($related->have_posts()) : $related->the_post(); ?>
                            <?php get_template_part('parts/content', 'card-compact'); ?>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Navigation -->
                <div class="post-navigation mt-12 flex justify-between">
                    <?php
                    $prev = get_previous_post();
                    $next = get_next_post();
                    ?>

                    <?php if ($prev) : ?>
                        <a href="<?php echo esc_url(get_permalink($prev)); ?>" class="nav-link prev">
                            <span class="nav-label"><?php _e('السابق', 'safar'); ?></span>
                            <span class="nav-title"><?php echo get_the_title($prev); ?></span>
                        </a>
                    <?php endif; ?>

                    <?php if ($next) : ?>
                        <a href="<?php echo esc_url(get_permalink($next)); ?>" class="nav-link next">
                            <span class="nav-label"><?php _e('التالي', 'safar'); ?></span>
                            <span class="nav-title"><?php echo get_the_title($next); ?></span>
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Comments -->
                <?php if (comments_open() || get_comments_number()) : ?>
                    <div class="post-comments mt-12">
                        <?php comments_template(); ?>
                    </div>
                <?php endif; ?>

            </article>
        </div>

        <!-- Sidebar -->
        <aside class="post-sidebar">
            <?php dynamic_sidebar('sidebar-1'); ?>
        </aside>
    </div>
</main>

<?php get_footer(); ?>
