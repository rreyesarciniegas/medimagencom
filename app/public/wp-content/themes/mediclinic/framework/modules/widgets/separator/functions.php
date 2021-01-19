<?php

if(!function_exists('mediclinic_mikado_register_separator_widget')) {
	/**
	 * Function that register separator widget
	 */
	function mediclinic_mikado_register_separator_widget($widgets) {
		$widgets[] = 'MediclinicMikadoSeparatorWidget';
		
		return $widgets;
	}
	
	add_filter('mediclinic_mikado_register_widgets', 'mediclinic_mikado_register_separator_widget');
}