<div class="mkdf-blog-list-holder <?php echo esc_attr($holder_classes); ?>" <?php echo wp_kses($holder_data, array('data')); ?>>
	<div class="mkdf-bl-wrapper">
		<ul class="mkdf-blog-list">
			<div class="mkdf-bl-grid-sizer"></div>
			<div class="mkdf-bl-grid-gutter"></div>
			<?php
	            if($query_result->have_posts()):
	                while ($query_result->have_posts()) : $query_result->the_post();
	                    mediclinic_mikado_get_module_template_part('shortcodes/blog-list/layout-collections/'.$type, 'blog', '', $params);
	                endwhile;
	            else:
	                mediclinic_mikado_get_module_template_part('templates/parts/no-posts', 'blog', '', $params);
	            endif;
			
                wp_reset_postdata();
			?>
		</ul>
	</div>
	<?php mediclinic_mikado_get_module_template_part('templates/parts/pagination/'.$params['pagination_type'], 'blog', '', $params); ?>
</div>