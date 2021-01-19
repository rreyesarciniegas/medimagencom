<?php
/*
Template Name: Coming Soon Page
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
	    <?php
	    /**
	     * mediclinic_mikado_header_meta hook
	     *
	     * @see mediclinic_mikado_header_meta() - hooked with 10
	     * @see mediclinic_mikado_user_scalable_meta() - hooked with 10
	     */
	    do_action('mediclinic_mikado_header_meta');

	    wp_head(); ?>
    </head>
	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
		<?php
		/**
		 * mediclinic_mikado_after_body_tag hook
		 *
		 * @see mediclinic_mikado_get_side_area() - hooked with 10
		 * @see mediclinic_mikado_smooth_page_transitions() - hooked with 10
		 */
		do_action('mediclinic_mikado_after_body_tag'); ?>

		<div class="mkdf-wrapper">
			<div class="mkdf-wrapper-inner">
				<div class="mkdf-content">
		            <div class="mkdf-content-inner">
						<div class="mkdf-full-width">
							<div class="mkdf-full-width-inner">
								<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
									<?php the_content(); ?>
								<?php endwhile; endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>