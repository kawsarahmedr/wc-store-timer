<?php

namespace WooCommerceStoreTimer\Admin;

defined( 'ABSPATH' ) || exit;

/**
 * Admin class.
 *
 * @since 1.0.0
 * @package WooCommerceStoreTimer
 */
class Menus {

	/**
	 * Menus constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'settings_menu' ), 55 );
		add_action( 'wc_store_timer_settings_things', array( __CLASS__, 'output_things_content' ) );
	}
	/**
	 * Settings menu.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function settings_menu() {
		add_submenu_page(
			'woocommerce',
			__( 'Store Timer', 'wc-store-timer' ),
			__( 'Store Timer', 'wc-store-timer' ),
			'manage_options',
			'wc-store-timer',
			array( Settings::class, 'output' )
		);
	}

	/**
	 * Output things content.
	 *
	 * @since 1.0.0
	 */
	public static function output_things_content() {

		include __DIR__ . '/views/add-thing.php';
	}
}
