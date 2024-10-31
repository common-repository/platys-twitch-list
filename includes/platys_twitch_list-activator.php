<?php

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Platys_Twitch_List
 * @subpackage Platys_Twitch_List/includes
 * @author     PlatypusMuerte
 */
class PlatysTwitchList_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		add_option('platys_twitch_list_userkey','enter key here');		
	}

}
