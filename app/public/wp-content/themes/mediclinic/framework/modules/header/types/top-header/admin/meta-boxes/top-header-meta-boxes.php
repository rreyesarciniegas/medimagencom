<?php

if ( ! function_exists( 'mediclinic_mikado_get_hide_dep_for_top_header_area_meta_boxes' ) ) {
	function mediclinic_mikado_get_hide_dep_for_top_header_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'mediclinic_mikado_top_header_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'mediclinic_mikado_header_top_area_meta_options_map' ) ) {
	function mediclinic_mikado_header_top_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = mediclinic_mikado_get_hide_dep_for_top_header_area_meta_boxes();
		
		$top_header_container = mediclinic_mikado_add_admin_container_no_style(
			array(
				'type'            => 'container',
				'name'            => 'top_header_container',
				'parent'          => $header_meta_box,
				'hidden_property' => 'mkdf_header_type_meta',
				'hidden_values'   => $hide_dep_options
			)
		);
		
		mediclinic_mikado_add_admin_section_title(
			array(
				'parent' => $top_header_container,
				'name'   => 'top_area_style',
				'title'  => esc_html__( 'Top Area', 'mediclinic' )
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_top_bar_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Header Top Bar', 'mediclinic' ),
				'description'   => esc_html__( 'Enabling this option will show header top bar area', 'mediclinic' ),
				'parent'        => $top_header_container,
				'options'       => mediclinic_mikado_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#mkdf_top_bar_container_no_style',
						'no'  => '#mkdf_top_bar_container_no_style',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#mkdf_top_bar_container_no_style'
					)
				)
			)
		);
		
		$top_bar_container = mediclinic_mikado_add_admin_container_no_style(
			array(
				'name'            => 'top_bar_container_no_style',
				'parent'          => $top_header_container,
				'hidden_property' => 'mkdf_top_bar_meta',
				'hidden_value'    => 'no',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_top_bar_in_grid_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Top Bar In Grid', 'mediclinic' ),
				'description'   => esc_html__( 'Set top bar content to be in grid', 'mediclinic' ),
				'parent'        => $top_bar_container,
				'default_value' => '',
				'options'       => mediclinic_mikado_get_yes_no_select_array()
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'   => 'mkdf_top_bar_background_color_meta',
				'type'   => 'color',
				'label'  => esc_html__( 'Top Bar Background Color', 'mediclinic' ),
				'parent' => $top_bar_container
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_top_bar_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Top Bar Background Color Transparency', 'mediclinic' ),
				'description' => esc_html__( 'Set top bar background color transparenct. Value should be between 0 and 1', 'mediclinic' ),
				'parent'      => $top_bar_container,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_top_bar_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Top Bar Border', 'mediclinic' ),
				'description'   => esc_html__( 'Set border on top bar', 'mediclinic' ),
				'parent'        => $top_bar_container,
				'default_value' => '',
				'options'       => mediclinic_mikado_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#mkdf_top_bar_border_container',
						'no'  => '#mkdf_top_bar_border_container',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#mkdf_top_bar_border_container'
					)
				)
			)
		);
		
		$top_bar_border_container = mediclinic_mikado_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'top_bar_border_container',
				'parent'          => $top_bar_container,
				'hidden_property' => 'mkdf_top_bar_border_meta',
				'hidden_value'    => 'no',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_top_bar_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'mediclinic' ),
				'description' => esc_html__( 'Choose color for top bar border', 'mediclinic' ),
				'parent'      => $top_bar_border_container
			)
		);
	}
	
	add_action( 'mediclinic_mikado_additional_header_area_meta_boxes_map', 'mediclinic_mikado_header_top_area_meta_options_map', 10, 1 );
}