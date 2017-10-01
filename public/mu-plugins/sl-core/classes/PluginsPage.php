<?php

namespace Mizner\SLC;

class PluginsPage {

	public function __construct() {
		add_filter( 'show_advanced_plugins', [ $this, 'hide_mu_plugins' ] );
		add_filter( 'plugin_row_meta', [ $this, 'hide_plugin_metadata' ], 10, 2 );
		add_filter( 'all_plugins', [ $this, 'control_plugins_shown' ] );
		add_filter( 'plugin_action_links', [ $this, 'hide_plugin_links' ] );
	}

	public function hide_plugin_links( $links ) {

		$allowed = [
			'activate',
			'deactivate',
		];

		$curated = array_filter( $links, function ( $link ) use ( $allowed ) {
			return in_array( $link, $allowed );
		}, ARRAY_FILTER_USE_KEY );

		return $curated;
	}


	public function control_plugins_shown( $plugins ) {
		$excluded = [
			'Genesis Columns Advanced',
			'Genesis Custom Headers',
		];

		$curated = array_filter( $plugins, function ( $plugin ) use ( $excluded ) {
			return in_array( $plugin['Name'], $excluded );
		} );

		return $curated;
	}

	public function hide_plugin_metadata( $links, $file ) {
		return [];
	}

	public function hide_mu_plugins( $mu_plugins ) {
		return false;
	}

}
