<?php
// 投稿メタ情報保存ルーチン
add_action('save_post', 'surfing_my_box_save');
function surfing_my_box_save($post_id) {
	global $post;

	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){ 
		return $post_id; 
	}

	// メタタグ設定(投稿・固定ページ・LP)
	( isset($_POST['surfing_meta_keywords']) ) ? update_post_meta($post->ID, 'surfing_meta_keywords', $_POST['surfing_meta_keywords']) : "";
	( isset($_POST['surfing_meta_description']) ) ? update_post_meta($post->ID, 'surfing_meta_description', str_replace(array("\r\n","\r","\n"), '', $_POST['surfing_meta_description'])) : "";
	( isset($_POST['surfing_meta_robots']) ) ? update_post_meta($post->ID, 'surfing_meta_robots', $_POST['surfing_meta_robots']) : "";
	// レイアウト設定(投稿・固定ページ)
	( isset($_POST['post_layout']) ) ? update_post_meta($post->ID, 'post_layout', $_POST['post_layout']) : "";
	// ページ分割設定(投稿)
	( isset($_POST['surfing_nextpage_pc']) ) ? update_post_meta($post->ID, 'surfing_nextpage_pc', $_POST['surfing_nextpage_pc']) : "";
	( isset($_POST['surfing_nextpage_sp']) ) ? update_post_meta($post->ID, 'surfing_nextpage_sp', $_POST['surfing_nextpage_sp']) : "";
	// CTA設定(投稿・LP)
	( isset($_POST['surfing_cta']) ) ? update_post_meta($post->ID, 'surfing_cta', $_POST['surfing_cta']) : "";
	// TOPページヘの表示(投稿)
	( isset($_POST['surfing_show_toppage_flag']) ) ? update_post_meta($post->ID, 'surfing_show_toppage_flag', $_POST['surfing_show_toppage_flag']) : "";
	// RSSへの登録(投稿)
	( isset($_POST['surfing_include_rss']) ) ? update_post_meta($post->ID, 'surfing_include_rss', $_POST['surfing_include_rss']) : "";
	// ソーシャルボタンの表示(投稿)
	( isset($_POST['surfing_post_social_buttons']) ) ? update_post_meta($post->ID, 'surfing_post_social_buttons', $_POST['surfing_post_social_buttons']) : "";
	// CTAで使用するボタンの設定(CTA)
	( isset($_POST['surfing_cta_select_button']) ) ? update_post_meta($post->ID, 'surfing_cta_select_button', $_POST['surfing_cta_select_button']) : "";
	( isset($_POST['surfing_cta_select_button_url']) ) ? update_post_meta($post->ID, 'surfing_cta_select_button_url', $_POST['surfing_cta_select_button_url']) : "";
	// ランキング(ランキング)
	( isset($_POST['surfing_ranking']) ) ? update_post_meta($post->ID, 'surfing_ranking', $_POST['surfing_ranking']) : "";
	for ($i = 1; $i <= 10; $i++) {
		( isset($_POST["surfing_ranking_{$i}_title"]) ) ? update_post_meta($post->ID, "surfing_ranking_{$i}_title", $_POST["surfing_ranking_{$i}_title"]) : "";
		( isset($_POST["surfing_ranking_{$i}_code"]) ) ? update_post_meta($post->ID, "surfing_ranking_{$i}_code", $_POST["surfing_ranking_{$i}_code"]) : "";
		( isset($_POST["surfing_ranking_{$i}_desc"]) ) ? update_post_meta($post->ID, "surfing_ranking_{$i}_desc", $_POST["surfing_ranking_{$i}_desc"]) : "";
		( isset($_POST["surfing_ranking_{$i}_detail_text"]) ) ? update_post_meta($post->ID, "surfing_ranking_{$i}_detail_text", $_POST["surfing_ranking_{$i}_detail_text"]) : "";
		( isset($_POST["surfing_ranking_{$i}_detail_color"]) ) ? update_post_meta($post->ID, "surfing_ranking_{$i}_detail_color", $_POST["surfing_ranking_{$i}_detail_color"]) : "";
		( isset($_POST["surfing_ranking_{$i}_detail_url"]) ) ? update_post_meta($post->ID, "surfing_ranking_{$i}_detail_url", $_POST["surfing_ranking_{$i}_detail_url"]) : "";
		( isset($_POST["surfing_ranking_{$i}_affiliate_text"]) ) ? update_post_meta($post->ID, "surfing_ranking_{$i}_affiliate_text", $_POST["surfing_ranking_{$i}_affiliate_text"]) : "";
		( isset($_POST["surfing_ranking_{$i}_affiliate_color"]) ) ? update_post_meta($post->ID, "surfing_ranking_{$i}_affiliate_color", $_POST["surfing_ranking_{$i}_affiliate_color"]) : "";
		( isset($_POST["surfing_ranking_{$i}_affiliate_url"]) ) ? update_post_meta($post->ID, "surfing_ranking_{$i}_affiliate_url", $_POST["surfing_ranking_{$i}_affiliate_url"]) : "";
	}

	// 登録フォーム(未使用)
	( isset($_POST['surfing_lp_form']) ) ? update_post_meta($post->ID, 'surfing_lp_form', $_POST['surfing_lp_form']) : "";
	// ページ固有のJavascript/CSS(未使用)
	( isset($_POST['surfing_post_asset_js4head']) ) ? update_post_meta($post->ID, 'surfing_post_asset_js4head', $_POST['surfing_post_asset_js4head']) : "";
	( isset($_POST['surfing_post_asset_css']) ) ? update_post_meta($post->ID, 'surfing_post_asset_css', $_POST['surfing_post_asset_css']) : "";
	( isset($_POST['surfing_post_asset_js']) ) ? update_post_meta($post->ID, 'surfing_post_asset_js', $_POST['surfing_post_asset_js']) : "";
	// 入力フォームの作成(未使用)
	( isset($_POST['frm']) ) ? update_post_meta($post->ID, 'frm', $_POST['frm']) : "";
	// SEOチェックポイント(未使用)
	( isset($_POST['surfing_checklists']) ) ? update_post_meta($post->ID, 'surfing_checklists', $_POST['surfing_checklists']) : "";
	// ？(未使用)
	( isset($_POST['surfing_post_front_info']) ) ? update_post_meta($post->ID, 'surfing_post_front_info', $_POST['surfing_post_front_info']) : "";
}

