<?php
/**
 * Product quantity inputs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/quantity-input.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 4.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( $max_value && $min_value === $max_value ) {
	?>
	<div class="quantity hidden">
		<input type="hidden" id="<?php echo esc_attr( $input_id ); ?>" class="qty" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $min_value ); ?>" />
	</div>
	<?php
} else {
	/* translators: %s: Quantity. */
	$labelledby = ! empty( $args['product_name'] ) ? sprintf( __( '%s quantity', 'mediclinic' ), strip_tags( $args['product_name'] ) ) : '';
	?>
	<div class="quantity mkdf-quantity-buttons">
		<span class="mkdf-quantity-minus icon_minus-06"></span>
		<input 
			type="text" 
			id="<?php echo esc_attr( $input_id ); ?>"
			data-step="<?php echo esc_attr( $step ); ?>" 
			data-min="<?php echo esc_attr( $min_value ); ?>" 
			data-max="<?php echo esc_attr( $max_value ); ?>" 
			name="<?php echo esc_attr( $input_name ); ?>" 
			value="<?php echo esc_attr( $input_value ); ?>" 
			title="<?php echo esc_attr_x( 'Qty', 'Product quantity input tooltip', 'mediclinic' ) ?>" 
			class="<?php echo esc_attr( join( ' ', (array) $classes ) ); ?> mkdf-quantity-input"
			size="4"
            placeholder="<?php echo esc_attr( $placeholder ); ?>"
			pattern="<?php echo esc_attr( $pattern ); ?>" 
			inputmode="<?php echo esc_attr( $inputmode ); ?>" 
			aria-labelledby="<?php echo esc_attr( $labelledby ); ?>" />
		<span class="mkdf-quantity-plus icon_plus"></span>
	</div>
	<?php
} ?>