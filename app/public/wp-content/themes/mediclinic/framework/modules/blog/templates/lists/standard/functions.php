<?php

if ( ! function_exists( 'mediclinic_mikado_register_blog_standard_template_file' ) ) {
	/**
	 * Function that register blog standard template
	 */
	function mediclinic_mikado_register_blog_standard_template_file( $templates ) {
		$templates['blog-standard'] = esc_html__( 'Blog: Standard', 'mediclinic' );
		
		return $templates;
	}
	
	add_filter( 'mediclinic_mikado_register_blog_templates', 'mediclinic_mikado_register_blog_standard_template_file' );
}