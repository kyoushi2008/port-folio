<?php get_header(); ?>

<main class="p-main">
    <div class="l-inner">
        <!-- ボタン -->
        <div class="c-btn">
            <a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" class="c-btn__link">Read more<span class="c-btn--circle"></span></a>
        </div>

        <!-- タイトル -->
        <div class="c-title">
            <h2 class="c-title--l">WORKS</h2>
            <p class="c-title--s">実績</p>
        </div>
        <!-- 白タイトル -->
         <div class="c-title">
            <h2 class="c-title--l c-title--wl">SERVICE</h2>
            <p class="c-title--s c-title--ws">サービス</p>
         </div>
        <!-- 白タイトル -->
         <div class="c-title">
            <h2 class="c-title--l c-title--wl">PROFILE</h2>
            <p class="c-title--s c-title--ws c-title--wsc">経歴・職歴</p>
         </div>
    </div>
</main>
<?php get_footer(); ?>
