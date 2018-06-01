<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Simplelin
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer-grow">
			<div class="container">
				<div class="pad">
					 <div class="col1">
						<h4>Grow your business</h4>
						<p>Find out how PinLocal can grow your business.</p>
					  </div>

					  <div class="col2">
						<a href="http://pinlocal.com/register/leadcategories" title="Get Started"><button>Get Started</button></a>
					  </div>
				</div>
			</div>
		</div>
		<div class="site-info">
			<div class="container">
				<?php get_sidebar('footer'); ?>
				
			</div><!-- .site-container -->
		</div><!-- .site-info -->
		
		<div class="site-info-text">
			<div class="container">
				<?php simplelin_child_footer_site_info(); ?>
			</div><!-- .site-container -->
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>


</body>
</html>