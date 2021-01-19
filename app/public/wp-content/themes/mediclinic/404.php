<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php
    /**
     * mediclinic_mikado_header_meta hook
     *
     * @see mediclinic_mikado_header_meta() - hooked with 10
     * @see mediclinic_mikado_user_scalable_meta - hooked with 10
     */
    do_action('mediclinic_mikado_header_meta');

    wp_head(); ?>
</head>
<body <?php body_class();?> itemscope itemtype="http://schema.org/WebPage">
	<?php
	/**
	 * mediclinic_mikado_after_body_tag hook
	 *
	 * @see mediclinic_mikado_get_side_area() - hooked with 10
	 * @see mediclinic_mikado_smooth_page_transitions() - hooked with 10
	 */
	do_action('mediclinic_mikado_after_body_tag'); ?>
	
	<div class="mkdf-wrapper mkdf-404-page">
	    <div class="mkdf-wrapper-inner">
		    <?php mediclinic_mikado_get_header(); ?>
		    
			<div class="mkdf-content" <?php mediclinic_mikado_content_elem_style_attr(); ?>>
	            <div class="mkdf-content-inner">
					<div class="mkdf-page-not-found">
						<?php
							$mkdf_title_image_404 = mediclinic_mikado_options()->getOptionValue('404_page_title_image');
							$mkdf_title_404       = mediclinic_mikado_options()->getOptionValue('404_title');
							$mkdf_subtitle_404    = mediclinic_mikado_options()->getOptionValue('404_subtitle');
							$mkdf_text_404        = mediclinic_mikado_options()->getOptionValue('404_text');
							$mkdf_button_label    = mediclinic_mikado_options()->getOptionValue('404_back_to_home');
						?>

						<?php if (!empty($mkdf_title_image_404)) { ?>
							<div class="mkdf-404-title-image"><img src="<?php echo esc_url($mkdf_title_image_404); ?>" alt="<?php esc_attr_e('404 Title Image', 'mediclinic'); ?>" /></div>
						<?php } ?>

						<h1 class="mkdf-404-title">
							<?php if(!empty($mkdf_title_404)) {
								echo esc_html($mkdf_title_404);
							} else {
								esc_html_e('404', 'mediclinic');
							} ?>
						</h1>

						<h3 class="mkdf-404-subtitle">
							<?php if(!empty($mkdf_subtitle_404)){
								echo esc_html($mkdf_subtitle_404);
							} else {
								esc_html_e('Page not found', 'mediclinic');
							} ?>
						</h3>

						<p class="mkdf-404-text">
							<?php if(!empty($mkdf_text_404)){
								echo esc_html($mkdf_text_404);
							} else {
								esc_html_e('Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'mediclinic');
							} ?>
						</p>

						<?php
							$mkdf_params = array();
							$mkdf_params['text'] = !empty($mkdf_button_label) ? $mkdf_button_label : esc_html__('Back to home', 'mediclinic');
							$mkdf_params['link'] = esc_url(home_url('/'));
							$mkdf_params['target'] = '_self';
							$mkdf_params['size'] = 'large';

						echo mediclinic_mikado_execute_shortcode('mkdf_button',$mkdf_params);?>
					</div>
				</div>	
			</div>
		</div>
	</div>
	<?php get_footer(); ?>
</body>
</html>