<?php
/**
 * Show a Divi Layout.
 *
 * @link       http://vint3.com
 * @since      1.0.0
 *
 * @package    Divi
 * @subpackage WidgetifyLayouts/lib/Widgets
 */

namespace Vint3\Divi\WidgetifyLayouts\Widgets;

use \Vint3\Divi\WidgetifyLayouts\Plugin;

/**
 * Show a Divi Layout.
 *
 * @since      1.0.0
 * @package    Divi
 * @subpackage WidgetifyLayouts/lib/Widgets
 * @author     Vint3 <hello@vint3.com>
 */
class Layout extends \WP_Widget {

	/**
	 * Register the widget.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		parent::__construct(
			'widgetify-divi-layouts-layout',
			\__( 'Divi Layouts', 'widgetify-divi-layouts' ),
			array(
				'description' => \__( 'Display a Divi Layout.', 'widgetify-divi-layouts' ),
			)
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see \WP_Widget::widget()
	 *
	 * @since 1.0.0
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {

		$layout_id = $instance['layout_id'];
		if ( empty( $layout_id ) ) {
			return;
		}

		if ( ! is_numeric( $layout_id ) ) {
			return;
		}

		$layout = \get_post( $layout_id );
		if ( empty( $layout ) ) {
			return;
		}

		if ( empty( $layout->post_content ) ) {
			return;
		}

		echo $args['before_widget'];
		echo \do_shortcode( $layout->post_content );
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see \WP_Widget::form()
	 *
	 * @since 1.0.0
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {

		$selected_layout_id = ! empty( $instance['layout_id'] ) ? \sanitize_key( $instance['layout_id'] ) : '';

		$layouts = \get_posts( array(
			'post_type'      => Plugin::POST_TYPE_LAYOUT,
			'posts_per_page' => '-1',
			'post_status'    => 'publish',
			'meta_query'     => array(
				array(
					'key'     => '_et_pb_predefined_layout',
					'compare' => 'NOT EXISTS',
				),
				array(
					'key'   => '_et_pb_built_for_post_type',
					'value' => 'page',
				),
			),
		) );

		$options = '';
		foreach ( $layouts as $layout ) {
			$options .= sprintf(
				'<option value="%s" %s>%s</option>',
				\esc_attr( $layout->ID ),
				\selected( $selected_layout_id, $layout->ID, false ),
				$layout->post_title
			);
		}

		if ( empty( $options ) ) {
			$options = \__( 'No layouts found.', 'widgetify-divi-layouts' );
		}

		echo '<p>';
		printf(
			'<label for="%s">%s:</label>',
			$this->get_field_id( 'layout' ),
			\__( 'Layout', 'widgetify-divi-layouts' )
		);

		printf(
			'<select id="%s" name="%s" class="widefat">%s</select>',
			$this->get_field_id( 'layout_id' ),
			$this->get_field_name( 'layout_id' ),
			$options
		);
		echo '</p>';
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @SuppressWarnings(PHPMD.UnusedFormalParameter)
	 *
	 * @see \WP_Widget::update()
	 *
	 * @since  1.0.0
	 * @param  array $new_instance Values just sent to be saved.
	 * @param  array $old_instance Previously saved values from database.
	 * @return array               Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['layout_id'] = ! empty( $new_instance['layout_id'] ) ? \sanitize_key( $new_instance['layout_id'] ) : '';
		return $instance;
	}
}
