<?php
if(!function_exists('mediclinic_mikado_design_styles')) {
    /**
     * Generates general custom styles
     */
    function mediclinic_mikado_design_styles() {
	    $font_family = mediclinic_mikado_options()->getOptionValue( 'google_fonts' );
	    if ( ! empty( $font_family ) && mediclinic_mikado_is_font_option_valid( $font_family ) ) {
		    $font_family_selector = array(
			    'body'
		    );
		    echo mediclinic_mikado_dynamic_css( $font_family_selector, array( 'font-family' => mediclinic_mikado_get_font_option_val( $font_family ) ) );
	    }

		$first_main_color = mediclinic_mikado_options()->getOptionValue('first_color');
        if(!empty($first_main_color)) {
            $color_selector = array(
                'a:hover',
                'h1 a:hover',
                'h2 a:hover',
                'h3 a:hover',
                'h4 a:hover',
                'h5 a:hover',
                'p a:hover',
                '.mkdf-comment-holder .mkdf-comment-text #cancel-comment-reply-link',
                '.mkdf-owl-slider .owl-nav .owl-next:hover .mkdf-next-icon',
                '.mkdf-owl-slider .owl-nav .owl-next:hover .mkdf-prev-icon',
                '.mkdf-owl-slider .owl-nav .owl-prev:hover .mkdf-next-icon',
                '.mkdf-owl-slider .owl-nav .owl-prev:hover .mkdf-prev-icon',
                '.mkdf-side-menu-button-opener.opened',
                '.mkdf-side-menu-button-opener:hover',
                '.mkdf-search-page-holder article.sticky .mkdf-post-title a',
                '.mkdf-search-cover .mkdf-search-close a:hover',
                'footer .widget .mkdf-widget-title-holder .mkdf-widget-title',
                'footer .widget ul li a:hover',
                'footer .widget.widget_archive ul li a:hover',
                'footer .widget.widget_categories ul li a:hover',
                'footer .widget.widget_meta ul li a:hover',
                'footer .widget.widget_nav_menu ul li a:hover',
                'footer .widget.widget_pages ul li a:hover',
                'footer .widget.widget_recent_entries ul li a:hover',
                'footer .widget #wp-calendar tfoot a:hover',
                'footer .widget.widget_tag_cloud a:hover',
                'footer .widget.mkdf-blog-list-widget .mkdf-blog-list li .mkdf-post-title a:hover',
                'footer .mkdf-blog-list-widget .mkdf-blog-list-holder.mkdf-bl-simple .mkdf-post-title',
                'footer .mkdf-blog-list-widget .mkdf-blog-list-holder.mkdf-bl-simple .mkdf-post-info-date a:hover',
                '.mkdf-side-menu .widget ul li a:hover',
                '.mkdf-side-menu .widget.widget_archive ul li a:hover',
                '.mkdf-side-menu .widget.widget_categories ul li a:hover',
                '.mkdf-side-menu .widget.widget_meta ul li a:hover',
                '.mkdf-side-menu .widget.widget_nav_menu ul li a:hover',
                '.mkdf-side-menu .widget.widget_pages ul li a:hover',
                '.mkdf-side-menu .widget.widget_recent_entries ul li a:hover',
                '.mkdf-side-menu .widget #wp-calendar tfoot a:hover',
                '.mkdf-side-menu .widget.widget_tag_cloud a:hover',
                '.mkdf-side-menu .widget.mkdf-blog-list-widget .mkdf-blog-list li .mkdf-post-title a:hover',
                '.wpb_widgetised_column .widget ul li a:hover',
                'aside.mkdf-sidebar .widget ul li a:hover',
                '.wpb_widgetised_column .widget.widget_archive ul li a:hover',
                '.wpb_widgetised_column .widget.widget_categories ul li a:hover',
                '.wpb_widgetised_column .widget.widget_meta ul li a:hover',
                '.wpb_widgetised_column .widget.widget_nav_menu ul li a:hover',
                '.wpb_widgetised_column .widget.widget_pages ul li a:hover',
                '.wpb_widgetised_column .widget.widget_recent_entries ul li a:hover',
                'aside.mkdf-sidebar .widget.widget_archive ul li a:hover',
                'aside.mkdf-sidebar .widget.widget_categories ul li a:hover',
                'aside.mkdf-sidebar .widget.widget_meta ul li a:hover',
                'aside.mkdf-sidebar .widget.widget_nav_menu ul li a:hover',
                'aside.mkdf-sidebar .widget.widget_pages ul li a:hover',
                'aside.mkdf-sidebar .widget.widget_recent_entries ul li a:hover',
                '.wpb_widgetised_column .widget #wp-calendar tfoot a',
                'aside.mkdf-sidebar .widget #wp-calendar tfoot a',
                '.wpb_widgetised_column .widget.mkdf-blog-list-widget .mkdf-blog-list li .mkdf-post-title a:hover',
                'aside.mkdf-sidebar .widget.mkdf-blog-list-widget .mkdf-blog-list li .mkdf-post-title a:hover',
                'aside.mkdf-sidebar .widget.mkdf-blog-list-widget .mkdf-post-title',
                '.widget ul li a:hover',
                '.widget.widget_archive ul li a:hover',
                '.widget.widget_categories ul li a:hover',
                '.widget.widget_meta ul li a:hover',
                '.widget.widget_nav_menu ul li a:hover',
                '.widget.widget_pages ul li a:hover',
                '.widget.widget_recent_entries ul li a:hover',
                '.widget #wp-calendar tfoot a',
                '.widget.mkdf-blog-list-widget .mkdf-blog-list li .mkdf-post-title a:hover',
                '.widget.widget_mkdf_twitter_widget .mkdf-twitter-widget.mkdf-twitter-slider li .mkdf-tweet-text a',
                '.widget.widget_mkdf_twitter_widget .mkdf-twitter-widget.mkdf-twitter-slider li .mkdf-tweet-text span',
                '.widget.widget_mkdf_twitter_widget .mkdf-twitter-widget.mkdf-twitter-standard li .mkdf-tweet-text a:hover',
                '.widget.widget_mkdf_twitter_widget .mkdf-twitter-widget.mkdf-twitter-slider li .mkdf-twitter-icon i',
                '.mkd-ttevents-single .mkd-event-single-icon',
                '.mkd-ttevents-single .tt_event_items_list li.type_info .tt_event_text',
                '.mkd-ttevents-single .tt_event_items_list li:not(.type_info):before',
                '.mkdf-blog-holder article.sticky .mkdf-post-title a',
                '.mkdf-blog-holder.mkdf-blog-standard article .mkdf-post-info-top>div a:hover',
                '.mkdf-blog-holder.mkdf-blog-standard article .mkdf-post-info-bottom .mkdf-post-info-author a:hover',
                '.mkdf-blog-holder.mkdf-blog-standard article .mkdf-post-info-bottom .mkdf-blog-like a:hover',
                '.mkdf-blog-holder.mkdf-blog-standard article .mkdf-post-info-bottom .mkdf-post-info-comments-holder a:hover',
                '.mkdf-blog-holder.mkdf-blog-standard article .mkdf-post-info-bottom .mkdf-blog-like:hover',
                '.mkdf-blog-holder.mkdf-blog-standard article .mkdf-post-info-bottom .mkdf-blog-like:hover i:first-child',
                '.mkdf-blog-holder.mkdf-blog-standard article .mkdf-post-info-bottom .mkdf-blog-like:hover span:first-child',
                '.mkdf-blog-holder.mkdf-blog-standard article .mkdf-post-info-bottom .mkdf-post-info-comments-holder:hover',
                '.mkdf-blog-holder.mkdf-blog-standard article .mkdf-post-info-bottom .mkdf-post-info-comments-holder:hover span:first-child',
                '.mkdf-blog-holder.mkdf-blog-standard article.format-link .mkdf-post-info-bottom .mkdf-blog-share li a:hover',
                '.mkdf-blog-holder.mkdf-blog-standard article.format-quote .mkdf-blog-share li a:hover',
                '.mkdf-author-description .mkdf-author-description-text-holder .mkdf-author-name a:hover',
                '.mkdf-author-description .mkdf-author-description-text-holder .mkdf-author-social-icons a:hover',
                '.mkdf-blog-pagination ul li a.mkdf-pag-active',
                '.mkdf-blog-pagination ul li a:hover',
                '.mkdf-bl-standard-pagination ul li.mkdf-bl-pag-active a',
                '.mkdf-bl-standard-pagination ul li.mkdf-bl-pag-next a:hover h5',
                '.mkdf-bl-standard-pagination ul li.mkdf-bl-pag-prev a:hover h5',
                '.mkdf-blog-single-navigation .mkdf-blog-single-next:hover',
                '.mkdf-blog-single-navigation .mkdf-blog-single-prev:hover',
                '.mkdf-blog-list-holder .mkdf-bli-info-top>div a:hover',
                '.mkdf-blog-list-holder .mkdf-bli-info>div a:hover',
                '.mkdf-blog-list-holder .mkdf-bli-info-bottom>div a:hover',
                '.mkdf-blog-list-holder .mkdf-post-read-more-button a',
                '.mkdf-blog-holder.mkdf-blog-single.mkdf-blog-single-standard article .mkdf-post-info-top>div a:hover',
                '.mkdf-blog-holder.mkdf-blog-single.mkdf-blog-single-standard article .mkdf-post-info-bottom .mkdf-post-info-bottom-left>div a:hover',
                '.mkdf-blog-holder.mkdf-blog-single.mkdf-blog-single-standard article .mkdf-post-info-bottom .mkdf-post-info-bottom-right>div a:hover',
                '.mkdf-blog-holder.mkdf-blog-single.mkdf-blog-single-standard article.format-link .mkdf-post-info-bottom .mkdf-blog-share li a:hover',
                '.mkdf-blog-holder.mkdf-blog-single.mkdf-blog-single-standard article.format-quote .mkdf-blog-share li a:hover',
                '.mkdf-drop-down .second .inner ul li.current-menu-ancestor>a',
                '.mkdf-drop-down .second .inner ul li.current-menu-item>a',
                '.mkdf-main-menu ul li a:hover',
                '.mkdf-drop-down .second .inner ul li.sub ul li>a:before',
                '.mkdf-drop-down .second .inner>ul>li>a:before',
                '.mkdf-drop-down .wide .second .inner ul li a:hover',
                '.mkdf-drop-down .wide .second .inner ul li ul li:hover',
                '.mkdf-drop-down .wide .second .inner ul li.current-menu-ancestor>a',
                '.mkdf-drop-down .wide .second .inner ul li.current-menu-item>a',
                '.mkdf-mobile-header .mkdf-mobile-menu-opener.mkdf-mobile-menu-opened a',
                '.mkdf-mobile-header .mkdf-mobile-nav .mkdf-grid>ul>li.mkdf-active-item>a',
                '.mkdf-mobile-header .mkdf-mobile-nav ul li a:hover',
                '.mkdf-mobile-header .mkdf-mobile-nav ul li h5:hover',
                '.mkdf-mobile-header .mkdf-mobile-nav ul ul li.current-menu-ancestor>a',
                '.mkdf-mobile-header .mkdf-mobile-nav ul ul li.current-menu-item>a',
                '.mkdf-countdown .countdown-row .countdown-section .countdown-amount',
                '.mkdf-image-with-text-holder:hover .mkdf-iwt-title',
                '.mkdf-info-list .mkdf-info-list-item:hover .mkdf-ili-left',
                '.mkdf-info-list .mkdf-info-list-item .mkdf-info-list-item-inner:hover .mkdf-ili-title',
                '.mkdf-interactive-banner-holder .mkdf-interactive-banner-icon',
                '.mkdf-social-share-holder.mkdf-dropdown .mkdf-social-share-dropdown-opener:hover',
                '.mkdf-testimonials-cards .mkdf-testimonials .owl-nav .owl-next:hover span',
                '.mkdf-testimonials-cards .mkdf-testimonials .owl-nav .owl-prev:hover span',
                '.mkdf-testimonials-slider.mkdf-owl-testimonials .mkdf-testimonial-author-text'
            );

            $woo_color_selector = array();
            if(mediclinic_mikado_is_woocommerce_installed()) {
                $woo_color_selector = array(
                    '.woocommerce-pagination .page-numbers li a:hover',
                    '.woocommerce-pagination .page-numbers li span:hover',
                    '.woocommerce-pagination .page-numbers li a.current',
                    '.woocommerce-pagination .page-numbers li span.current',
                    '.woocommerce-page .mkdf-content .mkdf-quantity-buttons .mkdf-quantity-minus:hover',
                    '.woocommerce-page .mkdf-content .mkdf-quantity-buttons .mkdf-quantity-plus:hover',
                    'div.woocommerce .mkdf-quantity-buttons .mkdf-quantity-minus:hover',
                    'div.woocommerce .mkdf-quantity-buttons .mkdf-quantity-plus:hover',
                    'ul.products>.product .mkdf-product-list-categories a:hover',
                    '.mkdf-woo-single-page .mkdf-single-product-summary .product_meta>span a:hover',
                    '.mkdf-shopping-cart-dropdown .mkdf-item-info-holder .remove:hover',
                    '.widget.woocommerce.widget_layered_nav ul li.chosen a',
                    '.widget.woocommerce.widget_products ul li:hover .product-title',
                    '.widget.woocommerce.widget_recent_reviews ul li:hover .product-title',
                    '.widget.woocommerce.widget_recently_viewed_products ul li:hover .product-title',
                    '.widget.woocommerce.widget_top_rated_products ul li:hover .product-title',
                    '.widget.woocommerce.widget_product_tag_cloud .tagcloud a:hover'
                );
            }

            $color_selector = array_merge($color_selector, $woo_color_selector);

	        $color_important_selector = array(
                '.mkdf-blog-slider-holder .mkdf-blog-slider-item .mkdf-section-button-holder a:hover',
                '.mkdf-btn.mkdf-btn-simple:not(.mkdf-btn-custom-hover-color):hover'
	        );

            $background_color_selector = array(
                '.mkdf-st-loader .pulse',
                '.mkdf-st-loader .double_pulse .double-bounce1',
                '.mkdf-st-loader .double_pulse .double-bounce2',
                '.mkdf-st-loader .cube',
                '.mkdf-st-loader .rotating_cubes .cube1',
                '.mkdf-st-loader .rotating_cubes .cube2',
                '.mkdf-st-loader .stripes>div',
                '.mkdf-st-loader .wave>div',
                '.mkdf-st-loader .two_rotating_circles .dot1',
                '.mkdf-st-loader .two_rotating_circles .dot2',
                '.mkdf-st-loader .five_rotating_circles .container1>div',
                '.mkdf-st-loader .five_rotating_circles .container2>div',
                '.mkdf-st-loader .five_rotating_circles .container3>div',
                '.mkdf-st-loader .atom .ball-1:before',
                '.mkdf-st-loader .atom .ball-2:before',
                '.mkdf-st-loader .atom .ball-3:before',
                '.mkdf-st-loader .atom .ball-4:before',
                '.mkdf-st-loader .clock .ball:before',
                '.mkdf-st-loader .mitosis .ball',
                '.mkdf-st-loader .lines .line1',
                '.mkdf-st-loader .lines .line2',
                '.mkdf-st-loader .lines .line3',
                '.mkdf-st-loader .lines .line4',
                '.mkdf-st-loader .fussion .ball',
                '.mkdf-st-loader .fussion .ball-1',
                '.mkdf-st-loader .fussion .ball-2',
                '.mkdf-st-loader .fussion .ball-3',
                '.mkdf-st-loader .fussion .ball-4',
                '.mkdf-st-loader .wave_circles .ball',
                '.mkdf-st-loader .pulse_circles .ball',
                '#submit_comment',
                '.post-password-form input[type=submit]',
                'input.wpcf7-form-control.wpcf7-submit',
                '.mkdf-cf7-btn .mkdf-cf7-text input:hover',
                '#mkdf-back-to-top>span',
                'footer .widget.widget_search .input-holder button:hover',
                'footer .widget.widget_price_filter .price_slider_amount .button',
                '.mkdf-side-menu .widget.widget_search .input-holder button:hover',
                '.mkdf-side-menu .widget.widget_price_filter .price_slider_amount .button',
                '.wpb_widgetised_column .widget.widget_search .input-holder button:hover',
                'aside.mkdf-sidebar .widget.widget_search .input-holder button:hover',
                '.wpb_widgetised_column .widget.widget_price_filter .price_slider_amount .button',
                'aside.mkdf-sidebar .widget.widget_price_filter .price_slider_amount .button',
                '.widget.widget_search .input-holder button:hover',
                '.widget.widget_price_filter .price_slider_amount .button',
                '.mkdf-page-footer .mkdf-icon-widget-holder:hover',
                '.mkdf-top-bar .mkdf-icon-widget-holder:hover',
                '.sf-timetable-menu li ul li a:hover',
                '.sf-timetable-menu li ul li.selected a:hover',
                '.tabs_box_navigation .tabs_box_navigation_icon',
                '.tt_tabs .tt_tabs_navigation li a',
                '.widget.upcoming_events_widget .tt_upcoming_event_controls a:hover',
                '.mkdf-blog-holder article.format-audio .mkdf-blog-audio-holder .mejs-container .mejs-controls>.mejs-time-rail .mejs-time-total .mejs-time-current',
                '.mkdf-blog-holder article.format-audio .mkdf-blog-audio-holder .mejs-container .mejs-controls>a.mejs-horizontal-volume-slider .mejs-horizontal-volume-current',
                '.mkdf-blog-pagination ul li a.mkdf-pag-active:after',
                '.mkdf-btn.mkdf-btn-simple:before',
                '.mkdf-btn.mkdf-btn-solid.mkdf-btn-solid-dark',
                '.no-touch .mkdf-horizontal-timeline .mkdf-events-wrapper .mkdf-events a:hover .circle-outer',
                '.mkdf-icon-shortcode.mkdf-circle',
                '.mkdf-icon-shortcode.mkdf-dropcaps.mkdf-circle',
                '.mkdf-icon-shortcode.mkdf-square',
                '.mkdf-interactive-banner-holder.mkdf-interactive-banner-light-theme .mkdf-interactive-banner-overlay',
                '.mkdf-progress-bar .mkdf-pb-content-holder .mkdf-pb-content',
                '.mkdf-team.info-bellow .mkdf-team-image .mkdf-circle-animate',
                '.mkdf-team-single-holder .mkdf-book-now',
                '.mkdf-testimonials-cards .mkdf-testimonials .owl-nav span',
                '.mkdf-testimonials-cards .mkdf-testimonials .owl-dot.active span',
                '.mkdf-testimonials-slider .owl-dots .owl-dot.active span',
                '.owl-carousel .owl-dots .owl-dot.active span',
                '.owl-carousel.mkdf-testimonials-light .owl-dots .owl-dot.active span',
                '.mkdf-testimonials-holder .mkdf-tes-nav>.mkdf-tes-nav-next .mkdf-icon-mark',
                '.mkdf-testimonials-holder .mkdf-tes-nav>.mkdf-tes-nav-prev .mkdf-icon-mark'
            );

            $woo_background_color_selector = array();
            if(mediclinic_mikado_is_woocommerce_installed()) {
                $woo_background_color_selector = array(
                    '.woocommerce-page .mkdf-content .wc-forward:not(.added_to_cart):not(.checkout-button)',
                    '.woocommerce-page .mkdf-content a.added_to_cart',
                    '.woocommerce-page .mkdf-content a.button',
                    '.woocommerce-page .mkdf-content button[type=submit]:not(.mkdf-woo-search-widget-button)',
                    '.woocommerce-page .mkdf-content input[type=submit]:not(.wpcf7-submit)',
                    'div.woocommerce .wc-forward:not(.added_to_cart):not(.checkout-button)',
                    'div.woocommerce a.added_to_cart',
                    'div.woocommerce a.button',
                    'div.woocommerce button[type=submit]:not(.mkdf-woo-search-widget-button)',
                    'div.woocommerce input[type=submit]:not(.wpcf7-submit)',
                    '.woocommerce-pagination .page-numbers li a.current:after',
                    '.woocommerce-pagination .page-numbers li span.current:after',
                    '.mkdf-shopping-cart-holder .mkdf-header-cart .mkdf-cart-count-holder',
                    '.mkdf-shopping-cart-dropdown .mkdf-cart-bottom .mkdf-view-cart',
                    '.widget.woocommerce.widget_product_search .woocommerce-product-search button:hover'
                );
            }

            $background_color_selector = array_merge($background_color_selector, $woo_background_color_selector);

            $background_color_gradient_selector = array(
                '.mkdf-elliptical-slider .mkdf-elliptical-slide .mkdf-elliptical-slide-content-holder'
            );

            $border_color_selector = array(
                '.mkdf-st-loader .pulse_circles .ball',
                '#mkdf-back-to-top>span',
                '.widget.upcoming_events_widget .tt_upcoming_event_controls a:hover',
                '.mkdf-btn.mkdf-btn-outline',
                '.mkdf-testimonials-cards .mkdf-testimonials .owl-dot.active span'
            );

			$border_color_important_selector = array(
				'.tt_tabs .tt_tabs_navigation li a'
			);

			$border_top_color_selector = array(
				'.mkdf-main-menu .mkdf-main-menu-line',
				'.mkdf-drop-down .second',
				'.mkdf-drop-down li.right_position .second',
				'.mkdf-drop-down .narrow .second .inner ul li ul',
				'.mkdf-icon-tabs .mkdf-icon-tabs-nav li.mkdf-tabs-nav-line',
			);

			$border_left_color_selector = array(
				'.mkdf-btn.mkdf-btn-outline.mkdf-btn-icon .mkdf-btn-icon-holder'
			);

			$fill_color_selector = array(
				'.mkdf-elliptical-slider .mkdf-elliptical-slide .mkdf-elliptical-slide-svg-holder svg path'
			);

            $background_color_webkit_gradient_style = array(
                'background' => '-webkit-linear-gradient(left,' . $first_main_color . ' 48%,transparent 48%)'
            );

            $background_color_gradient_style = array(
                'background' => 'linear-gradient(to left, ' . $first_main_color . ' 48%,transparent 48%)'
            );

            echo mediclinic_mikado_dynamic_css($color_selector, array('color' => $first_main_color));
	        echo mediclinic_mikado_dynamic_css($color_important_selector, array('color' => $first_main_color.'!important'));
	        echo mediclinic_mikado_dynamic_css($background_color_selector, array('background-color' => $first_main_color));
	        echo mediclinic_mikado_dynamic_css($background_color_gradient_selector, $background_color_webkit_gradient_style);
	        echo mediclinic_mikado_dynamic_css($background_color_gradient_selector, $background_color_gradient_style);
	        echo mediclinic_mikado_dynamic_css($border_color_selector, array('border-color' => $first_main_color));
			echo mediclinic_mikado_dynamic_css($border_color_important_selector, array('border-color' => $first_main_color.'!important'));
			echo mediclinic_mikado_dynamic_css($border_top_color_selector, array('border-top-color' => $first_main_color));
			echo mediclinic_mikado_dynamic_css($border_left_color_selector, array('border-left-color' => $first_main_color));
			echo mediclinic_mikado_dynamic_css($fill_color_selector, array('fill' => $first_main_color));
        }

        $first_main_additional_color = mediclinic_mikado_options()->getOptionValue('first_color_additional');
        if(!empty($first_main_additional_color)) {

            $fmc_additional_background_color_selector = array(
                '#submit_comment:hover',
                '.post-password-form input[type=submit]:hover',
                'input.wpcf7-form-control.wpcf7-submit:hover',
                '.mkdf-cf7-btn .mkdf-cf7-icon-holder',
                '#mkdf-back-to-top>span:hover',
                '.mkdf-btn.mkdf-btn-solid.mkdf-btn-solid-dark.mkdf-btn-icon .mkdf-btn-icon-holder',
                '.mkdf-team-single-holder .mkdf-booking-form .mkdf-bf-form-button .mkdf-btn-icon-holder',
                '.mkdf-testimonials-holder .mkdf-tes-nav>.mkdf-tes-nav-next:hover .mkdf-icon-mark',
                '.mkdf-testimonials-holder .mkdf-tes-nav>.mkdf-tes-nav-prev:hover .mkdf-icon-mark'
            );

            $fmc_additional_woo_background_color_selector = array();
            if(mediclinic_mikado_is_woocommerce_installed()) {
                $fmc_additional_woo_background_color_selector = array(
                    '.woocommerce-page .mkdf-content .wc-forward:not(.added_to_cart):not(.checkout-button):hover',
                    '.woocommerce-page .mkdf-content a.added_to_cart:hover',
                    '.woocommerce-page .mkdf-content a.button:hover',
                    '.woocommerce-page .mkdf-content button[type=submit]:not(.mkdf-woo-search-widget-button):hover',
                    '.woocommerce-page .mkdf-content input[type=submit]:not(.wpcf7-submit):hover',
                    'div.woocommerce .wc-forward:not(.added_to_cart):not(.checkout-button):hover',
                    'div.woocommerce a.added_to_cart:hover',
                    'div.woocommerce a.button:hover',
                    'div.woocommerce button[type=submit]:not(.mkdf-woo-search-widget-button):hover',
                    'div.woocommerce input[type=submit]:not(.wpcf7-submit):hover'
                );
            }

            $fmc_additional_background_color_selector = array_merge($fmc_additional_background_color_selector, $fmc_additional_woo_background_color_selector);


            $fmc_additional_background_color_important_selector = array(
                '.mkdf-btn.mkdf-btn-solid.mkdf-btn-solid-dark:not(.mkdf-btn-custom-hover-bg):hover',
                '.mkdf-btn.mkdf-btn-outline:not(.mkdf-btn-custom-hover-bg):not(.mkdf-btn-icon):hover',
                '.mkdf-btn.mkdf-btn-solid.mkdf-btn-solid-dark:not(.mkdf-btn-custom-hover-bg):hover.mkdf-btn-icon .mkdf-btn-icon-holder'
            );

            $fmc_additional_border_color_selector = array(
                '#mkdf-back-to-top>span:hover'
            );

            $fmc_additional_border_color_important_selector = array(
                '.mkdf-btn.mkdf-btn-solid.mkdf-btn-solid-dark:not(.mkdf-btn-custom-border-hover):hover',
                '.mkdf-btn.mkdf-btn-outline:not(.mkdf-btn-custom-border-hover):not(.mkdf-btn-icon):hover'
            );

            echo mediclinic_mikado_dynamic_css($fmc_additional_background_color_selector, array('background-color' => $first_main_additional_color));
            echo mediclinic_mikado_dynamic_css($fmc_additional_background_color_important_selector, array('background-color' => $first_main_additional_color.'!important'));
            echo mediclinic_mikado_dynamic_css($fmc_additional_border_color_selector, array('border-color' => $first_main_additional_color));
            echo mediclinic_mikado_dynamic_css($fmc_additional_border_color_important_selector, array('border-color' => $first_main_additional_color.'!important'));

        }

        $second_main_color = mediclinic_mikado_options()->getOptionValue('second_color');
        if(!empty($second_main_color)) {
            $second_color_selector = array(
                'h6',
                'blockquote:after',
                '.mkdf-404-page .mkdf-page-not-found .mkdf-404-title',
                '.mkdf-blog-holder.mkdf-blog-standard article .mkdf-post-info-top>div a',
                '.mkdf-blog-holder.mkdf-blog-standard article .mkdf-post-info-bottom .mkdf-post-info-bottom-right a:not(.mkdf-post-info-author-link)',
                '.mkdf-blog-holder.mkdf-blog-standard article .mkdf-post-info-bottom .mkdf-blog-like i:first-child',
                '.mkdf-blog-holder.mkdf-blog-standard article .mkdf-post-info-bottom .mkdf-blog-like span:first-child',
                '.mkdf-related-posts-holder .mkdf-related-post .mkdf-post-info>div:not(.mkdf-post-info-date) a',
                '.mkdf-blog-list-holder .mkdf-bli-info-top>div a',
                '.mkdf-blog-holder.mkdf-blog-single.mkdf-blog-single-standard article .mkdf-post-info-top>div',
                '.mkdf-blog-holder.mkdf-blog-single.mkdf-blog-single-standard article .mkdf-post-info-bottom .mkdf-post-info-bottom-right a:not(.mkdf-post-info-author-link)',
                '.mkdf-drop-down .second .inner ul li.sub>a .item_outer:after',
                '.mkdf-counter-holder .mkdf-counter-inner .mkdf-counter-icon',
                '.mkdf-icon-box-holder .mkdf-icon-box-icon-holder .mkdf-icon-shortcode .mkdf-icon-element',
                '.mkdf-info-icon .mkdf-icon-info-icon i',
                '.mkdf-price-table .mkdf-pt-inner ul li.mkdf-pt-prices .mkdf-pt-mark',
                '.mkdf-team-single-holder .mkdf-ts-bio-icon',
                '.mkdf-team-single-holder .mkdf-ts-info-row .mkdf-ts-bio-icon',
                '.mkdf-testimonials-cards .mkdf-testimonials .owl-item .mkdf-testimonial-job-title',
                '.mkdf-testimonials-holder .mkdf-tes-nav.light>.mkdf-tes-nav-next .mkdf-icon-mark',
                '.mkdf-testimonials-holder .mkdf-tes-nav.light>.mkdf-tes-nav-prev .mkdf-icon-mark'
            );

            $second_woo_color_selector = array();
            if(mediclinic_mikado_is_woocommerce_installed()) {
                $second_woo_color_selector = array(
                    'ul.products>.product .mkdf-pl-rating-holder .star-rating',
                    '.mkdf-woo-single-page .mkdf-single-product-summary .woocommerce-product-rating .star-rating',
                    '.mkdf-woo-single-page .woocommerce-tabs #reviews ol.commentlist .comment-text .star-rating',
                    '.mkdf-woo-single-page .woocommerce-tabs #reviews .comment-respond .stars a.active:after',
                    '.mkdf-woo-single-page .woocommerce-tabs #reviews .comment-respond .stars a:before'
                );
            }

            $second_color_selector = array_merge($second_color_selector, $second_woo_color_selector);

            $second_color_important_selector = array(
                'table.tt_timetable .event a.event_header:hover',
                'table.tt_timetable .event a:hover',
                '.tt_responsive .tt_timetable.small .tt_items_list a'
            );

            $second_background_color_selector = array(
                'footer .widget.widget_price_filter .price_slider_amount .button:hover',
                '.mkdf-side-menu .widget.widget_price_filter .price_slider_amount .button:hover',
                '.wpb_widgetised_column .widget.widget_price_filter .price_slider_amount .button:hover',
                'aside.mkdf-sidebar .widget.widget_price_filter .price_slider_amount .button:hover',
                '.widget.widget_price_filter .price_slider_amount .button:hover',
                'table.tt_timetable .tt_tooltip_content',
                '.mkdf-blog-holder.mkdf-blog-standard article.format-link .mkdf-post-content',
                '.mkdf-blog-holder.mkdf-blog-standard article.format-quote .mkdf-post-text',
                '.mkdf-blog-holder.mkdf-blog-single.mkdf-blog-single-standard article.format-link .mkdf-post-content',
                '.mkdf-blog-holder.mkdf-blog-single.mkdf-blog-single-standard article.format-quote .mkdf-post-text',
                '.mkdf-horizontal-timeline .mkdf-events-wrapper .mkdf-events a.selected .circle-outer',
                '.mkdf-price-table .mkdf-pt-inner ul li.mkdf-pt-title-holder',
                '.mkdf-tabs.mkdf-tabs-standard .mkdf-tabs-nav li.ui-state-active a',
                '.mkdf-tabs.mkdf-tabs-standard .mkdf-tabs-nav li.ui-state-hover a',
                '.mkdf-tabs.mkdf-tabs-vertical .mkdf-tabs-nav li.ui-state-active a',
                '.mkdf-tabs.mkdf-tabs-vertical .mkdf-tabs-nav li.ui-state-hover a',
                '.mkdf-team-single-holder .mkdf-booking-form',
                '.mkdf-testimonials-holder .mkdf-tes-nav.light>.mkdf-tes-nav-next:hover .mkdf-icon-mark',
                '.mkdf-testimonials-holder .mkdf-tes-nav.light>.mkdf-tes-nav-prev:hover .mkdf-icon-mark'
            );

            $second_woo_background_color_selector = array();
            if(mediclinic_mikado_is_woocommerce_installed()) {
                $second_woo_background_color_selector = array(
                    '.mkdf-woo-single-page .mkdf-single-product-summary form.cart button[type=submit]:hover',
                    '.mkdf-woo-single-page .woocommerce-tabs ul.tabs>li.active'
                );
            }

            $second_background_color_selector = array_merge($second_background_color_selector, $second_woo_background_color_selector);

            $second_background_color_opacity_selector = array(
                'ul.products > .product .mkdf-pl-inner .mkdf-pl-text',
                '.mkdf-video-button-holder .mkdf-video-button-play span:before'
            );

            $second_background_color_important_selector = array(
                'footer .widget.widget_price_filter .ui-slider-range',
                '.mkdf-side-menu .widget.widget_price_filter .ui-slider-range',
                '.wpb_widgetised_column .widget.widget_price_filter .ui-slider-range',
                'aside.mkdf-sidebar .widget.widget_price_filter .ui-slider-range',
                '.widget.widget_price_filter .ui-slider-range'
            );

            $second_border_color_selector = array(
                'table.tt_timetable .tt_tooltip .tt_tooltip_arrow'
            );

            $second_main_color_hex = str_replace( '#', '', $second_main_color );
            // Convert shorthand colors to full format, e.g. "FFF" -> "FFFFFF"
            $second_main_color_hex = preg_replace( '~^(.)(.)(.)$~', '$1$1$2$2$3$3', $second_main_color_hex );

            $rgb_second_main_color      = array();
            $rgb_second_main_color['R'] = hexdec( $second_main_color_hex{0} . $second_main_color_hex{1} );
            $rgb_second_main_color['G'] = hexdec( $second_main_color_hex{2} . $second_main_color_hex{3} );
            $rgb_second_main_color['B'] = hexdec( $second_main_color_hex{4} . $second_main_color_hex{5} );
            $dec_second_main_color = implode(',', $rgb_second_main_color);

            echo mediclinic_mikado_dynamic_css($second_color_selector, array('color' => $second_main_color));
            echo mediclinic_mikado_dynamic_css($second_color_important_selector, array('color' => $second_main_color.'!important'));
            echo mediclinic_mikado_dynamic_css($second_background_color_selector, array('background-color' => $second_main_color));
            echo mediclinic_mikado_dynamic_css($second_background_color_important_selector, array('background-color' => $second_main_color.'!important'));
            echo mediclinic_mikado_dynamic_css($second_background_color_opacity_selector, array('background-color' => 'rgba(' . $dec_second_main_color . ', 0.95)'));
            echo mediclinic_mikado_dynamic_css($second_border_color_selector, array('border-color' => $second_main_color));

        }
	
	    $page_background_color = mediclinic_mikado_options()->getOptionValue( 'page_background_color' );
	    if ( ! empty( $page_background_color ) ) {
		    $background_color_selector = array(
			    '.mkdf-wrapper-inner',
			    '.mkdf-content'
		    );
		    echo mediclinic_mikado_dynamic_css( $background_color_selector, array( 'background-color' => $page_background_color ) );
	    }
	
	    $selection_color = mediclinic_mikado_options()->getOptionValue( 'selection_color' );
	    if ( ! empty( $selection_color ) ) {
		    echo mediclinic_mikado_dynamic_css( '::selection', array( 'background' => $selection_color ) );
		    echo mediclinic_mikado_dynamic_css( '::-moz-selection', array( 'background' => $selection_color ) );
	    }
	
	    $paspartu_style = array();
	    $paspartu_color = mediclinic_mikado_options()->getOptionValue( 'paspartu_color' );
	    if ( ! empty( $paspartu_color ) ) {
		    $paspartu_style['background-color'] = $paspartu_color;
	    }
	
	    $paspartu_width = mediclinic_mikado_options()->getOptionValue( 'paspartu_width' );
	    if ( $paspartu_width !== '' ) {
		    $paspartu_style['padding'] = $paspartu_width . '%';
	    }
	
	    echo mediclinic_mikado_dynamic_css( '.mkdf-paspartu-enabled .mkdf-wrapper', $paspartu_style );
    }

    add_action('mediclinic_mikado_style_dynamic', 'mediclinic_mikado_design_styles');
}

