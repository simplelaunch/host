<?php

namespace Mizner\SLC;

class DashboardWidgets {

	public function __construct() {
		add_action( 'wp_dashboard_setup', [ $this, 'add_dashboard_widgets' ] );
		add_action( 'admin_init', [ $this, 'removals' ] );

		remove_action( 'welcome_panel', 'wp_welcome_panel' );
		// remove_filter( 'update_footer', 'core_update_footer' ); // todo: what is this?
	}

	public function removals() {
		remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
		remove_meta_box( 'tribe_dashboard_widget', 'dashboard', 'normal' ); // Modern Tribe
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