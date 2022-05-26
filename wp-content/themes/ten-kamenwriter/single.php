<?php get_header();
if ('news' == get_post_type() && is_single()):?>
<!-- news -->
<article class="c-entry c-entry:single">
  <header class="o-cluster o-cluster:newsSingle">
    <time class="o-has-icon o-has-icon:time"
      datetime="<?php the_time('Y-m-d');?>">
      <i class="far fa-clock"></i>
      <?php the_time('Y.m.d');?>
    </time>
    <time class="o-has-icon o-has-icon:time"
      datetime="<?php the_modified_time('Y-m-d'); ?>">
      <i class="fas fa-arrow-rotate-right"></i>
      <?php the_modified_time('Y.m.d'); ?>
    </time>
  </header>
  <div>
    <?php the_content();?>
  </div>
  <div class="c-input-copy">
    <input id="shareURL" class="c-input c-input:share" type="text"
      value="<?php echo esc_url(get_permalink($post->ID));?>"
      readonly="true" />
    <button id="shareBtn" class="c-btn c-btn:copy">コピー</button>
  </div>
  <footer class="c-news-cta">
    <h3>この記事のお問い合わせ先</h3>
    <p>
      <b>仮面ライター 長谷川 雄治</b>
      <br />
      〒563-0005 茨木市五日市2-17-4
      <br />
      facebook :
      <a class="c-link c-link:inline" href="https://www.facebook.com/kamenwriter01" target="_blank" rel="noopener">
        https://www.facebook.com/kamenwriter01
      </a>
      <br />
      twitter :
      <a class="c-link c-link:inline" href="https://twitter.com/kamenwriter02" target="_blank" rel="noopener">
        https://twitter.com/kamenwriter02
      </a>
      <br />
      Email :
      <a class="c-link c-link:inline" href="mailto:info@kamenwriter.com" target="_blank" rel="noopener">
        info@kamenwriter.com
      </a>
      <br />
      <a class="c-link c-link:inline"
        href="<?php echo home_url('/inquiry/');?>">
        お問い合わせフォームはこちらから </a>
    </p>
  </footer>
</article>
<!-- // news -->
<?php else:?>
<!-- topics -->
<article class="c-entry c-entry:single">
  <header class="o-grid o-grid:headAuthor">
    <a href="#authorInfo">
      <picture class="o-frame o-frame:square">
        <source
          data-srcset="<?php echo get_template_directory_uri();?>/img/profile.avif"
          type="image/avif" />
        <source
          data-srcset="<?php echo get_template_directory_uri();?>/img/profile.webp"
          type="image/webp" />
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
          data-src="<?php echo get_template_directory_uri();?>/img/profile.png"
          alt="長谷川 雄治" />
      </picture>
    </a>
    <div class="o-stack o-stack:xxs">
      <a class="c-link" href="#authorInfo">長谷川 雄治</a>
      <div class="o-cluster">
        <time class="o-has-icon o-has-icon:time"
          datetime="<?php the_time('Y-m-d');?>">
          <i class="far fa-clock"></i>
          <?php the_time('Y-m-d');?>
        </time>
        <time class="o-has-icon o-has-icon:time"
          datetime="<?php the_modified_time('Y-m-d'); ?>">
          <i class="fas fa-arrow-rotate-right"></i>
          <?php the_modified_time('Y.m.d'); ?>
        </time>
      </div>
    </div>
  </header>
  <div class="c-insert-img">
    <picture class="o-frame">
      <source
        data-srcset="<?php echo get_template_directory_uri();?>/img/thumb.avif"
        type="image/avif" />
      <source
        data-srcset="<?php echo get_template_directory_uri();?>/img/thumb.webp"
        type="image/webp" />
      <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
        data-src="<?php echo get_template_directory_uri();?>/img/thumb.png"
        alt="<?php the_title();?>" />
    </picture>
  </div>
  <div>
    <div class="o-box o-box:redume">
      <button id="redumeBtn" class="o-has-icon o-has-icon:redume" type="button">
        <i class="fas fa-list"></i>
        目次
        <span class="c-redume-marker">
          <i class="fas fa-caret-down"></i>
        </span>
      </button>
      <ul id="redumeBody" class="c-list c-list:redume">
        <li>
          <a class="c-link" href="#"> リンク </a>
        </li>
        <li>
          <a class="c-link" href="#"> リンク </a>
        </li>
        <li>
          <a class="c-link" href="#"> リンク </a>
        </li>
        <li>
          <a class="c-link" href="#"> リンク </a>
        </li>
      </ul>
    </div>
    <div>
      <?php the_content();?>
    </div>
  </div>
  <div class="o-stack o-stack:xxs">
    <?php echo get_single_cat(); echo get_post_tag();?>
  </div>
  <div class="c-input-copy">
    <input id="shareURL" class="c-input c-input:share" type="text"
      value="<?php echo esc_url(get_permalink($post->ID));?>"
      readonly="true" />
    <button id="shareBtn" class="c-btn c-btn:copy">コピー</button>
  </div>
  <footer id="authorInfo" class="o-box o-box:bottom-author">
    <div class="o-switcher o-switcher:author">
      <div class="c-author-pict">
        <picture class="o-frame o-frame:square">
          <source
            data-srcset="<?php echo get_template_directory_uri();?>/img/profile.avif"
            type="image/avif" />
          <source
            data-srcset="<?php echo get_template_directory_uri();?>/img/profile.webp"
            type="image/webp" />
          <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
            data-src="<?php echo get_template_directory_uri();?>/img/profile.png"
            alt="長谷川 雄治" />
        </picture>
      </div>
      <dl class="o-stack o-stack:xs">
        <dt class="c-author-name">長谷川 雄治</dt>
        <dd>
          自己紹介
          <div class="o-cluster o-cluster:sns">
            <a href="https://www.facebook.com/yuuji.hasegawa" class="c-link c-link:sns" target="_blank" rel="noopener">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://twitter.com/kamenwriter01" class="c-link c-link:sns" target="_blank" rel="noopener">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="https://www.instagram.com/kamenwriter/" class="c-link c-link:sns" target="_blank" rel="noopener">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="https://note.com/kamenwriter" class="c-link c-link:sns" target="_blank" rel="noopener">
              <i class="far fa-file"></i>
            </a>
          </div>
        </dd>
      </dl>
    </div>
  </footer>
</article>
<!-- // topics -->
<?php endif; get_footer();
