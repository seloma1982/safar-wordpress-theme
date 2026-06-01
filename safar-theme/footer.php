<?php
/**
 * Footer Template
 *
 * @package Safar
 */
?>
    </div><!-- #content -->

    <footer id="colophon" class="site-footer">
        <!-- Newsletter Section -->
        <?php if (safar_get_option('show_newsletter', true)) : ?>
        <div class="newsletter-section">
            <div class="container">
                <div class="newsletter-wrapper glass">
                    <div class="newsletter-content text-center">
                        <h2 class="newsletter-title"><?php echo esc_html(safar_get_option('newsletter_title', __('اشترك في نشرتنا البريدية', 'safar'))); ?></h2>
                        <p class="newsletter-subtitle text-muted"><?php echo esc_html(safar_get_option('newsletter_subtitle', __('احصل على أحدث الفرص والمنح والوظائف مباشرة في بريدك الإلكتروني', 'safar'))); ?></p>

                        <form class="newsletter-form flex gap-3 items-center justify-center">
                            <input type="email" placeholder="<?php _e('بريدك الإلكتروني', 'safar'); ?>" required>
                            <button type="submit" class="btn btn-primary"><?php _e('اشترك الآن', 'safar'); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Main Footer -->
        <div class="footer-main">
            <div class="container">
                <div class="footer-grid grid grid-4 py-20">
                    <!-- About -->
                    <div class="footer-column">
                        <div class="footer-logo flex items-center gap-2 mb-8">
                            <div class="logo-icon" style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="white"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                            </div>
                            <span class="gradient-text font-bold text-2xl"><?php bloginfo('name'); ?></span>
                        </div>
                        <p class="footer-text text-muted">
                            <?php echo esc_html(safar_get_option('footer_text', __('بوابتك الشاملة للمنح الدراسية وفرص العمل والهجرة الآمنة حول العالم.', 'safar'))); ?>
                        </p>
                        <div class="footer-social flex gap-4 mt-8">
                            <?php if ($facebook = safar_get_option('facebook')) : ?>
                                <a href="<?php echo esc_url($facebook); ?>" target="_blank" rel="noopener" class="social-link">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
                                </a>
                            <?php endif; ?>
                            <?php if ($twitter = safar_get_option('twitter')) : ?>
                                <a href="<?php echo esc_url($twitter); ?>" target="_blank" rel="noopener" class="social-link">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/></svg>
                                </a>
                            <?php endif; ?>
                            <?php if ($instagram = safar_get_option('instagram')) : ?>
                                <a href="<?php echo esc_url($instagram); ?>" target="_blank" rel="noopener" class="social-link">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z" fill="none" stroke="currentColor" stroke-width="2"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5" stroke="currentColor" stroke-width="2"/></svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="footer-column">
                        <h3 class="footer-title mb-8"><?php _e('روابط سريعة', 'safar'); ?></h3>
                        <ul class="footer-links">
                            <li><a href="<?php echo esc_url(get_post_type_archive_link('scholarship')); ?>"><?php _e('المنح الدراسية', 'safar'); ?></a></li>
                            <li><a href="<?php echo esc_url(get_post_type_archive_link('job')); ?>"><?php _e('فرص العمل', 'safar'); ?></a></li>
                            <li><a href="<?php echo esc_url(get_post_type_archive_link('course')); ?>"><?php _e('الكورسات المجانية', 'safar'); ?></a></li>
                            <li><a href="<?php echo esc_url(get_post_type_archive_link('visa')); ?>"><?php _e('التأشيرات', 'safar'); ?></a></li>
                            <li><a href="<?php echo esc_url(get_post_type_archive_link('country')); ?>"><?php _e('الدول', 'safar'); ?></a></li>
                        </ul>
                    </div>

                    <!-- Categories -->
                    <div class="footer-column">
                        <h3 class="footer-title mb-8"><?php _e('التصنيفات', 'safar'); ?></h3>
                        <ul class="footer-links">
                            <?php
                            $categories = get_terms([
                                'taxonomy' => 'opportunity-category',
                                'hide_empty' => false,
                                'number' => 5,
                            ]);
                            foreach ($categories as $category) :
                            ?>
                                <li><a href="<?php echo esc_url(get_term_link($category)); ?>"><?php echo esc_html($category->name); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Contact -->
                    <div class="footer-column">
                        <h3 class="footer-title mb-8"><?php _e('تواصل معنا', 'safar'); ?></h3>
                        <ul class="footer-contact">
                            <?php if ($email = safar_get_option('contact_email')) : ?>
                                <li class="flex items-center gap-2">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                                    <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if ($phone = safar_get_option('contact_phone')) : ?>
                                <li class="flex items-center gap-2">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                                    <a href="tel:<?php echo esc_attr($phone); ?>"><?php echo esc_html($phone); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>

                        <?php if ($telegram = safar_get_option('telegram')) : ?>
                        <a href="<?php echo esc_url($telegram); ?>" target="_blank" rel="noopener" class="btn btn-primary mt-8">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M11.944 0A12 12 0 000 12a12 12 0 0012 12 12 12 0 0012-12A12 12 0 0012 0a12 12 0 00-.056 0zm4.962 7.9c.1.2-.4.9-.9 1.9l-.04.08a10 10 0 01-.3.7c-.2.5-.4.8-.6.9l-.6.2-.6-.1-.5-.2-.7-.3-1.6-.6c-1-.4-2-.8-2.4-1l-.1 0-.1 0c-.4-.2-.7-.3-.9-.5-.1-.1-.2-.2-.3-.4-.1-.1-.2-.3-.2-.4 0-.2 0-.3.1-.5.1-.3.3-.5.8-.7l6.4-2.8c.7-.3 1.2-.4 1.6-.2.2.1.3.2.4.3l.2.3c0 .1.1.1.1.2l.1.3c0 .2 0 .3-.1.5s-.1.3-.2.5z"/></svg>
                            <?php _e('تابعنا على تليجرام', 'safar'); ?>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-wrapper flex justify-between items-center py-8">
                    <div class="copyright text-sm text-muted">
                        <?php echo esc_html(safar_get_option('copyright', sprintf(__('© %s جميع الحقوق محفوظة. سفر - بوابة الفرص العالمية', 'safar'), date('Y')))); ?>
                    </div>
                    <div class="footer-bottom-links flex gap-4 text-sm">
                        <a href="#"><?php _e('سياسة الخصوصية', 'safar'); ?></a>
                        <a href="#"><?php _e('شروط الاستخدام', 'safar'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="back-to-top" class="back-to-top hidden" aria-label="<?php _e('العودة للأعلى', 'safar'); ?>">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="18 15 12 9 6 15"/></svg>
    </button>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
