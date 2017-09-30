<?php
/**
 * Plugin Name: Simple Launch Core
 * Plugin URI: http://mizner.io
 * Description:
 * Version: 1.0
 * Author: Michael Mizner
 * Author URI: http://mizner.io
 * License: GPL
 */

namespace Mizner\SLC;

defined( 'WPINC' ) || die;

define( __NAMESPACE__ . '\PROJECT', 'simple-launch' );
define( __NAMESPACE__ . '\PATH', plugin_dir_path( __FILE__ ) );
define( __NAMESPACE__ . '\URI', plugin_dir_url( __FILE__ ) );

require_once 'lib/autoloader.php';

add_action( 'plugins_loaded', function () {

	$user = wp_get_current_user();

	if ( user_can( $user, 'administrator' ) ) {
		return;
	}


	new Roles();

} );
