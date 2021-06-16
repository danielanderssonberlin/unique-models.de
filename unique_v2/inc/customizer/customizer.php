<?php
/**
 * julia Theme Customizer
 *
 * @package julia
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

get_template_part( 'inc/customizer/customizer-controles');
get_template_part( 'inc/customizer/customize-import-export-settings');

/**
 * Remove wordpress default panels and sections from theme customizer
 */
add_action( "customize_register", "julia_kaya_remove_control" );
function julia_kaya_remove_control( $wp_customize ) {
	$wp_customize->remove_control("header_image");
	$wp_customize->remove_section("colors");
	$wp_customize->remove_section("background_image");
	$wp_customize->remove_section("static_front_page");
	$wp_customize->remove_control('display_header_text');
}

/**
 * Change default wordpress "site identity" section name our our new name
 */
function julia_kaya_change_default_logo_title( $wp_customize ) {
    $wp_customize->get_section( 'title_tagline' )->title = esc_html__('Header Settings', 'julia');
}
add_action( 'customize_register', 'julia_kaya_change_default_logo_title', 1000 );

/**
 * Header Section 
 */
add_action( 'customize_register', 'julia_kaya_header_customize_register' );
function julia_kaya_header_customize_register($wp_customize) {
	$wp_customize->add_panel( 'kaya_header_panel_section', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => esc_html__('Header Section', 'julia'),
	) );
	$wp_customize->add_section( 'title_tagline', array(
		'panel'		=> 'kaya_header_panel_section',
	    'title'     => esc_html__( 'Header Settings', 'julia' ),
	    'priority'  => 1,
	));
	$wp_customize->add_setting( 'header_bg_color' , array(
	    'default'     => '#fff',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_bg_color', array(
		'label'        => esc_html__( 'Header Background Color', 'julia' ),
		'section'    => 'title_tagline',
		'settings'   => 'header_bg_color',
		'priority'  => 0,
	) ) );
	$wp_customize->add_setting( 'choose_logo', array(
	    'default'        => 'img_logo',
	    'capability'     => 'edit_theme_options',
	     'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );
	$wp_customize->add_control('choose_logo', array(
	    'label'    => esc_html__( 'Choose Logo', 'julia' ),
	    'section'  => 'title_tagline',
	    'settings' => 'choose_logo',
	    'type' => 'select',
	    'choices' => array(
	    		'img_logo' => esc_html__('Image Logo', 'julia'),
	    		'text_logo' => esc_html__('Text Logo', 'julia'),
	    	),
	    'priority' => '1'
	) );
	// Upload header Logo Image


	// Text Logo Colors
	$wp_customize->add_setting( 'text_logo_color' , array(
	    'default'     => '#353535',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'text_logo_color', array(
		'label'        => esc_html__( 'Site Title color', 'julia' ),
		'section'    => 'title_tagline',
		'settings'   => 'text_logo_color',
	) ) );

	$wp_customize->add_setting( 'text_logo_tagline_color' , array(
	    'default'     => '#757575',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'text_logo_tagline_color', array(
		'label'        => esc_html__( 'Tag Line color', 'julia' ),
		'section'    => 'title_tagline',
		'settings'   => 'text_logo_tagline_color',
	) ) );
}

/**
 * Menu Section 
 */
add_action( 'customize_register', 'julia_kaya_menu_customize_register' );
function julia_kaya_menu_customize_register($wp_customize) {
	$wp_customize->add_section( 'kaya_menu_section', array(
		'panel'		=> 'kaya_header_panel_section',
	    'title'     => esc_html__( 'Menu Settings', 'julia' ),
	    'priority'  => 35,
	));
	$wp_customize->add_setting( 'menu_link_color' , array(
	    'default'     => '#000',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_link_color', array(
		'label'        => esc_html__( 'Menu Links color', 'julia' ),
		'section'    => 'kaya_menu_section',
		'settings'   => 'menu_link_color',
	) ) );

	$wp_customize->add_setting( 'menu_link_hover_color' , array(
	    'default'     => '#ff3333',
	   'transport'   => 'postMessage',
	    'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_link_hover_color', array(
		'label'        => esc_html__( 'Menu Links Hover color', 'julia' ),
		'section'    => 'kaya_menu_section',
		'settings'   => 'menu_link_hover_color',
	) ) );
	
	$wp_customize->add_setting( 'menu_active_link_color' , array(
	    'default'     => '#ff3333',
	   'transport'   => 'postMessage',
	    'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_active_link_color', array(
		'label'        => esc_html__( 'Menu Links Active color', 'julia' ),
		'section'    => 'kaya_menu_section',
		'settings'   => 'menu_active_link_color',
	) ) );


	$wp_customize->add_setting( 'menu_active_link_icon_color' , array(
	    'default'     => '#000000',
	   'transport'   => 'postMessage',
	    'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'child_menu_bg_color' , array(
	    'default'     => '#ff3333',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'child_menu_bg_color', array(
		'label'        => esc_html__( 'Child Menu Background color', 'julia' ),
		'section'    => 'kaya_menu_section',
		'settings'   => 'child_menu_bg_color',
	) ) );
	$wp_customize->add_setting( 'child_menu_link_color' , array(
	    'default'     => '#fff',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'child_menu_link_color', array(
		'label'        => esc_html__( 'Child Menu links color', 'julia' ),
		'section'    => 'kaya_menu_section',
		'settings'   => 'child_menu_link_color',
	) ) );
	$wp_customize->add_setting( 'child_menu_hover_bg_color' , array(
	    'default'     => '#ff0000',
	   'transport'   => 'postMessage',
	    'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'child_menu_hover_bg_color', array(
		'label'        => esc_html__( 'Child Menu Hover Background color', 'julia' ),
		'section'    => 'kaya_menu_section',
		'settings'   => 'child_menu_hover_bg_color',
	) ) );
	
	$wp_customize->add_setting( 'child_menu_link_hover_color' , array(
	    'default'     => '#fff',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'child_menu_link_hover_color', array(
		'label'        => esc_html__( 'Child Menu Links Hover color', 'julia' ),
		'section'    => 'kaya_menu_section',
		'settings'   => 'child_menu_link_hover_color',
	) ) );	

	$wp_customize->add_setting( 'child_menu_active_bg_color' , array(
	    'default'     => '#ff0000',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'child_menu_active_bg_color', array(
		'label'        => esc_html__( 'Child Menu Active Background color', 'julia' ),
		'section'    => 'kaya_menu_section',
		'settings'   => 'child_menu_active_bg_color',
	) ) );
	
	$wp_customize->add_setting( 'child_menu_active_link_color' , array(
	    'default'     => '#fff',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'child_menu_active_link_color', array(
		'label'        => esc_html__( 'Child Menu Active Link color', 'julia' ),
		'section'    => 'kaya_menu_section',
		'settings'   => 'child_menu_active_link_color',
	) ) );
	$wp_customize->add_setting( 'child_menu_border_bottom_color' , array(
	    'default'     => '#ff3333',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'child_menu_border_bottom_color', array(
		'label'        => esc_html__( 'Child Menu Border Bottom color', 'julia' ),
		'section'    => 'kaya_menu_section',
		'settings'   => 'child_menu_border_bottom_color',
	) ) );
	$wp_customize->add_setting( 'search_toggle_bar_BG_color' , array(
	    'default'     => '#ff3333',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'search_toggle_bar_BG_color', array(
		'label'        => esc_html__( 'Search Togglebar BG Color', 'julia' ),
		'section'    => 'kaya_menu_section',
		'settings'   => 'search_toggle_bar_BG_color',
	) ) );
	$wp_customize->add_setting( 'search_toggle_bar_icon_color' , array(
	    'default'     => '#fff',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'search_toggle_bar_icon_color', array(
		'label'        => esc_html__( 'Search Togglebar Icon Color', 'julia' ),
		'section'    => 'kaya_menu_section',
		'settings'   => 'search_toggle_bar_icon_color',
	) ) );
}

		
/**
 * Page Section
 */
