<li class="mkdf-bl-item clearfix">
	<div class="mkdf-bli-inner">
        <?php if ($post_info_image == 'yes') {
            mediclinic_mikado_get_module_template_part('templates/parts/image', 'blog', '', $params);
        } ?>

        <div class="mkdf-bli-content">
            <?php mediclinic_mikado_get_module_template_part('templates/parts/title', 'blog', '', $params); ?>

            <?php
            if($post_info_section == 'yes') { ?>
                <div class="mkdf-bli-info">
                    <?php
                    if ($post_info_date == 'yes') {
                        mediclinic_mikado_get_module_template_part('templates/parts/post-info/date', 'blog', '', $params);
                    }
                    if ($post_info_category == 'yes') {
                        mediclinic_mikado_get_module_template_part('templates/parts/post-info/category', 'blog', '', $params);
                    }
                    if ($post_info_author == 'yes') {
                        mediclinic_mikado_get_module_template_part('templates/parts/post-info/author', 'blog', '', $params);
                    }
                    if ($post_info_comments == 'yes') {
                        mediclinic_mikado_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $params);
                    }
                    if ($post_info_like == 'yes') {
                        mediclinic_mikado_get_module_template_part('templates/parts/post-info/like', 'blog', '', $params);
                    }
                    if ($post_info_share == 'yes') {
                        mediclinic_mikado_get_module_template_part('templates/parts/post-info/share', 'blog', '', $params);
                    }
                    ?>
                </div>
            <?php } ?>
            <div class="mkdf-bli-excerpt">
                <?php mediclinic_mikado_get_module_template_part('templates/parts/excerpt', 'blog', '', $params); ?>
                <?php mediclinic_mikado_get_module_template_part('templates/parts/post-info/read-more', 'blog', '', $params); ?>
            </div>
        </div>
	</div>
</li>