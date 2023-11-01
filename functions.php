<?php
/**
 * This is function.
 *
 * @package cms_018 Movie
 */

/**
 * テーマのセットアップ
 */
function my_setup() {
	add_theme_support( 'post-thumbnails' ); // アイキャッチ画像を有効化
	// add_theme_support('automatic-feed-links'); // 投稿とコメントのRSSフィードのリンクを有効化.
	add_theme_support( 'title-tag' ); // タイトルタグ自動生成.
	add_theme_support(
		'html5',
		array( // HTML5でマークアップ.
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	// 不要なメタ情報と機能を無効化.
	remove_action( 'wp_head', 'wp_generator' ); // WordPressのバージョン情報を表示しない.
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); // 絵文字用のJSを無効化.
	remove_action( 'wp_print_styles', 'print_emoji_styles', 10 ); // 絵文字用のCSSを無効化.
	remove_action( 'wp_head', 'rsd_link' ); // RSDを無効化.
	remove_action( 'wp_head', 'wlwmanifest_link' ); // Windows Live Writerを無効化.

	/**
	 * JS, CSS要素のバージョン出力を排除する
	 *
	 * @param string $src first parametar.
	 * @return string
	 */
	function remove_cssjs_ver2( $src ) {
		if ( strpos( $src, 'ver=' ) ) {
			$src = remove_query_arg( 'ver', $src );
		}
		return $src;
	}
	add_filter( 'style_loader_src', 'remove_cssjs_ver2', 9999 );
	add_filter( 'script_loader_src', 'remove_cssjs_ver2', 9999 );
}
add_action( 'after_setup_theme', 'my_setup' );


/**
 * サイトタイトルのセパレーター - を ｜ に変更
 *
 * @param string $separator first parametar.
 * @return string
 */
function wp_document_title_separator( $separator ) {
	$separator = '|';
	return $separator;
}
add_filter( 'document_title_separator', 'wp_document_title_separator' );

/**
 * ACF settings.
 */
function my_acf_init() {
	if ( function_exists( 'acf_update_setting' ) ) {
		acf_update_setting( 'remove_wp_meta_box', false );
	}
}
add_action( 'acf/init', 'my_acf_init' );

/**
 * オプションページ設定
 */
if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page(
		array(
			'page_title'  => 'サイト設定',
			'menu_title'  => 'サイト設定',
			'menu_slug'   => 'theme-options',
			'capability'  => 'edit_posts',
			'parent_slug' => '',
			'position'    => 4,
			'redirect'    => false,
		)
	);

	acf_add_options_sub_page(
		array( // サブページ.
			'page_title'  => 'ナビゲーション設定',
			'menu_title'  => 'ナビゲーション',
			'menu_slug'   => 'theme-options-nav',
			'capability'  => 'edit_posts',
			'parent_slug' => 'theme-options', // 親ページのスラッグ.
			'position'    => false,
		)
	);

	acf_add_options_sub_page(
		array( // サブページ.
			'page_title'  => 'お問い合わせ・CTA設定',
			'menu_title'  => 'お問い合わせ・CTA',
			'menu_slug'   => 'theme-options-cta',
			'capability'  => 'edit_posts',
			'parent_slug' => 'theme-options', // 親ページのスラッグ.
			'position'    => false,
		)
	);
}


/**
 * CSSとJavaScriptの読み込み
 */
function my_script_init() {
	// Gutenberg用CSSを削除（フッターで読み込みに変更）.
	// ブロックエディタ用のGoogleフォント.
	wp_deregister_style( 'wp-editor-font' );
	wp_register_style( 'wp-editor-font', false, '', '1.0.0' );
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'global-styles' );  // 自作テーマでは不要.

	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/_static/dist/vendor/swiper-bundle.min.css', array(), '8.4.7', 'all' );
	wp_enqueue_style( 'scroll-hint', get_template_directory_uri() . '/_static/dist/vendor/scroll-hint.min.css', array(), '1.2.5', 'all' );
	wp_enqueue_style( 'style', get_template_directory_uri() . '/_static/dist/css/style.min.css?ver' . time(), array(), '1.0.0', 'all' );

	if ( ! is_admin() ) { // 管理画面でなければ{}内を実行.
		wp_deregister_script( 'jquery' ); // WordPress標準のjQueryを除外.
		wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.4.1.min.js', array(), '3.4.1', true ); // CDNのjQueryを登録かつwp_footerへ記述.
		// wp_enqueue_style( 'jquery-ui', 'http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css', array(), '1.12.1', 'all' );
		// wp_enqueue_script( 'jquery-ui', 'http://code.jquery.com/ui/1.12.1/jquery-ui.js', array(), '1.12.1', true );
	}

	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/_static/dist/vendor/swiper-bundle.min.js', array( 'jquery' ), '8.4.7', true );
	wp_enqueue_script( 'scroll-hint', get_template_directory_uri() . '/_static/dist/vendor/scroll-hint.min.js', array( 'jquery' ), '1.2.5', true );
	wp_enqueue_script( 'matchHeight', get_template_directory_uri() . '/_static/dist/vendor/jquery.matchHeight.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/_static/dist/js/main.min.js?ver' . time(), array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'my_script_init' );