if ( ! function_exists( 'mediclinic_mikado_content_styles' ) ) {
	function mediclinic_mikado_content_styles() {
		$content_style = array();
		
		$padding_top = mediclinic_mikado_options()->getOptionValue( 'content_top_padding' );
		if ( $padding_top !== '' ) {
			$content_style['padding-top'] = mediclinic_mikado_filter_px( $padding_top ) . 'px';
		}
		
		$content_selector = array(
			'.mkdf-content .mkdf-content-inner > .mkdf-full-width > .mkdf-full-width-inner',
		);
		
		echo mediclinic_mikado_dynamic_css( $content_selector, $content_style );
		
		$content_style_in_grid = array();
		
		$padding_top_in_grid = mediclinic_mikado_options()->getOptionValue( 'content_top_padding_in_grid' );
		if ( $padding_top_in_grid !== '' ) {
			$content_style_in_grid['padding-top'] = mediclinic_mikado_filter_px( $padding_top_in_grid ) . 'px';
		}
		
		$content_selector_in_grid = array(
			'.mkdf-content .mkdf-content-inner > .mkdf-container > .mkdf-container-inner',
		);
		
		echo mediclinic_mikado_dynamic_css( $content_selector_in_grid, $content_style_in_grid );
	}
	
	add_action( 'mediclinic_mikado_style_dynamic', 'mediclinic_mikado_content_styles' );
}

