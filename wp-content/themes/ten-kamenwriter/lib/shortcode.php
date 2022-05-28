<?php

function shortcode_sitename()
{
    return bloginfo('name');
}
add_shortcode('site_name', 'shortcode_sitename');

function shortcode_url()
{
    return home_url();
}
add_shortcode('url', 'shortcode_url');

function shortcode_templateurl()
{
    return get_template_directory_uri();
}
add_shortcode('template_url', 'shortcode_templateurl');

function get_company_name()
{
    return $output = get_vars('company', 'name');
}
add_shortcode('company_name', 'get_company_name');

function get_company_owner()
{
    return $output = get_vars('company', 'owner');
}
add_shortcode('company_owner', 'get_company_owner');

function get_company_zip()
{
    return $output = '〒' . get_vars('company', 'zip');
}
add_shortcode('company_zip', 'get_company_zip');

function get_company_address()
{
    return $output = get_vars('company', 'address');
}
add_shortcode('company_address', 'get_company_address');

function get_company_birth()
{
    return $output = get_vars('company', 'birth');
}
add_shortcode('company_birth', 'get_company_birth');

function get_term_domain()
{
    return $output = get_vars('term', 'domain');
}
add_shortcode('term_domain', 'get_term_domain');

function get_term_service()
{
    return $output = get_vars('term', 'servicename');
}
add_shortcode('term_service', 'get_term_service');

function get_term_ppacount()
{
    return $output = get_vars('term', 'ppacount');
}
add_shortcode('term_ppacount', 'get_term_ppacount');

function get_term_nouse()
{
    return $output = get_vars('term', 'nouse');
}
add_shortcode('term_nouse', 'get_term_nouse');

function get_term_noreply()
{
    return $output = get_vars('term', 'noreply');
}
add_shortcode('term_noreply', 'get_term_noreply');

function get_term_payterm()
{
    return $output = get_vars('term', 'payterm');
}
add_shortcode('term_payterm', 'get_term_payterm');

function get_term_court()
{
    return $output = get_vars('term', 'court');
}
add_shortcode('term_court', 'get_term_court');

function get_lisence()
{
    return $output = get_vars('basic', 'lisence');
}

function get_domain()
{
    $protocols = array( 'http://', 'https://', 'http://www.', 'https://www.', 'www.' );
    return str_replace($protocols, '', site_url());
}

function my_shortcode_wpcf7($output, $name)
{
    if (! isset($_POST['_wpcf7_unit_tag']) || empty($_POST['_wpcf7_unit_tag'])) {
        return $output;
    }
    if (! preg_match('/^wpcf7-f(\d+)-p(\d+)-o(\d+)$/', $_POST['_wpcf7_unit_tag'], $matches)) {
        return $output;
    }

    $post_id = (int) $matches[2];
    if (! $post = get_post($post_id)) {
        return $output;
    }
    $name = preg_replace('/^wpcf7\./', '_', $name);

    if ('_company_name' == $name) {
        $output = get_company_name();
    } elseif ('_company_owner' == $name) {
        $output = get_company_owner();
    } elseif ('_company_zip' == $name) {
        $output = get_company_zip();
    } elseif ('_company_email' == $name) {
        $output = get_company_mail();
    } elseif ('_noreply_email' == $name) {
        $output = get_noreply_mail();
    } elseif ('_company_address' == $name) {
        $output = get_company_address();
    }
    return $output;
}
add_filter('wpcf7_special_mail_tags', 'my_shortcode_wpcf7', 10, 2);
