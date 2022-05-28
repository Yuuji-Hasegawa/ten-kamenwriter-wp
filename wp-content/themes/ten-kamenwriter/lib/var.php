<?php

function get_vars($parent = '', $child = '')
{
    $json = file_get_contents(get_template_directory() . '/_data/config.json');
    $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    $arr = json_decode($json, true);
    $output = $arr[$parent][$child];
    if ($output) {
        return $output;
    }
}

function get_ogp_type()
{
    is_single() ? $og_type = 'article' : $og_type = 'website';
    return $og_type;
}

function get_company_mail()
{
    $mail = get_vars('company', 'mail');
    $output = $mail['primary'];
    if ($output) {
        return $output;
    } else {
        return $output = "info@" . get_domain();
    }
}
add_shortcode('company_mail', 'get_company_mail');

function get_noreply_mail()
{
    $mail = get_vars('company', 'mail');
    $output = $mail['sendonly'];
    if ($output) {
        return $output;
    } else {
        return $output = "noreply@" . get_domain();
    }
}
