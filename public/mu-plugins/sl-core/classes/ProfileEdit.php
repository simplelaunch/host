<?php

namespace Mizner\SLC;

class ProfileEdit {

	public function __construct() {
		$this->removals();
	}

	public function removals() {
		remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );
	}
}