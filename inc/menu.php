<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

		// This theme uses wp_nav_menu() in one location.

register_nav_menus( array(
	'menu-1' => esc_html__( 'Главное меню', 'akumm' ),
	'menu-mob' => esc_html__( 'Главное меню на мобильном', 'akumm' ),
	'menu-category' => esc_html__( 'Меню категорий', 'akumm' ),
	'menu-brend' => esc_html__( 'Меню брендов, на странице брендов', 'akumm' ),
	'menu-brend-home' => esc_html__( 'Меню брендов, на главной странице брендов', 'akumm' ),
	'menu-foot-1' => esc_html__( 'Подвал 1 колонка', 'akumm' ),
	'menu-foot-2' => esc_html__( 'Подвал 2 колонка', 'akumm' ),
	'menu-lang' => esc_html__( 'Языковое меню', 'akumm' ),
	
) );





// Изменяет основные параметры меню
add_filter( 'wp_nav_menu_args', 'filter_wp_menu_args' );
function filter_wp_menu_args( $args ) {
	if ( $args['theme_location'] === 'menu-1' ) {
		$args['container']  = false;
		$args['items_wrap'] = '<ul class="%2$s">%3$s</ul>';
		$args['menu_class'] = 'header__nav';
	}
	if ( $args['theme_location'] === 'menu-mob' ) {
		$args['container']  = false;
		$args['items_wrap'] = '<ul class="%2$s">%3$s</ul>';
		$args['menu_class'] = 'mobmenu__menu';
	}
	if ( $args['theme_location'] === 'menu-category' ) {
		$args['container']  = false;
		$args['items_wrap'] = '<div class="%2$s">%3$s</div>';
		$args['menu_class'] = 'selcats';
	}
	
	if ( $args['theme_location'] === 'menu-brend' ) {
		$args['container']  = false;
		$args['items_wrap'] = '<div class="%2$s">%3$s</div>';
		$args['menu_class'] = 'allbrands';
	}
	if ( $args['theme_location'] === 'menu-brend-home' ) {
		$args['container']  = false;
		$args['items_wrap'] = '<div class="%2$s">%3$s</div>';
		$args['menu_class'] = 'slider-brands';
	}
	if ( $args['theme_location'] === 'menu-foot-1' || $args['theme_location'] === 'menu-foot-2' ) {
		$args['container']  = false;
		$args['items_wrap'] = '<ul class="%2$s">%3$s</ul>';
		$args['menu_class'] = 'footer__navlist';
	}
	
	return $args;
}
// //Добавляем класс елементу а
// 	function add_class_to_all_menu_anchors( $atts ) {
// 			$atts['class'] = 'ssss';

// 			return $atts;
// 		}
// 		add_filter( 'nav_menu_link_attributes', 'add_class_to_all_menu_anchors', 10 );

//обавляем класс елементу li
// add_filter( 'nav_menu_css_class', 'change_menu_item_css_classes', 10, 4 );
// function change_menu_item_css_classes( $classes, $item, $args, $depth ) {
// 	if( $args->theme_location === 'menu-1' && $depth === 0 ){ // li первого уровня
// 		$classes[] = 'nav__item';
// 	}
// 	if ( $args->theme_location === 'menu-1' && $depth === 1 ){ // li для подменю
// 		$classes[] = 'nav__submenu-item';
// 	}

// 	return $classes;
// }


add_filter( 'nav_menu_submenu_css_class', 'change_wp_nav_menu', 10, 3 );

// // 2 вариант - только у меню, прикрепленное к области меню header-menu
function change_wp_nav_menu( $classes, $args, $depth ) {

	if ( $args->theme_location == 'menu-1' ) {
		$classes[] = 'header__subnav';

	}
	if ( $args->theme_location == 'menu-mob' ) {
		$classes[] = 'mobmenu__sub';

	}
	if ( $args->theme_location == 'menu-foot-1' || $args->theme_location == 'menu-foot-2' ) {
		$classes[] = 'footer__submenu';

	}
	return $classes;
}



class True_Walker_Nav_Menu extends Walker_Nav_Menu {


	function start_el(&$output, $item, $depth, $args) {
		global $wp_query;           
		/*
		 * Некоторые из параметров объекта $item
		 * ID - ID самого элемента меню, а не объекта на который он ссылается
		 * menu_item_parent - ID родительского элемента меню
		 * classes - массив классов элемента меню
		 * post_date - дата добавления
		 * post_modified - дата последнего изменения
		 * post_author - ID пользователя, добавившего этот элемент меню
		 * title - заголовок элемента меню
		 * url - ссылка
		 * attr_title - HTML-атрибут title ссылки
		 * xfn - атрибут rel
		 * target - атрибут target
		 * current - равен 1, если является текущим элементом
		 * current_item_ancestor - равен 1, если текущим (открытым на сайте) является вложенный элемент данного
		 * current_item_parent - равен 1, если текущим (открытым на сайте) является родительский элемент данного
		 * menu_order - порядок в меню
		 * object_id - ID объекта меню
		 * type - тип объекта меню (таксономия, пост, произвольно)
		 * object - какая это таксономия / какой тип поста (page /category / post_tag и т д)
		 * type_label - название данного типа с локализацией (Рубрика, Страница)
		 * post_parent - ID родительского поста / категории
		 * post_title - заголовок, который был у поста, когда он был добавлен в меню
		 * post_name - ярлык, который был у поста при его добавлении в меню
		 */
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		/*
		 * Генерируем строку с CSS-классами элемента меню
		 */
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;


		$image = get_field('img_brend', $item);
		/*
		 * Генерируем элемент меню
		 */
		$output .= $indent ;

		// атрибуты элемента, title="", rel="", target="" и href=""
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		// ссылка и околоссылочный текст
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>
		<div class="allbrands__img"><img src="' . $image .'" /></div><div class="allbrands__name">';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . '</div>' . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;
		

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

	}
}


class True_Walker_Nav_Menu_Home extends Walker_Nav_Menu {


	function start_el(&$output, $item, $depth, $args) {
		global $wp_query;           

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		/*
		 * Генерируем строку с CSS-классами элемента меню
		 */
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;


		$image = get_field('img_brend', $item);
		/*
		 * Генерируем элемент меню
		 */
		$output .= $indent ;

		// атрибуты элемента, title="", rel="", target="" и href=""
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		// ссылка и околоссылочный текст
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>
		<div class="slider-brands__brand"><img src="' . $image .'" /></div>';
		// $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . '</div>' . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;
		

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

	}
}


class True_Walker_Nav_Menu_Cat_Product extends Walker_Nav_Menu {


	function start_el(&$output, $item, $depth, $args) {
		global $wp_query;           

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		/*
		 * Генерируем строку с CSS-классами элемента меню
		 */
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

	// функция join превращает массив в строку
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';



		/*
		 * Генерируем элемент меню
		 */
		$output .= $indent ;

		// атрибуты элемента, title="", rel="", target="" и href=""
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		//$attributes['aria-current'] .= $item->current ? 'page' : '';
		// ссылка и околоссылочный текст
		$item_output = $args->before;
		$item_output .= '<a'. $attributes . $class_names .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;
		

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

	}
}