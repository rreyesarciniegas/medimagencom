<?php

if(!function_exists('mediclinic_mikado_register_blog_list_widget')) {
	/**
	 * Function that register blog list widget
	 */
	function mediclinic_mikado_register_blog_list_widget($widgets) {
		$widgets[] = 'MediclinicMikadoBlogListWidget';
		
		return $widgets;
	}
	
	add_filter('mediclinic_mikado_register_widgets', 'mediclinic_mikado_register_blog_list_widget');
}