<?php

if ( ! function_exists( 'mediclinic_mikado_reset_options_map' ) ) {
	/**
	 * Reset options panel
	 */
	function mediclinic_mikado_reset_options_map() {
		
		mediclinic_mikado_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => esc_html__( 'Reset', 'mediclinic' ),
				'icon'  => 'fa fa-retweet'
			)
		);
		
		$panel_reset = mediclinic_mikado_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => esc_html__( 'Reset', 'mediclinic' )
			)
		);
		
		mediclinic_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'reset_to_defaults',
				'default_value' => 'no',
				'label'         => esc_html__( 'Reset to Defaults', 'mediclinic' ),
				'description'   => esc_html__( 'This option will reset all Select Options values to defaults', 'mediclinic' ),
				'parent'        => $panel_reset
			)
		);
	}
	
	add_action( 'mediclinic_mikado_options_map', 'mediclinic_mikado_reset_options_map', 100 );
}