// メタタグ設定(投稿・固定ページ・LP)
add_action('add_meta_boxes', 'add_surfing_meta_tags');
function add_surfing_meta_tags() {
	add_meta_box('surfing_meta_tags', 'メタタグ設定', 'surfing_meta_tags', 'post', 'normal', 'default');
	add_meta_box('surfing_meta_tags', 'メタタグ設定', 'surfing_meta_tags', 'page', 'normal', 'default');
	add_meta_box('surfing_meta_tags', 'メタタグ設定', 'surfing_meta_tags', 'lp', 'normal', 'default');
}

function surfing_meta_tags() {  
	global $post;
  
	$metarobots_array = array();
	$metarobots_array = get_post_meta($post->ID, 'surfing_meta_robots', true);
?>
<h4>メタディスクリプション</h4>
<textarea name="surfing_meta_description" id="surfing_meta_description" cols="60" rows="4"><?php echo get_post_meta($post->ID, 'surfing_meta_description', true); ?></textarea><br />
<h4>メタキーワード</h4>
<input type="text" class="regular-text" name="surfing_meta_keywords" id="surfing_meta_keywords" value="<?php echo get_post_meta($post->ID, 'surfing_meta_keywords', true); ?>" />
<h4>メタロボット</h4>
<ul>
	<li>
		<input type="hidden" name="surfing_meta_robots[]" value="">
		<label for="surfing_meta_robots1"><input class="cmb_option" type="checkbox" name="surfing_meta_robots[]" id="surfing_meta_robots1" value="noindex"  <?php echo ( is_array($metarobots_array) && in_array('noindex', $metarobots_array) ) ? 'checked' : '';?> /> noindex</label>
	</li>
	<li>
		<input type="hidden" name="surfing_meta_robots[]" value="">
		<label for="surfing_meta_robots2"><input class="cmb_option" type="checkbox" name="surfing_meta_robots[]" id="surfing_meta_robots2" value="nofollow" <?php echo ( is_array($metarobots_array) && in_array('nofollow', $metarobots_array) ) ? 'checked' : '';?>  /> nofollow</label>
	</li>
</ul>
<?php
}

// レイアウト設定(投稿・固定ページ)
add_action('add_meta_boxes', 'add_surfing_post_layout');
function add_surfing_post_layout() {
	add_meta_box('surfing_post_layout', 'レイアウト設定', 'surfing_post_layout', 'post', 'normal', 'default');
	add_meta_box('surfing_post_layout', 'レイアウト設定', 'surfing_post_layout', 'page', 'normal', 'default');
	//add_meta_box('surfing_post_layout', 'レイアウト設定', 'surfing_post_layout', 'lp', 'normal', 'default');
}

function surfing_post_layout() {  
	global $post;

	$post_layout = get_post_meta($post->ID, 'post_layout', true);
?>
<table class="form-table cmb_metabox">
	<tr class="cmb-type-radio_inline cmb-inline">
		<td>
			<small>ブログ記事のレイアウトを選択して下さい。</small>
			<ul>
				<li style="display:inline-block;padding-right:5px;">
					<input type="radio" name="post_layout" id="post_layout1" value="col2_left" <?php checked ('col2_left', $post_layout);?> /> 
					<label for="post_layout1">2カラム（右サイドバー）</label>
				</li>
				<li style="display:inline-block;padding-right:5px;">
					<input type="radio" name="post_layout" id="post_layout2" value="col2_right" <?php checked ('col2_right', $post_layout);?> /> 
					<label for="post_layout2">2カラム（左サイドバー）</label>
				</li>
				<li style="display:inline-block;padding-right:5px;">
					<input type="radio" name="post_layout" id="post_layout3" value="col1" <?php checked ('col1', $post_layout);?> /> 
					<label for="post_layout3">1カラム</label>
				</li>
				<li style="display:inline-block;padding-right:5px;">
					<input type="radio" name="post_layout" id="post_layout4" value="lp" <?php checked ('lp', $post_layout);?> /> 
					<label for="post_layout4">LP</label>
				</li>
			</ul>
		</td>
	</tr>
</table>
<?php
}

// ショートコード(投稿・固定ページ)
add_action('add_meta_boxes', 'add_surfing_ranking_shortcode_meta');
function add_surfing_ranking_shortcode_meta() {
  add_meta_box('surfing_ranking_shortcode', 'ショートコード', 'surfing_ranking_shortcode_meta', 'ranking', 'side', 'high');
}

function surfing_ranking_shortcode_meta() {
  global $post;
?>
<input type="text" value="<?php echo "[surfing_ranking id={$post->ID}]"; ?>" />
<?php
}

// ランキング(ランキング)
add_action('add_meta_boxes', 'add_surfing_ranking_meta');
function add_surfing_ranking_meta() {
	add_meta_box('surfing_ranking', 'ランキング', 'surfing_ranking_meta', 'ranking', 'normal', 'low');
}

