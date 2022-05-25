<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# #: http://ogp.me/ns/#">
		<!-- Google Tag Manager -->
    	<!-- End Google Tag Manager -->
    	<meta charset="<?php bloginfo('charset');?>">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
	    <meta name="robots" content="#" />
	    <link rel="canonical" href="#" />
	    <meta name="keywords" content="#" />
	    <meta name="description" content="#" />
	    <meta content="telephone=no" name="format-detection" />
	    <meta content="address=no" name="format-detection" />
	    <meta property="og:locale" content="ja_JP" />
	    <meta property="og:title" content="#" />
	    <meta property="og:description" content="#" />
	    <meta property="og:type" content="#" />
	    <meta property="og:url" content="#" />
	    <meta property="og:image" content="#" />
	    <meta property="og:site_name" content="#" />
	    <meta name="twitter:card" content="summary_large_image" />
	    <meta name="twitter:description" content="#" />
	    <meta name="twitter:title" content="#" />
	    <meta name="twitter:site" content="#" />
	    <meta name="twitter:image" content="#" />
	    <meta name="twitter:creator" content="#" />
	    <link rel="icon" href="<?php echo get_template_directory_uri();?>/favicon.ico" />
	    <link rel="apple-touch-icon" sizes="180×180" href="<?php echo get_template_directory_uri();?>/icons/icon-180x180.png" />
	    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/style.css" />
		<?php wp_head();?>
	</head>
	<body <?php body_class(); ?>>
		<!-- Google Tag Manager (noscript) -->
    	<!-- End Google Tag Manager (noscript) -->
    	<header class="o-container o-container:header">
	      <div class="o-cluster o-cluster:header">
	        <button class="c-menu-btn" type="button" aria-label="menu close" aria-controls="sidebar" aria-expanded="false">
	          <span class="c-menu-btn__bars"></span>
	        </button>
	        <a href="<?php echo home_url();?>" class="c-logo">
	          <picture class="o-frame o-frame:logo">
	            <img
	              src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
	              data-src="<?php echo get_template_directory_uri();?>/img/logo.svg"
	              width="100%"
	              height="100%"
	              decoding="async"
	              alt="仮面ライター"
	            />
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
	    <!-- is-front -->
	    <div class="c-hero">
	      <div class="c-hero_bg">
	        <picture class="o-frame o-frame:logo">
	          <img
	            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
	            data-src="<?php echo get_template_directory_uri();?>/img/logo.svg"
	            width="100%"
	            height="100%"
	            decoding="async"
	            alt="ロゴ"
	          />
	        </picture>
	      </div>
	      <div class="c-hero_front">
	        <h1 class="c-hero_main">仮面ライター</h1>
	        <p class="c-hero_tagline">since 2013</p>
	      </div>
	    </div>
	    <!-- // is-front -->
	    <!-- !is-front -->
	    <!-- breadcrumb -->
	    <nav class="c-bread-list__outer" aria-label="Breadcrumb">
	      <ol class="c-bread-list">
	        <li class="c-bread-list__item">
	          <a href="<?php echo home_url();?>" class="c-link c-link:breadcrumb">
	            <i class="fas fa-home"></i>
	          </a>
	        </li>
	        <li class="c-bread-list__item">
	          <a href="<?php the_permalink();?>" class="c-link c-link:breadcrumb" aria-current="page"> <?php the_title();?> </a>
	        </li>
	      </ol>
	    </nav>
	    <!-- breadcrumb -->
	    <!-- page-heading -->
	    <div class="c-hero">
	      <div class="c-hero_bg">
	        <picture class="o-frame o-frame:logo">
	          <img
	            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
	            data-src="<?php echo get_template_directory_uri();?>/img/logo.svg"
	            width="100%"
	            height="100%"
	            decoding="async"
	            alt="ロゴ"
	          />
	        </picture>
	      </div>
	      <div class="c-hero_front">
	        <h1 class="c-hero_main c-hero_main:page"><?php the_title();?></h1>
	      </div>
	    </div>
	    <!-- // page-heading -->
	    <!-- // !is-front -->
	    <main class="o-container o-container:main">