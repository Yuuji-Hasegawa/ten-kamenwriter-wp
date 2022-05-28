<?php get_header(); if (is_post_type_archive('news')):?>
<?php if (have_posts()):?>
<ul class="o-stack o-stack:newsList">
  <?php while (have_posts()): the_post();?>
  <li class="c-news-item">
    <time class="c-time"
      datetime="<?php the_time('Y-m-d');?>"><?php the_time('Y.m.d');?></time>
    <a href="<?php the_permalink();?>" class="c-link"><?php the_title();?></a>
  </li>
  <?php endwhile;?>
</ul>
<?php else:?>
<p>お知らせはまだありません。</p>
<?php endif;?>
<?php else:?>
<?php if (have_posts()):?>
<ul class="o-grid o-grid:blogList">
  <?php while (have_posts()): the_post();?>
  <li>
    <a href="<?php the_permalink();?>">
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
      <span class="c-topic-title"><?php the_title();?></span>
    </a>
    <span>
      <span class="o-has-icon o-has-icon:cat">
        <?php echo get_single_cat('c-link:bottomCat');?>
      </span>
      <span class="c-memo"> 読了見込 <?php echo get_readtime();?>・<time
          datetime="<?php the_time('Y-m-d');?>"><?php echo my_human_time_diff(get_post_time('U', true)) . '前';?></time>
      </span>
    </span>
  </li>
  <?php endwhile;?>
</ul>
<?php else:?>
<p>コンテンツがまだありません。</p>
<?php endif; endif; echo get_pagination(); get_footer();
