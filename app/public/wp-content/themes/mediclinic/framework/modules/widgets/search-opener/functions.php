<?php

if(!function_exists('mediclinic_mikado_register_search_opener_widget')) {
	/**
	 * Function that register search opener widget
	 */
	function mediclinic_mikado_register_search_opener_widget($widgets) {
		$widgets[] = 'MediclinicMikadoSearchOpener';
		
		return $widgets;
	}
	
	add_filter('mediclinic_mikado_register_widgets', 'mediclinic_mikado_register_search_opener_widget');
}