add_action( 'customize_register', 'julia_kaya_page_customize_register' );
function julia_kaya_page_customize_register($wp_customize) {
	
	$wp_customize->add_panel( 'kaya_page_panel_section', array(
		'priority'       => 20,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => esc_html__('Page Section', 'julia'),
	) );

	$wp_customize->add_section( 'kaya_page_section', array(
		'panel'		=> 'kaya_page_panel_section',
	    'title'     => esc_html__( 'Page Titlebar Settings', 'julia' ),
	    'priority'  => 35,
	));

		// Upload header Logo Image
	$wp_customize->add_setting( 'page_titlebar_bg_color' , array(
	    'default'     => '#dedede',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'page_titlebar_bg_color', array(
		'label'        => esc_html__( 'Page Titlebar BG Color', 'julia' ),
		'section'    => 'kaya_page_section',
		'settings'   => 'page_titlebar_bg_color',
	) ) );
	$wp_customize->add_setting( 'page_titlebar_color' , array(
	    'default'     => '#353535',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'page_titlebar_color', array(
		'label'        => esc_html__( 'Page Titlebar Title color', 'julia' ),
		'section'    => 'kaya_page_section',
		'settings'   => 'page_titlebar_color',
	) ) );

	 $wp_customize->add_setting( 'page_titlebar_font_size' , array(
        'default'     => '28',
        'transport'   => 'postMessage',
         'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );

 	$wp_customize->add_control( new julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'page_titlebar_font_size', array(
		'label'   => esc_html__('Page Titlebar Font Size','julia'),
		'section' => 'kaya_page_section',
		'settings'    => 'page_titlebar_font_size',
		'choices'  => array(
			'min'  => 10,
			'max'  => 80,
			'step' => 1
		),
	)));

    $wp_customize->add_setting( 'bread_crumb_font_size' , array(
        'default'     => '15',
        'transport'   => 'postMessage',
         'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );
    $wp_customize->add_control( new julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'bread_crumb_font_size', array(
        'label'        => esc_html__( 'Bread Crumb Font Size', 'julia' ),
        'section'    => 'kaya_page_section',
        'settings'   => 'bread_crumb_font_size',
        'choices'	=> array(
        	'min'	=> 10,
        	'max'	=> 80,
        	'step'	=> 1
        ),
    ) ) );

    $wp_customize->add_setting( 'bread_crumb_link_color' , array(
	    'default'     => '#000000',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bread_crumb_link_color', array(
		'label'        => esc_html__( 'Page Titlebar Link color', 'julia' ),
		'section'    => 'kaya_page_section',
		'settings'   => 'bread_crumb_link_color',
	) ) );


	$wp_customize->add_setting( 'page_titlebar_padding_tb' , array(
        'default'     => '30',
        'transport'   => 'postMessage',
         'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );
    $wp_customize->add_control( new julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'page_titlebar_padding_tb', array(
        'label'        => esc_html__( 'Page Titlebar Padding', 'julia' ),
        'section'    => 'kaya_page_section',
        'settings'   => 'page_titlebar_padding_tb',
        'choices'	=> array(
        	'min'	=> 10,
        	'max'	=> 80,
        	'step'	=> 1
        ),
    ) ) );

    $wp_customize->add_setting( 'title_position', array(
        'default' => 'left',
        'transport' => 'postMessage',
       'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control('title_position', array(
        'type' => 'select',
        'label' => esc_html__('Page Title Position','julia'),
        'section' => 'kaya_page_section',
        'choices' => array(
        		'left' => esc_html__('Left', 'julia'),
        		'center' => esc_html__('Center', 'julia'),
        		'right' => esc_html__('Right', 'julia'),
        	),
		'priority' => 80,
    ));
	
}

/**
 * Sidebar Color Settings
 */
add_action( 'customize_register', 'julia_kaya_sidebar_customize_register' );
function julia_kaya_sidebar_customize_register($wp_customize) {	
	$wp_customize->add_section( 'kaya_sidebar_section', array(
		'panel'		=> 'kaya_page_panel_section',
	    'title'     => esc_html__( 'Sidebar Content Settings', 'julia' ),
	    'priority'  => 35,
	));
	$wp_customize->add_setting( 'sidebar_default_search_btn_BG_color' , array(
	    'default'     => '#ff3333',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_default_search_btn_BG_color', array(
		'label'        => esc_html__( 'Search Button BG Color', 'julia' ),
		'section'    => 'kaya_sidebar_section',
		'settings'   => 'sidebar_default_search_btn_BG_color',
	) ) );
	$wp_customize->add_setting( 'sidebar_default_search_btn_color' , array(
	    'default'     => '#ffffff',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_default_search_btn_color', array(
		'label'        => esc_html__( 'Search Button Color', 'julia' ),
		'section'    => 'kaya_sidebar_section',
		'settings'   => 'sidebar_default_search_btn_color',
	) ) );
	$wp_customize->add_setting( 'sidebar_title_color' , array(
	    'default'     => '#353535',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_title_color', array(
		'label'        => esc_html__( 'Titles color', 'julia' ),
		'section'    => 'kaya_sidebar_section',
		'settings'   => 'sidebar_title_color',
	) ) );
	$wp_customize->add_setting( 'sidebar_title_border_color' , array(
	    'default'     => '#000000',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_title_border_color', array(
		'label'        => esc_html__( 'Title Border Color', 'julia' ),
		'section'    => 'kaya_sidebar_section',
		'settings'   => 'sidebar_title_border_color',
	) ) );
	$wp_customize->add_setting( 'sidebar_content_color' , array(
	    'default'     => '#787878',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_content_color', array(
		'label'        => esc_html__( 'Content color', 'julia' ),
		'section'    => 'kaya_sidebar_section',
		'settings'   => 'sidebar_content_color',
	) ) );

	$wp_customize->add_setting( 'sidebar_links_color' , array(
	    'default'     => '#ff3333',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_links_color', array(
		'label'        => esc_html__( 'Links color', 'julia' ),
		'section'    => 'kaya_sidebar_section',
		'settings'   => 'sidebar_links_color',
	) ) );

	$wp_customize->add_setting( 'sidebar_links_hover_color' , array(
	    'default'     => '#000000',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_links_hover_color', array(
		'label'        => esc_html__( 'Links Hover color', 'julia' ),
		'section'    => 'kaya_sidebar_section',
		'settings'   => 'sidebar_links_hover_color',
	) ) );

	$wp_customize->add_setting( 'sidebar_list_border_color' , array(
	    'default'     => '#e5e5e5',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_list_border_color', array(
		'label'        => esc_html__( 'List Border Color', 'julia' ),
		'section'    => 'kaya_sidebar_section',
		'settings'   => 'sidebar_list_border_color',
	) ) );
	$wp_customize->add_setting( 'sidebar_tagcloud_bg_color' , array(
	    'default'     => '#f9f9f9',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_tagcloud_bg_color', array(
		'label'        => esc_html__( 'Tag Cloud Bg Color', 'julia' ),
		'section'    => 'kaya_sidebar_section',
		'settings'   => 'sidebar_tagcloud_bg_color',
	) ) );
	$wp_customize->add_setting( 'sidebar_tagcloud_font_color' , array(
	    'default'     => '#353535',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_tagcloud_font_color', array(
		'label'        => esc_html__( 'Tag Cloud Font Color', 'julia' ),
		'section'    => 'kaya_sidebar_section',
		'settings'   => 'sidebar_tagcloud_font_color',
	) ) );

	$wp_customize->add_setting( 'sidebar_tagcloud_border_color' , array(
	    'default'     => '#eeeeee',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_tagcloud_border_color', array(
		'label'        => esc_html__( 'Tag Cloud Border Color', 'julia' ),
		'section'    => 'kaya_sidebar_section',
		'settings'   => 'sidebar_tagcloud_border_color',
	) ) );

	$wp_customize->add_setting( 'sidebar_tagcloud_hover_bg_color' , array(
	    'default'     => '#ff3333',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_tagcloud_hover_bg_color', array(
		'label'        => esc_html__( 'Tag Cloud Hover Bg Color', 'julia' ),
		'section'    => 'kaya_sidebar_section',
		'settings'   => 'sidebar_tagcloud_hover_bg_color',
	) ) );

	$wp_customize->add_setting( 'sidebar_tagcloud_hover_font_color' , array(
	    'default'     => '#ffffff',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_tagcloud_hover_font_color', array(
		'label'        => esc_html__( 'Tag Cloud Hover Font Color', 'julia' ),
		'section'    => 'kaya_sidebar_section',
		'settings'   => 'sidebar_tagcloud_hover_font_color',
	) ) );

	$wp_customize->add_setting( 'sidebar_tagcloud_hover_border_color' , array(
	    'default'     => '#ff3333',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_tagcloud_hover_border_color', array(
		'label'        => esc_html__( 'Tag Cloud Hover Border Color', 'julia' ),
		'section'    => 'kaya_sidebar_section',
		'settings'   => 'sidebar_tagcloud_hover_border_color',
	) ) );
}

