<?php

namespace BernskioldMedia\WP\EventsCalendarIcalFeeds;


use ECIF_Vendor\BernskioldMedia\WP\PluginBase\Interfaces\Hookable;

class Endpoints implements Hookable {

	public static function hooks(): void {
		add_action( 'init', [ self::class, 'rules' ] );
		add_filter( 'query_vars', [ self::class, 'query_vars' ] );
		add_action( 'template_include', [ self::class, 'router' ] );
	}

	protected static function get_events_slug(): string{

		if( function_exists( 'tribe_get_option' ) ) {

			$slug      = tribe_get_option( 'eventsSlug' );

			if ( empty( $slug ) ) {
				$slug = 'calendar';
			}

		} else {
			$slug = 'calendar';
		}

		return $slug;
	}

	protected static function get_feed_slug(): string {
		return apply_filters( 'events_calendar_ical_feeds_feed_slug', 'ical-feed' );
	}

	public static function rules(): void {
		add_rewrite_rule( '^' . self::get_events_slug() . '/' . self::get_feed_slug() . '[/]?$', 'index.php?calendar_feed=true', 'top' );
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

	public static function get_feed_url(): string {
		return home_url( self::get_events_slug().'/'.self::get_feed_slug() );
	}

	public static function get_prefiltered_feed_url(): string {

		$url = self::get_feed_url();

		if( is_tax('tribe_events_cat')) {
			$url = add_query_arg('categories', get_queried_object_id(), $url);
		}

		if( is_tax('post_tag')) {
			$url = add_query_arg('tags', get_queried_object_id(), $url);
		}

		$url = apply_filters( 'events_calendar_ical_feeds_prefiltered_url', $url  );

		return esc_url($url);
	}

}