function surfing_ranking_meta() {  
	global $post;

	$surfing_ranking = get_post_meta($post->ID, 'surfing_ranking', true);
	$first_title = "";
	$first_code = "";
	$first_desc = "";
	$first_detail_url = "";
	$first_affiliate_url = "";
	//if ( is_array($surfing_ranking) ) {
	//  extract($surfing_ranking);
	//}
	for ($i = 1; $i <= 10; $i++) :
?>
<h4>ランキング - <?php echo $i; ?>位</h4>
<table border="0" cellpadding="0" cellspacing="4">
	<tbody>
		<tr>
			<th>タイトル</th>
			<td>
				<input type="text" name="surfing_ranking[<?php echo $i; ?>][title]" id="surfing_ranking_<?php echo $i; ?>_title" value="<?php echo (isset($surfing_ranking[$i]['title'])) ? esc_html($surfing_ranking[$i]['title']) : ''; ?>" />
			</td>
		</tr>
		<tr>
			<th>アフィリエイトバナーコード</th>
			<td>
				<input type="text" name="surfing_ranking[<?php echo $i; ?>][code]" id="surfing_ranking_<?php echo $i; ?>_code" value="<?php echo (isset($surfing_ranking[$i]['code'])) ? esc_html($surfing_ranking[$i]['code']) : ''; ?>" />
			</td>
		</tr>
		<tr>
			<th>説明</th>
			<td>
				<textarea name="surfing_ranking[<?php echo $i; ?>][desc]" id="surfing_ranking_<?php echo $i; ?>_desc" rows="5"><?php echo (isset($surfing_ranking[$i]['desc'])) ? esc_html($surfing_ranking[$i]['desc']) : ''; ?></textarea>
			</td>
		</tr>
		<tr>
			<th colspan="2"><br />詳細ページへのリンク設定（商品を紹介している記事ページ等にリンクさせる）</th>
		</tr>
		<tr>
			<th>ボタンテキスト</th>
			<td>
				<input type="text" name="surfing_ranking[<?php echo $i; ?>][detail_text]" id="surfing_ranking_<?php echo $i; ?>_detail_text" value="<?php echo (isset($surfing_ranking[$i]['detail_text'])) ? $surfing_ranking[$i]['detail_text'] : ''; ?>" />
			</td>
		</tr>
		<tr>
			<th>ボタンカラー</th>
			<td>
				<ul class="color-radio cmb_id_surfing_color_scheme">
					<li id="color-1" style="display:inline-block;padding-right:18px;">
						<input type="radio" name="surfing_ranking[<?php echo $i; ?>][detail_color]" id="surfing_ranking_<?php echo $i; ?>_detail_color1" value="pt_green" <?php if (isset($surfing_ranking[$i]['detail_color'])) checked($surfing_ranking[$i]['detail_color'], 'pt_green');?> />
						<label for="surfing_ranking_<?php echo $i; ?>_detail_color1">緑</label>
					</li>
					<li id="color-2" style="display:inline-block;padding-right:18px;">
						<input type="radio" name="surfing_ranking[<?php echo $i; ?>][detail_color]" id="surfing_ranking_<?php echo $i; ?>_detail_color2" value="pt_red" <?php if (isset($surfing_ranking[$i]['detail_color'])) checked($surfing_ranking[$i]['detail_color'], 'pt_red');?> />
						<label for="surfing_ranking_<?php echo $i; ?>_detail_color2">赤</label>
					</li>
					<li id="color-3" style="display:inline-block;padding-right:18px;">
						<input type="radio" name="surfing_ranking[<?php echo $i; ?>][detail_color]" id="surfing_ranking_<?php echo $i; ?>_detail_color3" value="pt_orange" <?php if (isset($surfing_ranking[$i]['detail_color'])) checked($surfing_ranking[$i]['detail_color'], 'pt_orange');?> />
						<label for="surfing_ranking_<?php echo $i; ?>_detail_color3">オレンジ</label>
					</li>
					<li id="color-4" style="display:inline-block;padding-right:18px;">
						<input type="radio" name="surfing_ranking[<?php echo $i; ?>][detail_color]" id="surfing_ranking_<?php echo $i; ?>_detail_color4" value="pt_pink" <?php if (isset($surfing_ranking[$i]['detail_color'])) checked($surfing_ranking[$i]['detail_color'], 'pt_pink');?> />
						<label for="surfing_ranking_<?php echo $i; ?>_detail_color4">ピンク</label>
					</li>
					<li id="color-5" style="display:inline-block;padding-right:18px;">
						<input type="radio" name="surfing_ranking[<?php echo $i; ?>][detail_color]" id="surfing_ranking_<?php echo $i; ?>_detail_color5" value="pt_blue" <?php if (isset($surfing_ranking[$i]['detail_color'])) checked($surfing_ranking[$i]['detail_color'], 'pt_blue');?> />
						<label for="surfing_ranking_<?php echo $i; ?>_detail_color5">青</label>
					</li>
					<li id="color-6" style="display:inline-block;padding-right:18px;">
						<input type="radio" name="surfing_ranking[<?php echo $i; ?>][detail_color]" id="surfing_ranking_<?php echo $i; ?>_detail_color6" value="pt_gray" <?php if (isset($surfing_ranking[$i]['detail_color'])) checked($surfing_ranking[$i]['detail_color'], 'pt_gray');?> />
						<label for="surfing_ranking_<?php echo $i; ?>_detail_color6">グレー</label>
					</li>
					<li id="color-7" style="display:inline-block;padding-right:18px;">
						<input type="radio" name="surfing_ranking[<?php echo $i; ?>][detail_color]" id="surfing_ranking_<?php echo $i; ?>_detail_color7" value="pt_custom" <?php if (isset($surfing_ranking[$i]['detail_color'])) checked($surfing_ranking[$i]['detail_color'], 'pt_custom');?> />
						<label for="surfing_ranking_<?php echo $i; ?>_detail_color7">カラーコード指定</label>&nbsp;#<input type="text" size="5" style="width:auto;" name="surfing_ranking[<?php echo $i; ?>][detail_color_code]" id="surfing_ranking_<?php echo $i; ?>_detail_color_code" value="<?php echo (isset($surfing_ranking[$i]['detail_color_code'])) ? $surfing_ranking[$i]['detail_color_code'] : ''; ?>" />
					</li>
				</ul>
			</td>
		</tr>
		<tr>
			<th>詳細ページへのリンクURL</th>
			<td>
				<input type="text" name="surfing_ranking[<?php echo $i; ?>][detail_url]" id="surfing_ranking_<?php echo $i; ?>_detail_url" value="<?php echo (isset($surfing_ranking[$i]['detail_url'])) ? esc_url($surfing_ranking[$i]['detail_url']) : ''; ?>" />
			</td>
		</tr>
		<tr>
			<th colspan="2"><br />公式サイトへのリンク設定</th>
		</tr>
		<tr>
			<th>ボタンテキスト</th>
			<td>
				<input type="text" name="surfing_ranking[<?php echo $i; ?>][affiliate_text]" id="surfing_ranking_<?php echo $i; ?>_affiliate_text" value="<?php echo (isset($surfing_ranking[$i]['affiliate_text'])) ? $surfing_ranking[$i]['affiliate_text'] : ''; ?>" />
			</td>
		</tr>
		<tr>
			<th>ボタンカラー</th>
			<td>
				<ul class="color-radio cmb_id_surfing_color_scheme">
					<li id="color-1" style="display:inline-block;padding-right:18px;">
						<input type="radio" name="surfing_ranking[<?php echo $i; ?>][affiliate_color]" id="surfing_ranking_<?php echo $i; ?>_affiliate_color1" value="pt_green" <?php if (isset($surfing_ranking[$i]['affiliate_color'])) checked($surfing_ranking[$i]['affiliate_color'], 'pt_green'); ?> />
						<label for="surfing_ranking_<?php echo $i; ?>_affiliate_color1">緑</label>
					</li>
					<li id="color-2" style="display:inline-block;padding-right:18px;">
						<input type="radio" name="surfing_ranking[<?php echo $i; ?>][affiliate_color]" id="surfing_ranking_<?php echo $i; ?>_affiliate_color2" value="pt_red" <?php if (isset($surfing_ranking[$i]['affiliate_color'])) checked($surfing_ranking[$i]['affiliate_color'], 'pt_red');?> />
						<label for="surfing_ranking_<?php echo $i; ?>_affiliate_color2">赤</label>
					</li>
					<li id="color-3" style="display:inline-block;padding-right:18px;">
						<input type="radio" name="surfing_ranking[<?php echo $i; ?>][affiliate_color]" id="surfing_ranking_<?php echo $i; ?>_affiliate_color3" value="pt_orange" <?php if (isset($surfing_ranking[$i]['affiliate_color'])) checked($surfing_ranking[$i]['affiliate_color'], 'pt_orange');?> />
						<label for="surfing_ranking_<?php echo $i; ?>_affiliate_color3">オレンジ</label>
					</li>
					<li id="color-4" style="display:inline-block;padding-right:18px;">
						<input type="radio" name="surfing_ranking[<?php echo $i; ?>][affiliate_color]" id="surfing_ranking_<?php echo $i; ?>_affiliate_color4" value="pt_pink" <?php if (isset($surfing_ranking[$i]['affiliate_color'])) checked($surfing_ranking[$i]['affiliate_color'], 'pt_pink');?> />
						<label for="surfing_ranking_<?php echo $i; ?>_affiliate_color4">ピンク</label>
					</li>
					<li id="color-5" style="display:inline-block;padding-right:18px;">
						<input type="radio" name="surfing_ranking[<?php echo $i; ?>][affiliate_color]" id="surfing_ranking_<?php echo $i; ?>_affiliate_color5" value="pt_blue" <?php if (isset($surfing_ranking[$i]['affiliate_color'])) checked($surfing_ranking[$i]['affiliate_color'], 'pt_blue');?> />
						<label for="surfing_ranking_<?php echo $i; ?>_affiliate_color5">青</label>
					</li>
					<li id="color-6" style="display:inline-block;padding-right:18px;">
						<input type="radio" name="surfing_ranking[<?php echo $i; ?>][affiliate_color]" id="surfing_ranking_<?php echo $i; ?>_affiliate_color6" value="pt_gray" <?php if (isset($surfing_ranking[$i]['affiliate_color'])) checked($surfing_ranking[$i]['affiliate_color'], 'pt_gray');?> />
						<label for="surfing_ranking_<?php echo $i; ?>_affiliate_color6">グレー</label>
					</li>
					<li id="color-7" style="display:inline-block;padding-right:18px;">
						<input type="radio" name="surfing_ranking[<?php echo $i; ?>][affiliate_color]" id="surfing_ranking_<?php echo $i; ?>_affiliate_color7" value="pt_custom" <?php if (isset($surfing_ranking[$i]['affiliate_color'])) checked($surfing_ranking[$i]['affiliate_color'], 'pt_custom');?> />
						<label for="surfing_ranking_<?php echo $i; ?>_affiliate_color7">カラーコード指定</label>&nbsp;#<input type="text" size="5" style="width:auto;" name="surfing_ranking[<?php echo $i; ?>][affiliate_color_code]" id="surfing_ranking_<?php echo $i; ?>_affiliate_color_code" value="<?php echo (isset($surfing_ranking[$i]['affiliate_color_code'])) ? $surfing_ranking[$i]['affiliate_color_code'] : ''; ?>" />
					</li>
				</ul>
			</td>
		</tr>
		<tr>
			<th>アフィリエイト文字リンクURL</th>
			<td>
				<input type="text" name="surfing_ranking[<?php echo $i; ?>][affiliate_url]" id="surfing_ranking_<?php echo $i; ?>_affiliate_url" value="<?php echo (isset($surfing_ranking[$i]['affiliate_url'])) ? esc_url($surfing_ranking[$i]['affiliate_url']) : ''; ?>" />
			</td>
		</tr>
	</tbody>
</table>
<?php
	endfor;
}

