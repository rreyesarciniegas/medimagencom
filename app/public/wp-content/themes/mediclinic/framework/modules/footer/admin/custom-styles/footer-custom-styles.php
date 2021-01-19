<?php

if(!function_exists('mediclinic_mikado_footer_top_general_styles')) {
    /**
     * Generates general custom styles for footer top area
     */
    function mediclinic_mikado_footer_top_general_styles() {
        $item_styles = array();
        $background_color = mediclinic_mikado_options()->getOptionValue('footer_top_background_color');

        if(!empty($background_color)) {
            $item_styles['background-color'] = $background_color;
        }

        echo mediclinic_mikado_dynamic_css('.mkdf-page-footer .mkdf-footer-top-holder', $item_styles);
    }

    add_action('mediclinic_mikado_style_dynamic', 'mediclinic_mikado_footer_top_general_styles');
}

if(!function_exists('mediclinic_mikado_footer_bottom_general_styles')) {
    /**
     * Generates general custom styles for footer bottom area
     */
    function mediclinic_mikado_footer_bottom_general_styles() {
        $item_styles = array();
	    $background_color = mediclinic_mikado_options()->getOptionValue('footer_bottom_background_color');
	
	    if(!empty($background_color)) {
		    $item_styles['background-color'] = $background_color;
	    }

        echo mediclinic_mikado_dynamic_css('.mkdf-page-footer .mkdf-footer-bottom-holder', $item_styles);
    }

    add_action('mediclinic_mikado_style_dynamic', 'mediclinic_mikado_footer_bottom_general_styles');
}