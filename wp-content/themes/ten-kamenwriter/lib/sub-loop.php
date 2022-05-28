<?php

function get_front_topics()
{
    $output = '';
    $args = array(
        'posts_per_page' => 3,
        'orderby' => 'date',
        'order' => 'DESC',
        'no_found_rows' => true
    );
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) {
        $output .= '<ul class="o-grid o-grid:blogList">';
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $output .= '<li><a href="' . get_the_permalink() . '"><picture class="o-frame"><source data-srcset="' . get_template_directory_uri() .'/img/thumb.avif" type="image/avif" /><source data-srcset="' . get_template_directory_uri() .'/img/thumb.webp" type="image/webp" /><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="' . get_template_directory_uri() .'/img/thumb.png" alt="' . get_the_title() . '" /></picture><span class="c-topic-title">' . get_the_title() . '</span></a><span><span class="o-has-icon o-has-icon:cat">' . get_single_cat('c-link:bottomCat') . '</span><span class="c-memo">読了見込 ' . get_readtime() .'・<time datetime="' . get_the_time('Y-m-d') .'">' . my_human_time_diff(get_post_time('U', true)) . '前</time></span></span></li>';
        }
        wp_reset_postdata();
        $output .= '</ul><a href="' . home_url('/' . esc_html(get_vars('basic', 'postSlug')) . '/') . '" class="c-btn c-btn:topicList">Topics 一覧</a>';
    }
    if ($output) {
        return $output;
    } else {
        return $output .= '<p>記事はまだありません。</p>';
    }
}
