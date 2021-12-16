<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10); 
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10); 
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20); 
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5); //удаляем заголовок товора с карточки товара
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20); //удаляем краткое описание товора с карточки товара
//remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10); //удаляем цену товора с карточки товара

//remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);  // удаляем кнопку "в корзину" с карточки товара
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);  // удаляем "распродажа" с картинки в карточке товара


remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 ); // убираем категорию
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 ); // убираем цену на странице магазина

add_action( 'after_setup_theme', 'bbloomer_remove_zoom_lightbox_theme_support', 99 );

function bbloomer_remove_zoom_lightbox_theme_support() {
	remove_theme_support( 'wc-product-gallery-zoom' );// удаляем зум с галерии карточка товара
	 remove_theme_support( 'wc-product-gallery-lightbox' );
	 remove_theme_support( 'wc-product-gallery-slider' );
}

// remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
// remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
 remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );





