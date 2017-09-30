<?php
/*
 * Plugin Name: Add Theme Directory
 *
 */

register_theme_directory( '../themes' );

add_filter( 'theme_root', 'sp8963532_theme_root' );
function sp8963532_theme_root() {
	return SL_THEME_PATH;
}

add_filter( 'theme_root_uri', 'sp8963532_theme_root_uri' );
function sp8963532_theme_root_uri() {
	return SL_THEME_URI;
}
