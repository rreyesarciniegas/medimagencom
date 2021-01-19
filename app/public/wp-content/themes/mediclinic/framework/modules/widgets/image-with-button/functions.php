<?php

if(!function_exists('mediclinic_mikado_register_image_with_button_widget')) {
	/**
	 * Function that register image gallery widget
	 */
	function mediclinic_mikado_register_image_with_button_widget($widgets) {
		$widgets[] = 'MediclinicMikadoImageWithButtonWidget';
		
		return $widgets;
	}
	
	add_filter('mediclinic_mikado_register_widgets', 'mediclinic_mikado_register_image_with_button_widget');
}