<?php
/**
 * The widget-specific functionality of the plugin.
 *
 * @link       http://vint3.com
 * @since      1.0.0
 *
 * @package    Divi
 * @subpackage WidgetifyLayouts/lib
 */

namespace Vint3\Divi\WidgetifyLayouts;

/**
 * The widget-specific functionality of the plugin.
 *
 * @since      1.0.0
 * @package    Divi
 * @subpackage WidgetifyLayouts/lib
 * @author     Vint3 <hello@vint3.com>
 */
class Widgets {

	/**
	 * The plugin's instance.
	 *
	 * @since  1.0.0
	 * @access private
	 * @var    Plugin
	 */
	private $plugin;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 1.0.0
	 * @param Plugin $plugin This plugin's instance.
	 */
	public function __construct( Plugin $plugin ) {
		$this->plugin = $plugin;
	}

	/**
	 * Setup hooks.
	 */
	public function ready() {
		\register_widget( '\Vint3\Divi\WidgetifyLayouts\Widgets\Layout' );
	}
}
