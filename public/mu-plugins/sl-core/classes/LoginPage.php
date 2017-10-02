<?php

namespace Mizner\SLC;

class LoginPage {

	public function __construct() {
		add_action( 'login_header', [ $this, 'login_header' ] );
		add_action( 'login_enqueue_scripts', [ $this, 'enqueue_style' ], 10 );
	}

	function enqueue_style() {
		wp_enqueue_style( 'login-page-style', URI . 'images/login-page.css' );
	}

	public function login_header() {
		echo "<h1>asdfas</h1>";
	}

}