if ( ! function_exists( 'mediclinic_mikado_h1_styles' ) ) {
	function mediclinic_mikado_h1_styles() {
		$margin_top    = mediclinic_mikado_options()->getOptionValue( 'h1_margin_top' );
		$margin_bottom = mediclinic_mikado_options()->getOptionValue( 'h1_margin_bottom' );
		
		$item_styles = mediclinic_mikado_get_typography_styles( 'h1' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = mediclinic_mikado_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = mediclinic_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h1'
		);
		
		echo mediclinic_mikado_dynamic_css( $item_selector, $item_styles );
	}
	
	add_action( 'mediclinic_mikado_style_dynamic', 'mediclinic_mikado_h1_styles' );
}

if ( ! function_exists( 'mediclinic_mikado_h2_styles' ) ) {
	function mediclinic_mikado_h2_styles() {
		$margin_top    = mediclinic_mikado_options()->getOptionValue( 'h2_margin_top' );
		$margin_bottom = mediclinic_mikado_options()->getOptionValue( 'h2_margin_bottom' );
		
		$item_styles = mediclinic_mikado_get_typography_styles( 'h2' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = mediclinic_mikado_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = mediclinic_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h2'
		);
		
		echo mediclinic_mikado_dynamic_css( $item_selector, $item_styles );
	}
	
	add_action( 'mediclinic_mikado_style_dynamic', 'mediclinic_mikado_h2_styles' );
}

