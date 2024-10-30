<?php
/**
 * @package CentaurSoftware eServices
 * @version 1.0
 */
/*
Plugin Name: CentaurSoftware eServices
Plugin URI: https://www.centaursoftware.com/
Description: eServices powered by CentaurSoftware
Author: CentaurSoftware
Version: 1.0
Stable Tag: 1.0
Tested up to: 4.9.19
*/
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'centaursoftware_links' );

function centaursoftware_links( $links ) {
	array_unshift($links, '<a href="'. esc_url( get_admin_url(null, 'options-general.php?page=centaursoftware_eservices') ) .'">Settings</a>');
	return $links;
}

add_action('admin_menu', 'centaursoftware_add_plugin_page');
function centaursoftware_add_plugin_page() {
	add_options_page(
		'Settings CentaurSoftware eServices',
		'CentaurSoftware eServices',
		'manage_options',
		'centaursoftware_eservices',
		'centaursoftware_page_output'
	);
}

function centaursoftware_page_output() {
	?>
	<img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzNzUiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCAzNzUgNjQiPjxkZWZzPjxsaW5lYXJHcmFkaWVudCBpZD0iYSIgeDE9IjAlIiB5MT0iNTAlIiB5Mj0iNTAlIj48c3RvcCBvZmZzZXQ9IjAlIiBzdG9wLWNvbG9yPSIjQUEwQzMxIi8+PHN0b3Agb2Zmc2V0PSIxMDAlIiBzdG9wLWNvbG9yPSIjRUUyOTNEIi8+PC9saW5lYXJHcmFkaWVudD48L2RlZnM+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48cGF0aCBmaWxsPSIjMjMxRjIwIiBkPSJNOTguNiA2Mi4yaDEuMlY5LjVoLTEuMnY1Mi43eiIvPjxwYXRoIGZpbGw9InVybCgjYSkiIGQ9Ik03MC41IDMwLjVINDEuM2MtNy4zIDAtMTQuMS0zLjMtMTkuNC04LjRhMjMuOCAyMy44IDAgMCAxLTIyIDE5VjE5LjZDMCA4LjUgNS4xIDIuNyAxMS42IDBBMTAuOCAxMC44IDAgMCAwIDEwIDZjMCAzLjUgMS40IDYuNCA0IDguNWExNiAxNiAwIDAgMCAxMC40IDMuMmgyMy41bC00LjUtNi4xaC0xOWMtMiAwLTMuNy0uNi01LTEuNy0xLjQtMS0yLTIuNS0yLTQuMSAwLTEuNy42LTMgMi00LjEgMS4zLTEgMy0xLjYgNS0xLjZoMTdjMjIuOC4zIDI5LjIgMTYuMiAyOS4yIDMwLjQiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDE4Ny41MDAwMDAsIDMxLjc4MDAwMCkgc2NhbGUoMSwgLTEpIHRyYW5zbGF0ZSgtMTg3LjUwMDAwMCwgLTMxLjc4MDAwMCkgdHJhbnNsYXRlKDAuMDAwMDAwLCAwLjI4MDAwMCkgdHJhbnNsYXRlKDE1LjEzMzMzMywgMjIuMjY2NjY2KSIvPjxwYXRoIGZpbGw9IiMyMzFGMjAiIGQ9Ik0yOC4xIDQzLjZhMTIuMSAxMi4xIDAgMCAxLTIuMy0yLjZoLTFDMTEuNSA0MSAwIDUyLjcgMCA2My4yaDI0LjRjMTUuNiAwIDIyLjItNy43IDI0LjEtMTYuMUgzOC40Yy00LjEgMC03LjYtMS4yLTEwLjMtMy41Ii8+PHBhdGggZmlsbD0iI0FBMEMzMSIgZD0iTTEyMC40IDUyLjJjLS40IDAtLjcgMC0xIC4zLS4zLjMtLjQuNi0uNC45di43YzAgLjguNCAxLjIgMS40IDEuMmg4YzEgMCAyIC4zIDIuNyAxIC44LjYgMS4yIDEuNSAxLjIgMi42di43YzAgMS0uNCAxLjktMS4yIDIuNmE0IDQgMCAwIDEtMi43IDFoLTkuOGMtMi4yIDAtMi4yLTIuNC0yLjItMi40aDEybDEtLjNjLjItLjMuNC0uNi40LTFWNTljMC0uOC0uNS0xLjItMS40LTEuMmgtOGMtMS4xIDAtMi0uNC0yLjgtMWEzLjMgMy4zIDAgMCAxLTEuMi0yLjZ2LS43YzAtMSAuNC0xLjkgMS4yLTIuNmE0IDQgMCAwIDEgMi44LTFoOS42YzIuMyAwIDIuMyAyLjQgMi4zIDIuNGgtMTJNMTQ5LjggNTMuNGMwLS4zIDAtLjYtLjQtLjktLjMtLjItLjYtLjMtMS0uM0gxNDBjLS40IDAtLjcgMC0xIC4zLS4zLjMtLjQuNi0uNC45djYuMmMwIC44LjQgMS4yIDEuNCAxLjJoOC41Yy45IDAgMS4zLS40IDEuMy0xLjJ2LTYuMnptMS40IDguOGE0IDQgMCAwIDEtMi43IDFIMTQwYy0xLjEgMC0yLS4zLTIuOC0xYTMuMyAzLjMgMCAwIDEtMS4yLTIuNnYtNi4yYzAtMSAuNC0xLjkgMS4yLTIuNmE0IDQgMCAwIDEgMi44LTFoOC41YzEgMCAxLjkuMyAyLjcgMSAuOC43IDEuMiAxLjYgMS4yIDIuNnY2LjJjMCAxLS40IDItMS4yIDIuNnpNMTU4LjggNTcuN3Y1LjVoLTIuNnYtOS44YzAtMSAuNC0xLjkgMS4yLTIuNmE0IDQgMCAwIDEgMi44LTFoOS4yYzIuNCAwIDIuNiAyLjQgMi42IDIuNGgtMTEuOGMtLjQgMC0uNyAwLTEgLjMtLjMuMy0uNC42LS40Ljl2MS45SDE3MnYyLjRoLTEzLjJNMTgzIDUyLjJ2MTFzLTIuNi4zLTIuNi0yLjV2LTguNUgxNzR2LTIuNGgxNS43djIuNEgxODNNMjMwLjggNTcuN2gtOS40Yy0uMyAwLS42LjEtMSAuNGExIDEgMCAwIDAtLjQuOHYuN2MwIC44LjUgMS4yIDEuNCAxLjJoOGMxIDAgMS40LS40IDEuNC0xLjJ2LTEuOXptMC0yLjR2LTJhMSAxIDAgMCAwLS41LS44Yy0uMy0uMi0uNi0uMy0xLS4zaC0xMS42czAtMi40IDItMi40aDkuN2MxIDAgMiAuMyAyLjcgMSAuOC43IDEuMiAxLjYgMS4yIDIuNnY2LjJjMCAxLS40IDItMS4xIDIuNi0uOC43LTEuNyAxLTIuOCAxaC04Yy0xIDAtMi0uMy0yLjgtMWEzLjMgMy4zIDAgMCAxLTEuMS0yLjZ2LS43YzAtMSAuNC0xLjggMS4yLTIuNWE0IDQgMCAwIDEgMi43LTFoOS40ek0yNTMuMiA1NS4zaDkuM2MuNCAwIC43LS4yIDEtLjQuMy0uMi40LS41LjQtLjh2LS43YzAtLjgtLjQtMS4yLTEuNC0xLjJoLThjLS45IDAtMS4zLjQtMS4zIDEuMnYxLjl6bTAgNC4zYzAgLjMuMS42LjQuOC4zLjMuNi40IDEgLjRoMTEuNnMtLjMgMi40LTIuNiAyLjRoLTljLTEgMC0yLS4zLTIuOC0xYTMuMyAzLjMgMCAwIDEtMS4yLTIuNnYtNi4yYzAtMSAuNC0yIDEuMi0yLjZhNCA0IDAgMCAxIDIuOC0xaDhjMSAwIDIgLjMgMi43IDEgLjguNiAxLjIgMS41IDEuMiAyLjZ2LjdjMCAxLS40IDEuOC0xLjIgMi41YTQgNCAwIDAgMS0yLjggMWgtOS4zdjJ6TTIxMS4xIDQ5Ljh2OS45YzAgLjgtLjQgMS4yLTEuNCAxLjJoLTQuM2MtLjkgMC0xLjMtLjQtMS4zLTEuMnYtOS45aC0yLjZ2OS45YzAgLjgtLjUgMS4yLTEuNCAxLjJoLTQuNWMtLjkgMC0xLjMtLjQtMS4zLTEuMnYtOS45aC0yLjZ2OS45YzAgMSAuNCAxLjkgMS4yIDIuNmE0IDQgMCAwIDAgMi43IDFoNC41YzEgMCAyLS4zIDIuNy0xYTQgNCAwIDAgMCAyLjYgMWg0LjNjMS4xIDAgMi0uNCAyLjgtMSAuOC0uNyAxLjItMS42IDEuMi0yLjZ2LTkuOUgyMTFNMjQxIDQ5LjhhNCA0IDAgMCAwLTIuOCAxYy0uOC43LTEuMiAxLjYtMS4yIDIuOHY5LjZoMi42VjUzYzAtLjQuMS0uOCAxLS44aDguM3MuNS0yLjQtMy40LTIuNEgyNDFNMTI5LjYgMzguMWExMy45IDEzLjkgMCAwIDEgMC0yNy43SDE1M2wtNSA2LjloLTE3YTcgNyAwIDEgMCAwIDE0aDIxLjVzLTEuNCA2LjgtOS40IDYuOGgtMTMuNU0xNjUuMyAxOC4yYzAtLjguMi0xLjYgMi0xLjZIMTgzYzEuNyAwIDIgLjggMiAxLjZ2MS4zYzAgLjMgMCAuNy0uNyAxLjItLjQuMy0uOS41LTEuMy41aC0xNy43di0zem0yLTcuOGMtMi4zIDAtNC4zLjctNiAyLjJhNy4zIDcuMyAwIDAgMC0yLjUgNS42djEyLjJjMCAyLjIgMSA0IDIuNiA1LjZhOC44IDguOCAwIDAgMCA1LjkgMi4zSDE4M2M3LjEgMCA3LjktNi4yIDcuOS02LjJoLTIzLjdhMiAyIDAgMCAxLTEuNC0uNmMtLjQtLjMtLjYtLjYtLjYtMS4xdi0zSDE4M2MyLjIgMCA0LjEtLjggNS44LTIuM2E3LjIgNy4yIDAgMCAwIDIuNi01LjZ2LTEuM2MwLTIuMy0uOC00LjItMi41LTUuN2E5IDkgMCAwIDAtNi0yLjFoLTE1LjZ6TTIwNS44IDEwLjNjLTIuMyAwLTQuMy44LTYgMi4yYTcuMyA3LjMgMCAwIDAtMi40IDUuN3YyMGg2LjR2LTIwYzAtLjkuMy0xLjYgMi0xLjZoMTYuN2MxLjggMCAyIC43IDIgMS42djIwaDYuNXYtMjBjMC0yLjMtLjktNC4yLTIuNS01LjdhOC43IDguNyAwIDAgMC02LTIuMmgtMTYuN00yNjUuOCAxMC4zaC0zMS41djYuMkgyNDd2MTUuOGMwIDYuNSA2LjQgNiA2LjQgNlYxNi41aDEzdi02LjJoLS43TTI3Ni40IDI5LjRWMjhjMC0uNC4xLS44LjYtMS4yLjQtLjMuOS0uNSAxLjQtLjVIMjk2djNjMCAxLS40IDEuNi0yIDEuNmgtMTUuN2MtMS44IDAtMi0uOC0yLTEuNnptMS40LTIwYy02LjggMC03LjQgNi4xLTcuNCA2LjFIMjk0Yy41IDAgMSAuMiAxLjQuNi42LjQuNy44LjcgMS4xdjNoLTE3LjdjLTIuMiAwLTQuMi44LTUuOSAyLjNhNyA3IDAgMCAwLTIuNiA1LjZ2MS4zYzAgMi4zLjkgNC4yIDIuNSA1LjdhOC43IDguNyAwIDAgMCA2IDIuMkgyOTRjMi4zIDAgNC4zLS44IDYtMi4yYTcuMiA3LjIgMCAwIDAgMi41LTUuN1YxNy4yYzAtMi4yLTEtNC0yLjYtNS42YTguNSA4LjUgMCAwIDAtNS45LTIuM2gtMTYuMnpNMzQxLjUgMTAuM2gtNS43djIwYzAgMS0uMyAxLjctMiAxLjdIMzE3Yy0xLjggMC0yLS44LTItMS42di0yMGgtNi41djIwYzAgMi4zLjkgNC4yIDIuNiA1LjdhOC43IDguNyAwIDAgMCA1LjkgMi4yaDE2LjdjMi4zIDAgNC4zLS44IDYtMi4yYTcuMyA3LjMgMCAwIDAgMi40LTUuN3YtMjBoLS43TTM2Ny40IDEwLjNoLTEwLjJjLTIuMyAwLTQuMy44LTYgMi4yYTcuMyA3LjMgMCAwIDAtMi41IDUuN3YyMGg2LjV2LTIwYzAtLjkuMi0xLjYgMi0xLjZoMTcuNHMuOS02LjMtNy4yLTYuMyIvPjwvZz48L3N2Zz4=" alt="" style="display:block;margin-top:20px;">
	<div class="wrap">
		<h2><?php echo get_admin_page_title() ?></h2>
		<style>
			.fieldset_start th,
			.fieldset_start td{
				border-top:1px solid #CCC;
			}
			.fieldset_start td:last-child{
				border-right:1px solid #CCC;
			}
			.fieldset_end th,
			.fieldset_end td{
				border-bottom:1px solid #CCC;
			}
			.fieldset_end td:last-child{
				border-right:1px solid #CCC;
			}
			.textCopied{
				position:absolute;
				top:0;
				left:0;
				display:inline-block;
				padding:2px 4px;
				background:#ffffed;
				border:1px solid #ffe9bd;
				opacity:0;
				transform:translateY(100%);
				transition:opacity ease 250ms;
			}
			.textCopied_show{
				opacity:1;
			}
			.dashicons{
				line-height:1.3;
			}
			.form-table td [name^="centaursoftware[tag_"]{
				width:calc(70% - 30px);
				min-width:calc(300px - 30px);
			}
			@media screen and (max-width:782px){
				.form-table td input[type="text"]{
					display:inline-block;
					max-width:calc(100% - 30px);
				}
				.form-table td .dashicons{
					line-height:2;
				}
				.fieldset_end th,
				.fieldset_end td,
				.fieldset_end td:last-child,
				.fieldset_start th,
				.fieldset_start td,
				.fieldset_start td:last-child{
					border:0;
				}
				.fieldset_end td{
					border-bottom:20px solid transparent;
				}
				.fieldset_end + .fieldset_start th{
					border-top:1px solid #CCC;
				}
			}
		</style>
		<form action="options.php" method="POST">
			<?php
			settings_fields( 'option_group' );
			do_settings_sections( 'centaursoftware_settings_page' );
			submit_button();
			?>
		</form>
	</div>
	<?php
}

