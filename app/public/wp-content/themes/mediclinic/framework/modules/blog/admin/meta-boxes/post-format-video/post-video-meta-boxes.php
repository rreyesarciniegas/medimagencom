<?php

if ( ! function_exists( 'mediclinic_mikado_map_post_video_meta' ) ) {
	function mediclinic_mikado_map_post_video_meta() {
		$video_post_format_meta_box = mediclinic_mikado_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Video Post Format', 'mediclinic' ),
				'name'  => 'post_format_video_meta'
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_video_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Video Type', 'mediclinic' ),
				'description'   => esc_html__( 'Choose video type', 'mediclinic' ),
				'parent'        => $video_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Video Service', 'mediclinic' ),
					'self'            => esc_html__( 'Self Hosted', 'mediclinic' )
				),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						'social_networks' => '#mkdf_mkdf_video_self_hosted_container',
						'self'            => '#mkdf_mkdf_video_embedded_container'
					),
					'show'       => array(
						'social_networks' => '#mkdf_mkdf_video_embedded_container',
						'self'            => '#mkdf_mkdf_video_self_hosted_container'
					)
				)
			)
		);
		
		$mkdf_video_embedded_container = mediclinic_mikado_add_admin_container(
			array(
				'parent'          => $video_post_format_meta_box,
				'name'            => 'mkdf_video_embedded_container',
				'hidden_property' => 'mkdf_video_type_meta',
				'hidden_value'    => 'self'
			)
		);
		
		$mkdf_video_self_hosted_container = mediclinic_mikado_add_admin_container(
			array(
				'parent'          => $video_post_format_meta_box,
				'name'            => 'mkdf_video_self_hosted_container',
				'hidden_property' => 'mkdf_video_type_meta',
				'hidden_value'    => 'social_networks'
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_video_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video URL', 'mediclinic' ),
				'description' => esc_html__( 'Enter Video URL', 'mediclinic' ),
				'parent'      => $mkdf_video_embedded_container,
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_video_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video MP4', 'mediclinic' ),
				'description' => esc_html__( 'Enter video URL for MP4 format', 'mediclinic' ),
				'parent'      => $mkdf_video_self_hosted_container,
			)
		);
	}
	
	add_action( 'mediclinic_mikado_meta_boxes_map', 'mediclinic_mikado_map_post_video_meta', 22 );
}