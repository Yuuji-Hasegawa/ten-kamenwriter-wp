<?php get_header();?>
<!-- news -->
<div class="c-list-outer">
  <ul class="o-stack o-stack:newsList">
    <li class="c-news-item">
      <time class="c-time" datetime="2022-00-00"> 2022.00.00 </time>
      <a href="#" class="c-link"> ニュースタイトル </a>
    </li>
    <!-- // loop -->
  </ul>
  <nav class="c-pagination" aria-label="Pagination">
    <ol class="o-grid o-grid:pagination">
      <li>
        <a class="c-btn c-btn:pager" aria-label="Previous">
          <i class="fas fa-angle-left"></i>
        </a>
      </li>
      <li>
        <a class="c-btn c-btn:pager" aria-label="Goto Page 1" href="#"> 1 </a>
      </li>
      <li>
        <a class="c-btn c-btn:pager" aria-label="Goto Page 1" href="#"> 2 </a>
      </li>
      <li>
        <a class="c-btn c-btn:pager" aria-label="Current Page" aria-current="true" href="#"> 3 </a>
      </li>
      <li>
        <a class="c-btn c-btn:pager" aria-label="Goto Page 1" href="#"> 4 </a>
      </li>
      <li>
        <a class="c-btn c-btn:pager" aria-label="Goto Page 1" href="#"> 5 </a>
      </li>
      <li>
        <a class="c-btn c-btn:pager" aria-label="Next">
          <i class="fas fa-angle-right"></i>
        </a>
      </li>
    </ol>
  </nav>
</div>
<!-- // news -->
<!-- topics -->
<div class="c-list-outer">
  <ul class="o-grid o-grid:blogList">
    <li>
      <a href="#">
        <picture class="o-frame">
          <source data-srcset="img/thumb.avif" type="image/avif" />
          <source data-srcset="img/thumb.webp" type="image/webp" />
          <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
            data-src="<?php echo get_template_directory_uri();?>/img/thumb.png"
            alt="コンテンツタイトル" />
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
    <!-- // loop (12) -->
  </ul>
  <nav class="c-pagination" aria-label="Pagination">
    <ol class="o-grid o-grid:pagination">
      <li>
        <a class="c-btn c-btn:pager" aria-label="Previous">
          <i class="fas fa-angle-left"></i>
        </a>
      </li>
      <li>
        <a class="c-btn c-btn:pager" aria-label="Goto Page 1" href="#"> 1 </a>
      </li>
      <li>
        <a class="c-btn c-btn:pager" aria-label="Goto Page 1" href="#"> 2 </a>
      </li>
      <li>
        <a class="c-btn c-btn:pager" aria-label="Current Page" aria-current="true" href="#"> 3 </a>
      </li>
      <li>
        <a class="c-btn c-btn:pager" aria-label="Goto Page 1" href="#"> 4 </a>
      </li>
      <li>
        <a class="c-btn c-btn:pager" aria-label="Goto Page 1" href="#"> 5 </a>
      </li>
      <li>
        <a class="c-btn c-btn:pager" aria-label="Next">
          <i class="fas fa-angle-right"></i>
        </a>
      </li>
    </ol>
  </nav>
</div>
<!-- // topics -->
<?php get_footer();
