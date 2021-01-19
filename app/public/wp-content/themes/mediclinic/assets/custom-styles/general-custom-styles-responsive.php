<?php

if(!function_exists('mediclinic_mikado_content_responsive_styles')) {
    /**
     * Generates content responsive custom styles
     */
    function mediclinic_mikado_content_responsive_styles() {
        $content_style = array();
	    
	    $padding_top_mobile = mediclinic_mikado_options()->getOptionValue('content_top_padding_mobile');
	    if ($padding_top_mobile !== '') {
            $content_style['padding-top'] = mediclinic_mikado_filter_px($padding_top_mobile) . 'px!important';
        }
        
        $content_selector = array(
            '.mkdf-content .mkdf-content-inner > .mkdf-container > .mkdf-container-inner',
            '.mkdf-content .mkdf-content-inner > .mkdf-full-width > .mkdf-full-width-inner',
        );
	    
        echo mediclinic_mikado_dynamic_css($content_selector, $content_style);
    }

    add_action('mediclinic_mikado_style_dynamic_responsive_1024', 'mediclinic_mikado_content_responsive_styles');
}

if (!function_exists('mediclinic_mikado_h1_responsive_styles3')) {
    function mediclinic_mikado_h1_responsive_styles3() {
        $h1_styles = array();

        $font_size      = mediclinic_mikado_options()->getOptionValue('h1_responsive_fontsize3');
	    $line_height    = mediclinic_mikado_options()->getOptionValue('h1_responsive_lineheight3');
	    $letter_spacing = mediclinic_mikado_options()->getOptionValue('h1_responsive_letterspacing3');
	    
        if(!empty($font_size)) {
            $h1_styles['font-size'] = mediclinic_mikado_filter_px($font_size).'px';
        }
        if(!empty($line_height)) {
            $h1_styles['line-height'] = mediclinic_mikado_filter_px($line_height).'px';
        }
        if($letter_spacing !== '') {
            $h1_styles['letter-spacing'] = mediclinic_mikado_filter_px($letter_spacing).'px';
        }

        $h1_selector = array(
            'h1'
        );

        if (!empty($h1_styles)) {
            echo mediclinic_mikado_dynamic_css($h1_selector, $h1_styles);
        }
    }

    add_action('mediclinic_mikado_style_dynamic_responsive_768_1024', 'mediclinic_mikado_h1_responsive_styles3');
}

if (!function_exists('mediclinic_mikado_h2_responsive_styles3')) {
    function mediclinic_mikado_h2_responsive_styles3() {
        $h2_styles = array();
	
	    $font_size      = mediclinic_mikado_options()->getOptionValue('h2_responsive_fontsize3');
	    $line_height    = mediclinic_mikado_options()->getOptionValue('h2_responsive_lineheight3');
	    $letter_spacing = mediclinic_mikado_options()->getOptionValue('h2_responsive_letterspacing3');
	
	    if(!empty($font_size)) {
		    $h2_styles['font-size'] = mediclinic_mikado_filter_px($font_size).'px';
	    }
	    if(!empty($line_height)) {
		    $h2_styles['line-height'] = mediclinic_mikado_filter_px($line_height).'px';
	    }
	    if($letter_spacing !== '') {
		    $h2_styles['letter-spacing'] = mediclinic_mikado_filter_px($letter_spacing).'px';
	    }

        $h2_selector = array(
            'h2'
        );

        if (!empty($h2_styles)) {
            echo mediclinic_mikado_dynamic_css($h2_selector, $h2_styles);
        }
    }

    add_action('mediclinic_mikado_style_dynamic_responsive_768_1024', 'mediclinic_mikado_h2_responsive_styles3');
}

if (!function_exists('mediclinic_mikado_h3_responsive_styles3')) {
    function mediclinic_mikado_h3_responsive_styles3() {
        $h3_styles = array();
	
	    $font_size      = mediclinic_mikado_options()->getOptionValue('h3_responsive_fontsize3');
	    $line_height    = mediclinic_mikado_options()->getOptionValue('h3_responsive_lineheight3');
	    $letter_spacing = mediclinic_mikado_options()->getOptionValue('h3_responsive_letterspacing3');
	
	    if(!empty($font_size)) {
		    $h3_styles['font-size'] = mediclinic_mikado_filter_px($font_size).'px';
	    }
	    if(!empty($line_height)) {
		    $h3_styles['line-height'] = mediclinic_mikado_filter_px($line_height).'px';
	    }
	    if($letter_spacing !== '') {
		    $h3_styles['letter-spacing'] = mediclinic_mikado_filter_px($letter_spacing).'px';
	    }

        $h3_selector = array(
            'h3'
        );

        if (!empty($h3_styles)) {
            echo mediclinic_mikado_dynamic_css($h3_selector, $h3_styles);
        }
    }

    add_action('mediclinic_mikado_style_dynamic_responsive_768_1024', 'mediclinic_mikado_h3_responsive_styles3');
}

