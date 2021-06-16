<?php
function julia_kaya_customizer_styles(){
	// Text Logo Color Section
	$text_logo_color = get_theme_mod('text_logo_color') ? get_theme_mod('text_logo_color') : '#353535';
	$text_logo_tagline_color = get_theme_mod('text_logo_tagline_color') ? get_theme_mod('text_logo_tagline_color') : '#757575';

	// Header Color Section
	$header_left_bg_color = get_theme_mod('header_left_bg_color') ? get_theme_mod('header_left_bg_color') : '#000';
	$header_bg_color = get_theme_mod('header_bg_color') ? get_theme_mod('header_bg_color') : '#fff';
	
	// Menu Section
	$menu_link_color = get_theme_mod('menu_link_color') ? get_theme_mod('menu_link_color') : '#000';
	$menu_link_hover_color = get_theme_mod('menu_link_hover_color') ? get_theme_mod('menu_link_hover_color') : '#ff3333';
	$menu_active_link_color = get_theme_mod('menu_active_link_color') ? get_theme_mod('menu_active_link_color') : '#ff3333';
	$child_menu_bg_color = get_theme_mod('child_menu_bg_color') ? get_theme_mod('child_menu_bg_color') : '#ff3333';
	$child_menu_link_color = get_theme_mod('child_menu_link_color') ? get_theme_mod('child_menu_link_color') : '#fff';
	$child_menu_link_hover_color = get_theme_mod('child_menu_link_hover_color') ? get_theme_mod('child_menu_link_hover_color') : '#fff';
	$child_menu_hover_bg_color = get_theme_mod('child_menu_hover_bg_color') ? get_theme_mod('child_menu_hover_bg_color') : '#ff0000';
	$child_menu_active_bg_color = get_theme_mod('child_menu_active_bg_color') ? get_theme_mod('child_menu_active_bg_color') : '#ff0000';
	$child_menu_active_link_color = get_theme_mod('child_menu_active_link_color') ? get_theme_mod('child_menu_active_link_color') : '#fff';
	$child_menu_border_bottom_color = get_theme_mod('child_menu_border_bottom_color') ? get_theme_mod('child_menu_border_bottom_color') : '#ff3333';
    $search_toggle_bar_BG_color = get_theme_mod('search_toggle_bar_BG_color') ? get_theme_mod('search_toggle_bar_BG_color') : '#ff3333';
    $search_toggle_bar_icon_color = get_theme_mod('search_toggle_bar_icon_color') ? get_theme_mod('search_toggle_bar_icon_color') : '#fff';
	
	// page title Section
	$page_titlebar_bg_color = get_theme_mod('page_titlebar_bg_color') ?  get_theme_mod('page_titlebar_bg_color')  : '#f2f2f2';
	$page_titlebar_color = get_theme_mod('page_titlebar_color') ?  get_theme_mod('page_titlebar_color')  : '#353535';
	$page_titlebar_padding_tb = get_theme_mod('page_titlebar_padding_tb') ?  get_theme_mod('page_titlebar_padding_tb')  : '30';
	$title_position = get_theme_mod('title_position') ?  get_theme_mod('title_position')  : 'left';
	$bread_crumb_font_size = get_theme_mod('bread_crumb_font_size') ?  get_theme_mod('bread_crumb_font_size')  : '15';
	$page_titlebar_font_size = get_theme_mod('page_titlebar_font_size') ?  get_theme_mod('page_titlebar_font_size')  : '38';
	$bread_crumb_link_color = get_theme_mod('bread_crumb_link_color') ?  get_theme_mod('bread_crumb_link_color')  : '#000000';

	// Page mid content Section
	$page_mid_contant_bg_color = get_theme_mod('page_mid_contant_bg_color') ?  get_theme_mod('page_mid_contant_bg_color')  : '#fff';
	$page_mid_content_title_color = get_theme_mod('page_mid_content_title_color') ?  get_theme_mod('page_mid_content_title_color')  : '';
	$page_mid_content_color = get_theme_mod('page_mid_content_color') ?  get_theme_mod('page_mid_content_color')  : '#868686';
	$page_mid_contant_links_color = get_theme_mod('page_mid_contant_links_color') ?  get_theme_mod('page_mid_contant_links_color')  : '#333';
	$page_mid_contant_links_hover_color = get_theme_mod('page_mid_contant_links_hover_color') ?  get_theme_mod('page_mid_contant_links_hover_color')  : '#000000';

	//Single-Page
	$single_page_tabs_active_BG_color =get_theme_mod('single_page_tabs_active_BG_color') ? get_theme_mod('single_page_tabs_active_BG_color') : '#ff3333';
	$single_page_tabs_active_color =get_theme_mod('single_page_tabs_active_color') ? get_theme_mod('single_page_tabs_active_color') : '#fff';
	$single_page_tabs_active_border_color =get_theme_mod('single_page_tabs_active_border_color') ? get_theme_mod('single_page_tabs_active_border_color') : '#ff3333';
	$single_page_tabs_BG_color =get_theme_mod('single_page_tabs_BG_color') ? get_theme_mod('single_page_tabs_BG_color') : '#f2f2f2';
	$single_page_tabs_color =get_theme_mod('single_page_tabs_color') ? get_theme_mod('single_page_tabs_color') : '#7a7a7a';
	$single_page_tabs_border_color =get_theme_mod('single_page_tabs_border_color') ? get_theme_mod('single_page_tabs_border_color') : '#e5e5e5';
	$shortlist_tab_BG_color = get_theme_mod('shortlist_tab_BG_color') ? get_theme_mod('shortlist_tab_BG_color') : '#f2f2f2';
	$single_page_tabs_border_bottom_color = get_theme_mod('single_page_tabs_border_bottom_color') ? get_theme_mod('single_page_tabs_border_bottom_color') : '#ff3333';
	$shortlist_tab_color = get_theme_mod('shortlist_tab_color') ? get_theme_mod('shortlist_tab_color') : '#000';
    $shortlist_tab_border_color = get_theme_mod('shortlist_tab_border_color') ? get_theme_mod('shortlist_tab_border_color') : '#f2f2f2';
    $compcard_tab_BG_color = get_theme_mod('compcard_tab_BG_color') ? get_theme_mod('compcard_tab_BG_color') : '#ff3333';
    $compcard_tab_color = get_theme_mod('compcard_tab_color') ? get_theme_mod('compcard_tab_color') : '#fff';
    $compcard_tab_border_color = get_theme_mod('compcard_tab_border_color') ? get_theme_mod('compcard_tab_border_color') : '#ff3333';
    $single_page_post_title_color = get_theme_mod('single_page_post_title_color') ? get_theme_mod('single_page_post_title_color') : '#353535';
    $single_page_category_link_color = get_theme_mod('single_page_category_link_color') ? get_theme_mod('single_page_category_link_color') : '#ff3333';

    //Talent Post Color Settings
    $post_title_color = get_theme_mod('post_title_color') ? get_theme_mod('post_title_color') : '#000000';
    $post_title_hover_color = get_theme_mod('post_title_hover_color') ? get_theme_mod('post_title_hover_color') : '#ff3333';
    $post_meta_fields_text_hover_color = get_theme_mod('post_meta_fields_text_hover_color') ? get_theme_mod('post_meta_fields_text_hover_color') : '#ffffff';
    $post_meta_fields_text_hover_BG_color = get_theme_mod('post_meta_fields_text_hover_BG_color') ? get_theme_mod('post_meta_fields_text_hover_BG_color') : '#ff3333';

	// page sidebar Section
	$sidebar_title_color = get_theme_mod('sidebar_title_color') ?  get_theme_mod('sidebar_title_color')  : '#353535';
	$sidebar_title_border_color = get_theme_mod('sidebar_title_border_color') ?  get_theme_mod('sidebar_title_border_color')  : '#000000';
	$sidebar_content_color = get_theme_mod('sidebar_content_color') ?  get_theme_mod('sidebar_content_color')  : '#717171';
	$sidebar_links_color = get_theme_mod('sidebar_links_color') ?  get_theme_mod('sidebar_links_color')  : '#ff3333';
	$sidebar_links_hover_color = get_theme_mod('sidebar_links_hover_color') ?  get_theme_mod('sidebar_links_hover_color')  : '#000000';
	$sidebar_list_border_color = get_theme_mod('sidebar_list_border_color') ?  get_theme_mod('sidebar_list_border_color')  : '#e5e5e5';
	$sidebar_tagcloud_bg_color = get_theme_mod('sidebar_tagcloud_bg_color') ?  get_theme_mod('sidebar_tagcloud_bg_color')  : '#f9f9f9';
	$sidebar_tagcloud_font_color = get_theme_mod('sidebar_tagcloud_font_color') ?  get_theme_mod('sidebar_tagcloud_font_color')  : '#353535';
	$sidebar_tagcloud_border_color = get_theme_mod('sidebar_tagcloud_border_color') ?  get_theme_mod('sidebar_tagcloud_border_color')  : '#eeeeee';
	$sidebar_tagcloud_hover_bg_color = get_theme_mod('sidebar_tagcloud_hover_bg_color') ?  get_theme_mod('sidebar_tagcloud_hover_bg_color')  : '#ff3333';
	$sidebar_tagcloud_hover_font_color = get_theme_mod('sidebar_tagcloud_hover_font_color') ?  get_theme_mod('sidebar_tagcloud_hover_font_color')  : '#ffffff';
	$sidebar_tagcloud_hover_border_color = get_theme_mod('sidebar_tagcloud_hover_border_color') ?  get_theme_mod('sidebar_tagcloud_hover_border_color')  : '#ff3333';
	$sidebar_default_search_btn_BG_color = get_theme_mod('sidebar_default_search_btn_BG_color') ? get_theme_mod('sidebar_default_search_btn_BG_color') : '#ff3333';
	$sidebar_default_search_btn_color = get_theme_mod('sidebar_default_search_btn_color') ? get_theme_mod('sidebar_default_search_btn_color') : '#ffffff';
 
	// Footer Section

 	/* Font Sizes */
    /* Title Font sizes H1 */
    $h1_title_fontsize=get_theme_mod( 'h1_title_fontsize', '' ) ? get_theme_mod( 'h1_title_fontsize', '' ) : '30'; // H1
    $h2_title_fontsize=get_theme_mod( 'h2_title_fontsize', '' ) ? get_theme_mod( 'h2_title_fontsize', '' ) : '27'; // H2
    $h3_title_fontsize=get_theme_mod( 'h3_title_fontsize', '' ) ? get_theme_mod( 'h3_title_fontsize', '' ) : '25'; // H3
    $h4_title_fontsize=get_theme_mod( 'h4_title_fontsize', '' ) ? get_theme_mod( 'h4_title_fontsize', '' ) : '18'; // H4
    $h5_title_fontsize=get_theme_mod( 'h5_title_fontsize', '' ) ? get_theme_mod( 'h5_title_fontsize', '' ) : '16'; // H5
    $h6_title_fontsize=get_theme_mod( 'h6_title_fontsize', '' ) ? get_theme_mod( 'h6_title_fontsize', '' ) : '12'; // H6
    // Letter Spaceing
    $h1_font_letter_space=get_theme_mod( 'h1_font_letter_space') ? get_theme_mod( 'h1_font_letter_space') : '0'; // H1
    $h2_font_letter_space=get_theme_mod( 'h2_font_letter_space') ? get_theme_mod( 'h2_font_letter_space') : '0'; // H2
    $h3_font_letter_space=get_theme_mod( 'h3_font_letter_space') ? get_theme_mod( 'h3_font_letter_space') : '0'; // H3
    $h4_font_letter_space=get_theme_mod( 'h4_font_letter_space') ? get_theme_mod( 'h4_font_letter_space') : '0'; // H4
    $h5_font_letter_space=get_theme_mod( 'h5_font_letter_space') ? get_theme_mod( 'h5_font_letter_space') : '0'; // H5
    $h6_font_letter_space=get_theme_mod( 'h6_font_letter_space') ? get_theme_mod( 'h6_font_letter_space') : '0'; // H6
    // Font Weight
    $h1_font_weight_bold=get_theme_mod( 'h1_font_weight_bold') ? get_theme_mod( 'h1_font_weight_bold') : 'normal'; // H1
    $h2_font_weight_bold=get_theme_mod( 'h2_font_weight_bold') ? get_theme_mod( 'h2_font_weight_bold') : 'normal'; // H2
    $h3_font_weight_bold=get_theme_mod( 'h3_font_weight_bold') ? get_theme_mod( 'h3_font_weight_bold') : 'normal'; // H3
    $h4_font_weight_bold=get_theme_mod( 'h4_font_weight_bold') ? get_theme_mod( 'h4_font_weight_bold') : 'normal'; // H4
    $h5_font_weight_bold=get_theme_mod( 'h5_font_weight_bold') ? get_theme_mod( 'h5_font_weight_bold') : 'normal'; // H5
    $h6_font_weight_bold=get_theme_mod( 'h6_font_weight_bold') ? get_theme_mod( 'h6_font_weight_bold') : 'normal'; // H6
    // Body & Menu
    $body_font_weight_bold=get_theme_mod( 'body_font_weight_bold') ? get_theme_mod( 'body_font_weight_bold') : 'normal'; // body
    $menu_font_weight=get_theme_mod( 'menu_font_weight') ? get_theme_mod( 'menu_font_weight') : 'normal'; // Menu
    $child_menu_font_weight=get_theme_mod( 'child_menu_font_weight') ? get_theme_mod( 'child_menu_font_weight') : 'normal'; // Child Menu
    // Menu Latter Sapcing
    $body_font_letter_space=get_theme_mod( 'body_font_letter_space') ? get_theme_mod( 'body_font_letter_space') : '0'; // H4
    $menu_font_letter_space=get_theme_mod( 'menu_font_letter_space') ? get_theme_mod( 'menu_font_letter_space') : '0'; // H5
    $child_menu_font_letter_space=get_theme_mod( 'child_menu_font_letter_space') ? get_theme_mod( 'child_menu_font_letter_space') : '0'; // H6
    $body_font_size=get_theme_mod( 'body_font_size', '' ) ? get_theme_mod( 'body_font_size', '' ) : '15'; // Body Font Size
    $menu_font_size=get_theme_mod( 'menu_font_size', '' ) ? get_theme_mod( 'menu_font_size', '' ) : '13'; // Body Font Size
    $child_menu_font_size=get_theme_mod( 'child_menu_font_size', '' ) ? get_theme_mod( 'child_menu_font_size', '' ) : '13'; // Body Font Size

    // Font family Names
    $google_body_font=get_theme_mod( 'google_body_font' ) ? get_theme_mod( 'google_body_font') : 'Open Sans';
    $google_bodyfont= ( $google_body_font == '0' ) ? 'arial' : $google_body_font;
    $google_menu_font=get_theme_mod( 'google_menu_font' ) ? get_theme_mod( 'google_menu_font' ) : 'Open Sans';
    $google_menufont= ( $google_menu_font == '0' ) ? 'arial' : $google_menu_font;
    $google_general_titlefont=get_theme_mod( 'google_heading_font') ? get_theme_mod( 'google_heading_font' ) : 'Crete Round';
    $google_generaltitlefont= ( $google_general_titlefont == '0' ) ? 'arial' : $google_general_titlefont;	

    // Top Header Section

	// Pagination Section
	$pagination_bg_color = get_theme_mod('pagination_bg_color') ?  get_theme_mod('pagination_bg_color')  : '#e5e5e5';
	$pagination_link_color = get_theme_mod('pagination_link_color') ?  get_theme_mod('pagination_link_color')  : '#353535';
	$pagination_active_bg_color = get_theme_mod('pagination_active_bg_color') ?  get_theme_mod('pagination_active_bg_color')  : '#353535';
	$pagination_active_link_color = get_theme_mod('pagination_active_link_color') ?  get_theme_mod('pagination_active_link_color')  : '#353535';

	/* Body & Menu & Title's Font Line Height  */
	$lineheight_body = round((1.9 * $body_font_size));
	$lineheight_h1 = round((1.6 * $h1_title_fontsize));
	$lineheight_h2 = round((1.6 * $h2_title_fontsize));
	$lineheight_h3 = round((1.6 * $h3_title_fontsize));
	$lineheight_h4 = round((1.6 * $h4_title_fontsize)); 
	$lineheight_h5 = round((1.6 * $h5_title_fontsize));
	$lineheight_h6 = round((1.6 * $h6_title_fontsize));

	$css = '';
    $css .= 'body, p{
			font-family:'.esc_attr( $google_bodyfont ).';
			line-height:'.$lineheight_body.'px;
			font-size:'.$body_font_size.'px;
			letter-spacing:'.$body_font_letter_space.'px;
			font-weight:'.$body_font_weight_bold.';
			font-style:normal;
    }
    .menu ul li a, .shortlist-align a{
			font-family:'.$google_menufont.';
			font-size:'.$menu_font_size.'px !important;
			letter-spacing:'.$menu_font_letter_space.'px;
			font-weight:'.$menu_font_weight.';
    }
    .menu ul ul li a{
	        font-size:'.$child_menu_font_size.'px;
	        font-weight:'.$child_menu_font_weight.';
    }
   	a, span{
        	font-family:'.esc_attr( $google_bodyfont ).';
    }
    p{
        padding-bottom:'.$lineheight_body.'px;
    }
    /* Heading Font Family */
    h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a{
       	font-family:'.$google_generaltitlefont.';
    }
    h1{
        font-size:'.$h1_title_fontsize.'px;
        line-height:'.$lineheight_h1.'px;
        letter-spacing:'.$h1_font_letter_space.'px;
        font-weight: '.$h1_font_weight_bold.';
    }
    h2{
        font-size:'.$h2_title_fontsize.'px;
        line-height:'.$lineheight_h2.'px;
        letter-spacing:'.$h2_font_letter_space.'px;
        font-weight: '.$h2_font_weight_bold.';
    }
    h3, .grid-view-container h3:before{
        font-size:'.$h3_title_fontsize.'px;
        line-height:'.$lineheight_h3.'px;
        letter-spacing:'.$h3_font_letter_space.'px;
        font-weight: '.$h3_font_weight_bold.'!important;
    }
    h4{
        font-size:'.$h4_title_fontsize.'px;
        line-height:'.$lineheight_h4.'px;
        letter-spacing:'.$h4_font_letter_space.'px;
        font-weight: '.$h4_font_weight_bold.';
    }
    h5{
        font-size:'.$h5_title_fontsize .'px;
        line-height:'. $lineheight_h5 .'px;
        letter-spacing:'.$h5_font_letter_space.'px;
        font-weight: '.$h5_font_weight_bold.';
    }
    h6{
        font-size:'.$h6_title_fontsize.'px;
        line-height:'.$lineheight_h6.'px;
        letter-spacing:'.$h6_font_letter_space.'px;
        font-weight: '.$h6_font_weight_bold.';
    }';

	// Text Logo Settings
	$css .= '#logo h1.site-title a{
			color:'.$text_logo_tagline_color.';
		}
		#logo p{
			color:'.$text_logo_color.';
		}';
	// Header Color Section
	$css .='#kaya-header-content-wrapper, #kaya-header-content-wrapper .header-section{
			background:'.$header_bg_color.';
		}';

	// Menu  Color settings	
	$css .= '#header-navigation ul li a, .shortlist-align a{
				color:'.$menu_link_color.';
			}
			#header-navigation ul li a:hover, .shortlist-align a:hover{
				color:'.$menu_link_hover_color.';
			}
			#header-navigation ul li.current-menu-item.current_page_item a{
				color:'.$menu_active_link_color.';
			}
			.sub-menu li a, .user-account .sub-menu li a{
				background:'.$child_menu_bg_color.';
				color:'.$child_menu_link_color.'!important;
			}
			.sub-menu li a:hover{
				background:'.$child_menu_hover_bg_color.';
				color:'.$child_menu_link_hover_color.'!important;
			}
			.sub-menu li.current-menu-item a{
				background:'.$child_menu_active_bg_color.';
				color:'.$child_menu_active_link_color.';
			}
			.sub-menu li a{
				border-bottom:1px solid '.$child_menu_border_bottom_color.';
			}
            .toggle_search_icon{
                border-top:50px solid '.$search_toggle_bar_BG_color.';        
            }
            .toggle_search_icon i{
                color:'.$search_toggle_bar_icon_color.';
            }';
			//Talent Single-page Settings
    $css .= '.single_tabs_content_wrapper li.tab-active a{
    			background:'.$single_page_tabs_active_BG_color.'!important;
    			color:'.$single_page_tabs_active_color.'!important;
    			border: 1px solid '.$single_page_tabs_active_border_color.'!important;
    	} 
    	ul.tabs_content_wrapper li a{
    		background:'.$single_page_tabs_BG_color.'!important;
    			color:'.$single_page_tabs_color.'!important;
    			border: 1px solid '.$single_page_tabs_border_color.'!important;
    	}
    	ul.tabs_content_wrapper{
    		border-bottom: 3px solid '.$single_page_tabs_border_bottom_color.';
    	}
    	.cpt_posts_add_remove{
    		background:'.$shortlist_tab_BG_color.';
            border:1px solid '.$shortlist_tab_border_color.';
    	}
    	.cpt_posts_add_remove a{
    		color:'.$shortlist_tab_color.';
    	}
        .pods_cpt_single_compcard a{
            background:'.$compcard_tab_BG_color.';
            border:1px solid '.$compcard_tab_border_color.';
            color:'.$compcard_tab_color.';
        }
        .post_single_page_img_details h2{
	        color:'.$single_page_post_title_color.';
	    }
	    .post_single_page_img_details .one_fourth h4 a, .post_single_page_img_details .one_fourth h4{
	    	color:'.$single_page_category_link_color.';
	    }
        ';

        //Talent Post Color Settings

        $css .='.post-content-wrapper h3, .grid-view-container h3{
        	color:'.$post_title_color.'!important;
        }
        .post-content-wrapper .grid-view-container h3:before, .grid-view-container h3:before{
        	background:'.$post_title_color.'!important;
        }
        .post-content-wrapper .grid-view-container:hover h3, .grid-view-container:hover h3{
        	color:'.$post_title_hover_color.'!important;
        }
        .post-content-wrapper .grid-view-container a:hover h3:before, .grid-view-container a:hover h3:before{
        	background:'.$post_title_hover_color.'!important;
        }
        .post-content-wrapper .title-meta-data-wrapper .general-meta-fields-info-wrapper .post-meta-general-info span, .grid-view-container .title-meta-data-wrapper{
        	color:'.$post_meta_fields_text_hover_color.'!important;
        }
        .post-content-wrapper .grid-view-container .grid-view-image .title-meta-data-wrapper, .grid-view-container .title-meta-data-wrapper{
        	background:'.$post_meta_fields_text_hover_BG_color.'!important;
        }';
	// Page title  Color settings			
	    $css .= '.kaya-page-titlebar-wrapper{
                background:'.$page_titlebar_bg_color.';
                padding:'.$page_titlebar_padding_tb.'px 0px;
            }
            .kaya-page-titlebar-wrapper .page-title, .kaya-page-titlebar-wrapper a, .kaya-page-titlebar-wrapper, .page-title a{
                color:'.$page_titlebar_color.';
            }
            .kaya-page-titlebar-wrapper{
            	text-align:'.$title_position.';
            }
            .kaya-page-titlebar-wrapper .page-title{
                font-size:'.$page_titlebar_font_size.'px;
                margin-bottom: 10px;
            }
            .kaya-page-titlebar-wrapper a, .kaya-page-titlebar-wrapper{
                font-size:'.$bread_crumb_font_size.'px;
            }
            .kaya-page-titlebar-wrapper a {
			    color: '.$bread_crumb_link_color.';
			}';

	// Page Mid Content	 Color settings		
	$css .= 'body{
				background:'.$page_mid_contant_bg_color.';
				color:'.$page_mid_content_color.';
			}
			body h1, body h2, body h3, body h4, body h5, body h6,
			body h1 a, body h2 a, body h3 a, body h4 a, body h5 a,body h6 a{
				color:'.$page_mid_content_title_color.';
			}
			body a{
				color:'.$page_mid_contant_links_color.';
			}
			body a:hover{
				color:'.$page_mid_contant_links_hover_color.';
			}';

	// Page sidebar Color settings	
	$css .= 'button, input[type="button"], input[type="reset"], input[type="submit"]{
				color:'.$sidebar_default_search_btn_color.';
				background:'.$sidebar_default_search_btn_BG_color.';
			}
			#sidebar{
				color:'.$sidebar_content_color.';
			}
			#sidebar h1, #sidebar h2, #sidebar h3, #sidebar h4, #sidebar h5, #sidebar h6{
				color:'.$sidebar_title_color.';
			}
			#sidebar .widget-title:before{
				background:'.$sidebar_title_border_color.';
			}
			#sidebar a{
				color:'.$sidebar_links_color.';
			}
			#sidebar a:hover{
				color:'.$sidebar_links_hover_color.';
			}
			#sidebar li{
				border-bottom:1px solid '.$sidebar_list_border_color.';
			}
			.tagcloud a{
				color:'.$sidebar_tagcloud_font_color.'!important;
			}
			.tagcloud a:hover{
				color:'.$sidebar_tagcloud_hover_font_color.'!important;
				background:'.$sidebar_tagcloud_hover_bg_color.';
				border-right:3px solid'.$sidebar_tagcloud_hover_border_color.';
			}';
	// Footer Color settings	

	// Footer Footer Color settings	
	//pagination Color Settings		
	$css .= 'ul.page-numbers li a, .page-links a{
				background:'.$pagination_bg_color.'!important;
				color:'.$pagination_link_color.'!important;
			}
			 .pagination .current, #kaya-mid-content-wrapper .page-links > span, ul.page-numbers li a:hover, .page-links a:hover{
				background:'.$pagination_active_bg_color.'!important;
				color:'.$pagination_active_link_color.'!important;
			}';					
	// End Styles
			
	$css = preg_replace( '/\s+/', ' ', $css ); 
    echo "<style>\n" .wp_kses($css, true). "\n</style>";	
}
add_action('wp_head', 'julia_kaya_customizer_styles');
?>