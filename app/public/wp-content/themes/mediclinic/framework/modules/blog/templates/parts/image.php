<?php
$featured_image_size = isset($featured_image_size) ? $featured_image_size : 'full';
$featured_image_meta = get_post_meta(get_the_ID(), 'mkdf_blog_list_featured_image_meta', true);

$has_featured = !empty($featured_image_meta) || has_post_thumbnail();

$blog_list_image_src = !empty($featured_image_meta) && mediclinic_mikado_blog_item_has_link() ? $featured_image_meta : '';
?>

<?php if ( $has_featured ) { ?>
	<div class="mkdf-post-image">
        <?php if(mediclinic_mikado_blog_item_has_link()) { ?>
		    <a itemprop="url" href="<?php echo get_the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <?php } ?>
        <?php if($blog_list_image_src !== '')  { ?>
            <img itemprop="image" class="mkdf-custom-post-image" src="<?php echo esc_url($blog_list_image_src); ?>" alt="<?php esc_attr_e('Blog list featured image', 'mediclinic'); ?>" />
        <?php } else { ?>
            <?php the_post_thumbnail($featured_image_size); ?>
        <?php } ?>
        <?php if(mediclinic_mikado_blog_item_has_link()) { ?>
		    </a>
        <?php } ?>
	</div>
<?php } ?>