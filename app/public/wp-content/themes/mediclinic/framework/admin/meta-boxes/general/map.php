<?php

if ( ! function_exists( 'mediclinic_mikado_map_general_meta' ) ) {
	function mediclinic_mikado_map_general_meta() {
		
		$general_meta_box = mediclinic_mikado_create_meta_box(
			array(
				'scope' => apply_filters( 'mediclinic_mikado_set_scope_for_meta_boxes', array( 'page', 'post' ) ),
				'title' => esc_html__( 'General', 'mediclinic' ),
				'name'  => 'general_meta'
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_page_content_behind_header_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Always put content behind header', 'mediclinic' ),
				'description'   => esc_html__( 'Enabling this option will put page content behind page header', 'mediclinic' ),
				'parent'        => $general_meta_box,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$mkdf_content_padding_group = mediclinic_mikado_add_admin_group(
			array(
				'name'        => 'content_padding_group',
				'title'       => esc_html__( 'Content Style', 'mediclinic' ),
				'description' => esc_html__( 'Define styles for Content area', 'mediclinic' ),
				'parent'      => $general_meta_box
			)
		);
		
		$mkdf_content_padding_row = mediclinic_mikado_add_admin_row(
			array(
				'name'   => 'mkdf_content_padding_row',
				'next'   => true,
				'parent' => $mkdf_content_padding_group
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'   => 'mkdf_page_content_top_padding',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Content Top Padding', 'mediclinic' ),
				'parent' => $mkdf_content_padding_row,
				'args'   => array(
					'suffix' => 'px'
				)
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'    => 'mkdf_page_content_top_padding_mobile',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Set this top padding for mobile header', 'mediclinic' ),
				'parent'  => $mkdf_content_padding_row,
				'options' => mediclinic_mikado_get_yes_no_select_array( false )
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_page_slider_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Slider Shortcode', 'mediclinic' ),
				'description' => esc_html__( 'Paste your slider shortcode here', 'mediclinic' ),
				'parent'      => $general_meta_box
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_page_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'mediclinic' ),
				'description' => esc_html__( 'Choose background color for page content', 'mediclinic' ),
				'parent'      => $general_meta_box
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'    => 'mkdf_boxed_meta',
				'type'    => 'select',
				'label'   => esc_html__( 'Boxed Layout', 'mediclinic' ),
				'parent'  => $general_meta_box,
				'options' => mediclinic_mikado_get_yes_no_select_array(),
				'args'    => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#mkdf_boxed_container_meta',
						'no'  => '#mkdf_boxed_container_meta',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#mkdf_boxed_container_meta'
					)
				)
			)
		);
		
		$boxed_container_meta = mediclinic_mikado_add_admin_container(
			array(
				'parent'          => $general_meta_box,
				'name'            => 'boxed_container_meta',
				'hidden_property' => 'mkdf_boxed_meta',
				'hidden_values'   => array(
					'',
					'no'
				)
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_page_background_color_in_box_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'mediclinic' ),
				'description' => esc_html__( 'Choose the page background color outside box', 'mediclinic' ),
				'parent'      => $boxed_container_meta
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_boxed_background_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Background Image', 'mediclinic' ),
				'description' => esc_html__( 'Choose an image to be displayed in background', 'mediclinic' ),
				'parent'      => $boxed_container_meta
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_boxed_pattern_background_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Background Pattern', 'mediclinic' ),
				'description' => esc_html__( 'Choose an image to be used as background pattern', 'mediclinic' ),
				'parent'      => $boxed_container_meta
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_boxed_background_image_attachment_meta',
				'type'          => 'select',
				'default_value' => 'fixed',
				'label'         => esc_html__( 'Background Image Attachment', 'mediclinic' ),
				'description'   => esc_html__( 'Choose background image attachment', 'mediclinic' ),
				'parent'        => $boxed_container_meta,
				'options'       => array(
					''       => esc_html__( 'Default', 'mediclinic' ),
					'fixed'  => esc_html__( 'Fixed', 'mediclinic' ),
					'scroll' => esc_html__( 'Scroll', 'mediclinic' )
				)
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_smooth_page_transitions_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Smooth Page Transitions', 'mediclinic' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'mediclinic' ),
				'parent'        => $general_meta_box,
				'options'       => mediclinic_mikado_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#mkdf_page_transitions_container_meta',
						'no'  => '#mkdf_page_transitions_container_meta',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#mkdf_page_transitions_container_meta'
					)
				)
			)
		);
		
		$page_transitions_container_meta = mediclinic_mikado_add_admin_container(
			array(
				'parent'          => $general_meta_box,
				'name'            => 'page_transitions_container_meta',
				'hidden_property' => 'mkdf_smooth_page_transitions_meta',
				'hidden_values'   => array(
					'',
					'no'
				)
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_page_transition_preloader_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Enable Preloading Animation', 'mediclinic' ),
				'description' => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'mediclinic' ),
				'parent'      => $page_transitions_container_meta,
				'options'     => mediclinic_mikado_get_yes_no_select_array(),
				'args'        => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#mkdf_page_transition_preloader_container_meta',
						'no'  => '#mkdf_page_transition_preloader_container_meta',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#mkdf_page_transition_preloader_container_meta'
					)
				)
			)
		);
		
		$page_transition_preloader_container_meta = mediclinic_mikado_add_admin_container(
			array(
				'parent'          => $page_transitions_container_meta,
				'name'            => 'page_transition_preloader_container_meta',
				'hidden_property' => 'mkdf_page_transition_preloader_meta',
				'hidden_values'   => array(
					'',
					'no'
				)
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'   => 'mkdf_smooth_pt_bgnd_color_meta',
				'type'   => 'color',
				'label'  => esc_html__( 'Page Loader Background Color', 'mediclinic' ),
				'parent' => $page_transition_preloader_container_meta
			)
		);
		
		$group_pt_spinner_animation_meta = mediclinic_mikado_add_admin_group(
			array(
				'name'        => 'group_pt_spinner_animation_meta',
				'title'       => esc_html__( 'Loader Style', 'mediclinic' ),
				'description' => esc_html__( 'Define styles for loader spinner animation', 'mediclinic' ),
				'parent'      => $page_transition_preloader_container_meta
			)
		);
		
		$row_pt_spinner_animation_meta = mediclinic_mikado_add_admin_row(
			array(
				'name'   => 'row_pt_spinner_animation_meta',
				'parent' => $group_pt_spinner_animation_meta
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'type'    => 'selectsimple',
				'name'    => 'mkdf_smooth_pt_spinner_type_meta',
				'label'   => esc_html__( 'Spinner Type', 'mediclinic' ),
				'parent'  => $row_pt_spinner_animation_meta,
				'options' => array(
					''                      => esc_html__( 'Default', 'mediclinic' ),
					'rotate_circles'        => esc_html__( 'Rotate Circles', 'mediclinic' ),
					'pulse'                 => esc_html__( 'Pulse', 'mediclinic' ),
					'double_pulse'          => esc_html__( 'Double Pulse', 'mediclinic' ),
					'cube'                  => esc_html__( 'Cube', 'mediclinic' ),
					'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'mediclinic' ),
					'stripes'               => esc_html__( 'Stripes', 'mediclinic' ),
					'wave'                  => esc_html__( 'Wave', 'mediclinic' ),
					'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'mediclinic' ),
					'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'mediclinic' ),
					'atom'                  => esc_html__( 'Atom', 'mediclinic' ),
					'clock'                 => esc_html__( 'Clock', 'mediclinic' ),
					'mitosis'               => esc_html__( 'Mitosis', 'mediclinic' ),
					'lines'                 => esc_html__( 'Lines', 'mediclinic' ),
					'fussion'               => esc_html__( 'Fussion', 'mediclinic' ),
					'wave_circles'          => esc_html__( 'Wave Circles', 'mediclinic' ),
					'pulse_circles'         => esc_html__( 'Pulse Circles', 'mediclinic' )
				)
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'type'   => 'colorsimple',
				'name'   => 'mkdf_smooth_pt_spinner_color_meta',
				'label'  => esc_html__( 'Spinner Color', 'mediclinic' ),
				'parent' => $row_pt_spinner_animation_meta
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_page_transition_fadeout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Enable Fade Out Animation', 'mediclinic' ),
				'description' => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'mediclinic' ),
				'options'     => mediclinic_mikado_get_yes_no_select_array(),
				'parent'      => $page_transitions_container_meta
			
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_page_comments_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Show Comments', 'mediclinic' ),
				'description' => esc_html__( 'Enabling this option will show comments on your page', 'mediclinic' ),
				'parent'      => $general_meta_box,
				'options'     => mediclinic_mikado_get_yes_no_select_array()
			)
		);
	}
	
	add_action( 'mediclinic_mikado_meta_boxes_map', 'mediclinic_mikado_map_general_meta', 10 );
}