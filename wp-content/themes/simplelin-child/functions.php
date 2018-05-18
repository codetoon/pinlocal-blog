<?php

add_action( 'wp_enqueue_scripts', 'simplelin_pinlocal_enqueue_parent_styles' );
function simplelin_pinlocal_enqueue_parent_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}


/**
 * Register widget area.
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
    'name'          => esc_html__( 'Sidebar Footer Link', 'simplelin-pinlocal'),
    'id'            => 'sidebar-3',
    'description'   => esc_html__( 'Add widgets here.', 'simplelin-pinlocal' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
  
  register_sidebar( array(
    'name'          => esc_html__( 'Sidebar Footer List', 'simplelin-pinlocal'),
    'id'            => 'sidebar-4',
    'description'   => esc_html__( 'Add widgets here.', 'simplelin-pinlocal' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
  
  
}

add_action( 'widgets_init', 'simplelin_pinlocal_widgets_init' );


function simplelin_child_footer_site_info() {
	
	$tc_link = '<a href="' . 'http://pinlocal.com/terms.html' . '" target="_blank" title="' . esc_attr__( 'Theme for WordPress', 'simplelin_child' ) .'">' . __( 'Tearms & Conditions', 'Tearms & Conditions' ) . '</a>';
	
	$cd_link = '<a href="' . 'http://pinlocal.com/privacy.html' . '" target="_blank" title="' . esc_attr__( 'Theme for WordPress', 'simplelin_child' ) .'">' . __( 'Privacy Policy', 'Privacy Policy' ) . '</a>';

	$tg_link = '<a href="' . 'http://pinlocal.com/affiliates.html' . '" target="_blank" rel="designer">' . __( 'Affiliates', 'simplelin_child' ) . '</a>';

	$default_footer_value = '<div class="credit">' . sprintf($tc_link) . '&nbsp;.&nbsp;' . sprintf($cd_link ) . '&nbsp;.&nbsp;'  . sprintf($tg_link ) . '</div><div class="copyright">' . sprintf( __( 'Copyright &copy; %1$s %2$s', 'simplelin_child' ), date( 'Y' ),'Pinlocal') . '</div>';

	echo $default_footer_value;
}


add_filter( 'get_custom_logo', 'child_custom_logo' );
function child_custom_logo() {
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $html = sprintf( '<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>',
            esc_url( 'http://pinlocal.com/' ),
            wp_get_attachment_image( $custom_logo_id, 'full', false, array(
                'class'    => 'custom-logo',
            ) )
        );
    return $html;   
} 



?>