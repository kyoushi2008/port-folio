<?php get_header(); ?>

<?php
// ★ タクソノミー（news-category）の場合は taxonomy-news-category.php を使う
if (is_tax('news-category')) {
    include get_template_directory() . '/taxonomy-news-category.php';
    return;
}
?>

<section class="p-archive-news l-archive-news">
    <div class="p-archive-news__container">
        <div class="p-archive-news__inner l-inner">
            <div class="c-title">
                <h2 class="c-title--l c-title--lp">NEWS</h2>
                <p class="c-title--s">お知らせ</p>
            </div>
            <div class="p-breadcrumb">
                <?php breadcrumb(); ?>
            </div>

            <div class="p-archive-news__content">
                <div class="p-archive-news__content-wrapper">
                    <?php
                    $paged = get_query_var('paged') ? get_query_var('paged') : 1;

                    // 一覧ページは「news」を降順で出す
                    $args = array(
                        'post_type'      => 'news',
                        'posts_per_page' => 10,
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                        'paged'          => $paged,
                    );

                    // ★ 月別アーカイブの場合
                    if (is_date()) {
                        $year = get_query_var('year');
                        $monthnum = get_query_var('monthnum');

                        if ($year) {
                            $args['year'] = $year;
                        }
                        if ($monthnum) {
                            $args['monthnum'] = $monthnum;
                        }
                    }

                    // 未分類フィルター（これだけはURL引数なので一覧ページに残す）
                    if (isset($_GET['uncategorized']) && $_GET['uncategorized'] == '1') {
                        $args['tax_query'] = array(
                            array(
                                'taxonomy' => 'news-category',
                                'operator' => 'NOT EXISTS',
                            ),
                        );
                    }

                    $news_query = new WP_Query($args);

                    if ($news_query->have_posts()) : ?>
                        <ul class="p-archive-news__list">
                            <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
                                <li class="p-archive-news__item">
                                    <a href="<?php the_permalink(); ?>" class="p-archive-news__item-link">
                                        <div class="p-archive-news__item-meta">
                                            <time class="p-archive-news__item-date" datetime="<?php echo get_the_date('Y-m-d'); ?>">
                                                <?php echo get_the_date('Y.m.d'); ?>
                                            </time>
                                            <span class="p-archive-news__item-cat">
                                                <?php
                                                $terms = get_the_terms(get_the_ID(), 'news-category');
                                                if ($terms && !is_wp_error($terms)) {
                                                    echo esc_html($terms[0]->name);
                                                } else {
                                                    echo '未分類';
                                                }
                                                ?>
                                            </span>
                                        </div>
                                        <p class="p-archive-news__item-title">
                                            <?php the_title(); ?>
                                        </p>
                                    </a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php else : ?>
                        <p>現在お知らせはありません。</p>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
                <?php get_template_part('template/sideber-news'); ?>
            </div>

            <div class="p-archive-news__pagination">
                <?php
                set_query_var('query', $news_query);
                get_template_part('template/pagination');
                ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
