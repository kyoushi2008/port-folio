<?php get_header(); ?>

<section class="p-single-works l-single-works">
    <div class="p-single-works__container">
        <div class="p-single-works__inner l-inner">
            <!-- タイトル -->
            <div class="p-single-works__title-group">
                <h1 class="p-single-works__title">丁寧な作業とコミュニケーション<br class="u-mobile">で<br>ハイクオリティなコードを納品。</h1>
            </div>
            <!-- メイン画像 -->
            <picture class="p-single-works__top-image">
                <source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/single-works/single-works-sp.png">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/single-works/single-works-pc.png" alt="voice-image" loading="lazy">
            </picture>
            <div class="p-single-works__content">
                <div class="p-single-works__content-wrapper">
                    <h2 class="works-subtitle"><?php the_field('works-subtitle'); ?></h2>
                    <span class="works-subtitle-label"><?php the_field('works-subtitle-label'); ?></span>
                    <!-- テーブル（構造固定・値だけACF） -->
                    <table class="p-single-works__table">
                        <tr>
                            <th>ジャンル</th>
                            <td><?php the_field('genre'); ?></td>
                        </tr>
                        <tr>
                            <th>担当と作業範囲</th>
                            <td><?php the_field('product_info'); ?></td>
                        </tr>
                        <tr>
                            <th>制作環境と使用言語</th>
                            <td><?php the_field('work_info'); ?></td>
                        </tr>
                        <tr>
                            <th>制作期間</th>
                            <td><?php the_field('delivery'); ?></td>
                        </tr>
                        <tr>
                            <th>URL</th>
                            <td><?php
                                $works_url = get_field('url');
                                if ($works_url) :
                                ?>
                                    <a href="<?php echo esc_url($works_url); ?>" class="p-single-works__link" target="_blank" rel="noopener noreferrer">
                                        <?php echo esc_html($works_url); ?>
                                    </a>
                                <?php else : ?>
                                    なし
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>クライアント情報</th>
                            <td><?php the_field('client_info'); ?></td>
                        </tr>
                        <tr>
                            <th>クライアントの意向と課題、制作経緯</th>
                            <td><?php the_field('client_request'); ?></td>
                        </tr>
                    </table>

                    <!-- 本文（任意の追加テキスト） -->
                    <div class="p-single-works__body">
                        <h2 class="works-subtitle"><?php the_field('works-subtitle'); ?></h2>
                        <span class="works-subtitle-label"><?php the_field('works-subtitle-label'); ?></span>
                        <div class="p-single-works__text-group">
                            <p class="works-textarea"><?php the_field('works-textarea'); ?></p>
                            <p class="works-textarea"><?php the_field('works-textarea02'); ?></p>
                        </div>
                    </div>

                    <!-- 前後ナビ -->
                    <!-- 前後ナビ -->
                    <div class="p-single-works__nav">
                        <div class="p-single-works__nav-prev">
                            <?php
                            $prev = get_previous_post();
                            if (!empty($prev)): ?>
                                <a href="<?php echo get_permalink($prev->ID); ?>" class="p-single-works__nav-link">
                                    <span class="p-single-works__nav-arrow"></span>
                                    <span class="p-single-works__nav-text">前の記事へ</span>
                                </a>
                            <?php else: ?>
                                <span class="p-single-works__nav-link p-single-works__nav-link--disabled">
                                    <span class="p-single-works__nav-arrow"></span>
                                    <span class="p-single-works__nav-text">前の記事へ</span>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="p-single-works__nav-next">
                            <?php
                            $next = get_next_post();
                            if (!empty($next)): ?>
                                <a href="<?php echo get_permalink($next->ID); ?>" class="p-single-works__nav-link">
                                    <span class="p-single-works__nav-text">次の記事へ</span>
                                    <span class="p-single-works__nav-arrow"></span>
                                </a>
                            <?php else: ?>
                                <span class="p-single-works__nav-link p-single-works__nav-link--disabled">
                                    <span class="p-single-works__nav-text">次の記事へ</span>
                                    <span class="p-single-works__nav-arrow"></span>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>

                <!-- 右カラム：人物（PC時 sticky） -->
                <aside class="p-single-works__side">
                    <div class="p-single-works__profile">
                        <picture class="p-single-works__profile-image">
                            <source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/single-works/single-works-sp02.png">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/single-works/single-works-pc02.png" alt="" loading="lazy">
                        </picture>
                        <p class="p-single-works__company-name">株式会社 XXXXXX</p>
                    </div>
                    <!-- ボタンnotosans -->
                    <div class="c-btn p-single-works__profile-btn">
                        <a href="<?php echo home_url('/works/'); ?>" class="c-btn__link-n p-single-works__btn-link">一覧に戻る<span class="c-btn--circle p-single-works__btn-circle"></span></a>
                    </div>
                </aside>
            </div>
        </div>
        <!-- swiper -->
        <section class="p-single-related-works">
            <?php
            $args = array(
                'post_type'      => 'works',
                'posts_per_page' => -1, // 前期時取得
                'post__not_in'   => array(get_the_ID()), // 現在の記事は取得しない
                'orderby'        => 'date',
                'order'          => 'DESC',
            );
            $slider_query = new WP_Query($args);
            if ($slider_query->have_posts()) : ?>
                <div class="swiper js-works-slider p-common-works-slider">
                    <div class="swiper-wrapper">
                        <?php while ($slider_query->have_posts()) : $slider_query->the_post(); ?>
                            <div class="swiper-slide p-common-works-slider__item">
                                <a href="<?php the_permalink(); ?>" class="p-archive-works__card">
                                    <div class="p-archive-works__card-image">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <picture>
                                                <source media="(min-width: 768px)" srcset="<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(), 'works-card-pc'); ?>">
                                                <img src="<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(), 'works-card-sp'); ?>" alt="<?php the_title_attribute(); ?>">
                                            </picture>
                                        <?php endif; ?>
                                        <?php
                                        $terms = get_the_terms(get_the_ID(), 'works-category');
                                        if ($terms && !is_wp_error($terms)) :
                                            $term = array_shift($terms); ?>
                                            <span class="p-archive-works__card-category"><?php echo esc_html($term->name); ?></span>
                                        <?php endif; ?>
                                        <div class="p-archive-works__card-title-wrapper p-single-works__slider-title-wrapper">
                                            <h2 class="p-archive-works__card-title"><?php the_title(); ?></h2>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <div class="p-works-slider__nav">
                        <div class="swiper-button-prev js-works-slider-prev"></div>
                        <div class="swiper-button-next js-works-slider-next"></div>
                    </div>
                </div>
            <?php
                wp_reset_postdata(); // 独自クエリを使った後は必ずリセット
            endif;
            ?>
        </section>
    </div>
</section>

<?php get_footer(); ?>
