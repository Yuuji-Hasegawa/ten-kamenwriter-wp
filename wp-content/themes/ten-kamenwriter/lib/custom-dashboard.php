<?php

add_theme_support('post-thumbnails');
function add_my_box()
{
    $addtype = array( 'post', 'page', 'news' );
    add_meta_box('meta_info', 'ページ情報', 'meta_info_form', $addtype, 'normal');
}
  add_action('admin_menu', 'add_my_box');

  function meta_info_form()
  {
      global $post;
      $keywords = get_post_meta($post->ID, 'meta_keywords', true);
      $description = get_post_meta($post->ID, 'meta_description', true); ?>
<h3 style="font-size: 14px; margin: 0 0 8px;">キーワード</h3>
<input type="text" name="meta_keywords"
    value="<?php echo esc_html($keywords); ?>"
    style="width: 100%;margin: 0 0 8px;" />
<p style="color:#666; font-size: 13px; line-height: 1.68; margin: 0">キーワードが複数ある場合はコンマで区切ってください</p>
<h3 style="font-size: 14px; margin: 8px 0;padding: 8px 0 0;border-top:1px solid #ccd0d4;">ディスクリプション（抜粋兼用） <span
        style="color:#666; font-size: 13px">※200文字以上は省略されます。</span></h3>
<textarea id="meta_description" name="meta_description" rows="1" cols="40"
    style="width: 100%; height: 60px"><?php echo htmlspecialchars($description); ?></textarea>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        var maxcount = 200;
        $('#meta_description').after(
            '<p style=\"color:#666; font-size: 13px; margin: 0\">文字数: <span id=\"description-count\"></span></p>'
        );
        $('#description-count').text($('#meta_description').val().replace(/\s+/g, '').length);
        if ($('#meta_description').val().replace(/\s+/g, '').length > maxcount) {
            $('#description-count').css('color', '#f00');
        } else {
            $('#description-count').css('color', '#666');
        }
        $('#meta_description').bind("keydown keyup keypress change", function() {
            $('#description-count').text($('#meta_description').val().replace(/\s+/g, '').length);
            if ($(this).val().replace(/\s+/g, '').length > maxcount) {
                $('#description-count').css('color', '#f00');
            } else {
                $('#description-count').css('color', '#666');
            }
        });
        $('.categorychecklist>li:first-child, .cat-checklist>li:first-child').before(
            '<p style="font-size: 14px; margin: 0 0 8px;">※ 複数選んでも、表示は1つです。</p>');
    });
</script>
<?php
  }
function save_meta_info($post_id)
{
    if (isset($_POST['meta_keywords'])) {
        update_post_meta($post_id, 'meta_keywords', $_POST['meta_keywords']);
    } else {
        delete_post_meta($post_id, 'meta_keywords');
    }
    if (isset($_POST['meta_description'])) {
        update_post_meta($post_id, 'meta_description', $_POST['meta_description']);
    } else {
        delete_post_meta($post_id, 'meta_description');
    }
}
add_action('save_post', 'save_meta_info');

// バージョン更新を非表示にする
if (!current_user_can('administrator')) {
    add_filter('pre_site_transient_update_core', '__return_zero');
}
// APIによるバージョンチェックの通信をさせない
if (!current_user_can('administrator')) {
    remove_action('wp_version_check', 'wp_version_check');
    remove_action('admin_init', '_maybe_update_core');
}

    // フッターWordPressリンクを非表示に
function custom_admin_footer()
{
    echo '<a href="mailto:' . get_company_mail() . '">管理者へのお問い合わせ</a>';
}
    add_filter('admin_footer_text', 'custom_admin_footer');

    // 管理バーの項目を非表示
if (!current_user_can('administrator')) {
    function remove_admin_bar_menu($wp_admin_bar)
    {
        $wp_admin_bar->remove_menu('wp-logo'); // WordPressシンボルマーク
     $wp_admin_bar->remove_menu('my-account'); // マイアカウント
    }
    add_action('admin_bar_menu', 'remove_admin_bar_menu', 70);
}

// 管理バーのヘルプメニューを非表示にする
function my_admin_head()
{
    echo '<style type="text/css">#contextual-help-link-wrap{display:none;}</style>';
}
add_action('admin_head', 'my_admin_head');

    // 管理バーにログアウトを追加
