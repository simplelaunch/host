<?php

namespace Mizner\SLC;

class AdminFooter {

	public function __construct() {
		add_filter( 'admin_footer_text', [ $this, 'change_footer_admin' ] );
		add_action( 'admin_menu', [ $this, 'remove_footer_version' ] );

	}

	public function change_footer_admin() {
		$quotes = [
			'A plateau is the highest form of flattery.',
			'It’s hard to explain puns to kleptomaniacs because they always take things literally.',
			'Time flies like an arrow, fruit flies like a banana.',
			'What\'s the best thing about Switzerland? I don\'t know, but their flag is a huge plus.',
			'A Buddhist walks up to a hotdog stand and says, "Make me one with everything."',
			'I\'m addicted to brake fluid, but I can stop whenever I want.',
			'I told my doctor that I broke my arm in two places. He told me to stop going to those places.',
			'What do you call it when Batman skips church? Christian Bale.',
			'I hate Russian dolls...so full of themselves.',
			'What\'s E.T. short for? Because he\'s only got little legs.',
			'My granddad has the heart of a lion and a lifetime ban from the San Diego Zoo.',
			'There\'s no "I" in Denial.',
			'Exaggerations went up by a million percent last year.',
			'Have I told you this deja vu joke before?',
			'Nostalgia isn\'t what it used to be...',
		];
		$pick   = array_rand( $quotes, 1 );

		return '<i>' . $quotes[ $pick ] . '</i>';
	}

	public function remove_footer_version() {
		remove_filter( 'update_footer', 'core_update_footer' );
	}

}