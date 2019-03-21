<?php

namespace Mizner\SLC;

class AdminBar {
	public function __construct() {
		add_action( 'admin_bar_menu', [ $this, 'add_logo' ], 1 );
		add_action( 'wp_before_admin_bar_render', [ $this, 'removals' ], 0 );
		add_filter( 'gettext', [ $this, 'replace_howdy' ], 10, 3 );
	}

	public function removals() {
		global $wp_admin_bar;

		// Remove WordPress Logo stuff.
		$wp_admin_bar->remove_menu( 'wp-logo' );
	}

	public function add_logo( $admin_bar ) {
		ob_start();
		include( PATH . 'images/simple-launch-logo.svg' );
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

	function replace_howdy( $translated, $text, $domain ) {
		if ( ! is_admin() || 'default' != $domain ) {
			return $translated;
		}
		if ( false !== strpos( $translated, 'Howdy' ) ) {
			return str_replace( 'Howdy', 'Hi there', $translated );
		}

		return $translated;
	}

}