<?php get_header(); ?>

<section class="p-single-news l-single-news">
    <div class="p-single-news__container">
        <div class="p-single-news__inner l-inner">
            <div class="c-title">
                <h2 class="c-title--l c-title--lp">NEWS</h2>
                <p class="c-title--s">お知らせ</p>
            </div>
            <div class="p-breadcrumb">
                <?php breadcrumb(); ?>
            </div>
            <!-- ページ内 -->
            <div class="p-single-news__content">
                <div class="p-single-news__content-wrapper">
                    <div class="p-single-news__title-group">
                        <h1 class="p-single-news__title"><?php the_title(); ?> </h1>
                        <div class="p-single-news__meta">
                            <span class="p-single-news__date">
                                <?php echo get_the_date('Y.m.d'); ?>
                            </span>
                            <span class="p-single-news__cat">
                                <?php $terms = get_the_terms(get_the_ID(), 'news-category');
                                if ($terms && !is_wp_error($terms)) {
                                    echo esc_html($terms[0]->name);
                                } ?>
                            </span>
                        </div>
                    </div>
                    <div class="p-single-news__body"><?php the_content(); ?>
                        <!-- ボタン -->
                        <div class="c-btn p-single-news__btn">
                            <a href="<?php echo home_url('/contact/'); ?>" class="c-btn__link-n">一覧に戻る<span class="c-btn--circle"></span></a>
                        </div>
                    </div>
                </div>
                <?php get_template_part('template/sideber-news'); ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
