<?php
include_once get_template_directory() . '/theme-includes.php';

if (!function_exists('mediclinic_mikado_styles')) {
    /**
     * Function that includes theme's core styles
     */
    function mediclinic_mikado_styles() {

        //include theme's core styles
        wp_enqueue_style('mediclinic-mikado-default-style', MIKADO_ROOT . '/style.css');
        wp_enqueue_style('mediclinic-mikado-modules', MIKADO_ASSETS_ROOT . '/css/modules.min.css');

        mediclinic_mikado_icon_collections()->enqueueStyles();

        wp_enqueue_style('wp-mediaelement');

        //is woocommerce installed?
        if (mediclinic_mikado_is_woocommerce_installed()) {
            if (mediclinic_mikado_load_woo_assets()) {

                //include theme's woocommerce styles
                wp_enqueue_style('mediclinic-mikado-woo', MIKADO_ASSETS_ROOT . '/css/woocommerce.min.css');
            }
        }

        //define files afer which style dynamic needs to be included. It should be included last so it can override other files
        $style_dynamic_deps_array = array();
        if (mediclinic_mikado_load_woo_assets()) {
            $style_dynamic_deps_array = array('mediclinic-mikado-woo', 'mediclinic-mikado-woo-responsive');
        }

        if (file_exists(MIKADO_ROOT_DIR . '/assets/css/style_dynamic.css') && mediclinic_mikado_is_css_folder_writable() && !is_multisite()) {
            wp_enqueue_style('mediclinic-mikado-style-dynamic', MIKADO_ASSETS_ROOT . '/css/style_dynamic.css', $style_dynamic_deps_array, filemtime(MIKADO_ROOT_DIR . '/assets/css/style_dynamic.css')); //it must be included after woocommerce styles so it can override it
        } else if(file_exists(MIKADO_ROOT_DIR.'/assets/css/style_dynamic_ms_id_'. mediclinic_mikado_get_multisite_blog_id() .'.css') && mediclinic_mikado_is_css_folder_writable() && is_multisite()) {
	        wp_enqueue_style('mediclinic-mikado-style-dynamic', MIKADO_ASSETS_ROOT.'/css/style_dynamic_ms_id_'. mediclinic_mikado_get_multisite_blog_id() .'.css', $style_dynamic_deps_array, filemtime(MIKADO_ROOT_DIR.'/assets/css/style_dynamic_ms_id_'. mediclinic_mikado_get_multisite_blog_id() .'.css')); //it must be included after woocommerce styles so it can override it
        }

        //is responsive option turned on?
        if (mediclinic_mikado_is_responsive_on()) {
            wp_enqueue_style('mediclinic-mikado-modules-responsive', MIKADO_ASSETS_ROOT . '/css/modules-responsive.min.css');

            //is woocommerce installed?
            if (mediclinic_mikado_is_woocommerce_installed()) {
                if (mediclinic_mikado_load_woo_assets()) {

                    //include theme's woocommerce responsive styles
                    wp_enqueue_style('mediclinic-mikado-woo-responsive', MIKADO_ASSETS_ROOT . '/css/woocommerce-responsive.min.css');
                }
            }

            //include proper styles
            if (file_exists(MIKADO_ROOT_DIR . '/assets/css/style_dynamic_responsive.css') && mediclinic_mikado_is_css_folder_writable() && !is_multisite()) {
                wp_enqueue_style('mediclinic-mikado-style-dynamic-responsive', MIKADO_ASSETS_ROOT . '/css/style_dynamic_responsive.css', array(), filemtime(MIKADO_ROOT_DIR . '/assets/css/style_dynamic_responsive.css'));
            } else if(file_exists(MIKADO_ROOT_DIR.'/assets/css/style_dynamic_responsive_ms_id_'. mediclinic_mikado_get_multisite_blog_id() .'.css') && mediclinic_mikado_is_css_folder_writable() && is_multisite()) {
	            wp_enqueue_style('mediclinic-mikado-style-dynamic-responsive', MIKADO_ASSETS_ROOT.'/css/style_dynamic_responsive_ms_id_'. mediclinic_mikado_get_multisite_blog_id() .'.css', array(), filemtime(MIKADO_ROOT_DIR.'/assets/css/style_dynamic_responsive_ms_id_'. mediclinic_mikado_get_multisite_blog_id() .'.css'));
            }
        }
    }

    add_action('wp_enqueue_scripts', 'mediclinic_mikado_styles');
}

