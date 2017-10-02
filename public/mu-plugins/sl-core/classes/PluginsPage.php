<?php

namespace Mizner\SLC;

class PluginsPage {

	static $plugins_shown = [
		'Genesis Columns Advanced',
		'Genesis Custom Headers',
		'The Events Calendar',
		'WooCommerce',
		'Disable Comments',
	];

	public function __construct() {
		add_filter( 'show_advanced_plugins', '__return_false' );
		add_filter( 'all_plugins', [ $this, 'control_plugins_shown' ] );
		add_filter( 'plugin_row_meta', [ $this, 'hide_plugin_metadata' ], 99, 2 );
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

		$curated = array_filter( $plugins, function ( $plugin ) {
			return in_array( $plugin['Name'], self::$plugins_shown );
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
