
<aside class="p-news__sidebar">
                    <!-- category -->
                    <div class="p-news__category">
                        <!-- タイトル フォントサイズ50 -->
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
                            foreach ($terms as $term) {
                                echo '<li class="p-news__category-item"><a href="' . esc_url(get_term_link($term)) . '" class="p-news__category-item-link">' . esc_html($term->name) . '</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <!-- archive -->
                    <div class="p-news__archive">
                        <!-- タイトル フォントサイズ50 -->
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
                            foreach ($months as $m) {
                                $year   = $m->year;
                                $month  = $m->month;
                                $url    = home_url("/news/{$year}/{$month}/");

                                echo '<li class="p-news__archive-item">';
                                echo '<a href="' . esc_url($url) . '" class="p-news__archive-item-link">';
                                echo esc_html($year . '年' . $month . '月');
                                echo '</a>';
                                echo '</li>';
                            }
                            ?>
                        </ul>
                    </div>
                </aside>
