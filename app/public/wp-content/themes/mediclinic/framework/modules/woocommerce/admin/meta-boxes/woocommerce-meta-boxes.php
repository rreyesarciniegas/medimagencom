<?php

if(!function_exists('mediclinic_mikado_map_woocommerce_meta')) {
    function mediclinic_mikado_map_woocommerce_meta() {
        $woocommerce_meta_box = mediclinic_mikado_create_meta_box(
            array(
                'scope' => array('product'),
                'title' => esc_html__('Product Meta', 'mediclinic'),
                'name' => 'woo_product_meta'
            )
        );

        mediclinic_mikado_create_meta_box_field(
            array(
                'name'          => 'mkdf_show_title_area_woo_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__('Show Title Area', 'mediclinic'),
                'description'   => esc_html__('Disabling this option will turn off page title area', 'mediclinic'),
                'parent'        => $woocommerce_meta_box,
                'options'       => mediclinic_mikado_get_yes_no_select_array()
            )
        );
    }
	
    add_action('mediclinic_mikado_meta_boxes_map', 'mediclinic_mikado_map_woocommerce_meta', 99);
}