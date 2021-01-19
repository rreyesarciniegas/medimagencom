<?php

class MediclinicMikadoIconInfoWidget extends MediclinicMikadoWidget {
    public function __construct() {
        parent::__construct(
            'mkdf_icon_info_widget',
            esc_html__('Mikado Icon Info Widget', 'mediclinic'),
            array( 'description' => esc_html__( 'Add button element to widget areas', 'mediclinic'))
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array_merge(
            mediclinic_mikado_icon_collections()->getIconWidgetParamsArray(),
            array(
                array(
                    'type'    => 'text',
                    'name'    => 'custom_icon',
                    'title'   => esc_html__( 'Custom Icon', 'mediclinic' ),
                ),
                array(
                    'type'    => 'textfield',
                    'name'    => 'custom_icon_size',
                    'title'   => esc_html__( 'Custom Icon Size', 'mediclinic' ),
                ),
                array(
                    'type'    => 'textfield',
                    'name'    => 'title',
                    'title'   => esc_html__( 'Title', 'mediclinic' ),
                ),
                array(
                    'type'    => 'textfield',
                    'name'    => 'title_font_size',
                    'title'   => esc_html__( 'Title Font Size', 'mediclinic' ),
                ),
                array(
                    'type'    => 'textfield',
                    'name'    => 'title_font_weight',
                    'title'   => esc_html__( 'Title Font Weight', 'mediclinic' ),
                ),
                array(
                    'type'  => 'textfield',
                    'name'  => 'title_color',
                    'title' => esc_html__( 'Title Color', 'mediclinic' )
                ),
                array(
                    'type'    => 'textfield',
                    'name'    => 'subtitle',
                    'title'   => esc_html__( 'Icon Info Subtitle', 'mediclinic' ),
                ),
                array(
                    'type'  => 'textfield',
                    'name'  => 'subtitle_color',
                    'title' => esc_html__( 'Subtitle Color', 'mediclinic' )
                ),
                array(
                    'type'  => 'textfield',
                    'name'  => 'icon_color',
                    'title' => esc_html__( 'Icon Color', 'mediclinic' )
                ),
                array(
                    'type'  => 'textfield',
                    'name'  => 'link',
                    'title' => esc_html__( 'Link', 'mediclinic' )
                ),
            )
        );
    }

    /**
     * Generates widget's HTML
     *
     * @param array $args args from widget area
     * @param array $instance widget's options
     */
    public function widget($args, $instance) {
        $params = '';

        if (!is_array($instance)) { $instance = array(); }

        // Filter out all empty params
        $instance = array_filter($instance, function($array_value) { return trim($array_value) != ''; });


        // Generate shortcode params
        foreach($instance as $key => $value) {
            $params .= " $key='$value' ";
        }

        echo '<div class="widget mkdf-icon-info-widget">';
        echo do_shortcode("[mkdf_icon_info $params]"); // XSS OK
        echo '</div>';
    }
}