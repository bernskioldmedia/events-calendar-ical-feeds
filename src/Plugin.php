<?php

namespace BernskioldMedia\WP\EventsCalendarIcalFeeds;

use ECIF_Vendor\BernskioldMedia\WP\PluginBase\BasePlugin;

defined( 'ABSPATH' ) || exit;

class Plugin extends BasePlugin {

	protected static string $slug             = 'events_calendar_ical_feeds';
	protected static string $version          = '1.0.1';
	protected static string $textdomain       = 'events-calendar-ical-feeds';
	protected static string $plugin_file_path = EVENTS_CALENDAR_ICAL_FEEDS_FILE_PATH;

	protected static array $boot = [
		Endpoints::class,
	];
}