add_action('admin_init', 'centaursoftware_plugin_settings');
function centaursoftware_plugin_settings() {
	register_setting( 'option_group', 'centaursoftware', 'centaursoftware_sanitize_callback' );

	add_settings_section( 'centaursoftware_section', 'Main settings', '', 'centaursoftware_settings_page' );

	add_settings_field('iframe_code', 'iFrame code', 'centaursoftware_iframe_code', 'centaursoftware_settings_page', 'centaursoftware_section' );
	add_settings_field('iframe_sizes', 'iFrame block sizes', 'centaursoftware_iframe_sizes', 'centaursoftware_settings_page', 'centaursoftware_section', ['class' => 'fieldset_start']);
	add_settings_field('tag_to_replace_block', 'iFrame block to paste', 'centaursoftware_tag_to_replace_block', 'centaursoftware_settings_page', 'centaursoftware_section', ['class' => 'fieldset_end'] );
	add_settings_field('button_settings', 'Button Settings', 'centaursoftware_button_settings', 'centaursoftware_settings_page', 'centaursoftware_section', ['class' => 'fieldset_start'] );
	add_settings_field('tag_to_replace_button', 'Button to paste', 'centaursoftware_tag_to_replace_button', 'centaursoftware_settings_page', 'centaursoftware_section', ['class' => 'fieldset_end'] );
}

