<?php
/**
 * Installer
 *
 * @package BernskioldMedia\WP\EventsCalendarIcalFeeds
 */

namespace BernskioldMedia\WP\EventsCalendarIcalFeeds;

use ECIF_Vendor\BernskioldMedia\WP\PluginBase\Installer;

defined( 'ABSPATH' ) || exit;

class Install extends Installer {

	public static function install(): void {
		parent::install();

		do_action( 'events_calendar_ical_feeds_install' );
	}

}
