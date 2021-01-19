<?php

class MediclinicMikadoSearchOpener extends MediclinicMikadoWidget {
    public function __construct() {
        parent::__construct(
            'mkdf_search_opener',
	        esc_html__('Mikado Search Opener', 'mediclinic'),
	        array( 'description' => esc_html__( 'Display a "search" icon that opens the search form', 'mediclinic'))
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
	protected function setParams() {
		$this->params = array(
			array(
				'type'        => 'textfield',
				'name'        => 'search_icon_size',
				'title'       => esc_html__( 'Icon Size (px)', 'mediclinic' ),
				'description' => esc_html__( 'Define size for search icon', 'mediclinic' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'search_icon_color',
				'title'       => esc_html__( 'Icon Color', 'mediclinic' ),
				'description' => esc_html__( 'Define color for search icon', 'mediclinic' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'search_icon_hover_color',
				'title'       => esc_html__( 'Icon Hover Color', 'mediclinic' ),
				'description' => esc_html__( 'Define hover color for search icon', 'mediclinic' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'search_icon_margin',
				'title'       => esc_html__( 'Icon Margin', 'mediclinic' ),
				'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'mediclinic' )
			),
			array(
				'type'        => 'dropdown',
				'name'        => 'show_label',
				'title'       => esc_html__( 'Enable Search Icon Text', 'mediclinic' ),
				'description' => esc_html__( 'Enable this option to show search text next to search icon in header', 'mediclinic' ),
				'options'     => mediclinic_mikado_get_yes_no_select_array()
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
        global $mediclinic_mikado_options, $mediclinic_mikado_IconCollections;

	    $search_type_class    = 'mkdf-search-opener mkdf-icon-has-hover';
	    $styles = array();
	    $show_search_text     = $instance['show_label'] == 'yes' || $mediclinic_mikado_options['enable_search_icon_text'] == 'yes' ? true : false;

	    if(!empty($instance['search_icon_size'])) {
		    $styles[] = 'font-size: '.intval($instance['search_icon_size']).'px';
	    }

	    if(!empty($instance['search_icon_color'])) {
		    $styles[] = 'color: '.$instance['search_icon_color'].';';
	    }

	    if (!empty($instance['search_icon_margin'])) {
		    $styles[] = 'margin: ' . $instance['search_icon_margin'].';';
	    }
	    ?>

	    <a <?php mediclinic_mikado_inline_attr($instance['search_icon_hover_color'], 'data-hover-color'); ?> <?php mediclinic_mikado_inline_style($styles); ?>
		    <?php mediclinic_mikado_class_attribute($search_type_class); ?> href="javascript:void(0)">
            <span class="mkdf-search-opener-wrapper">
                <?php if(isset($mediclinic_mikado_options['search_icon_pack'])) {
	                $mediclinic_mikado_IconCollections->getSearchIcon($mediclinic_mikado_options['search_icon_pack'], false);
                } ?>
	            <?php if($show_search_text) { ?>
		            <span class="mkdf-search-icon-text"><?php esc_html_e('Search', 'mediclinic'); ?></span>
	            <?php } ?>
            </span>
	    </a>
    <?php }
}