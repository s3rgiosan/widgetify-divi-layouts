<?php
/**
 * The file that defines the core plugin class
 *
 * @link       http://vint3.com
 * @since      1.0.0
 *
 * @package    Divi
 * @subpackage WidgetifyLayouts/lib
 */

namespace Vint3\Divi\WidgetifyLayouts;

/**
 * The core plugin class.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Divi
 * @subpackage WidgetifyLayouts/lib
 * @author     Vint3 <hello@vint3.com>
 */
class Plugin {

	/**
	 * ET builder layout post type slug.
	 *
	 * @since 1.0.0
	 * @var   string
	 */
	const POST_TYPE_LAYOUT = 'et_pb_layout';

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string
	 */
	protected $name;

	/**
	 * The current version of the plugin.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * @since 1.0.0
	 * @param string $name    Plugin name.
	 * @param string $version Plugin version.
	 */
	public function __construct( $name, $version ) {
		$this->name    = $name;
		$this->version = $version;
	}

	/**
	 * Load the dependencies, define the locale, and set the hooks for the Dashboard and
	 * the public-facing side of the site.
	 *
	 * @since 1.0.0
	 */
	public function run() {
		$this->register_widgets();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since  1.0.0
	 * @return string The name of the plugin.
	 */
	public function get_name() {
		return $this->name;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since  1.0.0
	 * @return string The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

	/**
	 * Registers all of the widgets of the plugin.
	 *
	 * @since  1.0.0
	 * @access private
	 */
	private function register_widgets() {
		$widgets = new Widgets( $this );
		\add_action( 'widgets_init', array( $widgets, 'ready' ) );
	}
}
