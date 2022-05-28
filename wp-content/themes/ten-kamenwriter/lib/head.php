<?php

add_theme_support('title-tag');
add_filter('get_the_archive_title', function ($title) {
    if (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    } elseif (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } else {
        $title = get_the_archive_title($post->ID);
    }
    return $title;
});

function get_my_title()
{
    if (is_404()) {
        $my_title = '見つかりませんでした';
    } elseif (is_post_type_archive()) {
        $my_title = post_type_archive_title('', false) . '一覧';
    } elseif (is_category()) {
        $my_title = 'カテゴリー：' . single_cat_title('', false);
    } elseif (is_tag()) {
        $my_title = 'タグ：' . single_tag_title('', false);
    } elseif (is_archive()) {
        $my_title = get_the_archive_title() . '一覧';
    } elseif (is_attachment()) {
        $my_title = '添付ファイル：' . get_the_title();
    } else {
        $my_title = get_the_title();
    }
    return $my_title;
}
function meta_title()
{
    $title = get_my_title();
    if (!is_front_page()) {
        $meta_title = $title . ' | ' . get_bloginfo('name');
    } else {
        $meta_title = get_bloginfo('name');
    }
    return $meta_title;
}
add_filter('pre_get_document_title', 'meta_title');

function get_last_modified_date()
{
    $date = array(
      get_the_modified_time("Y"),
      get_the_modified_time("m"),
      get_the_modified_time("d")
    );
    $time = array(
      get_the_modified_time("H"),
      get_the_modified_time("i"),
      get_the_modified_time("s"),
    );
    $time_str = implode("-", $date) . "T" . implode(":", $time) . "+09:00";
    return date("r", strtotime($time_str));
}
function add_last_modified()
{
    if (is_single()) {
        header(sprintf("Last-Modified: %s", get_last_modified_date()));
    }
}
add_filter('the_content', 'wpautop_filter', 9);
function wpautop_filter($content)
{
    remove_filter('the_content', 'wpautop');
    remove_filter('the_excerpt', 'wpautop');
    return $content;
}
add_filter('wpcf7_autop_or_not', '__return_false');

