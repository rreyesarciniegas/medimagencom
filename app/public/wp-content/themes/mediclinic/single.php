<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

        <?php

        //Get blog single type and load proper helper
        $mkdf_blog_single_type = mediclinic_mikado_get_blog_single_layout();
        mediclinic_mikado_include_blog_helper_functions('singles');

        //Action added for applying module specific filters that couldn't be applied on init
        do_action('mediclinic_mikado_blog_single_loaded');

        //Get classes for holder and holder inner
        $mkdf_holder_params = mediclinic_mikado_get_holder_params_blog();

        ?>

        <?php mediclinic_mikado_get_title(); ?>
        <?php get_template_part('slider'); ?>
        <div class="<?php echo esc_attr($mkdf_holder_params['holder']); ?>">
            <?php do_action('mediclinic_mikado_after_container_open'); ?>
            <div class="<?php echo esc_attr($mkdf_holder_params['inner']); ?>">
                <?php mediclinic_mikado_get_blog_single($mkdf_blog_single_type); ?>
            </div>
            <?php do_action('mediclinic_mikado_before_container_close'); ?>
        </div>
    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>