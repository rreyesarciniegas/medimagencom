<?php

if(mediclinic_mikado_contact_form_7_installed()) {
	include_once MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/widgets/contact-form-7/contact-form-7.php';
	add_filter('mediclinic_mikado_register_widgets', 'mediclinic_mikado_register_cf7_widget');
}

if(!function_exists('mediclinic_mikado_register_cf7_widget')) {
	/**
	 * Function that register cf7 widget
	 */
	function mediclinic_mikado_register_cf7_widget($widgets) {
		$widgets[] = 'MediclinicMikadoContactForm7Widget';
		
		return $widgets;
	}
}