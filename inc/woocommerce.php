<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package akumm
 */
function cedarworld_woocommerce_setup() {
	add_theme_support( 'woocommerce' );
	
}
add_action( 'after_setup_theme', 'cedarworld_woocommerce_setup' );

