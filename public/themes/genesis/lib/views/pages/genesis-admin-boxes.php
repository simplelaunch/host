<?php
/**
 * Genesis Framework.
 *
 * WARNING: This file is part of the core Genesis Framework. DO NOT edit this file under any circumstances.
 * Please do all modifications in the form of a child theme.
 *
 * @package StudioPress\Genesis
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://my.studiopress.com/themes/genesis/
 */

?>
<div class="wrap genesis-metaboxes">
	<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
	<form method="post" action="options.php">

		<?php wp_nonce_field( 'closedpostboxes', 'closedpostboxesnonce', false ); ?>
		<?php wp_nonce_field( 'meta-box-order', 'meta-box-order-nonce', false ); ?>
		<?php settings_fields( $this->settings_field ); ?>


		<?php
		/**
		 * Fires inside meta box admin page, inside the form element, before the bottom buttons.
		 *
		 * The dynamic part of the hook name is the page hook.
		 *
		 * @since ???
		 *
		 * @param string $page_hook Page hook.
		 */
		do_action( "{$this->pagehook}_settings_page_boxes", $this->pagehook ); // WPCS: prefix ok.
		?>

		<div class="bottom-buttons">
			<?php submit_button( $this->page_ops['save_button_text'], 'primary', 'submit', false ); ?>
			<?php submit_button( $this->page_ops['reset_button_text'], 'secondary genesis-js-confirm-reset', $this->get_field_name( 'reset' ), false ); ?>
		</div>
	</form>
</div>
<script type="text/javascript">
	//<![CDATA[
	jQuery(document).ready( function ($) {
		// close postboxes that should be closed
		$('.if-js-closed').removeClass('if-js-closed').addClass('closed');
		// postboxes setup
		postboxes.add_postbox_toggles(<?php echo wp_json_encode( $this->pagehook ); ?>);
	});
	//]]>
</script>
