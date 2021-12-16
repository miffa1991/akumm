<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
/*
 * Wrappers single product
 */


add_action('woocommerce_before_single_product_summary', 'woocommerce_template_single_title', 5);//добавляем заголовок в карточке товара

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 8 ); //артикул

add_action( 'woocommerce_single_product_summary', 'akkum_prod__order_start', 9 ); //
function akkum_prod__order_start(){
	?>
	<div class="prod__order">
		<?php 
	}

add_action( 'woocommerce_single_product_summary', 'akkum_prod__order_end', 45 ); //
function akkum_prod__order_end(){
	?>
</div>
<?php 
}



add_action( 'woocommerce_before_single_product_summary', 'hausede_b_info_wrapper_start', 6 );
function hausede_b_info_wrapper_start(){
	?>

	<div class="prod">

		<?php
	}

	add_action( 'woocommerce_before_single_product_summary', 'hausede_col1_wrapper_start', 7 );
	function hausede_col1_wrapper_start(){
		?>

		<div class="prod__img">

			<?php
		}



		add_action( 'woocommerce_before_single_product_summary', 'hausede_col1_wrapper_end', 22 );
		function hausede_col1_wrapper_end(){
			?>

		</div>

		<?php
	}

	add_action( 'woocommerce_single_product_summary', 'hausede_col2_wrapper_start', 7 );
	function hausede_col2_wrapper_start(){
		?>

		<div class="prod__info">

			<?php

		}

		add_action( 'woocommerce_single_product_summary', 'my_wc_display_product_attributes', 50 );
		function my_wc_display_product_attributes($product){
			?>
			<div class="prod__props">
				<div class="h h_4">Основные характеристики</div>
				<?php 
				global $product;
				akkum_wc_display_product_attributes($product);

				?>
			</div>
			<?php 

		}
		add_action( 'woocommerce_after_single_product_summary', 'hausede_col2_wrapper_end', 7);
		function hausede_col2_wrapper_end(){
			?>

		</div>

		<?php
	}

	add_action( 'woocommerce_after_single_product_summary', 'hausede_cols_wrapper_end', 8 );
	function hausede_cols_wrapper_end(){
		?>

	</div>

	<?php
}





add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 40); //добавляем краткое описание в карточку товара



add_filter( 'woocommerce_short_description', 'estore_short_description', 10 );
function estore_short_description($content){
	?>
	<div class="description">
		<?php echo $content;?>
	</div>
	<?php
}

/*
 * Tabs single product
 */


add_filter('woocommerce_product_tabs','change_tabs');
function change_tabs($tabs){


    //удаление вкладки "дополнительная информация"
	unset($tabs['additional_information']);

    //изменение названия вкладки отзывы
	unset($tabs['reviews']);


    //удаление содержимого вкладки "описание"



	$currentlang = get_bloginfo('language');
	if($currentlang=="ru-RU"){
		$tabs['description']['title'] = 'Описание';
	}
	else{
		$tabs['description']['title'] = 'Опис';
	}
	return $tabs;
};



add_filter( 'woocommerce_product_additional_information_heading', 'estore_heading_tab_desc_remove' );
add_filter( 'woocommerce_product_description_heading', 'estore_heading_tab_desc_remove' );
function estore_heading_tab_desc_remove($header){
	$header = false;
	return $header;
}







add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
function jk_related_products_args( $args ) {

$args['posts_per_page'] = 4; // количество "Похожих товаров"
 $args['columns'] = 4; // количество колонок
 return $args;
}






add_filter( 'add_to_cart_text', 'woo_custom_single_add_to_cart_text' );                // меняем надпись в корзину
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_single_add_to_cart_text' );  // меняем надпись в корзину в карточке товара

function woo_custom_single_add_to_cart_text() {
	$currentlang = get_bloginfo('language');
	if($currentlang=="ru-RU"):
		return __( 'Заказать', 'woocommerce' );
	else: 
		return __( 'Заказати', 'woocommerce' );
	endif;


}



add_filter( 'add_to_cart_text', 'woo_custom_product_add_to_cart_text' );            // < 2.1
add_filter( 'woocommerce_product_add_to_cart_text', 'woo_custom_product_add_to_cart_text' );  // меняем надпись в корзину в архивах

function woo_custom_product_add_to_cart_text() {

	$currentlang = get_bloginfo('language');
	if($currentlang=="ru-RU"):
		return __( 'Заказать', 'woocommerce' );
	else: 
		return __( 'Заказати', 'woocommerce' );
	endif;
	

}

// Меняем сивол валюты на "грн"
add_filter( 'woocommerce_currencies', 'add_my_currency' );

function add_my_currency( $currencies ) {

	$currencies['UAH'] = __( 'Українська гривня', 'woocommerce' );

	return $currencies;

}

add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);

function add_my_currency_symbol( $currency_symbol, $currency ) {

	switch( $currency ) {

		case 'UAH': $currency_symbol = 'грн'; break;

	}

	return $currency_symbol;

}

//Атрибуты таблицой для карточки товара
function akkum_wc_display_product_attributes( $product ) {
	$product_attributes = array();

	// Display weight and dimensions before attribute list.
	$display_dimensions = apply_filters( 'wc_product_enable_dimensions_display', $product->has_weight() || $product->has_dimensions() );

	if ( $display_dimensions && $product->has_weight() ) {
		$product_attributes['weight'] = array(
			'label' => __( 'Weight', 'woocommerce' ),
			'value' => wc_format_weight( $product->get_weight() ),
		);
	}

	if ( $display_dimensions && $product->has_dimensions() ) {
		$product_attributes['dimensions'] = array(
			'label' => __( 'Dimensions', 'woocommerce' ),
			'value' => wc_format_dimensions( $product->get_dimensions( false ) ),
		);
	}

	// Add product attributes to list.
	$attributes = array_filter( $product->get_attributes(), 'wc_attributes_array_filter_visible' );

	foreach ( $attributes as $attribute ) {
		$values = array();

		if ( $attribute->is_taxonomy() ) {
			$attribute_taxonomy = $attribute->get_taxonomy_object();
			$attribute_values   = wc_get_product_terms( $product->get_id(), $attribute->get_name(), array( 'fields' => 'all' ) );

			foreach ( $attribute_values as $attribute_value ) {
				$value_name = esc_html( $attribute_value->name );

				if ( $attribute_taxonomy->attribute_public ) {
					$values[] =  $value_name;
				} else {
					$values[] = $value_name;
				}
			}
		} else {
			$values = $attribute->get_options();

			foreach ( $values as &$value ) {
				$value = make_clickable( esc_html( $value ) );
			}
		}

		$product_attributes[ 'attribute_' . sanitize_title_with_dashes( $attribute->get_name() ) ] = array(
			'label' => wc_attribute_label( $attribute->get_name() ),
			'value' => apply_filters( 'woocommerce_attribute', wpautop( wptexturize( implode( ', ', $values ) ) ), $attribute, $values ),
		);
	}

	/**
	 * Hook: woocommerce_display_product_attributes.
	 *
	 * @since 3.6.0.
	 * @param array $product_attributes Array of atributes to display; label, value.
	 * @param WC_Product $product Showing attributes for this product.
	 */
	$product_attributes = apply_filters( 'woocommerce_display_product_attributes', $product_attributes, $product );

	wc_get_template(
		'single-product/product-attributes-sing.php',
		array(
			'product_attributes' => $product_attributes,
			// Legacy params.
			'product'            => $product,
			'attributes'         => $attributes,
			'display_dimensions' => $display_dimensions,
		)
	);
}