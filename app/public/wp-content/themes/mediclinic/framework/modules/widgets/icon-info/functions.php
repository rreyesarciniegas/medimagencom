<?php

if(!function_exists('mediclinic_mikado_register_icon_info_widget')) {
	/**
	 * Function that register button widget
	 */
	function mediclinic_mikado_register_icon_info_widget($widgets) {
		$widgets[] = 'MediclinicMikadoIconInfoWidget';
		
		return $widgets;
	}
	
	add_filter('mediclinic_mikado_register_widgets', 'mediclinic_mikado_register_icon_info_widget');
}