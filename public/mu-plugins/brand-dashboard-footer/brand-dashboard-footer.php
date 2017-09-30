<?php

/*

Plugin Name: Brand the Dashboard Footer
Description: Replaces text in the dashboard footer.
Version: 1.0
Author: Mizner
Author URI: https://mizner.io
License: GPLv2

*/

class NewDashboardFooter {

	/**
	 * NewDashboardFooter constructor.
	 */
	function __construct() {

		add_filter( 'admin_footer_text', [ $this, 'dashboard_footer' ] );

	}

	/**
	 * Footer text change.
	 */
	function dashboard_footer() {

		print 'Powered by <a href="https://www.simplelaun.ch" target="_blank">Simple Launch</a>';

	}


}

new NewDashboardFooter();
