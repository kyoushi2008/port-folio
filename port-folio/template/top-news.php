<!-- section news -->
<section class="p-top-news l-top-news">
    <div class="p-top-news__inner l-inner">
        <div class="p-top-news__content">
            <div class="p-top-news__title-wrapper">
                <!-- タイトル -->
                <div class="c-title">
                    <h2 class="c-title--l">NEWS</h2>
                    <p class="c-title--s">お知らせ</p>
                </div>
                <!-- ボタンroboto -->
                <div class="c-btn u-desktop">
                    <a href="<?php echo home_url('/contact/'); ?>" class="c-btn__link">Read more<span class="c-btn--circle"></span></a>
                </div>
            </div>
            <?php
            $args = array(
                'post_type'      => 'news',
                'posts_per_page' => 3,
                'orderby'        => 'date',
                'order'          => 'DESC',
            );
            // 変数名も $top_news_query に統一
            $top_news_query = new WP_Query($args);
            ?>

            <?php if ($top_news_query->have_posts()) : ?>
                <ul class="p-top-news__list">
                    <?php while ($top_news_query->have_posts()) : $top_news_query->the_post(); ?>
                        <li class="p-top-news__item">
                            <a href="<?php the_permalink(); ?>" class="p-top-news__item-link">
                                <div class="p-top-news__item-meta">
                                    <time class="p-top-news__item-date" datetime="<?php echo get_the_date('Y-m-d'); ?>">
                                        <?php echo get_the_date('Y.m.d'); ?>
                                    </time>

                                    <?php
                                    $terms = get_the_terms(get_the_ID(), 'news-category');
                                    if ($terms && !is_wp_error($terms)) : ?>
                                        <span class="p-top-news__item-cat">
                                            <?php echo esc_html($terms[0]->name); ?>
                                        </span>
                                    <?php else : ?>
                                        <span class="p-top-news__item-cat is-unclassified">未分類</span>
                                    <?php endif; ?>
                                </div>

                                <p class="p-top-news__item-title">
                                    <?php the_title(); ?>
                                </p>
                            </a>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php else : ?>
                <p class="p-top-news__empty">現在お知らせはありません。</p>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
            <!-- ボタンroboto -->
            <div class="c-btn u-mobile p-top-news__btn">
                <a href="<?php echo home_url('/contact/'); ?>" class="c-btn__link">Read more<span class="c-btn--circle"></span></a>
            </div>
        </div>
    </div>
</section>
