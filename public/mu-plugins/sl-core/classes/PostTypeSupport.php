<?php

namespace Mizner\SLC;

class PostTypeSupport {
	public function __construct() {
		add_action( 'admin_init', [ $this, 'pages' ] );
	}

	public function pages() {
		remove_post_type_support( 'page', 'page-attributes' ); // Removes things like "Order"
	}
}