// CTAで使用するボタンの設定(CTA)
add_action('add_meta_boxes', 'add_surfing_cta_button');
function add_surfing_cta_button() {
	add_meta_box('surfing_cta_button', 'CTAで使用するボタンの設定', 'surfing_cta_button', 'cta', 'normal', 'low');
}

function surfing_cta_button() {  
	global $post;

	$surfing_cta = get_post_meta($post->ID, 'surfing_cta', true);
	$check_cta = "";
	$select_button = "";
	$select_button_url = "";
	//print_r($surfing_cta);
	if( is_array($surfing_cta) ){
		extract($surfing_cta);
	}
?>
<h4>ボタンに表示されるテキスト</h4>
<input type="text" name="surfing_cta[select_button]" id="surfing_cta_select_button" value="<?php echo esc_html($select_button);?>" />
<h4>ボタンをクリックしたときのリンク先URL</h4>
<input type="text" name="surfing_cta[select_button_url]" id="surfing_cta_select_button_url" class="regular-text" value="<?php echo esc_url($select_button_url);?>" />
<?php
}

// CTA設定(投稿・固定ページ・LP)
add_action('add_meta_boxes', 'add_surfing_cta');
function add_surfing_cta() {
	add_meta_box('ctameta_box', 'CTA設定', 'surfing_post_cta', 'post', 'normal', 'default');
	add_meta_box('ctameta_box', 'CTA設定', 'surfing_post_cta', 'page', 'normal', 'default');
	add_meta_box('ctameta_box', 'CTA設定', 'surfing_post_cta', 'lp', 'normal', 'default');
}

