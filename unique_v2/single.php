<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 */
get_header(); ?>
	<div class="fullwidth mid-content"> <!-- Middle content align -->
		
		<?php
			
		while ( have_posts() ) : the_post();
			$id = get_the_ID();
			$post = get_post( $id );
			$custom = get_post_custom($id);
			$biography = ($custom['biography'][0]);
			$tabs_content = "";
			$video = ($custom['video'][0]);
			$tabs_content = '<ul class="tabs"><li class="active"><a href="#" data-tab="gallery">Galerie</a></li>';
			if($video ){
				
				$tabs_content .= '<li><a href="#" data-tab="video">Video</a></li>';
			}
			$audio = ($custom['audio'][0]);
			if($audio){
				$tabs_content .= '<li><a href="#" data-tab="audio">Audio</a></li>';
			}
			if($biography){
				$tabs_content .= '<li><a href="#" data-tab="biography">Biographie</a></li>';
			}
			if(sizeof($custom['gallery']) >3 ) {
				$tabs_content.='<li><a class="download_sedcard" href="'.get_permalink().'?pdf_download=true">Download</a></li>';
			}
			$tabs_content.='</ul>';
			
			
			
			$selected = '';
			if(isset($_SESSION['shortlist'])) {
				if ( in_array(get_the_ID(), $_SESSION['shortlist']) ) {
					$selected = 'item_selected';
				}
			}
			//Tabs Sections Enabling/Disabling
			if (function_exists('talents_single_page_tabs_section_enable')) {
				if ($kaya_options->talents_single_page_option) {
					echo talents_single_page_tabs_section_enable();
				}
				else{
					echo talents_single_page_tabs_section_disable();
				}
			}

			if($_GET['pdf_download']){
					echo '<div class="post_single_page_img_details">'; // Post image & Details Wrapper
						echo '<div class="one_fourth">'; // Image displayed one half
							if( !empty($img_url) ){
								echo '<img src="'.julia_kaya_image_sizes($img_url, '400', '500').'" alt="img" class="" />'; // WPCS: XSS OK
							}else{
								echo '<img src="'.get_parent_theme_file_uri( '/images/default_image.jpg').'" alt="img" class="" />';// WPCS: XSS OK
							}
							echo '<h2>';
							the_title();
							echo '</h2>';
							echo '<h4>';
								echo get_the_term_list(get_the_ID(), 'talent_category', '', ',');
							echo '</h4>';
							if (function_exists('kaya_pods_cpt_shortlist_text_buttons'))
							{
							echo kaya_pods_cpt_shortlist_text_buttons();
							}
							if (function_exists('kaya_pods_cpt_compcard_images'))
							{
								echo kaya_pods_cpt_compcard_images(get_query_var( 'post_type' ));
							}
	
	
						echo '</div>';
						echo '<div class="post_single_page_details three_fourth_last">'; // Single Page Details Wrapper
							// Images, Videos & Rich Textarea Information Wrappper
	
							if( function_exists('kaya_media_section') ){
								echo '<div class="single_tabs_content_wrapper">';
									kaya_tab_section($cpt_slug_name);
									echo '</div>';
							}
							if( function_exists('kaya_media_section') ){
								echo '<div class="single_tabs_content_wrapper">';
									kaya_profile_tab_section();
									kaya_media_section($cpt_slug_name);
									kaya_custom_tabs_data();
								echo '</div>';
							}
							if ( is_active_sidebar( 'tag_cloud_widget_area' ) ){
				 				dynamic_sidebar( 'tag_cloud_widget_area' );
						    }
						echo '</div>'; // End Single Page Details Wrapper
	
					echo '</div>'; // End Post image & Details Wrapper
				echo '</div>'; // End post Single content Wrapper
			}else {
				// Post Data content wrapper note:don't delete this ID and class
				echo '<div class="post_single_page_content_wrapper item '.esc_attr($selected).'" id="'.get_the_ID().'">'; // Post Data content wrapper note:don't delete this ID and class
					$img_url = wp_get_attachment_url(get_post_thumbnail_id());
					echo '<div class="main_left">&nbsp;</div><div class="main_middle"><h1 class="main">' . get_the_title() . '</h1></div><div class="main_right"><div class="cpt_posts_add_remove"><a href="#" class="action add" data-action="add"><i class="fa fa-plus"></i>&nbsp;ZUR MERKLISTE </a><a href="#" class="action remove" data-action="remove"><i class="fa fa-minus"></i>&nbsp; VON MERKLISTE ENTFERNEN</a></div></div>';
	
					echo '<div class="infos">';
					echo '<div class="block"><div class="key">Größe:</div><div class="value">'.$custom['groesse'][0].'</div></div>';
					echo '<div class="block"><div class="key">Konfektion:</div><div class="value">'.$custom['dress_size'][0].'</div></div>';
					echo '<div class="block"><div class="key">Brust:</div><div class="value">'.$custom['chest'][0].'</div></div>';
					echo '<div class="block"><div class="key">Taille:</div><div class="value">'.$custom['waist'][0].'</div></div>';
					echo '<div class="block"><div class="key">Hüfte:</div><div class="value">'.$custom['bust'][0].'</div></div>';
					echo '<div class="block"><div class="key">Schuhe:</div><div class="value">'.$custom['shoe_size'][0].'</div></div>';
					echo '<div class="block"><div class="key">Haare:</div><div class="value">'.$custom['hair_color'][0].'</div></div>';
					echo '<div class="block"><div class="key">Augen:</div><div class="value">'.$custom['eye_color'][0].'</div></div>';
					echo '</div>';
					echo $tabs_content;
					echo '<div class="tab_content tab_gallery active">';
					echo '<div class="main_image">';
					if( !empty($img_url) ){
						echo '<img src="'.$img_url.'" alt="img" class="" />'; // WPCS: XSS OK
					}else{
						echo '<img src="'.get_parent_theme_file_uri( '/images/default_image.jpg').'" alt="img" class="" />';// WPCS: XSS OK
					}
					echo '</div>';
					//new dBug($custom);
					$i = 0;
					echo '<div data-featherlight-gallery data-featherlight-filter="a" class="gallery" >';
					foreach ($custom['gallery'] as $image_id){
						$image_attributes_thumb =  wp_get_attachment_image_src( $image_id, $size = 'medium_large' ) ;
						$image_attributes_full =  wp_get_attachment_image_src( $image_id , $size = 'large') ;
						if($image_attributes_thumb[2] < $image_attributes_thumb[1]){
							$classname = 'thumbnail landscape';
							echo '<div class="'.$classname.' lazy"><img src="'.$image_attributes_thumb[0].'"></div>';
						}else {
							$classname = 'thumbnail';
							echo '<div data-src="'.$image_attributes_thumb[0].'" class="'.$classname.' lazy"></div>';
						}
						
					}
					echo '</div>';
					echo '<div class="clearfix"></div>';     				
					echo '</div>'; // End tab_gallery
					
					if($video){
						
						echo '<div class="tab_content tab_video">';
						
						foreach($custom['video'] as $video){
							$u= '<video width="630" height="354" controls>
								  <source src="'.wp_get_attachment_url( $video ) .'" type="video/mp4">							  
								Your browser does not support the video tag.
								</video>'; 
								echo do_shortcode('[video src="'.wp_get_attachment_url( $video ) .'" width=640 height=354]');
						}
						echo '</div>'; // End tab_video
					}
					if($audio){
						echo '<div class="tab_content tab_audio">';
						echo '<audio src="'.wp_get_attachment_url( $audio ) .'">
								  Your browser does not support the <code>audio</code> element.
								</audio>';
						echo '</div>'; 
					}
					if($biography){
						echo '<div class="tab_content tab_biography">';
						echo $biography;
						echo '</div>'; // End tab_biography
					}
				echo '</div>'; // End post Single content Wrapper
			}
			
			
			
		endwhile; // End of the loop.
		?>
	</div> <!-- End Middle content align -->
<?php get_footer(); ?>
