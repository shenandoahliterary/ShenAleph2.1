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

	<section class="topbanner-noborder container-fluid">

		<div class="d-flex justify-content-center align-items-center" style="background-color: white">
            <p>
                <img style="width:8vw; height:auto; padding-top:2vw" src="<?php echo get_stylesheet_directory_uri(); ?>/Shenandoah-1600.jpg" alt="Shenandoah Logo" itemprop="logo">
            </p>
            <p id="typelogo">
				<a href="https://shenandoahLiterary.org/721/" style="color: rgb(103,173,168)">Shenandoah</a>
			</p>
		</div>

		<div class="row nav-bar-row">
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
