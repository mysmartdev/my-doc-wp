<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       plugin_name.com/team
 * @since      1.0.0
 *
 * @package    PluginName
 * @subpackage PluginName/admin/partials
 */
function my_doc_plugin_setting_api_key() {
    $options = get_option( "my_doc_general_settings_options" );
    echo '<input id="dbi_plugin_setting_api_key" name="dbi_example_plugin_options[api_key]" type="text" value="{esc_attr( $options["api_key"] )}" />';
}

function my_doc_register_settings() {
    add_settings_field( 'my_doc_plugin_setting_api_key', 'API Key', 'my_doc_plugin_setting_api_key', 'dbi_example_plugin', 'api_settings' );
}


add_action( 'admin_init', 'my_doc_register_settings' );

?>
<div class="wrap">
		        <div id="icon-themes" class="icon32"></div>
		        <h2>My-Doc Einstellungen</h2>
		        <form method="POST" action="options.php">
		            <?php
		                settings_fields( 'my_doc_general_settings_options' );
		                do_settings_sections( 'my_doc_general_settings' );
		            ?>
		            <?php submit_button(); ?>
		        </form>
</div>