<?php get_header(); ?>

<section class="p-contact l-contact">
    <div class="p-contact__container">
        <div class="p-contact__inner l-inner">
            <div class="c-title">
                <h1 class="c-title--l c-title--lp">CONTACT</h1>
                <p class="c-title--s">お問い合わせ</p>
            </div>
            <div class="p-breadcrumb">
                <?php breadcrumb(); ?>
            </div>
            <div class="p-contact__content">
                <?php the_content(); ?>

            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>