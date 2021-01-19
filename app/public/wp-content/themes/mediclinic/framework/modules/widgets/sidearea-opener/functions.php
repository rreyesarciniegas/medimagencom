<?php

if(!function_exists('mediclinic_mikado_register_sidearea_opener_widget')) {
	/**
	 * Function that register sidearea opener widget
	 */
	function mediclinic_mikado_register_sidearea_opener_widget($widgets) {
		$widgets[] = 'MediclinicMikadoSideAreaOpener';
		
		return $widgets;
	}
	
	add_filter('mediclinic_mikado_register_widgets', 'mediclinic_mikado_register_sidearea_opener_widget');
}