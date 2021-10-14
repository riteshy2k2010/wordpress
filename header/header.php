<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="https://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>

<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/slick.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/slick-theme.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/local.css">



<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="header-sec">
	<div class="header-sec-in">
		<div class="container">
			<div class="header-cnt-box2">
				<div class="logobox">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="wow zoomIn" src="<?php echo get_header_image(); ?>"></a>
				</div>
			</div>
			<div class="header-cnt-box1">
				<div class="btnmmenu" id="toggle-sidebar">
					<span></span>
					<span></span>
					<span></span>
				</div>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'desktop-menu' ) ); ?>
			</div>
			<!-- <div class="header-cnt-box3">
				<a hre="tel:5717331373">Contact Us Now</a>
				<a hre="<?php echo esc_url( home_url( '/' ) ); ?>/contact-us/">Contact Us Now</a> 
			</div>-->
		</div>
	</div>
</header>	

<div class="main-content">