function centaursoftware_iframe_code() {
	$val = get_option('centaursoftware');
	$val = $val ? $val['iframe_code'] : null;
	?>
	<textarea class="large-text code" rows="10" placeholder="Paste your code here. The code can be obtained from the page 'Location Info' of CentaurSoftware eServices." name="centaursoftware[iframe_code]"><?php echo esc_attr( $val ) ?></textarea>
	<?php
}

function centaursoftware_iframe_sizes() {
	$val = get_option('centaursoftware');
	$width = (int) (isset($val['iframe_width']) ? $val['iframe_width'] : 100);
	$height = (int) (isset($val['iframe_height']) ? $val['iframe_height'] : 800);
	?>
	<div style="margin-bottom:10px;">
		<label>
			width:<br style="line-height:2">
			<input name="centaursoftware[iframe_width]" type="number" value="<?php echo esc_attr( $width ) ?>" min="0">
		</label>
		<label>
			<select name="centaursoftware[iframe_width_units]" style="width:60px;vertical-align:baseline">
				<option value="percents">%</option>
				<option value="pixels">px</option>
			</select>
		</label>
	</div>
	<div style="margin-bottom:10px;">
		<label>
			height:<br style="line-height:2">
			<input name="centaursoftware[iframe_height]" type="number" value="<?php echo esc_attr( $height ) ?>" min="0">
		</label>
		<label>
			<select name="centaursoftware[iframe_height_units]" style="width:60px;vertical-align:baseline">
				<option value="pixels">px</option>
				<option value="percents">%</option>
			</select>
		</label>
	</div>
	<div>
		<button type="button" onclick="resetBlockToDefault(event)">Reset to default</button>
	</div>
	<script>
        function resetBlockToDefault(ev) {
            ev.preventDefault();
            document.getElementsByName('centaursoftware[iframe_width]')[0].value = 100;
            document.getElementsByName('centaursoftware[iframe_width_units]')[0].value = 'percents';
            document.getElementsByName('centaursoftware[iframe_height]')[0].value = 800;
            document.getElementsByName('centaursoftware[iframe_height_units]')[0].value = 'pixels';
        }
	</script>
	<?php
}

