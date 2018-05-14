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
			
			</div>
		</div>
		<div class="site-info">
			<div class="container">
				<?php get_sidebar('footer'); ?>
				
				

			</div><!-- .site-container -->
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>


</body>
</html>