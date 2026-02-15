<?php get_header(); ?>

<section class="p-fv l-fv">
    <div class="p-fv__swiper swiper">
        <div class="swiper-wrapper">
            <?php
            // 画像パスを簡潔にするための変数
            $img_path = get_theme_file_uri('/assets/images/top/');
            ?>
            <div class="swiper-slide p-fv__slide">
                <div class="p-fv__image">
                    <picture>
                        <source media="(max-width: 767px)" srcset="<?php echo $img_path; ?>fv-sp01.png">
                        <img src="<?php echo $img_path; ?>fv-pc01.png" alt="fv01">
                    </picture>
                </div>
            </div>
            <div class="swiper-slide p-fv__slide">
                <div class="p-fv__image">
                    <picture>
                        <source media="(max-width: 767px)" srcset="<?php echo $img_path; ?>fv-sp02.png">
                        <img src="<?php echo $img_path; ?>fv-pc02.png" alt="fv02">
                    </picture>
                </div>
            </div>
            <div class="swiper-slide p-fv__slide">
                <div class="p-fv__image">
                    <picture>
                        <source media="(max-width: 767px)" srcset="<?php echo $img_path; ?>fv-sp03.png">
                        <img src="<?php echo $img_path; ?>fv-pc03.png" alt="fv03">
                    </picture>
                </div>
            </div>
        </div>
    </div>
    <div class="p-fv__title-group">
        <p class="p-fv__text">High&thinsp;quality&thinsp;code<span class="p-fv-bar"></span></p>
        <div class="p-fv__title02"><span class="p-fv__title02--l">スキル</span>だけじゃない</div>
        <div class="p-fv__title01">パートナーに。</div>
    </div>
    <div class="p-fv__scroll"></div>
</section>

<section class="p-top-works l-top-works">
    <div class="p-top-works__content">
        <div class="p-top-works__inner l-inner">
            <div class="c-title">
                <h2 class="c-title--l">WORKS</h2>
                <p class="c-title--s">実績</p>
            </div>

            <?php
            $args = array(
                'post_type'      => 'works',
                'posts_per_page' => -1,
                'orderby'        => 'date',
                'order'          => 'DESC',
            );
            $slider_query = new WP_Query($args);
            ?>

            <?php if ($slider_query->have_posts()) : ?>
                <div class="swiper js-works-slider p-common-works-slider p-top-works-slider">
                    <div class="swiper-wrapper">
                        <?php while ($slider_query->have_posts()) : $slider_query->the_post(); ?>
                            <div class="swiper-slide p-common-works-slider__item p-top-works-slider__item">
                                <a href="<?php the_permalink(); ?>" class="p-archive-works__card">
                                    <div class="p-archive-works__card-image p-top-works__card-image">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <picture>
                                                <source media="(min-width: 768px)"
                                                    srcset="<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(), 'works-card-pc'); ?>">
                                                <img src="<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(), 'works-card-sp'); ?>"
                                                    alt="<?php the_title_attribute(); ?>">
                                            </picture>
                                        <?php endif; ?>

                                        <?php
                                        $terms = get_the_terms(get_the_ID(), 'works-category');
                                        if ($terms && !is_wp_error($terms)) :
                                            $term = array_shift($terms); ?>
                                            <span class="p-archive-works__card-category"><?php echo esc_html($term->name); ?></span>
                                        <?php endif; ?>

                                        <div class="p-archive-works__card-title-wrapper p-top-works__slider-card-title-wrapper">
                                            <h3 class="p-archive-works__card-title p-top-works__slider-card-title">
                                                <?php the_title(); ?></h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <div class="p-top-works-slider__nav">
                        <div class="swiper-button-prev js-top-works-slider-prev"></div>
                        <div class="swiper-button-next js-top-works-slider-next"></div>
                    </div>
                </div>

                <div class="c-btn p-top-works__btn">
                    <a href="<?php echo home_url('/works/'); ?>" class="c-btn__link">Read more<span
                            class="c-btn--circle"></span></a>
                </div>

            <?php else : ?>
                <div class="p-top-works__empty">
                    <p class="p-top-works__empty-text">現在、実績を準備中です。公開まで今しばらくお待ちください。</p>
                </div>
            <?php endif; wp_reset_postdata(); ?>

        </div>
    </div>
