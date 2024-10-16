<?php
function custom_theme_support() {
  add_theme_support('html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption'
  ));
  add_theme_support('post-thumbnails');
  add_theme_support('title-tag');
  add_theme_support('menu');
  register_nav_menus(array(
    'footer_nav' => esc_html__('footer navigation', 'Hamburger'),
    'category_nav' => esc_html__('category navigation', 'Hamburger')
  ));
  add_theme_support('editor-styles');
  add_editor_style();
}

add_action('after_setup_theme', 'custom_theme_support');

// カスタム投稿タイプ実装

function create_post_type() {
  register_post_type('service', 
  array(
    'labels' => array(
      'name'          => __('サービス', 'Hamburger'), // 管理画面の投稿タイプ名
      'singular_name' => __('サービス', 'Hamburger')   // 個別の投稿名)
    ),
    'public'             => true, // 投稿タイプを公開する
    'has_archive'        => true, // アーカイブページを有効にする
    'rewrite'            => array('slug' => 'services'), // URLに使うスラッグ
    'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'), // サポートする機能
    'show_in_rest'       => true, // ブロックエディタ（Gutenberg）を有効にする
    'menu_position'      => 5,    // 管理画面のメニューの位置
    'menu_icon'          => 'dashicons-admin-tools', // 管理画面のアイコン
    'taxonomies'         => array('post_tag')
  ));
}

add_action('init', 'create_post_type');

// ウィジェット実装

function hamburger_widgets_init() {
  register_sidebar (
    array(
      'name' => 'サイドバー',
      'id' => 'sidebar_widget',
      'discription' => 'サイドバー用ウィジェットです',
      'before_widget' => '',
      'after_widget' => '',
      'before_title' => '<h4>',
      'after_title' => '</h4>',
      'before_sidebar' => '',
      'after_sidebar' => ''
    )
  );
}

add_action('widgets_init', 'hamburger_widgets_init');

function hamburger_widgets_textbox1() {
  register_sidebar (
    array(
      'name' => 'フロントテキストボックス1',
      'id' => 'textbox1_widget',
      'description' => 'フロントページのテキストボックス用ウィジェットです。',
      'before_widget' => '<div class="p-box-contents-text">',
      'after_widget' => '</div>',
      'before_title' => '<h4>',
      'after_title' => '</h4>',
      'before_sidebar' => '',
      'after_sidebar' => ''
    )
  );
}

add_action('widgets_init','hamburger_widgets_textbox1');

function hamburger_widgets_textbox2() {
  register_sidebar (
    array(
      'name' => 'フロントテキストボックス2',
      'id' => 'textbox2_widget',
      'description' => 'フロントページのテキストボックス用ウィジェットです。',
      'before_widget' => '<div class="p-box-contents-text">',
      'after_widget' => '</div>',
      'before_title' => '<h4>',
      'after_title' => '</h4>',
      'before_sidebar' => '',
      'after_sidebar' => ''
    )
  );
}

add_action('widgets_init','hamburger_widgets_textbox2');

function hamburger_widgets_mapbox() {
  register_sidebar (
    array(
      'name' => '地図ボックス',
      'id' => 'mapbox_widget',
      'description' => 'フロントページの地図ボックス用ウィジェットです。',
      'before_widget' => '<div class="p-map-discription">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3><div class="p-line-box"></div>',
      'before_sidebar' => '',
      'after_sidebar' => ''
    )
  );
}

add_action('widgets_init','hamburger_widgets_mapbox');

function mytheme_widgets_footer() {
  // フッターウィジェットエリアの登録
  register_sidebar( array(
      'name'          => 'フッターウィジェットエリア', // 管理画面で表示される名前
      'id'            => 'footer_widget',  // ウィジェットエリアのID
      'before_widget' => '',  // 各ウィジェットの前に挿入されるHTML
      'after_widget'  => '', // 各ウィジェットの後に挿入されるHTML
      'before_title'  => '<p>', // ウィジェットタイトルの前に挿入されるHTML
      'after_title'   => '</p>', // ウィジェットタイトルの後に挿入されるHTML
  ) );
}
add_action( 'widgets_init', 'mytheme_widgets_footer' );

// フィルター実装

function my_custom_widget_args ($args) {
  $args['container'] = false;
  $args['class'] = '';
  return $args;
}

add_filter('widget_nav_menu_args', 'my_custom_widget_args');

function my_mce_before_init_insert_formats($initArray) {
  // 設定をリセットして、pタグで囲むように変更
  $initArray['block_formats'] = 'Paragraph=p; Heading 1=h1; Heading 2=h2;';
  return $initArray;
}
add_filter('tiny_mce_before_init', 'my_mce_before_init_insert_formats');

function remove_figure_tag_from_image_block($block_content, $block) {
  if ($block['blockName'] === 'core/image') {
      // 画像部分だけを取り出して<figure>を削除する
      $block_content = preg_replace('/<figure[^>]*>/', '', $block_content);
      $block_content = str_replace('</figure>', '', $block_content);
  }
  return $block_content;
}

add_filter('render_block', 'remove_figure_tag_from_image_block', 10, 2);

function remove_specific_div_classes( $block_content, $block ) {
  // グループブロックかどうか確認
  if ( strpos( $block_content, 'wp-block-group__inner-container' ) !== false && 
       strpos( $block_content, 'is-layout-constrained' ) !== false ) {

      // 不要な<div>タグとクラスを削除
      $block_content = preg_replace(
          '/<div class="wp-block-group__inner-container is-layout-constrained wp-block-group-is-layout-constrained">(.*?)<\/div>/s',
          '$1',
          $block_content
      );
  }

  return $block_content;
}

add_filter('render_block', 'remove_specific_div_classes', 10, 2);

function custom_pagenavi_icon($html) {
  // FontAwesomeのアイコンを使って「前へ」「次へ」をカスタマイズ
  $html = str_replace('«', '<i class="fa-thin fa-angles-left"></i>', $html); // 左矢印
  $html = str_replace('»', '<i class="fa-thin fa-angles-right"></i>', $html); // 右矢印
  return $html;
}
add_filter('wp_pagenavi', 'custom_pagenavi_icon');

function hamburger_script() {
  $locale = get_locale();
  $locale = apply_filters('theme_locale', $locale, 'Hamburger');
  if ($locale == 'ja') {
    wp_enqueue_style('hamburger-mplus1p', 'https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@100;300;400;500;700;800;900&family=Roboto:wght@700&display=swap', array(), null);
  }
  wp_enqueue_style('hamburger-Roboto', 'https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap');
  wp_enqueue_style('hamburger-css', get_stylesheet_directory_uri().'/css/style.css');
  wp_enqueue_style('hamburger-style', get_stylesheet_directory_uri().'/style.css');
  wp_enqueue_script('fontawesome', 'https://kit.fontawesome.com/4231b7242a.js', '6.6.0', null, true);
  wp_enqueue_script('hamburger-js', get_stylesheet_directory_uri().'/js/main.js', array(), null, true);
}

add_action('wp_enqueue_scripts', 'hamburger_script');