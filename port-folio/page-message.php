<?php get_header(); ?>

<section class="p-message l-message">
    <div class="p-message__container">
        <!-- タイトル -->
        <div class="c-title">
            <h2 class="c-title--l c-title--lp">MESSAGE</h2>
            <p class="c-title--s">メッセージ</p>
        </div>
        <?php
        // 画像パスを簡潔にするための変数
        $img_path = get_theme_file_uri('/assets/images/message/');
        ?>
        <picture>
            <source media="(max-width: 767px)" srcset="<?php echo $img_path; ?>message-sp01.png">
            <img src="<?php echo $img_path; ?>message-pc01.png" alt="message">
        </picture>
        <?php breadcrumb(); ?>
    </div>
</section>

<?php get_footer(); ?>