function surfing_post_cta() {  
	global $post;
	wp_nonce_field(wp_create_nonce(__FILE__), 'my_nonce_cta');
	$saved_surfing_cta = "";
	$saved_surfing_cta = get_post_meta($post->ID, 'surfing_cta', true);
?>
<script type="text/javascript">
jQuery('document').ready(function(){
	jQuery('.media-upload').each(function(){
		var rel = jQuery(this).attr("rel");
		jQuery(this).click(function(){
			window.send_to_editor = function(html) {
				html = '<a>' + html + '</a>';
				imgurl = jQuery('img', html).attr('src');
				jQuery('#'+rel).val(imgurl);
				tb_remove();
			}
			formfield = jQuery('#'+rel).attr('name');
			tb_show(null, 'media-upload.php?post_id=0&type=image&TB_iframe=true');
			return false;
		}); 
	}); 
});
</script>
<?php
	$surfing_cta = get_post_meta($post->ID, 'surfing_cta', true);
	$check_cta = "";
	$cta_select = "";
	$org_title = "";
	$org_image = "";
	$org_content = "";
	$org_button_text = "";
	$org_button_url = "";

	if( is_array($surfing_cta) ){
		extract($surfing_cta);
	}
?>
<table class="form-table cmb_metabox">
	<tr>
		<td>
			<small>記事直下に表示するCTAを選択して下さい。</small>
			<ul>
				<li class="cmb_option">
					<input type="radio" name="surfing_cta[check_cta]" id="surfing_cta1" value="none" <?php checked($check_cta, "none");?> />
					<label for="surfing_cta1">表示しない</label>
				</li>
				<li class="cmb_option">
					<input type="radio" name="surfing_cta[check_cta]" id="surfing_cta2" value="custompost" <?php checked($check_cta, "custompost");?> />
					<label for="surfing_cta2">既に作成してあるCTAの中から選ぶ</label>
				</li>
				<li class="cmb_option">
					<input type="radio" name="surfing_cta[check_cta]" id="surfing_cta3" value="pageorg" <?php checked($check_cta, "pageorg");?> /> 
					<label for="surfing_cta3">このページ独自のCTAを作る</label>
				</li>
			</ul>
			<p class="cmb_metabox_description"></p>
		</td>
	</tr>
	<tr class="cmb-type-cta_select cmb_id_surfing_cta_select">
		<td>
			<h4>既に作成してあるCTAの中から選ぶ</h4>
			<p><small>管理画面メニュー「CTA」で作成した物を下記より選んで下さい。</small></p>
<?php surfing_cmb_render_cta_select('surfing_cta[cta_select]', $cta_select);?>
			<br /><br />
		</td>
	</tr>
	<tr class="cmb-type-cta_select cmb_id_surfing_cta_org_title">
		<td>
			<h4>ページ独自のCTAタイトル</h4>
			<input type="text" class="regular-text" name="surfing_cta[org_title]" id="surfing_cta_org_title" value="<?php echo esc_html($org_title);?>" />
		</td>
	</tr>
	<tr class="cmb-type-cta_select cmb_id_surfing_cta_org_content">
		<td>
			<h4>ページ独自のCTAコンテンツ</h4>
			<?php wp_editor( $org_content, 'surfing_cta_org_content', array( 'media_buttons'=>true, 'textarea_name'=>'surfing_cta[org_content]','textarea_rows'=>10,'tiny_mce'=>true, 'tinymce_adv' => array( 'width' => '600')) ); ?>
		</td>
	</tr>
	<tr class="cmb-type-cta_select cmb_id_surfing_cta_org_button_text">
		<td>
			<h4>ボタンに表示されるテキスト</h4>
			<input type="text" class="regular-text" name="surfing_cta[org_button_text]" id="surfing_cta_org_button_text" value="<?php echo esc_html($org_button_text);?>" />
		</td>
	</tr>
	<tr class="cmb-type-cta_select cmb_id_surfing_cta_org_button_url">
		<td>
			<h4>ボタンをクリックしたときのリンク先URL</h4>
			<input type="text" class="regular-text" name="surfing_cta[org_button_url]" id="surfing_cta_org_button_url" value="<?php echo esc_url($org_button_url);?>" />
		</td>
	</tr>
</table>
<?php
}

add_filter('surfing_cmb_render_cta_select','surfing_cmb_render_cta_select', 10, 2 );
function surfing_cmb_render_cta_select($field, $meta ){
	// クエリ
	$args = array(
		'post_type' => 'cta',
		'showposts' => -1
	);
	$the_query = new WP_Query( $args );
	// ループ
	$cta_loop = '<select name="'.$field.'">';
	foreach($the_query->posts as $cta){
		$selected = selected($cta->ID, $meta, false );
		$cta_loop .= '<option value="'.$cta->ID.'"'.$selected.'>'.esc_html($cta->post_title).'</option>';
	}
	$cta_loop .= '</select>';

	// 投稿データをリセット
	wp_reset_postdata();

	echo $cta_loop;
}

// ページ分割設定(投稿)
add_action('add_meta_boxes', 'add_surfing_nextpage');
function add_surfing_nextpage() {
	add_meta_box('surfing_nextpage', 'ページ分割設定', 'surfing_nextpage', 'post', 'normal', 'default');
}

function surfing_nextpage() {  
	global $post;
?>
<h4>&lt;!--nextpage--&gt;によるページ分割</h4>
<p>
	<input type="hidden" name="surfing_nextpage_pc" value="">
	<label for="surfing_nextpage_pc"><input class="cmb_option" type="checkbox" name="surfing_nextpage_pc" id="surfing_nextpage_pc" value="1"<?php echo ( get_post_meta($post->ID, 'surfing_nextpage_pc', true) ) ? ' checked' : ''; ?> /> PC閲覧時無効</label><br />
	<input type="hidden" name="surfing_nextpage_sp" value="">
	<label for="surfing_nextpage_sp"><input class="cmb_option" type="checkbox" name="surfing_nextpage_sp" id="surfing_nextpage_sp" value="1"<?php echo ( get_post_meta($post->ID, 'surfing_nextpage_sp', true) ) ? ' checked' : ''; ?>  /> スマホ閲覧時無効</label>
</p>
<?php
}

