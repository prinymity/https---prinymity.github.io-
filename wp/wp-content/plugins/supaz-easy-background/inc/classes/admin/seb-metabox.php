<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
if ( !class_exists( 'SEB_Post_Type' ) ) {

	class SEB_Post_Type extends SEB_Library{

		function __construct() {
			add_action( 'init', array( $this, 'seb_register_post_type' ) );
			add_action( 'add_meta_boxes', array( $this, 'seb_add_metabox' ) );
        	add_action( 'save_post', array( $this, 'seb_save_settings' ) );
        	add_action( "load-edit.php",array( $this, 'seb_help_tabs' )  );
        	add_action( "load-post-new.php", array( $this, 'seb_help_tabs' ) );
        	add_action( "load-post.php", array( $this, 'seb_help_tabs' ) );
		}

		function seb_register_post_type() {
   			include(SEB_PATH . 'inc/classes/seb-post-type/seb-custom-post-type.php');
 		}

		function seb_add_metabox() {
			add_meta_box( 'supaz_easy_background', __( 'Supaz Easy Background', SEB_TD ), array( $this, 'seb_meta_callback' ), 'seb_posts', 'normal', 'core' );
		}

		function seb_meta_callback( $post ) {
			include(SEB_PATH . 'inc/classes/seb-post-type/seb-meta-box/seb-meta-box.php');
		}

		function seb_save_settings( $post_id ) {
			include(SEB_PATH . 'inc/classes/seb-post-type/seb-meta-box/seb-meta-saves.php');
		}

     function seb_help_tabs() {

      $screen = get_current_screen();
      $screen_ids = array('seb_posts','edit-seb_posts' );

      if ( ! in_array( $screen->id, $screen_ids ) ) {
        return;
      }

      $screen->add_help_tab(
        array(
          'id'      => 'seb_overview',
          'title'   => 'Overview',
          'content' => '<p><strong>Supaz Easy Background</strong> is a free light-weight WordPress Plugin to add Background to any section or div container.</p><p><strong>Supaz Easy Background</strong> uses Jarallx.js to add color, image or video background to any section or div. You can create multiple settings and set different backgrounds to different sections.</p><p>Use different settings option to create video background to your need.'
        )
      );

      /*Add a sidebar to contextual help.*/
      $screen->set_help_sidebar( '<p><strong>Connect with us:</strong></p><p><a href="https://www.facebook.com/supazthemes/" target="_blank">Facebook</a></p><p><a href="https://twitter.com/supazthemes" target="_blank">Twitter</a></p>' );
    }

	}

	new SEB_Post_Type();
}
