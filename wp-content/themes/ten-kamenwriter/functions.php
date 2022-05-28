<?php

require_once get_template_directory() . '/lib/breadcrumb.php';
require_once get_template_directory() . '/lib/custom-dashboard.php';
require_once get_template_directory() . '/lib/custom-post.php';
require_once get_template_directory() . '/lib/head.php';
require_once get_template_directory() . '/lib/hero.php';
require_once get_template_directory() . '/lib/pagination.php';
require_once get_template_directory() . '/lib/sub-loop.php';
require_once get_template_directory() . '/lib/toc.php';
require_once get_template_directory() . '/lib/utility.php';
require_once get_template_directory() . '/lib/var.php';
require_once get_template_directory() . '/lib/wpcf7_add.php';
require_once get_template_directory() . '/lib/script-load.php';
require_once get_template_directory() . '/lib/json-ld.php';

/* pre get post */
function my_get_posts($query)
{
    if (is_admin() || ! $query->is_main_query()) {
        return;
    }
    if ($query->is_front_page()) {
        $query->set('post_type', 'news');
        $query->set('posts_per_page', 5);
        $query->set('no_found_rows', true);
    } elseif ($query->is_archive()) {
        $query->set('posts_per_page', 12);
    }
}
add_action('pre_get_posts', 'my_get_posts');
