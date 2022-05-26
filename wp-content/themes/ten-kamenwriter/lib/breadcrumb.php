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
            $output .= 'news archive';
        } else {
            if (is_tag()) {
                $output .= '<li class="c-bread-list__item"><a class="c-link c-link:breadcrumb" href="#">名前変更予定</a></li><li class="c-bread-list__item"><a class="c-link c-link:breadcrumb" href="' . home_url('/tag/') . esc_html(single_term_title('', false)) . '" aria-current="page">' . single_term_title('', false) . '</a></li>';
            } else {
                $output .= '<li class="c-bread-list__item"><a class="c-link c-link:breadcrumb" href="#">名称変更予定</a></li>';
                $cat = get_queried_object();
                if ($cat -> parent != 0) {
                    $ancestors = array_reverse(get_ancestors($cat->cat_ID, 'category'));
                    foreach ($ancestors as $ancestor) {
                        $output .='<li class="c-bread-list__item"><a class="c-link c-link:breadcrumb" href="'. esc_url(get_category_link($ancestor)) .'">'. esc_attr(get_cat_name($ancestor)) .'</a></li>'."\n";
                    }
                }
                $output .='<li class="c-bread-list__item"><a href="'. esc_url(get_category_link($cat->term_id)). '" class="c-link c-link:breadcrumb" aria-current="page">'. esc_attr($cat->cat_name) . '</a></li>'."\n";
            }
        }
    } elseif (is_single()) {
        if ('news' == get_post_type()) {
            $output .= '<li class="c-bread-list__item"><a class="c-link c-link:breadcrumb" href="'. esc_url(home_url('/news/')).'">'. esc_html(get_post_type_object(get_post_type())->label) .'</a></li><li class="c-bread-list__item"><a href="' . esc_url(get_permalink($post->ID)) . '" class="c-link c-link:breadcrumb" aria-current="page">' . get_the_title($post->ID) . '</a></li>';
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
    }
    $output .= '</ol></nav>';
    return $output;
}