function centaursoftware_button_settings() {
	$val = get_option('centaursoftware');
	$text = isset($val['button_text']) ? $val['button_text'] : 'MY BUTTON!';
	$bg_color = isset($val['button_bg_color']) ? $val['button_bg_color'] : '#7B8543';
	$text_color = isset($val['button_text_color']) ? $val['button_text_color'] : '#FCFCFB';
	?>
	<div id="button_settings">
		<div style="margin-bottom:10px">
			<label>
				button text:<br style="line-height:2">
				<input type="text" name="centaursoftware[button_text]" value="<?php echo esc_attr( $text ) ?>">
			</label>
		</div>
		<div style="margin-bottom:10px">
			<label>
				<input type="color" name="centaursoftware[button_bg_color]" value="<?php echo esc_attr( $bg_color ) ?>">
				button background colour
			</label>
		</div>
		<div style="margin-bottom:10px">
			<label>
				<input type="color" name="centaursoftware[button_text_color]" value="<?php echo esc_attr( $text_color ) ?>">
				button text colour
			</label>
		</div>
		<div>
			<button type="button" onclick="resetButtonToDefault(event)">Reset to default</button>
		</div>
	</div>
	<script>
        function resetButtonToDefault(ev) {
            ev.preventDefault();
            var buttonDefSettings = ['MY BUTTON!', '#7B8543', '#FCFCFB'],
	            elements = document.querySelectorAll('#button_settings input');
			for (var i = 0; i < elements.length; i++) {
			    elements[i].value = buttonDefSettings[i];
            }
        }
	</script>
	<?
}
function centaursoftware_tag_to_replace_block() {
	?>
	<label style="position:relative">
		<input type="text" readonly name="centaursoftware[tag_block]" value="[CENTAUR_SOFTWARE_ELEMENT type=&quot;block&quot;]" />
		<span onclick="copyBlockToClipboard()" class="dashicons dashicons-admin-page"></span>
		<span class="textCopied">Text copied!</span>
	</label>
	<script>
        function copyBlockToClipboard() {
            var copyText = document.querySelector('[name="centaursoftware[tag_block]"]'),
                elTip = copyText.nextSibling.nextSibling.nextSibling.nextSibling;
            copyText.select();
            copyText.setSelectionRange(0, 99999);
	        document.execCommand('copy');
            copyText.setSelectionRange(0, 0);
            elTip.classList.add('textCopied_show');
	        setTimeout(function() {
                elTip.classList.remove('textCopied_show');
	        }, 2000);
        }
	</script>
	<?php
}
function centaursoftware_tag_to_replace_button() {
	?>
	<label style="position:relative">
		<input type="text" readonly name="centaursoftware[tag_button]" value="[CENTAUR_SOFTWARE_ELEMENT type=&quot;button&quot;]" />
		<span onclick="copyButtonToClipboard()" class="dashicons dashicons-admin-page"></span>
		<span class="textCopied">Text copied!</span>
	</label>
	<script>
        function copyButtonToClipboard() {
            var copyText = document.querySelector('[name="centaursoftware[tag_button]"]'),
                elTip = copyText.nextSibling.nextSibling.nextSibling.nextSibling;
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand('copy');
            copyText.setSelectionRange(0, 0);
            elTip.classList.add('textCopied_show');
            setTimeout(function() {
                elTip.classList.remove('textCopied_show');
            }, 2000);
        }
	</script>
	<?php
}
function centaursoftware_sanitize_callback( $options ){
	foreach( $options as $name => & $val ){
		if( $name == 'textarea' )
			$val = $val;

		if( $name == 'iframe_width' )
			$val = sanitize_text_field( $val );

		if( $name == 'iframe_width_units' )
			$val = sanitize_text_field( $val );

		if( $name == 'iframe_height' )
			$val = sanitize_text_field( $val );

		if( $name == 'iframe_height_units' )
			$val = sanitize_text_field( $val );

		if( $name == 'button_text' )
			$val = sanitize_text_field( $val );

		if( $name == 'button_bg_color' )
			$val = sanitize_text_field( $val );

		if( $name == 'button_text_color' )
			$val = sanitize_text_field( $val );
	}

	return $options;
}

