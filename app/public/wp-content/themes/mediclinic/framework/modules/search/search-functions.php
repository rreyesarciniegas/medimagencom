<?php

if( !function_exists('mediclinic_mikado_load_search') ) {
    function mediclinic_mikado_load_search() {
        
        if ( mediclinic_mikado_active_widget( false, false, 'mkdf_search_opener' ) ) {
            include_once MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/search/types/covers-header.php';
        }
    }

    add_action('init', 'mediclinic_mikado_load_search');
}