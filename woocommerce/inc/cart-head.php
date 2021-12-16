<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}



//Вывод кратких данных из корзины


$currentlang = get_bloginfo('language');
if($currentlang=="ru-RU"){
	if ( ! function_exists( 'cart_link' ) ) {
		function cart_link() {
			?>
			<a class="cart-contents" href="/cart/" title="<?php _e( 'Перейти в корзину' ); ?>"><i class="icon-cart"></i><span class="num"><?php echo wp_sprintf (_n( '%d ', '%d ', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?></span></a> 
			<?php
		}
	}
//Ajax Обновление кратких данных из корзины
	add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

	function woocommerce_header_add_to_cart_fragment( $fragments ) {
		ob_start();
		?>
		<a class="cart-contents" href="/cart/" title="<?php _e( 'Перейти в корзину' ); ?>"><i class="icon-cart"></i><span class="num"><?php echo wp_sprintf (_n( '%d ', '%d ', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?></span></a> 
		<?php
		$fragments['a.cart-contents'] = ob_get_clean();
		return $fragments;
	}
}
elseif($currentlang=="en-GB"){
	if ( ! function_exists( 'cart_link' ) ) {
		function cart_link() {
			?>
			<a class="cart-contents" href="/cart-en/" title="<?php _e( 'Go to cart' ); ?>"><i class="icon-cart"></i><span class="num"><?php echo wp_sprintf (_n( '%d ', '%d ', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?></span></a> 
			<?php
		}
	}
//Ajax Обновление кратких данных из корзины
	add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

	function woocommerce_header_add_to_cart_fragment( $fragments ) {
		ob_start();
		?>
		<a class="cart-contents" href="/cart-en/" title="<?php _e( 'Go to cart' ); ?>"><i class="icon-cart"></i><span class="num"><?php echo wp_sprintf (_n( '%d ', '%d ', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?></span></a> 
		<?php
		$fragments['a.cart-contents'] = ob_get_clean();
		return $fragments;
	}

}





