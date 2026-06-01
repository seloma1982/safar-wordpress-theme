<?php
/**
 * Content Card Template
 *
 * @package Safar
 */

$post_type = get_post_type();
$post_type_label = get_post_type_object($post_type)->labels->singular_name;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card featured-card'); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <a href="<?php the_permalink(); ?>" class="card-image-wrapper">
            <?php the_post_thumbnail('safar-card', ['class' => 'card-image']); ?>
        </a>
    <?php else : ?>
        <a href="<?php the_permalink(); ?>" class="card-image-wrapper">
            <div class="card-image placeholder">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <?php if ($post_type === 'scholarship') : ?>
                        <path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/>
                    <?php elseif ($post_type === 'job') : ?>
                        <rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
                    <?php else : ?>
                        <circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
                    <?php endif; ?>
                </svg>
            </div>
        </a>
    <?php endif; ?>

    <div class="card-content">
        <!-- Badge -->
        <div class="card-badge">
            <span class="badge badge-<?php echo esc_attr($post_type); ?>">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                    <?php if ($post_type === 'scholarship') : ?>
                        <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                    <?php elseif ($post_type === 'job') : ?>
                        <rect x="2" y="7" width="20" height="14" rx="2"/>
                    <?php else : ?>
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                    <?php endif; ?>
                </svg>
                <?php echo esc_html($post_type_label); ?>
            </span>
        </div>

        <h3 class="card-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>

        <div class="card-excerpt">
            <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
        </div>

        <div class="card-meta flex items-center justify-between mt-4">
            <div class="flex items-center gap-2 text-sm text-muted">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                <?php echo safar_reading_time(); ?> <?php _e('دقيقة', 'safar'); ?>
            </div>
            <div class="flex items-center gap-2 text-sm text-muted">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                <?php echo safar_get_views(); ?>
            </div>
        </div>
    </div>
</article>
