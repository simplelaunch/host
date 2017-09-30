<?php

namespace Mizner\SLC;

class DashboardWidgets {

	public function __construct() {
		add_action( 'wp_dashboard_setup', [ $this, 'add_dashboard_widgets' ] );
	}

	public function add_dashboard_widgets() {
		wp_add_dashboard_widget( 'wp_dashboard_widget', 'Support Details', [ $this, 'theme_info' ] );
	}

	public function theme_info() {
		// Add theme info box into WordPress Dashboard
		echo "
		<ul>
		  <li><strong>Website:</strong> <a href='//simplelaun.ch'>https://simplelaun.ch</a></li>
		  <li><strong>Contact:</strong> <a href='mailto:support@simplelaun.ch'>support@simplelaun.ch</a></li>
	    </ul>
	  ";
	}


}