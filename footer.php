<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Meshie
 */

?>
	<footer id="colophon" class="site-footer">
		<nav class="navbar navbar-default navbar-custom footernavbar">
     		<div class="container-fluid">
	 			<?php wp_nav_menu( array( 'theme_location' => 'scondry', 'container' => 'div',  'menu_class' => 'footer-nav clearfix','menu_id' => 'scondry-menu' ,'fallback_cb' => 'wp_bootstrap_navwalker::fallback','walker' => new wp_bootstrap_navwalker()) ); ?>
	 		</div>
		</nav><!-- #site-navigation -->
				<div class="site-info">
			<div class="inner clearfix">
				<div class="row">
					<div class="col-md-4">
						<div class="footer-logo"><<img src="<?php echo get_template_directory_uri().'/images/harupress-logo.png'; ?>" class="img-responsive" alt="ハルプレス　ロゴ"></div>
					</div>
					<div class="col-md-8"> 
						<p class="copyright"><?php harupress_footer_copyright(); ?><br />
							<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'harupress' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'harupress' ), 'WordPress' ); ?></a>
							<span class="sep"> | </span>
							<a href="<?php echo esc_url( __( 'http://harupress.jp/', 'harupress' ) ); ?>"><?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'harupress' ), 'Meshie','otaharunobu' ); ?></a>
						</p>
					</div>
				</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
 
</div><!-- #page -->

<?php wp_footer(); ?>
<a href="#top" class="page-top">top</a>
<script type="text/javascript">
	$(function() {
	var pageTop = $('.page-top');
	pageTop.hide();
	$(window).scroll(function () {
	if ($(this).scrollTop() > 600) {
	pageTop.fadeIn();
	} else {
	pageTop.fadeOut();
	}
	});
	pageTop.click(function () {
	$('body, html').animate({scrollTop:0}, 500, 'swing');
	return false;
	});
	});
</script>
</body>
</html>
