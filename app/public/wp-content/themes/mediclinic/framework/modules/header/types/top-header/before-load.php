<?php

if ( ! function_exists( 'mediclinic_mikado_set_show_dep_options_for_top_header' ) ) {
	/**
	 * This function is used to show this header type specific containers/panels for admin options when another header type is selected
	 */
	function mediclinic_mikado_set_show_dep_options_for_top_header( $show_dep_options ) {
		$show_dep_options[] = '#mkdf_top_header_container';
		
		return $show_dep_options;
	}
	
	// show top header container for global options
	add_filter( 'mediclinic_mikado_show_dep_options_for_header_box', 'mediclinic_mikado_set_show_dep_options_for_top_header' );
	add_filter( 'mediclinic_mikado_show_dep_options_for_header_centered', 'mediclinic_mikado_set_show_dep_options_for_top_header' );
	add_filter( 'mediclinic_mikado_show_dep_options_for_header_divided', 'mediclinic_mikado_set_show_dep_options_for_top_header' );
	add_filter( 'mediclinic_mikado_show_dep_options_for_header_minimal', 'mediclinic_mikado_set_show_dep_options_for_top_header' );
	add_filter( 'mediclinic_mikado_show_dep_options_for_header_standard', 'mediclinic_mikado_set_show_dep_options_for_top_header' );
	add_filter( 'mediclinic_mikado_show_dep_options_for_header_standard_extended', 'mediclinic_mikado_set_show_dep_options_for_top_header' );
	add_filter( 'mediclinic_mikado_show_dep_options_for_header_tabbed', 'mediclinic_mikado_set_show_dep_options_for_top_header' );
	
	// show top header container for meta boxes
	add_filter( 'mediclinic_mikado_show_dep_options_for_header_box_meta_boxes', 'mediclinic_mikado_set_show_dep_options_for_top_header' );
	add_filter( 'mediclinic_mikado_show_dep_options_for_header_centered_meta_boxes', 'mediclinic_mikado_set_show_dep_options_for_top_header' );
	add_filter( 'mediclinic_mikado_show_dep_options_for_header_divided_meta_boxes', 'mediclinic_mikado_set_show_dep_options_for_top_header' );
	add_filter( 'mediclinic_mikado_show_dep_options_for_header_minimal_meta_boxes', 'mediclinic_mikado_set_show_dep_options_for_top_header' );
	add_filter( 'mediclinic_mikado_show_dep_options_for_header_standard_meta_boxes', 'mediclinic_mikado_set_show_dep_options_for_top_header' );
	add_filter( 'mediclinic_mikado_show_dep_options_for_header_standard_extended_meta_boxes', 'mediclinic_mikado_set_show_dep_options_for_top_header' );
	add_filter( 'mediclinic_mikado_show_dep_options_for_header_tabbed_meta_boxes', 'mediclinic_mikado_set_show_dep_options_for_top_header' );
}

if ( ! function_exists( 'mediclinic_mikado_set_hide_dep_options_for_top_header' ) ) {
	/**
	 * This function is used to hide this header type specific containers/panels for admin options when another header type is selected
	 */
	function mediclinic_mikado_set_hide_dep_options_for_top_header( $hide_dep_options ) {
		$hide_dep_options[] = '#mkdf_top_header_container';
		
		return $hide_dep_options;
	}
	
	// hide top header container for global options
	add_filter( 'mediclinic_mikado_hide_dep_options_for_header_top_menu', 'mediclinic_mikado_set_hide_dep_options_for_top_header' );
	add_filter( 'mediclinic_mikado_hide_dep_options_for_header_vertical', 'mediclinic_mikado_set_hide_dep_options_for_top_header' );
	add_filter( 'mediclinic_mikado_hide_dep_options_for_header_vertical_closed', 'mediclinic_mikado_set_hide_dep_options_for_top_header' );
	add_filter( 'mediclinic_mikado_hide_dep_options_for_header_vertical_compact', 'mediclinic_mikado_set_hide_dep_options_for_top_header' );
	
	// hide top header container for meta boxes
	add_filter( 'mediclinic_mikado_hide_dep_options_for_header_top_menu_meta_boxes', 'mediclinic_mikado_set_hide_dep_options_for_top_header' );
	add_filter( 'mediclinic_mikado_hide_dep_options_for_header_vertical_meta_boxes', 'mediclinic_mikado_set_hide_dep_options_for_top_header' );
	add_filter( 'mediclinic_mikado_hide_dep_options_for_header_vertical_closed_meta_boxes', 'mediclinic_mikado_set_hide_dep_options_for_top_header' );
	add_filter( 'mediclinic_mikado_hide_dep_options_for_header_vertical_compact_meta_boxes', 'mediclinic_mikado_set_hide_dep_options_for_top_header' );
}