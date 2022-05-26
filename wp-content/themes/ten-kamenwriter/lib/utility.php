<?php

function get_single_cat()
{
    global $post;
    $output = "";
    $cat = get_the_category($post->ID);
    if ($cat && !is_wp_error($cat)) {
        $output = '<a class="c-link:bottomCat" href="' . get_category_link($cat[0]->term_id) . '"><i class="fas fa-folder-open"></i>' . $cat[0]->cat_name . '</a>';
    }
    if ($output) {
        return $output;
    }
}

function get_post_tag()
{
    global $post;
    $output = "";
    $tags = wp_get_object_terms($post->ID, 'post_tag');
    if ($tags && ! is_wp_error($tags)) {
        $output = '<div class="o-cluster">';
        foreach ($tags as $tagname) {
            $output .= '<a href="' . get_term_link($tagname) . '" rel="tag" class="c-link c-link:tag">' . $tagname->name . '</a>';
        }
        $output .= '</div>';
    }
    if ($output) {
        return $output;
    }
}