// TOPページへの表示(投稿)
add_action('add_meta_boxes', 'surfing_add_surfing_show_toppage_flag');
function surfing_add_surfing_show_toppage_flag() {
	add_meta_box('surfing_show_toppage_flag', 'TOPページへの表示', 'surfing_show_toppage_flag', 'post', 'side', 'low');
}

function surfing_show_toppage_flag() {  
	global $post;
	$surfing_show_toppage_flag = get_post_meta($post->ID, 'surfing_show_toppage_flag', true);
	$surfing_show_toppage_flag = esc_html($surfing_show_toppage_flag);
?>
<input class="cmb_option" type="hidden" name="surfing_show_toppage_flag" value="" />
<input class="cmb_option" type="checkbox" name="surfing_show_toppage_flag" id="surfing_show_toppage_flag_checkbox" value="none" <?php checked('none', $surfing_show_toppage_flag);?>/>
<label for="surfing_show_toppage_flag_checkbox">チェックを入れた記事はTOPページには表示されなくなります。</label>
<?php
}

// RSSへの登録(投稿)
add_action('add_meta_boxes', 'surfing_add_surfing_include_rss');
function surfing_add_surfing_include_rss() {
	add_meta_box('surfing_include_rss', 'RSSへの登録', 'surfing_include_rss', 'post', 'side', 'low');
}
 
function surfing_include_rss() {  
	global $post;
	$surfing_include_rss = get_post_meta($post->ID, 'surfing_include_rss', true);
	$surfing_include_rss = esc_html($surfing_include_rss);
?>
<input class="cmb_option" type="hidden" name="surfing_include_rss" value="" />
<input class="cmb_option" type="checkbox" name="surfing_include_rss" id="surfing_include_rss_checkbox" value="none" <?php checked('none', $surfing_include_rss);?>/>
<label for="surfing_include_rss_checkbox">チェックを入れた記事はRSSには含まれなくなります。</label>
<?php
}

// ソーシャルボタンの表示(投稿)
add_action('add_meta_boxes', 'surfing_add_surfing_post_social_buttons');
function surfing_add_surfing_post_social_buttons() {
	add_meta_box('surfing_post_social_buttons', 'ソーシャルボタンの表示', 'surfing_post_social_buttons', 'post', 'side', 'low');
}
 
function surfing_post_social_buttons() {  
	global $post;
	$surfing_post_social_buttons = get_post_meta($post->ID, 'surfing_post_social_buttons', true);
	$surfing_post_social_buttons = esc_html($surfing_post_social_buttons);
?>
<input class="cmb_option" type="hidden" name="surfing_post_social_buttons" value="" />
<input class="cmb_option" type="checkbox" name="surfing_post_social_buttons" id="surfing_post_social_buttons_checkbox" value="none" <?php checked('none', $surfing_post_social_buttons);?>/>
<label for="surfing_post_social_buttons_checkbox">チェックを入れた記事にはソーシャルボタンが表示されません。</label>
<?php
}

// リダイレクト(投稿・固定ページ)
add_action( 'admin_menu', 'add_st_redirect' );
add_action( 'save_post', 'save_st_redirect' );

function add_st_redirect() {
	add_meta_box( 'st_redirect1', 'リダイレクトURL', 'insert_st_redirect', 'page', 'normal', 'default' );
	add_meta_box( 'st_redirect1', 'リダイレクトURL', 'insert_st_redirect', 'post', 'normal', 'default' );
}

function insert_st_redirect() {
	global $post;
	wp_nonce_field( wp_create_nonce( __FILE__ ), 'my_stredirect' );
	$stredirect = get_post_meta( $post->ID, 'st_redirect', true );
	$stredirect = esc_url( $stredirect );
	echo '<label class="hidden" for="st_redirect">リダイレクトURL</label><p>リダイレクトするURL</p><input type="text" class="regular-text" name="st_redirect" value="'.$stredirect.'" />';
}

function save_st_redirect( $post_id ) {
	$my_stredirect = isset( $_POST['my_stredirect'] ) ? $_POST['my_stredirect'] : null;
	if ( !wp_verify_nonce( $my_stredirect, wp_create_nonce( __FILE__ ) ) ) {
		return $post_id;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}
	if ( !current_user_can( 'edit_post', $post_id ) ) {
		return $post_id;
	}
	$data = $_POST['st_redirect'];

	if ( get_post_meta( $post_id, 'st_redirect' ) == "" ) {
		add_post_meta( $post_id, 'st_redirect', $data, true );
	} elseif ( $data != get_post_meta( $post_id, 'st_redirect', true ) ) {
		update_post_meta( $post_id, 'st_redirect', $data );
	} elseif ( $data == "" ) {
		delete_post_meta( $post_id, 'st_redirect', get_post_meta( $post_id, 'st_redirect', true ) );
	}
}

function st_redirect_source() {
	if ( !is_home() ) {
		global $wp_query;
		$postID = $wp_query->post->ID;
		$stredirect = get_post_meta( $postID, 'st_redirect', true );
	} else {
		$stredirect = '';
	}
	if (isset( $stredirect ) && trim( $stredirect ) !== '') {
		echo '<meta http-equiv="refresh" content="0; URL='. stripslashes($stredirect) .'">';
	}  else {
	}
}
add_action( 'wp_head', 'st_redirect_source' );

// ショートコード(投稿)
add_action('add_meta_boxes', 'add_surfing_shortcode_meta');
function add_surfing_shortcode_meta() {
	add_meta_box('surfing_shortcode', 'ショートコード', 'surfing_shortcode_meta', 'post', 'normal', 'high');
}

