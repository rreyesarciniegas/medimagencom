<?php

if ( ! function_exists('mediclinic_mikado_woocommerce_options_map') ) {

	/**
	 * Add Woocommerce options page
	 */
	function mediclinic_mikado_woocommerce_options_map() {

		mediclinic_mikado_add_admin_page(
			array(
				'slug' => '_woocommerce_page',
				'title' => esc_html__('Woocommerce', 'mediclinic'),
				'icon' => 'fa fa-shopping-cart'
			)
		);

		/**
		 * Product List Settings
		 */
		$panel_product_list = mediclinic_mikado_add_admin_panel(
			array(
				'page' => '_woocommerce_page',
				'name' => 'panel_product_list',
				'title' => esc_html__('Product List', 'mediclinic')
			)
		);

		mediclinic_mikado_add_admin_field(array(
			'name'        	=> 'mkdf_woo_product_list_columns',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Product List Columns', 'mediclinic'),
			'default_value'	=> 'mkdf-woocommerce-columns-4',
			'description' 	=> esc_html__('Choose number of columns for product listing and related products on single product', 'mediclinic'),
			'options'		=> array(
				'mkdf-woocommerce-columns-3' => esc_html__('3 Columns', 'mediclinic'),
				'mkdf-woocommerce-columns-4' => esc_html__('4 Columns', 'mediclinic')
			),
			'parent'      	=> $panel_product_list,
		));
		
		mediclinic_mikado_add_admin_field(array(
			'name'        	=> 'mkdf_woo_product_list_columns_space',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Space Between Products', 'mediclinic'),
			'default_value'	=> 'mkdf-woo-normal-space',
			'description' 	=> esc_html__('Select space between products for product listing and related products on single product', 'mediclinic'),
			'options'		=> array(
				'mkdf-woo-normal-space' => esc_html__('Normal', 'mediclinic'),
				'mkdf-woo-small-space'  => esc_html__('Small', 'mediclinic'),
				'mkdf-woo-no-space'     => esc_html__('No Space', 'mediclinic')
			),
			'parent'      	=> $panel_product_list,
		));
		

		mediclinic_mikado_add_admin_field(array(
			'name'        	=> 'mkdf_woo_products_per_page',
			'type'        	=> 'text',
			'label'       	=> esc_html__('Number of products per page', 'mediclinic'),
			'default_value'	=> '',
			'description' 	=> esc_html__('Set number of products on shop page', 'mediclinic'),
			'parent'      	=> $panel_product_list,
			'args' 			=> array(
				'col_width' => 3
			)
		));

		mediclinic_mikado_add_admin_field(array(
			'name'        	=> 'mkdf_products_list_title_tag',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Products Title Tag', 'mediclinic'),
			'default_value'	=> 'h5',
			'description' 	=> '',
			'options'       => mediclinic_mikado_get_title_tag(),
			'parent'      	=> $panel_product_list,
		));

		/**
		 * Single Product Settings
		 */
		$panel_single_product = mediclinic_mikado_add_admin_panel(
			array(
				'page' => '_woocommerce_page',
				'name' => 'panel_single_product',
				'title' => esc_html__('Single Product', 'mediclinic')
			)
		);
			
			mediclinic_mikado_add_admin_field(array(
				'name'          => 'woo_set_thumb_images_position',
				'type'          => 'select',
				'label'         => esc_html__('Set Thumbnail Images Position', 'mediclinic'),
				'default_value' => 'below-image',
				'options'		=> array(
					'below-image'  => esc_html__('Below Featured Image', 'mediclinic'),
					'on-left-side' => esc_html__('On The Left Side Of Featured Image', 'mediclinic')
				),
				'parent'        => $panel_single_product
			));

			mediclinic_mikado_add_admin_field(array(
				'name'        	=> 'mkdf_single_product_title_tag',
				'type'        	=> 'select',
				'label'       	=> esc_html__('Single Product Title Tag', 'mediclinic'),
				'default_value'	=> 'h2',
				'description' 	=> '',
				'options'       => mediclinic_mikado_get_title_tag(),
				'parent'      	=> $panel_single_product,
			));

            mediclinic_mikado_add_admin_field(
                array(
                    'type' => 'select',
                    'name' => 'show_title_area_woo',
                    'default_value' => '',
                    'label'       => esc_html__('Show Title Area', 'mediclinic'),
                    'description' => esc_html__('Enabling this option will show title area on single post pages', 'mediclinic'),
                    'parent'      => $panel_single_product,
                    'options'     => mediclinic_mikado_get_yes_no_select_array(),
                    'args' => array(
                        'col_width' => 3
                    )
                )
            );

		/**
		 * DropDown Cart Widget Settings
		 */
		$panel_dropdown_cart = mediclinic_mikado_add_admin_panel(
			array(
				'page' => '_woocommerce_page',
				'name' => 'panel_dropdown_cart',
				'title' => esc_html__('Dropdown Cart Widget', 'mediclinic')
			)
		);

			mediclinic_mikado_add_admin_field(array(
				'name'        	=> 'mkdf_woo_dropdown_cart_description',
				'type'        	=> 'text',
				'label'       	=> esc_html__('Cart Description', 'mediclinic'),
				'default_value'	=> '',
				'description' 	=> esc_html__('Enter dropdown cart description', 'mediclinic'),
				'parent'      	=> $panel_dropdown_cart
			));
	}

	add_action( 'mediclinic_mikado_options_map', 'mediclinic_mikado_woocommerce_options_map', 21);
}