<?php do_action('mediclinic_mikado_before_page_title'); ?>
<div class="mkdf-title <?php echo mediclinic_mikado_title_classes(); ?>" style="<?php echo esc_attr($title_height); echo esc_attr($title_background_color); echo esc_attr($title_background_image); ?>" data-height="<?php echo esc_attr(intval(preg_replace('/[^0-9]+/', '', $title_height), 10));?>" <?php echo esc_attr($title_background_image_width); ?>>
    <?php if(!empty($title_background_image_src)) { ?>
        <div class="mkdf-title-image">
            <img itemprop="image" src="<?php echo esc_url($title_background_image_src); ?>" alt="<?php esc_attr_e('Title Image', 'mediclinic'); ?>" />
        </div>
    <?php } ?>
    <div class="mkdf-title-holder" <?php mediclinic_mikado_inline_style($title_holder_height); ?>>
        <div class="mkdf-container clearfix">
            <div class="mkdf-container-inner">
                <div class="mkdf-title-subtitle-holder" style="<?php echo esc_attr($title_subtitle_holder_padding); ?>">
                    <div class="mkdf-title-subtitle-holder-inner">
                        <?php switch ($type){
                            case 'standard': ?>
                                <?php if(mediclinic_mikado_get_title_text() !== '') { ?>
                                    <<?php echo esc_attr($title_tag); ?> class="mkdf-page-title entry-title" <?php mediclinic_mikado_inline_style($title_color); ?>><span><?php mediclinic_mikado_title_text(); ?></span></<?php echo esc_attr($title_tag); ?>>
                                <?php } ?>
                                <?php if($has_subtitle){ ?>
                                    <span class="mkdf-subtitle" <?php mediclinic_mikado_inline_style($subtitle_styles); ?>><span><?php mediclinic_mikado_subtitle_text(); ?></span></span>
                                <?php } ?>
                                <?php if($enable_breadcrumbs){ ?>
                                    <div class="mkdf-breadcrumbs-holder"> <?php mediclinic_mikado_custom_breadcrumbs(); ?></div>
                                <?php } ?>
                            <?php break;
                            case 'breadcrumb': ?>
                                <div class="mkdf-breadcrumbs-holder"> <?php mediclinic_mikado_custom_breadcrumbs(); ?></div>
                            <?php break;
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php do_action('mediclinic_mikado_after_page_title'); ?>
