<?php

function kb_admin_style() {
   wp_enqueue_style('admin-styles', get_template_directory_uri().'/style-admin.css');
}

add_action('admin_enqueue_scripts', 'kb_admin_style');

function admin_js() { ?>
    <script type="text/javascript">

        jQuery(document).ready( function () { 
           jQuery(".pods-form-ui-row-name-disclaimer .pods-submittable-fields .pods-field").attr('id', 'disclaimer');
           jQuery(".pods-form-ui-row-name-disclaimer .pods-submittable-fields p.description").attr('id', 'desc');
           jQuery(".pods-form-ui-row-name-disclaimer .pods-submittable-fields .pods-field").insertAfter('.pods-form-ui-row-name-disclaimer .pods-submittable-fields p.description');
           jQuery('.pods-form-ui-row-name-disclaimer .pods-submittable-fields p.description').css('background-color', 'aliceblue');
            
           jQuery(".pods-form-ui-row-name-disclaimer-2 .pods-submittable-fields .pods-field").attr('id', 'disclaimer-2');
           jQuery(".pods-form-ui-row-name-disclaimer-2 .pods-submittable-fields p.description").attr('id', 'desc-2');
           jQuery("#disclaimer-2").insertAfter('#desc-2');
           jQuery('#desc-2').css('background-color', 'aliceblue');
            
            
           jQuery(".pods-form-ui-row-name-disclaimer-3 .pods-submittable-fields .pods-field").attr('id', 'disclaimer-3');
           jQuery(".pods-form-ui-row-name-disclaimer-3 .pods-submittable-fields p.description").attr('id', 'desc-3');
           jQuery("#disclaimer-3").insertAfter('#desc-3');
           jQuery('#desc-3').css('background-color', 'aliceblue');
            
            
           jQuery('.pods-form-ui-comment-pods-meta-wichtige-informationen').attr('id', 'imp_information');
           jQuery('#imp_information').css('font-weight', 'bold');
           jQuery('#imp_information').css('font-style', 'normal');
            
        
           //jQuery(".pods-form-ui-comment-pods-meta-disclaimer").insertAfter(".pods-field");
        });

    </script>
<?php }
add_action('admin_head', 'admin_js');



/**
 * julia functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package julia
 */

if ( ! function_exists( 'julia_kaya_setup' ) ) :

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */


function julia_kaya_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on julia, use a find and replace
	 * to change 'julia' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'julia', get_parent_theme_file_path( '/languages' ) );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'julia' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	/**
	 * Add logo to custimizer
	 */
	add_theme_support( 'custom-logo' );

	// Adding support for core block visual styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'kaya_vocal_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_editor_style( 'css/editor-style.css' );
	the_post_thumbnail();
	add_theme_support( 'woocommerce' );
}
endif;
add_action( 'after_setup_theme', 'julia_kaya_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function julia_kaya_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'julia_kaya_content_width', 640 );
}
add_action( 'after_setup_theme', 'julia_kaya_content_width', 0 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function julia_kaya_widgets_init_kaya_content_width() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'julia' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'julia' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'julia_kaya_widgets_init_kaya_content_width' );


/** Remove List view

*/
add_action('admin_init', function() {
    $_GET['mode'] = 'grid';
}, 100);

add_action('admin_head', function() {

    ?>

    <style type="text/css">
        .view-switch .view-list {
            display: none;
        }
    <style>

    <?php

});




/**
 * Register top search area widgetized areas.
 *
 */
