<?php

function insert_redume($the_content)
{
    if ('news' != get_post_type() && is_single()) {
        $pattern = '/<([hH][1-6]).*?>(.*?)<\/[hH][1-6].*?>/u';
        preg_match_all($pattern, $the_content, $elements, PREG_SET_ORDER);
        if (count($elements) >= 1) {
            $output = '';
            $i = 0;
            $currentlevel = 0;
            $id = 'chapter';
            foreach ($elements as $element) {
                $replace_title = preg_replace('/<([hH][1-6].*?)>(.+)<(\/[hH][1-6])>/u', '<$1><span id="' . $id . '">$2</span><$3>', $element[0]);
                $the_content = str_replace($element[0], $replace_title, $the_content);
                if (strpos($element[0], '<h2') !== false) {
                    $level = 1;
                } elseif (strpos($element[0], '<h3') !== false) {
                    $level = 2;
                } elseif (strpos($element[0], '<h4') !== false) {
                    $level = 3;
                } elseif (strpos($element[0], '<h5') !== false) {
                    $level = 4;
                } elseif (strpos($element[0], '<h6') !== false) {
                    $level = 5;
                }
                while ($currentlevel < $level) {
                    if ($currentlevel === 0) {
                        $output .= '<ul id="redumeBody" class="c-list c-list:redume">';
                    } else {
                        $output .= '<ul class="c-list">';
                    }
                    $currentlevel++;
                }
                while ($currentlevel > $level) {
                    $output .= '</li></ul>';
                    $currentlevel--;
                }
                $output .= '<li><a href="#' . $id . '" class="c-link">' . strip_tags($element[2]) . '</a>';
                $i++;
                $id =  'chapter-' . $i;
            }
            while ($currentlevel > 0) {
                $output .= '</li></ul>';
                $currentlevel--;
            }
            $index = '<div class="o-box o-box:redume"><button id="redumeBtn" class="o-has-icon o-has-icon:redume" type="button"><i class="fas fa-list"></i>目次<span class="c-redume-marker"><i class="fas fa-caret-down"></i></span></button>' . $output . '</div>';
            $h2 = '/<h2.*?>/i';
            if (preg_match($h2, $the_content, $h2s)) {
                $the_content = preg_replace($h2, $index . $h2s[0], $the_content, 1);
            }
        }
    }
    return $the_content;
}
  add_filter('the_content', 'insert_redume');
