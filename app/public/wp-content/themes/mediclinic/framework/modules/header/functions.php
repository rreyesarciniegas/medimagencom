<?php

if(!function_exists('mediclinic_mikado_include_header_types')) {
	/**
	 * Load's all header types by going through all folders that are placed directly in header types folder
	 */
	function mediclinic_mikado_include_header_types() {
		foreach(glob(MIKADO_FRAMEWORK_HEADER_ROOT_DIR.'/types/*/load.php') as $module_load) {
			include_once $module_load;
		}
	}
	
	add_action('init', 'mediclinic_mikado_include_header_types', 0); // 0 is set so we can be able to register widgets for header types because of widget_ini action
}

if(!function_exists('mediclinic_mikado_include_header_types_for_global_options')) {
	/**
	 * Load's all header types before load files by going through all folders that are placed directly in header types folder.
	 * Functions from this files before-load are used to set all hooks and variables before global options map are init
	 */
	function mediclinic_mikado_include_header_types_for_global_options() {
		foreach(glob(MIKADO_FRAMEWORK_HEADER_ROOT_DIR.'/types/*/before-load.php') as $module_load) {
			include_once $module_load;
		}
	}
	
	add_action('mediclinic_mikado_options_map', 'mediclinic_mikado_include_header_types_for_global_options', 1); // 1 is set to just be before header option map init
}

if(!function_exists('mediclinic_mikado_header_register_main_navigation')) {
    /**
     * Registers main navigation
     */
    function mediclinic_mikado_header_register_main_navigation() {
    	$headers_menu_array = apply_filters('mediclinic_mikado_register_headers_menu', array('main-navigation' => esc_html__('Main Navigation', 'mediclinic')));
	    
        register_nav_menus($headers_menu_array);
    }

    add_action('init', 'mediclinic_mikado_header_register_main_navigation');
}

if(!function_exists('mediclinic_mikado_header_widget_areas')) {
	/**
	 * Registers widget areas for header types
	 */
	function mediclinic_mikado_header_widget_areas() {
		if( mediclinic_mikado_core_plugin_installed()) {
			register_sidebar(
				array(
					'name' => esc_html__('Header Widget Logo Area', 'mediclinic'),
					'id' => 'mkdf-header-widget-logo-area',
					'before_widget' => '<div id="%1$s" class="widget %2$s mkdf-header-widget-logo-area">',
					'after_widget' => '</div>',
					'description' => esc_html__('Widgets added here will appear in the logo area', 'mediclinic')
				)
			);

			register_sidebar(
				array(
					'name' => esc_html__('Header Widget Menu Area', 'mediclinic'),
					'id' => 'mkdf-header-widget-menu-area',
					'before_widget' => '<div id="%1$s" class="widget %2$s mkdf-header-widget-menu-area">',
					'after_widget' => '</div>',
					'description' => esc_html__('Widgets added here will appear in the menu area', 'mediclinic')
				)
			);

		}
	}
	
	add_action('widgets_init', 'mediclinic_mikado_header_widget_areas');
}