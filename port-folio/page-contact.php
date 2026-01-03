<?php get_header(); ?>

<section class="p-contact l-contact">
    <div class="p-contact__container">
        <div class="p-contact__inner l-inner">
            <div class="c-title">
                <h2 class="c-title--l c-title--lp">WORKS</h2>
                <p class="c-title--s">実績</p>
            </div>
            <div class="p-content__content">
                <?php breadcrumb(); ?>
                <div class="p-contact__wrapper">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
