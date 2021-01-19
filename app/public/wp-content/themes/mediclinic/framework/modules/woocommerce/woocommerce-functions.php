<?php
/**
 * Woocommerce helper functions
 */

if(!function_exists('mediclinic_mikado_woocommerce_meta_box_functions')) {
	function mediclinic_mikado_woocommerce_meta_box_functions($post_types) {
		$post_types[] = 'product';
		
		return $post_types;
	}
	
	add_filter('mediclinic_mikado_meta_box_post_types_save', 'mediclinic_mikado_woocommerce_meta_box_functions');
}

if(!function_exists('mediclinic_mikado_get_woo_shortcode_module_template_part')) {
	/**
	 * Loads module template part.
	 *
	 * @param string $template name of the template to load
	 * @param string $module name of the module folder
	 * @param string $slug
	 * @param array $params array of parameters to pass to template
	 *
	 * @return html
	 * @see mediclinic_mikado_get_template_part()
	 */
	function mediclinic_mikado_get_woo_shortcode_module_template_part($template, $module, $slug = '', $params = array()) {
		
		//HTML Content from template
		$html          = '';
		$template_path = 'framework/modules/woocommerce/shortcodes/'.$module;
		
		$temp = $template_path.'/'.$template;
		
		if(is_array($params) && count($params)) {
			extract($params);
		}
		
		$templates = array();
		
		if($temp !== '') {
			if($slug !== '') {
				$templates[] = "{$temp}-{$slug}.php";
			}
			
			$templates[] = $temp.'.php';
		}
		$located = mediclinic_mikado_find_template_path($templates);
		if($located) {
			ob_start();
			include($located);
			$html = ob_get_clean();
		}
		
		return $html;
	}
}

if(!function_exists('mediclinic_mikado_disable_woocommerce_pretty_photo')) {
    /**
     * Function that disable WooCommerce pretty photo script and style
     */
    function mediclinic_mikado_disable_woocommerce_pretty_photo() {
        //is woocommerce installed?
        if(mediclinic_mikado_is_woocommerce_installed()) {
            if(mediclinic_mikado_load_woo_assets()) {

                wp_deregister_style('woocommerce_prettyPhoto_css');
            }
        }
    }

    add_action('wp_enqueue_scripts', 'mediclinic_mikado_disable_woocommerce_pretty_photo');
}

if (!function_exists('mediclinic_mikado_woocommerce_body_class')) {
	/**
	 * Function that adds class on body for Woocommerce
	 *
	 * @param $classes
	 * @return array
	 */
	function mediclinic_mikado_woocommerce_body_class( $classes ) {
		if(mediclinic_mikado_is_woocommerce_page()) {
			$classes[] = 'mkdf-woocommerce-page';

			if(function_exists('is_shop') && is_shop()) {
				$classes[] = 'mkdf-woo-main-page';
			}

			if (is_singular('product')) {
				$classes[] = 'mkdf-woo-single-page';
			}
		}
		
		return $classes;
	}

	add_filter('body_class', 'mediclinic_mikado_woocommerce_body_class');
}

if(!function_exists('mediclinic_mikado_woocommerce_columns_class')) {
	/**
	 * Function that adds number of columns class to header tag
	 *
	 * @param array array of classes from main filter
	 *
	 * @return array array of classes with added woocommerce class
	 */
	function mediclinic_mikado_woocommerce_columns_class($classes) {
		if(mediclinic_mikado_is_woocommerce_installed()) {
			$products_list_number = mediclinic_mikado_options()->getOptionValue('mkdf_woo_product_list_columns');
			
			$classes[] = $products_list_number;
		}

		return $classes;
	}

	add_filter('body_class', 'mediclinic_mikado_woocommerce_columns_class');
}

if(!function_exists('mediclinic_mikado_woocommerce_columns_space_class')) {
	/**
	 * Function that adds space between columns class to header tag
	 *
	 * @param array array of classes from main filter
	 *
	 * @return array array of classes with added woocommerce class
	 */
	function mediclinic_mikado_woocommerce_columns_space_class($classes) {
		if(mediclinic_mikado_is_woocommerce_installed()) {
			$columns_space = mediclinic_mikado_options()->getOptionValue('mkdf_woo_product_list_columns_space');
			
			$classes[] = $columns_space;
		}
		
		return $classes;
	}
	
	add_filter('body_class', 'mediclinic_mikado_woocommerce_columns_space_class');
}

