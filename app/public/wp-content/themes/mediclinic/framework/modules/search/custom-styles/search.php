<?php

if (!function_exists('mediclinic_mikado_search_opener_icon_size')) {
	function mediclinic_mikado_search_opener_icon_size() {
		$icon_size = mediclinic_mikado_options()->getOptionValue('header_search_icon_size');
		
		if (!empty($icon_size)) {
			echo mediclinic_mikado_dynamic_css('.mkdf-search-opener', array(
				'font-size' => mediclinic_mikado_filter_px($icon_size) . 'px'
			));
		}
	}

	add_action('mediclinic_mikado_style_dynamic', 'mediclinic_mikado_search_opener_icon_size');
}

if (!function_exists('mediclinic_mikado_search_opener_icon_colors')) {
	function mediclinic_mikado_search_opener_icon_colors() {
		$icon_color       = mediclinic_mikado_options()->getOptionValue('header_search_icon_color');
		$icon_hover_color = mediclinic_mikado_options()->getOptionValue('header_search_icon_hover_color');
		
		if (!empty($icon_color)) {
			echo mediclinic_mikado_dynamic_css('.mkdf-search-opener', array(
				'color' => $icon_color
			));
		}

		if (!empty($icon_hover_color)) {
			echo mediclinic_mikado_dynamic_css('.mkdf-search-opener:hover', array(
				'color' => $icon_hover_color
			));
		}
	}

	add_action('mediclinic_mikado_style_dynamic', 'mediclinic_mikado_search_opener_icon_colors');
}

if (!function_exists('mediclinic_mikado_search_opener_text_styles')) {
	function mediclinic_mikado_search_opener_text_styles() {
		$item_styles = mediclinic_mikado_get_typography_styles('search_icon_text');
		
		$item_selector = array(
			'.mkdf-search-icon-text'
		);
		
		echo mediclinic_mikado_dynamic_css($item_selector, $item_styles);
		
		$text_hover_color = mediclinic_mikado_options()->getOptionValue('search_icon_text_color_hover');
		
		if (!empty($text_hover_color)) {
			echo mediclinic_mikado_dynamic_css('.mkdf-search-opener:hover .mkdf-search-icon-text', array(
				'color' => $text_hover_color
			));
		}
	}

	add_action('mediclinic_mikado_style_dynamic', 'mediclinic_mikado_search_opener_text_styles');
}