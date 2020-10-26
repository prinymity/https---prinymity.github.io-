<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
if ( !class_exists( 'SEB_Library' ) ) {

	class SEB_Library {

		function print_array( $array ) {
			echo "<pre>";
			print_r( $array );
			echo "</pre>";
		}
		
	}

}