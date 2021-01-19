<?php

if ( ! function_exists('mediclinic_mikado_sidebar_options_map') ) {

	function mediclinic_mikado_sidebar_options_map() {


		$sidebar_panel = mediclinic_mikado_add_admin_panel(
			array(
				'title' => esc_html__('Sidebar Area', 'mediclinic'),
				'name' => 'sidebar',
				'page' => '_page_page'
			)
		);
		
		mediclinic_mikado_add_admin_field(array(
			'name'          => 'sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__('Sidebar Layout', 'mediclinic'),
			'description'   => esc_html__('Choose a sidebar layout for pages', 'mediclinic'),
			'parent'        => $sidebar_panel,
			'default_value' => 'no-sidebar',
			'options'       => array(
				'no-sidebar'        => esc_html__('No Sidebar', 'mediclinic'),
				'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'mediclinic'),
				'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'mediclinic'),
				'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'mediclinic'),
				'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'mediclinic')
			)
		));
		
		$mediclinic_custom_sidebars = mediclinic_mikado_get_custom_sidebars();
		if(count($mediclinic_custom_sidebars) > 0) {
			mediclinic_mikado_add_admin_field(array(
				'name' => 'custom_sidebar_area',
				'type' => 'selectblank',
				'label' => esc_html__('Sidebar to Display', 'mediclinic'),
				'description' => esc_html__('Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'mediclinic'),
				'parent' => $sidebar_panel,
				'options' => $mediclinic_custom_sidebars,
				'args'        => array(
					'select2'	=> true
				)
			));
		}
	}

	add_action('mediclinic_mikado_page_sidebar_options_map', 'mediclinic_mikado_sidebar_options_map', 9);
}