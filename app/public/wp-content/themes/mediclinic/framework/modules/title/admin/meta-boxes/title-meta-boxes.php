<?php

if ( ! function_exists( 'mediclinic_mikado_map_title_meta' ) ) {
	function mediclinic_mikado_map_title_meta() {
		$title_meta_box = mediclinic_mikado_create_meta_box(
			array(
				'scope' => apply_filters( 'mediclinic_mikado_set_scope_for_meta_boxes', array( 'page', 'post' ) ),
				'title' => esc_html__( 'Title', 'mediclinic' ),
				'name'  => 'title_meta'
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_title_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'mediclinic' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'mediclinic' ),
				'parent'        => $title_meta_box,
				'options'       => mediclinic_mikado_get_yes_no_select_array(),
				'args'          => array(
					"dependence" => true,
					"hide"       => array(
						""    => "",
						"no"  => "#mkdf_mkdf_show_title_area_meta_container",
						"yes" => ""
					),
					"show"       => array(
						""    => "#mkdf_mkdf_show_title_area_meta_container",
						"no"  => "",
						"yes" => "#mkdf_mkdf_show_title_area_meta_container"
					)
				)
			)
		);
		
		$show_title_area_meta_container = mediclinic_mikado_add_admin_container(
			array(
				'parent'          => $title_meta_box,
				'name'            => 'mkdf_show_title_area_meta_container',
				'hidden_property' => 'mkdf_show_title_area_meta',
				'hidden_value'    => 'no'
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_title_area_type_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Title Area Type', 'mediclinic' ),
				'description'   => esc_html__( 'Choose title type', 'mediclinic' ),
				'parent'        => $show_title_area_meta_container,
				'options'       => array(
					''           => esc_html__( 'Default', 'mediclinic' ),
					'standard'   => esc_html__( 'Standard', 'mediclinic' ),
					'breadcrumb' => esc_html__( 'Breadcrumb', 'mediclinic' )
				),
				'args'          => array(
					"dependence" => true,
					"hide"       => array(
						"standard"   => "",
						"breadcrumb" => "#mkdf_mkdf_title_area_type_meta_container"
					),
					"show"       => array(
						""           => "#mkdf_mkdf_title_area_type_meta_container",
						"standard"   => "#mkdf_mkdf_title_area_type_meta_container",
						"breadcrumb" => ""
					)
				)
			)
		);
		
		$title_area_type_meta_container = mediclinic_mikado_add_admin_container(
			array(
				'parent'          => $show_title_area_meta_container,
				'name'            => 'mkdf_title_area_type_meta_container',
				'hidden_property' => 'mkdf_title_area_type_meta',
				'hidden_value'    => 'breadcrumb'
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_title_area_enable_breadcrumbs_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Enable Breadcrumbs', 'mediclinic' ),
				'description'   => esc_html__( 'This option will display Breadcrumbs in Title Area', 'mediclinic' ),
				'parent'        => $title_area_type_meta_container,
				'options'       => mediclinic_mikado_get_yes_no_select_array()
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_title_area_vertical_alignment_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Vertical Alignment', 'mediclinic' ),
				'description'   => esc_html__( 'Specify title vertical alignment', 'mediclinic' ),
				'parent'        => $show_title_area_meta_container,
				'options'       => array(
					''              => esc_html__( 'Default', 'mediclinic' ),
					'header_bottom' => esc_html__( 'From Bottom of Header', 'mediclinic' ),
					'window_top'    => esc_html__( 'From Window Top', 'mediclinic' )
				)
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_title_area_content_alignment_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Horizontal Alignment', 'mediclinic' ),
				'description'   => esc_html__( 'Specify title horizontal alignment', 'mediclinic' ),
				'parent'        => $show_title_area_meta_container,
				'options'       => array(
					''       => esc_html__( 'Default', 'mediclinic' ),
					'left'   => esc_html__( 'Left', 'mediclinic' ),
					'center' => esc_html__( 'Center', 'mediclinic' ),
					'right'  => esc_html__( 'Right', 'mediclinic' )
				)
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_title_area_title_tag_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Title Tag', 'mediclinic' ),
				'parent'        => $title_area_type_meta_container,
				'options'       => mediclinic_mikado_get_title_tag( true )
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_title_text_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Title Color', 'mediclinic' ),
				'description' => esc_html__( 'Choose a color for title text', 'mediclinic' ),
				'parent'      => $show_title_area_meta_container
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_title_area_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'mediclinic' ),
				'description' => esc_html__( 'Choose a background color for title area', 'mediclinic' ),
				'parent'      => $show_title_area_meta_container
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_hide_background_image_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Hide Background Image', 'mediclinic' ),
				'description'   => esc_html__( 'Enable this option to hide background image in title area', 'mediclinic' ),
				'parent'        => $show_title_area_meta_container,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "#mkdf_mkdf_hide_background_image_meta_container",
					"dependence_show_on_yes" => ""
				)
			)
		);
		
		$hide_background_image_meta_container = mediclinic_mikado_add_admin_container(
			array(
				'parent'          => $show_title_area_meta_container,
				'name'            => 'mkdf_hide_background_image_meta_container',
				'hidden_property' => 'mkdf_hide_background_image_meta',
				'hidden_value'    => 'yes'
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_title_area_background_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Background Image', 'mediclinic' ),
				'description' => esc_html__( 'Choose an Image for title area', 'mediclinic' ),
				'parent'      => $hide_background_image_meta_container
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_title_area_background_image_responsive_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Background Responsive Image', 'mediclinic' ),
				'description'   => esc_html__( 'Enabling this option will make Title background image responsive', 'mediclinic' ),
				'parent'        => $hide_background_image_meta_container,
				'options'       => mediclinic_mikado_get_yes_no_select_array(),
				'args'          => array(
					"dependence" => true,
					"hide"       => array(
						""    => "",
						"no"  => "",
						"yes" => "#mkdf_mkdf_title_area_background_image_responsive_meta_container, #mkdf_mkdf_title_area_height_meta"
					),
					"show"       => array(
						""    => "#mkdf_mkdf_title_area_background_image_responsive_meta_container, #mkdf_mkdf_title_area_height_meta",
						"no"  => "#mkdf_mkdf_title_area_background_image_responsive_meta_container, #mkdf_mkdf_title_area_height_meta",
						"yes" => ""
					)
				)
			)
		);
		
		$title_area_background_image_responsive_meta_container = mediclinic_mikado_add_admin_container(
			array(
				'parent'          => $hide_background_image_meta_container,
				'name'            => 'mkdf_title_area_background_image_responsive_meta_container',
				'hidden_property' => 'mkdf_title_area_background_image_responsive_meta',
				'hidden_value'    => 'yes'
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_title_area_background_image_parallax_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Background Image in Parallax', 'mediclinic' ),
				'description'   => esc_html__( 'Enabling this option will make Title background image parallax', 'mediclinic' ),
				'parent'        => $title_area_background_image_responsive_meta_container,
				'options'       => array(
					''         => esc_html__( 'Default', 'mediclinic' ),
					'no'       => esc_html__( 'No', 'mediclinic' ),
					'yes'      => esc_html__( 'Yes', 'mediclinic' ),
					'yes_zoom' => esc_html__( 'Yes, with zoom out', 'mediclinic' )
				)
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_title_area_height_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Height', 'mediclinic' ),
				'description' => esc_html__( 'Set a height for Title Area', 'mediclinic' ),
				'parent'      => $show_title_area_meta_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_title_area_subtitle_meta',
				'type'          => 'text',
				'default_value' => '',
				'label'         => esc_html__( 'Subtitle Text', 'mediclinic' ),
				'description'   => esc_html__( 'Enter your subtitle text', 'mediclinic' ),
				'parent'        => $show_title_area_meta_container,
				'args'          => array(
					'col_width' => 6
				)
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_subtitle_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Subtitle Color', 'mediclinic' ),
				'description' => esc_html__( 'Choose a color for subtitle text', 'mediclinic' ),
				'parent'      => $show_title_area_meta_container
			)
		);
		
		mediclinic_mikado_create_meta_box_field(array(
			'name' => 'mkdf_subtitle_side_padding_meta',
			'type' => 'text',
			'label' => esc_html__('Subtitle Side Padding', 'mediclinic'),
			'description' => esc_html__('Set left/right padding for subtitle area', 'mediclinic'),
			'parent' => $show_title_area_meta_container,
			'args' => array(
				'col_width' => 2,
				'suffix' => '%'
			)
		));
	}
	
	add_action( 'mediclinic_mikado_meta_boxes_map', 'mediclinic_mikado_map_title_meta', 60 );
}