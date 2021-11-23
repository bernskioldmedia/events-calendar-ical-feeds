<?php

namespace BernskioldMedia\WP\EventsCalendarIcalFeeds;


/**
 * Class Calendar_Subscribe_Button
 *
 * @package BernskioldMedia\WP\EventsCalendarIcalFeeds
 */
class Calendar_Subscribe_Button {

	public static function hooks(): void {
		add_filter( 'tribe_template_html:events/v2/components/ical-link', function(){
			ob_start();
			include Plugin::get_path( 'views/subscribe-button.php' );
			return ob_get_clean();
		} );
	}


}