if (!function_exists('mediclinic_mikado_h4_responsive_styles3')) {
    function mediclinic_mikado_h4_responsive_styles3() {
        $h4_styles = array();
	
	    $font_size      = mediclinic_mikado_options()->getOptionValue('h4_responsive_fontsize3');
	    $line_height    = mediclinic_mikado_options()->getOptionValue('h4_responsive_lineheight3');
	    $letter_spacing = mediclinic_mikado_options()->getOptionValue('h4_responsive_letterspacing3');
	
	    if(!empty($font_size)) {
		    $h4_styles['font-size'] = mediclinic_mikado_filter_px($font_size).'px';
	    }
	    if(!empty($line_height)) {
		    $h4_styles['line-height'] = mediclinic_mikado_filter_px($line_height).'px';
	    }
	    if($letter_spacing !== '') {
		    $h4_styles['letter-spacing'] = mediclinic_mikado_filter_px($letter_spacing).'px';
	    }

        $h4_selector = array(
            'h4'
        );

        if (!empty($h4_styles)) {
            echo mediclinic_mikado_dynamic_css($h4_selector, $h4_styles);
        }
    }

    add_action('mediclinic_mikado_style_dynamic_responsive_768_1024', 'mediclinic_mikado_h4_responsive_styles3');
}

if (!function_exists('mediclinic_mikado_h5_responsive_styles3')) {
    function mediclinic_mikado_h5_responsive_styles3() {
        $h5_styles = array();
	
	    $font_size      = mediclinic_mikado_options()->getOptionValue('h5_responsive_fontsize3');
	    $line_height    = mediclinic_mikado_options()->getOptionValue('h5_responsive_lineheight3');
	    $letter_spacing = mediclinic_mikado_options()->getOptionValue('h5_responsive_letterspacing3');
	
	    if(!empty($font_size)) {
		    $h5_styles['font-size'] = mediclinic_mikado_filter_px($font_size).'px';
	    }
	    if(!empty($line_height)) {
		    $h5_styles['line-height'] = mediclinic_mikado_filter_px($line_height).'px';
	    }
	    if($letter_spacing !== '') {
		    $h5_styles['letter-spacing'] = mediclinic_mikado_filter_px($letter_spacing).'px';
	    }

        $h5_selector = array(
            'h5'
        );

        if (!empty($h5_styles)) {
            echo mediclinic_mikado_dynamic_css($h5_selector, $h5_styles);
        }
    }

    add_action('mediclinic_mikado_style_dynamic_responsive_768_1024', 'mediclinic_mikado_h5_responsive_styles3');
}

if (!function_exists('mediclinic_mikado_h6_responsive_styles3')) {
    function mediclinic_mikado_h6_responsive_styles3() {
        $h6_styles = array();
	
	    $font_size      = mediclinic_mikado_options()->getOptionValue('h6_responsive_fontsize3');
	    $line_height    = mediclinic_mikado_options()->getOptionValue('h6_responsive_lineheight3');
	    $letter_spacing = mediclinic_mikado_options()->getOptionValue('h6_responsive_letterspacing3');
	
	    if(!empty($font_size)) {
		    $h6_styles['font-size'] = mediclinic_mikado_filter_px($font_size).'px';
	    }
	    if(!empty($line_height)) {
		    $h6_styles['line-height'] = mediclinic_mikado_filter_px($line_height).'px';
	    }
	    if($letter_spacing !== '') {
		    $h6_styles['letter-spacing'] = mediclinic_mikado_filter_px($letter_spacing).'px';
	    }

        $h6_selector = array(
            'h6'
        );

        if (!empty($h6_styles)) {
            echo mediclinic_mikado_dynamic_css($h6_selector, $h6_styles);
        }
    }

    add_action('mediclinic_mikado_style_dynamic_responsive_768_1024', 'mediclinic_mikado_h6_responsive_styles3');
}

