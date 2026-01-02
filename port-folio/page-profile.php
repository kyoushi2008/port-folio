<?php get_header(); ?>
<section class="p-profile l-profile">
    <div class="p-profile__container">
        <div class="p-profile__inner l-inner">
            <!-- タイトル -->
            <div class="c-title">
                <h2 class="c-title--l c-title--lp">profile</h2>
                <p class="c-title--s">メッセージ</p>
            </div>
            <?php
            // 画像パスを簡潔にするための変数
            $img_path = get_theme_file_uri('/assets/images/profile/');
            ?>
            <picture class="p-profile__top-image">
                <source media="(max-width: 767px)" srcset="<?php echo $img_path; ?>profile-sp01.png">
                <img src="<?php echo $img_path; ?>profile-pc01.png" alt="profile" loading="lazy">
            </picture>
            <?php breadcrumb(); ?>
            <div class="p-profile__content">


<?php get_footer(); ?>
