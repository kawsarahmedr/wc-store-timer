<?php
/**
 * WC Store Timer Uninstall
 *
 * Uninstalling WC Store Timer deletes user roles, pages, tables, and options.
 *
 * @package     WooCommerceStoreTimer
 */

defined( 'WP_UNINSTALL_PLUGIN' ) || exit;

// remove all the options starting with wc_store_timer.
$delete_all_options = get_option( 'wc_store_timer_delete_data' );
if ( empty( $delete_all_options ) ) {
	return;
}
// Delete all the options.
global $wpdb;
$wpdb->query( "DELETE FROM $wpdb->options WHERE option_name LIKE 'wc_store_timer%';" );

