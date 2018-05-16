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
				<div class="title-area">
					<?php
						if ( is_front_page() && is_home() ) : ?>
							<h1 class="site-title"><a href="http://pinlocal.com/" rel="home"><img src="<?php echo esc_url( home_url( '/' ) );?>wp-content/themes/simplelin-child/images/pinlocal_logo.png" alt="images"></a></h1>
					
					
					<?php endif; ?>
				</div><!-- .title-area -->
				
				<div class="button-area">
					<a href="http://pinlocal.com/register/leadcategories" title="Get Started"><button>Join PinLocal</button></a>
					<a href="tel://+4402035149004" title="Get Started"><button class="contact"><i class="fa fa-phone"></i><span class="small">Call</span> 0203 514 9004</button></a>
				</div><!--- button-area -->

			</div><!-- .site-branding -->

		</div><!-- .container -->

		<nav id="site-navigation" class="main-navigation" role="navigation">

			<?php if ( has_nav_menu( 'primary') ) { ?>
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'simplelin' ); ?></button>
				<?php
					wp_nav_menu( array(
						'container'      => '',
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
					) );
			} else { ?>
					
				<ul id="primary-menu" class="sf-menu">
					<?php if ( current_user_can( 'edit_theme_options' ) ) { ?>
						<li class="menu-item"><?php printf( __( '<a href="%s">Add menu</a>', 'simplelin' ), esc_url( admin_url( 'nav-menus.php' ) ) ); ?></li>
					<?php } ?>
				</ul><!-- #primary-menu -->

			<?php } ?>

		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->
			
	<div id="content" class="site-content container clearfix">