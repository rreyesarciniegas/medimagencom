<?php

if ( ! function_exists( 'mediclinic_mikado_general_options_map' ) ) {
	/**
	 * General options page
	 */
	function mediclinic_mikado_general_options_map() {
		
		mediclinic_mikado_add_admin_page(
			array(
				'slug'  => '',
				'title' => esc_html__( 'General', 'mediclinic' ),
				'icon'  => 'fa fa-institution'
			)
		);

		/***************** Menu Area Layout - start **********************/

		do_action( 'mediclinic_mikado_logo_options_map' );

		/***************** Menu Area Layout - end **********************/
		
		$panel_design_style = mediclinic_mikado_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_design_style',
				'title' => esc_html__( 'Appearance', 'mediclinic' )
			)
		);
		
		mediclinic_mikado_add_admin_field(
			array(
				'name'          => 'google_fonts',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Google Font Family', 'mediclinic' ),
				'description'   => esc_html__( 'Choose a default Google font for your site', 'mediclinic' ),
				'parent'        => $panel_design_style
			)
		);
		
		mediclinic_mikado_add_admin_field(
			array(
				'name'          => 'additional_google_fonts',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Additional Google Fonts', 'mediclinic' ),
				'parent'        => $panel_design_style,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#mkdf_additional_google_fonts_container"
				)
			)
		);
		
		$additional_google_fonts_container = mediclinic_mikado_add_admin_container(
			array(
				'parent'          => $panel_design_style,
				'name'            => 'additional_google_fonts_container',
				'hidden_property' => 'additional_google_fonts',
				'hidden_value'    => 'no'
			)
		);
		
		mediclinic_mikado_add_admin_field(
			array(
				'name'          => 'additional_google_font1',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'mediclinic' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'mediclinic' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		mediclinic_mikado_add_admin_field(
			array(
				'name'          => 'additional_google_font2',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'mediclinic' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'mediclinic' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		mediclinic_mikado_add_admin_field(
			array(
				'name'          => 'additional_google_font3',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'mediclinic' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'mediclinic' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		mediclinic_mikado_add_admin_field(
			array(
				'name'          => 'additional_google_font4',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'mediclinic' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'mediclinic' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		mediclinic_mikado_add_admin_field(
			array(
				'name'          => 'additional_google_font5',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'mediclinic' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'mediclinic' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		mediclinic_mikado_add_admin_field(
			array(
				'name'          => 'google_font_weight',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Style & Weight', 'mediclinic' ),
				'description'   => esc_html__( 'Choose a default Google font weights for your site. Impact on page load time', 'mediclinic' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'100'       => esc_html__( '100 Thin', 'mediclinic' ),
					'100italic' => esc_html__( '100 Thin Italic', 'mediclinic' ),
					'200'       => esc_html__( '200 Extra-Light', 'mediclinic' ),
					'200italic' => esc_html__( '200 Extra-Light Italic', 'mediclinic' ),
					'300'       => esc_html__( '300 Light', 'mediclinic' ),
					'300italic' => esc_html__( '300 Light Italic', 'mediclinic' ),
					'400'       => esc_html__( '400 Regular', 'mediclinic' ),
					'400italic' => esc_html__( '400 Regular Italic', 'mediclinic' ),
					'500'       => esc_html__( '500 Medium', 'mediclinic' ),
					'500italic' => esc_html__( '500 Medium Italic', 'mediclinic' ),
					'600'       => esc_html__( '600 Semi-Bold', 'mediclinic' ),
					'600italic' => esc_html__( '600 Semi-Bold Italic', 'mediclinic' ),
					'700'       => esc_html__( '700 Bold', 'mediclinic' ),
					'700italic' => esc_html__( '700 Bold Italic', 'mediclinic' ),
					'800'       => esc_html__( '800 Extra-Bold', 'mediclinic' ),
					'800italic' => esc_html__( '800 Extra-Bold Italic', 'mediclinic' ),
					'900'       => esc_html__( '900 Ultra-Bold', 'mediclinic' ),
					'900italic' => esc_html__( '900 Ultra-Bold Italic', 'mediclinic' )
				)
			)
		);
		
		mediclinic_mikado_add_admin_field(
			array(
				'name'          => 'google_font_subset',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Subset', 'mediclinic' ),
				'description'   => esc_html__( 'Choose a default Google font subsets for your site', 'mediclinic' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'latin'        => esc_html__( 'Latin', 'mediclinic' ),
					'latin-ext'    => esc_html__( 'Latin Extended', 'mediclinic' ),
					'cyrillic'     => esc_html__( 'Cyrillic', 'mediclinic' ),
					'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'mediclinic' ),
					'greek'        => esc_html__( 'Greek', 'mediclinic' ),
					'greek-ext'    => esc_html__( 'Greek Extended', 'mediclinic' ),
					'vietnamese'   => esc_html__( 'Vietnamese', 'mediclinic' )
				)
			)
		);
		
		mediclinic_mikado_add_admin_field(
			array(
				'name'        => 'first_color',
				'type'        => 'color',
				'label'       => esc_html__( 'First Main Color', 'mediclinic' ),
				'description' => esc_html__( 'Choose the most dominant theme color. Default color is #43d5cb', 'mediclinic' ),
				'parent'      => $panel_design_style
			)
		);

        mediclinic_mikado_add_admin_field(
            array(
                'name'        => 'first_color_additional',
                'type'        => 'color',
                'label'       => esc_html__( 'First Main Color - Additional', 'mediclinic' ),
                'description' => esc_html__( 'Used mostly as additional color for hovers next to first main color. Default color is #37c7be', 'mediclinic' ),
                'parent'      => $panel_design_style
            )
        );

        mediclinic_mikado_add_admin_field(
            array(
                'name'        => 'second_color',
                'type'        => 'color',
                'label'       => esc_html__( 'Second Main Color', 'mediclinic' ),
                'description' => esc_html__( 'Choose the second most dominant theme color. Default color is #4e6dcc', 'mediclinic' ),
                'parent'      => $panel_design_style
            )
        );
		
		mediclinic_mikado_add_admin_field(
			array(
				'name'        => 'page_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'mediclinic' ),
				'description' => esc_html__( 'Choose the background color for page content. Default color is #ffffff', 'mediclinic' ),
				'parent'      => $panel_design_style
			)
		);
		
		mediclinic_mikado_add_admin_field(
			array(
				'name'        => 'selection_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Text Selection Color', 'mediclinic' ),
				'description' => esc_html__( 'Choose the color users see when selecting text', 'mediclinic' ),
				'parent'      => $panel_design_style
			)
		);
		
		mediclinic_mikado_add_admin_field(
			array(
				'name'          => 'boxed',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Boxed Layout', 'mediclinic' ),
				'parent'        => $panel_design_style,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#mkdf_boxed_container"
				)
			)
		);
		
		$boxed_container = mediclinic_mikado_add_admin_container(
			array(
				'parent'          => $panel_design_style,
				'name'            => 'boxed_container',
				'hidden_property' => 'boxed',
				'hidden_value'    => 'no'
			)
		);
		
		mediclinic_mikado_add_admin_field(
			array(
				'name'        => 'page_background_color_in_box',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'mediclinic' ),
				'description' => esc_html__( 'Choose the page background color outside box', 'mediclinic' ),
				'parent'      => $boxed_container
			)
		);
		
		mediclinic_mikado_add_admin_field(
			array(
				'name'        => 'boxed_background_image',
				'type'        => 'image',
				'label'       => esc_html__( 'Background Image', 'mediclinic' ),
				'description' => esc_html__( 'Choose an image to be displayed in background', 'mediclinic' ),
				'parent'      => $boxed_container
			)
		);
		
		mediclinic_mikado_add_admin_field(
			array(
				'name'        => 'boxed_pattern_background_image',
				'type'        => 'image',
				'label'       => esc_html__( 'Background Pattern', 'mediclinic' ),
				'description' => esc_html__( 'Choose an image to be used as background pattern', 'mediclinic' ),
				'parent'      => $boxed_container
			)
		);
		
		mediclinic_mikado_add_admin_field(
			array(
				'name'          => 'boxed_background_image_attachment',
				'type'          => 'select',
				'default_value' => 'fixed',
				'label'         => esc_html__( 'Background Image Attachment', 'mediclinic' ),
				'description'   => esc_html__( 'Choose background image attachment', 'mediclinic' ),
				'parent'        => $boxed_container,
				'options'       => array(
					'fixed'  => esc_html__( 'Fixed', 'mediclinic' ),
					'scroll' => esc_html__( 'Scroll', 'mediclinic' )
				)
			)
		);
		
		mediclinic_mikado_add_admin_field(
			array(
				'name'          => 'paspartu',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Passepartout', 'mediclinic' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'mediclinic' ),
				'parent'        => $panel_design_style,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#mkdf_paspartu_container"
				)
			)
		);
		
		$paspartu_container = mediclinic_mikado_add_admin_container(
			array(
				'parent'          => $panel_design_style,
				'name'            => 'paspartu_container',
				'hidden_property' => 'paspartu',
				'hidden_value'    => 'no'
			)
		);
		
		mediclinic_mikado_add_admin_field(
			array(
				'name'        => 'paspartu_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Passepartout Color', 'mediclinic' ),
				'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'mediclinic' ),
				'parent'      => $paspartu_container
			)
		);
		
		mediclinic_mikado_add_admin_field(
			array(
				'name'        => 'paspartu_width',
				'type'        => 'text',
				'label'       => esc_html__( 'Passepartout Size', 'mediclinic' ),
				'description' => esc_html__( 'Enter size amount for passepartout', 'mediclinic' ),
				'parent'      => $paspartu_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => '%'
				)
			)
		);
		
		mediclinic_mikado_add_admin_field(
			array(
				'parent'        => $paspartu_container,
				'type'          => 'yesno',
				'default_value' => 'no',
				'name'          => 'disable_top_paspartu',
				'label'         => esc_html__( 'Disable Top Passepartout', 'mediclinic' )
			)
		);
		
		mediclinic_mikado_add_admin_field(
			array(
				'name'          => 'initial_content_width',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'mediclinic' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'mediclinic' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'mkdf-grid-1200' => esc_html__( '1200px - default', 'mediclinic' ),
					'mkdf-grid-1100' => esc_html__( '1100px', 'mediclinic' ),
					'mkdf-grid-1300' => esc_html__( '1300px', 'mediclinic' ),
					'mkdf-grid-1000' => esc_html__( '1000px', 'mediclinic' ),
					'mkdf-grid-800'  => esc_html__( '800px', 'mediclinic' )
				)
			)
		);
		
		$panel_settings = mediclinic_mikado_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_settings',
				'title' => esc_html__( 'Behavior', 'mediclinic' )
			)
		);
		
		mediclinic_mikado_add_admin_field(
			array(
				'name'          => 'page_smooth_scroll',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Scroll', 'mediclinic' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)', 'mediclinic' ),
				'parent'        => $panel_settings
			)
		);
		
		mediclinic_mikado_add_admin_field(
			array(
				'name'          => 'smooth_page_transitions',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Page Transitions', 'mediclinic' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'mediclinic' ),
				'parent'        => $panel_settings,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#mkdf_page_transitions_container"
				)
			)
		);
		
		$page_transitions_container = mediclinic_mikado_add_admin_container(
			array(
				'parent'          => $panel_settings,
				'name'            => 'page_transitions_container',
				'hidden_property' => 'smooth_page_transitions',
				'hidden_value'    => 'no'
			)
		);
		
		mediclinic_mikado_add_admin_field(
			array(
				'name'          => 'page_transition_preloader',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Preloading Animation', 'mediclinic' ),
				'description'   => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'mediclinic' ),
				'parent'        => $page_transitions_container,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#mkdf_page_transition_preloader_container"
				)
			)
		);
		
		$page_transition_preloader_container = mediclinic_mikado_add_admin_container(
			array(
				'parent'          => $page_transitions_container,
				'name'            => 'page_transition_preloader_container',
				'hidden_property' => 'page_transition_preloader',
				'hidden_value'    => 'no'
			)
		);
		
		
		mediclinic_mikado_add_admin_field(
			array(
				'name'   => 'smooth_pt_bgnd_color',
				'type'   => 'color',
				'label'  => esc_html__( 'Page Loader Background Color', 'mediclinic' ),
				'parent' => $page_transition_preloader_container
			)
		);
		
		$group_pt_spinner_animation = mediclinic_mikado_add_admin_group(
			array(
				'name'        => 'group_pt_spinner_animation',
				'title'       => esc_html__( 'Loader Style', 'mediclinic' ),
				'description' => esc_html__( 'Define styles for loader spinner animation', 'mediclinic' ),
				'parent'      => $page_transition_preloader_container
			)
		);
		
		$row_pt_spinner_animation = mediclinic_mikado_add_admin_row(
			array(
				'name'   => 'row_pt_spinner_animation',
				'parent' => $group_pt_spinner_animation
			)
		);
		
		mediclinic_mikado_add_admin_field(
			array(
				'type'          => 'selectsimple',
				'name'          => 'smooth_pt_spinner_type',
				'default_value' => '',
				'label'         => esc_html__( 'Spinner Type', 'mediclinic' ),
				'parent'        => $row_pt_spinner_animation,
				'options'       => array(
					'rotate_circles'        => esc_html__( 'Rotate Circles', 'mediclinic' ),
					'pulse'                 => esc_html__( 'Pulse', 'mediclinic' ),
					'double_pulse'          => esc_html__( 'Double Pulse', 'mediclinic' ),
					'cube'                  => esc_html__( 'Cube', 'mediclinic' ),
					'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'mediclinic' ),
					'stripes'               => esc_html__( 'Stripes', 'mediclinic' ),
					'wave'                  => esc_html__( 'Wave', 'mediclinic' ),
					'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'mediclinic' ),
					'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'mediclinic' ),
					'atom'                  => esc_html__( 'Atom', 'mediclinic' ),
					'clock'                 => esc_html__( 'Clock', 'mediclinic' ),
					'mitosis'               => esc_html__( 'Mitosis', 'mediclinic' ),
					'lines'                 => esc_html__( 'Lines', 'mediclinic' ),
					'fussion'               => esc_html__( 'Fussion', 'mediclinic' ),
					'wave_circles'          => esc_html__( 'Wave Circles', 'mediclinic' ),
					'pulse_circles'         => esc_html__( 'Pulse Circles', 'mediclinic' )
				)
			)
		);
		
		mediclinic_mikado_add_admin_field(
			array(
				'type'          => 'colorsimple',
				'name'          => 'smooth_pt_spinner_color',
				'default_value' => '',
				'label'         => esc_html__( 'Spinner Color', 'mediclinic' ),
				'parent'        => $row_pt_spinner_animation
			)
		);
		
		mediclinic_mikado_add_admin_field(
			array(
				'name'          => 'page_transition_fadeout',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Fade Out Animation', 'mediclinic' ),
				'description'   => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'mediclinic' ),
				'parent'        => $page_transitions_container
			)
		);
		
		mediclinic_mikado_add_admin_field(
			array(
				'name'          => 'show_back_button',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show "Back To Top Button"', 'mediclinic' ),
				'description'   => esc_html__( 'Enabling this option will display a Back to Top button on every page', 'mediclinic' ),
				'parent'        => $panel_settings
			)
		);
		
		mediclinic_mikado_add_admin_field(
			array(
				'name'          => 'responsiveness',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Responsiveness', 'mediclinic' ),
				'description'   => esc_html__( 'Enabling this option will make all pages responsive', 'mediclinic' ),
				'parent'        => $panel_settings
			)
		);
		
		$panel_custom_code = mediclinic_mikado_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_custom_code',
				'title' => esc_html__( 'Custom Code', 'mediclinic' )
			)
		);
		
		mediclinic_mikado_add_admin_field(
			array(
				'name'        => 'custom_css',
				'type'        => 'textarea',
				'label'       => esc_html__( 'Custom CSS', 'mediclinic' ),
				'description' => esc_html__( 'Enter your custom CSS here', 'mediclinic' ),
				'parent'      => $panel_custom_code
			)
		);
		
		mediclinic_mikado_add_admin_field(
			array(
				'name'        => 'custom_js',
				'type'        => 'textarea',
				'label'       => esc_html__( 'Custom JS', 'mediclinic' ),
				'description' => esc_html__( 'Enter your custom Javascript here', 'mediclinic' ),
				'parent'      => $panel_custom_code
			)
		);
		
		$panel_google_api = mediclinic_mikado_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_google_api',
				'title' => esc_html__( 'Google API', 'mediclinic' )
			)
		);
		
		mediclinic_mikado_add_admin_field(
			array(
				'name'        => 'google_maps_api_key',
				'type'        => 'text',
				'label'       => esc_html__( 'Google Maps Api Key', 'mediclinic' ),
				'description' => esc_html__( 'Insert your Google Maps API key here. For instructions on how to create a Google Maps API key, please refer to our to our documentation.', 'mediclinic' ),
				'parent'      => $panel_google_api
			)
		);
	}
	
	add_action( 'mediclinic_mikado_options_map', 'mediclinic_mikado_general_options_map', 1 );
}

