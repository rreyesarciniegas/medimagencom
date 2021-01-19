<?php

if ( ! function_exists( 'mediclinic_mikado_map_post_audio_meta' ) ) {
	function mediclinic_mikado_map_post_audio_meta() {
		$audio_post_format_meta_box = mediclinic_mikado_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Audio Post Format', 'mediclinic' ),
				'name'  => 'post_format_audio_meta'
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_audio_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Audio Type', 'mediclinic' ),
				'description'   => esc_html__( 'Choose audio type', 'mediclinic' ),
				'parent'        => $audio_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Audio Service', 'mediclinic' ),
					'self'            => esc_html__( 'Self Hosted', 'mediclinic' )
				),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						'social_networks' => '#mkdf_mkdf_audio_self_hosted_container',
						'self'            => '#mkdf_mkdf_audio_embedded_container'
					),
					'show'       => array(
						'social_networks' => '#mkdf_mkdf_audio_embedded_container',
						'self'            => '#mkdf_mkdf_audio_self_hosted_container'
					)
				)
			)
		);
		
		$mkdf_audio_embedded_container = mediclinic_mikado_add_admin_container(
			array(
				'parent'          => $audio_post_format_meta_box,
				'name'            => 'mkdf_audio_embedded_container',
				'hidden_property' => 'mkdf_audio_type_meta',
				'hidden_value'    => 'self'
			)
		);
		
		$mkdf_audio_self_hosted_container = mediclinic_mikado_add_admin_container(
			array(
				'parent'          => $audio_post_format_meta_box,
				'name'            => 'mkdf_audio_self_hosted_container',
				'hidden_property' => 'mkdf_audio_type_meta',
				'hidden_value'    => 'social_networks'
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_audio_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio URL', 'mediclinic' ),
				'description' => esc_html__( 'Enter audio URL', 'mediclinic' ),
				'parent'      => $mkdf_audio_embedded_container,
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_audio_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio Link', 'mediclinic' ),
				'description' => esc_html__( 'Enter audio link', 'mediclinic' ),
				'parent'      => $mkdf_audio_self_hosted_container,
			)
		);
	}
	
	add_action( 'mediclinic_mikado_meta_boxes_map', 'mediclinic_mikado_map_post_audio_meta', 23 );
}