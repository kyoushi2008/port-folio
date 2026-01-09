<?php get_header(); ?>

<section class="p-single-voice l-single-voice">
    <div class="p-single-voice__container">
        <?php
        $img_path = get_theme_file_uri('/assets/images/single-voice/');
        ?>
        <picture class="p-single-voice__top-image">
            <source media="(max-width: 767px)" srcset="<?php echo $img_path; ?>voice-image-sp01.png">
            <img src="<?php echo $img_path; ?>voice-image-pc01.png" alt="voice-image" loading="lazy">
        </picture>
        <div class="p-single-voice__inner l-inner">
            <div class="p-single-voice__content">
                <div class="p-single-voice__content-wrapper">
                    <div class="p-single-voice__content-group">
                        <h2 class="p-single-voice__content-title">丁寧な作業とコミュニケーションで</h2>
                        <!-- ラベル -->
                        <span class="c-label">ハイクオリティなコードを納品。</span>
                        <div class="p-single-voice__content-text-group">
                            <p class="p-single-voice__content-text">ここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入る</p>
                            <p class="p-single-voice__content-text">ここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入る</p>
                        </div>
                        <picture class="p-single-voice__image01">
                            <source media="(max-width: 767px)" srcset="<?php echo $img_path; ?>voice-image-sp02.png">
                            <img src="<?php echo $img_path; ?>voice-image-pc02.png" alt="voice-image" loading="lazy">
                        </picture>
                    </div>
                    <div class="p-single-voice__content-group">
                        <h2 class="p-single-voice__content-title">丁寧な作業とコミュニケーションで</h2>
                        <!-- ラベル -->
                        <span class="c-label">ハイクオリティなコードを納品。</span>
                        <div class="p-single-voice__content-text-group">
                            <p class="p-single-voice__content-text">ここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入る</p>
                            <p class="p-single-voice__content-text">ここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入る</p>
                        </div>
                        <div class="p-single-voice__image-group">
                            <picture class="p-single-voice__image02">
                                <source media="(max-width: 767px)" srcset="<?php echo $img_path; ?>voice-image-sp04.png">
                                <img src="<?php echo $img_path; ?>voice-image-pc04.png" alt="voice-image" loading="lazy">
                            </picture>
                            <picture class="p-single-voice__image03">
                                <source media="(max-width: 767px)" srcset="<?php echo $img_path; ?>voice-image-sp05.png">
                                <img src="<?php echo $img_path; ?>voice-image-pc05.png" alt="voice-image" loading="lazy">
                            </picture>
                        </div>
                    </div>
                </div>
                <div class="p-single-voice__content-person">
                    <picture>
                        <source media="(max-width: 767px)" srcset="<?php echo $img_path; ?>voice-image-sp03.png">
                        <img src="<?php echo $img_path; ?>voice-image-pc03.png" alt="single-voice" loading="lazy">
                    </picture>
                    <p class="p-single-voice__content-person-company">株式会社&thinsp;XXXXXX</p>
                    <p class="p-single-voice__content-person-name">代表&thinsp;田中&thinsp;太郎</p>
                    <!-- ボタン -->
                    <div class="c-btn p-single-voice__btn">
                        <a href="<?php echo home_url('/voice/'); ?>" class="c-btn__link-n">一覧に戻る<span class="c-btn--circle"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>

<?php get_footer(); ?>