/**
 * Talent Single Page Tabs Color Settings
 */
add_action( 'customize_register', 'julia_kaya_single_page_tabs_customize_register' );
function julia_kaya_single_page_tabs_customize_register($wp_customize) {	
	$wp_customize->add_section( 'kaya_single_page_section', array(
		'panel'		=> 'kaya_page_panel_section',
	    'title'     => esc_html__( 'Single Page Settings', 'julia' ),
	    'priority'  => 36,
	));
	$wp_customize->add_setting( 'single_page_tabs_active_font_title', array(
			'sanitize_callback' => 'text_filed_sanitize',
		) );
    $wp_customize->add_control(new julia_Kaya_Customize_Subtitle_control( $wp_customize, 'single_page_tabs_active_font_title', array(
	    'label'    => __( 'Tabs Active Color Settings', 'julia' ),
	    'section'  => 'kaya_single_page_section',
	    'settings' => 'single_page_tabs_active_font_title',
    )));
	$wp_customize->add_setting( 'single_page_tabs_active_BG_color' , array(
	    'default'     => '#ff3333',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'single_page_tabs_active_BG_color', array(
		'label'        => esc_html__( 'Tabs Active BG color', 'julia' ),
		'section'    => 'kaya_single_page_section',
		'settings'   => 'single_page_tabs_active_BG_color',
	) ) );
	$wp_customize->add_setting( 'single_page_tabs_active_color' , array(
	    'default'     => '#fff',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'single_page_tabs_active_color', array(
		'label'        => esc_html__( 'Tabs Active color', 'julia' ),
		'section'    => 'kaya_single_page_section',
		'settings'   => 'single_page_tabs_active_color',
	) ) );
	$wp_customize->add_setting( 'single_page_tabs_active_border_color' , array(
	    'default'     => '#ff3333',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'single_page_tabs_active_border_color', array(
		'label'        => esc_html__( 'Tabs Active Border color', 'julia' ),
		'section'    => 'kaya_single_page_section',
		'settings'   => 'single_page_tabs_active_border_color',
	) ) );

	$wp_customize->add_setting( 'single_page_tab_color_font_title', array(
			'sanitize_callback' => 'text_filed_sanitize',
		) );
    $wp_customize->add_control(new julia_Kaya_Customize_Subtitle_control( $wp_customize, 'single_page_tab_color_font_title', array(
	    'label'    => __( 'Tabs Color Settings', 'julia' ),
	    'section'  => 'kaya_single_page_section',
	    'settings' => 'single_page_tab_color_font_title',
    )));

    $wp_customize->add_setting( 'single_page_tabs_BG_color' , array(
	    'default'     => '#f2f2f2',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'single_page_tabs_BG_color', array(
		'label'        => esc_html__( 'Tabs BG Color', 'julia' ),
		'section'    => 'kaya_single_page_section',
		'settings'   => 'single_page_tabs_BG_color',
	) ) );
	$wp_customize->add_setting( 'single_page_tabs_color' , array(
	    'default'     => '#7a7a7a',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'single_page_tabs_color', array(
		'label'        => esc_html__( 'Tabs Color', 'julia' ),
		'section'    => 'kaya_single_page_section',
		'settings'   => 'single_page_tabs_color',
	) ) );
	$wp_customize->add_setting( 'single_page_post_title_color' , array(
	    'default'     => '#353535',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'single_page_post_title_color', array(
		'label'        => esc_html__( 'Post Title Color', 'julia' ),
		'section'    => 'kaya_single_page_section',
		'settings'   => 'single_page_post_title_color',
	) ) );
	$wp_customize->add_setting( 'single_page_category_link_color' , array(
	    'default'     => '#ff3333',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'single_page_category_link_color', array(
		'label'        => esc_html__( 'Post Category Link Color', 'julia' ),
		'section'    => 'kaya_single_page_section',
		'settings'   => 'single_page_category_link_color',
	) ) );
	$wp_customize->add_setting( 'single_page_tabs_border_color' , array(
	    'default'     => '#e5e5e5',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'single_page_tabs_border_color', array(
		'label'        => esc_html__( 'Tabs Border Color', 'julia' ),
		'section'    => 'kaya_single_page_section',
		'settings'   => 'single_page_tabs_border_color',
	) ) );
	$wp_customize->add_setting( 'single_page_tabs_border_bottom_color' , array(
	    'default'     => '#ff3333',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'single_page_tabs_border_bottom_color', array(
		'label'        => esc_html__( 'Tabs Border Bottom Color', 'julia' ),
		'section'    => 'kaya_single_page_section',
		'settings'   => 'single_page_tabs_border_bottom_color',
	) ) );
	$wp_customize->add_setting( 'shortlist_tab_BG_color' , array(
	    'default'     => '#f2f2f2',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'shortlist_tab_BG_color', array(
		'label'        => esc_html__( 'Shortlist Tab BG Color', 'julia' ),
		'section'    => 'kaya_single_page_section',
		'settings'   => 'shortlist_tab_BG_color',
	) ) );
	$wp_customize->add_setting( 'shortlist_tab_color' , array(
	    'default'     => '#000',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'shortlist_tab_color', array(
		'label'        => esc_html__( 'Shortlist Tab Color', 'julia' ),
		'section'    => 'kaya_single_page_section',
		'settings'   => 'shortlist_tab_color',
	) ) );
	$wp_customize->add_setting( 'shortlist_tab_border_color' , array(
	    'default'     => '#f2f2f2',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'shortlist_tab_border_color', array(
		'label'        => esc_html__( 'Shortlist Tab Border Color', 'julia' ),
		'section'    => 'kaya_single_page_section',
		'settings'   => 'shortlist_tab_border_color',
	) ) );
	$wp_customize->add_setting( 'compcard_tab_BG_color' , array(
	    'default'     => '#ff3333',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'compcard_tab_BG_color', array(
		'label'        => esc_html__( 'Compcard Tab BG Color', 'julia' ),
		'section'    => 'kaya_single_page_section',
		'settings'   => 'compcard_tab_BG_color',
	) ) );
	$wp_customize->add_setting( 'compcard_tab_color' , array(
	    'default'     => '#fff',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'compcard_tab_color', array(
		'label'        => esc_html__( 'Compcard Tab Color', 'julia' ),
		'section'    => 'kaya_single_page_section',
		'settings'   => 'compcard_tab_color',
	) ) );
	$wp_customize->add_setting( 'compcard_tab_border_color' , array(
	    'default'     => '#ff3333',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'compcard_tab_border_color', array(
		'label'        => esc_html__( 'Compcard Tab Border Color', 'julia' ),
		'section'    => 'kaya_single_page_section',
		'settings'   => 'compcard_tab_border_color',
	) ) );
}

