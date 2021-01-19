<?php do_action('mediclinic_mikado_before_page_header'); ?>

<header class="mkdf-page-header">
	<?php do_action('mediclinic_mikado_after_page_header_html_open'); ?>
	
    <div class="mkdf-logo-area">
	    <?php do_action( 'mediclinic_mikado_after_header_logo_area_html_open' ); ?>
	    
        <?php if($logo_area_in_grid) : ?>
            <div class="mkdf-grid">
        <?php endif; ?>
			
            <div class="mkdf-vertical-align-containers">
                <div class="mkdf-position-left">
                    <div class="mkdf-position-left-inner">
                        <?php if(!$hide_logo) {
                            mediclinic_mikado_get_logo();
                        } ?>
                    </div>
                </div>
                <div class="mkdf-position-right">
                    <div class="mkdf-position-right-inner">
						<?php mediclinic_mikado_get_header_widget_logo_area(); ?>
                    </div>
                </div>
            </div>
	            
        <?php if($logo_area_in_grid) : ?>
            </div>
        <?php endif; ?>
    </div>
	
    <?php if($show_fixed_wrapper) : ?>
        <div class="mkdf-fixed-wrapper">
    <?php endif; ?>
	        
    <div class="mkdf-menu-area">
	    <?php do_action('mediclinic_mikado_after_header_menu_area_html_open'); ?>
	    
        <?php if($menu_area_in_grid) : ?>
            <div class="mkdf-grid">
        <?php endif; ?>
	            
            <div class="mkdf-vertical-align-containers">
                <div class="mkdf-position-left">
                    <div class="mkdf-position-left-inner">
                        <?php mediclinic_mikado_get_main_menu(); ?>
                    </div>
                </div>
                <div class="mkdf-position-right">
                    <div class="mkdf-position-right-inner">
						<?php mediclinic_mikado_get_header_widget_menu_area(); ?>
                    </div>
                </div>
            </div>
	            
        <?php if($menu_area_in_grid) : ?>
            </div>
        <?php endif; ?>
    </div>
	        
    <?php if($show_fixed_wrapper) { ?>
        </div>
	<?php } ?>
	
	<?php if($show_sticky) {
		mediclinic_mikado_get_sticky_header();
	} ?>
	
	<?php do_action('mediclinic_mikado_before_page_header_html_close'); ?>
</header>

<?php do_action('mediclinic_mikado_after_page_header'); ?>