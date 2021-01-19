<?php

if ( ! function_exists( 'mediclinic_mikado_get_hide_dep_for_header_standard_meta_boxes' ) ) {
	function mediclinic_mikado_get_hide_dep_for_header_standard_meta_boxes() {
		$hide_dep_options = apply_filters( 'mediclinic_mikado_header_standard_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'mediclinic_mikado_header_standard_meta_map' ) ) {
	function mediclinic_mikado_header_standard_meta_map( $parent ) {
		$hide_dep_options = mediclinic_mikado_get_hide_dep_for_header_standard_meta_boxes();
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'mkdf_set_menu_area_position_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Choose Menu Area Position', 'mediclinic' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'mediclinic' ),
				'options'         => array(
					''       => esc_html__( 'Default', 'mediclinic' ),
					'left'   => esc_html__( 'Left', 'mediclinic' ),
					'right'  => esc_html__( 'Right', 'mediclinic' ),
					'center' => esc_html__( 'Center', 'mediclinic' )
				),
				'hidden_property' => 'mkdf_header_type_meta',
				'hidden_values'   => $hide_dep_options
			)
		);
	}
	
	add_action( 'mediclinic_mikado_additional_header_area_meta_boxes_map', 'mediclinic_mikado_header_standard_meta_map' );
}