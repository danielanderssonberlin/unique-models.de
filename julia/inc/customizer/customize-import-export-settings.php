<?php
// Customizer Import and Export Settings
ob_start();
class julia_Kaya_Import_Customizer {
	function __construct() {
		if ( ! is_admin() ) {
			return;
		}
		add_action( 'admin_menu', array( $this, 'julia_kaya_customizer_settings' ) );
	}
	/**
	 * Import and export settings
	 */
	function julia_kaya_customizer_settings() 
	{
		add_theme_page( esc_html__('Customizer Import','julia'), esc_html__('Customizer Import','julia'), 'edit_theme_options', 'import', array( $this,'julia_kaya_customize_import_option_page'));
        add_theme_page( esc_html__('Customizer Export','julia'), esc_html__('Customizer Export','julia'), 'edit_theme_options', 'export', array( $this,'julia_kaya_customize_export_option_page'));
    }
    function julia_kaya_customize_import_option_page() {
        WP_Filesystem();
        global $wp_filesystem;
    ?>
    <div class="wrap">
        <div id="icon-tools" class="icon32"><br /></div>
        <h2><?php esc_html_e('Import Customizer Options', 'julia'); ?></h2>
        <?php
            if (isset($_FILES['import']) && check_admin_referer('customize-import')) {
                if ($_FILES['import']['error'] > 0) {
                    wp_die("Please Choose Upload json format file");
                }
                else {
                    $file_name = sanitize_file_name(wp_unslash($_FILES['import']['name'])); // Get the name of file
                    $file_path = explode('.', $file_name);
                    $file_ext = end($file_path);
                    $file_size = sanitize_file_name(wp_unslash($_FILES['import']['size'])); // Get size of file
                    /* Ensure uploaded file is JSON file type and the size not over 500000 bytes
                     * You can modify the size you want
                     */
                    if (($file_ext == "json") && ($file_size < 500000)) {
                        $encode_options = $wp_filesystem->get_contents(sanitize_file_name(wp_unslash($_FILES['import']['tmp_name'])));
                        $options = json_decode($encode_options, true);
                        $front_page = !empty( $options['front_page_name'] ) ?  $options['front_page_name'] : '2';
                        $page_for_posts = !empty( $options['page_for_posts'] ) ?  $options['page_for_posts'] : '0';
                        foreach ($options as $key => $value) {
                            update_option($key, $value);
                        }
                         $locations = array();
                        foreach ($options['nav_menu_locations'] as $menu_name => $menu_id) {
                            $locations[$menu_name] = $menu_id;
                            set_theme_mod( 'nav_menu_locations', $locations);
                            }
                        $page_title = get_the_title( $front_page );
                        $front_page_name = get_page_by_title( $page_title );
                        if( $front_page_name == 'Sample Page' ){ }
                        else{
                            update_option( 'page_on_front', $front_page );
                            update_option( 'show_on_front', 'page' );
                        }                       
                        update_option( 'page_for_posts', $page_for_posts);
                        echo "<div class='updated'><p>".esc_html__('All options are restored successfully','julia')."</p></div>";
                    }
                    else {
                        echo "<div class='error'><p>".esc_html__('Invalid file or file size too big.','julia')."</p></div>";
                    }
                }
            }
        ?>
        <p><?php esc_html_e('Click Browse button and choose a json file that you backup before.','julia'); ?> </p>
        <p><?php esc_html_e('Press Upload File and Import, WordPress do the rest for you.','julia'); ?></p>
        <form method='post' enctype='multipart/form-data'>
            <p class="submit">
                <?php wp_nonce_field('customize-import'); ?>
                <input type='file' name='import' class="primary-button"  />
                <input type='submit' name='submit' value='<?php esc_html_e('Upload File and Import', 'julia'); ?>' class="button"/>
            </p>
        </form>
    </div>
    <?php
}
function julia_kaya_customize_export_option_page() {
        if (!isset($_POST['export'])) { ?>
            <div class="wrap">
                <div id="icon-tools" class="icon32"><br /></div>
                <h2><?php esc_html_e('Export Theme Customize Options','julia'); ?> </h2>
                <p><?php esc_html_e('When you click <tt>Backup all options</tt> button, system will generate a JSON file for you to save on your computer.','julia'); ?></p>
                <p><?php esc_html_e('This backup file contains all configution and setting options on our website. Note that it do <b>NOT</b> contain posts, pages, or any relevant data, just your all options.','julia'); ?></p>
                <p> <?php esc_html_e('After exporting, you can either use the backup file to restore your settings on this site again or another WordPress site.','julia'); ?> </p>
                <form method='post'>
                    <p class="submit">
                        <?php wp_nonce_field('customize-export'); ?>
                        <input type='submit' name='export' value='<?php esc_html_e('Dowload Customizer Settings','julia'); ?>' class="button"/>
                    </p>
                </form>
            </div>
            <?php
        }
        elseif (check_admin_referer('customize-export')) {
            $blogname = str_replace(" ", "", get_option('blogname'));
            $date = date("m-d-Y");
            $json_name = $blogname."-".$date; // Namming the filename will be generated.
            $options = get_theme_mods(); // Get all options data, return array        
            foreach ($options as $key => $value) {
                $value = maybe_unserialize($value);
                $need_options[$key] = $value;
            }
            $need_options['front_page_name'] = get_option('page_on_front');
            $need_options['page_for_posts'] = get_option('page_for_posts');
            $json_file = json_encode($need_options); // Encode data into json data
            ob_clean();
            echo esc_attr($json_file);
            header("Content-Type: text/json; charset=" . get_option( 'blog_charset'));
            header("Content-Disposition: attachment; filename=$json_name.json");
            exit();
        }
    }
}
$admin_page = new julia_Kaya_Import_Customizer();
?>
