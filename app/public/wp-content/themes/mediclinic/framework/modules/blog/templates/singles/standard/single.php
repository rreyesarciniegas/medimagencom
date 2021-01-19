<?php

mediclinic_mikado_get_single_post_format_html($blog_single_type);

mediclinic_mikado_get_module_template_part('templates/parts/single/related-posts', 'blog', '', $single_info_params);

mediclinic_mikado_get_module_template_part('templates/parts/single/single-navigation', 'blog');

mediclinic_mikado_get_module_template_part('templates/parts/single/author-info', 'blog');

mediclinic_mikado_get_module_template_part('templates/parts/single/comments', 'blog');