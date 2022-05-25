<?php get_header();?>
<!-- news -->
      <aside class="o-box o-box:news">
        <h2 class="c-heading">Infomation</h2>
        <ul class="o-stack o-stack:newsList">
          <li class="c-news-item">
            <time class="c-time" datetime="2022-00-00"> 2022.00.00 </time>
            <a href="#" class="c-link"> ニュースタイトル </a>
          </li>
          <li class="c-news-item">
            <time class="c-time" datetime="2022-00-00"> 2022.00.00 </time>
            <a href="#" class="c-link"> ニュースタイトル </a>
          </li>
          <li class="c-news-item">
            <time class="c-time" datetime="2022-00-00"> 2022.00.00 </time>
            <a href="#" class="c-link"> ニュースタイトル </a>
          </li>
          <li class="c-news-item">
            <time class="c-time" datetime="2022-00-00"> 2022.00.00 </time>
            <a href="#" class="c-link"> ニュースタイトル </a>
          </li>
          <li class="c-news-item">
            <time class="c-time" datetime="2022-00-00"> 2022.00.00 </time>
            <a href="#" class="c-link"> ニュースタイトル </a>
          </li>
        </ul>
        <a href="#" class="c-btn c-btn:newsList"> 全てのニュースはこちら </a>
      </aside>
      <!-- // news -->
      <!-- blog -->
      <h2 class="c-heading">Topics</h2>
      <ul class="o-grid o-grid:blogList">
        <li>
          <a href="#">
            <picture class="o-frame">
              <source data-srcset="<?php echo get_template_directory_uri();?>/img/thumb.avif" type="image/avif" />
              <source data-srcset="<?php echo get_template_directory_uri();?>/img/thumb.webp" type="image/webp" />
              <img
                src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                data-src="<?php echo get_template_directory_uri();?>/img/thumb.png"
                alt="コンテンツタイトル"
              />
            </picture>
            <span class="c-topic-title">コンテンツタイトル</span>
          </a>
          <span>
            <span class="o-has-icon o-has-icon:cat">
              <i class="fas fa-folder-open"></i>
              <a href="#" class="c-link c-link:catSingle"> カテゴリー </a>
            </span>
            <span class="c-memo"> 読了見込 3分・<time datetime="2022-00-00">3日前</time> </span>
          </span>
        </li>
        <li>
          <a href="#">
            <picture class="o-frame">
              <source data-srcset="<?php echo get_template_directory_uri();?>/img/thumb.avif" type="image/avif" />
              <source data-srcset="<?php echo get_template_directory_uri();?>/img/thumb.webp" type="image/webp" />
              <img
                src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                data-src="<?php echo get_template_directory_uri();?>/img/thumb.png"
                alt="コンテンツタイトル"
              />
            </picture>
            <span class="c-topic-title">コンテンツタイトル</span>
          </a>
          <span>
            <span class="o-has-icon o-has-icon:cat">
              <i class="fas fa-folder-open"></i>
              <a href="#" class="c-link c-link:catSingle"> カテゴリー </a>
            </span>
            <span class="c-memo"> 読了見込 3分・<time datetime="2022-00-00">3日前</time> </span>
          </span>
        </li>
        <li>
          <a href="#">
            <picture class="o-frame">
              <source data-srcset="<?php echo get_template_directory_uri();?>/img/thumb.avif" type="image/avif" />
              <source data-srcset="<?php echo get_template_directory_uri();?>/img/thumb.webp" type="image/webp" />
              <img
                src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                data-src="<?php echo get_template_directory_uri();?>/img/thumb.png"
                alt="コンテンツタイトル"
              />
            </picture>
            <span class="c-topic-title">コンテンツタイトル</span>
          </a>
          <span>
            <span class="o-has-icon o-has-icon:cat">
              <i class="fas fa-folder-open"></i>
              <a href="#" class="c-link c-link:catSingle"> カテゴリー </a>
            </span>
            <span class="c-memo"> 読了見込 3分・<time datetime="2022-00-00">3日前</time> </span>
          </span>
        </li>
      </ul>
      <a href="#" class="c-btn c-btn:topicList"> Topics 一覧 </a>
      <!-- // blog -->
<?php get_footer();?>