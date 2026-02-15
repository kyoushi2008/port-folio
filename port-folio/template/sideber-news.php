<?php if ( has_visible_news() ) : // 公開記事が1件以上ある時だけ表示 ?>

<aside class="p-news__sidebar">
    <div class="p-news__category">
        <div class="c-title c-title--50">
            <h2 class="c-title--l c-title--ls">CATEGORY</h2>
            <p class="c-title--s">カテゴリー</p>
        </div>
        <ul class="p-news__category-list">
            <?php
            $terms = get_terms([
                'taxonomy'   => 'news-category',
                'hide_empty' => true,
                'orderby'    => 'id',
                'order'      => 'ASC',
            ]);
            if ( ! empty( $terms ) ) {
                foreach ($terms as $term) {
                    echo '<li class="p-news__category-item"><a href="' . esc_url(get_term_link($term)) . '" class="p-news__category-item-link">' . esc_html($term->name) . '</a></li>';
                }
            }
            ?>
        </ul>
    </div>

    <div class="p-news__archive">
        <div class="c-title c-title--50">
            <h2 class="c-title--l c-title--ls">ARCHIVE</h2>
            <p class="c-title--s">アーカイブ</p>
        </div>
        <ul class="p-news__archive-list">
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
            if ( ! empty( $months ) ) {
                foreach ($months as $m) {
                    $year   = $m->year;
                    $month  = $m->month;
                    $url    = home_url("/news/{$year}/{$month}/");
                    echo '<li class="p-news__archive-item"><a href="' . esc_url($url) . '" class="p-news__archive-item-link">' . esc_html($year . '年' . $month . '月') . '</a></li>';
                }
            }
            ?>
        </ul>
    </div>
</aside>

<?php endif; ?>
