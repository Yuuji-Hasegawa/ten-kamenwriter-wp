<?php get_header();?>
<article class="c-entry">
  <div class="o-switcher o-switcher:media">
    <div class="c-media-pict">
      <picture class="o-frame o-frame:square">
        <source
          data-srcset="<?php echo get_template_directory_uri();?>/img/profile.avif"
          type="image/avif" />
        <source
          data-srcset="<?php echo get_template_directory_uri();?>/img/profile.webp"
          type="image/webp" />
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
          data-src="<?php echo get_template_directory_uri();?>/img/profile.png"
          alt="プロフィール" />
      </picture>
    </div>
    <div class="c-media-body">
      <dl class="o-stack o-stack:xxs">
        <dt class="u-text-large">
          <b>長谷川　雄治</b>
        </dt>
        <dd>
          <p>
            昭和63年生まれ。大阪電気通信大学総合情報学部デジタルゲーム学科卒業。
            <br />
            十代からゲームシナリオライターを目指して執筆活動や、エンターテインメント作品の制作、プロデュースを学ぶも、就活は失敗に終わり夢破れる。
          </p>
          <p>
            データ加工のアルバイト、Web制作のインターンを経て、2013年から「屋号：仮面ライター」として開業後、現在に至る。
          </p>
          <p>
            姉妹を持つ真ん中っ子かつ転勤族という境遇から、周囲とのコミュニケーション、関係構築に興味を持ち、技術としてのコミュニケーションに強い関心を抱く。
          </p>
          <p>
            アマチュアの物書きとして、言語や人間社会、記号論を理系、文系の両方の立場から考えることも最近の趣味。
          </p>
        </dd>
      </dl>
    </div>
  </div>
</article>
<?php get_footer();
