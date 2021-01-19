<?php

if (!function_exists('mediclinic_mikado_sidebar_layout')) {
	/**
	 * Function that check is sidebar is enabled and return type of sidebar layout
	 */
	function mediclinic_mikado_sidebar_layout() {
		$sidebar_layout = '';
		$sidebar_layout_meta = mediclinic_mikado_get_meta_field_intersect('sidebar_layout');
		$archive_sidebar_layout = mediclinic_mikado_options()->getOptionValue('archive_sidebar_layout');
		$search_sidebar_layout = mediclinic_mikado_options()->getOptionValue('search_page_sidebar_layout');
		$single_sidebar_layout = mediclinic_mikado_get_meta_field_intersect('blog_single_sidebar_layout');
		
		if (!empty($sidebar_layout_meta)) {
			$sidebar_layout = $sidebar_layout_meta;
		}
		
		if (is_singular('post') && !empty($single_sidebar_layout)) {
			$sidebar_layout = $single_sidebar_layout;
		}
		
		if(is_search() && !mediclinic_mikado_is_woocommerce_shop() && !empty($search_sidebar_layout)) {
			$sidebar_layout = $search_sidebar_layout;
		}
		
		if ((is_archive() || (is_home() && is_front_page())) && !mediclinic_mikado_is_woocommerce_page() && !empty($archive_sidebar_layout)) {
			$sidebar_layout = $archive_sidebar_layout;
		}
		
		if (is_archive() && mediclinic_mikado_is_woocommerce_installed()) {
			if (is_product_category() || is_product_tag()) {
				$shop_id = get_option('woocommerce_shop_page_id');
				$sidebar_layout = mediclinic_mikado_get_meta_field_intersect('sidebar_layout', $shop_id);
			}
		}
		if ( ! empty( $sidebar_layout ) && ! is_active_sidebar( mediclinic_mikado_get_sidebar() ) ) {
			$sidebar_layout = '';
		}
		return apply_filters('mediclinic_mikado_sidebar_layout', $sidebar_layout);
	}
}

if(!function_exists('mediclinic_mikado_get_content_sidebar_class')) {
	/**
	 * Return classes for content holder when sidebar is active
	 *
	 * @return string
	 */
	function mediclinic_mikado_get_content_sidebar_class() {
		$sidebar_layout = mediclinic_mikado_sidebar_layout();
		$content_class  = array('mkdf-page-content-holder');
		
		switch($sidebar_layout) {
			case 'sidebar-33-right':
				$content_class[] = 'mkdf-grid-col-8';
				break;
			case 'sidebar-25-right':
				$content_class[] = 'mkdf-grid-col-9';
				break;
			case 'sidebar-33-left':
				$content_class[] = 'mkdf-grid-col-8';
				$content_class[] = 'mkdf-grid-col-push-4';
				break;
			case 'sidebar-25-left':
				$content_class[] = 'mkdf-grid-col-9';
				$content_class[] = 'mkdf-grid-col-push-3';
				break;
			default:
				$content_class[] = 'mkdf-grid-col-12';
				break;
		}
		
		return mediclinic_mikado_get_class_attribute($content_class);
	}
}

if(!function_exists('mediclinic_mikado_get_sidebar_holder_class')) {
	/**
	 * Return classes for sidebar holder when sidebar is active
	 *
	 * @return string
	 */
	function mediclinic_mikado_get_sidebar_holder_class() {
		$sidebar_layout = mediclinic_mikado_sidebar_layout();
		$sidebar_class  = array('mkdf-sidebar-holder');
		
		switch($sidebar_layout) {
			case 'sidebar-33-right':
				$sidebar_class[] = 'mkdf-grid-col-4';
				break;
			case 'sidebar-25-right':
				$sidebar_class[] = 'mkdf-grid-col-3';
				break;
			case 'sidebar-33-left':
				$sidebar_class[] = 'mkdf-grid-col-4';
				$sidebar_class[] = 'mkdf-grid-col-pull-8';
				break;
			case 'sidebar-25-left':
				$sidebar_class[] = 'mkdf-grid-col-3';
				$sidebar_class[] = 'mkdf-grid-col-pull-9';
				break;
		}
		
		return mediclinic_mikado_get_class_attribute($sidebar_class);
	}
}

if (!function_exists('mediclinic_mikado_get_sidebar')) {
	/**
	 * Return Sidebar name
	 *
	 * @return string
	 */
	function mediclinic_mikado_get_sidebar() {
		$sidebar_name = 'sidebar';
		$custom_sidebar_area = mediclinic_mikado_get_meta_field_intersect('custom_sidebar_area');
		$custom_archive_sidebar_area = mediclinic_mikado_options()->getOptionValue('archive_custom_sidebar_area');
		$custom_search_sidebar_area = mediclinic_mikado_options()->getOptionValue('search_custom_sidebar_area');
		$custom_single_sidebar_area = mediclinic_mikado_get_meta_field_intersect('blog_single_custom_sidebar_area');
		
		if (!empty($custom_sidebar_area)) {
			$sidebar_name = $custom_sidebar_area;
		}
		
		if (is_singular('post') && !empty($custom_single_sidebar_area)) {
			$sidebar_name = $custom_single_sidebar_area;
		}
		
		if(is_search() && !empty($custom_search_sidebar_area)) {
			$sidebar_name = $custom_search_sidebar_area;
		}
		
		if ((is_archive() || (is_home() && is_front_page())) && !mediclinic_mikado_is_woocommerce_page() && !empty($custom_archive_sidebar_area)) {
			$sidebar_name = $custom_archive_sidebar_area;
		}
		
		if (is_archive() && mediclinic_mikado_is_woocommerce_installed()) {
			if (is_product_category() || is_product_tag()) {
				$shop_id = get_option('woocommerce_shop_page_id');
				$sidebar_name = mediclinic_mikado_get_meta_field_intersect('custom_sidebar_area', $shop_id);
			}
		}
		
		return apply_filters('mediclinic_mikado_sidebar_name', $sidebar_name);
	}
}

if (!function_exists('mediclinic_mikado_get_custom_sidebars')) {
	/**
	 * Function that returns all custom made sidebars.
	 *
	 * @uses get_option()
	 * @return array array of custom made sidebars where key and value are sidebar name
	 */
	function mediclinic_mikado_get_custom_sidebars() {
		$mediclinic_custom_sidebars = get_option('mkd_sidebars');
		$formatted_array = array();
		
		if (is_array($mediclinic_custom_sidebars) && count($mediclinic_custom_sidebars)) {
			foreach ($mediclinic_custom_sidebars as $custom_sidebar) {
				$formatted_array[sanitize_title($custom_sidebar)] = $custom_sidebar;
			}
		}
		
		return $formatted_array;
	}
}