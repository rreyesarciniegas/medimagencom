<?php

class MediclinicMikadoButtonWidget extends MediclinicMikadoWidget {
	public function __construct() {
		parent::__construct(
			'mkdf_button_widget',
			esc_html__('Mikado Button Widget', 'mediclinic'),
			array( 'description' => esc_html__( 'Add button element to widget areas', 'mediclinic'))
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
					'solid'   => esc_html__( 'Solid', 'mediclinic' ),
					'outline' => esc_html__( 'Outline', 'mediclinic' ),
					'simple'  => esc_html__( 'Simple', 'mediclinic' )
				)
			),
			array(
				'type'        => 'dropdown',
				'name'        => 'size',
				'title'       => esc_html__( 'Size', 'mediclinic' ),
				'options'     => array(
					'small'  => esc_html__( 'Small', 'mediclinic' ),
					'medium' => esc_html__( 'Medium', 'mediclinic' ),
					'large'  => esc_html__( 'Large', 'mediclinic' ),
					'huge'   => esc_html__( 'Huge', 'mediclinic' )
				),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'mediclinic' )
			),
			array(
				'type'    => 'textfield',
				'name'    => 'text',
				'title'   => esc_html__( 'Text', 'mediclinic' ),
				'default' => esc_html__( 'Button Text', 'mediclinic' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'link',
				'title' => esc_html__( 'Link', 'mediclinic' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'target',
				'title'   => esc_html__( 'Link Target', 'mediclinic' ),
				'options' => mediclinic_mikado_get_link_target_array()
			),
			array(
				'type'  => 'textfield',
				'name'  => 'color',
				'title' => esc_html__( 'Color', 'mediclinic' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'hover_color',
				'title' => esc_html__( 'Hover Color', 'mediclinic' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'background_color',
				'title'       => esc_html__( 'Background Color', 'mediclinic' ),
				'description' => esc_html__( 'This option is only available for solid button type', 'mediclinic' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'hover_background_color',
				'title'       => esc_html__( 'Hover Background Color', 'mediclinic' ),
				'description' => esc_html__( 'This option is only available for solid button type', 'mediclinic' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'border_color',
				'title'       => esc_html__( 'Border Color', 'mediclinic' ),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'mediclinic' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'hover_border_color',
				'title'       => esc_html__( 'Hover Border Color', 'mediclinic' ),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'mediclinic' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'margin',
				'title'       => esc_html__( 'Margin', 'mediclinic' ),
				'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'mediclinic' )
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

		// Default values
		if (!isset($instance['text'])) { $instance['text'] = 'Button Text'; }

		// Generate shortcode params
		foreach($instance as $key => $value) {
			$params .= " $key='$value' ";
		}

		echo '<div class="widget mkdf-button-widget">';
			echo do_shortcode("[mkdf_button $params]"); // XSS OK
		echo '</div>';
	}
}