function julia_kaya_client_form_widget_area() {

	register_sidebar( array(
		'name'          => 'Single Page Client Form',
		'id'            => 'client_form_widget_area',
		'description'   => esc_html__( 'Add widgets here.', 'julia' ),
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'julia_kaya_client_form_widget_area' );

/**
 * Tag Cloud Widget Area
 *
 */
function julia_kaya_tag_cloud_widget_area() {

	register_sidebar( array(
		'name'          => 'Tag Cloud Widget Area',
		'id'            => 'tag_cloud_widget_area',
		'description'   => esc_html__( 'Add widgets here.', 'julia' ),
		'before_widget' => '<div class="tag-cloud">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'julia_kaya_tag_cloud_widget_area' );

function julia_kaya_shortlist_widget_area() {

	register_sidebar( array(
		'name'          => 'Shortlist Widget Area',
		'id'            => 'shortlist_widget_area',
		'description'   => esc_html__( 'Add widgets here.', 'julia' ),
		'before_widget' => null,
		'after_widget'  => null,
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'julia_kaya_shortlist_widget_area' );
/**
 * Removes Type Errors,Script errors
  */
add_action('wp_loaded', 'output_buffer_start');
function output_buffer_start() { 
    ob_start("output_callback"); 
}

function output_callback($buffer) {
    return preg_replace( "%[ ]type=[\'\"]text\/(javascript|css)[\'\"]%", '', $buffer );
}

/**
 * Tags
 *
 */
function support_for_custom_post_types_tags( $query ) {
if( is_tag() && $query->is_main_query() ) {

    // this gets all post types:
    $post_types = get_post_types();

    $query->set( 'post_type', $post_types );
}
}
add_filter( 'pre_get_posts', 'support_for_custom_post_types_tags' );

/**
 * Shortlist Style
 */
add_action('init', 'kaya_remove_shortlist_funtion');
function kaya_remove_shortlist_funtion() {
    remove_filter( 'wp_nav_menu_items', 'kaya_pods_cpt_shortlist_menu_pagelink', 199);
}

/**
 * Register top search area widgetized areas.
 *
 */
function julia_kaya_top_search_widget_area() {

	register_sidebar( array(
		'name'          => esc_html__( 'Search Filter', 'julia' ),
		'id'            => 'search_filter',
		'description'   => esc_html__( 'Add widgets here.', 'julia' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'julia_kaya_top_search_widget_area' );


/**
 * Enqueue scripts and styles.
 */
function julia_julia_kaya_scripts() {
	//wp_enqueue_script('jquery');
	wp_enqueue_style( 'julia-style', get_stylesheet_uri() );
	wp_enqueue_style( 'font-awesome', get_theme_file_uri( '/css/font-awesome.min.css' ) );
	wp_enqueue_style( 'julia-menu', get_theme_file_uri( '/css/smart-menu.css'));
	wp_enqueue_style( 'julia-layout', get_theme_file_uri( '/css/layout.css'));
	wp_enqueue_style( 'julia-theme-responsive', get_theme_file_uri( '/css/responsive.css'));
	wp_enqueue_style( 'julia-woocommerce', get_theme_file_uri( '/css/kaya-woocommerce.css'));
	//wp_enqueue_style( 'owl.carousel', get_theme_file_uri( '/css/owl.carousel.css') );

	wp_enqueue_script( 'smartmenus.min', get_theme_file_uri( '/js/jquery.smartmenus.min.js'), array('jquery'), '', true );
	//wp_enqueue_script( 'owl.carousel', get_theme_file_uri( '/js/owl.carousel.js'), array('jquery'), '', true );
	
	wp_enqueue_script( 'julia-navigation', get_theme_file_uri( '/js/navigation.js'), array('jquery'), '20151215', true );
	wp_enqueue_script( 'julia-skip-link-focus-fix', get_theme_file_uri( '/js/skip-link-focus-fix.js'), array('jquery'), '20151215', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'julia-custom', get_theme_file_uri( '/js/custom.js' ), array('jquery'), '', true );
	wp_enqueue_script( 'lazy', get_theme_file_uri( '/js/jquery.lazy.min.js' ), array('jquery'), '', true );
}
add_action( 'wp_enqueue_scripts', 'julia_julia_kaya_scripts' );

/**
 * Admin Enqueue scripts and styles.
 */
function julia_kaya_admin_scripts() {
	wp_enqueue_style( 'julia-customizer', get_theme_file_uri( '/css/customizer.css'), array(), '', false );
	wp_enqueue_script( 'kaya_custommeta', get_theme_file_uri( '/js/kaya_custommeta.js'), array(), false, true );
}
add_action( 'admin_enqueue_scripts', 'julia_kaya_admin_scripts' );

/**
 * Enqueue Customizer scripts.
 */
function julia_kaya_customize_controls_enqueue_script(){
	wp_enqueue_script( 'custom-customize', get_theme_file_uri( '/js/theme-customizer.js'), array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_print_footer_scripts', 'julia_kaya_customize_controls_enqueue_script',1 );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path('/inc/custom-header.php');

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Custom functions that act independently of the theme templates.
 */
require get_parent_theme_file_path('/inc/extras.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );
require get_parent_theme_file_path( '/inc/customizer/customizer.php' );
require get_parent_theme_file_path( '/inc/customizer/customizer-styles.php' );

/**
 * Page / Post Meta options
 */
require get_parent_theme_file_path( '/inc/meta-boxes.php' );

/**
 * Load Jetpack compatibility file.
 */
require get_parent_theme_file_path( '/inc/jetpack.php' );
/**
 * Get all custom functions like page title, logo, menu...
 */
require get_parent_theme_file_path( '/inc/functions.php' );

/**
 * Export sidebar options data
 */
require get_template_directory() . '/inc/widget-sidebar-data-export.php';
/**
 * Onclick demo importer
 */
require get_template_directory() . '/inc/oneclick-demo-installer.php';

/**
 * Image Resizer Functionality
 */
require get_parent_theme_file_path( '/inc/mr-image-resize.php' );

/**
 *  Include Theme Rquired Plugins
 */
require get_parent_theme_file_path( '/inc/class-tgm-plugin-activation.php' );

add_action( 'tgmpa_register', 'julia_kaya_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function julia_kaya_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		array(
            'name'      => __('Elementor – The most advanced frontend drag & drop page builder.', 'julia'),
            'slug'      => 'elementor',
            'required'  => true,
        ),
         array(
            'name'      => __('Elementor Header Footer', 'julia'),
            'slug'      => 'header-footer-elementor',
            'required'  => true,
        ),
        array(
            'name'      => __('AnyWhere Elementor', 'julia'),
            'slug'      => 'anywhere-elementor',
            'required'  => true,
        ),
        array(
            'name'      => __('Admin Columns', 'julia'),
            'slug'      => 'codepress-admin-columns',
            'required'  => true,
        ), 
        array(
            'name'      => __('Pods – Custom Content Types and Fields', 'julia'),
            'slug'      => 'pods',
            'required'  => true,
        ),
        array(
            'name'      => __('PhotoSwipe', 'julia'),
            'slug'      => 'photo-swipe',
            'required'  => true,
        ),
        array(
            'name'      => __('Caldera Forms – More Than Contact Forms', 'julia'),
            'slug'      => 'caldera-forms',
            'required'  => true,
        ),  
		array(
		        'name'                  => __('Pods Post Display','julia'),
		        'slug'                  => 'pods-post-display',
		        'source'                => 'http://kayapati.com/pods-plugins/pods-post-display.zip',
		        'required'              => true,
		        'force_activation'      => false,
		        'force_deactivation'    => false,
		        'external_url'          => '',
		    ),
		// Pods Post Shortlist
		array(
		        'name'                  => __('Pods Post Shortlist','julia'),
		        'slug'                  => 'pods-post-shortlist',
		        'source'                =>  'http://kayapati.com/pods-plugins/pods-post-shortlist.zip',
		        'required'              => true,
		        'force_activation'      => false,
		        'force_deactivation'    => false,
		        'external_url'          => '',
		    ),
		// Pods Post Access Manager
		array(
		        'name'                  => __('Pods Post Access Manager','julia'),
		        'slug'                  => 'pods-cpt-post-access-manager',
		        'source'                =>  'http://kayapati.com/pods-plugins/pods-cpt-post-access-manager.zip',
		        'required'              => true,
		        'force_activation'      => false,
		        'force_deactivation'    => false,
		        'external_url'          => '',
		    ),
		array(
            'name'      => esc_html__('One Click Demo Import', 'julia'),
            'slug'      => 'one-click-demo-import',
            'required'  => true,
        ),
        array(
		        'name'                  => __('Pods Data Importer','julia'),
		        'slug'                  => 'pods-data-importer',
		        'source'                => 'http://kayapati.com/pods-plugins/pods-data-importer.zip',
		        'required'              => true,
		        'force_activation'      => false,
		        'force_deactivation'    => false,
		        'external_url'          => '',
		    ),
	   // Compcard
		array(
		        'name'                  => __('Compcard','julia'),
		        'slug'                  => 'pods-compcard',
		        'source'                =>  'http://kayapati.com/pods-plugins/pods-compcard.zip',
		        'required'              => true,
		        'force_activation'      => false,
		        'force_deactivation'    => false,
		        'external_url'          => '',
		    ),
			// Elementor - Kaya Widgets
		array(
		        'name'                  => __('Elementor - Kaya Widgets','julia'),
		        'slug'                  => 'pods-cpt-post-access-manager',
		        'source'                =>  'http://www.kayapati.com/pods-plugins/elementor-kaya-widgets.zip',
		        'required'              => true,
		        'force_activation'      => false,
		        'force_deactivation'    => false,
		        'external_url'          => '',
		    ),
		//Paif Memberships Pro
			array(
                'name'      => __('Paid Memberships Pro', 'julia'),
                'slug'      => 'paid-memberships-pro',
                'required'  => true,
            ),

		// Ultimate Memeber
		array(
		        'name'                  => __('Ultimate Memeber','julia'),
		        'slug'                  => 'ultimate-member',
		        'required'              => true,
		    ),
		array(
                'name'      => __('Notification', 'julia'),
                'slug'      => 'notification',
                'required'  => true,
            ),
		array(
                'name'      => __('Smart Slider 3', 'julia'),
                'slug'      => 'smart-slider-3',
                'required'  => true,
            ),
		array(
                'name'      => __('Capability Manager Enhanced', 'julia'),
                'slug'      => 'capability-manager-enhanced',
                'required'  => true,
            ),
       
	);


	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'julia',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		
		'strings'      => array(
			'page_title'                      => esc_html__( 'Install Required Plugins', 'julia' ),
			'menu_title'                      => esc_html__( 'Install Plugins', 'julia' ),
			/* translators: %s: plugin name. */
			'installing'                      => __( 'Installing Plugin: %s', 'julia' ),
			/* translators: %s: plugin name. */
			'updating'                        => __( 'Updating Plugin: %s', 'julia' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'julia' ),
			/* translators: 1: plugin name(s). */
			'notice_can_install_required'     => _n_noop(
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'julia'
			),
			/* translators: 1: plugin name(s). */
			'notice_can_install_recommended'  => _n_noop(
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'julia'
			),
			/* translators: 1: plugin name(s). */
			'notice_ask_to_update'            => _n_noop(
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'julia'
			),
			/* translators: 1: plugin name(s). */
			'notice_ask_to_update_maybe'      => _n_noop(
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'julia'
			),
			/* translators: 1: plugin name(s). */
			'notice_can_activate_required'    => _n_noop(
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'julia'
			),
			/* translators: 1: plugin name(s). */
			'notice_can_activate_recommended' => _n_noop(
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'julia'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'julia'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'julia'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'julia'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'julia' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'julia' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'julia' ),
			/* translators: 1: plugin name. */
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'julia' ),
			/* translators: 1: plugin name. */
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'julia' ),
			/* translators: 1: dashboard link. */
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'julia' ),
			'dismiss'                         => __( 'Dismiss this notice', 'julia' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'julia' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'julia' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
	);

	tgmpa( $plugins, $config );
}

add_action( 'after_setup_theme',  'julia_kaya_theme_setup' );
function  julia_kaya_theme_setup() {
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}

/**
 * Header & Footer Compatability
 */
function julia_kaya_header_footer_elementor_support() {
	add_theme_support( 'header-footer-elementor' );
}
add_action( 'after_setup_theme', 'julia_kaya_header_footer_elementor_support' );

// Install Pods Components 
if(class_exists('PodsInit')){
	function julia_kaya_enable_pods_componets() {
		$component_settings = PodsInit::$components->settings;
		$component_settings['components']['table-storage'] = array();
		$component_settings['components']['advanced-relationships'] = array();
		$component_settings['components']['migrate-packages'] = array();
		$component_settings['components']['advanced-content-types'] = array();
		update_option( 'pods_component_settings', json_encode($component_settings));
	}
	julia_kaya_enable_pods_componets();
}

/**
 * Gutenberg Compatability
 */
if ( !defined('gutenberg') ){
	return;
}

function julia_kaya_more_link($more_link, $more_link_text) {
	return str_replace($more_link_text, esc_html__('Continue Reading &rarr;', 'julia'), $more_link);
}
add_filter('the_content_more_link', 'julia_kaya_more_link', 10, 2);


/* Login Logo */
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/site-login-logo.png);
		height:65px;
		width:320px;
		background-size: 320px 65px;
		background-repeat: no-repeat;
        	padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

?>

