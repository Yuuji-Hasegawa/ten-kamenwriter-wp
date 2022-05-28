<?php

function get_breadcrumb()
{
    global $post;
    $output = '<nav class="c-bread-list__outer" aria-label="Breadcrumb"><ol class="c-bread-list"><li class="c-bread-list__item"><a href="' . home_url() . '" class="c-link c-link:breadcrumb"><i class="fas fa-home"></i></a></li>';
    if (is_page()) {
        if ($post -> post_parent != 0) {
            $ancestors = array_reverse(get_post_ancestors($post->ID));
            foreach ($ancestors as $ancestor) {
                $output .='<li class="c-bread-list__item"><a class="c-link c-link:breadcrumb" href="'. esc_url(get_permalink($ancestor)).'">'. esc_attr(get_the_title($ancestor)) .'</a></li>';
            }
        }
        $output .= '<li class="c-bread-list__item"><a href="' . esc_url(get_permalink($post->ID)) . '" class="c-link c-link:breadcrumb" aria-current="page">' . get_the_title($post->ID) . '</a></li>';
    } elseif (is_archive()) {
        if (is_post_type_archive()) {
            if (is_post_type_archive('news')) {
                $output .= '<li class="c-bread-list__item"><a class="c-link c-link:breadcrumb" href="'. esc_url(home_url('/news/')).'" aria-current="page">'. esc_html(get_post_type_object(get_post_type())->label) . '一覧' .'</a></li>';
            } else {
                $output .= '<li class="c-bread-list__item"><a class="c-link c-link:breadcrumb" href="' . home_url('/' . esc_attr(get_vars('basic', 'postSlug')) . '/') .'"  aria-current="page">' . esc_attr(get_vars('basic', 'postName')) . '一覧</a></li>';
            }
        } else {
            if (is_tag()) {
                $output .= '<li class="c-bread-list__item"><a class="c-link c-link:breadcrumb" href="' . home_url('/' . esc_attr(get_vars('basic', 'postSlug')) . '/') .'">' . esc_attr(get_vars('basic', 'postName')) . '一覧</a></li><li class="c-bread-list__item"><a class="c-link c-link:breadcrumb" href="' . home_url('/tag/') . esc_html(single_term_title('', false)) . '" aria-current="page">' . single_term_title('', false) . '</a></li>';
            } else {
                $output .= '<li class="c-bread-list__item"><a class="c-link c-link:breadcrumb" href="' . home_url('/' . esc_attr(get_vars('basic', 'postSlug')) . '/') .'">' . esc_attr(get_vars('basic', 'postName')) . '一覧</a></li>';
                $cat = get_queried_object();
                if ($cat -> parent != 0) {
                    $ancestors = array_reverse(get_ancestors($cat->cat_ID, 'category'));
                    foreach ($ancestors as $ancestor) {
                        $output .='<li class="c-bread-list__item"><a class="c-link c-link:breadcrumb" href="'. esc_url(get_category_link($ancestor)) .'">'. esc_attr(get_cat_name($ancestor)) .'</a></li>'."\n";
                    }
                }
                $output .='<li class="c-bread-list__item"><a href="'. esc_url(get_category_link($cat->term_id)) . '" class="c-link c-link:breadcrumb" aria-current="page">'. esc_attr($cat->cat_name) . '</a></li>'."\n";
            }
        }
    } elseif (is_single()) {
        if ('news' == get_post_type()) {
            $output .= '<li class="c-bread-list__item"><a class="c-link c-link:breadcrumb" href="'. esc_url(home_url('/news/')).'">'. esc_html(get_post_type_object(get_post_type())->label) . '一覧' .'</a></li><li class="c-bread-list__item"><a href="' . esc_url(get_permalink($post->ID)) . '" class="c-link c-link:breadcrumb" aria-current="page">' . get_the_title($post->ID) . '</a></li>';
        } elseif (is_attachment()) {
            $output .= '<li class="c-bread-list__item"><a href="'. get_permalink($post->ID) .'" class="c-link c-link:breadcrumb" aria-current="page">'. '添付ファイル：' . wp_title('', false) .'</a></li>';
        } else {
            $cat = get_the_category($post->ID);
            if (!$cat) {
                return false;
            }
            $cat = $cat[0];
            if ($cat -> parent != 0) {
                $ancestors = array_reverse(get_ancestors($cat->cat_ID, 'category'));
                foreach ($ancestors as $ancestor) {
                    $output .='<li class="c-bread-list__item"><a class="c-link c-link:breadcrumb" href="' . esc_url(get_category_link($ancestor)).'">' . esc_attr(get_cat_name($ancestor)). '</a></li>';
                }
            }
            $output .= '<li class="c-bread-list__item"><a class="c-link c-link:breadcrumb" href="'. esc_url(get_category_link($cat->term_id)). '">'. esc_attr($cat->cat_name) . '</a></li><li class="c-bread-list__item"><a href="' . esc_url(get_permalink($post->ID)) . '" class="c-link c-link:breadcrumb" aria-current="page">' . get_the_title($post->ID) . '</a></li>';
        }
    } elseif (is_404()) {
        $protocol = empty($_SERVER["HTTPS"]) ? "http://" : "https://";
        $output .= '<li class="c-bread-list__item"><a href="' . esc_url($protocol. $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]) . '" class="c-link c-link:breadcrumb" aria-current="page">見つかりませんでした。</a></li>';
    } else {
        $output .= '<li class="c-bread-list__item"><a href="'. esc_url(get_permalink($post->ID)) .'" class="c-link c-link:breadcrumb" aria-current="page">'. wp_title('', false) .'</a></li>';
    }
    $output .= '</ol></nav>';
    return $output;
}
