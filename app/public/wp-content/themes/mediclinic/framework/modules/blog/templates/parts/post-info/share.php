<?php

$share_type = isset($share_type) ? $share_type : 'list';

?>
<?php if(mediclinic_mikado_options()->getOptionValue('enable_social_share') === 'yes' && mediclinic_mikado_options()->getOptionValue('enable_social_share_on_post') === 'yes') { ?>
	<?php if ( mediclinic_mikado_core_plugin_installed() && mediclinic_mikado_options()->getOptionValue( 'enable_social_share' ) === 'yes' && mediclinic_mikado_options()->getOptionValue( 'enable_social_share_on_post' ) === 'yes' ) { ?>
		<div class="mkdf-blog-share">
			<div class="mkdf-blog-share">
				<?php echo mediclinic_mikado_get_social_share_html(array('type' => $share_type)); ?>

			</div>
		</div>
	<?php } ?>
<?php } ?>