<?php

namespace Mizner\SLC\WooCommerce;

class ManageNotices {
	public function __construct() {
		add_action( 'init', [ $this, 'remove_update' ] );
	}

	public function client_remove_gotdang_nags() {
		remove_action( 'admin_notices', 'woothemes_updater_notice' );
	}

}