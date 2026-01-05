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
                <aside class="p-single-news__sidebar">
                    <!-- category -->
                    <div class="p-single-news__category">
                        <!-- タイトル フォントサイズ50 -->
                        <div class="c-title c-title--50">
                            <h2 class="c-title--l c-title--ls">CATEGORY</h2>
                            <p class="c-title--s">カテゴリー</p>
                        </div>
                        <ul class="p-single-news__category-list">
                            <?php
                            $terms = get_terms([
                                'taxonomy'   => 'news-category',
                                'hide_empty' => true,
                                'orderby'    => 'id',
                                'order'      => 'ASC',
                            ]);
                            foreach ($terms as $term) {
                                echo '<li class="p-single-news__category-item"><a href="' . esc_url(get_term_link($term)) . '" class="p-single-news__category-item-link">' . esc_html($term->name) . '</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <!-- archive -->
                    <div class="p-single-news__archive">
                        <!-- タイトル フォントサイズ50 -->
                        <div class="c-title c-title--50">
                            <h2 class="c-title--l c-title--ls">ARCHIVE</h2>
                            <p class="c-title--s">アーカイブ</p>
                        </div>
                        <ul class="p-single-news__archive-list">
                            <?php
                            global $wpdb;
                            $months = $wpdb->get_results("
                                SELECT DISTINCT
                                    YEAR(post_date) AS year,
                                    MONTH(post_date) AS month
                                FROM $wpdb->posts
                                WHERE post_type = 'news'
                                    AND post_status = 'publish'
                                ORDER BY post_date DESC
                                ");
                            foreach ($months as $m) {
                                $year   = $m->year;
                                $month  = $m->month;
                                $url    = get_month_link($year, $month);

                                echo '<li class="p-single-news__archive-item">';
                                echo '<a href="' . esc_url($url) . '" class="p-single-news__archive-item-link">';
                                echo esc_html($year . '年' . $month . '月');
                                echo '</a>';
                                echo '</li>';
                            }
                            ?>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
