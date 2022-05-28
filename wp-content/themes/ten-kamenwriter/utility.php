<?php

function get_single_cat($linkClass = '')
{
    global $post;
    $output = "";
    $linkClass ? $catClass = 'c-link ' . $linkClass : $catClass = 'c-link';
    $cat = get_the_category($post->ID);
    if ($cat && !is_wp_error($cat)) {
        $output = '<a class="' . $catClass . '" href="' . get_category_link($cat[0]->term_id) . '"><i class="fas fa-folder-open"></i>' . $cat[0]->cat_name . '</a>';
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

function get_readtime()
{
    $post_id = get_post()->ID;
    $count = mb_strlen(strip_tags(get_post_field('post_content', $post_id)));
    $excerpt = mb_strlen(strip_tags(get_post_meta($post_id, 'meta_description', true)));
    $count = $count + $excerpt;
    $count = round($count / 600);
    $output = $count . '分';
    echo $output;
}

function my_human_time_diff($from, $to = '')
{
    if (empty($to)) {
        $to = time();
    }
    $diff = (int) abs($to - $from);
    // 条件: 3600秒 = 1時間以下なら (元のまま)
    if ($diff <= 3600) {
        $mins = round($diff / 60);
        if ($mins <= 1) {
            $mins = 1;
        }
        $since = sprintf(_n('%s min', '%s mins', $mins), $mins);
    }
    // 条件: 86400秒 = 24時間以下かつ、3600秒 = 1時間以上なら (元のまま)
    elseif (($diff <= 86400) && ($diff > 3600)) {
        $hours = round($diff / 3600);
        if ($hours <= 1) {
            $hours = 1;
        }
        $since = sprintf(_n('%s hour', '%s hours', $hours), $hours);
    }
    // 条件: 604800秒 = 7日以下かつ、86400秒 = 24時間以上なら (条件追加)
    elseif (($diff <= 604800) && ($diff > 86400)) {
        $days = round($diff / 86400);
        if ($days <= 1) {
            $days = 1;
        }
        $since = sprintf(_n('%s day', '%s days', $days), $days);
    }
    // 条件: 2678400秒 = 31日以下かつ、2678400秒 = 7日以上なら (条件追加)
    elseif (($diff <= 2678400) && ($diff > 604800)) {
        $weeks = round($diff / 604800);
        if ($weeks <= 1) {
            $weeks = 1;
        }
        $since = sprintf(_n('%s週間', '%s週間', $weeks), $weeks);
    }
    // 条件: 31536000秒 = 365日以下かつ、2678400秒 = 31日以上なら (条件追加)
    elseif (($diff <= 31536000) && ($diff > 2678400)) {
        $months = round($diff / 2678400);
        if ($months <= 1) {
            $months = 1;
        }
        $since = sprintf(_n('約%sヶ月', '約%sヶ月', $months), $months);
    }
    // 条件: 31536000秒 = 365日以上なら (条件追加)
    elseif ($diff >= 31536000) {
        $years = round($diff / 31536000);
        if ($years <= 1) {
            $years = 1;
        }
        $since = sprintf(_n('約%s年', '約%s年', $years), $years);
    }
    return $since;
}
