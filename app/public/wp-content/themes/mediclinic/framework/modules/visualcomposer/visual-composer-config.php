<?php

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if ( function_exists( 'vc_set_as_theme' ) ) {
	vc_set_as_theme( true );
}

/**
 * Change path for overridden templates
 */
if ( function_exists( 'vc_set_shortcodes_templates_dir' ) ) {
	$dir = MIKADO_ROOT_DIR . '/vc-templates';
	vc_set_shortcodes_templates_dir( $dir );
}

if ( ! function_exists( 'mediclinic_mikado_configure_visual_composer_frontend_editor' ) ) {
	/**
	 * Configuration for Visual Composer FrontEnd Editor
	 * Hooks on vc_after_init action
	 */
	function mediclinic_mikado_configure_visual_composer_frontend_editor() {
		/**
		 * Remove frontend editor
		 */
		if ( function_exists( 'vc_disable_frontend' ) ) {
			vc_disable_frontend();
		}
	}
	
	add_action( 'vc_after_init', 'mediclinic_mikado_configure_visual_composer_frontend_editor' );
}

if ( ! function_exists( 'mediclinic_mikado_vc_row_map' ) ) {
	/**
	 * Map VC Row shortcode
	 * Hooks on vc_after_init action
	 */
	function mediclinic_mikado_vc_row_map() {
		
		/******* VC Row shortcode - begin *******/
		
			vc_add_param( 'vc_row',
				array(
					'type'       => 'dropdown',
					'param_name' => 'row_content_width',
					'heading'    => esc_html__( 'Mikado Row Content Width', 'mediclinic' ),
					'value'      => array(
						esc_html__( 'Full Width', 'mediclinic' ) => 'full-width',
						esc_html__( 'In Grid', 'mediclinic' )    => 'grid'
					),
					'group'      => esc_html__( 'Mikado Settings', 'mediclinic' )
				)
			);
			
			vc_add_param( 'vc_row',
				array(
					'type'        => 'textfield',
					'param_name'  => 'anchor',
					'heading'     => esc_html__( 'Mikado Anchor ID', 'mediclinic' ),
					'description' => esc_html__( 'For example "home"', 'mediclinic' ),
					'group'       => esc_html__( 'Mikado Settings', 'mediclinic' )
				)
			);
			
			vc_add_param( 'vc_row',
				array(
					'type'       => 'colorpicker',
					'param_name' => 'simple_background_color',
					'heading'    => esc_html__( 'Mikado Background Color', 'mediclinic' ),
					'group'      => esc_html__( 'Mikado Settings', 'mediclinic' )
				)
			);
			
			vc_add_param( 'vc_row',
				array(
					'type'       => 'attach_image',
					'param_name' => 'simple_background_image',
					'heading'    => esc_html__( 'Mikado Background Image', 'mediclinic' ),
					'group'      => esc_html__( 'Mikado Settings', 'mediclinic' )
				)
			);
			
			vc_add_param( 'vc_row',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_background_image',
					'heading'     => esc_html__( 'Mikado Disable Background Image', 'mediclinic' ),
					'value'       => array(
						esc_html__( 'Never', 'mediclinic' )        => '',
						esc_html__( 'Below 1280px', 'mediclinic' ) => '1280',
						esc_html__( 'Below 1024px', 'mediclinic' ) => '1024',
						esc_html__( 'Below 768px', 'mediclinic' )  => '768',
						esc_html__( 'Below 680px', 'mediclinic' )  => '680',
						esc_html__( 'Below 480px', 'mediclinic' )  => '480'
					),
					'save_always' => true,
					'description' => esc_html__( 'Choose on which stage you hide row background image', 'mediclinic' ),
					'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
					'group'       => esc_html__( 'Mikado Settings', 'mediclinic' )
				)
			);
			
			vc_add_param( 'vc_row',
				array(
					'type'       => 'attach_image',
					'param_name' => 'parallax_background_image',
					'heading'    => esc_html__( 'Mikado Parallax Background Image', 'mediclinic' ),
					'group'      => esc_html__( 'Mikado Settings', 'mediclinic' )
				)
			);
			
			vc_add_param( 'vc_row',
				array(
					'type'        => 'textfield',
					'param_name'  => 'parallax_bg_speed',
					'heading'     => esc_html__( 'Mikado Parallax Speed', 'mediclinic' ),
					'description' => esc_html__( 'Set your parallax speed. Default value is 1.', 'mediclinic' ),
					'dependency'  => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
					'group'       => esc_html__( 'Mikado Settings', 'mediclinic' )
				)
			);
			
			vc_add_param( 'vc_row',
				array(
					'type'       => 'textfield',
					'param_name' => 'parallax_bg_height',
					'heading'    => esc_html__( 'Mikado Parallax Section Height (px)', 'mediclinic' ),
					'dependency' => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
					'group'      => esc_html__( 'Mikado Settings', 'mediclinic' )
				)
			);
			
			vc_add_param( 'vc_row',
				array(
					'type'       => 'dropdown',
					'param_name' => 'content_text_aligment',
					'heading'    => esc_html__( 'Mikado Content Aligment', 'mediclinic' ),
					'value'      => array(
						esc_html__( 'Default', 'mediclinic' ) => '',
						esc_html__( 'Left', 'mediclinic' )    => 'left',
						esc_html__( 'Center', 'mediclinic' )  => 'center',
						esc_html__( 'Right', 'mediclinic' )   => 'right'
					),
					'group'      => esc_html__( 'Mikado Settings', 'mediclinic' )
				)
			);

			vc_add_param('vc_row',
				array(
				'type' => 'textfield',
				'param_name' => 'scrolling_text',
				'heading' => esc_html__('Full width scrolling text in background', 'mediclinic'),
				'value' => '',
				'description' => '',
				'group'      => esc_html__( 'Mikado Settings', 'mediclinic' )
				)
			);

			vc_add_param('vc_row',
				array(
				'type' => 'colorpicker',
				'heading' => esc_html__('Scrolling Text Color', 'mediclinic'),
				'param_name' => 'scrolling_text_color',
				'group'       => esc_html__('Scrolling Text Style', 'mediclinic'),
				'value' => '',
				'description' => '',
				'dependency' => Array('element' => 'scrolling_text',  'not_empty' => true)
				)
			);

			vc_add_param('vc_row',
				array(
				'type' => 'textfield',
				'heading' => esc_html__('Scrolling Text Font Size', 'mediclinic'),
				'param_name' => 'scrolling_text_font_size',
				'group'       => esc_html__('Scrolling Text Style', 'mediclinic'),
				'value' => '',
				'description' => '',
				'dependency' => Array('element' => 'scrolling_text',  'not_empty' => true)
				)
			);

			vc_add_param('vc_row',
				array(
				"type" => "textfield",
				"heading" => esc_html__("Scrolling Text Font family", 'mediclinic'),
				"param_name" => "scrolling_text_font_family",
				'group'       => esc_html__('Scrolling Text Style', 'mediclinic'),
				"value" => "",
				'dependency' => Array('element' => 'scrolling_text',  'not_empty' => true)
				)
			);

			vc_add_param('vc_row',
				array(
				'type' => 'dropdown',
				'heading' => esc_html__('Scrolling Text Font Weight', 'mediclinic'),
				'param_name' => 'scrolling_text_font_weight',
				'group'       => esc_html__('Scrolling Text Style', 'mediclinic'),
				'value' => mediclinic_mikado_get_font_weight_array(true),
				'dependency' => Array('element' => 'scrolling_text',  'not_empty' => true)
				)
			);

			vc_add_param('vc_row',
				array(
				'type' => 'textfield',
				'heading' => esc_html__('Scrolling Text Letter Spacing', 'mediclinic'),
				'param_name' => 'scrolling_text_letter_spacing',
				'group'       => esc_html__('Scrolling Text Style', 'mediclinic'),
				'value' => '',
				'description' => '',
				'dependency' => Array('element' => 'scrolling_text',  'not_empty' => true)
				)
			);

			vc_add_param('vc_row',
				array(
				'type' => 'dropdown',
				'heading' => esc_html__('Scrolling Text Text Transform', 'mediclinic'),
				'param_name' => 'scrolling_text_text_transform',
				'group'       => esc_html__('Scrolling Text Style', 'mediclinic'),
				'value' => mediclinic_mikado_get_text_transform_array(true),
				'dependency' => Array('element' => 'scrolling_text',  'not_empty' => true)
				)
			);

			vc_add_param('vc_row',
				array(
				'type' => 'dropdown',
				'heading' => esc_html__('Scrolling Text Font Style', 'mediclinic'),
				'param_name' => 'scrolling_text_font_style',
				'group'       => esc_html__('Scrolling Text Style', 'mediclinic'),
				"value" => mediclinic_mikado_get_font_style_array(true),
				'description' => '',
				'dependency' => Array('element' => 'scrolling_text',  'not_empty' => true)
				)
			);

			vc_add_param('vc_row',
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Scrolling Text Top Position', 'mediclinic'),
					'param_name' => 'scrolling_text_top_position',
					'group'       => esc_html__('Scrolling Text Style', 'mediclinic'),
					'value' => '',
					'description' => '',
					'dependency' => Array('element' => 'scrolling_text',  'not_empty' => true)
				)
			);
		
		/******* VC Row shortcode - end *******/
		
		/******* VC Row Inner shortcode - begin *******/
		
			vc_add_param( 'vc_row_inner',
				array(
					'type'       => 'dropdown',
					'param_name' => 'row_content_width',
					'heading'    => esc_html__( 'Mikado Row Content Width', 'mediclinic' ),
					'value'      => array(
						esc_html__( 'Full Width', 'mediclinic' ) => 'full-width',
						esc_html__( 'In Grid', 'mediclinic' )    => 'grid'
					),
					'group'      => esc_html__( 'Mikado Settings', 'mediclinic' )
				)
			);
			
			vc_add_param( 'vc_row_inner',
				array(
					'type'       => 'colorpicker',
					'param_name' => 'simple_background_color',
					'heading'    => esc_html__( 'Mikado Background Color', 'mediclinic' ),
					'group'      => esc_html__( 'Mikado Settings', 'mediclinic' )
				)
			);
			
			vc_add_param( 'vc_row_inner',
				array(
					'type'       => 'attach_image',
					'param_name' => 'simple_background_image',
					'heading'    => esc_html__( 'Mikado Background Image', 'mediclinic' ),
					'group'      => esc_html__( 'Mikado Settings', 'mediclinic' )
				)
			);
			
			vc_add_param( 'vc_row_inner',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_background_image',
					'heading'     => esc_html__( 'Mikado Disable Background Image', 'mediclinic' ),
					'value'       => array(
						esc_html__( 'Never', 'mediclinic' )        => '',
						esc_html__( 'Below 1280px', 'mediclinic' ) => '1280',
						esc_html__( 'Below 1024px', 'mediclinic' ) => '1024',
						esc_html__( 'Below 768px', 'mediclinic' )  => '768',
						esc_html__( 'Below 680px', 'mediclinic' )  => '680',
						esc_html__( 'Below 480px', 'mediclinic' )  => '480'
					),
					'save_always' => true,
					'description' => esc_html__( 'Choose on which stage you hide row background image', 'mediclinic' ),
					'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
					'group'       => esc_html__( 'Mikado Settings', 'mediclinic' )
				)
			);
			
			vc_add_param( 'vc_row_inner',
				array(
					'type'       => 'dropdown',
					'param_name' => 'content_text_aligment',
					'heading'    => esc_html__( 'Mikado Content Aligment', 'mediclinic' ),
					'value'      => array(
						esc_html__( 'Default', 'mediclinic' ) => '',
						esc_html__( 'Left', 'mediclinic' )    => 'left',
						esc_html__( 'Center', 'mediclinic' )  => 'center',
						esc_html__( 'Right', 'mediclinic' )   => 'right'
					),
					'group'      => esc_html__( 'Mikado Settings', 'mediclinic' )
				)
			);
		
		/******* VC Row Inner shortcode - end *******/
		
		/******* VC Revolution Slider shortcode - begin *******/
		
		if ( mediclinic_mikado_revolution_slider_installed() ) {
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'       => 'dropdown',
					'param_name' => 'enable_paspartu',
					'heading'    => esc_html__( 'Mikado Enable Passepartout', 'mediclinic' ),
					'value'      => array_flip( mediclinic_mikado_get_yes_no_select_array( false ) ),
					'group'      => esc_html__( 'Mikado Settings', 'mediclinic' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'textfield',
					'param_name'  => 'paspartu_size',
					'heading'     => esc_html__( 'Mikado Passepartout Size', 'mediclinic' ),
					'description' => esc_html__( 'Set your passepartout size in format top right bottom left. You can use px or %, for example 0 20px 20px 20px', 'mediclinic' ),
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Mikado Settings', 'mediclinic' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'colorpicker',
					'param_name'  => 'paspartu_color',
					'heading'     => esc_html__( 'Mikado Passepartout Color', 'mediclinic' ),
					'description' => esc_html__( 'Set your passepartout color', 'mediclinic' ),
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Mikado Settings', 'mediclinic' )
				)
			);
		}
		
		/******* VC Revolution Slider shortcode - end *******/
	}
	
	add_action( 'vc_after_init', 'mediclinic_mikado_vc_row_map' );
}