if(!function_exists('mediclinic_mikado_woocommerce_pl_info_position_class')) {
	/**
	 * Function that adds product list info position class to header tag
	 *
	 * @param array array of classes from main filter
	 *
	 * @return array array of classes with added woocommerce class
	 */
	function mediclinic_mikado_woocommerce_pl_info_position_class($classes) {
		if(mediclinic_mikado_is_woocommerce_installed()) {
			$info_position_class = 'info_below_image';
			
			$classes[] = $info_position_class;
		}
		
		return $classes;
	}
	
	add_filter('body_class', 'mediclinic_mikado_woocommerce_pl_info_position_class');
}

if(!function_exists('mediclinic_mikado_is_woocommerce_page')) {
	/**
	 * Function that checks if current page is woocommerce shop, product or product taxonomy
	 * @return bool
	 *
	 * @see is_woocommerce()
	 */
	function mediclinic_mikado_is_woocommerce_page() {
		if (function_exists('is_woocommerce') && is_woocommerce()) {
			return is_woocommerce();
		} elseif (function_exists('is_cart') && is_cart()) {
			return is_cart();
		} elseif (function_exists('is_checkout') && is_checkout()) {
			return is_checkout();
		} elseif (function_exists('is_account_page') && is_account_page()) {
			return is_account_page();
		}
	}
}

if(!function_exists('mediclinic_mikado_is_woocommerce_shop')) {
	/**
	 * Function that checks if current page is shop or product page
	 * @return bool
	 *
	 * @see is_shop()
	 */
	function mediclinic_mikado_is_woocommerce_shop() {
		return function_exists('is_shop') && (is_shop() || is_product());
	}
}

if(!function_exists('mediclinic_mikado_get_woo_shop_page_id')) {
	/**
	 * Function that returns shop page id that is set in WooCommerce settings page
	 * @return int id of shop page
	 */
	function mediclinic_mikado_get_woo_shop_page_id() {
		if(mediclinic_mikado_is_woocommerce_installed()) {
			//get shop page id from options table
			$shop_id = get_option('woocommerce_shop_page_id');
			
			if (!empty($shop_id)) {
				$page_id = $shop_id;
			} else {
				$page_id = '-1';
			}
			
			return $page_id;
		}
	}
}

if(!function_exists('mediclinic_mikado_is_product_category')) {
	function mediclinic_mikado_is_product_category() {
		return function_exists('is_product_category') && is_product_category();
	}
}

if(!function_exists('mediclinic_mikado_is_product_tag')) {
	function mediclinic_mikado_is_product_tag() {
		return function_exists('is_product_tag') && is_product_tag();
	}
}

if(!function_exists('mediclinic_mikado_load_woo_assets')) {
	/**
	 * Function that checks whether WooCommerce assets needs to be loaded.
	 *
	 * @see mediclinic_mikado_is_woocommerce_page()
	 * @see mediclinic_mikado_has_woocommerce_shortcode()
	 * @see mediclinic_mikado_has_woocommerce_widgets()
	 * @return bool
	 */

	function mediclinic_mikado_load_woo_assets() {
		return mediclinic_mikado_is_woocommerce_installed() && (mediclinic_mikado_is_woocommerce_page() || mediclinic_mikado_has_woocommerce_shortcode() || mediclinic_mikado_has_woocommerce_widgets());
	}
}

if(!function_exists('mediclinic_mikado_return_woocommerce_global_variable')) {
	function mediclinic_mikado_return_woocommerce_global_variable() {
		if(mediclinic_mikado_is_woocommerce_installed()) {
			global $product;

			return $product;
		}
	}
}

if(!function_exists('mediclinic_mikado_has_woocommerce_shortcode')) {
	/**
	 * Function that checks if current page has at least one of WooCommerce shortcodes added
	 * @return bool
	 */
	function mediclinic_mikado_has_woocommerce_shortcode() {
		$woocommerce_shortcodes = array(
			'mkdf_product_info',
			'mkdf_product_list',
			'mkdf_product_list_carousel',
			'mkdf_product_list_simple',
			'add_to_cart',
			'add_to_cart_url',
			'product_page',
			'product',
			'products',
			'product_categories',
			'product_category',
			'recent_products',
			'featured_products',
			'sale_products',
			'best_selling_products',
			'top_rated_products',
			'product_attribute',
			'related_products',
			'woocommerce_messages',
			'woocommerce_cart',
			'woocommerce_checkout',
			'woocommerce_order_tracking',
			'woocommerce_my_account',
			'woocommerce_edit_address',
			'woocommerce_change_password',
			'woocommerce_view_order',
			'woocommerce_pay',
			'woocommerce_thankyou'
		);

		foreach($woocommerce_shortcodes as $woocommerce_shortcode) {
			$has_shortcode = mediclinic_mikado_has_shortcode($woocommerce_shortcode);

			if($has_shortcode) {
				return true;
			}
		}

		return false;
	}
}

