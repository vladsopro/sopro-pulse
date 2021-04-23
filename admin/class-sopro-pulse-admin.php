<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://sopro.io
 * @since      1.0.0
 *
 * @package    Sopro_Pulse
 * @subpackage Sopro_Pulse/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Sopro_Pulse
 * @subpackage Sopro_Pulse/admin
 * @author     Vladimir Cvetkoski <vladimir@sopro.io>
 */
class Sopro_Pulse_Admin {

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

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Sopro_Pulse_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sopro_Pulse_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/sopro-pulse-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Sopro_Pulse_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sopro_Pulse_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/sopro-pulse-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register the Sopro Pulse settings page for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function register_settings_page() {
		
		add_submenu_page(
			'options-general.php',                             // parent slug
			__( 'Sopro Pulse', 'sopro-pulse' ),      // page title
			__( 'Sopro Pulse', 'sopro-pulse' ),      // menu title
			'manage_options',                        // capability
			'sopro-pulse',                           // menu_slug
			array( $this, 'display_settings_page' )  // callable function
		);
	}


	/**
	 * Display the settings page content for the page we have created.
	 *
	 * @since    1.0.0
	 */
	public function display_settings_page() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/sopro-pulse-admin-display.php';

	}

	/**
	 * Register the settings for our settings page.
	 *
	 * @since    1.0.0
	 */
	public function register_settings() {

		// Here we are going to register our setting.
		register_setting(
			$this->plugin_name . '-settings',
			$this->plugin_name . '-settings',
			array( $this, 'sandbox_register_setting' )
		);

		// Here we are going to add a section for our setting.
		add_settings_section(
			$this->plugin_name . '-settings-section',
			__( 'Sopro tracking settings', 'sopro-pulse' ),
			array( $this, 'sandbox_add_settings_section' ),
			$this->plugin_name . '-settings'
		);

		add_settings_field(
			'sopro-tracking',
			__( 'Enter your Sopro tracking ID', 'sopro-pulse' ),
			array( $this, 'sandbox_add_settings_field_input_text' ),
			$this->plugin_name . '-settings',
			$this->plugin_name . '-settings-section',
			array(
				'label_for' => 'sopro-tracking',
				'default'   => __( 'YOUR ID HERE', 'sopro-pulse' )
			)
		);

	}

	/**
	 * Sandbox our section for the settings.
	 *
	 * @since    1.0.0
	 */
	public function sandbox_add_settings_section() {

		return;

	}
	/**
	 * Sandbox our inputs with text
	 *
	 * @since    1.0.0
	 */
	public function sandbox_add_settings_field_input_text( $args ) {

		$field_id = $args['label_for'];
		$field_default = $args['default'];

		$options = get_option( $this->plugin_name . '-settings' );
		$option = $field_default;

		if ( ! empty( $options[ $field_id ] ) ) {

			$option = $options[ $field_id ];

		}

		?>
		
			<input type="text" name="<?php echo $this->plugin_name . '-settings[' . $field_id . ']'; ?>" id="<?php echo $this->plugin_name . '-settings[' . $field_id . ']'; ?>" value="<?php echo esc_attr( $option ); ?>" class="regular-text" />

		<?php

	}

}
