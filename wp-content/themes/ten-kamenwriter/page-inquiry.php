<?php get_header();?>
<article class="c-entry">
        <p>仮面ライターにご質問、ご要望などございましたら、下記のお問い合わせフォームから、お気軽にお寄せください。</p>
        <h2 class="c-min-heading">お問い合わせフォーム</h2>
        <dl class="c-table">
          <dt class="c-table__title">お名前</dt>
          <dd class="c-table__content">
            <input class="c-input" type="text" placeholder="例）お名前" />
          </dd>
          <dt class="c-table__title c-table__title:require">メールアドレス</dt>
          <dd class="c-table__content">
            <input class="c-input" type="text" placeholder="例）info@examples.com" />
          </dd>
          <dt class="c-table__title c-table__title:require">お問い合わせ内容</dt>
          <dd class="c-table__content">
            <textarea class="c-input" placeholder="お気軽にご入力ください"></textarea>
          </dd>
        </dl>
        <label class="o-grid o-grid:accept">
          <input class="c-checkbtn" type="checkbox" />
          <a class="c-link c-link:inline" href="#" target="_blank" rel="noopener"> プライバシーポリシー </a>
          に同意する
        </label>
        <button class="c-btn c-btn:submit" type="submit">送信</button>
        <ul class="o-stack o-stack:annouce">
          <li>調査等のため、返信にお時間を頂くことがございます。予めご了承ください。</li>
          <li>
            万が一、一週間経っても返信がない場合は大変お手数ですが、
            <a class="c-link c-link:inline" href="mailto:info@kamenwriter.com" target="_blank" rel="noopener">
              info@kamenwriter.com
            </a>
            までご連絡ください。
          </li>
        </ul>
      </article>
<?php get_footer();?>