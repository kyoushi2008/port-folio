<?php get_header(); ?>

<?php
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
                    if (have_posts()) : ?>
                        <ul class="p-archive-news__list">
                            <?php while (have_posts()) : the_post(); ?>
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
                </div>
                <?php get_template_part('template/sideber-news'); ?>
            </div>
            <div class="p-archive-news__pagination">
                <?php
                get_template_part('template/pagination');
                ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
