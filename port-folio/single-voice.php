<?php get_header(); ?>

<?php get_header(); ?>

<section class="p-single-voice l-single-voice">
    <div class="p-single-voice__container">
        <div class="p-single-voice__inner l-inner">
            <?php
            $img_path = get_theme_file_uri('/assets/images/single-voice/');
            ?>
            <picture class="p-message__top-image">
                <source media="(max-width: 767px)" srcset="<?php echo $img_path; ?>voice-image-sp01.png">
                <img src="<?php echo $img_path; ?>voice-image-pc01.png" alt="voice-image" loading="lazy">
            </picture>
            <div class="p-single-voice__content">
                <div class="p-single-voice__content-wrapper">
                    <?php
                    $terms = get_the_terms(get_the_ID(), 'voice-category');
                    if ($terms && !is_wp_error($terms)) {
                        echo esc_html($terms[0]->name);
                    } ?>
                    </span>
                </div>
            </div>
            <div class="p-single-voice__body">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>

<?php get_footer(); ?>
