<?php 
/*
Template Name: WooCommerce
*/ 
?>
<?php
$mkdf_sidebar_layout  = mediclinic_mikado_sidebar_layout();

get_header();
mediclinic_mikado_get_title();
get_template_part('slider');

//Woocommerce content
if ( ! is_singular('product') ) { ?>
	<div class="mkdf-container">
		<div class="mkdf-container-inner clearfix">
			<div class="mkdf-grid-row">
				<div <?php echo mediclinic_mikado_get_content_sidebar_class(); ?>>
					<?php mediclinic_mikado_woocommerce_content(); ?>
				</div>
				<?php if($mkdf_sidebar_layout !== 'no-sidebar') { ?>
					<div <?php echo mediclinic_mikado_get_sidebar_holder_class(); ?>>
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>			
<?php } else { ?>
	<div class="mkdf-container">
		<div class="mkdf-container-inner clearfix">
			<?php mediclinic_mikado_woocommerce_content(); ?>
		</div>
	</div>
<?php } ?>
<?php get_footer(); ?>