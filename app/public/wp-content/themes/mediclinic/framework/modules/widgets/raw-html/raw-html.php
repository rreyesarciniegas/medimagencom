<?php

class MediclinicMikadoRawHTMLWidget extends MediclinicMikadoWidget {
	public function __construct() {
		parent::__construct(
			'mkdf_raw_html_widget',
			esc_html__( 'Mikado Raw HTML Widget', 'mediclinic' ),
			array( 'description' => esc_html__( 'Add raw HTML holder to widget areas', 'mediclinic' ) )
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
				'title' => esc_html__( 'Extra Class Name', 'mediclinic' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'widget_title',
				'title' => esc_html__( 'Widget Title', 'mediclinic' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'widget_grid',
				'title'   => esc_html__( 'Widget Grid', 'mediclinic' ),
				'options' => array(
					''     => esc_html__( 'Full Width', 'mediclinic' ),
					'auto' => esc_html__( 'Auto', 'mediclinic' )
				)
			),
			array(
				'type'  => 'textarea',
				'name'  => 'content',
				'title' => esc_html__( 'Content', 'mediclinic' )
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
		$extra_class   = array();
		$extra_class[] = !empty( $instance['extra_class'] ) ? $instance['extra_class'] : '';
		$extra_class[] = !empty( $instance['widget_grid'] ) && $instance['widget_grid'] === 'auto' ? 'mkdf-grid-auto-width' : '';
		?>
		
		<div class="widget mkdf-raw-html-widget <?php echo esc_attr( implode( ' ', $extra_class ) ); ?>">
			<?php
				if ( ! empty( $instance['widget_title'] ) ) {
					echo wp_kses_post( $args['before_title'] ) . esc_html( $instance['widget_title'] ) . wp_kses_post( $args['after_title'] );
				}
				if ( ! empty( $instance['content'] ) ) {
					echo wp_kses_post( $instance['content'] );
				}
			?>
		</div>
		<?php
	}
}