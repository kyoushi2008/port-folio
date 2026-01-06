<?php get_header(); ?>

<main class="p-main">
    <div class="l-inner">
        <!-- ボタンroboto -->
        <div class="c-btn">
            <a href="<?php echo home_url('/contact/'); ?>" class="c-btn__link">Read more<span class="c-btn--circle"></span></a>
        </div>
        <!-- ボタンnotosas -->
        <div class="c-btn">
            <a href="<?php echo home_url('/contact/'); ?>" class="c-btn__link-n">Read more<span class="c-btn--circle"></span></a>
        </div>
        <!-- ボタントップへもどる -->
        <div class="c-btn c-btn--l">
            <a href="<?php echo home_url('/contact/'); ?>" class="c-btn__link"><span class="c-btn--circle c-btn--l-circle"></span></a>
        </div>

        <!-- タイトル -->
        <div class="c-title">
            <h2 class="c-title--l">WORKS</h2>
            <p class="c-title--s">実績</p>
        </div>
        <!-- タイトル 個別ページ -->
        <div class="c-title">
            <h2 class="c-title--l c-title--lp">WORKS</h2>
            <p class="c-title--s">実績</p>
        </div>
        <!-- タイトル フォントサイズ50 -->
        <div class="c-title c-title--50">
            <h2 class="c-title--l c-title--ls">CODE SKILL</h2>
            <p class="c-title--s">対応が可能なコーディングスキルとデザインデータ</p>
        </div>
        <!-- テキスト 上タイトルサイズ28 -->
        <div class="c-title c-title--28">
            <p class="c-title--l c-title--black">経歴</p>
            <p class="c-title--s">&emsp;</p>
        </div>
        <!-- 白タイトル -->
        <div class="c-title">
            <h2 class="c-title--l c-title--wl">SERVICE</h2>
            <p class="c-title--s c-title--ws">サービス</p>
        </div>
        <!-- 白タイトルラインセンター -->
        <div class="c-title">
            <h2 class="c-title--l c-title--wl">PROFILE</h2>
            <p class="c-title--s c-title--ws c-title--wsc">経歴・職歴</p>
        </div>
        <!-- 白タイトル 小 -->
        <div class="c-title">
            <h2 class="c-title--l c-title--sl c-title--wl">CONTACT</h2>
            <p class="c-title--s c-title--ws">お問い合わせ</p>
        </div>

        <!-- ラベル -->
        <span class="c-label">ハイクオリティなコードを納品。</span>

        <!-- トップに戻る -->
        <a href="<?php echo esc_url(home_url('/')); ?>" class="c-top-btn"><span class="c-top-btn--o">TOP</span>へ戻る</a>


    </div>
</main>
<?php get_footer(); ?>
