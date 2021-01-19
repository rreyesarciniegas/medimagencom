<?php
$mkdf_sidebar_layout = mediclinic_mikado_sidebar_layout();

get_header();
mediclinic_mikado_get_title();
?>
<div class="mkdf-container">
    <?php do_action('mediclinic_mikado_after_container_open'); ?>
    <div class="mkdf-container-inner clearfix">
        <div class="mkdf-container">
            <?php do_action('mediclinic_mikado_after_container_open'); ?>
            <div class="mkdf-container-inner">
	            <div class="mkdf-grid-row">
		            <div <?php echo mediclinic_mikado_get_content_sidebar_class(); ?>>
                        <div class="mkdf-search-page-holder">
                            <form action="<?php echo esc_url(home_url('/')); ?>" class="mkdf-search-page-form" method="get">
                                <h2 class="mkdf-search-title"><?php esc_html_e('Search results:', 'mediclinic'); ?></h2>
                                <div class="mkdf-form-holder">
                                    <div class="mkdf-column-left">
                                        <input type="text" name="s" class="mkdf-search-field" autocomplete="off" value="" placeholder="<?php esc_attr_e('Type here', 'mediclinic'); ?>"/>
                                    </div>
                                    <div class="mkdf-column-right">
                                        <button type="submit" class="mkdf-search-submit"><span class="icon_search"></span></button>
                                    </div>
                                </div>
                            </form>
                            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <div class="mkdf-post-content">
                                        <?php if (has_post_thumbnail()) { ?>
                                            <div class="mkdf-post-image">
                                                <a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                                    <?php the_post_thumbnail('thumbnail'); ?>
                                                </a>
                                            </div>
                                        <?php } ?>
                                        <div class="mkdf-post-title-area <?php if (!has_post_thumbnail()) { echo esc_attr('mkdf-no-thumbnail'); } ?>">
                                            <div class="mkdf-post-title-area-inner">
                                                <h4 itemprop="name" class="mkdf-post-title entry-title">
                                                    <a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                                                </h4>
                                                <?php
                                                $mkdf_my_excerpt = get_the_excerpt();
                                                if ($mkdf_my_excerpt != '') { ?>
                                                    <p itemprop="description" class="mkdf-post-excerpt"><?php echo esc_html($mkdf_my_excerpt); ?></p>
                                                <?php }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            <?php endwhile; ?>
                            <?php else: ?>
                                <p class="mkdf-blog-no-posts"><?php esc_html_e('No posts were found.', 'mediclinic'); ?></p>
                            <?php endif; ?>
                            <?php
                                if ( get_query_var('paged') ) { $mkdf_paged = get_query_var('paged'); }
                                elseif ( get_query_var('page') ) { $mkdf_paged = get_query_var('page'); }
                                else { $mkdf_paged = 1; }

                                $mkdf_params['max_num_pages'] = mediclinic_mikado_get_max_number_of_pages();
                                $mkdf_params['paged'] = $mkdf_paged;
                                mediclinic_mikado_get_module_template_part('templates/parts/pagination/standard', 'blog', '', $mkdf_params);
                            ?>
                        </div>
                        <?php do_action('mediclinic_mikado_page_after_content'); ?>
                    </div>
		            <?php if($mkdf_sidebar_layout !== 'no-sidebar') { ?>
			            <div <?php echo mediclinic_mikado_get_sidebar_holder_class(); ?>>
				            <?php get_sidebar(); ?>
			            </div>
		            <?php } ?>
                </div>
				<?php do_action('mediclinic_mikado_before_container_close'); ?>
            </div>
        </div>
    </div>
    <?php do_action('mediclinic_mikado_before_container_close'); ?>
</div>
<?php get_footer(); ?>