function surfing_shortcode_meta() {
	global $post;
?>
<table border="0" cellpadding="0" cellspacing="4" style="width:100%;">
	<tbody>
		<tr>
			<th style="width:33%;text-align:left;">記事紹介パーツ</th>
			<td><input type="text" value="<?php echo '[surfing_other_article id=記事ID]'; ?>" style="width:100%;" readonly /></td>
		</tr>
		<tr>
			<th style="width:33%;text-align:left;">吹き出し</th>
			<td><textarea rows="3" style="width:100%;" readonly><?php echo '[surfing_voice icon=&quot;画像URL&quot; name=&quot;画像下の名前&quot; type=&quot;(※)&quot; bg_color=&quot;eee&quot; font_color=&quot;000&quot; border_color=&quot;eee&quot;]本文[/surfing_voice]'; ?></textarea><br />※以下を記述。複数の場合は半角スペース区切り<br />l: アイコンを左(どちらか必須)<br />r: アイコンを右(どちらか必須)<br />big: アイコンを大きく</td>
		</tr>
	</tbody>
</table>
<?php
}

// 登録フォーム(未使用)
//add_action('add_meta_boxes', 'add_surfing_lp_form');
function add_surfing_lp_form() {
  add_meta_box('surfing_lp_form', '登録フォーム', 'surfing_lp_form', 'lp', 'normal', 'low');
}

function surfing_lp_form() {  
  global $post;
  
  $surfing_lp_form = get_post_meta($post->ID, 'surfing_lp_form', true);
?>
<h4>登録フォームのショートコード</h4>
<input type="text" name="surfing_lp_form" id="surfing_lp_form" value="<?php echo esc_html($surfing_lp_form);?>" />
<?php
}

// ページ固有のJavascript/CSS(未使用)
//add_action('add_meta_boxes', 'add_surfing_post_asset');
function add_surfing_post_asset() {
  add_meta_box('surfing_post_asset', 'ページ固有のJavascript/CSS', 'surfing_post_asset', 'post', 'normal', 'low');
  add_meta_box('surfing_post_asset', 'ページ固有のJavascript/CSS', 'surfing_post_asset', 'page', 'normal', 'low');
}

function surfing_post_asset() {  
  global $post;
  
?>
<h4>JavaScript</h4>
<p><small>&lt;/head>タグ直前に書かれます。</small></p>
<pre><textarea name="surfing_post_asset_js4head" id="surfing_post_asset_js4head" cols="100" rows="10" class="cmb_textarea_code"><?php echo get_post_meta($post->ID, 'surfing_post_asset_js4head', true);?></textarea></pre>
<h4>CSS</h4>
<p><small>&lt;/head>タグ直前に書かれます。</small></p>
<pre><textarea name="surfing_post_asset_css" id="surfing_post_asset_css" cols="100" rows="10" class="cmb_textarea_code"><?php echo get_post_meta($post->ID, 'surfing_post_asset_css', true);?></textarea></pre>
<h4>JavaScript</h4>
<p><small>&lt;/body>タグ直前に書かれます。</small></p>
<pre><textarea name="surfing_post_asset_js" id="surfing_post_asset_js" cols="100" rows="10" class="cmb_textarea_code"><?php echo get_post_meta($post->ID, 'surfing_post_asset_js', true);?></textarea></pre>
<?php
}

// 入力フォームの作成(未使用)
//add_action('add_meta_boxes', 'surfing_add_mail_form');
function surfing_add_mail_form() {
  add_meta_box('surfing_mail_form', '入力フォームの作成', 'surfing_mail_form', 'lp', 'normal', 'low');
}

function surfing_mail_form() {  
  global $post;

  $action = "";
  $title = "";
  $name = "";
  $email = "";
  $hidden = "";
  $submit = "";
  
  $frm = get_post_meta($post->ID, 'frm', true);
  if( isset($frm) && $frm !== '' ){
    extract($frm);
  }
?>
<h4>フォームタイトル</h4>
<input type="text" name="frm[title]" id="frm_title" value="<?php echo htmlspecialchars($title, ENT_QUOTES);?>" />
<p><small>メールアドレスなどの入力フォームを作成します。表示したい入力項目を選んで、お使いのメール配信システムのコードを以下の入力欄に入力してください。<br />詳しい使い方は、<a href="https://surfing.jp/surfing-lp" target="_blank">『入力フォームの設定方法』</a>で解説しているので参考にしてください。</small></p>
<p class="lp-example">
  例) フォーム作成サービスを使用する場合の例です。赤字の部分を各入力欄に入れて下さい。<br /><br />
  <span class="text-red">&lt;form method="post" action="*****" target="_blank"></span> …①formタグ<br />
  <span class="text-red">&lt;input type="hidden" name="***" value="*****" /></span> …④hiddenタグ<br />
  <span class="text-red">&lt;input type="hidden" name="***" value="*****" /></span> …④hiddenタグ<br />
  <span class="text-red">&lt;input type="hidden" name="***" value="*****" /></span> …④hiddenタグ<br />
  <br />
  &lt;dl class="pub_form"><br />
  &lt;dt>&lt;font color="red">*&lt;/font>メールアドレス&lt;/dt><br />
  &lt;dd><span class="text-red">&lt;input type="text" name="***" value="" /></span>&lt;/dd> …赤字の部分を③メールアドレス<br />
  &lt;dt>名前&lt;/dt><br />
  &lt;dd><span class="text-red">&lt;input type="text" name="***" value="" /></span>&lt;/dd> …赤字の部分を④お名前<br />
  &lt;/dl><br />
  &lt;hr><br />
  <br />
  &lt;div class="center"><br />
  <span class="text-red">&lt;input type="submit" name="submit" value="　送信　" /></span> …⑤submitタグ<br />
  &lt;/div><br />
  &lt;/form> …こちらは入力しないでください。
</p>

<dl class="lp-form">
  <dt>① formタグ</dt>
    <dd><input type="text" name="frm[action]" id="frm_action" value="<?php echo htmlspecialchars($action, ENT_QUOTES);?>" /></dd>
  <dt>② お名前</dt>
    <dd><input type="text" name="frm[name]" id="frm_name" value="<?php echo htmlspecialchars($name, ENT_QUOTES);?>" /></dd>
  <dt>③ メールアドレス</dt>
    <dd><input type="text" name="frm[email]" id="frm_email" value="<?php echo htmlspecialchars($email, ENT_QUOTES);?>" /></dd>
  <dt>④ hiddenタグ</dt>
    <dd><textarea name="frm[hidden]" id="frm_hidden" cols="60" rows="10" class="cmb_textarea_code"><?php echo $hidden;?></textarea></dd>
  <dt>⑤ submitタグ</dt>
    <dd><input type="text" name="frm[submit]" id="frm_submit" value="<?php echo htmlspecialchars($submit, ENT_QUOTES);?>" /></dd>