if (!function_exists('mediclinic_mikado_h1_responsive_styles')) {
    function mediclinic_mikado_h1_responsive_styles() {
        $h1_styles = array();
	
	    $font_size      = mediclinic_mikado_options()->getOptionValue('h1_responsive_fontsize');
	    $line_height    = mediclinic_mikado_options()->getOptionValue('h1_responsive_lineheight');
	    $letter_spacing = mediclinic_mikado_options()->getOptionValue('h1_responsive_letterspacing');
	
	    if(!empty($font_size)) {
		    $h1_styles['font-size'] = mediclinic_mikado_filter_px($font_size).'px';
	    }
	    if(!empty($line_height)) {
		    $h1_styles['line-height'] = mediclinic_mikado_filter_px($line_height).'px';
	    }
	    if($letter_spacing !== '') {
		    $h1_styles['letter-spacing'] = mediclinic_mikado_filter_px($letter_spacing).'px';
	    }

        $h1_selector = array(
            'h1'
        );

        if (!empty($h1_styles)) {
            echo mediclinic_mikado_dynamic_css($h1_selector, $h1_styles);
        }
    }

    add_action('mediclinic_mikado_style_dynamic_responsive_480_768', 'mediclinic_mikado_h1_responsive_styles');
}

if (!function_exists('mediclinic_mikado_h2_responsive_styles')) {
    function mediclinic_mikado_h2_responsive_styles() {
        $h2_styles = array();
	
	    $font_size      = mediclinic_mikado_options()->getOptionValue('h2_responsive_fontsize');
	    $line_height    = mediclinic_mikado_options()->getOptionValue('h2_responsive_lineheight');
	    $letter_spacing = mediclinic_mikado_options()->getOptionValue('h2_responsive_letterspacing');
	
	    if(!empty($font_size)) {
		    $h2_styles['font-size'] = mediclinic_mikado_filter_px($font_size).'px';
	    }
	    if(!empty($line_height)) {
		    $h2_styles['line-height'] = mediclinic_mikado_filter_px($line_height).'px';
	    }
	    if($letter_spacing !== '') {
		    $h2_styles['letter-spacing'] = mediclinic_mikado_filter_px($letter_spacing).'px';
	    }

        $h2_selector = array(
            'h2'
        );

        if (!empty($h2_styles)) {
            echo mediclinic_mikado_dynamic_css($h2_selector, $h2_styles);
        }
    }

    add_action('mediclinic_mikado_style_dynamic_responsive_480_768', 'mediclinic_mikado_h2_responsive_styles');
}

if (!function_exists('mediclinic_mikado_h3_responsive_styles')) {
    function mediclinic_mikado_h3_responsive_styles() {
        $h3_styles = array();
	
	    $font_size      = mediclinic_mikado_options()->getOptionValue('h3_responsive_fontsize');
	    $line_height    = mediclinic_mikado_options()->getOptionValue('h3_responsive_lineheight');
	    $letter_spacing = mediclinic_mikado_options()->getOptionValue('h3_responsive_letterspacing');
	
	    if(!empty($font_size)) {
		    $h3_styles['font-size'] = mediclinic_mikado_filter_px($font_size).'px';
	    }
	    if(!empty($line_height)) {
		    $h3_styles['line-height'] = mediclinic_mikado_filter_px($line_height).'px';
	    }
	    if($letter_spacing !== '') {
		    $h3_styles['letter-spacing'] = mediclinic_mikado_filter_px($letter_spacing).'px';
	    }

        $h3_selector = array(
            'h3'
        );

        if (!empty($h3_styles)) {
            echo mediclinic_mikado_dynamic_css($h3_selector, $h3_styles);
        }
    }

    add_action('mediclinic_mikado_style_dynamic_responsive_480_768', 'mediclinic_mikado_h3_responsive_styles');
}

if (!function_exists('mediclinic_mikado_h4_responsive_styles')) {
    function mediclinic_mikado_h4_responsive_styles() {
        $h4_styles = array();
	
	    $font_size      = mediclinic_mikado_options()->getOptionValue('h4_responsive_fontsize');
	    $line_height    = mediclinic_mikado_options()->getOptionValue('h4_responsive_lineheight');
	    $letter_spacing = mediclinic_mikado_options()->getOptionValue('h4_responsive_letterspacing');
	
	    if(!empty($font_size)) {
		    $h4_styles['font-size'] = mediclinic_mikado_filter_px($font_size).'px';
	    }
	    if(!empty($line_height)) {
		    $h4_styles['line-height'] = mediclinic_mikado_filter_px($line_height).'px';
	    }
	    if($letter_spacing !== '') {
		    $h4_styles['letter-spacing'] = mediclinic_mikado_filter_px($letter_spacing).'px';
	    }

        $h4_selector = array(
            'h4'
        );

        if (!empty($h4_styles)) {
            echo mediclinic_mikado_dynamic_css($h4_selector, $h4_styles);
        }
    }

    add_action('mediclinic_mikado_style_dynamic_responsive_480_768', 'mediclinic_mikado_h4_responsive_styles');
}

