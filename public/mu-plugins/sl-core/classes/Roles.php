<?php

namespace Mizner\SLC;

class Roles {

	public function __construct() {

		if ( get_role( 'owner' ) ) {
			return;
		}

		$this->additions();
		$this->removals();

	}

	public function additions() {

		add_role( 'owner', 'Owner', [
			'create_posts'           => true,
			'create_users'           => true,
			'delete_others_posts'    => true,
			'delete_posts'           => true,
			'delete_private_posts'   => true,
			'delete_published_posts' => true,
			'edit_others_pages'      => true,
			'edit_others_posts'      => true,
			'edit_pages'             => true,
			'edit_posts'             => true,
			'edit_private_pages'     => true,
			'edit_private_posts'     => true,
			'edit_published_pages'   => true,
			'edit_published_posts'   => true,
			'edit_users'             => true,
			'list_users'             => true,
			'manage_categories'      => true,
			'moderate_comments'      => true,
			'promote_users'          => true,
			'publish_posts'          => true,
			'read'                   => true,
			'read_private_posts'     => true,
			'remove_users'           => true,
			'upload_files'           => true,
		] );
	}

	public function removals() {

		if ( get_role( 'subscriber' ) ) {
			remove_role( 'subscriber' );
		}
		if ( get_role( 'contributor' ) ) {
			remove_role( 'contributor' );
		}
		if ( get_role( 'editor' ) ) {
			remove_role( 'editor' );
		}
		if ( get_role( 'author' ) ) {
			remove_role( 'author' );
		}
	}
}