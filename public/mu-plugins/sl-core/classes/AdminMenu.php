<?php

namespace Mizner\SLC;

class AdminMenu {

	public function __construct() {
		add_action( 'admin_menu', [ $this, 'control_menu_items_shown' ] );
	}

	public function control_menu_items_shown() {

		//	remove_menu_page( 'index.php' );                  //Dashboard
		remove_submenu_page( 'index.php', 'update-core.php' );


		//	remove_menu_page( 'jetpack' );                    //Jetpack*
		//	remove_menu_page( 'edit.php' );                   //Posts
		//	remove_menu_page( 'upload.php' );                 //Media
		//	remove_menu_page( 'edit.php?post_type=page' );    //Pages
		remove_menu_page( 'edit-comments.php' );          //Comments
		remove_menu_page( 'themes.php' );                 //Appearance
		//	remove_menu_page( 'plugins.php' );                //Plugins
		//	remove_menu_page( 'users.php' );                  //Users
		remove_menu_page( 'tools.php' );                  //Tools
		remove_menu_page( 'options-general.php' );        //Settings
		remove_menu_page( 'general-ad-management' );
		//  remove_menu_page( 'sucuriscan' );
		//  remove_menu_page( 'w3tc_dashboard' );
		remove_menu_page( 'amazon-web-services' );
		//  remove_submenu_page( 'options-general.php', 'wpmandrill' );
		//  remove_submenu_page( 'plugins.php', 'cloudflare' );

	}

}