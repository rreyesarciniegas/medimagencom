<section class="mkdf-side-menu">
	<div class="mkdf-close-side-menu-holder">
		<a class="mkdf-close-side-menu" href="#" target="_self">
			<span class=" icon_close"></span>
		</a>
	</div>
	<?php if(is_active_sidebar('sidearea')) {
		dynamic_sidebar('sidearea');
	} ?>
</section>