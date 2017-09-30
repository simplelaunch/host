<?php

namespace Mizner\SLC;

class AdminBar {
	public function __construct() {
		add_action( 'admin_bar_menu', [ $this, 'add_logo' ], 1 );
		add_action( 'wp_before_admin_bar_render', [ $this, 'removals' ], 0 );
	}

	public function removals() {
		global $wp_admin_bar;

		// Remove WordPress Logo stuff.
		$wp_admin_bar->remove_menu( 'wp-logo' );
	}

	public function add_logo( $admin_bar ) {
		ob_start();
		include( PATH . 'images/logo.svg' );
		$the_logo = ob_get_clean();

		$admin_bar->add_menu( [
			'id'    => 'logo',
			'title' => $the_logo,
			'href'  => 'simplelaun.ch',
			'meta'  => [
				'title' => __( 'Simple Launch' ),
			],
		] );
	}
}