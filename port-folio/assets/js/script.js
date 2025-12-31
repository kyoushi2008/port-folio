
jQuery(function ($) {

  // ページトップボタン
  var topBtn = $('.js-pagetop');
  topBtn.hide();

  // ページトップボタンの表示設定
  $(window).scroll(function () {
    if ($(this).scrollTop() > 70) {
      // 指定px以上のスクロールでボタンを表示
      topBtn.fadeIn();
    } else {
      // 画面が指定pxより上ならボタンを非表示
      topBtn.fadeOut();
    }
  });

  // ページトップボタンをクリックしたらスクロールして上に戻る
  topBtn.click(function () {
    $('body,html').animate({
      scrollTop: 0
    }, 300, 'swing');
    return false;
  });

  // スムーススクロール (絶対パスのリンク先が現在のページであった場合でも作動。ヘッダーの高さ考慮。)
  $(document).on('click', 'a[href*="#"]', function () {
    let time = 400;
    let header = $('header').innerHeight();
    let target = $(this.hash);
    if (!target.length) return;
    let targetY = target.offset().top - header;
    $('html,body').animate({ scrollTop: targetY }, time, 'swing');
    return false;
  });

});

// ハンバーガー
$('.js-hamburger').on('click', function () {
  $(this).toggleClass('is-active');
  $('.js-drawer').fadeToggle();
  $('body').toggleClass('active');
});

$('.js-drawer a').on('click', function () {
  $('.js-hamburger').removeClass('is-active');
  $('.js-drawer').fadeOut();
  $('body').removeClass('active');
});

// ファーストビュー
$(function() {
  // FV Swiper
  const fvSwiper = new Swiper('.p-fv__swiper', {
    effect: 'fade',
    speed: 1000,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    // loop: true,
  });
});

// ファーストビューテキスト
$(function() {
  const fvSwiper = new Swiper('.p-fv__swiper', {
    effect: 'fade',
    fadeEffect: {
      crossFade: true,
    },
    speed: 1000,
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
  });

  const $fvTitle01 = $('.p-fv__title01');
  const $fvTitle02 = $('.p-fv__title02');

  if ($fvTitle02.length) {
    const text02 = $fvTitle02.text();
    const htmlContent02 = text02.split('').map(char => {
      return `<span class="is-fv-title">${char}</span>`;
    }).join('');
    $fvTitle02.html(htmlContent02).css('visibility', 'visible');

    const $spans02 = $fvTitle02.find('.is-fv-title');
    let delayCounter = 0;

    $spans02.each(function() {
      const $span = $(this);
      setTimeout(() => {
        $span.addClass('is-fv-show');
      }, 80 * delayCounter);
      delayCounter++;
    });
  }

  if ($fvTitle01.length) {
    const text01 = $fvTitle01.text();
    const htmlContent01 = text01.split('').map(char => {
      return `<span class="is-fv-title">${char}</span>`;
    }).join('');
    $fvTitle01.html(htmlContent01).css('visibility', 'visible');

    const $spans01 = $fvTitle01.find('.is-fv-title');
    let delayCounter = 0;

    $spans01.each(function() {
      const $span = $(this);
      setTimeout(() => {
        $span.addClass('is-fv-show');
      }, 80 * (9 + delayCounter));
      delayCounter++;
    });
  }
});