if ( ! function_exists( 'mediclinic_mikado_h3_styles' ) ) {
	function mediclinic_mikado_h3_styles() {
		$margin_top    = mediclinic_mikado_options()->getOptionValue( 'h3_margin_top' );
		$margin_bottom = mediclinic_mikado_options()->getOptionValue( 'h3_margin_bottom' );
		
		$item_styles = mediclinic_mikado_get_typography_styles( 'h3' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = mediclinic_mikado_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = mediclinic_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h3'
		);
		
		echo mediclinic_mikado_dynamic_css( $item_selector, $item_styles );
	}
	
	add_action( 'mediclinic_mikado_style_dynamic', 'mediclinic_mikado_h3_styles' );
}

if ( ! function_exists( 'mediclinic_mikado_h4_styles' ) ) {
	function mediclinic_mikado_h4_styles() {
		$margin_top    = mediclinic_mikado_options()->getOptionValue( 'h4_margin_top' );
		$margin_bottom = mediclinic_mikado_options()->getOptionValue( 'h4_margin_bottom' );
		
		$item_styles = mediclinic_mikado_get_typography_styles( 'h4' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = mediclinic_mikado_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = mediclinic_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h4'
		);
		
		echo mediclinic_mikado_dynamic_css( $item_selector, $item_styles );
	}
	
	add_action( 'mediclinic_mikado_style_dynamic', 'mediclinic_mikado_h4_styles' );
}

