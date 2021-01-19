<?php

/*** Post Settings ***/

if ( ! function_exists( 'mediclinic_mikado_map_post_meta' ) ) {
	function mediclinic_mikado_map_post_meta() {
		
		$post_meta_box = mediclinic_mikado_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Post', 'mediclinic' ),
				'name'  => 'post-meta'
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_blog_single_sidebar_layout_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'mediclinic' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog single page', 'mediclinic' ),
				'default_value' => '',
				'parent'        => $post_meta_box,
				'options'       => array(
					''                 => esc_html__( 'Default', 'mediclinic' ),
					'no-sidebar'       => esc_html__( 'No Sidebar', 'mediclinic' ),
					'sidebar-33-right' => esc_html__( 'Sidebar 1/3 Right', 'mediclinic' ),
					'sidebar-25-right' => esc_html__( 'Sidebar 1/4 Right', 'mediclinic' ),
					'sidebar-33-left'  => esc_html__( 'Sidebar 1/3 Left', 'mediclinic' ),
					'sidebar-25-left'  => esc_html__( 'Sidebar 1/4 Left', 'mediclinic' )
				)
			)
		);
		
		$mediclinic_custom_sidebars = mediclinic_mikado_get_custom_sidebars();
		if ( count( $mediclinic_custom_sidebars ) > 0 ) {
			mediclinic_mikado_create_meta_box_field( array(
				'name'        => 'mkdf_blog_single_custom_sidebar_area_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'mediclinic' ),
				'description' => esc_html__( 'Choose a sidebar to display on Blog single page. Default sidebar is "Sidebar"', 'mediclinic' ),
				'parent'      => $post_meta_box,
				'options'     => mediclinic_mikado_get_custom_sidebars(),
				'args' => array(
					'select2' => true
				)
			) );
		}
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_blog_list_featured_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Blog List Image', 'mediclinic' ),
				'description' => esc_html__( 'Choose an Image for displaying in blog list. If not uploaded, featured image will be shown.', 'mediclinic' ),
				'parent'      => $post_meta_box
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_title_area_blog_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'mediclinic' ),
				'description'   => esc_html__( 'Enabling this option will show title area on your single post page', 'mediclinic' ),
				'parent'        => $post_meta_box,
				'options'       => mediclinic_mikado_get_yes_no_select_array()
			)
		);
	}
	
	add_action( 'mediclinic_mikado_meta_boxes_map', 'mediclinic_mikado_map_post_meta', 20 );
}