if(!function_exists('mediclinic_mikado_has_woocommerce_widgets')) {
	/**
	 * Function that checks if current page has at least one of WooCommerce shortcodes added
	 * @return bool
	 */
	function mediclinic_mikado_has_woocommerce_widgets() {
		$widgets_array = array(
			'mkdf_woocommerce_dropdown_cart',
			'woocommerce_widget_cart',
			'woocommerce_layered_nav',
			'woocommerce_layered_nav_filters',
			'woocommerce_price_filter',
			'woocommerce_product_categories',
			'woocommerce_product_search',
			'woocommerce_product_tag_cloud',
			'woocommerce_products',
			'woocommerce_recent_reviews',
			'woocommerce_recently_viewed_products',
			'woocommerce_top_rated_products'
		);

		foreach($widgets_array as $widget) {
			$active_widget = is_active_widget(false, false, $widget);

			if($active_widget) {
				return true;
			}
		}

		return false;
	}
}

if(!function_exists('mediclinic_mikado_add_woocommerce_shortcode_class')) {
	/**
	 * Function that checks if current page has at least one of WooCommerce shortcodes added
	 * @return string
	 */
	function mediclinic_mikado_add_woocommerce_shortcode_class($classes){
		$woocommerce_shortcodes = array(
			'woocommerce_order_tracking'
		);

		foreach($woocommerce_shortcodes as $woocommerce_shortcode) {
			$has_shortcode = mediclinic_mikado_has_shortcode($woocommerce_shortcode);

			if($has_shortcode) {
				$classes[] = 'mkdf-woocommerce-page woocommerce-account mkdf-'.str_replace('_', '-', $woocommerce_shortcode);
			}
		}

		return $classes;
	}

	add_filter('body_class', 'mediclinic_mikado_add_woocommerce_shortcode_class');
}

if(!function_exists('mediclinic_mikado_woocommerce_product_single_class')) {
	function mediclinic_mikado_woocommerce_product_single_class($classes) {
		if(in_array('woocommerce', $classes)) {
			$product_thumbnail_position = mediclinic_mikado_get_meta_field_intersect('woo_set_thumb_images_position');
			
			if(!empty($product_thumbnail_position)) {
				$classes[] = 'mkdf-woo-single-thumb-'.$product_thumbnail_position;
			}
		}
		
		return $classes;
	}
	
	add_filter('body_class', 'mediclinic_mikado_woocommerce_product_single_class');
}

if(!function_exists('mediclinic_mikado_woocommerce_share')) {
    /**
     * Function that social share for product page
     * Return array array of WooCommerce pages
     */
    function mediclinic_mikado_woocommerce_share() {
        if (mediclinic_mikado_is_woocommerce_installed()) {

            if (mediclinic_mikado_core_plugin_installed() && mediclinic_mikado_options()->getOptionValue('enable_social_share') == 'yes' && mediclinic_mikado_options()->getOptionValue('enable_social_share_on_product') == 'yes') :
                print '<div class="mkdf-woo-social-share-holder">';
                echo mediclinic_mikado_get_social_share_html();
                print '</div>';
            endif;
        }
    }
}

if(!function_exists('mediclinic_mikado_woocommerce_single_product_title')) {
    /**
     * Function that checks option for single product title and overrides it with filter
     * @param $show_title_area - boolean, default value from title function @see mediclinic_mikado_get_title()
     * @return boolean
     */
    function mediclinic_mikado_woocommerce_single_product_title($show_title_area) {
        if(mediclinic_mikado_is_woocommerce_installed() && is_singular('product')) {
            $woo_title_meta = get_post_meta(get_the_ID(), 'mkdf_show_title_area_woo_meta', true);
            if(empty($woo_title_meta)) {
                $woo_title_main = mediclinic_mikado_options()->getOptionValue('show_title_area_woo');
                if(!empty($woo_title_main)) {
                    $show_title_area = $woo_title_main == 'yes' ? true : false;
                }
            }
            else {
                $show_title_area = $woo_title_meta == 'yes' ? true : false;
            }
        }

        return $show_title_area;
    }

    add_filter('mediclinic_mikado_show_title_area', 'mediclinic_mikado_woocommerce_single_product_title');
}