</dl>

<?php
}

// SEOチェックポイント(未使用)
//add_action('add_meta_boxes', 'add_surfing_checklists');
function add_surfing_checklists() {
  add_meta_box('surfing_checklists', 'SEOチェックポイント', 'surfing_checklists', 'post', 'side', 'low');
}
 
function surfing_checklists() {  
  global $post;
  $checklists = array();
  $checklists = get_post_meta($post->ID, 'surfing_checklists', true);
?>
<input type="hidden" name="surfing_checklists[]" value="">
<table class="form-table cmb_metabox">
  <tr class="cmb-type-multicheck cmb_id_surfing_checklists">
    <label style="display:none;" for="surfing_checklists">チェックリスト</label>
    <td>
      <small>SEO効果を最大化するため、記事更新前に、必要な設定を全てできているかを確認しましょう。</small>
      <ul>
        <li>
          <input class="cmb_option" type="checkbox" name="surfing_checklists[]" id="surfing_checklists1" value="check01" <?php echo ( is_array($checklists) && in_array("check01",$checklists) )? "checked='checked'":"";?> />
          <label for="surfing_checklists1">タイトルにキーワードが含まれている</label>
        </li>
        <li>
          <input class="cmb_option" type="checkbox" name="surfing_checklists[]" id="surfing_checklists2" value="check02"   <?php echo ( is_array($checklists) && in_array("check02",$checklists) )? "checked='checked'":"";?> />
          <label for="surfing_checklists2">タイトルでベネフィットが伝わっている</label>
        </li>
        <li>
          <input class="cmb_option" type="checkbox" name="surfing_checklists[]" id="surfing_checklists3" value="check03"   <?php echo ( is_array($checklists) && in_array("check03",$checklists) )? "checked='checked'":"";?> />
          <label for="surfing_checklists3">タイトルに数字が含まれている</label>
        </li>
        <li>
          <input class="cmb_option" type="checkbox" name="surfing_checklists[]" id="surfing_checklists4" value="check04"   <?php echo ( is_array($checklists) && in_array("check04",$checklists) )? "checked='checked'":"";?> />
          <label for="surfing_checklists4">タイトルに簡便性が含まれている</label>
        </li>
        <li>
          <input class="cmb_option" type="checkbox" name="surfing_checklists[]" id="surfing_checklists5" value="check05"   <?php echo ( is_array($checklists) && in_array("check05",$checklists) )? "checked='checked'":"";?> />
          <label for="surfing_checklists5">タイトルは32文字以内になっている</label>
        </li>
        <li>
          <input class="cmb_option" type="checkbox" name="surfing_checklists[]" id="surfing_checklists6" value="check06"   <?php echo ( is_array($checklists) && in_array("check06",$checklists) )? "checked='checked'":"";?> />
          <label for="surfing_checklists6">メタキーワードを入力している</label>
        </li>
        <li>
          <input class="cmb_option" type="checkbox" name="surfing_checklists[]" id="surfing_checklists7" value="check07"   <?php echo ( is_array($checklists) && in_array("check07",$checklists) )? "checked='checked'":"";?> />
          <label for="surfing_checklists7">メタディスクリプションを入力している</label>
        </li>
        <li>
          <input class="cmb_option" type="checkbox" name="surfing_checklists[]" id="surfing_checklists8" value="check08"   <?php echo ( is_array($checklists) && in_array("check08",$checklists) )? "checked='checked'":"";?> />
          <label for="surfing_checklists8">本文の見だしタグの順番は適切だ</label>
        </li>
        <li>
          <input class="cmb_option" type="checkbox" name="surfing_checklists[]" id="surfing_checklists9" value="check09"   <?php echo ( is_array($checklists) && in_array("check09",$checklists) )? "checked='checked'":"";?> />
          <label for="surfing_checklists9">書き出しで問題提起をしている</label>
        </li>
        <li>
          <input class="cmb_option" type="checkbox" name="surfing_checklists[]" id="surfing_checklists10" value="check10"   <?php echo ( is_array($checklists) && in_array("check10",$checklists) )? "checked='checked'":"";?> />
          <label for="surfing_checklists10">書き出しで解決策を提示している</label>
        </li>
        <li>
          <input class="cmb_option" type="checkbox" name="surfing_checklists[]" id="surfing_checklists11" value="check11"   <?php echo ( is_array($checklists) && in_array("check11",$checklists) )? "checked='checked'":"";?> />
          <label for="surfing_checklists11">解決策の根拠を提示している</label>
        </li>
     </ul>
     <span class="cmb_metabox_description"></span>
    </td>
  </tr>
</table>
<?php
}

// ページテンプレート(未使用)
//add_filter( 'cmb_show_on', 'surfing_metabox_show_on_template', 10, 2 );
function surfing_metabox_show_on_template( $display, $meta_box ) {
  if( 'template' !== $meta_box['show_on']['key'] ){
    return $display;
  }

  // Get the current ID
  if( isset( $_GET['post'] ) ){
    $post_id = $_GET['post'];
  }elseif( isset( $_POST['post_ID'] ) ){
    $post_id = $_POST['post_ID'];
  }
  if( !isset( $post_id ) ){
    return false;
  }

  $template_name = get_page_template_slug( $post_id );
  $template_name = substr($template_name, 0, -4);

  // If value isn't an array, turn it into one
  // if template_name is default , get_page_template_slug return null
  $meta_box['show_on']['value'] = !is_array( $meta_box['show_on']['value'] ) ? array( $meta_box['show_on']['value'] ) : $meta_box['show_on']['value'];

  // See if there's a match
  if($template_name == ''){
    return true;
  }else{
    return in_array( $template_name, $meta_box['show_on']['value'] );
  }
}
?>
