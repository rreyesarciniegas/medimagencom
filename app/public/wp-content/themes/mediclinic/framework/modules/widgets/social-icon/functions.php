<?php

if(!function_exists('mediclinic_mikado_register_social_icon_widget')) {
	/**
	 * Function that register social icon widget
	 */
	function mediclinic_mikado_register_social_icon_widget($widgets) {
		$widgets[] = 'MediclinicMikadoSocialIconWidget';
		
		return $widgets;
	}
	
	add_filter('mediclinic_mikado_register_widgets', 'mediclinic_mikado_register_social_icon_widget');
}