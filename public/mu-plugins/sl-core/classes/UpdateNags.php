<?php

/**
 * Taken directly from https://wordpress.org/plugins/disable-wordpress-updates/
 */

namespace Mizner\SLC;

use stdClass;

class UpdateNags {

	function __construct() {
		add_action( 'admin_init', [ $this, 'admin_init' ] );

		/*
		 * Filter schedule checks
		 *
		 * @link https://wordpress.org/support/topic/possible-performance-improvement/#post-8970451
		 */
		add_action( 'schedule_event', [ $this, 'filter_cron_events' ] );


		/*
		 * Disable All Automatic Updates
		 * 3.7+
		 *
		 * @author	sLa NGjI's @ slangji.wordpress.com
		 */
		add_filter( 'auto_update_translation', '__return_false' );
		add_filter( 'automatic_updater_disabled', '__return_true' );
		add_filter( 'allow_minor_auto_core_updates', '__return_false' );
		add_filter( 'allow_major_auto_core_updates', '__return_false' );
		add_filter( 'allow_dev_auto_core_updates', '__return_false' );
		add_filter( 'auto_update_core', '__return_false' );
		add_filter( 'wp_auto_update_core', '__return_false' );
		add_filter( 'auto_core_update_send_email', '__return_false' );
		add_filter( 'send_core_update_notification_email', '__return_false' );
		add_filter( 'auto_update_plugin', '__return_false' );
		add_filter( 'auto_update_theme', '__return_false' );
		add_filter( 'automatic_updates_send_debug_email', '__return_false' );
		add_filter( 'automatic_updates_is_vcs_checkout', '__return_true' );


		add_filter( 'automatic_updates_send_debug_email ', '__return_false', 1 );
		if ( ! defined( 'AUTOMATIC_UPDATER_DISABLED' ) ) {
			define( 'AUTOMATIC_UPDATER_DISABLED', true );
		}
		if ( ! defined( 'WP_AUTO_UPDATE_CORE' ) ) {
			define( 'WP_AUTO_UPDATE_CORE', false );
		}

		add_filter( 'pre_http_request', [ $this, 'block_request' ], 10, 3 );
	}


	/**
	 * Initialize and load the plugin stuff
	 *
	 * @since        1.3
	 * @author        scripts@schloebe.de
	 */
	function admin_init() {
		if ( ! function_exists( "remove_action" ) ) {
			return;
		}

		/*
		 * Remove 'update plugins' option from bulk operations select list
		 */
		global $current_user;
		$current_user->allcaps['update_plugins'] = 0;

		/*
		 * Hide maintenance and update nag
		 */
		remove_action( 'admin_notices', 'update_nag', 3 );
		remove_action( 'network_admin_notices', 'update_nag', 3 );
		remove_action( 'admin_notices', 'maintenance_nag' );
		remove_action( 'network_admin_notices', 'maintenance_nag' );

		/*
		 * 3.7+
		 */
		remove_action( 'wp_maybe_auto_update', 'wp_maybe_auto_update' );
		remove_action( 'admin_init', 'wp_maybe_auto_update' );
		remove_action( 'admin_init', 'wp_auto_update_core' );
		wp_clear_scheduled_hook( 'wp_maybe_auto_update' );
	}


	/**
	 * Check the outgoing request
	 *
	 * @since        1.4.4
	 */
	public function block_request( $pre, $args, $url ) {
		/* Empty url */
		if ( empty( $url ) ) {
			return $pre;
		}

		/* Invalid host */
		if ( ! $host = parse_url( $url, PHP_URL_HOST ) ) {
			return $pre;
		}

		$url_data = parse_url( $url );

		/* block request */
		if ( false !== stripos( $host, 'api.wordpress.org' ) && ( false !== stripos( $url_data['path'], 'update-check' ) || false !== stripos( $url_data['path'], 'browse-happy' ) ) ) {
			return true;
		}

		return $pre;
	}


	/**
	 * Filter cron events
	 *
	 * @since        1.5.0
	 */
	public function filter_cron_events( $event ) {
		switch ( $event->hook ) {
			case 'wp_version_check':
			case 'wp_update_plugins':
			case 'wp_update_themes':
			case 'wp_maybe_auto_update':
				$event = false;
				break;
		}

		return $event;
	}


	/**
	 * Override version check info
	 *
	 * @since        1.6.0
	 */
	public function last_checked_atm( $t ) {
		include( ABSPATH . WPINC . '/version.php' );

		$current                  = new stdClass;
		$current->updates         = [];
		$current->version_checked = $wp_version;
		$current->last_checked    = time();

		return $current;
	}

}