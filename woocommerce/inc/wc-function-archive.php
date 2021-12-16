<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// if( is_shop() ){
//     add_filter( 'loop_shop_per_page', create_function('$cols', 'return 9;'), 20);
// } else{
//  add_filter( 'loop_shop_per_page', create_function('$cols', 'return 12;'), 20); 
// }

add_filter( 'loop_shop_per_page', create_function('$cols', 'return 9;'), 20);




// my

//картинка для категорий на странице магазина

remove_action( 'woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail', 10 );
add_action( 'woocommerce_before_subcategory_title', 'img_category_shop_url', 8 );


function img_category_shop_url( $category ){
    $small_thumbnail_size = apply_filters( 'subcategory_archive_thumbnail_size', 'woocommerce_thumbnail' );
    $dimensions           = wc_get_image_size( $small_thumbnail_size );
    $thumbnail_id         = get_term_meta( $category->term_id, 'thumbnail_id', true );

    if ( $thumbnail_id ) {
        $image        = wp_get_attachment_image_src( $thumbnail_id, $small_thumbnail_size );
        $image        = $image[0];
        $image_srcset = function_exists( 'wp_get_attachment_image_srcset' ) ? wp_get_attachment_image_srcset( $thumbnail_id, $small_thumbnail_size ) : false;
        $image_sizes  = function_exists( 'wp_get_attachment_image_sizes' ) ? wp_get_attachment_image_sizes( $thumbnail_id, $small_thumbnail_size ) : false;
    } else {
        $image        = wc_placeholder_img_src();
        $image_srcset = false;
        $image_sizes  = false;
    }
    if ( $image ) {
        // Prevent esc_url from breaking spaces in urls for image embeds.
        // Ref: https://core.trac.wordpress.org/ticket/23605.
        $image = str_replace( ' ', '%20', $image );

        // Add responsive image markup if available.
        if ( $image_srcset && $image_sizes ) {
            // echo '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( $category->name ) . '" width="' . esc_attr( $dimensions['width'] ) . '" height="' . esc_attr( $dimensions['height'] ) . '" srcset="' . esc_attr( $image_srcset ) . '" sizes="' . esc_attr( $image_sizes ) . '" />';
            echo '<div class="categories__img" style="background-image: url('. esc_url( $image ) .')"></div>
            <div class="categories__name">' . esc_attr( $category->name ) . '</div>
            ';
        } else {
            echo '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( $category->name ) . '" width="' . esc_attr( $dimensions['width'] ) . '" height="' . esc_attr( $dimensions['height'] ) . '" />';

        }
    }
}


add_action( 'woocommerce_before_shop_loop_item', 'hausede_product_teaser_price_wrapper_start', 15 );
function hausede_product_teaser_price_wrapper_start(){
	?>
	<div class="product__present">
        <div class="product__top">
          <?php

      }
      add_action( 'woocommerce_before_shop_loop_item_title', 'akum_img_achive_product_s', 8 );
      function akum_img_achive_product_s(){
        ?>
        <div class="product__img">
            <?php 
        }
        add_action( 'woocommerce_before_shop_loop_item_title', 'akum_img_achive_product_e', 12 );
        function akum_img_achive_product_e(){
            ?>
        </div>

        <?php 
    }

    add_action( 'woocommerce_before_shop_loop_item_title', 'akum_title_achive_product', 15 );
    function akum_title_achive_product(){
        echo '<div class="product__name">' . get_the_title() . '</div>';
    }

    add_action( 'woocommerce_shop_loop_item_title', 'hausede_product_teaser_price_wrapper_end', 15 );

    function hausede_product_teaser_price_wrapper_end(){
      ?>
  </div>
  <div class="product__bottom">
      <?php woocommerce_template_single_meta();?>
      <div class="product__order">
        <?php woocommerce_template_loop_price(); ?>
        <div class="product__buy"><span>Заказать</span></div>
    </div>
</div>
</div>
<div class="product__add">
    <?php   global $product;
    akkum_wc_display_product_attributes_achive($product); ?>
</div>
<?php

}




add_action( 'woocommerce_archive_description', 'hausede_seo_wrapper_start', 5 );
function hausede_seo_wrapper_start(){
    ?>
</div>
<div class="article">
    <div class="container">
    <?php
}



add_action( 'woocommerce_archive_description', 'hausede_seo_wrapper_end', 15 );
function hausede_seo_wrapper_end(){
    ?>  
</div>
</div>
<?php
}





//remove_filter( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering',30);


remove_filter( 'woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title');





//Атрибуты таблицой для карточки товара
function akkum_wc_display_product_attributes_achive( $product ) {
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
        'single-product/product-attributes.php',
        array(
            'product_attributes' => $product_attributes,
            // Legacy params.
            'product'            => $product,
            'attributes'         => $attributes,
            'display_dimensions' => $display_dimensions,
        )
    );
}