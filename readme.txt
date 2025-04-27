=== Lord's Day Rest Plugin ===
Contributors: ericzosso
Tags: Lord's Day, Sabbath, Christian, Catholic, Bible, scripture, rest, downtime, SEO-friendly, temporary unavailability, WordPress plugin, faith
Requires at least: 5.0
Tested up to: 6.6
Stable tag: 1.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A must-have WordPress plugin for strong Christians and Catholics who want to honor the Lord's Day by putting their website into rest mode; displaying a message from the Lord and maintaining some SEO care with a 503 response.  Use /?test_lords_day=1 to test on any page.

== Description ==
The **Lord's Day Rest Plugin** is perfect for Christian and Catholic website owners who observe the Lord's Day (Sunday) as a sacred day of rest. This plugin automatically makes your website unavailable on Sundays, displaying a faith-inspired message with a message from The Lord in Exodus 20:9-10 (Douay-Rheims). It uses a 503 Service Unavailable status code to ensure search engines recognize the downtime as temporary, keeping your site SEO-friendly. Use /?test_lords_day=1 to test on any page. (We believe Catholicism is not only Christian, but is the true form of Christianity, but we'll save the debate for later. Stay tuned for an LLM debate-mode solving this and bringing spiritual communion back to the Orthodox and the Protestants)

Key features:
- Detects the Lord's Day based on your WordPress timezone (supports both timezone strings and offsets like +6 or -6 hours).
- Displays your site's title (e.g., "YourSite is Resting") with a Lord-directed rest message.
- Shows the hours until Monday at midnight, calculated accurately for your timezone.
- SEO-friendly with a 503 response and Retry-After header.
- Test mode: add `?test_lords_day=1` to any URL to preview the rest mode.

This plugin fixes issues with manual offsets (e.g., avoiding confusion with +6 and -6) by correctly adjusting UTC time based on your site's settings. It's a must-have for strong Christians and Catholics looking to make their website Christian-friendly and Catholic-friendly while respecting the Sabbath.

== Installation ==
1. Upload the `lords-day-rest-plugin.php` file to the `/wp-content/plugins/lords-day-rest-plugin` directory, or install via the WordPress plugins screen.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Check your timezone in Settings > General > Timezone (works with strings like "America/Chicago" or offsets like -6).

== Frequently Asked Questions ==
= What happens on the Lord's Day? =
The front-end shows a rest message with a Bible quote and a 503 status, while admins can still access the backend.

= Does this hurt my SEO? =
No, the 503 status ensures search engines treat the downtime as temporary.

= How do I test it? =
Add `?test_lords_day=1` to any URL (e.g., `yoursite.com/?test_lords_day=1`) to see the rest message and test variables.

= What if my timezone offset looks wrong? =
The plugin handles offsets (e.g., +6 or -6) by adjusting UTC time correctly, avoiding display issues.

== Changelog ==
= 1.1 =
* Made test mode available to everyone, not just admins.
* Added UTC offset to debug info.

= 1.0 =
* Initial release that worked but had some dumb choices.

== Upgrade Notice ==
= 1.1 =
Now anyone can test the rest mode, and the debug info’s better.

= 1.0 =
First shot at honoring the Lord's Day—worked fine but needed tweaks.