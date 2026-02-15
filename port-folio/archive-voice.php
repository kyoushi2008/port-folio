<?php get_header(); ?>
<section class="p-archive-voice l-archive-voice">
    <div class="p-archive-voice__container">
        <div class="p-archive-voice__inner l-inner">
            <div class="c-title">
                <h1 class="c-title--l c-title--lp">VOICE</h1>
                <p class="c-title--s">お客様の声</p>
            </div>
            <div class="p-archive-voice__content">
                <?php breadcrumb(); ?>
                <ul class="p-archive-voice__card-list">
                    <?php
                    if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                    <li class="p-archive-voice__card-item">
                        <a href="<?php the_permalink(); ?>" class="p-archive-voice__card">
                            <div class="p-archive-voice__card-image">
                                <?php if (has_post_thumbnail()) : ?>
                                <picture>
                                    <source media="(min-width: 768px)"
                                        srcset="<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(), 'voice-card-pc'); ?>">
                                    <img src="<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(), 'voice-card-sp'); ?>"
                                        alt="<?php the_title_attribute(); ?>">
                                </picture>
                                <?php endif; ?>
                                <?php
                                        $terms = get_the_terms(get_the_ID(), 'voice-category');
                                        if ($terms && !is_wp_error($terms)) :
                                            $term = array_shift($terms);
                                        ?>
                                <span class="p-archive-voice__card-category"><?php echo esc_html($term->name); ?></span>
                                <?php endif; ?>
                                <div class="p-archive-voice__card-title-wrapper">
                                    <h2 class="p-archive-voice__card-title"><?php the_title(); ?></h2>
                                </div>
                            </div>
                        </a>
                    </li>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
                <div class="p-archive-voice__pagination">
                    <?php
                    get_template_part('template/pagination');
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>