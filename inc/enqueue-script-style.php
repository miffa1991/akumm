<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


function akumm_styles() {
	// wp_enqueue_style( 'slick-style', get_stylesheet_directory_uri() . '/assets/css/slick.css', array() , null, 'all');
	// wp_enqueue_style( 'formstyler-style', get_stylesheet_directory_uri() . '/assets/css/jquery.formstyler.css', array() , null, 'all');
	// wp_enqueue_style( 'fancybox-style', get_stylesheet_directory_uri() . '/assets/css/jquery.fancybox.min.css', array() , null, 'all');

	// wp_enqueue_style( 'roboto-style', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700|Roboto:100,300,400,500,700&amp;subset=cyrillic', array() , null, 'all');


	wp_enqueue_style( 'akumm-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'akumm_styles' );

function akumm_scripts() {

	
	// wp_deregister_script( 'jquery' );
	// wp_register_script( 'jquery', includes_url( 'js/jquery/jquery.js' ), 
	// 	false, null, true );
	wp_enqueue_script( 'jquery');
	//wp_enqueue_script( 'jquery-ui-core');
	
	// wp_enqueue_script( 'akumm-formstyler', get_template_directory_uri() . '/assets/js/jquery.formstyler.min.js', 'jquery', '20151215', true );
	// 	wp_enqueue_script( 'akumm-fancybox', get_template_directory_uri() . '/assets/js/jquery.fancybox.min.js', 'jquery', '20151215', true );
	// wp_enqueue_script( 'akumm-maskedinput', get_template_directory_uri() . '/assets/js/jquery.maskedinput.min.js', 'jquery', '20151215', true );
	
	if( is_shop() || is_product_taxonomy() ){
			wp_enqueue_script( 'akumm-range', get_template_directory_uri() . '/assets/js/ion.rangeSlider.min.js', array(), '20151215', true );
	}
	wp_enqueue_script( 'akumm-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'akumm-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/assets/js/slick.min.js', array(), null, true );
	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/js/main.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'akumm_scripts' );