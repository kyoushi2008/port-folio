jQuery(function($) {
  var $select = $('.choice');
  var $trigger = $('.p-contact__select-trigger');
  var $options = $('.p-contact__select-options');
  var $optionItems = $('.p-contact__select-option');

  // トリガークリックで開閉
  $trigger.on('click', function() {
    $(this).toggleClass('active');
    $options.toggleClass('active');
  });

  // オプション選択
  $optionItems.on('click', function() {
    var value = $(this).data('value');
    var text = $(this).text();

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

  // 外側クリックで閉じる
  $(document).on('click', function(e) {
    if (!$(e.target).closest('.p-contact__select-custom').length) {
      $trigger.removeClass('active');
      $options.removeClass('active');
    }
  });

  // 入力欄クリック時のイベント伝播を防ぐ（Safari対策）
  $('input, textarea').on('touchstart click', function(e) {
    e.stopPropagation();
  });

  // チェックボックスとconfirmボタンの制御
  var $checkbox = $('.p-contact__acceptance input[type="checkbox"]');
  var $confirm = $('.confirm');

  // チェックボックスのクリックイベントを制御
  $checkbox.on('click', function(e) {
    e.stopPropagation();
  });

  $('.p-contact__acceptance label').on('click', function(e) {
    e.preventDefault();
    var $checkbox = $(this).find('input[type="checkbox"]');
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
    console.log('お名前バリデーション発火', e.type);
    if (e.type === 'keypress' && e.which !== 13) return;
    if (e.type === 'keypress') e.preventDefault();

    var name = $(this).val().trim();
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

    var furigana = $(this).val().trim();
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

    var email = $(this).val().trim();
    $(this).closest('.p-contact__item').find('.p-contact__error').remove();

    if (!email) {
      $(this).closest('.p-contact__item').append('<p class="p-contact__error">必須項目を入力してください。</p>');
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      $(this).closest('.p-contact__item').append('<p class="p-contact__error">メールアドレスの形式が正しくありません。</p>');
    }
  });

  // ========== 確認画面機能 ==========
  var formData = {};

  // 送信完了画面を表示する関数
  function showCompleteScreen() {
    // フォーム全体を非表示
    $('form.wpcf7-form').hide();
    $('.p-contact__wrapper').hide();
    $('.p-contact__button-group').hide();
    $('.wpcf7-response-output').hide();
    $('.p-contact__confirm-title').hide();
    $('.p-contact__confirm-text-message').hide();

    // タイトルとパンくずを再表示
    $('.c-title').css('display', '');
    $('.p-breadcrumb').css('display', '');

    // 完了メッセージを表示
    $('.p-contact__content').append(
      '<div class="p-contact__complete">' +
        '<h2 class="p-contact__complete-title">送信が完了いたしました</h2>' +
        '<div class="p-contact__complete-text">' +
          '<p>お問い合わせいただきありがとうございます。</p>' +
          '<p>お問い合わせを頂いた内容については、確認の上ご返信させていただきます。</p>' +
        '</div>' +
        '<div class="p-contact__complete-button">' +
          '<a href="/" class="p-contact__complete-top-btn">TOPへ戻る</a>' +
        '</div>' +
      '</div>'
    );

    // ページトップへスクロール
    $('html, body').animate({ scrollTop: 0 }, 400);
  }

  // 確認画面へ遷移
  $('.confirm').on('click', function(e) {
    e.preventDefault();

    // 既存のエラーメッセージを削除
    $('.p-contact__error').remove();

    // バリデーション
    var inquiry = $select.val();
    var name = $('input[name="your-name"]').val().trim();
    var furigana = $('input[name="text-305"]').val().trim();
    var email = $('input[name="your-email"]').val().trim();

    var hasError = false;
    var firstErrorElement = null;

    // お問い合わせ内容
    var validOptions = ['項目1', '項目2', '項目3'];
    if (!inquiry || validOptions.indexOf(inquiry) === -1) {
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
        var targetOffset = firstErrorElement.offset().top - 100;
        window.scrollTo(0, targetOffset);
      }, 50);
      return;
    }

    // エラーメッセージを削除
    $('.p-contact__error').remove();

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
    $('input[name="your-name"]').hide().after(
      '<div class="p-contact__confirm-text">' + formData.name + '</div>'
    );

    // ふりがな
    $('input[name="text-305"]').hide().after(
      '<div class="p-contact__confirm-text">' + formData.furigana + '</div>'
    );

    // 電話番号
    $('input[name="tel-851"]').hide().after(
      '<div class="p-contact__confirm-text">' + (formData.tel || '未入力') + '</div>'
    );

    // メールアドレス
    $('input[name="your-email"]').hide().after(
      '<div class="p-contact__confirm-text">' + formData.email + '</div>'
    );

    // お問い合わせ内容
    $('textarea[name="textarea-271"]').hide().after(
      '<div class="p-contact__confirm-text p-contact__confirm-textarea">' + (formData.message || '未入力') + '</div>'
    );

    // プライバシーポリシーとチェックボックスを非表示
    $('.p-contact__policy').hide();
    $('.p-contact__acceptance').hide();

    // ボタン表示を切り替え
    $('.p-contact__confirm').eq(0).hide(); // 入力画面用ボタンを非表示

    // 送信ボタンを戻るボタンと横並びにする
    var $submitBtn = $('.p-contact__confirm').eq(1).find('.submit');
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
      e.stopPropagation();

      // フォームを手動で送信
      var form = $(this).closest('form')[0];
      if (form) {
        // Contact Form 7のAjax送信を実行
        var submitData = new FormData(form);

        $.ajax({
          url: form.action,
          type: 'POST',
          data: submitData,
          processData: false,
          contentType: false,
          success: function(response) {
            console.log('送信成功');
            showCompleteScreen();
          },
          error: function() {
            console.log('送信失敗');
          }
        });
      }
    });

    // ページトップへスクロール
    $('html, body').animate({ scrollTop: 0 }, 400);
  }

  // 戻るボタン
  $(document).on('click', '.p-contact__back-btn', function() {
    location.reload();
  });

  // Contact Form 7 送信完了時の処理
  document.addEventListener('wpcf7mailsent', function(e) {
    console.log('送信完了イベント発火');
    showCompleteScreen();
  }, false);

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
  $(document).on('wpcf7invalid wpcf7spam wpcf7mailfailed wpcf7mailsent', 'form.wpcf7-form', function(e) {
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