/**
 * Talent Post Color Settings
 */
add_action( 'customize_register', 'julia_kaya_page_post_colors_customize_register' );
function julia_kaya_page_post_colors_customize_register($wp_customize) {	
	$wp_customize->add_section( 'kaya_talent_post_section', array(
		'panel'		=> 'kaya_page_panel_section',
	    'title'     => esc_html__( 'Talent Post Settings', 'julia' ),
	    'priority'  => 36,
	));
	$wp_customize->add_setting( 'talent_post_font_title', array(
			'sanitize_callback' => 'text_filed_sanitize',
		) );
    $wp_customize->add_control(new julia_Kaya_Customize_Subtitle_control( $wp_customize, 'talent_post_font_title', array(
	    'label'    => __( 'Post Color Settings', 'julia' ),
	    'section'  => 'kaya_talent_post_section',
	    'settings' => 'talent_post_font_title',
	    'priority' => '1',
    )));
    $wp_customize->add_setting( 'post_title_color' , array(
	    'default'     => '#000000',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'post_title_color', array(
		'label'        => esc_html__( 'Post Title Color', 'julia' ),
		'section'    => 'kaya_talent_post_section',
		'settings'   => 'post_title_color',
	) ) );

	$wp_customize->add_setting( 'post_title_hover_color' , array(
	    'default'     => '#ff3333',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'post_title_hover_color', array(
		'label'        => esc_html__( 'Post Title Hover Color', 'julia' ),
		'section'    => 'kaya_talent_post_section',
		'settings'   => 'post_title_hover_color',
	) ) );
	$wp_customize->add_setting( 'talent_post_image_font_title', array(
			'sanitize_callback' => 'text_filed_sanitize',
		) );
    $wp_customize->add_control(new julia_Kaya_Customize_Subtitle_control( $wp_customize, 'talent_post_image_font_title', array(
	    'label'    => __( 'Post Image Hover Color Settings', 'julia' ),
	    'section'  => 'kaya_talent_post_section',
	    'settings' => 'talent_post_image_font_title',
	    'priority' => '10',
    )));

    $wp_customize->add_setting( 'post_meta_fields_text_hover_color' , array(
	    'default'     => '#ffffff',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'post_meta_fields_text_hover_color', array(
		'label'        => esc_html__( 'Post Meta Data Text Hover Color', 'julia' ),
		'section'    => 'kaya_talent_post_section',
		'settings'   => 'post_meta_fields_text_hover_color',
	) ) );

	$wp_customize->add_setting( 'post_meta_fields_text_hover_BG_color' , array(
	    'default'     => '#ff3333',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'post_meta_fields_text_hover_BG_color', array(
		'label'        => esc_html__( 'Post Meta Data Hover BG Color', 'julia' ),
		'section'    => 'kaya_talent_post_section',
		'settings'   => 'post_meta_fields_text_hover_BG_color',
	) ) );
}
/**
 * Footer Section
 */
