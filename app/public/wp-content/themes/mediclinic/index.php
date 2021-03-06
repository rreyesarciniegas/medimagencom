<?php
$mkdf_blog_type = mediclinic_mikado_get_archive_blog_list_layout();
mediclinic_mikado_include_blog_helper_functions('lists');
$mkdf_holder_params = mediclinic_mikado_get_holder_params_blog();
?>
<?php get_header(); ?>
<?php mediclinic_mikado_get_title(); ?>
	<div class="<?php echo esc_attr($mkdf_holder_params['holder']); ?>">
		<?php do_action('mediclinic_mikado_after_container_open'); ?>
		<div class="<?php echo esc_attr($mkdf_holder_params['inner']); ?>">
			<?php mediclinic_mikado_get_blog($mkdf_blog_type); ?>
		</div>
		<?php do_action('mediclinic_mikado_before_container_close'); ?>
	</div>
<?php do_action('mediclinic_mikado_blog_list_additional_tags'); ?>
<?php get_footer(); ?>
