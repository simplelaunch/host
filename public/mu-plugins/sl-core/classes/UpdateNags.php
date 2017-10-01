<?php

namespace Mizner\SLC;

class UpdateNags {

	public function __construct() {
		remove_action( 'admin_notices', 'update_nag' );
	}

}