<?php

if ( ! function_exists( 'mediclinic_mikado_register_header_standard_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function mediclinic_mikado_register_header_standard_type( $header_types ) {
		$header_type = array(
			'header-standard' => 'MediclinicMikado\Modules\Header\Types\HeaderStandard'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'mediclinic_mikado_init_register_header_standard_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function mediclinic_mikado_init_register_header_standard_type() {
		add_filter( 'mediclinic_mikado_register_header_type_class', 'mediclinic_mikado_register_header_standard_type' );
	}
	
	add_action( 'mediclinic_mikado_before_header_function_init', 'mediclinic_mikado_init_register_header_standard_type' );
}