</section>

<!-- section message -->
<section class="p-top-message">
    <div class="p-top-message__inner l-inner">
        <div class="p-top-message__container">
            <div class="p-top-message__content">
                <div class="p-top-message__content-group">
                    <div class="p-top-message__box">
                        <h3 class="p-top-message__box-title">丁寧な作業とコミュニケーションで</h3>
                        <!-- ラベル -->
                        <span class="c-label p-top-message__label">ハイクオリティなコードを納品。</span>
                        <p class="p-top-message__box-text">ここにテキストここにテキストここにテキスト<br class="u-mobile">ここにテキストここにテキスト</p>
                    </div>
                    <div class="p-top-message__box">
                        <!-- ラベル -->
                        <span class="c-label p-top-message__label">ここにテキストここにテキスト</span>
                        <p class="p-top-message__box-text">ここにテキストここにテキストここにテキスト<br class="u-mobile">ここにテキストここにテキスト</p>
                        <p class="p-top-message__box-text">ここにテキストここにテキスト</p>
                    </div>
                    <div class="p-top-message__box">
                        <!-- ラベル -->
                        <span class="c-label p-top-message__label">ここにテキスト</span>
                    </div>
                    <picture class="p-top-message__image">
                        <source media="(max-width: 767px)"
                            srcset="<?php echo get_template_directory_uri(); ?>/assets/images/top/top-message-sp01.png">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/top-message-pc01.png"
                            alt="message" loading="lazy">
                    </picture>
                </div>
                <div class="p-top-message__content-group">
                    <div class="p-top-message__title-group">
                        <!-- タイトル -->
                        <div class="c-title">
                            <h2 class="c-title--l">MESSAGE</h2>
                            <p class="c-title--s">メッセージ</p>
                            <h3 class="p-top-message__box-title p-top-message__box-title02 u-desktop">丁寧な作業とコミュニケーションで
                            </h3>
                            <!-- ラベル -->
                            <span class="c-label p-top-message__label u-desktop">ハイクオリティなコードを納品。</span>
                        </div>
                        <!-- ボタンroboto -->
                        <div class="c-btn p-top-message__btn">
                            <a href="<?php echo home_url('/message/'); ?>" class="c-btn__link">Read more<span
                                    class="c-btn--circle"></span></a>
                        </div>
                    </div>
                    <div class="p-top-message__img-group">
                        <div class="p-top-message__img-text-group">
                            <span class="p-top-message__img-group-text">CODE ASSIST</span>
                            <span class="p-top-message__img-group-text">CODE ASSIST</span>
                        </div>
                        <picture class="p-top-message__image02">
                            <source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/top/top-message-sp02.png">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/top-message-pc02.png" alt="message" loading="lazy">
                        </picture>
                        <picture class="p-top-message__image03">
                            <source media="(max-width: 767px)"
                                srcset="<?php echo get_template_directory_uri(); ?>/assets/images/top/top-message-sp03.png">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/top-message-pc03.png"
                                alt="message" loading="lazy">
                        </picture>
                        <picture class="p-top-message__image04">
                            <source media="(max-width: 767px)"
                                srcset="<?php echo get_template_directory_uri(); ?>/assets/images/top/top-message-sp04.png">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/top-message-pc04.png"
                                alt="message" loading="lazy">
                        </picture>
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->
        <!-- section voice -->
        <?php get_template_part('template/top-voice'); ?>
        <!-- ボタンroboto -->
        <div class="c-btn p-top-message__row-btn">
            <a href="<?php echo home_url('/message/'); ?>" class="c-btn__link">Read more<span
                    class="c-btn--circle"></span></a>
        </div>
    </div>
