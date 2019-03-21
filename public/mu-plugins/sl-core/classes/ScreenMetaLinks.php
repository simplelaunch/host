<?php

namespace Mizner\SLC;

class ScreenMetaLinks {

	public function __construct() {
		$this->remove_screen_options();
	}

	public function remove_screen_options() {
		add_filter( 'screen_options_show_screen', '__return_false' );
	}
}