<?php
$args_pages = array(
    'before'           => '<div class="mkdf-single-links-pages"><div class="mkdf-single-links-pages-inner">',
    'after'            => '</div></div>',
    'link_before'      => '<span>'. esc_html__('Post Page Link: ', 'mediclinic'),
    'link_after'       => '</span>',
    'pagelink'         => '%'
);

wp_link_pages($args_pages);