function add_new_item_in_admin_bar()
{
    global $wp_admin_bar;
    $wp_admin_bar->add_menu(array(
     'id' => 'new_item_in_admin_bar',
     'title' => __('ログアウト'),
     'href' => wp_logout_url()
    ));
}
add_action('wp_before_admin_bar_render', 'add_new_item_in_admin_bar');

    // ダッシュボードウィジェット非表示
function example_remove_dashboard_widgets()
{
    if (!current_user_can('level_7')) { //level10以下のユーザーの場合ウィジェットをunsetする
        global $wp_meta_boxes;
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']); // 現在の状況
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // 最近のコメント
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']); // 被リンク
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']); // プラグイン
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); // クイック投稿
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']); // 最近の下書き
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); // WordPressブログ
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); // WordPressフォーラム
    }
}
    add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets');

// 投稿画面の項目を非表示にする
function remove_default_post_screen_metaboxes()
{
    if (!current_user_can('level_7')) { // level10以下のユーザーの場合メニューをremoveする
        remove_meta_box('postcustom', 'post', 'normal'); // カスタムフィールド
        remove_meta_box('postexcerpt', 'post', 'normal'); // 抜粋
        remove_meta_box('commentstatusdiv', 'post', 'normal'); // ディスカッション
        remove_meta_box('commentsdiv', 'post', 'normal'); // コメント
        remove_meta_box('trackbacksdiv', 'post', 'normal'); // トラックバック
        remove_meta_box('authordiv', 'post', 'normal'); // 作成者
        remove_meta_box('slugdiv', 'post', 'normal'); // スラッグ
        remove_meta_box('revisionsdiv', 'post', 'normal'); // リビジョン
    }
}
add_action('admin_menu', 'remove_default_post_screen_metaboxes');

    //入力画面 現在の状況　のWordPress表示を消す
function my_admin_print_styles()
{
    if (!current_user_can('level_7')) {
        echo '<style type="text/css">.versions p,#wp-version-message{display:none;}</style>';
    }
}
add_action('admin_print_styles', 'my_admin_print_styles', 21);

function remove_menus()
{
    if (!current_user_can('level_7')) { //level10以下のユーザーの場合メニューをunsetする
        remove_menu_page('wpcf7'); //Contact Form 7
        global $menu;
        unset($menu[2]); // ダッシュボード
        //unset($menu[4]); // メニューの線1
        unset($menu[5]); // 投稿
        unset($menu[10]); // メディア
        unset($menu[15]); // リンク
        unset($menu[20]); // ページ
        unset($menu[25]); // コメント
        //unset($menu[59]); // メニューの線2
        unset($menu[60]); // テーマ
        unset($menu[65]); // プラグイン
        //unset($menu[70]); // プロフィール
        unset($menu[75]); // ツール
        unset($menu[80]); // 設定
        unset($menu[90]); // メニューの線3
    }
}
add_action('admin_menu', 'remove_menus');

function post_has_archive($args, $post_type)
{
    if ('post' == $post_type) {
        $args['rewrite'] = true;
        $args['has_archive'] = esc_attr(get_vars('basic', 'postSlug'));
    }
    return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

function change_post_menu_label()
{
    global $menu;
    global $submenu;
    $menu[5][0] = esc_attr(get_vars('basic', 'postName'));
    $submenu['edit.php'][5][0] = esc_attr(get_vars('basic', 'postName')) . '一覧';
    $submenu['edit.php'][10][0] = '新しい' . esc_attr(get_vars('basic', 'postName'));
    $submenu['edit.php'][16][0] = 'タグ';
}
function change_post_object_label()
{
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = esc_attr(get_vars('basic', 'postName'));
    $labels->singular_name = esc_attr(get_vars('basic', 'postName'));
    $labels->add_new = _x('追加', esc_attr(get_vars('basic', 'postSlug')));
    $labels->add_new_item = esc_attr(get_vars('basic', 'postName')) . 'の新規追加';
    $labels->edit_item = esc_attr(get_vars('basic', 'postName')) . 'の編集';
    $labels->new_item = '新規' . esc_attr(get_vars('basic', 'postName'));
    $labels->view_item = esc_attr(get_vars('basic', 'postName')) . 'を表示';
    $labels->search_items = esc_attr(get_vars('basic', 'postName')) . 'を検索';
    $labels->not_found = '記事が見つかりませんでした';
    $labels->not_found_in_trash = 'ゴミ箱に記事は見つかりませんでした';
}
add_action('init', 'change_post_object_label');
add_action('admin_menu', 'change_post_menu_label');