if ( ! function_exists( 'mediclinic_mikado_h5_styles' ) ) {
	function mediclinic_mikado_h5_styles() {
		$margin_top    = mediclinic_mikado_options()->getOptionValue( 'h5_margin_top' );
		$margin_bottom = mediclinic_mikado_options()->getOptionValue( 'h5_margin_bottom' );
		
		$item_styles = mediclinic_mikado_get_typography_styles( 'h5' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = mediclinic_mikado_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = mediclinic_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h5'
		);
		
		echo mediclinic_mikado_dynamic_css( $item_selector, $item_styles );
	}
	
	add_action( 'mediclinic_mikado_style_dynamic', 'mediclinic_mikado_h5_styles' );
}

if ( ! function_exists( 'mediclinic_mikado_h6_styles' ) ) {
	function mediclinic_mikado_h6_styles() {
		$margin_top    = mediclinic_mikado_options()->getOptionValue( 'h6_margin_top' );
		$margin_bottom = mediclinic_mikado_options()->getOptionValue( 'h6_margin_bottom' );
		
		$item_styles = mediclinic_mikado_get_typography_styles( 'h6' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = mediclinic_mikado_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = mediclinic_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h6'
		);
		
		echo mediclinic_mikado_dynamic_css( $item_selector, $item_styles );
	}
	
	add_action( 'mediclinic_mikado_style_dynamic', 'mediclinic_mikado_h6_styles' );
}