add_action('wp_head', 'centaursoftware_add_script_in_head');
function centaursoftware_add_script_in_head() {
	$options = get_option('centaursoftware');
	$code = $options['iframe_code'];
	$content = '';

	$btn_code = "
		var centaurAsButton = true; // if 'true' - iframe will be hidden until button pressed
		var centaurButtonName = '".(esc_attr($options['button_text']))."'; // Optional - if centaurAsButton is 'true' and you need to override default button caption 'Book Online'
		var centaurButtonColour = '".(esc_attr($options['button_bg_color']))."';
		var centaurButtonTextColour = '".(esc_attr($options['button_text_color']))."';
	";
	if (preg_match('/(<script.[^\n]+>)/', $code, $matches)) {
		$code = str_replace($matches[1], $matches[1]."\n".$btn_code."\n", $code);
	}

	$content .= $code;
	?>
	<script type="text/javascript">
		<?php echo wp_kses_post($content) ?>
	</script>
	<?php
}

function centaursoftware_element($atts = [], $content) {
	$options = get_option('centaursoftware');

	if (preg_match('/divSelector\s?=\s?[\'|\"](.[^\'\"]*)/', $options['iframe_code'], $matches)) {
		$selector = $matches[1];
	} else {
		$selector = 'centaurIframe2';
	}

	$content = '';
	if ($atts['type'] === 'button') {
		$content = str_replace('#SELECTOR#', $selector, '<div class="#SELECTOR#" data-centaursoftware-type="'. $atts['type'] .'" style="display:inline-block"></div>');
	} else {
		$div_sizes = [];
		if (!isset($options['iframe_width'], $options['iframe_width_units'], $options['iframe_height'], $options['iframe_height_units'])) {
			$div_sizes = ['width:100%', 'height:800px'];
		} else {
			$div_sizes[] = [
				'width:' . $options['iframe_width'],
				$options['iframe_width_units'] === 'percents' ? '%' : 'px'
			];
			$div_sizes[] = [
				'height:' . $options['iframe_height'],
				$options['iframe_height_units'] === 'percents' ? '%' : 'px'
			];
			$div_sizes = array_map(function (&$a) {
				return implode('', $a);
			}, $div_sizes);
		}
		$div_sizes = implode(';', $div_sizes).';';
		$content = str_replace('#SELECTOR#', $selector, '<div class="centaurIframe" data-centaursoftware-type="'. $atts['type'] .'" style="display:block;position:relative;'. $div_sizes .'font-size:0;"></div>');
	}
	return $content;
}

add_shortcode('CENTAUR_SOFTWARE_ELEMENT', 'centaursoftware_element');

function centaursoftware_activate() {
	register_uninstall_hook( __FILE__, 'centaursoftware_uninstall' );
}

register_activation_hook( __FILE__, 'centaursoftware_activate' );

function centaursoftware_uninstall() {
	delete_option('centaursoftware');
}
?>
