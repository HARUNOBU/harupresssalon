<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Meshie
 */

?>

<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php
        if ( is_single() ) :
        the_title( '<h1 class="entry-title">', '</h1>' );
		elseif ( is_front_page() ) :
        else :
        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        endif;

        if ( 'post' === get_post_type() ) : ?>
        <div class="entry-meta">
            <?php harupress_posted_on(); ?>
        </div><!-- .entry-meta -->
        <?php
        endif; ?>
    </header><!-- .entry-header -->


    <div class="entry-content">
        <?php
        the_content( sprintf(
            /* translators: %s: Name of current post. */
            wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'harupress' ), array( 'span' => array( 'class' => array() ) ) ),
            the_title( '<span class="screen-reader-text">"', '"</span>', false )
        ) );

        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'harupress' ),
            'after'  => '</div>',
        ) );
        ?>
    </div><!-- .entry-content -->


</section><!-- #post-## -->

    <?php
if ( ! is_attachment() ) {

  harupress_post_list( 'new' );
  harupress_add_custompost_list( 'news' );

    ///harupress_ad_widget_medium_bottom( 'center' );
}

?>
<div>
	<div class="row">
		<div class="inquery-consultation col-md-6"><p class="inquery-description">分からないところがある</p><p class="inquery-box">相談・質問はこちら！</p></div>
		<div class="inquery-document col-md-6"><p class="inquery-description">資料を収集したい</p><p class="inquery-box">資料請求はこちら！</p></div>
	</div>
	<div class="row">
		<div class="inquery-consideration col-md-6"><p class="inquery-description">もう少し詳しくききたい</p><p class="inquery-box">お問い合わせはこちら！</p></div>
		<div class="inquery-order col-md-6"><p class="inquery-description">制作をオーダーしたい</p><p class="inquery-box">ご発注はこちら！</p></div>
	</div>
	<p class="inquery-promise"><strong>※しつこい、うざい、訪問や電話営業は絶対にいたしません</strong>
						</p>
</div>
</section>
