<?php

class MediclinicMikadoSeparatorWidget extends MediclinicMikadoWidget {
    public function __construct() {
        parent::__construct(
            'mkdf_separator_widget',
	        esc_html__('Mikado Separator Widget', 'mediclinic'),
	        array( 'description' => esc_html__( 'Add a separator element to your widget areas', 'mediclinic'))
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
	protected function setParams() {
		$this->params = array(
			array(
				'type'    => 'dropdown',
				'name'    => 'type',
				'title'   => esc_html__( 'Type', 'mediclinic' ),
				'options' => array(
					'normal'     => esc_html__( 'Normal', 'mediclinic' ),
					'full-width' => esc_html__( 'Full Width', 'mediclinic' )
				)
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'position',
				'title'   => esc_html__( 'Position', 'mediclinic' ),
				'options' => array(
					'center' => esc_html__( 'Center', 'mediclinic' ),
					'left'   => esc_html__( 'Left', 'mediclinic' ),
					'right'  => esc_html__( 'Right', 'mediclinic' )
				)
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'border_style',
				'title'   => esc_html__( 'Style', 'mediclinic' ),
				'options' => array(
					'solid'  => esc_html__( 'Solid', 'mediclinic' ),
					'dashed' => esc_html__( 'Dashed', 'mediclinic' ),
					'dotted' => esc_html__( 'Dotted', 'mediclinic' )
				)
			),
			array(
				'type'  => 'textfield',
				'name'  => 'color',
				'title' => esc_html__( 'Color', 'mediclinic' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'width',
				'title' => esc_html__( 'Width', 'mediclinic' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'thickness',
				'title' => esc_html__( 'Thickness (px)', 'mediclinic' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'top_margin',
				'title' => esc_html__( 'Top Margin', 'mediclinic' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'bottom_margin',
				'title' => esc_html__( 'Bottom Margin', 'mediclinic' )
			)
		);
	}

    /**
     * Generates widget's HTML
     *
     * @param array $args args from widget area
     * @param array $instance widget's options
     */
	public function widget( $args, $instance ) {
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		
		//prepare variables
		$params = '';
		
		//is instance empty?
		if ( is_array( $instance ) && count( $instance ) ) {
			//generate shortcode params
			foreach ( $instance as $key => $value ) {
				$params .= " $key='$value' ";
			}
		}
		
		echo '<div class="widget mkdf-separator-widget">';
			echo do_shortcode( "[mkdf_separator $params]" ); // XSS OK
		echo '</div>';
	}
}