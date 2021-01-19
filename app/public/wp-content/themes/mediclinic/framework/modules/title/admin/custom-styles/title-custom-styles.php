<?php

if (!function_exists('mediclinic_mikado_title_area_typography_style')) {

    function mediclinic_mikado_title_area_typography_style(){

        // title default/small style
	    
	    $item_styles = mediclinic_mikado_get_typography_styles('page_title');
	
	    $item_selector = array(
		    '.mkdf-title .mkdf-title-holder .mkdf-page-title'
	    );
	
	    echo mediclinic_mikado_dynamic_css($item_selector, $item_styles);
	
	    // subtitle style
	
	    $item_styles = mediclinic_mikado_get_typography_styles('page_subtitle');
	
	    $item_selector = array(
		    '.mkdf-title .mkdf-title-holder .mkdf-subtitle'
	    );
	
	    echo mediclinic_mikado_dynamic_css($item_selector, $item_styles);
	
	    // breadcrumb style
	
	    $item_styles = mediclinic_mikado_get_typography_styles('page_breadcrumb');
	
	    $item_selector = array(
		    '.mkdf-title .mkdf-title-holder .mkdf-breadcrumbs a', 
		    '.mkdf-title .mkdf-title-holder .mkdf-breadcrumbs span'
	    );
	
	    echo mediclinic_mikado_dynamic_css($item_selector, $item_styles);
	    

	    $breadcrumb_hover_color = mediclinic_mikado_options()->getOptionValue('page_breadcrumb_hovercolor');
	    
        $breadcrumb_hover_styles = array();
        if(!empty($breadcrumb_hover_color)) {
            $breadcrumb_hover_styles['color'] = $breadcrumb_hover_color;
        }

        $breadcrumb_hover_selector = array(
            '.mkdf-title .mkdf-title-holder .mkdf-breadcrumbs a:hover'
        );

        echo mediclinic_mikado_dynamic_css($breadcrumb_hover_selector, $breadcrumb_hover_styles);
    }

    add_action('mediclinic_mikado_style_dynamic', 'mediclinic_mikado_title_area_typography_style');
}