if (!function_exists('mediclinic_mikado_h5_responsive_styles')) {
    function mediclinic_mikado_h5_responsive_styles() {
        $h5_styles = array();
	
	    $font_size      = mediclinic_mikado_options()->getOptionValue('h5_responsive_fontsize');
	    $line_height    = mediclinic_mikado_options()->getOptionValue('h5_responsive_lineheight');
	    $letter_spacing = mediclinic_mikado_options()->getOptionValue('h5_responsive_letterspacing');
	
	    if(!empty($font_size)) {
		    $h5_styles['font-size'] = mediclinic_mikado_filter_px($font_size).'px';
	    }
	    if(!empty($line_height)) {
		    $h5_styles['line-height'] = mediclinic_mikado_filter_px($line_height).'px';
	    }
	    if($letter_spacing !== '') {
		    $h5_styles['letter-spacing'] = mediclinic_mikado_filter_px($letter_spacing).'px';
	    }

        $h5_selector = array(
            'h5'
        );

        if (!empty($h5_styles)) {
            echo mediclinic_mikado_dynamic_css($h5_selector, $h5_styles);
        }
    }

    add_action('mediclinic_mikado_style_dynamic_responsive_480_768', 'mediclinic_mikado_h5_responsive_styles');
}

if (!function_exists('mediclinic_mikado_h6_responsive_styles')) {
    function mediclinic_mikado_h6_responsive_styles() {
        $h6_styles = array();
	
	    $font_size      = mediclinic_mikado_options()->getOptionValue('h6_responsive_fontsize');
	    $line_height    = mediclinic_mikado_options()->getOptionValue('h6_responsive_lineheight');
	    $letter_spacing = mediclinic_mikado_options()->getOptionValue('h6_responsive_letterspacing');
	
	    if(!empty($font_size)) {
		    $h6_styles['font-size'] = mediclinic_mikado_filter_px($font_size).'px';
	    }
	    if(!empty($line_height)) {
		    $h6_styles['line-height'] = mediclinic_mikado_filter_px($line_height).'px';
	    }
	    if($letter_spacing !== '') {
		    $h6_styles['letter-spacing'] = mediclinic_mikado_filter_px($letter_spacing).'px';
	    }

        $h6_selector = array(
            'h6'
        );

        if (!empty($h6_styles)) {
            echo mediclinic_mikado_dynamic_css($h6_selector, $h6_styles);
        }
    }

    add_action('mediclinic_mikado_style_dynamic_responsive_480_768', 'mediclinic_mikado_h6_responsive_styles');
}

if (!function_exists('mediclinic_mikado_text_responsive_styles')) {
    function mediclinic_mikado_text_responsive_styles() {
        $text_styles = array();
	
	    $font_size      = mediclinic_mikado_options()->getOptionValue('text_fontsize_res1');
	    $line_height    = mediclinic_mikado_options()->getOptionValue('text_lineheight_res1');
	    $letter_spacing = mediclinic_mikado_options()->getOptionValue('text_letterspacing_res1');
	
	    if(!empty($font_size)) {
		    $text_styles['font-size'] = mediclinic_mikado_filter_px($font_size).'px';
	    }
	    if(!empty($line_height)) {
		    $text_styles['line-height'] = mediclinic_mikado_filter_px($line_height).'px';
	    }
	    if($letter_spacing !== '') {
		    $text_styles['letter-spacing'] = mediclinic_mikado_filter_px($letter_spacing).'px';
	    }

        $text_selector = array(
            'body',
            'p'
        );

        if (!empty($text_styles)) {
            echo mediclinic_mikado_dynamic_css($text_selector, $text_styles);
        }
    }

    add_action('mediclinic_mikado_style_dynamic_responsive_480_768', 'mediclinic_mikado_text_responsive_styles');
}

