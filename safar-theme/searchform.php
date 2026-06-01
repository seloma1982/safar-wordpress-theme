<?php
/**
 * Search Form Template
 *
 * @package Safar
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="search-wrapper flex">
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('ابحث...', 'placeholder', 'safar'); ?>" value="<?php echo get_search_query(); ?>" name="s">
        <button type="submit" class="search-submit btn btn-primary">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
            <span class="sr-only"><?php echo _x('بحث', 'submit button', 'safar'); ?></span>
        </button>
    </div>
</form>
