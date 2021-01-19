<?php

if(!function_exists('mediclinic_mikado_register_image_slider_widget')) {
	/**
	 * Function that register image slider widget
	 */
	function mediclinic_mikado_register_image_slider_widget($widgets) {
		$widgets[] = 'MediclinicMikadoImageSliderWidget';
		
		return $widgets;
	}
	
	add_filter('mediclinic_mikado_register_widgets', 'mediclinic_mikado_register_image_slider_widget');
}