<?php get_header(); ?>
<section class="p-profile l-profile">
    <div class="p-profile__container">
        <div class="p-profile__inner l-inner">
            <!-- タイトル -->
            <div class="c-title">
                <h2 class="c-title--l c-title--lp">PROFILE</h2>
                <p class="c-title--s">経歴・職歴</p>
            </div>
            <?php
            // 画像パスを簡潔にするための変数
            $img_path = get_theme_file_uri('/assets/images/profile/');
            ?>
            <picture class="p-profile__top-image">
                <source media="(max-width: 767px)" srcset="<?php echo $img_path; ?>profile-sp01.png">
                <img src="<?php echo $img_path; ?>profile-pc01.png" alt="profile" loading="lazy">
            </picture>
        </div>
        <!-- code skill -->
        <div class="p-profile__content">
            <div class="p-profile__inner l-inner">
                <?php breadcrumb(); ?>
                <div class="p-profile__wrapper">
                    <!-- タイトル -->
                    <div class="c-title c-title--50">
                        <h2 class="c-title--l c-title--ls">CODE SKILL</h2>
                        <p class="c-title--s">対応が可能なコーディングスキルと<br class="u-mobile">デザインデータ</p>
                    </div>
                    <div class="p-profile__slill-wrapper">
                        <div class="p-profile__coding-group">
                            <p class="p-profile__title">コーディング</p>
                            <ul class="p-profile__list">
                                <li class="p-profile__item">
                                    <img src="<?php echo $img_path; ?>html-icon.png" alt="html-icon" loading="lazy" class="html-icon">
                                    <span class="p-profile__name">HTML</span>
                                </li>
                                <li class="p-profile__item">
                                    <img src="<?php echo $img_path; ?>css-icon.png" alt="css-icon" loading="lazy" class="css-icon">
                                    <span class="p-profile__name">CSS</span>
                                </li>
                                <li class="p-profile__item">
                                    <img src="<?php echo $img_path; ?>sass-icon.png" alt="sass-icon" loading="lazy" class="sass-icon">
                                    <span class="p-profile__name">Sass</span>
                                </li>
                                <li class="p-profile__item">
                                    <img src="<?php echo $img_path; ?>javascript-icon.png" alt="javascript-icon" loading="lazy" class="javascript-icon">
                                    <span class="p-profile__name">JavaScript</span>
                                </li>
                                <li class="p-profile__item">
                                    <img src="<?php echo $img_path; ?>php-icon.png" alt="php-icon" loading="lazy" class="php-icon">
                                    <span class="p-profile__name">PHP</span>
                                </li>
                            </ul>
                        </div>

                        <div class="p-profile-cms__group">
                            <p class="p-profile__title">CMS</p>
                            <ul class="p-profile__list p-profile__cms-list">
                                <li class="p-profile__item">
                                    <img src="<?php echo $img_path; ?>wordpress-icon.png" alt="wordpress-icon" loading="lazy" class="wordpress-icon">
                                    <span class="p-profile__name p-profile__name--l">WordPress</span>
                                </li>
                            </ul>
                        </div>

                        <div class="p-profile__design-group">
                            <p class="p-profile__title">デザイン</p>
                            <ul class="p-profile__list p-profile__design-list">
                                <li class="p-profile__item">
                                    <img src="<?php echo $img_path; ?>illustrator-icon.png" alt="illustrator-icon" loading="lazy" class="illustrator-icon">
                                    <span class="p-profile__name p-profile__name--l">Illustrator</span>
                                </li>
                                <li class="p-profile__item">
                                    <img src="<?php echo $img_path; ?>photoshop-icon.png" alt="photoshop-icon" loading="lazy" class="photoshop-icon">
                                    <span class="p-profile__name p-profile__name--l">Photoshop</span>
                                </li>
                                <li class="p-profile__item">
                                    <img src="<?php echo $img_path; ?>xd-icon.png" alt="xd-icon" loading="lazy" class="xd-icon">
                                    <span class="p-profile__name p-profile__name--l">XD</span>
                                </li>
                                <li class="p-profile__item">
                                    <img src="<?php echo $img_path; ?>figma-icon.png" alt="wordpress-icon" loading="lazy" class="figma-icon">
                                    <span class="p-profile__name p-profile__name--l">Figma</span>
                                </li>
                            </ul>
                        </div>

                        <div class="p-profile__communication-group">
                            <p class="p-profile__title">コミュニケーション</p>
                            <ul class="p-profile__list p-profile__communication-list">
                                <li class="p-profile__item">
                                    <img src="<?php echo $img_path; ?>chatwork-icon.png" alt="chatwork-icon" loading="lazy" class="chatwork-icon">
                                    <span class="p-profile__name p-profile__name--l">Chatwork</span>
                                </li>
                                <li class="p-profile__item">
                                    <img src="<?php echo $img_path; ?>mail-icon.png" alt="mail-icon" loading="lazy" class="mail-icon">
                                    <span class="p-profile__name p-profile__name--l">メール</span>
                                </li>
                                <li class="p-profile__item">
                                    <img src="<?php echo $img_path; ?>slack-icon.png" alt="slack-icon" loading="lazy" class="slack-icon">
                                    <span class="p-profile__name p-profile__name--l">Slack</span>
                                </li>
                                <li class="p-profile__item">
                                    <img src="<?php echo $img_path; ?>line-icon.png" alt="line-icon" loading="lazy" class="line-icon">
                                    <span class="p-profile__name p-profile__name--l">LINE</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //////////////////////////////////////////////// -->
        <div class="p-profile__inner l-inner">
            <div class="p-profile__content02">
                <div class="p-profile__content02-group">
                    <div class="p-profile__content02-title-wrapper">
                        <h2 class="p-profile__content02-title">丁寧な作業とコミュニケーションで</h2>
                        <!-- ラベル -->
                        <span class="c-label">ハイクオリティなコードを納品。</span>
                        <div class="p-profile__content02-text-group">
                            <p class="p-profile__content02-text">ここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入る</p>
                            <p class="p-profile__content02-text">ここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入る</p>
                        </div>
                        <picture class="profile-picture01">
                            <source media="(max-width: 767px)" srcset="<?php echo $img_path; ?>profile-sp03.png">
                            <img src="<?php echo $img_path; ?>profile-pc03.png" alt="モックアップ" loading="lazy">
                        </picture>
                    </div>
                    <div class="p-profile__content02-title-wrapper">
                        <h2 class="p-profile__content02-title">丁寧な作業とコミュニケーションで</h2>
                        <!-- ラベル -->
                        <span class="c-label">ハイクオリティなコードを納品。</span>
                        <div class="p-profile__content02-text-group">
                            <p class="p-profile__content02-text">ここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入る</p>
                            <p class="p-profile__content02-text">ここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入る</p>
                        </div>
                        <div class="p-profile__img-group">
                            <picture class="profile-picture02">
                                <source media="(max-width: 767px)" srcset="<?php echo $img_path; ?>profile-sp04.png">
                                <img src="<?php echo $img_path; ?>profile-pc04.png" alt="profile-sp04" loading="lazy">
                            </picture>
                            <picture class="profile-picture03">
                                <source media="(max-width: 767px)" srcset="<?php echo $img_path; ?>profile-sp05.png">
                                <img src="<?php echo $img_path; ?>profile-pc05.png" alt="profile-sp05" loading="lazy">
                            </picture>
                        </div>
                    </div>
                </div>
                <div class="p-profile__content02-person">
                    <div class="p-profile__content02-person-img-group">
                        <picture>
                            <source media="(max-width: 767px)" srcset="<?php echo $img_path; ?>profile-sp02.png">
                            <img src="<?php echo $img_path; ?>profile-pc02.png" alt="田中太郎" loading="lazy">
                        </picture>
                        <p class="p-profile__content02-person-name">田中&thinsp;太郎</p>
                        <p class="p-profile__content02-person-spell">Tanaka&thinsp;Tarou</p>
                    </div>
                    <div class="p-profile__content02-person-text-group">
                        <div class="p-profile__content02-person-text-block">
                            <!-- テキスト 上タイトルサイズ28 -->
                            <div class="c-title c-title--28">
                                <p class="c-title--l c-title--black">経歴</p>
                                <p class="c-title--s">&emsp;</p>
                            </div>
                            <p class="p-profile__content02-text02">ここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入る</p>
                        </div>
                        <div class="p-profile__content02-person-text-block">
                            <!-- テキスト 上タイトルサイズ28 -->
                            <div class="c-title c-title--28">
                                <p class="c-title--l c-title--black">職歴</p>
                                <p class="c-title--s">&emsp;</p>
                            </div>
                            <p class="p-profile__content02-text02">ここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入る</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
