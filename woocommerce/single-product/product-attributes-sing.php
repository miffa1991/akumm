	<table class="table-zebra" cellpadding="0" cellspacing="0">
		<?php foreach ( $product_attributes as $product_attribute_key => $product_attribute ) : ?>
			<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--<?php echo esc_attr( $product_attribute_key ); ?>">
				<td class="woocommerce-product-attributes-item__label"><?php echo wp_kses_post( $product_attribute['label'] ); ?></td>
				<td class="woocommerce-product-attributes-item__value"><?php echo wp_kses_post( $product_attribute['value'] ); ?></td>
			</tr>
		<?php endforeach; ?>
	</table>