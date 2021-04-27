<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://sopro.io
 * @since      1.0.0
 *
 * @package    Sopro_Pulse
 * @subpackage Sopro_Pulse/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div id="wrap">
	<div class="sopro-tracking">
		<img src="https://sopro.io/wp-content/themes/sopro/img/logo_symbol_header.svg" />
	</div>
	<form method="post" action="options.php">
		<?php
			settings_fields( 'sopro-pulse-settings' );
			do_settings_sections( 'sopro-pulse-settings' );
			submit_button();
		?>
	</form>
	<div>
	<a href="https://sopro.io/sopro-plugin-settings">Where do I find my Sopro Plugin ID?</a></div>
</div>
