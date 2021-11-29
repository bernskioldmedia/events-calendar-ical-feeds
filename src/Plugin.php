<?php

namespace BernskioldMedia\WP\EventsCalendarIcalFeeds;

use ECIF_Vendor\BernskioldMedia\WP\PluginBase\BasePlugin;

defined( 'ABSPATH' ) || exit;

class Plugin extends BasePlugin {

	protected static string $slug             = 'events_calendar_ical_feeds';
	protected static string $version          = '1.0.3';
	protected static string $textdomain       = 'events-calendar-ical-feeds';
	protected static string $plugin_file_path = EVENTS_CALENDAR_ICAL_FEEDS_FILE_PATH;

	protected static array $boot = [
		Endpoints::class,
		Calendar_Subscribe_Button::class,
	];

	protected function init_hooks(): void {
		parent::init_hooks();

		add_action( 'wp_enqueue_scripts', [ self::class, 'scripts' ] );
	}

	public static function scripts(): void {
		if( true !== apply_filters( 'events_calendar_ical_load_assets', true ) ) {
			return;
		}

		if ( ! wp_script_is( 'alpinejs', 'registered' ) ) {
			wp_register_script( 'alpinejs',  self::get_assets_url('scripts/alpinejs.js'), [], '3.5.1', true );
		}

		wp_enqueue_script( 'alpinejs' );
	}

}
