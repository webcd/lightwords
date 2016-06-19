<?php

add_action( 'widgets_init', 'register_widget_areas' );

function register_widget_areas() {

  register_sidebar( array(
    'name' => 'Footer 1',
    'id' => 'footer1',
    'description' => 'The first footer widget zone',
    'before_widget' => '<article id="%1$s" class="widget %2$s">',
		'after_widget'  => '</article>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
  ));

  register_sidebar( array(
    'name' => 'Footer 2',
    'id' => 'footer2',
    'description' => 'The second footer widget zone',
    'before_widget' => '<article id="%1$s" class="widget %2$s">',
		'after_widget'  => '</article>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
  ));

  register_sidebar( array(
    'name' => 'Footer 3',
    'id' => 'footer3',
    'description' => 'The third footer widget zone',
    'before_widget' => '<article id="%1$s" class="widget %2$s">',
		'after_widget'  => '</article>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
  ));

  register_sidebar( array(
    'name' => 'Footer 4',
    'id' => 'footer4',
    'description' => 'The fourth footer widget zone',
    'before_widget' => '<article id="%1$s" class="widget %2$s">',
		'after_widget'  => '</article>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
  ));

  register_nav_menus( array(
	   'menu-top' => 'The top, secondary navbar',
  ) );
}
