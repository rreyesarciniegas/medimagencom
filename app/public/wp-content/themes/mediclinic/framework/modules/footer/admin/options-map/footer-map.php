<?php

if ( ! function_exists('mediclinic_mikado_footer_options_map') ) {
	/**
	 * Add footer options
	 */
	function mediclinic_mikado_footer_options_map() {

		mediclinic_mikado_add_admin_page(
			array(
				'slug' => '_footer_page',
				'title' => esc_html__('Footer', 'mediclinic'),
				'icon' => 'fa fa-sort-amount-asc'
			)
		);

		$footer_panel = mediclinic_mikado_add_admin_panel(
			array(
				'title' => esc_html__('Footer', 'mediclinic'),
				'name' => 'footer',
				'page' => '_footer_page'
			)
		);

		mediclinic_mikado_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'footer_in_grid',
				'default_value' => 'yes',
				'label' => esc_html__('Footer in Grid', 'mediclinic'),
				'description' => esc_html__('Enabling this option will place Footer content in grid', 'mediclinic'),
				'parent' => $footer_panel,
			)
		);

		mediclinic_mikado_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'show_footer_top',
				'default_value' => 'yes',
				'label' => esc_html__('Show Footer Top', 'mediclinic'),
				'description' => esc_html__('Enabling this option will show Footer Top area', 'mediclinic'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#mkdf_show_footer_top_container'
				),
				'parent' => $footer_panel,
			)
		);

		$show_footer_top_container = mediclinic_mikado_add_admin_container(
			array(
				'name' => 'show_footer_top_container',
				'hidden_property' => 'show_footer_top',
				'hidden_value' => 'no',
				'parent' => $footer_panel
			)
		);

		mediclinic_mikado_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_top_columns',
				'parent' => $show_footer_top_container,
				'default_value' => '4',
				'label' => esc_html__('Footer Top Columns', 'mediclinic'),
				'description' => esc_html__('Choose number of columns for Footer Top area', 'mediclinic'),
				'options' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4'
				)
			)
		);

		mediclinic_mikado_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_top_columns_alignment',
				'default_value' => 'left',
				'label' => esc_html__('Footer Top Columns Alignment', 'mediclinic'),
				'description' => esc_html__('Text Alignment in Footer Columns', 'mediclinic'),
				'options' => array(
					''       => esc_html__('Default', 'mediclinic'),
					'left'   => esc_html__('Left', 'mediclinic'),
					'center' => esc_html__('Center', 'mediclinic'),
					'right'  => esc_html__('Right', 'mediclinic')
				),
				'parent' => $show_footer_top_container,
			)
		);

		mediclinic_mikado_add_admin_field(array(
			'name' => 'footer_top_background_color',
			'type' => 'color',
			'label' => esc_html__('Background Color', 'mediclinic'),
			'description' => esc_html__('Set background color for top footer area', 'mediclinic'),
			'parent' => $show_footer_top_container
		));

		mediclinic_mikado_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'show_footer_bottom',
				'default_value' => 'yes',
				'label' => esc_html__('Show Footer Bottom', 'mediclinic'),
				'description' => esc_html__('Enabling this option will show Footer Bottom area', 'mediclinic'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#mkdf_show_footer_bottom_container'
				),
				'parent' => $footer_panel,
			)
		);

		$show_footer_bottom_container = mediclinic_mikado_add_admin_container(
			array(
				'name' => 'show_footer_bottom_container',
				'hidden_property' => 'show_footer_bottom',
				'hidden_value' => 'no',
				'parent' => $footer_panel
			)
		);

		mediclinic_mikado_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_bottom_columns',
				'default_value' => '4',
				'label' => esc_html__('Footer Bottom Columns', 'mediclinic'),
				'description' => esc_html__('Choose number of columns for Footer Bottom area', 'mediclinic'),
				'options' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3'
				),
				'parent' => $show_footer_bottom_container,
			)
		);

		mediclinic_mikado_add_admin_field(array(
			'name' => 'footer_bottom_background_color',
			'type' => 'color',
			'label' => esc_html__('Background Color', 'mediclinic'),
			'description' => esc_html__('Set background color for bottom footer area', 'mediclinic'),
			'parent' => $show_footer_bottom_container
		));
	}

	add_action( 'mediclinic_mikado_options_map', 'mediclinic_mikado_footer_options_map', 11);
}