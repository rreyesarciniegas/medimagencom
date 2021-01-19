<div class="mkdf-post-read-more-button">
<?php
    if(mediclinic_mikado_core_plugin_installed()) {
        echo mediclinic_mikado_get_button_html(
            apply_filters(
                'mediclinic_mikado_blog_template_read_more_button',
                array(
                    'type' => 'simple',
                    'size' => 'medium',
                    'link' => get_the_permalink(),
                    'text' => esc_html__('Learn more', 'mediclinic'),
                    'custom_class' => 'mkdf-blog-list-button'
                )
            )
        );
    } else { ?>
        <a itemprop="url" href="<?php echo esc_url(get_the_permalink()); ?>" target="_self" class="mkdf-btn mkdf-btn-medium mkdf-btn-simple mkdf-blog-list-button">
            <span class="mkdf-btn-text">
                <?php echo esc_html__('Read more', 'mediclinic'); ?>
            </span>
        </a>
<?php } ?>
</div>
