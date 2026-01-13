jQuery(function ($) {
  // ページトップボタン
  var topBtn = $(".js-pagetop");
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
    $("body,html").animate(
      {
        scrollTop: 0,
      },
      300,
      "swing"
    );
    return false;
  });

  // スムーススクロール (絶対パスのリンク先が現在のページであった場合でも作動。ヘッダーの高さ考慮。)
  $(document).on("click", 'a[href*="#"]', function () {
    let time = 400;
    let header = $("header").innerHeight();
    let target = $(this.hash);
    if (!target.length) return;
    let targetY = target.offset().top - header;
    $("html,body").animate({ scrollTop: targetY }, time, "swing");
    return false;
  });
});

// ハンバーガー
$(".js-hamburger").on("click", function () {
  $(this).toggleClass("is-active");
  $(".js-drawer").fadeToggle();
  $("body").toggleClass("active");
});

$(".js-drawer a").on("click", function () {
  $(".js-hamburger").removeClass("is-active");
  $(".js-drawer").fadeOut();
  $("body").removeClass("active");
});

// ファーストビュー
$(function () {
  // FV Swiper
  const fvSwiper = new Swiper(".p-fv__swiper", {
    effect: "fade",
    speed: 1000,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    // loop: true,
  });
});

// ファーストビューテキスト
$(function () {
  const fvSwiper = new Swiper(".p-fv__swiper", {
    effect: "fade",
    fadeEffect: {
      crossFade: true,
    },
    speed: 1000,
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
  });

  const $fvTitle01 = $(".p-fv__title01");
  const $fvTitle02 = $(".p-fv__title02");

  if ($fvTitle02.length) {
    // p-fv__title02--l の内容を取得して分割
    const $title02L = $fvTitle02.find(".p-fv__title02--l");
    const text02L = $title02L.text();
    const htmlContent02L = text02L
      .split("")
      .map((char) => {
        return `<span class="is-fv-title">${char}</span>`;
      })
      .join("");
    $title02L.html(htmlContent02L);

    // 残りのテキストノードを取得して分割
    const remainingText = $fvTitle02
      .contents()
      .filter(function () {
        return this.nodeType === 3; // テキストノードのみ
      })
      .text();

    const htmlContentRemaining = remainingText
      .split("")
      .map((char) => {
        return `<span class="is-fv-title">${char}</span>`;
      })
      .join("");

    // テキストノードを置き換え
    $fvTitle02
      .contents()
      .filter(function () {
        return this.nodeType === 3;
      })
      .replaceWith(htmlContentRemaining);

    $fvTitle02.css("visibility", "visible");

    const $spans02 = $fvTitle02.find(".is-fv-title");
    let delayCounter = 0;

    $spans02.each(function () {
      const $span = $(this);
      setTimeout(() => {
        $span.addClass("is-fv-show");
      }, 80 * delayCounter);
      delayCounter++;
    });
  }

  if ($fvTitle01.length) {
    const text01 = $fvTitle01.text();
    const htmlContent01 = text01
      .split("")
      .map((char) => {
        return `<span class="is-fv-title">${char}</span>`;
      })
      .join("");
    $fvTitle01.html(htmlContent01).css("visibility", "visible");

    const $spans01 = $fvTitle01.find(".is-fv-title");
    let delayCounter = 0;

    $spans01.each(function () {
      const $span = $(this);
      setTimeout(() => {
        $span.addClass("is-fv-show");
      }, 80 * (9 + delayCounter));
      delayCounter++;
    });
  }
});

// FAQ
$(document).ready(function () {
  $(".p-service-faq__list").each(function (e) {
    var i = $(this),
      s = i.find(".p-service-faq__text-box");
    0 === e ? (i.addClass("is-open"), s.show()) : s.hide();
  });

  $(".p-service-faq__list-title").on("click", function () {
    var e = $(this).closest(".p-service-faq__list"),
      i = e.find(".p-service-faq__text-box");
    e.hasClass("is-open")
      ? (i.slideUp(400), e.removeClass("is-open"))
      : (i.slideDown(400), e.addClass("is-open"));
  });

  $(".p-service-faq__icon-q").each(function (index) {
    $(this).text("Q" + (index + 1));
  });

  // PC のときだけ末尾にドットを付ける
  if (window.matchMedia("(min-width: 1025px)").matches) {
    $(".p-service-faq__icon-q").each(function (index) {
      $(this).text("Q" + (index + 1) + ".");
    });
  }

  // 初期状態で 15 個以降を非表示
  $(".p-service-faq__list").slice(7).hide();

  // もっと見る
  $(".p-service-faq__more").on("click", function () {
    $(".p-service-faq__list")
      .slice(7)
      .each(function () {
        $(this)
          .css({ display: "block", opacity: 0 })
          .animate({ opacity: 1 }, 400);
      });

    $(this).fadeOut(300);
  });
});

