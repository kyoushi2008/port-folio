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
<section class="p-top-works l-top-works">
  <div class="p-top-works__cotent">
    <!-- タイトル -->
    <div class="c-title">
      <h2 class="c-title--l">WORKS</h2>
      <p class="c-title--s">実績</p>
    </div>
  </div>
</section>
<?php get_footer(); ?>
