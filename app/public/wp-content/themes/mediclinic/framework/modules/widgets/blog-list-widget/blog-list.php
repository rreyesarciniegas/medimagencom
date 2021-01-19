<?php

class MediclinicMikadoBlogListWidget extends MediclinicMikadoWidget {
    public function __construct() {
        parent::__construct(
            'mkdf_blog_list_widget',
            esc_html__('Mikado Blog List Widget', 'mediclinic'),
            array( 'description' => esc_html__( 'Display a list of your blog posts', 'mediclinic'))
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
				'name'  => 'widget_title',
				'title' => esc_html__( 'Widget Title', 'mediclinic' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'number_of_posts',
				'title' => esc_html__( 'Number of Posts', 'mediclinic' )
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
				'name'    => 'order_by',
				'title'   => esc_html__( 'Order By', 'mediclinic' ),
				'options' => mediclinic_mikado_get_query_order_by_array()
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'order',
				'title'   => esc_html__( 'Order', 'mediclinic' ),
				'options' => mediclinic_mikado_get_query_order_array()
			),
			array(
				'type'        => 'textfield',
				'name'        => 'category',
				'title'       => esc_html__( 'Category Slug', 'mediclinic' ),
				'description' => esc_html__( 'Leave empty for all or use comma for list', 'mediclinic' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'title_tag',
				'title'   => esc_html__( 'Title Tag', 'mediclinic' ),
				'options' => mediclinic_mikado_get_title_tag( true, array( 'p' => 'p') )
			),
			array(
					'type'        => 'textfield',
					'name'  => 'title_size',
					'title'     => esc_html__('Title Size', 'mediclinic'),
					'description' => esc_html__('Enter the title size in px', 'mediclinic')
			),
			array(
					'type'        => 'dropdown',
					'name'  => 'title_weight',
					'title'     => esc_html__('Title Weight', 'mediclinic'),
					'description' => esc_html__('Choose font weight from 100 to 900', 'mediclinic'),
                    'options' => mediclinic_mikado_get_font_weight_array( true )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'title_transform',
				'title'   => esc_html__( 'Title Text Transform', 'mediclinic' ),
				'options' => mediclinic_mikado_get_text_transform_array( true )
			),
		);
	}

    /**
     * Generates widget's HTML
     *
     * @param array $args args from widget area
     * @param array $instance widget's options
     */
    public function widget($args, $instance) {
        if (!is_array($instance)) { $instance = array(); }
	
	    $instance['image_size']        = 'thumbnail';
        $instance['post_info_section'] = 'yes';
        $instance['number_of_columns'] = '1';
        $instance['type'] = 'simple';

        // Filter out all empty params
        $instance         = array_filter($instance, function($array_value) { return trim($array_value) != ''; });
	    
	    $params = '';
        //generate shortcode params
        foreach($instance as $key => $value) {
            $params .= " $key='$value' ";
        }

        echo '<div class="widget mkdf-blog-list-widget">';
		    if ( ! empty( $instance['widget_title'] ) ) {
			    echo wp_kses_post( $args['before_title'] ) . esc_html( $instance['widget_title'] ) . wp_kses_post( $args['after_title'] );
		    }

            echo do_shortcode("[mkdf_blog_list $params]"); // XSS OK
        echo '</div>';
    }
}