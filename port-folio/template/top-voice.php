<section class="p-top-voice l-top-voice ">
    <div class="p-archive-voice__container p-top-voice__container">
        <div class="p-top-voice__inner l-inner">
            <!-- タイトル -->
            <div class="c-title">
                <h2 class="c-title--l">VOICE</h2>
                <p class="c-title--s">お客様の声</p>
            </div>
            <div class="p-archive-voice__content p-top-voice__content">
                <ul class="p-archive-voice__card-list p-to-voice__card-list">
                    <?php
                    $args = array(
                        'post_type'      => 'voice',
                        'posts_per_page' => 7,
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                    );
                    $voice_query = new WP_Query($args);
                    if ($voice_query->have_posts()) :
                        while ($voice_query->have_posts()) : $voice_query->the_post(); ?>
                            <li class="p-archive-voice__card-item">
                                <a href="<?php the_permalink(); ?>" class="p-archive-voice__card">
                                    <div class="p-archive-voice__card-image">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <picture>
                                                <source media="(min-width: 768px)" srcset="<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(), 'voice-card-pc'); ?>">
                                                <img src="<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(), 'voice-card-sp'); ?>" alt="<?php the_title_attribute(); ?>">
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
                    <?php endwhile;
                        wp_reset_postdata();
                    endif; ?>
                </ul>
                <div class="p-archive-voice__btn">
                    <a href="<?php echo get_post_type_archive_link('voice'); ?>" class="c-btn-readmore">Read more</a>
                </div>
            </div>
        </div>
    </div>
</section>
