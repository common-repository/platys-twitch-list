<?php


/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Platys_Twitch_List
 * @subpackage Platys_Twitch_List/includes
 * @author     PlatypusMuerte
 */
class PlatysTwitchList_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		delete_option('platys_twitch_list_userkey');
		remove_shortcode('platystwitchlist');
	}

}