if ( ! function_exists( 'mediclinic_mikado_page_general_style' ) ) {
	/**
	 * Function that prints page general inline styles
	 */
	function mediclinic_mikado_page_general_style( $style ) {
		$current_style = '';
		$class_prefix  = mediclinic_mikado_get_unique_page_class( mediclinic_mikado_get_page_id() );
		
		$boxed_background_style = array();
		
		$boxed_page_background_color = mediclinic_mikado_get_meta_field_intersect( 'page_background_color_in_box' );
		if ( ! empty( $boxed_page_background_color ) ) {
			$boxed_background_style['background-color'] = $boxed_page_background_color;
		}
		
		$boxed_page_background_image = mediclinic_mikado_get_meta_field_intersect( 'boxed_background_image' );
		if ( ! empty( $boxed_page_background_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_image ) . ')';
			$boxed_background_style['background-position'] = 'center 0px';
			$boxed_background_style['background-repeat']   = 'no-repeat';
		}
		
		$boxed_page_background_pattern_image = mediclinic_mikado_get_meta_field_intersect( 'boxed_pattern_background_image' );
		if ( ! empty( $boxed_page_background_pattern_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_pattern_image ) . ')';
			$boxed_background_style['background-position'] = '0px 0px';
			$boxed_background_style['background-repeat']   = 'repeat';
		}
		
		$boxed_page_background_attachment = mediclinic_mikado_get_meta_field_intersect( 'boxed_background_image_attachment' );
		if ( ! empty( $boxed_page_background_attachment ) ) {
			$boxed_background_style['background-attachment'] = $boxed_page_background_attachment;
		}
		
		$boxed_background_selector = $class_prefix . '.mkdf-boxed .mkdf-wrapper';
		
		if ( ! empty( $boxed_background_style ) ) {
			$current_style .= mediclinic_mikado_dynamic_css( $boxed_background_selector, $boxed_background_style );
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'mediclinic_mikado_add_page_custom_style', 'mediclinic_mikado_page_general_style' );
}