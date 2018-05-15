<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Simplelin
 */

if ( ! is_active_sidebar( 'sidebar-2' ) || ! is_active_sidebar( 'sidebar-3' ) || ! is_active_sidebar( 'sidebar-4' )) {
	
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-2' ); ?>
</div><!-- #secondary -->

<div id="secondary" class="widget-area-link" role="complementary">
	<?php dynamic_sidebar( 'sidebar-3' ); ?>
</div><!-- #secondary -->

<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-4' ); ?>
</div><!-- #secondary -->

