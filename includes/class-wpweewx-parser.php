<?php
/**
 * JSON parsing helpers.
 *
 * @package WPWeeWX
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPWeeWX_Parser {
	/**
	 * Safely get a nested value from WeeWX JSON.
	 *
	 * JSON keys are not guaranteed; return null when missing.
	 * This keeps rendering logic clean and avoids notices.
	 *
	 * @param array  $data  Parsed JSON array.
	 * @param string $path  Dot path, e.g. "current.temperature".
	 * @return mixed|null
	 */
	public static function get( $data, $path ) {
		if ( ! is_array( $data ) || empty( $path ) ) {
			return null;
		}

		$parts = explode( '.', $path );
		$node  = $data;

		foreach ( $parts as $part ) {
			if ( ! is_array( $node ) || ! array_key_exists( $part, $node ) ) {
				return null;
			}
			$node = $node[ $part ];
		}

		return $node;
	}
}
