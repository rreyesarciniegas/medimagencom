<?php

if(!function_exists('mediclinic_mikado_register_icon_widget')) {
	/**
	 * Function that register icon widget
	 */
	function mediclinic_mikado_register_icon_widget($widgets) {
		$widgets[] = 'MediclinicMikadoIconWidget';
		
		return $widgets;
	}
	
	add_filter('mediclinic_mikado_register_widgets', 'mediclinic_mikado_register_icon_widget');
}