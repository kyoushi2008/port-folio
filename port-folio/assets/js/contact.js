jQuery(function($) {
  const $select = $('.choice');
  const $trigger = $('.p-contact__select-trigger');
  const $options = $('.p-contact__select-options');
  const $optionItems = $('.p-contact__select-option');

  // トリガークリックで開閉
  $trigger.on('click', function() {
    $(this).toggleClass('active');
    $options.toggleClass('active');
  });



  // 外側クリックで閉じる
  $(document).on('click', function(e) {
    if (!$(e.target).closest('.p-contact__select-custom').length) {
      $trigger.removeClass('active');
      $options.removeClass('active');
    }
  });

  // チェックボックスとconfirmボタンの制御
  const $checkbox = $('.p-contact__acceptance input[type="checkbox"]');
  const $confirm = $('.confirm');

  // チェックボックスのクリックイベントを制御
  $checkbox.on('click', function(e) {
    e.stopPropagation();
  });

  $('.p-contact__acceptance label').on('click', function(e) {
    e.preventDefault();
    const $checkbox = $(this).find('input[type="checkbox"]');
    $checkbox.prop('checked', !$checkbox.prop('checked')).trigger('change');
  });

  // confirmボタンの初期状態
  $confirm.prop('disabled', true);

  // チェックボックスの変更時
  $checkbox.on('change', function() {
    if ($(this).is(':checked')) {
      $confirm.prop('disabled', false);
    } else {
      $confirm.prop('disabled', true);
    }
  });

  // 入力時にエラーを解除
  $('input[name="your-name"]').on('input', function() {
    $(this).closest('.p-contact__item').find('.p-contact__error').remove();
  });

  $('input[name="text-305"]').on('input', function() {
    $(this).closest('.p-contact__item').find('.p-contact__error').remove();
  });

  $('input[name="tel-851"]').on('input', function() {
    $(this).closest('.p-contact__item').find('.p-contact__error').remove();
  });

  $('input[name="your-email"]').on('input', function() {
    $(this).closest('.p-contact__item').find('.p-contact__error').remove();
  });

  $('textarea[name="textarea-271"]').on('input', function() {
    $(this).closest('.p-contact__item').find('.p-contact__error').remove();
  });

  // Enterキー押下時とフォーカスアウト時のバリデーション
  $('input[name="your-name"]').on('keypress blur', function(e) {
    if (e.type === 'keypress' && e.which !== 13) return;
    if (e.type === 'keypress') e.preventDefault();

    const name = $(this).val().trim();
    $(this).closest('.p-contact__item').find('.p-contact__error').remove();

    if (!name) {
      $(this).closest('.p-contact__item').append('<p class="p-contact__error">必須項目を入力してください。</p>');
    } else if (name.length < 2) {
      $(this).closest('.p-contact__item').append('<p class="p-contact__error">お名前は2文字以上で入力してください。</p>');
    } else if (/[0-9０-９a-zA-Zａ-ｚＡ-Ｚ]/.test(name)) {
      $(this).closest('.p-contact__item').append('<p class="p-contact__error">お名前に数字や英字は使用できません。</p>');
    }
  });

  $('input[name="text-305"]').on('keypress blur', function(e) {
    if (e.type === 'keypress' && e.which !== 13) return;
    if (e.type === 'keypress') e.preventDefault();

    const furigana = $(this).val().trim();
    $(this).closest('.p-contact__item').find('.p-contact__error').remove();

    if (!furigana) {
      $(this).closest('.p-contact__item').append('<p class="p-contact__error">必須項目を入力してください。</p>');
    } else if (!/^[ぁ-ん\s　]+$/.test(furigana)) {
      $(this).closest('.p-contact__item').append('<p class="p-contact__error">ふりがなはひらがなで入力してください。</p>');
    }
  });

  $('input[name="your-email"]').on('keypress blur', function(e) {
    if (e.type === 'keypress' && e.which !== 13) return;
    if (e.type === 'keypress') e.preventDefault();

    const email = $(this).val().trim();
    $(this).closest('.p-contact__item').find('.p-contact__error').remove();

    if (!email) {
      $(this).closest('.p-contact__item').append('<p class="p-contact__error">必須項目を入力してください。</p>');
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      $(this).closest('.p-contact__item').append('<p class="p-contact__error">メールアドレスの形式が正しくありません。</p>');
    }
  });

  // セレクト選択時にエラーを解除
  $optionItems.on('click', function() {
    const value = $(this).data('value');
    const text = $(this).text();

    // 選択状態を更新
    $optionItems.removeClass('selected');
    $(this).addClass('selected');

    // トリガーのテキストを更新
    $trigger.text(text);

    // Contact Form 7のselectに反映
    $select.val(value);

    // エラーを解除
    $('.p-contact__item.is-select').find('.p-contact__error').remove();

    // 閉じる
    $trigger.removeClass('active');
    $options.removeClass('active');
  });

  // ========== 確認画面機能 ==========
  let formData = {};

  // 確認画面へ遷移
  $('.confirm').on('click', function(e) {
    e.preventDefault();

    // 既存のエラーメッセージを削除
    $('.p-contact__error').remove();

    // バリデーション
    const inquiry = $select.val();
    const name = $('input[name="your-name"]').val().trim();
    const furigana = $('input[name="text-305"]').val().trim();
    const email = $('input[name="your-email"]').val().trim();

    let hasError = false;
    let firstErrorElement = null;

    // お問い合わせ内容
    const validOptions = ['項目1', '項目2', '項目3'];
    if (!inquiry || !validOptions.includes(inquiry)) {
      if ($('.p-contact__item.is-select').find('.p-contact__error').length === 0) {
        $('.p-contact__item.is-select').append('<p class="p-contact__error">必須項目を選択してください。</p>');
      }
      if (!firstErrorElement) firstErrorElement = $('.p-contact__item.is-select');
      hasError = true;
    }

    // お名前
    if (!name) {
      if ($('input[name="your-name"]').closest('.p-contact__item').find('.p-contact__error').length === 0) {
        $('input[name="your-name"]').closest('.p-contact__item').append('<p class="p-contact__error">必須項目を入力してください。</p>');
      }
      if (!firstErrorElement) firstErrorElement = $('input[name="your-name"]').closest('.p-contact__item');
      hasError = true;
    } else if (name.length < 2) {
      if ($('input[name="your-name"]').closest('.p-contact__item').find('.p-contact__error').length === 0) {
        $('input[name="your-name"]').closest('.p-contact__item').append('<p class="p-contact__error">お名前は2文字以上で入力してください。</p>');
      }
      if (!firstErrorElement) firstErrorElement = $('input[name="your-name"]').closest('.p-contact__item');
      hasError = true;
    } else if (/[0-9０-９a-zA-Zａ-ｚＡ-Ｚ]/.test(name)) {
      if ($('input[name="your-name"]').closest('.p-contact__item').find('.p-contact__error').length === 0) {
        $('input[name="your-name"]').closest('.p-contact__item').append('<p class="p-contact__error">お名前に数字や英字は使用できません。</p>');
      }
      if (!firstErrorElement) firstErrorElement = $('input[name="your-name"]').closest('.p-contact__item');
      hasError = true;
    }

    // ふりがな
    if (!furigana) {
      if ($('input[name="text-305"]').closest('.p-contact__item').find('.p-contact__error').length === 0) {
        $('input[name="text-305"]').closest('.p-contact__item').append('<p class="p-contact__error">必須項目を入力してください。</p>');
      }
      if (!firstErrorElement) firstErrorElement = $('input[name="text-305"]').closest('.p-contact__item');
      hasError = true;
    } else if (!/^[ぁ-ん\s　]+$/.test(furigana)) {
      if ($('input[name="text-305"]').closest('.p-contact__item').find('.p-contact__error').length === 0) {
        $('input[name="text-305"]').closest('.p-contact__item').append('<p class="p-contact__error">ふりがなはひらがなで入力してください。</p>');
      }
      if (!firstErrorElement) firstErrorElement = $('input[name="text-305"]').closest('.p-contact__item');
      hasError = true;
    }

    // メールアドレス
    if (!email) {
      if ($('input[name="your-email"]').closest('.p-contact__item').find('.p-contact__error').length === 0) {
        $('input[name="your-email"]').closest('.p-contact__item').append('<p class="p-contact__error">必須項目を入力してください。</p>');
      }
      if (!firstErrorElement) firstErrorElement = $('input[name="your-email"]').closest('.p-contact__item');
      hasError = true;
    } else if (email.indexOf('@') === -1) {
      if ($('input[name="your-email"]').closest('.p-contact__item').find('.p-contact__error').length === 0) {
        $('input[name="your-email"]').closest('.p-contact__item').append('<p class="p-contact__error">@を含むメールアドレスを入力してください。</p>');
      }
      if (!firstErrorElement) firstErrorElement = $('input[name="your-email"]').closest('.p-contact__item');
      hasError = true;
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      if ($('input[name="your-email"]').closest('.p-contact__item').find('.p-contact__error').length === 0) {
        $('input[name="your-email"]').closest('.p-contact__item').append('<p class="p-contact__error">メールアドレスの形式が正しくありません。</p>');
      }
      if (!firstErrorElement) firstErrorElement = $('input[name="your-email"]').closest('.p-contact__item');
      hasError = true;
    }

    // エラーがある場合は最初のエラー項目にスクロール
    if (hasError) {
      // チェックボックスを外してボタンを無効化
      $checkbox.prop('checked', false).trigger('change');

      setTimeout(function() {
        const targetOffset = firstErrorElement.offset().top - 100;
        window.scrollTo(0, targetOffset);
      }, 50);
      return;
    }

    // 入力内容を保存
    formData = {
      inquiry: inquiry,
      inquiryText: $trigger.text(),
      name: name,
      furigana: furigana,
      tel: $('input[name="tel-851"]').val(),
      email: email,
      message: $('textarea[name="textarea-271"]').val()
    };

    // 確認画面に切り替え
    showConfirmScreen();
  });

  // 確認画面表示
  function showConfirmScreen() {
    // CONTACTタイトルとパンくずを非表示
    $('.c-title').css('display', 'none');
    $('.p-breadcrumb').css('display', 'none');

    // 送信内容確認タイトルとテキストを追加
    $('.p-contact__content').prepend(
      '<h2 class="p-contact__confirm-title">送信内容確認</h2>' +
      '<p class="p-contact__confirm-text-message">以下の内容で送信してよろしいですか?</p>'
    );

    // 各入力欄を確認表示に変更

    // セレクトボックス
    $('.p-contact__select-custom').hide();
    $('.p-contact__item.is-select').append(
      '<div class="p-contact__confirm-text">' + formData.inquiryText + '</div>'
    );

    // お名前
    $('input[name="your-name"]').replaceWith(
      '<div class="p-contact__confirm-text">' + formData.name + '</div>'
    );

    // ふりがな
    $('input[name="text-305"]').replaceWith(
      '<div class="p-contact__confirm-text">' + formData.furigana + '</div>'
    );

    // 電話番号
    $('input[name="tel-851"]').replaceWith(
      '<div class="p-contact__confirm-text">' + (formData.tel || '未入力') + '</div>'
    );

    // メールアドレス
    $('input[name="your-email"]').replaceWith(
      '<div class="p-contact__confirm-text">' + formData.email + '</div>'
    );

    // お問い合わせ内容
    $('textarea[name="textarea-271"]').replaceWith(
      '<div class="p-contact__confirm-text p-contact__confirm-textarea">' + (formData.message || '未入力') + '</div>'
    );

    // プライバシーポリシーとチェックボックスを非表示
    $('.p-contact__policy').hide();
    $('.p-contact__acceptance').hide();

    // ボタン表示を切り替え
    $('.p-contact__confirm').eq(0).hide(); // 入力画面用ボタンを非表示

    // 送信ボタンを戻るボタンと横並びにする
    const $submitBtn = $('.p-contact__confirm').eq(1).find('.submit');
    $('.p-contact__confirm').eq(1).before(
      '<div class="p-contact__button-group">' +
        '<button type="button" class="p-contact__back-btn">戻る</button>' +
      '</div>'
    );

    // 送信ボタンをbutton-groupに移動
    $('.p-contact__button-group').append($submitBtn);

    // 空になった元の送信ボタンのコンテナを非表示
    $('.p-contact__confirm').eq(1).hide();

    // 送信ボタンのクリックイベントでフォーム送信
    $('.p-contact__button-group .submit').off('click').on('click', function(e) {
      e.preventDefault();
      $(this).closest('form').submit();
    });

    // ページトップへスクロール
    $('html, body').animate({ scrollTop: 0 }, 400);
  }

  // 戻るボタン
  $(document).on('click', '.p-contact__back-btn', function() {
    location.reload();
  });

  // Contact Form 7のバリデーションイベントを無効化
  document.addEventListener('wpcf7invalid', function(e) {
    e.stopImmediatePropagation();
  }, true);

  document.addEventListener('wpcf7spam', function(e) {
    e.stopImmediatePropagation();
  }, true);

  document.addEventListener('wpcf7mailfailed', function(e) {
    e.stopImmediatePropagation();
  }, true);

  // Contact Form 7のエラーメッセージを削除
  $(document).on('wpcf7invalid wpcf7spam wpcf7mailfailed', 'form.wpcf7-form', function(e) {
    setTimeout(function() {
      $('.wpcf7-response-output').remove();
      $('.wpcf7-not-valid-tip').remove();
    }, 0);
  });

  // 確認画面からの送信時のみ許可
  $(document).on('submit', 'form.wpcf7-form', function(e) {
    // 確認画面でない場合は送信を許可しない
    if ($('.p-contact__button-group').length === 0) {
      e.preventDefault();
      return false;
    }

    // 確認画面からの送信は、バリデーション済みなので許可
    return true;
  });
});