if (!function_exists('mediclinic_mikado_google_fonts_styles')) {
    /**
     * Function that includes google fonts defined anywhere in the theme
     */
    function mediclinic_mikado_google_fonts_styles() {
        $font_simple_field_array = mediclinic_mikado_options()->getOptionsByType('fontsimple');
        if (!(is_array($font_simple_field_array) && count($font_simple_field_array) > 0)) {
            $font_simple_field_array = array();
        }

        $font_field_array = mediclinic_mikado_options()->getOptionsByType('font');
        if (!(is_array($font_field_array) && count($font_field_array) > 0)) {
            $font_field_array = array();
        }

        $available_font_options = array_merge($font_simple_field_array, $font_field_array);

        $google_font_weight_array = mediclinic_mikado_options()->getOptionValue('google_font_weight');
        if (!empty($google_font_weight_array)) {
            $google_font_weight_array = array_slice(mediclinic_mikado_options()->getOptionValue('google_font_weight'), 1);
        }

        $font_weight_str = '300,400,500';
        if (!empty($google_font_weight_array) && $google_font_weight_array !== '') {
            $font_weight_str = implode(',', $google_font_weight_array);
        }

        $google_font_subset_array = mediclinic_mikado_options()->getOptionValue('google_font_subset');
        if (!empty($google_font_subset_array)) {
            $google_font_subset_array = array_slice(mediclinic_mikado_options()->getOptionValue('google_font_subset'), 1);
        }

        $font_subset_str = 'latin-ext';
        if (!empty($google_font_subset_array) && $google_font_subset_array !== '') {
            $font_subset_str = implode(',', $google_font_subset_array);
        }

        //define available font options array
        $fonts_array = array();
        foreach ($available_font_options as $font_option) {
            //is font set and not set to default and not empty?
            $font_option_value = mediclinic_mikado_options()->getOptionValue($font_option);
            if (mediclinic_mikado_is_font_option_valid($font_option_value) && !mediclinic_mikado_is_native_font($font_option_value)) {
                $font_option_string = $font_option_value . ':' . $font_weight_str;
                if (!in_array($font_option_string, $fonts_array)) {
                    $fonts_array[] = $font_option_string;
                }
            }
        }

        $fonts_array = array_diff($fonts_array, array('-1:' . $font_weight_str));
        $google_fonts_string = implode('|', $fonts_array);

        //default fonts
        $default_font_string = 'Poppins:' . $font_weight_str.'|Open Sans:'.$font_weight_str;
        $protocol = is_ssl() ? 'https:' : 'http:';

        //is google font option checked anywhere in theme?
        if (count($fonts_array) > 0) {

            //include all checked fonts
            $fonts_full_list = $default_font_string . '|' . str_replace('+', ' ', $google_fonts_string);
            $fonts_full_list_args = array(
                'family' => urlencode($fonts_full_list),
                'subset' => urlencode($font_subset_str),
            );

            $mediclinic_mikado_fonts = add_query_arg($fonts_full_list_args, $protocol . '//fonts.googleapis.com/css');
            wp_enqueue_style('mediclinic-mikado-google-fonts', esc_url_raw($mediclinic_mikado_fonts), array(), '1.0.0');

        } else {
            //include default google font that theme is using
            $default_fonts_args = array(
                'family' => urlencode($default_font_string),
                'subset' => urlencode($font_subset_str),
            );
            $mediclinic_mikado_fonts = add_query_arg($default_fonts_args, $protocol . '//fonts.googleapis.com/css');
            wp_enqueue_style('mediclinic-mikado-google-fonts', esc_url_raw($mediclinic_mikado_fonts), array(), '1.0.0');
        }
    }

    add_action('wp_enqueue_scripts', 'mediclinic_mikado_google_fonts_styles');
}

