<?php

if(!function_exists('mediclinic_mikado_register_button_widget')) {
	/**
	 * Function that register button widget
	 */
	function mediclinic_mikado_register_button_widget($widgets) {
		$widgets[] = 'MediclinicMikadoButtonWidget';
		
		return $widgets;
	}
	
	add_filter('mediclinic_mikado_register_widgets', 'mediclinic_mikado_register_button_widget');
}