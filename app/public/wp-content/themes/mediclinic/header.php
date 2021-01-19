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

    <div class="mkdf-wrapper">
        <div class="mkdf-wrapper-inner">
            <?php mediclinic_mikado_get_header(); ?>
	
	        <?php
	        /**
	         * mediclinic_mikado_after_header_area hook
	         *
	         * @see mediclinic_mikado_back_to_top_button() - hooked with 10
	         * @see mediclinic_mikado_get_full_screen_menu() - hooked with 10
	         */
	        do_action('mediclinic_mikado_after_header_area'); ?>
	        
            <div class="mkdf-content" <?php mediclinic_mikado_content_elem_style_attr(); ?>>
                <div class="mkdf-content-inner">