<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

add_action( 'widgets_init', 'akumnn_widgets_init' );
function akumnn_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Телефон в шапке', 'akumnn' ),
		'id'            => 'sidebar-header-phone',
		'description'   => esc_html__( 'Add widgets here.', 'akumnn' ),
		'before_widget' => '<div id="%1$s" class="h_phone %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="title">',
		'after_title'   => '</div>',

	) );
	// 	register_sidebar( array(
	// 	'name'          => esc_html__( 'Переключатель языков', 'akumnn' ),
	// 	'id'            => 'sidebar-header-lang',
	// 	'description'   => esc_html__( 'Add widgets here.', 'akumnn' ),
	// 	'before_widget' => '<div id="%1$s" class="h_phone %2$s">',
	// 	'after_widget'  => '</div>',
	// 	'before_title'  => '<div class="title">',
	// 	'after_title'   => '</div>',

	// ) );
	register_sidebar( array(
		'name'          => esc_html__( 'Поиск в шапке', 'akumnn' ),
		'id'            => 'sidebar-search',
		'description'   => esc_html__( 'Add widgets here.', 'akumnn' ),
		'before_widget' => '<div id="%1$s" class="widget widget-search %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="title2">',
		'after_title'   => '</div>',
	) );
		register_sidebar( array(
		'name'          => esc_html__( 'Фильтра', 'akumnn' ),
		'id'            => 'sidebar-filters',
		'description'   => esc_html__( 'Add widgets here.', 'akumnn' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<div class="drop-list__title"><span>',
		'after_title'   => '</span><svg class="icon_arrow-down" xmlns="http://www.w3.org/2000/svg">
                                <use xlink:href="#icon_arrow-down"></use>
                            </svg></div>',
	) );
			register_sidebar( array(
		'name'          => esc_html__( 'Телефоны и адреса в подвале', 'akumnn' ),
		'id'            => 'sidebar-phone-footer',
		'description'   => esc_html__( 'Add widgets here.', 'akumnn' ),
		'before_widget' => '<div id="%1$s" class=" %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',

	) );

}