</section>


<!-- section service -->
<section class="p-top-service l-top-service">
    <div class="p-top-service__content">
        <div class="p-top-service__inner l-inner">
            <div class="p-top-sercive__title-group">
                <!-- 白タイトル -->
                <div class="c-title">
                    <h2 class="c-title--l c-title--wl">SERVICE</h2>
                    <p class="c-title--s c-title--ws">サービス</p>
                </div>
                <div class="c-btn p-top-service__btn">
                    <a href="<?php echo home_url('/service/'); ?>" class="c-btn__link c-btn__link--w">Read more<span
                            class="c-btn--circle c-btn--circle--w"></span></a>
                </div>
            </div>
        </div>

        <div class="p-top-service__scroll-area">
            <!-- no.1 -->
            <div class="p-top-service__scroll-row p-top-service__scroll-row--1">
                <div class="p-top-service__scroll-inner">
                    <span class="p-top-service__scroll-text40">PHPのフォームは作れる？</span>
                    <span class="p-top-service__scroll-text40">対応ソフトは？</span>
                    <span class="p-top-service__scroll-text30">得意分野は？</span>
                    <span class="p-top-service__scroll-text30">Figmaも対応</span>
                    <span class="p-top-service__scroll-text30">WordPressも大丈夫？</span>
                    <span class="p-top-service__scroll-text40">PHPのフォームは作れる？</span>
                    <span class="p-top-service__scroll-text40">対応ソフトは？</span>
                    <span class="p-top-service__scroll-text30">得意分野は？</span>
                    <span class="p-top-service__scroll-text34">Figmaも対応</span>
                    <span class="p-top-service__scroll-text30">WordPressも大丈夫？</span>
                </div>
            </div>

            <!-- no.2 -->
            <div class="p-top-service__scroll-row p-top-service__scroll-row--2">
                <div class="p-top-service__scroll-inner">
                    <span class="p-top-service__scroll-text30">WordPressも大丈夫？</span>
                    <span class="p-top-service__scroll-text34 p-top-service__scroll-text70">Figmaも対応</span>
                    <span class="p-top-service__scroll-text40">対応ソフトは？</span>
                    <span class="p-top-service__scroll-text30">得意分野は？</span>
                    <span class="p-top-service__scroll-text40">PHPのフォームは作れる？</span>
                    <span class="p-top-service__scroll-text30">得意分野は？</span>
                    <span class="p-top-service__scroll-text30">WordPressも大丈夫？</span>
                    <span class="p-top-service__scroll-text30 p-top-service__scroll-text70">Figmaも対応</span>
                    <span class="p-top-service__scroll-text40">PHPのフォームは作れる？</span>
                    <span class="p-top-service__scroll-text40">対応ソフトは？</span>
                </div>
            </div>

            <!-- no.3 -->
            <div class="p-top-service__scroll-row p-top-service__scroll-row--3">
                <div class="p-top-service__scroll-inner">
                    <span class="p-top-service__scroll-text40">対応ソフトは？</span>
                    <span class="p-top-service__scroll-text30">得意分野は？</span>
                    <span class="p-top-service__scroll-text40">PHPのフォームは作れる？</span>
                    <span class="p-top-service__scroll-text30 p-top-service__scroll-text70">Figmaも対応</span>
                    <span class="p-top-service__scroll-text30">WordPressも大丈夫？</span>
                    <span class="p-top-service__scroll-text30">得意分野は？</span>
                    <span class="p-top-service__scroll-text40">対応ソフトは？</span>
                    <span class="p-top-service__scroll-text30">WordPressも大丈夫？</span>
                    <span class="p-top-service__scroll-text40">PHPのフォームは作れる？</span>
                    <span class="p-top-service__scroll-text34 p-top-service__scroll-text70">Figmaも対応</span>
                </div>
            </div>

            <!-- no.4 -->
            <div class="p-top-service__scroll-row p-top-service__scroll-row--4 u-mobile">
                <div class="p-top-service__scroll-inner">
                    <span class="p-top-service__scroll-text30 p-top-service__scroll-text70">Figmaも対応</span>
                    <span class="p-top-service__scroll-text40">PHPのフォームは作れる？</span>
                    <span class="p-top-service__scroll-text40">対応ソフトは？</span>
                    <span class="p-top-service__scroll-text30">得意分野は？</span>
                    <span class="p-top-service__scroll-text30">WordPressも大丈夫？</span>
                    <span class="p-top-service__scroll-text40">対応ソフトは？</span>
                    <span class="p-top-service__scroll-text30">WordPressも大丈夫？</span>
                    <span class="p-top-service__scroll-text30">得意分野は？</span>
                    <span class="p-top-service__scroll-text40">PHPのフォームは作れる？</span>
                    <span class="p-top-service__scroll-text34 p-top-service__scroll-text70">Figmaも対応</span>
                </div>
            </div>

            <!-- no.5 -->
            <div class="p-top-service__scroll-row p-top-service__scroll-row--5 u-mobile">
                <div class="p-top-service__scroll-inner">
                    <span class="p-top-service__scroll-text30">得意分野は？</span>
                    <span class="p-top-service__scroll-text40">対応ソフトは？</span>
                    <span class="p-top-service__scroll-text30">WordPressも大丈夫？</span>
                    <span class="p-top-service__scroll-text40">PHPのフォームは作れる？</span>
                    <span class="p-top-service__scroll-text30">Figmaも対応</span>
                    <span class="p-top-service__scroll-text30">WordPressも大丈夫？</span>
                    <span class="p-top-service__scroll-text40">PHPのフォームは作れる？</span>
                    <span class="p-top-service__scroll-text40">対応ソフトは？</span>
                    <span class="p-top-service__scroll-text30">得意分野は？</span>
                    <span class="p-top-service__scroll-text34">Figmaも対応</span>
                </div>
            </div>

            <!-- no.6 -->
            <div class="p-top-service__scroll-row p-top-service__scroll-row--6 u-mobile">
                <div class="p-top-service__scroll-inner">
                    <span class="p-top-service__scroll-text30">WordPressも大丈夫？</span>
                    <span class="p-top-service__scroll-text40">対応ソフトは？</span>
                    <span class="p-top-service__scroll-text30">得意分野は？</span>
                    <span class="p-top-service__scroll-text30">Figmaも対応</span>
                    <span class="p-top-service__scroll-text30">WordPressも大丈夫？</span>
                    <span class="p-top-service__scroll-text40">PHPのフォームは作れる？</span>
                    <span class="p-top-service__scroll-text30">得意分野は？</span>
                    <span class="p-top-service__scroll-text40">PHPのフォームは作れる？</span>
                    <span class="p-top-service__scroll-text40">対応ソフトは？</span>
                    <span class="p-top-service__scroll-text34">Figmaも対応</span>
                </div>
            </div>

        </div>
        <div class="p-top-service__fade p-top-service__fade--left"></div>
        <div class="p-top-service__fade p-top-service__fade--right"></div>
    </div>
    </div>
</section>

<!-- section profile -->
<secton class="p-top-profile l-top-profile">
    <a href="<?php echo esc_url(home_url('/profile/')); ?>" class="p-top-profile__link">
        <div class="p-top-profile__content">
            <div class="p-top-profile__title-group">
                <!-- 白タイトルラインセンター -->
                <div class="c-title p-top-profile__title">
                    <h2 class="c-title--l c-title--wl">PROFILE</h2>
                    <p class="c-title--s c-title--ws c-title--wsc">経歴・職歴</p>
                </div>
                <p class="p-top-profile__text">ここにテキスト入れるここにテキスト入れるここにテキスト入れる<br class="u-desktop">ここにテキスト入れるここにテキスト入れる
                </p>
            </div>
        </div>
    </a>
</secton>

<!-- section news -->
<?php get_template_part('template/top-news'); ?>
<?php get_footer(); ?>
