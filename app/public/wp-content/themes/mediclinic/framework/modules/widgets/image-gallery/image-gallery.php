<?php

class MediclinicMikadoImageGalleryWidget extends MediclinicMikadoWidget {
    public function __construct() {
        parent::__construct(
            'mkdf_image_gallery_widget',
            esc_html__('Mikado Image Gallery Widget', 'mediclinic'),
            array( 'description' => esc_html__( 'Add image gallery element to widget areas', 'mediclinic'))
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
		        'name'        => 'images',
		        'title'       => esc_html__( 'Image ID\'s', 'mediclinic' ),
		        'description' => esc_html__( 'Add images id for your image gallery widget, separate id\'s with comma', 'mediclinic' )
	        ),
	        array(
		        'type'        => 'textfield',
		        'name'        => 'image_size',
		        'title'       => esc_html__( 'Image Size', 'mediclinic' ),
		        'description' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size', 'mediclinic' )
	        ),
	        array(
		        'type'    => 'dropdown',
		        'name'    => 'number_of_columns',
		        'title'   => esc_html__( 'Number of Columns', 'mediclinic' ),
		        'options' => array(
			        'two'   => esc_html__( 'Two', 'mediclinic' ),
			        'three' => esc_html__( 'Three', 'mediclinic' ),
			        'four'  => esc_html__( 'Four', 'mediclinic' ),
			        'five'  => esc_html__( 'Five', 'mediclinic' ),
			        'six'   => esc_html__( 'Six', 'mediclinic' )
		        )
	        ),
	        array(
		        'type'    => 'dropdown',
		        'name'    => 'space_between_columns',
		        'title'   => esc_html__( 'Space Between items', 'mediclinic' ),
		        'options' => array(
			        'normal' => esc_html__( 'Normal', 'mediclinic' ),
			        'small'  => esc_html__( 'Small', 'mediclinic' ),
			        'tiny'   => esc_html__( 'Tiny', 'mediclinic' ),
			        'no'     => esc_html__( 'No Space', 'mediclinic' )
		        )
	        ),
	        array(
		        'type'    => 'dropdown',
		        'name'    => 'image_behavior',
		        'title'   => esc_html__( 'Image Behavior', 'mediclinic' ),
		        'options' => array(
			        ''            => esc_html__( 'None', 'mediclinic' ),
			        'lightbox'    => esc_html__( 'Open Lightbox', 'mediclinic' ),
			        'custom-link' => esc_html__( 'Open Custom Link', 'mediclinic' ),
			        'zoom'        => esc_html__( 'Zoom', 'mediclinic' ),
			        'grayscale'   => esc_html__( 'Grayscale', 'mediclinic' )
		        )
	        ),
	        array(
		        'type'        => 'textarea',
		        'name'        => 'custom_links',
		        'title'       => esc_html__( 'Custom Links', 'mediclinic' ),
		        'description' => esc_html__( 'Delimit links by comma', 'mediclinic' )
	        ),
	        array(
		        'type'    => 'dropdown',
		        'name'    => 'custom_link_target',
		        'title'   => esc_html__( 'Custom Link Target', 'mediclinic' ),
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
	    $params .= ' type="grid"';
	
	    //is instance empty?
	    if ( is_array( $instance ) && count( $instance ) ) {
		    //generate shortcode params
		    foreach ( $instance as $key => $value ) {
			    $params .= " $key='$value' ";
		    }
	    }
        ?>

        <div class="widget mkdf-image-gallery-widget <?php echo esc_html($extra_class); ?>">
            <?php
	            if ( ! empty( $instance['widget_title'] ) ) {
		            echo wp_kses_post( $args['before_title'] ) . esc_html( $instance['widget_title'] ) . wp_kses_post( $args['after_title'] );
	            }
                echo do_shortcode("[mkdf_image_gallery $params]"); // XSS OK
            ?>
        </div>
    <?php 
    }
}