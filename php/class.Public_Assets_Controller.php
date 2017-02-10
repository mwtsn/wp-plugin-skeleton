<?php
namespace dtg\plugin_name;

/**
 * Class Public_Assets_Controller
 *
 * Sets up the public JS and CSS needed for this plugin.
 *
 * @link		https://github.com/davetgreen/plugin-name
 * @since		0.1.0
 *
 * @package dtg\plugin_name
 */
class Public_Assets_Controller {

	/**
	 * Path to the root plugin file.
	 *
	 * @var 	string
	 * @access	private
	 * @since	0.1.0
	 */
	private $root;

	/**
	 * Plugin text-domain.
	 *
	 * @var 	string
	 * @access	private
	 * @since	0.1.0
	 */
	private $textdomain;

	/**
	 * Plugin prefix.
	 *
	 * @var 	string
	 * @access	private
	 * @since	0.1.0
	 */
	private $prefix;

	/**
	 * Constructor.
	 *
	 * @since		0.1.0
	 */
	public function __construct() {
		$this->plugin_root 		 = DTG_PLUGIN_NAME_ROOT;
		$this->plugin_name		 = DTG_PLUGIN_NAME_NAME;
		$this->plugin_textdomain = DTG_PLUGIN_NAME_PREFIX;
		$this->plugin_prefix     = DTG_PLUGIN_NAME_TEXT_DOMAIN;
	}

	/**
	 * Do Work.
	 *
	 * @since    0.1.0
	 */
	public function run() {
		add_action( 'wp_enqueue_scripts', array( $this, 'public_enqueue_scripts' ) );
	}

	/**
	 * Enqueue Public Scripts.
	 *
	 * @since    0.1.0
	 */
	public function public_enqueue_scripts() {

		$public_css_url = plugins_url( 'css/admin.css', $this->plugin_root );
		$public_js_url  = plugins_url( 'js/admin.js', $this->plugin_root );

		wp_enqueue_style( $this->plugin_textdomain . '-public', $public_css_url );
		wp_enqueue_script( $this->plugin_textdomain . '-public', $public_js_url );
	}
}