/**
 * CSSファイルをフッターに出力（それぞれ使用ページでのみ読み込む）
 */
function enqueue_css_footer() {
	// Gutenberg用CSS 使っているページでのみ読み込む.
	if ( is_single() ) {
		wp_enqueue_style( 'wp-block-library' );
		wp_enqueue_style( 'wp-block-library-theme' );
	}
	wp_enqueue_style( 'global-styles' );
}
add_action( 'wp_footer', 'enqueue_css_footer' );


/**
 * CDNのCSSを非同期で読み込む（フッターで）
 */
function load_external_css() {
	/*
	// $adobeFonts = 'https://use.typekit.net/ndc5sir.css';
	// $fontAwesome = 'https://use.fontawesome.com/releases/v5.8.2/css/all.css';
	*/
	$google_fonts = 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&family=Poppins:wght@400;600&display=swap';
	// $yakuhan_jp   = 'https://cdn.jsdelivr.net/npm/yakuhanjp@3.4.1/dist/css/yakuhanrp.min.css';
	// CSSを読込.
	$external_css = array( /* $adobeFonts, */$google_fonts /*, $yakuhan_jp */ );
	foreach ( $external_css as $value ) {
		// @codingStandardsIgnoreStart
		echo '<link rel="preload" href="' . $value . '" as="style"><link rel="stylesheet" href="' . $value . '" media="print" onload="this.media=\'all\'">' . "\n";
		// @codingStandardsIgnoreEnd
	};
};
add_action( 'wp_footer', 'load_external_css' );


/**
 * Pagination
 *
 * ページネーション
 *
 * @param string $pages is pages.
 * @param int    $range is range.
 */
