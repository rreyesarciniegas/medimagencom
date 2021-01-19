<li class="mkdf-bl-item clearfix">
	<div class="mkdf-bli-inner">
        <?php if ($post_info_image == 'yes') {
            mediclinic_mikado_get_module_template_part('templates/parts/image', 'blog', '', $params);
        } ?>
		
		<div class="mkdf-bli-content">
            <?php mediclinic_mikado_get_module_template_part('templates/parts/title', 'blog', '', $params); ?>
			<?php mediclinic_mikado_get_module_template_part('templates/parts/post-info/date', 'blog', '', $params); ?>
		</div>
	</div>
</li>