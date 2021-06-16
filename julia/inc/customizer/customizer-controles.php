<?php
/**
 * Creating Customizer Custom Cointrollers
 */ 

// Ui slider Slider
function julia_kaya_controls_register( $wp_customize ){
if(class_exists('WP_Customize_Control')){	
	class julia_Kaya_Customize_Sliderui_Control extends WP_Customize_Control {
		public $type = 'slider';
		public function kaya_vocal_enqueue() {
			wp_enqueue_script( 'jquery-ui-core' );
			wp_enqueue_script( 'jquery-ui-slider' );
			wp_enqueue_style("jquery-ui");
		}
		public function render_content() { ?>
			<label>
				<span class="customize-control-title">	<?php echo esc_html( $this->label ); ?>	</span>
				<input type="text" class="kaya-slider" id="input_<?php echo esc_attr($this->id); ?>" disabled value="<?php echo esc_attr( $this->value() ); ?>" <?php esc_attr( $this->link() ); ?>/>
			</label>
			<div id="slider_<?php echo esc_attr($this->id); ?>" class="custom_slider"></div>
				<script>
					jQuery(document).ready(function($) {
						$( '[id="slider_<?php echo esc_attr( $this->id ); ?>"]' ).slider({
							value : <?php echo trim( $this->value() ) ?  esc_attr( str_replace('&nbsp;', '0', $this->value()) ) : '0'; ?>,
							min   : <?php echo esc_attr( $this->choices['min'] ); ?>,
							max   : <?php echo esc_attr( $this->choices['max'] ); ?>,
							step  : <?php echo esc_attr( $this->choices['step'] ); ?>,
							slide : function( event, ui ) { $( '[id="input_<?php echo esc_attr( $this->id ); ?>"]' ).val(ui.value).keyup(); },
							change: function(e,ui){
									$('#input_<?php echo esc_attr( $this->id ); ?>').trigger('change');
						      }

						});
						
						$( '[id="input_<?php echo esc_attr( $this->id ); ?>"]' ).val( $( '[id="slider_<?php echo esc_attr( $this->id ); ?>"]' ).slider( "value" ) );
					});
				</script>
		<?php
		}
	}
}

class julia_Kaya_Customize_Subtitle_control extends WP_Customize_control{
	public $type = 'sub-title';
	public function render_content(){
		echo '<h4 class="customizer_sub_section">'.esc_html($this->label).'</h4>';
	}
}

// Google Fonts
if(class_exists('WP_Customize_Control')){
	class julia_Kaya_Customize_google_fonts_Control extends WP_Customize_Control 
	{
		public $type = 'googlefonts';
		public function render_content(){ ?>
			<label class="customize-control-title"><?php echo esc_html($this->label); ?></label>
			<?php $list_fonts       = array();
			$list_font_weights 		= array();
			$webfonts_array    		= file( get_parent_theme_file_uri( '/inc/customizer/fonts.json') );
			$webfonts          		= implode( '', $webfonts_array );
			$list_fonts_decode 		= json_decode( $webfonts, true );
			$list_fonts['default'] 	= 'Theme Default';
			foreach ( $list_fonts_decode['items'] as $key => $value ) {
				$item_family                     = $list_fonts_decode['items'][$key]['family'];
				$list_fonts[$item_family]        = $item_family; 
				$list_font_weights[$item_family] = $list_fonts_decode['items'][$key]['variants'];
			} ?>
			<select <?php $this->link(); ?> style="">
				<?php
				$defaylt_fonts = array ('0' => esc_html__('Select Font','julia'),
				'Arial,Helvetica,sans-serif' => 'Arial, Helvetica, sans-serif',
				"'Arial Black', adget,sans-serif" => "'Arial Black', Gadget, sans-serif",
				"'Bookman Old Style',serif" => "'Bookman Old Style', serif",
				"'Comic Sans MS',cursive" => "'Comic Sans MS', cursive",
				"Courier,monospace" => "Courier, monospace",
				"Garamond,serif" => "Garamond, serif",
				"Georgia,serif" => "Georgia, serif",
				"Impact,Charcoal, sans-serif" => "Impact, Charcoal, sans-serif",
				"'Lucida Console',Monaco,monospace" => "'Lucida Console', Monaco, monospace",
				"'Lucida Sans Unicode','Lucida Grande', sans-serif" => "'Lucida Sans Unicode', 'Lucida Grande', sans-serif",
				"'MS Sans Serif',Geneva,sans-serif" => "'MS Sans Serif', Geneva, sans-serif",
				"'MS Serif','New York',sans-serif" => "'MS Serif', 'New York', sans-serif",
				"'Palatino Linotype','Book Antiqua', Palatino, serif" => "'Palatino Linotype', 'Book Antiqua', Palatino, serif",
				"Tahoma,Geneva,sans-serif" => "Tahoma, Geneva, sans-serif",
				"'Times New Roman',Times, serif" => "'Times New Roman', Times, serif",
				"'Trebuchet MS',Helvetica, sans-serif" => "'Trebuchet MS', Helvetica, sans-serif",
				"Verdana, Geneva,sans-serif" => "Verdana, Geneva, sans-serif");

				$array = array('System Fonts' => $defaylt_fonts, 'Google Fonts' => $list_fonts);
				foreach ($array as $key => $val){	   
					echo '<optgroup label="'.esc_attr($key).'">';
					    foreach ($val as $k => $v){
						    echo '<option value="'.esc_attr($k).'">'.esc_attr($v).'</option>';
						}
				    echo '</optgroup>';
				}
				?>
			</select>	
		<?php }
	}
}
}
add_action('customize_register','julia_kaya_controls_register');
if( !function_exists('julia_kaya_globel_font_family') ){
	function julia_kaya_globel_font_family(){
		$frame_border_text_font_family = get_theme_mod('frame_border_text_font_family') ? get_theme_mod('frame_border_text_font_family') : 'Nova Square';
		$google_all_desc_font = get_theme_mod('google_all_desc_font') ? get_theme_mod('google_all_desc_font') : 'Open Sans';
		$header_text_logo_font_family = get_theme_mod('header_text_logo_font_family') ? get_theme_mod('header_text_logo_font_family') : 'Open Sans';
		$google_bodyfont=get_theme_mod( 'google_body_font' ) ? get_theme_mod( 'google_body_font' ) : 'Open Sans';
		$google_menufont=get_theme_mod( 'google_menu_font') ? get_theme_mod( 'google_menu_font') : 'Open Sans';
		$google_generaltitlefont=get_theme_mod( 'google_heading_font' ) ? get_theme_mod( 'google_heading_font') : 'Open Sans';
		$text_logo_tagline_font_family=get_theme_mod( 'text_logo_tagline_font_family' ) ? get_theme_mod( 'text_logo_tagline_font_family') : 'Open Sans';
		$customizer_font_names = array($header_text_logo_font_family, $google_bodyfont, $google_menufont, $google_generaltitlefont, $text_logo_tagline_font_family );
		$defaylt_fonts = array ('0','Arial,Helvetica,sans-serif',"'Arial Black', gadget,sans-serif" , "'Bookman Old Style',serif" ,"'Comic Sans MS',cursive" ,"Courier,monospace" ,"Garamond,serif" ,"Georgia,serif" ,"Impact,Charcoal, sans-serif" ,"'Lucida Console',Monaco,monospace" ,"'Lucida Sans Unicode','Lucida Grande', sans-serif" ,	"'MS Sans Serif',Geneva,sans-serif" ,"'MS Serif','New York',sans-serif" ,"'Palatino Linotype','Book Antiqua', Palatino, serif" ,"Tahoma,Geneva,sans-serif" ,"'Times New Roman',Times, serif" ,"'Trebuchet MS',Helvetica, sans-serif" ,"Verdana, Geneva,sans-serif");
		$body_query_args = array(
			'family' => urlencode( $google_generaltitlefont ).':100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic%7C'.urlencode( $google_bodyfont ).':100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic%7C'.urlencode( $header_text_logo_font_family ).':100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic%7C'.urlencode( $google_menufont ).':100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic%7C'.urlencode( $google_all_desc_font ).':100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic%7C'.urlencode( $text_logo_tagline_font_family ).':100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic%26subset%3Dlatin%2Clatin-ext',
			'subset' => 'latin,latin-ext',
		);
		wp_enqueue_style( 'google-font-family', add_query_arg( $body_query_args, "//fonts.googleapis.com/css" ), array(), null );
		if($frame_border_text_font_family){
			$frame_border_query_args = array(
				'family' => urlencode( $frame_border_text_font_family ).':100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic%7C',
				'subset' => 'latin,latin-ext',
			);
			wp_enqueue_style( 'google-frame-border-font-family', add_query_arg( $frame_border_query_args, "//fonts.googleapis.com/css" ), array(), null );
		}
	}
	add_action('wp_enqueue_scripts','julia_kaya_globel_font_family');
}
?>