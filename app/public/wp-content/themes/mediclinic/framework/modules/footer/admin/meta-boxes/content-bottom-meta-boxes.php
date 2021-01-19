<?php

if ( ! function_exists( 'mediclinic_mikado_map_content_bottom_meta' ) ) {
	function mediclinic_mikado_map_content_bottom_meta() {
		$content_bottom_meta_box = mediclinic_mikado_create_meta_box(
			array(
				'scope' => apply_filters( 'mediclinic_mikado_set_scope_for_meta_boxes', array( 'page', 'post' ) ),
				'title' => esc_html__( 'Content Bottom', 'mediclinic' ),
				'name'  => 'content_bottom_meta'
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_enable_content_bottom_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Enable Content Bottom Area', 'mediclinic' ),
				'description'   => esc_html__( 'This option will enable Content Bottom area on pages', 'mediclinic' ),
				'parent'        => $content_bottom_meta_box,
				'options'       => mediclinic_mikado_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''   => '#mkdf_mkdf_show_content_bottom_meta_container',
						'no' => '#mkdf_mkdf_show_content_bottom_meta_container'
					),
					'show'       => array(
						'yes' => '#mkdf_mkdf_show_content_bottom_meta_container'
					)
				)
			)
		);
		
		$show_content_bottom_meta_container = mediclinic_mikado_add_admin_container(
			array(
				'parent'          => $content_bottom_meta_box,
				'name'            => 'mkdf_show_content_bottom_meta_container',
				'hidden_property' => 'mkdf_enable_content_bottom_area_meta',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_content_bottom_sidebar_custom_display_meta',
				'type'          => 'selectblank',
				'default_value' => '',
				'label'         => esc_html__( 'Sidebar to Display', 'mediclinic' ),
				'description'   => esc_html__( 'Choose a content bottom sidebar to display', 'mediclinic' ),
				'options'       => mediclinic_mikado_get_custom_sidebars(),
				'parent'        => $show_content_bottom_meta_container,
				'args' => array(
					'select2' => true
				)
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'type'          => 'select',
				'name'          => 'mkdf_content_bottom_in_grid_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Display in Grid', 'mediclinic' ),
				'description'   => esc_html__( 'Enabling this option will place content bottom in grid', 'mediclinic' ),
				'options'       => mediclinic_mikado_get_yes_no_select_array(),
				'parent'        => $show_content_bottom_meta_container
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'type'        => 'color',
				'name'        => 'mkdf_content_bottom_background_color_meta',
				'label'       => esc_html__( 'Background Color', 'mediclinic' ),
				'description' => esc_html__( 'Choose a background color for content bottom area', 'mediclinic' ),
				'parent'      => $show_content_bottom_meta_container
			)
		);
	}
	
	add_action( 'mediclinic_mikado_meta_boxes_map', 'mediclinic_mikado_map_content_bottom_meta', 71 );
}