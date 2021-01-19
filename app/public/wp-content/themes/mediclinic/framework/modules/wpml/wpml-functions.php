<?php

if(!function_exists('mediclinic_mikado_disable_wpml_css')) {
    function mediclinic_mikado_disable_wpml_css() {
	    define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
    }

	add_action('after_setup_theme', 'mediclinic_mikado_disable_wpml_css');
}