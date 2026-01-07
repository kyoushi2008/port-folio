<?php get_header(); ?>

<section class="p-fv l-fv">
  <div class="p-fv__swiper swiper">
    <div class="swiper-wrapper">
      <?php
      // 画像パスを簡潔にするための変数
      $img_path = get_theme_file_uri('/assets/images/top/');
      ?>
      <div class="swiper-slide p-fv__slide">
        <div class="p-fv__image">
          <picture>
            <source media="(max-width: 767px)" srcset="<?php echo $img_path; ?>fv-sp01.png">
            <img src="<?php echo $img_path; ?>fv-pc01.png" alt="fv01">
          </picture>
        </div>
      </div>
      <div class="swiper-slide p-fv__slide">
        <div class="p-fv__image">
          <picture>
            <source media="(max-width: 767px)" srcset="<?php echo $img_path; ?>fv-sp02.png">
            <img src="<?php echo $img_path; ?>fv-pc02.png" alt="fv02">
          </picture>
        </div>
      </div>
      <div class="swiper-slide p-fv__slide">
        <div class="p-fv__image">
          <picture>
            <source media="(max-width: 767px)" srcset="<?php echo $img_path; ?>fv-sp03.png">
            <img src="<?php echo $img_path; ?>fv-pc03.png" alt="fv03">
          </picture>
        </div>
      </div>
    </div>
  </div>
  <div class="p-fv__title-group">
    <p class="p-fv__text">High&thinsp;quality&thinsp;code<span class="p-fv-bar"></span></p>
    <div class="p-fv__title02"><span class="p-fv__title02--l">スキル</span>だけじゃない</div>
    <div class="p-fv__title01">パートナーに。</div>
  </div>
</section>

<!-- section works -->
<!-- <section class="p-top-works l-top-works"> -->
<!-- タイトル -->
<!-- <div class="c-title">
      <h2 class="c-title--l">WORKS</h2>
      <p class="c-title--s">実績</p>
    </div>
  </div>
</section> -->

<!-- section service -->
<section class="p-top-service l-top-service">
  <div class="p-top-service__content">
    <div class="p-top-sercive__title-group">
      <!-- 白タイトル -->
      <div class="c-title">
        <h2 class="c-title--l c-title--wl">SERVICE</h2>
        <p class="c-title--s c-title--ws">サービス</p>
      </div>
      <div class="c-btn">
        <a href="<?php echo home_url('/contact/'); ?>" class="c-btn__link c-btn__link--w">Read more<span class="c-btn--circle c-btn--circle--w"></span></a>
      </div>
    </div>

      <div class="p-top-service__scroll-area">
        <!-- First Row -->
        <div class="p-top-service__scroll-row p-top-service__scroll-row--1">
          <div class="p-top-service__scroll-inner">
            <span class="p-top-service__scroll-text">対応ソフトは？</span>
            <span class="p-top-service__scroll-text">得意分野は？</span>
            <span class="p-top-service__scroll-text">Figmaも対応</span>
            <span class="p-top-service__scroll-text">WordPressも大丈夫？</span>
            <span class="p-top-service__scroll-text">PHPのフォームは作れる？</span>
            <span class="p-top-service__scroll-text">対応ソフトは？</span>
            <span class="p-top-service__scroll-text">得意分野は？</span>
            <span class="p-top-service__scroll-text">Figmaも対応</span>
            <span class="p-top-service__scroll-text">WordPressも大丈夫？</span>
            <span class="p-top-service__scroll-text">PHPのフォームは作れる？</span>
          </div>
        </div>

        <!-- Second Row - Reverse Direction -->
        <div class="p-top-service__scroll-row p-top-service__scroll-row--2">
          <div class="p-top-service__scroll-inner">
            <span class="p-top-service__scroll-text">Figmaも対応できてる？</span>
            <span class="p-top-service__scroll-text">対応ソフトは？</span>
            <span class="p-top-service__scroll-text">得意分野は？</span>
            <span class="p-top-service__scroll-text">WordPressも大丈夫？</span>
            <span class="p-top-service__scroll-text">Figmaも対応できてる？</span>
            <span class="p-top-service__scroll-text">対応ソフトは？</span>
            <span class="p-top-service__scroll-text">得意分野は？</span>
            <span class="p-top-service__scroll-text">WordPressも大丈夫？</span>
          </div>
        </div>

        <!-- Third Row -->
        <div class="p-top-service__scroll-row p-top-service__scroll-row--3">
          <div class="p-top-service__scroll-inner">
            <span class="p-top-service__scroll-text">対応ソフトは？</span>
            <span class="p-top-service__scroll-text">得意分野は？</span>
            <span class="p-top-service__scroll-text">Figmaも対応</span>
            <span class="p-top-service__scroll-text">WordPressも大丈夫？</span>
            <span class="p-top-service__scroll-text">PHPのフォームは作れる？</span>
            <span class="p-top-service__scroll-text">対応ソフトは？</span>
            <span class="p-top-service__scroll-text">得意分野は？</span>
            <span class="p-top-service__scroll-text">Figmaも対応</span>
            <span class="p-top-service__scroll-text">WordPressも大丈夫？</span>
            <span class="p-top-service__scroll-text">PHPのフォームは作れる？</span>
          </div>
        </div>
      </div>

    <div class="p-top-service__fade p-top-service__fade--left"></div>
    <div class="p-top-service__fade p-top-service__fade--right"></div>
  </div>
  </div>
</section>

<!-- section profile -->
<secton class="p-top-profile l-top-profile">
  <a href="<?php echo esc_url(home_url('/profile/')); ?>" class="p-top-profile__link">
    <div class="p-top-profile__content">
      <div class="p-top-profile__title-group">
        <!-- 白タイトルラインセンター -->
        <div class="c-title p-top-profile__title">
          <h2 class="c-title--l c-title--wl">PROFILE</h2>
          <p class="c-title--s c-title--ws c-title--wsc">経歴・職歴</p>
        </div>
        <p class="p-top-profile__text">ここにテキスト入れるここにテキスト入れるここにテキスト入れる<br class="u-desktop">ここにテキスト入れるここにテキスト入れる</p>
      </div>
    </div>
  </a>
</secton>

<!-- section news -->
<?php get_template_part('template/top-news'); ?>
<?php get_footer(); ?>
