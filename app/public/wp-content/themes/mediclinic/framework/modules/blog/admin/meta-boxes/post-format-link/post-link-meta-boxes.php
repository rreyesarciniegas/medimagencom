<?php

if ( ! function_exists( 'mediclinic_mikado_map_post_link_meta' ) ) {
	function mediclinic_mikado_map_post_link_meta() {
		$link_post_format_meta_box = mediclinic_mikado_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Link Post Format', 'mediclinic' ),
				'name'  => 'post_format_link_meta'
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_link_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Link', 'mediclinic' ),
				'description' => esc_html__( 'Enter link', 'mediclinic' ),
				'parent'      => $link_post_format_meta_box,
			
			)
		);
	}
	
	add_action( 'mediclinic_mikado_meta_boxes_map', 'mediclinic_mikado_map_post_link_meta', 24 );
}