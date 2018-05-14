<?php

add_action( 'wp_enqueue_scripts', 'simplelin_pinlocal_enqueue_parent_styles' );
function simplelin_pinlocal_enqueue_parent_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.or/themes/functionality/sidebars/#registering-a-sidebar
 */
function simplelin_pinlocal_widgets_init() {
	

  register_sidebar( array(
    'name'          => esc_html__( 'Sidebar Footer Text', 'simplelin-pinlocal'),
    'id'            => 'sidebar-2',
    'description'   => esc_html__( 'Add widgets here.', 'simplelin-pinlocal' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
  
   register_sidebar( array(
    'name'          => esc_html__( 'Sidebar Footer Menu', 'simplelin-pinlocal'),
    'id'            => 'sidebar-3',
    'description'   => esc_html__( 'Add widgets here.', 'simplelin-pinlocal' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
}

add_action( 'widgets_init', 'simplelin_pinlocal_widgets_init' );
?>