<?php
/**
 * Plugin Name: Multitenancy Theme Support
 */

register_theme_directory( '../themes' );

add_filter( 'theme_root', function () {
	return SL_THEME_PATH;
} );

add_filter( 'theme_root_uri', function () {
	return SL_THEME_URI;
} );

