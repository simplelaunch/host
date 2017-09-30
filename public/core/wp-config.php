<?php

// load site-specific configurations
require_once dirname( $_SERVER['DOCUMENT_ROOT'] ) . '/' . $_SERVER['SERVER_NAME'] . '/wp-tenant-config.php';

define( 'WP_CONTENT_DIR', $_SERVER['DOCUMENT_ROOT'] . '/content' );
define( 'WP_CONTENT_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/content' );

defined( 'WP_SITEURL' ) or define( 'WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME'] . '/core' );
defined( 'WP_HOME' ) or define( 'WP_HOME', 'http://' . $_SERVER['SERVER_NAME'] );

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/core' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';