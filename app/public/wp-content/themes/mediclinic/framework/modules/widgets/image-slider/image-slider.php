<?php

class MediclinicMikadoImageSliderWidget extends MediclinicMikadoWidget {
    public function __construct() {
        parent::__construct(
            'mkdf_image_slider_widget',
            esc_html__('Mikado Image Slider Widget', 'mediclinic'),
            array( 'description' => esc_html__( 'Add image slider element to widget areas', 'mediclinic'))
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
                'type' => 'textfield',
                'name' => 'extra_class',
                'title' => esc_html__('Custom CSS Class', 'mediclinic')
            ),
            array(
                'type' => 'textfield',
                'name' => 'widget_title',
                'title' => esc_html__('Widget Title', 'mediclinic')
            ),
            array(
                'type'        => 'textfield',
                'name'        => 'images',
                'title'       => esc_html__('Image ID\'s', 'mediclinic'),
	            'description' => esc_html__('Add images id for your image slider widget, separate id\'s with comma', 'mediclinic')
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
        $extra_class       = ! empty( $instance['extra_class'] ) ? $instance['extra_class'] : '';
	    $image_slider_html = '';
	    $image_ids         = array();
	
	    if ($instance['images'] !== '') {
		    $image_ids = explode(',', $instance['images']);
	    }
	
	    foreach ($image_ids as $id) {
		    $image_original = wp_get_attachment_image_src($id, 'full');
		    $image_url = $image_original[0];
		    $image_alt = get_post_meta( $id, '_wp_attachment_image_alt', true);
		
		    $image_slider_html .= '<img itemprop="image" class="mkdf-is-widget-image" src="'.esc_url($image_url).'" alt="'.esc_attr($image_alt).'" />';
	    }
	
	    $slider_data = array();
	    $slider_data['data-enable-navigation'] = 'no';
	    $slider_data['data-enable-pagination'] = 'yes';
        ?>

        <div class="widget mkdf-image-slider-widget <?php echo esc_html($extra_class); ?>">
            <?php
	            if ( ! empty( $instance['widget_title'] ) ) {
		            echo wp_kses_post( $args['before_title'] ) . esc_html( $instance['widget_title'] ) . wp_kses_post( $args['after_title'] );
	            }
                if (!empty($image_slider_html)) {
                	echo '<div class="mkdf-is-widget-inner mkdf-owl-slider" '.mediclinic_mikado_get_inline_attrs($slider_data).'>';
		                echo wp_kses($image_slider_html, array(
			                'img' => array(
				                'itemprop' => true,
				                'class'    => true,
				                'src'      => true,
				                'alt'      => true,
				                'width'    => true,
				                'height'   => true
			                )
		                ));
	                echo '</div>';
                }
            ?>
        </div>
    <?php 
    }
}