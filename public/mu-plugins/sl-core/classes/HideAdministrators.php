<?php

namespace Mizner\SLC;

class HideAdministrators {

	public $current_user;

	public function __construct( $current_user ) {

		$this->current_user = $current_user;

		add_action( 'pre_user_query', [ $this, 'users_page' ] );

		add_filter( 'editable_roles', [ $this, 'add_new_user' ] );
		add_filter( 'views_users', [ $this, 'subsubsub_remove_administrator' ] );
	}

	public function subsubsub_remove_administrator( $views ) {
		unset( $views['administrator'] );

		return $views;
	}

	public function add_new_user( $editable_roles ) {

		global $pagenow;

		if ( 'user-new.php' == $pagenow ) {
			unset( $editable_roles['administrator'] );
		}

		return $editable_roles;

	}

	public function users_page( $user_search ) {

		global $wpdb;

		$user_search->query_where = str_replace(
			'WHERE 1=1',
			"WHERE 1=1 AND {$wpdb->users}.ID IN (
              SELECT {$wpdb->usermeta}.user_id FROM $wpdb->usermeta 
              WHERE {$wpdb->usermeta}.meta_key = '{$wpdb->prefix}capabilities'
              AND {$wpdb->usermeta}.meta_value NOT LIKE '%administrator%' )",
			$user_search->query_where
		);
	}

}