function no_self_ping(&$links)
{
    $home = get_option('home');
    foreach ($links as $l => $link) {
        if (0 === strpos($link, $home)) {
            unset($links[$l]);
        }
    }
}
add_action('pre_ping', 'no_self_ping');
remove_action('wp_head', 'feed_links', 2); //サイト全体のフィード
remove_action('wp_head', 'feed_links_extra', 3); //その他のフィード
remove_action('wp_head', 'rsd_link'); //Really Simple Discoveryリンク
remove_action('wp_head', 'wlwmanifest_link'); //Windows Live Writerリンク
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); //前後の記事リンク
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0); //ショートリンク
remove_action('wp_head', 'wp_generator'); //WPバージョン
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'rest_output_link_wp_head');
add_filter('emoji_svg_url', '__return_false');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action('wp_head', 'rel_canonical');
remove_filter('wp_robots', 'wp_robots_max_image_preview_large');
add_filter('wp_resource_hints', 'remove_dns_prefetch', 10, 2);
function remove_dns_prefetch($hints, $relation_type)
{
    if ('dns-prefetch' === $relation_type) {
        return array_diff(wp_dependencies_unique_hosts(), $hints);
    }
    return $hints;
}
function my_robots()
{
    /*
    if ('0' != get_option('blog_public')) {
        if (is_page() || is_single() || is_singular() || is_home()) {
            $robots = 'index, follow';
        } elseif (is_paged() || is_tag() || is_date() || is_archive() || is_category() || is_tax()) {
            $robots = 'noindex, follow';
        } elseif (is_search() || is_404() || is_attachment()) {
            $robots = 'noindex, nofollow';
        }
        return '<meta name="robots" content="' . $robots .'">';
    }
    */
    return '<meta name="robots" content="noindex nofollow">';
}
function my_canonical()
{
    global $post;
    $canonical = '';
    if (is_404()) {
        $protocol = empty($_SERVER["HTTPS"]) ? "http://" : "https://";
        $canonical = esc_url($protocol. $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);
    } elseif (is_single() || is_page()) {
        $canonical = esc_url(get_permalink($post->ID));
    } elseif (is_archive()) {
        if (is_post_type_archive()) {
            if (is_post_type_archive('news')) {
                $canonical = esc_url(home_url('/news/'));
            } else {
                $canonical = home_url('/' . esc_attr(get_vars('basic', 'postSlug')) . '/');
            }
        } elseif (is_tag()) {
            $canonical = home_url('/tag/') . esc_html(single_term_title('', false));
        } elseif (is_category()) {
            $cat = get_queried_object();
            $canonical = esc_url(get_category_link($cat->term_id));
        }
    } else {
        $canonical = home_url();
    }
    return '<link rel="canonical" href="' . $canonical . '">';
}
function my_keywords()
{
    global $post;
    $keywords = '';
    $base_keywords = get_vars('basic', 'keywords');
    if ($base_keywords) {
        $keywords .= $base_keywords[0];
        for ($i = 1; $i < count($base_keywords); $i++) {
            $keywords .= ',' . $base_keywords[$i];
        }
    }
    $add_keywords = get_post_meta($post->ID, 'meta_keywords', true);
    if ($add_keywords) {
        $keywords .= ',' . $add_keywords;
    }
    return $keywords;
}
function my_description()
{
    global $post;
    $output = '';
    if (is_page() || is_single()) {
        $meta_description = esc_html(get_post_meta($post->ID, 'meta_description', true));
        if (!empty($meta_description)) {
            if (mb_strlen($meta_description, 'UTF-8') > 200) {
                $output = mb_substr($meta_description, 0, 200, 'UTF-8') . '……';
            } else {
                $output = $meta_description;
            }
        } else {
            $output = get_bloginfo('description');
        }
    } else {
        $output = get_bloginfo('description');
    }
    return $output;
}
function my_ogp()
{
    global $post;
    if (is_single() || is_page()) {
        $ogp_url = esc_url(get_permalink($post->ID));
        $ogp_title = esc_html(get_the_title($post->ID));
    } else {
        $ogp_url = home_url();
        $ogp_title = get_bloginfo('name');
    }
    $ogp = '<meta property="og:locale" content="' . get_vars('sns', 'locale') . '">';
    $ogp .= '<meta property="article:publisher" content="' . get_vars('sns', 'fb') . '">';
    $ogp .= '<meta property="og:description" content="' . my_description() . '">';
    $ogp .= '<meta property="og:type" content="' . get_ogp_type() . '">';
    $ogp .= '<meta property="og:title" content="'. $ogp_title . '">';
    $ogp .= '<meta property="og:url" content="' . $ogp_url . '">';
    $ogp .= '<meta property="og:site_name" content="' . get_vars('basic', 'name') . '">';
    $ogp .= '<meta property="og:image" content="'. get_template_directory_uri() . '/ogp.png">';
    $ogp .= '<meta name="twitter:card" content="' . get_vars('sns', 'twcard') . '">';
    $ogp .= '<meta name="twitter:site" content="@' . get_vars('sns', 'twsite') . '">';
    $ogp .= '<meta name="twitter:description" content="' . my_description() . '">';
    $ogp .= '<meta name="twitter:title" content="' . $ogp_title . '">';
    $ogp .= '<meta name="twitter:creator" content="@' . get_vars('sns', 'twcreator') . '">';
    $ogp .= '<meta name="twitter:image:src" content="'. get_template_directory_uri() . '/ogp.png">';
    return $ogp;
}
function add_head()
{
    $inserts = '<meta content="telephone=no" name="format-detection" />';
    $inserts .= '<meta content="address=no" name="format-detection" />';
    $inserts .= my_robots();
    $inserts .= my_canonical();
    $inserts .= my_ogp();
    $inserts .= '<link rel="icon" href="' . get_template_directory_uri() . '/favicon.ico" />';
    $inserts .= '<link rel="apple-touch-icon" sizes="180×180" href="' .  get_template_directory_uri() . '/icons/icon-180x180.png" />';
    echo $inserts;
}
add_action('wp_head', 'add_head');
