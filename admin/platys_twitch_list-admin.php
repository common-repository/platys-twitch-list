<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @since      1.0.0
 * @package    Platys_Twitch_List
 * @subpackage Platys_Twitch_List/includes
 * @author     PlatypusMuerte
 */
class PlatysTwitchList_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/platys_twitch_list-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/platys_twitch_list-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function admin_menu() {
		add_menu_page(
			'Platys Twitch List',
			'Platys Twitch List',
			'manage_options',
			'platys_twitch_list',
			array( __CLASS__, 'adminMenu' ),
			plugin_dir_url(__FILE__) . 'images/platybot_r2_30x30.png',
			20
		);
	}

	public function adminMenu() {
		if(!empty($_POST["platys_twitch_list_userkey"])) {
			update_option('platys_twitch_list_userkey',sanitize_text_field($_POST["platys_twitch_list_userkey"]));
		}

		?>
		<div class="wrap">
			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

			<p>Enter your key from <a href="https://scripts.platypusmuerte.com" target="_blank">scripts.platypusmuerte.com</a>. If you do not already have a key, you can create one there as well.</p>

			<p>Add the following shortcode to place the stream list into your pages: <strong>[platystwitchlist]</strong><p>
			<form action="<?php menu_page_url( 'platys_twitch_list' ) ?>" method="post">
				<table class="form-table">
					<tr>
						<th><label for="first_field_id">User Key:</label></th>
						<td>
							<input type="text" class="regular-text" id="platys_twitch_list_userkey" name="platys_twitch_list_userkey" value="<?php echo get_option('platys_twitch_list_userkey'); ?>">
						</td>
					</tr>
				</table>

				<?php submit_button( __( 'Update Key', 'textdomain' ) ); ?>
			</form>
		</div>
		<?php
	}

}