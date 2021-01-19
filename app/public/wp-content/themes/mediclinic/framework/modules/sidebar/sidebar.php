<?php

if (!function_exists('mediclinic_mikado_register_sidebars')) {
    /**
     * Function that registers theme's sidebars
     */
    function mediclinic_mikado_register_sidebars() {

        register_sidebar(array(
            'name' => esc_html__('Sidebar', 'mediclinic'),
            'id' => 'sidebar',
            'description' => esc_html__('Default Sidebar', 'mediclinic'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<div class="mkdf-widget-title-holder"><h5 class="mkdf-widget-title">',
            'after_title' => '</h5></div>'
        ));
    }

    add_action('widgets_init', 'mediclinic_mikado_register_sidebars', 1);
}

if (!function_exists('mediclinic_mikado_add_support_custom_sidebar')) {
    /**
     * Function that adds theme support for custom sidebars. It also creates MediclinicMikadoSidebar object
     */
    function mediclinic_mikado_add_support_custom_sidebar() {
        add_theme_support('MediclinicMikadoSidebar');
        if (get_theme_support('MediclinicMikadoSidebar')) new MediclinicMikadoSidebar();
    }

    add_action('after_setup_theme', 'mediclinic_mikado_add_support_custom_sidebar');
}