<?php

namespace Mizner\SLC;

class AdminMenu {

	public function __construct() {
		add_action( 'admin_menu', [ $this, 'control_menu_items_shown' ] );
	}

	public function control_menu_items_shown() {
		global $submenu;
		unset( $submenu['index.php'][10] );

		return $submenu;

	}

}