<?php get_header(); ?>

<section class="p-404 l-404">
    <div class="p-404__inner l-inner">
        <div class="p-404__content">
            <p class="p-404__lead">404 NOT FOUND</p>
            <p class="p-404__text">お探しのページが見つかりませんでした。<br>削除された可能性があります。</p>
        </div>
        <div class="p-404__btn">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="c-top-btn"><span class="c-top-btn--o">TOP</span>へ戻る</a>
        </div>
    </div>
    </div>
</section>

<?php get_footer(); ?>
