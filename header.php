<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 *
 @package Meshie
 	*/

 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> style="padding-top: 0px; padding-bottom: 70px;">
	<div class="container-fluid">
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content">
				<?php esc_html_e( 'Skip to content', 'harupress' ); ?>
			</a>

			<header id="masthead" class="site-header" role="banner">
				<div class="row">
					<div class="col-md-3">
						<div class="headertopmargin">
						<img src="<?php echo get_template_directory_uri().'/images/harupress-logo.png'; ?>" class="img-responsive" alt="ハルプレス　ロゴ">
						</div>
					</div>
					<div class="col-md-5">
						<div class="headertopmargin">
						<p class="commitment"><strong>あなたのお店に、インターネットからお客様が<br>ドンドンやってくる仕組み作りを提供します。</strong>
						</p>
						</div>
					</div>
					<div class="col-md-4">
					<nav class="navbar navbar-default navbar-custom headernavbar">
					<div class="container-fluid">
						<?php wp_nav_menu( array( 'theme_location' => 'thirdry', 'container' => 'div','menu_class' => 'header-nav clearfix','menu_id' => 'thirdry-menu','fallback_cb' => 'wp_bootstrap_navwalker::fallback','walker' => new wp_bootstrap_navwalker() ) ); ?>

					</div>
				</nav>
						<div class="headerinquiry">
	<div class="row">
		<div class="inquery-consultation col-md-6"><p class="inquery-description">分からないところがある</p><p class="inquery-box">相談・質問はこちら！</p></div>
		<div class="inquery-document col-md-6"><p class="inquery-description">資料を収集したい</p><p class="inquery-box">資料請求はこちら！</p></div>
	</div>
	<div class="row">
		<div class="inquery-consideration col-md-6"><p class="inquery-description">もう少し詳しくききたい</p><p class="inquery-box">お問い合わせはこちら！</p></div>
		<div class="inquery-order col-md-6"><p class="inquery-description">制作をオーダーしたい</p><p class="inquery-box">ご発注はこちら！</p></div>
	</div>	
						
</div>
						
						

					</div>
				</div>
				<?php if ( is_front_page()  ) : ?>
				<div class="jumbotron hero-1">
					<div class="row">
						<div class="col-md-6">
							<?php 
			if ( is_front_page()  ) : ?>
							<h1 class="site-title">
								<?php bloginfo( 'name' ); ?>
							</h1>
							<?php
							endif;
							?>
						</div>
						
						<div class="col-md-6">
							<div>
								<?php
								if ( is_front_page() ):
									$description = get_bloginfo( 'description', 'display' );
								if ( $description || is_customize_preview() ): ?>
								<p class="site-description">
									<?php echo $description; ?>
								</p>
								<?php
								endif;
								endif;
								?>
							</div>
							<div>
								<?php 
         
							if ( $post->friendprice ): //friendpriceの設定 ?>
					<p class=friendprice>
						<a href="http://harupress/service/#friendlink" alt="お友達価格">
							<?php echo esc_attr($post->friendprice) ?></a>
					</p>
							<?php
							else :
								endif;
							?>
							</div>
							<div>
								<?php 
    
          	
          					if ( $post->monitorprice ): //monitorprice の設定 ?>
								<p class=monitorprice>
									<a href="http://harupress/service/#monitorlink" alt="モニター価格">					 
										<?php echo esc_attr($post->monitorprice) ?></a>
								</p>
								<?php else: 
							endif; ?>
							</div>
						</div>
					</div>
				</div>
				
				<?php elseif (is_page())  : ?>
				<div class="jumbotron hero-2">

				</div>
				<?php elseif (is_single())  : ?>
				<div class="jumbotron hero-3">

				</div>
				<?php elseif (is_archive())  : ?>
				<div class="jumbotron hero-4">

				</div>
				<?php elseif (is_home())  : ?>
				<div class="jumbotron hero-5">

				</div>
				<?php else  : ?>
				<div class="jumbotron hero-6">

				</div>
				<?php endif;  ?>

				<nav class="navbar navbar-default navbar-custom">
					<div class="container-fluid">

						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
							<?php esc_html_e( 'Primary Menu', 'harupress' ); ?>
						</button>

						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => 'div','menu_class' => 'nav navbar-nav','menu_id' => 'primary-menu','fallback_cb' => 'wp_bootstrap_navwalker::fallback','walker' => new wp_bootstrap_navwalker() ) ); ?>

					</div>
				</nav>
				<!-- #site-navigation -->
				<div class="breadcrumb">
					<?php harupress_breadcrumb(); ?>
				</div>
				<!-- /header-bottom -->
			</header>
			<!-- #masthead -->