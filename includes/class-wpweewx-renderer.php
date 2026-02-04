<?php
/**
 * Rendering helpers.
 *
 * @package WPWeeWX
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPWeeWX_Renderer {
	/**
	 * Render a view template.
	 *
	 * @param string $view   View name.
	 * @param array  $payload Fetch payload.
	 * @param array  $args   Context args.
	 * @return string
	 */
	public static function render( $view, $payload, $args ) {
		$view = WPWeeWX_Settings::sanitize_view( $view );
		$theme = WPWeeWX_Settings::sanitize_theme( $args['theme'] );
		$source = WPWeeWX_Settings::sanitize_source( $args['source'] );

		$data = isset( $payload['data'] ) && is_array( $payload['data'] ) ? $payload['data'] : array();
		$warning = isset( $payload['warning'] ) ? $payload['warning'] : '';
		$cache_used = ! empty( $payload['cache_used'] );

		$show_panels = array();
		if ( ! empty( $args['show'] ) && is_string( $args['show'] ) ) {
			$raw_panels = array_map( 'trim', explode( ',', $args['show'] ) );
			$show_panels = array_filter( $raw_panels );
		}

		$template = WPWEEWX_PLUGIN_DIR . 'templates/' . $view . '.php';
		if ( ! file_exists( $template ) ) {
			return '<div class="weewx-weather weewx-weather--error">' . esc_html__( 'Template not found.', 'wpweewx' ) . '</div>';
		}

		ob_start();
		include $template;
		return ob_get_clean();
	}

	/**
	 * Return a display-safe value.
	 *
	 * @param array  $data Parsed JSON.
	 * @param string $path Dot path.
	 * @return string
	 */
	public static function display_value( $data, $path ) {
		$value = WPWeeWX_Parser::get( $data, $path );
		if ( null === $value || '' === $value ) {
			return '—';
		}

		if ( is_array( $value ) ) {
			if ( isset( $value['value'] ) ) {
				$unit_key = isset( $value['units'] ) ? 'units' : ( isset( $value['unit'] ) ? 'unit' : '' );
				$unit = $unit_key ? $value[ $unit_key ] : '';
				$number = is_numeric( $value['value'] ) ? number_format_i18n( (float) $value['value'], 3 ) : $value['value'];
				return trim( $number . ' ' . $unit );
			}

			$values = array_values( $value );
			if ( count( $values ) >= 2 && is_scalar( $values[0] ) ) {
				return trim( (string) $values[0] . ' ' . (string) $values[1] );
			}
		}

		if ( is_scalar( $value ) ) {
			if ( is_numeric( $value ) ) {
				return number_format_i18n( (float) $value, 3 );
			}
			return (string) $value;
		}

		return '—';
	}

	/**
	 * Render a metric row.
	 *
	 * @param string $label Label.
	 * @param string $value Value.
	 * @return void
	 */
	public static function metric_row( $label, $value ) {
		$path = WPWEEWX_PLUGIN_DIR . 'templates/partials/metric-row.php';
		if ( file_exists( $path ) ) {
			include $path;
		}
	}

	/**
	 * Render a card.
	 *
	 * @param string $title Title.
	 * @param string $content HTML content.
	 * @return void
	 */
	public static function card( $title, $content ) {
		$path = WPWEEWX_PLUGIN_DIR . 'templates/partials/card.php';
		if ( file_exists( $path ) ) {
			include $path;
		}
	}
}
