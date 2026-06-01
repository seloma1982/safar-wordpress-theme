<?php
/**
 * The main template file
 *
 * @package Safar
 */

get_header();
?>

<main id="main" class="site-main">
    <?php if (have_posts()) : ?>

        <?php if (is_home() && !is_front_page()) : ?>
            <header class="page-header">
                <div class="container">
                    <h1 class="page-title"><?php single_post_title(); ?></h1>
                </div>
            </header>
        <?php endif; ?>

        <div class="container">
            <div class="posts-grid grid grid-3">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('safar-card', ['class' => 'card-image']); ?>
                            </a>
                        <?php endif; ?>

                        <div class="card-content">
                            <div class="post-meta text-sm text-muted mb-4">
                                <span class="post-date"><?php echo get_the_date(); ?></span>
                                <span class="separator">•</span>
                                <span class="reading-time"><?php echo safar_reading_time(); ?> <?php _e('دقيقة قراءة', 'safar'); ?></span>
                            </div>

                            <h2 class="card-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>

                            <div class="card-excerpt">
                                <?php the_excerpt(); ?>
                            </div>

                            <div class="mt-4">
                                <a href="<?php the_permalink(); ?>" class="btn btn-outline btn-sm">
                                    <?php _e('اقرأ المزيد', 'safar'); ?>
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <?php the_posts_pagination(); ?>
        </div>

    <?php else : ?>
        <div class="container">
            <p><?php _e('لا توجد مقالات حالياً.', 'safar'); ?></p>
        </div>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
