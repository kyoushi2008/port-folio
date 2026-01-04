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
	wp_enqueue_style('noto-sans-jp', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap', array(), null);

	// Open Sans
	wp_enqueue_style('adobe-fonts', 'https://use.typekit.net/cey3kvu.css', array(), null);

	// Roboto
	wp_enqueue_style('roboto', 'https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700;900&display=swap', array(), null);

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
// パンくずリスト
function breadcrumb()
{
    echo '<ul class="breadcrumb">';
    $home = '<li class="breadcrumb-item"><a href="' . get_bloginfo('url') . '">TOP</a></li><span class="breadcrumb-separator"> / </span>';
    echo $home;

    if (is_front_page()) {
        echo "</ul>";
        return;
    } else if (is_single()) {
        $post_type = get_post_type();

        // カスタム投稿タイプの場合
        if ($post_type !== 'post') {
            $archive_link = get_post_type_archive_link($post_type);
            $post_type_obj = get_post_type_object($post_type);

            if ($archive_link && $post_type_obj) {
                echo '<li class="breadcrumb-item"><a href="' . $archive_link . '">' . esc_html($post_type_obj->labels->name) . '</a></li><span class="breadcrumb-separator"> / </span>';
            }

            // タクソノミーを取得して表示
            $taxonomies = get_object_taxonomies($post_type);
            if (!empty($taxonomies)) {
                $terms = get_the_terms(get_the_ID(), $taxonomies[0]);
                if ($terms && !is_wp_error($terms)) {
                    $term = array_shift($terms);
                    echo '<li class="breadcrumb-item"><a href="' . get_term_link($term) . '">' . esc_html($term->name) . '</a></li><span class="breadcrumb-separator"> / </span>';
                }
            }

            the_title('<li class="breadcrumb-item active">', '</li>');

        } else {
            // デフォルトの投稿の場合
            $categories = get_the_category();
            if (!empty($categories)) {
                $current_cat = $categories[0];
                $cat_list = array();

                while ($current_cat->parent != 0) {
                    $cat_link = get_category_link($current_cat->term_id);
                    array_unshift($cat_list, '<li class="breadcrumb-item"><a href="' . $cat_link . '">' . esc_html($current_cat->name) . '</a></li><span class="breadcrumb-separator"> / </span>');
                    $current_cat = get_category($current_cat->parent);
                }
                array_unshift($cat_list, '<li class="breadcrumb-item"><a href="' . get_category_link($current_cat->term_id) . '">' . esc_html($current_cat->name) . '</a></li><span class="breadcrumb-separator"> / </span>');
                echo implode('', $cat_list);
            }
            the_title('<li class="breadcrumb-item active">', '</li>');
        }

    } else if (is_page()) {
        // 固定ページ
        $parent_id = wp_get_post_parent_id(get_the_ID());
        $page_list = array();

        while ($parent_id != 0) {
            $page = get_post($parent_id);
            $page_link = get_permalink($page->ID);
            array_unshift($page_list, '<li class="breadcrumb-item"><a href="' . $page_link . '">' . esc_html($page->post_title) . '</a></li><span class="breadcrumb-separator"> / </span>');
            $parent_id = wp_get_post_parent_id($parent_id);
        }
        echo implode('', $page_list);
        the_title('<li class="breadcrumb-item active">', '</li>');

    } else if (is_post_type_archive()) {
        // カスタム投稿タイプのアーカイブ
        $post_type_obj = get_queried_object();
        echo '<li class="breadcrumb-item active">' . esc_html($post_type_obj->labels->name) . '</li>';

    } else if (is_tax()) {
        // タクソノミーアーカイブ
        $term = get_queried_object();
        $post_type = get_taxonomy($term->taxonomy)->object_type[0];
        $archive_link = get_post_type_archive_link($post_type);
        $post_type_obj = get_post_type_object($post_type);

        if ($archive_link && $post_type_obj) {
            echo '<li class="breadcrumb-item"><a href="' . $archive_link . '">' . esc_html($post_type_obj->labels->name) . '</a></li><span class="breadcrumb-separator"> / </span>';
        }
        echo '<li class="breadcrumb-item active">' . esc_html($term->name) . '</li>';

    } else if (is_category()) {
        // カテゴリーページ
        $current_cat = get_queried_object();
        $cat_list = array();

        $temp_cat = $current_cat;
        while ($temp_cat->parent != 0) {
            $cat_link = get_category_link($temp_cat->term_id);
            array_unshift($cat_list, '<li class="breadcrumb-item"><a href="' . $cat_link . '">' . esc_html($temp_cat->name) . '</a></li><span class="breadcrumb-separator"> / </span>');
            $temp_cat = get_category($temp_cat->parent);
        }

        if ($temp_cat->term_id != $current_cat->term_id) {
            array_unshift($cat_list, '<li class="breadcrumb-item"><a href="' . get_category_link($temp_cat->term_id) . '">' . esc_html($temp_cat->name) . '</a></li><span class="breadcrumb-separator"> / </span>');
        }

        echo implode('', $cat_list);
        echo '<li class="breadcrumb-item active">' . esc_html($current_cat->name) . '</li>';

    } else if (is_tag()) {
        echo '<li class="breadcrumb-item active">#' . single_tag_title('', false) . '</li>';

    } else if (is_404()) {
        echo '<li class="breadcrumb-item active">ページが見つかりません</li>';

    } else if (is_search()) {
        echo '<li class="breadcrumb-item active">「' . esc_html(get_search_query()) . '」の検索結果</li>';

    } else if (is_archive()) {
        echo '<li class="breadcrumb-item active">' . post_type_archive_title('', false) . '</li>';
    }

    echo "</ul>";
}
///////////////////////////////////////////////////////////////////////////////////
