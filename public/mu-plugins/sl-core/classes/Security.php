<?php

namespace Mizner\SLC;

class Security {
	public function __construct() {
		remove_action( 'wp_head', 'wp_generator' );
		add_filter( 'the_generator', '__return_false' );
		add_filter( 'style_loader_src', [ $this, 'remove_version_from_assets' ] );
		add_filter( 'script_loader_src', [ $this, 'remove_version_from_assets' ] );

	}

	public function remove_version_from_assets( $src ) {
		if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) ) {
			$src = remove_query_arg( 'ver', $src );
		}

		return $src;
	}
}