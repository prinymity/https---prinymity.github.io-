<?php
/* Supaz Easy Background - Save all backend meta box values */
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
if(!isset($_POST['seb_meta_nonce'])){ 
	return;
}

if(! wp_verify_nonce( $_POST['seb_meta_nonce'],'seb_save_settings')){ 
	return;
}

if(! current_user_can( 'edit_post',$post_id)){
	return;
}

$seb_settings                           = array();
$seb_settings['seb_meta_nonce']         = isset( $_POST['seb_meta_nonce'] ) ? sanitize_text_field($_POST['seb_meta_nonce']) : '';
$seb_settings['seb_disable']            = isset( $_POST['seb_disable'] ) ? 1: 0;
$seb_settings['seb_element_identifier'] = isset( $_POST['seb_element_identifier'] ) ? sanitize_text_field($_POST['seb_element_identifier']): '';
$seb_settings['seb_background_type']    = isset( $_POST['seb_background_type'] ) ? sanitize_text_field($_POST['seb_background_type']) : '';
$seb_settings['seb_background_color']   = isset( $_POST['seb_background_color'] ) ? sanitize_text_field($_POST['seb_background_color']) : '';
$seb_settings['seb_image_source']       = isset( $_POST['seb_image_source'] ) ? sanitize_text_field($_POST['seb_image_source']) : '';
$seb_settings['seb_image_size']         = isset( $_POST['seb_image_size'] ) ? sanitize_text_field($_POST['seb_image_size']) : '';
$seb_settings['seb_image_position']     = isset( $_POST['seb_image_position'] ) ? sanitize_text_field($_POST['seb_image_position']) : '';
$seb_settings['seb_image_repeat']       = isset( $_POST['seb_image_repeat'] ) ? sanitize_text_field($_POST['seb_image_repeat']) : '';
$seb_settings['seb_video_type']         = isset( $_POST['seb_video_type'] ) ? sanitize_text_field($_POST['seb_video_type']) : '';
$seb_settings['seb_video_source']       = isset( $_POST['seb_video_source'] ) ? sanitize_text_field($_POST['seb_video_source']) : '';
$seb_settings['seb_youtube_source']     = isset( $_POST['seb_youtube_source'] ) ? sanitize_text_field($_POST['seb_youtube_source']) : '';
$seb_settings['seb_vimeo_source']       = isset( $_POST['seb_vimeo_source'] ) ? sanitize_text_field($_POST['seb_vimeo_source']) : '';
$seb_settings['seb_start_time']         = isset( $_POST['seb_start_time'] ) ? sanitize_text_field($_POST['seb_start_time']) : '';
$seb_settings['seb_end_time']           = isset( $_POST['seb_end_time'] ) ? sanitize_text_field($_POST['seb_end_time']) : '';
$seb_settings['seb_mute_vol']           = isset( $_POST['seb_mute_vol'] ) ? 1: 0;
$seb_settings['seb_vol_val']            = isset( $_POST['seb_vol_val'] ) ? sanitize_text_field($_POST['seb_vol_val']) : '';
$seb_settings['seb_is_visible']         = isset( $_POST['seb_is_visible'] ) ? 1: 0;
$seb_settings['seb_z_index']            = isset( $_POST['seb_z_index'] ) ? sanitize_text_field($_POST['seb_z_index']) : '';
$seb_settings['seb_is_android']         = isset( $_POST['seb_is_android'] ) ? 1: 0;
$seb_settings['seb_is_ios']             = isset( $_POST['seb_is_ios'] ) ? 1: 0;
$seb_settings['seb_parallax']           = isset( $_POST['seb_parallax'] ) ? 1: 0;
$seb_settings['seb_overlay']            = isset( $_POST['seb_overlay'] ) ? 1: 0;
$seb_settings['seb_overlay_color']      = isset( $_POST['seb_overlay_color'] ) ? sanitize_text_field($_POST['seb_overlay_color']) : '';

update_post_meta($post_id,'_seb_settings',$seb_settings);


