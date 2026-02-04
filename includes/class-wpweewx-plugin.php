<?php
/**
 * Plugin bootstrap.
 *
 * @package WPWeeWX
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPWeeWX_Plugin {
	/**
	 * Initialize hooks.
	 */
	public static function init() {
		add_action( 'init', array( __CLASS__, 'register_assets' ) );
		add_action( 'init', array( 'WPWeeWX_Shortcode', 'register' ) );

		if ( is_admin() ) {
			WPWeeWX_Admin::init();
		}
	}

	/**
	 * Register frontend assets.
	 */
	public static function register_assets() {
		wp_register_style(
			'wpweewx-weather',
			WPWEEWX_PLUGIN_URL . 'assets/css/wpweewx-weather.css',
			array(),
			WPWEEWX_VERSION
		);
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue_assets' ) );
	}

	/**
	 * Enqueue assets.
	 */
	public static function enqueue_assets() {
		wp_enqueue_style( 'wpweewx-weather' );
	}
}
