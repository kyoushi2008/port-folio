<?php

/**
 * Functions
 */


/**
 * WordPress標準機能
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_theme_support
 */
function my_setup()
{
    add_theme_support('post-thumbnails'); /* アイキャッチ */
    add_theme_support('automatic-feed-links'); /* RSSフィード */
    add_theme_support('title-tag'); /* タイトルタグ自動生成 */
    add_theme_support(
        'html5',
        array( /* HTML5のタグで出力 */
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        )
    );
}
add_action('after_setup_theme', 'my_setup');


/**
 * CSSとJavaScriptの読み込み
 *
 * @codex https://wpdocs.osdn.jp/%E3%83%8A%E3%83%93%E3%82%B2%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3%E3%83%A1%E3%83%8B%E3%83%A5%E3%83%BC
 */
function my_script_init()
{
    // jQueryの読み込み
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', '//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js', "", "1.0.1");

    // Simplebar CSS
    wp_enqueue_style('simplebar', 'https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css', array(), null);

    // Simplebar JS
    wp_enqueue_script('simplebar', 'https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.min.js', array(), null, true);

    // Noto Sans JP
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap', array(), null);

    // Open Sans
    wp_enqueue_style('adobe-fonts', 'https://use.typekit.net/cey3kvu.css', array(), null);

    // Roboto
    wp_enqueue_style('roboto', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wdth,wght@0,75..100,100..900;1,75..100,100..900&display=swap', array(), null);

    wp_enqueue_style('swiper', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', array(), '1.0.1', 'all');
    wp_enqueue_style('my', get_template_directory_uri() . '/assets/css/styles.min.css', array(), '1.0.1', 'all');
    wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array('jquery'), '1.0.1', true);
    wp_enqueue_script('my', get_template_directory_uri() . '/assets/js/script.min.js', array('jquery'), '1.0.1', true);
    wp_enqueue_script('contact', get_template_directory_uri() . '/assets/js/contact.min.js', array('jquery'), '1.0.1', true);
}
add_action('wp_enqueue_scripts', 'my_script_init');


/**
 * アーカイブタイトル書き換え
 *
 * @param string $title 書き換え前のタイトル.
 * @return string $title 書き換え後のタイトル.
 */
function my_archive_title($title)
{

    if (is_home()) { /* ホームの場合 */
        $title = 'ブログ';
    } elseif (is_category()) { /* カテゴリーアーカイブの場合 */
        $title = '' . single_cat_title('', false) . '';
    } elseif (is_tag()) { /* タグアーカイブの場合 */
        $title = '' . single_tag_title('', false) . '';
    } elseif (is_post_type_archive()) { /* 投稿タイプのアーカイブの場合 */
        $title = '' . post_type_archive_title('', false) . '';
    } elseif (is_tax()) { /* タームアーカイブの場合 */
        $title = '' . single_term_title('', false);
    } elseif (is_search()) { /* 検索結果アーカイブの場合 */
        $title = '「' . esc_html(get_query_var('s')) . '」の検索結果';
    } elseif (is_author()) { /* 作者アーカイブの場合 */
        $title = '' . get_the_author() . '';
    } elseif (is_date()) { /* 日付アーカイブの場合 */
        $title = '';
        if (get_query_var('year')) {
            $title .= get_query_var('year') . '年';
        }
        if (get_query_var('monthnum')) {
            $title .= get_query_var('monthnum') . '月';
        }
        if (get_query_var('day')) {
            $title .= get_query_var('day') . '日';
        }
    }
    return $title;
};
add_filter('get_the_archive_title', 'my_archive_title');


/**
 * 投稿タイプごとに異なるアーカイブの表示件数を指定
 *
 * 参考：https://webcreatetips.com/coding/152/
 */
// function change_posts_per_page($query) {
//   if ( is_admin() || ! $query->is_main_query() )
//   return;
//   if ( $query->is_post_type_archive('works') ) {
//     $query->set( 'posts_per_page', '6' );
//   }
// 	if ( $query->is_tax('works_category') ) {
// 		$query->set( 'posts_per_page', '6' );
// 	}
// }
// add_action( 'pre_get_posts', 'change_posts_per_page' );


/**
 * メニューの登録
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
 */
function my_menu_init()
{
    register_nav_menus(
        array(
            'global'  => 'ヘッダーメニュー',
            'utility' => 'ユーティリティメニュー',
            'drawer'  => 'ドロワーメニュー',
        )
    );
}
add_action('init', 'my_menu_init');


/**
 * 管理メニューの「投稿」に関する表示を「NEWS（任意）」に変更
 *
 * 参考：https://wordpress-web.and-ha.com/change-management-screen-post/
 */
// function change_post_menu_label()
// {
// 	global $menu;
// 	global $submenu;
// 	$menu[5][0] = 'NEWS';
// 	$submenu['edit.php'][5][0] = 'NEWS一覧';
// 	$submenu['edit.php'][10][0] = '新しいNEWS';
// 	$submenu['edit.php'][16][0] = 'タグ';
// }


/**
 * 管理画面上の「投稿」に関する表示を「NEWS」に変更
 *
 * 参考：https://wordpress-web.and-ha.com/change-management-screen-post/
 */
// function change_post_object_label()
// {
// 	global $wp_post_types;
// 	$labels = &$wp_post_types['post']->labels;
// 	$labels->name = 'NEWS';
// 	$labels->singular_name = 'NEWS';
// 	$labels->add_new = _x('追加', 'NEWS');
// 	$labels->add_new_item = 'NEWSの新規追加';
// 	$labels->edit_item = 'NEWSの編集';
// 	$labels->new_item = '新規NEWS';
// 	$labels->view_item = 'NEWSを表示';
// 	$labels->search_items = 'NEWSを検索';
// 	$labels->not_found = '記事が見つかりませんでした';
// 	$labels->not_found_in_trash = 'ゴミ箱に記事は見つかりませんでした';
// }
// add_action('init', 'change_post_object_label');
// add_action('admin_menu', 'change_post_menu_label');

// 投稿とコメントを管理メニューから非表示
function remove_default_menu_items()
{
    remove_menu_page('edit.php');          // 投稿
    remove_menu_page('edit-comments.php'); // コメント
}
add_action('admin_menu', 'remove_default_menu_items');


// パンくずリスト
function breadcrumb()
{
    echo '<ul class="breadcrumb">';

    // TOP
    echo '<li class="breadcrumb-item"><a href="' . home_url() . '">TOP</a></li>';
    echo '<span class="breadcrumb-separator"> / </span>';

    // 1. 固定ページ
    if (is_page()) {
        $slug = basename(get_permalink());
        echo '<li class="breadcrumb-item active">' . strtoupper($slug) . '</li>';
        echo '</ul>';
        return;
    }

    // 2. 月別アーカイブ判定 (NEWS)
    // get_post_type() を併用して、カスタム投稿 news のアーカイブであることを確実に判定
    if (is_date() && get_post_type() === 'news') {
        echo '<li class="breadcrumb-item"><a href="' . get_post_type_archive_link('news') . '">NEWS</a></li>';
        echo '<span class="breadcrumb-separator"> / </span>';

        $y = get_query_var('year');
        $m = get_query_var('monthnum');
        echo '<li class="breadcrumb-item active">' . esc_html($y) . '年' . esc_html($m) . '月</li>';

        echo '</ul>';
        return;
    }

    // 3. カテゴリー判定 (news-category)
    if (is_tax('news-category')) {
        echo '<li class="breadcrumb-item"><a href="' . get_post_type_archive_link('news') . '">NEWS</a></li>';
        echo '<span class="breadcrumb-separator"> / </span>';
        echo '<li class="breadcrumb-item active">' . single_term_title('', false) . '</li>';
        echo '</ul>';
        return;
    }

    // 4. カスタム投稿タイプ「一覧」判定
    $custom_types = ['news', 'works', 'voice'];
    foreach ($custom_types as $type) {
        if (is_post_type_archive($type)) {
            echo '<li class="breadcrumb-item active">' . strtoupper($type) . '</li>';
            echo '</ul>';
            return;
        }
    }

    // 5. 個別投稿ページ
    foreach ($custom_types as $type) {
        if (is_singular($type)) {
            $post_type_obj = get_post_type_object($type);
            $archive_link = get_post_type_archive_link($type);
            echo '<li class="breadcrumb-item"><a href="' . $archive_link . '">' . strtoupper($post_type_obj->name) . '</a></li>';
            echo '<span class="breadcrumb-separator"> / </span>';
            echo '<li class="breadcrumb-item active">' . get_the_title() . '</li>';
            echo '</ul>';
            return;
        }
    }

    echo '</ul>';
}

///////////////////////////////////////////////////////////////////////////////////
// NEWS カスタム投稿タイプ
function create_post_type_news()
{
    register_post_type('news', array(
        'label' => 'NEWS',
        'public' => true,
        'has_archive' => 'news',
        'rewrite' => array(
            'slug' => 'news',
            'with_front' => false,
        ),
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'create_post_type_news');

// NEWS カテゴリー（タクソノミー）
function create_news_taxonomy()
{
    register_taxonomy(
        'news-category',
        'news',
        array(
            'label' => 'NEWSカテゴリー',
            'hierarchical' => true,
            'rewrite' => array('slug' => 'news-category', 'with_front' => false,),
            'show_in_rest' => true,
        )
    );
}
add_action('init', 'create_news_taxonomy');

/**
 * カスタム投稿 news の月別アーカイブを有効にするリライトルール
 */
function add_news_archive_rewrite_rules()
{
    // ページネーション付き月別アーカイブ（2ページ目以降）
    add_rewrite_rule(
        'news/([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$',
        'index.php?post_type=news&year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]',
        'top'
    );

    // 1ページ目の月別アーカイブ
    add_rewrite_rule(
        'news/([0-9]{4})/([0-9]{1,2})/?$',
        'index.php?post_type=news&year=$matches[1]&monthnum=$matches[2]',
        'top'
    );
}
add_action('init', 'add_news_archive_rewrite_rules');

add_filter('template_include', function ($template) {
    // news-categoryタクソノミーを表示中なら
    if (is_tax('news-category')) {
        $archive_template = locate_template(array('archive-news.php'));
        if ($archive_template) {
            return $archive_template;
        }
    }
    return $template;
}, 99);

/////////////////////// voice カスタム投稿
function create_post_type_voice()
{
    register_post_type('voice', array(
        'label' => 'VOICE',
        'public' => true,
        'has_archive' => 'voice',
        'rewrite' => array(
            'slug' => 'voice',
            'with_front' => false,
        ),
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'create_post_type_voice');


// サムネイル voicw
add_image_size('voice-card-sp', 335, 226, true); // SP
add_image_size('voice-card-pc', 410, 278, true); // PC
// サムネイル works
add_image_size('works-card-sp', 335, 226, true); // SP
add_image_size('works-card-pc', 410, 278, true); // PC


// アーカイブページごとに表示件数を個別に制御する（404エラー防止策）
function my_pre_get_posts($query) {
    if ( is_admin() || ! $query->is_main_query() ) {
        return;
    }

    // 1. VOICE (6件)
    if ( is_post_type_archive('voice') || is_tax('voice-category') ) {
        $query->set( 'posts_per_page', 6 );
    }

    // 2. WORKS (3件)
    if ( is_post_type_archive('works') || is_tax('works_category') ) {
        $query->set( 'posts_per_page', 3 );
    }

    // 3. NEWS (10件)
    if ( is_post_type_archive('news') || is_tax('news-category') || (is_post_type_archive('news') && is_date()) ) {
        $query->set( 'posts_per_page', 10 );
    }
}
add_action( 'pre_get_posts', 'my_pre_get_posts' );


/////////////////////
// wordpressバージョン非表示
remove_action('wp_head', 'wp_generator');

// css/jsバージョン非表示
function remove_wp_version_strings($src) {
    global $wp_version;
    parse_str(parse_url($src, PHP_URL_QUERY), $query);
    if (!empty($query['ver']) && $query['ver'] === $wp_version) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}
add_filter('style_loader_src', 'remove_wp_version_strings', 9999);
add_filter('script_loader_src', 'remove_wp_version_strings', 9999);

// RSSフィードのバージョン非表示
add_filter('the_generator', '__return_empty_string');
