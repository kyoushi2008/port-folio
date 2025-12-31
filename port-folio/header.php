<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <header class="p-header l-header js-header">
    <div class="p-header__wrapper">
      <?php if (is_front_page()): ?>
        <!-- トップページの場合はh1 -->
        <h1 class="p-header__logo js-header">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="p-header__logo-image js-header">CODO ASSIST</a>
        </h1>
      <?php else: ?>
        <!-- 下層ページの場合はdiv -->
        <h1 class="p-header__logo js-header">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="p-header__logo-image js-header">CODO ASSIST</a>
        </h1>
      <?php endif; ?>
      <!-- sp contactボタン -->
      <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="p-header__sp-contact-btn" target="_blank"></a>
      <button class="p-header__hamburger js-hamburger">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <?php
      // メニューID（スラッグ）を指定する。これは functions.php で登録した名前と一致させる必要がある。
      $menu_name = 'global';
      // 現在のテーマで登録されているメニューの位置情報を取得する（連想配列で返る）
      $locations = get_nav_menu_locations();
      // 指定したメニューID（global）に対応するメニューオブジェクトを取得する
      $menu = wp_get_nav_menu_object($locations[$menu_name]);
      // メニューオブジェクトから、登録されているメニュー項目（li要素に相当）をすべて取得する
      $menu_items = wp_get_nav_menu_items($menu->term_id);
      // 親子構造を再構築する配列
      $menu_tree = [];
      // メニュー項目をループして、親子関係を構築する
      foreach ($menu_items as $item) {
        if ($item->menu_item_parent == 0) {
          // 親メニューの場合は、IDをキーにして格納
          $menu_tree[$item->ID] = [
            'item' => $item,
            'children' => []
          ];
        } else {
          // 子メニューの場合は、親IDの children 配列に追加
          if (isset($menu_tree[$item->menu_item_parent])) {
            $menu_tree[$item->menu_item_parent]['children'][] = $item;
          }
        }
      }
      ?>
      <nav class="p-header__nav js-drawer">
        <div class="p-header__nav-inner">
          <div class="p-header__nav-inner2">
            <!--  -->
            <ul class="p-header__nav-list">

              <!-- メニュー項目が空でない場合に処理を開始する。空だと何も表示されないようにするための安全対策 -->
              <?php if (!empty($menu_tree)): ?>
                <!-- 親メニューごとにループ処理 -->
                <?php foreach ($menu_tree as $node): ?>
                  <?php $item = $node['item']; ?> <!-- 親メニューの情報を取り出す -->
                  <li class="p-header-nav-item p-header__nav-item js-accordion"> <!-- 親メニューのli -->
                    <!-- 親メニューのリンクを出力。esc_url() でURLを安全に、esc_html() でテキストを安全に出力 -->
                    <a href="<?php echo esc_url($item->url); ?>" class="p-header-nav-item__link">
                      <?php echo esc_html($item->title); ?>
                    </a>
                    <!-- 子メニューが存在する場合のみulを出力 -->
                    <?php if (!empty($node['children'])): ?>
                      <ul class="p-header__dropmenu "> <!-- 子メニューのul（ドロップダウン） -->
                        <!-- 子メニューをループ処理 -->
                        <?php foreach ($node['children'] as $child): ?>
                          <li class="p-header-dropmenu__item"> <!-- 子メニューのli -->
                            <!-- 子メニューのリンクを出力 -->
                            <a href="<?php echo esc_url($child->url); ?>" class="p-header-dropmenu__link">
                              <?php echo esc_html($child->title); ?>
                            </a>
                          </li>
                        <?php endforeach; ?> <!-- 子メニューのループ終了 -->
                      </ul>
                    <?php endif; ?> <!-- 子メニューの有無チェック終了 -->
                  </li>
                <?php endforeach; ?> <!-- 親メニューのループ終了 -->
              <?php endif; ?> <!-- メニュー項目が空でない場合のチェック終了 -->
              <li class="p-header__btn-item p-header-nav-item p-header__nav-item">
                <a href="" class="p-header__btn-link p-header-nav-item__link" target="_blank">CONTACT</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <main>
