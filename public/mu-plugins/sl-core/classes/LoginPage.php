<?php

namespace Mizner\SLC;

use const SL_BUSINESS_LINK;
use const SL_BUSINESS_TITLE;

class LoginPage {

	public function __construct() {

		add_action( 'login_enqueue_scripts', [ $this, 'enqueue_style' ], 10 );
		add_filter( 'login_headerurl', [ $this, 'login_logo_link' ] );
		add_filter( 'login_headertitle', [ $this, 'login_title' ] );

	}

	public function login_title() {
		return SL_BUSINESS_TITLE;
	}

	public function login_logo_link() {
		return ( SL_BUSINESS_LINK ); // putting my URL in place of the WordPress one
	}

	public function enqueue_style() {
		wp_enqueue_style( 'login-page-style', URI . '/css/login-page.css' );
	}

}