<?php get_header(); ?>

<section class="p-single-voice l-single-voice">
    <div class="p-single-voice__container">
        <div class="p-voice-visual">
    <?php if (has_post_thumbnail()) : ?>
        <?php the_post_thumbnail('full'); ?>
    <?php else : ?>
        <img src="<?php echo get_template_directory_uri(); ?>/img/common/no-image.jpg" alt="No Image">
    <?php endif; ?>
</div>
            <div class="p-single-voice__content">
                <div class="p-single-voice__content-wrapper">
                    <div class="p-single-voice__title-group">
                        <h1 class="p-single-voice__title"><?php the_title(); ?> </h1>
                        <div class="p-single-voice__meta">
                            <span class="p-single-voice__date">
                                <?php echo get_the_date('Y.m.d'); ?>
                            </span>
                            <span class="p-single-voice__cat">
                                <?php
                                // タクソノミー名を 'voice-category' と仮定しています
                                $terms = get_the_terms(get_the_ID(), 'voice-category');
                                if ($terms && !is_wp_error($terms)) {
                                    echo esc_html($terms[0]->name);
                                } ?>
                            </span>
                        </div>
                    </div>
                    <div class="p-single-voice__body">
                        <?php get_feeld(); ?>
                        <div class="c-btn p-single-voice__btn">
                            <a href="<?php echo home_url('/voice/'); ?>" class="c-btn__link-n">一覧に戻る<span class="c-btn--circle"></span></a>
                        </div>
                    </div>
                </div>
                <?php
                // 読み込むサイドバーのテンプレート名も適宜変更してください
                get_template_part('template/sideber-voice');
                ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
