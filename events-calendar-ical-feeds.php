<?php
/**
 * Plugin Name: iCalendar Feeds for The Events Calendar
 * Plugin URI:  https://bernskioldmedia.com
 * Description: Extends The Events Calendar with iCal feeds that users can subscribe to in their favorite calendar application.
 * Version:     1.0.3
 * Author:      Bernskiold Media
 * Author URI:  https://bernskioldmedia.com
 * Text Domain: events-calendar-ical-feeds
 * Domain Path: /languages/
 *
 * @package BernskioldMedia\WP\EventsCalendarIcalFeeds
 */

use BernskioldMedia\WP\EventsCalendarIcalFeeds\Plugin;

defined( 'ABSPATH' ) || exit;

/**
 * Autoloader
 */
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require __DIR__ . '/vendor/autoload.php';
}

/**
 * Basic Constants
 */
define( 'EVENTS_CALENDAR_ICAL_FEEDS_FILE_PATH', __FILE__ );

/**
 * Initialize and boot the plugin.
 *
 * @return Plugin|void
 */
function events_calendar_ical_feeds() {
	$pluginList = get_option( 'active_plugins' );
	$plugin     = 'events-calendar-pro/events-calendar-pro.php';
	if ( in_array( $plugin, $pluginList ) ) {
		return Plugin::instance();
	}
}

events_calendar_ical_feeds();

/**
 * Run update checker if not disabled.
 */
$bm_wp_experience_updater = Puc_v4_Factory::buildUpdateChecker( 'https://github.com/bernskioldmedia/events-calendar-ical-feeds', __FILE__, 'events-calendar-ical-feeds' );
$bm_wp_experience_updater->getVcsApi()->enableReleaseAssets();
