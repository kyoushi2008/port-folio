</main>
<?php get_template_part('template/footer-cta'); ?>
<footer class="p-footer l-footer">
  <div class="p-footer__inner l-inner">
    <div class="p-footer__wrapper">
      <div class="p-footer__group">
        <div class="p-footer__logo">
          <a href="<?php echo esc_url(home_url('/')); ?>">CODE ASSIST</a>
        </div>

        <div class="p-footer__icon-group">
          <?php
          // 画像パスを簡潔にするための変数
          $img_path = get_theme_file_uri('/assets/images/footer/');
          ?>
          <a href="https://line.me/" class="p-footer__icon-line" target="_blank" rel="noopener noreferrer">
            <img src="<?php echo $img_path; ?>line-icon.png" alt="lineアイコン">
          </a>
          <a href="https://x.com/" class="p-footer__icon-x" target="_blank" rel="noopener noreferrer">
            <img src="<?php echo $img_path; ?>x-icon.png" alt="xアイコン">
          </a>
          <a href="https://instagram.com/" class="p-footer__icon-instagram" target="_blank" rel="noopener noreferrer">
            <img src="<?php echo $img_path; ?>instagram-icon.png" alt="instagramアイコン">
          </a>
          <a href="https://facebook.com/" class="p-footer__icon-facebook" target="_blank" rel="noopener noreferrer">
            <img src="<?php echo $img_path; ?>facebook-icon.png" alt="facebookアイコン">
          </a>
        </div>

        <div class="p-footer__privacy">
          <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>" class="p-footer__privacy-text">プライバシーポリシー</a>
        </div>
      </div>
      <div class="p-footer__list-group">
        <ul class="p-footer__nav-list">
          <li class="p-footer__nav-item">
            <a href="<?php echo esc_url(home_url('/works/')); ?>" class="p-footer__nav-link">
              <p class="p-footer__nav-text--l">WORK</p>
              <p class="p-footer__nav-text">実績</p>
            </a>
          </li>
          <li class="p-footer__nav-item">
            <a href="<?php echo esc_url(home_url('/service/')); ?>" class="p-footer__nav-link">
              <p class="p-footer__nav-text--l">SERVICE</p>
              <p class="p-footer__nav-text">サービス</p>
            </a>
          </li>
          <li class="p-footer__nav-item">
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="p-footer__nav-link">
              <p class="p-footer__nav-text--l">CONTACT</p>
              <p class="p-footer__nav-text">お問い合わせ</p>
            </a>
          </li>
          <li class="p-footer__nav-item">
            <a href="<?php echo esc_url(home_url('/voice/')); ?>" class="p-footer__nav-link">
              <p class="p-footer__nav-text--l">VOICE</p>
              <p class="p-footer__nav-text">お客様の声</p>
            </a>
          </li>
        </ul>

        <ul class="p-footer__nav-list">
          <li class="p-footer__nav-item">
            <a href="<?php echo esc_url(home_url('/message/')); ?>" class="p-footer__nav-link">
              <p class="p-footer__nav-text--l">MESSAGE</p>
              <p class="p-footer__nav-text">メッセージ</p>
            </a>
          </li>
          <li class="p-footer__nav-item">
            <a href="<?php echo esc_url(home_url('/profile/')); ?>" class="p-footer__nav-link">
              <p class="p-footer__nav-text--l">PROFILE</p>
              <p class="p-footer__nav-text">経歴・職歴</p>
            </a>
          </li>
          <li class="p-footer__nav-item">
            <a href="<?php echo esc_url(home_url('/service/#faq')); ?>" class="p-footer__nav-link">
              <p class="p-footer__nav-text--l">FAQ</p>
              <p class="p-footer__nav-text">よくあるご質問</p>
            </a>
          </li>
          <li class="p-footer__nav-item">
            <a href="<?php echo esc_url(home_url('/news/')); ?>" class="p-footer__nav-link">
              <p class="p-footer__nav-text--l">NEWS</p>
              <p class="p-footer__nav-text">お知らせ</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <small class="p-footer__copyright">&copy;2024&emsp;&thinsp;CODO ASSIST</small>
  </div>
</footer>
 <!-- ボタントップへもどる -->
        <div class="c-btn c-btn--l js-pagetop">
            <a href="<?php echo home_url('/contact/'); ?>" class="c-btn__link"><span class="c-btn--circle c-btn--l-circle"></span></a>
        </div>
<?php wp_footer(); ?>
</body>

</html>