// @codingStandardsIgnoreStart
function pagination( $pages = '', $range = 2 ) {

	$prev_text = '<i class="c-pagination__prev"></i>';
	$next_text = '<i class="c-pagination__next"></i>';

	$showitems = ( $range * 2 ) + 1; // 表示するページ数（5ページを表示）.

	global $paged; // 現在のページ値.
	if ( empty( $paged ) ) {
		$paged = 1; // デフォルトのページ.
	}

	if ( null === $pages ) {
		global $my_query;
		// var_dump($my_query);
		$pages = $my_query->max_num_pages; // 全ページ数を取得.
		if ( ! $pages ) { // 全ページ数が空の場合は1とする.
			$pages = 1;
		}
	}

	if ( 2 <= $pages ) { // 全ページが1でない場合はページネーションを表示する.
		echo '<div class="c-pagination">';
		echo '<ul class="c-pagination__list">';
		// Prev：現在のページ値が１より大きい場合は表示.
		if ( $paged > 1 ) {
			echo  '<li class="c-pagination__item is-prev"><a class="c-pagination__link" href=' . get_pagenum_link( $paged - 1 ) . '>' . $prev_text . '</a></li>' ;
		}

		for ( $i = 1; $i <= $pages; $i++ ) {
			if ( 1 !== $pages && ( ! ( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $showitems ) ) {
				// 三項演算子での条件分岐.
				echo ( $paged === $i ) ? '<li class="c-pagination__item is-active">' . $i . '</li>'  :  '<li class="c-pagination__item"><a class="c-pagination__link" href=' . get_pagenum_link( $i ) . '>' . $i . '</a></li>' ;
			}
		}
		// Next：総ページ数より現在のページ値が小さい場合は表示.
		if ( $paged < $pages ) {
			echo  '<li class="c-pagination__item is-next"><a  class="c-pagination__link" href="' . get_pagenum_link( $paged + 1 ) . '">' . $next_text . '</a></li>' ;
		}
		echo '</ul>';
		echo '</div>';
	}
}
// @codingStandardsIgnoreEnd

/**
 * アクセス数を取得する
 *
 * @param int $post_id 投稿id.
 * @return int $count.
 */
function get_post_views( $post_id ) {
	global $post;
	if ( 0 === $post_id ) {
		$post_id = $post->ID;
	}
	$count_key = 'post_views_count';
	$count     = get_post_meta( $post_id, $count_key, true );

	if ( '' === $count ) {
		delete_post_meta( $post_id, $count_key );
		add_post_meta( $post_id, $count_key, '0' );
	}
	return $count;
}

/**
 * アクセスカウンター
 *
 * @return void
 */
function set_post_views() {
	global $post;
	$count     = 0;
	$count_key = 'post_views_count';

	if ( $post ) {
		$post_id = $post->ID;
		$count   = get_post_meta( $post_id, $count_key, true );
	}

	if ( '' === $count ) {
		delete_post_meta( $post_id, $count_key );
		add_post_meta( $post_id, $count_key, '1' );
	} elseif ( 0 < $count ) {
		if ( ! is_user_logged_in() ) { // 管理者（自分）の閲覧を除外.
			$count++;
			update_post_meta( $post_id, $count_key, $count );
		}
	}
	// $countが0のままの場合（404や該当記事の検索結果が0件の場合）は何もしない
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

/**
 * MWForm no <p></p> <br>
 * 自動挿入されるpタグ、brタグを無効化
 */
function mvwpform_autop_filter() {
	if ( class_exists( 'MW_WP_Form_Admin' ) ) {
		$mw_wp_form_admin = new MW_WP_Form_Admin();
		$forms            = $mw_wp_form_admin->get_forms();
		foreach ( $forms as $form ) {
			add_filter( 'mwform_content_wpautop_mw-wp-form-' . $form->ID, '__return_false' );
		}
	}
}
mvwpform_autop_filter();


$my_toc_no = 0;
/**
 * Easy Table of Contentsのアンカーを連番に変更する
 *
 * @param string $return is return.
 * @param string $heading is heading.
 */
function toc_anchor_change( $return, $heading ) {
	global $my_toc_no;
	$my_toc_no++;
	return 'toc-' . $my_toc_no;
}
add_filter( 'ez_toc_url_anchor_target', 'toc_anchor_change', 10, 2 );


/**
 * カスタム投稿スラッグに合わせて読み込むsearch.phpを切り替える
 * カスタム投稿用の検索結果ページ
 *
 * @param string $template is return.
 */
function custom_search_template( $template ) {
	if ( is_search() ) {
		$post_types = get_query_var( 'post_type' );
		foreach ( (array) $post_types as $post_type ) {
			$templates[] = "search-{$post_type}.php";
		}
		$templates[] = 'search.php';
		$template    = get_query_template( 'search', $templates );
	}
	return $template;
}
add_filter( 'template_include', 'custom_search_template' );

/**
 * 配列のサニタイズ処理
 *
 * @param array $array : $_POST、$_GETなどの配列
 * @return array $array : サニタイズ後の配列
 */
function sanitise( $array = array() ) {
	if ( empty( $array ) ) {
		return $array;
	}

	$internal_encoding = 'UTF-8';                // PHPの内部エンコーディング
	$enc_order         = 'UTF-8, eucJP-win, SJIS-win';   // mb_detect_order()に準ずる文字エンコーディングリスト

	foreach ( $array as $key => &$val ) {
		if ( is_array( $val ) ) {
			$array[ $key ] = sanitise( $val );
		} else {
			$val = rawurldecode( $val );                                                          // URLエンコードを解除
			$val = mb_convert_encoding( $val, $internal_encoding, $enc_order );       // 表示系文字コードから内部文字コードへ変換（複数回変換しても問題ないように）
			$val = trim( mb_convert_kana( $val, 's' ) );                                            // 前後の余分な文字を除去
			$val = htmlspecialchars( $val, ENT_QUOTES, $internal_encoding );                // HTMLエンティティをエスケープ
			$val = mysql_escape_string( $val );
		}
	}
	unset( $val );

	return $array;
}
