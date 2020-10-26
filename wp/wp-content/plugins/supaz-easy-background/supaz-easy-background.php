<?php 
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
/*
  Plugin Name: Supaz Easy Background - Easy way to add parallax image or video background
  Plugin URI:  http://www.supazthemes.com/plugins/supaz-easy-background
  Description: Easy way to add parallax image or video background to any HTML element based on id or class.
  Version:     1.0.2
  Author:      Supazthemes
  Author URI:  http://www.supazthemes.com/
  License:     GPL2 or later
  License URI: https://www.gnu.org/licenses/gpl-2.0.html
  Domain Path: /languages/
  Text Domain: supaz-easy-background
*/

   if(!class_exists('Supaz_Easy_Background')){
    class Supaz_Easy_Background{
      function __construct() {
        $this->define_constants();
        $this->includes();
      }

      function define_constants() {
        defined( 'SEB_PATH' ) or define( 'SEB_PATH', plugin_dir_path( __FILE__ ) );
        defined( 'SEB_IMG_DIR' ) or define( 'SEB_IMG_DIR', plugin_dir_url( __FILE__ ) . 'images' );
        defined( 'SEB_CSS_DIR' ) or define( 'SEB_CSS_DIR', plugin_dir_url( __FILE__ ) . 'css' );
        defined( 'SEB_JS_DIR' ) or define( 'SEB_JS_DIR', plugin_dir_url( __FILE__ ) . 'js' );
        defined( 'SEB_VERSION' ) or define( 'SEB_VERSION', '1.0.2' );
        defined( 'SEB_TD' ) or define( 'SEB_TD', 'supaz-easy-background' );
        defined( 'SEB_BASENAME' ) or define( 'SEB_BASENAME', plugin_basename( __FILE__ ) );
      }

      function includes() {
        require_once SEB_PATH . 'inc/classes/admin/seb-init.php';
        require_once SEB_PATH . 'inc/classes/admin/seb-library.php';
        require_once SEB_PATH . 'inc/classes/admin/seb-enqueue.php';
        require_once SEB_PATH . 'inc/classes/admin/seb-admin.php';
        require_once SEB_PATH . 'inc/classes/admin/seb-metabox.php';
      }
    }

    $Supaz_Easy_Background = new Supaz_Easy_Background();
  }