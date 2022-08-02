<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ShenAleph
 */

?>

	</div><!-- #content -->

	<footer>
		<div class="row footer-above">

			<div class="col images">
				<a href="https://www.facebook.com/ShenandoahLiterary"><i class="fab fa-facebook-square" style="padding-left:15px"></i></a> 
				<a href="https://www.instagram.com/shenandoah_literary"><i class="fab fa-instagram"></i></a> 
				<a href="https://twitter.com/ShenandoahWLU"><i class="fab fa-twitter"></i></a>   
			</div>
 
			<div class="col text-end" style="background-color:lightpink">
				<a class="clmp" style="margin-top:-10px" href = "https://www.clmp.org/"><img src="https://shenandoahliterary.org/681/files/2018/12/clmp.png" href = "https://www.clmp.org/"></a>
				<br>
				<a class="wl-logo" href = "https://www.wlu.edu/"><img src="https://shenandoahliterary.org/681/files/2018/12/wlu-w300.png"></a>
			</div>

			<img src="<?php echo get_stylesheet_directory_uri(); ?>/shen-header-new.svg" class="img-fluid" alt="Shenandoah Volume 68, Number 1" itemprop="logo">
		
		</div>

	</footer><!-- #colophon -->

</div><!-- #page  also ends Bootstrap container-->

<?php wp_footer(); ?>

</body>
</html>
