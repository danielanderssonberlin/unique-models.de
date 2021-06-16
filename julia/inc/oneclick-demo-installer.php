<?php
function julia_kaya_import_fiels() {
    return array(
    	array(
            'import_file_name'           => 'julia',
      		'local_import_file'          => get_parent_theme_file_path('/inc/kaya-xml-files/posts-pages-data.xml'),
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . '/inc/kaya-xml-files/widgets.json',    
            'import_preview_image_url'   => esc_url(get_parent_theme_file_uri('/images/posts-pages-data.jpg')),
        ),	        
	);
}
add_filter( 'pt-ocdi/import_files', 'julia_kaya_import_fiels' );
function julia_kaya_after_import( $selected_import ) {
	WP_Filesystem();
	global $wp_filesystem;
	$customizer_content = get_parent_theme_file_path( '/inc/kaya-xml-files/customizer.json' );
	$widgets = get_parent_theme_file_path( '/inc/kaya-xml-files/widgets.json' );
    $pod_options = get_parent_theme_file_path( '/inc/kaya-xml-files/pods-post-display-options.json');
    $shortlist_options = get_parent_theme_file_path( '/inc/kaya-xml-files/shortlist_options.json');
       
    // Importing Pods CPT Views  Options Data 
    if( $pod_options ){
        $pod_data = $wp_filesystem->get_contents( $pod_options );
        $pod_data= json_decode($pod_data);
        $kaya_options = array();
        foreach ($pod_data as $key => $opt_val) {
            $kaya_options[$key] = $opt_val;
            update_option( 'kaya_options', $kaya_options );
        }
    }
    // Import Shortlist list Data 
    if( $shortlist_options ){
          $shortlist_data = $wp_filesystem->get_contents( $shortlist_options );
         $shortlist_data= json_decode($shortlist_data );
         $kaya_shortlist_options = array();
         foreach ($shortlist_data as $key => $opt_val) {
            $kaya_shortlist_options[$key] = $opt_val;
            update_option( 'kaya_shortlist_options', $kaya_shortlist_options );
         }
    }
    // Importing Registration / Login Plugin Settings
    if( $reg_login_options ){
          $reg_login_data = $wp_filesystem->get_contents( $reg_login_options );
         $reg_login_data= json_decode($reg_login_data );
         $kaya_settings = array();
         foreach ($reg_login_data as $key => $opt_val) {
            $kaya_settings[$key] = $opt_val;
            update_option( 'kaya_settings', $kaya_settings );
         }
    }
	$encode_options = $wp_filesystem->get_contents( $customizer_content);
    $options =  json_decode($encode_options, true);

    foreach ($options as $key => $value) {
        set_theme_mod($key, $value);
    }
    $locations = array();// Menu Options Read
    if (is_array($options['nav_menu_locations'])) {
           foreach ($options['nav_menu_locations'] as $menu_name => $menu_id) {
            $locations[$menu_name] = $menu_id;
            set_theme_mod( 'nav_menu_locations', $locations);
        }
    }                    
    $front_page = !empty( $options['front_page_name'] ) ?  $options['front_page_name'] : '2'; // Front Page 
    $page_for_posts = !empty( $options['page_for_posts'] ) ?  $options['page_for_posts'] : '0';
    $page_title = get_the_title( $front_page );
    $front_page_name = get_page_by_title( $page_title );
    if( $front_page_name == 'Sample Page' ){ }
    else{
        update_option( 'page_on_front', $front_page );
        update_option( 'show_on_front', 'page' );
    }                       
    update_option( 'page_for_posts', $options['page_for_posts']);
    update_option( 'page_for_posts', $page_for_posts);

    if (class_exists('SmartSlider3')) {
       for ($i=1; $i < 2 ; $i++) {
           SmartSlider3::import(get_parent_theme_file_path( "/smartslider-demo-content/slider-demo".$i.".ss3"));
       }
    }
    // Caldera form json import
    if( class_exists('Caldera_Forms_Forms') ){
        $caldera_forms = array('contact-form' => 'Contact Form');
        foreach ($caldera_forms as $key => $caldera_form) {
            $data = json_decode( $wp_filesystem->get_contents( get_parent_theme_file_path( '/inc/kaya-xml-files/'.trim($key).'.json' ) ), true );
            $data[ 'name' ] = strip_tags($caldera_form);
            $new_form_id = Caldera_Forms_Forms::import_form( $data );
        }                            
    } // End Forms
}
add_action( 'pt-ocdi/after_import', 'julia_kaya_after_import' );
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
?>