if ( ! function_exists( 'mediclinic_mikado_text_styles' ) ) {
	function mediclinic_mikado_text_styles() {
		$item_styles = mediclinic_mikado_get_typography_styles( 'text' );
		
		$item_selector = array(
			'p'
		);
		
		echo mediclinic_mikado_dynamic_css( $item_selector, $item_styles );
	}
	
	add_action( 'mediclinic_mikado_style_dynamic', 'mediclinic_mikado_text_styles' );
}

if ( ! function_exists( 'mediclinic_mikado_link_styles' ) ) {
	function mediclinic_mikado_link_styles() {
		$link_styles      = array();
		$link_color       = mediclinic_mikado_options()->getOptionValue( 'link_color' );
		$link_font_style  = mediclinic_mikado_options()->getOptionValue( 'link_fontstyle' );
		$link_font_weight = mediclinic_mikado_options()->getOptionValue( 'link_fontweight' );
		$link_decoration  = mediclinic_mikado_options()->getOptionValue( 'link_fontdecoration' );
		
		if ( ! empty( $link_color ) ) {
			$link_styles['color'] = $link_color;
		}
		if ( ! empty( $link_font_style ) ) {
			$link_styles['font-style'] = $link_font_style;
		}
		if ( ! empty( $link_font_weight ) ) {
			$link_styles['font-weight'] = $link_font_weight;
		}
		if ( ! empty( $link_decoration ) ) {
			$link_styles['text-decoration'] = $link_decoration;
		}
		
		$link_selector = array(
			'a',
			'p a'
		);
		
		if ( ! empty( $link_styles ) ) {
			echo mediclinic_mikado_dynamic_css( $link_selector, $link_styles );
		}
	}
	
	add_action( 'mediclinic_mikado_style_dynamic', 'mediclinic_mikado_link_styles' );
}

