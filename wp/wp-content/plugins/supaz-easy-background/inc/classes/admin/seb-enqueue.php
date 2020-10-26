<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
if ( !class_exists( 'SEB_Enqueue' ) ) {

	class SEB_Enqueue extends SEB_Library{

		function __construct() {
			add_action( 'admin_enqueue_scripts', array( $this, 'register_backend_assets' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'register_frontend_assets' ) );
		}

		function register_backend_assets( ) {		
			wp_enqueue_style( 'wp-color-picker');
			wp_enqueue_style( 'seb-jqueryUI-css', SEB_CSS_DIR . '/jquery-ui.min.css', array(), SEB_VERSION );
			wp_enqueue_style( 'seb-background-css', SEB_CSS_DIR . '/backend.css', array(), SEB_VERSION );
			

			wp_enqueue_script( 'seb-color-picker-js', SEB_JS_DIR . '/wp-color-picker-alpha.js', array( 'jquery', 'wp-color-picker' ), SEB_VERSION );

			wp_enqueue_media();
			
			wp_enqueue_script( 'seb-backend-script', SEB_JS_DIR . '/backend.js', array( 'jquery'), SEB_VERSION );
		}

		function register_frontend_assets( ) {
			$seb_settings_js = array();

			$query = new WP_Query( array('post_type' => 'seb_posts', 'posts_per_page' => -1 )); 

			if ( $query->have_posts() ) : 
				wp_enqueue_style('seb-jarallax-css', SEB_CSS_DIR. '/jarallax.css' );
				wp_enqueue_style('seb-frontend-css', SEB_CSS_DIR. '/frontend.css' );

				wp_enqueue_script( 'seb-jarallax-js', SEB_JS_DIR . '/jarallax.js', array( 'jquery' ), '1.9.0' );
				wp_enqueue_script( 'seb-jarallax-video-js', SEB_JS_DIR . '/jarallax-video.min.js', array( 'jquery','seb-jarallax-js' ), '1.9.0' );

				wp_enqueue_script( 'seb-frontend', SEB_JS_DIR . '/frontend.js', array('jquery','seb-jarallax-js'), SEB_VERSION );

				while ( $query->have_posts() ) : 
					$query->the_post(); 
					$postid = get_the_ID();           
					$seb_settings = get_post_meta($postid,'_seb_settings'); 
					if(!empty($seb_settings)){
						$seb_disable = isset( $seb_settings['0']['seb_disable'] ) ? sanitize_text_field($seb_settings['0']['seb_disable']): 0;
						$seb_element_identifier = isset( $seb_settings['0']['seb_element_identifier'] ) ? sanitize_text_field($seb_settings['0']['seb_element_identifier']): '';
						$seb_background_type = isset( $seb_settings['0']['seb_background_type'] ) ? sanitize_text_field($seb_settings['0']['seb_background_type']) : '';
						$seb_background_color = isset( $seb_settings['0']['seb_background_color'] ) ? sanitize_text_field($seb_settings['0']['seb_background_color']) : '';
						$seb_image_source = isset( $seb_settings['0']['seb_image_source'] ) ? sanitize_text_field($seb_settings['0']['seb_image_source']) : '';
						$seb_image_size = isset( $seb_settings['0']['seb_image_size'] ) ? sanitize_text_field($seb_settings['0']['seb_image_size']) : '';
						$seb_image_position = isset( $seb_settings['0']['seb_image_position'] ) ? sanitize_text_field($seb_settings['0']['seb_image_position']) : '';
						$seb_image_repeat = isset( $seb_settings['0']['seb_image_repeat'] ) ? sanitize_text_field($seb_settings['0']['seb_image_repeat']) : '';
						$seb_video_type = isset( $seb_settings['0']['seb_video_type'] ) ? sanitize_text_field($seb_settings['0']['seb_video_type']) : '';
						$seb_video_source = isset( $seb_settings['0']['seb_video_source'] ) ? sanitize_text_field($seb_settings['0']['seb_video_source']) : '';
						$seb_youtube_source = isset( $seb_settings['0']['seb_youtube_source'] ) ? sanitize_text_field($seb_settings['0']['seb_youtube_source']) : '';
						$seb_vimeo_source = isset( $seb_settings['0']['seb_vimeo_source'] ) ? sanitize_text_field($seb_settings['0']['seb_vimeo_source']) : '';
						$seb_start_time = isset( $seb_settings['0']['seb_start_time'] ) ? sanitize_text_field($seb_settings['0']['seb_start_time']) : '';
						$seb_end_time = isset( $seb_settings['0']['seb_end_time'] ) ? sanitize_text_field($seb_settings['0']['seb_end_time']) : '';
						$seb_mute_vol = isset( $seb_settings['0']['seb_mute_vol'] ) ? sanitize_text_field($seb_settings['0']['seb_mute_vol']): 0;
						$seb_vol_val = isset( $seb_settings['0']['seb_vol_val'] ) ? sanitize_text_field($seb_settings['0']['seb_vol_val']) : '';
						$seb_is_visible = isset( $seb_settings['0']['seb_is_visible'] ) ? sanitize_text_field($seb_settings['0']['seb_is_visible']): 0;
						$seb_z_index = isset( $seb_settings['0']['seb_z_index'] ) ? sanitize_text_field($seb_settings['0']['seb_z_index']) : '';
						$seb_is_android = isset( $seb_settings['0']['seb_is_android'] ) ? sanitize_text_field($seb_settings['0']['seb_is_android']): 0;
						$seb_is_ios = isset( $seb_settings['0']['seb_is_ios'] ) ? sanitize_text_field($seb_settings['0']['seb_is_ios']): 0;
						$seb_parallax = isset( $seb_settings['0']['seb_parallax'] ) ? sanitize_text_field($seb_settings['0']['seb_parallax']): 0;
						$seb_overlay = isset( $seb_settings['0']['seb_overlay'] ) ? sanitize_text_field($seb_settings['0']['seb_overlay']): 0;
						$seb_overlay_color = isset( $seb_settings['0']['seb_overlay_color'] ) ? sanitize_text_field($seb_settings['0']['seb_overlay_color']) : '';

						$seb_settings_js[$postid] = array(
							'seb_postid'=>$postid,
							'seb_disable' => $seb_disable,
							'seb_element_identifier'=>$seb_element_identifier,
							'seb_background_type'=>$seb_background_type,
							'seb_background_color' => $seb_background_color,
							'seb_image_source'=>$seb_image_source,
							'seb_image_size' => $seb_image_size,
							'seb_image_position'=>$seb_image_position,
							'seb_image_repeat' => $seb_image_repeat,
							'seb_video_type'=>$seb_video_type,
							'seb_video_source' => $seb_video_source,
							'seb_youtube_source'=>$seb_youtube_source,
							'seb_vimeo_source' => $seb_vimeo_source,
							'seb_start_time'=>$seb_start_time,
							'seb_end_time' => $seb_end_time,
							'seb_mute_vol'=>$seb_mute_vol,
							'seb_vol_val' => $seb_vol_val,
							'seb_is_visible'=>$seb_is_visible,
							'seb_z_index'=>$seb_z_index,
							'seb_is_android' => $seb_is_android,
							'seb_is_ios' => $seb_is_ios,
							'seb_parallax' => $seb_parallax,
							'seb_overlay' => $seb_overlay,
							'seb_overlay_color' => $seb_overlay_color,
						);

						if($seb_overlay){
							?>
							<style class="seb-stylesheet">
								.seb-<?php _e($postid);?>.seb-enabled.seb-overlay:before {
									background: <?php _e($seb_overlay_color);?>;
								}
							</style>
							<?php
						}
					}


				endwhile; 

				$seb_json_str = json_encode($seb_settings_js);
				
				wp_localize_script( 'seb-frontend', 'seb_settings', array(
					'seb_arr' => $seb_json_str
				));



				wp_reset_postdata();
			endif;
		}
	}

	new SEB_Enqueue();
}