add_action( 'customize_register', 'julia_kaya_footer_customize_register' );
function julia_kaya_footer_customize_register($wp_customize) {
	
	$wp_customize->add_panel( 'kaya_footer_panel_section', array(
		'priority'       => 25,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => esc_html__('Footer Section', 'julia'),
	) );

		
}

/**
 * Page Footer
 */
add_action( 'customize_register', 'julia_kaya_page_footer' );
function julia_kaya_page_footer($wp_customize){

	$wp_customize->add_section( 'kaya_page_footer_section', array(
		//'panel'		=> 'kaya_footer_panel_section',
	    'title'     => esc_html__( 'Footer Settings', 'julia' ),
	    'priority'  => 35,
	));
    /** Footer **/
	$wp_customize->add_setting('footer_copy_rights', array(
		'sanitize_callback' => 'text_filed_sanitize',	
	));
	$wp_customize->add_control('footer_copy_rights', array(
		'section' => 'kaya_page_footer_section',
		'description' => '<strong style="color:#ff0000">'.__('Note', 'julia').': </strong>'.__('To customize footer, go to "Appearance > Header Footer Builder" and open footer page and make changes as per your requirements and save changes.','julia'),
		
	));
}
/**
 * Blog Page Settings
 */
add_action( 'customize_register', 'julia_kaya_blog_page_settings' );
function julia_kaya_blog_page_settings($wp_customize) {
  $wp_customize->add_section( 'kaya_blog_page_section', array(
      'title'     => esc_html__( 'Blog page', 'julia' ),
      'priority'  => 40,
  ));
  $wp_customize->add_setting( 'blog_page_post_limit' , array(
      'default'     => '10',
       'sanitize_callback' => 'wp_filter_nohtml_kses',
  ) );
  $wp_customize->add_control('blog_page_post_limit',
  array(
      'label' => esc_html__('Posts Limit','julia'),
       'section'  => 'kaya_blog_page_section',
      'type' => 'text',
      'priority' => 1,
  ));

  // Blog Page Sidebar Position
  $wp_customize->add_setting( 'blog_page_sidebar_position', array(
      'default' => 'right',
      'sanitize_callback' => 'wp_filter_nohtml_kses',
  ));
  $wp_customize->add_control('blog_page_sidebar_position', array(
      'type' => 'select',
      'label' => esc_html__('Blog Page Sidebar Position','julia'),
      'section' => 'kaya_blog_page_section',
      'choices' => array(
          'right' => esc_html__('Right', 'julia'),
          'left' => esc_html__('Left', 'julia'),
          'none' => esc_html__('None', 'julia'),
        ),
  'priority' => 2,
  ));

    // Blog Single Page Sidebar Position
  $wp_customize->add_setting( 'blog_single_page_sidebar_position', array(
      'default' => 'right',
      'sanitize_callback' => 'wp_filter_nohtml_kses',
  ));
  $wp_customize->add_control('blog_single_page_sidebar_position', array(
      'type' => 'select',
      'label' => esc_html__('Blog Single Page Sidebar Position','julia'),
      'section' => 'kaya_blog_page_section',
      'choices' => array(
          'right' => esc_html__('Right', 'julia'),
          'left' => esc_html__('Left', 'julia'),
          'none' => esc_html__('None', 'julia'),
        ),
  'priority' => 2,
  ));

}

/**
 * Layout Content
 */
add_action( 'customize_register', 'julia_kaya_layout_content_customize_register' );
function julia_kaya_layout_content_customize_register($wp_customize) {
	
	$wp_customize->add_section( 'layout_content_section', array(
		'panel'		=> 'global_panel_section',
	    'title'     => esc_html__( 'Layout Color Settings', 'julia' ),
	    'priority'  => 35,
	));
	
	$wp_customize->add_setting( 'page_mid_contant_bg_color' , array(
	    'default'     => '#fff',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'page_mid_contant_bg_color', array(
		'label'        => esc_html__( 'Background color', 'julia' ),
		'section'    => 'layout_content_section',
		'settings'   => 'page_mid_contant_bg_color',
	) ) );

	$wp_customize->add_setting( 'page_mid_content_title_color' , array(
	    'default'     => '#353535',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'page_mid_content_title_color', array(
		'label'        => esc_html__( 'Titles color', 'julia' ),
		'section'    => 'layout_content_section',
		'settings'   => 'page_mid_content_title_color',
	) ) );
	$wp_customize->add_setting( 'page_mid_content_color' , array(
	    'default'     => '#787878',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'page_mid_content_color', array(
		'label'        => esc_html__( 'Content color', 'julia' ),
		'section'    => 'layout_content_section',
		'settings'   => 'page_mid_content_color',
	) ) );
	$wp_customize->add_setting( 'page_mid_contant_links_color' , array(
	    'default'     => '#333',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'page_mid_contant_links_color', array(
		'label'        => esc_html__( 'Links color', 'julia' ),
		'section'    => 'layout_content_section',
		'settings'   => 'page_mid_contant_links_color',
	) ) );

	$wp_customize->add_setting( 'page_mid_contant_links_hover_color' , array(
	    'default'     => '#000000',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'page_mid_contant_links_hover_color', array(
		'label'        => esc_html__( 'Links Hover color', 'julia' ),
		'section'    => 'layout_content_section',
		'settings'   => 'page_mid_contant_links_hover_color',
	) ) );	
}

/**
 * Pagination
 */
