<?php
if($max_num_pages > 1) {
	$number_of_pages = $max_num_pages;
	$current_page    = $paged;
	$range           = 3;
	?>
	
	<div class="mkdf-blog-pagination">
		<ul>
			<?php if($current_page > 2 && $current_page > $range && $range < $number_of_pages) { ?>
			<?php } ?>
			<?php if ($current_page > 1) { ?>
				<li class="mkdf-pag-prev">
					<a itemprop="url" href="<?php echo esc_url(get_pagenum_link($current_page - 1)); ?>">
						<h5><?php esc_html_e( 'Previous Page', 'mediclinic' ); ?></h5>
					</a>
				</li>
			<?php } ?>
			<?php for ($i=1; $i <= $number_of_pages; $i++) { ?>
				<?php if (!($i >= $current_page + $range+1 || $i <= $current_page - $range-1) || $number_of_pages <= $range ) { ?>
					<?php if($current_page == $i) { ?>
						<li class="mkdf-pag-number">
							<a class="mkdf-pag-active" href="#"><?php echo esc_attr($i); ?></a>
						</li>
					<?php } else { ?>
						<li class="mkdf-pag-number">
							<a itemprop="url" class="mkdf-pag-inactive" href="<?php echo get_pagenum_link($i); ?>"><?php echo esc_attr($i); ?></a>
						</li>
					<?php } ?>
				<?php } ?>
			<?php } ?>
			<?php if ($current_page < $number_of_pages) { ?>
				<li class="mkdf-pag-next">
					<a itemprop="url" href="<?php echo esc_url(get_pagenum_link($current_page + 1)); ?>">
						<h5><?php esc_html_e( 'Next Page', 'mediclinic' ); ?></h5>
					</a>
				</li>
			<?php } ?>
		</ul>
	</div>
	
	<div class="mkdf-blog-pagination-wp">
		<?php echo get_the_posts_pagination(); ?>
	</div>
	
	<?php
}