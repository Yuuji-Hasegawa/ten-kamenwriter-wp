<?php

function get_hero()
{
    $output = '<div class="c-hero"><div class="c-hero_bg"><picture class="o-frame o-frame:logo"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="' . get_template_directory_uri() . '/img/logo.svg" width="100%" height="100%" decoding="async" alt="ロゴ" /></picture></div><div class="c-hero_front">';
    is_front_page() ? $output .= '<h1 class="c-hero_main">' . get_bloginfo('name') . '</h1><p class="c-hero_tagline">since 2013</p>' : $output .= '<h1 class="c-hero_main c-hero_main:page">' . get_my_title() . '</h1>';
    $output .= '</div></div>';
    return $output;
}
