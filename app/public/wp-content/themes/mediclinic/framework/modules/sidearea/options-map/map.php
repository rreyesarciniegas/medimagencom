<?php

if ( ! function_exists('mediclinic_mikado_sidearea_options_map') ) {

	function mediclinic_mikado_sidearea_options_map() {

		mediclinic_mikado_add_admin_page(
			array(
				'slug' => '_side_area_page',
				'title' => esc_html__('Side Area', 'mediclinic'),
				'icon' => 'fa fa-indent'
			)
		);

		$side_area_panel = mediclinic_mikado_add_admin_panel(
			array(
				'title' => esc_html__('Side Area', 'mediclinic'),
				'name' => 'side_area',
				'page' => '_side_area_page'
			)
		);

		$side_area_icon_style_group = mediclinic_mikado_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'side_area_icon_style_group',
				'title' => esc_html__('Side Area Icon Style', 'mediclinic'),
				'description' => esc_html__('Define styles for Side Area icon', 'mediclinic')
			)
		);

		$side_area_icon_style_row1 = mediclinic_mikado_add_admin_row(
			array(
				'parent'	=> $side_area_icon_style_group,
				'name'		=> 'side_area_icon_style_row1'
			)
		);

		mediclinic_mikado_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type' => 'colorsimple',
				'name' => 'side_area_icon_color',
				'label' => esc_html__('Color', 'mediclinic')
			)
		);

		mediclinic_mikado_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type' => 'colorsimple',
				'name' => 'side_area_icon_hover_color',
				'label' => esc_html__('Hover Color', 'mediclinic')
			)
		);

		$side_area_icon_style_row2 = mediclinic_mikado_add_admin_row(
			array(
				'parent'	=> $side_area_icon_style_group,
				'name'		=> 'side_area_icon_style_row2',
				'next'		=> true
			)
		);

		mediclinic_mikado_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type' => 'colorsimple',
				'name' => 'side_area_close_icon_color',
				'label' => esc_html__('Close Icon Color', 'mediclinic')
			)
		);

		mediclinic_mikado_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type' => 'colorsimple',
				'name' => 'side_area_close_icon_hover_color',
				'label' => esc_html__('Close Icon Hover Color', 'mediclinic')
			)
		);

		mediclinic_mikado_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'text',
				'name' => 'side_area_width',
				'default_value' => '',
				'label' => esc_html__('Side Area Width', 'mediclinic'),
				'description' => esc_html__('Enter a width for Side Area', 'mediclinic'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		mediclinic_mikado_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'color',
				'name' => 'side_area_background_color',
				'label' => esc_html__('Background Color', 'mediclinic'),
				'description' => esc_html__('Choose a background color for Side Area', 'mediclinic')
			)
		);
		
		mediclinic_mikado_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'text',
				'name' => 'side_area_padding',
				'label' => esc_html__('Padding', 'mediclinic'),
				'description' => esc_html__('Define padding for Side Area in format top right bottom left', 'mediclinic'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		mediclinic_mikado_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'selectblank',
				'name' => 'side_area_aligment',
				'default_value' => '',
				'label' => esc_html__('Text Alignment', 'mediclinic'),
				'description' => esc_html__('Choose text alignment for side area', 'mediclinic'),
				'options' => array(
					'' => esc_html__('Default', 'mediclinic'),
					'left' => esc_html__('Left', 'mediclinic'),
					'center' => esc_html__('Center', 'mediclinic'),
					'right' => esc_html__('Right', 'mediclinic')
				)
			)
		);
	}

	add_action('mediclinic_mikado_options_map', 'mediclinic_mikado_sidearea_options_map', 5);
}