if (!function_exists('mediclinic_mikado_h1_responsive_styles2')) {
    function mediclinic_mikado_h1_responsive_styles2() {
        $h1_styles = array();
	
	    $font_size      = mediclinic_mikado_options()->getOptionValue('h1_responsive_fontsize2');
	    $line_height    = mediclinic_mikado_options()->getOptionValue('h1_responsive_lineheight2');
	    $letter_spacing = mediclinic_mikado_options()->getOptionValue('h1_responsive_letterspacing2');
	
	    if(!empty($font_size)) {
		    $h1_styles['font-size'] = mediclinic_mikado_filter_px($font_size).'px';
	    }
	    if(!empty($line_height)) {
		    $h1_styles['line-height'] = mediclinic_mikado_filter_px($line_height).'px';
	    }
	    if($letter_spacing !== '') {
		    $h1_styles['letter-spacing'] = mediclinic_mikado_filter_px($letter_spacing).'px';
	    }

        $h1_selector = array(
            'h1'
        );

        if (!empty($h1_styles)) {
            echo mediclinic_mikado_dynamic_css($h1_selector, $h1_styles);
        }
    }

    add_action('mediclinic_mikado_style_dynamic_responsive_480', 'mediclinic_mikado_h1_responsive_styles2');
}

if (!function_exists('mediclinic_mikado_h2_responsive_styles2')) {
    function mediclinic_mikado_h2_responsive_styles2() {
        $h2_styles = array();
	
	    $font_size      = mediclinic_mikado_options()->getOptionValue('h2_responsive_fontsize2');
	    $line_height    = mediclinic_mikado_options()->getOptionValue('h2_responsive_lineheight2');
	    $letter_spacing = mediclinic_mikado_options()->getOptionValue('h2_responsive_letterspacing2');
	
	    if(!empty($font_size)) {
		    $h2_styles['font-size'] = mediclinic_mikado_filter_px($font_size).'px';
	    }
	    if(!empty($line_height)) {
		    $h2_styles['line-height'] = mediclinic_mikado_filter_px($line_height).'px';
	    }
	    if($letter_spacing !== '') {
		    $h2_styles['letter-spacing'] = mediclinic_mikado_filter_px($letter_spacing).'px';
	    }

        $h2_selector = array(
            'h2'
        );

        if (!empty($h2_styles)) {
            echo mediclinic_mikado_dynamic_css($h2_selector, $h2_styles);
        }
    }

    add_action('mediclinic_mikado_style_dynamic_responsive_480', 'mediclinic_mikado_h2_responsive_styles2');
}

if (!function_exists('mediclinic_mikado_h3_responsive_styles2')) {
    function mediclinic_mikado_h3_responsive_styles2() {
        $h3_styles = array();
	
	    $font_size      = mediclinic_mikado_options()->getOptionValue('h3_responsive_fontsize2');
	    $line_height    = mediclinic_mikado_options()->getOptionValue('h3_responsive_lineheight2');
	    $letter_spacing = mediclinic_mikado_options()->getOptionValue('h3_responsive_letterspacing2');
	
	    if(!empty($font_size)) {
		    $h3_styles['font-size'] = mediclinic_mikado_filter_px($font_size).'px';
	    }
	    if(!empty($line_height)) {
		    $h3_styles['line-height'] = mediclinic_mikado_filter_px($line_height).'px';
	    }
	    if($letter_spacing !== '') {
		    $h3_styles['letter-spacing'] = mediclinic_mikado_filter_px($letter_spacing).'px';
	    }

        $h3_selector = array(
            'h3'
        );

        if (!empty($h3_styles)) {
            echo mediclinic_mikado_dynamic_css($h3_selector, $h3_styles);
        }
    }

    add_action('mediclinic_mikado_style_dynamic_responsive_480', 'mediclinic_mikado_h3_responsive_styles2');
}

if (!function_exists('mediclinic_mikado_h4_responsive_styles2')) {
    function mediclinic_mikado_h4_responsive_styles2() {
        $h4_styles = array();
	
	    $font_size      = mediclinic_mikado_options()->getOptionValue('h4_responsive_fontsize2');
	    $line_height    = mediclinic_mikado_options()->getOptionValue('h4_responsive_lineheight2');
	    $letter_spacing = mediclinic_mikado_options()->getOptionValue('h4_responsive_letterspacing2');
	
	    if(!empty($font_size)) {
		    $h4_styles['font-size'] = mediclinic_mikado_filter_px($font_size).'px';
	    }
	    if(!empty($line_height)) {
		    $h4_styles['line-height'] = mediclinic_mikado_filter_px($line_height).'px';
	    }
	    if($letter_spacing !== '') {
		    $h4_styles['letter-spacing'] = mediclinic_mikado_filter_px($letter_spacing).'px';
	    }

        $h4_selector = array(
            'h4'
        );

        if (!empty($h4_styles)) {
            echo mediclinic_mikado_dynamic_css($h4_selector, $h4_styles);
        }
    }

    add_action('mediclinic_mikado_style_dynamic_responsive_480', 'mediclinic_mikado_h4_responsive_styles2');
}

