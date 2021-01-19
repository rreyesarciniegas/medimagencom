<?php

if (!function_exists('mediclinic_mikado_woocommerce_products_per_page')) {
	/**
	 * Function that sets number of products per page. Default is 9
	 * @return int number of products to be shown per page
	 */
	function mediclinic_mikado_woocommerce_products_per_page() {

		$products_per_page = 12;

		if (mediclinic_mikado_options()->getOptionValue('mkdf_woo_products_per_page')) {
			$products_per_page = mediclinic_mikado_options()->getOptionValue('mkdf_woo_products_per_page');
		}
		if(isset($_GET['woo-products-count']) && $_GET['woo-products-count'] === 'view-all') {
			$products_per_page = 9999;
		}

		return $products_per_page;
	}
}

if (!function_exists('mediclinic_mikado_woocommerce_related_products_args')) {
	/**
	 * Function that sets number of displayed related products. Hooks to woocommerce_output_related_products_args filter
	 * @param $args array array of args for the query
	 * @return mixed array of changed args
	 */
	function mediclinic_mikado_woocommerce_related_products_args($args) {
		$related = mediclinic_mikado_options()->getOptionValue('mkdf_woo_product_list_columns');
		
		if (!empty($related)) {
			switch ($related) {
				case 'mkdf-woocommerce-columns-4':
					$args['posts_per_page'] = 4;
					break;
				case 'mkdf-woocommerce-columns-3':
					$args['posts_per_page'] = 3;
					break;
				default:
					$args['posts_per_page'] = 3;
			}
		} else {
			$args['posts_per_page'] = 3;
		}

		return $args;
	}
}

if (!function_exists('mediclinic_mikado_woocommerce_product_thumbnail_column_size')) {
	/**
	 * Function that sets number of thumbnails on single product page per row. Default is 4
	 * @return int number of thumbnails to be shown on single product page per row
	 */
	function mediclinic_mikado_woocommerce_product_thumbnail_column_size() {
		
		return apply_filters('mediclinic_mikado_number_of_thumbnails_per_row_single_product', 3);
	}
}

if (!function_exists('mediclinic_mikado_woocommerce_template_loop_product_title')) {
	/**
	 * Function for overriding product title template in Product List Loop
	 */
	function mediclinic_mikado_woocommerce_template_loop_product_title() {

		$tag = mediclinic_mikado_options()->getOptionValue('mkdf_products_list_title_tag');
		if($tag === '') {
			$tag = 'h5';
		}
		the_title('<' . $tag . ' class="mkdf-product-list-title"><a href="'.get_the_permalink().'">', '</a></' . $tag . '>');
	}
}

if (!function_exists('mediclinic_mikado_woocommerce_template_single_title')) {
	/**
	 * Function for overriding product title template in Single Product template
	 */
	function mediclinic_mikado_woocommerce_template_single_title() {

		$tag = mediclinic_mikado_options()->getOptionValue('mkdf_single_product_title_tag');
		if($tag === '') {
			$tag = 'h1';
		}
		the_title('<' . $tag . '  itemprop="name" class="mkdf-single-product-title">', '</' . $tag . '>');
	}
}

if (!function_exists('mediclinic_mikado_woocommerce_shop_loop_categories')) {
	/**
	 * Function that prints html with product categories
	 */
	function mediclinic_mikado_woocommerce_shop_loop_categories(){

		global $product;

		$html = '<div class="mkdf-product-list-categories">';
		$html .= wc_get_product_category_list( $product->get_id(), ', ' );
		$html .= '</div>';

		echo mediclinic_mikado_get_module_part( $html );
	}
}

if (!function_exists('mediclinic_mikado_woocommerce_sale_flash')) {
	/**
	 * Function for overriding Sale Flash Template
	 *
	 * @return string
	 */
	function mediclinic_mikado_woocommerce_sale_flash() {

		return '<span class="mkdf-onsale">' . esc_html__('SALE', 'mediclinic') . '</span>';
	}
}

if (!function_exists('mediclinic_mikado_woocommerce_product_out_of_stock')) {
	/**
	 * Function for adding Out Of Stock Template
	 *
	 * @return string
	 */
	function mediclinic_mikado_woocommerce_product_out_of_stock() {

		global $product;

		if (!$product->is_in_stock()) {
			print '<span class="mkdf-out-of-stock">' . esc_html__('OUT OF STOCK', 'mediclinic') . '</span>';
		}
	}
}

if (!function_exists('mediclinic_mikado_woocommerce_view_all_pagination')) {
	/**
	 * Function for adding New WooCommerce Pagination Template
	 *
	 * @return string
	 */
	function mediclinic_mikado_woocommerce_view_all_pagination() {
		global $wp_query;

		if ( $wp_query->max_num_pages <= 1 ) {
			return;
		}

		$html = '';

		if(get_option('woocommerce_shop_page_id')) {
			$html .= '<div class="mkdf-woo-view-all-pagination">';
			$html .= '<a href="'.get_permalink(get_option('woocommerce_shop_page_id')).'?woo-products-count=view-all">'.esc_html__('View All', 'mediclinic').'</a>';
			$html .= '</div>';
		}

		echo wp_kses_post($html);
	}
}

