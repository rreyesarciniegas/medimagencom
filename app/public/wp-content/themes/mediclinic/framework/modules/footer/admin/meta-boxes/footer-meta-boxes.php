<?php

if ( ! function_exists( 'mediclinic_mikado_map_footer_meta' ) ) {
	function mediclinic_mikado_map_footer_meta() {
		$footer_meta_box = mediclinic_mikado_create_meta_box(
			array(
				'scope' => apply_filters( 'mediclinic_mikado_set_scope_for_meta_boxes', array( 'page', 'post' ) ),
				'title' => esc_html__( 'Footer', 'mediclinic' ),
				'name'  => 'footer_meta'
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_disable_footer_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Footer for this Page', 'mediclinic' ),
				'description'   => esc_html__( 'Enabling this option will hide footer on this page', 'mediclinic' ),
				'parent'        => $footer_meta_box
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_footer_top_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Footer Top', 'mediclinic' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'mediclinic' ),
				'parent'        => $footer_meta_box,
				'options'       => mediclinic_mikado_get_yes_no_select_array()
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_footer_bottom_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Footer Bottom', 'mediclinic' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'mediclinic' ),
				'parent'        => $footer_meta_box,
				'options'       => mediclinic_mikado_get_yes_no_select_array()
			)
		);
	}
	
	add_action( 'mediclinic_mikado_meta_boxes_map', 'mediclinic_mikado_map_footer_meta', 70 );
}