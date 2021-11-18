<?php

namespace BernskioldMedia\WP\EventsCalendarIcalFeeds;


use BernskioldMedia\WP\PluginBase\Interfaces\Hookable;

class Endpoints implements Hookable {

	public static function hooks(): void {
		add_action( 'init', [ self::class, 'rules' ] );
		add_filter( 'query_vars', [ self::class, 'query_vars' ] );
		add_action( 'template_include', [ self::class, 'router' ] );
	}

	public static function rules(): void {
		global $wp_rewrite;
		
		if( ! function_exists( 'tribe_get_option') )
            		return;
        
		
		$slug      = tribe_get_option( 'eventsSlug' );
		$feed_slug = apply_filters( 'events_calendar_ical_feeds_feed_slug', 'ical-feed' );

		if ( empty( $slug ) ) {
			$slug = 'calendar';
		}

		add_rewrite_rule( '^' . $slug . '/' . $feed_slug . '[/]?$', 'index.php?calendar_feed=true', 'top' );
	}

	public static function query_vars( array $query_vars ): array {
		$query_vars[] = 'calendar_feed';

		return $query_vars;
	}

	public static function router( string $template ): string {
		if ( get_query_var( 'calendar_feed' ) === 'true' ) {
			return Plugin::get_path( 'views/ical-feed.php' );
		}

		return $template;
	}

}
