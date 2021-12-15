<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Casino_Theme
 * @since Casino Theme 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?> class="only">
<!--<![endif]-->
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="MobileOptimized" content="320"/>
	<meta name="HandheldFriendly" content="true"/>
	<meta name="viewport" content="width=device-width" />

	<title>Игровые автоматы онлайн бесплатно и без регистрации!</title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->
	<?php wp_head(); ?>
	<!-- <link rel="stylesheet" id="casinotheme-style-css" href="/wp-content/themes/casinotheme/style.css" type="text/css" media="all"> -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="/wp-content/themes/casinotheme/js/jquery.jcarousellite.min.js"></script>
	<script type="text/javascript" src="/wp-content/themes/casinotheme/js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="/wp-content/themes/casinotheme/js/jquery.mousewheel-3.1.12.min.js"></script>
</head>

<body <?php body_class(); ?>>

	<div class="top_center">
		<div class="top_menu">
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle"><?php _e( 'МЕНЮ', 'casinotheme' ); ?></button>
				<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'casinotheme' ); ?>"><?php _e( 'Skip to content', 'casinotheme' ); ?></a>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
			</nav><!-- #site-navigation -->
		</div>
	</div>

	<div class="top_logo_all"><?php if ( !is_home() ) echo '<a href="/" class="sk_nome_link" title="На главную"></a>'; ?></div>

	<?php if ( is_active_sidebar( 'index-widget-tops' ) ) : ?>
		<div class="top_banners_all">
			<div class="top_banner">
				<div class="top_banner_title">Игровые залы</div>
				<?php dynamic_sidebar( 'index-widget-tops' ); ?>
			</div>
		</div><!-- #secondary -->
	<?php endif; ?>

	<div class="center_content_all">
		<div class="center_content">