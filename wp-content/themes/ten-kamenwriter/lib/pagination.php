<?php

function get_pagination()
{
    global $wp_query;
    $bignum = 999999999;
    if ($wp_query->max_num_pages <= 1) {
        return;
    }
    $paged        = get_query_var('paged') ? intval(get_query_var('paged')) : 1;
    $pagenum_link = html_entity_decode(get_pagenum_link());
    $query_args   = array();
    $url_parts    = explode('?', $pagenum_link);
    if (isset($url_parts[1])) {
        wp_parse_str($url_parts[1], $query_args);
    }
    $pagenum_link = remove_query_arg(array_keys($query_args), $pagenum_link);
    $pagenum_link = trailingslashit($pagenum_link). '%_%';
    $format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos($pagenum_link, 'index.php') ? 'index.php/' : '';
    $format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit('page/%#%', 'paged') : '?paged=%#%';
    $pages = paginate_links(array(
      'base'     => $pagenum_link,
      'format'   => $format,
      'total'    => $GLOBALS['wp_query']->max_num_pages,
      'current'  => $paged,
      'end_size'     => 1,
      'mid_size'     => 1,
      'add_args' => array_map('urlencode', $query_args),
      'prev_text'    => '<i class="fa fa-fw fa-angle-left"></i>',
      'next_text'    => '<i class="fa fa-fw fa-angle-right"></i>',
      'type'      => 'array'
    ));
    $pages = str_replace('<span class="page-numbers dots">&hellip;</span>', '', $pages);
    $pages = str_replace('<a class="page-numbers"', '<a class="c-btn c-btn:pager"', $pages);
    $pages = str_replace('<a class="prev page-numbers"', '<a class="c-btn c-btn:pager"', $pages);
    $pages = str_replace('<a class="next page-numbers"', '<a class="c-btn c-btn:pager"', $pages);
    $pages = str_replace('class="page-numbers current"', 'class="c-btn c-btn:pager"', $pages);

    if (is_array($pages)) {
        $output = '<nav class="c-pagination" aria-label="Pagination"><ol class="o-grid o-grid:pagination">';
        foreach ($pages as $page) {
            if ($page == null) {
                continue;
            } else {
                $output .= '<li>' . $page . '</li>';
            }
        }
        $output .= '</ol></nav>';
    }
    return $output;
}