if ( ! function_exists( 'mediclinic_mikado_link_hover_styles' ) ) {
	function mediclinic_mikado_link_hover_styles() {
		$link_hover_styles     = array();
		$link_hover_color      = mediclinic_mikado_options()->getOptionValue( 'link_hovercolor' );
		$link_hover_decoration = mediclinic_mikado_options()->getOptionValue( 'link_hover_fontdecoration' );
		
		if ( ! empty( $link_hover_color ) ) {
			$link_hover_styles['color'] = $link_hover_color;
		}
		if ( ! empty( $link_hover_decoration ) ) {
			$link_hover_styles['text-decoration'] = $link_hover_decoration;
		}
		
		$link_hover_selector = array(
			'a:hover',
			'p a:hover'
		);
		
		if ( ! empty( $link_hover_styles ) ) {
			echo mediclinic_mikado_dynamic_css( $link_hover_selector, $link_hover_styles );
		}
		
		$link_heading_hover_styles = array();
		
		if ( ! empty( $link_hover_color ) ) {
			$link_heading_hover_styles['color'] = $link_hover_color;
		}
		
		$link_heading_hover_selector = array(
			'h1 a:hover',
			'h2 a:hover',
			'h3 a:hover',
			'h4 a:hover',
			'h5 a:hover',
			'h6 a:hover'
		);
		
		if ( ! empty( $link_heading_hover_styles ) ) {
			echo mediclinic_mikado_dynamic_css( $link_heading_hover_selector, $link_heading_hover_styles );
		}
	}
	
	add_action( 'mediclinic_mikado_style_dynamic', 'mediclinic_mikado_link_hover_styles' );
}