if (!function_exists('mediclinic_mikado_scripts')) {
    /**
     * Function that includes all necessary scripts
     */
    function mediclinic_mikado_scripts() {
        global $wp_scripts;

        //init theme core scripts
        wp_enqueue_script('jquery-ui-core');
        wp_enqueue_script('jquery-ui-tabs');
        wp_enqueue_script('jquery-ui-accordion');
        wp_enqueue_script('wp-mediaelement');

        // 3rd party JavaScripts that we used in our theme
	    wp_enqueue_script( 'mediclinic_mikado_appear', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.appear.js', array( 'jquery' ), false, true );
	    wp_enqueue_script( 'mediclinic_mikado_modernizr', MIKADO_ASSETS_ROOT . '/js/modules/plugins/modernizr.min.js', array( 'jquery' ), false, true );
	    wp_enqueue_script( 'mediclinic_mikado_hoverIntent', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.hoverIntent.min.js', array( 'jquery' ), false, true );
	    wp_enqueue_script( 'mediclinic_mikado_jquery-plugin', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.plugin.js', array( 'jquery' ), false, true );
	    wp_enqueue_script( 'mediclinic_mikado_owl-carousel', MIKADO_ASSETS_ROOT . '/js/modules/plugins/owl.carousel.min.js', array( 'jquery' ), false, true );
	    wp_enqueue_script( 'mediclinic_mikado_flex-slider', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.flexslider-min.js', array( 'jquery' ), false, true );
	    wp_enqueue_script( 'mediclinic_mikado_waypoints', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.waypoints.min.js', array( 'jquery' ), false, true );
	    wp_enqueue_script( 'mediclinic_mikado_chart', MIKADO_ASSETS_ROOT . '/js/modules/plugins/Chart.min.js', array( 'jquery' ), false, true );
	    wp_enqueue_script( 'mediclinic_mikado_fluidvids', MIKADO_ASSETS_ROOT . '/js/modules/plugins/fluidvids.min.js', array( 'jquery' ), false, true );
	    wp_enqueue_script( 'mediclinic_mikado_prettyphoto', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.prettyPhoto.js', array( 'jquery' ), false, true );
	    wp_enqueue_script( 'mediclinic_mikado_perfectscrollbar', MIKADO_ASSETS_ROOT . '/js/modules/plugins/perfect-scrollbar.jquery.min.js', array( 'jquery' ), false, true );
	    wp_enqueue_script( 'mediclinic_mikado_ScrollToPlugin', MIKADO_ASSETS_ROOT . '/js/modules/plugins/ScrollToPlugin.min.js', array( 'jquery' ), false, true );
	    wp_enqueue_script( 'mediclinic_mikado_parallax', MIKADO_ASSETS_ROOT . '/js/modules/plugins/parallax.min.js', array( 'jquery' ), false, true );
	    wp_enqueue_script( 'mediclinic_mikado_waitforimages', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.waitforimages.js', array( 'jquery' ), false, true );
	    wp_enqueue_script( 'mediclinic_mikado_jquery-easing-1.3', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.easing.1.3.js', array( 'jquery' ), false, true );
	    wp_enqueue_script( 'mediclinic_mikado_isotope', MIKADO_ASSETS_ROOT . '/js/modules/plugins/isotope.pkgd.min.js', array( 'jquery' ), false, true );
	    wp_enqueue_script( 'mediclinic_mikado_packery', MIKADO_ASSETS_ROOT . '/js/modules/plugins/packery-mode.pkgd.min.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'mediclinic_mikado_datetimepicker', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.datetimepicker.min.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'mediclinic_mikado_scrollForever', MIKADO_ASSETS_ROOT . '/js/modules/plugins/scrollForever.min.js', array( 'jquery' ), false, true );

        do_action('mediclinic_mikado_enqueue_third_party_scripts');

        if (mediclinic_mikado_is_woocommerce_installed()) {
            wp_enqueue_script('select2');
        }
	
	    if(mediclinic_mikado_is_page_smooth_scroll_enabled()) {
		    wp_enqueue_script('mediclinic-mikado-tweenLite', MIKADO_ASSETS_ROOT . '/js/modules/plugins/TweenLite.min.js', array('jquery'), false, true);
		    wp_enqueue_script('mediclinic-mikado-smoothPageScroll', MIKADO_ASSETS_ROOT . '/js/modules/plugins/smoothPageScroll.js', array('jquery'), false, true);
	    }

        //include google map api script
        $google_maps_api_key = mediclinic_mikado_options()->getOptionValue('google_maps_api_key');
        if (!empty($google_maps_api_key)) {
            wp_enqueue_script('mediclinic-mikado-google-map-api', '//maps.googleapis.com/maps/api/js?key=' . esc_attr($google_maps_api_key), array(), false, true);
        }

        wp_enqueue_script('mediclinic-mikado-modules', MIKADO_ASSETS_ROOT . '/js/modules.min.js', array('jquery'), false, true);

        //include comment reply script
        $wp_scripts->add_data('comment-reply', 'group', 1);
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }

    add_action('wp_enqueue_scripts', 'mediclinic_mikado_scripts');
}

//defined content width variable
if (!isset($content_width)) $content_width = 1060;

if (!function_exists('mediclinic_mikado_theme_setup')) {
    /**
     * Function that adds various features to theme. Also defines image sizes that are used in a theme
     */
    function mediclinic_mikado_theme_setup() {
        //add support for feed links
        add_theme_support('automatic-feed-links');

        //add support for post formats
        add_theme_support('post-formats', array('gallery', 'link', 'quote', 'video', 'audio'));

        //add theme support for post thumbnails
        add_theme_support('post-thumbnails');

        //add theme support for title tag
        add_theme_support('title-tag');

        //define thumbnail sizes
        add_image_size('mediclinic_mikado_square', 550, 550, true);
        add_image_size('mediclinic_mikado_landscape', 1100, 550, true);
        add_image_size('mediclinic_mikado_portrait', 550, 1100, true);
        add_image_size('mediclinic_mikado_huge', 1100, 1100, true);
        add_image_size('mediclinic_mikado_navigation', 130, 80, true);

        load_theme_textdomain('mediclinic', get_template_directory() . '/languages');
    }

    add_action('after_setup_theme', 'mediclinic_mikado_theme_setup');
}

if (!function_exists('mediclinic_mikado_is_responsive_on')) {
    /**
     * Checks whether responsive mode is enabled in theme options
     * @return bool
     */
    function mediclinic_mikado_is_responsive_on() {
        return mediclinic_mikado_options()->getOptionValue('responsiveness') !== 'no';
    }
}

if (!function_exists('mediclinic_mikado_rgba_color')) {
    /**
     * Function that generates rgba part of css color property
     *
     * @param $color string hex color
     * @param $transparency float transparency value between 0 and 1
     *
     * @return string generated rgba string
     */
    function mediclinic_mikado_rgba_color($color, $transparency) {
        if ($color !== '' && $transparency !== '') {
            $rgba_color = '';

            $rgb_color_array = mediclinic_mikado_hex2rgb($color);
            $rgba_color .= 'rgba(' . implode(', ', $rgb_color_array) . ', ' . $transparency . ')';

            return $rgba_color;
        }
    }
}

if (!function_exists('mediclinic_mikado_header_meta')) {
    /**
     * Function that echoes meta data if our seo is enabled
     */
    function mediclinic_mikado_header_meta() { ?>

        <meta charset="<?php bloginfo('charset'); ?>"/>
        <link rel="profile" href="http://gmpg.org/xfn/11"/>
        <?php if (is_singular() && pings_open(get_queried_object())) : ?>
            <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <?php endif; ?>

    <?php }

    add_action('mediclinic_mikado_header_meta', 'mediclinic_mikado_header_meta');
}

if (!function_exists('mediclinic_mikado_user_scalable_meta')) {
    /**
     * Function that outputs user scalable meta if responsiveness is turned on
     * Hooked to mediclinic_mikado_header_meta action
     */
    function mediclinic_mikado_user_scalable_meta() {
        //is responsiveness option is chosen?
        if (mediclinic_mikado_is_responsive_on()) { ?>
            <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=yes">
        <?php } else { ?>
            <meta name="viewport" content="width=1200,user-scalable=yes">
        <?php }
    }

    add_action('mediclinic_mikado_header_meta', 'mediclinic_mikado_user_scalable_meta');
}

if (!function_exists('mediclinic_mikado_smooth_page_transitions')) {
	/**
	 * Function that outputs smooth page transitions html if smooth page transitions functionality is turned on
	 * Hooked to mediclinic_mikado_after_body_tag action
	 */
	function mediclinic_mikado_smooth_page_transitions() {
	    $id = mediclinic_mikado_get_page_id();

		if(mediclinic_mikado_get_meta_field_intersect('smooth_page_transitions',$id) === 'yes' &&
			mediclinic_mikado_get_meta_field_intersect('page_transition_preloader',$id) === 'yes') { ?>
			<div class="mkdf-smooth-transition-loader mkdf-mimic-ajax">
				<div class="mkdf-st-loader">
					<div class="mkdf-st-loader1">
						<?php mediclinic_mikado_loading_spinners(); ?>
					</div>
				</div>
			</div>
		<?php }
	}
	
	add_action('mediclinic_mikado_after_body_tag', 'mediclinic_mikado_smooth_page_transitions', 10);
}

if (!function_exists('mediclinic_mikado_back_to_top_button')) {
	/**
	 * Function that outputs back to top button html if back to top functionality is turned on
	 * Hooked to mediclinic_mikado_after_header_area action
	 */
	function mediclinic_mikado_back_to_top_button() {
		if (mediclinic_mikado_options()->getOptionValue('show_back_button') == 'yes') { ?>
			<a id='mkdf-back-to-top' href='#'>
                <span class="mkdf-icon-stack">
                     <?php mediclinic_mikado_icon_collections()->getBackToTopIcon('ion_icons');?>
                </span>
			</a>
		<?php }
	}
	
	add_action('mediclinic_mikado_after_header_area', 'mediclinic_mikado_back_to_top_button', 10);
}

if (!function_exists('mediclinic_mikado_get_page_id')) {
    /**
     * Function that returns current page / post id.
     * Checks if current page is woocommerce page and returns that id if it is.
     * Checks if current page is any archive page (category, tag, date, author etc.) and returns -1 because that isn't
     * page that is created in WP admin.
     *
     * @return int
     *
     * @version 0.1
     *
     * @see mediclinic_mikado_is_woocommerce_installed()
     * @see mediclinic_mikado_is_woocommerce_shop()
     */
    function mediclinic_mikado_get_page_id() {
        if (mediclinic_mikado_is_woocommerce_installed() && mediclinic_mikado_is_woocommerce_shop()) {
            return mediclinic_mikado_get_woo_shop_page_id();
        }

        if (mediclinic_mikado_is_default_wp_template()) {
            return -1;
        }

        return get_queried_object_id();
    }
}



if (!function_exists('mediclinic_mikado_get_multisite_blog_id')) {
    /**
     * Check is multisite and return blog id
     *
     * @return int
     */
    function mediclinic_mikado_get_multisite_blog_id() {
        if(is_multisite()){
            return get_blog_details()->blog_id;
        }
    }
}

if (!function_exists('mediclinic_mikado_is_default_wp_template')) {
    /**
     * Function that checks if current page archive page, search, 404 or default home blog page
     * @return bool
     *
     * @see is_archive()
     * @see is_search()
     * @see is_404()
     * @see is_front_page()
     * @see is_home()
     */
    function mediclinic_mikado_is_default_wp_template() {
        return is_archive() || is_search() || is_404() || (is_front_page() && is_home());
    }
}

if (!function_exists('mediclinic_mikado_has_shortcode')) {
    /**
     * Function that checks whether shortcode exists on current page / post
     *
     * @param string shortcode to find
     * @param string content to check. If isn't passed current post content will be used
     *
     * @return bool whether content has shortcode or not
     */
    function mediclinic_mikado_has_shortcode($shortcode, $content = '') {
        $has_shortcode = false;

        if ($shortcode) {
            //if content variable isn't past
            if ($content == '') {
                //take content from current post
                $page_id = mediclinic_mikado_get_page_id();
                if (!empty($page_id)) {
                    $current_post = get_post($page_id);

                    if (is_object($current_post) && property_exists($current_post, 'post_content')) {
                        $content = $current_post->post_content;
                    }
                }
            }

            //does content has shortcode added?
            if (stripos($content, '[' . $shortcode) !== false) {
                $has_shortcode = true;
            }
        }

        return $has_shortcode;
    }
}

if (!function_exists('mediclinic_mikado_page_custom_style')) {
    /**
     * Function that print custom page style
     */
    function mediclinic_mikado_page_custom_style() {
        $style = apply_filters('mediclinic_mikado_add_page_custom_style', $style = '');

        if ($style !== '') {
            wp_add_inline_style('mediclinic-mikado-modules', $style);
        }
    }

    add_action('wp_enqueue_scripts', 'mediclinic_mikado_page_custom_style');
}

if (!function_exists('mediclinic_mikado_container_style')) {
    /**
     * Function that return container style
     */
    function mediclinic_mikado_container_style($style) {
        $page_id      = mediclinic_mikado_get_page_id();
        $class_prefix = mediclinic_mikado_get_unique_page_class($page_id, true);

        $container_selector = array(
            $class_prefix . ' .mkdf-content .mkdf-content-inner > .mkdf-container',
            $class_prefix . ' .mkdf-content .mkdf-content-inner > .mkdf-full-width'
        );

        $container_class = array();
        $page_backgorund_color = get_post_meta($page_id, 'mkdf_page_background_color_meta', true);

        if ($page_backgorund_color) {
            $container_class['background-color'] = $page_backgorund_color;
        }

        $current_style = mediclinic_mikado_dynamic_css($container_selector, $container_class);
        $current_style = $current_style . $style;

        return $current_style;
    }

    add_filter('mediclinic_mikado_add_page_custom_style', 'mediclinic_mikado_container_style');
}

if (!function_exists('mediclinic_mikado_content_padding_top')) {
    /**
     * Function that return padding for content
     */
    function mediclinic_mikado_content_padding_top($style) {
	    $page_id      = mediclinic_mikado_get_page_id();
        $class_prefix = mediclinic_mikado_get_unique_page_class($page_id, true);

        $current_style = '';

        $content_selector = array(
            $class_prefix . ' .mkdf-content .mkdf-content-inner > .mkdf-container > .mkdf-container-inner',
            $class_prefix . ' .mkdf-content .mkdf-content-inner > .mkdf-full-width > .mkdf-full-width-inner',
        );

        $content_class = array();

        $page_padding_top = get_post_meta($page_id, 'mkdf_page_content_top_padding', true);

        if ($page_padding_top !== '') {
            if (get_post_meta($page_id, 'mkdf_page_content_top_padding_mobile', true) == 'yes') {
                $content_class['padding-top'] = mediclinic_mikado_filter_px($page_padding_top) . 'px !important';
            } else {
                $content_class['padding-top'] = mediclinic_mikado_filter_px($page_padding_top) . 'px';
            }
            $current_style .= mediclinic_mikado_dynamic_css($content_selector, $content_class);
        }

        $current_style = $current_style . $style;

        return $current_style;
    }

    add_filter('mediclinic_mikado_add_page_custom_style', 'mediclinic_mikado_content_padding_top');
}

if (!function_exists('mediclinic_mikado_get_unique_page_class')) {
    /**
     * Returns unique page class based on post type and page id
     *
     * $params int $id is page id
     * $params bool $allowSingleProductOption
     * @return string
     */
    function mediclinic_mikado_get_unique_page_class($id, $allowSingleProductOption = false) {
        $page_class = '';
	
	    if ( mediclinic_mikado_is_woocommerce_installed() && $allowSingleProductOption ) {
		
		    if ( is_product() ) {
			    $id = get_the_ID();
		    }
	    }
	
	    if ( is_single() ) {
		    $page_class = '.postid-' . $id;
	    } elseif ( $id === mediclinic_mikado_get_woo_shop_page_id() ) {
		    $page_class = '.archive';
	    } elseif ( is_home() ) {
		    $page_class .= '.home';
	    } else {
		    $page_class .= '.page-id-' . $id;
	    }

        return $page_class;
    }
}

if (!function_exists('mediclinic_mikado_print_custom_css')) {
    /**
     * Prints out custom css from theme options
     */
    function mediclinic_mikado_print_custom_css() {
        $custom_css = mediclinic_mikado_options()->getOptionValue('custom_css');

        if (!empty($custom_css)) {
            wp_add_inline_style('mediclinic-mikado-modules', $custom_css);
        }
    }

    add_action('wp_enqueue_scripts', 'mediclinic_mikado_print_custom_css');
}

if (!function_exists('mediclinic_mikado_print_custom_js')) {
    /**
     * Prints out custom css from theme options
     */
    function mediclinic_mikado_print_custom_js() {
        $custom_js = mediclinic_mikado_options()->getOptionValue('custom_js');

        if (!empty($custom_js)) {
            wp_add_inline_script('mediclinic-mikado-modules', $custom_js);
        }
    }

    add_action('wp_enqueue_scripts', 'mediclinic_mikado_print_custom_js');
}

if (!function_exists('mediclinic_mikado_get_global_variables')) {
    /**
     * Function that generates global variables and put them in array so they could be used in the theme
     */
    function mediclinic_mikado_get_global_variables() {
        $global_variables = array();

        $global_variables['mkdfAddForAdminBar'] = is_admin_bar_showing() ? 32 : 0;
        $global_variables['mkdfElementAppearAmount'] = -100;
        $global_variables['mkdfAjaxUrl'] = admin_url('admin-ajax.php');
	    
        $global_variables = apply_filters('mediclinic_mikado_js_global_variables', $global_variables);

        wp_localize_script('mediclinic-mikado-modules', 'mkdfGlobalVars', array(
            'vars' => $global_variables
        ));
    }

    add_action('wp_enqueue_scripts', 'mediclinic_mikado_get_global_variables');
}

if (!function_exists('mediclinic_mikado_per_page_js_variables')) {
    /**
     * Outputs global JS variable that holds page settings
     */
    function mediclinic_mikado_per_page_js_variables() {
        $per_page_js_vars = apply_filters('mediclinic_mikado_per_page_js_vars', array());

        wp_localize_script('mediclinic-mikado-modules', 'mkdfPerPageVars', array(
            'vars' => $per_page_js_vars
        ));
    }

    add_action('wp_enqueue_scripts', 'mediclinic_mikado_per_page_js_variables');
}

if (!function_exists('mediclinic_mikado_content_elem_style_attr')) {
    /**
     * Defines filter for adding custom styles to content HTML element
     */
    function mediclinic_mikado_content_elem_style_attr() {
        $styles = apply_filters('mediclinic_mikado_content_elem_style_attr', array());

        mediclinic_mikado_inline_style($styles);
    }
}

if (!function_exists('mediclinic_mikado_open_graph')) {
    /*
     * Function that echoes open graph meta tags if enabled
     */
    function mediclinic_mikado_open_graph() {

        if (mediclinic_mikado_option_get_value('enable_open_graph') === 'yes') {

            // get the id
            $id = get_queried_object_id();

            // default type is article, override it with product if page is woo single product
            $type = 'article';
            $description = '';

            // check if page is generic wp page w/o page id
            if (mediclinic_mikado_is_default_wp_template()) {
                $id = 0;
            }

            // check if page is woocommerce shop page
            if (mediclinic_mikado_is_woocommerce_installed() && (function_exists('is_shop') && is_shop())) {
                $shop_page_id = get_option('woocommerce_shop_page_id');

                if (!empty($shop_page_id)) {
                    $id = $shop_page_id;
                    // set flag
                    $description = 'woocommerce-shop';
                }
            }

            if (function_exists('is_product') && is_product()) {
                $type = 'product';
            }

            // if id exist use wp template tags
            if (!empty($id)) {
                $url = get_permalink($id);
                $title = get_the_title($id);

                // apply bloginfo description to woocommerce shop page instead of first product item description
                if ($description === 'woocommerce-shop') {
                    $description = get_bloginfo('description');
                } else {
                    $description = strip_tags(apply_filters('the_excerpt', get_post_field('post_excerpt', $id)));
                }

                // has featured image
                if (get_post_thumbnail_id($id) !== '') {
                    $image = wp_get_attachment_url(get_post_thumbnail_id($id));
                } else {
                    $image = mediclinic_mikado_option_get_value('open_graph_image');
                }
            } else {
                global $wp;
                $url = esc_url(home_url(add_query_arg(array(), $wp->request)));
                $title = get_bloginfo('name');
                $description = get_bloginfo('description');
                $image = mediclinic_mikado_option_get_value('open_graph_image');
            }

            ?>

            <meta property="og:url" content="<?php echo esc_url($url); ?>"/>
            <meta property="og:type" content="<?php echo esc_html($type); ?>"/>
            <meta property="og:title" content="<?php echo esc_html($title); ?>"/>
            <meta property="og:description" content="<?php echo esc_html($description); ?>"/>
            <meta property="og:image" content="<?php echo esc_url($image); ?>"/>

        <?php }
    }

    add_action('wp_head', 'mediclinic_mikado_open_graph');
}

if (!function_exists('mediclinic_mikado_is_woocommerce_installed')) {
    /**
     * Function that checks if woocommerce is installed
     * @return bool
     */
    function mediclinic_mikado_is_woocommerce_installed() {
        return function_exists('is_woocommerce');
    }
}

if (!function_exists('mediclinic_mikado_core_plugin_installed')) {
    //is Mikado CPT installed?
    function mediclinic_mikado_core_plugin_installed() {
        return defined('MIKADO_CORE_VERSION');
    }
}

if (!function_exists('mediclinic_mikado_visual_composer_installed')) {
    /**
     * Function that checks if visual composer installed
     * @return bool
     */
    function mediclinic_mikado_visual_composer_installed() {
        //is Visual Composer installed?
        if (class_exists('WPBakeryVisualComposerAbstract')) {
            return true;
        }

        return false;
    }
}

if (!function_exists('mediclinic_mikado_revolution_slider_installed')) {
	/**
	 * Function that checks if revolution slider installed
	 * @return bool
	 */
	function mediclinic_mikado_revolution_slider_installed() {
		if (class_exists('RevSliderFront')) {
			return true;
		}
		
		return false;
	}
}

if (!function_exists('mediclinic_mikado_contact_form_7_installed')) {
    /**
     * Function that checks if contact form 7 installed
     * @return bool
     */
    function mediclinic_mikado_contact_form_7_installed() {
        //is Contact Form 7 installed?
        if (defined('WPCF7_VERSION')) {
            return true;
        }

        return false;
    }
}

if (!function_exists('mediclinic_mikado_is_wpml_installed')) {
    /**
     * Function that checks if WPML plugin is installed
     * @return bool
     *
     * @version 0.1
     */
    function mediclinic_mikado_is_wpml_installed() {
        return defined('ICL_SITEPRESS_VERSION');
    }
}

if (!function_exists('mediclinic_mikado_max_image_width_srcset')) {
    /**
     * Set max width for srcset to 1920
     *
     * @return int
     */
    function mediclinic_mikado_max_image_width_srcset() {
        return 1920;
    }

    add_filter('max_srcset_image_width', 'mediclinic_mikado_max_image_width_srcset');
}

if ( ! function_exists( 'mediclinic_mikado_is_gutenberg_installed' ) ) {
    /**
     * Function that checks if Gutenberg plugin installed
     * @return bool
     */
    function mediclinic_mikado_is_gutenberg_installed() {
        return function_exists( 'is_gutenberg_page' ) && is_gutenberg_page();
    }
}

if ( ! function_exists( 'mediclinic_mikado_is_wp_gutenberg_installed' ) ) {
	/**
	 * Function that checks if WordPress 5.x with Gutenberg editor installed
	 * @return bool
	 */
	function mediclinic_mikado_is_wp_gutenberg_installed() {
		return class_exists( 'WP_Block_Type' );
	}
}


if ( ! function_exists( 'mediclinic_mikado_get_module_part' ) ) {
	function mediclinic_mikado_get_module_part( $module ) {
		return $module;
	}
}
if ( ! function_exists( 'mediclinic_mikado_enqueue_editor_customizer_styles' ) ) {
	/**
	 * Enqueue supplemental block editor styles
	 */
	function mediclinic_mikado_enqueue_editor_customizer_styles() {
		wp_enqueue_style( 'mediclinic-mikado-admin-styles', MIKADO_FRAMEWORK_ADMIN_ASSETS_ROOT . '/css/mkdf-modules-admin.css' );
		wp_enqueue_style( 'mediclinic-mikado-editor-customizer-styles', MIKADO_FRAMEWORK_ADMIN_ASSETS_ROOT . '/css/editor-customizer-style.css' );
	}

	// add google font
	add_action( 'enqueue_block_editor_assets', 'mediclinic_mikado_google_fonts_styles' );
	// add action
	add_action( 'enqueue_block_editor_assets', 'mediclinic_mikado_enqueue_editor_customizer_styles' );
}