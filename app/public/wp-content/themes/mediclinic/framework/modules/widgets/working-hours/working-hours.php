<?php

class MediclinicMikadoWorkingHoursWidget extends MediclinicMikadoWidget {
    public function __construct() {
        parent::__construct(
            'mkdf_working_hours_widget',
	        esc_html__('Mikado Working Hours Widget', 'mediclinic'),
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
				'name'    => 'format',
				'title'   => esc_html__( 'Style', 'mediclinic' ),
				'options' => array(
					'5_2'  => esc_html__( 'Work Days + Weekend', 'mediclinic' ),
					'5_1_1' => esc_html__( 'Work Days + Saturday + Sunday', 'mediclinic' ),
					'7' => esc_html__( 'Same Throught the Week', 'mediclinic' ),
					'1_1_1_1_1_2' => esc_html__( 'Mon + Tue + Wed + Thu + Fri + Weekend', 'mediclinic' ),
					'1_1_1_1_1_1_1' => esc_html__( 'Mon + Tue + Wed + Thu + Fri + Sat + Sun', 'mediclinic' ),
				)
			),
			array(
				'type'  => 'textfield',
				'name'  => 'title',
				'title' => esc_html__( 'Title', 'mediclinic' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'text',
				'title' => esc_html__( 'Text', 'mediclinic' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'bckg_color',
				'title' => esc_html__( 'Background Color', 'mediclinic' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'monday_to_sunday',
				'title' => esc_html__( 'Monday To Sunday', 'mediclinic' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'monday_to_friday',
				'title' => esc_html__( 'Monday To Friday', 'mediclinic' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'weekend',
				'title' => esc_html__( 'Weekend', 'mediclinic' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'monday',
				'title' => esc_html__( 'Monday', 'mediclinic' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'tuesday',
				'title' => esc_html__( 'Tuesday', 'mediclinic' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'wednesday',
				'title' => esc_html__( 'Wednesday', 'mediclinic' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'thursday',
				'title' => esc_html__( 'Thursday', 'mediclinic' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'friday',
				'title' => esc_html__( 'Friday', 'mediclinic' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'saturday',
				'title' => esc_html__( 'Saturday', 'mediclinic' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'sunday',
				'title' => esc_html__( 'Sunday', 'mediclinic' )
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
		
		echo '<div class="widget mkdf-working-hours-widget">';
			echo do_shortcode( "[mkdf_working_hours $params]" ); // XSS OK
		echo '</div>';
	}
}