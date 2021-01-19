<?php

if ( ! function_exists( 'mediclinic_mikado_map_post_gallery_meta' ) ) {
	
	function mediclinic_mikado_map_post_gallery_meta() {
		$gallery_post_format_meta_box = mediclinic_mikado_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Gallery Post Format', 'mediclinic' ),
				'name'  => 'post_format_gallery_meta'
			)
		);
		
		mediclinic_mikado_add_multiple_images_field(
			array(
				'name'        => 'mkdf_post_gallery_images_meta',
				'label'       => esc_html__( 'Gallery Images', 'mediclinic' ),
				'description' => esc_html__( 'Choose your gallery images', 'mediclinic' ),
				'parent'      => $gallery_post_format_meta_box,
			)
		);
	}
	
	add_action( 'mediclinic_mikado_meta_boxes_map', 'mediclinic_mikado_map_post_gallery_meta', 21 );
}
