
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

  // オプション選択
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
});
