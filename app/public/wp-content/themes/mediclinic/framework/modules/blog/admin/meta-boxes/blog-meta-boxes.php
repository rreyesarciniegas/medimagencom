<?php

foreach ( glob( MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/blog/admin/meta-boxes/*/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'mediclinic_mikado_map_blog_meta' ) ) {
	function mediclinic_mikado_map_blog_meta() {
		$mkd_blog_categories = array();
		$categories           = get_categories();
		foreach ( $categories as $category ) {
			$mkd_blog_categories[ $category->slug ] = $category->name;
		}
		
		$blog_meta_box = mediclinic_mikado_create_meta_box(
			array(
				'scope' => array( 'page' ),
				'title' => esc_html__( 'Blog', 'mediclinic' ),
				'name'  => 'blog_meta'
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_blog_category_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Blog Category', 'mediclinic' ),
				'description' => esc_html__( 'Choose category of posts to display (leave empty to display all categories)', 'mediclinic' ),
				'parent'      => $blog_meta_box,
				'options'     => $mkd_blog_categories
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_show_posts_per_page_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Number of Posts', 'mediclinic' ),
				'description' => esc_html__( 'Enter the number of posts to display', 'mediclinic' ),
				'parent'      => $blog_meta_box,
				'options'     => $mkd_blog_categories,
				'args'        => array( "col_width" => 3 )
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_blog_masonry_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Layout', 'mediclinic' ),
				'description' => esc_html__( 'Set masonry layout. Default is in grid.', 'mediclinic' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''           => esc_html__( 'Default', 'mediclinic' ),
					'in-grid'    => esc_html__( 'In Grid', 'mediclinic' ),
					'full-width' => esc_html__( 'Full Width', 'mediclinic' )
				)
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_blog_masonry_number_of_columns_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Number of Columns', 'mediclinic' ),
				'description' => esc_html__( 'Set number of columns for your masonry blog lists', 'mediclinic' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''      => esc_html__( 'Default', 'mediclinic' ),
					'two'   => esc_html__( '2 Columns', 'mediclinic' ),
					'three' => esc_html__( '3 Columns', 'mediclinic' ),
					'four'  => esc_html__( '4 Columns', 'mediclinic' ),
					'five'  => esc_html__( '5 Columns', 'mediclinic' )
				)
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_blog_masonry_space_between_items_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Space Between Items', 'mediclinic' ),
				'description' => esc_html__( 'Set space size between posts for your masonry blog lists', 'mediclinic' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''       => esc_html__( 'Default', 'mediclinic' ),
					'normal' => esc_html__( 'Normal', 'mediclinic' ),
					'small'  => esc_html__( 'Small', 'mediclinic' ),
					'tiny'   => esc_html__( 'Tiny', 'mediclinic' ),
					'no'     => esc_html__( 'No Space', 'mediclinic' )
				)
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_blog_list_featured_image_proportion_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Featured Image Proportion', 'mediclinic' ),
				'description'   => esc_html__( 'Choose type of proportions you want to use for featured images on blog lists.', 'mediclinic' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''         => esc_html__( 'Default', 'mediclinic' ),
					'fixed'    => esc_html__( 'Fixed', 'mediclinic' ),
					'original' => esc_html__( 'Original', 'mediclinic' )
				)
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_blog_pagination_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'mediclinic' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'mediclinic' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''                => esc_html__( 'Default', 'mediclinic' ),
					'standard'        => esc_html__( 'Standard', 'mediclinic' ),
					'load-more'       => esc_html__( 'Load More', 'mediclinic' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'mediclinic' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'mediclinic' )
				)
			)
		);
		
		mediclinic_mikado_create_meta_box_field(
			array(
				'type'          => 'text',
				'name'          => 'mkdf_number_of_chars_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'mediclinic' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 40', 'mediclinic' ),
				'parent'        => $blog_meta_box,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
	}
	
	add_action( 'mediclinic_mikado_meta_boxes_map', 'mediclinic_mikado_map_blog_meta', 30 );
}