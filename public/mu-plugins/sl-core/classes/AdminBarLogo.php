<?php

namespace Mizner\SLC;

class AdminBarLogo {
	public function __construct() {
		add_action( 'admin_bar_menu', [ $this, 'add_logo' ], 1 );
	}

	public function add_logo( $admin_bar ) {
		ob_start();
		include( PATH . 'images/logo.svg' );
		$the_logo = ob_get_clean();

		$admin_bar->add_menu( [
			'id'    => 'logo',
			'title' => $the_logo,
			//'href'  => 'knoxweb.com',
			'meta'  => [
				'title' => __( 'Something' ),
			],
		] );
	}
}