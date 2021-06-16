<?php
// Sidebar Widgets Export Menu
function julia_kaya_export_options_page() {
	$page_hook = add_management_page(__( 'Export Widgets', 'julia' ),__( 'Export Widgets', 'julia' ), 'edit_theme_options', 'kaya-widgets-export','julia_kaya_export_page_content');
}
add_action( 'admin_menu', 'julia_kaya_export_options_page' );

function julia_kaya_export_page_content() {	?>
	<div class="wrap">		
		<h3><?php echo _e( 'Export Sidebar widgets Data', 'julia' ); ?></h3>
		<p class="submit">
			<a href="<?php echo esc_url( admin_url( basename( $_SERVER['PHP_SELF'] ) . '?page=' . $_GET['page'] . '&export=1' ) ); ?>" class="button button-primary"><?php echo _e( 'Export Widgets Data', 'julia' ); ?></a>			
		</p>
		<p><?php _e(' Download sidebar widgets data as a .json file', 'julia'); ?></p>
	</div>
	<?php
}

function julia_kaya_sidebar_widgets() {
	global $wp_registered_widget_controls;
	$widget_controls = $wp_registered_widget_controls;
	$sider_widgets = array();
	foreach ( $widget_controls as $widget ) {
		if ( ! empty( $widget['id_base'] ) && ! isset( $sider_widgets[$widget['id_base']] ) ) {
			$sider_widgets[$widget['id_base']]['id_base'] = $widget['id_base'];
			$sider_widgets[$widget['id_base']]['name'] = $widget['name'];
		}
	}
	return apply_filters( 'julia_kaya_sidebar_widgets', $sider_widgets );
}

function julia_kaya_export_options() {
	$sider_widgets = julia_kaya_sidebar_widgets();
	$widget_instances = array();
	foreach ( $sider_widgets as $widget_data ) {
		$instances = get_option( 'widget_' . $widget_data['id_base'] );
		if ( ! empty( $instances ) ) {
			foreach ( $instances as $instance_id => $instance_data ) {
				if ( is_numeric( $instance_id ) ) {
					$unique_instance_id = $widget_data['id_base'] . '-' . $instance_id;
					$widget_instances[$unique_instance_id] = $instance_data;
				}
			}
		}
	}
	$sidebars_widgets = get_option( 'sidebars_widgets' );
	$sidebars_widget_instances = array();
	foreach ( $sidebars_widgets as $sidebar_id => $widget_ids ) {
		if ( 'wp_inactive_widgets' == $sidebar_id ) {
			continue;
		}
		if ( ! is_array( $widget_ids ) || empty( $widget_ids ) ) {
			continue;
		}
		foreach ( $widget_ids as $widget_id ) {
			if ( isset( $widget_instances[$widget_id] ) ) {
				$sidebars_widget_instances[$sidebar_id][$widget_id] = $widget_instances[$widget_id];
			}
		}
	}
	$data = $sidebars_widget_instances;
	$encoded_data = json_encode( $data );
	return apply_filters( 'julia_kaya_export_options', $encoded_data );
}

function julia_kaya_export_download_file() {
	if ( ! empty( $_GET['export'] ) ) {
		$site_url = site_url( '', 'http' );
		$site_url = trim( $site_url, '/\\' );
		$filename = str_replace( 'http://', '', $site_url );
		$filename = str_replace( array( '/', '\\' ), '-', $filename );
		$filename .= '-widgets.json'; // append
		$file_contents = julia_kaya_export_options();
		$filesize = strlen( $file_contents );
		header( 'Content-Type: application/octet-stream' );
		header( 'Content-Disposition: attachment; filename=' . $filename );
		header( 'Expires: 0' );
		header( 'Cache-Control: must-revalidate' );
		header( 'Pragma: public' );
		header( 'Content-Length: ' . $filesize );
		@ob_end_clean();
		flush();
		echo wp_kses($file_contents, true);
		exit;
	}
}
add_action( 'load-tools_page_kaya-widgets-export', 'julia_kaya_export_download_file' );
?>