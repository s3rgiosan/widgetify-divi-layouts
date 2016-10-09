<?php
/**
 * Widgetify Divi Layouts
 *
 * This plugin allows you to use your favorite Divi layouts, sections, rows or modules as widgets
 *
 * @link    http://vint3.com
 * @since   1.0.0
 *
 * @package Divi
 *
 * @wordpress-plugin
 * Plugin Name:       Widgetify Divi Layouts
 * Plugin URI:        https://github.com/vint3creative/widgetify-divi-layouts
 * Description:       Use your favorite Divi layouts, sections, rows or modules as widgets.
 * Version:           1.0.0
 * Author:            Vint3
 * Author URI:        http://vint3.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       widgetify-divi-layouts
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/vint3creative/widgetify-divi-layouts
 * GitHub Branch:     master
 */

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

use Vint3\Divi\WidgetifyLayouts;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Begins execution of the plugin.
 *
 * @since 1.0.0
 */
\add_action( 'plugins_loaded', function () {
	$plugin = new WidgetifyLayouts\Plugin( 'widgetify-divi-layouts', '1.0.0' );
	$plugin->run();
} );
