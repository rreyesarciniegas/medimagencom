<?php

if ( ! function_exists( 'mediclinic_mikado_map_post_quote_meta' ) ) {
	function mediclinic_mikado_map_post_quote_meta() {
		$quote_post_format_meta_box = mediclinic_mikado_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Quote Post Format', 'mediclinic' ),
				'name'  => 'post_format_quote_meta'
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_quote_text_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Text', 'mediclinic' ),
				'description' => esc_html__( 'Enter Quote text', 'mediclinic' ),
				'parent'      => $quote_post_format_meta_box,
			
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_quote_author_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Author', 'mediclinic' ),
				'description' => esc_html__( 'Enter Quote author', 'mediclinic' ),
				'parent'      => $quote_post_format_meta_box,
			)
		);
	}
	
	add_action( 'mediclinic_mikado_meta_boxes_map', 'mediclinic_mikado_map_post_quote_meta', 25 );
}