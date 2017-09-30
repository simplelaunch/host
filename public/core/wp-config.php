<?php

define( 'SL_SITE', $_SERVER['SERVER_NAME'] );
define( 'SL_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] );
define( 'SL_ROOT_URI', 'http://' . SL_SITE );

// load site-specific configurations.
require_once dirname( SL_ROOT_PATH ) . '/' . SL_SITE . '/wp-tenant-config.php';

define( 'WP_CONTENT_URL', SL_ROOT_URI . '/content' );
define( 'WP_CONTENT_DIR', SL_ROOT_PATH . '/content' );

defined( 'WP_SITEURL' ) || define( 'WP_SITEURL', SL_ROOT_URI . '/core' );
defined( 'WP_HOME' ) || define( 'WP_HOME', SL_ROOT_URI );

define( 'WP_PLUGIN_URL', SL_ROOT_URI . '/plugins' );
define( 'WP_PLUGIN_DIR', SL_ROOT_PATH . '/plugins' );

define( 'WPMU_PLUGIN_URL', SL_ROOT_URI . '/mu-plugins' );
define( 'WPMU_PLUGIN_DIR', SL_ROOT_PATH . '/mu-plugins' );

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/core' );
//	define( 'ABSPATH', dirname( __FILE__ ) );

}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';