add_action( 'customize_register', 'julia_kaya_pagination_customize_register' );
function julia_kaya_pagination_customize_register($wp_customize) {
	
	$wp_customize->add_section( 'pagination_section', array(
		'panel'		=> 'global_panel_section',
	    'title'     => esc_html__( 'Pagination Color Settings', 'julia' ),
	    'priority'  => 250,
	));
	
	$wp_customize->add_setting( 'pagination_bg_color' , array(
	    'default'     => '#e5e5e5',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pagination_bg_color', array(
		'label'        => esc_html__( 'Background color', 'julia' ),
		'section'    => 'pagination_section',
		'settings'   => 'pagination_bg_color',
	) ) );

	$wp_customize->add_setting( 'pagination_link_color' , array(
	    'default'     => '#353535',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pagination_link_color', array(
		'label'        => esc_html__( 'Link Color', 'julia' ),
		'section'    => 'pagination_section',
		'settings'   => 'pagination_link_color',
	) ) );
	$wp_customize->add_setting( 'pagination_active_bg_color' , array(
	    'default'     => '#353535',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pagination_active_bg_color', array(
		'label'        => esc_html__( 'Active BG color', 'julia' ),
		'section'    => 'pagination_section',
		'settings'   => 'pagination_active_bg_color',
	) ) );
	$wp_customize->add_setting( 'pagination_active_link_color' , array(
	    'default'     => '#ffffff',
	    'transport'   => 'postMessage',
	     'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pagination_active_link_color', array(
		'label'        => esc_html__( 'Active Link color', 'julia' ),
		'section'    => 'pagination_section',
		'settings'   => 'pagination_active_link_color',
	) ) );
	
}

