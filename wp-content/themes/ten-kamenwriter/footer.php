	</main>
	<div class="c-bottom">
	  <div class="o-grid o-grid:sitemap">
	    <span class="o-stack o-stack:sitemap">
	      <a href="<?php echo home_url('/intro/');?>"
	        class="c-link c-link:mapHead"> イントロダクション </a>
	      <a href="<?php echo home_url('/feature/');?>"
	        class="c-link c-link:mapChild"> 初めての方へ </a>
	      <a href="<?php echo home_url('/profile/');?>"
	        class="c-link c-link:mapChild"> プロフィール </a>
	    </span>
	    <span class="o-stack o-stack:sitemap">
	      <a href="<?php echo home_url('/aboutus/');?>"
	        class="c-link c-link:mapHead"> 仮面ライターとは？ </a>
	      <a href="<?php echo home_url('/service/');?>"
	        class="c-link c-link:mapChild"> 10年目の取り組み </a>
	      <a href="<?php echo home_url('/company/');?>"
	        class="c-link c-link:mapChild"> 会社情報 </a>
	      <a href="<?php echo home_url('/brand/');?>"
	        class="c-link c-link:mapChild"> ブランドポリシー </a>
	    </span>
	    <span class="o-stack o-stack:sitemap">
	      <a href="<?php echo home_url('/records/');?>"
	        class="c-link c-link:mapHead"> これまでの記録 </a>
	      <a href="#" class="c-link c-link:mapChild"> 制作事例 </a>
	      <a href="#" class="c-link c-link:mapChild"> お客様の声 </a>
	    </span>
	  </div>
	  <h2 class="c-related-title">関連サイト</h2>
	  <div class="o-cluster o-cluster:related">
	    <a href="https://shin-kamenwriter.com" class="c-link" target="_blank" rel="noopener"> シン・仮面ライター </a>
	    <a href="https://bbns.jp" class="c-link" target="_blank" rel="noopener"> Blue B Nose </a>
	    <a href="https://magazine.kamenwriter.com" class="c-link" target="_blank" rel="noopener"> NXZ（現：ヒイラギ） </a>
	  </div>
	  <a href="<?php echo home_url();?>" class="c-logo c-logo:footer">
	    <picture class="o-frame o-frame:logo">
	      <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
	        data-src="<?php echo get_template_directory_uri();?>/img/logo.svg"
	        width="100%" height="100%" decoding="async" alt="仮面ライター" />
	    </picture>
	  </a>
	</div>
	<script src="<?php echo get_template_directory_uri();?>/js/lib.js"></script>
	<?php wp_footer();?>
	</body>

	</html>
