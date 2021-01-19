<?php if(comments_open()) { ?>
	<div class="mkdf-post-info-comments-holder">
		<a itemprop="url" class="mkdf-post-info-comments" href="<?php comments_link(); ?>" target="_self">
			<i class="comments-icon fa fa-comments"></i>
			<span class="comments-number"> <?php comments_number('0 ', '1 ', '% ' );?> </span>
		</a>
	</div>
<?php } ?>