<?php
/* ---------------------------------------- */
/* add_custompost_type						*/
/* ---------------------------------------- */
if ( ! function_exists( 'harupress_add_custompost_type' ) ) :
function harupress_add_custompost_type() {

	$args = array(
		'label' => 'お知らせ',//管理画面の左メニューに表示される名前
		'labels' => array(
			'singular_name' => 'お知らせ',//この投稿タイプの名前
			'add_new' => '新規追加',//デフォルトの「add new」の代わりに表示するテキスト(以下省略)
			'add_new_item' => 'お知らせを追加',//add new itemテキスト
			'edit_item' => 'お知らせを編集',//edit itemテキスト
			'new_item' => '新しいお知らせ',//new itemテキスト
			'view_item' => 'お知らせを表示',//view itemテキスト
			'search_items' => 'お知らせを検索',//search itemsテキスト
			'not_found' => 'お知らせは見つかりませんでした',//not foundテキスト
			'not_found_in_trash' => 'ゴミ箱にお知らせはありません。',//not found in trashテキスト
		),
		'description' => 'お知らせを公開する時に使うカスタム投稿タイプです。',//投稿タイプの簡潔な説明
		'public' => true,//管理画面から投稿できるようにする(初期値がfalseなので注意)
		'hierarchical' => false,//階層をもつか
		'supports' => array('title','editor','author','thumbnail','excerpt','comments','custom-fields'),//この投稿で利用する機能
		'has_archive' => true,//投稿アーカイブを利用する(初期値がfalseなので注意)
		'menu_position' => 5,//管理画面の左メニューにおける表示位置　5-投稿の下、10-メディアの下、20-ページの下
		'rewrite' => true

	);
	register_post_type('news', $args);//カスタム投稿タイプ「news」を登録

	$args = array(
		'label' => '情報タイプ',//管理画面の左メニューに表示される名前
		'labels' => array(
			'singular_name' => '情報タイプ',//このカスタム分類の名前
			'search_items' => '情報タイプを検索',//デフォルトの「search item」の代わりに表示するテキスト(以下省略)
			'popular_items' => 'よく使われている情報タイプ',//popular itemテキスト
			'all_items' => 'すべての情報タイプ',//all itemsテキスト
			'parent_item' => '親情報タイプ',//parent itemテキスト
			'edit_item' => '情報タイプの編集',//edit itemテキスト
			'update_item' => '更新',//update itemテキスト
			'add_new_item' => '新規情報タイプを追加',//add new itemテキスト
			'new_item_name' => '新しい情報タイプ',//new item nameテキスト
		),
		'public' => true,//管理画面から作成できるようにする
		'hierarchical' => true,//階層をもつか
		'rewrite' => true
	);
	register_taxonomy('newstype', 'news', $args);//カスタム分類「newstype」を「news」内に登録
	flush_rewrite_rules();//パーマリンク設定を再設定(エラー回避のため)
}
add_action('init', 'harupress_add_custompost_type');//定義した「add_custompost_type」を実行
//カテゴリーとタグの URL のリライトルールを設定
add_rewrite_rule('news/newstype/([^/]+)/?$', 'index.php?newstype=$matches[1]', 'top');
endif;

/* ----------------------------------------------
 * 5.8.2 - View addPost list
 * --------------------------------------------*/
if ( ! function_exists( 'harupress_add_custompost_list' ) ) :
function harupress_add_custompost_list( $show_tag ) {

    // If the value is 0, use the value of the default
    $show_num = 4;
    $num_class = 'five-column';



    if ( $show_tag == 'news' ) {
        $my_title = __( 'Notice', 'harupress' );

        $order = 'DESC';
        $order_by = '';

    } else {
        return;
    }

    $my_query = harupress_add_custompost_data( $show_num, $show_tag, $order, $order_by );
    if ( $my_query -> have_posts() ) : ?>
		<div id="top_info" class="<?php echo $show_tag; ?>-contents common-contents clearfix">
	   	<div class="bloglist">
			<h3 id="<?php echo $show_tag; ?>-title" class="common-title"><?php echo esc_attr( $my_title ); ?></h3>
			<div class="blogpast"><a href="http://harupress/blog/">"一覧を見る"</a></div>
			<div style="clear: both"></div>
		</div>
			<div class="veu_3prArea row">
				<?php while ( $my_query -> have_posts() ) : $my_query -> the_post(); ?>
				<?php $cat_info = harupress_category_info();
					if ( has_post_thumbnail() && ! post_password_required() ) :
					$thumbnail_name =  'home-post-thumbnail';
					$thumbnail_class = ' home-thumbnail';
					endif;
				?>
				<?php $cat_info = harupress_category_info(); ?>
						<div class="prArea col-md-3">
							<span class="subSection-title"><?php the_time('Y/m/d/'); ?></span>
							<span class="subSection-title"><?php echo esc_attr($cat_info->slug); ?>"><?php echo esc_html($cat_info->name); ?></span>
							<?php	if ( has_post_thumbnail() && ! post_password_required() ) :		?>
							<div class="media_pr" <?php echo esc_attr( $thumbnail_class );?>> <?php the_post_thumbnail( $thumbnail_name ); ?> </div>
							<?php endif; ?>
							<p class="summary"><?php the_title(); ?></p>
						</div>
				<?php endwhile; wp_reset_query(); ?>

			</div>
		</div>
<?php endif;
}
endif;





/* ----------------------------------------------
 * 5.8.3.2 - post data
 * --------------------------------------------*/

if ( ! function_exists( 'harupress_add_custompost_data' ) ) :
function harupress_add_custompost_data( $show_num, $show_tag, $order, $order_by ) {
    global $post;
    $tag_ID = '';
    $taxonomy_ID = '';


   	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$taxonomy_slug = get_query_var( 'taxonomy' );
		$cpt = get_query_var( 'post_type' );

    $args =  array(
		'post_type' => 'news',
	  'taxonomy' => 'newstype',
		'posts_per_page' => 4,
		'paged' => $paged,
		'order' => 'DESC'
		);

    $my_query = new WP_Query( $args );
    return $my_query;

}
endif;








/* JSON-LD
* ---------------------------------------- */
add_action('wp_head','harupress_json_ld');
if ( ! function_exists( 'harupress_json_ld' ) ) :
function harupress_json_ld (){
  if ( is_page() || is_single() || !is_singular('lp') ) {
    if ( have_posts() ){
      while ( have_posts() ){
        the_post();
        $context = 'http://schema.org';
        $type = 'Article';
        $name = get_the_title();
        $authorType = 'Person';
        $authorName = get_the_author();
        $dataPublished = get_the_date('Y-n-j');
        $image_id = get_post_thumbnail_id();
        $image = wp_get_attachment_image_src($image_id, true);
        $image0 = $image[0];
        // $image = the_post_thumbnail();
        $articleSection = get_the_excerpt();
        $articleBody = get_the_content();
        $url = get_permalink();
        $publisherType = 'Organization';
        $publisherName = get_bloginfo('name');
        $json= "'@context' : '{$context}',
        '@type' : '{$type}',
        'name' : '{$name}',
        'author' : {
          '@type' : '{$authorType}',
          'name' : '{$authorName}'
        },
        'datePublished' : '{$dataPublished}',
        'image' : '{$image0}',
        'articleSection' : '{$articleSection}',
        'articleBody' : '{$articleBody}',
        'url' : '{$url}',
        'publisher' : {
          '@type' : '{$publisherType}',
          'name' : '{$publisherName}'
        }";
        echo '<script type="application/ld+json">{'.$json.'}</script>';
      }
    }
    rewind_posts();
  }
}
endif;
