<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head
  prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# <?php echo get_ogp_type();?>: http://ogp.me/ns/<?php echo get_ogp_type();?>#">
  <!-- Google Tag Manager -->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-T2M6W72');
  </script>
  <!-- End Google Tag Manager -->
  <meta charset="<?php bloginfo('charset');?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
  <?php wp_head();?>
</head>

<body <?php body_class(); ?>>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T2M6W72" height="0" width="0"
      style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <header class="o-container o-container:header">
    <div class="o-cluster o-cluster:header">
      <button class="c-menu-btn" type="button" aria-label="menu close" aria-controls="sidebar" aria-expanded="false">
        <span class="c-menu-btn__bars"></span>
      </button>
      <a href="<?php echo home_url();?>" class="c-logo">
        <picture class="o-frame o-frame:logo">
          <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
            data-src="<?php echo get_template_directory_uri();?>/img/logo.svg"
            width="100%" height="100%" decoding="async" alt="仮面ライター" />
        </picture>
      </a>
    </div>
    <!--<form class="o-paste">
	        <input class="c-search" name="s" id="s" type="text" placeholder="キーワードを入力" />
	        <label class="c-search__label" for="s">
	          <i class="fas fa-magnifying-glass"></i>
	        </label>
	      </form>-->
  </header>
  <?php get_sidebar();?>
  <?php if (!is_front_page()) {
    echo get_breadcrumb();
} echo get_hero();?>
  <main class="o-container o-container:main">