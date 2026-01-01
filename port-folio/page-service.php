<?php get_header(); ?>

<section class="p-service l-service">
    <div class="p-service__container">
        <div class="p-service__inner l-inner">
            <!-- タイトル -->
            <div class="c-title">
                <h2 class="c-title--l c-title--lp">SERVICE</h2>
                <p class="c-title--s">サービス</p>
            </div>
            <?php
            // 画像パスを簡潔にするための変数
            $img_path = get_theme_file_uri('/assets/images/service-/');
            ?>
            <picture class="p-service__top-image">
                <source media="(max-width: 767px)" srcset="<?php echo $img_path; ?>service-sp01.png">
                <img src="<?php echo $img_path; ?>service-pc01.png" alt="service" loading="lazy">
            </picture>
            <?php breadcrumb(); ?>
            <div class="p-price__content">
                <!-- タイトル -->
                <div class="c-title">
                    <h2 class="c-title--l c-title--lp">PRICE</h2>
                    <p class="c-title--s">料金</p>
                </div>

                <ul class="p-price__grid">
                    <!-- お見積もり -->
                    <li class="price-item">
                        <h3 class="price-title">お見積もり</h3>
                        <div class="price-content">
                            <span class="price-number">0</span>
                            <span class="price-unit">円</span>
                        </div>
                    </li>

                    <!-- 基本料金 -->
                    <li class="price-item">
                        <h3 class="price-title">基本料金</h3>
                        <div class="price-content">
                            <div class="price-detail">
                                <div class="price-row">
                                    <span class="price-row-label">トップ</span>
                                    <span class="price-number--s">00,000</span>
                                </div>
                                <div class="price-row">
                                    <span class="price-row-label">下層</span>
                                    <span class="price-number--s">00,000</span>
                                </div>
                            </div>
                            <div class="price-image">
                                <img src="<?php echo $img_path; ?>price-01.png" alt="基本料金" loading="lazy">
                            </div>
                        </div>
                    </li>

                    <!-- アニメーション -->
                    <li class="price-item">
                        <h3 class="price-title">アニメーション</h3>
                        <div class="price-content">
                            <span class="price-number--s">00,000</span>
                        </div>
                    </li>

                    <!-- レスポンシブ -->
                    <li class="price-item">
                        <h3 class="price-title">レスポンシブ</h3>
                        <div class="price-content">
                            <span class="price-number--s">00,000</span>
                            <div class="price-image">
                                <img src="<?php echo $img_path; ?>price-02.png" alt="レスポンシブ" loading="lazy">
                            </div>
                        </div>
                    </li>

                    <!-- 実装工期 -->
                    <li class="price-item">
                        <h3 class="price-title">実装工期</h3>
                        <div class="price-content">
                            <div class="price-detail price-detail02">
                                <div class="price-row02">
                                    <span class="price-label">平均</span>
                                    <span class="price-number--j">00</span>
                                    <span class="price-unit price-unit02">週間</span>
                                </div>
                                <p class="price-note u-desktop">※コーポレートサイト00ページあたり</p>
                            </div>
                            <div class="price-image">
                                <img src="<?php echo $img_path; ?>price-03.png" alt="実装工期" loading="lazy">
                            </div>
                        </div>
                        <p class="price-note u-mobile">※コーポレートサイト00ページあたり</p>
                    </li>

                </ul>

            </div>


            <div id="faq" class="l-faq p-faq">
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
