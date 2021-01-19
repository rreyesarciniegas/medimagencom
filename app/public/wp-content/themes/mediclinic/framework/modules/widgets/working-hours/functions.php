<?php

if(!function_exists('mediclinic_mikado_register_working_hours_widget')) {
	/**
	 * Function that register separator widget
	 */
	function mediclinic_mikado_register_working_hours_widget($widgets) {
		$widgets[] = 'MediclinicMikadoWorkingHoursWidget';
		
		return $widgets;
	}
	
	add_filter('mediclinic_mikado_register_widgets', 'mediclinic_mikado_register_working_hours_widget');
}