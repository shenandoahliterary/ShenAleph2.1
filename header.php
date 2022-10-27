<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ShenAleph
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
<!--	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.jpg" /> -->
<link rel="stylesheet" href="https://use.typekit.net/nci7nxi.css">
<link rel="stylesheet" href="style.css">
	<?php wp_head(); ?>
	<script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/d3fb306d3e3ad334647dfe1e3/ae9b8e29d4b3f84801343e0b8.js");</script>

</head>

<body <?php body_class(); ?>>
<!-- start Bootstrap container -->
<div id="page" class="site">

	<section class="topbanner-noborder container-fluid" id="typelogo-container">

		<div class="row">
			<p id="typelogo">
				<a href="https://shenandoahLiterary.org/721/">Shenandoah</a>
			</p>
		</div>

		<div class="row">
			<a href="https://shenandoahliterary.org/721/" rel="home" itemprop="url">
<!--				<img src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/shen-header-new.svg" style="z-index:1" class="img-fluid" alt="Shenandoah Volume 68, Number 1" itemprop="logo">-->

				<!-- <img src="https://shenandoahliterary.org/681/files/2018/12/Shenandoah-1600.jpg" class="img-fluid" alt="Shenandoah Volume 68, Number 1" itemprop="logo"> -->
			</a>
		</div>

		<div class="row nav-bar-row" style="padding-top:15px">
			<div class="col-md-6">
				<div class="volumeIssueBanner">
					Volume 72, Number 1 &middot; Fall 2022
				</div>
			</div>

			<div class="d-flex flex-nowrap col-md-6 float-md-end nav-bar" role="navigation">
				<a class="nav-link" style="padding-right:2.3vw" href="https://shenandoahliterary.org/about/">About</a>
				<a class="nav-link" style="padding-right:2.3vw" href="https://shenandoahliterary.org/issues/">Issues</a>
				<a class="nav-link" style="padding-right:2.3vw" href="https://shenandoahliterary.org/submissions/">Submit</a>
				<a class="nav-link" style="padding-right:2.3vw" href="https://shenandoahliterary.org/thepeak">The Peak</a>
			</div>
		</div>

	</section>


	<div id="content" class="site-content">
