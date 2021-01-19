<?php
$title_tag = isset($title_tag) ? $title_tag : 'h2';
?>

<<?php echo esc_attr($title_tag);?> itemprop="name" class="entry-title mkdf-post-title" <?php if(isset($inline_styles) && $inline_styles != '') echo mediclinic_mikado_get_inline_style($inline_styles); ?> >
    <?php if(mediclinic_mikado_blog_item_has_link()) { ?>
        <a itemprop="url" href="<?php echo get_the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
    <?php } ?>
        <?php the_title(); ?>
    <?php if(mediclinic_mikado_blog_item_has_link()) { ?>
        </a>
    <?php } ?>
</<?php echo esc_attr($title_tag);?>>