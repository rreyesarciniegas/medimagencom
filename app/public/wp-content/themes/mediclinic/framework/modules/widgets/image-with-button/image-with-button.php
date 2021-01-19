<?php

class MediclinicMikadoImageWithButtonWidget extends MediclinicMikadoWidget {
	public function __construct() {
		parent::__construct(
			'mkdf_image_with_button_widget',
			esc_html__('Mikado Image With Button Widget', 'mediclinic'),
			array( 'description' => esc_html__( 'Add image with button element to widget areas', 'mediclinic'))
		);

		$this->setParams();
	}

	/**
	 * Sets widget options
	 */
	protected function setParams() {
		$this->params = array(
			array(
				'type'  => 'textfield',
				'name'  => 'extra_class',
				'title' => esc_html__( 'Custom CSS Class', 'mediclinic' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'widget_title',
				'title' => esc_html__( 'Widget Title', 'mediclinic' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'image',
				'title'       => esc_html__( 'Background Image', 'mediclinic' ),
				'description' => esc_html__( 'Set background image of widget', 'mediclinic' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'text',
				'title'       => esc_html__( 'Text', 'mediclinic' ),
				'description' => esc_html__( 'Enter widget text', 'mediclinic' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'button_text',
				'title'       => esc_html__( 'Button Text', 'mediclinic' ),
				'description' => esc_html__( 'Enter button text', 'mediclinic' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'button_skin',
				'title'   => esc_html__( 'Button Skin', 'mediclinic' ),
				'options' => array(
					'light'   => esc_html__( 'Light', 'mediclinic' ),
					'dark' => esc_html__( 'Dark', 'mediclinic' )
				)
			),
			array(
				'type'        => 'textfield',
				'name'        => 'button_link',
				'title'       => esc_html__( 'Button Link', 'mediclinic' ),
				'description' => esc_html__( 'Enter button Link', 'mediclinic' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'button_link_target',
				'title'   => esc_html__( 'Button Link Target', 'mediclinic' ),
				'options' => mediclinic_mikado_get_link_target_array()
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
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		$extra_class = ! empty( $instance['extra_class'] ) ? $instance['extra_class'] : '';

		//prepare variables
		$params = '';




		?>

		<div class="widget mkdf-image-gallery-widget <?php echo esc_html($extra_class); ?>">
			<div class="mkdf-image-with-button-holder" style="background-image: url('<?php echo wp_kses_post(  esc_html( $instance['image'] )); ?>')">
				<?php
				if ( ! empty( $instance['widget_title'] ) ) {
					echo wp_kses_post( $args['before_title'] ) . esc_html( $instance['widget_title'] ) . wp_kses_post( $args['after_title'] );
				}
				?>
				<p><?php echo wp_kses_post( esc_html($instance['text'])); ?></p>
				<?php
				echo do_shortcode('[mkdf_button  solid_skin="'. esc_html($instance['button_skin']).'" text="'. esc_html($instance['button_text']).'" target="'. esc_html($instance['button_link_target']).'" icon_pack="ion_icons" ion_icon="ion-chevron-right" font_weight="" link="'. esc_html($instance['button_link']).'"]'); // XSS OK
				?>
			</div>
		</div>
		<?php
	}
}