if (!function_exists('mediclinic_mikado_woo_view_all_pagination_additional_tag_before')) {
	function mediclinic_mikado_woo_view_all_pagination_additional_tag_before() {
		
		print '<div class="mkdf-woo-pagination-holder"><div class="mkdf-woo-pagination-inner">';
	}
}

if (!function_exists('mediclinic_mikado_woo_view_all_pagination_additional_tag_after')) {
	function mediclinic_mikado_woo_view_all_pagination_additional_tag_after() {

		print '</div></div>';
	}
}

if (!function_exists('mediclinic_mikado_single_product_content_additional_tag_before')) {
	function mediclinic_mikado_single_product_content_additional_tag_before() {

		print '<div class="mkdf-single-product-content">';
	}
}

if (!function_exists('mediclinic_mikado_single_product_content_additional_tag_after')) {
	function mediclinic_mikado_single_product_content_additional_tag_after() {

		print '</div>';
	}
}

if (!function_exists('mediclinic_mikado_single_product_summary_additional_tag_before')) {
	function mediclinic_mikado_single_product_summary_additional_tag_before() {

		print '<div class="mkdf-single-product-summary">';
	}
}

if (!function_exists('mediclinic_mikado_single_product_summary_additional_tag_after')) {
	function mediclinic_mikado_single_product_summary_additional_tag_after() {

		print '</div>';
	}
}

if (!function_exists('mediclinic_mikado_pl_holder_additional_tag_before')) {
	function mediclinic_mikado_pl_holder_additional_tag_before() {

		print '<div class="mkdf-pl-main-holder">';
	}
}

if (!function_exists('mediclinic_mikado_pl_holder_additional_tag_after')) {
	function mediclinic_mikado_pl_holder_additional_tag_after() {

		print '</div>';
	}
}

if (!function_exists('mediclinic_mikado_pl_inner_additional_tag_before')) {
	function mediclinic_mikado_pl_inner_additional_tag_before() {

		print '<div class="mkdf-pl-inner">';
	}
}

if (!function_exists('mediclinic_mikado_pl_inner_additional_tag_after')) {
	function mediclinic_mikado_pl_inner_additional_tag_after() {

		print '</div>';
	}
}

if (!function_exists('mediclinic_mikado_pl_image_additional_tag_before')) {
	function mediclinic_mikado_pl_image_additional_tag_before() {

		print '<div class="mkdf-pl-image">';
	}
}

if (!function_exists('mediclinic_mikado_pl_image_additional_tag_after')) {
	function mediclinic_mikado_pl_image_additional_tag_after() {

		print '</div>';
	}
}

if (!function_exists('mediclinic_mikado_pl_inner_text_additional_tag_before')) {
	function mediclinic_mikado_pl_inner_text_additional_tag_before() {

		print '<div class="mkdf-pl-text"><div class="mkdf-pl-text-outer"><div class="mkdf-pl-text-inner">';
	}
}

if (!function_exists('mediclinic_mikado_pl_inner_text_additional_tag_after')) {
	function mediclinic_mikado_pl_inner_text_additional_tag_after() {

		print '</div></div></div>';
	}
}

if (!function_exists('mediclinic_mikado_pl_text_wrapper_additional_tag_before')) {
	function mediclinic_mikado_pl_text_wrapper_additional_tag_before() {

		print '<div class="mkdf-pl-text-wrapper">';
	}
}

if (!function_exists('mediclinic_mikado_pl_text_wrapper_additional_tag_after')) {
	function mediclinic_mikado_pl_text_wrapper_additional_tag_after() {

		print '</div>';
	}
}

if (!function_exists('mediclinic_mikado_pl_rating_additional_tag_before')) {
	function mediclinic_mikado_pl_rating_additional_tag_before() {
		global $product;

		if ( get_option( 'woocommerce_enable_review_rating' ) !== 'no' ) {

			$rating_html = wc_get_rating_html( $product->get_average_rating() );

			if($rating_html !== '') {
				print '<div class="mkdf-pl-rating-holder">';
			}
		}
	}
}

if (!function_exists('mediclinic_mikado_pl_rating_additional_tag_after')) {
	function mediclinic_mikado_pl_rating_additional_tag_after() {
		global $product;

		if ( get_option( 'woocommerce_enable_review_rating' ) !== 'no' ) {

			$rating_html = wc_get_rating_html( $product->get_average_rating() );

			if($rating_html !== '') {
				print '</div>';
			}
		}
	}
}