if ( ! function_exists( 'mediclinic_mikado_smooth_page_transition_styles' ) ) {
	function mediclinic_mikado_smooth_page_transition_styles( $style ) {
		$id            = mediclinic_mikado_get_page_id();
		$loader_style  = array();
		$current_style = '';
		
		$background_color = mediclinic_mikado_get_meta_field_intersect( 'smooth_pt_bgnd_color', $id );
		if ( ! empty( $background_color ) ) {
			$loader_style['background-color'] = $background_color;
		}
		
		$loader_selector = array(
			'.mkdf-smooth-transition-loader'
		);
		
		if ( ! empty( $loader_style ) ) {
			$current_style .= mediclinic_mikado_dynamic_css( $loader_selector, $loader_style );
		}
		
		$spinner_style = array();
		$spinner_color = mediclinic_mikado_get_meta_field_intersect( 'smooth_pt_spinner_color', $id );
		if ( ! empty( $spinner_color ) ) {
			$spinner_style['background-color'] = $spinner_color;
		}
		
		$spinner_selectors = array(
			'.mkdf-st-loader .mkdf-rotate-circles > div',
			'.mkdf-st-loader .pulse',
			'.mkdf-st-loader .double_pulse .double-bounce1',
			'.mkdf-st-loader .double_pulse .double-bounce2',
			'.mkdf-st-loader .cube',
			'.mkdf-st-loader .rotating_cubes .cube1',
			'.mkdf-st-loader .rotating_cubes .cube2',
			'.mkdf-st-loader .stripes > div',
			'.mkdf-st-loader .wave > div',
			'.mkdf-st-loader .two_rotating_circles .dot1',
			'.mkdf-st-loader .two_rotating_circles .dot2',
			'.mkdf-st-loader .five_rotating_circles .container1 > div',
			'.mkdf-st-loader .five_rotating_circles .container2 > div',
			'.mkdf-st-loader .five_rotating_circles .container3 > div',
			'.mkdf-st-loader .atom .ball-1:before',
			'.mkdf-st-loader .atom .ball-2:before',
			'.mkdf-st-loader .atom .ball-3:before',
			'.mkdf-st-loader .atom .ball-4:before',
			'.mkdf-st-loader .clock .ball:before',
			'.mkdf-st-loader .mitosis .ball',
			'.mkdf-st-loader .lines .line1',
			'.mkdf-st-loader .lines .line2',
			'.mkdf-st-loader .lines .line3',
			'.mkdf-st-loader .lines .line4',
			'.mkdf-st-loader .fussion .ball',
			'.mkdf-st-loader .fussion .ball-1',
			'.mkdf-st-loader .fussion .ball-2',
			'.mkdf-st-loader .fussion .ball-3',
			'.mkdf-st-loader .fussion .ball-4',
			'.mkdf-st-loader .wave_circles .ball',
			'.mkdf-st-loader .pulse_circles .ball'
		);
		
		if ( ! empty( $spinner_style ) ) {
			$current_style .= mediclinic_mikado_dynamic_css( $spinner_selectors, $spinner_style );
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'mediclinic_mikado_add_page_custom_style', 'mediclinic_mikado_smooth_page_transition_styles' );
}