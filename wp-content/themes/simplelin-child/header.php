<?php
/**
 * The header for our theme
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Simplelin
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo ( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg/sfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>> 

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'simplelin' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<div class="container">
		
			<div class="site-branding">

				<?php if ( has_custom_logo() ) : ?>
					<div class="site-logo">
						<?php the_custom_logo(); ?>
					</div><!-- .site-logo -->
				<?php endif; ?>

				<div class="title-area">
					<?php
						if ( is_front_page() && is_home() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
					<?php endif; ?>
				</div><!-- .title-area -->
				
				<div class="button-area">
					<a href="http://pinlocal.com/register/leadcategories" title="Get Started"><button>Join PinLocal</button></a>
					<a href="tel://+4402035149004" title="Get Started"><button class="contact"><i class="fa fa-phone"></i><span class="small">Call</span> 0203 514 9004</button></a>
				</div><!--- button-area -->

			</div><!-- .site-branding -->

		</div><!-- .container -->

	</header><!-- #masthead -->
			
	<div id="content" class="site-content container clearfix">