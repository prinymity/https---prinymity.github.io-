<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
if(!class_exists('SEB_Init')){
	class SEB_Init{
		function __construct(){
			add_action('init',array($this,'seb_init'));
		}
		
		function seb_init(){
			load_plugin_textdomain( 'supaz-easy-background', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' ); 
			add_action('admin_menu', array($this, 'register_about_page')); //add submenu page
			do_action('seb_init');
		}

		function register_about_page(){
			add_submenu_page( 'edit.php?post_type=seb_posts', __('About Us', 'supaz-easy-background'), __('About Us', 'supaz-easy-background'), 'manage_options', 'about-us', array($this, 'about_us_submenu_page_callback'));
        }

        function about_us_submenu_page_callback() {
            include('about.php');
        }
	}
	new SEB_Init();
}