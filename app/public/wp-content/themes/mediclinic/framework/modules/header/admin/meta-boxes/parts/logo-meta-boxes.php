<?php

if ( ! function_exists( 'mediclinic_mikado_logo_meta_box_map' ) ) {
	function mediclinic_mikado_logo_meta_box_map() {
		
		$logo_meta_box = mediclinic_mikado_create_meta_box(
			array(
				'scope' => apply_filters( 'mediclinic_mikado_set_scope_for_meta_boxes', array( 'page', 'post' ) ),
				'title' => esc_html__( 'Logo', 'mediclinic' ),
				'name'  => 'logo_meta'
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Default', 'mediclinic' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'mediclinic' ),
				'parent'      => $logo_meta_box
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_dark_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Dark', 'mediclinic' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'mediclinic' ),
				'parent'      => $logo_meta_box
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_light_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Light', 'mediclinic' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'mediclinic' ),
				'parent'      => $logo_meta_box
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_sticky_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Sticky', 'mediclinic' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'mediclinic' ),
				'parent'      => $logo_meta_box
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_mobile_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Mobile', 'mediclinic' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'mediclinic' ),
				'parent'      => $logo_meta_box
			)
		);
	}
	
	add_action( 'mediclinic_mikado_meta_boxes_map', 'mediclinic_mikado_logo_meta_box_map', 47 );
}