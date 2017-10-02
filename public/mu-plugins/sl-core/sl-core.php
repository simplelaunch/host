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

// Not working in mu-plugin - link: https://core.trac.wordpress.org/ticket/34358
define( __NAMESPACE__ . '\URI', str_replace( 'plugins/var/www/public/', '', plugin_dir_url( __FILE__ ) ) );

require_once 'lib/autoloader.php';


add_action( 'plugins_loaded', function () {

	new DashboardWidgets();

	$current_user = wp_get_current_user();

	if ( user_can( $current_user, 'administrator' ) ) {
		return;
	}

	new HideAdministrators( $current_user );

	new Roles();
	new AdminBar();
	new ProfileEdit();
	new CustomizerChanges();
	new AdminFooter();
	new PluginsPage();
	new AdminMenu();
	new PostTypeSupport();
	new ScreenMetaLinks();
	new UpdateNags();
	new UserColumns();
	new Security();
	new LoginPage();


	if ( ! in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		return;
	}
	new WooCommerce\ManageNotices();

} );





