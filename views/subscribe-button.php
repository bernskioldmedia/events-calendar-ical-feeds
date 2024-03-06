<?php
/**
 * Subscribe button
 *
 * This button replaces Events Calendar Ical Link Button
 */

?>
<div class="ecif-subscription tribe-events-c-ical tribe-common-b2 tribe-common-b3--min-medium" x-data="{open:false}">
	<button
		class="tribe-events-c-ical__link"
		title="<?php echo esc_html__( 'Subscribe to the calendar', 'events-calendar-ical-feeds' ); ?>"
		@click="open=!open"
	>
		<?php echo esc_html__( 'Subscribe', 'events-calendar-ical-feeds' ); ?>
	</button>

	<div class="ecif-subscription-info" x-show="open" x-transition x-cloak>
		<p class="ecif-subscription-info__title"><?php esc_html_e( 'Subscribe to calendar', 'events-calendar-ical-feeds' ); ?></p>
		<p><?php _e( 'You can subscribe to the calendar in your calendar application such as
			<a href="https://support.google.com/calendar/answer/37100?hl=en&co=GENIE.Platform%3DDesktop" title="How to subscribe to a public calendar in Google Calendar" target="_blank">Google Calendar</a> or
			<a href="https://support.microsoft.com/en-us/office/import-or-subscribe-to-a-calendar-in-outlook-on-the-web-503ffaf6-7b86-44fe-8dd6-8099d95f38df" title="How to subscribe to a calendar in Outlook on the web" target="_blank">Outlook</a> and get updates automatically.',
				'events-calendar-ical-feeds' ); ?></p>
		<p><?php esc_html_e( 'When asked, you will need to provide the following URL to subscribe to all events:', 'events-calendar-ical-feeds' ); ?></p>
		<div class="ecif-subscription-info__actions">
			<input id="js-copy-tec-ical-feed-all-url" class="js-copy-tec-ical-feed-url ecif-subscription-info__url" readonly value="<?php echo esc_attr( \BernskioldMedia\WP\EventsCalendarIcalFeeds\Endpoints::get_feed_url() ); ?>" />
			<button id="js-copy-tec-ical-feed-all-button" class="js-copy-tec-ical-feed-button ecif-subscription-info__copy"><?php esc_html_e( 'Copy', 'events-calendar-ical-feeds' ); ?></button>
		</div>
		<?php if( \BernskioldMedia\WP\EventsCalendarIcalFeeds\Endpoints::get_feed_url() !== \BernskioldMedia\WP\EventsCalendarIcalFeeds\Endpoints::get_prefiltered_feed_url()) : ?>
			<?php
				$type = __('category', 'events-calendar-ical-feeds');
				if ( is_tax('post_tag') ) {
					$type = $type = __('tag', 'events-calendar-ical-feeds');
				}
			?>
			<p><?php echo sprintf(esc_html__( 'Or, you can use the following URL to only show the events with your current %s:', 'events-calendar-ical-feeds' ), $type ); ?></p>
			<div class="ecif-subscription-info__actions">
				<input id="js-copy-tec-ical-feed-filtered-url" class="js-copy-tec-ical-feed-url ecif-subscription-info__url" readonly value="<?php echo esc_attr( \BernskioldMedia\WP\EventsCalendarIcalFeeds\Endpoints::get_prefiltered_feed_url() ); ?>" />
				<button id="js-copy-tec-ical-feed-filtered-button" class="js-copy-tec-ical-feed-button ecif-subscription-info__copy"><?php esc_html_e( 'Copy', 'events-calendar-ical-feeds' ); ?></button>
			</div>
		<?php endif; ?>
		<p class="ecif-subscription-info__copied js-copy-tec-ical-feed-result">
			<?php esc_html_e( 'Copied!', 'events-calendar-ical-feeds' ); ?>
		</p>
	</div>

</div>
