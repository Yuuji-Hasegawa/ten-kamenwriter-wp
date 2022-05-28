<?php get_header();?>
<aside class="o-box o-box:news">
  <h2 class="c-heading">Infomation</h2>
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
  <a href="<?php echo home_url('/news/');?>"
    class="c-btn c-btn:newsList"> 全てのニュースはこちら </a>
  <?php else:?>
  <p>お知らせはまだありません。</p>
  <?php endif;?>
</aside>
<h2 class="c-heading">Topics</h2>
<?php echo get_front_topics(); get_footer();
