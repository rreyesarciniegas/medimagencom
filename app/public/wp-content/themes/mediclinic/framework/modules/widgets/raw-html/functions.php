<?php

if(!function_exists('mediclinic_mikado_register_raw_html_widget')) {
	/**
	 * Function that register raw html widget
	 */
	function mediclinic_mikado_register_raw_html_widget($widgets) {
		$widgets[] = 'MediclinicMikadoRawHTMLWidget';
		
		return $widgets;
	}
	
	add_filter('mediclinic_mikado_register_widgets', 'mediclinic_mikado_register_raw_html_widget');
}