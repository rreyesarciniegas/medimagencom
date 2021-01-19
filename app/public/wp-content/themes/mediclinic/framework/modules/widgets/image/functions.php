<?php

if(!function_exists('mediclinic_mikado_register_image_widget')) {
	/**
	 * Function that register image widget
	 */
	function mediclinic_mikado_register_image_widget($widgets) {
		$widgets[] = 'MediclinicMikadoImageWidget';
		
		return $widgets;
	}
	
	add_filter('mediclinic_mikado_register_widgets', 'mediclinic_mikado_register_image_widget');
}