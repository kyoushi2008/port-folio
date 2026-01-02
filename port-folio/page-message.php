<?php get_header(); ?>

<section class="p-message l-message">
    <div class="p-message__container">
        <div class="p-message__inner l-inner">
            <!-- タイトル -->
            <div class="c-title">
                <h2 class="c-title--l">MESSAGE</h2>
                <p class="c-title--s">メッセージ</p>
            </div>
            <?php
            // 画像パスを簡潔にするための変数
            $img_path = get_theme_file_uri('/assets/images/message/');
            ?>
            <picture class="p-message__top-image">
                <source media="(max-width: 767px)" srcset="<?php echo $img_path; ?>message-sp01.png">
                <img src="<?php echo $img_path; ?>message-pc01.png" alt="message" loading="lazy">
            </picture>
            <?php breadcrumb(); ?>
            <div class="p-message__content">
                <div class="p-message__content-group">
                    <div class="p-message__content-title-wrapper">
                        <h2 class="p-message__content-title">丁寧な作業とコミュニケーションで</h2>
                        <!-- ラベル -->
                        <span class="c-label">ハイクオリティなコードを納品。</span>
                        <div class="p-message__content-text-group">
                            <p class="p-message__content-text">ここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入る</p>
                            <p class="p-message__content-text">ここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入る</p>
                        </div>
                    </div>
                    <div class="p-message__content-person">
                        <picture>
                            <source media="(max-width: 767px)" srcset="<?php echo $img_path; ?>message-sp02.png">
                            <img src="<?php echo $img_path; ?>message-pc02.png" alt="message" loading="lazy">
                        </picture>
                        <p class="p-message__content-person-name">田中&thinsp;太郎</p>
                        <p class="p-message__content-person-spell">Tanaka&thinsp;Tarou</p>
                    </div>
                </div>
                <div class="p-message__content-slide-group">
                    <!-- 上段：右へスライド -->
                    <ul class="slide-list">
                        <li class="slide-item">
                            <img src="<?php echo $img_path; ?>message-img01.png" alt="message-img01" loading="lazy">
                        </li>
                        <li class="slide-item">
                            <img src="<?php echo $img_path; ?>message-img02.png" alt="message-img02" loading="lazy">
                        </li>
                        <li class="slide-item">
                            <img src="<?php echo $img_path; ?>message-img03.png" alt="message-img03" loading="lazy">
                        </li>
                        <li class="slide-item">
                            <img src="<?php echo $img_path; ?>message-img04.png" alt="message-img04" loading="lazy">
                        </li>
                        <!-- 複製（無限ループ用） -->
                        <li class="slide-item">
                            <img src="<?php echo $img_path; ?>message-img01.png" alt="message-img01" loading="lazy">
                        </li>
                        <li class="slide-item">
                            <img src="<?php echo $img_path; ?>message-img02.png" alt="message-img02" loading="lazy">
                        </li>
                        <li class="slide-item">
                            <img src="<?php echo $img_path; ?>message-img03.png" alt="message-img03" loading="lazy">
                        </li>
                        <li class="slide-item">
                            <img src="<?php echo $img_path; ?>message-img04.png" alt="message-img04" loading="lazy">
                        </li>
                    </ul>
                    <!-- 下段：左へスライド -->
                    <ul class="slide-list">
                        <li class="slide-item">
                            <img src="<?php echo $img_path; ?>message-img01.png" alt="message-img01" loading="lazy">
                        </li>
                        <li class="slide-item">
                            <img src="<?php echo $img_path; ?>message-img02.png" alt="message-img02" loading="lazy">
                        </li>
                        <li class="slide-item">
                            <img src="<?php echo $img_path; ?>message-img03.png" alt="message-img03" loading="lazy">
                        </li>
                        <li class="slide-item">
                            <img src="<?php echo $img_path; ?>message-img04.png" alt="message-img04" loading="lazy">
                        </li>
                        <!-- 複製（無限ループ用） -->
                        <li class="slide-item">
                            <img src="<?php echo $img_path; ?>message-img01.png" alt="message-img01" loading="lazy">
                        </li>
                        <li class="slide-item">
                            <img src="<?php echo $img_path; ?>message-img02.png" alt="message-img02" loading="lazy">
                        </li>
                        <li class="slide-item">
                            <img src="<?php echo $img_path; ?>message-img03.png" alt="message-img03" loading="lazy">
                        </li>
                        <li class="slide-item">
                            <img src="<?php echo $img_path; ?>message-img04.png" alt="message-img04" loading="lazy">
                        </li>
                    </ul>
                </div>
            </div>
            <div class="p-message__content02">
                <div class="p-message__content-group02">
                        <h2 class="p-message__content-title">丁寧な作業とコミュニケーションで</h2>
                        <!-- ラベル -->
                        <span class="c-label">ハイクオリティなコードを納品。</span>
                        <div class="p-message__content-text-group p-message__content02-text-group02">
                            <p class="p-message__content-text">ここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入る</p>
                            <p class="p-message__content-text">ここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入る</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<?php get_footer(); ?>
