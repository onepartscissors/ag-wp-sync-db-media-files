<?php
/*
Plugin Name: AG WP Sync DB Media Files
Plugin URI: https://github.com/onepartscissors/ag-wp-sync-db-media-files
Description: Media files addon for AG WP Sync DB. Fork of WP Sync DB Media Files with PHP 8 fixes and faster media syncs.
Author: Ash Glover
Author URI: https://www.ashglover.co.za
Version: 2.0.0
Requires at least: 5.6
Requires PHP: 7.4
Requires Plugins: ag-wp-sync-db
License: GPL-2.0-or-later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: ag-wp-sync-db-media-files
Domain Path: /languages
GitHub Plugin URI: onepartscissors/ag-wp-sync-db-media-files
Network: True
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once __DIR__ . '/version.php';
$GLOBALS['wpsdb_meta']['wp-sync-db-media-files']['folder'] = basename( plugin_dir_path( __FILE__ ) );

// Runs only once AG WP Sync DB has loaded, so it never attaches to the original WP Sync DB.
function ag_wp_sync_db_media_files_loaded() {
	if ( ! class_exists( 'WPSDB_Addon' ) || class_exists( 'WPSDB_Media_Files' ) ) return;

	load_plugin_textdomain( 'ag-wp-sync-db-media-files', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

	require_once __DIR__ . '/class/wpsdb-media-files.php';

	global $wpsdb_media_files;
	$wpsdb_media_files = new WPSDB_Media_Files( __FILE__ );
}
add_action( 'ag_wpsdb_loaded', 'ag_wp_sync_db_media_files_loaded' );

function ag_wp_sync_db_media_files_activate( $network_wide ) {
	if ( ! function_exists( 'deactivate_plugins' ) ) {
		require_once ABSPATH . 'wp-admin/includes/plugin.php';
	}
	deactivate_plugins( 'wp-sync-db-media-files/wp-sync-db-media-files.php', true, $network_wide );
}
register_activation_hook( __FILE__, 'ag_wp_sync_db_media_files_activate' );
