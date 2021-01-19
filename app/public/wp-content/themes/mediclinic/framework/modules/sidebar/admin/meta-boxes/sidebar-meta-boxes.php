<?php

if ( ! function_exists( 'mediclinic_mikado_map_sidebar_meta' ) ) {
	function mediclinic_mikado_map_sidebar_meta() {
		$mkdf_sidebar_meta_box = mediclinic_mikado_create_meta_box(
			array(
				'scope' => apply_filters( 'mediclinic_mikado_set_scope_for_meta_boxes', array( 'page' ) ),
				'title' => esc_html__( 'Sidebar', 'mediclinic' ),
				'name'  => 'sidebar_meta'
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_sidebar_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Layout', 'mediclinic' ),
				'description' => esc_html__( 'Choose the sidebar layout', 'mediclinic' ),
				'parent'      => $mkdf_sidebar_meta_box,
				'options'     => array(
					''                 => esc_html__( 'Default', 'mediclinic' ),
					'no-sidebar'       => esc_html__( 'No Sidebar', 'mediclinic' ),
					'sidebar-33-right' => esc_html__( 'Sidebar 1/3 Right', 'mediclinic' ),
					'sidebar-25-right' => esc_html__( 'Sidebar 1/4 Right', 'mediclinic' ),
					'sidebar-33-left'  => esc_html__( 'Sidebar 1/3 Left', 'mediclinic' ),
					'sidebar-25-left'  => esc_html__( 'Sidebar 1/4 Left', 'mediclinic' )
				)
			)
		);
		
		$mkdf_custom_sidebars = mediclinic_mikado_get_custom_sidebars();
		if ( count( $mkdf_custom_sidebars ) > 0 ) {
			mediclinic_mikado_create_meta_box_field(
				array(
					'name'        => 'mkdf_custom_sidebar_area_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Widget Area in Sidebar', 'mediclinic' ),
					'description' => esc_html__( 'Choose Custom Widget area to display in Sidebar"', 'mediclinic' ),
					'parent'      => $mkdf_sidebar_meta_box,
					'options'     => $mkdf_custom_sidebars,
					'args'        => array(
						'select2'	=> true
					)
				)
			);
		}
	}
	
	add_action( 'mediclinic_mikado_meta_boxes_map', 'mediclinic_mikado_map_sidebar_meta', 31 );
}