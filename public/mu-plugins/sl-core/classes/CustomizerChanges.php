<?php

namespace Mizner\SLC;

class CustomizerChanges {

	public function __construct() {
		add_action( 'customize_register', [ $this, 'nags' ], 20 );
	}

	public function nags() {
		global $wp_customize;
		// $wp_customize->remove_section( get_template() . '_theme_info' );
		$wp_customize->remove_section( 'themes' );
		$wp_customize->remove_section( 'static_front_page' );

	}

}