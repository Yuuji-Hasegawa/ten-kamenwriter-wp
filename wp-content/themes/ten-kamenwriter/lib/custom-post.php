<?php

add_action('init', 'create_post_type');
function create_post_type()
{
    register_post_type(
        'news', /* post-type */
    array(
      'labels' => array(
        'name' => 'お知らせ',
        'singular_name' => 'お知らせ',
        'add_new_item' => 'お知らせの新規追加',
        'edit_item' => 'お知らせの編集'
      ),
      'public' => true,
      'menu_position' =>10,
      'has_archive' => true,
      'supports' => array('title','editor')
    )
    );
}

add_action('init', 'myposttype_rewrite');
function myposttype_rewrite()
{
    global $wp_rewrite;
    $queryarg = 'post_type=news&p=';
    $wp_rewrite->add_rewrite_tag('%news_id%', '([^/]+)', $queryarg);
    $wp_rewrite->add_permastruct('news', '/news/%news_id%', false);
}

add_filter('post_type_link', 'myposttype_permalink', 1, 3);

function myposttype_permalink($post_link, $id = 0, $leavename)
{
    global $wp_rewrite;
    $post = get_post($id);
    if (is_wp_error($post)) {
        return $post;
    }
    $newlink = $wp_rewrite->get_extra_permastruct($post->post_type);
    $newlink = str_replace('%'.$post->post_type.'_id%', $post->ID, $newlink);
    $newlink = home_url(user_trailingslashit($newlink));
    return $newlink;
}
