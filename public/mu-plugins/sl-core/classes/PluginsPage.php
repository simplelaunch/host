<?php

namespace Mizner\SLC;

use function Mizner\SLC\strpos_arr;

class PluginsPage {

	public $plugins_shown = [
		'the-events-calendar',
		'disable-comments',
		'safe-redirect-manager',
		'seriously-simple-podcasting',
		'gravityview',
		'tablepress',
		'wp-instagram-widget',
		'twitter',
		'leadin', // Hubspot
		'simple-social-icons',
		'wp-gallery-custom-links',
	];

	public $plugins_to_auto_activate = [
		'akismet',
		'amazon-web-services',
		'amazon-s3-and-cloudfront',
		'autodescription', // The SEO Framework
		'genesis-custom-headers',
		'genesis-palette-pro',
		'genesis-tabs',
		'genesis-dambuster',
		'genesis-simple-edits',
		'genesis-simple-share',
		'genesis-simple-sidebars',
		'genesis-responsive-slider',
		'genesis-columns-advanced',
		'gravityforms',
		'hookpress-master',
		'imsanity',
		'note',
		'seriously-simple-podcasting-genesis-support',
		'wp-help',
		'widget-clone',
		'wp-better-emails',
		'sucuri-scanner',

	];

	public $links_allowed = [
		'activate',
		'deactivate',
	];

	public $active_plugins;

	public $installed_plugins;

	public function __construct() {
		add_action( 'admin_init', [ $this, 'init' ] );
	}

	public function init() {
		$this->set_vars();
		$this->run_filters_and_hooks();
	}

	public function set_vars() {
		$this->active_plugins           = get_option( 'active_plugins' );
		$this->installed_plugins        = array_keys( get_plugins() );
		$this->plugins_to_auto_activate = self::plugins_reference( $this->plugins_to_auto_activate );
		$this->plugins_shown            = self::plugins_reference( $this->plugins_shown );
	}

	public function plugins_reference( $plugins ) {
		return array_map( function ( $plugin ) {
			$found = preg_grep( '/^' . $plugin . '.*/', $this->installed_plugins );

			return array_pop( $found );
		}, $plugins );
	}

	public function run_filters_and_hooks() {
		add_filter( 'all_plugins', [ $this, 'control_plugins_shown' ] );
		add_filter( 'show_advanced_plugins', '__return_false' );
		add_filter( 'plugin_row_meta', [ $this, 'hide_plugin_metadata' ], 25, 2 );
		add_filter( 'plugin_action_links', [ $this, 'hide_plugin_links' ], 50 );
		self::plugins_specific_action_link_filters();
		$this->activate_plugins();
	}

	public function control_plugins_shown( $plugins ) {
		return array_filter( $plugins, function ( $plugin ) {
			return in_array( $plugin, $this->plugins_shown );
		}, ARRAY_FILTER_USE_KEY );
	}


	public function activate_plugins() {
		foreach ( $this->plugins_to_auto_activate as $plugin ) {
			if ( in_array( $plugin, $this->active_plugins ) ) {
				continue;
			}
			$result = activate_plugin( $plugin );
			if ( $result ) {
				error_log( 'error in auto activating: ' . $plugin );
			}
		}
	}


	public function plugins_specific_action_link_filters() {
		foreach ( $this->installed_plugins as $plugin ) {
			add_filter( 'plugin_action_links_' . $plugin, [ $this, 'hide_plugin_links' ], 25 );
		}
	}

	public function hide_plugin_links( $links ) {
		$curated = array_filter( $links, function ( $link ) {
			return ( in_array( $link, $this->links_allowed ) ? true : false );
		}, ARRAY_FILTER_USE_KEY );

		return $curated;
	}

	public function hide_plugin_metadata( $links, $file ) {
		return [];
	}

}
