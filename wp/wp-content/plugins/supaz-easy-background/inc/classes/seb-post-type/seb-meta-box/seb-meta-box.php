<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
wp_nonce_field('seb_save_settings','seb_meta_nonce');
$seb_settings           = get_post_meta($post->ID,'_seb_settings',1);
$seb_meta_nonce         = isset( $seb_settings['seb_meta_nonce'] ) ? sanitize_text_field($seb_settings['seb_meta_nonce']) : '';
$seb_disable            = isset( $seb_settings['seb_disable'] ) ? sanitize_text_field($seb_settings['seb_disable']): 0;
$seb_element_identifier = isset( $seb_settings['seb_element_identifier'] ) ? sanitize_text_field($seb_settings['seb_element_identifier']): '';
$seb_background_type    = isset( $seb_settings['seb_background_type'] ) ? sanitize_text_field($seb_settings['seb_background_type']) : 'color';
$seb_background_color   = isset( $seb_settings['seb_background_color'] ) ? sanitize_text_field($seb_settings['seb_background_color']) : '';
$seb_image_source       = isset( $seb_settings['seb_image_source'] ) ? sanitize_text_field($seb_settings['seb_image_source']) : '';
$seb_image_size         = isset( $seb_settings['seb_image_size'] ) ? sanitize_text_field($seb_settings['seb_image_size']) : 'cover';
$seb_image_position     = isset( $seb_settings['seb_image_position'] ) ? sanitize_text_field($seb_settings['seb_image_position']) : 'center center';
$seb_image_repeat       = isset( $seb_settings['seb_image_repeat'] ) ? sanitize_text_field($seb_settings['seb_image_repeat']) : 'no-repeat';
$seb_video_type         = isset( $seb_settings['seb_video_type'] ) ? sanitize_text_field($seb_settings['seb_video_type']) : 'youtube';
$seb_video_source       = isset( $seb_settings['seb_video_source'] ) ? sanitize_text_field($seb_settings['seb_video_source']) : '';
$seb_youtube_source     = isset( $seb_settings['seb_youtube_source'] ) ? sanitize_text_field($seb_settings['seb_youtube_source']) : '';
$seb_vimeo_source       = isset( $seb_settings['seb_vimeo_source'] ) ? sanitize_text_field($seb_settings['seb_vimeo_source']) : '';
$seb_start_time         = isset( $seb_settings['seb_start_time'] ) ? sanitize_text_field($seb_settings['seb_start_time']) : '0';
$seb_end_time           = isset( $seb_settings['seb_end_time'] ) ? sanitize_text_field($seb_settings['seb_end_time']) : '';
$seb_mute_vol           = isset( $seb_settings['seb_mute_vol'] ) ? sanitize_text_field($seb_settings['seb_mute_vol']): 0;
$seb_vol_val            = isset( $seb_settings['seb_vol_val'] ) ? sanitize_text_field($seb_settings['seb_vol_val']) : '0';
$seb_is_visible         = isset( $seb_settings['seb_is_visible'] ) ? sanitize_text_field($seb_settings['seb_is_visible']): 0;
$seb_z_index            = isset( $seb_settings['seb_z_index'] ) ? sanitize_text_field($seb_settings['seb_z_index']) : '-100';
$seb_is_android         = isset( $seb_settings['seb_is_android'] ) ? sanitize_text_field($seb_settings['seb_is_android']): 0;
$seb_is_ios             = isset( $seb_settings['seb_is_ios'] ) ? sanitize_text_field($seb_settings['seb_is_ios']): 0;
$seb_parallax           = isset( $seb_settings['seb_parallax'] ) ? sanitize_text_field($seb_settings['seb_parallax']): 0;
$seb_overlay            = isset( $seb_settings['seb_overlay'] ) ? sanitize_text_field($seb_settings['seb_overlay']): 0;	
$seb_overlay_color      = isset( $seb_settings['seb_overlay_color'] ) ? sanitize_text_field($seb_settings['seb_overlay_color']) : '';
//$this->print_array($seb_settings);
?>
<div class="seb-postbox-wrapper inside">
	<div class="seb-postbox-wrapper-inner">
		<div class="seb-post-field-wrapper">
			<label><?php _e('Disable Supaz Easy Background','supaz-easy-background');?></label>
			<input type="checkbox" name="seb_disable" <?php checked($seb_disable,1); ?>/ <?php checked($seb_disable,1); ?>>
			<div class="seb-info"></div>
		</div>
		<div class="seb-post-field-wrapper">
			<label><?php _e('Enter Html ID/Class','supaz-easy-background');?></label>
			<input type="text" name="seb_element_identifier" value="<?php _e($seb_element_identifier);?>">
			<div class="seb-info"><?php _e('Add the ID/Class of the outermost HTML element where you want to add the Background.','supaz-easy-background');?>
			<pre><?php esc_html_e('<div class="outer-wrapper">','supaz-easy-background');?><p>Hello, Easy Background should be my Background.</p><?php esc_html_e('</div>','supaz-easy-background');?></pre>	
			<?php _e('Example: <strong>outer-wrapper</strong>','supaz-easy-background');?></div>		
		</div>
		<div class="seb-post-field-wrapper">
			<label><?php _e('Background Type','supaz-easy-background');?></label>
			<select class="seb-background-type" name="seb_background_type">
				<option value="color" <?php selected($seb_background_type,'color');?>><?php _e('Color','supaz-easy-background');?></option>
				<option value="image"<?php selected($seb_background_type,'image');?>><?php _e('Image','supaz-easy-background');?></option>
				<option value="video"<?php selected($seb_background_type,'video');?>><?php _e('Video','supaz-easy-background');?></option>
			</select>
		</div>
		<div class="seb-color-field-wrapper seb-post-field-outer-wrapper" <?php if($seb_background_type != 'color') _e('style="display:none;"');?>>
			<div class="seb-post-field-wrapper">	
				<label><?php _e('Background color','supaz-easy-background');?></label>
				<input type="text" name="seb_background_color" data-alpha="true" class="seb-color-picker" value="<?php _e($seb_background_color);?>">
			</div>
		</div>
		<div class="seb-image-field-wrapper seb-post-field-outer-wrapper" <?php if($seb_background_type != 'image') _e('style="display:none;"');?>>
			<div class="seb-post-field-wrapper">	
				<label><?php _e('Image Source','supaz-easy-background');?></label>
				<div class="seb-upload-wrapper">
					<div class="seb-upload-flex">
						<input type="text" name="seb_image_source" class="seb-image-source" value="<?php _e($seb_image_source);?>">
						<button class="seb-image-upload"><i class="dashicons dashicons-upload" aria-hidden="true"></i></button>
					</div>
				</div>
			</div>
			<div class="seb-post-field-wrapper">	
				<label><?php _e('Image Size','supaz-easy-background');?></label>
				<select name="seb_image_size">
					<option value="auto" <?php selected($seb_image_size,'auto');?>><?php _e('auto','supaz-easy-background');?></option>
					<option value="length" <?php selected($seb_image_size,'length');?>><?php _e('length','supaz-easy-background');?></option>
					<option value="percentage" <?php selected($seb_image_size,'percentage');?>><?php _e('percentage','supaz-easy-background');?></option>
					<option value="cover" <?php selected($seb_image_size,'cover');?>><?php _e('cover','supaz-easy-background');?></option>
					<option value="contain" <?php selected($seb_image_size,'contain');?>><?php _e('contain','supaz-easy-background');?></option>
					<option value="initial" <?php selected($seb_image_size,'initial');?>><?php _e('initial','supaz-easy-background');?></option>
					<option value="inherit" <?php selected($seb_image_size,'inherit');?>><?php _e('inherit','supaz-easy-background');?></option>
				</select>
			</div>
			<div class="seb-post-field-wrapper">	
				<label><?php _e('Image position','supaz-easy-background');?></label>
				<select name="seb_image_position">
					<option value ="left top" <?php selected($seb_image_position,'left top');?>><?php _e('left top','supaz-easy-background');?></option>
					<option value ="left center" <?php selected($seb_image_position,'left center');?>><?php _e('left center','supaz-easy-background');?></option>
					<option value ="left bottom" <?php selected($seb_image_position,'left bottom');?>><?php _e('left bottom','supaz-easy-background');?></option>
					<option value ="right top" <?php selected($seb_image_position,'right top');?>><?php _e('right top','supaz-easy-background');?></option>
					<option value ="right center" <?php selected($seb_image_position,'right center');?>><?php _e('right center','supaz-easy-background');?></option>
					<option value ="right bottom" <?php selected($seb_image_position,'right bottom');?>><?php _e('right bottom','supaz-easy-background');?></option>
					<option value ="center top" <?php selected($seb_image_position,'center top');?>><?php _e('center top','supaz-easy-background');?></option>
					<option value ="center center" <?php selected($seb_image_position,'center center');?>><?php _e('center center','supaz-easy-background');?></option>
					<option value ="center bottom" <?php selected($seb_image_position,'center bottom');?>><?php _e('center bottom','supaz-easy-background');?></option>
				</select>
			</div>
			<div class="seb-post-field-wrapper">	
				<label><?php _e('Image Repeat','supaz-easy-background');?></label>
				<select name="seb_image_repeat">
					<option value ="repeat" <?php selected($seb_image_repeat,'repeat');?>><?php _e('repeat','supaz-easy-background');?></option>
					<option value ="repeat-x" <?php selected($seb_image_repeat,'repeat-x');?>><?php _e('repeat-x','supaz-easy-background');?></option>
					<option value ="repeat-y" <?php selected($seb_image_repeat,'repeat-y');?>><?php _e('repeat-y','supaz-easy-background');?></option>
					<option value ="no-repeat" <?php selected($seb_image_repeat,'no-repeat');?>><?php _e('no-repeat','supaz-easy-background');?></option>
					<option value ="initial" <?php selected($seb_image_repeat,'initial');?>><?php _e('initial','supaz-easy-background');?></option>
					<option value ="inherit" <?php selected($seb_image_repeat,'inherit');?>><?php _e('inherit','supaz-easy-background');?></option>
				</select>
			</div>
		</div>
		<div class="seb-video-field-wrapper seb-post-field-outer-wrapper" <?php if($seb_background_type != 'video') _e('style="display:none;"');?>>
			<div class="seb-post-field-wrapper">	
				<label><?php _e('Video type','supaz-easy-background');?></label>
				<select class="seb-video-type" name="seb_video_type">
					<option value ="custom" <?php selected($seb_video_type,'custom');?>><?php _e('Media Library','supaz-easy-background');?></option>
					<option value ="youtube" <?php selected($seb_video_type,'youtube');?>><?php _e('Youtube','supaz-easy-background');?></option>
					<option value ="vimeo" <?php selected($seb_video_type,'vimeo');?>><?php _e('Vimeo','supaz-easy-background');?></option>
				</select>
			</div>
			<div class="seb-post-field-wrapper seb-video-options seb-video-custom" <?php if($seb_video_type != 'custom') _e('style="display:none;"');?>>
				<label><?php _e('Select Media','supaz-easy-background');?></label>
				<input type   ="text" name="seb_video_source" class="seb-video-source" value="<?php _e($seb_video_source);?>">
				<button class ="seb-video-upload"><i class="dashicons dashicons-upload" aria-hidden="true"></i></button>
				<div class    ="seb-info"><?php _e('Only mp4 formats are supported','supaz-easy-background');?></div>
			</div>
			<div class="seb-post-field-wrapper seb-video-options seb-video-youtube" <?php if($seb_video_type != 'youtube') _e('style="display:none;"');?>>	
				<label><?php _e('Youtube','supaz-easy-background');?></label>
				<input type="text" name="seb_youtube_source" value="<?php _e($seb_youtube_source);?>">
			</div>
			<div class="seb-post-field-wrapper seb-video-options seb-video-vimeo" <?php if($seb_video_type != 'vimeo') _e('style="display:none;"');?>>	
				<label><?php _e('Vimeo','supaz-easy-background');?></label>
				<input type="text" name="seb_vimeo_source" value="<?php _e($seb_vimeo_source);?>">
			</div>
			<div class="seb-post-field-wrapper">	
				<label><?php _e('Video Start Time','supaz-easy-background');?></label>
				<input type="text" name="seb_start_time" value="<?php _e($seb_start_time);?>">
				<div class="seb-info"><?php _e('Start time in seconds when video will be started (this value will be applied also after loop).','supaz-easy-background');?></div>
			</div>
			<div class="seb-post-field-wrapper">	
				<label><?php _e('Video End Time','supaz-easy-background');?></label>
				<input type="text" name="seb_end_time" value="<?php _e($seb_end_time);?>">
				<div class="seb-info"><?php _e('End time in seconds when video will be ended.','supaz-easy-background');?></div>
			</div>
			<div class="seb-post-field-wrapper">	
				<label><?php _e('Mute Volume','supaz-easy-background');?></label>
				<input type="checkbox" name="seb_mute_vol" <?php checked($seb_mute_vol,1); ?>>
			</div>
			<div class="seb-post-field-wrapper">	
				<label><?php _e('Video Volume','supaz-easy-background');?></label>
				<div id="seb-col-large" class="seb-slider-ui">
					<div id="seb-large-custom-handle" class="ui-slider-handle"></div>
				</div>
				<input type="number" min="0" max="99" id="seb-col-large-val" name="seb_vol_val" value="<?php _e($seb_vol_val);?>">	
				<div class="seb-info"><?php _e('Video volume from 0 to 99.','supaz-easy-background');?></div>
			</div>

			<div class="seb-post-field-wrapper">	
				<label><?php _e('Play video only when visible','supaz-easy-background');?></label>
				<input type="checkbox" name="seb_is_visible" <?php checked($seb_is_visible,1); ?>>
				<div class="seb-info"><?php _e('Play video only when it is visible on the screen.','supaz-easy-background');?></div>
			</div>
		</div>
		
		<div class="seb-other-field-wrapper">
			<h4><?php _e('Miscellaneous Settings','supaz-easy-background');?></h4>
			<div class="seb-post-field-wrapper">	
				<label><?php _e('Disable Parallax','supaz-easy-background');?></label>
				<input type="checkbox" name="seb_parallax" <?php checked($seb_parallax,1); ?>>
			</div>
			<div class="seb-post-field-wrapper">	
				<label><?php _e('Add Background Overlay','supaz-easy-background');?></label>
				<input type="checkbox" class="seb-overlay" name="seb_overlay" <?php checked($seb_overlay,1); ?>>
			</div>
			<div class="seb-post-field-wrapper seb-color-picker-wrapper" <?php if(!$seb_overlay) _e('style="display:none;"');?>>	
				<label><?php _e('Add Background Overlay','supaz-easy-background');?></label>
				<input type="text" class="seb-color-picker" name="seb_overlay_color" data-alpha="true" value="<?php _e($seb_overlay_color);?>">
			</div>
			<div class="seb-post-field-wrapper">	
				<label><?php _e('z-index','supaz-easy-background');?></label>
				<input type="text" name="seb_z_index" value="<?php _e($seb_z_index);?>" placeholder="-100">
				<div class="seb-info"><?php _e('z-index of parallax container.','supaz-easy-background');?></div>
			</div>
			<div class="seb-post-field-wrapper">	
				<label><?php _e('Disable in Android','supaz-easy-background');?></label>
				<input type="checkbox" name="seb_is_android" <?php checked($seb_is_android,1); ?>>
			</div>
			<div class="seb-post-field-wrapper">	
				<label><?php _e('Disable in IOS','supaz-easy-background');?></label>
				<input type="checkbox" name="seb_is_ios" <?php checked($seb_is_ios,1); ?>>
			</div>
		</div>
	</div>
</div>