// カウント
$(function () {
  // カンマ付きの文字列を数値に戻す
  function parseNumber(str) {
    return Number(str.replace(/,/g, ""));
  }

  // 数値を桁固定のままカンマ付きに戻す
  function formatFixed(num, digits) {
    const padded = String(num).padStart(digits, "0");
    return padded.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }

  // ★ 千の位だけカウントする
  function countUpThousandsOnly($el, endValue, digits, duration = 1000) {
    const maxThousands = endValue / 1000;
    let current = 0;

    const fps = 30;
    const totalSteps = duration / (1000 / fps);
    const step = maxThousands / totalSteps;

    const timer = setInterval(() => {
      current += step;
      if (current >= maxThousands) {
        current = maxThousands;
        clearInterval(timer);
      }

      const thousandsInt = Math.floor(current);
      const value = thousandsInt * 1000;

      $el.text(formatFixed(value, digits));
    }, 1000 / fps);
  }

  // 実装工期（1 → 4）
  function countUpSimple($el, endValue, duration = 1000) {
    let current = 1;
    const fps = 30;
    const totalSteps = duration / (1000 / fps);
    const step = (endValue - 1) / totalSteps;

    const timer = setInterval(() => {
      current += step;
      if (current >= endValue) {
        current = endValue;
        clearInterval(timer);
      }
      $el.text(Math.floor(current));
    }, 1000 / fps);
  }
  function countDown($el, startValue, duration = 1000) {
    let current = startValue;
    const fps = 30;
    const totalSteps = duration / (1000 / fps);
    const step = startValue / totalSteps;
    $el.text(startValue);
    const timer = setInterval(() => {
      current -= step;
      if (current <= 0) {
        current = 0;
        clearInterval(timer);
      }
      $el.text(Math.floor(current));
    }, 1000 / fps);
  }
  // IntersectionObserver
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (!entry.isIntersecting) return;

      const $el = $(entry.target);

      if ($el.hasClass("price-number")) {
        countDown($el, 100);
      }

      if ($el.hasClass("price-number--s")) {
        const index = $(".price-number--s").index($el);

        if (index === 0) countUpThousandsOnly($el, 20000, 5);
        if (index === 1) countUpThousandsOnly($el, 10000, 5);
        if (index === 2) countUpThousandsOnly($el, 5000, 4);
        if (index === 3) countUpThousandsOnly($el, 50000, 5);
      }

      if ($el.hasClass("price-number--j")) {
        countUpSimple($el, 4);
      }

      observer.unobserve(entry.target);
    });
  });

  document
    .querySelectorAll(".price-number--s")
    .forEach((el) => observer.observe(el));
  observer.observe(document.querySelector(".price-number--j"));
  observer.observe(document.querySelector(".price-number"));
});


////////// single-voice swiper
if (window.innerWidth < 768) {
  // 上のSwiper
  const swiperTop = new Swiper('.p-single-voice__swiper-top', {
    loop: true,
    loopedSlides: 2,
    slidesPerView: 'auto',
    spaceBetween: 25,
    speed: 10000,
    allowTouchMove: false,
    autoplay: {
      delay: 0,
      disableOnInteraction: false,
    },
  });

  // 下のSwiper
  const swiperBottom = new Swiper('.p-single-voice__swiper-bottom', {
    loop: true,
    loopedSlides: 2,
    slidesPerView: 'auto',
    spaceBetween: 25,
    speed: 10000,
    allowTouchMove: false,
    autoplay: {
      delay: 0,
      reverseDirection: true,
      disableOnInteraction: false,
    },
  });
}


// voice詳細ページ下swiper
const voiceSlider = new Swiper('.js-voice-slider', {
    loop: false,
    slidesPerView: 'auto',
    spaceBetween: 20,
    centeredSlides: true,
    navigation: {
        nextEl: '.js-voice-slider-next',
        prevEl: '.js-voice-slider-prev',
    },
    breakpoints: {
        768: {
            slidesPerView: 'auto',
            centeredSlides: false,
            spaceBetween: 50
        }
    }
});