// Typography
function julia_kaya_typography( $wp_customize ){
	$wp_customize->add_panel( 'global_panel_section', array(
	    'priority'       => 140,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '',
	  	'title' => esc_html__( 'Global Section', 'julia'),
	) );
	$wp_customize->add_section(
	// ID
	'typography_section',
	// Arguments array
	array(
		'title' => esc_html__( 'Google Font Family', 'julia'),
		'priority'       => 140,
		'capability' => 'edit_theme_options',
		'panel' => 'global_panel_section',
	));	
	$wp_customize->add_setting( 'google_body_font',  array( 
		'default' => 'Open Sans',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
	$wp_customize->add_control( new julia_Kaya_Customize_google_fonts_Control( $wp_customize, 'google_body_font', array(
		'label'   => esc_html__('Select font for Body','julia'),
		'section' => 'typography_section',
		'settings'    => 'google_body_font',
		'priority'    => 0,
	)));
 	$wp_customize->add_setting( 'google_heading_font', array(
 		'default' => '"Poppins", Sans-serif',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
 	$wp_customize->add_control( new julia_Kaya_Customize_google_fonts_Control( $wp_customize, 'google_heading_font', array(
		'label'   => esc_html__('Select font for Headings','julia'),
		'section' => 'typography_section',
		'settings'    => 'google_heading_font',
		'priority'    =>10,
	)));
	$wp_customize->add_setting( 'google_menu_font', array( 
		'default' => 'Open Sans',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
	$wp_customize->add_control( new julia_Kaya_Customize_google_fonts_Control( $wp_customize, 'google_menu_font', array(
		'label'   => esc_html__('Select font for Menu','julia'),
		'section' => 'typography_section',
		'settings'    => 'google_menu_font',
		'priority'    => 20,
	))); 
}
add_action( 'customize_register', 'julia_kaya_typography' );
/* --------------------------------------------
Typography
-----------------------------------------------*/
function julia_kaya_font_panel_section( $wp_customize ){
	$wp_customize->add_section(
	// ID
	'font-panel-section',
	// Arguments array
	array(
		'title' => esc_html__( 'Font Settings', 'julia'),
		'priority'       => 140,
		'capability' => 'edit_theme_options',
		'panel' => 'global_panel_section'
	));	
	$font_weight_names = array('normal' => 'Normal', 'bold' => 'Bold', 'lighter' => 'Lighter');	
	// Body Font Size
	$wp_customize->add_setting( 'body_font_title', array(
			'sanitize_callback' => 'text_filed_sanitize',
		) );
    $wp_customize->add_control(new julia_Kaya_Customize_Subtitle_control( $wp_customize, 'body_font_title', array(
	    'label'    => __( 'Body Font Settings', 'julia' ),
	    'section'  => 'font-panel-section',
	    'settings' => 'body_font_title',
	    'priority' => 2,
    )));
	$wp_customize->add_setting('body_font_size', array(
		'default' => '15',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
 	$wp_customize->add_control( new julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'body_font_size', array(
		'label'   => esc_html__('Body Font Size','julia'),
		'section' => 'font-panel-section',
		'settings'    => 'body_font_size',
		'priority'    => 3,
		'choices'  => array(
			'min'  => 10,
			'max'  => 50,
			'step' => 1
		),
	)));
	$wp_customize->add_setting('body_font_letter_space', array(
		'default' => '0',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
 	$wp_customize->add_control( new julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'body_font_letter_space', array(
		 'label'   => esc_html__('Body Font Letter Spacing','julia'),
		'section' => 'font-panel-section',
		'settings'    => 'body_font_letter_space',
		'priority'    => 4,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1
		),
	)));
	$wp_customize->add_setting( 'body_font_weight_bold', array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control('body_font_weight_bold', array(
        'type' => 'select',
        'label' => esc_html__('Select Body Font Weight','julia'),
        'section' => 'font-panel-section',
        'choices' => $font_weight_names,
		'priority' => 9,
    ));
	// Menu Font Size
	$wp_customize->add_setting( 'menu_title', array(
			'sanitize_callback' => 'text_filed_sanitize',
		) );
    $wp_customize->add_control(new julia_Kaya_Customize_Subtitle_control( $wp_customize, 'menu_title', array(
      'label'    => __( 'Menu Font Settings', 'julia' ),
      'section'  => 'font-panel-section',
      'settings' => 'menu_title',
    ))); 
	$wp_customize->add_setting('menu_font_size',array(
		'default' => '13',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
 	$wp_customize->add_control( new julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'menu_font_size', array(
		 'label'   => esc_html__('Menu Font Size','julia'),
		'section' => 'font-panel-section',
		'settings'    => 'menu_font_size',
		'priority'    => 11,
		'choices'  => array(
			'min'  => 10,
			'max'  => 50,
			'step' => 1
		),
	)));
 	$wp_customize->add_setting('menu_font_letter_space', array( 
 		'default' => '0',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
 	$wp_customize->add_control( new julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'menu_font_letter_space', array(
		 'label'   => esc_html__('Menu Font Letter Spacing','julia'),
		'section' => 'font-panel-section',
		'settings'    => 'menu_font_letter_space',
		'priority'    => 20,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1
		),
		)));
	$wp_customize->add_setting( 'menu_font_weight', array(
        'default' => 'normal',
        'transport' => 'postMessage',
       'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control('menu_font_weight', array(
        'type' => 'select',
        'label' => esc_html__('Select Menu Font Weight','julia'),
        'section' => 'font-panel-section',
        'choices' => $font_weight_names,
		'priority' => 21,
    ));
    $wp_customize->add_setting( 'main_menu_uppercase', array(
		'default'        => 0,
		//'type'           => 'option',
		'transport' => 'postMessage',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
		'capability'     => 'edit_theme_options' )
	);
	$wp_customize->add_control('main_menu_uppercase', array(
		'label'    => esc_html__( 'Enable Uppercase Letters ','julia'),
		'section'  => 'font-panel-section',
		'type'     => 'checkbox',
		'priority' => 22
	) );
    
	// Menu Font Size
	$wp_customize->add_setting( 'child_menu_title', array(
			'sanitize_callback' => 'text_filed_sanitize',
		) );
    $wp_customize->add_control(new julia_Kaya_Customize_Subtitle_control( $wp_customize, 'child_menu_title', array(
      'label'    => __( 'Child Menu Font Settings', 'julia' ),
      'section'  => 'font-panel-section',
      'settings' => 'child_menu_title',
      'priority' => 59,
    )));

	$wp_customize->add_setting('child_menu_font_size', array(
		'default' => '13',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
 	$wp_customize->add_control( new julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'child_menu_font_size', array(
		 'label'   => esc_html__('Child Menu Font Size','julia'),
		'section' => 'font-panel-section',
		'settings'    => 'child_menu_font_size',
		'priority'    => 60,
		'choices'  => array(
			'min'  => 10,
			'max'  => 50,
			'step' => 1
		),
		)));
  	$wp_customize->add_setting('child_menu_font_letter_space',array(
  		'default' => '0',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
 	$wp_customize->add_control( new julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'child_menu_font_letter_space', array(
		 'label'   => esc_html__('Child Menu Font Letter Spacing','julia'),
		'section' => 'font-panel-section',
		'settings'    => 'child_menu_font_letter_space',
		'priority'    => 70,
		'choices'  => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		),
		)));
 	$wp_customize->add_setting( 'child_menu_font_weight', array(
        'default' => 'normal',
        'transport' => 'postMessage',
       'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control('child_menu_font_weight', array(
        'type' => 'select',
        'label' => esc_html__('Select Child Menu Font Weight','julia'),
        'section' => 'font-panel-section',
        'choices' => $font_weight_names,
		'priority' => 80,
    ));
    $wp_customize->add_setting( 'child_menu_uppercase', array(
		'default'        => 0,
		//'type'           => 'option',
		'transport' => 'postMessage',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
		'capability'     => 'edit_theme_options' )
	);
	$wp_customize->add_control('child_menu_uppercase', array(
		'label'    => esc_html__( 'Enable Uppercase Letters ','julia'),
		'section'  => 'font-panel-section',
		'type'     => 'checkbox',
		'priority' => 90
	) );
	// Title Font Sizes

	// H1
	$wp_customize->add_setting( 'h1_font_title', array(
			'sanitize_callback' => 'text_filed_sanitize',
		) );
    $wp_customize->add_control(new julia_Kaya_Customize_Subtitle_control( $wp_customize, 'h1_font_title', array(
	    'label'    => __( 'H1 Font Settings', 'julia' ),
	    'section'  => 'font-panel-section',
	    'settings' => 'h1_font_title',
	    'priority' => 104,
    )));
	$wp_customize->add_setting('h1_title_fontsize', array(
		'default' => '30',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
 	$wp_customize->add_control( new julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'h1_title_fontsize', array(
		'label'   => esc_html__('Font size for heading - H1','julia'),
		'section' => 'font-panel-section',
		'settings'    => 'h1_title_fontsize',
		'priority'    => 105,
		'choices'  => array(
			'min'  => 10,
			'max'  => 80,
			'step' => 1
		),
		)));
  	$wp_customize->add_setting('h1_font_letter_space',
    array( 'default' => '0',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
 	$wp_customize->add_control( new julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'h1_font_letter_space', array(
		 'label'   => esc_html__('Font Letter Spacing - H1','julia'),
		'section' => 'font-panel-section',
		'settings'    => 'h1_font_letter_space',
		'priority'    => 110,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1
		),
		)));
	$wp_customize->add_setting( 'h1_font_weight_bold', array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',

    ));
    $wp_customize->add_control('h1_font_weight_bold', array(
        'type' => 'select',
        'label' => esc_html__('Select Font Weight - H1','julia'),
        'section' => 'font-panel-section',
        'choices' => $font_weight_names,
		'priority' => 120,
    ));

	// H2
	$wp_customize->add_setting( 'h2_font_title', array(
			'sanitize_callback' => 'text_filed_sanitize',
		) );
    $wp_customize->add_control(new julia_Kaya_Customize_Subtitle_control( $wp_customize, 'h2_font_title', array(
	    'label'    => __( 'H2 Font Settings', 'julia' ),
	    'section'  => 'font-panel-section',
	    'settings' => 'h2_font_title',
	    'priority' => 139,
    )));

	$wp_customize->add_setting('h2_title_fontsize',array(
    	 'default' => '24',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
 	$wp_customize->add_control( new julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'h2_title_fontsize', array(
		'label'   => esc_html__('Font size for heading - H2','julia'),
		'section' => 'font-panel-section',
		'settings'    => 'h2_title_fontsize',
		'priority'    => 140,
		'choices'  => array(
			'min'  => 10,
			'max'  => 80,
			'step' => 1
		),
		)));
  	$wp_customize->add_setting('h2_font_letter_space', array( 
  		'default' => '0',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
 	$wp_customize->add_control( new julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'h2_font_letter_space', array(
		 'label'   => esc_html__('Font Letter Spacing - H2','julia'),
		'section' => 'font-panel-section',
		'settings'    => 'h2_font_letter_space',
		'priority'    => 150,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1
		),
		)));
	$wp_customize->add_setting( 'h2_font_weight_bold', array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',

    ));
    $wp_customize->add_control('h2_font_weight_bold', array(
        'type' => 'select',
        'label' => esc_html__('Select Font Weight - H2','julia'),
        'section' => 'font-panel-section',
        'choices' => $font_weight_names,
		'priority' => 160,
    ));        	 
	// H3
	$wp_customize->add_setting( 'h3_font_title', array(
			'sanitize_callback' => 'text_filed_sanitize',
		) );
    $wp_customize->add_control(new julia_Kaya_Customize_Subtitle_control( $wp_customize, 'h3_font_title', array(
	    'label'    => __( 'H3 Font Settings', 'julia' ),
	    'section'  => 'font-panel-section',
	    'settings' => 'h3_font_title',
	    'priority' => 179,
    )));

	$wp_customize->add_setting('h3_title_fontsize',array( 
		'default' => '20',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
 	$wp_customize->add_control( new julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'h3_title_fontsize', array(
		 'label'   => esc_html__('Font size for heading - H3','julia'),
		'section' => 'font-panel-section',
		'settings'    => 'h3_title_fontsize',
		'priority'    => 180,
		'choices'  => array(
			'min'  => 10,
			'max'  => 80,
			'step' => 1
		),
		)));
  	$wp_customize->add_setting('h3_font_letter_space', array(
  		'default' => '2',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
 	$wp_customize->add_control( new julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'h3_font_letter_space', array(
		 'label'   => esc_html__('Font Letter Spacing - H3','julia'),
		'section' => 'font-panel-section',
		'settings'    => 'h3_font_letter_space',
		'priority'    => 190,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1
		),
		)));
	$wp_customize->add_setting( 'h3_font_weight_bold', array(
        'default' => 'bold',
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control('h3_font_weight_bold', array(
        'type' => 'select',
        'label' => esc_html__('Select Font Weight - H3','julia'),
        'section' => 'font-panel-section',
        'choices' => $font_weight_names,
		'priority' => 200,
    ));

    //H4
    $wp_customize->add_setting( 'h4_font_title', array(
			'sanitize_callback' => 'text_filed_sanitize',
		) );
    $wp_customize->add_control(new julia_Kaya_Customize_Subtitle_control( $wp_customize, 'h4_font_title', array(
	    'label'    => __( 'H4 Font Settings', 'julia' ),
	    'section'  => 'font-panel-section',
	    'settings' => 'h4_font_title',
	    'priority' => 219,
    )));

	$wp_customize->add_setting( 'h4_title_fontsize', array(
		'default' => '18',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
 	$wp_customize->add_control( new julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'h4_title_fontsize', array(
		'label'   => esc_html__('Font size for heading - H4','julia'),
		'section' => 'font-panel-section',
		'settings'    => 'h4_title_fontsize',
		'priority'    => 220,
		'choices'  => array(
			'min'  => 10,
			'max'  => 80,
			'step' => 1
		),
		)));
  	$wp_customize->add_setting('h4_font_letter_space', array(
  		'default' => '0',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
 	$wp_customize->add_control( new julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'h4_font_letter_space', array(
		 'label'   => esc_html__('Font Letter Spacing - H4','julia'),
		'section' => 'font-panel-section',
		'settings'    => 'h4_font_letter_space',
		'priority'    => 230,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1
		),
		))); 
	$wp_customize->add_setting( 'h4_font_weight_bold', array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control('h4_font_weight_bold', array(
        'type' => 'select',
        'label' => esc_html__('Select Font Weight - H4','julia'),
        'section' => 'font-panel-section',
        'choices' => $font_weight_names,
		'priority' => 240,
    ));
	// H5
	$wp_customize->add_setting( 'h5_font_title', array(
			'sanitize_callback' => 'text_filed_sanitize',
		) );
    $wp_customize->add_control(new julia_Kaya_Customize_Subtitle_control( $wp_customize, 'h5_font_title', array(
	    'label'    => __( 'H5 Font Settings', 'julia' ),
	    'section'  => 'font-panel-section',
	    'settings' => 'h5_font_title',
	    'priority' => 259,
    )));

	$wp_customize->add_setting('h5_title_fontsize', array( 
		'default' => '16',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
	$wp_customize->add_control( new julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'h5_title_fontsize', array(
		'label'   => esc_html__('Font size for heading - H5','julia'),
		'section' => 'font-panel-section',
		'settings'    => 'h5_title_fontsize',
		'priority'    => 260,
		'choices'  => array(
			'min'  => 10,
			'max'  => 80,
			'step' => 1
		),
	)));
   	$wp_customize->add_setting('h5_font_letter_space',array(
   		'default' => '0',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
 	$wp_customize->add_control( new julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'h5_font_letter_space', array(
		 'label'   => esc_html__('Font Letter Spacing - H5','julia'),
		'section' => 'font-panel-section',
		'settings'    => 'h5_font_letter_space',
		'priority'    => 270,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1
		),
	)));
	$wp_customize->add_setting( 'h5_font_weight_bold', array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control('h5_font_weight_bold', array(
        'type' => 'select',
        'label' => esc_html__('Select Font Weight - H5','julia'),
        'section' => 'font-panel-section',
        'choices' => $font_weight_names,
		'priority' => 280
    ));	 


	// H6
	$wp_customize->add_setting( 'h6_font_title', array(
			'sanitize_callback' => 'text_filed_sanitize',
		) );
    $wp_customize->add_control(new julia_Kaya_Customize_Subtitle_control( $wp_customize, 'h6_font_title', array(
	    'label'    => __( 'H6 Font Settings', 'julia' ),
	    'section'  => 'font-panel-section',
	    'settings' => 'h6_font_title',
	    'priority' => 299,
    )));

	$wp_customize->add_setting('h6_title_fontsize', array( 
		'default' => '14',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'wp_filter_nohtml_kses',
	 ));
 	$wp_customize->add_control( new julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'h6_title_fontsize', array(
		'label'   => esc_html__('Font size for heading - H6','julia'),
		'section' => 'font-panel-section',
		'settings'    => 'h6_title_fontsize',
		'priority'    => 300,
		'choices'  => array(
			'min'  => 10,
			'max'  => 80,
			'step' => 1
		),
	)));
    $wp_customize->add_setting('h6_font_letter_space', array(
    	'default' => '0',
    	'transport' => 'postMessage',
    	'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
 	$wp_customize->add_control( new julia_Kaya_Customize_Sliderui_Control( $wp_customize, 'h6_font_letter_space', array(
		'label'   => esc_html__('Font Letter Spacing - H6','julia'),
		'section' => 'font-panel-section',
		'settings'    => 'h6_font_letter_space',
		'priority'    => 310,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1
		),
		)));
	$wp_customize->add_setting( 'h6_font_weight_bold', array(
        'default' => 'normal',
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
    $wp_customize->add_control('h6_font_weight_bold', array(
        'type' => 'select',
        'label' => esc_html__('Select Font Weight - H6','julia'),
        'section' => 'font-panel-section',
        'choices' => $font_weight_names,
		'priority' => 320,
    ));	 
}
add_action( 'customize_register', 'julia_kaya_font_panel_section' );