<?php

namespace Mizner\SLC;

class UserColumns {

	public function __construct() {
		add_action( 'manage_users_columns', [ $this, 'remove_user_posts_column' ] );

	}

	public function remove_user_posts_column( $column_headers ) {

		unset( $column_headers['posts'] );

		return $column_headers;
	}

}