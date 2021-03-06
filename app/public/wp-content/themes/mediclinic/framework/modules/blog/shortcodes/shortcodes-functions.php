<?php

if(!function_exists('mediclinic_mikado_include_blog_shortcodes')) {
	function mediclinic_mikado_include_blog_shortcodes() {
		include_once MIKADO_FRAMEWORK_MODULES_ROOT_DIR.'/blog/shortcodes/blog-list/blog-list.php';
	}
	
	if(mediclinic_mikado_core_plugin_installed()) {
		add_action('mkdf_core_action_include_shortcodes_file', 'mediclinic_mikado_include_blog_shortcodes');
	}
}

if(!function_exists('mediclinic_mikado_add_blog_shortcodes')) {
	function mediclinic_mikado_add_blog_shortcodes($shortcodes_class_name) {
		$shortcodes = array(
			'MikadoCore\CPT\Shortcodes\BlogList\BlogList',
		);
		
		$shortcodes_class_name = array_merge($shortcodes_class_name, $shortcodes);
		
		return $shortcodes_class_name;
	}
	
	if(mediclinic_mikado_core_plugin_installed()) {
		add_filter('mkdf_core_filter_add_vc_shortcode', 'mediclinic_mikado_add_blog_shortcodes');
	}
}

if ( ! function_exists( 'mediclinic_mikado_set_blog_list_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for blog shortcodes to set our icon for Visual Composer shortcodes panel
	 */
	function mediclinic_mikado_set_blog_list_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-blog-list';

		return $shortcodes_icon_class_array;
	}
	
	if ( mediclinic_mikado_core_plugin_installed() ) {
		add_filter( 'mkdf_core_filter_add_vc_shortcodes_custom_icon_class', 'mediclinic_mikado_set_blog_list_icon_class_name_for_vc_shortcodes' );
	}
}