if (!function_exists('mediclinic_mikado_h5_responsive_styles2')) {
    function mediclinic_mikado_h5_responsive_styles2() {
        $h5_styles = array();
	
	    $font_size      = mediclinic_mikado_options()->getOptionValue('h5_responsive_fontsize2');
	    $line_height    = mediclinic_mikado_options()->getOptionValue('h5_responsive_lineheight2');
	    $letter_spacing = mediclinic_mikado_options()->getOptionValue('h5_responsive_letterspacing2');
	
	    if(!empty($font_size)) {
		    $h5_styles['font-size'] = mediclinic_mikado_filter_px($font_size).'px';
	    }
	    if(!empty($line_height)) {
		    $h5_styles['line-height'] = mediclinic_mikado_filter_px($line_height).'px';
	    }
	    if($letter_spacing !== '') {
		    $h5_styles['letter-spacing'] = mediclinic_mikado_filter_px($letter_spacing).'px';
	    }

        $h5_selector = array(
            'h5'
        );

        if (!empty($h5_styles)) {
            echo mediclinic_mikado_dynamic_css($h5_selector, $h5_styles);
        }
    }

    add_action('mediclinic_mikado_style_dynamic_responsive_480', 'mediclinic_mikado_h5_responsive_styles2');
}

if (!function_exists('mediclinic_mikado_h6_responsive_styles2')) {
    function mediclinic_mikado_h6_responsive_styles2() {
        $h6_styles = array();
	
	    $font_size      = mediclinic_mikado_options()->getOptionValue('h6_responsive_fontsize2');
	    $line_height    = mediclinic_mikado_options()->getOptionValue('h6_responsive_lineheight2');
	    $letter_spacing = mediclinic_mikado_options()->getOptionValue('h6_responsive_letterspacing2');
	
	    if(!empty($font_size)) {
		    $h6_styles['font-size'] = mediclinic_mikado_filter_px($font_size).'px';
	    }
	    if(!empty($line_height)) {
		    $h6_styles['line-height'] = mediclinic_mikado_filter_px($line_height).'px';
	    }
	    if($letter_spacing !== '') {
		    $h6_styles['letter-spacing'] = mediclinic_mikado_filter_px($letter_spacing).'px';
	    }

        $h6_selector = array(
            'h6'
        );

        if (!empty($h6_styles)) {
            echo mediclinic_mikado_dynamic_css($h6_selector, $h6_styles);
        }
    }

    add_action('mediclinic_mikado_style_dynamic_responsive_480', 'mediclinic_mikado_h6_responsive_styles2');
}

if (!function_exists('mediclinic_mikado_text_responsive_styles2')) {
    function mediclinic_mikado_text_responsive_styles2() {
        $text_styles = array();
	
	    $font_size      = mediclinic_mikado_options()->getOptionValue('text_fontsize_res2');
	    $line_height    = mediclinic_mikado_options()->getOptionValue('text_lineheight_res2');
	    $letter_spacing = mediclinic_mikado_options()->getOptionValue('text_letterspacing_res2');
	
	    if(!empty($font_size)) {
		    $text_styles['font-size'] = mediclinic_mikado_filter_px($font_size).'px';
	    }
	    if(!empty($line_height)) {
		    $text_styles['line-height'] = mediclinic_mikado_filter_px($line_height).'px';
	    }
	    if($letter_spacing !== '') {
		    $text_styles['letter-spacing'] = mediclinic_mikado_filter_px($letter_spacing).'px';
	    }

        $text_selector = array(
            'body',
            'p'
        );

        if (!empty($text_styles)) {
            echo mediclinic_mikado_dynamic_css($text_selector, $text_styles);
        }
    }

    add_action('mediclinic_mikado_style_dynamic_responsive_480', 'mediclinic_mikado_text_responsive_styles2');
}