<?php
/**
 * Subscribe button
 *
 * This button replaces Events Calendar Ical Link Button
 */
?>
<div class="tribe-events-c-ical tribe-common-b2 tribe-common-b3--min-medium" x-data="{open:false}">
	<button
		class="tribe-events-c-ical__link"
		title="<?php echo esc_html__( 'Subscribe to the calendar', 'events-calendar-ical-feeds' ); ?>"
		@click="open=!open"
	>
		<?php echo esc_html__( 'Subscribe', 'events-calendar-ical-feeds' ); ?>
	</button>

	<div class="feed-info" x-show="open" x-transition x-cloak>
		<?php echo \BernskioldMedia\WP\EventsCalendarIcalFeeds\Endpoints::get_feed_url(); ?>
	</div>

</div>
